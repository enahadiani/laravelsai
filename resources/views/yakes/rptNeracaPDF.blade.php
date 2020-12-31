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
        }
        .bold {
            font-weight:bold;
        }
        .report-table td, .report-table th{
            border-color: black !important; 
        }
        .border-bottom2{
            border-bottom: 2px solid black !important;
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
    <table class='table table-borderless kotak report-table' width='100%'>
        <tr height='20px'>
            <td colspan=6>&nbsp;</td>
        </tr>
        <tr>
            <td width='5%'></td>
            <td width='90%' colspan='4' class='text-center border-bottom2'>
            <span class='bold fs1-1rem'>YAYASAN KESEHATAN PEGAWAI TELKOM</span><br>
            <span class='bold fs1-1rem'>LAPORAN POSISI KEUANGAN </span><br>
            <span class='bold fs1rem'>Per {{ $tgl_awal }} , {{ $tgl_akhir }}</span><br>
            <span class='bold fs1rem'>(Disajikan dalam Rupiah)</span>
            </td>
            <td width='5%'></td>
        </tr>
        <tr>
            <td colspan=6>&nbsp;</td>
        </tr>
        <tr>
            <td width='5%'></td>
            <td width='50%' class='header_laporan'></td>
            <td width='8%' class='header_laporan fs-1rem bold'><u></u></td>
            <td width='16%' class='header_laporan text-right fs-1rem bold'><u>{{ $tgl_awal }}</u></td>
            <td width='16%' class='header_laporan text-right fs-1rem bold'><u>{{ $tgl_akhir }}</u></td>
            <td width='5%'></td>
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
                
                    <tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca="{{ $line['kode_neraca'] }}" >
                    <td width='5%' style='padding:0!important'></td>
                    <td width='50%' class='isi_laporan link-report' style='padding:0!important'>{!! fnSpasi($line['level_spasi']) !!} {{ $line['nama'] }}</td>
                    <td width='8%' style='padding:0!important'></td>
                    <td width='16%' class='isi_laporan' style='padding:0!important;text-align:right'>{{ $n1 }}</td>
                    <td width='16%' class='isi_laporan' style='padding:0!important;text-align:right'>{{ $n2 }}</td>
                    <td width='5%'></td>
                    </tr>
                @else
                
                    <tr>
                    <td width='5%' style='padding:0!important'></td>
                    <td width='50%' class='isi_laporan' style='padding:0!important'>{!! fnSpasi($line['level_spasi']) !!} {{ $line['nama'] }}</td>
                    <td width='8%' style='padding:0!important'></td>
                    <td width='16%' class='isi_laporan' style='padding:0!important;text-align:right'>{{ $n1 }}</td>
                    <td width='16%' class='isi_laporan' style='padding:0!important;text-align:right'>{{ $n2 }}</td>
                    <td width='5%'></td>
                    </tr>`;
                @endif
            @endfor
            <tr>
                <td colspan='6'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td colspan='4' style='text-align:right'>Bandung, {{ $tgl_sekarang }}</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td class='text-center'>Mengetahui/menyetujui</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'>PJ Keuangan dan Investasi</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%' class='text-center'>PJ SM Keuangan</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr height='80'>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%'></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr height='80'>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%'></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr height='80'>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%'></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr height='80'>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%'></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'><u>{{ $ttd[0]['nama']}}</u></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%' class='text-center'><u>{{ $ttd[0]['nama2']}}</u></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'>NIK. {{ $ttd[0]['nik1']}}</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%' class='text-center'>NIK. {{ $ttd[0]['nik2']}}</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr height='20px'>
                <td colspan=6>&nbsp;</td>
            </tr>
    </table>
</body>
</html>