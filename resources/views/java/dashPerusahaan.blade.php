<link rel="stylesheet" href="{{ asset('dash-asset/dash-java/dash-perusahaan-dekstop.css') }}" />
<div class="row">
    <div class="col-md-6 col-sm-6">
        <h6 class="text-bold">Project Tahun Ini</h6>
        <p id="periode-text">Periode Januari 2021</p>
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
                <h1 class="pt-1 pl-4 text-bold profit-percentage">53%</h1>
                <h5 class="pl-4 text-bold profit-amount">1.1 M</h5>
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
                <table class="table table-borderless table-hover mt-1 ml--1" id="project-active">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>No Kontrak</th>
                            <th>Kontrak Selesai</th>
                            <th>Nilai Kontrak</th>
                            <th>Anggaran</th>
                            <th>Beban</th>
                            <th>% Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PT. Samudera Aplikasi Indonesia</td>
                            <td>294/KD/ERIU</td>
                            <td>11/08/21</td>
                            <td>13.000.000</td>
                            <td>12.000.000</td>
                            <td>10.000.000</td>
                            <td>23.0%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div id="detail">
    <section id="dekstop-detail-baris-ke-1" class="dasboard-ke-1 col-dekstop pb-1">
        <div class="row">
            <div class="col-md-8 com-sm-8 col-lg-8">
                <div class="card card-dash-detail-row-1">
                    <h6 class="pl-4 pt-4 text-bold">PT Konsumen Proyek</h6>
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
                        <span id="project-amount">20.000.0000</span>
                    </div>
                    <div class="pl-4 pr-4 list-keuangan-proyek">
                        <span>Tanggal Selesai</span>
                        <span id="date-finish">05/06/2021</span>
                    </div>
                    <div class="pl-4 pr-4 list-keuangan-proyek">
                        <span>Budget</span>
                        <span id="budget">7.000.000</span>
                    </div>
                    <div class="pl-4 pr-4 list-keuangan-proyek">
                        <span>Actual</span>
                        <span id="actual">4.000.000</span>
                    </div>
                    <div class="pl-4 pr-4 list-keuangan-proyek">
                        <span>Profit</span>
                        <span id="profit">26.000.000</span>
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
                    <table class="table table-borderless table-hover ml--1" id="table-supplier">
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
                    </table>
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
                    <table class="table table-borderless table-hover ml--1" id="table-supplier">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>No Doc</th>
                                <th>Uraian Pekerjaan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size:30px !important">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none">
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
    var $initialPeriode = "{{ date('Y')}}-{{ date('m') }}"
    var $periodeText = ''
    var $periode = ''
    $('#button-filter').click(function(){
        $('#modalFilter').modal('show');
    })

    function convertPeriode(periode) {
        var array = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
        'Oktober', 'November', 'Desember']

        var split = periode.split('-')
        var convert = parseInt(split[1])

        return array[convert - 1]+" "+split[0]
    }

    $.ajax({
        type: 'GET',
        url: "{{ url('java-dash/periode') }}",
        dataType: 'json',
        async:false,
        success:function(result){    
            $.each(result.daftar, function(index, item){
                $('#periode').append($('<option/>', {
                    value: item.value,
                    text: item.text
                }))
            })    
            var filter = result.daftar.filter(function(data){
                return data.value == $initialPeriode
            })

            if(filter.length > 0) {
                $('#periode').val($initialPeriode)
                getProjectDashboard($initialPeriode)
                // getProjectAktif($initialPeriode)
                $periodeText = convertPeriode($initialPeriode)
            } else {
                $initialPeriode = result.daftar[result.daftar.length-1].value;
                $periodeText = convertPeriode(result.daftar[result.daftar.length-1].value)
                $('#periode').val(result.daftar[result.daftar.length-1].value)
                getProjectDashboard(result.daftar[result.daftar.length-1].value)
                // getProjectAktif(result.daftar[result.daftar.length-1].value)
            }
            $('#periode-text').text('Periode '+$periodeText)
        }
    });

    $('#project-active tbody tr').on('click', function(){
        var countTd = $(this).children('td').length;
        if(countTd <= 1) {
            return;
        } else {
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

    function getProjectDashboard(periode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-dash/project-dashboard') }}",
            dataType: 'json',
            data: { periode: periode },
            async:false,
            success:function(result){    
                var data = result.data.data[0]
                $('#project-total').text(format_number(data.jumlah_proyek))
                $('#project-selesai').text(format_number(data.proyek_selesai))
                $('#project-berjalan').text(format_number(data.proyek_berjalan))
            }
        });
    }

    function getProjectAktif(periode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-dash/project-aktif') }}",
            dataType: 'json',
            data: { periode: periode },
            async:false,
            success:function(result){    
                console.log(result)
                var data = result.data.data
                console.log(data)
                html = ""
                if(data.length == 0) {
                    html += "<tr>"
                    html += "<td colspan='7' style='text-align:center;'>Tidak ada data</td>"
                    html += "</tr>"
                } 

                // $('#project-active tbody').append(html)
            }
        });
    }

    $('#form-filter #btn-tampil').on('click', function(){
        // $('#project-active tbody').empty()
        $periode = $('#periode').val()
        $periodeText = convertPeriode($periode)
        getProjectDashboard($periode)
        // getProjectAktif($periode)
        $('#periode-text').text('Periode '+$periodeText)
        $('#modalFilter').modal('hide');
    })

    $('#form-filter #btn-reset').on('click', function(){
        $('#periode').val($initialPeriode)
        $periode = $initialPeriode
    })
</script>