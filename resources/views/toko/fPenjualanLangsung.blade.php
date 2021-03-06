<style>
#edit-qty
{
    cursor:pointer;
}

#pbyr
{
    cursor:pointer;
}

.table-input th{
    padding: 4px !important;
    border:none !important;
}

.form-group.row{
   margin-bottom:5px !important;
}

#getCust,#search-kode_kirim,#search-provinsi,#search-kota,#search-kecamatan,#search-service
{
    cursor:pointer;
}

</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" id="web-form-pos" method="POST">
                        <div class="row mb-2">
                            <div class="col-12 text-right">                                   
                                <button type="submit" class="btn btn-info float-right" style="margin-right: 0;">Simpan</button>
                            </div>                                     
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="logo text-center"><img src="{{url('asset_elite/images/sai_icon/logo.png')}}" width="40px" alt="homepage" class="light-logo" /><br/>
                                            <img src="{{url('asset_elite/images/sai_icon/logo-text.png')}}" class="light-logo" alt="homepage" width="40px"/>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="label-header">
                                            <h6>{{ date("Y-m-d H:i:s") }}</h6>
                                            <h6 style="color:#007AFF"><i class="fa fa-user"></i> {{ Session::get('userLog') }} <span id="no_open"></span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <h5>Nilai Transaksi</h5>
                                <div class="row float-right">
                                    <div class="text-left" id="edit-qty" style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px">
                                        <img style="width:30px;height:30px;position:absolute" src="{{url('asset_elite/img/edit.png')}}">
                                        <h6 style="font-size: 10px;padding-left: 35px;margin-bottom: 0;margin-top: 5px;text-align:center">Edit Qty</h6>
                                        <h6 style="font-size: 9px;padding-left: 35px;text-align:center">F7</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3><input type="text" style="font-size: 40px;"  name="total_stlh" min="1" class="form-control currency" id="tostlh" required readonly></h3>
                            </div>
                            <ul class="nav nav-tabs ml-2 col-12 " role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-brg" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Barang</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-cust" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Customer</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-kirim" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Jasa Kirim</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border col-12 p-0">
                                <div class="tab-pane active" id="data-brg" role="tabpanel">
                                    <div class="col-12 mt-1" style="min-height:330px">
                                        <table class="table table-input" style="margin-bottom: 5px">
                                            <tr>
                                                <th style='padding: 3px;width:25%' colspan='2'>
                                                    <input type='text' class='form-control' placeholder="Barcode [F1]" id="kd-barang2" />
                                                </th>
                                                <th style='padding: 3px;width:25%' colspan='2'>
                                                    <select class='form-control' id="kd-barang">
                                                        <option value=''>--- Pilih Barang [CTRL+C] ---</option>
                                                    </select>
                                                </th>
                                                <th style='padding: 3px;width:5%'>Disc.</th>
                                                <th style='padding: 3px;width:20%'>
                                                    <input type='text' placeholder='Total Disc.' value="0" name="total_disk" class='form-control currency' id='todisk' required />
                                                </th>
                                                <th style='padding: 3px;width:5%'>Total</th>
                                                <th style='padding: 3px;width:20%'>
                                                    <input type='text' name="total_trans" min="1" class='form-control currency' id='nilai_pesan' required readonly/>
                                                </th>
                                            </tr>
                                        </table>
                                        <div class="col-12" style="overflow-y: scroll; height:250px; margin:0px; padding:0px;">
                                            <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2">
                                                <tr>
                                                    <th style="width:30%">Barang</th>
                                                    <th style="width:15%">Harga</th>
                                                    <th style="width:10%">Qty</th>
                                                    <th style="width:20%">Subtotal</th>
                                                    <th style="width:15%">Disc</th>
                                                    <th style="width:10%"></th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="data-cust" role="tabpanel">
                                    <div class="col-12 mt-2" style="min-height:328px">
                                        <div class="form-group row">   
                                            <label for="kode_cust" class="col-2 col-form-label">Kode Customer</label>
                                            <div class="col-3">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Kode Customer" id="kode_cust" name="kode_cust">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" id="getCust" type="button"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label for="nama" class="col-2 col-form-label">Nama</label>
                                            <div class="col-3">
                                                <input class="form-control" type="text" placeholder="Nama Customer" id="nama" name="nama">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_tel" class="col-2 col-form-label">No Telp</label>
                                            <div class="col-3">
                                                <input class="form-control" type="text" placeholder="Nomor Telepon" id="no_tel" name="no_tel">
                                            </div>
                                        </div>
                                        <div class="form-group row">   
                                            <label for="provinsi" class="col-2 col-form-label">Provinsi</label>
                                            <div class="col-3">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Provinsi" id="provinsi" name="provinsi">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" id="search-provinsi" type="button"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_provinsi" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">   
                                            <label for="kota" class="col-2 col-form-label">Kota</label>
                                            <div class="col-3">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Kota" id="kota" name="kota">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" id="search-kota" type="button"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_kota" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">   
                                            <label for="kecamatan" class="col-2 col-form-label">Kecamatan</label>
                                            <div class="col-3">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Kecamatan" id="kecamatan" name="kecamatan">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" id="search-kecamatan" type="button"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_kecamatan" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-2 col-form-label">Alamat</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" placeholder="Alamat Customer" id="alamat" name="alamat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="data-kirim" role="tabpanel">
                                    <div class="col-12 mt-2" style="min-height:328px">
                                        <div class="form-group row">   
                                            <label for="kode_kirim" class="col-2 col-form-label">Jasa Kirim</label>
                                            <div class="col-3">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Jasa Kirim" id="kode_kirim" name="kode_kirim">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" id="search-kode_kirim" type="button"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_kode_kirim" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="berat" class="col-2 col-form-label">Berat Produk (gram)</label>
                                            <div class="col-3">
                                                <input class="form-control currency" type="text" id="berat" value="0" name="berat" >
                                            </div>
                                        </div>
                                        <div class="form-group row">   
                                            <label for="service" class="col-2 col-form-label">Service Kirim</label>
                                            <div class="col-3">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Service kirim" id="service" name="service">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" id="search-service" type="button"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_service" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nilai_ongkir" class="col-2 col-form-label">Nilai Ongkir</label>
                                            <div class="col-3">
                                                <input class="form-control currency" type="text" id="nilai_ongkir" value="0" name="nilai_ongkir" readonly>
                                            </div>
                                            <label for="lama_hari" class="col-2 col-form-label">Lama pengiriman</label>
                                            <div class="col-3">
                                                <input class="form-control text" type="text" id="lama_hari" value="" name="lama_hari" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="catatan" class="col-2 col-form-label">Catatan</label>
                                            <div class="col-10">
                                                <textarea class="form-control" id="catatan" name="catatan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="area_print"></div>
</div>

<!-- FORM EDIT MODAL -->
<div class='modal' id='modal-edit' tabindex='-1' role='dialog'>
    <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <form id='form-edit-barang'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Edit Barang</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class="form-group row mt-40">
                            <label for="judul" class="col-3 col-form-label">Barang</label>
                            <div class="col-9">
                                <select class='form-control' id='modal-edit-kode' readonly>
                                    <option value=''>--- Pilih Barang ---</option>
                                </select>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Harga</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' readonly maxlength='100' id='modal-edit-harga'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Disc</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' maxlength='100' id='modal-edit-disc' >
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Qty</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency ' maxlength='100' id='modal-edit-qty'>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' id='edit-submit' class='btn btn-primary'>Simpan</button> 
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-bayar2" tabindex="-1" role="dialog" aria-modal="true">
    <div role="document" style="" class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px !important;">
            <div class="modal-header " style="display:block">
                <div class="row text-center" style="">
                    <div class="col-md-12">
                        <h5 class="">Total Transaksi</h5>
                        <h5 id="modal-no_bukti" hidden></h5>
                        <h1 class="text-info" id="modal-total_all"></h1>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row mb-2" style="">
                    <div class="col-6" style="">
                    Total Transaksi
                    </div>
                    <div class="col-6 text-right" id="modal-total_trans">
                    </div>
                </div>
                <div class="row mb-2">
                <div class="col-6">
                    Diskon 
                    </div>
                    <div class="col-6 text-right" id="modal-diskon">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                    Nilai Ongkir
                    </div>
                    <div class="col-6 text-right" id="modal-nilai_ongkir">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                    Lama Pengiriman (hari)
                    </div>
                    <div class="col-6 text-right" id="modal-lama_kirim">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 0;">
            <button id="cetakBtn" type="button" class="btn btn-info btn-block" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;margin:0">Cetak</button>
            </div>
        </div>
    </div>
</div>

@include('searchModal')
<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{url('asset_elite/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_elite/jquery.formnavigation.js')}}"></script>
<!-- <script src="{{ asset('asset_elite/inputSearch.js') }}" ></script>  -->

<script type="text/javascript">
    var $dtBrg = new Array();
    var $dtBrg2 = new Array();
    var $no_open = "";
    $('#kd-barang2').focus();
    $('#area_print').hide();

    document.onkeyup = function(e) {
        if (e.ctrlKey && e.which == 66) {
            $('#kd-barang2').focus();
        }
        if (e.ctrlKey && e.which == 67) {
            $('#kd-barang-selectized').focus();
        }
        if (e.which == 118) {
            // $('.inp-qtyb').prop('readonly');
            $('.inp-qtyb').prop('readonly', false);
            $('.inp-qtyb').first().focus();
            $('.inp-qtyb').first().select();
        }
        if (e.which == 112) {
            $('#kd-barang2').focus();
        }
        if (e.which == 119) {
            $('#tobyr').focus();
        }
    };

    function showFilter(param,target1,target2){
        var par = param;

        var modul = '';
        var header = [];
        var target1 = target1;
        var target2 = target2;
        var target3 = "";
        var target4 = "";
        var parameter = {};
        switch(par){
            case 'kode_kirim': 
                header = ['Kode Kirim', 'Nama'];
            var toUrl = "{{ url('toko-master/jasa-kirim') }}";
                var columns = [
                    { data: 'kode_kirim' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Jasa Kirim";
                var jTarget1 = "val";
                var jTarget2 = "text";
                target1 = "#"+target1;
                target2 = "#"+target2;
                parameter = {'param':par};
            break;
            case 'provinsi': 
                header = ['ID Provinsi', 'Nama'];
                var toUrl = "{{ url('toko-trans/provinsi') }}";
                var columns = [
                    { data: 'province_id' },
                    { data: 'province' }
                ];
                
                var judul = "Daftar Provinsi";
                var jTarget1 = "val";
                var jTarget2 = "text";
                target1 = "#"+target1;
                target2 = "#"+target2;
                parameter = {'param':par};
            break;
            case 'kota': 
                header = ['ID Kota', 'Nama','Tipe'];
                var toUrl = "{{ url('toko-trans/kota') }}";
                var columns = [
                    { data: 'city_id' },
                    { data: 'city_name' },
                    { data: 'type' }
                ];
                
                var judul = "Daftar Kota";
                var jTarget1 = "val";
                var jTarget2 = "text";
                target1 = "#"+target1;
                target2 = "#"+target2;
                var provinsi = $('#provinsi').val();
                parameter = {'province':provinsi};
            break;
            case 'kecamatan': 
                header = ['ID Kecamatan', 'Nama'];
                var toUrl = "{{ url('toko-trans/kecamatan') }}";
                var columns = [
                    { data: 'subdistrict_id' },
                    { data: 'subdistrict_name' }
                ];
                
                var judul = "Daftar Kecamatan";
                var jTarget1 = "val";
                var jTarget2 = "text";
                target1 = "#"+target1;
                target2 = "#"+target2;
                var provinsi = $('#provinsi').val();
                var kota = $('#kota').val();
                parameter = {'province':provinsi,'city':kota};
            break;
            case 'service': 
                header = ['Service','Description','Nilai','Lama Hari'];
                var toUrl = "{{ url('toko-trans/service') }}";
                var columns = [
                    { data: 'service' },
                    { data: 'description' },
                    { data: 'cost' },
                    { data: 'etd' }
                ];
                
                var judul = "Daftar Nilai Ongkir";
                var jTarget1 = "val";
                var jTarget2 = "text";
                var jTarget3 = "val";
                var jTarget4 = "val";
                target1 = "#"+target1;
                target2 = "#"+target2;
                target3 = "#nilai_ongkir";
                target4 = "#lama_hari";
                var kecamatan = $('#kecamatan').val();
                var weight = toNilai($('#berat').val());
                var courier = $('#kode_kirim').val();
                parameter = {'destination':kecamatan,'weight':weight,'courier':courier};
            break;
        }

        var header_html = '';
        for(i=0; i<header.length; i++){
            header_html +=  "<th>"+header[i]+"</th>";
        }
        header_html +=  "<th></th>";

        var table = "<table class='table table-bordered table-striped' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            // fixedHeader: true,
            // "scrollY": "300px",
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": toUrl,
                "data": parameter,
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            "columnDefs": [{
                "targets": header.length, "data": null, "defaultContent": "<a class='check-item'><i class='fa fa-check'></i></a>"
            }],
            'columns': columns
            // "iDisplayLength": 25,
        });

        // searchTable.$('tr.selected').removeClass('selected');
        $('#table-search tbody').find('tr:first').addClass('selected');
        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search').on('click','.check-item',function(){
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $(target1).val(kode);
                $(target1).trigger("change");
            }else{
                $(target1).text(kode);
            }

            if(jTarget2 == "val"){
                $(target2).val(nama);
                $(target2).trigger("change");
            }else{
                $(target2).text(nama);
            }

            if(target3 != ""){
                
                var value = $(this).closest('tr').find('td:nth-child(3)').text();
                if(jTarget3 == "val"){
                    $(target3).val(value);
                    $(target3).trigger("change");
                }else{
                    $(target3).text(value);
                }
            }
            if(target4 != ""){
                
                var value = $(this).closest('tr').find('td:nth-child(4)').text();
                if(jTarget4 == "val"){
                    $(target4).val(value);
                    $(target4).trigger("change");
                }else{
                    $(target4).text(value);
                }
            }
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('dblclick','tr',function(){
            console.log('dblclick');
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $(target1).val(kode);
                $(target1).trigger("change");
            }else{
                $(target1).text(kode);
            }

            if(jTarget2 == "val"){
                $(target2).val(nama);
                $(target2).trigger("change");
            }else{
                $(target2).text(nama);
            }

            if(target3 != ""){
                
                var value = $(this).closest('tr').find('td:nth-child(3)').text();
                if(jTarget3 == "val"){
                    $(target3).val(value);
                    $(target3).trigger("change");
                }else{
                    $(target3).text(value);
                }
            }
            if(target4 != ""){
                
                var value = $(this).closest('tr').find('td:nth-child(4)').text();
                if(jTarget4 == "val"){
                    $(target4).val(value);
                    $(target4).trigger("change");
                }else{
                    $(target4).text(value);
                }
            }
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
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
                var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $(target1).val(kode);
                    $(target1).trigger("change");
                }else{
                    $(target1).text(kode);
                }

                if(jTarget2 == "val"){
                    $(target2).val(nama);
                    $(target2).trigger("change");
                }else{
                    $(target2).text(nama);
                }

                if(target3 != ""){
                
                    var value = $(this).closest('tr').find('td:nth-child(3)').text();
                    if(jTarget3 == "val"){
                        $(target3).val(value);
                        $(target3).trigger("change");
                    }else{
                        $(target3).text(value);
                    }
                }
                if(target4 != ""){
                    
                    var value = $(this).closest('tr').find('td:nth-child(4)').text();
                    if(jTarget4 == "val"){
                        $(target4).val(value);
                        $(target4).trigger("change");
                    }else{
                        $(target4).text(value);
                    }
                }
                $('#modal-search').modal('hide');
            }
        })
    }

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    $('#modal-edit-kode').selectize({
        selectOnTab: true,
        onChange: function (){
        var id = $('#modal-edit-kode').val();
            setHarga(id);
        }
    });

    $('#web-form-pos').on('click', '#search-provinsi,#search-kota,#search-kode_kirim,#search-kecamatan,#search-service', function(){
        var par = $(this).closest('.row').find('input').attr('name');
        var par2 = "label_"+par;
        showFilter(par,par,par2);
    });


    // $("#search-kode_kirim").inputSearch({
    //     title: 'Daftar Jasa Kirim',
    //     url: "{{ url('toko-master/jasa-kirim') }}",
    //     header:['Kode Kirim','Nama'],
    //     columns:[
    //                 { data: 'kode_kirim' },
    //                 { data: 'nama' }
    //             ],
    //     parameter:{},
    //     onItemSelected: function(data){
    //         $('input[name=kode_kirim]').val(data.kode_kirim);
    //         $('#label_kode_kirim').text(data.nama);
    //     }
    // });

    $('#web-form-pos').on('change','#nilai_ongkir',function(){
        hitungTotal();
    });


    $('#kd-barang').selectize({
        selectOnTab:true,
        maxItems: 1,
        valueField: 'kd_barang',
        labelField: 'nama',
        searchField: ['kd_barang','nama','barcode'],
        options: [
            {kd_barang: 123456, nama: 'test', barcode: '200'},
        ],
        render: {
            option: function(data, escape) {
                return '<div class="option">' +
                '<span class="nama">' + escape(data.nama) + '</span>' +
                '</div>';
            },
            item: function(data, escape) {
                return '<div class="item"><a href="#">' + escape(data.nama) + '</a></div>';
            }
        },
        create:false,
        onChange: function (val){
            var id = val
            if (id != "" && id != null && id != undefined){
                addBarangSelect();
            }
        }
    });

    function getBarang() {
        $.ajax({
            type:'GET',
            url:"{{url('toko-master/barang')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    var select = $('#modal-edit-kode').selectize();
                    select = select[0];
                    var control = select.selectize;

                    var select2 = $('#kd-barang').selectize();
                    select2 = select2[0];
                    var control2 = select2.selectize;
                    control2.clearOptions();

                    for(i=0;i<result.daftar.length;i++){
                        control.addOption([{text:result.daftar[i].kode_barang + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_barang}]);
                        control2.addOption([{kd_barang:result.daftar[i].kode_barang, nama:result.daftar[i].nama,barcode:result.daftar[i].barcode}]);
                        $dtBrg[result.daftar[i].kode_barang] = {harga:result.daftar[i].hna};  
                        $dtBrg2[result.daftar[i].barcode] = {harga:result.daftar[i].hna,nama:result.daftar[i].nama,kd_barang:result.daftar[i].kode_barang};
                    }

                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('toko-auth/login') }}";
                    })
                } else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
            }
        });
    }

    function getCustomer(kode_cust) {
        $.ajax({
            type:'GET',
            url:"{{url('toko-master/cust-ol')}}/"+kode_cust,
            dataType: 'json',
            async: false,
            success: function(res) {
                result = res.data;
                if(result.status) {
                    if(result.data.length > 0){
                        $('#nama').val(result.data[0].nama);
                        $('#no_tel').val(result.data[0].no_tel);
                        $('#alamat').val(result.data[0].alamat);
                        $('#provinsi').val(result.data[0].provinsi);
                        $('#kota').val(result.data[0].kota);
                        $('#kecamatan').val(result.data[0].kecamatan);
                    }
                }else if(!res.data.status && res.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('toko-auth/login') }}";
                    })
                } else{
                    $('#nama').val('');
                    $('#no_tel').val('');
                    $('#alamat').val('');
                    $('#kota').val('');
                    $('#provinsi').val('');
                }
            }
        });
    }

    getBarang();

    function hitungDisc(){
        var total_trans = toNilai($('#nilai_pesan').val());
        var total_disk= toNilai($('#todisk').val());
        var nilai_ongkir = toNilai($('#nilai_ongkir').val());
        var total_stlh = +total_brg - +total_disk +nilai_ongkir;
        $('#tostlh').val(toRp(total_stlh));
    }

    function hitungTotal(){
        
        // hitung total barang
        if($('#todisk').val() == ""){
            
            $('#todisk').val(0);
        }
        var total_brg = 0;
        var diskon =  0;
        $('.row-barang').each(function(){
            var qtyb = $(this).closest('tr').find('.inp-qtyb').val();
            var hrgb = $(this).closest('tr').find('.inp-hrgb').val();
            var disc = $(this).closest('tr').find('.inp-disc').val();
            //var todis= (toNilai(hrgb) * toNilai(disc)) / 100
            // var subb = (+qtyb * toNilai(hrgb)) - disc;
            diskon += +toNilai(disc);
            var subb = (+qtyb * toNilai(hrgb));
            $(this).closest('tr').find('.inp-subb').val(toRp(subb));
            total_brg += +subb;
        });
        $('#nilai_pesan').val(toRp(total_brg));
        $('#todisk').val(toRp(diskon));

        var total_disk= toNilai($('#todisk').val());
        var nilai_ongkir = toNilai($('#nilai_ongkir').val());
        var total_stlh = +total_brg - +total_disk +nilai_ongkir;
        $('#tostlh').val(toRp(total_stlh));
        
    }
    var count= 0;

    function toRp(num){
        // if(num < 0){
        //     return "("+sepNumX(num * -1)+")";
        // }else{
        //     return sepNumX(num);
        // }
        var num = parseFloat(num).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function setHarga(id){
        if(id == '' || id == null){
            $('#qty-barang').val('');
            $('#hrg-barang').val('');
        }else{
            $.ajax({
                url: "{{url('toko-master/barang')}}/"+id,
                type: "GET",
                dataType: "json",
                async: false,
                success: function (result) {
                    harga = result.daftar.hna;
                    $('#modal-edit-harga').val(harga);
                }
            });
            $('#modal-edit-qty').focus();
        }
    }

    function setHarga2(id){
        if (id != ""){
            return $dtBrg[id].harga;  
        }else{
            return "";
        }
    };

    function toNilai(str_num){
        var parts = str_num.split('.');
        number = parts.join('');
        number = number.replace('Rp', '');
        // number = number.replace(',', '.');
        return +number;
    };

    function setHarga3(id){ 
        if (id != ""){
            return $dtBrg2[id].harga;  
        }else{
            return "";
        }
    };

    function getKode(id){ 
        if (id != ""){
            return $dtBrg2[id].kd_barang;  
        }else{
            return "";
        }
    };

    function setNama(id){
        if (id != ""){
            return $dtBrg2[id].nama;  
        }else{
            return "";
        }
    };

    function hapusBarang(rowindex){
        $("#input-grid2 tr:eq("+rowindex+")").remove();
        hitungTotal();
    }

    function ubahBarang(rowindex){
        $('.row-barang').removeClass('set-selected');
        $("#input-grid2 tr:eq("+rowindex+")").addClass('set-selected');

        var kd = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-kdb').val();
        var qty = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-qtyb').val();
        var harga = toNilai($("#input-grid2 tr:eq("+rowindex+")").find('.inp-hrgb').val());    
        var disc = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-disc').val();

        $('#modal-edit-kode')[0].selectize.setValue(kd);
        $('#modal-edit-kode').val(kd);
        $('#modal-edit-qty').val(qty);
        $('#modal-edit-harga').val(harga);
        $('#modal-edit-disc').val(disc);
        
        $('#modal-edit').modal('show');
        var selectKode = $('#modal-edit-kode').data('selectize');
        selectKode.disable();
        $('.gridexample').formNavigation();

    }

    function addBarangBarcode(){
        var kd1 = $('#kd-barang2').val();
        var qty1 = 1;
        var disc1 = 0;
        var hrg1 = setHarga3(kd1);
        var kd=getKode(kd1);
        var nama = kd+"-"+setNama(kd1);
        // || +qty1 <= 0 || +hrg1 <= 0
        if(kd1 == '' || +hrg1 <= 0){
            alert('Masukkan data barang yang valid');
        }else{
            // var kd = $('#kd-barang2').val();
            
            // var nama = $('#kd-barang option:selected').text();
            var qty = qty1;
            var hrg = hrg1;
            var disc = disc1;
            // var todis= (hrg * disc) / 100
            var sub = (+qty * +hrg) - disc;
            // var sub = +qty * +hrg;
            
            // cek barang sama
            $('.row-barang').each(function(){
                var kd_temp = $(this).closest('tr').find('.inp-kdb').val();
                var qty_temp = $(this).closest('tr').find('.inp-qtyb').val();
                var hrg_temp = $(this).closest('tr').find('.inp-hrgb').val();
                var disc_temp = $(this).closest('tr').find('.inp-disc').val();
                if(kd_temp == kd){
                    qty+=+(toNilai(qty_temp));
                    // hrg+=+(toNilai(hrg_temp));
                    disc+=+(toNilai(disc_temp));
                    //todis+=+(hrg*toNilai(disc_temp))/100;
                    sub=(hrg*qty)-disc;
                    $(this).closest('tr').remove();
                }
            });
            
            input = "<tr class='row-barang'>";
            input += "<td>"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
            input += "<td><input type='text' name='harga_barang[]' class='change-validation text-right inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
            input += "<td><input type='text' name='qty_barang[]' class='change-validation text-right inp-qtyb form-control'  value='"+qty+"' readonly required></td>";
            input += "<td><input type='text' name='sub_barang[]' class='change-validation text-right inp-subb form-control'  value='"+toRp(sub)+"' readonly required></td>";
            input += "<td><input type='text' name='disc_barang[]' class='change-validation text-right inp-disc form-control'  value='"+disc+"' readonly required></td>";
            input += "<td></a><a class='btn btn-primary btn-sm ubah-barang' style='font-size:8px'><i class='fas fa-pencil-alt fa-1'></i></a>&nbsp;<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
            input += "</tr>";
            
            $("#input-grid2").append(input);
            
            hitungTotal();
            
            $('#kd-barang2').val('');
            $("#input-grid2 tr:last").focus();
            $('#kd-barang2').focus();
            $('.gridexample').formNavigation();
            
        }
    }

    function addBarangSelect() {
        var barangSelect = $('#kd-barang')[0].selectize.getValue();
        var qtySelect = 1;
        var discSelect = 0;
        var hrgSelect = setHarga2(barangSelect);

        if(barangSelect === '' || +barangSelect <= 0) {
            alert('Masukkan data barang yang valid');
        } else {
            var barangSelected = $('#kd-barang option:selected').val();
            var namaSelected = $('#kd-barang option:selected').text();
            var qtySelected = qtySelect;
            var hrgSelected = hrgSelect;
            var discSelected = discSelect;
            var subSelected = (+qtySelected * +hrgSelected);

            $('.row-barang').each(function(){
                var kd_barang = $(this).closest('tr').find('.inp-kdb').val();
                var qty_barang = $(this).closest('tr').find('.inp-qtyb').val();
                var hrg_barang = $(this).closest('tr').find('.inp-hrgb').val();
                var disc_barang = $(this).closest('tr').find('.inp-disc').val();
                if(kd_barang == barangSelected){
                    qtySelected+=+(toNilai(qty_barang));
                    // hrg+=+(toNilai(hrg_temp));
                    discSelected+=+(toNilai(disc_barang));
                    //todis+=+(hrg*toNilai(disc_temp))/100;
                    subSelected=(hrgSelected*qtySelected);
                    $(this).closest('tr').remove();
                }
            });

            var tgl = "{{date('Y-m-d')}}";
            $.ajax({
                type:'GET',
                url:"{{url('toko-trans/penjualan-langsung-bonus')}}/"+barangSelected+"/"+tgl+"/"+qtySelected+"/"+hrgSelected,
                dataType: 'json',
                async:false,
                success: function(result) {
                    qtySelected = result.data.jumlah;
                    discSelected = result.data.diskon;
                    subSelected = (hrgSelected*qtySelected);

                    input = "<tr class='row-barang'>";
                    input += "<td>"+namaSelected+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+barangSelected+"' readonly required></td>";
                    input += "<td><input type='text' name='harga_barang[]' class='change-validation text-right inp-hrgb form-control'  value='"+toRp(hrgSelected)+"' readonly required></td>";
                    input += "<td><input type='text' name='qty_barang[]' class='change-validation text-right inp-qtyb form-control'  value='"+qtySelected+"' readonly required></td>";
                    input += "<td><input type='text' name='sub_barang[]' class='change-validation text-right inp-subb form-control'  value='"+toRp(subSelected)+"' readonly required></td>";
                    input += "<td><input type='text' name='disc_barang[]' class='change-validation text-right inp-disc form-control'  value='"+toRp(discSelected)+"' readonly required></td>";
                    input += "<td></a><a class='btn btn-primary btn-sm ubah-barang' style='font-size:8px'><i class='fas fa-pencil-alt fa-1'></i></a>&nbsp;<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
                    input += "</tr>";
                    
                    $("#input-grid2").append(input);
                    hitungTotal();
                    $('#kd-barang')[0].selectize.setValue('');
                    $("#input-grid2 tr:last").focus();
                    $('.gridexample').formNavigation();
                }
            });
        }

    }

    $('#edit-submit').click(function(e){
        e.preventDefault();
        
        var hrg = toNilai($('#modal-edit-harga').val());
        var qty = toNilai($('#modal-edit-qty').val());
        var disc = toNilai($('#modal-edit-disc').val());
        var kd = $('#modal-edit-kode option:selected').val();
        var nama = $('#modal-edit-kode option:selected').text();
        var sub = (+qty * +hrg);
        var tgl = "{{date('Y-m-d')}}";

            $.ajax({
                type:'GET',
                url:"{{url('toko-trans/penjualan-langsung-bonus')}}/"+kd+"/"+tgl+"/"+qty+"/"+hrg,
                dataType: 'json',
                async:false,
                success: function(result) {
                    qty=result.data.jumlah;
                    disc=result.data.diskon;
                    sub = (hrg*qty);

                    input = "<tr class='row-barang'>";
                    input += "<td>"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
                    input += "<td><input type='text' name='harga_barang[]' class='change-validation text-right inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
                    input += "<td><input type='text' name='qty_barang[]' class='change-validation text-right inp-qtyb form-control'  value='"+qty+"' readonly required></td>";
                    input += "<td><input type='text' name='sub_barang[]' class='change-validation text-right inp-subb form-control'  value='"+toRp(sub)+"' readonly required></td>";
                    input += "<td><input type='text' name='disc_barang[]' class='change-validation text-right inp-disc form-control'  value='"+toRp(disc)+"' readonly required></td>";
                    input += "<td></a><a class='btn btn-primary btn-sm ubah-barang' style='font-size:8px'><i class='fas fa-pencil-alt fa-1'></i></a>&nbsp;<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
                    input += "</tr>";
                    
                    $('.set-selected').closest('tr').remove();
                    $("#input-grid2").append(input);
                    hitungTotal();    
                    $('.gridexample').formNavigation();
                    $('#modal-edit').modal('hide');
                }
            });
    });

    $('#web-form-pos').on('change', '#kode_cust', function(){
        // $('#getCust').attr('disabled', false);
        var kode_cust = $('#kode_cust').val();
        getCustomer(kode_cust);
    });
    
    $('#web-form-pos').on('click', '#getCust', function(){
        var kode_cust = $('#kode_cust').val();
        getCustomer(kode_cust);
    });

    $('#kd-barang2').scannerDetection({
        timeBeforeScanTest: 200, // wait for the next character for upto 200ms
        avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
        preventDefault: true,
        endChar: [13],
        onComplete: function(barcode, qty){
        validScan = true;
            $('#kd-barang2').val (barcode);
            addBarangBarcode();
        },
        onError: function(string, qty) {
            console.log('barcode-error');
        }	
    });

    $('#cetakBtn').click(function(){
        $('#modal-bayar2').modal('hide');
        $('#web-form-pos')[0].reset();
        $('#input-grid2 tbody').html('');
        $('[id^=label]').text('');
    }); 

    $('#input-grid2').on('keydown', '.inp-qtyb', function(e){
        if (e.which == 9 || e.which == 40 || e.which == 38) {
            hitungTotal();   
        }else if(e.which == 13){
            hitungTotal();
            $('.inp-qtyb').prop('readonly', true);
        }
    });

    $('#web-form-pos').on('click', '#edit-qty', function(e){
       $('.inp-qtyb').prop('readonly', false);
       $('.inp-qtyb').first().focus();
       $('.inp-qtyb').first().select(); 
    });  

    $("#input-grid2").on("dblclick", '.row-barang',function(){
        var index = $(this).closest('tr').index();
        ubahBarang(index);
    });

    $("#input-grid2").on("click", '.ubah-barang', function(){
        var index = $(this).closest('tr').index();
        ubahBarang(index);
    });
    
    $("#input-grid2").on("click", '.hapus-item', function(){
        var index = $(this).closest('tr').index();
        hapusBarang(index);
    });

        // Simpan penjualan-langsung
    $('#web-form-pos').submit(function(e){
        e.preventDefault();

        var total_trans=toNilai($('#nilai_pesan').val());
        var diskon=toNilai($('#todisk').val());
        var nilai_ongkir=toNilai($('#nilai_ongkir').val());
        var total_all = total_trans+diskon+nilai_ongkir;
        var lama_hari=$('#lama_hari').val();

        var nilai_pesan=toNilai($('#nilai_pesan').val());
        if(nilai_pesan <= 0){
            alert('Total transaksi tidak valid');
        }else{
            var formData = new FormData(this);
            
            $("[id^=label]").each(function(e){
                formData.append($(this).attr('id'),$(this).text());
            });
            
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url: "{{url('toko-trans/penjualan-langsung')}}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    if(result.data.status){
                        alert('Input data'+result.data.message);
                        $('#modal-total_all').text(toRp(total_all));
                        $('#modal-total_trans').text(toRp(total_trans)); 
                        $('#modal-diskon').text(toRp(diskon)); 
                        $('#modal-nilai_ongkir').text(toRp(nilai_ongkir));
                        $('#modal-lama_hari').text(lama_hari);
                        $('#modal-bayar2').modal('show');
                    } else if(!result.data.status && result.data.message === "Unauthorized"){
                        Swal.fire({
                            title: 'Session telah habis',
                            text: 'harap login terlebih dahulu!',
                            icon: 'error'
                        }).then(function() {
                            window.location.href = "{{ url('/toko-auth/login') }}";
                        }) 
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                }
            });
        }
    });

    $(document).on("keypress", '#modal-bayar2', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            $('#cetakBtn').click();
        }
    });

    $(document).on("keypress", 'form', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            return false;
        } 
    });

    $(':input[type="number"], .currency').on('keydown', function (e){
        var value = String.fromCharCode(e.which) || e.key;
        if (!/[0-9\.]/.test(value) //angka dan titik
            && e.which != 190 // .
            && e.which != 116 // F5
            && e.which != 8   // backspace
            && e.which != 9   // tab
            && e.which != 13   // enter
            && e.which != 46  // delete
            && (e.which < 37 || e.which > 40) // arah 
            && (e.keyCode < 96 || e.keyCode > 105) // dan angka dari numpad
        ){
            e.preventDefault();
            return false;
        }
    });

</script>