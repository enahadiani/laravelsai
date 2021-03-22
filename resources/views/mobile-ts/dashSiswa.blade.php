<style>
    .box-top{
        /* height:27vh; */
        height: 210px;
        border-radius:0 !important;
    }
    .box-bottom{
        /* height:73vh; */
        border-radius:0 !important;
        background:white;
    }
    .bg-img{
        background-image: url("{{ asset('img/bg-tsinfo.png') }}");
        background-size: cover;
        background-repeat: no-repeat;
        background-position-y: center;
        background-position-x: center;
    }
    .col-width-8{
        width: 200pt;
    }
    .bold{
        font-weight:bold;
    }
    #piutang,#pdd
    {
        font-size:18pt;
    }
    table td, table th{
        padding: 2px !important;
    }
    .icon-tagihan{
        -webkit-mask-image: url("{{ url('img/mobile-ts/fi-rr-receipt.svg') }}");
        mask-image: url("{{ url('img/mobile-ts/fi-rr-receipt.svg') }}");
        background: var(--theme-color-1) !important;
        height: 20px !important;
        width: 15px !important;
    }
    .icon-kb{
        -webkit-mask-image: url("{{ url('img/mobile-ts/fi-rr-money.svg') }}");
        mask-image: url("{{ url('img/mobile-ts/fi-rr-money.svg') }}");
        background: var(--theme-color-1) !important;
        width: 21px !important;
        height: 14px !important;
    }
    .icon-pdd{
        -webkit-mask-image: url("{{ url('img/mobile-ts/balance_wallet_payment_cash.svg') }}");
        mask-image: url("{{ url('img/mobile-ts/balance_wallet_payment_cash.svg') }}");
        background: var(--theme-color-1) !important;
        width: 18px !important;
        height: 18px !important;
    }
</style>
<div class="row box-top bg-img">
    <div class="col-12">
        <p class="mb-4 mt-1 text-center" style="font-size:8pt">{{ Session::get('namaPP') }}</p>
        <h6 class="text-center mb-0"  style="font-size:18pt" id="nama">{{ Session::get('namaUser') }}</h6>
        <p class="text-center"  style="font-size:10pt" id="nis">{{ Session::get('userLog') }}</p>
        <div style='overflow-x:scroll;flex-wrap:unset' class='row'>
            <div class="col-grid mb-2 col-sm-10 col-10">
                <div class="card" style="background:#8080801c;cursor:pointer;border-radius:8px" id="sis-mid-bayar">
                    <div class="card-body py-1">
                        <div class="row">
                            <div class="col-10">
                                <p class="mb-1" style="font-size:8pt;color:hsla(0, 0%, 48%, 1)">Saldo Tagihan</p>
                                <h6 class="bold" id="piutang">0</h6>
                            </div>
                            <div class="col-2 my-auto">
                                <i class="simple-icon-arrow-right" style="font-size:20px;font-weight:bold"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-grid mb-2 col-sm-10 col-10">
                <div class="card" style="background:#8080801c;cursor:pointer;border-radius:8px">
                    <div class="card-body py-1">
                        <div class="row">
                            <div class="col-10">
                                <p class="mb-1" style="font-size:8pt;color:hsla(0, 0%, 48%, 1)">Saldo Deposit</p>
                                <h6 class="bold" id="piutang">0</h6>
                            </div>
                            <div class="col-2 my-auto">
                                <i class="simple-icon-arrow-right" style="font-size:20px;font-weight:bold"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row box-bottom">
    <div class="col-6 mt-4">
        <h6 class="bold">Transaksi Terakhir</h6>
    </div>
    <div class="col-6 mt-4">
        <h6 class=" text-right" style="color:hsla(0, 0%, 72%, 1)">Selengkapnya</h6>
    </div>
    <div class="col-12">
        <div class="riwayat-trans">
        
        </div>
    </div>
</div>

<script>
     function sepNum(x){
        if(!isNaN(x)){
            if (typeof x === undefined || !x || x == 0) { 
                return 0;
            }else if(!isFinite(x)){
                return 0;
            }else{
                var x = parseFloat(x).toFixed(2);
                // console.log(x);
                var tmp = x.toString().split('.');
                // console.dir(tmp);
                var y = tmp[1].substr(0,2);
                var z = tmp[0]+'.'+y;
                var parts = z.split('.');
                parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
                return parts.join(',');
            }
        }else{
            return 0;
        }
    }
    function sepNumPas(x){
        var num = parseInt(x);
        var parts = num.toString().split('.');
        var len = num.toString().length;
        // parts[1] = parts[1]/(Math.pow(10, len));
        parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
        return parts.join(',');
    }

    function getProfile(){
        $.ajax({
            type: "GET",
            url: "{{ url('mobile-ts/dash-siswa-profile') }}",
            dataType: 'json',
            data: {},
            success:function(result){    
                if(result.status){
                    if(result.data.length > 0){
                        var line = result.data[0];
                        var line2 = result.data2[0];
                        $('#nis').html(line.nis);
                        $('#nama').html(line.nama);
                        $('#piutang').html(sepNumPas(line.sak_total));
                        $('#pdd').html(sepNumPas(line2.so_akhir));
                    }
                    
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-ts/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function getRiwayatTrans(){
        $.ajax({
            type: "GET",
            url: "{{ url('mobile-ts/riwayat-trans') }}",
            dataType: 'json',
            data: {},
            success:function(result){    
                var html = "";
                var color ="";
                var icon="";
                var ket ="";
                if(result.status){
                    if(result.data.length > 0){
                        var nilai=0;
                        for(var i=0; i < result.data.length;i++){
                                var line3 = result.data[i];
                                if (line3.modul == "BILL"){
                                    // color="#AF1F22";
                                    nilai=sepNumPas(line3.total);
                                    icon="saicon icon-tagihan";
                                    ket="Tagihan";
                                }else{
                                    // color="#00A105";
                                    nilai=sepNumPas(line3.total);
                                    if(line3.modul == "PDD"){
                                        icon="saicon icon-pdd";
                                        ket="Auto Bayar";
                                    }else{
                                        icon="saicon icon-kb";
                                        ket="Pembayaran";
                                    }
                                }
                                color="";
                                html +=`
                                <table class="table table-borderless table-riwayat-trans" style="width:100%">
                                    <tr class="bold">
                                        <td style="width:20%;padding-right:10px" rowspan="2"><button class="btn btn-grey p-2" style="width:50px;background:#f9f9f9"><i class="`+icon+`"></i></button></td>
                                        <td style="width:45%" >`+ket+`</td>
                                        <td style="width:35%;color:`+color+`" class="text-right" >`+nilai+`</td>
                                    </tr>
                                    <tr>
                                        <td style="width:80%;color:#B8B8B8" colspan="2">`+line3.no_bukti+` * `+line3.tgl+`</td>
                                    </tr>
                                </table>
                                `;
                            }
                    }
                    
                }
                $('.riwayat-trans').html(html);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-ts/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getProfile();
    getRiwayatTrans();
</script>