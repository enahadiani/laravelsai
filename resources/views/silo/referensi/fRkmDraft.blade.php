
<x-list-data judul="Data Draft Pengajuan" tambah="" :thead="array('No Bukti', 'PP', 'Tanggal', 'Keterangan', 'Komentar', 'Posisi','Aksi')" :thwidth="array(15,10,10,10,20,15,10)" :thclass="array('','','','','','','')" back="true" />

    {{-- PRINT PREVIEW --}}
        <div id="saku-print" class="row" style="display: none;">
            <div class="col-12">
                <div class="card" style="height: 100%;">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                        <button type="button" class="btn btn-light ml-2" id="btn-back" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-primary ml-2" id="btn-cetak" style="float:right;"><i class="fa fa-print"></i> Print</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body" id="print-content">

                    </div>
                </div>
            </div>
        </div>
        {{-- END PRINT PREVIEW --}}

        {{-- HISTORY PREVIEW --}}
        <div class="row" id="saku-history" style="display: none;">
            <div class="col-12">
                <div class="card" style="height: 100%;">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                        <button type="button" class="btn btn-light ml-2" id="btn-aback" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body profiletimeline" id="history-content">

                    </div>
                </div>
            </div>
        </div>
        {{-- END HISTORY PREVIEW --}}


<script>

    var dataTable = generateTable(
        "table-data",
        "{{ url('rkap-trans/aju-draft') }}", 
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
            // {'targets': 7 ,'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'kode_pp' },
            { data: 'tanggal' },
            { data: 'keterangan' },
            { data: 'komentar' },
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

    $('[data-toggle="popover"]').popover({ trigger: "focus" });
    // END LIST DATA

    $('#saku-datatable').on('click', '#btn-kembali', function(){
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
                    $('a[data-href="fRkmDash"]').addClass('active');
                    var url = "{{ url('rkap-auth/form')}}/fRkmMenu";
                    $('#trans-body').load(url);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // console.log('cancel');
                }
            }
        });
    });

    // HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('rkap-trans/aju') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
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
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            type:'hapus'
        });
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        $id_edit= $(this).closest('tr').find('td').eq(0).html();
        $edit = 1;
        $('.navbar-top a').removeClass('active');
        $('a[data-href="fRkmAju"]').addClass('active');
        var url = "{{ url('rkap-auth/form')}}/fRkmAju";
        $('#trans-body').load(url);
    });


    
    // PRINT
    function printPreview(id, from) {
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/aju-preview') }}",
            data:{no_bukti: id},
            dataType: 'json',
            async:false,
            success:function(result){ 
                backTo = from
                if(typeof result.data !== 'undefined' && result.data.length > 0) {
                    var html = "";
                    var no = 1;
                    var total = 0
                    var data = result.data[0]
                    html += `
                    <div class='row'>
                    <div class='col-12 text-center' style='border-bottom:3px solid black;'>
                    <h3>PENGAJUAN</h3>
                    <h6 id='kegiatan'>${data.no_bukti}</h6>
                    </div>    
                    <div class='col-12 my-3 text-center'>
                    <h6 id='tanggal-print'>Tanggal : ${data.tanggal.substr(0, 2)} ${getNamaBulan(data.tanggal.substr(3, 2))} ${data.tanggal.substr(6, 4)}</h6>     
                    </div>
                    <div class='col-12'>
                    <table class='table table-condensed table-bordered'>
                    <tbody>
                    <tr>
                    <td style='width: 5%;'>1</td>
                    <td style='width: 25%;'>UNIT KERJA</td>
                    <td>${data.nama_pp}</td>
                    </tr>
                    <tr>
                    <td style='width: 5%;'>3</td>
                    <td style='width: 25%;'>DESKRIPSI</td>
                    <td>${data.keterangan}</td>
                    </tr> 
                    <tr>
                    <td style='width: 5%;'>2</td>
                    <td style='width: 25%;'>KOMENTAR</td>
                    <td>${data.komentar}</td>
                    </tr>   
                    </tbody>
                    </table>
                    </div>
                    <div class='col-12'>
                    <h6 style='font-weight: bold; font-size: 13px;'># <u>DETAIL RKM</u></h6>  
                    <table class='table table-bordered table-condensed'>
                    <thead>
                    <tr>
                    <th class='text-center' style='width: 5%;'>No</th>    
                    <th class='text-center' style='width: 45%;'>Nama RKM</th> 
                    <th class='text-center' style='width: 50%;'>DAM</th> 
                    </tr>    
                    </thead>
                    <tbody>`
                    for(var i =0;i<result.data_detail.length;i++) {
                        var detail = result.data_detail[i]
                        html += `
                        <tr>
                        <td>${no}</td>
                        <td>${detail.nama}</td>
                        <td>${detail.dam}</td>
                        </tr>
                        `;
                        no++;
                    }
                    html += `
                    </tbody>    
                    </table>
                    </div>
                    <div class='col-12'>
                    <h6 style='font-weight: bold; font-size: 13px;'># <u>PENUTUP</u></h6>
                    <table class='table table-condensed table-bordered'>
                    <thead>
                    <th class='text-center' style='width: 10%;'></th>    
                    <th class='text-center' style='width: 25%;'>NAMA/NIK</th>    
                    <th class='text-center' style='width: 15%;'>JABATAN</th>    
                    <th class='text-center' style='width: 10%;'>TANGGAL</th>    
                    <th class='text-center' style='width: 15%;'>NO. APPROVAL</th>    
                    <th class='text-center' style='width: 10%;'>STATUS</th>    
                    <th class='text-center' style='width: 15%;'>TTD</th>        
                    </thead>
                    <tbody>`
                    for(var i=0;i<result.data_dokumen.length;i++) {
                        var dokumen = result.data_dokumen[i]
                        html += `
                        <tr>
                        <td>${dokumen.ket}</td>
                        <td>${dokumen.nama_kar}</td>
                        <td>${dokumen.nama_jab}</td>
                        <td>${dokumen.tanggal}</td>
                        <td>${dokumen.no_app}</td>
                        <td>${dokumen.status}</td>
                        <td>&nbsp;</td>
                        </tr>`
                    }
                    html += `</tbody>
                    </table>
                    </div>
                    </div>
                    `;
                    
                    $('#print-content').html(html)
                    $('#saku-datatable').hide()
                    $('#saku-print').show()
                }
            }
        });
    }
    
    $('#saku-datatable').on('click','#btn-print',function(e) {
        var id = $(this).closest('tr').find('td').eq(0).html();
        printPreview(id, 'table');
    });
    
    $('#saku-print #btn-back').click(function() {
        $('#saku-print').hide()
        $('#saku-datatable').show()
    });
    
    $('#saku-print #btn-cetak').click(function() {
        $('#print-content').printThis({
            importCSS: true,            // import parent page css
            importStyle: true,         // import style tags
            printContainer: true,       // print outer container/$.selector
        });
    });
    // END PRINT PREVIEW
    
    // HISTORY
    function historyPreview(id) {
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/aju-history') }}",
            dataType: 'json',
            data:{no_bukti: id},
            async:false,
            success:function(result) {
                var html = "";
                if(typeof result.data !== 'undefined' && result.data.length > 0) { 
                    var color = "";
                    for(var i=0;i<result.data.length;i++) {
                        var data = result.data[i]
                        if(data.color === 'green') {
                            color = '#00c292'
                        } else {
                            color = '#03a9f3'
                        }
                        
                        html += `
                        <div class="d-flex flex-row mb-3">
                            <a class="d-block position-relative" href="#">
                                <div style='padding-top: 2px; border: 1px solid ${color}; border-radius: 50%; background: ${color}; color: #ffffff; width: 50px; height:50px;text-align: center;'>
                                <i style='font-size: 25px;' class='iconsminds-file-clipboard-file---text'></i>
                                </div>
                            </a>
                            <div class="col-12 pl-3 pt-2 pr-2 pb-2">
                                <a href="#">
                                    <p class="list-item-heading"><a href='javascript:void(0)' class='link'>
                                    ${data.nama} <span class='sl-date'>${data.tanggal} (${data.status})</span>
                                    </a></p>
                                    <div class="pr-2 row">
                                        <div class='col-6'>No Bukti :</div>    
                                        <div class='col-6'>${data.no_bukti}</div>    
                                        <div class='col-6'>Catatan :</div>    
                                        <div class='col-6'>${data.keterangan}</div>  
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <hr />
                        `;
                    }
                } else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('rkap-auth/logout') }}";
                    })
                } else {
                    html += `
                    <div class='sl-item'>
                        <div class='sl-left'>
                            <div style='padding: 10px;border: 1px solid #959595;border-radius: 50%;background: #959595;color: #ffffff;width: 50px;text-align: center;'>
                                <i style='font-size: 25px;' class='simple-icon-envelope'></i> 
                            </div>
                        </div> 
                        <div class="sl-right">
                            Belum ada proses approval.
                            <br>
                            <br>
                        <div>   
                    </div>
                    `
                }
                
                $('#history-content').html(html)
                $('#saku-datatable').hide()
                $('#saku-history').show()

            }
        });
    }
    
    $('#saku-datatable').on('click','#btn-history',function(e) {
        var id = $(this).closest('tr').find('td').eq(0).html();
        historyPreview(id);
    });
    
    $('#saku-history #btn-aback').click(function() {
        $('#saku-history').hide()
        $('#saku-datatable').show()
    });
</script>