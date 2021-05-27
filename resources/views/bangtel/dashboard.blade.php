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
                    <h4 class="pt-1 pl-4 text-white">2.1 M</h4>
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
                            <span class="text-bold pr-2">1.9 M</span>
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
                            <span class="text-bold pr-2">298 jt</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <div class="card-beban">
                    <h6 class="pt-4 pl-4 text-white">Beban</h6>
                    <h4 class="pt-1 pl-4 text-white">987 jt</h4>
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
                            <span class="text-bold pr-2">728 jt</span>
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
                            <span class="text-bold pr-2">259 jt</span>
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
                <p class="pl-4 text-secondary">Naik 6,2% vs tahun lalu</p>
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
                                <th>Customer</th>
                                <th>No Proyek</th>
                                <th>Kontrak Selesai</th>
                                <th>Nilai Kontrak</th>
                                <th>Anggaran</th>
                                <th>Beban</th>
                                <th>% Profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>PT. Samudera Aplikasi Indonesia</td>
                                <td>294/KD/ERIU</td>
                                <td>11/08/21</td>
                                <td>13.000.000</td>
                                <td>12.000.000</td>
                                <td>10.000.000</td>
                                <td>23.0%</td>
                            </tr> --}}
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
        return sepNum(nil) + ' M';
    }

    function toJuta(x) {
        var nil = x / 1000000;
        return sepNum(nil) + ' Jt';
    }

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
            })    
            control.setValue($initialPP);
            $('#pp-text').text(result.data[result.data.length - 1].nama);
            getProjectDashboard($initialPP);
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

    function getProfitDashboard(periode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/profit-dashboard') }}",
            dataType: 'json',
            data: { periode: periode },
            async:false,
            success:function(result){  
                var data = result.data.data[0]  
                var profit = parseInt(data.nilai_proyek) - parseInt(data.nilai_beban)
                var persentase = 0;
                if(profit == 0) {
                    persentase = 0
                } else {
                    persentase = (profit/parseInt(data.nilai_proyek))*100
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

    function getProjectDashboard(kode_pp) {
        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/project-box') }}",
            dataType: 'json',
            data: { kode_pp: kode_pp },
            async:false,
            success:function(result){    
                var data = result.data[0]
                $('#project-total').text(format_number(data.total))
                $('#project-selesai').text(format_number(data.selesai))
                $('#project-berjalan').text(format_number(data.berjalan))
            }
        });
    }

    function getProjectAktif(periode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('bangtel-dash/project-aktif') }}",
            dataType: 'json',
            data: { periode: periode },
            async:false,
            success:function(result){    
                var data = result.data.data
                var html = ""
                if(data.length == 0) {
                    html += "<tr>"
                    html += "<td colspan='7' style='text-align:center;'>Tidak ada data</td>"
                    html += "</tr>"
                } else {
                    for(var i=0;i<data.length;i++) {
                        var profit = 0
                        var percentage = 0
                        var line = data[i]
                        profit = parseInt(line.nilai_proyek) - parseInt(line.beban)
                        percentage = (profit/parseInt(line.nilai_proyek))*100
                        if(line.tgl_selesai == null) {
                            line.tgl_selesai = '-'
                        }
                        if(!isFinite(percentage)) {
                            percentage = 0
                        }
                        html += "<tr>";
                        html += "<td>"+line.nama_cust+"</td>"
                        html += "<td>"+line.no_proyek+"</td>"
                        html += "<td>"+line.tgl_selesai+"</td>"
                        html += "<td>"+format_number(line.nilai_proyek)+"</td>"
                        html += "<td>"+format_number(line.rab)+"</td>"
                        html += "<td>"+format_number(line.beban)+"</td>"
                        html += "<td>"+format_number(percentage)+"%</td>"
                        html += "<td style='display:none'>"+format_number(profit)+"</td>"
                        html += "<td style='display:none'>"+line.kode_cust+"</td>"
                        html += "</tr>";
                    }
                } 

                $('#project-active tbody').append(html)
            }
        });
    }

    $('#form-filter #btn-tampil').on('click', function(){
        $('#project-active tbody').empty()
        $kode_pp = $('#kode_pp')[0].selectize.getValue();
        getProjectDashboard($kode_pp);
        $('#modalFilter').modal('hide');
    })

    $('#form-filter #btn-reset').on('click', function(){
        // $('#periode').val($initialPeriode)
        // $periode = $initialPeriode
    })
</script>