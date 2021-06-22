<link rel="stylesheet" href="{{ asset('asset_silo/css/dashboard2.css') }}" />

<div class="row pb-3">
    <div class="col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <h5>Posisi Kebutuhan</h5>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <h6 class="sub-card-title">Justifikasi Kebutuhan</h6>
                            <p class="sub-card-value">12</p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h6 class="sub-card-title">Verifikasi</h6>
                            <p class="sub-card-value">4</p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h6 class="sub-card-title">Approval Cabang</h6>
                            <p class="sub-card-value">1</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card">
                    <h5>Posisi Pengadaan</h5>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <h6 class="sub-card-title">Justifikasi Pengadaan</h6>
                            <p class="sub-card-value">7</p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h6 class="sub-card-title">Approval 1</h6>
                            <p class="sub-card-value">2</p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h6 class="sub-card-title">Approval 2</h6>
                            <p class="sub-card-value">1</p>
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h6 class="sub-card-title">Approval 3</h6>
                            <p class="sub-card-value">19</p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h6 class="sub-card-title">Approval 4</h6>
                            <p class="sub-card-value">2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card h-full p-0">
            <h5 class="with-padding">Daftar Perbaikan</h5>
            <div class="body-card pr-3" id="monitoring">
                <div class="row with-padding-no-top with-h">
                    <div class="col-2">
                        <div class="avatar">
                            <img alt="avatar" src="{{ asset('asset_silo/images/avatar5.png') }}">
                        </div>
                    </div>
                    <div class="col-10">
                        <p class="key-card">328-3MJFSD-389743</p>
                        <p class="value-card">Approval</p>
                        <div class="content-card">
                            Isi catatan perbaikan, hanya untuk dua baris saja.
                        </div>
                    </div>
                    <hr class="line-v" />
                </div>
                <div class="row with-padding-no-top with-h">
                    <div class="col-2">
                        <div class="avatar">
                            <img alt="avatar" src="{{ asset('asset_silo/images/avatar5.png') }}">
                        </div>
                    </div>
                    <div class="col-10">
                        <p class="key-card">328-3MJFSD-389743</p>
                        <p class="value-card">Approval</p>
                        <div class="content-card">
                            Isi catatan perbaikan, hanya untuk dua baris saja.
                        </div>
                    </div>
                    <hr class="line-v" />
                </div>
                <div class="row with-padding-no-top with-h">
                    <div class="col-2">
                        <div class="avatar">
                            <img alt="avatar" src="{{ asset('asset_silo/images/avatar5.png') }}">
                        </div>
                    </div>
                    <div class="col-10">
                        <p class="key-card">328-3MJFSD-389743</p>
                        <p class="value-card">Approval</p>
                        <div class="content-card">
                            Isi catatan perbaikan, hanya untuk dua baris saja.
                        </div>
                    </div>
                    <hr class="line-v" />
                </div>
                <div class="row with-padding-no-top with-h">
                    <div class="col-2">
                        <div class="avatar">
                            <img alt="avatar" src="{{ asset('asset_silo/images/avatar5.png') }}">
                        </div>
                    </div>
                    <div class="col-10">
                        <p class="key-card">328-3MJFSD-389743</p>
                        <p class="value-card">Approval</p>
                        <div class="content-card">
                            Isi catatan perbaikan, hanya untuk dua baris saja.
                        </div>
                    </div>
                    <hr class="line-v" />
                </div>
            </div>
            <div class="footer-card">
                <a href="" class="load-all">Lihat Semua</a>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <h5>Daftar Transaksi</h5>
            <div class="row">
                <div class="col-9">
                    <div class="search-data">
                        <div class="append-icon">
                            <i class="simple-icon-magnifier"></i>
                        </div>
                        <input name="search" class="form-control field-custom">
                    </div>
                </div>
                <div class="col-3">
                    <select class="form-control select-custom">
                        <option value="all" selected>Tampil Semua</option>
                    </select>
                </div>
                <div class="col-12 mt-3">
                    <div class="table-scroll" id="table-scroll">
                        <table class="table table-borderless table-condensed" id="table-data">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 8%;">Tanggal</th>
                                    <th style="width: 20%;">No Bukti</th>
                                    <th style="width: 50%;">Justifikasi Kebutuhan</th>
                                    <th style="width: 10%;">Status Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>22/06/2021</td>
                                    <td>APV-2021060001</td>
                                    <td>Catatan justifikasi kebutuhan dummy</td>
                                    <td class="status">Approve 1</td>
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
    var scrollCard = document.querySelector('#monitoring');
    new PerfectScrollbar(scrollCard, {
        suppressScrollX: true
    });

    var scrollTable = document.querySelector('#table-scroll');
    new PerfectScrollbar(scrollTable, {
        suppressScrollX: true
    });
</script>