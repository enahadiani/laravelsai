<link rel="stylesheet" href="{{ asset('dash-asset/dash-java/dash-perusahaan-dekstop.css') }}" />
<div class="row">
    <div class="col-md-6 col-sm-6">
        <h6 class="text-bold">Project <span id="pp-text" style="font-size:1rem !important"></span></h6>
        <p id="periode-text">Periode </p>
    </div>
    <div class="col-md-6 col-sm-6">
        <button id="button-filter" class="btn btn-filter">Filter</button>
        <button id="button-back" class="btn btn-back">Back</button>
    </div>
</div>

<section id="dekstop-baris-ke-1" class="dasboard-ke-1 col-dekstop pb-3">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <div class="card-project">
                    <h6 class="pt-4 pl-4 text-white">Project</h6>
                    <h4 class="pt-1 pl-4 text-white" id="project-total">0</h4>
                </div>
                <div class="keterangan-card">
                    <div class="row keterangan-container">
                        <div class="col-md-9 col-sm-9 col-lg-9">
                            <div class="keterangan">
                                <div class="accepted"></div>
                                <span class="pl-2">Selesai</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3">
                            <span class="text-bold" id="project-selesai">0</span>
                        </div>
                    </div>
                </div>
                <div class="keterangan-card">
                    <div class="row keterangan-container">
                        <div class="col-md-9 col-sm-9 col-lg-9">
                            <div class="keterangan">
                                <div class="running"></div>
                                <span class="pl-2">Berjalan</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3">
                            <span class="text-bold" id="project-berjalan">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <div class="card-pendapatan">
                    <h6 class="pt-4 pl-4 text-white">Pendapatan</h6>
                    <h4 class="pt-1 pl-4 text-white" id="pdpt_total">0</h4>
                </div>
                <div class="keterangan-card">
                    <div class="row keterangan-container">
                        <div class="col-md-8 col-sm-8 col-lg-8">
                            <div class="keterangan">
                                <div class="accepted"></div>
                                <span class="pl-2">Diterima</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <span class="text-bold pr-2" id="pdpt_terima">0</span>
                        </div>
                    </div>
                </div>
                <div class="keterangan-card">
                    <div class="row keterangan-container">
                        <div class="col-md-8 col-sm-8 col-lg-8">
                            <div class="keterangan">
                                <div class="running"></div>
                                <span class="pl-2">Piutang</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <span class="text-bold pr-2" id="pdpt_piutang">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <div class="card-beban">
                    <h6 class="pt-4 pl-4 text-white">Beban</h6>
                    <h4 class="pt-1 pl-4 text-white" id="beban_total">0</h4>
                </div>
                <div class="keterangan-card">
                    <div class="row keterangan-container">
                        <div class="col-md-8 col-sm-8 col-lg-8">
                            <div class="keterangan">
                                <div class="accepted"></div>
                                <span class="pl-2">Terbayar</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <span class="text-bold pr-2" id="beban_terbayar">0</span>
                        </div>
                    </div>
                </div>
                <div class="keterangan-card">
                    <div class="row keterangan-container">
                        <div class="col-md-8 col-sm-8 col-lg-8">
                            <div class="keterangan">
                                <div class="running"></div>
                                <span class="pl-2">Belum Terbayar</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <span class="text-bold pr-2" id="beban_belum_bayar">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <h6 class="pt-4 pl-4">Profit</h6>
                <h1 class="pt-1 pl-4 text-bold profit-percentage" id="profit-percentage">0%</h1>
                <h5 class="pl-4 text-bold profit-amount" id="profit-amount">0 M</h5>
                <p class="pl-4 text-secondary">Naik <span id="naik"></span> % vs tahun lalu</p>
            </div>
        </div>
    </div>
</section>

<section id="dekstop-baris-ke-2" class="dasboard-ke-2 col-dekstop pb-1" style="display: none;">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card card-dash-default pt-4 pl-4 pr-2">
                <h6 class="text-bold">Project Aktif</h6>
                <div class="table-scroll">
                    <table class="table table-borderless table-striped table-hover mt-1 ml--1" id="project-active">
                        <thead>
                            <tr>
                                <th width='30'>No</th>
                                <th width='80'>Kode PP</th>
                                <th width='150'>Nama PP</th>
                                <th width='80'>Kode Proyek</th>
                                <th width='200'>Nama Proyek</th>
                                <th width='150'>No Kontrak</th>
                                <th width='100'>Jenis</th>
                                <th width='60'>Tgl Mulai</th>
                                <th width='60'>Tgl Selesai</th>
                                <th width='80'>Progress</th>
                                <th width='80'>Status</th>
                                <th width='200'>Customer</th>
                                <th width='90'>Nilai Kontrak</th>
                                <th width='90'>Nilai RAB</th>
                                <th width='90'>Cash Out</th>
                                <th width='90'>Saldo BDD</th>
                                <th width='90'>Reklas ke Biaya</th>
                                <th width='110'>Sisa Saldo BDD</th>
                                <th width='90'>Saldo RAB</th>
                                <th width='90'>Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="detail">
    <section id="dekstop-detail-baris-ke-1" class="dasboard-ke-1 col-dekstop pb-1">
        <div class="row">
            <div class="col-md-8 com-sm-8 col-lg-8">
                <div class="card card-dash-detail-row-1">
                    <h6 class="pl-4 pt-4 text-bold" id="customer-name">PT Konsumen Proyek</h6>
                    <p class="text-secondary pl-4 pr-4 pt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="card card-dash-detail-row-1">
                    <h6 class="pl-4 pt-4 text-bold">Keuangan Proyek</h6>
                    <div class="pl-4 pr-4 list-keuangan-proyek">
                        <span>Nilai Project</span>
                        <span id="project-amount">0</span>
                    </div>
                    <div class="pl-4 pr-4 list-keuangan-proyek">
                        <span>Tanggal Selesai</span>
                        <span id="date-finish">0</span>
                    </div>
                    <div class="pl-4 pr-4 list-keuangan-proyek">
                        <span>Budget</span>
                        <span id="budget">0</span>
                    </div>
                    <div class="pl-4 pr-4 list-keuangan-proyek">
                        <span>Actual</span>
                        <span id="actual">0</span>
                    </div>
                    <div class="pl-4 pr-4 list-keuangan-proyek">
                        <span>Profit</span>
                        <span id="profit">0</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="dekstop-detail-baris-ke-2" class="dasboard-ke-2 col-dekstop pb-1 mt-1">
        <div class="row">
            <div class="col-md-8 com-sm-8 col-lg-8">
                <div class="card card-dash-detail-row-2 pt-4 pl-4 pr-2">
                    <h6 class="text-bold">Pembayaran Supplier</h6>
                    <div style="height: 430px;overflow: auto;">
                        <table class="table table-borderless table-striped table-hover ml--1" id="table-supplier">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No Doc</th>
                                    <th>Uraian Pekerjaan</th>
                                    <th>Supplier</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="card card-dash-detail-row-2 pt-4 pl-4 pr-2">
                    <h6 class="text-bold">Detail Kegiatan</h6>
                    <div class="list-kegiatan-container pt-1 pr-4">
                        <span class="text-secondary">05/03/21</span>
                        <div class="card-list-kegiatan pl-4 pt-3">
                            <h6 class="text-white">12.000.000</h6>
                            <p class="text-white">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                        </div>
                    </div>
                    <div class="list-kegiatan-container pr-4">
                        <span class="text-secondary">23/02/21</span>
                        <div class="card-list-kegiatan pl-4 pt-3">
                            <h6 class="text-white">10.000.000</h6>
                            <p class="text-white">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                        </div>
                    </div>
                    <div class="list-kegiatan-container pr-4">
                        <span class="text-secondary">04/02/21</span>
                        <div class="card-list-kegiatan pl-4 pt-3">
                            <h6 class="text-white">1.000.000</h6>
                            <p class="text-white">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="dekstop-detail-baris-ke-3" class="dasboard-ke-3 col-dekstop pb-1 mt-1">
        <div class="row">
            <div class="col-md-8 com-sm-8 col-lg-8">
                <div class="card card-dash-default pt-4 pl-4 pr-2">
                    <h6 class="text-bold">Pembayaran Customer</h6>
                    <table class="table table-borderless table-striped table-hover ml--1" id="table-customer">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>No Doc</th>
                                <th>Uraian Pekerjaan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Modal Filter --}}
<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"aria-labelledby="modalFilter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-filter">
                <div class="modal-header pb-0" style="border:none">
                    <h6 class="modal-title pl-0">Filter</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 25px !important;right: -10px !important;">
                        <span aria-hidden="true" style="">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none">
                    <div class="form-group">
                        <label for="kode_pp">Lokasi PP</label>
                        <select name="kode_pp" id="kode_pp" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <select name="periode" id="periode" class="form-control"></select>
                    </div>
                </div>
                <div class="modal-footer" style="border:none">
                    <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                    <button type="button" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    $('#detail').hide();
    $('#button-back').hide();
    $('#dekstop-baris-ke-1').show()
    $('#dekstop-baris-ke-2').show()
    var $initialPeriode = "{{ date('Ym') }}";
    var $initialPP = "00";
    var $periodeText = '';
    var $periode = '';
    $('#button-filter').click(function(){
        $('#modalFilter').modal('show');
    })

    function toMilyar(x) {
        var nil = x / 1000000000;
        return sepNumKoma(nil,2) + ' M';
    }

    function toJuta(x) {
        var nil = x / 1000000;
        return sepNum(nil) + ' Jt';
    }

    var $data_pp = {};
    $.ajax({
        type: 'GET',
        url: "{{ url('bangtel-dash/pp') }}",
        dataType: 'json',
        async:false,
        success:function(result){  
            var select = $("#kode_pp").selectize();
            select = select[0];
            var control = select.selectize;

            $.each(result.data, function(index, item){
                control.addOption([{text:item.nama, value:item.kode_pp}]);
                
            });
            $data_pp = result.data; 
            control.addOption([{text:"Semua", value:""}]);  
            control.setValue("");
            $('#pp-text').text("Semua");
            getProjectDashboard();
            getProjectAktif();
            getProfitDashboard();
            getBebanDashboard();
            getPendapatanDashboard();
        }
    });

    $.ajax({
        type: 'GET',
        url: "{{ url('bangtel-dash/periode') }}",
        dataType: 'json',
        async:false,
        success:function(result){    
            var select = $("#periode").selectize();
            select = select[0];
            var control = select.selectize;

            $.each(result.data, function(index, item){
                control.addOption([{text:item.nama, value:item.periode}]);
            })    
            var filter = result.data.filter(function(data){
                return data.periode == $initialPeriode
            });

            if(filter.length > 0) {
                control.setValue($initialPeriode);
                // getProjectDashboard($initialPeriode)
                // getProfitDashboard($initialPeriode)
                // getProjectAktif($initialPeriode)
                $periodeText = namaPeriode($initialPeriode)
            } else {
                $initialPeriode = result.data[0].periode;
                $periodeText = namaPeriode(result.data[0].periode)
                control.setValue(result.data[0].periode)
                // getProjectDashboard(result.data[0].value)
                // getProfitDashboard(result.data[0].value)
                // getProjectAktif(result.data[0].value)
            }
            $('#periode-text').text('Periode '+$periodeText)
        }
    });

    $('#project-active tbody tr').on('click', function(){
        var countTd = $(this).children('td').length;
        if(countTd <= 1) {
            return;
        } else {
            var customer = $(this).find('td').eq(0).html()
            var no_proyek = $(this).find('td').eq(1).html()
            var selesai = $(this).find('td').eq(2).html()
            var kontrak = $(this).find('td').eq(3).html()
            var anggaran = $(this).find('td').eq(4).html()
            var beban = $(this).find('td').eq(5).html()
            var profit = $(this).find('td').eq(7).html()
            var kode_cust = $(this).find('td').eq(8).html()
            getDetail(no_proyek, customer, kontrak, selesai, anggaran, beban, profit, kode_cust)
            $('#dekstop-baris-ke-1').hide()
            $('#dekstop-baris-ke-2').hide()
            $('#detail').show()
            $('#button-back').show();
        }
    })

    $('#button-back').on('click', function() {
        $('#detail').hide()
        $('#button-back').hide();
        $('#dekstop-baris-ke-1').show()
        $('#dekstop-baris-ke-2').show()
    })

    function sepNumKoma(x,digit){
        if(!isNaN(x)){
            if (typeof x === undefined || !x || x == 0) { 
                return 0;
            }else if(!isFinite(x)){
                return 0;
            }else{
                var x = parseFloat(x).toFixed(digit);
                // console.log(x);
                var tmp = x.toString().split('.');
                // console.dir(tmp);
                if(tmp[1] != undefined){

                    var y = tmp[1].substr(0,2);
                    var z = tmp[0]+'.'+y;
                }else{
                    var z = tmp[0];
                }
                var parts = z.split('.');
                parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
                return parts.join(',');
            }
        }else{
            return 0;
        }
    }

    function getDetail(proyek, customer, nilai_proyek, tgl_selesai, budget, actual, profit, kode_cust) {
        $('#customer-name').text(customer)
        $('#project-amount').text(nilai_proyek)
        $('#date-finish').text(tgl_selesai)
        $('#budget').text(budget)
        $('#actual').text(actual)
        $('#profit').text(profit)

        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/project-detail-supplier') }}",
            dataType: 'json',
            data: { proyek: proyek },
            async:false,
            success:function(result){ 
                $('#table-supplier tbody').empty() 
                var data = result.data.data
                var html = "";
                var no = 1;
                for(var i=0;i<data.length;i++) {
                    var line = data[i]
                    var status = ''
                    if(line.status == 1) {
                        status = 'Lunas'
                    } else {
                        status = 'Belum Lunas'
                    }

                    html += "<tr>"
                    html += "<td>"+no+"</td>"
                    html += "<td>"+line.tanggal+"</td>"
                    html += "<td>"+line.no_dokumen+"</td>"
                    html += "<td>"+line.keterangan+"</td>"
                    html += "<td>"+line.nama+"</td>"
                    html += "<td>-</td>"
                    html += "<td>"+status+"</td>"
                    html += "</tr>"

                    no++
                }
                $('#table-supplier tbody').append(html)
            }
        });

        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/project-detail-customer') }}",
            dataType: 'json',
            data: { customer: kode_cust },
            async:false,
            success:function(result){  
                $('#table-customer tbody').empty()
                var data = result.data.data
                var html = "";
                var no = 1;
                if(data.length == 0) {
                    html += "<tr>"
                    html += "<td colspan='5' style='text-align:center;'>Tidak ada data</td>"
                    html += "</tr>"
                } else {
                    for(var i=0;i<data.length;i++) {
                        var line = data[i]

                        html += "<tr>"
                        html += "<td>"+no+"</td>"
                        html += "<td>"+line.tanggal+"</td>"
                        html += "<td>"+line.no_dokumen+"</td>"
                        html += "<td>"+line.keterangan+"</td>"
                        html += "<td>-</td>"
                        html += "</tr>"

                        no++
                    }
                }
                $('#table-customer tbody').append(html)
            }
        });
    }

    function getProfitDashboard(kode_pp=null) {
        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/profit-box') }}",
            dataType: 'json',
            data: { kode_pp: kode_pp },
            async:false,
            success:function(result){  
                var data = result.data[0]  
                var profit = parseInt(data.pdpt) - parseInt(data.beban)
                var persentase = 0;
                if(profit == 0) {
                    persentase = 0
                } else {
                    persentase = (profit/parseInt(data.pdpt))*100
                }
                if(profit.toString().length <= 9) {
                    profit = toJuta(profit)
                } else {
                    profit = toMilyar(profit)
                }
                $('#profit-percentage').text(format_number(persentase)+'%')
                $('#profit-amount').text(profit)
                // $('#project-berjalan').text(format_number(data.proyek_berjalan))
            }
        });
    }

    function getProjectDashboard(kode_pp=null) {
        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/project-box') }}",
            dataType: 'json',
            data: { kode_pp: kode_pp },
            async:false,
            success:function(result){  
                if(result.data.length > 0){   
                    var data = result.data[0]
                    $('#project-total').text(format_number(data.total))
                    $('#project-selesai').text(format_number(data.selesai))
                    $('#project-berjalan').text(format_number(data.berjalan))
                }
            }
        });
    }

    function getPendapatanDashboard(kode_pp=null) {
        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/pdpt-box') }}",
            dataType: 'json',
            data: { kode_pp: kode_pp },
            async:false,
            success:function(result){   
                if(result.data.length > 0){ 
                    var data = result.data[0]
                    $('#pdpt_total').text(toMilyar(data.pdpt))
                    $('#pdpt_terima').text(toMilyar(data.diterima))
                    $('#pdpt_piutang').text(toMilyar(data.piutang))
                }
            }
        });
    }

    function getBebanDashboard(kode_pp=null) {
        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/beban-box') }}",
            dataType: 'json',
            data: { kode_pp: kode_pp },
            async:false,
            success:function(result){ 
                if(result.data.length > 0){

                    var data = result.data[0];
                    
                    $('#beban_total').text(toMilyar(data.beban))
                    $('#beban_terbayar').text(toMilyar(data.terbayar))
                    $('#beban_belum_bayar').text(toMilyar(data.belum_bayar))
                }   
            }
        });
    }

    function getProjectAktif(kode_pp=null) {
        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/project-aktif') }}",
            dataType: 'json',
            data: { kode_pp: kode_pp },
            async:false,
            success:function(result){    
                var data = result.data;
                var html = ""
                if(data.length == 0) {
                    html += "<tr>"
                    html += "<td colspan='20' style='text-align:center;'>Tidak ada data</td>"
                    html += "</tr>"
                } else {
                    var no = 1;
                    var nilai=0;  var nilai_or=0; var bdd=0; var saldo=0; var piu=0; var sisa=0; var sisa2=0; var reklas=0;
                    for(var i=0;i<data.length;i++) {
                        var line = data[i];
                        nilai+=line.nilai;
                        nilai_or+=line.nilai_or;
                        bdd+=line.bdd;
                        saldo+=line.saldo;
                        npiu=line.npiu;
                        if(npiu < 0){
                            npiu = 0;
                        }
                        piu+=npiu;
                        sisa=line.bdd-line.reklas;
                        sisa2+=sisa;
                        reklas+=line.reklas;
                        html+= `<tr>
                        <td>`+no+`</td>
                        <td>`+line.kode_pp+`</td>
                        <td>`+line.nama_pp+`</td>
                        <td>`+line.kode_proyek+`</td>
                        <td>`+line.nama+`</td>
                        <td>`+line.no_pks+`</td>
                        <td>`+line.nama_jenis+`</td>
                        <td>`+line.tgl_mulai+`</td>
                        <td>`+line.tgl_selesai+`</td>
                        <td>`+format_number(line.progress)+`</td>
                        <td>`+line.status+`</td>
                        <td>`+line.nama_cust+`</td>
                        <td class='text-right'>`+format_number(line.nilai)+`</td>
                        <td class='text-right'>`+format_number(line.nilai_or)+`</td>
                        <td class='text-right'>`+format_number(line.bdd)+`</td>
                        <td class='text-right'>`+format_number(line.bdd)+`</td>
                        <td class='text-right'>`+format_number(line.reklas)+`</td>
                        <td class='text-right'>`+format_number(sisa)+`</td>
                        <td class='text-right'>`+format_number(line.saldo)+`</td>
                        <td class='text-right'>`+format_number(npiu)+`</td>
                        </tr>`;
                        no++;
                    }
                    html+=`<tr >
                    <td class='text-center' colspan='12'>Total</td>
                    <td class='text-right'>`+format_number(nilai)+`</td>
                    <td class='text-right'>`+format_number(nilai_or)+`</td>
                    <td class='text-right'>`+format_number(bdd)+`</td>
                    <td class='text-right'>`+format_number(bdd)+`</td>
                    <td class='text-right'>`+format_number(reklas)+`</td>
                    <td class='text-right'>`+format_number(sisa2)+`</td>
                    <td class='text-right'>`+format_number(saldo)+`</td>
                    <td class='text-right'>`+format_number(piu)+`</td>
                    </tr>`;
                } 

                $('#project-active tbody').append(html)
            }
        });
    }

    $('#form-filter #btn-tampil').on('click', function(){
        $('#project-active tbody').empty()
        $kode_pp = $('#kode_pp')[0].selectize.getValue();
        getProjectDashboard($kode_pp);
        getProjectAktif($kode_pp);
        getBebanDashboard($kode_pp);
        getPendapatanDashboard($kode_pp);
        getProfitDashboard($kode_pp);
        $('#modalFilter').modal('hide');
    })

    $('#form-filter #btn-reset').on('click', function(){
        // $('#periode').val($initialPeriode)
        // $periode = $initialPeriode
    })
</script>