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
                                            <input type='text' class='form-control' placeholder="Barcode [F1]" id="kd-barang2" disabled>
                                        </th>
                                        <th style='padding: 3px;width:20%' colspan='2'>
                                            <select class='form-control' id="kd-barang" disabled>
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

<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>
<script src="{{url('asset_elite/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_elite/jquery.formnavigation.js')}}"></script>
<script src="{{url('asset_elite/inputmask.js')}}"></script>

<script type="text/javascript">

$('.currency').inputmask("numeric", {
    radixPoint: ",",
    groupSeparator: ".",
    digits: 2,
    autoGroup: true,
    rightAlign: true,
    oncleared: function () { return false; }
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
                        html += `<tr>
                            <td style="width: 30%;">${row2.nama_brg}</td>    
                            <td style="width: 20%;">
                                <input type="text" class="form-control currencies" value="${parseFloat(row2.harga)}" disabled>
                            </td>    
                            <td style="width: 15%;">
                                <input type="text" class="form-control currencies" value="${parseFloat(row2.jumlah)}" disabled>    
                            </td>    
                            <td style="width: 15%;">
                                <input type="text" class="form-control currencies" value="${parseFloat(row2.subtotal)}" disabled>    
                            </td>    
                            <td style="width: 15%;">
                                <input type="text" class="form-control currencies" value="${parseFloat(row2.diskon)}" disabled>    
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