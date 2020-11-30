<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kartu PDD</title>
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
        .table-borderless td, .table-borderless th{
            border: 0px !important;
        }
        .table-borderless th{
            background: none !important;
        }
        .table-borderless th, .table-borderless td{
            padding: 0 !important;
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
    <div class="kop">
        <div class="row">
            <table class="table table-borderless" width="100%">
                <tr>
                    <?php $image_path = '\img\ts-logo2.png'; ?>
                    <td rowspan="3" width="20%"><div class="col-md-2 text-center"><img class="logo" style="width:60px;height:80px" src="{{ public_path('/img/ts-logo2.png') }}"></div></td>
                    <td width="100%">
                        <h2 style="padding-bottom:0;margin-bottom:2px"><b>SMK TELKOM JAKARTA</b></h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 style="padding-bottom:0;margin-bottom:2px">Jl. Daan Mogot KM.1, Kedaung Kaliangke, Cengkareng</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 style="padding-bottom:0;margin-bottom:2px">Jakarta Barat 11710 Telp. 021-5442600 / 5442700</h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="separator my-1"></div>
    <div class="kartu-m">
        <div class="row">
            <div class="col-sm-12 text-center"><h3><b><u>KARTU PDD</u></b></h3></div>
            <div class="col-sm-12"><h4><b>Identitas Siswa</b></h4></div>
            <table class="table table-borderless" style='border:0;margin-bottom:10px' width="100%">
                <tr>
                    <th align="left" width = "20%">NIS</th>
                    <th align="left" width = "2%">:</th>
                    <td align="left" width = "78%">{{ $data[0]['nis'] }}</td>
                </tr>
                <tr>
                    <th align="left" width = "20%">ID Bank</th>
                    <th align="left" width = "2%">:</th>
                    <td align="left" width = "78%">{{ $data[0]['id_bank'] }}</td>
                </tr>
                <tr>
                    <th align="left" width = "20%">Nama</th>
                    <th align="left" width = "2%">:</th>
                    <td align="left" width = "78%">{{ $data[0]['nama'] }}</td>
                </tr>
                <tr>
                    <th align="left" width = "20%">NIS</th>
                    <th align="left" width = "2%">:</th>
                    <td align="left" width = "78%">{{ $data[0]['nis'] }}</td>
                </tr>
                <tr>
                    <th align="left" width = "20%">Kelas</th>
                    <th align="left" width = "2%">:</th>
                    <td align="left" width = "78%">{{ $data[0]['kode_kelas'] }}</td>
                </tr>
                <tr>
                    <th align="left" width = "20%">Angkatan</th>
                    <th align="left" width = "2%">:</th>
                    <td align="left" width = "78%">{{ $data[0]['kode_akt'] }}</td>
                </tr>
                <tr>
                    <th align="left" width = "20%">Jurusan</th>
                    <th align="left" width = "2%">:</th>
                    <td align="left" width = "78%">{{ $data[0]['nama_jur'] }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="kartu-d mt-2">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-bordered table-striped" id="table-detail" width="100%">
                    <thead>
                        <tr>
                        <th width='5%'>No</th>
                        <th width='10%'>Tanggal </th>
                        <th width='15%'>No Bukti</th>
                        <th width='10%'>Modul</th>
                        <th width='40%'>Keterangan</th>
                        <th width='15%'>Debet</th>
                        <th width='15%'>Kredit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php 
                    $no = 1; 
                    $tosaldo=0;$debet=0; $kredit=0;
                    @endphp
                        @if(count($detail) > 0)
                            @for($i=0; $i < count($detail); $i++)
                            @php 
                            $line2 = $detail[$i]; 
                            $debet += floatval($line2['debet']);
                            $kredit += floatval($line2['kredit']);
                            @endphp
                            <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $line2['tgl'] }}</td>
                            <td>{{ $line2['no_bukti'] }}</td>
                            <td>{{ $line2['modul'] }}</td>
                            <td>{{ $line2['keterangan'] }}</td>
                            <td align="right">{{ number_format($line2['debet'],0,",",".") }}</td>
                            <td align="right">{{ number_format($line2['kredit'],0,",",".") }}</td>
                            </tr>
                            @php $no++; @endphp
                            @endfor
                            @php
                            $tosaldo = $debet-$kredit;
                            @endphp
                            <tr>
                                <td colspan='5' align='right'><b>Total</b></td>
                                <td align='right'>{{ number_format($debet,0,",",".") }}</td>
                                <td align='right'>{{ number_format($kredit,0,",",".") }}</td>
                            </tr>
                            <tr>
                                <td colspan='5' align='right'><b>Saldo</b></td>
                                <td align='right'>{{ number_format($tosaldo,0,",",".") }}</td>
                                <td>0</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>