<link rel="stylesheet" href="{{ asset('master.css') }}" />
<style>
    table.table-akun > thead > tr > th {
        color: #f0f0f0;
        text-align: center;
    }
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
    .container-org {
        display: flex;
        align-content: center;
        justify-content: center;
    }
    .container-org-detail {
        display: flex;
        align-content: center;
        justify-content: center;
    }
    .container-medis-detail {
        display: flex;
        align-content: center;
        justify-content: center;
    }
    .circle-1 {
        height: 120px;
        width: 120px;
        border-radius: 100%;
        background-color: #bfbfbf;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .circle-2 {
        height: 75%;
        width: 75%;
        border-radius: 100%;
        background-color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .circle-3 {
        height: 80%;
        width: 80%;
        border-radius: 100%;
        background-color: #bfbfbf;
        text-align: center;
    }
    .circle-content {
        margin-top: 20px;
    }
    .select-dash {
        border-radius: 10px;
    }
    .fixed-filter {
        background-color: #f8f8f8;
        position: fixed;
        top: 9%;
        margin: 0;
        padding: 10px 0;
        padding-bottom: 10px;
        width: 100%;
        padding-bottom: 18px;
        z-index: 2;
    }
    .dropdown-filter {
        width: 100%;
        margin: 10px;
    }
    .footer-dashboard {
        width: 100%;
        margin-bottom: 100px;
        padding-bottom: 55px;
        height: 50px;
    }
    .dropdown-menu {
        width: 100%;
        max-height: 130px;
        overflow: scroll;
        overflow-x: hidden;
        margin-top: 0px;
        padding-left: 5px;
    }
    .dropdown-menu > li {
        cursor: pointer;
    }
    .dropdown-menu > li:hover {
        background-color: #F5F5F5;
    }
    #table-preview > tbody > tr:hover {
        background-color: #F5F5F5;
        cursor: pointer;
    }
    .button-top {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 10;
        border: none;
        outline: none;
        background-color: #d3d3d3;
        cursor: pointer;
        padding: 15px;
        width: 50px;
        border-radius: 50%;
    }
    .button-top:hover {
        background-color: #c6c6c6;
    }
    .btn-filter {
        background-color: #ffffff !important;
        position: absolute;
        right: 0;
        border-radius: 25px !important;
        width: 120px;
    }
    .btn-filter-no-scroll {
        margin-right: 20px;
    }
    .btn-filter-scroll {
        margin-right: 182px;
    }
    .filter-count {
        display: inline;
        border-radius: 50%;
        padding: 1px 5px;
        height: 20px;
        width: 20px;
        text-align: center;
        background-color: #93ccce;
    }
    #keterangan-filter {
        margin: 10px;
    }
    .highcharts-color-0 {
        fill: #9EEADC !important;
    }
    .highcharts-color-1 {
        fill: #47D7BD !important;
    }
    .highcharts-color-0 .highcharts-point {
        fill: #9EEADC !important;
    }
    .highcharts-color-1 .highcharts-point {
        fill: #47D7BD !important;
    }
</style>

<button id="button-top" class="button-top" onclick="topFunction()">
        <span class="simple-icon-arrow-up"></span>
</button>

<div id="filter-header">
    <div class="row">
        <div class="col-6">
            <h6>SDM</h6>
        </div>
        <div class="col-6">
            <button id="button-filter" class="btn btn-light btn-filter btn-filter-no-scroll">
                <span>Filter</span>
                <div class="filter-count">
                    2
                </div>
            </button>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 30px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;padding-bottom:10px;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;">Workforce Profil</h6>
            <div class="container-org">
                <div class="circle-1">
                    <div class="circle-2">
                        <div class="circle-3">
                            <div class="circle-content">
                                <h6 style="font-weight:bold;margin-top:-5px;" id="jml-org">
                                {{-- Jumlah organik --}}
                                </h6>
                                <p style="font-weight:bold;margin-top:-10px;">Org</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row container-org-detail" style="margin-top: 10px;">
            {{-- Organik Detail --}}
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-6">
                    <div class="card ml-4" style="border-radius:10px !important;padding-bottom:10px;height:402px;">
                        <h6 class="ml-4 mt-3" style="font-weight: bold;">Age Demography</h6>
                        <div id="demography"></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card mr-4" style="border-radius:10px !important;padding-bottom:10px;">
                        <h6 class="ml-4 mt-3" style="font-weight: bold;">Medis - Non Medis</h6>
                        <div id="medis-non"></div>
                        <div class="row container-medis-detail" style="margin-top: 10px;padding:0 5px;">
                            <div class="col-3">
                                <div class="card" id="medis" style="padding: 10px; border-radius:20px !important;font-weight:bold;font-size:10px;">
                                    {{-- medis --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card" id="non-medis" style="padding: 10px; border-radius:20px !important;font-weight:bold;font-size:10px;">
                                    {{-- non-medis --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card" id="dokter" style="padding: 10px; border-radius:20px !important;font-weight:bold;font-size:10px;">
                                    {{-- Dokter --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card" id="non-dokter" style="padding: 10px; border-radius:20px !important;font-weight:bold;font-size:10px;">
                                    {{-- Non Dokter --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-6">
                    <div class="card ml-4" style="border-radius:10px !important;padding-bottom:10px;">
                        <h6 class="ml-4 mt-3" style="font-weight: bold;">Gender</h6>
                        <div id="gender"></div>
                        <div class="row container-medis-detail" style="margin-top: 10px;padding:0 5px;">
                            <div class="col-3"></div>
                            <div class="col-3">
                                <div class="card" id="laki" style="padding: 10px; border-radius:20px !important;font-weight:bold;font-size:10px;">
                                    {{-- Laki --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card" id="perempuan" style="padding: 10px; border-radius:20px !important;font-weight:bold;font-size:10px;">
                                    {{-- Perempuan --}}
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card mr-4" style="border-radius:10px !important;padding-bottom:10px;height:402px;">
                        <h6 class="ml-4 mt-3" style="font-weight: bold;">Education Level</h6>
                        <div id="education"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-dashboard">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-light btn-block" id="dash-btn" style="">Dashboard Selanjutnya</button>
        </div>
    </div>
</div>

<!-- MODAL PREVIEW -->
<div class="modal" tabindex="-1" role="dialog" id="modal-preview">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:0.75em">
            <div class="modal-header py-0" style="display:block;height:49px" >
                <h6 class="py-2" style="position: absolute;" id="modal-preview-judul">Dashboard Selanjutnya</h6>
                <span id="modal-preview-nama" style="display:none"></span><span id="modal-preview-id" style="display:none"></span> 
                <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" id="preview-close">
                <span>×</span>
                </button>
            </div>
            <div class="modal-body" id="content-preview" style="">
                <table id="table-preview" class="table no-border">
                    <tbody id="dash-list">
                        <tr>
                            <td style="display: none;">fDashKunjungan</td>
                            <td>Biaya dan Kunjungan</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashBPJS</td>
                            <td>BPJS</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashRealisasiBeban</td>
                            <td>Realisasi Beban</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashBPCC</td>
                            <td>Realisasi BPCC</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashPendapatanInvest</td>
                            <td>Pendapatan Investasi</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashBeban</td>
                            <td>Beban</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashKPKU</td>
                            <td>KPKU Kategori 7</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashSDM</td>
                            <td>SDM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PREVIEW -->
<!-- MODAL FILTER -->
<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"aria-labelledby="modalFilter" aria-hidden="true">
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
                    <p id="keterangan-filter"></p>
                    <div class="dropdown-regional dropdown dropdown-filter">
                        <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                            Regional : -
                            <span style="display: none;" id="value-jenis"></span>
                            <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:2%;"></span>
                        </button>
                        <ul class="dropdown-menu jenis" style="overflow: hidden; width:99%;" role="menu" aria-labelledby="menu2">
                            {{-- <li>
                                <span style="display: none;">CC</span>
                                <span>Pensiunan dan Keluarga</span>
                            </li>
                            <li>
                                <span style="display: none;">BP</span>
                                <span>Pegawai dan Keluarga</span>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="dropdown-periode dropdown dropdown-filter">
                        <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                            Periode : {{Session::get('periode')}}
                            <span id="value-periode" style="display: none;"></span>
                            <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                        </button>
                        <ul class="dropdown-menu periode" role="menu" aria-labelledby="menu1">
                            
                        </ul>
                    </div>
                </div>
                <div class="modal-footer" style="border:none">
                    <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                    <button type="button" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
var dashboard = "";
var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var periode = "{{Session::get('periode')}}";
var split = periode.match(/.{1,4}/g);
var tahun = split[0];
var numMonth = parseInt(split[1]) - 1;
var namaMonth = bulan[numMonth];
var keterangan = "Periode sampai dengan "+namaMonth+" "+tahun;
var buttonTop = document.getElementById('button-top');
var header = document.getElementById('filter-header');
var buttonFilter = document.getElementById('button-filter');
var sticky = header.offsetTop;
window.onscroll = function() {
    if(window.pageYOffset > sticky) {
        header.classList.add('fixed-filter')
        buttonTop.style.display = 'block';
        buttonFilter.classList.add('btn-filter-scroll')
        buttonFilter.classList.remove('btn-filter-no-scroll')
    } else {
        header.classList.remove('fixed-filter')
        buttonTop.style.display = 'none';
        buttonFilter.classList.remove('btn-filter-scroll')
        buttonFilter.classList.add('btn-filter-no-scroll')
    }
}
    
    $('#keterangan-filter').text(keterangan);

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    $('#button-filter').click(function(){
        $('#modalFilter').modal('show');
    })

    $('#form-filter').on('click', '#btn-reset', function(){
        var text2 = "{{Session::get('periode')}}";
        var htmlTextPeriode = "Periode : "+text2+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-periode').find('.select-dash').html(htmlTextPeriode);
        periode = "{{Session::get('periode')}}";
    })

    $('#form-filter').on('click', '#btn-tampil', function(){
        $('.container-org-detail').empty();
        $('#dokter').empty();
        $('#non-dokter').empty();
        $('#medis').empty();
        $('#non-medis').empty();
        $('#laki').empty();
        $('#perempuan').empty();
        split = periode.match(/.{1,4}/g);
        tahun = split[0];
        numMonth = parseInt(split[1]) - 1;
        namaMonth = bulan[numMonth];
        keterangan = "Periode sampai dengan "+namaMonth+" "+tahun;
        getDataOrganik();
        getDataDemography();
        getDataMedis();
        getDataDokter();
        getDataGender();
        getDataEducation();
        $('#keterangan-filter').text(keterangan);
        $('#modalFilter').modal('hide');
    })

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-periode') }}/",
        dataType: 'JSON',
        success: function(result) {
            $.each(result.daftar, function(key, value){
                $('.periode').append("<li>"+value.periode+"</li>")
            })
        }
    });

    $('.periode').on( 'click', 'li', function() {
        var text = $(this).html();
        var htmlText = "Periode : "+text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $(this).closest('.dropdown-periode').find('.select-dash').html(htmlText);
        periode = text;
    });

    $('#dash-btn').click(function(){
        $('#modal-preview').modal('show');
    });

    $('#dash-list').on( 'click', 'tr', function() {
        var form = $(this).find('td').first().text();
        dashboard = "{{ url('yakes-auth/form')}}/"+form;
        $('#modal-preview').modal('hide');
        loadForm(dashboard);
    });
    // $.ajax({
    //     type:'GET',
    //     url: "{{ url('yakes-dash/data-periode') }}/",
    //     dataType: 'JSON',
    //     success: function(result) {
    //         $.each(result.daftar, function(key, value){
    //             $('#periode').append("<option value="+value.periode+">Periode : "+value.periode+"</option>")
    //         })
    //         $('#periode').val(periode);
    //     }
    // });

    // $('#periode').change(function(){
    //     $('.container-org-detail').empty();
    //     $('#dokter').empty();
    //     $('#non-dokter').empty();
    //     $('#medis').empty();
    //     $('#non-medis').empty();
    //     $('#laki').empty();
    //     $('#perempuan').empty();
    //     var val = $(this).val();
    //     periode = val;
    //     getDataOrganik();
    //     getDataDemography();
    //     getDataMedis();
    //     getDataDokter();
    //     getDataGender();
    //     getDataEducation();
    // })

    getDataOrganik();
    getDataDemography();
    getDataMedis();
    getDataDokter();
    getDataGender();
    getDataEducation();

    function getDataOrganik() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-organik') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
                var jumlah = 0;
                for(var i=0;i<data.length;i++) {
                    jumlah += parseInt(data[i].jumlah)
                }
                $('#jml-org').text(jumlah)

                var html = "";
                var avg = 0;
                html += "<div class='col-1'></div>";
                for(var i=0;i<data.length;i++) {
                    avg = Math.round((parseInt(data[i].jumlah)/jumlah * 100).toFixed(3))
                    html += "<div class='col-3'>";
                    html += "<div class='card' style='padding: 10px; border-radius:20px !important;font-weight:bold;'>";
                    html += data[i].nama+" : "+data[i].jumlah+" org ("+avg+"%)";
                    html += "</div>";
                    html += "</div>";
                    
                }
                html += "<div class='col-1'></div>";
                $('.container-org-detail').append(html);

            }
        });
    }

    function getDataDemography() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-demography') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
                var categories = [];
                var jumlah = 0;
                var value = [];
                var percent = [];
                var avg = 0;
                var chart = [];

                for(var i=0;i<data.length;i++) {
                    jumlah += parseInt(data[i].jumlah);
                }

                for(var i=0;i<data.length;i++) {
                    categories.push(data[i].nama);
                    avg = Math.round((parseInt(data[i].jumlah)/jumlah * 100))
                    chart.push({id:data[i].kode_demog, name:data[i].nama, y:parseInt(data[i].jumlah), percent:avg })
                }

                Highcharts.chart('demography', {
                    chart: {
                        type: 'column',
                        height: 350
                    },
                    legend:{ enabled:false },
                    exporting:{
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: categories,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            enabled: false
                        }
                    },
                    tooltip: {
                        // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        //     '<td style="padding:0"><b>{point.y:.1f} org</b></td></tr>',
                        // footerFormat: '</table>',
                        // shared: true,
                        // useHTML: true
                        enabled: false
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.1,
                            borderWidth: 0,
                            color: '#ed7d31',
                            dataLabels: {
                                enabled: true,
                                useHTML: true,
                                formatter: function() {
                                    return `<div class='datalabel' style='position:relative; top:10px;'>
                                    <b>${this.y}</b></div>
                                    <br/>
                                    <div class='datalabelInside' style='position:absolute;top:100px;color:#ffffff'>
                                    <b>${this.point.percent} %</b>
                                    </div>`
                                }
                            }
                        }
                    },
                    series: [{
                        data: chart
                    }]
                });

            }
        });
    }

    function getDataMedis() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-medis') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
                var chart = [];
                var jumlah = 0;
                for(var i=0;i<data.length;i++) {
                    jumlah += parseInt(data[i].jumlah)
                }
                var percent = 0;
                for(var i=0;i<data.length;i++) {
                    percent = Math.round((parseInt(data[i].jumlah)/jumlah * 100))
                    chart.push({name:data[i].jenis, y:percent })
                }
                $('#medis').append(data[0].jumlah+" org "+data[0].jenis)
                $('#non-medis').append(data[1].jumlah+" org "+data[1].jenis)

                // Build the chart
                Highcharts.chart('medis-non', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie',
                        height: 300,
                        colors: ['#9EEADC', '#47D7BD']
                    },
                    exporting:{
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: false,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true
                            },
                            showInLegend: true,
                        }
                    },
                    series: [{
                        name: 'Medis - Non Medis',
                        colorByPoint: true,
                        data: chart
                    }]
                });
            }
        });
    }

    function getDataDokter() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-dokter') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
               
                $('#dokter').append(data[0].jumlah+" org "+data[0].nama)
                $('#non-dokter').append(data[1].jumlah+" org "+data[1].nama)

            }
        });
    }

    function getDataGender() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-gender') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
                var jumlah = parseInt(data[0].laki) + parseInt(data[0].perempuan)
                var percentL = Math.round((parseInt(data[0].laki)/jumlah)*100);
                var percentP = Math.round((parseInt(data[0].perempuan)/jumlah)*100);
                var chart = [];
                chart.push({name:'Laki-laki', y:percentL},{name:'Perempuan', y:percentP})
                $('#laki').append(data[0].laki+" org Laki-laki")
                $('#perempuan').append(data[0].perempuan+" org Perempuan")
                // Build the chart
                Highcharts.chart('gender', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie',
                        height: 300,
                        colors: ['#9EEADC', '#47D7BD']
                    },
                    exporting:{
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: false,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true
                            },
                            showInLegend: true,
                        }
                    },
                    series: [{
                        name: 'Gender',
                        colorByPoint: true,
                        data: chart
                    }]
                });
            }
        });
    }

    function getDataEducation() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-education') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
                var categories = [];
                var jumlah = 0;
                var value = [];
                var chart = [];

                for(var i=0;i<data.length;i++) {
                    categories.push(data[i].nama);
                    chart.push({name:data[i].nama, y:parseInt(data[i].jumlah) })
                }

                Highcharts.chart('education', {
                    chart: {
                        type: 'column',
                        height: 350
                    },
                    exporting:{
                        enabled: false
                    },
                    legend:{ enabled:false },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: categories,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            enabled: false
                        }
                    },
                    tooltip: {
                        // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        //     '<td style="padding:0"><b>{point.y:.1f} org</b></td></tr>',
                        // footerFormat: '</table>',
                        // shared: true,
                        // useHTML: true
                        enabled: false
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.1,
                            borderWidth: 0,
                            color: '#ed7d31',
                            dataLabels: {
                                enabled: true,
                            }
                        }
                    },
                    series: [{
                        data: chart
                    }]
                });

            }
        });
    }
</script>
