<link rel="stylesheet" href="{{ asset('trans-new.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('form-new.css?version=_').time() }}" />
<style>
    #input-terima tbody td, #input-beri tbody td,#input-budget tbody td
    {
        overflow:hidden;
    }
    
    #input-beri td:nth-child(9), #input-terima td:nth-child(9)
    {
        overflow:unset !important;
    }
</style>
<!-- LIST DATA -->
<x-list-data judul="Data Approval" tambah="" :thead="array('No Bukti', 'NIK Buat', 'Unit Kerja', 'Periode', 'Keterangan', 'Aksi')" :thwidth="array(15,10,20,10,35,10)" :thclass="array('','','','','','text-center')" />
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
                    <button type="submit" id="btn-return" class="btn btn-warning float-right mr-4"><i class=""></i> Return</button>
                    <button type="submit" id="btn-app" class="btn btn-success float-right mr-2"><i class=""></i> Approve</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input class="form-control" type="hidden" id="nu" name="nu" readonly autocomplete="off" required >
                    <input class="form-control" type="hidden" id="status" name="status" readonly autocomplete="off" required >
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row mb-2">
                                <div class="col-md-12 col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" type="text" rows="4" placeholder="Keterangan" id="keterangan" name="keterangan" autocomplete="off" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input class="form-control" type="text" id="deskripsi" name="deskripsi" readonly autocomplete="off" required >
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row mb-2">
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_pp">Unit Kerja</label>
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
                                <div class="col-md-6 col-sm-12">
                                    <label for="periode">Periode</label>
                                    <input class="form-control" type="text" id="periode" name="periode" autocomplete="off" required readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 col-sm-12">
                                    <label for="no_aju">No Pengajuan</label>
                                    <input class="form-control" type="text" id="no_aju" name="no_aju" autocomplete="off" required readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nik_buat">Pembuat</label>
                                    <input class="form-control" type="text" id="nik_buat" name="nik_buat" readonly autocomplete="off" required >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_terima">Nilai Terima</label>
                                    <input class="form-control currency" type="text" id="total_terima" name="total_terima" autocomplete="off" required readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_beri">Total Pemberi</label>
                                    <input class="form-control currency" type="text" id="total_beri" name="total_beri" readonly autocomplete="off" required >
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-terima" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Penerima</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-beri" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Pemberi</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Berkas Bukti</span></a> </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#data-approve" role="tab" aria-selected="false"><span class="hidden-xs-down">Catatan Approve</span></a></li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2rem;">
                        <div class="tab-pane active" id="data-terima" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-terima" ></span></a>
                            </div>
                            <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-terima" style="width:1125px;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:15px">No</th>
                                        <th style="width:20px"></th>
                                        <th style="width:80px">Kode MTA</th>
                                        <th style="width:250px">Nama MTA</th>
                                        <th style="width:80px">Kode PP</th>
                                        <th style="width:200px">Nama PP</th>
                                        <th style="width:80px">Kode DRK</th>
                                        <th style="width:250px">Nama DRK</th>
                                        <th style="width:100px">TW</th>
                                        <th style="width:100px">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-beri" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-beri" ></span></a>
                            </div>
                            <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-beri" style="width:1125px;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:15px">No</th>
                                        <th style="width:20px"></th>
                                        <th style="width:80px">Kode MTA</th>
                                        <th style="width:200px">Nama MTA</th>
                                        <th style="width:80px">Kode PP</th>
                                        <th style="width:200px">Nama PP</th>
                                        <th style="width:80px">Kode DRK</th>
                                        <th style="width:200px">Nama DRK</th>
                                        <th style="width:100px">TW</th>
                                        <th style="width:100px">Saldo Awal</th>
                                        <th style="width:100px">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-dok" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                            </div>
                            <div class='col-md-12' style='margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-dok" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Jenis</th>
                                            <th style="width:27%">Nama</th>
                                            <th style="width:40%">Path File</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
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
    //         url: "{{ url('sukka-trans/cek-akses-form') }}",
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
        "{{ url('sukka-trans/app-rra-aju') }}", 
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
            { data: 'nik_buat' },
            { data: 'nama_pp' },
            { data: 'periode' },
            { data: 'keterangan' }
        ],
        "{{ url('sukka-auth/sesi-habis') }}",
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
    // GRID APPROVE
    function hitungTotalRowApprove(){
        var total_row = $('#input-approve tbody tr').length;
        $('#total-approve').html(total_row+' Baris');
    }

    function hitungTotalRowBeri(){
        var total_row = $('#input-beri tbody tr').length;
        $('#total-row-beri').html(total_row+' Baris');
    }

    function hitungTotalRowTerima(){
        var total_row = $('#input-terima tbody tr').length;
        $('#total-row-terima').html(total_row+' Baris');
    }

    function hitungTotalRowUpload(form){
        var total_row = $('#'+form+' #input-dok tbody tr').length;
        $('#total-row_dok').html(total_row+' Baris');
    }

    function hitungTotalBeri(){
        var total = 0;
        $('.row-beri').each(function(){
            var nilai = $(this).closest('tr').find('td:eq(9)').text();
            total += +toNilai(nilai);
        });
        $('#total_beri').val(total);
    }

    function hitungTotalTerima(){
        var total = 0;
        $('.row-terima').each(function(){
            var nilai = $(this).closest('tr').find('td:eq(8)').text();
            total += +toNilai(nilai);
        });
        $('#total_terima').val(total);
    }
    // END GRID APPROVE
    // END GRID FORM

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });   

    // SIMPAN
    $('#form-tambah').validate({
        ignore: [],
        rules: {
            periode: {
                required: true,   
            },
            jenis: {
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
            keterangan:{
                required: true,   
            },
            kegiatan:{
                required: true,   
            },
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault()
            var parameter = $('#id_edit').val();
            var id = $('#id').val();
            var url = "{{ url('sukka-trans/app-rra') }}";
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
                        window.location.href = "{{ url('/sukka-auth/sesi-habis') }}";
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
        $('#input-terima tbody').empty();
        $('#input-beri tbody').empty();
        $('#input-dok tbody').empty();
        $('#input-approve tbody').empty();
        $('#judul-form').html('Form Approval');
        $.ajax({ 
            type: 'GET',
            url: "{{ url('sukka-trans/app-rra-detail') }}",
            dataType: 'json',
            data:{no_aju: id},
            async:false,
            success:function(result) { 
                if(result.status) { 
                    $('#method').val('post');
                    $('#id').val(id);
                    $('#nu').val(result.data[0].no_urut);
                    $('#no_aju').val(result.data[0].no_bukti);
                    $('#nik_buat').val(result.data[0].nik_buat);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#deskripsi').val(result.data[0].keterangan);
                    $('#periode').val(result.data[0].periode);

                    if(result.detail_beri.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail_beri.length;i++){
                            var line =result.detail_beri[i];
                            if (line.bulan == "01")	var tw = "TW1";
                            if (line.bulan == "04")	var tw = "TW2";
                            if (line.bulan == "07")	var tw = "TW3";
                            if (line.bulan == "10")	var tw = "TW4";	
                            input += "<tr class='row-beri'>";
                            input += "<td class='no-beri text-center' colspan='2'>"+no+"</td>";
                            input += "<td>"+line.kode_akun+"</td>";
                            input += "<td>"+line.nama_akun+"</td>";
                            input += "<td>"+line.kode_pp+"</td>";
                            input += "<td>"+line.nama_pp+"</td>";
                            input += "<td>"+line.kode_drk+"</td>";
                            input += "<td>"+line.nama_drk+"</td>";
                            input += "<td >"+tw+"</td>";
                            input += "<td class='text-right'>"+number_format(parseFloat(line.saldo))+"</td>";
                            input += "<td class='text-right'>"+number_format(parseFloat(line.nilai))+"</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-beri tbody').html(input);
                        $('.tooltip-span').attr('title','tooltip');
                        $('.tooltip-span').tooltip({
                            content: function(){
                                return $(this).text();
                            },
                            tooltipClass: "custom-tooltip-sai"
                        });
                        
                    }

                    if(result.detail_terima.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail_terima.length;i++){
                            var line =result.detail_terima[i];
                            if (line.bulan == "01")	var tw = "TW1";
                            if (line.bulan == "04")	var tw = "TW2";
                            if (line.bulan == "07")	var tw = "TW3";
                            if (line.bulan == "10")	var tw = "TW4";	
                            input += "<tr class='row-terima'>";
                            input += "<td class='no-terima text-center' colspan='2'>"+no+"</td>";
                            input += "<td>"+line.kode_akun+"</td>";
                            input += "<td>"+line.nama_akun+"</td>";
                            input += "<td>"+line.kode_pp+"</td>";
                            input += "<td>"+line.nama_pp+"</td>";
                            input += "<td>"+line.kode_drk+"</td>";
                            input += "<td>"+line.nama_drk+"</td>";
                            input += "<td >"+tw+"</td>";
                            input += "<td class='text-right'>"+number_format(parseFloat(line.nilai))+"</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-terima tbody').html(input);
                        $('.tooltip-span').attr('title','tooltip');
                        $('.tooltip-span').tooltip({
                            content: function(){
                                return $(this).text();
                            },
                            tooltipClass: "custom-tooltip-sai"
                        });
                    }

                    var input2 = "";
                    if(result.dokumen.length > 0){
                        var no=1;
                        for(var i=0;i<result.dokumen.length;i++){
                            var line =result.dokumen[i];
                            input2 += "<tr class='row-dok'>";
                            input2 += "<td class='no-dok text-center'>"+no+"</td>";
                            input2 += "<td class='px-0 py-0'>"+line.jenis+"</td>";
                            input2 += "<td class='px-0 py-0'>"+line.nama+"</td>";
                            var dok = "{{ config('api.url').'sukka-auth/storage' }}/"+line.fileaddres;
                            input2 += "<td>"+line.fileaddres+"</td>";
                            input2+=`
                                <td class='text-center action-dok'>`;
                                if(line.fileaddres != "-"){
                                   var link =`<a class='download-dok' href='`+dok+`'target='_blank' title='Download'><i style='font-size:18px' class='simple-icon-cloud-download'></i></a>&nbsp;&nbsp;&nbsp;`;
                                }else{
                                    var link =``;
                                }
                            input2+=link+"</td></tr>";
                            no++;
                        }
                    }
                    $('#form-tambah #input-dok tbody').html(input2);

                    if(result.data_detail.length > 0) { 
                        var html = "";
                        var no = 1;
                        for(var i=0;i<result.data_detail.length;i++) { 
                            var data = result.data_detail[i];
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
                    hitungTotalRowApprove();
                    hitungTotalRowBeri();
                    hitungTotalRowTerima();
                    hitungTotalRowUpload();
                    hitungTotalBeri();
                    hitungTotalTerima();
                    setWidthFooterCardBody();
                    showInfoField("kode_pp",result.data[0].kode_pp,result.data[0].nama_pp);
                } else if(!result.status && result.message === "Unauthorized"){
                    window.location.href = "{{ url('/sukka-auth/sesi-habis') }}";
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
            url: "{{ url('sukka-trans/app-rra-preview') }}",
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
                                    <h6>TANDA TERIMA</h6>
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
            url: "{{ url('sukka-trans/app-rra-send-email') }}",
            dataType: 'json',
            data:{'no_pooling': id},
            async:false,
            success:function(res){
                console.log(res);
            }
        });
    }
</script>