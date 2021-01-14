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
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN LABA RUGI</td>
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
                <td class='text-center;' width='75%'>Deskripsi</td>
                <td class='text-center;' width='25%'>Jumlah</td>
            </tr>
        </thead>
        <tbody>
            @for ($i=0; $i < count($data) ; $i++)
                @php
                    $line  = $data[$i];
                    $nilai = "";
                    if ($line["tipe"] != "Header" && $line["nama"] != "." && $line["nama"] != "")
                    {
                        $nilai=number_format(floatval($line["n4"]),0,",",".");
                    }
                @endphp
            <tr>
               <td valign='middle' class='isi_laporan '>{!! fnSpasi($line['level_spasi']) !!} {{ $line['nama'] }}</td>
               <td valign='middle' class='isi_laporan' align='right'>{{ $nilai }}</td>
            </tr>
            @endfor
		</tbody>
	</table>
</body>
</html>