<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<style>
    div.inp-div-jenis > input{
        border-radius:0 !important;
        z-index:1;
        position:relative;
    }

    div.inp-div-jenis > .search-item{
        position: absolute;
        font-size: 18px;
        margin-top: -27px;
        z-index: 2;
        margin-left: 99px;
    }
    .btn-full-round{
        border-radius: 20px !important;
    }
    .btn-light3{
        background: #b3b3b3;
        color: white;
    }
    .icon-tambah{
        background: #505050;
        /* mask: url("{{ url('img/add.svg') }}"); */
        -webkit-mask-image: url("{{ url('img/add.svg') }}");
        mask-image: url("{{ url('img/add.svg') }}");
        width: 12px;
        height: 12px;
    }
    
    .popover{
        top: -80px !important;
    }

    .btn-back
    {
        line-height:1.5;padding: 0;background: none;appearance: unset;opacity: unset;right: -40px;position: relative;
        top: 5px;
        z-index: 10;
        float: right;
        margin-top: -30px;
    }
    .btn-back > span 
    {
        border-radius: 50%;padding: 0 0.45rem 0.1rem 0.45rem;font-size: 1.2rem !important;font-weight: lighter;box-shadow:0px 1px 5px 1px #80808054;
        color:white;
        background:red;
    }

    .btn-back > span:hover
    {
        color:white;
        background:red;
    }
    .card-body-footer{
        background: white;
        position: fixed;
        bottom: 15px;
        right: 0;
        margin-right: 30px;
        z-index:3;
        height: 60px;
        border-top: ;
        border-bottom-right-radius: 1rem;
        border-bottom-left-radius: 1rem;
        box-shadow: 0 -5px 20px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);
    }

    .card-body-footer > button{
        float: right;
        margin-top: 10px;
        margin-right: 25px;
    }

    .bold{
        font-weight:bold;
    }
    .modal p{
        color: #505050 !important;
    }
    .table-header-prev td,th{
        padding: 2px 8px !important;
    }
    #modal-preview .modal-content
    {
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
    }

    #modal-preview
    {
        top: calc(100vh - calc(100vh - 30px)) !important;
        overflow: hidden;
    }

    #modal-preview #content-preview 
    {
        height: calc(100vh - 105px) !important;
    }

    .animate-bottom {
        animation: animatebottom 0.5s;
    }

    @keyframes animatebottom {
        from {
            bottom: -400px;
            opacity: 0.8;
        }
        
        to {
            bottom: 0;
            opacity: 1;
        }
    }

    /* .bottom-sheet{
        max-height: 100% !important;
    }

    .bottom-sheet .modal.content{
        width: 60%; 
        margin: 0px auto
    } */

    </style>
<!-- LIST DATA -->
<x-list-data judul="Data Approval" tambah="" :thead="array('No Bukti', 'No Dokumen', 'PP', 'Tanggal', 'Keterangan', 'Aksi')" :thwidth="array(10,10,10,15,45,10)" :thclass="array('','','','','','text-center')" />
<!-- END LIST DATA -->

<!-- FORM  -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                        <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12" hidden>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tanggal">Tanggal Approval</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <input type="hidden" name="status" class="form-control" value="2" id="status">
                                    <!-- <label for="status">Status</label> -->
                                    <!-- <select class='form-control selectize' id="status" name="status">
                                        <option value="2" selected>Approved</option>
                                        <option value="3">Return</option>
                                    </select> -->
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <label for="nu">No Urut</label>
                                    <input class="form-control" type="text" placeholder="No Urut" id="nu" name="nu" readonly autocomplete="off" required >
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="form-row">
                       
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" type="text" rows="4" placeholder="Keterangan" id="keterangan" name="keterangan" autocomplete="off" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row mb-2">
                                <div class="col-md-6 col-sm-12">
                                    <label for="no_aju">No Pengajuan</label>
                                    <input class="form-control" type="text" placeholder="No Pengajuan" id="no_aju" name="no_aju" autocomplete="off" required readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="dokumen">No Dokumen</label>
                                    <input class="form-control" type="text" placeholder="No Dokumen" id="dokumen" name="no_dokumen" readonly autocomplete="off" required >
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 col-sm-12">
                                    <label for="deskripsi">Deskripsi Pengajuan</label>
                                    <input class="form-control" type="text" placeholder="Deskripsi Pengajuan" id="deskripsi" name="deskripsi" readonly autocomplete="off" required >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_pp">PP</label>
                                    <div class="input-group readonly">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control input-label-kode_pp" id="kode_pp" name="kode_pp" value="" title="">
                                        <span class="info-name_kode_pp hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        
                       
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#data-barang" role="tab" aria-selected="true"><span class="hidden-xs-down">Data RKM</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-dokumen-po" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Dokumen</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-approve" role="tab" aria-selected="false"><span class="hidden-xs-down">Catatan Approve</span></a></li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2rem;">
                        <div class="tab-pane active row" id="data-barang" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-barang" ></span></a>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered table-condensed gridexample input-grid" id="input-barang" data-table="Tab data barang" style="width:100%;table-layout:fixed;">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:5%;">No</th>
                                            <th style="width:40%;">Nama Barang</th>
                                            <th style="width:10%;">Satuan</th>
                                            <th style="width:10%;">Jumlah</th>
                                            <th style="width:20%;">Harga</th>
                                            <th style="width:25%;">Total</th>
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
                                <table class="table table-bordered table-condensed gridexample input-grid" id="input-dokumen-po" data-table="Tab data dokumen PO" style="width:100%;table-layout:fixed;">
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
                                <table class="table table-bordered table-condensed gridexample input-grid" id="input-approve" data-table="Tabel catatan approve" style="width:100%;table-layout:fixed;">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%;">No</th>
                                            <th style="width:15%;">NIK</th>
                                            <th style="width:25%;">Nama</th>
                                            <th style="width:10%;">Tanggal</th>
                                            <th style="width:10%;">Status</th>
                                            <th style="width:32%;">Keterangan</th>
                                            <th style="width:5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                        <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                            <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                        </div>
                        <div style="text-align: right;" class="col-md-2 p-0 ">
                            <button type="submit" style="margin-top: 10px;" id="btn-return" class="btn btn-warning"><i class=""></i> Return</button>
                            <button type="submit" style="margin-top: 10px;" id="btn-app" class="btn btn-success"><i class=""></i> Approve</button>
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
    setHeightForm();
    var scroll = document.querySelector('#content-preview');
    new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    new PerfectScrollbar(scrollform);
    $('.selectize').selectize();

    // function cekAksesForm(){
    //     // $('#grid-load').show();
    //     $.ajax({
    //         type: 'GET',
    //         url: "{{ url('siaga-trans/cek-akses-form') }}",
    //         dataType: 'json',
    //         data: { modul:'RKM' },
    //         async:false,
    //         success:function(result){
    //             if(!result.status){
    //                 $('#btn-tambah').hide();
    //                 // $('#saku-datatable #btn-edit').hide();
    //                 // $('#saku-datatable #btn-delete').hide();
    //                 $('#saku-datatable').hide();
    //                 msgDialog({
    //                     id: '-',
    //                     type: 'warning',
    //                     title: 'Form dilock',
    //                     text:  ( typeof result.message === 'object' ? JSON.stringify(result.message) : result.message )
    //                 });
    //             }
    //         },
    //         complete:function(){
    //             // $('#grid-load').hide();
    //         }
    //     });
    // }

    // cekAksesForm();

    $('#saku-form').on('click', '#btn-app', function(){
        $('#status').val(2);
    });
    
    $('#saku-form').on('click', '#btn-return', function(){
        $('#status').val(3);
    });

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
    
    // END SET UP VIEW
    // LIST DATA
    var action_html = "<a href='#' title='Approve' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('siaga-trans/app-aju') }}", 
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
            {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'no_dokumen' },
            { data: 'nama_pp' },
            { data: 'tanggal' },
            { data: 'keterangan' }
        ],
        "{{ url('siaga-auth/sesi-habis') }}",
        [[0 ,"asc"]]
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
            no_dokumen:{
                required: true,   
            },
            keterangan:{
                required: true,   
            },
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault()
            var parameter = $('#id_edit').val();
            var id = $('#id').val();
            var url = "{{ url('siaga-trans/app') }}";
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
                        if(result.data.no_pooling != undefined){
                            kirimWAEmail(result.data.no_pooling);
                        }
                        if(result.data.no_pooling2 != undefined){
                            kirimWAEmail(result.data.no_pooling2);
                        }
                        printPreview(kode, 'default')
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/siaga-auth/sesi-habis') }}";
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

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }
    
    // EDIT DATA
    function editData(id) { 
        $('#form-tambah').validate().resetForm();
        $('#input-barang tbody').empty();
        $('#input-dokumen-po tbody').empty();
        $('#input-approve tbody').empty();
        $('#judul-form').html('Form Approval');
        $.ajax({ 
            type: 'GET',
            url: "{{ url('siaga-trans/app-detail') }}",
            dataType: 'json',
            data:{no_aju: id},
            async:false,
            success:function(result) { 
                if(result.status) { 
                    $('#method').val('post');
                    $('#id').val(id);
                    $('#nu').val(result.data[0].no_urut);
                    $('#no_aju').val(result.data[0].no_bukti);
                    $('#dokumen').val(result.data[0].no_dokumen);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#deskripsi').val(result.data[0].keterangan);

                    if(result.data_detail.length > 0) { 
                        var html = "";
                        var no = 1;

                        for(var i=0;i<result.data_detail.length;i++) { 
                            var data = result.data_detail[i];
                            var idnama = 'nama-ke__'+no
                            var idsatuan = 'satuan-ke__'+no
                            var idjumlah = 'jumlah-ke__'+no
                            var idharga = 'harga-ke__'+no
                            var idnu = 'nu-ke__'+no
                            var idtotal = 'total-ke__'+no
                            var total = parseFloat(data.jumlah)*parseFloat(data.harga);

                            html += `
                                <tr class='row-grid'>
                                    <td class='no-grid text-center'>${no}</td>
                                    <td id='${idnama}'>
                                        <span id='text-${idnama}' class='tooltip-span'>${data.nama_brg}</span>
                                    </td>
                                    <td id='${idsatuan}'>
                                        <span id='text-${idsatuan}' class='tooltip-span'>${data.satuan}</span>
                                    </td>
                                    <td class='text-right' id='${idjumlah}'>
                                        <span id='text-${idjumlah}' class='tooltip-span'>${sepNum(data.jumlah)}</span>
                                    </td>
                                    <td class='text-right' id='${idharga}'>
                                        <span id='text-${idharga}' class='tooltip-span'>${sepNum(data.harga)}</span>
                                    </td>
                                    <td class='text-right' id='${idtotal}'>
                                        <span id='text-${idtotal}' class='tooltip-span'>${sepNum(total)}</span>
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
                            var url = "{{ config('api.doc_url_siaga') }}";
                            console.log(url);
                            html += `
                                <tr class='row-grid'>
                                    <td class='no-grid text-center'>${no}</td>
                                    <td id='${idDokumen}'>
                                        <span id='text-${idDokumen}' class='tooltip-span'>${data.kode_jenis}</span>
                                    </td>
                                    <td id='${idFile}' class='readonly'>
                                        <span id='text-${idFile}' class='tooltip-span'>${data.no_gambar}</span>
                                    </td>
                                    <td class='text-center'>
                                        <a class='download-item' style='font-size:12px;cursor:pointer;' href="${url+''+data.no_gambar}" target='_blank'><i class='simple-icon-cloud-download'></i></a>
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

                    if(result.data_histori.length > 0) { 
                        var html = "";
                        var no = 1;
                        for(var i=0;i<result.data_histori.length;i++) { 
                            var data = result.data_histori[i];
                            var idNik = 'nik-ke__'+no
                            var idNama = 'nama-ke__'+no
                            var idTgl = 'tgl-ke__'+no
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
                                    <td id='${idTgl}' class='readonly'>
                                        <span id='text-${idTgl}' class='tooltip-span'>${data.tgl}</span>
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
                    setWidthFooterCardBody();
                    showInfoField("kode_pp",result.data[0].kode_pp,result.data[0].nama_pp);
                } else if(!result.status && result.message === "Unauthorized"){
                    window.location.href = "{{ url('/siaga-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: ( typeof result.message === 'object' ? JSON.stringify(result.message) : result.message )
                    })
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
            url: "{{ url('siaga-trans/app-preview') }}",
            dataType: 'json',
            data:{id: id, jenis: jenis},
            async:false,
            success:function(result) {
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
                                                <td>: ${data.keterangan}</td>
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

    function kirimWAEmail(id){
        
        $.ajax({
            type: 'POST',
            url: "{{ url('siaga-trans/send-email') }}",
            dataType: 'json',
            data:{'no_pooling': id},
            async:false,
            success:function(res){
                console.log(res);
            }
        });
    }
</script>