<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/fp.dekstop.css') }}" />

{{-- DESKTOP --}}

<section id="header" class="header">
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-1">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div class="col-11 pl-0">
                    <h2 class="title-dash">Financial Performance YPT</h2>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="select-custom row">
                <div class="col-2">
                    <div class="glyph-icon simple-icon-calendar select"></div>
                </div>
                <div class="col-8">
                    <p id="select-text" class="select-text">TRIWULAN I || 2021</p>
                </div>
                <div class="col-2">
                    <div class="glyph-icon iconsminds-arrow-down select"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="main-dash" class="mt-24 pb-24">
    <div id="dekstop-1" class="desktop-1 col-dekstop">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dash">
                            <span class="header-card">Pendapatan</span>
                            <div class="row">
                                <div class="col-12">
                                    <p id="pendapatan-value" class="main-nominal">945,6 M</p>
                                </div>
                                <div class="col-12">
                                    <table class="table table-borderless table-no-padding">
                                        <tbody>
                                            <tr>
                                                <td class="pl-0">RKA</td>
                                                <td>998,2 M</td>
                                                <td id="pdpt-rka-percentage" class="green-text">94,7%</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">YoY</td>
                                                <td>997,2 M</td>
                                                <td id="pdpt-yoy-percentage" class="red-text">-5,5%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-16">
                        <div class="card card-dash">
                            <span class="header-card">Beban</span>
                            <div class="row">
                                <div class="col-12">
                                    <p id="beban-value" class="main-nominal">868,2 M</p>
                                </div>
                                <div class="col-12">
                                    <table class="table table-borderless table-no-padding">
                                        <tbody>
                                            <tr>
                                                <td class="pl-0">RKA</td>
                                                <td>867 M</td>
                                                <td id="beban-rka-percentage" class="red-text">100,1%</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">YoY</td>
                                                <td>851,3 M</td>
                                                <td id="beban-yoy-percentage" class="red-text">-1,9%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-dash">
                    <span class="header-card">Laba Rugi Lembaga</span>
                    <div id="lr-chart"></div>
                </div>
            </div>
            <div class="col-3 px-0">
                <div class="card card-dash h-292">
                    <span class="header-card">Catatan</span>
                    <div id="catatan-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in mollis lorem. 
                        Sed cursus luctus pharetra. Suspendisse potenti. Praesent nisi neque, 
                        aliquam non justo nec, iaculis mollis tellus. Praesent ornare ex vel aliquet luctus. 
                        Morbi venenatis metus vel lacus bibendum, non fringilla urna auctor.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="dekstop-2" class="desktop-2 col-dekstop mt-16">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dash">
                            <span class="header-card">SHU</span>
                            <div class="row">
                                <div class="col-12">
                                    <p id="shu-value" class="main-nominal">77,4 M</p>
                                </div>
                                <div class="col-12">
                                    <table class="table table-borderless table-no-padding">
                                        <tbody>
                                            <tr>
                                                <td class="pl-0">RKA</td>
                                                <td>131,2 M</td>
                                                <td id="shu-rka-percentage" class="green-text">59,0%</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">YoY</td>
                                                <td>146,4 M</td>
                                                <td id="shu-yoy-percentage" class="red-text">-89,1%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-16">
                        <div class="card card-dash">
                            <span class="header-card">OR</span>
                            <div class="row">
                                <div class="col-12">
                                    <p id="or-value" class="main-nominal">91,8%</p>
                                </div>
                                <div class="col-12">
                                    <table class="table table-borderless table-no-padding">
                                        <tbody>
                                            <tr>
                                                <td class="pl-0">RKA</td>
                                                <td>86,9%</td>
                                                <td id="or-rka-percentage" class="red-text">4,9%</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">YoY</td>
                                                <td>85,3%</td>
                                                <td id="or-yoy-percentage" class="red-text">-6,5%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 pr-0">
                <div class="card card-dash">
                    <span class="header-card">Performasi Lembaga</span>
                    <table id="table-lembaga" class="table table-bordered table-th-red">
                        <thead>
                            <tr>
                                <th rowspan="2">&nbsp;</th>
                                <th colspan="2" class="text-center">Pendapatan</th>
                                <th colspan="2" class="text-center">Beban</th>
                                <th colspan="2" class="text-center">SHU</th>
                                <th colspan="2" class="text-center">OR</th>
                            </tr>
                            <tr>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY Growth</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY Growth</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY Growth</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY Growth</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    Telkom School
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    ITTP
                                </td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    ITTS
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    AKATEL
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    TelU
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    Lakhar
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END DESKTOP --}}

<script type="text/javascript">
$('#back').click(function() {
    $('#app-container').removeClass('main-hidden sub-hidden');
})

$('#table-lembaga tbody tr').on('click', 'td:first-child', function() {
    var table = $(this).parents('table').attr('id')
    var tr = $(this).parent()
    var td = $(this).children()
    var check = $(tr).attr('class')
    
    if(check == 'selected-row') {
        return;
    }

    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()

    setTimeout(function() {
        $(tr).addClass('selected-row')
        $(td).show()
    }, 200)
})

$('#table-lembaga tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
})

var renderSVG = Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
};

Highcharts.chart('lr-chart', {
    chart: {
        height: 250
    },
    credits:{
        enabled:false
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: ['TS', 'ITTP', 'ITTS', 'AKATEL', 'TelU', 'Lakhar'], 
    },
    yAxis: {
        title: '',
        min: 0
    },
    tooltip: {
        formatter: function () {   
            var tmp = this.x.split("|");   
            return tmp[0]+'<br><span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + sepNum(this.y);
        }
    },
    series: [
        {
            name: 'Pendapatan',
            color: '#b91c1c',
            type: 'column',
            data: [60, 30, 20, 15, 80, 50]
        },
        {
            name: 'Beban',
            color: '#064E3B',
            type: 'column',
            data: [50, 20, 10, 10, 70, 40]
        },
        {
            name: 'SHU',
            color: '#FBBF24',
            marker: {
                symbol: 'c-rect',
                lineColor: '#FBBF24',
                radius: 30,
            },
            type: 'scatter',
            data: [30, 10, 5, 5, 50, 20],
        }
    ]
})
</script>