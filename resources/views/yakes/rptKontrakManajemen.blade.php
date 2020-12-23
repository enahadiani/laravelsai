<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-kontrak-manage') }}", null, formData, null, function(res){
           if(res.result.length > 0){

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
            var x = parseFloat(x).toFixed(2);
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
            periode = $periode.from;
            var tahun = parseInt(periode.substr(0,4));
            var tahunseb = parseInt(periode.substr(0,4))-1;
            var bulan = namaQuarter(periode.substr(4,2));
            var th = tahun.toString().substr(2,2);
            var thseb = tahunseb.toString().substr(2,2);
            var html = `
            <style>
                .report-table th{
                    color: white !important;
                    background-color: #288372 !important;
                    text-align: center;
                    padding-top: 4px !important;
                    padding-bottom: 4px !important;
                }
                .report-table td{
                    padding-top: 4px !important;
                    padding-bottom: 4px !important;
                }
                .text-red{
                    color:#C00000;
                    font-weight:bold;
                }
            </style>
            <table class='report-table table-striped table-bordered' width='100%'>
                <tr>
                    <th width='2%' rowspan='2'>No</th>
                    <th width='30%' rowspan='2'>INDICATOR</th>
                    <th width='5%' rowspan='2'>Unit</th>
                    <th width='15%' colspan='2'>`+bulan+`</th>
                    <th width='12%' rowspan='2'>Realisasi `+bulan+`</th>
                    <th width='12%' rowspan='2'>Formula</th>
                    <th width='12%' rowspan='2'>Ach `+bulan+`</th>
                    <th width='12%' rowspan='2'>SCORE `+bulan+`</th>
                </tr>
                <tr>
                    <th width='5%'>Weight</th>
                    <th width='10%'>Target</th>
                </tr>
                `;
                for(var i=0; i < data.length;i++){
                    
                    var line = data[i];
                    var style = (line.warna != "" ? `background:`+line.warna+` !important;color:white`: '' );
                    html+=`
                    <tr style='`+style+`'>
                        <td class='text-center'>`+line.no+`</td>
                        <td class=''>`+line.indicator+`</td>
                        <td class=''>`+line.unit+`</td>
                        <td class='text-right'>`+(line.weight == 0 ? '' : sepNumPas(line.weight))+`</td>
                        <td class='text-right'>`+(line.target == 0 ? '' : sepNum2(line.target))+`</td>
                        <td class='text-right'>`+(line.real == 0 ? '' : sepNum2(line.real))+`</td>
                        <td class='text-right'>`+(line.formula == 0 ? '' : sepNum2(line.formula)+'%')+`</td>
                        <td class='text-right'>`+(line.ach == 0 ? '' : sepNum2(line.ach)+'%')+`</td>
                        <td class='text-right'>`+(line.score == 0 ? '' : sepNum2(line.score))+`</td>
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
   