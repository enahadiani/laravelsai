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
.barang-table {
    overflow-y: scroll;
    margin: 0; 
    padding: 0;
    border: 1.5px solid #d6d6d6;
    border-radius: 10px;
}
.table-grid {
    margin: 0 !important;
}
.table-grid tbody td {
    padding: 8px !important;
}
.total-trans-box {
    height: 120px;
    width: 100%;
    background-color: #e9e9e9;
    border-radius: 20px;
    padding: 15px;
}
.btn-helper {
    padding: 8px;
    height: 55px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
}
.btn-helper > .btn-helper-icon {
    margin-top: 8px;
}
.btn-helper > .btn-helper-text {
    margin-top: 8px;
    margin-left: 30px;
}
.btn-helper-text > .label-text {
    display: inline;
    font-size: 16px !important;
}
.right {
    text-align: right;
}
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-pos-body">
                    <form class="form" id="web-form-pos" method="POST">

                        <div class="row">
                            <div class="col-8">
                                <div class="grid-table barang-table">
                                    <table class="table table-bordered table-condensed table-grid" id="input-grid">
                                        <thead>
                                            <tr>
                                                <th style="width: 30%; text-align: center;">Barang</th>
                                                <th style="width: 5%; text-align: center;">Qty</th>
                                                <th style="width: 15%; text-align: center;">Harga</th>
                                                <th style="width: 15%; text-align: center;">Diskon</th>
                                                <th style="width: 15%; text-align: center;">Harga Akhir</th>
                                                <th style="width: 10%; text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="total-trans-box">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Total</h6>
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" name="totrans" id="totrans">
                                            <h3 id="total-trans">Rp. 0</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <input type='text' class='form-control' placeholder="Barcode [F1]" id="barcode">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <button class="btn btn-outline-light btn-helper" id="bayar">
                                            <div class="btn-helper-icon">
                                                <img style="width:25px;height:25px;position:absolute" src="{{url('asset_elite/img/debit-card.png')}}">
                                            </div>
                                            <div class="btn-helper-text">
                                                <p class="label-text">Bayar</p>
                                                <span class="label-text-shortcut">(Shift)</span>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-outline-light btn-helper" id="input-pembayaran">
                                            <div class="btn-helper-icon">
                                                <img style="width:25px;height:25px;position:absolute" src="{{url('asset_elite/img/debit-card.png')}}">
                                            </div>
                                            <div class="btn-helper-text">
                                                <p class="label-text">Pembayaran</p>
                                                <span style="display: inline;">(F8)</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <button class="btn btn-outline-light btn-helper" id="edit-qty">
                                            <div class="btn-helper-icon">
                                                <img style="width:25px;height:25px;position:absolute" src="{{ url('asset_elite/img/edit.png') }}">
                                            </div>
                                            <div class="btn-helper-text">
                                                <p class="label-text">Edit Qty</p>
                                                <span class="label-text-shortcut">(F7)</span>
                                            </div>
                                        </button>
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

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{url('asset_elite/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_elite/jquery.formnavigation.js')}}"></script>
<script type="text/javascript">
    var scrollform = document.querySelector('.barang-table');
    var keyupFiredCount = 0;
    var $no_open = "";
    var $totDisk = 0;
    var $totByr = 0;
    var $dtBrg = [];
    setHeightFormPOS();
    getNoOpen();
    getBarang();
    new PerfectScrollbar(scrollform);

    $('#barcode').focus();
    $('#area_print').hide();

    function getBarangDetail(kode_barang) {
        return $dtBrg.filter(index => kode_barang.includes(index.kode));
    }

    function getNama(kode_barang) {
        var nama = $dtBrg.filter(index => kode_barang.includes(index.kode));
        return nama[0].nama;
    }

    function getHarga(kode_barang) {
        var harga = $dtBrg.filter(index => kode_barang.includes(index.kode));
        return parseFloat(harga[0].harga);
    }

    function tambahBarang(kode_barang) {
        console.log(getBarangDetail(kode_barang))
        var input = "";
        var qty = 1;
        var disc = 0;
        var harga = getHarga(kode_barang);
        var nama = getNama(kode_barang);
        var displayTable = kode_barang+"-"+nama;
        var subtotal = (qty * harga) - disc;

        if(harga <= 0 || nama == '') {
            alert('Masukkan barcode barang dengan valid');
        }

        $('.row-grid').each(function(){
            var kodeBrgInTtable = $(this).closest('tr').find('.inp-kode').val();
            var hargaBrgInTtable = $(this).closest('tr').find('.td-harga').text();
            var qtyBrgInTtable = $(this).closest('tr').find('.td-qty').text();
            var diskBrgInTtable = $(this).closest('tr').find('.td-diskon').text();

            if(kode_barang == kodeBrgInTtable) {
                qty = qty + toNilai(qtyBrgInTtable);
                disc = disc + toNilai(diskBrgInTtable);
                subtotal = (harga * qty) - disc;
                $(this).closest('tr').remove();
            }
        });

        input += "<tr class='row-grid'>";
        input += "<td>"+displayTable+"<input type='hidden' name='kode_barang[]' value='"+kode_barang+"' class='inp-kode' readonly></td>";
        input += "<td class='td-qty right'>"+sepNum(qty)+"<input type='hidden' name='qty_barang[]' value='"+sepNum(qty)+"' class='inp-qty' readonly></td>";
        input += "<td class='td-harga right'>"+sepNum(harga)+"<input type='hidden' name='harga_barang[]' value='"+sepNum(harga)+"' class='inp-harga' readonly></td>";
        input += "<td class='td-diskon right'>"+sepNum(disc)+"<input type='hidden' name='disc_barang[]' value='"+sepNum(disc)+"' class='inp-disc' readonly></td>";
        input += "<td class='td-sub right'>"+sepNum(subtotal)+"<input type='hidden' name='sub_barang[]' value='"+sepNum(subtotal)+"' class='inp-sub' readonly></td>";
        input += "<td class='text-center'><a href='#' class='btn btn-sm ubah-barang' style='font-size:18px !important;padding:0'><i class='simple-icon-pencil'></i></a>&nbsp;<a href='#' class='btn btn-sm hapus-item' style='font-size:18px !important;margin-left:10px;padding:0'><i class='simple-icon-trash'></i></td>";
        input += "</tr>";

        $('#input-grid tbody').append(input);
        hitungTotal();
        $("#input-grid tr:last").focus();
        $('.table-grid').formNavigation();
    }

    function hitungTotal() {
        var diskon = 0;
        var total = 0;
        $('.row-grid').each(function(){
            var diskon = $(this).closest('tr').find('.inp-disc').val();
            var subtotal = $(this).closest('tr').find('.inp-sub').val();
            diskon = diskon + toNilai(diskon);
            total = total + toNilai(subtotal);
        })

        $('#totrans').val(total);
        $('#total-trans').text("Rp. "+sepNum(total));
    }

    function getNoOpen() {
        $.ajax({
            type:'GET',
            url:"{{url('esaku-trans/penjualan-open')}}",
            dataType:'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    $no_open = result.data.no_open;
                    $('#no_open').text(result.data.no_open)
                }
            }
        });
    }

    function DelayExecution(f, delay) {
        var timer = null;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = window.setTimeout(function () {
                f.apply(context, args);
            },
            delay || 300);
        };
    }

     $.fn.ConvertToBarcodeTextbox = function () {
         $(this).keydown(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if ($(this).val() == '') {
                keyupFiredCount = 0;
            } 
            if (keycode == 13) {//enter key
                    $(".nextcontrol").focus();
                    return false;
                    event.stopPropagation();
            }
        });
        $(this).keyup(DelayExecution(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which); 
                keyupFiredCount = keyupFiredCount + 1; 
        }));
         $(this).blur(function (event) {
             if ($(this).val() == '')
                 return false;
 
             if(keyupFiredCount <= 1)
             {
                console.log('By Scanner');
                var kode_barang = $(this).val();
                tambahBarang(kode_barang);
                $(this).val('');
                $(this).focus();
             }else {
                console.log('By Manual Typing');
                var kode_barang = $(this).val();
                tambahBarang(kode_barang);
                $(this).val('');
                $(this).focus();
             } 
             keyupFiredCount = 0;
         });
    };

    $('#barcode').ConvertToBarcodeTextbox();

    document.onkeyup = function (event) {
        event.preventDefault();
        var ctrl = event.ctrlKey;
        var f1 = 112;
        var shift = 16;
        var f7 = 118;
        var f8 = 119;
        if(ctrl && event.which == f1) {
            $('#barcode').focus();
        }

        if(ctrl && event.which == shift) {
            $('#bayar').click();
        }

        if(ctrl && event.which == f7) {
            $('#edit-qty').click();
        }

        if(ctrl && event.which == f8) {
            $('#input-pembayaran').click();
        }
    }

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
    });

    function getBarang() {
        $.ajax({
            type:'GET',
            url:"{{url('toko-master/barang')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    for(var i=0;i<result.daftar.length;i++) {
                        var barang = result.daftar[i];
                        $dtBrg.push({
                            harga: barang.hna,
                            nama: barang.nama,
                            kode: barang.kode_barang
                        });
                    }

                }else if(!result.data.status && result.data.message == "Unauthorized"){
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
    }
</script>