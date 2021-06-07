    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_silo/css/trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Pengajuan" tambah="true" :thead="array('No Bukti', 'No Dokumen', 'Regional', 'Nilai Pengadaan', 'Nilai Finish', 'Aksi', 'Waktu', 'Kegiatan', 'Posisi')" :thwidth="array(15,25,20,10,10,25,5,5,5)" :thclass="array('','','','','','text-center','','','')" />
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
                                        <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" autocomplete="off" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="waktu">Tanggal Kebutuhan</label>
                                        <input class='form-control datepicker' type="text" id="waktu" name="waktu" autocomplete="off" value="{{ date('d/m/Y') }}">
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
                                        <label for="nama">Justifikasi Kebutuhan</label>
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
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_nik_ver"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total">Total Barang</label>
                                        <input class="form-control" type="text" placeholder="Total Barang" id="total" name="total" autocomplete="off" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#data-barang" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Barang</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-dokumen" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Dokumen</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-approve" role="tab" aria-selected="false"><span class="hidden-xs-down">Catatan Approve</span></a></li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2rem;">
                            <div class="tab-pane active row" id="data-barang" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-barang" ></span></a>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed gridexample input-grid" id="input-barang" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
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
                            <div class="tab-pane row" id="data-dokumen" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-dokumen" ></span></a>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed gridexample input-grid" id="input-dokumen" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
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
                                    <a type="button" id="add-dokumen" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                            <div class="tab-pane row" id="data-approve" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-approve" ></span></a>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed gridexample input-grid" id="input-approve" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
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
        var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='simple-icon-reload' style='font-size:18px'></i></a>";
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
                {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' }
            ],
            [
                { data: 'no_bukti' },
                { data: 'no_dokumen' },
                { data: 'nama_pp' },
                { data: 'nilai' },
                { data: 'nilai_finish' },
                { data: null },
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
        $('#saku-datatable').on('click', '#btn-tambah', function(){
            var regional = "{{ Session::get('kodePP') }}";
            $('#input-barang tbody').empty();
            $('#input-dokumen tbody').empty();
            $('#input-approve tbody').empty();
            $('#judul-form').html('Tambah Data Pengajuan');
            $('#kode').attr('readonly', false);
            addRowDefault();
            newForm();
            setRegional('kode_pp', regional)
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

        $('input.datepicker').click(function() {
            $('div.datepicker').css({ 'top': '230px' })
        })

        $("input.datepicker").bootstrapDP({
            autoclose: true,
            format: "dd/mm/yyyy",
            templates: {
                leftArrow: '<i class="simple-icon-arrow-left"></i>',
                rightArrow: '<i class="simple-icon-arrow-right"></i>',
            },
        });

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

        function hitungTotalRowDokumen(){
            var total_row = $('#input-dokumen tbody tr').length;
            $('#total-dokumen').html(total_row+' Baris');
        }

        function hitungTotalRowCatatan(){
            var total_row = $('#input-approve tbody tr').length;
            $('#total-approve').html(total_row+' Baris');
        }
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
                        url : "{{ url('silo-master/filter-pp') }}",
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
                        target4 : "",
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
        $('#form-tambah').click(function() {
            hideAllSelectedRow()
        })

        function hideAllSelectedRow() {
            $('table[id^=input]').each(function(index, table) {
                $(table).children('tbody').each(function(index, tbody) {
                    $(tbody).children('tr').each(function(index, tr) {
                        $(tr).children('td').not(':first, :last').each(function(index, td) {
                            var value = $(td).children('input').not("input[type='hidden']").val()
                            $(td).children('input').not("input[type='hidden']").val(value)
                            $(td).children('span').text(value)
                            $(td).children('input').hide()
                            $(td).children('a').not('.hapus-item').hide()
                            $(td).children('span').show()
                        })
                    })
                })
                $(table).find('tr').removeClass('selected-row')
                $(table).find('td').removeClass('selected-cell')
                $(table).find('input').hide()
                $(table).find('a').not('.hapus-item').hide()
                $(table).find('span').show()
            })
        }

        function hideUnselectedRow(tbody) {
            tbody.find('tr').not('.selected-row').each(function(index, tr) {
                $(tr).find('td').not(':first, :last').each(function(index, td) {
                    var value = $(td).children('input').not("input[type='hidden']").val()
                    $(td).children('input').not("input[type='hidden']").val(value)
                    $(td).children('span').text(value)
                    $(td).children('input').hide()
                    $(td).children('a').not('.hapus-item').hide()
                    $(td).children('span').show()
                })
            }) 
        }

        function hideUnselectedCell(tr) {
            tr.find('td').not(':first, :last, .readonly').each(function(index, td) {
                var value = $(td).children('input').not("input[type='hidden']").val()
                $(td).children('input').not("input[type='hidden']").val(value)
                $(td).children('span').text(value)
                if($(td).hasClass('selected-cell')) {
                    $(td).children('span').hide()
                    $(td).children('input').show()
                    $(td).children('a').not('.hapus-item').show()
                    setTimeout(function() {
                        $(td).children('input').focus()
                    }, 500)
                } else {
                    $(td).children('input').hide()
                    $(td).children('a').not('.hapus-item').hide()
                    $(td).children('span').show()
                }
            }) 
        }

        function nextSelectedCell(tr, td, index) {
            var value = $(td).children('input').val()
            $(td).children('input').not("input[type='hidden']").val(value)
            $(td).children('span').text(value)
            $(td).children('span').show()
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
            $(tdnext).children('input').show()
            setTimeout(function() {
                $(tdnext).children('input').focus()
            }, 500)
        }

        function custTarget(target, tr) {
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

            nextSelectedCell(trTable, target, tdindex)
        }
            // GRID BARANG
        function generateAfterSelect(id, kode, nama) {
            console.log({ id, kode, nama })
            $('#'+id).find('#value-'+id).val(kode)
            $('#'+id).find('#text-'+id).text(nama)
        }
        function hitungTotalRowBarang(){
            var total_row = $('#input-barang tbody tr').length;
            $('#total-barang').html(total_row+' Baris');
        }

        function addRowDefault() {
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
                        <input autocomplete='off' type='text' name='kelompok[]' class='form-control hidden' value='' style='z-index: 1;position: relative;' id='kode-${idBarang}'>
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
            $('.row-grid:last').addClass('selected-row');

            // $(`#kode-${idBarang}`).typeahead({
            //     source:$dtKlpBarang,
            //     displayText:function(item){
            //         return item.id+'-'+item.name;
            //     },
            //     autoSelect:false,
            //     changeInputOnSelect:false,
            //     changeInputOnMove:false,
            //     selectOnBlur:false
            // });
           
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
                        <input autocomplete='off' type='text' name='kelompok[]' class='form-control hidden' value='' style='z-index: 1;position: relative;' id='kode-${idBarang}'>
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
            
            // $(`#kode-${idBarang}`).typeahead({
            //     source:$dtKlpBarang,
            //     displayText:function(item){
            //         return item.id+'-'+item.name;
            //     },
            //     autoSelect:false,
            //     changeInputOnSelect:false,
            //     changeInputOnMove:false,
            //     selectOnBlur:false,
            //     afterSelect: function (item) {
            //         console.log(this.$element.get(0))
            //         console.log(item)
            //     }
            // });

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
            var row = $('#input-barang tbody > tr').length
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
            $('.row-grid').each(function(){
                var nom = $(this).closest('tr').find('.no-grid');
                nom.html(no);
                no++;
            });
            hitungTotalRowBarang();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });

        $('#input-barang tbody').on('click', 'tr', function(event) {
            event.stopPropagation();
            var tbody = $(this).parent()
            $(this).addClass('selected-row');
            tbody.children().not(this).removeClass('selected-row');
            hideUnselectedRow(tbody);
        });

        $('#input-barang tbody').on('click', 'td', function(event) {
            event.stopPropagation();
            var tr = $(this).parent()
            $(this).addClass('selected-cell');
            tr.children().not(this).removeClass('selected-cell');
            hideUnselectedCell(tr);
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
    </script>
    {{-- <script type="text/javascript">
    // SET UP FORM //
    var userPP = "{{ Session::get('kodePP') }}";
    var $iconLoad = $('.preloader');
    var selectRegional = $('#inp-filter_regional').selectize();
    var selectBukti = $('#inp-filter_bukti').selectize();
    var $dtKlpBarang = [];
    var kelBarang = [];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        onSelect: function() {
            $(this).change();
        }
    });

    function hitungTotalBrg(){
        $('#total').val(0);
        total= 0;
        $('#input-grid-barang > tbody > tr.row-grid').each(function(){
            var sub = toNilai($(this).closest('tr').find('.inp-grand').val());
            var this_val = sub;
            total += +this_val;
            console.log(sub);
            
            $('#total').val(sepNum(total));
        });
    }

    function hitungTotalRowBarang(){
        var total_row = $('#input-grid-barang tbody tr').length;
        $('#total-row-barang').html(total_row+' Baris');
    }

    function hitungTotalRowDokumen(){
        var total_row = $('#input-grid-dokumen tbody tr').length;
        $('#total-row-dokumen').html(total_row+' Baris');
    }

    function hitungTotalRowDokumen(){
        var total_row = $('#input-grid-dokumen tbody tr').length;
        $('#total-row-dokumen').html(total_row+' Baris');
    }

    function hitungTotalRowCatatan(){
        var total_row = $('#input-grid-catatan tbody tr').length;
        $('#total-row-catatan').html(total_row+' Baris');
    }

    function hideUnselectedRowBarang() {
        $('#input-grid-barang > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_barang = $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_barang = $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var deskripsi = $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-desk").val();
                var harga = $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-harga").val();
                var qty = $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-qty").val();
                var subtotal = $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();
                var ppn = $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-ppn").val();
                var grand = $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-grand").val();

                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_barang);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_barang);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_barang);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_barang);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-desk").val(deskripsi);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-desk").text(deskripsi);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-harga").val(harga);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-harga").text(harga);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-qty").val(qty);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-qty").text(qty);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(subtotal);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-nilai").text(subtotal);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-ppn").val(ppn);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-ppn").text(ppn);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-grand").val(grand);
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-grand").text(grand);

                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".search-barang").hide();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-desk").hide();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-desk").show();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-harga").hide();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-harga").show();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-qty").hide();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-qty").show();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-ppn").hide();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-ppn").show();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".inp-grand").hide();
                $('#input-grid-barang > tbody > tr:eq('+index+') > td').find(".td-grand").show();
            }
        })
    }

    function addRowBarangDefault() {
        var no=$('#input-grid-barang .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td><span class='td-kode tdbarangke"+no+" tooltip-span'></span><input autocomplete='off' type='text' name='barang_klp[]' class='form-control inp-kode barangke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'  id='barangkode"+no+"'><a href='#' class='search-item search-barang hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmbarangke"+no+" tooltip-span'></span><input autocomplete='off' type='text' name='barang_nama[]' class='form-control inp-nama nmbarangke"+no+" hidden'  value='' readonly></td>";
        input += "<td><span class='td-desk tddeskke"+no+" tooltip-span'></span><input autocomplete='off' type='text' name='barang[]' class='form-control inp-desk deskke"+no+" hidden'  value='' required></td>";
        input += "<td class='text-right'><span class='td-harga tdhrgke"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='harga[]' class='form-control inp-harga hargake"+no+" hidden'  value='0' required></td>";
        input += "<td class='text-right'><span class='td-qty tdqtyke"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='qty[]' class='form-control inp-qty qtyke"+no+" hidden'  value='0' required></td>";
        input += "<td class='text-right'><span class='td-nilai tdnilaike"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='nilai[]' class='form-control inp-nilai nilaike"+no+" hidden'  value='0' required readonly></td>";
        input += "<td class='text-right'><span class='td-ppn tdppnke"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='ppn[]' class='form-control inp-ppn ppnke"+no+" hidden'  value='0' required></td>";
        input += "<td class='text-right'><span class='td-grand tdgrandke"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='grand_total[]' class='form-control inp-grand grandke"+no+" hidden'  value='0' required readonly></td>";
        input += "</tr>";
        $('#input-grid-barang tbody').append(input);
        $('#input-grid-barang > tbody > tr.row-grid:last').addClass('selected-row');
        $('#barangkode'+no).typeahead({
            source:$dtKlpBarang,
            displayText:function(item){
                return item.id+' - '+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });
        $('.hargake'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.qtyke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.nilaike'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.ppnke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.grandke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRowBarang();
    }

    function addRowGridBarang() {
        var no=$('#input-grid-barang .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td><span class='td-kode tdbarangke"+no+" tooltip-span'></span><input autocomplete='off' type='text' name='barang_klp[]' class='form-control inp-kode barangke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'  id='barangkode"+no+"'><a href='#' class='search-item search-barang hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmbarangke"+no+" tooltip-span'></span><input autocomplete='off' type='text' name='barang_nama[]' class='form-control inp-nama nmbarangke"+no+" hidden'  value='' readonly></td>";
        input += "<td><span class='td-desk tddeskke"+no+" tooltip-span'></span><input autocomplete='off' type='text' name='barang[]' class='form-control inp-desk deskke"+no+" hidden'  value='' required></td>";
        input += "<td class='text-right'><span class='td-harga tdhrgke"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='harga[]' class='form-control inp-harga hargake"+no+" hidden'  value='0' required></td>";
        input += "<td class='text-right'><span class='td-qty tdqtyke"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='qty[]' class='form-control inp-qty qtyke"+no+" hidden'  value='0' required></td>";
        input += "<td class='text-right'><span class='td-nilai tdnilaike"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='nilai[]' class='form-control inp-nilai nilaike"+no+" hidden'  value='0' required readonly></td>";
        input += "<td class='text-right'><span class='td-ppn tdppnke"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='ppn[]' class='form-control inp-ppn ppnke"+no+" hidden'  value='0' required></td>";
        input += "<td class='text-right'><span class='td-grand tdgrandke"+no+" tooltip-span'>0</span><input autocomplete='off' type='text' name='grand_total[]' class='form-control inp-grand grandke"+no+" hidden'  value='0' required readonly></td>";
        input += "</tr>";

        $('#input-grid-barang tbody').append(input);
        $('#input-grid-barang > tbody > tr.row-grid:last .row-grid:last').addClass('selected-row');
        $('#input-grid-barang tbody tr').not('.row-grid:last').removeClass('selected-row');
        $('#barangkode'+no).typeahead({
            source:$dtKlpBarang,
            displayText:function(item){
                return item.id+' - '+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });
        $('.hargake'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.qtyke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.nilaike'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.ppnke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.grandke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        $('#input-grid-barang td').removeClass('px-0 py-0 aktif');
        $('#input-grid-barang tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-grid tbody-barang tr:last').find(".inp-kode").show();
        $('#input-grid tbody-barang tr:last').find(".td-kode").hide();
        $('#input-grid tbody-barang tr:last').find(".search-barang").show();
        $('#input-grid tbody-barang tr:last').find(".inp-kode").focus();
        
        hitungTotalRowBarang();
    }

    function addRowGridUpload() {
        var no=$('#input-grid-dokumen .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-upload'>";
        input += "<td class='no-upload text-center'>"+no+"</td>";
        input += "<td class='text-center'><a class='hapus-item' title='Hapus' style='cursor:pointer; font-size=18px;'><i class='simple-icon-trash'></i></a>&nbsp;&nbsp;</td>";
        input += "<td><input type='text' name='nama_file[]' value='-' class='form-control inp-file_dok'></td>";
        input += "<td><span>-</span><input type='hidden' name='nama_dok[]' value='-' class='inp-file_dok' readonly></td>";
        input += "<td><input type='file' name='file_dok[]' class='inp-file_dok'></td>";
        input += "</tr>";
        $('#input-grid-dokumen tbody').append(input);
        hitungTotalRowDokumen();
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

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    // END SET UP FORM //
    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input
    // FUNCTION GET DATA //
    function generateDok(tanggal,nama_pp,nama_kota){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/generate-dok') }}",
            dataType: 'json',
            data:{'tanggal':tanggal,'kode_pp':nama_pp,'kode_kota':nama_kota},
            async:false,
            success:function(res){
                console.log(res);
                $('#dokumen').val(res.no_dokumen);
            }
        });
    }
    
    function getPPFilter() {
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
    }

    function getBuktiFilter() {
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/juskeb') }}",
            dataType: 'json',
            async:false,
            success:function(result){
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
    }

    function getKlpBarang() {
        $.ajax({
            type: 'GET',
            url: "{{ url('/apv/barang-klp') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;    
                if(result.status) {
                    for(i=0;i<result.data.length;i++){
                        $dtKlpBarang[i] = {id:result.data[i].kode_barang,name:result.data[i].nama};  
                    }
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            }
        });
    }

    function getOneKlpBarang(id) {
        var filter = $dtKlpBarang.filter(data => data.id == id);
        return filter[0];
    }

    function getPP(kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/unit') }}/" + userPP,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_pp == kode);
                        if(filter.length > 0) {
                            $('#kode_pp').val(filter[0].kode_pp);
                            $('#label_kode_pp').val(filter[0].nama);
                        } else {
                            $('#kode_pp').val('');
                            $('#label_kode_pp').val('');
                            $('#kode_pp').focus();
                        }
                    }
                }
            }
        });
    }

    function getKota(kode,kode_pp){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/kota') }}",
            data:{'kode_pp':kode_pp},
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_kota == kode);
                        if(filter.length > 0) {
                            $('#kode_kota').val(filter[0].kode_kota);
                            $('#label_kode_kota').val(filter[0].nama);
                        } else {
                            $('#kode_kota').val('');
                            $('#label_kode_kota').val('');
                            $('#kode_kota').focus();
                        }
                    }
                }
            }
        });
    }

    function getNIK(kode,kode_pp){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/nik_verifikasi') }}",
            data:{'kode_pp':kode_pp},
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.nik == kode);
                        if(filter.length > 0) {
                            $('#nik_ver').val(filter[0].nik);
                            $('#label_nik_ver').val(filter[0].nama);
                        } else {
                            $('#nik_ver').val('');
                            $('#label_nik_ver').val('');
                            $('#nik_ver').focus();
                        }
                    }
                }
            }
        });
    }

    function getKelBarangGrid(id,target1,target2,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/apv/barang-klp') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_barang == kode);
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);

                            $('.'+target2).val(filter[0].nama);
                            $('.td'+target2).text(filter[0].nama);
                        }else{

                            $("#input-grid-barang td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-barang').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(filter[0].nama);
                            $('.td'+target2).text(filter[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }
                }
                else if(!result.daftar.status && result.daftar.message == 'Unauthorized'){
                        window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode barang tidak valid');
                    }
                }
            }
        });
    }

    getKlpBarang();
    getPPFilter();
    getBuktiFilter();
    jumFilter();
    // END FUNCTION GET DATA //
    // EVENT CHANGE //
    $('#kode_pp').change(function(){
        var value = $(this).val();
        getPP(value);
    });
    $('#kode_kota').change(function(){
        var tanggal = $('#tanggal').val();
        var kode_pp = $('#kode_pp').val();
        var value = $(this).val();
        getKota(value,kode_pp);
        generateDok(tanggal,kode_pp,value)
    });
    $('#tanggal').change(function(){
        var kode_pp = $('#kode_pp').val();
        var kode_kota = $('#kode_kota').val();
        var value = $(this).val();
        generateDok(value,kode_pp,kode_kota)
    });
    $('#nik_ver').change(function(){
        var kode_pp = $('#kode_pp').val();
        var value = $(this).val();
        getNIK(value, kode_pp);
    });
    $('#inp-filter_regional').change(function(){
        jumFilter();
    });
    $('#inp-filter_kota').change(function(){
        jumFilter();
    });
    $('#form-tambah').on('click', '.add-row-barang', function(){
        addRowGridBarang();
    });
    $('#form-tambah').on('click', '.add-row-dokumen', function(){
        addRowGridUpload();
    });
    $('#slide-print').on('click','#btn-aju-print',function(e){
        e.preventDefault();
        $('#print-area').printThis({
            importCSS: true,
            importStyle: true,
            printContainer: true,
        });
    });
    $('#input-grid-barang tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid-barang tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowBarang();
    });
    $('#input-grid-barang').on('change', '.inp-kode', function(e){
        e.preventDefault();
        console.log('test')
        var noidx =  $(this).parents('tr').find('span.no-grid').text();
        target1 = "barangke"+noidx;
        target2 = "nmbarangke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            getKelBarangGrid(kode,target1,target2,'change');
        }else{
            alert('Kode barang yang dimasukkan tidak valid');
            return false;
        }
    });
    $('#input-grid-barang').on('keypress', '.inp-kode', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val() != undefined){
                $(this).val($("#input-grid-barang tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val());
            }else{
                $(this).val('');
            }
        }
    });
    $('#input-grid-barang').on('keypress', '.inp-desk', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid-barang tbody tr:eq("+(this_index - 1)+")").find('.inp-desk').val() != undefined){
                $(this).val($("#input-grid-barang tbody tr:eq("+(this_index - 1)+")").find('.inp-desk').val());
            }else{
                $(this).val('');
            }
        }
    });
    $('#input-grid-barang').on('keydown', '.inp-harga', function(e){
        if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            var hrg = $(this).closest('tr').find('.inp-harga').val();
            var qty = $(this).closest('tr').find('.inp-qty').val();
            var sub = toNilai(hrg)*toNilai(qty);
            $(this).closest('tr').find('.inp-qty').focus();
            $(this).closest('tr').find('.inp-nilai').val(sub);
            var ppn = $(this).closest('tr').find('.inp-ppn').val();
            var nppn = toNilai(ppn)/100;
            var grand = sub+(nppn*sub);
            $(this).closest('tr').find('.inp-grand').val(grand);

            hitungTotalBrg();
        }
    });
    $('#input-grid-barang').on('change', '.inp-harga', function(){
        var hrg = $(this).closest('tr').find('.inp-harga').val();
        alert('test')
        var qty = $(this).closest('tr').find('.inp-qty').val();
        var sub = toNilai(hrg)*toNilai(qty);
        $(this).closest('tr').find('.inp-qty').focus();
        $(this).closest('tr').find('.inp-nilai').val(sub);
        var ppn = $(this).closest('tr').find('.inp-ppn').val();
        var nppn = toNilai(ppn)/100;
        var grand = sub+(nppn*sub);
        $(this).closest('tr').find('.inp-grand').val(grand);

        hitungTotalBrg();
    });
    $('#input-grid-barang').on('keydown', '.inp-qty', function(e){
        if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            var hrg = $(this).closest('tr').find('.inp-harga').val();
            var qty = $(this).closest('tr').find('.inp-qty').val();
            var sub = toNilai(hrg)*toNilai(qty);
            $(this).closest('tr').find('.inp-qty').focus();
            $(this).closest('tr').find('.inp-nilai').val(sub);
            var ppn = $(this).closest('tr').find('.inp-ppn').val();
            var nppn = toNilai(ppn)/100;
            var grand = sub+(nppn*sub);
            $(this).closest('tr').find('.inp-grand').val(grand);

            hitungTotalBrg();
        }
    });
    $('#input-grid-barang').on('change', '.inp-qty', function(){
        var hrg = $(this).closest('tr').find('.inp-harga').val();
        var qty = $(this).closest('tr').find('.inp-qty').val();
        var sub = toNilai(hrg)*toNilai(qty);
        $(this).closest('tr').find('.inp-qty').focus();
        $(this).closest('tr').find('.inp-nilai').val(sub);
        var ppn = $(this).closest('tr').find('.inp-ppn').val();
        var nppn = toNilai(ppn)/100;
        var grand = sub+(nppn*sub);
        $(this).closest('tr').find('.inp-grand').val(grand);

        hitungTotalBrg();
    });
    $('#input-grid-barang').on('keydown', '.inp-ppn', function(e){
        if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            var hrg = $(this).closest('tr').find('.inp-harga').val();
            var qty = $(this).closest('tr').find('.inp-qty').val();
            var sub = toNilai(hrg)*toNilai(qty);
            $(this).closest('tr').find('.inp-nilai').val(sub);
            var ppn = $(this).val();
            var nppn = toNilai(ppn)/100;
            var grand = sub+(nppn*sub);
            $(this).closest('tr').find('.inp-grand').val(grand);

            hitungTotalBrg();
        }
    });
    $('#input-grid-barang').on('change', '.inp-ppn', function(){
        var hrg = $(this).closest('tr').find('.inp-harga').val();
        var qty = $(this).closest('tr').find('.inp-qty').val();
        var sub = toNilai(hrg)*toNilai(qty);
        $(this).closest('tr').find('.inp-nilai').val(sub);
        var ppn = $(this).val();
        var nppn = toNilai(ppn)/100;
        var grand = sub+(nppn*sub);
        $(this).closest('tr').find('.inp-grand').val(grand);

        hitungTotalBrg();
    });

    $('#input-grid-barang').on('keydown','.inp-kode, .inp-nama, .inp-desk, .inp-harga, .inp-qty, .inp-nilai, .inp-ppn, .inp-grand',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-nama','.inp-desk','.inp-harga','.inp-qty','.inp-nilai','.inp-ppn','.inp-grand'];
        var nxt2 = ['.td-kode','.td-nama','.td-desk','.td-harga','.td-qty','.td-nilai','.td-ppn','.td-grand'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-2;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find("span.no-grid").text();
                    var kode = $(this).val();
                    var target1 = "barangke"+noidx;
                    var target2 = "nmbarangke"+noidx;
                    getKelBarangGrid(kode,target1,target2,'tab');                    
                    break;
                case 1:
                    $("#input-grid-barang td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    break;
                case 2:
                    if($.trim($(this).val()).length){
                        $("#input-grid-barang td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Deskripsi yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 3:
                    if(isi != "" && isi != 0){
                        $("#input-grid-barang td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        // hitungTotal();
                    }else{
                        alert('Nilai yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 4:
                    if(isi != "" && isi != 0){
                        $("#input-grid-barang td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        // hitungTotal();
                    }else{
                        alert('Qty yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 5:
                    if(isi != "" && isi != 0){
                        $("#input-grid-barang td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        // hitungTotal();
                    }else{
                        alert('Subtotal yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 6:
                    if(isi != "" && isi != 0){
                        $("#input-grid-barang td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        // hitungTotal();
                    }else{
                        alert('PPN yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 7:
                    if(isi != "" && isi != 0){
                        $("#input-grid-barang td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        var cek = $(this).parents('tr').next('tr').find('.td-kode');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row-barang').click();
                        }
                        // hitungTotal();
                    }else{
                        alert('Grand total yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                default:
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });
    $('#input-grid-barang').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-grid-barang td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
                console.log(idx);
                var kode_jab = $(this).parents("tr").find(".inp-kode").val();
                var nama_jab = $(this).parents("tr").find(".inp-nama").val();
                var deskripsi = $(this).parents("tr").find(".inp-desk").val();
                var harga = $(this).parents("tr").find(".inp-harga").val();
                var qty = $(this).parents("tr").find(".inp-qty").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var ppn = $(this).parents("tr").find(".inp-ppn").val();
                var grand = $(this).parents("tr").find(".inp-grand").val();
                var no = $(this).parents("tr").find("span.no-grid").text();
                $(this).parents("tr").find(".inp-kode").val(kode_jab);
                $(this).parents("tr").find(".td-kode").text(kode_jab);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-barang").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-barang").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nama").val(nama_jab);
                $(this).parents("tr").find(".td-nama").text(nama_jab);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }

                $(this).parents("tr").find(".inp-desk").val(deskripsi);
                $(this).parents("tr").find(".td-desk").text(deskripsi);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-desk").show();
                    $(this).parents("tr").find(".td-desk").hide();
                    $(this).parents("tr").find(".inp-desk").focus();
                }else{
                    $(this).parents("tr").find(".inp-desk").hide();
                    $(this).parents("tr").find(".td-desk").show();
                }

                $(this).parents("tr").find(".inp-harga").val(harga);
                $(this).parents("tr").find(".td-harga").text(harga);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-harga").show();
                    $(this).parents("tr").find(".td-harga").hide();
                    $(this).parents("tr").find(".inp-harga").focus();
                }else{
                    $(this).parents("tr").find(".inp-harga").hide();
                    $(this).parents("tr").find(".td-harga").show();
                }

                
                $(this).parents("tr").find(".inp-qty").val(qty);
                $(this).parents("tr").find(".td-qty").text(qty);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-qty").show();
                    $(this).parents("tr").find(".td-qty").hide();
                    $(this).parents("tr").find(".inp-qty").focus();
                }else{
                    $(this).parents("tr").find(".inp-qty").hide();
                    $(this).parents("tr").find(".td-qty").show();
                }

                $(this).parents("tr").find(".inp-nilai").val(nilai);
                $(this).parents("tr").find(".td-nilai").text(nilai);
                if(idx == 7){
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }

                
                $(this).parents("tr").find(".inp-ppn").val(ppn);
                $(this).parents("tr").find(".td-ppn").text(ppn);
                if(idx == 8){
                    $(this).parents("tr").find(".inp-ppn").show();
                    $(this).parents("tr").find(".td-ppn").hide();
                    $(this).parents("tr").find(".inp-ppn").focus();
                }else{
                    $(this).parents("tr").find(".inp-ppn").hide();
                    $(this).parents("tr").find(".td-ppn").show();
                }

                $(this).parents("tr").find(".inp-grand").val(grand);
                $(this).parents("tr").find(".td-grand").text(grand);
                if(idx == 9){
                    $(this).parents("tr").find(".inp-grand").show();
                    $(this).parents("tr").find(".td-grand").hide();
                    $(this).parents("tr").find(".inp-grand").focus();
                }else{
                    $(this).parents("tr").find(".inp-grand").hide();
                    $(this).parents("tr").find(".td-grand").show();
                }
            }
        }
    });
     $('#input-grid-barang').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-grid').each(function(){
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        hitungTotalRowBarang();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    $('#input-grid-barang').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        var modul = '';
        var header = [];
        
        switch(par){
            case 'kode_jab[]': 
                var par2 = "nama_jab[]";
            break;
        }

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        console.log(tmp);
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        console.log(tmp);
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        showFilter(par,target1,target2);
    });
    // END EVENT CHANGE //
    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='simple-icon-reload' style='font-size:18px'></i></a>";
    var dataTable = $('#table-data').DataTable({
            destroy: true,
            bLengthChange: false,
            sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            "ordering": true,
            "order": [[6, "desc"]],
            'ajax': {
                'url': "{{url('apv/juskeb')}}",
                'async':false,
                'type': 'GET',
                'dataSrc' : function(json) {
                    if(json.status){
                        return json.daftar;   
                    }else if(!json.status && json.message == "Unauthorized"){
                        window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                        return [];
                    }else{
                        return [];
                    }
                }
            },
            'columnDefs': [
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
                    'targets': [6,7], 
                    'className': 'text-right',
                    'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
                },
                {
                    'targets': 8, data: null, 'defaultContent': action_html 
                },
                {
                    "targets": [3,4,5],
                    "visible": false
                }
            ],
            'columns': [
                { data: 'no_bukti' },
                { data: 'no_dokumen' },
                { data: 'nama_pp' },
                { data: 'waktu' },
                { data: 'kegiatan' },
                { data: 'posisi' },
                { data: 'nilai' },
                { data: 'nilai_finish' },
            ],
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");
                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
                $('#table-data thead.th-remove').remove();
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                // lengthMenu: "Items Per Page _MENU_"
                "lengthMenu": 'Menampilkan <select>'+
                '<option value="10">10 per halaman</option>'+
                '<option value="25">25 per halaman</option>'+
                '<option value="50">50 per halaman</option>'+
                '<option value="100">100 per halaman</option>'+
                '</select>',
                
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            }
        });
    $.fn.DataTable.ext.pager.numbers_length = 5;
        
    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#input-grid-barang tbody').empty();
        $('input[data-input="cbbl"]').val('');
        $('[id^=label]').html('');
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Pengajuan');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode').attr('readonly', false);
        $('#saku-datatable').hide();
        addRowBarangDefault();
        getPP(userPP);
        $('#saku-form').show();
    });
    // END BUTTON TAMBAH

    // BUTTON KEMBALI
    $('#slide-history').on('click', '.btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
        $('#slide-history').hide();
    });

    $('#slide-print').on('click', '.btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
        $('#slide-print').hide();
    });

    $('#saku-form').on('click', '.btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_fs').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
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
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode').val();
            if(parameter == "edit"){
                var url = "{{ url('apv/juskeb') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('apv/juskeb') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
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
                        $('#input-grid-barang tbody').empty();
                        $('#input-grid-dokumen tbody').empty();
                        $('#input-grid-catatan tbody').empty();
                        dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Pengajuan');
                        $('#method').val('post');
                        $('#kode').attr('readonly', false);
                        $('input[data-input="cbbl"]').val('');
                        $('[id^=label]').html('');
                        addRowGridBarang();
                        printAju(kode);
                        // msgDialog({
                        //     id:kode,
                        //     type:'simpan'
                        // });
                        last_add("no_bukti",kode);
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
            // $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END BUTTON SIMPAN

    // BUTTON EDIT TABLE //
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#form-tambah').validate().resetForm();
        $('#input-grid tbody').empty();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Role');
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/juskeb') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                console.log(res);
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#id').val(id);
                    $('#tanggal').val(reverseDateNew(result.data[0].tanggal,'-','/'));
                    $('#waktu').val(reverseDateNew(result.data[0].waktu,'-','/'));
                    getPP(result.data[0].kode_pp);
                    getKota(result.data[0].kode_kota, result.data[0].kode_pp);
                    getNIK(result.data[0].nik_ver);
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#kegiatan').val(result.data[0].kegiatan);
                    $('#dasar').val(result.data[0].dasar);
                    $('#pic').val(result.data[0].pemakai);
                    $('#total').val(parseFloat(result.data[0].nilai));
                    if(result.data_detail.length > 0) {
                        var input = "";  
                        var no = 1;
                        for(var i=0;i<result.data_detail.length;i++) {
                            var data = result.data_detail[i];
                            var barang = getOneKlpBarang(result.data_detail[0].barang_klp); 
                            input += "<tr class='row-grid'>";
                            input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td><span class='td-kode tdbarangke"+no+" tooltip-span'>"+data.barang_klp+"</span><input autocomplete='off' type='text' name='barang_klp[]' class='form-control inp-kode barangke"+no+" hidden' value='"+data.barang_klp+"' required='' style='z-index: 1;position: relative;'  id='barangkode"+no+"'><a href='#' class='search-item search-barang hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama tdnmbarangke"+no+" tooltip-span'>"+barang.name+"</span><input autocomplete='off' type='text' name='barang_nama[]' class='form-control inp-nama nmbarangke"+no+" hidden'  value='"+barang.name+"' readonly></td>";
                            input += "<td><span class='td-desk tddeskke"+no+" tooltip-span'>"+data.barang+"</span><input autocomplete='off' type='text' name='barang[]' class='form-control inp-desk deskke"+no+" hidden'  value='"+data.barang+"' required></td>";
                            input += "<td class='text-right'><span class='td-harga tdhrgke"+no+" tooltip-span'>"+toRp(parseFloat(data.harga))+"</span><input autocomplete='off' type='text' name='harga[]' class='form-control inp-harga hargake"+no+" hidden'  value='"+toRp(parseFloat(data.harga))+"' required></td>";
                            input += "<td class='text-right'><span class='td-qty tdqtyke"+no+" tooltip-span'>"+toRp(parseFloat(data.jumlah))+"</span><input autocomplete='off' type='text' name='qty[]' class='form-control inp-qty qtyke"+no+" hidden'  value='"+toRp(parseFloat(data.jumlah))+"' required></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilaike"+no+" tooltip-span'>"+toRp(parseFloat(data.nilai))+"</span><input autocomplete='off' type='text' name='nilai[]' class='form-control inp-nilai nilaike"+no+" hidden'  value='"+toRp(parseFloat(data.nilai))+"' required readonly></td>";
                            input += "<td class='text-right'><span class='td-ppn tdppnke"+no+" tooltip-span'>"+toRp(parseFloat(data.ppn))+"</span><input autocomplete='off' type='text' name='ppn[]' class='form-control inp-ppn ppnke"+no+" hidden'  value='"+toRp(parseFloat(data.ppn))+"' required></td>";
                            input += "<td class='text-right'><span class='td-grand tdgrandke"+no+" tooltip-span'>"+toRp(parseFloat(data.grand_total))+"</span><input autocomplete='off' type='text' name='grand_total[]' class='form-control inp-grand grandke"+no+" hidden'  value='"+toRp(parseFloat(data.grand_total))+"' required readonly></td>";
                            input += "</tr>";

                            no++;   
                        }
                        $('#input-grid-barang tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        var no = 1;
                        for(var i=0;i<result.data_detail.length;i++) {
                             $('#barangkode'+no).typeahead({
                                source:$dtKlpBarang,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
                            $('.hargake'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.qtyke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.nilaike'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.ppnke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.grandke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            no++;
                        }
                        if(result.data_dokumen.length > 0) {
                            var input = "";  
                            var no = 1;
                            for(var i=0;i<result.data_dokumen.length;i++) { 
                                var data = result.data_dokumen[i];
                                input += "<tr class='row-upload'>";
                                input += "<td class='no-upload text-center'>"+no+"</td>";
                                input += "<td class='text-center'><a class='hapus-item' title='Hapus' style='cursor:pointer; font-size=18px;'><i class='simple-icon-trash'></i></a>&nbsp;&nbsp;<a class='download-item' title='Download' style='cursor:pointer; font-size:18px;' href='http://api.simkug.com/api/apv/storage/"+data.file_dok+"' target='_blank'><i class='iconsminds-data-download'></i></a></td>";
                                input += "<td><input type='text' name='nama_file[]' value='"+data.nama+"' class='form-control inp-file_dok'></td>";
                                input += "<td><span>"+data.file_dok+"</span><input type='hidden' name='nama_dok[]' value='"+data.file_dok+"' class='inp-file_dok' readonly></td>";
                                input += "<td><input type='file' name='file_dok[]' class='inp-file_dok'></td>";
                                input += "</tr>";

                                no++;
                            }
                            $('#input-grid-dokumen tbody').html(input);
                        }
                    }
                    hitungTotalRowBarang();
                    hitungTotalRowDokumen();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });
    // END BUTTON TABLE EDIT //

    // PREVIEW saat klik di list data //
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 5){
            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>No Bukti</td>
                <td style='border:none'>`+data.no_bukti+`</td>
            </tr>
            <tr>
                <td>No Dokumen</td>
                <td>`+data.no_dokumen+`</td>
            </tr>
            <tr>
                <td>Regional</td>
                <td>`+data.nama_pp+`</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>`+reverseDateNew(data.waktu,'-','/')+`</td>
            </tr>
            <tr>
                <td>Kegiatan</td>
                <td>`+data.kegiatan+`</td>
            </tr>
            <tr>
                <td>Posisi</td>
                <td>`+data.posisi+`</td>
            </tr>
            <tr>
                <td>Nilai Pengadaan</td>
                <td>`+toRp(data.nilai)+`</td>
            </tr>
            <tr>
                <td>Nilai Finish</td>
                <td>`+toRp(data.nilai_finish)+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        $('#input-grid tbody').empty();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Role');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/role') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode').attr('readonly', true);
                    $('#kode').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#atas').val(parseFloat(result.data[0].atas));
                    $('#bawah').val(parseFloat(result.data[0].bawah));
                    $('#modul')[0].selectize.setValue(result.data[0].modul);
                    getPP(result.data[0].kode_pp);
                    if(result.data2.length > 0) {
                        var input = "";  
                        var no = 1;
                        for(var i=0;i<result.data2.length;i++) {
                            var data = result.data2[i];
                            input += "<tr class='row-grid'>";
                            input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td><span class='td-kode tdjabatanke"+no+" tooltip-span'>"+data.kode_role+"</span><input autocomplete='off' type='text' name='kode_jab[]' class='form-control inp-kode jabatanke"+no+" hidden' value='"+data.kode_role+"' required='' style='z-index: 1;position: relative;'  id='jabatankode"+no+"'><a href='#' class='search-item search-jabatan hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama tdnmjabatanke"+no+" tooltip-span'>"+data.kode_role+"</span><input autocomplete='off' type='text' name='nama_jab[]' class='form-control inp-nama nmjabatanke"+no+" hidden'  value='"+data.kode_role+"' readonly></td>";
                            input += "</tr>";

                            no++;   
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        var no = 1;
                        for(var i=0;i<result.data2.length;i++) {
                            $('#jabatankode'+no).typeahead({
                                source:$dtJabatan,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
                            no++;
                        }
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
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });
    // END PREVIEW saat klik di list data //

    // BUTTON PRINT //
    $('#saku-datatable').on('click','#btn-print',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        printAju(id);
    });
    // END BUTTON PRINT //
    
    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('apv/juskeb') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Pengajuan ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
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

    // END BUTTON HAPUS

    // FILTER DATA //
     $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var kode_pp = $('#inp-filter_regional').val();
                var bukti = $('#inp-filter_bukti').val();
                var col_kode_pp = data[2];
                var col_bukti = data[0];
                if(kode_pp != "" && bukti != ""){
                    if(kode_pp == col_kode_pp && bukti == col_bukti){
                        return true;
                    }else{
                        return false;
                    }
                }else if(kode_pp != "" && bukti == ""){
                    if(kode_pp == col_kode_pp) {
                        return true;
                    } else {
                        return false;
                    }
                }else if(kode_pp == "" && bukti != ""){
                    if(bukti == col_bukti) {
                        return true;
                    } else {
                        return false;
                    }
                } else{
                    return true;
                }
            }
        );
        dataTable.draw();
        $.fn.dataTable.ext.search.pop();
        $('#modalFilter').modal('hide');
    });

    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#inp-filter_regional')[0].selectize.setValue('');
        $('#inp-filter_bukti')[0].selectize.setValue('');
        jumFilter();
    });
        
    $('#filter-btn').click(function(){
        $('#modalFilter').modal('show');
    });

    $("#btn-close").on("click", function (event) {
        event.preventDefault();
        $('#modalFilter').modal('hide');
    });

    $('#btn-tampil').click();
    // END FILTER DATA //

    // CBBL
    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        var kode_pp = $('#kode_pp').val();
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'kode_pp': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('apv/unit') }}/" + userPP;
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Regional";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
                $target4 = "";
            break;
            case 'kode_kota': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('apv/kota') }}";
                var columns = [
                    { data: 'kode_kota' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Kota";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
                $target4 = "";
            break;
            case 'nik_ver': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('apv/nik_verifikasi') }}";
                var columns = [
                    { data: 'nik' },
                    { data: 'nama' }
                ];
                var judul = "Daftar NIK Verifikasi";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
                $target4 = "";
            break;
        }

        var header_html = '';
        var width = ["30%","70%"];
        for(i=0; i<header.length; i++){
            header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }

        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);
        var searchTable = $("#table-search").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            ajax: {
                "url": toUrl,
                "data": {'param':par,'kode_pp':kode_pp},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    console.log(json)
                    if(json.daftar == undefined) {
                        return json.data.data
                    } else {
                        return json.daftar
                    }
                }
            },
            columns: columns,
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            },
        });
        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');

                var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode).change();
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama).change();
                }else{
                    $($target2).text(nama);
                }

                if($target3 != ""){
                    $($target3).text(nama).change();
                }

                if($target4 != ""){
                    if($target4 == "2"){
                        $($target).parents("tr").find(".inp-kode").val(kode);
                        $($target).parents("tr").find(".td-kode").text(kode);
                        $($target).parents("tr").find(".inp-kode").hide();
                        $($target).parents("tr").find(".td-kode").show();
                        $($target).parents("tr").find(".search-jabatan").hide();
                        $($target).parents("tr").find(".inp-nama").show();
                        $($target).parents("tr").find(".td-nama").hide();
                       
                        setTimeout(function() {  $($target).parents("tr").find(".inp-nama").focus(); }, 100);
                    } else{
                        $($target).closest('tr').find($target4).click();
                    }
                }
                $('#modal-search').modal('hide');
            }
        });

        $(document).keydown(function(e) {
            if (e.keyCode == 40){ //arrow down
                var tr = searchTable.$('tr.selected');
                tr.removeClass('selected');
                tr.next().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }
            if (e.keyCode == 38){ //arrow up
                
                var tr = searchTable.$('tr.selected');
                searchTable.$('tr.selected').removeClass('selected');
                tr.prev().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }

            if (e.keyCode == 13){
                var kode = $('tr.selected').find('td:nth-child(1)').text();
                var nama = $('tr.selected').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode);
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else{
                    $($target2).text(nama);
                }
                
                if($target3 != ""){
                    $($target3).text(nama);
                }
                $('#modal-search').modal('hide');
            }
        })
    }

    $('#form-tambah').on('click', '.search-item2', function(){ //Bukan CBBL Grid //
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('input').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });
    //END SHOW CBBL//

    // PRINT PREVIEW //
    function printAju(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/juskeb_preview') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){ 
                var result = res.data;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        var det='';
                        var no=1;var total=0;
                        for(var i=0;i<result.data_detail.length;i++){
                            total+=+result.data_detail[i].grand_total;
                            det +=`<tr>
                                <td>`+no+`</td>
                                <td>`+result.data_detail[i].nama_klp+`</td>
                                <td>`+result.data_detail[i].barang+`</td>
                                <td class='text-right'>`+toRp(result.data_detail[i].harga)+`</td>
                                <td class='text-right'>`+toRp(result.data_detail[i].jumlah)+`</td>
                                <td class='text-right'>`+toRp(result.data_detail[i].nilai)+`</td>
                                <td class='text-right'>`+toRp(result.data_detail[i].ppn)+`%</td>
                                <td class='text-right'>`+toRp(result.data_detail[i].grand_total)+`</td>
                            </tr>`;
                            no++;
                        }
                        det +=`<tr>
                                <td colspan='7'>Total</td>
                                <td class='text-right'>`+toRp(total)+`</td>
                            </tr>`;

                        var no=1;var det2='';
                        for(var i=0;i<result.data_dokumen.length;i++){
                            det2 +=`<tr>
                                <td>`+result.data_dokumen[i].ket+`</td>
                                <td>`+result.data_dokumen[i].nama_kar+`/`+result.data_dokumen[i].nik+`</td>
                                <td>`+result.data_dokumen[i].nama_jab+`</td>
                                <td>`+result.data_dokumen[i].tanggal+`</td>
                                <td>`+result.data_dokumen[i].no_app+`</td>
                                <td>`+result.data_dokumen[i].status+`</td>
                                <td>&nbsp;</td>
                            </tr>`;
                            no++;
                        }
                        var html=`<div class="row">
                                <div class="col-12" style='border-bottom:3px solid black;text-align:center'>
                                    <h3>JUSTIFIKASI KEBUTUHAN</h3>
                                    <h3 id='print-kegiatan'>`+result.data[0].kegiatan+`</h3>
                                </div>
                                <div class="col-12 my-2" style='text-align:center'>
                                    <h6>Tanggal : <span id='print-tgl'>`+result.data[0].tanggal.substr(8,2)+' '+getNamaBulan(result.data[0].tanggal.substr(5,2))+' '+result.data[0].tanggal.substr(0,4)+`</span></h6>
                                    <h6>Nomor : <span id='print-no_dokumen'>`+result.data[0].no_dokumen+`</span></h6>
                                </div>
                                <div class="col-12">
                                    <table class="table table-condensed table-bordered" width="100%" id='table-m'>
                                        <tbody>
                                            <tr>
                                                <td width="5%">1</td>
                                                <td width="25">UNIT KERJA</td>
                                                <td width="70%" id='print-unit'>`+result.data[0].nama_pp+`</td>
                                            </tr>
                                            <tr>
                                                <td width="5%">2</td>
                                                <td width="25">NAMA KOTA</td>
                                                <td width="70%" id='print-unit'>`+result.data[0].nama_kota+`</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>NAMA KEGIATAN</td>
                                                <td id='print-kegiatan2'>`+result.data[0].kegiatan+`</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>SAAT PENGGUNAAN</td>
                                                <td id='print-waktu'>`+result.data[0].waktu.substr(8,2)+' '+getNamaBulan(result.data[0].waktu.substr(5,2))+' '+result.data[0].waktu.substr(0,4)+`</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <h6 style='font-weight:bold'># <u>LATAR BELAKANG</u></h6>
                                    <p>`+result.data[0].dasar+`</p>
                                </div>
                                <div class="col-12">
                                    <h6 style='font-weight:bold'># <u>KEBUTUHAN</u></h6>
                                </div>
                                <div class="col-12">
                                    <table class="table table-condensed table-bordered" width="100%" id="table-d">
                                        <thead>
                                            <tr>
                                                <td style="width:3%">No</td>
                                                <td style="width:15%">Kelompok Barang</td>
                                                <td style="width:30%">Deskripsi</td>
                                                <td style="width:10%">Harga</td>
                                                <td style="width:6%">Qty</td>
                                                <td style="width:15%">Jumlah Harga</td>
                                                <td style="width:6%">PPN</td>
                                                <td style="width:15%">Grand Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>`+det+`
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <h6 style='font-weight:bold'># <u>ESTIMASI BIAYA</u></h6>
                                    <p>Estimasi Biaya yang dibutuhkan untuk pengadaan tersebut adalah sebesar <span id='estimasi-biaya' style='text-transform: capitalize;'>`+'Rp. '+toRp(result.data[0].nilai)+' ( '+terbilang(result.data[0].nilai)+' Rupiah)'+`</span> </p>
                                </div>
                                <div class="col-12">
                                    <h6 style='font-weight:bold'># <u>PENUTUP</u></h6>
                                </div>
                                <div class="col-12">
                                    <table class="table table-condensed table-bordered" width="100%" id="table-penutup">
                                        <thead class="text-center">
                                            <tr>
                                                <td width="10%"></td>
                                                <td width="25">NAMA/NIK</td>
                                                <td width="15%">JABATAN</td>
                                                <td width="10%">TANGGAL</td>
                                                <td width="15%">NO APPROVAL</td>
                                                <td width="10%">STATUS</td>
                                                <td width="15%">TTD</td>
                                            </tr>
                                        </thead>
                                        <tbody>`+det2+`
                                        </tbody>
                                    </table>
                                </div>
                            </div>`;
                            $('#print-area').html(html);
                            $('#slide-print').show();
                            $('#saku-datatable').hide();
                            $('#saku-form').hide();
                    }
                }
            }
        });
    }
    // END PRINT PREVIEW //

    // HISTORY //
     $('#saku-datatable').on('click','#btn-history',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/juskeb_history') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        var html='';
                        
                        for(var i=0;i<result.data.length;i++){
                            if(result.data[i].color == 'green'){
                                var color = '#00c292';
                            }else{
                                var color = '#03a9f3';
                            }
                            
                            html +=`<div class="sl-item"> <div class="sl-left" style="margin-left: -65px;"> <div style="padding: 10px;border: 1px solid `+color+`;border-radius: 50%;background: `+color+`;color: white;width: 50px;text-align: center;"><i style="font-size: 25px;" class="fas fa-clipboard-check"></i> </div> 
                                </div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">`+result.data[i].nama+`</a> <span class="sl-date">`+result.data[i].tanggal+` (`+result.data[i].status+`)</span>
                                    <div class="row mt-3 mb-2">
                                        <div class="col-md-6">No Bukti : </div>
                                        <div class="col-md-6">`+result.data[i].no_bukti+`</div>
                                        <div class="col-md-6">Catatan : </div>
                                        <div class="col-md-6">`+result.data[i].keterangan+`</div>
                                    </div>
                            </div>
                            </div>
                            <hr>`;
                        }
                        
                        $('.profiletimeline').html(html);
                        $('#slide-history').show();
                        $('#saku-datatable').hide();
                        $('#saku-form').hide();
                    }
                } else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('silo-auth/logout') }}";
                    })
                } else{
                    var html = `
                    <div class="sl-item"> 
                        <div class="sl-left" style="margin-left: 0px;"> 
                            <div style="padding: 10px;border: 1px solid #959595;border-radius: 50%;background: #959595;color: white;width: 50px;text-align: center;"><i style="font-size: 25px;" class="simple-icon-envelope-letter"></i> 
                            </div> 
                        </div>
                        <div class="sl-right">
                            Belum ada proses approval.
                            <br>
                            <br>
                        <div>
                    </div>
                    <hr>`;
                    $('.profiletimeline').html(html);
                    $('#slide-history').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').hide();
                }
            }
        });
    });
    // END HISTORY //

    $('#tanggal,#waktu,#kode_pp,#kode_kota,#no_dokumen,#kegiatan,#dasar,#pic,#nik_ver,#total').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','waktu','kode_pp','kode_kota','no_dokumen','kegiatan','dasar','pic','nik_ver','total'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2 || idx == 3){
                $('#'+nxt[idx])[0].selectize.focus();
            }else{
                
                $('#'+nxt[idx]).focus();
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    </script> --}}