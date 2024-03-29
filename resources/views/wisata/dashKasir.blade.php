@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');

$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2)
@endphp

<style>
    .card{
        border-radius: 0 !important;
        box-shadow: none;
        border: 1px solid #f0f0f0;
    }
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .btn-outline-light {
        color: #131113;
        background-color: white;
        border-color: white !important;
    }

    /* NAV TABS */
    .nav-tabs {
        border:none;
    }

    .nav-tabs .nav-link{
        border: 1px solid #ad1d3e;
        border-radius: 20px;
        padding: 2px 25px;
        color:#ad1d3e;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: white;
        background-color: #ad1d3e;
        border-color: #ad1d3e;
    }

    .nav-tabs .nav-item {
        margin-bottom: -1px;
        padding: 0px 10px 0px 0px;
    }

    #pencapaian > td, th 
    {
        padding: 4px !important;
    }
</style>

<div class="container-fluid mt-3">
    <div class="row" >
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card" style="height: 130px; border-radius:10px !important;">
                <h6 class="ml-3 mt-4" style="font-size: 16px;color:#d3d3d3;">Kunjungan YoY</h6>
                <div class="card-body pt-0" style="padding-left: 16px;">
                    <h1 id="num-kunjungan"><strong></strong></h1>
                    <p id="ket-kunjungan" style="margin-top: -12px;"></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card" style="height: 130px; border-radius:10px !important;">
                <h6 class="ml-3 mt-4" style="font-size: 16px;color:#d3d3d3;">Bidang teratas Ytd</h6>
                <div class="card-body pt-0" style="padding-left: 16px;">
                    <h1 id="nam-bidang" style="font-size: 20px;"><strong></strong></h1>
                    <p  id="ket-bidang" class="text-info" style="margin-top: -5px;"></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card" style="height: 130px; border-radius:10px !important;">
                <h6 class="ml-3 mt-4" style="font-size: 16px;color:#d3d3d3;">Mitra teratas Ytd</h6>
                <div class="card-body pt-0" style="padding-left: 16px;">
                    <h1 id="nam-mitra" style="font-size: 20px;"><strong></strong></h1>
                    <p  id="ket-mitra" class="text-info" style="margin-top: -5px;"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-7 col-sm-12 mb-4">
            <div class="card" style="border-radius:10px !important;">
                 <h6 class="ml-3 mt-4"><strong>Jumlah Kunjungan</strong></h6>
                 <p class="ml-3 pt-0">10 Agustus 2020 - 17 Agustus 2020 <span class="mr-4" style="float: right;"><a href="#" class="text-info">Ubah</a></span></p>
                <div class="card-body pt-0">
                    <div id='kunjungan' style="height: 350px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-12 mb-4">
            <div class="card" style="border-radius:10px !important;">
                 <h6 class="ml-3 mt-4"><strong> kunjungan tahun 2020 </strong><span class="mr-4" style="float: right;"><a href="#" class="text-info">Ubah</a></span></h6>
                <div class="card-body pt-0">
                    <div id='kunjunganTahunan'></div>
                    <table class="table mt-1">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Symbol</th>
                                <th style="text-align: center;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="display: flex;align-items: center;align-content: center;">
                                    <div style="margin:0 auto;width: 25px; height:5px;background-color:black;"></div>
                                </td>
                                <td>Usaha Jasa Penyediaan Akomodasi</td>
                            </tr>
                            <tr>
                                <td style="display: flex;align-items: center;align-content: center;">
                                    <div style="margin:0 auto;width: 25px; height:5px;background-color:#add8e6;"></div>
                                </td>
                                <td>Usaha Jasa Makanan dan Minuman</td>
                            </tr>
                            <tr>
                                <td style="display: flex;align-items: center;align-content: center;">
                                    <div style="margin:0 auto;width: 25px; height:5px;background-color:#90ee90;"></div>
                                </td>
                                <td>Usaha Penyelenggaraan Kegiatan Rekreasi dan Hiburan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card" style="border-radius:10px !important;">
                 <h6 class="ml-3 mt-4"><strong>Daerah Populer</strong></h6>
                <div class="card-body pt-0">
                    <table class='table' id='daerah'>
                        <thead>
                            <tr>
                                <th style="text-align: center;">Daerah</th>
                                <th style="text-align: center;">Kunjungan</th>
                                <th style="text-align: center;">Mitra</th>
                                <th style="text-align: center;">Bidang</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card" style="border-radius:10px !important;">
                 <h6 class="ml-3 mt-4"><strong>Mitra Populer</strong></h6>
                <div class="card-body pt-0">
                    <table class='table' id='mitra'>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group">
                            <label>Periode</label>
                            <select class="form-control" data-width="100%" name="periode" id="periode">
                                <option value='#'>Pilih Periode</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
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

    function toRibuan(x) {
        var nil = x / 1000;
        return sepNum(nil) + '';
    }

    function toJuta(x) {
        var nil = x / 1000000;
        return sepNum(nil) + '';
    }

    function toMilyar(x) {
        var nil = x / 1000000000;
        return sepNum(nil) + ' M';
    }

    function singkatNilai(num){
        if(num < 0){
            num = num * -1;
        }
        
        if(num >= 1000 && num < 1000000){
            var str = 'K';
            var pembagi = 1000;
        }else if(num >= 1000000 && num < 1000000000){
            var str = 'Jt';
            var pembagi = 1000000;
        }else if(num >= 1000000000 && num < 1000000000000){
            var str = 'M';
            var pembagi = 1000000000;
        }else if(num >= 1000000000000){
            var str = 'T';
            var pembagi = 1000000000000;
        }
        
        if(num < 0){
            return (parseFloat(num/pembagi).toFixed(0) * -1) + '' +str;
        }else if (num > 0 && num >= 1000){
            return parseFloat(num/pembagi).toFixed(0) + '' +str;
        }else if(num > 0 && num < 1000){
            return num;
        }else{
            return num;
        }
    }

    $.ajax({
        type:"GET",
        url:"{{ url('wisata-dash/data-kunjungan') }}",
        dataType:"JSON",
        success: function(response) {
            var res = response.data;
            var persentase;
            if(response.status) {
                $('#num-kunjungan').text(singkatNilai(res.YoYnow));

                if(res.persentase < 0) {
                    persentase = `-${res.persentase}`;
                } else {
                    persentase = res.persentase;
                }

                $('#ket-kunjungan').text(`${persentase}% dari tahun lalu`);

                if(res.banding == 'besar') {
                    $('#ket-kunjungan').addClass('text-info');
                } else {
                    $('#ket-kunjungan').addClass('text-danger');
                }
            }
        }
    });

    $.ajax({
        type:"GET",
        url:"{{ url('wisata-dash/data-bidang') }}",
        dataType:"JSON",
        success: function(response) {
            var res = response.data.data;
            if(response.status) {
                $('#nam-bidang').text(res.nama);
                $('#ket-bidang').text(`${singkatNilai(res.jumlah)} pengunjung`);
            }
        }
    });

    $.ajax({
        type:"GET",
        url:"{{ url('wisata-dash/data-mitra') }}",
        dataType:"JSON",
        success: function(response) {
            var res = response.data.data;
            if(response.status) {
                $('#nam-mitra').text(res.nama);
                $('#ket-mitra').text(`${singkatNilai(res.jumlah)} pengunjung`);
            }
        }
    });

    $.ajax({
        type:"GET",
        url:"{{ url('wisata-dash/top-daerah') }}",
        dataType:"JSON",
        success: function(response) {
            $('#daerah tbody').empty();
            var res = response.data.data;
            if(response.status) {
                var row = "";
                for(var i=0;i<res.length;i++) {
                    var data = res[i];
                    row += "<tr>";
                    row += "<td>"+data.camat+"</td>";
                    row += "<td style='text-align: right;'>"+singkatNilai(data.jumlah)+"</td>";
                    row += "<td>"+data.mitra+"</td>";
                    row += "<td>"+data.bidang+"</td>";
                    row += "</tr>";
                }
                $('#daerah tbody').append(row);
            }
        }
    });

    $.ajax({
        type:"GET",
        url:"{{ url('wisata-dash/top-mitra') }}",
        dataType:"JSON",
        success: function(response) {
            $('#mitra tbody').empty();
            var res = response.data.data;
            if(response.status) {
                var row = "";
                for(var i=0;i<res.length;i++) {
                    var data = res[i];
                    row += "<tr>";
                    row += "<td>"+data.kode_mitra+"</td>";
                    row += "<td>"+data.mitra+"</td>";
                    row += "</tr>";
                }
                $('#mitra tbody').append(row);
            }
        }
    });

    $.ajax({
        type:"GET",
        url:"{{ url('wisata-dash/kunjungan-tahunan') }}",
        dataType:"JSON",
        success: function(response) {
            if(response.status) {
                Highcharts.chart('kunjunganTahunan', {
                    title: {
                        text: ''
                    },
                    credits: {
                        enabled: false
                    },
                    legend:{ enabled:false },
                    yAxis: {
                        title: {
                            text: 'Jumlah Pengunjung'
                        }
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
                    },
                    series: response.data.data,
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500,
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            }
            
        }
    });

    $.ajax({
        type:"GET",
        url:"{{ url('wisata-dash/kunjungan-bulanan') }}",
        dataType:"JSON",
        success: function(response) {
            if(response.status) {
                console.log(response)
                Highcharts.chart('kunjungan', {
                    chart: {
                        polar: true,
                        type: 'line'
                    },

                    credits: {
                        enabled: false
                    },

                    title: {
                        text: '',
                    },

                    pane: {
                        size: '80%'
                    },

                    xAxis: {
                        categories: response.data.ctg,
                        tickmarkPlacement: 'on',
                        lineWidth: 0
                    },

                    yAxis: {
                        gridLineInterpolation: 'polygon',
                        lineWidth: 0,
                        min: 0
                    },

                    tooltip: {
                        shared: true,
                        pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
                    },

                    legend: {
                        align: 'right',
                        verticalAlign: 'middle',
                        layout: 'vertical'
                    },

                    series: [{
                        name: 'Jumlah',
                        data: response.data.data,
                        pointPlacement: 'on'
                    }],
                });
            }
        }
    });
    
});
    // HIGHCHART //

    // JUMLAH KUNJUNGAN //
    // Highcharts.chart('kunjungan', {

    //     chart: {
    //         polar: true,
    //         type: 'line'
    //     },

    //     credits: {
    //         enabled: false
    //     },

    //     title: {
    //         text: '',
    //     },

    //     pane: {
    //         size: '80%'
    //     },

    //     xAxis: {
    //         categories: ['A', 'B', 'C', 'D', 'E', 'F'],
    //         tickmarkPlacement: 'on',
    //         lineWidth: 0
    //     },

    //     yAxis: {
    //         gridLineInterpolation: 'polygon',
    //         lineWidth: 0,
    //         min: 0
    //     },

    //     tooltip: {
    //         shared: true,
    //         pointFormat: '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
    //     },

    //     legend: {
    //         align: 'right',
    //         verticalAlign: 'middle',
    //         layout: 'vertical'
    //     },

    //     series: [{
    //         name: 'Jumlah',
    //         data: [43000, 19000, 60000, 35000, 17000, 10000],
    //         pointPlacement: 'on'
    //     }],
    // });

    // END JUMLAH KUNJUNGAN //
</script>