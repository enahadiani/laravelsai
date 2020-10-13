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

    function sepNum2(x){
        if (typeof x === 'undefined' || !x) { 
            return 0;
        }else{
            var x = parseFloat(x).toFixed(2);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }

    function format_number2(x){
        var num = parseFloat(x).toFixed(2);
        num = sepNum2(num);
        return num;
    }

    function terbilang2(kode_curr){
        if(kode_curr == "IDR"){
            var ket_curr = " rupiah";
        }else if(kode_curr == "USD"){
            var ket_curr = " dollar Amerika";
        }
        return ket_curr;
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
       saiPost('dago-report/lap2-mku-operasional', null, formData, null, function(res){
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
        console.log(data.length);
        if(data.length > 0){

    var mon_html = `<div align='center' style='padding:10px;overflow-x:scroll;' id='sai-rpt-table-export-tbl-daftar-reg'>
               `;
               var x=1;
               mon_html+=`
                    <table width="800px" class="table no-border">
                        <style>
                            td,th{
                                padding:4px !important;
                                vertical-align:middle !important;
                            }
                            thead td{
                                border:none !important;
                            }
                        </style>
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table width="100%" class="table table-striped color-table info-table">
                                        <thead>
                                            <tr>
                                                <th class="header_laporan" align="center" rowspan='2'>NO</th>
                                                <th class="header_laporan" align="center" colspan='2'>KEBERANGKATAN</th>
                                                <th class="header_laporan" align="center" rowspan='2'>PAKET UMROH</th>
                                                <th class="header_laporan" align="center" rowspan='2'>NAMA LENGKAP</th>
                                                <th class="header_laporan" align="center" rowspan='2'>SEX</th>
                                                <th class="header_laporan" align="center" rowspan='2'>TEMPAT LAHIR</th>
                                                <th class="header_laporan" align="center" rowspan='2'>TANGGAL LAHIR</th>
                                                <th class="header_laporan" align="center" rowspan='2'>USIA</th>
                                                <th class="header_laporan" align="center" rowspan='2'>NO KTP</th>
                                                <th class="header_laporan" align="center" rowspan='2'>ALAMAT LENGKAP</th>
                                                <th class="header_laporan" align="center" rowspan='2'>NO HP</th>
                                                <th class="header_laporan" align="center" rowspan='2'>MARITAL STATUS</th>
                                                <th class="header_laporan" align="center" rowspan='2'>WOG</th>
                                                <th class="header_laporan" align="center" rowspan='2'>MAHROM</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>ROOM</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>NO PASSPOR</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>ISSUE</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>EXPIRED</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>PLACE OF ISSUED</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>MARKETING</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>NAMA AYAH</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>NAMA IBU</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>NAMA KAKEK</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>PENDIDIKAN</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>PEKERJAAN</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>STATUS</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>Agen</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>PJ BERKAS</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>PASSPOR</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>KTP</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>KK</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>SURAT NIKAH</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>AKTE</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>VAKSIN</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>FOTO 4x6</th>	
                                                <th class="header_laporan" align="center" rowspan='2'>BIOMETRIK</th>
                                            </tr>
                                            <tr>
                                                <th class="header_laporan" align="center">PLAN</th>
                                                <th class="header_laporan" align="center">AKTUAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                                            var no=1;var det='';
                                            for (var x=0;x<data.length;x++)
                                            {
                                                var line2 = data[x];
                                              
                                                det+=`<tr>
                                                <td align='center' class='isi_laporan'>`+no+`</td>
                                                <td  class='isi_laporan'>`+line2.tgl_berangkat+`</td>
                                                <td class='isi_laporan'>`+line2.tgl_aktual+`</td>
                                                <td class='isi_laporan'>`+line2.nama_paket+`</td>
                                                <td class='isi_laporan'>`+line2.nama+`</td>
                                                <td  class='isi_laporan'>`+line2.jk+`</td>
                                                <td  class='isi_laporan'>`+line2.tempat+`</td>
                                                <td  class='isi_laporan'>`+line2.tgl_lahir+`</td>
                                                <td class='isi_laporan'>`+line2.usia+`</td>
                                                <td class='isi_laporan'>`+line2.id_peserta+`</td>
                                                <td class='isi_laporan'>`+line2.alamat+`</td>
                                                <td  class='isi_laporan'>`+line2.hp+`</td>
                                                <td  class='isi_laporan'>`+line2.brkt_dgn+`</td>
                                                <td  class='isi_laporan'>-</td>
                                                <td class='isi_laporan'>-</td>
                                                <td class='isi_laporan'>`+line2.nama_room+`</td>
                                                <td class='isi_laporan'>`+line2.nopass+`</td>
                                                <td  class='isi_laporan'>`+line2.issued+`</td>
                                                <td  class='isi_laporan'>`+line2.ex_pass+`</td>
                                                <td class='isi_laporan'>`+line2.kantor_mig+`</td>
                                                <td class='isi_laporan'>`+line2.nama_marketing+`</td>
                                                <td class='isi_laporan'>`+line2.ayah+`</td>
                                                <td  class='isi_laporan'>`+line2.ibu+`</td>
                                                <td  class='isi_laporan'>`+line2.kakek+`</td>
                                                <td class='isi_laporan'>`+line2.pendidikan+`</td>
                                                <td  class='isi_laporan'>`+line2.pekerjaan+`</td>
                                                <td  class='isi_laporan'>`+line2.status+`</td>
                                                <td  class='isi_laporan'>`+line2.agen+`</td>
                                                <td  class='isi_laporan'>&nbsp;</td>
                                                <td  class='isi_laporan'>&nbsp;</td>
                                                <td  class='isi_laporan'>&nbsp;</td>
                                                <td  class='isi_laporan'>&nbsp;</td>
                                                <td  class='isi_laporan'>&nbsp;</td>
                                                <td  class='isi_laporan'>&nbsp;</td>
                                                <td  class='isi_laporan'>&nbsp;</td>
                                                <td  class='isi_laporan'>&nbsp;</td>
                                                <td  class='isi_laporan'>&nbsp;</td>
                                                </tr>`;	
                                                no++;
                                            
                                                
                                            }
                                            mon_html+=det+`
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table><br>
                    <div style="page-break-after:always"></div>`;
                        
               mon_html+="</div>"; 
            }
            
        $('#canvasPreview').html(mon_html);
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
    }
</script>
