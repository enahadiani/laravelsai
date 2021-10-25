
        <div class="container-fluid mt-3">
        
            <!-- LIST DATA -->
            <x-list-data judul="Data Pengajuan Sedang diproses" tambah="" :thead="array('No Usulan', 'Kode PP', 'Tanggal', 'Keterangan', 'Nilai','Posisi','Aksi')" :thwidth="array(15,10,10,25,10,15,15)" :thclass="array('','','','','','','text-center')"  back="true"/>
            <!-- END LIST DATA -->
    
        </div>     
        
        <script src="{{ asset('helper.js') }}"></script>
        <script>
        setHeightForm();
        function sepNum(x){
            var num = parseFloat(x).toFixed(0);
            var parts = num.toString().split(".");
            var len = num.toString().length;
            // parts[1] = parts[1]/(Math.pow(10, len));
            parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
            return parts.join(",");
        }
    
        function toRp(num){
            if(num < 0){
                return "("+sepNum(num * -1)+")";
            }else{
                return sepNum(num);
            }
        }
    
        function toNilai(str_num){
            var parts = str_num.split('.');
            number = parts.join('');
            number = number.replace('Rp', '');
            // number = number.replace(',', '.');
            return +number;
        }
    
        function hitungBrg(){
            $('#total').val(0);
            total= 0;
            $('.row-barang').each(function(){
                var sub = toNilai($(this).closest('tr').find('.inp-grand_total').val());
                var this_val = sub;
                total += +this_val;
                
                $('#total').val(sepNum(total));
            });
        }
    
        function terbilang(int){
            angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
            int = Math.floor(int);
            if (int < 12)
                return " " + angka[int];
            else if (int < 20)
                return terbilang(int - 10) + " belas ";
            else if (int < 100)
                return terbilang(int / 10) + " puluh " + terbilang(int % 10);
            else if (int < 200)
                return "seratus" + terbilang(int - 100);
            else if (int < 1000)
                return terbilang(int / 100) + " ratus " + terbilang(int % 100);
            else if (int < 2000)
                return "seribu" + terbilang(int - 1000);
            else if (int < 1000000)
                return terbilang(int / 1000) + " ribu " + terbilang(int % 1000);
            else if (int < 1000000000)
                return terbilang(int / 1000000) + " juta " + terbilang(int % 1000000);
            else if (int < 1000000000000)
                return terbilang(int / 1000000) + " milyar " + terbilang(int % 1000000000);
            else if (int >= 1000000000000)
                return terbilang(int / 1000000) + " trilyun " + terbilang(int % 1000000000000);
        }
    
        function getNamaBulan(no_bulan){
            switch (no_bulan){
                case 1 : case '1' : case '01': bulan = "Januari"; break;
                case 2 : case '2' : case '02': bulan = "Februari"; break;
                case 3 : case '3' : case '03': bulan = "Maret"; break;
                case 4 : case '4' : case '04': bulan = "April"; break;
                case 5 : case '5' : case '05': bulan = "Mei"; break;
                case 6 : case '6' : case '06': bulan = "Juni"; break;
                case 7 : case '7' : case '07': bulan = "Juli"; break;
                case 8 : case '8' : case '08': bulan = "Agustus"; break;
                case 9 : case '9' : case '09': bulan = "September"; break;
                case 10 : case '10' : case '10': bulan = "Oktober"; break;
                case 11 : case '11' : case '11': bulan = "November"; break;
                case 12 : case '12' : case '12': bulan = "Desember"; break;
                default: bulan = null;
            }
    
            return bulan;
        }
    
        var backTo = "";
        var actionHtmlNoED = "<a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='iconsminds-clock-back' style='font-size:18px'></i></a>";
    
        var dataTable = generateTable(
            "table-data",
            "{{ url('rkap-trans/aju-usul-sedang') }}", 
            [
                {
                    'targets': 0,
                    'createdCell': function (td, cellData, rowData, row, col) {
                        if ( rowData.status == 'baru' ) {
                            $(td).parents('tr').addClass('selected');
                            $(td).addClass('last-add');
                        }
                    }
                },
                {
                        "targets":4,
                        "className": 'text-right',
                        "render": function ( data, type, row, meta ) {
                            return format_number(data);
                        }
                }
                // { 
                //     'targets': 6,
                //     'className': 'text-center',
                //     'data': null
                // }
            ],
            [
                { data:'no_bukti' },
                { data:'kode_pp' },
                // { data:'kode_akun' },
                // { data:'tahun' },
                { data:'tanggal' },
                { data:'keterangan' },
                { data:'nilai' },
                // { data: 'komentar' },
                { data: 'posisi' },
                { data: 'action', render: function(data) {
                    return actionHtmlNoED
                } },
            ],
            "{{ url('rkap-auth/sesi-habis') }}",
            [[2 ,"desc"]]
        );
    
        $.fn.DataTable.ext.pager.numbers_length = 5;
    
        $("#searchData").on("keyup", function (event) {
            dataTable.search($(this).val()).draw();
        });
    
        $("#page-count").on("change", function (event) {
            var selText = $(this).val();
            dataTable.page.len(parseInt(selText)).draw();
        });
    
        var $iconLoad = $('.preloader');
       
        $('#saku-datatable').on('click','#btn-print',function(e) {
            e.preventDefault();
            var id = $(this).closest('tr').find('td').eq(0).html();
            printPreview(id, 'table','#saku-form','#saku-datatable');
        });
        
        $('#saku-print #btn-back').click(function(e) {
            e.preventDefault();
            $('#saku-print').hide()
            if(backTo === 'table') {
                $('#saku-datatable').show()
                $('#saku-form').hide()
            } else {
                $('#saku-form').show()
                $('#saku-datatable').hide()
            }
        });
        // END PRINT PREVIEW
        
        $('#saku-datatable').on('click','#btn-history',function(e) {
            e.preventDefault();
            var id = $(this).closest('tr').find('td').eq(0).html();
            historyPreview(id,'#saku-form','#saku-datatable');
        });
        
        $('#saku-history #btn-aback').click(function(e) {
            e.preventDefault();
            $('#saku-history').hide()
            $('#saku-datatable').show()
            $('#saku-form').hide()
        });
    
        $('#saku-datatable').on('click', '#btn-kembali', function(e){
            e.preventDefault();
            var kode = null;
            msgDialog({
                id:kode,
                btn1: 'btn btn-primary',
                btn2: 'btn btn-light',
                title: 'Keluar Form?',
                text: 'Kembali ke halaman utama.',
                confirm: 'Keluar',
                cancel: 'Batal',
                type:'custom',
                showCustom:function(result){
                    if (result.value) {
                        $('.navbar-top a').removeClass('active');
                        $('a[data-href="fUsulDash"]').addClass('active');
                        var url = "{{ url('rkap-auth/form')}}/fUsulMenu";
                        $('#trans-body').load(url);
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // console.log('cancel');
                    }
                }
            });
        });
        </script>
    
        
    