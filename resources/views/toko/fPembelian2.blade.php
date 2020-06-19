<style>
#edit-qty{
    cursor:pointer;
}

#pbyr{
    cursor:pointer;
}
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" id="web-form-pos" method="POST">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="logo text-center"><img src="{{url("asset_elite/images/sai_icon/logo.png")}}" width="40px" alt="homepage" class="light-logo" /><br/>
                                            <img src="{{url("asset_elite/images/sai_icon/logo-text.png")}}" class="light-logo" alt="homepage" width="40px"/>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="label-header">
                                            <h6>{{ date("Y-m-d H:i:s") }}</h6>
                                            <h6 style="color:#007AFF"><i class="fa fa-user"></i> {{ Session::get('userLog') }} / <span id="no_open"></span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <h5>Nilai Transaksi</h5>
                                <div class="row float-right">
                                    <div class="text-left" id="edit-qty" style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px">
                                        <img style="width:30px;height:30px;position:absolute" src="{{url("asset_elite/img/edit.png")}}">
                                        <h6 style="font-size: 10px;padding-left: 35px;margin-bottom: 0;margin-top: 5px;text-align:center">Edit Qty</h6>
                                        <h6 style="font-size: 9px;padding-left: 35px;text-align:center">F7</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3><input type="text" style="font-size: 40px;"  name="total_stlh" min="1" class="form-control currency" id="tostlh" required readonly></h3>
                            </div>
                            <div class="col-12">
                                <table class="table" style="margin-bottom: 5px">
                                    <tr>
                                        <th style='padding: 3px;width:25%' colspan='2'>
                                            <input type='text' class='form-control' placeholder="Barcode [F1]" id="kd-barang2" >
                                        </th>
                                        <th style='padding: 3px;width:25%' colspan='2'>
                                            <select class='form-control' id="kd-barang">
                                                <option value=''>--- Pilih Barang [CTRL+C] ---</option>
                                            </select>
                                        </th>
                                        <th style='padding: 3px;width:25%' colspan='2'>
                                            <select class='form-control' id="kd-vendor">
                                                <option value=''>--- Pilih Vendor ---</option>
                                            </select>
                                        </th>
                                        <th style='padding: 3px;width:5%'>Total</th>
                                        <th style='padding: 3px;width:20%'>
                                            <input type='text' name="total_trans" min="1" class='form-control currency' id='totrans' required readonly>
                                        </th>
                                    </tr>
                                </table>
                                <div class="col-12" style="overflow-y: scroll; height:300px; margin:0px; padding:0px;">
                                    <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2">
                                        <tr>
                                            <th>No</th>
                                            <th>Barang</th>
                                            <th>Stok</th>
                                            <th>Harga Sebelum</th>
                                            <th>Harga Jual</th>
                                            <th>Harga</th>
                                            <th>Satuan</th>
                                            <th>Qty</th>
                                            <th>Disc</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 mt-2 float-right">
                                    <div class="form-group row">
                                         <label for="judul" class="col-1 col-form-label" style="font-size:16px">Disc</label>
                                         <div class="col-2">
                                            <input type="text" name="total_disk" min="1" class='form-control currency' id='todisk' required value="0">
                                         </div>
                                         <label for="judul" class="col-1 col-form-label" style="font-size:16px">PPN</label>
                                         <div class="col-3">
                                            <div class="input-group mb-3">
                                                <input type="text" name="total_ppn" min="1" class='form-control currency' id='toppn' required value="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" id="getPPN" type="button"><i class="mdi mdi-sync"></i></button>
                                                </div>
                                            </div>
                                         </div>
                                         <label for="judul" class="col-2 col-form-label" style="font-size:16px">No Faktur</label>
                                         <div class="col-2">
                                            <input type="text" name="no_faktur" class='form-control ' id='no_faktur' required>
                                         </div>
                                         <div class="col-1">
                                            <button class="btn btn-info" type="submit" id="btnBayar">Simpan</button>
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

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{url('asset_elite/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_elite/jquery.formnavigation.js')}}"></script>

<script type="text/javascript">
    var $dtBrg = new Array();
    var $dtBrg2 = new Array();
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
            $('#no_faktur').focus();
        }
    };

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
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
                    // var select = $('#modal-edit-kode').selectize();
                    // select = select[0];
                    // var control = select.selectize;

                    var select2 = $('#kd-barang').selectize();
                    select2 = select2[0];
                    var control2 = select2.selectize;
                    control2.clearOptions();

                    for(i=0;i<result.daftar.length;i++){
                        // control.addOption([{text:result.daftar[i].kode_barang + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_barang}]);
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

    function getVendor() {
        $.ajax({
            type:'GET',
            url:"{{url('toko-master/vendor')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    // var select = $('#modal-edit-kode').selectize();
                    // select = select[0];
                    // var control = select.selectize;

                    var select2 = $('#kd-vendor').selectize();
                    select2 = select2[0];
                    var control2 = select2.selectize;
                    control2.clearOptions();

                    for(i=0;i<result.daftar.length;i++){
                        // control.addOption([{text:result.daftar[i].kode_vendor + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_vendor}]);
                        control2.addOption([{text:result.daftar[i].kode_vendor + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_vendor}]);

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
    getBarang();
    getVendor();
</script>