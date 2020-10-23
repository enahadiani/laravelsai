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
    table.table-bordered > thead > tr > th {
        color: #f0f0f0;
        text-align: center;
        vertical-align: middle;
    }
</style>
<div class="row">
    <div class="col-12">
        <h2 style="position:absolute">Claim Cost & Biaya Pengobatan</h2>
        <button class="btn btn-outline-light float-right" id="btn-area">Area</button>
        <button class="btn btn-outline-light float-right" id="btn-nasional">Nasional</button>
    </div>
    <div id="nasional" class="col-12" style="margin-top: 20px;">

        <div class="card" style="border-radius:10px !important;">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;color:#3CB371">Claim Cost</h6>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">Jumlah CC</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>241.891 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">301.548 M</td>
                                <td style="text-align: right;">80,2%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">456.780 M</td>
                                <td style="text-align: right;">53,0%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">252.952 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -4,4%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">Jumlah Claim</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>57.347 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">57.982 M</td>
                                <td style="text-align: right;">98,9%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">58.750 M</td>
                                <td style="text-align: right;">97,6%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">252.952 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-up" style="font-color: green;font-weight:bold;"></i> 3,0%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">Jumlah per Claim</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>4.218 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">5.200 M</td>
                                <td style="text-align: right;">81,1%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">7.774 M</td>
                                <td style="text-align: right;">54,3%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">252.952 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -7,1%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">Rincian Realisasi Beban</h6>
                    <p class="ml-4" style="margin-top: -10px;">Data s/d Agt 20'</p>
                    <div class="row" style="margin-top: -18px;">
                        <div class="col-3" id="rjtp-beban-nasional" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="rjtl-beban-nasional" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="ri-beban-nasional" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="rest-beban-nasional" style="height: 353px;width:200px;"></div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">81,8%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">54,1%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-up" style="font-color: green;font-weight:bold;"></i> 7.7%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">92,4%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">61,0%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-up" style="font-color: green;font-weight:bold;"></i> 1.4%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">72,7%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">47,9%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -13.5%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">84,0%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">55,5%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -8.5%</td>
                                </tr>
                            </table>
                        </div>
                    <div class="col-12" style="display: flex;justify-content: center;margin-top:5px;">
                        <div style="width: 13px;height:13px;background-color:rgb(149,206,255);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA 2020</p>
                        <div style="width: 13px;height:13px;background-color:rgb(67,67,72);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA s/d Agt'20</p>
                        <div style="width: 13px;height:13px;background-color:rgb(144,237,125);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'20</p>
                        <div style="width: 13px;height:13px;background-color:rgb(247,163,92);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'19</p>
                    </div>
                    <div class="col-12" style="text-align: center;margin-top:-10px;">
                        <p style="font-weight: bold">Nilai dalam chart dalam satuan Milyar Rupiah</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-3" style="border-radius:10px !important;">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;color:#3CB371">Biaya Pengobatan</h6>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">Jumlah BP</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>62.723 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">85.911 M</td>
                                <td style="text-align: right;">73,0%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">125.226 M</td>
                                <td style="text-align: right;">50,1%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">82.313 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -23,8%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">Jumlah NIK</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>9.237 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">9.120 M</td>
                                <td style="text-align: right;">101.3%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">8.792 M</td>
                                <td style="text-align: right;">105,1%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">10.623 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -13,0%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">BP per NIK</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>6.790 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">9.420 M</td>
                                <td style="text-align: right;">72,1%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">14.243 M</td>
                                <td style="text-align: right;">47.7%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">7.748 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -12,4%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">Rincian Realisasi Pengobatan</h6>
                    <p class="ml-4" style="margin-top: -10px;">Data s/d Agt 20'</p>
                    <div class="row" style="margin-top: -18px;">
                        <div class="col-3" id="rjtp-obat-nasional" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="rjtl-obat-nasional" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="ri-obat-nasional" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="rest-obat-nasional" style="height: 353px;width:200px;"></div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">66,8%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">45,8%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> 20.9%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">78,7%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">54,0%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> 21.5%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">69.8%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">47.9%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -26.5%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">83,3%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">57,1%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -21.9%</td>
                                </tr>
                            </table>
                        </div>
                    <div class="col-12" style="display: flex;justify-content: center;margin-top:5px;">
                        <div style="width: 13px;height:13px;background-color:rgb(149,206,255);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA 2020</p>
                        <div style="width: 13px;height:13px;background-color:rgb(67,67,72);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA s/d Agt'20</p>
                        <div style="width: 13px;height:13px;background-color:rgb(144,237,125);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'20</p>
                        <div style="width: 13px;height:13px;background-color:rgb(247,163,92);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'19</p>
                    </div>
                    <div class="col-12" style="text-align: center;margin-top:-10px;">
                        <p style="font-weight: bold">Nilai dalam chart dalam satuan Milyar Rupiah</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="area" class="col-12" style="margin-top: 20px;">

        <div class="card" style="border-radius:10px !important;">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;color:#3CB371">Claim Cost</h6>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">REG</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>234.432 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">288.681 M</td>
                                <td style="text-align: right;">81,2%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">437.480 M</td>
                                <td style="text-align: right;">53,6%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">247.390 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -5,2%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">KP</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>7.459 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">12.867 M</td>
                                <td style="text-align: right;">38,6%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">19.300 M</td>
                                <td style="text-align: right;">58,0%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">5.562 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-up" style="font-color: green;font-weight:bold;"></i> 34,1%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">NAS</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>241.891 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">301.548 M</td>
                                <td style="text-align: right;">80,2%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">456.780 M</td>
                                <td style="text-align: right;">53,0%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">252.952 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -4,4%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">Rincian Realisasi Beban</h6>
                    <p class="ml-4" style="margin-top: -10px;">Data s/d Agt 20'</p>
                    <div class="row" style="margin-top: -18px;">
                        <div class="col-3" id="reg-1-beban" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="reg-2-beban" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="reg-3-beban" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="reg-4-beban" style="height: 353px;width:200px;"></div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">86,4%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">56,8%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-up" style="font-color: green;font-weight:bold;"></i> 3.0%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">77,8%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">51,2%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -3.3%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">91,0%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">60,1%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -2.5%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">83,2%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">55,1%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-up" style="font-color: green;font-weight:bold;"></i> 0.5%</td>
                                </tr>
                            </table>
                        </div>
                    <div class="col-12" style="display: flex;justify-content: center;margin-top:5px;">
                        <div style="width: 13px;height:13px;background-color:rgb(149,206,255);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA 2020</p>
                        <div style="width: 13px;height:13px;background-color:rgb(67,67,72);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA s/d Agt'20</p>
                        <div style="width: 13px;height:13px;background-color:rgb(144,237,125);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'20</p>
                        <div style="width: 13px;height:13px;background-color:rgb(247,163,92);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'19</p>
                    </div>
                    <div class="col-12" style="text-align: center;margin-top:-10px;">
                        <p style="font-weight: bold">Nilai dalam chart dalam satuan Milyar Rupiah</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-3" style="border-radius:10px !important;">
            <div class="row">
                <div class="col-12" style="text-align: center;">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;color:#3CB371">Biaya Pengobatan</h6>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">REG</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>62.391 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">84.242 M</td>
                                <td style="text-align: right;">74,1%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">122.722 M</td>
                                <td style="text-align: right;">50,8%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">82.313 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -24,2%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">KP</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>332 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">1.670 M</td>
                                <td style="text-align: right;">19.9%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">2.505 M</td>
                                <td style="text-align: right;">13,3%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">0 M</td>
                                <td style="text-align: right;">0,0%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">NAS</h6>
                    <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
                    <div class="ml-3">
                        <h2 class="ml-2"><strong>62.723 M</strong></h2>
                        <table class="table table-borderless">
                            <tr>
                                <td>RKA YTD Agt'2020</td>
                                <td style="text-align: right;">85.911 M</td>
                                <td style="text-align: right;">73,0%</td>
                            </tr>
                            <tr>
                                <td>RKA 2020</td>
                                <td style="text-align: right;">125.226 M</td>
                                <td style="text-align: right;">50.1%</td>
                            </tr>
                            <tr>
                                <td>Real. YoY Agt'19</td>
                                <td style="text-align: right;">82.313 M</td>
                                <td style="text-align: right;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -23,8%</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <h6 class="ml-4 mt-3" style="font-weight: bold;">Rincian Realisasi Pengobatan</h6>
                    <p class="ml-4" style="margin-top: -10px;">Data s/d Agt 20'</p>
                    <div class="row" style="margin-top: -18px;">
                        <div class="col-3" id="reg-1-obat" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="reg-2-obat" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="reg-3-obat" style="height: 353px;width:200px;"></div>
                        <div class="col-3" id="reg-4-obat" style="height: 353px;width:200px;"></div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">75,5%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">53,4%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> 35.1%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">84,3%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">57,0%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> 12.9%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">65.2%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">44.8%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -32.4%</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3" style="border-right: 1px solid #DCDCDC">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-size: 10px;">YTD</td>
                                    <td style="text-align: right;font-size: 10px;">63,4%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">RKA 2020</td>
                                    <td style="text-align: right;font-size: 10px;">44,0%</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;">YoY</td>
                                    <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -34.9%</td>
                                </tr>
                            </table>
                        </div>
                    <div class="col-12" style="display: flex;justify-content: center;margin-top:5px;">
                        <div style="width: 13px;height:13px;background-color:rgb(149,206,255);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA 2020</p>
                        <div style="width: 13px;height:13px;background-color:rgb(67,67,72);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA s/d Agt'20</p>
                        <div style="width: 13px;height:13px;background-color:rgb(144,237,125);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'20</p>
                        <div style="width: 13px;height:13px;background-color:rgb(247,163,92);border-radius:100%;"></div>
                        <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'19</p>
                    </div>
                    <div class="col-12" style="text-align: center;margin-top:-10px;">
                        <p style="font-weight: bold">Nilai dalam chart dalam satuan Milyar Rupiah</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card" style="height: 100%; border-radius:10px !important;">
                <div class="row mb-1 pl-4 pt-4">

                    <div class="col-12">
                        <h4 style="font-weight: bold;">Claim Cost</h4>
                        <table class="table table-bordered" style="width: 98%;">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="background-color: #00CC66;width:5%;text-align:center;vertical-align:middle;">REG</th>
                                    <th rowspan="2" style="background-color: #00CC66;width:10%;">RKA 2020</th>
                                    <th rowspan="2" style="background-color: #00CC66;width:10%;">RKA SD AGU</th>
                                    <th colspan="2" style="background-color: #00CC66;width:20%;">REALISASI YTD</th>
                                    <th colspan="3" style="background-color: #00CC66;width:30%;">PRENSENTASE</th>
                                </tr>
                                <tr>
                                    <th style="background-color: #00CC66;">AGU 2020</th>
                                    <th style="background-color: #00CC66;">AGU 2019</th>
                                    <th style="background-color: #00CC66;">RKA</th>
                                    <th style="background-color: #00CC66;">AGU</th>
                                    <th style="background-color: #00CC66;">YoY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">I</td>
                                    <td style="text-align: right;">49.279</td>
                                    <td style="text-align: right;">32.388</td>
                                    <td style="text-align: right;">27.982</td>
                                    <td style="text-align: right;">27.176</td>
                                    <td style="text-align: right;">56,6</td>
                                    <td style="text-align: right;">86,4</td>
                                    <td style="text-align: right;">3,0</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">II</td>
                                    <td style="text-align: right;">122.603</td>
                                    <td style="text-align: right;">80.720</td>
                                    <td style="text-align: right;">62.789</td>
                                    <td style="text-align: right;">64.948</td>
                                    <td style="text-align: right;">51,2</td>
                                    <td style="text-align: right;">77,8</td>
                                    <td style="text-align: right;">(3,3)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">III</td>
                                    <td style="text-align: right;">120.625</td>
                                    <td style="text-align: right;">79.672</td>
                                    <td style="text-align: right;">72.446</td>
                                    <td style="text-align: right;">74.360</td>
                                    <td style="text-align: right;">60,1</td>
                                    <td style="text-align: right;">91,0</td>
                                    <td style="text-align: right;">(2,5)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">IV</td>
                                    <td style="text-align: right;">39.450</td>
                                    <td style="text-align: right;">26.130</td>
                                    <td style="text-align: right;">21.750</td>
                                    <td style="text-align: right;">21/642</td>
                                    <td style="text-align: right;">55,1</td>
                                    <td style="text-align: right;">83,2</td>
                                    <td style="text-align: right;">0,5</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">V</td>
                                    <td style="text-align: right;">81.456</td>
                                    <td style="text-align: right;">53.833</td>
                                    <td style="text-align: right;">37.036</td>
                                    <td style="text-align: right;">45.323</td>
                                    <td style="text-align: right;">45,5</td>
                                    <td style="text-align: right;">68,8</td>
                                    <td style="text-align: right;">(18,3)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">VI</td>
                                    <td style="text-align: right;">8.677</td>
                                    <td style="text-align: right;">5.753</td>
                                    <td style="text-align: right;">4.444</td>
                                    <td style="text-align: right;">5.328</td>
                                    <td style="text-align: right;">51,2</td>
                                    <td style="text-align: right;">77,2</td>
                                    <td style="text-align: right;">(16,6)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">VII</td>
                                    <td style="text-align: right;">15.389</td>
                                    <td style="text-align: right;">10.186</td>
                                    <td style="text-align: right;">7.964</td>
                                    <td style="text-align: right;">8.613</td>
                                    <td style="text-align: right;">51,8</td>
                                    <td style="text-align: right;">78,2</td>
                                    <td style="text-align: right;">(7,5)</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #00CC66;color:#f0f0f0;">REG.</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">437.480</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">288.681</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">234.432</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">247.390</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">53,6</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">81,2</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">(5,2)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">KP</td>
                                    <td style="text-align: right;">19.300</td>
                                    <td style="text-align: right;">12.867</td>
                                    <td style="text-align: right;">7.459</td>
                                    <td style="text-align: right;">5.562</td>
                                    <td style="text-align: right;">38,6</td>
                                    <td style="text-align: right;">58,0</td>
                                    <td style="text-align: right;">34,1</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #00CC66;color:#f0f0f0;">NAS</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">456.780</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">301.548</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">241.891</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">252.952</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">53,0</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">80,2</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">(4,4)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-12">
                        <h4 style="font-weight: bold;">Biaya Pengobatan</h4>
                        <table class="table table-bordered" style="width: 98%;">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="background-color: #00CC66;width:5%;text-align:center;vertical-align:middle;">REG</th>
                                    <th rowspan="2" style="background-color: #00CC66;width:10%;">RKA 2020</th>
                                    <th rowspan="2" style="background-color: #00CC66;width:10%;">RKA SD AGU</th>
                                    <th colspan="2" style="background-color: #00CC66;width:20%;">REALISASI YTD</th>
                                    <th colspan="3" style="background-color: #00CC66;width:30%;">PRENSENTASE</th>
                                </tr>
                                <tr>
                                    <th style="background-color: #00CC66;">AGU 2020</th>
                                    <th style="background-color: #00CC66;">AGU 2019</th>
                                    <th style="background-color: #00CC66;">RKA</th>
                                    <th style="background-color: #00CC66;">AGU</th>
                                    <th style="background-color: #00CC66;">YoY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">I</td>
                                    <td style="text-align: right;">14.400</td>
                                    <td style="text-align: right;">10.188</td>
                                    <td style="text-align: right;">7.693</td>
                                    <td style="text-align: right;">11.857</td>
                                    <td style="text-align: right;">53,4</td>
                                    <td style="text-align: right;">75,5</td>
                                    <td style="text-align: right;">(35,1)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">II</td>
                                    <td style="text-align: right;">54.966</td>
                                    <td style="text-align: right;">37.201</td>
                                    <td style="text-align: right;">31.353</td>
                                    <td style="text-align: right;">36.002</td>
                                    <td style="text-align: right;">57,0</td>
                                    <td style="text-align: right;">84,3</td>
                                    <td style="text-align: right;">(12,9)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">III</td>
                                    <td style="text-align: right;">24.813</td>
                                    <td style="text-align: right;">17.060</td>
                                    <td style="text-align: right;">11.129</td>
                                    <td style="text-align: right;">16.458</td>
                                    <td style="text-align: right;">44,8</td>
                                    <td style="text-align: right;">65,2</td>
                                    <td style="text-align: right;">(32,4)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">IV</td>
                                    <td style="text-align: right;">7.517</td>
                                    <td style="text-align: right;">5.217</td>
                                    <td style="text-align: right;">3.306</td>
                                    <td style="text-align: right;">5.077</td>
                                    <td style="text-align: right;">44,0</td>
                                    <td style="text-align: right;">63,4</td>
                                    <td style="text-align: right;">(34,9)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">V</td>
                                    <td style="text-align: right;">12.088</td>
                                    <td style="text-align: right;">8.439</td>
                                    <td style="text-align: right;">4.825</td>
                                    <td style="text-align: right;">7.538</td>
                                    <td style="text-align: right;">39,9</td>
                                    <td style="text-align: right;">57,2</td>
                                    <td style="text-align: right;">(36,0)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">VI</td>
                                    <td style="text-align: right;">2.850</td>
                                    <td style="text-align: right;">1.951</td>
                                    <td style="text-align: right;">1.347</td>
                                    <td style="text-align: right;">1.764</td>
                                    <td style="text-align: right;">47,3</td>
                                    <td style="text-align: right;">69,0</td>
                                    <td style="text-align: right;">(23,0)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">VII</td>
                                    <td style="text-align: right;">6.088</td>
                                    <td style="text-align: right;">4.185</td>
                                    <td style="text-align: right;">2.739</td>
                                    <td style="text-align: right;">3.616</td>
                                    <td style="text-align: right;">45,0</td>
                                    <td style="text-align: right;">65,4</td>
                                    <td style="text-align: right;">(24,3)</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #00CC66;color:#f0f0f0;">REG.</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">122.722</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">84.242</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">62.391</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">82.313</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">50,8</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">74,1</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">(24,2)</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">KP</td>
                                    <td style="text-align: right;">25.505</td>
                                    <td style="text-align: right;">1.670</td>
                                    <td style="text-align: right;">332</td>
                                    <td style="text-align: right;">0</td>
                                    <td style="text-align: right;">13,3</td>
                                    <td style="text-align: right;">19,9</td>
                                    <td style="text-align: right;">0,0</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #00CC66;color:#f0f0f0;">NAS</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">125.226</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">85.911</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">62.723</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">82.313</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">50,1</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">73,0</td>
                                    <td style="text-align: right;background-color: #00CC66;color:#f0f0f0;">(23,8)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#nasional').show();
        $('#area').hide();
        $('#btn-nasional').css('background-color','#3CB371');
        $('#btn-nasional').css('color','#FFFFFF');

        $('#btn-area').click(function(){
            $('#nasional').hide();
            $('#area').show();
            $('#btn-nasional').css('background-color','');
            $('#btn-nasional').css('color','');
            $('#btn-area').css('background-color','#3CB371');
            $('#btn-area').css('color','#FFFFFF');
        });

        $('#btn-nasional').click(function(){
            $('#nasional').show();
            $('#area').hide();
            $('#btn-area').css('background-color','');
            $('#btn-area').css('color','');
            $('#btn-nasional').css('background-color','#3CB371');
            $('#btn-nasional').css('color','#FFFFFF');
        });

        Highcharts.chart('rjtp-beban-nasional', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'RJTP',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [121.527]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [80.329]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [65.697]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [60.982]

            }]
        });

        Highcharts.chart('rjtl-beban-nasional', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'RJTL',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [105.437]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [69.583]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [64.583]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [63.375]

            }]
        });

        Highcharts.chart('ri-beban-nasional', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'RI',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [206.818]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [136.453]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [99.161]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [114.655]

            }]
        });

        Highcharts.chart('rest-beban-nasional', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'Restitusi',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [22.997]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [15.183]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [12.755]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [13.941]

            }]
        });

        Highcharts.chart('rjtp-obat-nasional', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'RJTP',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [22.433]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [15.385]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [10.278]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [13.001]

            }]
        });

        Highcharts.chart('rjtl-obat-nasional', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'RJTL',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [26.759]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [18.350]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [14.445]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [18.390]

            }]
        });

        Highcharts.chart('ri-obat-nasional', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'RI',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [59.096]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [40.573]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [28.333]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [38.547]

            }]
        });

        Highcharts.chart('rest-obat-nasional', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'Restitusi',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [16.938]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [11.603]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [9.667]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [12.375]

            }]
        });

        Highcharts.chart('reg-1-beban', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'I',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [49.279]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [32.388]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [27.982]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [27.176]

            }]
        });

        Highcharts.chart('reg-2-beban', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'II',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [122.603]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [80.720]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [62.789]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [64.948]

            }]
        });

        Highcharts.chart('reg-3-beban', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'III',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [120.625]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [79.672]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [72.466]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [74.360]

            }]
        });

        Highcharts.chart('reg-4-beban', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'IV',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [39.450]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [26.130]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [21.750]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [21.642]

            }]
        });

        Highcharts.chart('reg-1-obat', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'I',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [14.400]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [10.188]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [7.693]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [11.857]

            }]
        });

        Highcharts.chart('reg-2-obat', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'II',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [54.966]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [37.201]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [31.353]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [36.002]

            }]
        });

        Highcharts.chart('reg-3-obat', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'III',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [24.813]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [17.060]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [11.129]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [16.458]

            }]
        });

        Highcharts.chart('reg-4-obat', {
            chart: {
                type: 'column'
            },
            legend:{ enabled:false },
            credits: {
                enabled: false
            },
            title: {
                text: 'IV',
                align: 'center',
                y: 340,
                style:{
                    fontSize: '9px',
                    fontWeight: 'bold'
                }
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                visible: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 1,
                    borderWidth: 0,
                },
                series:{
                    pointWidth: 30,
                    groupPadding: 0,
                    borderWidth: 0,
                    shadow: false,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'RKA 2020',
                data: [7.517]

            }, {
                name: 'RKA s/d Agt.20"',
                data: [5.217]

            }, {
                name: 'Realisasi s/d Agt.20"',
                data: [3.306]

            }, {
                name: 'RKA s/d Agt.19"',
                data: [5.077]

            }]
        });


    });
</script>