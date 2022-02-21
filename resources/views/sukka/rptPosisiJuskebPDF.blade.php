<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengajun RRA Juskeb</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
       
        body{
            text-align:left;
            font-size:10px;
            margin:0;
        }
        th.bg-white{
            background: none !important;
            border: none !important;
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
        .text-right{
            text-align:right;
        }
        .text-left{
            text-align:left;
        }
    </style>
</head>
<body>
    <table class='table table-borderless' width='100%'>
        <tr>
            <td colspan="3" class="vtop no-border" style='width:220px'><h3 class="text-primary bold">{{ $lokasi }}</h3></td>
            <td colspan="12" class="vtop no-border" style='width:720px'>&nbsp;</td>
            <td class="vmiddle text-center no-border" style='width:120px'></td>
        </tr>
        <tr>
            <td colspan="3" class="no-border" >LAPORAN POSISI PENGAJUAN JUSTIFIKASI KEBUTUHAN</td>
            <td colspan="12" class="vtop no-border">&nbsp;</td>
            <td class="vtop no-border text-right">&nbsp;</td>
        </tr>
        @if($periode != "")
            <tr>
            <td colspan="3" class="no-border" >Periode</td>
            <td colspan="12" class="no-border" style='width:720px;text-transform:uppercase'>:&nbsp;{{ $periode }}</td>
            <td class="vtop no-border text-right">&nbsp;</td>
            </tr>
        @endif
    </table>
	<table class='table table-bordered info-table' style='width:100%'>
        <thead>
            <tr>
                <th class='header_laporan' align='center'>No</th>
                <th class='header_laporan' align='center'>No Bukti</th>
                <th class='header_laporan' align='center'>Tanggal</th>
                <th class='header_laporan' align='center'>Kegiatan </th>
                <th class='header_laporan' align='center'>Unit Kerja</th>
                <th class='header_laporan' align='center'>Periode Penggunaan</th>
                <th class='header_laporan' align='center'>Nilai</th>
                <th class='header_laporan' align='center'>Nilai RRA</th>
                <th class='header_laporan' align='center'>Posisi</th>
            </tr>
        </thead>
        <tbody>
        @php 
        $no = 1; $nilai=0; $nilai_rra=0; 
        @endphp
        @for($i=0;$i < count($data);$i++)
            @php 
                $line = $data[$i]; 
                $nilai += floatval($line['nilai']);
                $nilai_rra += floatval($line['nilai_rra']);
            @endphp
            <tr>
                <td valign='top' class='isi_laporan'>{{ $no }}</td>
                <td valign='top' class='isi_laporan'>{{ $line['no_bukti'] }}</td>
                <td valign='top' class='isi_laporan'>{{ $line['tanggal'] }}</td>
                <td valign='top' class='isi_laporan'>{{ $line['kegiatan'] }}</td>
                <td valign='top' class='isi_laporan'>{{ $line['nama_pp'] }}</td>
                <td valign='top' class='isi_laporan'>{{ $line['periode'] }}</td>
                <td valign='top' class='isi_laporan' align='right'>{{ number_format(floatval($line['nilai']),0,",",".") }}</td>
                <td valign='top' class='isi_laporan' align='right'>{{ number_format(floatval($line['nilai_rra']),0,",",".") }}</td>
                <td valign='top' class='isi_laporan'>{{ $line['posisi'] }}</td>
            </tr>
            @php $no++; @endphp
        @endfor
        <tr>
            <th valign='top' class='isi_laporan' colspan="6"></th>
            <th valign='top' class='isi_laporan text-right'>{{ number_format(floatval($nilai),0,",",".") }}</th>
            <th valign='top' class='isi_laporan text-right'>{{ number_format(floatval($nilai_rra),0,",",".") }}</th>
            <th valign='top' class='isi_laporan'></th>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
</body>
</html>