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

<div class="container-fluid mt-3" style="display:none;">
    <div class="row" >
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card" style="height: 130px; border-radius:10px !important;">
                <h6 class="ml-3 mt-4" style="font-size: 16px;color:#d3d3d3;">Kunjungan YoY</h6>
                <div class="card-body pt-0" style="padding-left: 16px;">
                    <h1><strong>12K</strong></h1>
                    <p class="text-danger" style="margin-top: -12px;">-20,3% dari tahun lalu</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card" style="height: 130px; border-radius:10px !important;">
                <h6 class="ml-3 mt-4" style="font-size: 16px;color:#d3d3d3;">Bidang teratas Ytd</h6>
                <div class="card-body pt-0" style="padding-left: 16px;">
                    <h1><strong>Ciwidey</strong></h1>
                    <p class="text-info" style="margin-top: -12px;">300K pengunjung</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card" style="height: 130px; border-radius:10px !important;">
                <h6 class="ml-3 mt-4" style="font-size: 16px;color:#d3d3d3;">Mitra teratas Ytd</h6>
                <div class="card-body pt-0" style="padding-left: 16px;">
                    <h1><strong>SAI</strong></h1>
                    <p class="text-info" style="margin-top: -12px;">300K pengunjung</p>
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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card" style="border-radius:10px !important;">
                 <h6 class="ml-3 mt-4"><strong>Daerah Populer</strong></h6>
                <div class="card-body pt-0">
                    <table class='table' id='populer'>
                        <thead>
                            <tr>
                                <th>Daerah</th>
                                <th>Kunjungan</th>
                                <th>Mitra</th>
                                <th>Bidang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bojongsoang</td>
                                <td>13,5K</td>
                                <td>12</td>
                                <td>38</td>
                            </tr>
                            <tr>
                                <td>Bojongsoang</td>
                                <td>13,5K</td>
                                <td>12</td>
                                <td>38</td>
                            </tr>
                            <tr>
                                <td>Bojongsoang</td>
                                <td>13,5K</td>
                                <td>12</td>
                                <td>38</td>
                            </tr>
                            <tr>
                                <td>Bojongsoang</td>
                                <td>13,5K</td>
                                <td>12</td>
                                <td>38</td>
                            </tr>
                            <tr>
                                <td>Bojongsoang</td>
                                <td>13,5K</td>
                                <td>12</td>
                                <td>38</td>
                            </tr>
                            <tr>
                                <td>Bojongsoang</td>
                                <td>13,5K</td>
                                <td>12</td>
                                <td>38</td>
                            </tr>
                        </tbody>
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
                    <table class='table' id='populer'>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>MTR-001</td>
                                <td>Kampung Gajah</td>
                            </tr>
                           <tr>
                                <td>MTR-001</td>
                                <td>Kampung Gajah</td>
                            </tr>
                            <tr>
                                <td>MTR-001</td>
                                <td>Kampung Gajah</td>
                            </tr>
                            <tr>
                                <td>MTR-001</td>
                                <td>Kampung Gajah</td>
                            </tr>
                            <tr>
                                <td>MTR-001</td>
                                <td>Kampung Gajah</td>
                            </tr>
                        </tbody>
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
        var str = 'Rb';
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
        return (parseFloat(num/pembagi).toFixed(0) * -1) + ' ' +str;
    }else if (num > 0 && num >= 1000){
        return parseFloat(num/pembagi).toFixed(0) + ' ' +str;
    }else if(num > 0 && num < 1000){
        return num;
    }else{
        return num;
    }
}

    // HIGHCHART //

    // JUMLAH KUNJUNGAN //
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
            categories: ['A', 'B', 'C', 'D', 'E', 'F'],
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
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
        },

        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical'
        },

        series: [{
            name: 'Jumlah',
            data: [43000, 19000, 60000, 35000, 17000, 10000],
            pointPlacement: 'on'
        }],
    });

    // END JUMLAH KUNJUNGAN //

    // KUNJUNGAN TAHUNAN //

    Highcharts.chart('kunjunganTahunan', {

        title: {
            text: ''
        },

        credits: {
            enabled: false
        },

        yAxis: {
            title: {
                text: 'Jumlah Pengunjung'
            }
        },

        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        series: [{
            name: 'A',
            data: [1000, 500, 1200, 3000, 3500, 4000, 6000, 7500, 3000, 2000, 100, 200]
        }, {
            name: 'B',
            data: [1250, 750, 1400, 3200, 2000, 3800, 2000, 7000, 2500, 2000, 150, 250]
        }, {
            name: 'C',
            data: [1150, 450, 1000, 3500, 1000, 3000, 5000, 0, 1200, 2500, 650, 950]
        }, {
            name: 'D',
            data: [1550, 450, 1100, 3500, 2500, 3200, 2500, 7000, 3000, 2000, 750, 350]
        }, {
            name: 'E',
            data: [1050, 350, 1200, 3400, 2500, 3300, 2200, 7500, 2300, 2500, 750, 850]
        }],

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

    // END KUNJUNGAN TAHUNAN // 

    // END HIGHCHART //
</script>