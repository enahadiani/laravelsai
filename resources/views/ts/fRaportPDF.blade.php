<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raport</title>
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
        .separator{
            border-bottom: 1px solid black;
            margin-bottom:10px;
            margin-top:10px;
        }
    </style>
</head>
<body>  
    <div class="kop">
        <div class="row">
            <table class="table table-borderless" width="100%">
                <tr>
                    <td width="15%"><div class="col-md-2 text-center"><img class="logo" style="width:60px;height:80px" src="{{ public_path('img/ts-logo2.png') }}"></div></td>
                    <td width="85%" align='center'>
                        <div class="col-md-8 text-center">
                            <p class="mb-0 fs-12" style="margin-bottom:2px"><b>YAYASAN PENDIDIKAN TELKOM</b></p>
                            <h2 class="mb-0" style="margin-bottom:2px;margin-top:2px"><b>SMK Telkom Sandhy Putra Jakarta</b></h2>
                            <p class="mb-0 fs-12">Terakreditasi A</p>
                            <p class="mb-0 fs-10">(1) Teknik Transamisi Telekomunikasi (2) Teknik Jaringan Akses (3) Teknik Komputer dan Jaringan (4) Rekayasa Perangkat Lunak</p>
                            <p class="mb-0 fs-10">JL. Daan Mogot KM.11, Cengkareng, Jakarta Barat 11710 - Telepon : 021-5442500/5442600 </p>
                            <p class="mb-0 fs-10">http://www.smktelkom-jkt.sch.id email:smkteljakarta@ypt.or.id /smktelkjkt@gmail.com</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="separator"></div>
    </div>
    <div class="isi mt-3">
        <div class="row" style="margin-bottom:20px">
            <div class="col-md-12 text-center">
                <p class="mb-0 fs-12 lh-1"><b>RAPOR TENGAH SEMESTER GENAP TAHUN PELAJARAN 2020/2021</b></p>
                <p class="mb-0 fs-10 lh-1"><b>Bidang Keahlian Teknologi Informasi dan Komunikasi</b></p>
                <p class="mb-0 fs-10 lh-1"><b>Program Keahlian Teknik Komputer dan Informatika</b></p>
                <p class="mb-0 fs-10 lh-1"><b>Kompetensi Keahlian Rekayasa Perangkat Lunak</b></p>
            </div>
        </div>
        <div class="row mt-4">
            <table class="table table-borderless" width="100%">
                <tr>
                    <td width="15%">Nama Peserta Didik</td>
                    <td width="2%">:</td>
                    <td width="15%"></td>
                    <td width="15%">Kelas</td>
                    <td width="2%">:</td>
                    <td width="15%"></td>
                    <td width="15%"></td>
                    <td width="2%"></td>
                    <td width="15%"></td>
                </tr>
                <tr>
                    <td width="15%">NIS</td>
                    <td width="2%">:</td>
                    <td width="15%"></td>
                    <td width="15%">No Urut ID</td>
                    <td width="2%">:</td>
                    <td width="15%"></td>
                    <td width="15%"></td>
                    <td width="2%"></td>
                    <td width="15%"></td>
                </tr>
            </table>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-bordered" id="table-raport" width="100%"> 
                    <thead bgcolor="#CCCCCC">
                        <tr>
                            <th rowspan="2" class="text-center" >No</th>
                            <th rowspan="2" class="text-center" >Mata Pelajaran</th>
                            <th rowspan="2" class="text-center" >SKM</th>
                            <th colspan="4" class="text-center" >Nilai Pengetahuan</th>
                            <th colspan="4" class="text-center" >Nilai Keterampilan</th>
                            <th colspan="2" class="text-center" >Rataan</th>
                            <th rowspan="2" class="text-center" >Nilai Akhir</th>
                            <th rowspan="2" class="text-center" >Predikat</th>
                        </tr>
                        <tr>
                            <th class="text-center">1</th>
                            <th class="text-center">2</th>
                            <th class="text-center">3</th>
                            <th class="text-center">PTS</th>
                            <th class="text-center">1</th>
                            <th class="text-center">2</th>
                            <th class="text-center">3</th>
                            <th class="text-center">PTS</th>
                            <th class="text-center">NP</th>
                            <th class="text-center">NK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bold" colspan="15">A. Muatan Nasional</td>
                        </tr>
                        <tr>
                            <td class="border-mixed-left" rowspan="2">1</td>
                            <td class="border-mixed bold">PEND. AGAMA DAN BUDI PEKERTI ISLAM</td>
                            <td class="border-mixed" rowspan="2">75</td>
                            <td class="border-mixed" rowspan="2">-</td>
                            <td class="border-mixed" rowspan="2">-</td>
                            <td class="border-mixed" rowspan="2">-</td>
                            <td class="border-mixed" rowspan="2">92</td>
                            <td class="border-mixed" rowspan="2">-</td>
                            <td class="border-mixed" rowspan="2">-</td>
                            <td class="border-mixed" rowspan="2">-</td>
                            <td class="border-mixed" rowspan="2">92</td>
                            <td class="border-mixed" rowspan="2">92</td>
                            <td class="border-mixed" rowspan="2">92</td>
                            <td class="border-mixed" rowspan="2">92</td>
                            <td class="border-mixed-right" rowspan="2">A</td>
                        </tr>
                        <tr>
                        <td class="border-mixed italic">Nama Guru: MARWADI</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>