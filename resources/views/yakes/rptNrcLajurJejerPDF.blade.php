<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Neraca Lajur</title>
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
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN NERACA LAJUR</td>
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
                <td width='2%' class='header_laporan'><div align='center'>NO</div></td>
                <td width='10%' class='header_laporan'><div align='center'>Kode Akun</div></td>
                <td width='20%' class='header_laporan'><div align='center'>Nama Akun</div></td>
                <td width='10%' class='header_laporan'><div align='center'>KS00</div></td>
                <td width='10%' class='header_laporan'><div align='center'>KS01</div></td>
                <td width='10%' class='header_laporan'><div align='center'>KS02</div></td>
                <td width='10%' class='header_laporan'><div align='center'>KS03</div></td>
                <td width='10%' class='header_laporan'><div align='center'>KS04</div></td>
                <td width='10%' class='header_laporan'><div align='center'>KS05</div></td>
                <td width='10%' class='header_laporan'><div align='center'>KS06</div></td>
                <td width='10%' class='header_laporan'><div align='center'>KS07</div></td>
                <td width='10%' class='header_laporan'><div align='center'>KONSOLIDASI</div></td>
            </tr>
        </thead>
        <tbody>
            @php 
                $no=1;
                $n1=0;
                $n2=0;
                $n3=0;
                $n4=0;
                $n5=0;
                $n6=0;
                $n7=0;
                $n8=0;
                $n9=0;
            @endphp
            @for ($i=0; $i < count($data); $i++)
                @php
                    $line  = $data[$i];
                    $n1 +=floatval($line["n1"]);
                    $n2 +=floatval($line["n2"]);
                    $n3 +=floatval($line["n3"]);
                    $n4 +=floatval($line["n4"]);
                    $n5 +=floatval($line["n5"]);
                    $n6 +=floatval($line["n6"]);
                    $n7 +=floatval($line["n7"]);
                    $n8 +=floatval($line["n8"]);
                    $n9 +=floatval($line["n9"]);
                @endphp
                <tr>
                    <td class='isi_laporan' align='center'>{{ $no }}</td>
                    <td class='isi_laporan' >{{ $line["kode_akun"] }}</td>
                    <td height='20' class='isi_laporan link-report'>{{ $line["nama"] }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format(floatval($line["n1"]),0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format(floatval($line["n2"]),0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format(floatval($line["n3"]),0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format(floatval($line["n4"]),0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format(floatval($line["n5"]),0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format(floatval($line["n6"]),0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format(floatval($line["n7"]),0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format(floatval($line["n8"]),0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format(floatval($line["n9"]),0,",",".") }}</td>
                </tr>
                @php $no++; @endphp
            @endfor
            <tr>
                <td height='20' colspan='3' class='sum_laporan' align='right'>Total</td>
                <td class='isi_laporan' align='right'>{{ number_format($n1,0,",",".") }}</td>
                <td class='isi_laporan' align='right'>{{ number_format($n2,0,",",".") }}</td>
                <td class='isi_laporan' align='right'>{{ number_format($n3,0,",",".") }}</td>
                <td class='isi_laporan' align='right'>{{ number_format($n4,0,",",".") }}</td>
                <td class='isi_laporan' align='right'>{{ number_format($n5,0,",",".") }}</td>
                <td class='isi_laporan' align='right'>{{ number_format($n6,0,",",".") }}</td>
                <td class='isi_laporan' align='right'>{{ number_format($n7,0,",",".") }}</td>
                <td class='isi_laporan' align='right'>{{ number_format($n8,0,",",".") }}</td>
                <td class='isi_laporan' align='right'>{{ number_format($n9,0,",",".") }}</td>
            </tr>
		</tbody>
	</table>
</body>
</html>