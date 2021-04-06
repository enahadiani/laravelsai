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
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tanggal">Tanggal</label>
                            <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}" required>
                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_dok">No Dokumen</label>
                            <input type="text" placeholder="No Dokumen" class="form-control" id="no_dok" name="no_dok" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="total">Total Penyusutan</label>
                            <input type="text" placeholder="Total Penyusutan" class="form-control currency" id="total" name="total" value="0" readonly required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <button class="btn btn-primary btn-hitung" id="hitung">Hitung</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-penyusutan" role="tab" aria-selected="true"><span class="hidden-xs-down">Item Jurnal</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                        <div class="tab-pane active" id="data-tagihan" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:35%">Akun Biaya Penyusutan</th>
                                        <th style="width:35%">Akun Depresiasi</th>
                                        <th style="width:15%">Nilai</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="bottom-sheet-action">
                            <button type="button" id="btn-sheet" class="btn btn-sheet">Detail Penyusutan</button>
                        </div>
                        {{-- <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div> --}}
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('modal_search')

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    // setHeightForm();
    var scrollform = document.querySelector('.form-body');
    new PerfectScrollbar(scrollform);

    $('#judul-form').html('Form Penyusutan Reguler');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // Bottom sheet
    var bottomSheet = new BottomSheet("country-selector");
    $('#btn-sheet').on('click', function(event){
        event.preventDefault()
        bottomSheet.activate()
        addContentBottomSheet()
    })
    
    function addContentBottomSheet() {
        $('#content-bottom-sheet').empty()
        var html = "";
        html += "<div class='header-sheet'><h6>Detail Penyusutan</h6></div>"

        $('#content-bottom-sheet').append(html)
    }

</script>