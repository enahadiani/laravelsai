<link rel="stylesheet" href="{{ asset('dash-asset/dash-java/dash-perusahaan-dekstop.css') }}" />
<div class="row">
    <div class="col-md-6 col-sm-6">
        <h6 class="text-bold">Dashboard Perusahaan</h6>
        <p id="periode-text">Periode Januari 2021</p>
    </div>
    <div class="col-md-6 col-sm-6">
        <button id="button-filter" class="btn btn-filter">Filter</button>
    </div>
</div>

<section id="dekstop-baris-ke-1" class="dasboard-ke-1 col-dekstop pb-3">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="card card-dash">
                <h6 class="ml-4 mt-3 mb-0 judul-card">Anggaran Proyek</h6>
                <div class="row mt-2">
                    <div class="col-md-10 col-lg-10 col-xl-10">
                        <div class="list-project">
                            <div class="ml-4 overview-project">
                                <div class="progress-project">
                                    <div class="circle-progress-project">
                                        70%
                                    </div>
                                </div>                            
                                <div class="keterangan-project">
                                    <span class="nama-project">Project A</span>
                                    <p class="tanggal-berakhir">Selesai 10/03/2021</p>
                                </div>
                                <div class="detail-icon">
                                    <div class="glyph-icon simple-icon-arrow-right detail-proyek"></div>
                                </div>
                            </div>
                            <div class="ml-4 overview-project">
                                <div class="progress-project">
                                    <div class="circle-progress-project">
                                        70%
                                    </div>
                                </div>                            
                                <div class="keterangan-project">
                                    <span class="nama-project">Project B</span>
                                    <p class="tanggal-berakhir">Selesai 10/03/2021</p>
                                </div>
                                <div class="detail-icon">
                                    <div class="glyph-icon simple-icon-arrow-right detail-proyek"></div>
                                </div>
                            </div>
                            <div class="ml-4 overview-project">
                                <div class="progress-project">
                                    <div class="circle-progress-project">
                                        70%
                                    </div>
                                </div>                            
                                <div class="keterangan-project">
                                    <span class="nama-project">Project C</span>
                                    <p class="tanggal-berakhir">Selesai 10/03/2021</p>
                                </div>
                                <div class="detail-icon">
                                    <div class="glyph-icon simple-icon-arrow-right detail-proyek"></div>
                                </div>
                            </div>
                            <div class="ml-4 overview-project">
                                <div class="progress-project">
                                    <div class="circle-progress-project">
                                        70%
                                    </div>
                                </div>                            
                                <div class="keterangan-project">
                                    <span class="nama-project">Project D</span>
                                    <p class="tanggal-berakhir">Selesai 10/03/2021</p>
                                </div>
                                <div class="detail-icon">
                                    <div class="glyph-icon simple-icon-arrow-right detail-proyek"></div>
                                </div>
                            </div>
                            <div class="ml-4 overview-project">
                                <div class="progress-project">
                                    <div class="circle-progress-project">
                                        70%
                                    </div>
                                </div>                            
                                <div class="keterangan-project">
                                    <span class="nama-project">Project E</span>
                                    <p class="tanggal-berakhir">Selesai 10/03/2021</p>
                                </div>
                                <div class="detail-icon">
                                    <div class="glyph-icon simple-icon-arrow-right detail-proyek"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-8 col-xl-8">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card card-dash">
                        <h6 class="ml-4 mt-3 mb-0 judul-card">Beban Unpaid</h6>
                        <div class="card-dash-body ml-3 mt-2">
                            <h5 class="ml-2 mt-2" id="beban-unpaid">0</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card card-dash">
                        <h6 class="ml-4 mt-3 mb-0 judul-card">Proyek Aktif</h6>
                        <div class="card-dash-body ml-3 mt-2">
                            <h5 class="ml-2 mt-2" id="total-project">0</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card card-dash">
                        <h6 class="ml-4 mt-3 mb-0 judul-card">Proyek Jatuh Tempo</h6>
                        <div class="card-dash-body ml-4 mt-2">
                            <div id="pendapatan-dekstop"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal Filter --}}
<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"aria-labelledby="modalFilter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-filter">
                <div class="modal-header pb-0" style="border:none">
                    <h6 class="modal-title pl-0">Filter</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size:30px !important">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none">
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <select name="periode" id="periode" class="form-control"></select>
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

<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    var $initialPeriode = "{{ date('Y')}}-{{ date('m') }}"
    var $periodeText = ''
    var $periode = ''
    $('#button-filter').click(function(){
        $('#modalFilter').modal('show');
    })

    function convertPeriode(periode) {
        var array = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
        'Oktober', 'November', 'Desember']

        var split = periode.split('-')
        var convert = parseInt(split[1])

        return array[convert]+" "+split[0]
    }

    $.ajax({
        type: 'GET',
        url: "{{ url('java-dash/periode') }}",
        dataType: 'json',
        async:false,
        success:function(result){    
            $.each(result.daftar, function(index, item){
                $('#periode').append($('<option/>', {
                    value: item.value,
                    text: item.text
                }))
            })    
            var filter = result.daftar.filter(function(data){
                return data.value == $initialPeriode
            })

            if(filter.length > 0) {
                $('#periode-text').text('Periode '+$initialPeriode)
                $('#periode').val($initialPeriode)
                getBebanUnpaid($initialPeriode)
                getTotalProject($initialPeriode)
                $periodeText = convertPeriode($initialPeriode)
            } else {
                $initialPeriode = result.daftar[result.daftar.length-1].value;
                $periodeText = convertPeriode(result.daftar[result.daftar.length-1].value)
                $('#periode').val(result.daftar[result.daftar.length-1].value)
                $('#periode-text').text('Periode '+result.daftar[result.daftar.length-1].text)
                getBebanUnpaid(result.daftar[result.daftar.length-1].value)
                getTotalProject(result.daftar[result.daftar.length-1].value)
            }
            $('#periode-text').text('Periode '+$periodeText)
        }
    });

    function getBebanUnpaid(periode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-dash/beban-unpaid') }}",
            dataType: 'json',
            data: { periode: periode },
            async:false,
            success:function(result){    
                $('#beban-unpaid').text(format_number(result.data.data[0].beban_unpaid))
            }
        });
    }

    function getTotalProject(periode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-dash/total-project') }}",
            dataType: 'json',
            data: { periode: periode },
            async:false,
            success:function(result){    
                $('#total-project').text(format_number(result.data.data[0].jumlah))
            }
        });
    }

    $('#form-filter #btn-tampil').on('click', function(){
        $periode = $('#periode').val()
        $periodeText = convertPeriode($periode)
        getTotalProject($periode)
        getBebanUnpaid($periode)
        $('#periode-text').text('Periode '+$periodeText)
        $('#modalFilter').modal('hide');
    })

    $('#form-filter #btn-reset').on('click', function(){
        $('#periode').val($initialPeriode)
        $periode = $initialPeriode
    })
// Highcharts.chart('pendapatan-dekstop', {
//     chart: {
//         plotBackgroundColor: null,
//         plotBorderWidth: null,
//         plotShadow: false,
//         type: 'pie',
//         height: 140

//     },
//     title: {
//         text: ''
//     },
//     exporting:{ enabled: false },
//     legend:{ enabled:false },
//     credits: { enabled: false },
//     title: { text: '' },
//     subtitle: { text: '' },
//     tooltip: {
//         enabled: true
//     },
//     accessibility: {
//         point: {
//             valueSuffix: '%'
//         }
//     },
//     plotOptions: {
//         pie: {
//             allowPointSelect: true,
//             size: 130,
//             cursor: 'pointer',
//             dataLabels: {
//                 enabled: false,
//                 format: '<b>{point.name}</b>: {point.percentage:.1f} %'
//             }
//         }
//     },
//     series: [{
//         name: 'Pendapatan',
//         colorByPoint: true,
//         data: [{
//             name: 'A',
//             y: 60
//         }, {
//             name: 'B',
//             y: 40
//         }]
//     }]
// });

// Highcharts.chart('beban-dekstop', {
//     chart: {
//         plotBackgroundColor: null,
//         plotBorderWidth: null,
//         plotShadow: false,
//         type: 'pie',
//         height: 140

//     },
//     title: {
//         text: ''
//     },
//     exporting:{ enabled: false },
//     legend:{ enabled:false },
//     credits: { enabled: false },
//     title: { text: '' },
//     subtitle: { text: '' },
//     tooltip: {
//         enabled: true
//     },
//     accessibility: {
//         point: {
//             valueSuffix: '%'
//         }
//     },
//     plotOptions: {
//         pie: {
//             allowPointSelect: true,
//             size: 130,
//             cursor: 'pointer',
//             dataLabels: {
//                 enabled: false,
//                 format: '<b>{point.name}</b>: {point.percentage:.1f} %'
//             }
//         }
//     },
//     series: [{
//         name: 'Pendapatan',
//         colorByPoint: true,
//         data: [{
//             name: 'A',
//             y: 60
//         },{
//             name: 'B',
//             y: 20
//         },{
//             name: 'C',
//             y: 20
//         },{
//             name: 'D',
//             y: 10
//         }]
//     }]
// });

// Highcharts.chart('laba-rugi-dekstop', {
//     chart: { height: 170 },
//     exporting:{ enabled: false },
//     legend:{ enabled:false },
//     credits: { enabled: false },
//     title: { text: '' },
//     subtitle: { text: '' },
//     xAxis: {
//         categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
//         labels: { enabled: false }
//     },
//     yAxis: [
//         {
//             linewidth: 1,
//             title:{ text: '' }
//         },
//         {
//             linewidth: 1,
//             opposite: true,
//             title:{ text: '' }
//         },
//     ],
//     tooltip: {
//         enabled: false
//     },
//     plotOptions: {
//         series:{
//             pointPadding: 0,
//             shadow: false,
//             dataLabels: {
//                 enabled: false
//             }
//         }
//     },
//     series: [
//         {
//             type: 'column',
//             name: 'Uang Masuk',
//             data: [1000, 3000, 2500, 4000, 5000, 8000, 10000, 9000, 2000, 5500, 2500, 8000],
//             color: '#0058E4'
//         },
//         {
//             type: 'column',
//             name: 'Uang Masuk',
//             data: [2500, 4000, 3500, 6000, 7000, 4000, 7000, 5000, 6000, 7500, 4500, 7000],
//             color: '#9FC4FF'
//         },
//         {
//             type: 'spline',
//             name: 'Saldo  KasBank',
//             data: [50, 20, 30, 50, 20, 80, 40, 50, 80, 45, 65, 85],
//             color: '#FFB703',
//             yAxis: 1
//         },
//     ]
// });
</script>