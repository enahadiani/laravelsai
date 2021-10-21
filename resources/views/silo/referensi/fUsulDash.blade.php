
    <div class="row dash-box pb-3" >
        <div class="col-md-8 col-sm-12 col-grid">
            <div class="row">
                <div class="col-12 col-grid">
                    <div class="card">
                        <h5>Posisi Pengajuan DURK</h5>
                        <div class="row data-box">
                            <div class="col-md-2 col-sm-12 effect-hover" data-key="fUsulDraft">
                                <h6 class="sub-card-title text-center">Draft/Return</h6>
                                <p class="sub-card-value text-center" id="jum-draft">0</p>
                            </div>
                            <div class="col-md-2 col-sm-12 effect-hover" data-key="fUsulSedang">
                                <h6 class="sub-card-title text-center">Sedang Proses</h6>
                                <p class="sub-card-value text-center" id="jum-sedang">0</p>
                            </div>
                            <div class="col-md-2 col-sm-12 effect-hover" data-key="fUsulPerlu">
                                <h6 class="sub-card-title text-center">Perlu Proses</h6>
                                <p class="sub-card-value text-center" id="jum-perlu">0</p>
                            </div>
                            <div class="col-md-2 col-sm-12 effect-hover" data-key="fUsulTelah">
                                <h6 class="sub-card-title text-center">Telah Proses</h6>
                                <p class="sub-card-value text-center" id="jum-telah">0</p>
                            </div>
                            <div class="col-md-2 col-sm-12 effect-hover" data-key="fUsulSelesai">
                                <h6 class="sub-card-title text-center">Selesai</h6>
                                <p class="sub-card-value text-center" id="jum-selesai">0</p>
                            </div>
                            <div class="col-md-2 col-sm-12 effect-hover" data-key="fUsulBatal">
                                <h6 class="sub-card-title text-center">Batal</h6>
                                <p class="sub-card-value text-center" id="jum-batal">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-grid">
            <div class="card h-full p-0">
                <h5 class="with-padding">Daftar Perbaikan</h5>
                <div class="body-card pr-3" id="monitoring">
                    
                </div>
                <div class="footer-card">
                    <a href="" class="load-all">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row dash-datatable">
        <div class="col-12">
            <x-list-data judul="Data Pengajuan" tambah="" :thead="array('No Usulan', 'Kode PP','Kode Akun','Tanggal', 'Keterangan', 'Nilai','Posisi','Aksi')" :thwidth="array(15,10,10,10,15,10,15,15)" :thclass="array('','','','','','','','text-center')" />
        </div>
    </div>
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
        
    setHeightForm();
    var scrollCard = document.querySelector('#monitoring');
    new PerfectScrollbar(scrollCard, {
        suppressScrollX: true
    });

    function getDataBox() {
        $.ajax({
            type: "GET",
            url: "{{ url('rkap-trans/aju-usul-box') }}",
            dataType: 'json',
            async:false,
            success: function(result) { 
                if(result.status) {
                    $('#jum-draft').text(sepNum(result.draft))
                    $('#jum-sedang').text(sepNum(result.sedang))
                    $('#jum-perlu').text(sepNum(result.perlu))
                    $('#jum-telah').text(sepNum(result.telah))
                    $('#jum-selesai').text(sepNum(result.selesai))
                    $('#jum-batal').text(sepNum(result.batal))
                }
            }
        });
    }

    function getPerbaikan() {
        $.ajax({
            type: "GET",
            url: "{{ url('rkap-trans/aju-usul-perbaikan') }}",
            dataType: 'json',
            async:false,
            success: function(result) { 
                $('#monitoring').html('');
                if(result.status) {
                    if(result.data.length > 0){
                        var html = "";
                        for(var i=0;i < result.data.length;i++){
                            var line = result.data[i];
                            html +=`<div class="row with-padding-no-top with-h">
                                <div class="col-2">
                                    <div class="avatar">
                                        <img alt="avatar" src="{{ asset('img/avatar5.png') }}">
                                    </div>
                                </div>
                                <div class="col-10">
                                    <p class="key-card">`+line.no_bukti+`</p>
                                    <p class="value-card">Return Approval</p>
                                    <div class="content-card">
                                        Catatan: `+line.keterangan+`
                                    </div>
                                </div>
                                <hr class="line-v" />
                            </div>`;
                        }
                        
                        $('#monitoring').html(html);
                    }
                }
            }
        });
    }
    
    getDataBox();
    getPerbaikan();

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    $('#saku-datatable').on('click', '#btn-view', function(e) {
        e.preventDefault();
        var html = ""
        var id = $(this).closest('tr').find('td').eq(0).html();
        $.ajax({
            type: 'GET',
            url: "{{ url('/rkap-trans/aju-usul') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    var html = `<div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
                            <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
                            <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">`+id+`</span> 
                        </div>
                        <div class='separator'></div>
                        <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) ;position:sticky'>
                            <div style="">
                                <table class="borderless table-header-prev mt-2" width="100%">
                                    <tr>
                                        <td width="14%">No Bukti</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].no_bukti+`</td>
                                        <td width="30%" rowspan="3"></td>
                                        <td width="10%" rowspan="3" style="vertical-align:top !important"></td>
                                        <td width="1%" rowspan="3" style="vertical-align:top !important"></td>
                                        <td width="24%" rowspan="3" style="vertical-align:top !important"></td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Tanggal</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].tanggal+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">PP</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].kode_pp+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Akun</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].kode_akun+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Keterangan</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].keterangan+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Komentar</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].komentar+`</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="table responsive">
                                <table class="table table-striped table-body-prev mt-2" style="width:3020px !important">
                                <tr style="background: var(--theme-color-1) !important;color:white !important">
                                    <th style="width:150px !important">Kode Rkm</th>
                                    <th style="width:120px !important">Kegiatan</th>
                                    <th style="width:120px !important">Detail</th>
                                    <th style="width:50px !important">Satuan</th>
                                    <th style="width:100px !important">Tarif</th>
                                    <th style="width:100px !important">Vol Jan</th>
                                    <th style="width:100px !important">Jml Jan</th>
                                    <th style="width:100px !important">Vol Feb</th>
                                    <th style="width:100px !important">Jml Feb</th>
                                    <th style="width:100px !important">Vol Mar</th>
                                    <th style="width:100px !important">Jml Mar</th>
                                    <th style="width:100px !important">Vol Apr</th>
                                    <th style="width:100px !important">Jml Apr</th>
                                    <th style="width:100px !important">Vol Mei</th>
                                    <th style="width:100px !important">Jml Mei</th>
                                    <th style="width:100px !important">Vol Jun</th>
                                    <th style="width:100px !important">Jml Jun</th>
                                    <th style="width:100px !important">Vol Jul</th>
                                    <th style="width:100px !important">Jml Jul</th>
                                    <th style="width:100px !important">Vol Agt</th>
                                    <th style="width:100px !important">Jml Agt</th>
                                    <th style="width:100px !important">Vol Sep</th>
                                    <th style="width:100px !important">Jml Sep</th>
                                    <th style="width:100px !important">Vol Okt</th>
                                    <th style="width:100px !important">Jml Okt</th>
                                    <th style="width:100px !important">Vol Nov</th>
                                    <th style="width:100px !important">Jml Nov</th>
                                    <th style="width:100px !important">Vol Des</th>
                                    <th style="width:100px !important">Jml Des</th>
                                    <th style="width:100px !important">Total</th>
                                </tr>`;
                                    var det = '';
                                    if(result.data_detail.length > 0){
                                        var no=1;
                                        for(var i=0;i<result.data_detail.length;i++){
                                            var line =result.data_detail[i];
                                            det += "<tr>";
                                            det += "<td >"+line.kode_rkm+" - "+line.nama_rkm+"</td>";
                                            det += "<td >"+line.deskripsi+"</td>";
                                            det += "<td >"+line.detail+"</td>";
                                            det += "<td >"+line.satuan+"</td>";
                                            det += "<td >"+sepNum(line.tarif)+"</td>";
                                            det += "<td >"+sepNum(line.vol_01)+"</td>";
                                            det += "<td >"+sepNum(line.jml_01)+"</td>";
                                            det += "<td >"+sepNum(line.vol_02)+"</td>";
                                            det += "<td >"+sepNum(line.jml_02)+"</td>";
                                            det += "<td >"+sepNum(line.vol_03)+"</td>";
                                            det += "<td >"+sepNum(line.jml_03)+"</td>";
                                            det += "<td >"+sepNum(line.vol_04)+"</td>";
                                            det += "<td >"+sepNum(line.jml_04)+"</td>";
                                            det += "<td >"+sepNum(line.vol_05)+"</td>";
                                            det += "<td >"+sepNum(line.jml_05)+"</td>";
                                            det += "<td >"+sepNum(line.vol_06)+"</td>";
                                            det += "<td >"+sepNum(line.jml_06)+"</td>";
                                            det += "<td >"+sepNum(line.vol_07)+"</td>";
                                            det += "<td >"+sepNum(line.jml_07)+"</td>";
                                            det += "<td >"+sepNum(line.vol_08)+"</td>";
                                            det += "<td >"+sepNum(line.jml_08)+"</td>";
                                            det += "<td >"+sepNum(line.vol_09)+"</td>";
                                            det += "<td >"+sepNum(line.jml_09)+"</td>";
                                            det += "<td >"+sepNum(line.vol_10)+"</td>";
                                            det += "<td >"+sepNum(line.jml_10)+"</td>";
                                            det += "<td >"+sepNum(line.vol_11)+"</td>";
                                            det += "<td >"+sepNum(line.jml_11)+"</td>";
                                            det += "<td >"+sepNum(line.vol_12)+"</td>";
                                            det += "<td >"+sepNum(line.jml_12)+"</td>";
                                            det += "<td >"+sepNum(line.total)+"</td>";
                                            det += "</tr>";
                                            no++;
                                        }
                                    }
                                html+=det+`
                                </table>
                            </div>
                        </div>`;
                        
                        
                        $('.c-bottom-sheet__sheet').css({ "width":"70%","margin-left": "15%", "margin-right":"15%"});
                        $('#content-bottom-sheet').empty();
                        $('#content-bottom-sheet').html(html);
                        $('#trigger-bottom-sheet').trigger("click");
                        
                        var scroll = document.querySelector('.preview-body');
                        var psscroll = new PerfectScrollbar(scroll);

                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                }
            }
        });
    })

    var actionHtmlWithED = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Batal'  id='btn-delete'><i class='fa fa-times' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='iconsminds-clock-back' style='font-size:18px'></i></a>";
    var actionHtmlNoED = "<a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='iconsminds-clock-back' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('rkap-trans/aju-usul') }}", 
        [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            //{'targets': 6 ,'className': 'text-center' },
            {
                "targets":5,
                "className": 'text-right',
                "render": function ( data, type, row, meta ) {
                    return format_number(data);
                }
            }
            
        ],
        [
            { data:'no_bukti' },
            { data:'kode_pp' },
            { data:'kode_akun' },
            // { data:'tahun' },
            { data:'tanggal' },
            { data:'keterangan' },
            { data:'nilai' },
            // { data: 'komentar' },
            { data: 'posisi' },
            { data: 'progress', render: function(data) {
                if(data == 'A' || data == 'R') {
                    return actionHtmlWithED
                } else {
                    return actionHtmlNoED
                }
            } },
        ],
        "{{ url('rkap-auth/sesi-habis') }}",
        [[0 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    // HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('rkap-trans/aju-usul') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();  
                    getDataBox();
                    getPerbaikan();                  
                    showNotification("top", "center", "success",'Hapus Data','Data Pengajuan ('+id+') berhasil dihapus ');
                    // $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    if(typeof M == 'undefined'){
                        $('#modal-delete').modal('hide');
                    }else{
                        $('#modal-delete').bootstrapMD('hide');
                    }
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: result.data.message
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click','#btn-delete',function(e){
        e.preventDefault();
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            type:'hapus',
            title: 'Pembatalan Data?',
            text: 'Data akan dibatalkan secara permanen dan tidak dapat mengurungkan.<br> ID Data : <b>'+id+'</b>',
            confirm: 'Ya',
            cancel: 'Tidak'
        });
    });

    $('#saku-datatable').on('click', '#btn-edit', function(e){
        e.preventDefault();
        $id_edit= $(this).closest('tr').find('td').eq(0).html();
        $edit = 1;
        $('.navbar-top a').removeClass('active');
        $('a[data-href="fUsulAju"]').addClass('active');
        var url = "{{ url('rkap-auth/form')}}/fUsulAju";
        $('#trans-body').load(url);
    });
    // END HAPUS DATA

    // PRINT
    
    $('#saku-datatable').on('click','#btn-print',function(e) {
        e.preventDefault();
        var id = $(this).closest('tr').find('td').eq(0).html();
        printPreview(id, 'table','.dash-box','.dash-datatable');
    });
    
    $('#saku-print #btn-back').click(function(e) {
        e.preventDefault();
        $('#saku-print').hide()
        $('.dash-box').show()
        $('.dash-datatable').show()
    });
    // END PRINT PREVIEW
    
    // HISTORY
    
    $('#saku-datatable').on('click','#btn-history',function(e) {
        e.preventDefault();
        var id = $(this).closest('tr').find('td').eq(0).html();
        historyPreview(id,'.dash-box','.dash-datatable');
    });
    
    $('#saku-history #btn-aback').click(function(e) {
        e.preventDefault();
        $('#saku-history').hide()
        $('.dash-box').show()
        $('.dash-datatable').show()
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

    $('.data-box').on('click','.effect-hover',function(e){
        e.preventDefault();
        var key = $(this).data('key');
        $('.navbar-top a').removeClass('active');
        var url = "{{ url('rkap-auth/form')}}/"+key;
        $('a[data-href="'+key+'"]').addClass('active');
        $('#saku-print').hide();
        $('#saku-history').hide();        
        $('#trans-body').load(url);
    });

</script>