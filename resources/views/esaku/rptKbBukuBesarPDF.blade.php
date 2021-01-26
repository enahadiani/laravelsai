<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Besar</title>
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
            <td class='text-center px-0 py-0 judul-nama'>LAPORAN BUKU BESAR KAS BANK</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-lokasi'>{{ $lokasi }}</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-periode'>Periode {{ $periode }}</td>
        </tr>
    </table>
    @for($i=0;$i< count($data); $i++)
         @php $line = $data[$i]; @endphp
        <table class='table table-bordered info-table' style='width:100%'>
            <thead>
                <tr>
                    <td class='header_laporan no-border' width='20%'>Kode Akun  </td>
                    <td class='header_laporan no-border' colspan='7' width="80%">:&nbsp;{{ $line["kode_akun"] }}</td>
                </tr>
                <tr>
                    <td class='header_laporan no-border'>Nama Akun </td>
                    <td class='header_laporan no-border' colspan='7'>:&nbsp;{{ $line["nama"] }}</td>
                </tr>
                <tr>
                    <td colspan='7' class='header_laporan' align='right'>Saldo Awal </td>
                    <td class='header_laporan' align='right'>{{ number_format($line["so_awal"],0,",",".") }}</td>
                </tr>
                <tr>
                    <td width='10%' class='header_laporan' align='center'>No Bukti</td>
                    <td width='10%' class='header_laporan' align='center'>No Dokumen</td>
                    <td width='10%' class='header_laporan' align='center'>Tanggal</td>
                    <td width='20%' class='header_laporan' align='center'>Keterangan</td>
                    <td width='10%' class='header_laporan' align='center'>Kode PP</td>
                    <td width='12%' class='header_laporan' align='center'>Debet</td>
                    <td width='12%' class='header_laporan' align='center'>Kredit</td>
                    <td width='16%' class='header_laporan' align='center'>Balance</td>
                </tr>
            </thead>
            <tbody>
            @php
                $saldo=floatval($line["so_awal"]);
                $debet=0;
                $kredit=0;
                $det = "";
            @endphp
                @for($x=0;$x < count($detail); $x++)
			      
                    @php $line2 = $detail[$x]; @endphp
                    @if($line["kode_akun"] == $line2["kode_akun"])

                        @php 
                            $saldo=$saldo + floatval($line2["debet"]) - floatval($line2["kredit"]);	
                            $debet=$debet + floatval($line2["debet"]);
                            $kredit=$kredit + floatval($line2["kredit"]);	
                        @endphp
				        <tr>
                            <td valign='top' class='isi_laporan link-report'>{{ $line2["no_bukti"] }}
                            </td>
                            <td valign='top' class='isi_laporan'>{{ $line2["no_dokumen"] }}</td>
                            <td valign='top' class='isi_laporan'>{{ $line2["tgl"] }}</td>
                            <td valign='top' class='isi_laporan'>{{ $line2["keterangan"] }}</td>
                            <td valign='top' class='isi_laporan' >{{ $line2["kode_pp"] }}</td>
                            <td valign='top' class='isi_laporan' align='right'>{{ number_format(floatval($line2["debet"]),0,",",".") }}</td>
                            <td valign='top' class='isi_laporan' align='right'>{{ number_format(floatval($line2["kredit"]),0,",",".") }}</td>
                            <td valign='top' class='isi_laporan' align='right'>{{ number_format($saldo,0,",",".") }}</td>
                        </tr>
                    @endif
			    @endfor
                <tr>
                    <td colspan='5' valign='top' class='isi_laporan' align='right'>Total&nbsp;</td>
                    <td valign='top' class='isi_laporan' align='right'>{{ number_format($debet,0,",",".") }}</td>
                    <td valign='top' class='isi_laporan' align='right'>{{ number_format($kredit,0,",",".") }}</td>
                    <td valign='top' class='isi_laporan' align='right'>{{ number_format($saldo,0,",",".") }}</td>
                </tr>
            </tbody>
        </table>
        <br>
    @endfor
</body>
</html>