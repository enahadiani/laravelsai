    <style>
        .table-datapribadi td,.table-lap td, .table-tagihan td, .table-riwayat-trans td{
            padding: 3px 0px !important;
        }
        .bold{
            font-weight: bold;
        }
        .bg-grey{
            background: gray !important;
        }
        .col-grid{
            display:grid !important; padding: 0 0.75rem !important;
        }
        .text-white{
            color: white !important
        }
        
        .text-grey{
            color: #C3C3C3 !important
        }

        .saicon {
            display: inline-block;
            width: 14px;
            height: 14px;
            background: black; 
            -webkit-mask-size: cover;
            mask-size: cover;
        }

        .btn-grey{
            background:#F9F9F9;
        }
        .icon-pdd{
            background: black;
            -webkit-mask-image: url("{{ url('img/Deposit.svg') }}");
            mask-image: url("{{ url('img/Deposit.svg') }}");
            width: 14px;
            height: 14px;
        }

        .icon-keuangan{
            background: black;
            -webkit-mask-image: url("{{ url('img/KartuSiswa.svg') }}");
            mask-image: url("{{ url('img/KartuSiswa.svg') }}");
            width: 14px;
            height: 18px;
        }
        
        .iconsminds-down, .iconsminds-up{
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg);
            display: inline-block;
        }
        .klik-report{
            cursor:pointer;
        }
        button.bg-primary:hover, button.bg-primary:focus {
            background-color: #f3f3f3 !important;
        }
    </style>
    <div class="row" >
        <div class="col-12 col-lg-4 col-xl-3 col-left col-grid content-fix-height-left" >
            <div class="card mb-4" style="height:100%">
                <div class="position-absolute card-top-buttons">
                    <button class="btn btn-outline-white icon-button bg-primary" id="btn-editprofile" style="border:0;border-radius:50% !important;width:32px;height:32px" >
                        <i class="simple-icon-pencil"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <img alt="Profile" id="foto-siswa" src="" class="img-thumbnail border-0 rounded-circle mt-3 mb-2 mx-4 list-thumbnail align-self-center mx-auto " style="height:70px !important">
                    </div>
                    <div class="text-center">
                        <p class="list-item-heading mb-1 truncate text-primary bold" id="nama"></p>
                        <p class="mb-2 text-muted text-small" id="nama_jur"></p>
                    </div>
                    <div class="mt-4">
                        <h6 class="bold">Data Pribadi</h6>
                        <table class="table table-borderless table-datapribadi" style="width:100%">
                            <tr>
                                <td style="width:40%">NIS</td>
                                <td style="width:2%">:</td>
                                <td style="width:48%" id="nis"></td>
                            </tr>
                            <tr>
                                <td style="width:40%;vertical-align:middle">VA</td>
                                <td style="width:2%;vertical-align:middle">:</td>
                                <td style="width:48%;vertical-align:middle"><span id="id_bank" class="mr-2"></span><img src="{{ url('img/bm.png') }}" width="35px"></td>
                            </tr>
                            <tr>
                                <td style="width:40%">Angkatan</td>
                                <td style="width:2%">:</td>
                                <td style="width:48%" id="kode_akt"></td>
                            </tr>
                            <tr>
                                <td style="width:40%">Kelas</td>
                                <td style="width:2%">:</td>
                                <td style="width:48%" id="kode_kelas"></td>
                            </tr>
                        </table>
                        <h6 class="bold">Laporan</h6>
                        <table class="table table-borderless table-lap" style="width:100%">
                            <tr class="klik-report">
                                <td style="width:10%"><i class="saicon icon-keuangan"></i></td>
                                <td style="width:80%">Kartu Keuangan <p hidden class="kode_form">fKartuPiutang</p></td>
                                <td style="width:10%"><i class="simple-icon-arrow-right"></i></td>
                            </tr>
                            <tr class="klik-report">
                                <td style="width:10%"><i class="saicon icon-pdd"></i></td>
                                <td style="width:80%">Kartu Deposit <p hidden class="kode_form">fKartuPDD</p></td>
                                <td style="width:10%"><i class="simple-icon-arrow-right"></i></td>
                            </tr>
                        </table>
                    </div>
                    <button class="btn btn-primary" id="beranda" style="position:absolute;bottom:0;margin:20px 70px">Beranda</button>
                </div>
            </div>                 
        </div>
        <div class="col-12 col-lg-8 col-xl-9 col-right col-grid content-fix-height-right table-responsive" id="content-dash">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body px-5 py-4"> 
                            <div class="row">
                                <div class="col-md-6 col-12 col-grid">
                                    <h1 class="text-primary bold">Informasi<br>Keuangan</h1>
                                </div>
                                <div class="col-md-3 col-12 col-grid">
                                    <div class="card" style="background:#AF1F22">
                                        <div class="card-body py-3">
                                            <p class="text-white mb-2">Tagihan</p>
                                            <h6 class="text-white bold" id="piutang"></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 col-grid">
                                    <div class="card" style="background:#707070">
                                        <div class="card-body py-3">
                                            <p class="text-white mb-2">Deposit</p>
                                            <h6 class="text-white bold" id="pdd"></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3" style="min-height:340px">
                <div class="col-lg-8 col-grid">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bold">Daftar Tagihan</h6>
                            <div class="daftar-tagihan">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-grid">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bold">Riwayat Transaksi</h6>
                            <div class="riwayat-trans">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script> 
    $('body').addClass('dash-contents');
    $('html').addClass('dash-contents');
    setHeightForm();
    $('#beranda').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

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

    $('.table-lap').on('click','.klik-report',function(e){
        e.preventDefault();
        var form = $(this).find('.kode_form').html();
        var xurl = "{{url('ts-auth/form')}}/"+form;
        $('#content-dash').load(xurl);
    });

    function getProfile(){
        $.ajax({
            type: "GET",
            url: "{{ url('ts-dash/dash-siswa-profile') }}",
            dataType: 'json',
            data: {},
            success:function(result){    
                if(result.status){
                    if(result.data.length > 0){
                        var line = result.data[0];
                        var line2 = result.data2[0];
                        $('#nis').html(line.nis);
                        $('#id_bank').html(line.id_bank);
                        $('#nama').html(line.nama);
                        $('#kode_kelas').html(line.kode_kelas);
                        $('#kode_akt').html(line.kode_akt);
                        $('#nama_jur').html(line.nama_jur);
                        $('#piutang').html(sepNumPas(line.sak_total));
                        $('#pdd').html(sepNumPas(line2.so_akhir));
                        if(line.foto != "-"){
                            var foto = "{{ config('api.url') }}/"+line.foto;
                        }else{
                            var foto = "{{ asset('asset_elite/images/user.png') }}";
                        }
                        $('#foto-siswa').attr("src",foto);

                        var html = "";
                        var color ="";
                        var icon="";
                        var ket ="";
                        if(result.data3.length > 0){
                            for(var i=0; i < result.data3.length;i++){
                                var line3 = result.data3[i];
                                if (line3.modul == "BILL"){
                                    color="#AF1F22";
                                    nilai=sepNumPas(line3.tagihan);
                                    icon="iconsminds-down";
                                    ket="Tagihan";
                                }else{
                                    color="#00A105";
                                    nilai=sepNumPas(line3.bayar);
                                    icon="iconsminds-up";
                                    ket="Pembayaran";
                                }
                                html +=`
                                <table class="table table-borderless table-riwayat-trans" style="width:100%">
                                    <tr class="bold">
                                        <td style="width:25%;padding-right:10px" rowspan="2"><button class="btn btn-grey p-2"><i class="`+icon+`" style="font-size:18px;color:`+color+`"></i></button></td>
                                        <td style="width:40%" >`+ket+`</td>
                                        <td style="width:35%;color:`+color+`" class="text-right" >`+nilai+`</td>
                                    </tr>
                                    <tr>
                                        <td style="width:75%;color:#B8B8B8" colspan="2">`+line3.no_bukti+` * `+line3.tgl+`</td>
                                    </tr>
                                </table>
                                `;
                            }
                        }
                        $('.riwayat-trans').html(html);

                        var html = "";
                        var color ="";
                        var icon="";
                        var ket ="";
                        if(result.data4.length > 0){
                            for(var i=0; i < result.data4.length;i++){
                                var line4 = result.data4[i];
                                nilai=sepNumPas(line4.sisa);
                                html +=`<div class="row mb-3">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body py-2 ">
                                            <table class="table table-borderless table-tagihan" style="width:100%">
                                                <tr class="text-primary bold">
                                                    <td style="width:75%">Tagihan</td>
                                                    <td style="width:25%" class="text-right">`+nilai+`</td>
                                                </tr>
                                                <tr>
                                                    <td style="width:75%">`+line4.keterangan+` </td>
                                                    <td style="width:25%">&nbsp;</td>
                                                </tr>
                                                <tr class="text-grey">
                                                    <td style="width:75%">`+line4.tgl+` || `+line4.no_bukti+` || `+line4.kode_param+`</td>
                                                    <td style="width:25%">&nbsp;</td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }
                        }
                        $('.daftar-tagihan').html(html);
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
                    window.location="{{ url('/ts-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getProfile();

    $('.card-top-buttons').on('click','#btn-editprofile',function(e){
        e.preventDefault();
        var url = "{{ url('ts-auth/form/fProfile') }}";
        loadForm(url);
    });

    $('.card-body').on('click','#beranda',function(e){
        e.preventDefault();
        loadForm("{{ url('ts-auth/form') }}/"+form);
    });
    </script>