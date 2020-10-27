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
       saiPost('dago-report/lap2-rekap-saldo', null, formData, null, function(res){
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

    var mon_html = `<div align='center' style='padding:10px;overflow-x:scroll;' id='sai-rpt-table-export-tbl-daftar-reg'>`;
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
                                text-align:center !important;
                            }
                            th{
                                text-align:center !important;
                            }
                        </style>
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table width="100%" class="table table-striped color-table info-table">
                                        <thead>
                                            <tr>
                                                <th class="header_laporan" align="center" rowspan='2'>NO</th>
                                                <th class="header_laporan" align="center" rowspan='2'>NO REGISTRASI</th>
                                                <th class="header_laporan" align="center" rowspan='2'>NO KTP</th>
                                                <th class="header_laporan" align="center" rowspan='2'>NO PESERTA</th>
                                                <th class="header_laporan" align="center" rowspan='2'>NAMA PESERTA</th>
                                                <th class="header_laporan" align="center" rowspan='2'>PAKET</th>
                                                <th class="header_laporan" align="center" rowspan='2'>ROOM</th>
                                                <th class="header_laporan" align="center" rowspan='2'>JADWAL KEBERANGKATAN</th>
                                                <th class="header_laporan" align="center" colspan='5'>TAGIHAN</th>
                                                <th class="header_laporan" align="center" colspan='4'>PEMBAYARAN</th>
                                                <th class="header_laporan" align="center" colspan='4'>SALDO</th>
                                            </tr>
                                            <tr>
                                                <th class="header_laporan" align="center">CURRENCY</th>
                                                <th class="header_laporan" align="center">HARGA PAKET+ROOM</th>
                                                <th class="header_laporan" align="center">BIAYA TAMBAHAN</th>
                                                <th class="header_laporan" align="center">BIAYA DOK</th>
                                                <th class="header_laporan" align="center">TOTAL</th>
                                                <th class="header_laporan" align="center">HARGA PAKET+ROOM</th>
                                                <th class="header_laporan" align="center">BIAYA TAMBAHAN</th>
                                                <th class="header_laporan" align="center">BIAYA DOK</th>
                                                <th class="header_laporan" align="center">TOTAL</th>
                                                <th class="header_laporan" align="center">HARGA PAKET+ROOM</th>
                                                <th class="header_laporan" align="center">BIAYA TAMBAHAN</th>
                                                <th class="header_laporan" align="center">BIAYA DOK</th>
                                                <th class="header_laporan" align="center">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                                            var no=1;var det='';
                                            var biaya_paket=0;
                                            var biaya_tambahan=0
                                            var biaya_dok=0;
                                            var bayar_paket=0;
                                            var bayar_tambahan=0;
                                            var bayar_dok=0;
                                            var saldo_paket=0;
                                            var saldo_tambahan=0;
                                            var saldo_dok=0;
                                            var to_tagihan=0;
                                            var to_bayar=0;
                                            var to_saldo=0;
                                            for (var x=0;x<data.length;x++)
                                            {
                                                var line2 = data[x];
                                                biaya_paket+= +parseFloat(line2.biaya_paket);
                                                biaya_tambahan+= +parseFloat(line2.biaya_tambahan);
                                                biaya_dok+= +parseFloat(line2.biaya_dok);
                                                bayar_paket+= +parseFloat(line2.bayar_paket);
                                                bayar_tambahan+= +parseFloat(line2.bayar_tambahan);
                                                bayar_dok+= +parseFloat(line2.bayar_dok);
                                                saldo_paket+= +parseFloat(line2.saldo_paket);
                                                saldo_tambahan+= +parseFloat(line2.saldo_tambahan);
                                                saldo_dok+= +parseFloat(line2.saldo_dok);
                                                to_tagihan+= +parseFloat(line2.tagihan);
                                                to_bayar+= +parseFloat(line2.bayar);
                                                to_saldo+= +parseFloat(line2.saldo); 
                                              
                                                det+=`<tr>
                                                <td align='center' class='isi_laporan'>`+no+`</td>
                                                <td  class='isi_laporan'>`+line2.no_reg+`</td>
                                                <td class='isi_laporan'>`+line2.id_peserta+`</td>
                                                <td class='isi_laporan'>`+line2.no_peserta+`</td>
                                                <td class='isi_laporan'>`+line2.nama_peserta+`</td>
                                                <td  class='isi_laporan'>`+line2.nama_paket+`</td>
                                                <td  class='isi_laporan'>`+line2.nama_room+`</td>
                                                <td  class='isi_laporan'>`+line2.tgl_berangkat+`</td>
                                                <td  class='isi_laporan'>`+line2.kode_curr+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(line2.biaya_paket)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(line2.biaya_tambahan)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(line2.biaya_dok)+`</td>
                                                <td class='isi_laporan text-right'><a class='tagihan' href='#' style='cursor:pointer;color:blue' data-no_reg='`+line2.no_reg+`'>`+sepNumPas(line2.tagihan)+`</a></td>
                                                <td  class='isi_laporan text-right'>`+sepNumPas(line2.bayar_paket)+`</td>
                                                <td  class='isi_laporan text-right'>`+sepNumPas(line2.bayar_tambahan)+`</td>
                                                <td  class='isi_laporan text-right'>`+sepNumPas(line2.bayar_dok)+`</td>
                                                <td  class='isi_laporan text-right'><a class='bayar' href='#' style='cursor:pointer;color:blue' data-no_reg='`+line2.no_reg+`'>`+sepNumPas(line2.bayar)+`</a></td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(line2.saldo_paket)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(line2.saldo_tambahan)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(line2.saldo_dok)+`</td>
                                                <td  class='isi_laporan text-right'><a class='saldo' href='#' style='cursor:pointer;color:blue' data-no_reg='`+line2.no_reg+`'>`+sepNumPas(line2.saldo)+`</a></td>
                                                </tr>`;	
                                                no++;
                                            
                                                
                                            }
                                            // console.log(bayar_paket);
                                            mon_html+=det+`
                                            <tr>
                                                <td class='isi_laporan' colspan='8' >TOTAL</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(biaya_paket)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(biaya_tambahan)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(biaya_dok)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(to_tagihan)+`</td>
                                                <td  class='isi_laporan text-right'>`+sepNumPas(bayar_paket)+`</td>
                                                <td  class='isi_laporan text-right'>`+sepNumPas(bayar_tambahan)+`</td>
                                                <td  class='isi_laporan text-right'>`+sepNumPas(bayar_dok)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(to_bayar)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(saldo_paket)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(saldo_tambahan)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(saldo_dok)+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(to_saldo)+`</td>
                                            </tr>
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
