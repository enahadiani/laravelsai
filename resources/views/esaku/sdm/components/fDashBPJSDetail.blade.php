<section id="detail-bpjs" class="dekstop-5 pb-1 m-b-25 detail-section" style="display: none;">
    <div class="row">
        <div class="col-12">
            <div class="card card-dash">
                <div class="card-header row">
                    <div class="col-12">
                        <div class="glyph-icon iconsminds-left to-main-dash"></div>
                        <h6 class="card-title-2 text-bold text-medium detail-card" id="header-bpjs"></h6>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-6">
                        <div class="card card-dash-2 bg-blue">
                            <div class="card-content">
                                <p id="label-card-bpjs" class="label-card">Jumlah <span class="ket-bpjs"></span></p>
                                <div class="row">
                                    <div class="col-10 count-card" id="jumlah-bpjs">
                                        0
                                    </div>
                                    <div class="col-2">
                                        <p class="percentage-card" id="persentase-bpjs">0%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-dash-2 no-p">
                            <div class="card-header bg-blue">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <p id="label-table-bpjs" class="label-table-bpjs">
                                            Data <span id="ket-bpjs"></span>
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <div class="search-box input-group">
                                            <input type="text" id="no-bpjs" class="form-control" autocomplete="off" placeholder="Nomor BPJS PPU">
                                            <div class="input-group-append">
                                                <div class="icon-input">
                                                    <i class="simple-icon-magnifier"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-detail" id="table-detail-bpjs">
                                    <table id="table-bpjs" class="table table-hover table-borderless">
                                        <thead>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>ID BPJS</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card card-dash-2 bg-red">
                            <div class="card-content">
                                <p id="label-card-bpjs" class="label-card">Jumlah <span class="ketnon-bpjs"></span></p>
                                <div class="row">
                                    <div class="col-10 count-card" id="jumlah-non-bpjs">
                                        0
                                    </div>
                                    <div class="col-2">
                                        <p class="percentage-card" id="persentase-non-bpjs">0%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-dash-2 no-p">
                            <div class="card-header bg-red">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <p id="label-table-bpjs" class="label-table-bpjs">
                                            Data  <span id="ketnon-bpjs"></span>
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <div class="search-box input-group">
                                            <input type="text" id="no-non-bpjs" class="form-control" autocomplete="off" placeholder="Nomor BPJS Non PPU">
                                            <div class="input-group-append">
                                                <div class="icon-input">
                                                    <i class="simple-icon-magnifier"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-detail" id="table-detail-non-bpjs">
                                    <table id="table-non-bpjs" class="table table-hover table-borderless">
                                        <thead>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>ID BPJS</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
var $url = null;
var $url_register = null;
var $url_unregister = null;
var $textHeader = "";
var $text1 = "";
var $text2 = "";
var $placeholder1 = "";
var $placeholder2 = "";
var $http = null;

// EVENT INPUT SEARCH
// TERDAFTAR
$('#no-bpjs').on('input', function() {
    if($http) {
        console.log('dibatalkan requeest')
        $http.abort()
    }

    var html = '';

    $http = $.ajax({
        type: 'GET',
        url: $url_register,
        data: { bpjs: $(this).val() },
        dataType: 'json',
        async:true,
        beforeSend: function() {
            $('#table-bpjs tbody').empty()
            html = `<tr>
                <td colspan="4" style="text-align: center;">Memuat data...</td>    
            </tr>`
            $('#table-bpjs tbody').append(html)
            html = '';
        },
        success:function(result) {
            $('#table-bpjs tbody').empty()
            var data = result.data;
            if(result.status) {
                if(data.length > 0) {
                    var no = 1;
                    for(var i=0;i<data.length;i++) {
                        var row = data[i];
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.nik}</td>    
                            <td>${row.nama}</td>    
                            <td>${row.no_bpjs}</td>    
                        </tr>`
                        no++;
                    }
                } else {
                    html += `<tr>
                        <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>    
                    </tr>`
                }
            } else {
                html += `<tr>
                    <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>    
                </tr>`
            } 
            $('#table-bpjs tbody').append(html)
        },
    });
})
// END TERDAFTAR
// NON TERDAFTAR
$('#no-non-bpjs').on('input', function() {
    if($http) {
        console.log('dibatalkan requeest')
        $http.abort()
    }

    var html = '';

    $http = $.ajax({
        type: 'GET',
        url: $url_unregister,
        data: { bpjs: $(this).val() },
        dataType: 'json',
        async:true,
        beforeSend: function() {
            $('#table-non-bpjs tbody').empty()
            html = `<tr>
                <td colspan="4" style="text-align: center;">Memuat data...</td>    
            </tr>`
            $('#table-non-bpjs tbody').append(html)
            html = '';
        },
        success:function(result) {
            $('#table-non-bpjs tbody').empty()
            var data = result.data;
            if(result.status) {
                if(data.length > 0) {
                    var no = 1;
                    for(var i=0;i<data.length;i++) {
                        var row = data[i];
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.nik}</td>    
                            <td>${row.nama}</td>    
                            <td>${row.no_bpjs}</td>    
                        </tr>`
                        no++;
                    }
                } else {
                    html += `<tr>
                        <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>    
                    </tr>`
                }
            } else {
                html += `<tr>
                    <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>    
                </tr>`
            }    
            $('#table-non-bpjs tbody').append(html)
        },
    });
})
// END NON TERDAFTAR
// END EVENT INPUT SEARCH

// LOAD DATA
function generateDataBPJS(type = 0) {
    if(type == 0) {
        $url = "{{ url('esaku-dash/sdm-detail-bpjs-sehat-komposisi') }}";
        $url_register = "{{ url('esaku-dash/sdm-detail-bpjs-sehat-register') }}";
        $url_unregister = "{{ url('esaku-dash/sdm-detail-bpjs-sehat-unregister') }}";
        $textHeader = "Data BPJS Kesehatan";
        $text1 = "BPJS PPU (Peserta Penerima Upah)";
        $text2 = "Non PPU (Peserta Penerima Upah)";
        $placeholder1 = "Nomor BPJS PPU";
        $placeholder2 = "Nomor BPJS Non PPU";
    } else {
        $url = "{{ url('esaku-dash/sdm-detail-bpjs-kerja-komposisi') }}";
        $url_register = "{{ url('esaku-dash/sdm-detail-bpjs-kerja-register') }}";
        $url_unregister = "{{ url('esaku-dash/sdm-detail-bpjs-kerja-unregister') }}";
        $textHeader = "Data BPJS Tenaga Kerja";
        $text1 = "BPJS Ketenagakerjaan Aktif";
        $text2 = "BPJS Ketenagakerjaan Nonaktif";
        $placeholder1 = "Nomor BPJS Ketenagaan Aktif";
        $placeholder2 = "Nomor BPJS Ketenagaan Nonaktif";
    }

    $('#header-bpjs').text($textHeader)
    $('#ket-bpjs').text($text1)
    $('#ketnon-bpjs').text($text2)
    $('#no-bpjs').attr('placeholder', $placeholder1)
    $('#no-non-bpjs').attr('placeholder', $placeholder2)
    $('#table-bpjs tbody').empty()
    $('#table-non-bpjs tbody').empty()

    $.ajax({
        type: 'GET',
        url: $url,
        dataType: 'json',
        async:false,
        success:function(result){    
            var data = result.data;
            if(result.status) {
                $('#jumlah-bpjs').text(sepNum(data.qty_terdaftar))
                $('#persentase-bpjs').text(data.percent_terdaftar + "%")
                $('#jumlah-non-bpjs').text(sepNum(data.qty_nonterdaftar))
                $('#persentase-non-bpjs').text(data.percent_nonterdaftar + "%")

                if(data.terdaftar.length > 0) {
                    var no = 1;
                    var html = null
                    for(var i=0;i<data.terdaftar.length;i++) {
                        var row = data.terdaftar[i]
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.nik}</td>    
                            <td>${row.nama}</td>    
                            <td>${row.no_bpjs}</td>    
                        </tr>`
                        no++;
                    }
                    $('#table-bpjs tbody').append(html)
                }

                 if(data.nonterdaftar.length > 0) {
                    var no = 1;
                    var html = null
                    for(var i=0;i<data.nonterdaftar.length;i++) {
                        var row = data.nonterdaftar[i]
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.nik}</td>    
                            <td>${row.nama}</td>    
                            <td>${row.no_bpjs}</td>    
                        </tr>`
                        no++;
                    }
                    $('#table-non-bpjs tbody').append(html)
                }
            }
        }
    });
}
// END LOAD DATA
</script>