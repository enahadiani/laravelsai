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

    function sepNum2(x,koma = 2){
        if(!isNaN(x)){
            if (typeof x === undefined || !x || x == 0) { 
                return 0;
            }else if(!isFinite(x)){
                return 0;
            }else{
                var x = parseFloat(x).toFixed(koma);
                var parts = x.toString().split('.');
                parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
                return parts.join(',');
            }
        }else{
            return 0;
        }
    }

    function format_number2(x){
        var num = parseFloat(x).toFixed(2);
        var parts = x.toString().split('.');
        if(parts[1] != undefined){
            if(parts[1] != 0 && parts[2] != 0){
                num = sepNum2(num,2);
            }else{
                num = sepNum2(num,0);
            }
        }else{
            num = sepNum2(num,0);
        }
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
        console.log(res.lokasi);
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
            var html = `<style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
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
            </style>
            `+back;
            
            html+= `
            <div style='border-bottom: double #d7d7d7;padding:0 3rem' class='mt-4'>
                <table class="borderless mb-2 table-kop-prev" width="100%" >
                    <tr>
                        <td width="25%" colspan="5" class="vtop"><h4 class="text-primary bold">BUKTI JURNAL</h4></td>
                        <td width="75%" colspan="3" class="vtop text-right"><h4 class="mb-2 bold">`+res.res.lokasi[0].nama+`</h4><p class="lh1">`+res.res.lokasi[0].alamat+`<br>`+res.res.lokasi[0].kota+` `+res.res.lokasi[0].kodepos+` </p><p class="mt-2">`+res.res.lokasi[0].email+` | `+res.res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>`;
            for(var a=0;a<data.length;a++){
                var line = data[a];
                html+=`
                <div style="padding:0 3rem">
                    <table class="borderless table-header-prev mt-2" width="100%">
                        <tr>
                            <td width="14%">Tanggal</td>
                            <td width="1%">:</td>
                            <td width="54%" colspan="3">`+data[0].tgl+`</td>
                            <td width="10%" rowspan="3" style="vertical-align:top !important">Deskripsi</td>
                            <td width="1%" rowspan="3" style="vertical-align:top !important">:</td>
                            <td width="20%" rowspan="3" style="vertical-align:top !important">`+data[0].keterangan+`</td>
                        </tr>
                        <tr>
                            <td width="14%">No Transaksi</td>
                            <td width="1%">:</td>
                            <td width="54%" colspan="3">`+data[0].no_bukti+`</td>
                        </tr>
                        <tr>
                            <td width="14%">No Dokumen</td>
                            <td width="1%">:</td>
                            <td width="54%" colspan="3">`+data[0].no_dokumen+`</td>
                        </tr>
                    </table>
                </div>
                <div style="padding:0 3.1rem">
                    <table class="table table-striped table-body-prev mt-2" width="100%">
                        <tr style="background: #4286f5 !important;color:white !important">
                            <th style="width:15%" colspan="2">Kode Akun</th>
                            <th style="width:20%">Nama Akun</th>
                            <th style="width:10">Nama PP</th>
                            <th style="width:25%">Keterangan</th>
                            <th style="width:15%" colspan="2">Debet</th>
                            <th style="width:15%">Kredit</th>
                        </tr>`;
                        var det = '';
                        var total_debet = 0; var total_kredit =0;
                        var no=1;
                        for(var i=0;i<line.detail.length;i++){
                            var line2 =line.detail[i];
                            
                            total_debet+=parseFloat(line2.debet);
                            total_kredit+=parseFloat(line2.kredit);
                            det += "<tr>";
                            det += "<td colspan='2'>"+line2.kode_akun+"</td>";
                            det += "<td >"+line2.nama_akun+"</td>";
                            det += "<td >"+line2.nama_pp+"</td>";
                            det += "<td >"+line2.keterangan+"</td>";
                            det += "<td class='text-right' colspan='2'>"+format_number2(line2.debet)+"</td>";
                            det += "<td class='text-right'>"+format_number2(line2.kredit)+"</td>";
                            det += "</tr>";
                            no++;
                        }
                        det+=`<tr style="background: #4286f5 !important;color:white !important">
                        <th colspan="5"></th>
                        <th style="width:10%" class="text-right" colspan="2">`+format_number2(total_debet)+`</th>
                        <th style="width:10%" class="text-right">`+format_number2(total_kredit)+`</th>
                        </tr>`;
                        html+=det+`
                    </table>
                    <table class="table-borderless mt-2" width="100%">
                        <tr>
                            <td width="60%" colspan="5">&nbsp;</td>
                            <td width="20%" class="text-center" colspan="2">Dibuat Oleh</td>
                            <td width="20%" class="text-center">Diperiksa Oleh</td>
                        </tr>
                        <tr>
                            <td width="60%" colspan="5">&nbsp;</td>
                            <td width="20%" style="height:100px" colspan="2"></td>
                            <td width="20%" style="height:100px"></td>
                        </tr>
                    </table>
                </div>
                <br>
                `;
                if(a != (data.length - 1)){
                    html+=`<div class='separator2 mb-4'></div>`;
                }
                html+=`
                <DIV style='page-break-after:always'></DIV>
                `; 
            }

                        
            html+="</div>";
            }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
    }
</script>
