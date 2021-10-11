<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/fp.dekstop.css?version=_').time() }}" />

{{-- DESKTOP --}}

{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-8 pl-12">
            <div class="row">
                <div id="back-div" class="col-1 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11">
                    <h2 class="title-dash" id="title-dash">Financial Performance YPT</h2>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="row">
                <div class="col-3 pr-0 message-div">
                    <img alt="message-icon" class="icon-message" src="{{ asset('dash-asset/dash-ypt/icon/message.svg') }}">
                </div>
                <div class="col-9">
                    <div class="select-custom row cursor-pointer" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text" class="select-text">TRIWULAN I || 2021</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-ypt/icon/drop-arrow.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="filter-box" class="filter-box hidden">
            <div class="row justify-content-end">
                <div class="col-7 pt-8 pr-0">
                    <div class="row">
                        <div class="col-4 pr-0">
                            <div class="glyph-icon simple-icon-arrow-left filter-icon cursor-pointer"></div>
                        </div>
                        <div class="col-4 -mt-5 pl-0 pr-0" id="year-filter">2021</div>
                        <div class="col-4 pl-0">
                            <div class="glyph-icon simple-icon-arrow-right filter-icon cursor-pointer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5 list-filter-1" id="list-filter-1">
                    <ul>
                        <li class="selected">Triwulan</li>
                        <li>Semester</li>
                        <li>Periode</li>
                    </ul>
                </div>
                <div class="col-7 mt-4">
                    <div class="row list-filter-2" id="list-filter-2">
                        <div class="col-5 py-3 selected cursor-pointer">
                            Triwulan 1
                        </div>
                        <div class="col-5 ml-8 py-3 cursor-pointer">
                            Triwulan 2
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer">
                            Triwulan 3
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer">
                            Triwulan 4
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- END HEADER --}}

{{-- CONTENT MAIN --}}
<section id="main-dash" class="mt-20 pb-24">
    
{{-- ROW 1 --}}
    <div id="dekstop-1" class="row dekstop">
        <div class="col-3 pl-12 pr-0">
            <div class="card card-dash cursor-pointer" id="pdpt-box">
                <div class="row">
                    <div class="col-4 pt-16">
                        <div id="circle-pdpt" class="circle-bar">
                            <strong class="value-circle"></strong>
                        </div>
                    </div>
                    <div class="col-8">
                        <h4 class="header-card">Pendapatan</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="pendapatan-value" class="main-nominal">945,6 M</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-10">YoY</td>
                                            <td class="px-0">997,7 M</td>
                                            <td id="pdpt-yoy-percentage" class="red-text pr-0">
                                                -5,5%
                                                <div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash cursor-pointer" id="beban-box">
                <div class="row">
                    <div class="col-4 pt-16">
                        <div id="circle-beban" class="circle-bar">
                            <strong class="value-circle"></strong>
                        </div>
                    </div>
                    <div class="col-8">
                        <h4 class="header-card">Beban</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="beban-value" class="main-nominal">868,2 M</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-10">YoY</td>
                                            <td class="px-0">867,0 M</td>
                                            <td id="beban-yoy-percentage" class="green-text pr-0">
                                                -1,9%
                                                <div class="glyph-icon iconsminds-down icon-card green-text bold-700"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash cursor-pointer" id="shu-box">
                <div class="row">
                    <div class="col-4 pt-16">
                        <div id="circle-shu" class="circle-bar">
                            <strong class="value-circle"></strong>
                        </div>
                    </div>
                    <div class="col-8">
                        <h4 class="header-card">Sisa Hasil Usaha</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="shu-value" class="main-nominal">77,4 M</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-10">YoY</td>
                                            <td class="px-0">997,7 M</td>
                                            <td id="shu-yoy-percentage" class="red-text pr-0">
                                                -5,5%
                                                <div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash cursor-pointer" id="or-box">
                <div class="row">
                    <div class="col-4 pt-16">
                        <div id="circle-or" class="circle-bar">
                            <strong class="value-circle"></strong>
                        </div>
                    </div>
                    <div class="col-8">
                        <h4 class="header-card">Operating Ratio</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="shu-value" class="main-nominal">91,8 %</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-10">YoY</td>
                                            <td class="px-0">85,3 %</td>
                                            <td id="or-yoy-percentage" class="green-text pr-0">
                                                6,5%
                                                <div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- END ROW 1 --}}

{{-- ROW 2 --}}
    <div id="dekstop-2" class="row dekstop mt-4">
          <div class="col-3 pl-12 pr-0">
            <div class="card card-dash" id="dash-pdpt">
                <div class="row header-div" id="card-pdpt">
                    <div class="col-9">
                        <h4 class="header-card">Pendapatan Lembaga</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-pdpt">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="pdpt-chart" class="dash-chart"></div>
            </div>
          </div>
          <div class="col-3 pl-1 pr-0">
                <div class="card card-dash" id="dash-beban">
                    <div class="row header-div" id="card-beban">
                        <div class="col-9">
                            <h4 class="header-card">Beban Lembaga</h4>
                        </div>
                        <div class="col-3">
                            <div class="glyph-icon simple-icon-menu icon-menu"></div>
                        </div>
                        <div class="menu-chart-custom hidden" id="export-beban">
                            <ul>
                                <li class="menu-chart-item fullscreen">View in full screen</li>
                                <li class="menu-chart-item print">Print chart</li>
                                <hr>
                                <li class="menu-chart-item print png">Download PNG image</li>
                                <li class="menu-chart-item print jpg">Download JPEG image</li>
                                <li class="menu-chart-item print pdf">Download PDF document</li>
                                <li class="menu-chart-item print svg">Download SVG vector image</li>
                                <li class="menu-chart-item print svg">View table data</li>
                            </ul>
                        </div>
                    </div>
                    <div id="beban-chart"></div>
                </div>
          </div>
          <div class="col-3 pl-1 pr-0">
                <div class="card card-dash" id="dash-shu">
                    <div class="row header-div" id="card-shu">
                        <div class="col-9">
                            <h4 class="header-card">SHU Lembaga</h4>
                        </div>
                        <div class="col-3">
                            <div class="glyph-icon simple-icon-menu icon-menu"></div>
                        </div>
                        <div class="menu-chart-custom hidden" id="export-shu">
                            <ul>
                                <li class="menu-chart-item fullscreen">View in full screen</li>
                                <li class="menu-chart-item print">Print chart</li>
                                <hr>
                                <li class="menu-chart-item print png">Download PNG image</li>
                                <li class="menu-chart-item print jpg">Download JPEG image</li>
                                <li class="menu-chart-item print pdf">Download PDF document</li>
                                <li class="menu-chart-item print svg">Download SVG vector image</li>
                                <li class="menu-chart-item print svg">View table data</li>
                            </ul>
                        </div>
                    </div>
                    <div id="shu-chart"></div>
                </div>
          </div>
          <div class="col-3 pl-1 pr-0">
                <div class="card card-dash">
                    <div class="row header-div">
                        <div class="col-9">
                            <h4 class="header-card">OR Lembaga</h4>
                        </div>
                        <div class="col-3">
                            <img alt="arrows-icon" class="icon-arrows cursor-pointer" src="{{ asset('dash-asset/dash-ypt/icon/arrows.svg') }}">
                        </div>
                    </div>
                    <table class="table table-borderless table-py-0 mb-0" id="table-or">
                        <tbody>
                            <tr>
                                <td class="w-25">TS</td>
                                <td>
                                    <div class="progress h-20">
                                        <div class="progress-bar bg-red" role="progressbar" style="width: 91.2%" aria-valuenow="91.2" aria-valuemin="0" aria-valuemax="100">92.2%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-25">ITTS</td>
                                <td>
                                    <div class="progress h-20">
                                        <div class="progress-bar bg-red" role="progressbar" style="width: 89.1%" aria-valuenow="89.1" aria-valuemin="0" aria-valuemax="100">89.1%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-25">ITTP</td>
                                <td>
                                    <div class="progress h-20">
                                        <div class="progress-bar bg-red" role="progressbar" style="width: 88.7%" aria-valuenow="88.7" aria-valuemin="0" aria-valuemax="100">88.7%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-25">AKATEL</td>
                                <td>
                                    <div class="progress h-20">
                                        <div class="progress-bar bg-red" role="progressbar" style="width: 91.0%" aria-valuenow="91.0" aria-valuemin="0" aria-valuemax="100">91%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-25">TelU</td>
                                <td>
                                    <div class="progress h-20">
                                        <div class="progress-bar bg-red" role="progressbar" style="width: 91.6%" aria-valuenow="91.6" aria-valuemin="0" aria-valuemax="100">91.6%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-25">Lakhar</td>
                                <td>
                                    <div class="progress h-20">
                                        <div class="progress-bar bg-red" role="progressbar" style="width: 93.4%" aria-valuenow="93.4" aria-valuemin="0" aria-valuemax="100">93.4%</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
          </div>
    </div>
{{-- END ROW 2 --}}

{{-- ROW 3 --}}
    <div id="dekstop-3" class="row dekstop mt-4">
        <div class="col-6 pl-12 pr-0">
            <div class="card card-dash" id="dash-lr">
                <div class="row header-div" id="card-lr">
                    <div class="col-9">
                        <h4 class="header-card">Laba Rugi Lembaga</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-lr">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="lr-chart"></div>
            </div>
        </div>
        <div class="col-6 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Performansi Lembaga</h4>
                    </div>
                    <div class="col-3">
                        <img alt="arrows-icon" class="icon-arrows cursor-pointer" src="{{ asset('dash-asset/dash-ypt/icon/arrows.svg') }}">
                    </div>
                </div>
                <table id="table-lembaga" class="table table-bordered table-th-red mt-8">
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
                            <th class="text-center">YoY</th>
                            <th class="text-center">Ach.</th>
                            <th class="text-center">YoY</th>
                            <th class="text-center">Ach.</th>
                            <th class="text-center">YoY</th>
                            <th class="text-center">Ach.</th>
                            <th class="text-center">YoY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p class="kode hidden">TS</p>
                                <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                TS
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
                                <p class="kode hidden">ITTP</p>
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
                                <p class="kode hidden">ITTS</p>
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
                                <p class="kode hidden">AKATEL</p>
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
                                <p class="kode hidden">TELU</p>
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
                                <p class="kode hidden">LAKHAR</p>
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
{{-- END ROW 3 --}}
</section>
{{-- END CONTENT MAIN --}}

{{-- CONTENT DETAIL --}}
<section id="detail-dash" class="mt-20 pb-24" style="display: none">
    {{-- ROW 4 --}}
    <div id="dekstop-4" class="row dekstop">
        <div class="col-7 pl-12 pr-0">
            <div class="card card-dash" id="dash-perform">
                <div class="row header-div" id="card-perform">
                    <div class="col-9">
                        <h4 class="header-card">Performansi Lembaga</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-perform">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="perfomansi-chart" class="mt-8"></div>
            </div>
        </div>
        <div class="col-5 pl-1 pr-0">
            <div class="card card-dash" id="dash-lembaga">
                <div class="row header-div" id="card-lembaga">
                    <div class="col-9">
                        <h4 class="header-card"><span class="title-chart"></span> Per Lembaga</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-lembaga">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="lembaga-chart" class="mt-8"></div>
            </div>
        </div>
    </div>

    <div id="dekstop-5" class="row dekstop mt-4">
        <div class="col-7 pl-12 pr-0">
            <div class="card card-dash" id="dash-yoy">
                <div class="row header-div" id="card-yoy">
                    <div class="col-9">
                        <h4 class="header-card">Kelompok <span class="title-chart"></span> YoY</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-yoy">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="yoy-chart" class="mt-8"></div>
            </div>
        </div>
        <div class="col-5 pl-1 pr-0">
            <div class="card card-dash" id="dash-akun">
                <div class="row header-div" id="card-akun">
                    <div class="col-9">
                        <h4 class="header-card"><span class="title-chart"></span> Per Akun</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-akun">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="akun-chart" class="mt-8"></div>
            </div>
        </div>
    </div>
    {{-- END ROW 4 --}}
</section>
{{-- END CONTENT DETAIL --}}

{{-- END DESKTOP --}}

<script type="text/javascript">
var $filter1 = "Triwulan"
var $filter2 = "Triwulan 1"
var $judulChart = null; 
$(window).on('resize', function(){
    var win = $(this); //this = window
    if (win.height() == 800) { 
        $("body").css("overflow", "hidden");
    }
    if (win.height() > 800) { 
        $("body").css("overflow", "scroll");
    }
    if (win.height() < 800) { 
        $("body").css("overflow", "scroll");
    }
});

$(window).click(function() {
    $('#filter-box').addClass('hidden')
    $('.menu-chart-custom').addClass('hidden');
    if($(window).height() == 800) {
        $("body").css("overflow", "hidden");
    }
    if($(window).height() > 800) {
        $("body").css("overflow", "scroll");
    }
    if($(window).height() < 800) {
        $("body").css("overflow", "scroll");
    }
})


document.addEventListener('fullscreenchange', (event) => {
  if (document.fullscreenElement) {
    console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
  } else {
    pdptChart.update({
        title: {
            text: ''
        }
    })

    bebanChart.update({
        title: {
            text: ''
        }
    })

    shuChart.update({
        title: {
            text: ''
        }
    })

    lrChart.update({
        title: {
            text: ''
        }
    })

    performChart.update({
        title: {
            text: ''
        }
    })

    lembagaChart.update({
        title: {
            text: ''
        }
    })

    yoyChart.update({
        title: {
            text: ''
        }
    })

    akunChart.update({
        title: {
            text: ''
        }
    })
    console.log('Leaving full-screen mode.');
  }
});

$('#custom-row').click(function(event) {
    event.stopPropagation();
    $('#filter-box').removeClass('hidden')
})

$('#list-filter-1 ul li').click(function() {
    var filter = $(this).text()
    $filter1 = filter
    $('#list-filter-1 ul li').not(this).removeClass('selected')
    $(this).addClass('selected')
})

$('#list-filter-2 div').click(function() {
    var filter = $(this).text()
    $filter2 = filter
    $('#list-filter-2 div').not(this).removeClass('selected')
    $(this).addClass('selected')
})

$('.icon-menu').click(function(event) {
    event.stopPropagation()
    var parentID = $(this).parents('.header-div').attr('id')
    $('#'+parentID).find('.menu-chart-custom').removeClass('hidden')

    if(parentID == 'card-lr') {
        $("body").css("overflow", "scroll");
    } else {
        $("body").css("overflow", "hidden");
    }
})

$('#pdpt-box').click(function() {
    $judulChart = "Pendapatan"
    $('#title-dash').text('Pendapatan')
    $('#back-div').removeClass('hidden')
    $('#dash-title-div').removeClass('pl-8')
    $('#dash-title-div').addClass('pl-0')
    $('.title-chart').text('Pendapatan')
    $('#main-dash').hide()
    $('#detail-dash').show()
});

$('#beban-box').click(function() {
    $judulChart = "Beban"
    $('#title-dash').text('Beban')
    $('#back-div').removeClass('hidden')
    $('#dash-title-div').removeClass('pl-8')
    $('#dash-title-div').addClass('pl-0')
    $('.title-chart').text('Beban')
    $('#main-dash').hide()
    $('#detail-dash').show()
});

$('#shu-box').click(function() {
    $judulChart = "Sisa Hasil Usaha"
    $('#title-dash').text('Sisa Hasil Usaha')
    $('#back-div').removeClass('hidden')
    $('#dash-title-div').removeClass('pl-8')
    $('#dash-title-div').addClass('pl-0')
    $('.title-chart').text('Sisa Hasil Usaha')
    $('#main-dash').hide()
    $('#detail-dash').show()
});

$('#or-box').click(function() {
    $judulChart = "Operating Ratio"
    $('#title-dash').text('Operating Ratio')
    $('#back-div').removeClass('hidden')
    $('#dash-title-div').removeClass('pl-8')
    $('#dash-title-div').addClass('pl-0')
    $('.title-chart').text('Operating Ratio')
    $('#main-dash').hide()
    $('#detail-dash').show()
});

$('#back').click(function() {
    $('#title-dash').text('Financial Performance YPT')
    $('#back-div').addClass('hidden')
    $('#dash-title-div').removeClass('pl-0')
    $('#dash-title-div').addClass('pl-8')
    $('#detail-dash').hide()
    $('#main-dash').show()
});

$('#circle-pdpt').circleProgress({
    value: 0.80,
    size: 80,
    reverse: false,
    thickness: 8,
    fill: {
      color: ["#FFBA33"]
    }
});

$('#circle-pdpt').find('strong').html(`
    <p class="my-0 text-circle">Ach.</p>
    <p class="my-0 text-circle">80%</p>
`)

$('#circle-beban').circleProgress({
    value: 1,
    size: 80,
    reverse: false,
    thickness: 8,
    fill: {
      color: ["#EE0000"]
    }
});

$('#circle-beban').find('strong').html(`
    <p class="my-0 text-circle">Ach.</p>
    <p class="my-0 text-circle">100,1%</p>
`)

$('#circle-shu').circleProgress({
    value: 0.59,
    size: 80,
    reverse: false,
    thickness: 8,
    fill: {
      color: ["#EE0000"]
    }
});

$('#circle-shu').find('strong').html(`
    <p class="my-0 text-circle">Ach.</p>
    <p class="my-0 text-circle">59,4%</p>
`)

$('#circle-or').circleProgress({
    value: 0.9,
    size: 80,
    reverse: false,
    thickness: 8,
    fill: {
      color: ["#EE0000"]
    }
});

$('#circle-or').find('strong').html(`
    <p class="my-0 text-circle">Ach.</p>
    <p class="my-0 text-circle">91,8%</p>
`)

$('#table-lembaga tbody tr').on('click', 'td:first-child', function() {
    var table = $(this).parents('table').attr('id')
    var tr = $(this).parent()
    var icon = $(this).children('.check-row')
    var kode = $(this).children('.kode').text()
    var check = $(tr).attr('class')
    
    if(check == 'selected-row') {
        return;
    }

    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()

    setTimeout(function() {
        $(tr).addClass('selected-row')
        $(icon).show()
    }, 200)
})

$('#table-lembaga tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
})

var akunChart = Highcharts.chart('akun-chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'variablepie',
        height: 275,
        width: 470
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false
        // buttons: {
        //     contextButton: {
        //         align: 'right',
        //         x: -20,
        //         y: -10,
        //         verticalAlign: 'top'
        //     }
        // }
    },
    legend:{ enabled: false },
    credits: { enabled: false },
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
            allowPointSelect: true,
            center: ['50%', '50%'],
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name} : {point.percentage:.1f} %'
            },
            // size: '65%',
            showInLegend: true
        }
    },
    series: [{
        minPointSize: 60,
        innerSize: '20%',
        name: 'Jumlah',
        colorByPoint: true,
        data: [
            {
                name: 'Pendapatan A',
                y: 505370,
                z: 92.9
            }, 
            {
                name: 'Pendapatan B',
                y: 551500,
                z: 118.7
            }, 
            {
                name: 'Pendapatan C',
                y: 312685,
                z: 124.6
            }, 
            {
                name: 'Pendapatan D',
                y: 78867,
                z: 137.5
            }, 
            {
                name: 'Pendapatan E',
                y: 301340,
                z: 201.8
            }, 
            {
                name: 'Pendapatan F',
                y: 41277,
                z: 214.5
            }, 
            {
                name: 'Lainnya',
                y: 357022,
                z: 235.6
            }
        ]
    }]
});

$('#export-akun.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-akun').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        akunChart.update({
            title: {
                text: `${$judulChart} Per Akun`,
                // floating: true,
                x: 40,
                y: 20
            }
        })
        akunChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        akunChart.print()
    } else if(jenis == 'Download PNG image') {
        akunChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `${$judulChart} Per Akun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        akunChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `${$judulChart} Per Akun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        akunChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `${$judulChart} Per Akun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        akunChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `${$judulChart} Per Akun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        akunChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})

var yoyChart = Highcharts.chart('yoy-chart', {
    chart: {
        height: 275,
        width: 600
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false
    },
    legend:{ 
        enabled: true,
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle' 
    },
    credits: { enabled: false },
    xAxis: {
        categories: ['2016', '2017', '2018', '2019', '2020', '2021']
    },
    yAxis: {
         title: {
            text: 'Nilai'
        }
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            marker:{
                enabled:false
            },
            pointStart: 2016
        }
    },
    series: [
        {
            name: 'Pendapatan A',
            data: [2000, 3500, 2500, 5000, 3500],
            color: '#1D4ED8'
        },
        {
            name: 'Pendapatan B',
            data: [3000, 3000, 3000, 3500, 2500],
            color: '#EC4899'
        },
        {
            name: 'Pendapatan C',
            data: [1000, 1500, 2000, 2500, 1500],
            color: '#FBBF24'
        }
    ],
});

$('#export-yoy.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-yoy').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        yoyChart.update({
            title: {
                text: `Kelompok ${$judulChart} YoY`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        yoyChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        yoyChart.print()
    } else if(jenis == 'Download PNG image') {
        yoyChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Kelompok ${$judulChart} YoY`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        yoyChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Kelompok ${$judulChart} YoY`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        yoyChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Kelompok ${$judulChart} YoY`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        yoyChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Kelompok ${$judulChart} YoY`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        yoyChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})

var lembagaChart = Highcharts.chart('lembaga-chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 275,
        width: 470
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false
    },
    legend:{ enabled: false },
    credits: { enabled: false },
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
            allowPointSelect: true,
            center: ['50%', '50%'],
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name} : {point.percentage:.1f} %'
            },
            size: '65%',
            showInLegend: true
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [
            {
                name: 'TS',
                y: 26.9,
                sliced: true,
                selected: true
            },
            {
                name: 'ITTS',
                y: 6.4
            },
            {
                name: 'ITTP',
                y: 9.0
            },
            {
                name: 'AKATEL',
                y: 4.5
            },
            {
                name: 'TelU',
                y: 43.6
            },
            {
                name: 'Lakhar',
                y: 9.6
            },
        ]
    }]
});

$('#export-lembaga.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-lembaga').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        lembagaChart.update({
            title: {
                text: `${$judulChart} Per Lembaga`,
                floating: true,
                x: 40,
                y: 90
            }
        })
        lembagaChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        lembagaChart.print()
    } else if(jenis == 'Download PNG image') {
        lembagaChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `${$judulChart} Per Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        lembagaChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `${$judulChart} Per Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        lembagaChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `${$judulChart} Per Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        lembagaChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `${$judulChart} Per Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        lembagaChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})

var performChart = Highcharts.chart('perfomansi-chart', {
    chart: {
        type: 'column',
        height: 275,
        width: 600
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false
    },
    legend:{  enabled: false },
    credits: { enabled: false },
    xAxis: {
        categories: ['TS', 'ITTS', 'ITTP', 'AKATEL', 'TELU', 'LAKHAR']
    },
    yAxis: {
         title: {
            text: 'Presentase'
        }
    },
    plotOptions: {
        column: {
            grouping: true,
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                overflow: 'justify',
                useHTML: true,
                formatter: function () {
                    var visible = "block"
                    var color = '#000000'
                    if(this.point.color == '#CED4DA') {
                        visible = 'none'
                    } else {
                        visible = 'block'
                    }

                    if(this.point.color == '#434348') {
                        color = '#ffffff'
                    } else {
                        color = '#000000'
                    }

                    if(this.y < 0.1){
                        return '';
                    } else {
                        return $('<div/>').css({
                            'display': visible,
                            'color' : color,
                            'padding': '0 3px',
                            'font-size': '10px',
                            'backgroundColor' : this.point.color  // just white in my case
                        }).text(sepNum(this.y)+'%')[0].outerHTML;
                    }
                }
            }
        }
    },
    series: [
        {
            name: 'Presentase',
            data: [2, 2, 2, 2, 1, 3],
            color: '#CED4DA',
            stake: 'n1'
        },
        {
            name: 'Presentase',
            colorByPoint: true,
            data: [8, 8, 8, 8, 9, 7],
            stake: 'n1'
        },
    ],
});

$('#export-perform.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-perform').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        performChart.update({
            title: {
                text: 'Performansi Lembaga',
                floating: true,
                x: 40,
                y: 20
            }
        })
        performChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        performChart.print()
    } else if(jenis == 'Download PNG image') {
        performChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: 'Performansi Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        performChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: 'Performansi Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        performChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: 'Performansi Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        performChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: 'Performansi Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        performChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})

var shuChart = Highcharts.chart('shu-chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 258,
        width: 280
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false,
    },
    legend:{ enabled: false },
    credits: { enabled: false },
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
            allowPointSelect: true,
            center: ['40%', '50%'],
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name} : {point.percentage:.1f} %'
            },
            size: '50%',
            showInLegend: true
        },
        series: {
            dataLabels: {
                style: {
                    fontSize: '9px'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [
            {
                name: 'TS',
                y: 26.9,
            },
            {
                name: 'ITTS',
                y: 6.4
            },
            {
                name: 'ITTP',
                y: 9.0
            },
            {
                name: 'AKATEL',
                y: 4.5
            },
            {
                name: 'TelU',
                y: 43.6
            },
            {
                name: 'Lakhar',
                y: 9.6
            },
        ]
    }]
});

$('#export-shu.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-shu').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        shuChart.update({
            title: {
                text: 'Sisa Hasil Usaha Lembaga',
                floating: true,
                x: 40,
                y: 90
            }
        })
        shuChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        shuChart.print()
    } else if(jenis == 'Download PNG image') {
        shuChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: 'Sisa Hasil Usaha Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        shuChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: 'Sisa Hasil Usaha Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        shuChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: 'Sisa Hasil Usaha Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        shuChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: 'Sisa Hasil Usaha Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        shuChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})

var bebanChart = Highcharts.chart('beban-chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 258,
        width: 280
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false,
    },
    legend:{ enabled: false },
    credits: { enabled: false },
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
            allowPointSelect: true,
            center: ['40%', '50%'],
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name} : {point.percentage:.1f} %'
            },
            size: '50%',
            showInLegend: true
        },
        series: {
            dataLabels: {
                style: {
                    fontSize: '9px'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [
            {
                name: 'TS',
                y: 26.9,
            },
            {
                name: 'ITTS',
                y: 6.4
            },
            {
                name: 'ITTP',
                y: 9.0
            },
            {
                name: 'AKATEL',
                y: 4.5
            },
            {
                name: 'TelU',
                y: 43.6
            },
            {
                name: 'Lakhar',
                y: 9.6
            },
        ]
    }]
});

$('#export-beban.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-beban').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        bebanChart.update({
            title: {
                text: 'Beban Lembaga',
                floating: true,
                x: 40,
                y: 90
            }
        })
        bebanChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        bebanChart.print()
    } else if(jenis == 'Download PNG image') {
        bebanChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: 'Beban Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        bebanChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: 'Beban Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        bebanChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: 'Beban Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        bebanChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: 'Beban Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        bebanChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})

var pdptChart = Highcharts.chart('pdpt-chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 258,
        width: 280
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false,
    },
    legend:{ enabled: false },
    credits: { enabled: false },
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
            allowPointSelect: true,
            center: ['40%', '50%'],
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name} : {point.percentage:.1f} %'
            },
            size: '50%',
            showInLegend: true
        },
        series: {
            dataLabels: {
                style: {
                    fontSize: '9px'
                }
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [
            {
                name: 'TS',
                y: 26.9,
            },
            {
                name: 'ITTS',
                y: 6.4
            },
            {
                name: 'ITTP',
                y: 9.0
            },
            {
                name: 'AKATEL',
                y: 4.5
            },
            {
                name: 'TelU',
                y: 43.6
            },
            {
                name: 'Lakhar',
                y: 9.6
            },
        ]
    }]
});

$('#export-pdpt.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-pdpt').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        pdptChart.update({
            title: {
                text: 'Pendapatan Lembaga',
                floating: true,
                x: 40,
                y: 90
            }
        })
        pdptChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        pdptChart.print()
    } else if(jenis == 'Download PNG image') {
        pdptChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: 'Pendapatan Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        pdptChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: 'Pendapatan Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        pdptChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: 'Pendapatan Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        pdptChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: 'Pendapatan Lembaga'
            },
            subtitle: {
            text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        pdptChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})

Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
};

var lrChart = Highcharts.chart('lr-chart', {
    chart: {
        height: 190
    },
    credits:{
        enabled:false
    },
    exporting:{ 
        enabled: false,
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

$('#export-lr.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-lr').attr('id')
    var jenis = $(this).text()
    if(jenis == 'View in full screen') {
        lrChart.update({
            title: {
                text: 'Sisa Hasil Usaha Lembaga',
                floating: true,
                x: 40,
                y: 90
            }
        })
         lrChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        lrChart.print()
    } else if(jenis == 'Download PNG image') {
        lrChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: 'Laba Rugi Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        lrChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: 'Laba Rugi Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        lrChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: 'Laba Rugi Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        lrChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: 'Laba Rugi Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        lrChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})
</script>