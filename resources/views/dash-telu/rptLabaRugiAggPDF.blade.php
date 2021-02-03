<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laba Rugi Anggaran</title>
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
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN LABA RUGI ANGGARAN</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-lokasi'>{{ $lokasi }}</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-periode'>Periode {{ $periode }}</td>
        </tr>
    </table>
    <table  class='table table-bordered table-striped' width='100%'>
        <tr>
            <th width='23%' class='header_laporan text-center' align='center'>Keterangan</th>
            <th width='11%' class='header_laporan text-center' align='center'>RKA {{ $tahun }}</th>
            <th width='11%' class='header_laporan text-center' align='center'>RKA s.d Bulan Berjalan {{ $tahun }}</th>
            <th width='11%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan {{ $tahun }}</th>
            <th width='11%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan {{ $tahunrev }}</th>
            <th width='11%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan thd RKA {{ $tahun }}</th>
            <th width='11%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan thd RKA s.d Bulan Berjalan {{ $tahun }}</th>
            <th width='11%' class='header_laporan text-center' align='center'>Growth Thd {{ $tahunrev }}</th>
        </tr>
        <tr>
            <th class='header_laporan' align='center'>&nbsp;</th>
            <th class='header_laporan' align='center'>1</th>
            <th class='header_laporan' align='center'>2</th>
            <th class='header_laporan' align='center'>3</th>
            <th class='header_laporan' align='center'>4</th>
            <th class='header_laporan' align='center'>5=3/1</th>
            <th class='header_laporan' align='center'>6=3/2</th>
            <th class='header_laporan' align='center'>7=(3-4)/4</th>
        </tr>
            @for ($i=0; $i < count($data) ; $i++)
                @php
                    $line  = $data[$i];
                    $persen1=0;$persen2=0;$persen3=0;
                    if ($line['n1']!=0)
                    {
                        $persen1=($line['n4']/$line['n1'])*100;
                    }
                    if ($line['n2']!=0)
                    {
                        $persen2=($line['n4']/$line['n2'])*100;
                    }
                    if ($line['n5']!=0)
                    {
                        $persen3=($line['n4']-$line['n5'])/$line['n5']*100;
                    }
                @endphp
                <tr>
                <td height='20' class='isi_laporan'>{!! fnSpasi($line['level_spasi']) !!} {{ $line['nama'] }}</td>
                @if ($line['kode_neraca'] != "OR" && $line['kode_fs'] == "FS4")
                
                    <td class='isi_laporan' align='right'>{{ number_format($line['n1'],0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format($line['n2'],0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format($line['n4'],0,",",".") }}</td>
                    <td class='isi_laporan' align='right'>{{ number_format($line['n5'],0,",",".") }}</td>
                
                @else
                
                    <td class='isi_laporan' align='center'>{{ number_format($line['n1'],0,",",".") }}%</td>
                    <td class='isi_laporan' align='center'>{{ number_format($line['n2'],0,",",".") }}%</td>
                    <td class='isi_laporan' align='center'>{{ number_format($line['n4'],0,",",".") }}%</td>
                    <td class='isi_laporan' align='center'>{{ number_format($line['n5'],0,",",".") }}%</td>
                
                @endif
                    <td class='isi_laporan' align='center'>{{ number_format($persen1,0,",",".") }}%</td>
                    <td class='isi_laporan' align='center'>{{ number_format($persen2,0,",",".") }}%</td>
                    <td class='isi_laporan' align='center'>{{ number_format($persen3,0,",",".") }}%</td>
                    </tr>
            @endfor
		</tbody>
	</table>
    <div style="page-break-after:always"></div>
</body>
</html>