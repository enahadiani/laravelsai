<div id='canvasPreview'>
</div>
<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('rtrw-report/lap-surat-antar') }}", null, formData, null, function(res){
           if(res.result.length > 0){
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
           }else{
                $('#saku-report #canvasPreview').load("{{ url('rtrw-auth/form/blank') }}");
           }
       });
   }

   drawLap($formData);
   function getNamaBulan(no_bulan){
        switch (no_bulan){
            case 1 : case '1' : case '01': bulan = "Januari"; break;
            case 2 : case '2' : case '02': bulan = "Februari"; break;
            case 3 : case '3' : case '03': bulan = "Maret"; break;
            case 4 : case '4' : case '04': bulan = "April"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Juni"; break;
            case 7 : case '7' : case '07': bulan = "Juli"; break;
            case 8 : case '8' : case '08': bulan = "Agustus"; break;
            case 9 : case '9' : case '09': bulan = "September"; break;
            case 10 : case '10' : case '10': bulan = "Oktober"; break;
            case 11 : case '11' : case '11': bulan = "November"; break;
            case 12 : case '12' : case '12': bulan = "Desember"; break;
            default: bulan = null;
        }

        return bulan;
    }
   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){
            if(res.back){
                $('.navigation-lap').removeClass('hidden');
            }else{
                $('.navigation-lap').addClass('hidden');
            }
            var html = `<div align='center'>
            <style>
                .table-surat td{
                    padding: 2px 8px !important;
                    border:none !important;
                }
            </style>
            `;
            for(var a=0; a < data.length; a++)
            {
                var line = data[a];
                html+=`
                <table class='table table-surat' style='width:705px !important' border=1>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='8' style='height:20px'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='2' style='width:130px'>
                            <img src='' alt='LOGO' style='width:130px'>
                        </td>
                        <td colspan='6' style='width:470px'>
                            <h6>RUKUN TETANGGA `+line.kode_pp+`/`+line.kode_lokasi+`</h6>
                            <h6>KELURAHAN ROBOTAN KECAMATAN CILINCENG</h6>
                            <h6>KOTA ADMINISTRASI JAKARTA UTARA</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='8' style='height:20px'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='8' class='text-center p-0'><h6 style='font-size:16px !important'><u>SURAT PENGANTAR</u></h6></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='8' class='text-center p-0'>Nomor:`+line.nomor+`</td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='8' style='height:20px'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='8' >Saya yang bertanda tangan di bawah ini atas nama Ketua RT `+line.kode_pp+`/`+line.kode_lokasi+` Kelurahan Robotan Kecamatan Cilinceng, </td>
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
                        <td colspan='4' style='width:380'>:&nbsp;`+line.nama+`</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td style='width:65px'></td>
                        <td colspan='2'>NIK</td>
                        <td colspan='4'>:&nbsp;`+line.nik+`</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td style='width:65px'></td>
                        <td colspan='2'>Tempat/Tanggal Lahir</td>
                        <td colspan='4'>:&nbsp;`+line.tempat_lahir+`, `+line.tgl_lahir.substr(0,2)+' '+getNamaBulan(line.tgl_lahir.substr(3,2))+' '+line.tgl_lahir.substr(6,4)+`</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td style='width:65px'></td>
                        <td colspan='2'>Pekerjaan</td>
                        <td colspan='4'>:&nbsp;`+line.pekerjaan+`</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td style='width:65px'></td>
                        <td colspan='2'>Agama</td>
                        <td colspan='4'>:&nbsp;`+line.agama+`</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td style='width:65px'></td>
                        <td colspan='2'>Status Pernikahan</td>
                        <td colspan='4'>:&nbsp;`+line.sts_nikah+`</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td style='width:65px'></td>
                        <td colspan='2'>Warga Negara</td>
                        <td colspan='4'>:&nbsp;`+line.sts_wni+`</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td style='width:65px'></td>
                        <td colspan='2'>Alamat</td>
                        <td colspan='4'>:&nbsp;`+line.alamat+`</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td style='width:65px'></td>
                        <td colspan='2'>Keperluan</td>
                        <td colspan='4'>:&nbsp;`+line.keperluan+`</td>
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
                        <td colspan='4' width='160px'>Jakarta, `+line.tanggal.substr(0,2)+' '+getNamaBulan(line.tanggal.substr(3,2))+' '+line.tanggal.substr(6,4)+`</td>
                    </tr>
                    
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='3' style='width:230px'>Pengurus RW `+line.kode_pp+`/`+line.kode_lokasi+`</td>
                        <td style='width:175px'></td>
                        <td colspan='3' style='width:230px'>Hormat Kami,</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='3'>Nomor `+line.nomor+`</td>
                        <td ></td>
                        <td colspan='3'>Pengurus RT `+line.kode_pp+`/`+line.kode_lokasi+`</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='8' style='height:60px'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='3'>(`+line.nama_rw+`)</td>
                        <td ></td>
                        <td colspan='3'>(`+line.nama_rt+`)</td>
                        <td style='width:30px'></td>
                    </tr>
                    <tr>
                        <td style='width:30px'></td>
                        <td colspan='8' style='height:20px'>&nbsp;</td>
                    </tr>
                </table>
                <DIV style='page-break-after:always'></DIV>
                `; 
            }
            html+=`</div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   