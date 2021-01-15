<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COA</title>
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
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN COA</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-lokasi'>{{ $lokasi }}</td>
        </tr>
    </table>
	<table class='table table-bordered info-table' style='width:100%'>
        <thead>
            <tr>
                <th class='header_laporan text-center'>Kode</th>
                <th class='header_laporan text-center'>Nama</th>
                <th class='header_laporan text-center'>FS</th>
                <th class='header_laporan text-center'>Modul</th>
                <th class='header_laporan text-center'>Tipe</th>
                <th class='header_laporan text-center'>Level</th>
                <th class='header_laporan text-center'>Kode Induk</th>
                <th class='header_laporan text-center'>Kode Akun</th>
                <th class='header_laporan text-center'>Nama Akun</th>	
            </tr>
        </thead>
        <tbody>
            @php
            $det = '';
            @endphp
            @for ($x=0;$x < count($data);$x++)
                @php 
                    $line = $data[$x]; 
                @endphp
                <tr>
                    <td class='isi_laporan'>{{ $line['kode_neraca'] }}</td>
                    <td class='isi_laporan'>{{ $line['nama'] }}</td>
                    <td class='isi_laporan'>{{ $line['kode_fs'] }}</td>
                    <td class='isi_laporan'>{{ $line['modul'] }}</td>
                    <td class='isi_laporan'>{{ $line['tipe'] }}</td>
                    <td class='isi_laporan'>{{ $line['level_spasi'] }}</td>
                    <td class='isi_laporan'>{{ $line['kode_induk'] }}</td>
                    <td class='isi_laporan'>{{ $line['kode_akun'] }}</td>
                    <td class='isi_laporan'>{{ $line['nama_akun'] }}</td>
                </tr>
            @endfor
            @for ($x=0;$x < count($data2);$x++)
                @php 
                    $line = $data2[$x]; 
                @endphp
                <tr>
                    <td class='isi_laporan'>{{ $line['kode_neraca'] }}</td>
                    <td class='isi_laporan'>{{ $line['nama'] }}</td>
                    <td class='isi_laporan'>{{ $line['kode_fs'] }}</td>
                    <td class='isi_laporan'>{{ $line['modul'] }}</td>
                    <td class='isi_laporan'>{{ $line['tipe'] }}</td>
                    <td class='isi_laporan'>{{ $line['level_spasi'] }}</td>
                    <td class='isi_laporan'>{{ $line['kode_induk'] }}</td>
                    <td class='isi_laporan'>{{ $line['kode_akun'] }}</td>
                    <td class='isi_laporan'>{{ $line['nama_akun'] }}</td>
                </tr>
            @endfor
            @for ($x=0;$x < count($data3);$x++)
                @php 
                    $line = $data3[$x]; 
                @endphp
                <tr>
                    <td class='isi_laporan'>{{ $line['kode_neraca'] }}</td>
                    <td class='isi_laporan'>{{ $line['nama'] }}</td>
                    <td class='isi_laporan'>{{ $line['kode_fs'] }}</td>
                    <td class='isi_laporan'>{{ $line['modul'] }}</td>
                    <td class='isi_laporan'>{{ $line['tipe'] }}</td>
                    <td class='isi_laporan'>{{ $line['level_spasi'] }}</td>
                    <td class='isi_laporan'>{{ $line['kode_induk'] }}</td>
                    <td class='isi_laporan'>{{ $line['kode_akun'] }}</td>
                    <td class='isi_laporan'>{{ $line['nama_akun'] }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
</body>
</html>