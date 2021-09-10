<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pengantar</title>
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
        .bg-primary{
            background: #0058e4 !important;
            color:white !important;
        }
        .text-right{
            text-align:right !important;
        }
    </style>
</head>
@php 

    function getNamaBulan($no_bulan){
        switch ($no_bulan){
            case 1 : case '1' : case '01': $bulan = "Januari"; break;
            case 2 : case '2' : case '02': $bulan = "Februari"; break;
            case 3 : case '3' : case '03': $bulan = "Maret"; break;
            case 4 : case '4' : case '04': $bulan = "April"; break;
            case 5 : case '5' : case '05': $bulan = "Mei"; break;
            case 6 : case '6' : case '06': $bulan = "Juni"; break;
            case 7 : case '7' : case '07': $bulan = "Juli"; break;
            case 8 : case '8' : case '08': $bulan = "Agustus"; break;
            case 9 : case '9' : case '09': $bulan = "September"; break;
            case 10 : case '10' : case '10': $bulan = "Oktober"; break;
            case 11 : case '11' : case '11': $bulan = "November"; break;
            case 12 : case '12' : case '12': $bulan = "Desember"; break;
            default: $bulan = null;
        }

        return $bulan;
    }

    $url = "https://api.simkug.com/api/rtrw/storage";
    if(isset($lokasi[0]['logo'])){
        $logo ='data:image/png;base64,'.base64_encode(file_get_contents($url."/".$lokasi[0]['logo']));
    }else{
        $logo = '';
    }
@endphp
<body>
    <div align='center' style='width:705px !important'>
    <style>
    .table-surat td{
        padding: 2px 8px !important;
        border:none !important;
        font-size:12pt !important;
    }
    .text-center:{
        text-align:center;
    }
    h6{
        font-size:14pt !important;
        margin:0 !important;
    }
    </style>
    @for($a=0; $a < count($data); $a++)
        @php $line = $data[$a]; @endphp
        <table class='table table-surat' style='width:705px !important;border:none !important' >
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' style='height:20px'>&nbsp;</td>
            </tr>
            <tr>
                <td style='width:30px;height:80pt' ></td>
                <td colspan='2' style='width:130px'>
                    <img src='{{ $logo }}' alt='LOGO' style='width:130px'>
                </td>
                <td colspan='6' style='width:470px'>
                    <h6>RUKUN TETANGGA {{ $line['kode_pp'] }}/{{ $line['kode_lokasi'] }}</h6>
                    <h6>KELURAHAN ROBOTAN KECAMATAN CILINCENG</h6>
                    <h6>KOTA ADMINISTRASI JAKARTA UTARA</h6>
                </td>
            </tr>
            <tr>
                <td colspan='9' style='height:20px'>&nbsp;</td>
            </tr>
            <tr>
                <td colspan='7' class='text-center p-0'><h6 style='text-decoration: underline;'>SURAT PENGANTAR</h6></td>
                <td style='width:30px'></td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td colspan='7' class='text-center p-0'>Nomor:{{ $line['nomor'] }}</td>
                <td style='width:30px'></td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' style='height:20px'>&nbsp;</td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' >Saya yang bertanda tangan di bawah ini atas nama Ketua RT {{ $line['kode_pp'] }}/{{ $line['kode_lokasi'] }} Kelurahan Robotan Kecamatan Cilinceng, </td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' >
                menerangkan kepada:</td>
            </tr> 
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' style='height:20px'>&nbsp;</td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='2' style='width:190px'>Nama</td>
                <td colspan='4' style='width:380'>:&nbsp;{{ $line['nama'] }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='2'>NIK</td>
                <td colspan='4'>:&nbsp;{{ $line['nik'] }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='2'>Tempat/Tanggal Lahir</td>
                <td colspan='4'>:&nbsp;{{ $line['tempat_lahir'] }}, {{ substr($line['tgl_lahir'],0,2) }} {{ getNamaBulan(substr($line['tgl_lahir'],3,2)) }} {{ substr($line['tgl_lahir'],6,4) }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='2'>Pekerjaan</td>
                <td colspan='4'>:&nbsp;{{ $line['pekerjaan'] }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='2'>Agama</td>
                <td colspan='4'>:&nbsp;{{ $line['agama'] }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='2'>Status Pernikahan</td>
                <td colspan='4'>:&nbsp;{{ $line['sts_nikah'] }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='2'>Warga Negara</td>
                <td colspan='4'>:&nbsp;{{ $line['sts_wni'] }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='2'>Alamat</td>
                <td colspan='4'>:&nbsp;{{ $line['alamat'] }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='2'>Keperluan</td>
                <td colspan='4'>:&nbsp;{{ $line['keperluan'] }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' style='height:20px'>&nbsp;</td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' style='height:20px'>Demikian surat pengantar ini kami berikan guna proses tindak lanjut ke tingkat selanjutnya</td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' style='height:20px'>&nbsp;</td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td style='width:65px'></td>
                <td colspan='3' width='440px'></td>
                <td colspan='4' width='160px'>Jakarta, {{ substr($line['tanggal'],0,2) }} {{ getNamaBulan(substr($line['tanggal'],3,2)) }} {{ substr($line['tanggal'],6,4) }}</td>
            </tr>
            
            <tr>
                <td style='width:30px'></td>
                <td colspan='3' style='width:230px'>Pengurus RW {{ $line['kode_pp'] }}/{{ $line['kode_lokasi'] }}</td>
                <td style='width:175px'></td>
                <td colspan='3' style='width:230px'>Hormat Kami,</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='3'>Nomor {{ $line['nomor'] }}</td>
                <td ></td>
                <td colspan='3'>Pengurus RT {{ $line['kode_pp'] }}/{{ $line['kode_lokasi'] }}</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' style='height:60px'>&nbsp;</td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='3'>({{ $line['nama_rw'] }} )</td>
                <td ></td>
                <td colspan='3'>({{ $line['nama_rt'] }} )</td>
                <td style='width:30px'></td>
            </tr>
            <tr>
                <td style='width:30px'></td>
                <td colspan='8' style='height:20px'>&nbsp;</td>
            </tr>
        </table>
        <DIV style='page-break-after:always'></DIV>       
    @endfor
    </div>
</body>
</html>