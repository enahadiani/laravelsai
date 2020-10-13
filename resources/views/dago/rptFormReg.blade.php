<style>
@media print {
   body { font-size: 12pt !important }
 }
</style>
<div id='canvasPreview' style='font-size:12pt !important;'>
</div>
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
       saiPost('dago-report/lap-form-registrasi', null, formData, null, function(res){
           if(res.result.length > 0){
                $('#pagination').html('');
                var show = $('#show')[0].selectize.getValue();
                generatePagination('pagination',show,res);
          
              
           }
       });
   }

   drawLap($formData);

   
   function drawRptPage(data,res,from,to){
        var data = data;
        console.log(data.length);
        if(data.length > 0){
            if(res.back){
                var back= `<button type="button" class="btn btn-secondary ml-2" id="btn-back" style="float:right;">
                <i class="fa fa-undo"></i> Back</button>`;
            }else{
                var back= ``;
            }

            var mon_html = `<div align='center' style='padding:10px' id='sai-rpt-table-export-tbl-daftar-reg'>`+back+`
                       `;
                    var arr_tl = [0,0,0,0,0,0,0,0,0];
                    var x=1;
                    for(var i=0;i<data.length;i++){
                        var line = data[i];
                        mon_html +=`
                                <div class="kop" style="height:80px;width:100%">
                                    <img src="{{ asset('asset_elite/images/dago_form_logo.jpeg') }}" style="height:80px;width:100%">
                                </div>
                                <div style="height:20px;width:100%;font-size: 14px;background:#009ed72b" class="subkop text-left">
                                    <span style="padding-right:10px">Website : www.dagowisata.com</span>
                                    <span style="padding-right:10px">Email : info@dagowisata.com</span>
                                    <span style="padding-right:10px">Twiter : @dagowisata</span>        
                                    <span style="padding-right:10px">FB : facebook.com/dagowisata</span>
                                </div>
                                <table width='100%' class='table no-border' cellspacing='1' cellpadding='2'>
                                <style>
                                    td,th{
                                        padding:5px !important;
                                    }
                                </style>
                                <tr>
                                <td colspan='3' align='center' style='font-weight:bold;font-size:20px'>FORMULIR PENDAFTARAN UMROH </td>
                                </tr>
                                <tr>
                                <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                <td colspan='2' style='font-weight:bold;'>DATA PRIBADI </td>
                                <td rowspan='6'>
                                <div class="foto-jamaah" style="width: 152px;height: 227px;">
                                    <img src="`+line.foto+`" style="width: 152px;height: 227px;">
                                </div></td>
                                </tr>
                                <tr>
                                <td width='30%' style='font-weight:bold;'>NO REGISTRASI </td>
                                <td width='70%'>:&nbsp;`+line.no_reg+`</td>
                                </tr>
                                <tr>
                                <td width='30%' style='font-weight:bold;'>NO PESERTA </td>
                                <td width='70%'>:&nbsp;`+line.no_peserta+`</td>
                                </tr>
                                <tr>
                                <td width='30%' style='font-weight:bold;'>NAMA LENGKAP </td>
                                <td width='70%'>:&nbsp;`+line.peserta+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>NO ID CARD </td>
                                <td>:&nbsp;`+line.id_peserta+`</td>
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
                                <td style='font-weight:bold;'>BERANGKAT DENGAN </td>
                                <td colspan='2'>:&nbsp;`+line.brkt_dgn+`<br> Hubungan : `+line.hubungan+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>PERNAH UMROH / HAJI </td>
                                <td colspan='2'>:&nbsp;`+line.th_umroh+`/`+line.th_haji+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>PEKERJAAN</td>
                                <td colspan='2'>:&nbsp;`+line.nama_pekerjaan+`</td>
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
                                <tr>
                                <td style='font-weight:bold;'>MARKETING</td>
                                <td colspan='2'>:&nbsp;`+line.nama_marketing+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>AGEN</td>
                                <td colspan='2'>:&nbsp;`+line.nama_agen+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>REFERAL</td>
                                <td colspan='2'>:&nbsp;`+line.referal+`</td>
                                </tr>
                                <tr>
                                <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                <td colspan='3' style='font-weight:bold;'>DATA KELANGKAPAN PERJALANAN </td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>PAKET</td>
                                <td colspan='2'>:&nbsp;`+line.namapaket+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>PROGRAM UMROH / HAJI </td>
                                <td colspan='2'>:&nbsp;`+line.jenis_paket+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>TYPE ROOM </td>
                                <td colspan='2'>:&nbsp;`+line.type+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>BIAYA PAKET </td>
                                <td colspan='2'>:&nbsp;`+sepNum(line.harga)+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>BIAYA ROOM </td>
                                <td colspan='2'>:&nbsp;`+sepNum(line.harga_room)+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>DISKON</td>
                                <td colspan='2'>:&nbsp;`+sepNum(line.diskon)+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>TGL KEBERANGKATAN </td>
                                <td colspan='2'>:&nbsp;`+reverseDateNew(line.tgl_berangkat,'-','/')+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>UKURAN PAKAIAN </td>
                                <td colspan='2'>:&nbsp;`+line.uk_pakaian+`</td>
                                </tr>
                                <tr>
                                <td style='font-weight:bold;'>SUMBER INFORMASI </td>
                                <td colspan='2'>:&nbsp;`+line.info+`</td>
                                </tr>
                                <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                </tr>
                                <tr>
                                <td align='center'>Calon Jamaah</td>
                                <td colspan='2' align='center'>MO</td>
                                </tr>
                                <tr>
                                <td height='60'>&nbsp;</td>
                                <td colspan='2'>&nbsp;</td>
                                </tr>
                                <tr>
                                <td style='text-align:center'>(..............................................)</td>
                                <td colspan='2' style='text-align:center'>(..............................................)</td>
                                </tr>
                                <tr>
                                <td style='text-align:center'></td>
                                <td style='text-align:center' colspan='2'>Tanggal `+line.tgl_input.substr(0,2)+` `+getNamaBulan(line.tgl_input.substr(3,2))+` `+line.tgl_input.substr(6,4)+`</td >
                                </tr>
                                <tr>
                                <td style='text-align:center'>MKT/DWI/FORM/006</td>
                                <td style='text-align:left;padding-left: 120px !important;'>Rev 0.0</td >
                                <td></td>
                                </tr>
                                </table>
                                <br><DIV style='page-break-after:always'></DIV>`;
                                
                    }
               mon_html+=`</div>`;
            }
        $('#canvasPreview').html(mon_html);
        $('li.first a ').html("<i class='icon-control-start'></i>");
        $('li.last a ').html("<i class='icon-control-end'></i>");
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
        $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
