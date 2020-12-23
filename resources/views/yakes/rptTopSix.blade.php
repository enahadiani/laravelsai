<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-top-six') }}", null, formData, null, function(res){
           if(res.result.length > 0 || res.res.data2.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
           }
       });
   }

   function spasi(menu,jum)
	{
		var dat="";;
		for (var s = 0; s < jum; s++) 
		{
	  		dat+="&nbsp;&nbsp;&nbsp;&nbsp;";
	  	}
        if (menu==".")
        { 
            menu="";
        }
		return dat+menu;
    }
    
    function sepNum2(x){
        if (typeof x === 'undefined' || !x) { 
            return 0;
        }else{
            var x = parseFloat(x).toFixed(1);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }

    function sepNumPas(x){
        if (typeof x === 'undefined' || !x) { 
            return 0;
        }else{
            var x = parseFloat(x).toFixed(0);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }

    function fnSpasi(level)
    {
        var tmp="";
        for (var f=1; f<=level; f++)
        {
            tmp+="&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        return tmp;
    }

    function toMilyar(x) {
        var nil = x / 1000000000;
        return sepNum2(nil);
    }

    function toJuta(x) {
        var nil = x / 1000000;
        return sepNum2(nil);
    }

    function namaQuarter(bulan){
        switch (bulan){
            case 1 : case '1' : case '01': bulan = "Jan"; break;
            case 2 : case '2' : case '02': bulan = "Feb"; break;
            case 3 : case '3' : case '03': bulan = "Q1"; break;
            case 4 : case '4' : case '04': bulan = "Apr"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Q2"; break;
            case 7 : case '7' : case '07': bulan = "Jul"; break;
            case 8 : case '8' : case '08': bulan = "Agu"; break;
            case 9 : case '9' : case '09': bulan = "Q3"; break;
            case 10 : case '10' : case '10': bulan = "Okt"; break;
            case 11 : case '11' : case '11': bulan = "Nov"; break;
            case 12 : case '12' : case '12': bulan = "Q4"; break;
            default: bulan = null;
        }

        return bulan;
    }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0 || res.res.data2.length){
            res.bentuk = '';
            var lokasi = res.lokasi;
            res.data_detail = [];
            var periode = $periode.from;
            var tahun = parseInt(periode.substr(0,4));
            var tahunseb = parseInt(periode.substr(0,4))-1;
            var bulan = namaQuarter(periode.substr(4,2));
            var th = tahun.toString().substr(2,2);
            var thseb = tahunseb.toString().substr(2,2);
            var html = `
            <style>
                .report-table th,.report-table2 th{
                    color: white !important;
                    background-color: #288372; !important;
                    text-align: center;
                }

                .report-table td, .report-table th, .report-table2 td, .report-table2 th{ 
                    vertical-align: middle;
                    padding-top: 4px !important;
                    padding-bottom: 4px !important;
                }  
                .bold{
                    font-weight:bold !important;
                }
            </style>
            <p class='bold'>Pensiunan</p>
            <table class='report-table table-striped table-bordered' width='100%'>
                <tr>
                    <th width='5%' rowspan='2'>No</th>
                    <th width='31%' rowspan='2'>Kelompok Penyakit</th>
                    <th width='16%' colspan='2'>Penderita</th>
                    <th width='16%' colspan='2'>Biaya (Rp. M)</th>
                    <th width='16%' colspan='2'>YoY Penderita</th>
                    <th width='16%' colspan='2'>YoY Biaya</th>
                    <th width='16%' colspan='2'>Rata-rata(Rp. Juta)</th>
                </tr>
                <tr>
                    <th width='8%'>Ytd `+bulan+`'`+thseb+`</th>
                    <th width='8%'>Ytd `+bulan+`'`+th+`</th>
                    <th width='8%'>Ytd `+bulan+`'`+thseb+`</th>
                    <th width='8%'>Ytd `+bulan+`'`+th+`</th>
                    <th width='8%'>Rp. M</th>
                    <th width='8%'>%</th>
                    <th width='8%'>Rp. M</th>
                    <th width='8%'>%</th>
                    <th width='8%'>Ytd `+bulan+`'`+thseb+`</th>
                    <th width='8%'>Ytd `+bulan+`'`+th+`</th>
                </tr>
                `;
                for(var i=0; i < data.length;i++){
                    
                    var line = data[i];
                    html+=`
                    <tr>
                        <td class='text-center'>`+line.no+`</td>
                        <td class=''>`+line.nama+`</td>
                        <td class='text-right'>`+sepNumPas(line.penderita_before)+`</td>
                        <td class='text-right'>`+sepNumPas(line.penderita_now)+`</td>
                        <td class='text-right'>`+toMilyar(line.biaya_before)+`</td>
                        <td class='text-right'>`+toMilyar(line.biaya_now)+`</td>
                        <td class='text-right'>`+sepNum2(line.yoy_jiwa_before)+`</td>
                        <td class='text-right'>`+sepNum2(line.yoy_jiwa_now)+`%</td>
                        <td class='text-right'>`+toMilyar(line.yoy_biaya_before)+`</td>
                        <td class='text-right'>`+sepNum2(line.yoy_biaya_now)+`%</td>
                        <td class='text-right'>`+toJuta(line.rata2_before)+`</td>
                        <td class='text-right'>`+toJuta(line.rata2_now)+`</td>
                    </tr>
                    `;
                }
                html+=`
            </table>
            <p class='bold mt-3'>Karyawan</p>
            <table class='report-table2 table-striped table-bordered' width='100%'>
                <tr>
                    <th width='5%' rowspan='2'>No</th>
                    <th width='31%' rowspan='2'>Kelompok Penyakit</th>
                    <th width='16%' colspan='2'>Penderita</th>
                    <th width='16%' colspan='2'>Biaya (Rp. M)</th>
                    <th width='16%' colspan='2'>YoY Penderita</th>
                    <th width='16%' colspan='2'>YoY Biaya</th>
                    <th width='16%' colspan='2'>Rata-rata(Rp. Juta)</th>
                </tr>
                <tr>
                    <th width='8%'>Ytd `+bulan+`'`+thseb+`</th>
                    <th width='8%'>Ytd `+bulan+`'`+th+`</th>
                    <th width='8%'>Ytd `+bulan+`'`+thseb+`</th>
                    <th width='8%'>Ytd `+bulan+`'`+th+`</th>
                    <th width='8%'>Rp. M</th>
                    <th width='8%'>%</th>
                    <th width='8%'>Rp. M</th>
                    <th width='8%'>%</th>
                    <th width='8%'>Ytd `+bulan+`'`+thseb+`</th>
                    <th width='8%'>Ytd `+bulan+`'`+th+`</th>
                </tr>
                `;
                for(var i=0; i < res.res.data2.length;i++){
                    
                    var line = res.res.data2[i];
                    html+=`
                    <tr>
                        <td class='text-center'>`+line.no+`</td>
                        <td class=''>`+line.nama+`</td>
                        <td class='text-right'>`+sepNumPas(line.penderita_before)+`</td>
                        <td class='text-right'>`+sepNumPas(line.penderita_now)+`</td>
                        <td class='text-right'>`+toMilyar(line.biaya_before)+`</td>
                        <td class='text-right'>`+toMilyar(line.biaya_now)+`</td>
                        <td class='text-right'>`+toMilyar(line.yoy_jiwa_before)+`</td>
                        <td class='text-right'>`+sepNum2(line.yoy_jiwa_now)+`</td>
                        <td class='text-right'>`+toMilyar(line.yoy_biaya_before)+`</td>
                        <td class='text-right'>`+sepNum2(line.yoy_biaya_now)+`</td>
                        <td class='text-right'>`+toJuta(line.rata2_before)+`</td>
                        <td class='text-right'>`+toJuta(line.rata2_now)+`</td>
                    </tr>
                    `;
                }
                html+=`
            </table>
            
            `;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   