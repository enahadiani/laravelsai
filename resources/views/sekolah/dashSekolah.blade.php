<style>
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .btn-outline-light {
        color: #131113;
        background-color: white;
        border-color: white !important;
        box-shadow: 2px 1px 2px 1px #e8e8e8 !important;
    }
</style>
<div class="row">
    <div class="col-12">
        <h2 style="position:absolute"><span id="judul-matpel" class="mr-2"></span><span id="judul-kelas"></span></h2>
        <a class="btn btn-outline-light float-right mb-2" href="#" id="filter-btn" style="border:1px solid black;font-size:1rem"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
        <!-- <div class="separator mb-5"></div> -->
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 col-xl-8 col-left" >
        <div class="card mb-4" id="content-chart">
            <div class="card-body">
                <h5 style="font-weight:bold;">Overview Nilai Rata-rata</h5>
                <div id="chart-nilai" style="height:250px !important">
                </div>
            </div>
        </div>
        <div class="card bg-primary" style="height:130px">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-ms-12">
                        <p class="mb-1">Murid</p>
                        <h2 class="mb-0" style="font-weight:bold" id="siswa"></h2>
                    </div>
                    <div class="col-md-4 col-ms-12">
                        <p class="mb-1">Siswa tidak mendapat nilai</p>
                        <h2 class="mb-0" style="font-weight:bold" id="siswa_tdk"></h2>
                    </div>
                    <div class="col-md-4 col-ms-12">
                        <p class="mb-1">Pelaksanaan tidak lengkat</p>
                        <h2 class="mb-0" style="font-weight:bold" id="pelaksanaan"></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-xl-4 col-right">
        <div class="card" id="content-pesan">
            <div class="card-body" id="content-pesan-header" style="height:130px">
                <h5 style="font-weight:bold;position:absolute">Pesan</h5>
                <a href="#"><i class="simple-icon-plus text-primary float-right mb-3" style="font-size:20px"></i></a>
                <input class="form-control" type="text" placeholder="Cari siswa atau kelas" >    
            </div>
            <div class="card-body pt-0 scroll" id="content-pesan-detail">
                <!-- <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                    <a href="#">
                    <img src="{{ asset('asset_elite/images/user.png') }}" alt="Mayra Sibley" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall">
                    </a>
                    <div class="pl-3 flex-grow-1">
                        <a href="#">
                        <p class="font-weight-medium mb-0 ">Mayra Sibley</p>
                        <p class="text-muted mb-0 text-small">01/01/2020 13:52:00</p>
                        </a>
                        <p class="mt-3">
                        Taking seamless key performance indicators
                        offline to maximise the long tail.
                        </p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>  
       
</div>
 <!-- MODAL FILTER -->
 <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row">
                            <label>Kode PP</label>
                            <select class="form-control" data-width="100%" name="inp-filter_kode_pp" id="inp-filter_kode_pp">
                                <option value='#'>Pilih PP</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Kode Kelas</label>
                            <select class="form-control" data-width="100%" name="inp-filter_kode_kelas" id="inp-filter_kode_kelas">
                                <option value='#'>Pilih Kelas</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Mata Pelajaran</label>
                            <select class="form-control" data-width="100%" name="inp-filter_kode_matpel" id="inp-filter_kode_matpel">
                                <option value='#'>Pilih Matpel</option>
                            </select>
                        </div>
                        <!-- <div class="form-group row">
                            <label>Status</label>
                            <select class="form-control" data-width="100%" name="inp-filter_status" id="inp-filter_status">
                                <option value='#'>Pilih Status</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>

// var psdet = document.querySelector('#content-pesan-detail');
// var pspsdet = new PerfectScrollbar(psdet);

function sepNum(x){
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            var x = parseFloat(x).toFixed(2);
            // console.log(x);
            var tmp = x.toString().split('.');
            // console.dir(tmp);
            var y = tmp[1].substr(0,2);
            var z = tmp[0]+'.'+y;
            var parts = z.split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }else{
        return 0;
    }
}
function sepNumPas(x){
    var num = parseInt(x);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
}

setHeightDash();

function getFilterPP() {
    $.ajax({
        type:'GET',
        url:"{{ url('sekolah-master/pp') }}",
        dataType: 'json',
        async: false,
        success: function(result) {
            
            var select = $('#inp-filter_kode_pp').selectize();
            select = select[0];
            var control = select.selectize;
            control.clearOptions();
            if(result.status) {
                
                for(i=0;i<result.daftar.length;i++){ 
                    control.addOption([{text:result.daftar[i].kode_pp+'-'+result.daftar[i].nama, value:result.daftar[i].kode_pp}]);
                    
                }

                if("{{ Session::get('kodePP') }}" != ""){
                    control.setValue("{{ Session::get('kodePP') }}");
                }
                
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/sekolah-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

function getFilterKelas(kode_pp) {
    $.ajax({
        type:'GET',
        url:"{{ url('sekolah-report/filter-kelas') }}",
        dataType: 'json',
        data:{kode_pp:kode_pp},
        async: false,
        success: function(result) {
            
            var select = $('#inp-filter_kode_kelas').selectize();
            select = select[0];
            var control = select.selectize;
            control.clearOptions();
            if(result.status) {
                
                for(i=0;i<result.daftar.length;i++){ 
                    control.addOption([{text:result.daftar[i].kode_kelas+'-'+result.daftar[i].nama, value:result.daftar[i].kode_kelas}]); 
                }

                control.setValue('3A');
                
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/sekolah-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

function getFilterMatpel(kode_pp,kode_kelas=null) {
    $.ajax({
        type:'GET',
        url:"{{ url('sekolah-report/filter-matpel') }}",
        dataType: 'json',
        data:{kode_pp:kode_pp,kode_kelas:kode_kelas},
        async: false,
        success: function(result) {
            
            var select = $('#inp-filter_kode_matpel').selectize();
            select = select[0];
            var control = select.selectize;
            control.clearOptions();
            if(result.status) {
                
                for(i=0;i<result.daftar.length;i++){ 
                    control.addOption([{text:result.daftar[i].kode_matpel+'-'+result.daftar[i].nama, value:result.daftar[i].kode_matpel}]); 
                }

                
                control.setValue('MTK');
                
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/sekolah-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

getFilterPP();
if("{{ Session::get('kodePP') }}" != ""){
    getFilterKelas("{{ Session::get('kodePP') }}");
    getFilterMatpel("{{ Session::get('kodePP') }}");
}

$('#form-filter').on('change','#inp-filter_kode_pp',function(e){
    var kode_pp = $(this).val();
    getFilterKelas(kode_pp);
    getFilterMatpel(kode_pp);
});

$('#form-filter').on('change','#inp-filter_kode_kelas',function(e){
    var kode_pp = $('#inp-filter_kode_pp')[0].selectize.getValue();
    var kode_kelas = $('#inp-filter_kode_kelas')[0].selectize.getValue();
    getFilterMatpel(kode_pp,kode_kelas);
});

function getNilaiRatarata(kode_pp=null,kode_kelas,kode_matpel){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-dash/rata2-nilai') }}",
        dataType:"JSON",
        data:{kode_pp:kode_pp,kode_kelas:kode_kelas,kode_matpel:kode_matpel},
        success:function(result){
            Highcharts.chart('chart-nilai', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                xAxis: {
                    categories:result.data.ctg
                },
                plotOptions: {
                    spline: {
                        dataLabels: {
                            enabled: true,
                            formatter: function () {
                                return '<b>'+sepNumPas(this.y)+'</b>';
                            }
                        },
                        enableMouseTracking: false
                    },
                    column: {
                        dataLabels: {
                            padding:0,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'none',
                            formatter: function () {
                                return '<b>'+sepNumPas(this.y)+'</b>';
                            }
                        },
                        enableMouseTracking: false
                    }
                },
                series: result.data.series
            });

        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getHistoryPesan(kode_pp,kode_kelas,kode_matpel){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-dash/pesan-history') }}",
        dataType:"JSON",
        data:{kode_pp:kode_pp,kode_kelas:kode_kelas,kode_matpel:kode_matpel},
        success:function(res){
            var result = res.data;
            var html = '';
            if(result.status){
                if(result.data.length > 0){
                    for(var i=0; i < result.data.length; i++){
                        var line = result.data[i];
                        html +=`<div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                            <a href="#">
                            <img src="{{ asset('asset_elite/images/user.png') }}" alt="`+line.nama+`" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="pl-3 flex-grow-1">
                                <a href="#">
                                <p class="font-weight-medium mb-0 ">`+line.nama+`</p>
                                <p class="text-muted mb-0 text-small">`+line.tgl+` `+line.jam+`</p>
                                </a>
                                <p class="mt-3">
                                `+line.pesan+`
                                </p>
                            </div>
                        </div>`;
                    }
                }
            }
            $('#content-pesan-detail').html(html);
        }
    });
}

function getDataBox(kode_pp,kode_kelas,kode_matpel){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-dash/data-box') }}",
        dataType:"JSON",
        data:{kode_pp:kode_pp,kode_kelas:kode_kelas,kode_matpel:kode_matpel},
        success:function(res){
            var result = res.data;
            if(result.status){
                $('#siswa').html(result.siswa);
                $('#siswa_tdk').html(result.siswa_tdk);
                $('#pelaksanaan').html(result.pelaksanaan);
            }
        }
    });
}

// FILTER
$('#modalFilter').on('submit','#form-filter',function(e){
    e.preventDefault();
    var kode_pp = $('#inp-filter_kode_pp')[0].selectize.getValue();
    var kode_kelas = $('#inp-filter_kode_kelas')[0].selectize.getValue();
    var kode_matpel = $('#inp-filter_kode_matpel')[0].selectize.getValue();
    var nama_kelas = $('#inp-filter_kode_kelas option:selected').text().split("-");
    nama_kelas = nama_kelas[1];
    var nama_matpel = $('#inp-filter_kode_matpel option:selected').text().split("-");
    nama_matpel = nama_matpel[1];
    $('#judul-kelas').html(nama_kelas);
    $('#judul-matpel').html(nama_matpel);
    getHistoryPesan(kode_pp,kode_kelas,kode_matpel);
    getNilaiRatarata(kode_pp,kode_kelas,kode_matpel);
    getDataBox(kode_pp,kode_kelas,kode_matpel);
    $('#modalFilter').modal('hide');
});

$('#btn-reset').click(function(e){
    e.preventDefault();
    $('#inp-filter_kode_pp')[0].selectize.setValue('');
    $('#inp-filter_status')[0].selectize.setValue('');
    jumFilter();
});

$('#filter-btn').click(function(){
    $('#modalFilter').modal('show');
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    $('#modalFilter').modal('hide');
});

$('#btn-tampil').click();
</script>