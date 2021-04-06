<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<style>
    .form-header {
        padding-top:1rem;
        padding-bottom:1rem;
    }
    .judul-form {
        margin-bottom:0;
        margin-top:5px;   
    }
</style>

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:25px">Upload Anggaran</h6>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tahun">Tahun</label>
                            <input type="text" placeholder="Tahun" class="form-control" id="tahun" name="tahun" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="status">Metode Input</label>
                            <select class="form-control" name="status">
                                <option value="NEW" selected>Baru</option>
                                <option value="UPDATE">Update</option>
                            </select>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-anggaran" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Anggaran</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                        <div class="tab-pane active" id="data-anggaran" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <div class='col-md-12 nav-control' style="padding: 3px 5px;">
                                <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                <span class="pemisah mx-2" style="border:1px solid #d7d7d7;font-size:20px"></span>
                                <div class="dropdown d-inline-block mx-0">
                                    <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload Anggaran <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href='#' id="download-template" >Download Template</a>
                                        <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 table-responsive' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:35%">Kode Akun</th>
                                            <th style="width:10%">Jan</th>
                                            <th style="width:10%">Feb</th>
                                            <th style="width:10%">Mar</th>
                                            <th style="width:10%">Apr</th>
                                            <th style="width:10%">Mei</th>
                                            <th style="width:10%">Jun</th>
                                            <th style="width:10%">Jul</th>
                                            <th style="width:10%">Agt</th>
                                            <th style="width:10%">Sep</th>
                                            <th style="width:10%">Okt</th>
                                            <th style="width:10%">Nov</th>
                                            <th style="width:10%">Des</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div>
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('modal_upload')

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    // setHeightForm();
    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);
    
    var scrollform = document.querySelector('.form-body');
    new PerfectScrollbar(scrollform);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#import-excel').click(function(e){
        $('.custom-file-input').val('');
        $('.custom-file-label').text('File upload');
        $('.pesan-upload .pesan-upload-judul').html('');
        $('.pesan-upload .pesan-upload-isi').html('')        
        $('.pesan-upload').hide();
        $('#modal-import').modal('show');
    });

</script>