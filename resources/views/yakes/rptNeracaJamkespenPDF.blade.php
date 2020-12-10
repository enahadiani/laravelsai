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
            border:0px !important;
            border-collapse:collapse;
            /* margin:0 auto; */
            /* width:740px; */
        }
        td, tr, th{
            padding:4px;
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
        .isi-laporan{
            padding: 0px !important;
        }
        
        .no-border td{
            border:0 !important;
        }
        .kotak{
            border:2px solid black !important;
            margin-bottom: 0;
        }
        .kotak td{
            padding: 0 !important;
            border:0 !important;
        }
        .bold {
            font-weight:bold;
        }
        .report-table td, .report-table th{
            border-color: black !important;
            padding: 0 5px !important; 
        }
        .border-bottom2{
            border-bottom: 2px solid black !important;
        }
        .border-bottom{
            border-bottom: 1px solid black !important;
        }
        .fs1-1rem{
            font-size: 1.1rem;
        }
        
        .fs1rem{
            font-size: 1rem;
        }
        .text-right{
            text-align:right;
        }
        .bt-0{
            border-top: 0px !important;
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
    <table class='kotak' width='100%'>
        <tr>
            <td class='text-center px-0 py-0 bold fs1-1rem'>YAYASAN KESEHATAN PEGAWAI TELKOM <br> PROGRAM JAMKESPEN MANFAAT PASTI</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 bold fs1-1rem'>LAPORAN POSISI KEUANGAN</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 bold fs1rem'>Per {{ $tgl_awal }} dan {{ $tgl_akhir }} <br> (Disajikan dalam Rupiah)</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>
    <table class='kotak bt-0 report-table' width='100%'>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width='50%' class='header_laporan text-center'></td>
            <td width='5%' class='header_laporan text-center bold'></td>
            <td width='2%' class='header_laporan text-center '>&nbsp;</td>
            <td width='20%' class='header_laporan text-center bold fs1rem border-bottom'>{{ $tgl_awal }}</td>
            <td width='3%' class='header_laporan text-center '>&nbsp;</td>
            <td width='20%' class='header_laporan text-center bold fs1rem border-bottom'>{{ $tgl_akhir }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
            @for ($i=0; $i < count($data);$i++)

                @php 
                $n1="";
                $n2="";
                $line = $data[$i];
                @endphp
                @if ($line['tipe'] != "Header")
                    @php
                    $n1=number_format(floatval($line['n1']),0,',','.');
                    $n2=number_format(floatval($line['n2']),0,',','.');
                    @endphp
                @endif
			
                @if ($line['tipe'] == "Posting" && ($line['n1'] != 0 || $line['n2'] != 0 ))
                    <tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' >
                    <td width='50%' height='20' class='isi_laporan link-report px-2' >{!! fnSpasi($line['level_spasi']) !!} {{ $line['nama'] }}</td>
                    <td width='5%'></td>
                    <td width='2%'></td>
                    <td width='20%' class='isi_laporan px-2 text-right'>{{ $n1 }}</td>
                    <td width='3%'></td>
                    <td width='20%' class='isi_laporan px-2 text-right'>{{ $n2 }}</td>
                    </tr>
                
                @else
                    <tr>
                    <td width='50%' height='20' >{!! fnSpasi($line['level_spasi']) !!} {{ $line['nama'] }}</td>
                    <td width='5%'></td>
                    <td width='2%'></td>
                    <td width='20%' class='isi_laporan px-2 text-right'>{{ $n1 }}</td>
                    <td width='3%'></td>
                    <td width='20%' class='isi_laporan px-2 text-right'>{{ $n2 }}</td>
                    </tr>
                @endif
        @endfor
    </table>
</body>
</html>