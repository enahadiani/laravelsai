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
        .table-header-prev td{
            padding: 2px !important;
        }
        .table-kop-prev td{
            padding: 0px !important;
        }
        .separator2{
            height:1rem;
            background:#f8f8f8;
            box-shadow: -1px 0px 1px 0px #e1e1e1;
        }
        .vtop{
            vertical-align:top !important;
        }
        .lh1{
            line-height:1;
        }
    </style>
</head>
<body>
    <div style='border-bottom: double #d7d7d7;padding:0 3rem'>
        <table class="borderless mb-2 table-kop-prev" width="100%" >
            <tr>
                <td width="25%" colspan="5" class="vtop"><h6 class="text-primary bold">BUKTI JURNAL</h6></td>
                <td width="75%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">{{ $lokasi[0]['nama'] }}</h6><p class="lh1">{{ $lokasi[0]['alamat'] }}<br>{{ $lokasi[0]['kota'] }} {{$lokasi[0]['kodepos'] }} </p><p class="mt-2">{{ $lokasi[0]['email'] }} | {{ $lokasi[0]['no_telp'] }}</p></td>
            </tr>
        </table>
    </div>
    @for($a=0; $a < count($data); $a++)
        <div style="padding:0 3rem">
            <table class="borderless table-header-prev mt-2" width="100%">
                <tr>
                    <td width="14%">Tanggal</td>
                    <td width="1%">:</td>
                    <td width="54%" colspan="3">{{ $data[0]['tgl'] }}</td>
                    <td width="10%" rowspan="3" style="vertical-align:top !important">Deskripsi</td>
                    <td width="1%" rowspan="3" style="vertical-align:top !important">:</td>
                    <td width="20%" rowspan="3" style="vertical-align:top !important">{{ $data[0]['keterangan'] }}</td>
                </tr>
                <tr>
                    <td width="14%">No Transaksi</td>
                    <td width="1%">:</td>
                    <td width="54%" colspan="3">{{ $data[0]['no_bukti'] }}</td>
                </tr>
                <tr>
                    <td width="14%">No Dokumen</td>
                    <td width="1%">:</td>
                    <td width="54%" colspan="3">{{ $data[0]['no_dokumen'] }}</td>
                </tr>
            </table>
        </div>
        <div style="padding:0 3.1rem">
            <table class="table table-striped table-body-prev mt-2" width="100%">
                <tr style="background: var(--theme-color-1) !important;color:white !important">
                    <th style="width:15%" colspan="2">Kode Akun</th>
                    <th style="width:20%">Nama Akun</th>
                    <th style="width:10">Nama PP</th>
                    <th style="width:25%">Keterangan</th>
                    <th style="width:15%" colspan="2">Debet</th>
                    <th style="width:15%">Kredit</th>
                </tr>
                @php
                    $det = '';
                    $total_debet = 0; $total_kredit =0;
                    $no=1;
                @endphp
                @for($i=0;$i< count($detail_jurnal);$i++)
                    @php
                        $line = $detail_jurnal[$i];
                    @endphp
                    @if($data[0]['no_bukti'] == $line['no_bukti'])
                        @php
                        $total_debet+=floatval($line['debet']);
                        $total_kredit+=floatval($line['kredit']);
                        @endphp
                        <tr>
                        <td colspan='2'>{{ $line['kode_akun'] }}</td>
                        <td >{{ $line['nama_akun'] }}</td>
                        <td >{{ $line['nama_pp'] }}</td>
                        <td >{{ $line['keterangan'] }}</td>
                        <td class='text-right' colspan='2'>{{ number_format($line['debet'],0,",",".") }}</td>
                        <td class='text-right'>{{ number_format($line['kredit'],0,",",".") }}</td>
                        </tr>
                        @php $no++ @endphp
                    @endif
                @endfor
                <tr style="background: var(--theme-color-1) !important;color:white !important">
                    <th colspan="5"></th>
                    <th style="width:10%" class="text-right" colspan="2">{{ number_format($total_debet,0,",",".") }}</th>
                    <th style="width:10%" class="text-right">{{ number_format($total_kredit,0,",",".") }}</th>
                    </tr>
                </table>
                <table class="table-borderless mt-2" width="100%">
                    <tr>
                        <td width="60%" colspan="5">&nbsp;</td>
                        <td width="20%" class="text-center" colspan="2">Dibuat Oleh</td>
                        <td width="20%" class="text-center">Diperiksa Oleh</td>
                    </tr>
                    <tr>
                        <td width="60%" colspan="5">&nbsp;</td>
                        <td width="20%" style="height:100px" colspan="2"></td>
                        <td width="20%" style="height:100px"></td>
                    </tr>
                </table>
            </div>
            <br>
            @if($a != (count($data) - 1))
            <div class='separator2 mb-4'></div>
            @endif
            <DIV style='page-break-after:always'></DIV>
    @endfor
</body>
</html>