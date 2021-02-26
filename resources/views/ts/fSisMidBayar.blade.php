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
        .bg-img{
            background-image: url("{{ asset('img/bg-tsinfo.png') }}");
            background-size: cover;background-repeat: no-repeat;background-position-y: center;border-radius: 0.75rem;
        }

        .icon-pbyr{
            background: #990000;
            -webkit-mask-image: url("{{ url('img/fi-rr-calculator.svg') }}");
            mask-image: url("{{ url('img/fi-rr-calculator.svg') }}");
            width: 18px;
            height: 20px;
        }
        .table-metode td{
            padding: 4px;
            vertical-align:middle;
        }
        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem !important;
            
        }

        
        .card-body-footer{
            background: white;
            position: relative;
            bottom: 0px;
            z-index:3;
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 1rem;
            box-shadow: 0 -5px 20px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);
        }

        .card-body-footer > button{
            float: right;
            margin-top: 10px;
            margin-right: 25px;
        }
    </style>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body px-5 py-4 bg-img"> 
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
                            <h6 class="bold">Daftar Tagihan <a href="#" class="text-primary float-right" id="riwayat-pbyr" style="font-size:12px;text-decoration: underline;font-style: italic;"> Riwayat Pembayaran</a></h6>
                            <div class="daftar-tagihan">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-grid">
                    <form id="form-bayar" onsubmit="return submitForm();">
                        <div class="card" style="height:100%">
                            <div class="card-body">
                                <h6 class="bold">Pembayaran</h6>
                                <div class="pembayaran">
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-12 px-1">
                                            <input type="text" name="nilai" id="nilai" class="form-control" style="padding-left:35px" placeholder="Masukkan Nilai Pembayaran"> <i style="position: absolute;top: 9px;left:10px" class="saicon icon-pbyr"></i>
                                            <input type="hidden" name="no_bill" id="no_bill">
                                            <input type="hidden" name="ket" id="ket">
                                            <input type="hidden" name="periode_bill" id="periode_bill">
                                            <input type="hidden" name="kode_param" id="kode_param">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body p-2">
                                                    <table class="table table-borderless table-metode m-0" style="width:100%">
                                                        <tr>
                                                            <td colspan="2"><h6 class="bold">Metode Pembayaran</h6></td>
                                                            <td rowspan="2" class="text-center"><i class="simple-icon-arrow-right"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:20%">
                                                                <img src="{{ url('img/bm.png') }}" width="35px" alt="">
                                                            </td>
                                                            <td style="width:70%;font-size:10px">
                                                                Mandiri Virtual Account
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body-footer" style="padding: 0 25px;display:flex">
                                <div style="vertical-align: middle;" class="col-md-9 p-0">
                                    <p class="text-grey mb-0 mt-2">Total</p>
                                    <p class="bold mb-2" id="total-label">0</p>
                                </div>
                                <div style="text-align: right;" class="col-md-3 p-0 ">
                                    <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Bayar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
   
    <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <!-- <script src="{{ asset('asset_elite/inputmask.js') }}"></script> -->
    <script> 
    $('body').addClass('dash-contents');
    $('html').addClass('dash-contents');
    $('#beranda').show();
    setHeightForm();
    
    $('#nilai').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    $('#nilai').change(function(e){
        hitungTotal();
    });

    function hitungTotal(){
        var nilai = $('#nilai').val();
        var total_d = toNilai(nilai);

        var total_bill =0;
        $('.daftar-tagihan > .row').each(function(){
            if($(this).closest('div').find('.col-1 .custom-control-input').prop('checked')){
                var nilai = $(this).closest('div').find('.col-11 .inp-nilai').html();
                total_bill += +toNilai(nilai);
            }
        });
        if(total_bill < total_d){
            alert('Total Bayar tidak boleh lebih besar dari Total Bill');
            $('#nilai').val('');
            $('#total-label').html(sepNum(0));
            return false;
        }else{
            $('#total-label').html(sepNum(total_d));
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function getTagihan(){
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
                        $('#piutang').html(sepNumPas(line.sak_total));
                        $('#pdd').html(sepNumPas(line2.so_akhir));
                        
                        var html = "";
                        var color ="";
                        var icon="";
                        var ket ="";
                        if(result.data4.length > 0){
                            for(var i=0; i < result.data4.length;i++){
                                var line4 = result.data4[i];
                                nilai=sepNumPas(line4.sisa);
                                html +=`<div class="row mb-3">
                                    <div class="col-1 my-auto">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check-bayar`+i+`" name="check-bayar[]">
                                            <label class="custom-control-label" for="check-bayar`+i+`"></label>
                                            <p hidden class='inp-no_bill'>`+line4.no_bukti+`</p>
                                            <p hidden class='inp-ket'>`+line4.keterangan+`</p>
                                            <p hidden class='inp-kode_param'>`+line4.kode_param+`</p>
                                            <p hidden class='inp-periode_bill'>`+line4.periode+`</p>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        <div class="card">
                                            <div class="card-body py-2 ">
                                            <table class="table table-borderless table-tagihan" style="width:100%">
                                                <tr class="text-primary bold">
                                                    <td style="width:75%">Tagihan</td>
                                                    <td style="width:25%" class="text-right inp-nilai">`+nilai+`</td>
                                                </tr>
                                                <tr>
                                                    <td style="width:75%">`+line4.keterangan+` </td>
                                                    <td style="width:25%;text-align:right" rowspan='2'></td>
                                                </tr>
                                                <tr class="text-grey">
                                                    <td style="width:75%">`+line4.tgl+` || `+line4.no_bukti+` || `+line4.kode_param+`</td>
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

                        
                        $('input[type="checkbox"]').click(function(){

                            var $box = $(this);
                            if ($box.is(":checked")) {
                                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                                $(group).prop("checked", false);
                                $box.prop("checked", true);
                                var no_bill = $(this).closest('div').find('.inp-no_bill').html();
                                var ket = $(this).closest('div').find('.inp-ket').html();
                                
                                var kode_param = $(this).closest('div').find('.inp-kode_param').html();
                                var periode_bill = $(this).closest('div').find('.inp-periode_bill').html();
                                $('#no_bill').val(no_bill);
                                $('#ket').val(ket);
                                $('#periode_bill').val(periode_bill);
                                $('#kode_param').val(kode_param);
                            } else {
                                $box.prop("checked", false);
                                $('#no_bill').val('');
                                $('#ket').val('');
                                $('#periode_bill').val('');
                                $('#kode_param').val('');
                            }

                            // if($(this).is(":checked")){
                            // }
                            // else if($(this).is(":not(:checked)")){
                            // }

                        });

   
                        
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

    getTagihan();

    function submitForm() {
        // Kirim request ajax
        if(toNilai($('#total-label').html()) <= 0){
            alert('Total bayar tidak valid. Total Bayar tidak boleh kurang dari sama dengan 0');
            return false;
        }

        $.post("{{ route('bayar.store') }}",
        {
            _method: 'POST',
            _token: '{{ csrf_token() }}',
            nilai: toNilai($('input#nilai').val()),
            keterangan: $('input#ket').val(),
            nis: "{{ Session::get('userLog') }}",
            no_bill: $('input#no_bill').val(),
            periode_bill: $('input#periode_bill').val(),
            kode_param: $('input#kode_param').val(),
        },
        // $.post("{{ route('donation.store') }}",
        // {
        //     _method: 'POST',
        //     _token: '{{ csrf_token() }}',
        //     nilai: "11000",
        //     keterangan: "tes",
        //     tipe_donasi: "XX",
        //     nama: "ena hd",
        //     email: "ena@gmail.com",
        // },
        function (data, status) {
            snap.pay(data.snap_token, {
                // Optional
                onSuccess: function (result) {
                    console.log(result);
                    alert(result.status_message);
                    // dataTable.ajax.reload();
                    // $('#donation')[0].reset();

                },
                // Optional
                onPending: function (result) {
                    console.log(result);
                    alert(result.status_message);
                    // dataTable.ajax.reload();
                    // $('#donation')[0].reset();
                },
                // Optional
                onError: function (result) {
                    alert(result.status_message);
                    console.log(result);
                }
            });
        });
        return false;
    }

    $('h6').on('click','#riwayat-pbyr',function(e){
        e.preventDefault();
        var xurl = "{{url('ts-auth/form')}}/fListMidBayar";
        $('#content-dash').load(xurl);
    });

    </script>