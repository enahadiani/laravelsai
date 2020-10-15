<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3">
    <div id='saiweb_container'>
        <div id='web_datatable'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card' style='border-top:none' >
                        <div class='card-body'>
                            <div class='row'>
                                <div class="col-md-6">
                                    <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> History Verifikasi Pembayaran
                                    </h4>
                                <hr style="margin-bottom:0px;margin-top:25px">
                                </div>
                                <div class='col-md-6'>
                                </div>
                                <div class='col-md-12'>
                                    <style>
                                    th,td{
                                        padding:8px !important;
                                        vertical-align:middle !important;
                                    }
                                    .hidden{
                                        display:none;
                                    }
                                    .form-group{
                                        margin-bottom:5px !important;
                                    }
                                    .form-control{
                                        font-size:13px !important;
                                        padding: .275rem .6rem !important;
                                    }
                                    .selectize-control, .selectize-dropdown{
                                        padding: 0 !important;
                                    }
                                    
                                    .modal-header .close {
                                        padding: 1rem;
                                        margin: -1rem 0 -1rem auto;
                                    }
                                    .check-item{
                                        cursor:pointer;
                                    }
                                    .selected{
                                        cursor:pointer;
                                        background:#4286f5 !important;
                                        color:white;
                                    }

                                    i.search-item2:hover{
                                        cursor: pointer;
                                        color: #4286f5;
                                    }

                                    i.search-item2{
                                        color: #4286f5;
                                    }

                                    th{
                                        vertical-align:middle !important;
                                    }

                                    #input-biaya .selectize-input, #input-biaya .form-control, #input-biaya .custom-file-label
                                    {
                                        border:0 !important;
                                        border-radius:0 !important;
                                    }
                                    #input-biaya td:hover
                                    {
                                        background:#f4d180 !important;
                                        color:white;
                                    }
                                    #input-biaya td
                                    {
                                        overflow:hidden !important;
                                    }

                                    #input-biaya thead, #table-his thead
                                    {
                                        background:#ff9500;color:white;
                                    }
                                    
                                    </style>
                                    <div class='sai-container-overflow-x'>
                                        <table class='table table-bordered table-striped DataTable' style='width: 100%;' id='table-finish'>
                                            <thead>
                                                <tr>
                                                    <th>No Verifikasi</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Jamaah</th>
                                                    <th>NIK Ver</th>
                                                    <th>No Kuitansi</th>
                                                    <th>No Terima</th>
                                                    <th>No Reg</th>
                                                    <th>No Jurnal</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PRINT PEMBAYARAN -->
        <div class="row" id="slide-print" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="display:none">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="margin-left: 6px;margin-top: 0" id="btnPreview"><i class="far fa-list-alt"></i> Preview</button>
                                <button type="button" id='btn-lanjut' class="btn btn-secondary" style="margin-left: 6px;margin-top: 0"><i class="fa fa-filter"></i> Filter</button>
                                <div id="pager" style='padding-top: 0px;position: absolute;top: 0;right: 0;'>
                                    <ul id="pagination" class="pagination pagination-sm2"></ul>
                                </div>
                            </div>
                            <div class='col-sm-1' style='padding-top: 0'>
                                <select name="show" id="show" class="form-control" style=''>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px;padding:10px;font-size:12pt !important'>
                            <div id='canvasPreview' style='font-size:12pt !important;'>
                            </div>
                            <div class="script">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- MODAL SEARCH AKUN-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL --> 
</div>
<script>
    $('#show').selectize();
    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }
    
    function format_number2(x){
        var num = parseFloat(x).toFixed(2);
        num = sepNum(num);
        return num;
    }

    
    function terbilang2(kode_curr){
        if(kode_curr == "IDR"){
            var ket_curr = " rupiah";
        }else if(kode_curr == "USD"){
            var ket_curr = " dollar Amerika";
        }
        return ket_curr;
    }
    
    var $iconLoad = $('.preloader');
    
    var $kurs_closing = 1;
    var $akunTambah = "-";
    var $akunDokumen = "-";


    var dataTable = $('#table-finish').DataTable({
        "ordering": true,
        "order": [[1, "desc"]],
        'ajax': {
            'url': "{{ url('dago-trans/verifikasi-histori') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                    return [];
                }  
            }
        },
        'columns': [
            { data: 'no_ver' },
            { data: 'tanggal' },
            { data: 'keterangan' },
            { data: 'nama' },
            { data: 'nik_ver' },
            { data: 'no_kwitansi' },
            { data: 'no_tt' },
            { data: 'no_reg' }
        ],
        "columnDefs": [
            {
                "targets": 5,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a href='#' title='Edit' class='lap-kuitansi' data-no_kwitansi='"+row.no_kwitansi+"'>"+row.no_kwitansi+"</a>";
                }
            },
            {
                "targets": 6,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a href='#' title='Edit' class='lap-terima' data-no_kwitansi='"+row.no_tt+"'>"+row.no_tt+"</a>";
                }
            },
            {
                "targets": 7,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a href='#' title='Edit' class='lap-reg' data-no_reg='"+row.no_reg+"'>"+row.no_reg+"</a>";
                }
            },
            {
                "targets": 8,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a href='#' title='Edit' class='lap-jurnal' data-no_bukti='"+row.no_kb+"'>"+row.no_kb+"</a>";
                }
            },
            {
                "targets": 9,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
                }
            }
        ]
    });

    var $formData = new FormData(); 
    $('#saiweb_container').on('click', '.lap-kuitansi', function(){
        // getset value
        $formData.forEach(function(val, key, fD){
            $formData.delete(key);
        });
        var kode = $(this).data('no_kwitansi');
        $formData.append("no_kwitansi[]", "=");
        $formData.append("no_kwitansi[]", kode);
        $formData.append("no_kwitansi[]", "");
        xurl = "{{ url('/dago-auth/form')}}/rptPbyrBaru";
        $('#print-area > .script').load(xurl);
        $('#slide-print').show();
        $('#web_datatable').hide();
    });  

    $('#saiweb_container').on('click', '.lap-terima', function(){
        
        $formData.forEach(function(val, key, fD){
            $formData.delete(key);
        });

        var kode = $(this).data('no_kwitansi');
        $formData.append("no_kwitansi[]", "=");
        $formData.append("no_kwitansi[]", kode);
        $formData.append("no_kwitansi[]", "");
        xurl = "{{ url('/dago-auth/form')}}/rptTerimaBaru";
        $('#print-area > .script').load(xurl);
        $('#slide-print').show();
        $('#web_datatable').hide();
    });  

    $('#saiweb_container').on('click', '.lap-reg', function(){
        
        $formData.forEach(function(val, key, fD){
            $formData.delete(key);
        });

        var kode = $(this).data('no_reg');
        $formData.append("no_reg[]", "=");
        $formData.append("no_reg[]", kode);
        $formData.append("no_reg[]", "");
        xurl = "{{ url('/dago-auth/form')}}/rptFormRegBaru";
        $('#print-area > .script').load(xurl);
        $('#slide-print').show();
        $('#web_datatable').hide();
    }); 

    $('#saiweb_container').on('click', '.lap-jurnal', function(){
        
        $formData.forEach(function(val, key, fD){
            $formData.delete(key);
        });

        var kode = $(this).data('no_bukti');
        $formData.append("no_bukti[]", "=");
        $formData.append("no_bukti[]", kode);
        $formData.append("no_bukti[]", "");
        xurl = "{{ url('/dago-auth/form')}}/rptJuPbyrBaru";
        $('#print-area > .script').load(xurl);
        $('#slide-print').show();
        $('#web_datatable').hide();
    });  

    $('#slide-print').on('click', '#btn-kembali', function(){
        $('#web_datatable').show();
        $('#slide-print').hide();
    });   

    $('#slide-print').on('click','#btn-print',function(e){
        e.preventDefault();
        $('#print-area').printThis();
    });
   
    $('#saiweb_container').on('click','#btn-delete',function(e){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var kode = $(this).closest('tr').find('td:eq(0)').html();     
                
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('dago-trans/verifikasi') }}",
                    dataType: 'json',
                    async:false,
                    data: {'no_bukti':kode},
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {       
                        if(jqXHR.status==422){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+jqXHR.responseText+'</a>'
                            })
                        }
                    }
                });
                
            }else{
                return false;
            }
        })
    });

</script>