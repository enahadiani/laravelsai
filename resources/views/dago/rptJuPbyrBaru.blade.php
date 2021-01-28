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
       saiPost('dago-report/lap2-jurnal', null, formData, null, function(res){
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
        console.log(data)
        console.log(data.length);
        if(data.length > 0){
            if(res.back){
                var back= `<div class="row mb-2">
                    <div class="col-md-12 pull-right">
                    <button type="button" class="btn btn-secondary ml-2" id="btn-back" style="float:right;"><i class="fa fa-undo"></i> Back</button></div></div>`;
            }else{
                var back= ``;
            }

            if(res.back){
                var back= `<button type="button" class="btn btn-secondary ml-2" id="btn-back" style="float:right;">
                <i class="fa fa-undo"></i> Back</button>`;
            }else{
                var back= ``;
            }
            var html = `<div>
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .table-bordered td{
                    border: 1px solid #e9ecef !important;
                }
                .bold {
                    font-weight:bold;
                }
                .bordered{
                    border: 1px solid #e9ecef !important;
                }
            </style>
            `+back;
            var lokasi = res.lokasi;
            for(var i=0;i<data.length;i++){
                var line = data[i];
                html+=`
                    <table width='100%'  border='0' cellspacing='2' cellpadding='1'>
                    <tr>
                        <tr>
                            <td class='style16 bold' colspan="6" rowspan="2" style='font-size:16px;vertical-align:top' width="80%">`+lokasi+`</td>
                            <td align='center' class='bordered' width="40%">`+line.no_bukti+`</td>
                        </tr>
                        <tr>
                            <td align='center' class='bordered'>`+line.tgl+`</td>
                        </tr>
                        <tr>
                            <td align='center' class='' colspan='6'>&nbsp;</td>
                        </tr>
                    </tr>
                    </table>
                    <table width='100%' class='table table-bordered color-table info-table'>
                    <thead>
                    <tr>
                        <td width='30' class='bold'>NO</td>
                        <td width='100' class='bold'>KODE AKUN </td>
                        <td width='200' class='bold'>NAMA AKUN </td>
                        <td width='270' class='bold'>KETERANGAN</td>
                        <td width='60' class='bold'>PP</td>
                        <td width='100' class='bold'>DEBET</td>
                        <td width='100' class='bold'>KREDIT</td>
                    </tr>
                    </thead>
                    <tbody>`;
                   
                        var x=1;
                        var tot_debet=0;
                        var tot_kredit=0;
                        var debet =0;
                        var kredit =0;
                        var det ='';
                        for (var a=0; a<res.detail_jurnal.length;a++)
                        {
                            var line2 = res.detail_jurnal[a];
                            if(line2.no_bukti == line.no_bukti){

                                debet=sepNum(parseFloat(line2.debet));
                                kredit=sepNum(parseFloat(line2.kredit));
                                tot_debet=tot_debet+parseFloat(line2.debet);
                                tot_kredit=tot_kredit+parseFloat(line2.kredit);
                                det+=`<tr>
                                    <td class='isi_laporan' align='center'>`+x+`</td>
                                    <td class='isi_laporan'>`+line2.kode_akun+`</td>
                                    <td class='isi_laporan'>`+line2.nama_akun+`</td>
                                    <td class='isi_laporan'>`+line2.keterangan+`</td>
                                    <td class='isi_laporan' align='center'>`+line2.kode_pp+`</td>
                                    <td class='isi_laporan' align='right'>`+debet+`</td>
                                    <td class='isi_laporan' align='right'>`+kredit+`</td>
                                </tr>`;
                            }
                                x=x+1;
                        }
                        tot_debet1=sepNum(tot_debet);
                        tot_kredit1=sepNum(tot_debet);
                    html+=det+`<tr>
                
                    <td colspan='5' class='header_laporan' align='right'>Total</td>
                    <td class='isi_laporan' align='right'>`+tot_debet1+`</td>
                    <td class='isi_laporan' align='right'>`+tot_kredit1+`</td>
                </tr>
                    </tbody>
                    </table>
                    <table class='table table-borderless float-right' style='width:60%'>
                        <tr>
                            <td colspan="5" width="50%">&nbsp;</td>
                            <td width='25%' align='center' class="bordered">Dibuat Oleh : </td>
                            <td width='25%' align='center' class="bordered">Diperiksa Oleh : </td>
                        </tr>
                        <tr>
                            <td colspan="5" width="50%">&nbsp;</td>
                            <td align='center' class="bordered">Paraf &amp; Tanggal </td>
                            <td align='center' class="bordered">Paraf &amp; Tanggal </td>
                            </tr>
                        <tr>
                            <td colspan="5" width="50%">&nbsp;</td>
                            <td height='80' class="bordered">&nbsp;</td>
                            <td class="bordered">&nbsp;</td>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                <DIV style='page-break-after:always'></DIV>`;

            }

                        
            html+="</div>";
            }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
    }
</script>
