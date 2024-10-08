<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js" integrity="sha512-mPA/BA22QPGx1iuaMpZdSsXVsHUTr9OisxHDtdsYj73eDGWG2bTSTLTUOb4TG40JvUyjoTcLF+2srfRchwbodg==" crossorigin="anonymous"></script>
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
    #print-area{
        display: none;
    }
    @media print{
        #print-area{
            display: block;
        }
    }
</style>
<div id='sai-rpt-table-export-tbl-daftar-pnj'>
    <div class="table-responsive">
        <table class='table table-striped color-table info-table'>
            <thead>
                <tr>
                    <th class="header_laporan">No</th>
                    <th class="header_laporan">No Tagihan</th>
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
                    <td class='isi_laporan' style='text-align:center;'><a href='#' title='Preview' class='badge badge-info btn-print'><i class='fas fa-print'></i></a></td>
                </tr>
                <tr>
                    <td class='isi_laporan' style="text-align: center;">2</td>
                    <td class='isi_laporan'>002/SAI-01/202008</td>
                    <td class='isi_laporan'>99-KTR2008.0002</td>
                    <td class='isi_laporan'>Perihal Sewa-Menyewa Aplikasi Dashboard</td>
                    <td class='isi_laporan' style="text-align: right;">3.000.000</td>
                    <td class='isi_laporan' style="text-align: right;">300.000</td>
                    <td class='isi_laporan' style='text-align:center;'><a href='#' title='Preview' class='badge badge-info btn-print'><i class='fas fa-print'></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="print-area">
    <div style="margin-top: 120px; margin-left:100px;">
        <p style="font-size: 16px; margin-left:6px;">Bandung, 01 Juli 2020</p>
        <table>
            <tbody>
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>001/SAI-01/202008</td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td>Permohonan Pembayaran</td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td>1 (satu) bundel</td>
                </tr>
            </tbody>
        </table>
        <br/>
        <br/>
        <p style="font-size: 16px; margin-left:6px;">Kepada Yth,</p>
        <p style="font-size: 16px; margin-left:6px; margin-top:-20px !important;"><b>KOPERASI PEGAWAI TELKOM DIVRE III</b></p>
        <p style="font-size: 16px; margin-left:6px; margin-top:-20px !important;"><b>c.q. Manager Keuangan</b></p>
        <p style="font-size: 16px; margin-left:6px; margin-top:-20px !important;">Jl. Supratman Nno. 62</p>
        <p style="font-size: 16px; margin-left:6px; margin-top:-20px !important;">Bandung</p>
        <br/>
        <p style="font-size: 16px; margin-left:6px;">Dengan hormat,</p>
        <ul style="margin-left: -30px; list-style-type: none;">
            <li>1. 
                <div style="display: inline; text-align: justify; margin-left: 20px;"> 
                    Menunjuk Perjanjian Kerja Sama Nomor : 99-KTR2008.0001 tanggal 12 Agustus 2020
                    perihal Sewa-Menyewa Aplikasi Keuangan
                </div>
            </li>
            <li>2.</li>
            <li>3.</li>
            <li>4.</li>
            <li>5.</li>
        </ul>
    </div>
</div>

<script type="text/javascript">
$('.btn-print').on('click', function(){
    $('#print-area').printArea();
})
</script>