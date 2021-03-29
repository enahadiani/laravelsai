<script type="text/javascript">
    function drawLap(formData) {
        saiPostLoad('esaku-report/lap-simp-saldo', null, formData, null, function(res) {
            if (res.result.length > 0) {

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination', show, res);

            } else {
                $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
            }
        });
    }

    drawLap($formData);

    function drawRptPage(data, res, from, to) {
        var data = data;
        if (data.length > 0) {
            if (res.back) {
                $('.navigation-lap').removeClass('hidden');
            } else {
                $('.navigation-lap').addClass('hidden');
            }
            var html = `<style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
                }
                table th.no-border{
                    border:0 !important;
                }
                .table-header-prev td{
                    padding: 2px !important;
                }
                .table-kop-prev td{
                    padding: 0px !important;
                }
                .separator2{
                    height:1rem;
                    background:#f8f8f8;
                    box-shadow: -1px 0px 1px 0px #e1e1e1;
                }
                .vtop{
                    vertical-align:top !important;
                }
                .lh1{
                    line-height:1;
                }
                .bg-highlight{
                    background: #eaf2ff !important;
                }
                .bg-white{
                    background: white !important;
                }
            </style>`;
            periode = $periode;
            var lokasi = res.lokasi;
            html += judul_lap("LAPORAN SALDO SIMPANAN", lokasi, 'Periode ' + periode.fromname) + `
                <table width='100%' class='table table-bordered'>
                    <thead>
                    <tr>
                         <th rowspan='2' width='20'  class='header_laporan bg-primary'  style="vertical-align:middle;text-align: center;">No</th>
                         <th rowspan='2' width='80' class='header_laporan bg-primary'  style="vertical-align:middle;text-align: center;">No Anggota</th>
                         <th rowspan='2' width='200' class='header_laporan bg-primary'  style="vertical-align:middle;text-align: center;">Nama Anggota</th>
                         <th colspan='2' class='header_laporan bg-primary'  style="vertical-align:middle;text-align: center;">Simpanan Pokok</th>
                         <th colspan='2' class='header_laporan bg-primary'  style="vertical-align:middle;text-align: center;">Simpanan Wajib</th>
                         <th colspan='2' class='header_laporan bg-primary'  style="vertical-align:middle;text-align: center;">Simpanan Sukarela</th>
                         <th width='80' rowspan='2' class='header_laporan bg-primary'  style="vertical-align:middle;text-align: center;">Bunga</th>
                         <th width='80' rowspan='2' class='header_laporan bg-primary'  style="vertical-align:middle;text-align: center;">Total Tunggakan</th>
                         <th width='80' rowspan='2' class='header_laporan bg-primary'  style="vertical-align:middle;text-align: center;">Total Setoran</th>
                    </tr>
                    <tr>
                        <th width='80' class='header_laporan bg-primary' style="vertical-align:middle;text-align: center;">Tunggakan</th>
                        <th width='80' class='header_laporan bg-primary' style="vertical-align:middle;text-align: center;">Setoran</th>
                        <th width='80' class='header_laporan bg-primary' style="vertical-align:middle;text-align: center;">Tunggakan</th>
                        <th width='80' class='header_laporan bg-primary' style="vertical-align:middle;text-align: center;">Setoran</th>
                        <th width='80' class='header_laporan bg-primary' style="vertical-align:middle;text-align: center;">Tunggakan</th>
                        <th width='80' class='header_laporan bg-primary' style="vertical-align:middle;text-align: center;">Setoran</th>
                    </tr></thead>`;
            var total = 0;
            var det = '';
            if (from != undefined) {
                var no = from + 1;
            } else {
                var no = 1;
            }
            var first = true;
            var tgk_sp = 0;
            var byr_sp = 0;
            var tgk_sw = 0;
            var byr_sw = 0;
            var tgk_ss = 0;
            var byr_ss = 0;
            var nilai_bunga = 0;
            var tgk_total = 0;
            var byr_total = 0;
            var beda = '';
            var tmp = '';
            for (var x = 0; x < data.length; x++) {
                var line2 = data[x];

                tgk_sp = tgk_sp + parseFloat(line2.tgk_sp);
                byr_sp = byr_sp + parseFloat(line2.byr_sp);
                tgk_sw = tgk_sw + parseFloat(line2.tgk_sw);
                byr_sw = byr_sw + parseFloat(line2.byr_sw);
                tgk_ss = tgk_ss + parseFloat(line2.tgk_ss);
                byr_ss = byr_ss + parseFloat(line2.byr_ss);


                det += `<tr>
                            <td align='center' class='isi_laporan'>` + no + `</td>
                            <td  class='isi_laporan'>` + line2.no_agg + `</td>
                            <td class='isi_laporan'>` + line2.nama + `</td>
                            <td class='isi_laporan' style="vertical-align:middle;text-align: right;">` + sepNum(line2
                    .tgk_sp) + `</td>
                            <td class='isi_laporan' style="vertical-align:middle;text-align: right;">` + sepNum(line2
                    .byr_sp) + `</td>
                            <td  class='isi_laporan' style="vertical-align:middle;text-align: right;">` + sepNum(line2
                    .tgk_sw) + `</td>
                            <td  class='isi_laporan' style="vertical-align:middle;text-align: right;">` + sepNum(line2
                    .byr_sw) + `</td>
                            <td  class='isi_laporan' style="vertical-align:middle;text-align: right;">` + sepNum(line2
                    .tgk_ss) + `</td>
                            <td  class='isi_laporan' style="vertical-align:middle;text-align: right;">` + sepNum(line2
                    .byr_ss) + `</td>
                            <td  class='isi_laporan' style="vertical-align:middle;text-align: right;">` + sepNum(line2
                    .nilai_bunga) + `</td>
                            <td  class='isi_laporan' style="vertical-align:middle;text-align: right;">` + sepNum(line2
                    .tgk_total) + `</td>
                            <td  class='isi_laporan' style="vertical-align:middle;text-align: right;">` + sepNum(line2
                    .byr_total) + `</td>`;

                first = true;
                no++;


            }


            det += `<tr>
                            <td height='25' colspan='3' align='right'  class='bold bg-primary'>Total</td>
                            <td class='bold bg-primary' align='right'>` + sepNum(tgk_sp) + `</td>
                            <td class='bold bg-primary' align='right'>` + sepNum(byr_sp) + `</td>
                            <td class='bold bg-primary' align='right'>` + sepNum(tgk_sw) + `</td>
                            <td class='bold bg-primary' align='right'>` + sepNum(byr_sw) + `</td>
                            <td class='bold bg-primary' align='right'>` + sepNum(tgk_ss) + `</td>
                            <td class='bold bg-primary' align='right'>` + sepNum(byr_ss) + `</td>
                            <td class='bold bg-primary' align='right'>` + sepNum(nilai_bunga) + `</td>
                            <td class='bold bg-primary' align='right'>` + sepNum(tgk_total) + `</td>
                            <td class='bold bg-primary' align='right'>` + sepNum(byr_total) + `</td>
                            </tr>`;
            html += det + `
                    </table>
                <DIV style='page-break-after:always'></DIV>`;

            html += "</div>";
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }

</script>
