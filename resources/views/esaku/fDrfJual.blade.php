<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<!-- LIST DATA -->
<x-list-data judul="Daftar Penjualan" tambah="" :thead="array('No Penjualan','Nik Kasir','Tanggal','Total','Action')" :thwidth="array(20,18,18,22,10)" :thclass="array('','','','','text-center')" />
<!-- END LIST DATA -->

{{-- FORM POS --}}
<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<style>
#edit-qty
{
    cursor:pointer;
}

#pbyr
{
    cursor:pointer;
}
</style>
<div class="container-fluid mt-3" id="saku-form" style="display: none;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-pos-body" id="pos-body">
                    <form class="form" id="web-form-pos" method="POST">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="logo2 text-center"><img src="{{ url('asset_elite/images/sai_icon/logo.png') }}" width="40px" alt="homepage" class="light-logo" /><br/>
                                            <img src="{{ url('asset_elite/images/sai_icon/logo-text.png') }}" class="light-logo" alt="homepage" width="40px"/>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="label-header">
                                            <p>{{ date("Y-m-d H:i:s") }}</p>
                                            <p style="color:#007AFF"><i class="fa fa-user"></i> {{ Session::get('userLog') }} / <span id="no_open"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <h6>Nilai Transaksi</h6>
                                <div class="row float-right">
                                    <div class="text-left" id="edit-qty" style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px">
                                        <img style="width:30px;height:30px;position:absolute" src="{{ url('asset_elite/img/edit.png') }}">
                                        <p style="line-height:1.5;font-size: 10px !important;padding-left: 35px;margin-bottom: 0 !important;text-align:center">Edit Qty</p>
                                        <p style="line-height:1.5;font-size: 9px !important;padding-left: 35px;text-align:center">F7</p>
                                    </div>
                                    <div class="text-left" id="pbyr" style="width: 120px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;">
                                        <img style="width:30px;height:30px;position:absolute" src="{{url('asset_elite/img/debit-card.png')}}">
                                        <p style="line-height:1.5;font-size: 10px !important;padding-left: 35px;margin-bottom: 0 !important;text-align:center !important;">Pembayaran</p>
                                        <p style="line-height:1.5;font-size: 9px !important;padding-left: 35px;text-align:center !important;">F8</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3><input type="text" style="font-size: 60px !important;height:unset !important;"  name="total_stlh" min="1" class="form-control currency" id="tostlh" required readonly></h3>
                            </div>
                            <div class="col-12">
                                <table class="table" style="margin-bottom: 5px">
                                    <tr>
                                        <th style='padding: 3px;width:20%' colspan='2'>
                                            <input type='text' class='form-control' placeholder="Barcode [F1]" id="kd-barang2">
                                        </th>
                                        <th style='padding: 3px;width:20%' colspan='2'>
                                            <select class='form-control' id="kd-barang">
                                                <option value=''>--- Pilih Barang [CTRL+C] ---</option>
                                            </select>
                                        </th>
                                        <th style='padding: 3px;width:5%'>Disc.</th>
                                        <th style='padding: 3px;width:20%'>
                                            <input type='text' placeholder='Total Disc.' value="0" name="total_disk" class='form-control currency' id='todisk' required disabled>
                                        </th>

                                        <th style='padding: 3px;width:5%'>Total</th>
                                        <th style='padding: 3px;width:20%'>
                                            <input type='text' name="total_trans" min="1" class='form-control currency' id='totrans' required readonly>
                                        </th>
                                    </tr>
                                </table>
                                <div class="col-12 grid-table" style="overflow-y: scroll;margin:0px; padding:0px;">
                                    <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2">
                                        <thead>
                                            <tr>
                                                <th>Barang</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Disc</th>
                                                <th style="display:none">PPN</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <div class="col-6 mt-2 float-right">
                                    <div class="form-group row">
                                         <label for="judul" class="col-4 col-form-label" style="font-size:16px">Pembayaran</label>
                                         <div class="col-6">
                                             <input type="text" name="total_bayar" min="1" class="form-control currency" id="tobyr" required value="0" disabled>
                                             <input type="hidden" style="" name="kembalian" min="1" class="form-control currency" id="kembalian" required readonly>
                                         </div>
                                         <div class="col-2">
                                            <button class="btn btn-info web_form_back" type="button">Back</button>
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
</div>
{{-- END FORM POS --}}

{{-- EDIT MODAL --}}
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
                                <input type='text' class='form-control currency' maxlength='100' id='modal-edit-qty'>
                                <input type='hidden' class='form-control currency' id='modal-edit-ppn'>
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
{{-- END EDIT MODAL --}}


<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>
<script src="{{url('asset_elite/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_elite/jquery.formnavigation.js')}}"></script>

<script type="text/javascript">
var $dtBrg = [];
var $dtBrg2 = [];
var count= 0;

$('#kd-barang2').focus();

setHeightFormPOS();

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

$('.currency').inputmask("numeric", {
    radixPoint: ",",
    groupSeparator: ".",
    digits: 2,
    autoGroup: true,
    rightAlign: true,
    oncleared: function () { return false; }
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

// get barang
(function() {
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
                    $dtBrg[result.daftar[i].kode_barang] = {harga:result.daftar[i].hna,ppn:result.daftar[i].ppn};  
                    $dtBrg2[result.daftar[i].barcode] = {harga:result.daftar[i].hna,nama:result.daftar[i].nama,kd_barang:result.daftar[i].kode_barang,ppn:result.daftar[i].ppn};
                }

            } else if(!result.data.status && result.data.message == "Unauthorized"){
                window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
            } else{
                msgDialog({
                    id: '',
                    type:'sukses',
                    title: 'Error',
                    text: result.data.message
                });
            }
        }
    });
})();

function hitungKembali(){
    var total_stlh = toNilai($('#tostlh').val());
    var total_bayar = toNilai($('#tobyr').val());
    if(total_bayar > 0 ){
        kembalian = +total_bayar - +total_stlh;
        if(kembalian < 0) kembalian = 0;  
        $("#kembalian").val(toRp(kembalian));
    }
}

function hitungDisc(){
    var total_trans = toNilai($('#totrans').val());
    var total_disk= toNilai($('#todisk').val());
    var total_stlh = +total_trans - +total_disk;
    $('#tostlh').val(toRp(total_stlh));
    var total_bayar = toNilai($('#tobyr').val());
    if(total_bayar > 0 ){
        kembalian = +total_bayar - +total_stlh;  
        if(kembalian < 0) kembalian = 0; 
        $("#kembalian").val(toRp(kembalian));
    }
}

function hitungTotal(){    
    // hitung total barang
    if($('#todisk').val() == ""){        
        $('#todisk').val(0);
    }
    var total_brg = 0;
    var diskon =  toNilai($('#todisk').val());
    // var ppn =0;
    $('.row-barang').each(function(){
        var qtyb = $(this).closest('tr').find('.inp-qtyb').val();
        var hrgb = $(this).closest('tr').find('.inp-hrgb').val();
        var disc = $(this).closest('tr').find('.inp-disc').val();
    
        diskon += +toNilai(disc);
        var subb = (+qtyb * toNilai(hrgb));
        
        $(this).closest('tr').find('.inp-subb').val(toRp(subb));
        total_brg += +subb;
    });
    $('#totrans').val(toRp(total_brg));
    $('#todisk').val(toRp(diskon));

    var total_disk= toNilai($('#todisk').val());
    var total_stlh = +total_brg - total_disk;
        
    $('#tostlh').val(toRp(total_stlh));
    var total_bayar = toNilai($('#tobyr').val());
    if(total_bayar > 0 ){
        if(kembalian < 0) kembalian = 0;
        kembalian = +total_bayar - +total_stlh;
        $("#kembalian").val(toRp(kembalian));
    }
}

function setHarga(id){
    if(id == '' || id == null){
        $('#qty-barang').val('');
        $('#hrg-barang').val('');
    } else {
        $.ajax({
            url: "{{ url('toko-master/barang') }}/"+id,
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

function toRp(num){
    if(num < 0){
        return "("+sepNum(num * -1)+")";
    } else {
        return sepNum(num);
    }
}

function setHarga2(id){
    if (id != ""){
        return $dtBrg[id].harga;  
    } else {
        return "";
    }
};

function setPPN(id){
    if (id != ""){
        return $dtBrg[id].ppn;  
    } else {
        return 0;
    }
};

function toNilai(str_num){
    var parts = str_num.split('.');
    number = parts.join('');
    number = number.replace('Rp', '');
    return +number;
};

function setHarga3(id){ 
    if (id != ""){
        if($dtBrg2[id] == undefined){
            return false;
        } else {
            return $dtBrg2[id].harga;  
        } 
    } else {
        return "";
    }
};

function setPPN2(id){ 
    if (id != ""){
        if($dtBrg2[id] == undefined){
            return "";
        } else {
            return $dtBrg2[id].ppn;  
        } 
    } else {
        return 0;
    }
};

function getKode(id){ 
    if (id != ""){
        if($dtBrg2[id] == undefined){
            return "";
        } else {
            return $dtBrg2[id].kd_barang;  
        }
    } else {
        return "";
    }
};

function setNama(id){
    if (id != ""){  
        if($dtBrg2[id] == undefined){
            return "";
        } else {
            return $dtBrg2[id].nama;  
        }
    } else {
        return "";
    }
};

function addBarangBarcode() {
    var html = '';
    var kd1 = $('#kd-barang2').val();
    var qty1 = 1;
    var disc1 = 0;
    var hrg1 = setHarga3(kd1);
    var kd= getKode(kd1);
    var nama = setNama(kd1);
    var ppn1 = setPPN2(kd1);
    
    if(kd1 == '' || +hrg1 <= 0){
        msgDialog({
            id: '',
            type:'warning',
            text:'Masukkan data barang yang valid'
        });
    } else {
        var qty = qty1;
        var hrg = hrg1;
        var disc = disc1;
        var sub = (+qty * +hrg) - disc;
        var ppn = ppn1;
            
        // cek barang sama
        $('.row-barang').each(function(){
            var kd_temp = $(this).closest('tr').find('.inp-kdb').val();
            var qty_temp = $(this).closest('tr').find('.inp-qtyb').val();
            var hrg_temp = $(this).closest('tr').find('.inp-hrgb').val();
            var disc_temp = $(this).closest('tr').find('.inp-disc').val();
            var ppn_temp = $(this).closest('tr').find('.inp-ppn').val();
            if(kd_temp == kd){
                qty+=+(toNilai(qty_temp));
                disc+=+(toNilai(disc_temp));
                sub=(hrg*qty)-disc;
            }
        });

        html += `<tr class="row-barang">
            <td style="width: 30%;">
                ${nama}
                <input type="hidden" class="form-control inp-kdb" value="${kd}" disabled>
            </td>    
            <td style="width: 20%;">
                <input type="text" class="form-control currencies inp-hrgb" value="${toRp(hrg)}" style="text-align: right;" disabled>
            </td>    
            <td style="width: 15%;">
                <input type="text" class="form-control currencies inp-qtyb" value="${parseFloat(qty)}" style="text-align: right;">    
            </td>    
            <td style="width: 15%;">
                <input type="text" class="form-control currencies inp-subb" value="${toRp(sub)}" style="text-align: right;" disabled>    
            </td>    
            <td style="width: 15%;">
                <input type="text" class="form-control currencies inp-disc" value="${toRp(disc)}" style="text-align: right;" disabled>    
                <input type="hidden" class="form-control currencies inp-ppn" value="${parseFloat(ppn)}" disabled>    
            </td>    
            <td>&nbsp;</td>    
        </tr>`;
            
        $("#input-grid2").append(html);
            
        hitungTotal();
            
        $('#kd-barang2').val('');
        $("#input-grid2 tr:last").focus();
        $('#kd-barang2').focus();
        $('.gridexample').formNavigation();
            
    }
}

function addBarangSelect() {
    var html = '';
    var barangSelect = $('#kd-barang')[0].selectize.getValue();
    var qtySelect = 1;
    var discSelect = 0;
    var hrgSelect = setHarga2(barangSelect);
    var ppnSelect = setPPN(barangSelect);

    if(barangSelect === '' || +barangSelect <= 0) {
        msgDialog({
            id: '',
            type:'warning',
            text:'Masukkan data barang yang valid'
        });
    } else {
        var barangSelected = $('#kd-barang option:selected').val();
        var namaSelected = $('#kd-barang option:selected').text();
        var qtySelected = qtySelect;
        var hrgSelected = hrgSelect;
        var discSelected = discSelect;
        var subSelected = (+qtySelected * +hrgSelected);
        var ppnSelected = ppnSelect;

        $('.row-barang').each(function(){
            var kd_barang = $(this).closest('tr').find('.inp-kdb').val();
            var qty_barang = $(this).closest('tr').find('.inp-qtyb').val();
            var hrg_barang = $(this).closest('tr').find('.inp-hrgb').val();
            var disc_barang = $(this).closest('tr').find('.inp-disc').val();
            var ppnSelected = $(this).closest('tr').find('.inp-ppn').val();
            if(kd_barang == barangSelected){
                qtySelected+=+(toNilai(qty_barang));
                discSelected+=+(toNilai(disc_barang));
                subSelected=(hrgSelected*qtySelected);
                $(this).closest('tr').remove();
            }
        });

        var tgl = "{{date('Y-m-d')}}";
        
        $.ajax({
            type:'GET',
            url:"{{url('esaku-trans/penjualan-bonus')}}/"+barangSelected+"/"+tgl+"/"+qtySelected+"/"+hrgSelected,
            dataType: 'json',
            async:false,
            success: function(result) {
                qtySelected = result.data.jumlah;
                discSelected = result.data.diskon;
                subSelected = (hrgSelected*qtySelected);
                html += `<tr class="row-barang">
                    <td style="width: 30%;">
                        ${namaSelected}
                        <input type="hidden" class="form-control inp-kdb" value="${barangSelected}" disabled>
                    </td>    
                    <td style="width: 20%;">
                        <input type="text" class="form-control currencies inp-hrgb" value="${toRp(hrgSelected)}" style="text-align: right;" disabled>
                    </td>    
                    <td style="width: 15%;">
                        <input type="text" class="form-control currencies inp-qtyb" value="${parseFloat(qtySelected)}" style="text-align: right;">    
                    </td>    
                    <td style="width: 15%;">
                        <input type="text" class="form-control currencies inp-subb" value="${toRp(subSelected)}" style="text-align: right;" disabled>    
                    </td>    
                    <td style="width: 15%;">
                        <input type="text" class="form-control currencies inp-disc" value="${toRp(discSelected)}" style="text-align: right;" disabled>    
                        <input type="hidden" class="form-control currencies inp-ppn" value="${parseFloat(ppnSelected)}" disabled>    
                    </td>    
                    <td>&nbsp;</td>    
                </tr>`;
                        
                $("#input-grid2").append(html);
                hitungTotal();
                $('#kd-barang')[0].selectize.setValue('');
                $("#input-grid2 tr:last").focus();
                $('.gridexample').formNavigation();
            }
        });
    }
}

$('#todisk').change(function(e){
    e.preventDefault();
    hitungTotal();
})

$('#kd-barang2').scannerDetection({
    timeBeforeScanTest: 200, // wait for the next character for upto 200ms
    avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
    preventDefault: true,
    endChar: [13],
    onComplete: function(barcode, qty){
    validScan = true;
        $('#kd-barang2').val(barcode);
        addBarangBarcode();
    },
    onError: function(string, qty) {
        console.log('barcode-error');
    }	
});

$('#input-grid2').on('keydown', '.inp-qtyb', function(e){
    if (e.which == 9 || e.which == 40 || e.which == 38) {
        hitungTotal();   
    } else if(e.which == 13){
        hitungTotal();
        $('.inp-qtyb').prop('readonly', false);
    }
});

$('#web-form-pos').on('click', '#pbyr', function(e){
    $('#tobyr').focus(); 
});

$('#tobyr').change(function(){
    hitungKembali();
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
    ) {
        e.preventDefault();
        return false;
    }
});
// LIST DATA
var action_html = "<a href='#' title='Edit' class='web_datatable_edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;";

var dataTable = generateTable(
    "table-data",
    "{{ url('esaku-trans/daftar-penjualan') }}", 
    [
        {'targets': 4, data: null, 'defaultContent': action_html, 'className': 'text-center' },
        { 
            'targets': 3, 
            'className': 'text-right',        
            'render': $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' )
        }
    ],
    [
        { data: 'no_jual' },
        { data: 'nik_user' },
        { data: 'tanggal',  render: function(data,type,row){
            var split = data.split('-');
            var tgl = split[2];
            var bln = split[1];
            var tahun = split[0];
            return tgl+"/"+bln+"/"+tahun;
        } },
        { data: 'nilai' },
    ],
    "{{ url('esaku-auth/sesi-habis') }}",
    [[0 ,"desc"]]
);

$.fn.DataTable.ext.pager.numbers_length = 5;

$("#searchData").on("keyup", function (event) {
    dataTable.search($(this).val()).draw();
});

$("#page-count").on("change", function (event) {
    var selText = $(this).val();
    dataTable.page.len(parseInt(selText)).draw();
});
// END LIST DATA

// BACK FORM
$('#saku-form').on('click', '.web_form_back', function(){
    $('#saku-form').hide();
    $('#saku-datatable').show();
});
// END BACK FORM

// EDIT DATA
$('#saku-datatable').on('click', '.web_datatable_edit', function() {
    $("#input-grid2 tbody").empty();
    var no_bukti = $(this).closest('tr').find('td:eq(0)').text();  
    editData(no_bukti);
})

function editData(no_bukti) {
    $.ajax({
        type: 'GET',
        url: "{{url('esaku-trans/daftar-penjualandetail')}}",
        data: { no_bukti: no_bukti },
        dataType: 'json',
        success:function(result){
            var res = result.data;
            var row = res.data[0]
            if(res.status) {
                $('#no_open').text(row.no_open)
                $('#tostlh').val(parseFloat(row.total_trans))
                $('#todisk').val(parseFloat(row.diskon))
                $('#totrans').val(parseFloat(row.nilai))
                $('#tobyr').val(parseFloat(row.tobyr))

                if(res.data_detail.length > 0) {
                    var html = '';
                    for(var i=0;i<res.data_detail.length;i++) {
                        var row2 = res.data_detail[i]
                        html += `<tr class="row-barang">
                            <td style="width: 30%;">
                                ${row2.nama_brg}
                                <input type="hidden" class="form-control inp-kdb" value="${row2.kode_barang}" disabled>
                            </td>    
                            <td style="width: 20%;">
                                <input type="text" class="form-control currencies inp-hrgb" value="${parseFloat(row2.harga)}" disabled>
                            </td>    
                            <td style="width: 15%;">
                                <input type="text" class="form-control currencies inp-qtyb" value="${parseFloat(row2.jumlah)}">    
                            </td>    
                            <td style="width: 15%;">
                                <input type="text" class="form-control currencies inp-subb" value="${parseFloat(row2.subtotal)}" disabled>    
                            </td>    
                            <td style="width: 15%;">
                                <input type="text" class="form-control currencies inp-disc" value="${parseFloat(row2.diskon)}" disabled>    
                                <input type="hidden" class="form-control currencies inp-ppn" value="${parseFloat(row2.ppn)}" disabled>    
                            </td>    
                            <td>&nbsp;</td>    
                        </tr>`
                    }
                    $("#input-grid2").append(html);

                    $('.currencies').inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () { return false; }
                    });
                }

                $('.gridexample').formNavigation();
                $('#saku-datatable').hide();
                $('#saku-form').show();
            }
        },
        fail: function(xhr, textStatus, errorThrown){
            msgDialog({
                id: '',
                type:'sukses',
                title: 'Error',
                text: textStatus
            });
        }
    });
}
// EDIT DATA
</script>