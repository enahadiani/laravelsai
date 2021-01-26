<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Kas Bank</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
       
        body{
            text-align:left;
            font-size:10px;
            margin:0;
        }
        
        .container{
            /* margin:0 auto; */
            margin-top:25px;
            padding:10px;
            /* width:750px; */
            height:auto;
            background-color:#fff;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            /* margin:0 auto; */
            /* width:740px; */
        }
        td, tr, th{
            padding:4px;
            border:1px solid #333;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
        .table-borderless td{
            border: 0px !important;
        }
        .table-borderless{
            border: 0px !important;
        }
        .text-center{
            text-align:center;
        }
        .float-right{
            float:right;
        }
        table td.bordered{
            border:1px !important;
        }
    </style>
</head>
<body>
	@for($i=0;$i < count($data); $i++)
        @php $line = $data[$i]; @endphp
        <table width='100%'  class="table table-borderless">
            <tr>
                <td class='style16 bold' colspan="5" rowspan="3" style='font-size:16px' width="80%">{{ $line['nama_lokasi'] }} <br> {{ $line['kota'] }}</td>
                <td align='center' class='bordered' width="40%">{{ $line['no_bukti'] }}</td>
            </tr>
            <tr>
                <td align='center' class='bordered'>{{ $line['tgl'] }}</td>
            </tr>
            <tr>
                <td align='center' class='bordered'>{{ $line['no_dokumen'] }}</td>
            </tr>
        </table>
        <h3 class='text-center'>BUKTI JURNAL</h3>
        <table width='100%' class='table table-bordered'>
            <thead>
                <tr>
                <td width='5%' class='bold'>NO</td>
                <td width='10%' class='bold'>KODE AKUN </td>
                <td width='20%' class='bold'>NAMA AKUN </td>
                <td width='20%' class='bold'>KETERANGAN</td>
                <td width='5%' class='bold'>ATENSI</td>
                <td width='10%' class='bold'>PP</td>
                <td width='15%' class='bold'>DEBET</td>
                <td width='15%' class='bold'>KREDIT</td>
                </tr>
            </thead>
            <tbody>
            @php
                $x=1;
                $tot_debet=0;
                $tot_kredit=0;
                $debet =0;
                $kredit =0;
                $det ='';
            @endphp
            @for ($a=0; $a < count($detail); $a++)
                @php
                    $line2 = $detail[$a];
                @endphp

                @if($line2['no_bukti'] == $line['no_bukti'] )
                    @php
                    $debet=number_format(floatval($line2['debet']),0,",",".");
                    $kredit=number_format(floatval($line2['kredit']),0,",",".");
                    $tot_debet+=floatval($line2['debet']);
                    $tot_kredit+=floatval($line2['kredit']);
                    @endphp
                    <tr>
                        <td class='isi_laporan' align='center'>{{ $x }}</td>
                        <td class='isi_laporan'>{{ $line2['kode_akun'] }}</td>
                        <td class='isi_laporan'>{{ $line2['nama'] }}</td>
                        <td class='isi_laporan'>{{ $line2['keterangan'] }}</td>
                        <td class='isi_laporan'>{{ $line['no_ref1'] }}</td>
                        <td class='isi_laporan' align='center'>{{ $line2['kode_pp'] }}</td>
                        <td class='isi_laporan' align='right'>{{ $debet }}</td>
                        <td class='isi_laporan' align='right'>{{ $kredit }}</td>
                    </tr>
                    @php $x++; @endphp
                @endif
                    @php
                    $tot_debet1=number_format($tot_debet,0,",",".");
                    $tot_kredit1=number_format($tot_kredit,0,",",".");
                    @endphp
            @endfor
                <tr>
                    <td colspan='6' class='header_laporan bold' align='right'>Total</td>
                    <td class='isi_laporan bold' align='right'>{{ $tot_debet1 }}</td>
                    <td class='isi_laporan bold' align='right'>{{ $tot_kredit1 }}</td>
                </tr>
        </tbody>
        </table>
        <br/>
        <table class='table table-borderless' width="100%">
            <tr>
                <td colspan="5">&nbsp;</td>
                <td class='text-center bordered' width="20%">Dibuat Oleh : </td>
                <td class='text-center bordered' width="20%">Diperiksa Oleh : </td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
                <td class='text-center bordered' width="20%">Paraf &amp; Tanggal </td>
                <td class='text-center bordered' width="20%">Paraf &amp; Tanggal </td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
                <td height='80' class="bordered" width="20%">&nbsp;</td>
                <td width="20%"  class="bordered">&nbsp;</td>
            </tr>   
        </table>
        <DIV style='page-break-after:always'></DIV>
    @endfor
</body>
</html>