<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('asset_silo/css/trans.css') }}" />

<!-- LIST DATA -->
<x-list-data judul="Data Approval Justifikasi Kebutuhan" tambah="" :thead="array('No Bukti', 'No Dokumen', 'Regional', 'Waktu', 'Kegiatan', 'Dasar', 'Nilai', 'Aksi')" :thwidth="array(15,25,20,10,30,25,15,10)" :thclass="array('','','','','','','','text-center')" />
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
                                    <label for="tanggal">Tanggal Approval</label>
                                    <span class="span-tanggal" id="span-tanggal"></span>
                                    <input class='form-control datepicker' id="tanggal" name="tanggal" autocomplete="off" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="status">Status</label>
                                    <select class='form-control' id="status" name="status">
                                        <option value="2" selected>Approved</option>
                                        <option value="3">Return</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <input class="form-control" type="text" placeholder="Keterangan" id="keterangan" name="keterangan" autocomplete="off" required >
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="no_aju">No Pengajuan</label>
                                    <input class="form-control" type="text" placeholder="No Pengajuan" id="no_aju" name="no_aju" autocomplete="off" required readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="dokumen">No Dokumen</label>
                                    <input class="form-control" type="text" placeholder="No Dokumen" id="dokumen" name="no_dokumen" readonly autocomplete="off" required >
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nu">No Urut</label>
                                    <input class="form-control" type="text" placeholder="No Urut" id="nu" name="nu" readonly autocomplete="off" required >
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="waktu">Waktu</label>
                                    <input class="form-control" type="text" placeholder="Waktu" id="waktu" name="waktu" autocomplete="off" required readonly >
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="kegiatan">Kegiatan</label>
                                    <input class="form-control" type="text" placeholder="Kegiatan" id="kegiatan" name="kegiatan" autocomplete="off" required readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="dasar">Dasar/Latar Belakang</label>
                                    <input class="form-control" type="text" placeholder="Dasar" id="dasar" name="dasar" autocomplete="off" required readonly>
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
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
                                            <th style="width:5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
                                            <th style="width:5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
<!-- END FORM  -->

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

<!-- MODAL FILTER -->
<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="modalFilter" aria-hidden="true">
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
    var action_html = "<a href='#' title='Approve' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('apv/juskeb_aju') }}", 
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
                'targets': [6], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )  
            },
            {'targets': 7, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'no_dokumen' },
            { data: 'nama_pp' },
            { data: 'waktu' },
            { data: 'kegiatan' },
            { data: 'dasar' },
            { data: 'nilai' }
        ],
        "{{ url('silo-auth/sesi-habis') }}",
        [[7 ,"desc"]]
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
    var $dtKlpBarang = [];

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

    function setBarang(kode) {
        var filter = $dtKlpBarang.filter(data => data.id === kode)
        return filter[0]
    }

    $('#tanggal').bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        container: '#span-tanggal',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        orientation: 'bottom left'
    })
    // END OPTIONAL CONFIG

    // GRID FORM 
        // GRID BARANG
        function hitungTotalRowBarang(){
            var total_row = $('#input-barang tbody tr').length;
            $('#total-barang').html(total_row+' Baris');
        }
        // END GRID BARANG
        // GRID DOKUMEN PO
        function hitungTotalRowDokumenPO(){
            var total_row = $('#input-dokumen-po tbody tr').length;
            $('#total-dokumen-po').html(total_row+' Baris');
        }
        // END GRID DOKUMEN PO
        // GRID DOKUMEN COMPARE
        function hitungTotalRowDokumenCompare(){
            var total_row = $('#input-dokumen-compare tbody tr').length;
            $('#total-dokumen-compare').html(total_row+' Baris');
        }
        // END GRID DOKUMEN COMPARE
        // GRID APPROVE
        function hitungTotalRowApprove(){
            var total_row = $('#input-approve tbody tr').length;
            $('#total-approve').html(total_row+' Baris');
        }
        // END GRID APPROVE
    // END GRID FORM

    // SIMPAN
    $('#form-tambah').validate({
        ignore: [],
        rules: {
            tanggal: {
                required: true,   
            },
            waktu: {
                required: true,   
            },
            status: {
                required: true,   
            },
            no_aju: {
                required: true,   
            },
            kode_pp: {
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
            total:{
                required: true,   
            },
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault()
            var parameter = $('#id_edit').val();
            var id = $('#id').val();
            var url = "{{ url('silo-trans/juskeb_app') }}";
            var pesan = "saved";
            var text = "Data tersimpan dengan kode";

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
                success: function(result){
                    if(result.data.status){
                        var kode = result.data.no_aju;
                        $('#input-barang tbody').empty();
                        $('#input-dokumen-po tbody').empty();
                        $('#input-dokumen-compare tbody').empty();
                        $('#input-approve tbody').empty();
                        dataTable.ajax.reload();
                        resetForm();
                        Swal.fire(
                            'Great Job!',
                            'Your data has been '+pesan+' '+result.data.message,
                            'success'
                        )
                        printPreview(kode, 'default')
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/silo-auth/sesi-habis') }}";
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            $('#btn-simpan').html("Simpan").removeAttr('disabled');
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
        $('#judul-form').html('Form Approval Justifikasi Kebutuhan');
        $.ajax({ 
            type: 'GET',
            url: "{{ url('apv/juskeb_app') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res) { 
                var result= res.data
                if(result.status) { 
                    $('#method').val('post');
                    $('#id').val(id);
                    $('#nu').val(result.data[0].no_urut);
                    $('#no_aju').val(result.data[0].no_bukti);
                    $('#dokumen').val(result.data[0].no_dokumen);
                    $('#kode_divisi').val(result.data[0].kode_divisi);
                    $('#waktu').val(reverseDateNew(result.data[0].waktu));
                    $('#kegiatan').val(result.data[0].kegiatan);
                    $('#dasar').val(result.data[0].dasar);
                    $('#total').val(parseFloat(result.data[0].nilai));
                    setRegional('kode_pp', result.data[0].kode_pp);
                    setKota(result.data[0].kode_pp, 'kode_kota', result.data[0].kode_kota);

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
                                    </td>
                                    <td id='${idDesk}'>
                                        <span id='text-${idDesk}' class='tooltip-span'>${data.barang}</span>
                                    </td>
                                    <td id='${idHarga}' class='text-right'>
                                        <span id='text-${idHarga}' class='tooltip-span'>${format_number(parseFloat(data.harga))}</span>
                                    </td>
                                    <td id='${idQty}' class='text-right'>
                                        <span id='text-${idQty}' class='tooltip-span'>${format_number(parseFloat(data.jumlah))}</span>
                                    </td>
                                    <td id='${idSubtotal}' class='text-right readonly'>
                                        <span id='text-${idSubtotal}' class='tooltip-span text-sub'>${format_number(parseFloat(data.nilai))}</span>
                                    </td>
                                    <td id='${idPPN}' class='text-right'>
                                        <span id='text-${idPPN}' class='tooltip-span'>${format_number(parseFloat(data.ppn))}</span>
                                    </td>
                                    <td id='${idTotal}' class='text-right readonly'>
                                        <span id='text-${idTotal}' class='tooltip-span text-grand'>${format_number(parseFloat(data.grand_total))}</span>
                                    </td>
                                </tr>
                            `;
                            no++;
                        }
                        $('#input-barang tbody').append(html)
                                
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
                                    </td>
                                    <td id='${idFile}' class='readonly'>
                                        <span id='text-${idFile}' class='tooltip-span'>${data.file_dok}</span>
                                    </td>
                                    <td class='text-center'>
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
                                    </td>
                                    <td id='${idFile}' class='readonly'>
                                        <span id='text-${idFile}' class='tooltip-span'>${data.file_dok}</span>
                                    </td>
                                    <td class='text-center'>
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

                    if(result.data_histori.length > 0) { 
                        var html = "";
                        var no = 1;
                        for(var i=0;i<result.data_histori.length;i++) { 
                            var data = result.data_histori[i];
                            var idNik = 'nik-ke__'+no
                            var idNama = 'nama-ke__'+no
                            var idStatus = 'status-ke__'+no
                            var idKeterangan = 'keterangan-ke__'+no
                            html += `
                                <tr class='row-grid'>
                                    <td class='no-grid text-center'>${no}</td>
                                    <td id='${idNik}' class='readonly'>
                                        <span id='text-${idNik}' class='tooltip-span'>${data.nik}</span>
                                    </td>
                                    <td id='${idNama}' class='readonly'>
                                        <span id='text-${idNama}' class='tooltip-span'>${data.nama}</span>
                                    </td>
                                    <td id='${idStatus}' class='readonly'>
                                        <span id='text-${idStatus}' class='tooltip-span'>${data.status}</span>
                                    </td>
                                    <td id='${idKeterangan}' class='readonly'>
                                        <span id='text-${idKeterangan}' class='tooltip-span'>${data.keterangan}</span>
                                    </td>
                                </tr>
                            `;
                                no++;
                        }
                        $('#input-approve tbody').append(html)
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        hitungTotalRowApprove()
                    }

                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                } else {
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                }
            } 
        })
    }
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        editData(id)
    });
    // END EDIT DATA

    // PRINT PREVIEW
    function printPreview(id, jenis) {
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/juskeb_app_preview') }}/" + id + "/" + jenis,
            dataType: 'json',
            async:false,
            success:function(res) {
                var result = res.data
                if(typeof result.data !== 'undefined' && result.data.length > 0) {
                    var html = "";
                    var no = 1;
                    var total = 0
                    var data = result.data[0]
                    html += `
                            <div class='row'>
                                <div class='col-12 text-center' style='margin-bottom:20px;'>
                                    <h3>TANDA TERIMA</h3>
                                </div>    
                                <div class='col-12'>
                                    <table class='table table-borderless table-condensed'>
                                        <tbody>
                                            <tr>
                                                <td style='width: 25%;'>ID Approval</td>
                                                <td style='width: 75%;'>: ${data.id}</td>
                                            </tr>
                                            <tr>
                                                <td>No Justifikasi Kebutuhan</td>
                                                <td>: ${data.no_bukti}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>: ${data.tanggal}</td>
                                            </tr>
                                            <tr>
                                                <td>PP</td>
                                                <td>: ${data.kode_pp} - ${data.nama_pp}</td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>: ${data.kegiatan}</td>
                                            </tr>
                                            <tr>
                                                <td>Nilai</td>
                                                <td>: Rp. ${format_number(data.nilai)}</td>
                                            </tr>
                                            <tr style='line-height: 40px;'>
                                                <td>Status</td>
                                                <td>: ${data.status}</td>
                                            </tr>    
                                            <tr>
                                                <td colspan='2'>Bandung, ${data.tgl.substr(0, 2)} ${getNamaBulan(data.tgl.substr(3, 2))} ${data.tgl.substr(6, 4)}</td>
                                            </tr>
                                            <tr>
                                                <td>Dibuat Oleh:</td>
                                                <td>&nbsp;&nbsp;</td>    
                                            </tr>
                                            <tr style='line-height: 80px;'>
                                                <td>Yang Menerima</td>
                                                <td class='text-center'>Yang Menyetujui</td>    
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;</td>
                                                <td class='text-center'>${data.nik}</td>
                                            </tr>
                                        </tbody>
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
        $('#saku-datatable').show()
        $('#saku-form').hide()
    });

    $('#saku-print #btn-cetak').click(function() {
        $('#print-content').printThis({
            importCSS: true,            // import parent page css
            importStyle: true,         // import style tags
            printContainer: true,       // print outer container/$.selector
        });
    });
    // END PRINT PREVIEW
</script>