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
    <table class='table table-borderless' width='100%'>
        <tr>
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN NERACA LAJUR</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-lokasi'>{{ $lokasi }}</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-periode'>Tahun {{ $periode }}</td>
        </tr>
    </table>
	<table class='table table-bordered info-table' style='width:100%'>
        <thead>
            <tr>
                <th class='header_laporan' align='center'>No</th>
                <th class='header_laporan' align='center'>Kode Akun</th>
                <th class='header_laporan' align='center'>Nama Akun</th>
                <th class='header_laporan' align='center'>Saldo Awal</th>
                <th class='header_laporan' align='center'>Januari</th>
                <th class='header_laporan' align='center'>Februari</th>
                <th class='header_laporan' align='center'>Maret</th>
                <th class='header_laporan' align='center'>April</th>
                <th class='header_laporan' align='center'>Mei</th>
                <th class='header_laporan' align='center'>Juni</th>
                <th class='header_laporan' align='center'>Juli</th>
                <th class='header_laporan' align='center'>Agustus</th>
                <th class='header_laporan' align='center'>September</th>
                <th class='header_laporan' align='center'>Oktober</th>
                <th class='header_laporan' align='center'>November</th>
                <th class='header_laporan' align='center'>Desember 1</th>
                <th class='header_laporan' align='center'>Desember 2</th>
                <th class='header_laporan' align='center'>Desember 3</th>
                <th class='header_laporan' align='center'>Desember 4</th>
                <th class='header_laporan' align='center'>Desember 5</th>
                <th class='header_laporan' align='center'>Saldo Akhir</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $no=1;
                $n01=0;
                $n02=0;
                $n03=0;
                $n04=0;
                $n05=0;
                $n06=0;
                $n07=0;
                $n08=0;
                $n09=0;
                $n10=0;
                $n11=0;
                $n12=0;
                $n13=0;
                $n14=0;
                $n15=0;
                $n16=0;
                
                $tahun = $periode;
                $periode01=$tahun."01"; 
                $periode02=$tahun."02"; 
                $periode03=$tahun."03"; 
                $periode04=$tahun."04"; 
                $periode05=$tahun."05"; 
                $periode06=$tahun."06";
                
                $periode07=$tahun."07"; 
                $periode08=$tahun."08"; 
                $periode09=$tahun."09"; 
                $periode10=$tahun."10"; 
                $periode11=$tahun."11"; 
                $periode12=$tahun."12";
                
                $periode13=$tahun."13"; 
                $periode14=$tahun."14"; 
                $periode15=$tahun."15"; 
                $periode16=$tahun."16";
                
                $so_awal=0;
                $total=0;
            @endphp
            @for ($i=0; $i < count($data) ; $i++)
                @php
                    $line  = $data[$i];
                    $so_awal+=floatval($line['so_awal']);
                    $n01+=floatval($line['n01']);
                    $n02+=floatval($line['n02']);
                    $n03+=floatval($line['n03']);
                    $n04+=floatval($line['n04']);
                    $n05+=floatval($line['n05']);
                    $n06+=floatval($line['n06']);
                    $n07+=floatval($line['n07']);
                    $n08+=floatval($line['n08']);
                    $n09+=floatval($line['n09']);
                    $n10+=floatval($line['n10']);
                    $n11+=floatval($line['n11']);
                    $n12+=floatval($line['n12']);
                    $n13+=floatval($line['n13']);
                    $n14+=floatval($line['n14']);
                    $n15+=floatval($line['n15']);
                    $n16+=floatval($line['n16']);
                    $total+=floatval($line['total']);
                @endphp
                <tr>
                    <td class='isi_laporan' align='center'>{{ $no }}</td>
                    <td class='isi_laporan'>{{ $line['kode_akun'] }}</td>
                    <td height='20' class='isi_laporan'>{{ $line['nama'] }}</td>
                    <td class='isi_laporan text-right'>{{ number_format(floatval($line['so_awal']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n01']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n02']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n03']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n04']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n05']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n06']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n07']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n08']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n09']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n10']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n11']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n12']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n13']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n14']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n15']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['n16']),0,",",".") }}</td>
                    <td  class='isi_laporan text-right' >{{ number_format(floatval($line['total']),0,",",".") }}</td>
                </tr>
                @php $no++; @endphp
            @endfor
            <tr>
                <td height='23' colspan='3' align='right' class='isi_laporan'>Total&nbsp;</td>
                <td class='header_laporan' align='right'>{{ number_format($so_awal,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n01,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n02,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n03,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n04,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n05,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n06,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n07,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n08,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n09,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n10,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n11,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n12,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n13,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n14,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n15,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($n16,0,",",".") }}</td>
                <td class='header_laporan' align='right'>{{ number_format($total,0,",",".") }}</td>
            </tr>
		</tbody>
	</table>
</body>
</html>