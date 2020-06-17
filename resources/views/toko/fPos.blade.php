<style>
#edit-qty{
    cursor:pointer;
}

#pbyr{
    cursor:pointer;
}
</style>
<div class="container-fluid mt-3">
    <div class="row" >
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" id="web-form-pos" method="POST">
                        <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="logo text-center"><img src="{{url("asset_elite/images/sai_icon/logo.png")}}" width="40px" alt="homepage" class="light-logo" /><br/>
                                    <img src="{{url("asset_elite/images/sai_icon/logo-text.png")}}" class="light-logo" alt="homepage" width="40px"/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label-header">
                                        <h6>{{ date("Y-m-d H:i:s") }}</h6>
                                        <h6 style="color:#007AFF"><i class="fa fa-user"></i> {{ Session::get('userLog') }} / <span id="no_open"></span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 text-right">
                                <h5>Nilai Transaksi </h5>
                                <div class="row  float-right">
                                    <div class="text-left" id="edit-qty" style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px">
                                    <img style="width:30px;height:30px;position:absolute" src="{{url("asset_elite/img/edit.png")}}">
                                    <h6 style="font-size: 10px;padding-left: 35px;margin-bottom: 0;margin-top: 5px;text-align:center">Edit Qty</h6>
                                    <h6 style="font-size: 9px;padding-left: 35px;text-align:center">F7</h6></div>
                                    <div class="text-left" id="pbyr" style="width: 120px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;"><img style="width:30px;height:30px;position:absolute" src="{{url('asset_elite/img/debit-card.png')}}">
                                    <h6 style="font-size: 10px;padding-left: 35px;margin-bottom: 0;margin-top: 5px;text-align:center">Pembayaran</h6>
                                    <h6 style="font-size: 9px;padding-left: 35px;text-align:center">F8</h6></div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h3><input type="text" style="font-size: 40px;"  name="total_stlh" min="1" class="form-control currency" id="tostlh" required readonly></h3>
                            </div>
                        <div class="col-md-12">
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
                                    <th style='padding: 3px;width:5%'>Disc.</th>
                                    <th style='padding: 3px;width:20%'><input type='text' placeholder='Total Disc.' value="0" name="total_disk" class='form-control currency' id='todisk' required ></th>
                                    <th style='padding: 3px;width:5%'>Total</th>
                                    <th style='padding: 3px;width:20%'><input type='text' name="total_trans" min="1" class='form-control currency' id='totrans' required readonly></th>
                                </tr>
                            </table>
                            <div class="col-xs-12" style="overflow-y: scroll; height:300px; margin:0px; padding:0px;">
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2">
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Disc</th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6 mt-2 float-right">
                                <div class="form-group row">
                                    
                                    <label for="judul" class="col-4 col-form-label" style="font-size:16px">Pembayaran</label>
                                    <div class="col-6">
                                    <input type="text" name="total_bayar" min="1" class="form-control currency" id="tobyr" required value="0">
                                    </div>
                                    <input type="hidden" style="" name="kembalian" min="1" class="form-control currency" id="kembalian" required readonly>
                                    <div class="col-2">
                                        <button class="btn btn-info" type="submit" id="btnBayar">Bayar</button>
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
    <!-- FORM MODAL BAYAR -->
<div class='modal' id='modal-bayar' tabindex='-1' role='dialog'>
    <div class='modal-dialog modal-sm' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>Pilih Nominal</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                </button>
            </div>
            <div class='modal-body'>
                <div class='row mb-2' style="text-align: center;">
                <a class="btn btn-lg btn-secondary" id="nom0" style="width: 126px;">Uang Pas</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" id='nom1' style="width: 126px;">1.000</a></div>
                <div class='row mb-2'><a class="btn btn-lg btn-secondary" id='nom2' style="width: 126px;">2.000</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" id='nom3' style="width: 126px;">5.000</a></div>
                <div class='row mb-2'><a class="btn btn-lg btn-secondary" id='nom4' style="width: 126px;">10.000</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" id='nom5' style="width: 126px;">20.000</a></div>
                <div class='row mb-2'><a class="btn btn-lg btn-secondary" id='nom6' style="width: 126px;">50.000</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" id='nom7' style="width: 126px;">100.000</a></div>
                <div class='form-group row'>
                    <label for="judul" class="col-3 col-form-label">Nominal Bayar</label>
                    <div class="col-9">
                    <input type='text' class='form-control currency' maxlength='100' id='inp-byr' readonly>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class="col-9">
                    <input type='hidden' class='form-control' id='param' readonly>
                    </div>
                </div>
            </div>
            <div class='modal-footer'>
            <button type='button' id='btn-ok' class='btn btn-success'>OK</button>
            <button type='button' id='btn-clear' class='btn btn-default'>C</button>
            </div>
        </div>
    </div>
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
<!-- FORM MODAL BAYAR 2-->
<div class="modal" id="modal-bayar2" tabindex="-1" role="dialog" aria-modal="true">
    <div role="document" style="" class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px !important;">
            <div class="modal-header " style="display:block">
                <div class="row text-center" style="">
                    <div class="col-md-12">
                        <h5 class="">Kembalian</h5>
                        <h5 id="modal-no_jual" hidden></h5>
                        <h1 class="text-info" id="modal-kembalian">12.500</h1>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row mb-2" style="">
                    <div class="col-6" style="">
                    Total 
                    </div>
                    <div class="col-6 text-right" id="modal-totrans">
                    300.800,26
                    </div>
                </div>
                <div class="row mb-2">
                <div class="col-6">
                    Diskon 
                    </div>
                    <div class="col-6 text-right" id="modal-diskon">
                    800,26
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                    Pembulatan 
                    </div>
                    <div class="col-6 text-right">
                    14
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                    Total Bayar
                    </div>
                    <div class="col-6 text-right" id="modal-tostlhdisk">
                    300.000
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                    Pembayaran
                    </div>
                    <div class="col-6 text-right" id="modal-tobyr">
                    312.500
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 0;">
            <button id="cetakBtn" type="button" class="btn btn-info btn-block" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">Cetak</button>
            </div>
        </div>
    </div>
</div>

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{url('asset_elite/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_elite/jquery.formnavigation.js')}}"></script>

<script type="text/javascript">
    var $dtBrg = new Array();
    var $dtBrg2 = new Array();
    $('#kd-barang2').focus();

    $('#kd-barang').selectize({
        // theme: 'links',
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
        // create: function(input) {
        //     return {
        //         id: 0,
        //         title: input,
        //         url: '#'
        //     };
        // }
        create:false,
        onChange: function (val){
            // $('#kd-barang').val(value);
            var id = val
            if (id != "" && id != null && id != undefined){
                addBarang(id);
                // alert(id);
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
                    var select2 = $('#kd-barang').selectize();
                    select2 = select2[0];
                    var control2 = select2.selectize;
                    control2.clearOptions();

                    for(i=0;i<result.daftar.length;i++){
                        // control.addOption([{text:result.daftar[i].kode_barang + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_barang}]);
                        control2.addOption([{kd_barang:result.daftar[i].kode_barang, nama:result.daftar[i].nama,barcode:result.daftar[i].barcode}]);
                        $dtBrg[result.daftar[i].kode_barang] = {harga:result.daftar[i].harga};  
                        $dtBrg2[result.daftar[i].barcode] = {harga:result.daftar[i].harga,nama:result.daftar[i].nama,kd_barang:result.daftar[i].kode_barang};
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
</script>