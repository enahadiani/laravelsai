<style>
    body {
        overflow: auto; /* Hide scrollbars */
    }
    .card{
        border-radius: 10px !important;
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
    .select-dash {
        width: 50%;
        position: absolute;
        margin: 0;
        right: 0;
        border-radius: 10px;
    }
    .box-container {
        background-color: #f2f2f2;
        height: 50px;
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
        border-radius: 10px;
    }
    .subbox-container{
        margin-top: -10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .box{
        background-color: #f2f2f2;
        height: 50px;
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .keterangan {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="row">
    <div class="col-6">
        <h2 style="position:absolute;">Biaya Kunjungan</h2>
    </div>
    <div class="col-6">
        <select id="jenis" class="form-control select-dash">
            <option value="PKK" selected>Pensiunan dan Keluarga</option>
            <option value="PKG">Pegawai dan Keluarga</option>
        </select>
    </div>
</div>

<div id="PKK">

    <div class="row" style="position: relative;margin-top:50px;">
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Claim Cost</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div id="pkk-claim" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 80.42%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5.45%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi CC</h6>
            <div id="pkk-komposisi" class="mt-3"></div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">CC per Claimant</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div id="pkk-cc" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 81.56%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">7.94%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;">
    <div class="col-12">
        <div class="card">    
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">CC per Jenis Layanan</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div class="row">
                <div class="col-3">
                    <div id="pkk-rjtp" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 81.8%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-up-circle" style="font-size: 18px;color: #228B22;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">7.7%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-rjtl" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 92.4%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-up-circle" style="font-size: 18px;color: #228B22;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5.45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-ri" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 72.7%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">13.5%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-restitusi" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 84.0%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">8.5%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#add8e6;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#457b9d;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">RKA Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#1d3557;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'20</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;">
    <div class="col-6">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div id="pkk-kunjungan" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 86.80%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-up-circle" style="font-size: 18px;color:#228B22;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">0.17%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi Kunjungan</h6>
            <div id="pkk-komposisi-kunj" class="mt-3"></div>
        </div>
    </div>
    <div class="col-12" style="margin-top: 20px;">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan per Jenis Layanan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div class="row">
                <div class="col-3">
                    <div id="pkk-rjtp-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;font-size:12px;">Ach. 90.1%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-up-circle" style="font-size: 12px;color: #228B22;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">6.1%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-rjtl-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 81.2%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">10.8%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-ri-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 63.3%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">27.7%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-restitusi-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 79.6%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">6.6%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#add8e6;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#457b9d;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">RKA Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#1d3557;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'20</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div id="PKG">

    <div class="row" style="position: relative;margin-top:50px;">
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Biaya Pengobatan</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div id="pkg-claim" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 76.00%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">22.46%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi CC</h6>
            <div id="pkg-komposisi" class="mt-3"></div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">CC per Claimant</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div id="pkg-cc" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 75.33%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">10.26%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;">
    <div class="col-12">
        <div class="card">    
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Biaya Pengobatan per Jenis Layanan</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div class="row">
                <div class="col-3">
                    <div id="pkg-rjtp" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 66.3%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">20.7%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkg-rjtl" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 83.1%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">21.6%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkg-ri" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 73.4%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">24,7%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkg-restitusi" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 86.7%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">18.3%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#add8e6;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#457b9d;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">RKA Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#1d3557;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'20</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;">
    <div class="col-6">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div id="pkg-kunjungan" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 55.80%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color:#ff0000;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">30,54%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi Kunjungan</h6>
            <div id="pkg-komposisi-kunj" class="mt-3"></div>
        </div>
    </div>
    <div class="col-12" style="margin-top: 20px;">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan per Jenis Layanan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div class="row">
                <div class="col-3">
                    <div id="pkg-rjtp-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;font-size:12px;">Ach. 56.9%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 12px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">29.7%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkg-rjtl-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 54.6%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">30.8%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkg-ri-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 45.2%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">16.7%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkg-restitusi-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 50.6%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">40.5%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#add8e6;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#457b9d;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">RKA Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#1d3557;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'20</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script type="text/javascript">

$('#PKK').show();
$('#PKG').hide();

$('#jenis').change(function(){
    var val = $(this).val();
    if(val == 'PKK') {
        $('#PKK').show();
        $('#PKG').hide();
    } else {
        $('#PKK').hide();
        $('#PKG').show();
    }
})

Highcharts.chart('pkk-claim', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-komposisi', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            size: 200,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                padding: 0,
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            },
        }
    },
    series: [{
        name: 'Komposisi CC',
        colorByPoint: true,
        data: [{
            name: 'RJTP',
            y: 27,
        }, {
            name: 'RI',
            y: 41
        }, {
            name: 'RJTL',
            y: 27
        }, {
            name: 'Restitusi',
            y: 5
        }]
    }]
});

Highcharts.chart('pkk-cc', {
    chart: {
        type: 'column',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 5.17,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 5.84,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 4.76,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-rjtp', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTP",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 68.4,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 90.6,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 75.0,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-rjtl', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTL",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 74.7,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 78.5,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 73.6,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-ri', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 130.5,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 153.9,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 110.2,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-restitusi', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RESTITUSI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 15.7,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 17.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 14.7,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-kunjungan', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "KUNJUNGAN",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 389.4,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 449.3,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 390.0,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-komposisi-kunj', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            size: 200,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                padding: 0,
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            },
        }
    },
    series: [{
        name: 'Komposisi CC',
        colorByPoint: true,
        data: [{
            name: 'RJTP',
            y: 70,
        }, {
            name: 'RI',
            y: 1
        }, {
            name: 'RJTL',
            y: 26
        }, {
            name: 'Restitusi',
            y: 3
        }]
    }]
});

Highcharts.chart('pkk-rjtp-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTP",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 255.6,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 301.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 271.1,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-rjtl-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTL",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 113.9,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 125.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 101.6,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-ri-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 6.1,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 7.0,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 4.4,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-restitusi-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RESTITUSI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 13.7,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 16.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 12.1,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-claim', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Biaya Pengobatan",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 82.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 85.9,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 72.9,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-komposisi', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            size: 200,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                padding: 0,
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            },
        }
    },
    series: [{
        name: 'Komposisi CC',
        colorByPoint: true,
        data: [{
            name: 'RJTP',
            y: 16,
        }, {
            name: 'RI',
            y: 45
        }, {
            name: 'RJTL',
            y: 23
        }, {
            name: 'Restitusi',
            y: 16
        }]
    }]
});

Highcharts.chart('pkg-cc', {
    chart: {
        type: 'column',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 8.94,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 10.65,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 8.02,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-rjtp', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTP",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 14.4,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 17.2,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 11.4,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-rjtl', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTL",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 21.7,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 20.5,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 17.0,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-ri', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 44.2,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 45.3,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 33.2,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-restitusi', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RESTITUSI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 13.7,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 13.0,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 11.2,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-kunjungan', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "KUNJUNGAN",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 173.9,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 216.5,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 120.8,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-komposisi-kunj', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            size: 200,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                padding: 0,
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            },
        }
    },
    series: [{
        name: 'Komposisi CC',
        colorByPoint: true,
        data: [{
            name: 'RJTP',
            y: 73,
        }, {
            name: 'RI',
            y: 1
        }, {
            name: 'RJTL',
            y: 20
        }, {
            name: 'Restitusi',
            y: 6
        }]
    }]
});

Highcharts.chart('pkg-rjtp-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTP",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 125.5,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 155.2,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 88.2,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-rjtl-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTL",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 34.2,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 43.3,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 23.6,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-ri-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 1.8,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 3.3,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 1.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkg-restitusi-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RESTITUSI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 12.5,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 14.7,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 7.4,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});
</script>