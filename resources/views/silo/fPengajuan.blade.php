    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_silo/css/trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Justifikasi Pengajuan" tambah="true" :thead="array('No Bukti', 'No Dokumen', 'Regional', 'Nilai Pengadaan', 'Nilai Finish', 'Aksi', 'Waktu', 'Kegiatan', 'Posisi')" :thwidth="array(15,25,20,10,10,25,5,5,5)" :thclass="array('','','','','','text-center','','','')" />
    <!-- END LIST DATA -->
    <!-- FORM  -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
        <input type="hidden" id="method" name="_method" value="post">
        <input type="hidden" id="id" name="id">
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="tanggal">Tanggal Pengajuan</label>
                                        <span class="span-tanggal" id="tanggal-aju"></span>
                                        <input class='form-control datepicker' id="tanggal" name="tanggal" autocomplete="off" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="waktu">Tanggal Kebutuhan</label>
                                        <span class="span-tanggal" id="tanggal-butuh"></span>
                                        <input class='form-control datepicker' id="waktu" name="waktu" autocomplete="off" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_pp">Regional</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" autocomplete="off" name="kode_pp" data-input="cbbl" value="" title="" required readonly>
                                            <span class="info-name_kode_pp hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_kota">Kota</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_kota" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_kota" id="kode_kota" name="kode_kota" autocomplete="off" data-input="cbbl" value="" title="" required readonly>
                                            <span class="info-name_kode_kota hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_kota"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="dokumen">No Dokumen</label>
                                        <input class="form-control" type="text" placeholder="No Dokumen" id="dokumen" name="no_dokumen" value="-" readonly autocomplete="off" required >
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kegiatan">Justifikasi Kebutuhan</label>
                                        <input class="form-control" type="text" placeholder="Justifikasi Kebutahan" id="kegiatan" name="kegiatan" autocomplete="off" required >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="dasar">Dasar/Latar Belakang</label>
                                        <input class="form-control" type="text" placeholder="Dasar/Latar Belakang" id="dasar" name="dasar" autocomplete="off" required >
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="pic">PIC</label>
                                        <input class="form-control" type="text" placeholder="PIC" id="pic" name="pic" autocomplete="off" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nik_ver">NIK Verifikasi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_nik_ver" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-nik_ver" id="nik_ver" name="nik_ver" autocomplete="off" data-input="cbbl" value="" title="" required readonly>
                                            <span class="info-name_nik_ver hidden">
                                                <span></span> 
                                            </span>
                                            {{-- <i class="simple-icon-close float-right info-icon-hapus hidden"></i> --}}
                                            {{-- <i class="simple-icon-magnifier search-item2" id="search_nik_ver"></i> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total">Total Barang</label>
                                        <input class="form-control currency" type="text" placeholder="Total Barang" id="total" name="total" autocomplete="off" value="0" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#data-barang" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Barang</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-dokumen-po" role="tab" aria-selected="false"><span class="hidden-xs-down">Data PO</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-dokumen-compare" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Dokumen Pembanding</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-approve" role="tab" aria-selected="false"><span class="hidden-xs-down">Catatan Approve</span></a></li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2rem;">
                            <div class="tab-pane active row" id="data-barang" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-barang" ></span></a>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed gridexample input-grid" id="input-barang" data-table="Tab data barang" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:3%;">No</th>
                                                <th style="width:25%;">Barang</th>
                                                <th style="width:30%;">Deskripsi</th>
                                                <th style="width:15%;">Harga</th>
                                                <th style="width:10%;">Qty</th>
                                                <th style="width:15%;">Subtotal</th>
                                                <th style="width:15%;">PPN</th>
                                                <th style="width:15%;">Grand Total</th>
                                                <th style="width:5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <a type="button" id="add-barang" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                            <div class="tab-pane row" id="data-dokumen-po" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-dokumen-po"></span></a>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed gridexample input-grid" id="input-dokumen-po" data-table="Tab data dokumen PO" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:3%;">No</th>
                                                <th style="width:25%;">Nama Dokumen</th>
                                                <th style="width:20%;">Nama File Upload</th>
                                                <th style="width:15%;">Upload File</th>
                                                <th style="width:5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <a type="button" id="add-dokumen-po" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                            <div class="tab-pane row" id="data-dokumen-compare" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-dokumen-compare" ></span></a>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed gridexample input-grid" id="input-dokumen-compare" data-table="Tab data dokumen pembanding" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:3%;">No</th>
                                                <th style="width:25%;">Nama Dokumen</th>
                                                <th style="width:20%;">Nama File Upload</th>
                                                <th style="width:15%;">Upload File</th>
                                                <th style="width:5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <a type="button" id="add-dokumen-compare" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                            <div class="tab-pane row" id="data-approve" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-approve" ></span></a>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed gridexample input-grid" id="input-approve" data-table="Tabel catatan approve" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:3%;">No</th>
                                                <th style="width:15%;">NIK</th>
                                                <th style="width:25%;">Nama</th>
                                                <th style="width:10%;">Status</th>
                                                <th style="width:30%;">Keterangan</th>
                                                <th style="width:5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <a type="button" id="add-approve" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
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
    <!-- END FORM -->

    {{-- PRINT PREVIEW --}}
    <div id="saku-print" class="row" style="display: none;">
        <div class="col-12">
            <div class="card" style="height: 100%;">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                    <button type="button" class="btn btn-secondary ml-2" id="btn-back" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                    <button type="button" class="btn btn-info ml-2" id="btn-cetak" style="float:right;"><i class="fa fa-print"></i> Print</button>
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
                    <button type="button" class="btn btn-secondary ml-2" id="btn-aback" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body profiletimeline" id="history-content">

                </div>
            </div>
        </div>
    </div>
    {{-- END HISTORY PREVIEW --}}

    <!-- MODAL FILTER -->
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row">
                            <label>No Bukti</label>
                            <select class="form-control" data-width="100%" name="inp-filter_bukti" id="inp-filter_bukti">
                                <option value=''>--- Pilih No Bukti ---</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Regional</label>
                            <select class="form-control" data-width="100%" name="inp-filter_regional" id="inp-filter_regional">
                                <option value=''>--- Pilih Regional ---</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('modal_search')
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
        // SET UP VIEW
        var scroll = document.querySelector('#content-preview');
        new PerfectScrollbar(scroll);

        var scrollform = document.querySelector('.form-body');
        new PerfectScrollbar(scrollform);
        // END SET UP VIEW
        // LIST DATA
        var actionHtmlWithED = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='simple-icon-reload' style='font-size:18px'></i></a>";
        var actionHtmlNoED = "<a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='simple-icon-reload' style='font-size:18px'></i></a>";
        var dataTable = generateTable(
            "table-data",
            "{{ url('apv/juskeb') }}", 
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
                {   
                    'targets': [3,4], 
                    'className': 'text-right',
                    'render': $.fn.dataTable.render.number( '.', ',', 0, '' )  
                },
                {
                    "targets": [6,7,8],
                    "visible": false
                },
                {'targets': 5 ,'className': 'text-center' }
            ],
            [
                { data: 'no_bukti' },
                { data: 'no_dokumen' },
                { data: 'nama_pp' },
                { data: 'nilai' },
                { data: 'nilai_finish' },
                { data: 'progress', render: function(data) {
                    if(data == 'A') {
                        return actionHtmlWithED
                    } else if(data == 'F') {
                        return actionHtmlWithED
                    }
                    return actionHtmlNoED
                } },
                { data: 'waktu' },
                { data: 'kegiatan' },
                { data: 'posisi' },
            ],
            "{{ url('silo-auth/sesi-habis') }}",
            [[5 ,"desc"]]
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

        // BTN TAMBAH
        $('#saku-datatable').on('click', '#btn-tambah', function() {
            var regional = "{{ Session::get('kodePP') }}";
            $('#input-barang tbody').empty();
            $('#input-dokumen-po tbody').empty();
            $('#input-dokumen-compare tbody').empty();
            $('#input-approve tbody').empty();
            $('#judul-form').html('Tambah Data Justifikasi Kebutuhan');
            $('#kode').attr('readonly', false);
            addRowBarangDefault();
            addRowDokumenPODefault()
            for(var i=0;i<3;i++) {                
                addRowDokumenCompareDefault()
            }
            newForm();
            setRegional('kode_pp', regional)
            setNik(regional, 'nik_ver', null, 'add')
        });
        //  END BTN TAMBAH

        // BTN KEMBALI
        $('#saku-form').on('click', '#btn-kembali', function(){
            var kode = null;
            msgDialog({
                id:kode,
                type:'keluar'
            });
        }); 
        // END BTN KEMBALI
        
        // OPTIONAL CONFIG
        var selectRegional = $('#inp-filter_regional').selectize();
        var selectBukti = $('#inp-filter_bukti').selectize();
        var $dtKlpBarang = [];
        var valid = true;

        (function() {
            $.ajax({
                type: 'GET',
                url: "{{ url('silo-trans/filter-klp') }}",
                dataType: 'json',
                async:false,
                success:function(res) {
                    var result = res;    
                    if(result.status) {
                        for(i=0;i<result.daftar.length;i++){
                            $dtKlpBarang[i] = {id:result.daftar[i].kode_barang,name:result.daftar[i].nama};  
                        }
                    }else if(!result.status && result.message == "Unauthorized"){
                        window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                    } else{
                        alert(result.message);
                    }
                }
            });
        })();

        (function() {
            $.ajax({
                type: 'GET',
                url: "{{ url('apv/unit') }}",
                dataType: 'json',
                async:false,
                success:function(result){
                    if(result.status){
                        var select = selectRegional[0];
                        var control = select.selectize;
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(i=0;i<result.daftar.length;i++){
                                control.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].nama}]);
                            }
                        }
                    }
                }
            });
        })();

        (function() {
            $.ajax({
                type: 'GET',
                url: "{{ url('apv/juskeb') }}",
                dataType: 'json',
                async:false,
                success:function(result) {
                    if(result.status){
                        var select = selectBukti[0];
                        var control = select.selectize;
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(i=0;i<result.daftar.length;i++){
                                control.addOption([{text:result.daftar[i].no_bukti + ' - ' + result.daftar[i].no_bukti, value:result.daftar[i].no_bukti}]);
                            }
                        }
                    }
                }
            });
        })();

        function setRegional(kode_cbbl, value){
            $.ajax({
                type: 'GET',
                url: "{{ url('apv/unit') }}/" + value,
                dataType: 'json',
                async:false,
                success:function(res) {
                    var result = res.data;
                    if(result.status){
                        if(typeof result.data !== 'undefined' && result.data.length > 0){
                            var data = result.data;
                            showInfoField(kode_cbbl, data[0].kode_pp, data[0].nama)
                        }
                    }
                }
            });
        }

        function setKota(regional = null, kode_cbbl, kode){
            $.ajax({
                type: 'GET',
                url: "{{ url('apv/kota') }}",
                dataType: 'json',
                data:{'kode_pp': regional},
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){
                        if(typeof result.data !== 'undefined' && result.data.length>0){
                            var data = result.data;
                            var filter = data.filter(data => data.kode_kota == kode);
                            if(filter.length > 0) {
                                showInfoField(kode_cbbl, filter[0].kode_kota, filter[0].nama)
                            }
                        }
                    }
                }
            });
        }

        function setNik(regional = null, kode_cbbl, kode, mode=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('apv/nik_verifikasi') }}",
                data:{'kode_pp': regional},
                dataType: 'json',
                async:false,
                success:function(res){
                    var result = res.data;
                    if(result.status){
                        if(typeof result.data !== 'undefined' && result.data.length>0) {
                            if(mode === 'add') {
                                var data = result.data;
                                var filter = data.filter(data => data.nik == result.nik_ver);
                                if(filter.length > 0) {
                                    showInfoField(kode_cbbl, filter[0].nik, filter[0].nama)
                                }
                            } else {
                                var data = result.data;
                                var filter = data.filter(data => data.nik == kode);
                                if(filter.length > 0) {
                                    showInfoField(kode_cbbl, filter[0].nik, filter[0].nama)
                                }
                            }
                        }
                    }
                }
            });
        }

        function generateDok(tanggal,kode_pp,kode_kota){
            $.ajax({
                type: 'GET',
                url: "{{ url('silo-trans/generate-dok') }}",
                dataType: 'json',
                data:{'tanggal':tanggal,'kode_pp':kode_pp,'kode_kota':kode_kota},
                async:false,
                success:function(res){
                    $('#dokumen').val(res.no_dokumen);
                }
            });
        }

        function setBarang(kode) {
            var filter = $dtKlpBarang.filter(data => data.id === kode)
            return filter[0]
        }

        function openFilter() {
            var element = $('#mySidepanel');
                
            var x = $('#mySidepanel').attr('class');
            var y = x.split(' ');
            if(y[1] == 'close'){
                element.removeClass('close');
                element.addClass('open');
            }else{
                element.removeClass('open');
                element.addClass('close');
            }
        }
        
        $('.sidepanel').on('click', '#btnClose', function(e){
            e.preventDefault();
            openFilter();
        });

        $('[data-toggle="tooltip"]').tooltip();

        function grandTotalBarang() {
            var total = 0;
            var tr = $('#input-barang tbody').children('tr')
            tr.find('td').each(function(index, td) {
                var grandElement = $(td).find('.text-grand').text()
                var grand = toNilai(grandElement)
                total = total + grand
            })
            $('#total').val(total)
        }

        $('#tanggal').bootstrapDP({
            autoclose: true,
            format: 'dd/mm/yyyy',
            container: '#tanggal-aju',
            templates: {
                leftArrow: '<i class="simple-icon-arrow-left"></i>',
                rightArrow: '<i class="simple-icon-arrow-right"></i>'
            },
            orientation: 'bottom left'
        })

        $('#waktu').bootstrapDP({
            autoclose: true,
            format: 'dd/mm/yyyy',
            container: '#tanggal-butuh',
            templates: {
                leftArrow: '<i class="simple-icon-arrow-left"></i>',
                rightArrow: '<i class="simple-icon-arrow-right"></i>'
            },
            orientation: 'bottom left'
        })
        // END OPTIONAL CONFIG

        // CBBL FORM
        $('#form-tambah').on('click', '.search-item2', function(){
            var id = $(this).closest('div').find('input').attr('name');
            var regional = "{{ Session::get('kodePP') }}"

            switch(id) {
                case 'kode_pp': 
                    var settings = {
                        id : id,
                        header : ['Kode', 'Nama'],
                        url : "{{ url('silo-master/filter-pp-one') }}/"+regional,
                        columns : [
                            { data: 'kode_pp' },
                            { data: 'nama' }
                        ],
                        judul : "Daftar Regional",
                        pilih : "",
                        jTarget1 : "text",
                        jTarget2 : "text",
                        target1 : ".info-code_"+id,
                        target2 : ".info-name_"+id,
                        target3 : "",
                        target4 : "",
                        width : ["30%","70%"],
                    }
                break;
                case 'kode_kota': 
                    var settings = {
                        id : id,
                        header : ['Kode', 'Nama'],
                        url : "{{ url('silo-master/filter-kota') }}",
                        columns : [
                            { data: 'kode_kota' },
                            { data: 'nama' }
                        ],
                        parameter: {
                            kode_pp: regional
                        },
                        judul : "Daftar Kota",
                        pilih : "",
                        jTarget1 : "text",
                        jTarget2 : "text",
                        target1 : ".info-code_"+id,
                        target2 : ".info-name_"+id,
                        target3 : "",
                        target4 : "custom",
                        width : ["30%","70%"],
                    }
                break;
                case 'nik_ver': 
                    var settings = {
                        id : id,
                        header : ['Kode', 'Nama'],
                        url : "{{ url('silo-trans/filter-nik') }}",
                        columns : [
                            { data: 'nik' },
                            { data: 'nama' }
                        ],
                        parameter: {
                            kode_pp: regional
                        },
                        judul : "Daftar NIK",
                        pilih : "",
                        jTarget1 : "text",
                        jTarget2 : "text",
                        target1 : ".info-code_"+id,
                        target2 : ".info-name_"+id,
                        target3 : "",
                        target4 : "",
                        width : ["30%","70%"],
                    }
                break;
                default:
                break;
            }
                showInpFilter(settings);
        });

        $('.info-icon-hapus').click(function(){
            var par = $(this).closest('div').find('input').attr('name');
            $('#'+par).val('');
            $('#'+par).attr('readonly',false);
            $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
            $('.info-code_'+par).parent('div').addClass('hidden');
            $('.info-name_'+par).addClass('hidden');
            $(this).addClass('hidden');
        });
        // END CBBL FORM

        // GRID FORM
        $(document).on('click', function() {
            hideAllSelectedRow()
            grandTotalBarang()
        })

        function hideAllSelectedRow() {
            $('table[id^=input]').each(function(index, table) {
                $(table).children('tbody').each(function(index, tbody) {
                    $(tbody).children('tr').each(function(index, tr) {
                        $(tr).children('td').not(':first, :last').each(function(index, td) {
                            var value = $(td).children('input').not("input[type='hidden'], input[type='file']").val()
                            $(td).children('input').not("input[type='hidden'], input[type='file']").val(value)
                            $(td).children('span').not('.not-show').text(value)
                            $(td).children('input').not("input[type='hidden'], input[type='file']").hide()
                            $(td).children('a').not('.hapus-item, .download-item').hide()
                            $(td).children('span').not('.not-show').show()
                        })
                    })
                })
                $(table).find('tr').removeClass('selected-row')
                $(table).find('td').removeClass('selected-cell')
                $(table).find('input').not("input[type='hidden'], input[type='file']").hide()
                $(table).find('a').not('.hapus-item, .download-item').hide()
                $(table).find('span').not('.not-show').show()
            })
        }

        function hideUnselectedRow(tbody) {
            tbody.find('tr').not('.selected-row').each(function(index, tr) {
                $(tr).find('td').not(':first, :last').each(function(index, td) {
                    var value = $(td).children('input').not("input[type='hidden']").val()
                    $(td).children('input').not("input[type='hidden'], input[type='file']").val(value)
                    $(td).children('span').not('.not-show').text(value)
                    $(td).children('input').not("input[type='hidden'], input[type='file']").hide()
                    $(td).children('a').not('.hapus-item, .download-item').hide()
                    $(td).children('span').not('.not-show').show()
                })
            }) 
        }

        function hideUnselectedCell(tr) {
            tr.find('td').not(':first, :last, .readonly').each(function(index, td) {
                var value = $(td).children('input').not("input[type='hidden'], input[type='file']").val()
                $(td).children('input').not("input[type='hidden'], input[type='file']").val(value)
                $(td).children('span').not('.not-show').text(value)
                if($(td).hasClass('selected-cell')) {
                    $(td).children('span').hide()
                    $(td).children('input').not("input[type='hidden'], input[type='file']").show()
                    $(td).children('a').not('.hapus-item, .download-item').show()
                    setTimeout(function() {
                        $(td).children('input').not("input[type='hidden'], input[type='file']").focus()
                    }, 500)
                } else {
                    $(td).children('input').not("input[type='hidden'], input[type='file']").hide()
                    $(td).children('a').not('.hapus-item, .download-item').hide()
                    $(td).children('span').not('.not-show').show()
                }
            }) 
        }

        function nextSelectedCell(tr, td, index) {
            var value = $(td).children('input').val()
            $(td).children('input').not("input[type='hidden']").val(value)
            $(td).children('span').not('.not-show').text(value)
            $(td).children('span').not('.not-show').show()
            $(td).children('input').hide()
            $(td).children('a').not('.hapus-item').hide()

            var nextindex = index + 1; 
            var tdnext = $(tr).find('td').eq(nextindex)
            var cekReadonly = $(tdnext).hasClass('readonly')
            if(cekReadonly) {
                nextindex = nextindex + 1
                tdnext = $(tr).find('td').eq(nextindex)
            }
            var cekCbbl = $(tdnext).has('a').length
            if(cekCbbl > 0) {
                $(tdnext).children('a').show()
            }

            $(tdnext).children('span').hide()
            $(tdnext).children('input').not("input[type='hidden']").show()
            setTimeout(function() {
                $(tdnext).children('input').not("input[type='hidden']").focus()
            }, 500)
        }

        function custTarget(target, tr) {
            if($(target).hasClass('input-group-text')) {
                var key = target.split('-')
                if(key[1] === 'code_kode_kota') {
                    var tanggal = $('#tanggal').val()
                    var kode_pp = $('#kode_pp').val()
                    var kode_kota = $('#kode_kota').val()
                    generateDok(tanggal, kode_pp, kode_kota)
                }
            } else {
                var trTable = $('#'+target).closest('tr')
                var tdindex = $('#'+target).index()
                var totaltd = $(tr).children('td').not(':first, :last').length - 1
                var key = target.split('__');
                var kode = tr.find('td:nth-child(1)').text();
                var nama = tr.find('td:nth-child(2)').text();
                if(key[0] === 'barang-ke') {
                    $('#'+target).find('#value-'+target).val(kode)
                    $('#'+target).find('#kode-'+target).val(nama)
                    $('#'+target).find('#text-'+target).text(nama)
                    $('#'+target).find('#kode-'+target).hide()
                    $('#'+target).find('.search-item').hide()
                    $('#'+target).find('#text-'+target).show(kode)
                } 

                setTimeout(function() {
                    nextSelectedCell(trTable, target, tdindex)   
                }, 400)
            }
        }
            // GRID BARANG
        function hitungTotalRowBarang(){
            var total_row = $('#input-barang tbody tr').length;
            $('#total-barang').html(total_row+' Baris');
        }

        function addRowBarangDefault() {
            var no= $('#input-barang tbody > tr').length;
            no = no + 1;
            var idBarang = 'barang-ke__'+no
            var idDesk = 'deskripsi-ke__'+no
            var idHarga = 'harga-ke__'+no
            var idQty = 'qty-ke__'+no
            var idSubtotal = 'subtotal-ke__'+no
            var idPPN = 'ppn-ke__'+no
            var idTotal = 'total-ke__'+no
            var html = "";
            html += `
                <tr class='row-grid'>
                    <td class='no-grid text-center'>${no}</td>
                    <td id='${idBarang}'>
                        <span id='text-${idBarang}' class='tooltip-span'></span>
                        <input type='hidden' name='barang_klp[]' id='value-${idBarang}' readonly>
                        <input autocomplete='off' type='text' name='kelompok[]' class='form-control hidden' value='' style='z-index: 1;position: relative;' id='kode-${idBarang}' readonly>
                        <a href='#' class='search-item hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>
                    </td>
                    <td id='${idDesk}'>
                        <span id='text-${idDesk}' class='tooltip-span'></span>
                        <input autocomplete='off' id='value-${idDesk}' type='text' name='barang[]' class='form-control hidden' value=''>
                    </td>
                    <td id='${idHarga}' class='text-right'>
                        <span id='text-${idHarga}' class='tooltip-span'>0</span>
                        <input autocomplete='off' id='value-${idHarga}' type='text' name='harga[]' class='form-control currency hidden inp-harga' value='0'>
                    </td>
                    <td id='${idQty}' class='text-right'>
                        <span id='text-${idQty}' class='tooltip-span'>0</span>
                        <input autocomplete='off' id='value-${idQty}' type='text' name='qty[]' class='form-control currency hidden inp-qty' value='0'>
                    </td>
                    <td id='${idSubtotal}' class='text-right readonly'>
                        <span id='text-${idSubtotal}' class='tooltip-span text-sub'>0</span>
                        <input autocomplete='off' id='value-${idSubtotal}' type='text' name='nilai[]' class='form-control currency hidden inp-sub' value='0'>
                    </td>
                    <td id='${idPPN}' class='text-right'>
                        <span id='text-${idPPN}' class='tooltip-span'>0</span>
                        <input autocomplete='off' id='value-${idPPN}' type='text' name='ppn[]' class='form-control currency hidden inp-ppn' value='0'>
                    </td>
                    <td id='${idTotal}' class='text-right readonly'>
                        <span id='text-${idTotal}' class='tooltip-span text-grand'>0</span>
                        <input autocomplete='off' id='value-${idTotal}' type='text' name='grand_total[]' class='form-control currency hidden inp-grand' value='0'>
                    </td>
                    <td class='text-center'>
                        <a class='hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                    </td>
                </tr>
            `;
            $('#input-barang tbody').append(html)
           
            $('.currency').inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                oncleared: function () { return false; }
            });

            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });
            hitungTotalRowBarang()
        }

        function addRowBarang() {
            var no= $('#input-barang tbody > tr').length;
            no = no + 1;
            var idBarang = 'barang-ke__'+no
            var idDesk = 'deskripsi-ke__'+no
            var idHarga = 'harga-ke__'+no
            var idQty = 'qty-ke__'+no
            var idSubtotal = 'subtotal-ke__'+no
            var idPPN = 'ppn-ke__'+no
            var idTotal = 'total-ke__'+no
            var html = "";
            html += `
                <tr class='row-grid'>
                    <td class='no-grid text-center'>${no}</td>
                    <td id='${idBarang}'>
                        <span id='text-${idBarang}' class='tooltip-span'></span>
                        <input type='hidden' name='barang_klp[]' id='value-${idBarang}' readonly>
                        <input autocomplete='off' type='text' name='kelompok[]' class='form-control hidden' value='' style='z-index: 1;position: relative;' id='kode-${idBarang}' readonly>
                        <a href='#' class='search-item hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>
                    </td>
                    <td id='${idDesk}'>
                        <span id='text-${idDesk}' class='tooltip-span'></span>
                        <input autocomplete='off' id='value-${idDesk}' type='text' name='barang[]' class='form-control hidden' value=''>
                    </td>
                    <td id='${idHarga}' class='text-right'>
                        <span id='text-${idHarga}' class='tooltip-span'>0</span>
                        <input autocomplete='off' id='value-${idHarga}' type='text' name='harga[]' class='form-control currency hidden inp-harga' value='0'>
                    </td>
                    <td id='${idQty}' class='text-right'>
                        <span id='text-${idQty}' class='tooltip-span'>0</span>
                        <input autocomplete='off' id='value-${idQty}' type='text' name='qty[]' class='form-control currency hidden inp-qty' value='0'>
                    </td>
                    <td id='${idSubtotal}' class='text-right readonly'>
                        <span id='text-${idSubtotal}' class='tooltip-span text-sub'>0</span>
                        <input autocomplete='off' id='value-${idSubtotal}' type='text' name='nilai[]' class='form-control currency hidden inp-sub' value='0'>
                    </td>
                    <td id='${idPPN}' class='text-right'>
                        <span id='text-${idPPN}' class='tooltip-span'>0</span>
                        <input autocomplete='off' id='value-${idPPN}' type='text' name='ppn[]' class='form-control currency hidden inp-ppn' value='0'>
                    </td>
                    <td id='${idTotal}' class='text-right readonly'>
                        <span id='text-${idTotal}' class='tooltip-span text-grand'>0</span>
                        <input autocomplete='off' id='value-${idTotal}' type='text' name='grand_total[]' class='form-control currency hidden inp-grand' value='0'>
                    </td>
                    <td class='text-center'>
                        <a class='hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                    </td>
                </tr>
            `;
            $('#input-barang tbody').append(html)
            $('#input-barang tbody tr').not(':last').removeClass('selected-row');
            $('.row-grid:last').addClass('selected-row');

            $('.currency').inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                oncleared: function () { return false; }
            });
            
            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });
            hitungTotalRowBarang()
        }

        $('#add-barang').click(function() {
            var row = $('#input-barang tbody tr').length
            if(row > 0) {
                var empty = false;
                var kolom = null;
                var baris = null;
                var error = '';
                $('#input-barang tbody tr').each(function() {
                    baris = $(this).index() + 1
                    $(this).find('td').not(':first, :last').each(function() {
                        if($(this).text().trim() === '') {
                            empty = true;
                            kolom = $('#input-barang thead > tr th').eq($(this).index()).text()
                            error = `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong`
                            return false;
                        }
                    })
                })
                if(empty) {
                    alert(error)
                } else {
                    addRowBarang()
                }
            } else {
                addRowBarang()
            }
        })

        $('#input-barang tbody').on('click', '.hapus-item', function() {
            $(this).closest('tr').remove();
            no=1;
            $('#input-barang tbody').children('.row-grid').each(function(){
                var nom = $(this).closest('tr').find('.no-grid');
                nom.html(no);
                no++;
            });
            hitungTotalRowBarang();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });

        $('#input-barang tbody').on('click', 'td', function(event) {
            event.stopPropagation();
            var tr = $(this).parent()
            var tbody = $(tr).parent()
            $(tr).addClass('selected-row')
            $(this).addClass('selected-cell');
            tr.children().not(this).removeClass('selected-cell');
            tbody.children().not($(tr)).removeClass('selected-row')
            hideUnselectedCell(tr);
            hideUnselectedRow(tbody)
        });

        $('#input-barang tbody').on('keydown', 'input', function(event) {
            event.stopPropagation();
            var tr = $(this).closest('tr')
            var td = $(this).parent()
            var tdindex = $(this).parent().index()
            var code = event.keyCode
            var totaltd = $(tr).children('td').not(':first, :last').length - 1
            if(code === 9) {
                $(td).removeClass('selected-cell')
                if(tdindex === totaltd) {
                    $('#add-barang').click()
                } else {
                    nextSelectedCell(tr, td, tdindex)
                }
            } 
        });
            
        $('#input-barang tbody').on('change blur', '.currency', function() {
            var td = $(this).parent('td');
            var tr = $(td).parent('tr')
            var hrg = $(tr).children('td').find('.inp-harga').val()
            var qty = $(tr).children('td').find('.inp-qty').val()
            var ppn = $(tr).children('td').find('.inp-ppn').val()
            var sub = toNilai(hrg) * toNilai(qty)
            var nppn = toNilai(ppn)/100
            var grand = sub + (nppn * sub)
            $(tr).children('td').find('.inp-sub').val(sub)
            $(tr).children('td').find('.text-sub').text(format_number(sub))
            $(tr).children('td').find('.inp-grand').val(grand)
            $(tr).children('td').find('.text-grand').text(format_number(grand))
        })
            // END GRID BARANG
            
            // GRID DOKUMEN PO
        function hitungTotalRowDokumenPO(){
            var total_row = $('#input-dokumen-po tbody tr').length;
            $('#total-dokumen-po').html(total_row+' Baris');
        }

        function addRowDokumenPODefault() {
            var no= $('#input-dokumen-po tbody > tr').length;
            no = no + 1;
            var idDokumen = 'dokumenpo-ke__'+no
            var idFile = 'filepo-ke__'+no
            var idUpload = 'uploadpo-ke__'+no
            var html = "";
            html += `
                <tr class='row-grid'>
                    <td class='no-grid text-center'>${no}<input type='hidden' value='PO' name='jenis_dok[]'></td>
                    <td id='${idDokumen}'>
                        <span id='text-${idDokumen}' class='tooltip-span'></span>
                        <input autocomplete='off' id='value-${idDokumen}' type='text' name='nama_file[]' class='form-control hidden' value=''>
                    </td>
                    <td id='${idFile}' class='readonly'>
                        <span id='text-${idFile}' class='tooltip-span'>-</span>
                        <input autocomplete='off' id='value-${idFile}' type='text' name='nama_dok[]' class='form-control hidden' value='-' readonly>
                    </td>
                    <td id='${idUpload}'>
                        <span class='hidden not-show' id='text-${idUpload}'></span>
                        <input id='value-${idUpload}' type='file' name='file_dok[]'>
                    </td>
                    <td class='text-center'>
                        <a class='hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                    </td>
                </tr>
            `;
            $('#input-dokumen-po tbody').append(html)
            
            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });
            hitungTotalRowDokumenPO()
        }

        function addRowDokumenPO() {
            var no= $('#input-dokumen-po tbody > tr').length;
            no = no + 1;
            var idDokumen = 'dokumenpo-ke__'+no
            var idFile = 'filepo-ke__'+no
            var idUpload = 'uploadpo-ke__'+no
            var html = "";
            html += `
                <tr class='row-grid'>
                    <td class='no-grid text-center'>${no}<input type='hidden' value='PO' name='jenis_dok[]'></td>
                    <td id='${idDokumen}'>
                        <span id='text-${idDokumen}' class='tooltip-span'></span>
                        <input autocomplete='off' id='value-${idDokumen}' type='text' name='nama_file[]' class='form-control hidden' value=''>
                    </td>
                    <td id='${idFile}' class='readonly'>
                        <span id='text-${idFile}' class='tooltip-span'>-</span>
                        <input autocomplete='off' id='value-${idFile}' type='text' name='nama_dok[]' class='form-control hidden' value='-' readonly>
                    </td>
                    <td id='${idUpload}'>
                        <span class='hidden not-show' id='text-${idUpload}'></span>
                        <input id='value-${idUpload}' type='file' name='file_dok[]'>
                    </td>
                    <td class='text-center'>
                        <a class='hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                    </td>
                </tr>
            `;
            $('#input-dokumen-po tbody').append(html)
            $('#input-dokumen-po tbody tr').not(':last').removeClass('selected-row');
            $('.row-grid:last').addClass('selected-row');
            
            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });
            hitungTotalRowDokumenPO()
        }

        $('#input-dokumen-po tbody').on('click', '.hapus-item', function() {
            $(this).closest('tr').remove();
            no=1;
            $('#input-dokumen-po tbody').children('.row-grid').each(function(){
                var nom = $(this).closest('tr').find('.no-grid');
                nom.html(no);
                no++;
            });
            hitungTotalRowDokumenPO();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });

        $('#add-dokumen-po').click(function() {
            var row = $('#input-dokumen-po tbody > tr').length
            if(row > 0) {
                var empty = false;
                var kolom = null;
                var baris = null;
                var error = '';
                $('#input-dokumen-po tbody tr').each(function() {
                    baris = $(this).index() + 1
                    $(this).find('td').not(':first, :last, :eq(2)').each(function() {
                        if($(this).text().trim() === '') {
                            empty = true;
                            kolom = $('#input-dokumen-po thead > tr th').eq($(this).index()).text()
                            error = `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong`
                            return false;
                        }
                    })
                })
                if(empty) {
                    alert(error)
                } else {
                    addRowDokumenPO()
                }
            } else {
                addRowDokumenPO()
            }
        })

        $('#input-dokumen-po tbody').on('click', 'td', function(event) {
            event.stopPropagation();
             var tr = $(this).parent()
            var tbody = $(tr).parent()
            $(tr).addClass('selected-row')
            $(this).addClass('selected-cell');
            tr.children().not(this).removeClass('selected-cell');
            tbody.children().not($(tr)).removeClass('selected-row')
            hideUnselectedCell(tr);
            hideUnselectedRow(tbody)
        });

        $('#input-dokumen-po tbody').on('change', 'input[type="file"]', function() {
            var td = $(this).parent()
            var id = $(td).attr('id')
            var file = $(this).val().replace(/C:\\fakepath\\/i, '')
            $(td).children('#text-'+id).text(file)
        })
            //END GRID DOKUMEN PO

        // GRID DOKUMEN COMPARE
        function hitungTotalRowDokumenCompare(){
            var total_row = $('#input-dokumen-compare tbody tr').length;
            $('#total-dokumen-compare').html(total_row+' Baris');
        }

        function addRowDokumenCompareDefault() {
            var no= $('#input-dokumen-compare tbody > tr').length;
            no = no + 1;
            var idDokumen = 'dokumencp-ke__'+no
            var idFile = 'filecp-ke__'+no
            var idUpload = 'uploadcp-ke__'+no
            var html = "";
            html += `
                <tr class='row-grid'>
                    <td class='no-grid text-center'>${no}<input type='hidden' value='PBD' name='jenis_dok[]'></td>
                    <td id='${idDokumen}'>
                        <span id='text-${idDokumen}' class='tooltip-span'></span>
                        <input autocomplete='off' id='value-${idDokumen}' type='text' name='nama_file[]' class='form-control hidden' value=''>
                    </td>
                    <td id='${idFile}' class='readonly'>
                        <span id='text-${idFile}' class='tooltip-span'>-</span>
                        <input autocomplete='off' id='value-${idFile}' type='text' name='nama_dok[]' class='form-control hidden' value='-' readonly>
                    </td>
                    <td id='${idUpload}'>
                        <span class='hidden not-show' id='text-${idUpload}'></span>
                        <input id='value-${idUpload}' type='file' name='file_dok[]'>
                    </td>
                    <td class='text-center'>
                        <a class='hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                    </td>
                </tr>
            `;
            $('#input-dokumen-compare tbody').append(html)
            
            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });
            hitungTotalRowDokumenPO()
        }

        function addRowDokumenCompare() {
            var no= $('#input-dokumen-compare tbody > tr').length;
            no = no + 1;
            var idDokumen = 'dokumencp-ke__'+no
            var idFile = 'filecp-ke__'+no
            var idUpload = 'uploadcp-ke__'+no
            var html = "";
            html += `
                <tr class='row-grid'>
                    <td class='no-grid text-center'>${no}<input type='hidden' value='PBD' name='jenis_dok[]'></td>
                    <td id='${idDokumen}'>
                        <span id='text-${idDokumen}' class='tooltip-span'></span>
                        <input autocomplete='off' id='value-${idDokumen}' type='text' name='nama_file[]' class='form-control hidden' value=''>
                    </td>
                    <td id='${idFile}' class='readonly'>
                        <span id='text-${idFile}' class='tooltip-span'>-</span>
                        <input autocomplete='off' id='value-${idFile}' type='text' name='nama_dok[]' class='form-control hidden' value='-' readonly>
                    </td>
                    <td id='${idUpload}'>
                        <span class='hidden not-show' id='text-${idUpload}'></span>
                        <input id='value-${idUpload}' type='file' name='file_dok[]'>
                    </td>
                    <td class='text-center'>
                        <a class='hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                    </td>
                </tr>
            `;
            $('#input-dokumen-compare tbody').append(html)
            $('#input-dokumen-compare tbody tr').not(':last').removeClass('selected-row');
            $('.row-grid:last').addClass('selected-row');
            
            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });
            hitungTotalRowDokumenCompare()
        }

        $('#input-dokumen-compare tbody').on('click', '.hapus-item', function() {
            $(this).closest('tr').remove();
            no=1;
            $('#input-dokumen-compare tbody').children('.row-grid').each(function(){
                var nom = $(this).closest('tr').find('.no-grid');
                nom.html(no);
                no++;
            });
            hitungTotalRowDokumenCompare();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });

        $('#add-dokumen-compare').click(function() {
            var row = $('#input-dokumen-compare tbody > tr').length
            if(row > 0) {
                var empty = false;
                var kolom = null;
                var baris = null;
                var error = '';
                $('#input-dokumen-compare tbody tr').each(function() {
                    baris = $(this).index() + 1
                    $(this).find('td').not(':first, :last, :eq(2)').each(function() {
                        if($(this).text().trim() === '') {
                            empty = true;
                            kolom = $('#input-dokumen-compare thead > tr th').eq($(this).index()).text()
                            error = `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong`
                            return false;
                        }
                    })
                })
                if(empty) {
                    alert(error)
                } else {
                    addRowDokumenCompare()
                }
            } else {
                addRowDokumenCompare()
            }
        })

        $('#input-dokumen-compare tbody').on('click', 'td', function(event) {
            event.stopPropagation();
             var tr = $(this).parent()
            var tbody = $(tr).parent()
            $(tr).addClass('selected-row')
            $(this).addClass('selected-cell');
            tr.children().not(this).removeClass('selected-cell');
            tbody.children().not($(tr)).removeClass('selected-row')
            hideUnselectedCell(tr);
            hideUnselectedRow(tbody)
        });

        $('#input-dokumen-compare tbody').on('change', 'input[type="file"]', function() {
            var td = $(this).parent()
            var id = $(td).attr('id')
            var file = $(this).val().replace(/C:\\fakepath\\/i, '')
            $(td).children('#text-'+id).text(file)
        })
            //END GRID DOKUMEN COMPARE

        $('.input-grid tbody').on('click', '.search-item', function() {
            var id = $(this).parent('td').attr('id')
            var parameter = $(this).parent('td').find('#kode-'+id).attr('name');
            var input = $(this).parent('td').find('#value-'+id).attr('id')
            var text = $(this).parent('td').find('#text-'+id).attr('id')

            switch(parameter) {
                case 'kelompok[]':
                    var options = { 
                        id : parameter,
                        header : ['Kode', 'Nama'],
                        url : "{{ url('silo-trans/filter-klp') }}",
                        columns : [
                            { data: 'kode_barang' },
                            { data: 'nama' }
                        ],
                        judul : "Daftar Kelompok Barang",
                        pilih : "akun",
                        jTarget1 : "val",
                        jTarget2 : "val",
                        target1 : id,
                        target2 : "#"+text,
                        target3 : "",
                        target4 : "custom",
                        width : ["30%","70%"]
                    };
                    break;
                default:
                    break;

            }
            showInpFilter(options);
        })
        // END GRID FORM

        // VALIDATION GRID //
        function checkTableBarang() {
            var nama = $('#input-barang').attr('data-table')
            var table = $('#input-barang tbody').children('tr')
            var kolom = ''
            var error = ''
            var baris = null
            var empty = false
            if(table.length === 0) {
                valid = false
                alert('Harap mengisi data barang minimal 1 data')
            } else {
                $('#input-barang tbody').children('tr').each(function() {
                    baris = $(this).index() + 1
                    $(this).children('td').not(':first, :last').each(function() {
                        if($(this).text().trim() === '') {
                            empty = true
                            kolom = $('#input-barang thead > tr th').eq($(this).index()).text()
                            error = `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong di ${nama}`
                            return false;
                        }
                    })
                    if(empty) {
                        return false
                    }
                })

                if(empty) {
                    alert(error)
                    valid = false
                } else {
                    valid = true
                    checkTableDokumenPO()
                }
            }
        }

        function checkTableDokumenPO() {
            var nama = $('#input-dokumen-po').attr('data-table')
            var table = $('#input-dokumen-po tbody').children('tr')
            var kolom = ''
            var error = ''
            var baris = null
            var empty = false
            if(table.length === 0) {
                valid = false
                alert('Harap upload dokumen PO minimal 1 dokumen')
            } else {
                $('#input-dokumen-po tbody').children('tr').each(function() {
                    baris = $(this).index() + 1
                    $(this).children('td').not(':first, :last, :eq(2)').each(function() {
                        if($(this).text().trim() === '') {
                            empty = true
                            kolom = $('#input-dokumen-po thead > tr th').eq($(this).index()).text()
                            error = `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong  di ${nama}`
                            return false;
                        } 
                    })
                    if(empty) {
                        return false
                    }
                })

                if(empty) {
                    alert(error)
                    valid = false
                } else {
                    valid = true
                    checkTableDokumenCompare()
                }
            }
        }

        function checkTableDokumenCompare() {
            var nama = $('#input-dokumen-compare').attr('data-table')
            var table = $('#input-dokumen-compare tbody').children('tr')
            var kolom = ''
            var error = ''
            var baris = null
            var empty = false
            if(table.length < 3) {
                valid = false
                alert('Harap upload dokumen pembanding minimal 3 dokumen')
            } else {
                $('#input-dokumen-compare tbody').children('tr').each(function() {
                    baris = $(this).index() + 1
                    $(this).children('td').not(':first, :last, :eq(2)').each(function() {
                        if($(this).text().trim() === '') {
                            empty = true
                            kolom = $('#input-dokumen-compare thead > tr th').eq($(this).index()).text()
                            error = `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong di ${nama}`
                            return false;
                        } 
                    })
                    if(empty) {
                        return false
                    }
                })

                if(empty) {
                    alert(error)
                    valid = false
                } else {
                    valid = true
                }
            }
        }
        // END VALIDATION GRID //

        // SIMPAN
        $('#form-tambah').validate({
            ignore: [],
            rules: 
            {
                tanggal:{
                    required: true,   
                },
                waktu:{
                    required: true,   
                },
                kode_pp:{
                    required: true,   
                },
                kode_kota:{
                    required: true,   
                },
                no_dokumen:{
                    required: true,   
                },
                kegiatan:{
                    required: true,   
                },
                dasar:{
                    required: true,   
                },
                pic:{
                    required: true,   
                },
                nik_ver:{
                    required: true,   
                },
                total:{
                    required: true,   
                },
            },
            errorElement: "label",
            submitHandler: function (form, event) {
                event.preventDefault()
                var parameter = $('#id_edit').val();
                var id = $('#id').val();
                if(parameter == "edit"){
                    var url = "{{ url('silo-trans/juskeb') }}/"+id;
                    var pesan = "updated";
                    var text = "Perubahan data "+id+" telah tersimpan";
                }else{
                    var url = "{{ url('silo-trans/juskeb') }}";
                    var pesan = "saved";
                    var text = "Data tersimpan dengan kode "+id;
                }

                var formData = new FormData(form);
                for(var pair of formData.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]); 
                }
                
                checkTableBarang()

                if(valid) {
                    $.ajax({
                        type: 'POST', 
                        url: url,
                        dataType: 'json',
                        data: formData,
                        async:false,
                        contentType: false,
                        cache: false,
                        processData: false, 
                        success:function(result){
                            if(result.data.status){
                                var kode = result.data.no_aju;
                                $('#input-barang tbody').empty();
                                $('#input-dokumen-po tbody').empty();
                                $('#input-dokumen-compare tbody').empty();
                                $('#input-approve tbody').empty();
                                dataTable.ajax.reload();
                                $('#judul-form').html('Tambah Data Justifikasi Pengajuan');
                                $('#kode').attr('readonly', false);
                                addRowBarangDefault();
                                addRowDokumenPODefault()
                                for(var i=0;i<3;i++) {                
                                    addRowDokumenCompareDefault()
                                }
                                resetForm();
                                printPreview(kode, 'form');
                                last_add("no_bukti", kode);
                                Swal.fire(
                                    'Great Job!',
                                    'Your data has been '+pesan+' '+result.data.message,
                                    'success'
                                )
                            }else if(!result.data.status && result.data.message === "Unauthorized"){
                                window.location.href = "{{ url('/silo-auth/sesi-habis') }}";
                            }else{
                                if(result.data.kode == "-" && result.data.jenis != undefined){
                                    msgDialog({
                                        id: id,
                                        type: result.data.jenis,
                                        text:'NIK sudah digunakan'
                                    });
                                }else{

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!',
                                        footer: '<a href>'+result.data.message+'</a>'
                                    })
                                }
                            }
                        },
                        fail: function(xhr, textStatus, errorThrown){
                            alert('request failed:'+textStatus);
                        }
                    });
                    $('#btn-simpan').html("Simpan").removeAttr('disabled');
                }
            },
            errorPlacement: function (error, element) {
                var id = element.attr("id");
                $("label[for="+id+"]").append("<br/>");
                $("label[for="+id+"]").append(error);
            }
        });
        // END SIMPAN

        // EDIT DATA
        function editData(id) {
            $('#form-tambah').validate().resetForm();
            $('#input-barang tbody').empty();
            $('#input-dokumen-po tbody').empty();
            $('#input-dokumen-compare tbody').empty();
            $('#input-approve tbody').empty();
            $('#btn-save').attr('type','button');
            $('#btn-save').attr('id','btn-update');
            $('#judul-form').html('Edit Data Justifikasi Pengajuan');
            $.ajax({
                type: 'GET',
                url: "{{ url('apv/juskeb') }}/" + id,
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data
                    if(result.status){
                        $('#id_edit').val('edit');
                        $('#method').val('post');
                        $('#kode').attr('readonly', true);
                        $('#kode').val(id);
                        $('#id').val(id);
                        $('#tanggal').val(reverseDateNew(result.data[0].tanggal, '-', '/'));
                        $('#waktu').val(reverseDateNew(result.data[0].waktu, '-', '/'));
                        $('#dokumen').val(result.data[0].no_dokumen);
                        $('#kegiatan').val(result.data[0].kegiatan);
                        $('#dasar').val(result.data[0].dasar);
                        $('#pic').val(result.data[0].pemakai);
                        $('#total').val(parseFloat(result.data[0].nilai));
                        setRegional('kode_pp', result.data[0].kode_pp);
                        setKota(result.data[0].kode_pp, 'kode_kota', result.data[0].kode_kota);
                        setNik(result.data[0].kode_pp, 'nik_ver', result.data[0].nik_ver);

                        if(result.data_detail.length > 0) { 
                            var html = "";
                            var no = 1;

                            for(var i=0;i<result.data_detail.length;i++) { 
                                var data = result.data_detail[i];   
                                var brg = setBarang(data.barang_klp)
                                var idBarang = 'barang-ke__'+no
                                var idDesk = 'deskripsi-ke__'+no
                                var idHarga = 'harga-ke__'+no
                                var idQty = 'qty-ke__'+no
                                var idSubtotal = 'subtotal-ke__'+no
                                var idPPN = 'ppn-ke__'+no
                                var idTotal = 'total-ke__'+no

                                html += `
                                    <tr class='row-grid'>
                                        <td class='no-grid text-center'>${no}</td>
                                        <td id='${idBarang}'>
                                            <span id='text-${idBarang}' class='tooltip-span'>${brg.name}</span>
                                            <input type='hidden' name='barang_klp[]' id='value-${idBarang}' value='${data.barang_klp}' readonly>
                                            <input autocomplete='off' type='text' name='kelompok[]' class='form-control hidden' style='z-index: 1;position: relative;' id='kode-${idBarang}' value='${brg.name}' readonly>
                                            <a href='#' class='search-item hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>
                                        </td>
                                        <td id='${idDesk}'>
                                            <span id='text-${idDesk}' class='tooltip-span'>${data.barang}</span>
                                            <input autocomplete='off' id='value-${idDesk}' type='text' name='barang[]' class='form-control hidden' value='${data.barang}'>
                                        </td>
                                        <td id='${idHarga}' class='text-right'>
                                            <span id='text-${idHarga}' class='tooltip-span'>${format_number(parseFloat(data.harga))}</span>
                                            <input autocomplete='off' id='value-${idHarga}' type='text' name='harga[]' class='form-control currency hidden inp-harga' value='${parseFloat(data.harga)}'>
                                        </td>
                                        <td id='${idQty}' class='text-right'>
                                            <span id='text-${idQty}' class='tooltip-span'>${format_number(parseFloat(data.jumlah))}</span>
                                            <input autocomplete='off' id='value-${idQty}' type='text' name='qty[]' class='form-control currency hidden inp-qty' value='${parseFloat(data.jumlah)}'>
                                        </td>
                                        <td id='${idSubtotal}' class='text-right readonly'>
                                            <span id='text-${idSubtotal}' class='tooltip-span text-sub'>${format_number(parseFloat(data.nilai))}</span>
                                            <input autocomplete='off' id='value-${idSubtotal}' type='text' name='nilai[]' class='form-control currency hidden inp-sub' value='${parseFloat(data.nilai)}'>
                                        </td>
                                        <td id='${idPPN}' class='text-right'>
                                            <span id='text-${idPPN}' class='tooltip-span'>${format_number(parseFloat(data.ppn))}</span>
                                            <input autocomplete='off' id='value-${idPPN}' type='text' name='ppn[]' class='form-control currency hidden inp-ppn' value='${parseFloat(data.ppn)}'>
                                        </td>
                                        <td id='${idTotal}' class='text-right readonly'>
                                            <span id='text-${idTotal}' class='tooltip-span text-grand'>${format_number(parseFloat(data.grand_total))}</span>
                                            <input autocomplete='off' id='value-${idTotal}' type='text' name='grand_total[]' class='form-control currency hidden inp-grand' value='${parseFloat(data.grand_total)}'>
                                        </td>
                                        <td class='text-center'>
                                            <a class='hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                                        </td>
                                    </tr>
                                `;

                                no++;
                            }
                            $('#input-barang tbody').append(html)

                            $('.currency').inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { return false; }
                            });
                            
                            $('.tooltip-span').tooltip({
                                title: function(){
                                    return $(this).text();
                                }
                            });

                            hitungTotalRowBarang()
                        }

                        if(result.data_dokumen.length > 0) { 
                            var html = "";
                            var no = 1;
                            for(var i=0;i<result.data_dokumen.length;i++) { 
                                var data = result.data_dokumen[i];
                                var idDokumen = 'dokumenpo-ke__'+no
                                var idFile = 'filepo-ke__'+no
                                var idUpload = 'uploadpo-ke__'+no
                                html += `
                                    <tr class='row-grid'>
                                        <td class='no-grid text-center'>${no}<input type='hidden' value='PO' name='jenis_dok[]'></td>
                                        <td id='${idDokumen}'>
                                            <span id='text-${idDokumen}' class='tooltip-span'>${data.nama}</span>
                                            <input autocomplete='off' id='value-${idDokumen}' type='text' name='nama_file[]' class='form-control hidden' value='${data.nama}'>
                                        </td>
                                        <td id='${idFile}' class='readonly'>
                                            <span id='text-${idFile}' class='tooltip-span'>${data.file_dok}</span>
                                            <input autocomplete='off' id='value-${idFile}' type='text' name='nama_dok[]' class='form-control hidden' value='${data.file_dok}' readonly>
                                        </td>
                                        <td id='${idUpload}'>
                                            <span class='hidden not-show' id='text-${idUpload}'>${data.file_dok}</span>
                                            <input id='value-${idUpload}' type='file' name='file_dok[]'>
                                        </td>
                                        <td class='text-center'>
                                            <a class='hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                                            <a class='download-item' style='font-size:12px;cursor:pointer;' href='http://api.simkug.com/api/apv/storage/${data.file_dok}' target='_blank'><i class='simple-icon-cloud-download'></i></a>
                                        </td>
                                    </tr>
                                `;
                                no++;
                            }
                            $('#input-dokumen-po tbody').append(html)
                            $('.tooltip-span').tooltip({
                                title: function(){
                                    return $(this).text();
                                }
                            });
                            hitungTotalRowDokumenPO()
                        }

                        if(result.data_dokumen2.length > 0) { 
                            var html = "";
                            var no = 1;
                            for(var i=0;i<result.data_dokumen2.length;i++) { 
                                var data = result.data_dokumen2[i];
                                var idDokumen = 'dokumencp-ke__'+no
                                var idFile = 'filecp-ke__'+no
                                var idUpload = 'uploadcp-ke__'+no
                                html += `
                                    <tr class='row-grid'>
                                        <td class='no-grid text-center'>${no}<input type='hidden' value='PBD' name='jenis_dok[]'></td>
                                        <td id='${idDokumen}'>
                                            <span id='text-${idDokumen}' class='tooltip-span'>${data.nama}</span>
                                            <input autocomplete='off' id='value-${idDokumen}' type='text' name='nama_file[]' class='form-control hidden' value='${data.nama}'>
                                        </td>
                                        <td id='${idFile}' class='readonly'>
                                            <span id='text-${idFile}' class='tooltip-span'>${data.file_dok}</span>
                                            <input autocomplete='off' id='value-${idFile}' type='text' name='nama_dok[]' class='form-control hidden' value='${data.file_dok}' readonly>
                                        </td>
                                        <td id='${idUpload}'>
                                            <span class='hidden not-show' id='text-${idUpload}'>${data.file_dok}</span>
                                            <input id='value-${idUpload}' type='file' name='file_dok[]'>
                                        </td>
                                        <td class='text-center'>
                                            <a class='hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                                            <a class='download-item' style='font-size:12px;cursor:pointer;' href='http://api.simkug.com/api/apv/storage/${data.file_dok}' target='_blank'><i class='simple-icon-cloud-download'></i></a>
                                        </td>
                                    </tr>
                                `;
                                no++;
                            }
                            $('#input-dokumen-compare tbody').append(html)
                            $('.tooltip-span').tooltip({
                                title: function(){
                                    return $(this).text();
                                }
                            });
                            hitungTotalRowDokumenCompare()
                        }

                        $('#saku-datatable').hide();
                        $('#modal-preview').modal('hide');
                        $('#saku-form').show();
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                    }
                    // $iconLoad.hide();
                }
            });
        }

        $('#saku-datatable').on('click', '#btn-edit', function(){
            var id= $(this).closest('tr').find('td').eq(0).html();
            editData(id)
        });
        // END EDIT

        // HAPUS DATA
        function hapusData(id){
            $.ajax({
                type: 'DELETE',
                url: "{{ url('apv/juskeb') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(result){
                    if(result.data.status){
                        dataTable.ajax.reload();                    
                        showNotification("top", "center", "success",'Hapus Data','Data Justifikasi Pengajuan ('+id+') berhasil dihapus ');
                        $('#modal-pesan-id').html('');
                        $('#table-delete tbody').html('');
                        $('#modal-pesan').modal('hide');
                    }else if(!result.data.status && result.data.message == "Unauthorized"){
                        window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        });
                    }
                }
            });
        }

        $('#saku-datatable').on('click','#btn-delete',function(e){
            var kode = $(this).closest('tr').find('td').eq(0).html();
            msgDialog({
                id: kode,
                type:'hapus'
            });
        });
        // END HAPUS

        // PRINT PREVIEW
        var backTo = null;
        function printPreview(id, from) {
            $.ajax({
                type: 'GET',
                url: "{{ url('apv/juskeb_preview') }}/" + id,
                dataType: 'json',
                async:false,
                success:function(res){ 
                    backTo = from
                    var result = res.data
                    if(typeof result.data !== 'undefined' && result.data.length > 0) {
                        var html = "";
                        var no = 1;
                        var total = 0
                        var data = result.data[0]
                        html += `
                            <div class='row'>
                                <div class='col-12 text-center' style='border-bottom:3px solid black;'>
                                    <h3>JUSTIFIKASI KEBUTUHAN</h3>
                                    <h3 id='kegiatan'>${data.kegiatan}</h3>
                                </div>    
                                <div class='col-12 my-3 text-center'>
                                    <h6 id='tanggal-print'>Tanggal : ${data.tanggal.substr(8, 2)} ${getNamaBulan(data.tanggal.substr(5, 2))} ${data.tanggal.substr(0, 4)}</h6>     
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
                                                <td style='width: 5%;'>2</td>
                                                <td style='width: 25%;'>NAMA KOTA</td>
                                                <td>${data.nama_kota}</td>
                                            </tr>    
                                            <tr>
                                                <td style='width: 5%;'>3</td>
                                                <td style='width: 25%;'>NAMA KEGIATAN</td>
                                                <td>${data.kegiatan}</td>
                                            </tr>    
                                            <tr>
                                                <td style='width: 5%;'>4</td>
                                                <td style='width: 25%;'>PIC</td>
                                                <td>${data.pic}</td>
                                            </tr>    
                                            <tr>
                                                <td style='width: 5%;'>5</td>
                                                <td style='width: 25%;'>SAAT PENGGUNAAN</td>
                                                <td>${data.waktu.substr(8, 2)} ${getNamaBulan(data.waktu.substr(5, 2))} ${data.waktu.substr(0, 4)}</td>
                                            </tr>    
                                        </tbody>
                                    </table>
                                </div>
                                <div class='col-12'>
                                    <h6 style='font-weight: bold; font-size: 13px;'># <u>LATAR BELAKANG</u></h6>
                                    <p>${data.dasar}</p>    
                                </div>
                                <div class='col-12'>
                                    <h6 style='font-weight: bold; font-size: 13px;'># <u>KEBUTUHAN</u></h6>  
                                    <table class='table table-bordered table-condensed'>
                                        <thead>
                                            <tr>
                                                <th class='text-center' style='width: 5%;'>No</th>    
                                                <th class='text-center' style='width: 15%;'>Kelompok Barang</th>    
                                                <th class='text-center' style='width: 30%;'>Deskripsi</th>    
                                                <th class='text-center' style='width: 10%;'>Harga</th>    
                                                <th class='text-center' style='width: 5%;'>Qty</th>    
                                                <th class='text-center' style='width: 10%;'>Jumlah Harga</th>    
                                                <th class='text-center' style='width: 5%;'>PPN</th>    
                                                <th class='text-center' style='width: 10%;'>Grand Total</th>    
                                            </tr>    
                                        </thead>
                                        <tbody>`
                                        for(var i =0;i<result.data_detail.length;i++) {
                                            var detail = result.data_detail[i]
                                            var grand = detail.grand_total
                                            total = total + parseFloat(grand)
                                            html += `
                                            <tr>
                                                <td>${no}</td>
                                                <td>${detail.nama_klp}</td>
                                                <td>${detail.barang}</td>
                                                <td class='text-right'>${format_number(detail.harga)}</td>
                                                <td class='text-right'>${format_number(detail.jumlah)}</td>
                                                <td class='text-right'>${format_number(detail.nilai)}</td>
                                                <td class='text-right'>${format_number(detail.ppn)}%</td>
                                                <td class='text-right'>${format_number(detail.grand_total)}</td>
                                            </tr>
                                            `;
                                            no++;
                                        }
                                        html += `
                                            <tr>
                                                <td colspan='7'>Total</td>
                                                <td class='text-right'>${format_number(total)}</td>
                                            </tr>    
                                        </tbody>    
                                    </table>
                                </div>
                                <div class='col-12'>
                                    <h6 style='font-weight: bold; font-size: 13px;'># <u>ESTIMASI BIAYA</u></h6>  
                                    <p>
                                        Estimasi Biaya yang dibutuhkan untuk pengadaan tersebut adalah sebesar 
                                        <span style='text-transform: capitalize;'>Rp. ${format_number(data.nilai)} (${terbilang(data.nilai)}) Rupiah</span>
                                    </p>
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
                        $('#saku-form').hide()
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
            if(backTo === 'table') {
                $('#saku-datatable').show()
                $('#saku-form').hide()
            } else {
                var regional = "{{ Session::get('kodePP') }}";
                setRegional('kode_pp', regional)
                setNik(regional, 'nik_ver', null, 'add')
                $('#saku-form').show()
                $('#saku-datatable').hide()
            }
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
                url: "{{ url('apv/juskeb_history') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(res) {
                    var result = res.data
                    if(typeof result.data !== 'undefined' && result.data.length > 0) { 
                        var html = "";
                        var color = "";
                        for(var i=0;i<result.data.length;i++) {
                            var data = result.data.data[i]
                            if(data.color === 'green') {
                                color = '#00c292'
                            } else {
                                color = '#03a9f3'
                            }

                            html += `
                                 <div class='sl-item'>
                                    <div class='sl-left' style='margin-left: -65px;'>
                                        <div style='padding: 10px; border: 1px solid ${color}; border-radius: 50%; background: ${color}; color: #ffffff; width: 50px; text-align: center;'>
                                            <i style='font-size: 25px;' class='fa fa-clipboard-check'></i>
                                        </div>
                                    </div>    
                                    <div class='sl-right'>
                                        <div>
                                            <a href='javascript:void(0)' class='link'>
                                                ${data.nama} <span class='sl-date'>${data.tanggal} (${data.status})</span>
                                            </a>
                                        </div>
                                        <div class='row mt-3 mb-2'>
                                            <div class='col-6'>No Bukti :</div>    
                                            <div class='col-6'>${data.no_bukti}</div>    
                                            <div class='col-6'>Catatan :</div>    
                                            <div class='col-6'>${data.keterangan}</div>    
                                        </div>    
                                    </div>
                                </div>
                                <hr />
                            `
                        }
                    } else if(!result.status && result.message == "Unauthorized"){
                        Swal.fire({
                            title: 'Session telah habis',
                            text: 'harap login terlebih dahulu!',
                            icon: 'error'
                        }).then(function() {
                            window.location.href = "{{ url('silo-auth/logout') }}";
                        })
                    } else {
                        html += `
                            <div class='sl-item'>
                                <div class='sl-left'>
                                    <div style='padding: 10px;border: 1px solid #959595;border-radius: 50%;background: #959595;color: #ffffff;width: 50px;text-align: center;'>
                                        <i style='font-size: 25px;' class='fa fa-envelope'></i> 
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
                    $('#saku-form').hide()
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
            $('#saku-form').hide()
        });
        // END HISTORY
    </script>