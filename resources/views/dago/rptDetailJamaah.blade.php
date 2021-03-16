<style>
@media print {
   body { font-size: 12pt !important }
 }
</style>
<script type="text/javascript">
    
    function reverseDateNew(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

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

    function drawLap(formData){
        saiPostLoad('dago-report/lap2-detail-jamaah', null, formData, null, function(res){
            if(res.result.length > 0){
                
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
                
            }else{
                $('#saku-report #canvasPreview').load("{{ url('dago-auth/form/blank') }}");
            }
        });
    }

    drawLap($formData);

   
    function drawRptPage(data,res,from,to){
        var data = data;
        if(res.res.back){
            var back= `<button type="button" class="btn btn-secondary ml-2" id="btn-back" style="float:right;">
            <i class="fa fa-undo"></i> Back</button>`;
            var mb= "mb-5";
        }else{
            var back= ``;
            var mb = "";
        }
        if(data.length > 0){

            var mon_html = `<div align='center' style='padding:10px' id='sai-rpt-table-export-tbl-daftar-reg'>
                       `;
                    var arr_tl = [0,0,0,0,0,0,0,0,0];
                    var x=1;
                    for(var i=0;i<data.length;i++){
                        var line = data[i];
                        mon_html +=`
                                
                                <table width='100%' class='table no-border' cellspacing='1' cellpadding='2'>
                                <style>
                                    td,th{
                                        padding:3px !important;
                                    }
                                </style>
                                <tr>
                                <td colspan='3' align='center' style='font-weight:bold;font-size:20px'>DATA PESERTA</td>
                                </tr>
                                <tr>
                                <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                <td colspan='2' style='font-weight:bold;'></td>
                                <td rowspan='6'>
                                <div class="foto-jamaah" style="width: 152px;height: 227px;">
                                    <img src="`+line.foto+`" style="width: 152px;height: 227px;">
                                </div></td>
                                </tr>
                                <tr>
                                <td width='30%' style='font-weight:bold;'>NO PESERTA </td>
                                <td width='70%'>:&nbsp;`+line.no_peserta+`</td>
                                </tr>
                                <tr>
                                <td width='30%' style='font-weight:bold;'>NO KTP </td>
                                <td width='70%'>:&nbsp;`+line.id_peserta+`</td>
                                </tr>
                                <tr>
                                <td width='30%' style='font-weight:bold;'>NAMA LENGKAP </td>
                                <td width='70%'>:&nbsp;`+line.nama+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>STATUS</td>
                                <td>:&nbsp;`+line.status+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>JENIS KELAMIN </td>
                                <td colspan='2'>:&nbsp;`+line.jk+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>TEMPAT &amp; TGL LAHIR </td>
                                <td colspan='2'>:&nbsp;`+line.tempat+` `+reverseDateNew(line.tgl_lahir,'-','/')+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>PERNAH UMROH / HAJI </td>
                                <td colspan='2'>:&nbsp;`+line.th_umroh+`/`+line.th_haji+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>PEKERJAAN</td>
                                <td colspan='2'>:&nbsp;`+line.pekerjaan+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>NO PASSPORT </td>
                                <td colspan='2'>:&nbsp;`+line.nopass+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>KANTOR IMIGRASI </td>
                                <td colspan='2'>:&nbsp;`+line.kantor_mig+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold'>HP</td>
                                <td colspan='2'>:&nbsp;`+line.hp+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>TELEPON</td>
                                <td colspan='2'>:&nbsp;`+line.telp+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>EMAIL</td>
                                <td colspan='2'>:&nbsp;`+line.email+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>ALAMAT</td>
                                <td colspan='2'>:&nbsp;`+line.alamat+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>NO EMERGENCY </td>
                                <td colspan='2'>:&nbsp;`+line.ec_telp+`</td>
                                </tr>
                                </table>
                                <br><DIV style='page-break-after:always'></DIV>`;
                                
                    }
               mon_html+=`</div>`;
            }
        $('#canvasPreview').html(mon_html);
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
    }
</script>
