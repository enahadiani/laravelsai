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
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN AKTIVITAS JEJER AREA</td>
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
                <td width='20%' height='25'  class='header_laporan'><div align='center'>Deskripsi</div></td>
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
            @php $no=1; @endphp
            @for ($i=0;$i < count($data);$i++)
                @php
                    $n1="";
                    $n2=""; 
                    $n3="";
                    $n4=""; 
                    $n5="";
                    $n6=""; 
                    $n7="";
                    $n8=""; 
                    $n9="";
                    $line = $data[$i];
                    if ($line["tipe"] !="Header")
                    {
                        $n1=number_format(floatval($line["n1"]),0,",",".");
                        $n2=number_format(floatval($line["n2"]),0,",",".");
                        $n3=number_format(floatval($line["n3"]),0,",",".");
                        $n4=number_format(floatval($line["n4"]),0,",",".");
                        $n5=number_format(floatval($line["n5"]),0,",",".");
                        $n6=number_format(floatval($line["n6"]),0,",",".");
                        $n7=number_format(floatval($line["n7"]),0,",",".");
                        $n8=number_format(floatval($line["n8"]),0,",",".");
                        $n9=number_format(floatval($line["n9"]),0,",",".");
                    }
                @endphp

                <tr><td height='20' class='isi_laporan'>{!! fnSpasi($line["level_spasi"]) !!} {{ $line["nama"] }}</td>
                <td class='isi_laporan'><div align='right'>{{ $n1}}</div></td>
                <td class='isi_laporan'><div align='right'>{{ $n2}}</div></td>
                <td class='isi_laporan'><div align='right'>{{ $n3}}</div></td>
                <td class='isi_laporan'><div align='right'>{{ $n4}}</div></td>
                <td class='isi_laporan'><div align='right'>{{ $n5}}</div></td>
                <td class='isi_laporan'><div align='right'>{{ $n6}}</div></td>
                <td class='isi_laporan'><div align='right'>{{ $n7}}</div></td>
                <td class='isi_laporan'><div align='right'>{{ $n8}}</div></td>
                <td class='isi_laporan'><div align='right'>{{ $n9}}</div></td>
                </tr>
                $no++;
            @endfor
        </tbody>
    </table>
</body>
</html>