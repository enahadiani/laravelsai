<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-rekap-real') }}", null, formData, null, function(res){
        //    if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
        //    }else{
        //         $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
        //    }
       });
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

    function fnSpasi(level)
    {
        var tmp="";
        for (var f=1; f<=level; f++)
        {
            tmp+="&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        return tmp;
    }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
         if(data.length > 0){
            res.bentuk = '';
            var lokasi = res.lokasi;
            res.data_detail = [];
            periode = $periode;

            var periode = $periode.from;
            var bln = periode.substr(4,2);
            var blnrev = parseInt(bln)-1;
            var tahun = periode.substr(0,4);
            var tahunrev = parseInt(tahun)-1;
            var periode_pilih = namaPeriode(tahun+''+bln);
            var periode_rev = namaPeriode(tahunrev+''+blnrev);

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
            <div class='table-responsive'>
            <table class='table table-bordered report-table' width='100%'>
            <tr>
                <th style='width:400px' rowspan='3' class='bg-blue3'>URAIAN</th>
                <th  class='bg-blue3'>RKA</th>
                <th  class='bg-blue3'>RKA</th>
                <th  colspan='2' class='bg-blue3'>REAL YTD</th>
                <th  colspan='3' class='bg-blue3'>PRESENTASE</th>
                <th class='bg-blue3'>REAL</th>
                <th  colspan='3' class='bg-blue3'>OUTLOOK</th>
                <th  colspan='2' class='bg-blue3'>USULAN</th>
            </tr>
            <tr>
                <th style='width:90px' class='bg-blue3'>`+tahun+`</th>
                <th style='width:90px' class='bg-blue3'>`+periode_pilih+` </th>
                <th style='width:90px' class='bg-blue3'>`+periode_pilih+` `+tahun+`</th>
                <th style='width:90px' class='bg-blue3'>`+periode_pilih+` `+tahunrev+`</th>
                <th style='width:90px' class='bg-blue3'>RKA</th>
                <th style='width:90px' class='bg-blue3'>`+periode_pilih+`</th>
                <th style='width:90px' class='bg-blue3'>YoY</th>
                <th style='width:90px' class='bg-blue3'>`+tahunrev+`</th>
                <th style='width:90px' class='bg-blue3'>`+tahun+`</th>
                <th style='width:90px' class='bg-blue3'>ACH[%]</th>
                <th style='width:90px' class='bg-blue3'>YoY[%]</th>
                <th style='width:90px' class='bg-blue3'>`+tahunrev+`</th>
                <th style='width:90px' class='bg-blue3'>YoY[%]</th>
            </tr>
            <tr>
                <th class='bg-grey'>1</th>
                <th  class='bg-grey'>2</th>
                <th  class='bg-grey'>3</th>
                <th  class='bg-grey'>4</th>
                <th  class='bg-grey'>5=3/1</th>
                <th  class='bg-grey'>6=3/2</th>
                <th  class='bg-grey'>7=(3/4)-1</th>
                <th  class='bg-grey'>8</th>
                <th  class='bg-grey'>9</th>
                <th  class='bg-grey'>10=9/1</th>
                <th  class='bg-grey'>11=(9/8)-1</th>
                <th  class='bg-grey'>12</th>
                <th  class='bg-grey'>13=(12/9)-1</th>
            </tr>
            `;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                 var n1="";
                 var line = data[i];
                 var persen1=0;
                        var persen2=0;
                        var persen3=0;
                        var persen4=0;
                        var persen5=0;
                        var persen6=0;

                        if (parseFloat(line.n1)!=0)
                        {
                            persen1=(parseFloat(line.n4)/parseFloat(line.n1))*100;
                        }
                        if (parseFloat(line.n2)!=0)
                        {
                            persen1=(parseFloat(line.n4)/parseFloat(line.n2))*100;
                        }
                        if (parseFloat(line.n5)!=0)
                        {
                            persen1=(parseFloat(line.n4)/parseFloat(line.n5)-1)*100;
                        }
                        if (parseFloat(line.n1)!=0)
                        {
                          
                            persen4=(parseFloat(line.n8)/parseFloat(line.n1))*100;
                        }
                        if (parseFloat(line.n7)!=0)
                        {
                          
                            persen5=(parseFloat(line.n8)/parseFloat(line.n7))*100;
                        }
                        if (parseFloat(line.n8)!=0)
                        {
                          
                            persen6=(parseFloat(line.n9)/parseFloat(line.n8))*100;
                        }

                     html+=`<tr class='report-link neraca-lajur report-table table-striped table-bordered' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' >
                     <td width='52%' height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                     <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n1))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n2))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n4))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n5))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen1))+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen2))+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen3))+`%</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n7))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n8))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen4))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen5))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n9))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen6))+`</td>
                     </tr>`;
                
                 no++;
            }
            html+=`
            </table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   