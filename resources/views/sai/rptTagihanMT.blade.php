<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<style>
    td,th{
        padding:4px !important;
        vertical-align:middle !important;
    }
    .header_laporan,.isi_laporan {
        border:1px solid #e9ecef !important;
    }
    th{
        text-align:center;
    }
</style>
<div id='sai-rpt-table-export-tbl-daftar-pnj'>
    <div class="table-responsive">
        <table class='table table-striped color-table info-table'>
            <thead>
                <tr>
                    <th class="header_laporan">No</th>
                    <th class="header_laporan">No Tagihan</th>
                    <th class="header_laporan">No Kontrak</th>
                    <th class="header_laporan">Keterangan</th>
                    <th class="header_laporan">Nilai</th>
                    <th class="header_laporan">Nilai PPN</th>
                    <th class="header_laporan">Print</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class='isi_laporan' style="text-align: center;">1</td>
                    <td  class='isi_laporan'>001/SAI-01/202008</td>
                    <td class='isi_laporan'>99-KTR2008.0001</td>
                    <td class='isi_laporan'>Perihal Sewa-Menyewa Aplikasi Keuangan</td>
                    <td class='isi_laporan' style="text-align: right;">2.000.000</td>
                    <td class='isi_laporan' style="text-align: right;">200.000</td>
                    <td class='isi_laporan' style='text-align:center;'><a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a></td>
                </tr>
                <tr>
                    <td class='isi_laporan' style="text-align: center;">2</td>
                    <td class='isi_laporan'>002/SAI-01/202008</td>
                    <td class='isi_laporan'>99-KTR2008.0002</td>
                    <td class='isi_laporan'>Perihal Sewa-Menyewa Aplikasi Dashboard</td>
                    <td class='isi_laporan' style="text-align: right;">3.000.000</td>
                    <td class='isi_laporan' style="text-align: right;">300.000</td>
                    <td class='isi_laporan' style='text-align:center;'><a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>