<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/cf.dekstop.css') }}" />

{{-- DEKSTOP --}}

{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-8 pl-12">
            <div class="row">
                <div id="back-div" class="col-1 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11">
                    <h2 class="title-dash" id="title-dash">Cash Flow</h2>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="row">
                {{-- <div class="col-3 pr-0 message-div">
                    <img alt="message-icon" class="icon-message" src="{{ asset('dash-asset/dash-ypt/icon/message.svg') }}">
                </div> --}}
                <div class="col-12">
                    <div class="select-custom row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text" class="select-text">September 2021</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-ypt/icon/drop-arrow.svg') }}">
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
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Inflow</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-inflow" class="main-nominal">293,3 M</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-inflow">
                            <tbody>
                                <tr>
                                    <td class="w-10">YoY</td>
                                    <td>292,1 M</td>
                                    <td id="inflow-yoy-percentage" class="green-text pr-0">
                                        0,4%
                                        <div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Outflow</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-outflow" class="main-nominal">211,4 M</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-outflow">
                            <tbody>
                                <tr>
                                    <td class="w-10">YoY</td>
                                    <td>201,3 M</td>
                                    <td id="outflow-yoy-percentage" class="red-text pr-0">
                                        4,7%
                                        <div class="glyph-icon iconsminds-up icon-card red-text bold-700"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Cash Balance</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-balance" class="main-nominal">81,9 M</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-balance">
                            <tbody>
                                <tr>
                                    <td class="w-10">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td id="balance-yoy-percentage" class="red-text pr-0">
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Closing Cash Balance</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-closing" class="main-nominal">158,1 M</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-outflow">
                            <tbody>
                                <tr>
                                    <td class="w-10">MoM</td>
                                    <td>76,2 M</td>
                                    <td id="outflow-yoy-percentage" class="green-text pr-0">
                                        107,4%
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
    {{-- END ROW 1 --}}

    {{-- ROW 2 --}}
    <div id="dekstop-2" class="row dekstop mt-4">
        <div class="col-12 pl-12 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Trend Cash Flow</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 2 --}}
</section>
{{-- END CONTENT MAIN --}}

{{-- END DEKSTOP --}}