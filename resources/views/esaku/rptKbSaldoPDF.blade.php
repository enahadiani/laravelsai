<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saldo Kas Bank</title>
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
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN SALDO KASBANK</td>
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
                <th width='5%' rowspan='2'  class='header_laporan text-center' >No</th>
                <th width='10%' rowspan='2' class='header_laporan text-center' >Kode</th>
                <th width='25%' rowspan='2' class='header_laporan text-center' >Nama Akun</th>
                <th width='20%' colspan='2' class='header_laporan text-center' >Saldo Awal </th>
                <th colspan='2'  width='20%'  class='header_laporan text-center' >Mutasi</th>
                <th colspan='2'  width='20%'  class='header_laporan text-center' >Saldo Akhir </th>
            </tr>
            <tr> 
                <th width='10%' class='header_laporan text-center' >Debet</th>
                <th width='10%' class='header_laporan text-center' >Kredit</th>
                <th width='10%' class='header_laporan text-center' >Debet</th>
                <th width='10%' class='header_laporan text-center' >Kredit</th>
                <th width='10%' class='header_laporan text-center' >Debet</th>
                <th width='10%' class='header_laporan text-center' >Kredit</th>
            </tr>
        </thead>
        <tbody>
            @php
                $so_awal_debet=0;
                $so_awal_kredit=0;
                $debet=0;
                $kredit=0;
                $so_akhir_debet=0;
                $so_akhir_kredit=0;
                $i=1;
            @endphp
            @for ($x=0;$x < count($data);$x++)
                @php 
                    $line = $data[$x];
                    $so_awal_debet+=$line['so_awal_debet'];
                    $so_awal_kredit+=$line['so_awal_kredit'];
                    $debet+=$line['debet'];
                    $kredit+=$line['kredit'];
                    $so_akhir_debet+=$line['so_akhir_debet'];
                    $so_akhir_kredit+=$line['so_akhir_kredit'];
                @endphp
                <tr class='isi_laporan'>
                    <td class='isi_laporan' align='center'>{{ $i }}</td>
                    <td class='isi_laporan'>{{ $line['kode_akun'] }}</td>
                    <td >{{ $line['nama'] }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format($line['so_awal_debet'],0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format($line['so_awal_kredit'],0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format($line['debet'],0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format($line['kredit'],0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format($line['so_akhir_debet'],0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format($line['so_akhir_kredit'],0,",",".") }}</td>
                </tr>
                @php	
                    $i++;
                @endphp
            @endfor
            <tr>
                <td colspan='3' class='sum_laporan' align='right'>Total</td>
                <td class='sum_laporan' align='right'>{{ number_format($so_awal_debet,0,",",".") }}</td>
                <td class='sum_laporan' align='right'>{{ number_format($so_awal_kredit,0,",",".") }}</td>
                <td class='sum_laporan' align='right'>{{ number_format($debet,0,",",".") }}</td>
                <td class='sum_laporan' align='right'>{{ number_format($kredit,0,",",".") }}</td>
                <td class='sum_laporan' align='right'>{{ number_format($so_akhir_debet,0,",",".") }}</td>
                <td class='sum_laporan' align='right'>{{ number_format($so_akhir_kredit,0,",",".") }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>