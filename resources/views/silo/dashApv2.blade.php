<link rel="stylesheet" href="{{ asset('asset_silo/css/dashboard2.css') }}" />

<div class="row pb-3">
    <div class="col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <h5>Posisi Kebutuhan</h5>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 effect-hover" data-key="JK">
                            <h6 class="sub-card-title">Justifikasi Kebutuhan</h6>
                            <p class="sub-card-value">12</p>
                        </div>
                        <div class="col-md-4 col-sm-12 effect-hover" data-key="VR">
                            <h6 class="sub-card-title">Verifikasi</h6>
                            <p class="sub-card-value">4</p>
                        </div>
                        <div class="col-md-4 col-sm-12 effect-hover" data-key="APC">
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
                        <div class="col-md-4 col-sm-12 effect-hover" data-key="JP">
                            <h6 class="sub-card-title">Justifikasi Pengadaan</h6>
                            <p class="sub-card-value">7</p>
                        </div>
                        <div class="col-md-4 col-sm-12 effect-hover" data-key="APV1">
                            <h6 class="sub-card-title">Approval 1</h6>
                            <p class="sub-card-value">2</p>
                        </div>
                        <div class="col-md-4 col-sm-12 effect-hover" data-key="APV2">
                            <h6 class="sub-card-title">Approval 2</h6>
                            <p class="sub-card-value">1</p>
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-md-4 col-sm-12 effect-hover" data-key="APV3">
                            <h6 class="sub-card-title">Approval 3</h6>
                            <p class="sub-card-value">19</p>
                        </div>
                        <div class="col-md-4 col-sm-12 effect-hover" data-key="APV4">
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

    $('#table-data tbody').on('click', 'tr', function() {
        var html = ""
        var bottomSheet = new BottomSheet("bottomsheet-container");
        event.preventDefault()
        bottomSheet.activate()
        html += `<div class='header-bottomsheet'>
            <p>No Bukti</p>
            <h6>2351-9892-9182</h6>
        </div>
        <div class='row mt-4'>
            <div class='col-12'>
                <ul class='nav nav-tabs separator-tabs nav-custom' role='tablist'>
                    <li class='nav-item with-padding-pl'>
                        <a class='nav-link active' id='detail' href='#detail-tab' data-toggle='tab' role='tab' aria-controls='detail-tab' aria-selected='true'>Detail</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='riwayat' href='#riwayat-tab' data-toggle='tab' role='tab' aria-controls='vr-tab' aria-selected='false'>Riwayat Posisi</a>
                    </li>
                </ul>
                <div class='tab-content mt-4 content-height' id='tab-content'>
                    <div class='tab-pane show active with-padding-px' id='detail-tab' role='tabpanel' aria-labelledby='detail-tab'>
                        <table class='table table-bordered' id='table-detail'>
                            <tbody>
                                <tr>
                                    <td style='width: 50%;'>
                                        <p>Tanggal Transaksi</p>
                                        <p class='label-table'>23 Juni 2021</p>
                                    </td>
                                    <td style='width: 50%;'>
                                        <p>PP</p>
                                        <p class='label-table'>Keuangan</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='width: 50%;'>
                                        <p>Nilai</p>
                                        <p class='label-table'>Rp. 1.000.000.000</p>
                                    </td>
                                    <td style='width: 50%;'>
                                        <p>Kota</p>
                                        <p class='label-table'>Bandung</p>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
                        <div class='row mt-5'>
                            <div class='col-12'>
                                <h5>Justifikasi Kebutuhan</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>    
                            </div>    
                        </div>
                        <div class='row mt-5 mb-1'>
                            <div class='col-12'>
                                <h5>Dasar</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>    
                            </div>    
                        </div>
                    </div>
                    <div class='tab-pane with-padding-px' id='riwayat-tab' role='tabpanel' aria-labelledby='riwayat-tab'>
                        <ul class='timeline'>
                            <li>
                                <p class='date-timeline'>23 Juni 2021</p>
                                <div class='information-timeline'>
                                    <div class='apv-timeline'>
                                        <span>Approval 1</span>    
                                    </div>
                                    <div class='invoice-timeline'>
                                        <span>No Bukti : </span> <span>APV-202106-0001</span>        
                                    </div>    
                                </div>
                                <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                            </li>
                            <li>
                                <p class='date-timeline'>23 Juni 2021</p>
                                <div class='information-timeline'>
                                    <div class='apv-timeline'>
                                        <span>Approval 1</span>    
                                    </div>
                                    <div class='invoice-timeline'>
                                        <span>No Bukti : </span> <span>APV-202106-0001</span>        
                                    </div>    
                                </div>
                                <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                            </li>
                            <li>
                                <p class='date-timeline'>23 Juni 2021</p>
                                <div class='information-timeline'>
                                    <div class='apv-timeline'>
                                        <span>Approval 1</span>    
                                    </div>
                                    <div class='invoice-timeline'>
                                        <span>No Bukti : </span> <span>APV-202106-0001</span>        
                                    </div>    
                                </div>
                                <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                            </li>
                            <li>
                                <p class='date-timeline'>23 Juni 2021</p>
                                <div class='information-timeline'>
                                    <div class='apv-timeline'>
                                        <span>Approval 1</span>    
                                    </div>
                                    <div class='invoice-timeline'>
                                        <span>No Bukti : </span> <span>APV-202106-0001</span>        
                                    </div>    
                                </div>
                                <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                            </li>
                            <li>
                                <p class='date-timeline'>23 Juni 2021</p>
                                <div class='information-timeline'>
                                    <div class='apv-timeline'>
                                        <span>Approval 1</span>    
                                    </div>
                                    <div class='invoice-timeline'>
                                        <span>No Bukti : </span> <span>APV-202106-0001</span>        
                                    </div>    
                                </div>
                                <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                            </li>
                            <li>
                                <p class='date-timeline'>23 Juni 2021</p>
                                <div class='information-timeline'>
                                    <div class='apv-timeline'>
                                        <span>Approval 1</span>    
                                    </div>
                                    <div class='invoice-timeline'>
                                        <span>No Bukti : </span> <span>APV-202106-0001</span>        
                                    </div>    
                                </div>
                                <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                            </li>
                        </ul>    
                    </div>
                </div>    
            </div>
        </div>`
        addContentBottomSheet(html)
    })

    function addContentBottomSheet(html) {
        $('.c-bottom-sheet__sheet').css({ 'min-height': '650px' })
        $('#content-bottom-sheet').empty()
        $('#content-bottom-sheet').append(html)

        var scrollTabContent = document.querySelector('#tab-content');
        new PerfectScrollbar(scrollTabContent, {
            suppressScrollX: true
        });
    }

    $('.effect-hover').click(function() {
        var key = $(this).data('key')
        $.ajax({
            type: 'GET',
            url: "{{ url('silo-auth/cek_session') }}",
            dataType: 'json',
            async:false,
            success:function(result) {    
                if(!result.status){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                }else{   
                    $('.body-content').load("{{ url('silo-dash/detail') }}");
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/silo-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }        
            }
        });
    })
</script>