<link rel="stylesheet" href="{{ asset('asset_silo/css/dashboard.css') }}" />

<div class="row">
    <div class="col-md-6 col-sm-6">
        <h5>Dashboard</h5>
    </div>
    <div class="col-md-6 col-sm-12">
        <button class="btn btn-rounded float-right btn-refresh">Refresh</button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row-card">
                <div class="col-card">
                    <div class="card-content card-one" data-card="JK">
                        <h3 id="text-JK">0</h3>
                        <h6>Justifikasi Kebutuhan</h6>
                    </div>
                </div>
                <div class="col-card">
                    <div class="card-content card-two" data-card="VR">
                        <h3 id="text-VR">0</h3>
                        <h6>Verifikasi</h6>
                    </div>
                </div>
                <div class="col-card">
                    <div class="card-content card-three" data-card="AJK">
                        <h3 id="text-AJK">0</h3>
                        <h6>Approval Justifikasi Kebutuhan</h6>
                    </div>
                </div>
                <div class="col-card">
                    <div class="card-content card-four" data-card="JP">
                        <h3 id="text-JP">0</h3>
                        <h6>Justifikasi Pengadaan</h6>
                    </div>
                </div>
                <div class="col-card">
                    <div class="card-content card-five" data-card="AJP">
                        <h3 id="text-AJP">0</h3>
                        <h6>Aprroval Justifikasi Pengadaan</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-scroll">
                        <table id="table-data" class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 8%;">No Bukti</th>
                                    <th style="width: 28%;">No Dokumen</th>
                                    <th style="width: 4%;">Regional</th>
                                    <th style="width: 8%;">Waktu</th>
                                    <th style="width: 15%;">Kegiatan</th>
                                    <th style="width: 10%;">Nilai</th>
                                    <th style="width: 15%;">Posisi Justifikasi</th>
                                    <th style="width: 15%;">Posisi Pengadaan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function() {
        $.ajax({
            type: "GET",
            url: "{{ url('apv/dash_databox') }}",
            dataType: 'json',
            async:false,
            success: function(res) { 
                var result = res.data
                if(result.status) {
                    $('#text-JK').text(sepNum(result.data.juskeb));
                    $('#text-VR').text(sepNum(result.data.ver));
                    $('#text-AJK').text(sepNum(result.data.appjuskeb));
                    $('#text-JP').text(sepNum(result.data.juspeng));
                    $('#text-AJP').text(sepNum(result.data.appjuspeng));
                }
            }
        });
    })();

    (function() {
        $.ajax({
            type: "GET",
            url: "{{ url('apv/dash_posisi') }}",
            dataType: 'json',
            async:false,
            success: function(res) { 
                var result = res.data
                if(result.status) {
                    var html = "";
                    var background1 = '';
                    var background2 = '';
                    for(var i=0;i<result.data.length;i++) {
                        var data = result.data[i]
                        
                        if(data.progress == 'S'){
                            background1 = "#4286f5";
                        } else if(data.progress == 'R'){
                            background1 = "#e46a76";
                        }else if(data.progress == 'F'){
                            background1 = "#000000";
                        }else{
                            background1 = "#00c292";
                        }

                        if(data.progress2 == 'S'){
                            background2 = "#4286f5";
                        } else if(data.progress2 == 'R'){
                            background2 = "#e46a76";
                        }else if(data.progress2 == 'F'){
                            background2 = "#000000";
                        }else{
                            background2 = "#00c292";
                        }

                        html += `
                            <tr>
                                <td>${data.no_bukti}</td>    
                                <td>${data.no_dokumen}</td>    
                                <td>${data.kode_pp}</td>    
                                <td>${data.waktu}</td>    
                                <td>${data.kegiatan}</td>    
                                <td>${sepNum(data.nilai)}</td>   
                                <td>
                                    <div style='background-color: ${background1};' class='box-label'>
                                        ${data.posisi}
                                    </div>
                                </td> 
                                <td>
                                    <div style='background-color: ${background2};' class='box-label'>
                                        ${data.posisi2}
                                    </div>
                                </td> 
                            </tr>
                        `    
                    }
                    $('#table-data tbody').append(html)
                }
            }
        });
    })();

    function reloadTablePosisi(kode) {
        $.ajax({
            type: "GET",
            url: "{{ url('apv/dash_posisi') }}",
            dataType: 'json',
            async:true,
            data: { param: kode },
            beforeSend: function() {
                $('#table-data tbody').empty()
                $('#table-data tbody').append('<tr><td colspan="8" style="text-align: center;">Memuat data...</td></tr>')
            },
            success: function(res) { 
                var result = res.data
                if(result.status) {
                    $('#table-data tbody').empty()
                    var html = "";
                    var background1 = '';
                    var background2 = '';
                    for(var i=0;i<result.data.length;i++) {
                        var data = result.data[i]
                        
                        if(data.progress == 'S'){
                            background1 = "#4286f5";
                        } else if(data.progress == 'R'){
                            background1 = "#e46a76";
                        }else if(data.progress == 'F'){
                            background1 = "#000000";
                        }else{
                            background1 = "#00c292";
                        }

                        if(data.progress2 == 'S'){
                            background2 = "#4286f5";
                        } else if(data.progress2 == 'R'){
                            background2 = "#e46a76";
                        }else if(data.progress2 == 'F'){
                            background2 = "#000000";
                        }else{
                            background2 = "#00c292";
                        }

                        html += `
                            <tr>
                                <td>${data.no_bukti}</td>    
                                <td>${data.no_dokumen}</td>    
                                <td>${data.kode_pp}</td>    
                                <td>${data.waktu}</td>    
                                <td>${data.kegiatan}</td>    
                                <td>${sepNum(data.nilai)}</td>   
                                <td>
                                    <div style='background-color: ${background1};' class='box-label'>
                                        ${data.posisi}
                                    </div>
                                </td> 
                                <td>
                                    <div style='background-color: ${background2};' class='box-label'>
                                        ${data.posisi2}
                                    </div>
                                </td> 
                            </tr>
                        `    
                    }
                    $('#table-data tbody').append(html)
                }
            }
        });
    }

    $('.card-content').click(function() {
        var kode = $(this).data('card')
        reloadTablePosisi(kode)  
    })
</script>