    <style>
        .saldo::after {
            content: '';
            background-image: url("{{ asset('img/euro.png') }}");
            background-size: 45%;
            background-repeat: no-repeat;
            opacity: 0.6;
            top: 0px;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <div class="row" id="saku-dashboard">
                <div class="col-md-6">
                    <div class="card" style="border:1px solid var(--theme-color-1) ">
                        <div class="card-body" style="min-height:90px;padding:1rem">
                            <div class="row saldo">
                                <div class="col-md-10 col-10" style="border-right:1px solid var(--theme-color-1) ">
                                    <p>Saldo Tagihan</p>
                                    <p class="text-right" style="font-size:25px">Rp.</p>
                                </div>
                                <div class="col-md-2 col-2" style="margin: auto;font-size: 25px;"><i class="simple-icon-arrow-right" style="justify-content: center;display: flex;"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="border:1px solid var(--theme-color-1) ">
                        <div class="card-body" style="min-height:90px;padding:1rem">
                            <div class="row saldo">
                                <div class="col-md-10 col-10" style="border-right:1px solid var(--theme-color-1) ">
                                    <p>Saldo Deposit</p>
                                    <p class="text-right" style="font-size:25px">Rp.</p>
                                </div>
                                <div class="col-md-2 col-2" style="margin: auto;font-size: 25px;"><i class="simple-icon-arrow-right" style="justify-content: center;display: flex;"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5>Riwayat Trans</h5>
                </div>
            </div>
        </div>
    </div>
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

    function getKeuangan(){
        $.ajax({
            type: "GET",
            url: "{{ url('sekolah-trans/keuangan') }}",
            dataType: 'json',
            data: {},
            success:function(result){    
                if(result.status){
                    if(result.data.length > 0){
                        var line = result.data[0];
                        $('#nis').html(":&nbsp;"+line.nis);
                        $('#id_bank').html(":&nbsp;"+line.id_bank);
                        $('#nama').html(":&nbsp;"+line.nama);
                        $('#kode_kelas').html(":&nbsp;"+line.kode_kelas);
                        $('#nama_jur').html(":&nbsp;"+line.nama_jur);
                        $('#kode_akt').html(":&nbsp;"+line.kode_akt);
                        var detail = '';
                        var no=1;
                        var tosaldo=0;var tagihan=0; var bayar=0;
                        $('#table-detail tbody').html(detail);
                        if(result.detail.length > 0){
                            for(var i=0;i < result.detail.length ;i++){
                                var line2 = result.detail[i];
                                var saldo = parseFloat(line2.tagihan)-parseFloat(line2.bayar);
                                tagihan += parseFloat(line2.tagihan);
                                bayar += parseFloat(line2.bayar);
                                tosaldo += saldo;
                                detail +=`<tr>
                                    <td>`+no+`</td>
                                    <td>`+line2.tanggal+`</td>
                                    <td>`+line2.no_bukti+`</td>
                                    <td>`+line2.keterangan+`</td>
                                    <td>`+sepNumPas(line2.tagihan)+`</td>
                                    <td>`+sepNumPas(line2.bayar)+`</td>
                                    <td>`+sepNumPas(saldo)+`</td>
                                </tr>`;
                                no++;
                            }
                            detail+=`<tr>
                                <td colspan='4' class='text-right'><b>Total</b></td>
                                <td>`+sepNumPas(tagihan)+`</td>
                                <td>`+sepNumPas(bayar)+`</td>
                            </tr>
                            <tr>
                                <td colspan='6' class='text-right'><b>Saldo</b></td>
                                <td>`+sepNumPas(tosaldo)+`</td>
                            </tr>`;
                        }
                        $('#table-detail tbody').html(detail);
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
                    window.location="{{ url('/sekolah-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    // getKeuangan();

    </script>