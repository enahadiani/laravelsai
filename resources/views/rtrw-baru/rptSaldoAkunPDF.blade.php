<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saldo Akun</title>
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
    </style>
</head>
<body>
    <table class='table table-borderless' width='100%'>
        <tr>
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN SALDO AKUN</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-lokasi'>{{ $lokasi }}</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-periode'>Periode {{ $periode }}</td>
        </tr>
    </table>
	<table class='table table-bordered info-table' style='width:100%'>
        <thead>
            <tr>
                <td width='3%' class='header_laporan' align='center'>No</td>
                <td width='10%' class='header_laporan' align='center'>Kode Akun</td>
                <td width='27%' class='header_laporan' align='center'>Nama Akun</td>
                <td width='27%' class='header_laporan' align='center'>Kode PP</td>
                <td width='15%' class='header_laporan' align='center'>Saldo Awal</td>
                <td width='15%' class='header_laporan' align='center'>Debet</td>
                <td width='15%' class='header_laporan' align='center'>Kredit</td>
                <td width='15%' class='header_laporan' align='center'>Saldo Akhir</td>
            </tr>
        </thead>
        <tbody>
            @php 
                $no=1;
                $so_awal=0;
                $debet=0;
                $kredit=0;
                $so_akhir=0;
            @endphp
            @for ($i=0; $i < count($data) ; $i++)
                @php
                    $line  = $data[$i];
                    $so_awal=+floatval($line['so_awal']);
                    $debet=+floatval($line['debet']);
                    $kredit=+floatval($line['kredit']);
                    $so_akhir=+ floatval($line['so_akhir']);
                @endphp
                <tr>
                    <td class='isi_laporan' align='center' width='3%'>{{ $no }}</td>
                    <td class='isi_laporan' width='10%'>{{ $line['kode_akun'] }}</td>
                    <td height='20' class='isi_laporan link-report' width='15%'>{{ $line['nama'] }}</td>
                    <td height='20' class='isi_laporan link-report' width='15%'>{{ $line['kode_pp'] }}</td>
                    <td class='isi_laporan' align='right' width='12%'>{{ number_format(floatval($line['so_awal']),0,",",".") }}</td>
                    <td class='isi_laporan' align='right' width='12%'>{{ number_format(floatval($line['debet']),0,",",".") }}</td>
                    <td class='isi_laporan' align='right' width='12%'>{{ number_format(floatval($line['kredit']),0,",",".") }}</td>
                    <td class='isi_laporan' align='right' width='12%'>{{ number_format(floatval($line['so_akhir']),0,",",".") }}</td>
                </tr>
                @php $no++; @endphp
            @endfor
            <tr>
                <td height='20' colspan='4' class='sum_laporan' align='right'>Total</td>
                <td class='sum_laporan' align='right'>{{ number_format($so_awal,0,",",".") }}</td>
                <td class='sum_laporan' align='right'>{{ number_format($debet,0,",",".") }}</td>
                <td class='sum_laporan' align='right'>{{ number_format($kredit,0,",",".") }}</td>
                <td class='sum_laporan' align='right'>{{ number_format($so_akhir,0,",",".") }}</td>
            </tr>
		</tbody>
	</table>
</body>
</html>