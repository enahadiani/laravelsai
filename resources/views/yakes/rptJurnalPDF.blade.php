<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
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
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN TRANSAKSI JURNAL</td>
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
                <td width='1%'  class='header_laporan' align='center'>No</td>
                <td width='8%' class='header_laporan' align='center'>No Bukti</td>
                <td width='8%' class='header_laporan' align='center'>No Dokumen</td>
                <td width='8%' class='header_laporan' align='center'>Tanggal</td>
                <td width='12%' height='25' class='header_laporan' align='center'>Akun</td>
                <td width='15%' class='header_laporan' align='center'>Nama Akun </td>
                <td width='8%' class='header_laporan' align='center'>PP</td>
                <td width='5%' class='header_laporan' align='center'>Modul</td>
                <td width='20%' class='header_laporan' align='center'>Keterangan</td>
                <td width='10%' class='header_laporan' align='center'>Debet</td>
                <td width='10%' class='header_laporan' align='center'>Kredit</td>
            </tr>
        </thead>
        <tbody>
            @php
            $total=0; 
            $det = '';
            $no=1;
            $first = true;
            $debet=0; $kredit=0;$beda ='';$tmp='';$ndebet=0;$nkredit=0;
            @endphp
            @for ($x=0;$x < count($data);$x++)
                @php 
                    $line = $data[$x]; 
                @endphp
                @if($sumju == "Ya")
                    @php $beda = $tmp != $line["no_bukti"]; @endphp
                    @if ($tmp != $line["no_bukti"])
                        @php
                            $tmp=$line["no_bukti"];
                            $first = true;
                        @endphp
                        @if ($no>1)
                            @php 
                                $debet=0;$kredit=0;$no=1; 
                            @endphp
                            <tr>
                                <td height='25' colspan='9' align='right'  class='bold'>Sub Total</td>
                                <td class='bold' align='right'>{{ $ndebet }}</td>
                                <td class='bold' align='right'>{{ $nkredit }}</td>
                            </tr>
                        @endif          
                    @endif
                @endif
                @php
                    $debet=$debet+floatval($line["debet"]);
                    $kredit=$kredit+floatval($line["kredit"]);
                    $ndebet=number_format($debet,0,",",".");
                    $nkredit=number_format($kredit,0,",",".");
                @endphp
                <tr>
                    <td class='isi_laporan'>{{ $no }}</td>
                    <td class='isi_laporan'>{{ $line["no_bukti"] }}</td>
                    <td class='isi_laporan'>{{ $line["no_dokumen"] }}</td>
                    <td class='isi_laporan'>{{ $line["tgl"] }}</td>
                    <td class='isi_laporan'>{{ $line["kode_akun"] }}</td>
                    <td class='isi_laporan'>{{ $line["nama_akun"] }}</td>
                    <td class='isi_laporan'>{{ $line["kode_pp"] }}</td>
                    <td class='isi_laporan'>{{ $line["modul"] }}</td>
                    <td class='isi_laporan'>{{ $line["keterangan"] }}</td>
                    <td class='isi_laporan'>{{ number_format(floatval($line["debet"]),0,",",".") }}</td>
                    <td class='isi_laporan'>{{ number_format(floatval($line["kredit"]),0,",",".") }}</td>
                </tr>
                @php	
                    $first = true;
                    $no++;
                @endphp
            @endfor
            @php
                $ndebet=number_format($debet,0,",",".");
                $nkredit=number_format($kredit,0,",",".");
            @endphp
            @if($sumju == "Ya")
                <tr>
                    <td height='25' colspan='9' align='right'  class='bold'>Sub Total</td>
                    <td class='bold' align='right'>{{ $ndebet }}</td>
                    <td class='bold' align='right'>{{ $nkredit }}</td>
                </tr>
            @else
                <tr>
                <td height='25' colspan='9' align='right'  class='bold'>Sub Total</td>
                <td class='bold' align='right'>{{ number_format($debet,0,",",".") }}</td>
                <td class='bold' align='right'>{{ number_format($kredit,0,",",".") }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>