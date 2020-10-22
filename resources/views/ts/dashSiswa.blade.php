    <!-- CSS tambahan -->
    <style>
        .kop img.logo{
            width:100px !important;
            height:100px !important;
        }
        .list-item-heading{
            font-size:0.8rem;
        }
        .menu-icon{
            cursor:pointer;
        }

        #profile-table td, #keuangan-table td
        {
            padding:0px !important;
        }

   
        #profile-photo
        {
            height:180px;
            background-image:url("{{ asset('img/ts-logo2.png') }}");
            /* background-image:url("{{ asset('asset_dore/img/profiles/l-1.jpg') }}"); */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: 120px;
            border-radius:0.75rem; 
        }
    </style>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body" id="profile-photo">
                   
                </div>
            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><b>Profile Siswa</b></h5>
                            <table class="table no-margin table-borderless" id="profile-table">
                                <tr>
                                    <td style="width:19%">NIS</td>
                                    <td style="width:1%">:</td>
                                    <td style="width:80%" id="nis"></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td id="nama"></td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>:</td>
                                    <td id="nama_jur"></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td id="kode_kelas"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5><b>Info Keuangan</b></h5>
                            <table class="table no-margin table-borderless" id="keuangan-table">
                                <tr>
                                    <td style="width:19%">Piutang</td>
                                    <td style="width:1%">:</td>
                                    <td style="width:80%" id="piutang"></td>
                                </tr>
                                <tr>
                                    <td>PDD</td>
                                    <td>:</td>
                                    <td id="pdd"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" id="saku-dashboard">
        <div class="card-body">
            <div class="row mb-4" style="justify-content:center">
                <div class="col-sm-12 text-center mb-3">
                    <h5><b>Layanan Siswa</b></h5>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/check.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p hidden class="kode_form">fKartuPiutang</p>
                    <p class="list-item-heading mb-3">Kartu Siswa</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/wallet.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p hidden class="kode_form">fKartuPDD</p>
                    <p class="list-item-heading mb-3">Kartu PDD</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/report2.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p hidden class="kode_form">fRaport</p>
                    <p class="list-item-heading mb-3">Raport</p>
                </div>
            </div>
        </div>
    </div>
    <!-- LIST DATA -->

    <script>    
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

    $('#saku-dashboard').on('click','.menu-icon',function(e){
        e.preventDefault();
        var form = $(this).find('.kode_form').html();
        loadForm("{{url('ts-auth/form')}}/"+form);
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
                        $('#nama').html(line.nama);
                        $('#kode_kelas').html(line.kode_kelas);
                        $('#nama_jur').html(line.nama_jur);
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
                    window.location="{{ url('/ts-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getProfile();

    </script>