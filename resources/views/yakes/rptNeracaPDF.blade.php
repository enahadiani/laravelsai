<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jurnal</title>
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
    @php 
    function fnSpasi($level)
    {
        $tmp="";
        for ($f=1; $f<=$level; $f++)
        {
            $tmp.="&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        return $tmp;
    }
    @endphp
    <table class='table table-borderless' width='100%'>
        <tr>
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN POSISI KEUANGAN</td>
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
                <td width='75%' height='25'  class='header_laporan'><div align='center'>Deskripsi</div></td>
                <td width='25%' class='header_laporan'><div align='center'>Jumlah</div></td>
                <td width='25%' class='header_laporan'><div align='center'>Jumlah</div></td>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @for ($i=0;$i < count($data);$i++)
                @php
                    $n1="";
                    $n2="";
                    $line = $data[$i];
                    if ($line["tipe"] !="Header")
                    {
                        $n1=number_format(floatval($line["n1"]),0,",",".");
                        $n2=number_format(floatval($line["n2"]),0,",",".");
                    }
                @endphp

                <tr><td height='20' class='isi_laporan'>{!! fnSpasi($line["level_spasi"]) !!} {{ $line["nama"] }}</td>
                <td class='isi_laporan'><div align='right'>{{ $n1}}</div></td>
                <td class='isi_laporan'><div align='right'>{{ $n2}}</div></td>
                </tr>
                $no++;
            @endfor
        </tbody>
    </table>
</body>
</html>