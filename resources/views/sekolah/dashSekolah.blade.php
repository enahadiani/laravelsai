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
    .filter-btn {
        width: 370px;
        border: 1px solid black;
        font-size: 1rem;
        text-align: left;
    }
    @media only screen and (max-width: 1280px) {
        .filter-btn {
            width: 340px;
        }
    }

    @media only screen and (min-width: 1440px) {
        .filter-btn {
            width: 390px;
        }
    }
    .modal .close {
        margin-right: 28px;
    }
</style>
<div class="row">
    <div class="col-12">
        {{-- <h2 style="position:absolute"><span id="judul-matpel" class="mr-2"></span><span id="judul-kelas"></span></h2> --}}
        <h5 style="position:absolute" class="text-primary">Perkembangan Siswa</h5>
        <a class="btn btn-outline-light float-right bg-primary text-white mb-2 filter-btn" href="#" id="filter-btn"></a>
        <!-- <div class="separator mb-5"></div> -->
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 col-xl-8 col-left" >
        <div class="card bg-primary mb-4" style="height:130px">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-ms-12">
                        <p class="mb-1">Kelas</p>
                        <h5 class="mb-0" style="font-weight:bold" id="kelas"></h5>
                    </div>
                    <div class="col-md-4 col-ms-12">
                        <p class="mb-1">Jumlah Siswa</p>
                        <h5 class="mb-0" style="font-weight:bold" id="jml_siswa"></h5>
                    </div>
                    <div class="col-md-4 col-ms-12">
                        <p class="mb-1">Tahun Ajaran</p>
                        <h5 class="mb-0" style="font-weight:bold" id="tahun_ajaran"></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4" id="content-chart">
            <div class="card-body">
                <h5 style="font-weight:bold;">Kompetensi Dasar</h5>
                <div id="chart-nilai" style="height:250px !important">
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-xl-4 col-right">
        <div class="card" id="content-pesan">
            <div class="card-body" id="content-pesan-header" style="height:130px">
                <h5 style="font-weight:bold;position:absolute;top:25px;">Pesan</h5>
                <a href="#" id="tambah-pesan"><i class="simple-icon-plus text-primary float-right mb-3" style="font-size:20px"></i></a>
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
    <div class="col-12 col-md-8 col-xl-8 col-left" >
        <div class="card" id="content-chart-kkm">
            <div class="card-body">
                <h5 style="font-weight:bold;">Jumlah siswa dibawah KKM</h5>
                <div id="chart-nilai-kkm" style="height:250px !important">
                </div>
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
                        <div class="form-group row" style="display: none;">
                            <label>Kode PP</label>
                            <select class="form-control" data-width="100%" name="inp-filter_kode_pp" id="inp-filter_kode_pp">
                                <option value='#'>Pilih PP</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Tahun Ajaran</label>
                            <select class="form-control" data-width="100%" name="inp-filter_kode_ta" id="inp-filter_kode_ta">
                                <option value='#'>Pilih Tahun Ajaran</option>
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
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Pesan --}}
    <div class="modal fade" id="modalPesan" tabindex="-1" role="dialog"
    aria-labelledby="modalPesan" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header" style="text-align: center;padding:3px !important;display:inline;">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:inline;"><span aria-hidden="true">×</span></button>
                    <h5 style="margin-top:10px;" id="judul-pesan"></h5>
                </div>
                <div class="modal-body">
                    <div id="pesan-content" class="card bg-primary p-2 float-right mb-3" style="min-height: 90px; max-height:auto;width:100%;">
                        
                    </div>
                    <div style="position:relative;margin-bottom:0;margin-left:135px;margin-top:auto;">
                        <button id="modal-tambah-pesan" class="btn btn-outline-light text-primary" style="font-weight: bold;border-radius:50px !important; box-shadow:  10px 10px 45px -13px rgba(0,0,0,0.75); !important;" type="button">Tambah Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Pesan --}}
<script>

// var psdet = document.querySelector('#content-pesan-detail');
// var pspsdet = new PerfectScrollbar(psdet);
var selectTa = $('#inp-filter_kode_ta').selectize();
var selectKelas =  $('#inp-filter_kode_kelas').selectize();
var selectMatpel =  $('#inp-filter_kode_matpel').selectize();
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

function getFilterTA(select,kode_pp) {
    $.ajax({
        type:'GET',
        url:"{{ url('sekolah-dash/filter-tahunajar') }}",
        dataType: 'json',
        data:{kode_pp:kode_pp},
        async: false,
        success: function(result) {
            // var select = $('#inp-filter_kode_ta').selectize();
            select = select[0];
            var control = select.selectize;
            control.clearOptions();
            if(result.status) {
                for(var i=0;i<result.daftar.length;i++){ 
                    control.addOption([{text:result.daftar[i].kode_ta+'-'+result.daftar[i].nama, value:result.daftar[i].kode_ta}]);
                }
                for(var i=0;i<result.daftar.length;i++) {
                    var value = result.daftar[i]
                    if(value.flag_aktif == '1') {
                        control.setValue(value.kode_ta);
                        getFilterKelas(selectKelas,kode_pp,value.kode_ta)
                        break;
                    }
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

function getFilterKelas(select,kode_pp,kode_ta) {
    $.ajax({
        type:'GET',
        url:"{{ url('sekolah-dash/filter-kelas') }}",
        dataType: 'json',
        data: { 
            kode_pp:kode_pp, 
            nik_guru: "{{ Session::get('userLog') }}",
            kode_ta: kode_ta
        },
        async: false,
        success: function(result) {
            
            // var select = $('#inp-filter_kode_kelas').selectize();
            select = select[0];
            var control = select.selectize;
            control.clearOptions();
            if(result.status) {
                
                for(i=0;i<result.daftar.length;i++){ 
                    control.addOption([{text:result.daftar[i].kode_kelas+'-'+result.daftar[i].nama, value:result.daftar[i].kode_kelas}]); 
                }

                control.setValue(result.daftar[0].kode_kelas);
                getFilterMatpel(selectMatpel,kode_pp, result.daftar[0].kode_kelas, kode_ta)
                
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

function getFilterMatpel(select,kode_pp,kode_kelas,kode_ta) {
    $.ajax({
        type:'GET',
        url:"{{ url('sekolah-dash/filter-matpel') }}",
        dataType: 'json',
        data:{ 
            kode_pp: kode_pp,
            kode_kelas: kode_kelas,
            nik_guru: "{{ Session::get('userLog') }}",
            kode_ta: kode_ta
        },
        async: false,
        success: function(result) {
            
            // var select = $('#inp-filter_kode_matpel').selectize();
            select = select[0];
            var control = select.selectize;
            control.clearOptions();
            if(result.status) {
                
                for(i=0;i<result.daftar.length;i++){ 
                    control.addOption([{text:result.daftar[i].kode_matpel+'-'+result.daftar[i].nama, value:result.daftar[i].kode_matpel}]); 
                }

                
                control.setValue(result.daftar[0].kode_matpel);
                
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
    // getFilterKelas("{{ Session::get('kodePP') }}");
    // getFilterMatpel("{{ Session::get('kodePP') }}");
    getFilterTA(selectTa,"{{ Session::get('kodePP') }}");
}

$('#form-filter').on('change','#inp-filter_kode_pp',function(e){
    var kode_pp = $(this).val();
    getFilterKelas(selectKelas,kode_pp);
    getFilterMatpel(selectMatpel,kode_pp);
    getFilterTA(selectTa,kode_pp);
});

$('#form-filter').on('change','#inp-filter_kode_ta',function(e){
    var kode_pp = $('#inp-filter_kode_pp')[0].selectize.getValue();
    var kode_ta = $(this).val();
    getFilterKelas(selectKelas,kode_pp, kode_ta);
});

$('#form-filter').on('change','#inp-filter_kode_kelas',function(e){
    var kode_pp = $('#inp-filter_kode_pp')[0].selectize.getValue();
    var kode_kelas = $(this).val();
    var kode_ta = $('#inp-filter_kode_ta')[0].selectize.getValue();
    getFilterMatpel(selectMatpel,kode_pp,kode_kelas,kode_ta);
});

function getNilaiRatarata(kode_pp=null,kode_kelas,kode_matpel,kode_ta){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-dash/rata2-nilai-dashboard') }}",
        dataType:"JSON",
        data:{kode_pp:kode_pp,kode_kelas:kode_kelas,kode_matpel:kode_matpel,kode_ta:kode_ta},
        success:function(result){
            Highcharts.chart('chart-nilai', {
                title: {
                    text: null
                },
                xAxis: {
                    categories: result.data.ctg
                },

                yAxis: {
                    title: {
                        text: "Nilai"
                    },
                     min: 0,
                     startOnTick: false
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    crosshairs: true,
                    shared: true,
                },
                legend:{
                    enabled:false
                },
                series: [
                    {
                        name: 'Nilai Rata-rata',
                        data: result.data.avg,
                        zIndex: 1,
                        marker: {
                            fillColor: 'white',
                            lineWidth: 2,
                            lineColor: Highcharts.getOptions().colors[0]
                        }
                    },
                    {
                        name: 'Range Nilai',
                        data: result.data.range,
                        type: 'arearange',
                        lineWidth: 0,
                        linkedTo: ':previous',
                        color: Highcharts.getOptions().colors[0],
                        fillOpacity: 0.3,
                        zIndex: 0,
                        marker: {
                            enabled: false
                        }
                    }
                ]
            })
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

function getHistoryPesan(kode_pp,kode_kelas,kode_matpel,kode_ta){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-dash/pesan-history') }}",
        dataType:"JSON",
        data:{kode_pp:kode_pp,kode_kelas:kode_kelas,kode_matpel:kode_matpel,kode_ta:kode_ta},
        success:function(res){
            var result = res.data;
            var html = '';
            if(result.status){
                if(result.data.length > 0){
                    for(var i=0; i < result.data.length; i++){
                        var line = result.data[i];
                        html +=`<div id="isi-pesan" class="d-flex flex-row mb-3 border-bottom justify-content-between" data-judul="${line.judul}" data-pesan="${line.pesan}">
                            <a href="#">
                            <img src="{{ asset('asset_elite/images/user.png') }}" alt="`+line.nama+`" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="pl-3 flex-grow-1">
                                <a href="#">
                                <p class="font-weight-medium mb-0 ">`+line.nama+`</p>
                                <label class="text-muted mb-0">`+line.tgl+` `+line.jam+`</label>
                                </a>
                                <p class="mt-3">
                                `+line.pesan+`
                                </p>
                            </div>
                        </div>`;
                    }
                }
            }  else {
                html += `<div style="text-align: center;">
                    <p class="text-muted mb-0" style="text-align: center;" >Tidak Ada Pesan</p>
                </div>`
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
                $('#jml_siswa').html(result.siswa);
                $('#kelas').html(kode_kelas);
            }
        }
    });
}

function getTahunAjaran(kode_pp){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-master/tahun-ajaran') }}",
        dataType:"JSON",
        data:{kode_pp:kode_pp},
        success:function(res){
            var result = res.daftar;
            if(res.status){
                var tahun_ajaran = result[result.length - 1].kode_ta;
                $('#tahun_ajaran').html(tahun_ajaran)
            }
        }
    });
}

function getDibawahKKM(kode_pp=null,kode_kelas,kode_matpel) {
    $.ajax({
      type:"GET",
      url:"{{ url('sekolah-dash/dibawah-nilai-kkm') }}",
      dataType:"JSON",
      data:{kode_pp:kode_pp,kode_kelas:kode_kelas,kode_matpel:kode_matpel,kode_ta:"2020/2021",kode_sem:"1"},
      success: function(res) {
          var result = res.data;
          Highcharts.chart('chart-nilai-kkm', {
            chart: {
                type: 'column',
                events:{
                    load: function() {
                        Highcharts.each(this.series[0].points, function(p){
                            if(p.y < 5) {
                                p.update({
                                    color:'#DF212A',
                                })
                            } else {
                                p.update({
                                    color:'#10156f',
                                })
                            }
                        })
                    }
                }
            },
            title: {
                text: null
            },
            subtitle: {
                text: null
            },
            credits:{
                enabled:false
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                categories: result.ctg,
                crosshair: true
            },
            yAxis: {
                title: {
                    text: 'Presentase'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                },
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            },
            series: [
                {
                    name: "KKM",
                    colorByPoint: false,
                    data: result.data
                }
            ]
        });
      }  
    })
}

// FILTER
$('#modalFilter').on('submit','#form-filter',function(e){
    e.preventDefault();
    var icon = '<i class="simple-icon-arrow-down" style="float:right;right:0;margin-top:3px;"></i>';
    var kode_pp = $('#inp-filter_kode_pp')[0].selectize.getValue();
    var kode_kelas = $('#inp-filter_kode_kelas')[0].selectize.getValue();
    var kode_matpel = $('#inp-filter_kode_matpel')[0].selectize.getValue();
    var kode_ta = $('#inp-filter_kode_ta')[0].selectize.getValue();
    var nama_kelas = $('#inp-filter_kode_kelas option:selected').text().split("-");
    var nama_matpel = $('#inp-filter_kode_matpel option:selected').text().split("-");
    var nama_ta = $('#inp-filter_kode_ta option:selected').text().split("-");
    nama_kelas = nama_kelas[0];
    nama_matpel = nama_matpel[1];
    nama_ta = nama_ta[0];
    $('#filter-btn').html(`${nama_matpel} ${nama_kelas} ${icon}`);
    $('#judul-kelas').html(nama_kelas);
    $('#judul-matpel').html(nama_matpel);
    $('#tahun_ajaran').html(nama_ta)

    getHistoryPesan(kode_pp,kode_kelas,kode_matpel,kode_ta);
    getNilaiRatarata(kode_pp,kode_kelas,kode_matpel,kode_ta);
    getDataBox(kode_pp,kode_kelas,kode_matpel);
    getDibawahKKM(kode_pp,kode_kelas,kode_matpel);
    getTahunAjaran(kode_pp)
    $('#modalFilter').modal('hide');
});

$('#tambah-pesan').click(function(){
    $('.body-content').load("{{url('sekolah-auth/form/fPesan')}}");
})

$('#modalPesan').on('click','#modal-tambah-pesan',function(){
    $('.body-content').load("{{url('sekolah-auth/form/fPesan')}}");
    $('#modalPesan').modal('hide');
})

$('#content-pesan').on('click',' #content-pesan-detail > #isi-pesan', function() {
    var judul = $(this).data('judul');
    var pesan = $(this).data('pesan');
    $('#modalPesan #judul-pesan').text(judul)
    $('#modalPesan #pesan-content').text(pesan)
    $('#modalPesan').modal('show');
})

$('#btn-reset').click(function(e){
    e.preventDefault();
    $('#inp-filter_kode_pp')[0].selectize.setValue('');
    $('#inp-filter_kode_ta')[0].selectize.setValue('');
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
$('#btn-tampil').click(function(e){
    e.preventDefault();
    var icon = '<i class="simple-icon-arrow-down" style="float:right;right:0;margin-top:3px;"></i>';
    var kode_pp = $('#inp-filter_kode_pp')[0].selectize.getValue();
    var kode_kelas = $('#inp-filter_kode_kelas')[0].selectize.getValue();
    var kode_matpel = $('#inp-filter_kode_matpel')[0].selectize.getValue();
    var kode_ta = $('#inp-filter_kode_ta')[0].selectize.getValue();
    var nama_kelas = $('#inp-filter_kode_kelas option:selected').text().split("-");
    var nama_matpel = $('#inp-filter_kode_matpel option:selected').text().split("-");
    var nama_ta = $('#inp-filter_kode_ta option:selected').text().split("-");
    nama_kelas = nama_kelas[0];
    nama_matpel = nama_matpel[1];
    nama_ta = nama_ta[0];
    $('#filter-btn').html(`${nama_matpel} ${nama_kelas} ${icon}`);
    $('#judul-kelas').html(nama_kelas);
    $('#judul-matpel').html(nama_matpel);
    $('#tahun_ajaran').html(nama_ta)

    getHistoryPesan(kode_pp,kode_kelas,kode_matpel,kode_ta);
    getNilaiRatarata(kode_pp,kode_kelas,kode_matpel,kode_ta);
    getDataBox(kode_pp,kode_kelas,kode_matpel);
    getDibawahKKM(kode_pp,kode_kelas,kode_matpel);
    getTahunAjaran(kode_pp)
    $('#modalFilter').modal('hide');
});
</script>