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
       saiPost('dago-report/lap2-pembayaran', null, formData, null, function(res){
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
            if(res.res.back){
                var back= `<div class="row mb-2">
                    <div class="col-md-12 pull-right">
                    <button type="button" class="btn btn-secondary ml-2" id="btn-back" style="float:right;"><i class="fa fa-undo"></i> Back</button></div></div>`;
            }else{
                var back= ``;
            }

            var mon_html = `<div align='center' style='padding:10px' id='sai-rpt-table-export-tbl-daftar-reg'>
                    `+back;
                    var foto = "{{ asset('asset_elite/images/dago.png') }}";
                    var arr_tl = [0,0,0,0,0,0,0,0,0];
                    var x=1;
                    for(var i=0;i<data.length;i++){
                        var line = data[i];
                        mon_html +=`
                        <style>
                            td,th{
                                padding:4px !important;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-body printableArea">
                                    <h3 class='text-left'><b>KUITANSI</b> <span class="pull-right">#`+line.no_kb+`</span></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <address>
                                                    <div class="row">
                                                        <div class="col-6 text-left"><img src="`+foto+`" width="150" height="90"></div>
                                                        <div class="col-6 text-right">
                                                        Jl. Puter No. 7 Bandung<br>
                                                        Tlp. 022-2500307, 022-2531259,<br>02517062
                                                        </div>
                                                    </div>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive m-t-40" style="clear: both;">
                                                <table class="table no-border">
                                                    <tbody>
                                                        <tr>
                                                            <td width="154">TANGGAL BAYAR</td>
                                                            <td width="244" colspan='2'>: `+reverseDateNew(line.tgl_bayar,'-','/')+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>STATUS BAYAR</td>
                                                            <td colspan='2'>: `+line.sistem_bayar+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AKUN</td>
                                                            <td colspan='2'>: `+line.nama_akun+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>DITERIMA DARI</td>
                                                            <td colspan='2'>: `+line.peserta+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NO TELP</td>
                                                            <td colspan='2'>: `+line.telp+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PAKET / ROOM</td>
                                                            <td colspan='2'>: `+line.paket+` / `+line.room+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>HARGA PAKET </td>
                                                            <td colspan='2'>: `+line.kode_curr+` `+sepNumPas(line.harga_paket)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>KEBERANGKATAN </td>
                                                            <td colspan='2'>: `+reverseDateNew(line.jadwal,'-','/')+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>MARKETING</td>
                                                            <td colspan='2'>: `+line.nama_marketing+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AGEN / REFERAL</td>
                                                            <td colspan='2'>:  `+line.nama_agen+` / `+line.referal+`</td>
                                                        </tr>
                                                        <tr><td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" align="center"><b>DATA PEMBAYARAN</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-top:1px dotted black;border-bottom:1px dotted black" width="154">BIAYA PAKET (RP) </td>
                                                            <td style="border-top:1px dotted black;border-bottom:1px dotted black" width="244" colspan='2'>: `+sepNumPas(line.biaya_paket)+` - KURS : `+sepNumPas(line.kurs)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SISTEM PEMBAYARAN</td>
                                                            <td colspan='2'>: Cicilan Ke-`+line.cicil_ke+`</td>
                                                        </tr>`;
                                                    if(line.kode_curr == "IDR"){
                                                        mon_html+=`
                                                                <tr>
                                                                    <td>SALDO </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+sepNumPas(line.saldo)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TOTAL BAYAR </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+sepNumPas(line.bayar)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TERBILANG </td>
                                                                    <td width="300" colspan='2'>: `+terbilang(line.bayar)+` `+terbilang2(line.kode_curr)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SISA </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+sepNumPas(line.sisa)+`</td>
                                                                </tr>`;
                                                    }else{
                                                        mon_html+=`
                                                                <tr>
                                                                    <td>SALDO </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+format_number2(line.saldo)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TOTAL BAYAR </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+format_number2(line.bayar)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TERBILANG </td>
                                                                    <td width="300" colspan='2'>: `+terbilangkoma(line.bayar)+` `+terbilang2(line.kode_curr)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SISA </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+format_number2(line.sisa)+`</td>
                                                                </tr>`;
                                                    }
                                                    mon_html+=` 
                                                        <tr>
                                                            <td>DIINPUT OLEH </td>
                                                            <td colspan='2'>: `+line.nik_user+` </td>
                                                        </tr>
                                                        <tr><td colspan='3'>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    <tr>
                                                        <td align="center" style="width:30%">Customer</td>
                                                        <td align="center" style="width:30%"></td>
                                                        <td align="center" style="width:40%">Keuangan</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="">&nbsp;</td>
                                                        <td style="">&nbsp;</td>
                                                        <td style="">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="center">`+line.peserta+`</td>
                                                        <td>&nbsp;</td>
                                                        <td align="center">-------------------------</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="center">KEU/DWI/FORM/001</td>
                                                        <td align="center">Rev 0.0</td>
                                                        <td align="center">Tanggal `+line.tgl_bayar.substr(8,2)+` `+getNamaBulan(line.tgl_bayar.substr(5,2))+` `+line.tgl_bayar.substr(0,4)+`</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><DIV style='page-break-after:always'></DIV>`;
                                
                    }
               mon_html+=`</div>`;
            }
            console.log(mon_html);
        $('#canvasPreview').html(mon_html);
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
    }
</script>
