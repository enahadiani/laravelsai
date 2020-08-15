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
                                                    <th>NIK Ver</th>
                                                    <th>No Kuitansi</th>
                                                    <th>No Terima</th>
                                                    <th>No Reg</th>
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
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px;padding:10px;font-size:12pt !important'>
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
            { data: 'nik_ver' },
            { data: 'no_kwitansi' },
            { data: 'no_tt' },
            { data: 'no_reg' }
        ]
    });

</script>