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
                <td class='text-center;' width='35%'>Deskripsi</td>
                <td class='text-center;' width='15%'>Jumlah</td>
                <td class='text-center;' width='35%'>Deskripsi</td>
                <td class='text-center;' width='15%'>Jumlah</td>
            </tr>
        </thead>
        <tbody>
            @for ($i=0; $i < count($data) ; $i++)
                @php
                    $line  = $data[$i];
                    $nilai1 = "";
                    $nilai2 = "";
                if ($line["tipe1"] != "Header" && $line["nama1"] != "." && $line["nama1"] != "")
                {
                    $nilai1=number_format(floatval($line["nilai1"]),0,",",".");
                }
                if ($line["tipe2"] != "Header" && $line["nama2"] != "." && $line["nama2"] != "")
                { 
                    $nilai2=number_format(floatval($line["nilai2"]),0,",",".");
                }
                @endphp
            <tr>
                @if ($line["tipe1"] == "Posting" && $line["nilai1"] != 0)
                    <td valign='middle' class='isi_laporan report-link neraca-lajur link-report' style='cursor:pointer;' data-kode_neraca='"+line.kode_neraca1+"'>{{ fnSpasi($line["level_spasi1"])+$line["nama1"] }}</td>";
                @else
                
                    <td valign='middle' class='isi_laporan '>"+fnSpasi(line.level_spasi1)+line.nama1+"</td>";
                @endif
                det +=`<td valign='middle' class='isi_laporan' align='right'>`+nilai1+`</td>`;
                
                if (line.tipe2 == "Posting" && line.nilai2 != 0)
                {
                    <td valign='middle' class='isi_laporan report-link neraca-lajur link-report' style='cursor:pointer;' data-kode_neraca='"+line.kode_neraca2+"'>"+fnSpasi(line.level_spasi2)+line.nama2+"</td>";
                }
                else
                {
                    <td valign='middle' class='isi_laporan '>"+fnSpasi(line.level_spasi2)+line.nama2+"</td>";
                }
                det +="<td valign='middle' class='isi_laporan' align='right'>"+nilai2+"</td></tr>";
            @endfor
		</tbody>
	</table>
</body>
</html>