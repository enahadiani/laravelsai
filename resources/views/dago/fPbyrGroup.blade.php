<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-size:16px">Data Pembayaran Group 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr style="margin-bottom:0px;margin-top:25px">
                        <div class="table-responsive ">
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

                            #table-reg .selectize-input, #table-reg .form-control, #table-reg .custom-file-label, #table-bdok .selectize-input, #table-bdok .form-control, #table-bdok .custom-file-label
                            {
                                border:0 !important;
                                border-radius:0 !important;
                            }
                            #table-reg td:hover,  #table-bdok td:hover
                            {
                                background:#f4d180 !important;
                                color:white;
                            }
                            #table-reg td, #table-bdok td
                            {
                                overflow:hidden !important;
                            }

                            #table-reg thead, #table-bdok thead
                            {
                                background:#ff9500;color:white;
                            }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tanggal</th>
                                        <th>Nama Agen</th>
                                        <th>Total</th>
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
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form" id="form-tambah">
                            <h4 class="card-title" style="font-size:16px">Form Pembayaran Group 
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr style="margin-bottom:0px;margin-top:25px">
                            <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                    <input class="form-control" type="hidden" id="no_bukti" name="no_bukti" required >
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="tgl_input" class="col-3 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" id="tgl_input" name="tgl_input" placeholder="dd-mm-yyyy" required value="{{ date('d-m-Y')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_akun" class="col-3 col-form-label">Rekening Kas Bank</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_akun" id="kode_akun" class="form-control" value="" >
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_akun" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agen" class="col-3 col-form-label">Agen</label>
                                <div class="input-group col-3">
                                    <input type='text' name="agen" id="agen" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_agen" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_curr" class="col-3 col-form-label">Currency</label>
                                <div class="col-3">
                                <input class="form-control" type="text" id="kode_curr" name="kode_curr" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kurs" class="col-3 col-form-label">Kurs</label>
                                <div class="col-3">
                                <input class="form-control currency " type="text" value="0" id="kurs" name="kurs">
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-filter" role="tab" aria-selected="true"><span class="hidden-xs-down">Filter</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-reg" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Registrasi</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="data-filter" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='height:300px;'>
                                        <div class="form-group row">
                                            <label for="deskripsi" class="col-3 col-form-label">Deskripsi</label>
                                            <div class="col-9">
                                            <input class="form-control" type="text" id="deskripsi" name="deskripsi">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="paket" class="col-3 col-form-label">Paket</label>
                                            <div class="input-group col-3">
                                                <input type='text' name="paket" id="paket" class="form-control" value="" required>
                                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_paket" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jadwal" class="col-3 col-form-label">Jadwal</label>
                                            <div class="input-group col-3">
                                                <input type='text' name="jadwal" id="jadwal" class="form-control" value="" required>
                                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_jadwal" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_peserta" class="col-3 col-form-label">No Jamaah</label>
                                            <div class="input-group col-3">
                                                <input type='text' name="no_peserta" id="no_peserta" class="form-control" value="" required>
                                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_no_peserta" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="data-reg" role="tabpanel">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="bayar-btn" data-toggle="tooltip" title="bayar" style='font-size:18px'><i class='fa fa-pencil-alt'></i></a>
                                    </div>
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px;overflow-x: auto;white-space: nowrap;'>
                                        <style>
                                        th,td{
                                            padding:8px !important;
                                            vertical-align:middle !important;
                                        }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="table-reg">
                                            <thead>
                                                <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">No Reg</th>
                                                <th width="20%">Jadwal</th>
                                                <th width="50%">Paket</th>
                                                <th width="20%">No Jamaah</th>
                                                <th width="50%">Nama</th>
                                                <th width="20%">Saldo Paket</th>
                                                <th width="20%">Saldo Tambahan</th>
                                                <th width="20%">Saldo Dokumen</th>
                                                <th width="20%">Bayar Paket</th>
                                                <th width="20%">Bayar Tambahan</th>
                                                <th width="20%">Bayar Dokumen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="dok" role="tabpanel" hidden>
                                    <table class="table table-striped table-bordered table-condensed mt-3" id="table-dok">
                                        <thead>
                                        <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Kode Dokumen</th>
                                        <th width="45%">Nama Dokumen</th>
                                        <th width="30%">Jenis</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
       
        <!-- PRINT FORM REG -->
        <div class="row" id="slide-print" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-reg-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-reg-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
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
    <!-- MODAL BAYAR DETAIL-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-bayar">
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
            <form id="form-bayar">
                <div class='modal-header'>
                    <div class='row' style='width:100%'>
                        <div class='col-9'>
                            <h5 class='modal-title' id='header_modal'></h5>
                        </div>
                        <div class='col-3 text-right'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary'>Simpan</button> 
                        </div>
                    </div>
                </div> 
                <div class="modal-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#detBiaya" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Biaya</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detKurs" role="tab" aria-selected="true"><span class="hidden-xs-down">Kalkulator Kurs</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border" style='margin-bottom:30px'>
                        <div class="tab-pane active" id="detBiaya" role="tabpanel">
                            <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                <style>
                                th,td{
                                    padding:8px !important;
                                    vertical-align:middle !important;
                                }
                                </style>
                                <table class="table table-striped table-bordered table-condensed" id="input-biaya">
                                    <thead>
                                        <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Kode</th>
                                        <th width="20%">Nama Biaya</th>
                                        <th width="10%">Nilai Tagihan</th>
                                        <th width="10%">Jumlah</th>
                                        <th width="15%">Terbayar</th>
                                        <th width="15%">Saldo</th>
                                        <th width="15%">Nilai Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="detKurs" role="tabpanel">
                            <div class="form-group row mt-2">
                                <label for="jenis_bayar" class="col-3 col-form-label">Bayar</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="jenis_bayar" name="jenis_bayar">
                                    <option value='' disabled>--- Pilih ---</option>
                                    <option value='PAKET'>PAKET</option>
                                    <option value='ROOM'>ROOM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="konversi" class="col-3 col-form-label">IDR --> USD</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text" value="0" id="konversi" name="konversi">
                                </div>
                                <div class="col-2">
                                    <a class="btn btn-info" id="konversi_btn" href="#">Konversi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- END MODAL --> 
    <script>
    function reverseDateNew(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
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

    var $iconLoad = $('.preloader');
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        // "ordering": true,
        // "order": [[0, "desc"]],
        // 'ajax': {
        //     'url': "{{ url('dago-trans/registrasi') }}",
        //     'async':false,
        //     'type': 'GET',
        //     'dataSrc' : function(json) {
        //         if(json.status){
        //             return json.daftar;   
        //         }else{
        //             Swal.fire({
        //                 title: 'Session telah habis',
        //                 text: 'harap login terlebih dahulu!',
        //                 icon: 'error'
        //             }).then(function() {
        //                 window.location.href = "{{ url('dago-auth/login') }}";
        //             })
        //             return [];
        //         }  
        //     }
        // },
        // 'columns': [
        //     { data: 'no_reg' },
        //     { data: 'no_peserta' },
        //     { data: 'nama' },
        //     { data: 'tgl_input' },
        //     { data: 'nama_paket' },
        //     { data: 'tgl_berangkat' },
        //     { data: 'action'}
        // ],
        // "columnDefs": [ {
        //     "targets": 6,
        //     "data": null,
        //     "render": function ( data, type, row, meta ) {
        //         if(row.flag_group == "1"){
        //             if("{{ Session::get('userLog') }}" == "U"){
        //                 return "<a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>&nbsp;<a href='#' title='Grouping Anggota' class='badge badge-primary' id='btn-group'><i class='fas fa-user-plus' style='color: white;'></i></a>";
        //             }else{
        //                 return "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>&nbsp; <a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>&nbsp;<a href='#' title='Grouping Anggota' class='badge badge-primary' id='btn-group'><i class='fas fa-user-plus' style='color: white;'></i></a>";
        //             }
        //         }else{
        //             if("{{ Session::get('userLog') }}" == "U"){
        //                 return "<a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>";
        //             }else{
        //                 return "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>&nbsp; <a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>";
        //             }
        //         }
        //     }
        // }]
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#form-tambah')[0].reset();
        $('#id').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('#form-tambah').on('click', '#bayar-btn', function(){
        
        $('#modal-bayar .modal-title').html('Form Detail Bayar');
        $('#modal-bayar').modal('show');

    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    </script>
    
