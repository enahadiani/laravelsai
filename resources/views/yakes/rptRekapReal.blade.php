<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-premi-bpjs') }}", null, formData, null, function(res){
        //    if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
        //    }else{
        //         $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
        //    }
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
        // if(data.length > 0){
            res.bentuk = '';
            var lokasi = res.lokasi;
            res.data_detail = [];
            periode = $periode;
            var html = `
            <style>
            .info-table thead{
                background:#4286f5;
                color:white;
            }
            .no-border{
                border:none !important;
            }
            .bold {
                font-weight:bold;
            }
            .report-table td, .report-table th{
                border-color: #2b9de2 !important; 
                vertical-align: middle;
                padding-top:0 !important;
                padding-bottom:0 !important;
            }  
            .report-table th.bg-grey{
                border-color: #d7d7d7 !important; 
                vertical-align: middle;
            }  
            .report-table th.bg-blue3{
                border-color: #00CCFF !important; 
                vertical-align: middle;
            }  
            .bg-blue1 {
                background: #00b7ff;
            }  
            .bg-blue2 {
                background: #00dbfff0;
            }   
            .bg-green {
                background: #92D050;
            }       
            .bg-yellow {
                background: #FFC000;
            }
            .bg-blue3 {
                background: #00CCFF;
            }
            .bg-grey {
                background: #d7d7d7;
            }
            </style>
            <table class='table table-bordered report-table' width='100%'>
            <tr>
                <td colspan='12' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='27%' rowspan='2' class='text-center bg-blue3'>URAIAN</th>
                <th width='8%' class='text-center bg-blue3'>RKA</th>
                <th width='8%' class='text-center bg-blue3'>RKA</th>
                <th width='16%' colspan='2' class='text-center bg-blue3'>REAL YTD</th>
                <th width='15%' colspan='3' class='text-center bg-blue3'>PRESENTASE</th>
                <th width='8%' class='text-center bg-blue3'>REAL</th>
                <th width='18%' colspan='3' class='text-center bg-blue3'>OUTLOOK</th>
            </tr>
            <tr>
                <th width='12%' class='text-center bg-blue3'>2020</th>
                <th width='12%' class='text-center bg-blue3'>SD 0KT</th>
                <th width='12%' class='text-center bg-blue3'>OKT 2020</th>
                <th width='12%' class='text-center bg-blue3'>OKT 2019</th>
                <th width='12%' class='text-center bg-blue3'>RKA</th>
                <th width='12%' class='text-center bg-blue3'>OKT</th>
                <th width='12%' class='text-center bg-blue3'>YoY</th>
                <th width='12%' class='text-center bg-blue3'>2019</th>
                <th width='12%' class='text-center bg-blue3'>2020</th>
                <th width='12%' class='text-center bg-blue3'>ACH[%]</th>
                <th width='12%' class='text-center bg-blue3'>YoY[%]</th>
            </tr>
            <tr>
                <th width='6%' class='text-center bg-grey'></th>
                <th width='6%' class='text-center bg-grey'>1</th>
                <th width='12%' class='text-center bg-grey'>2</th>
                <th width='12%' class='text-center bg-grey'>3</th>
                <th width='12%' class='text-center bg-grey'>4</th>
                <th width='12%' class='text-center bg-grey'>5=3/1</th>
                <th width='12%' class='text-center bg-grey'>6=3/2</th>
                <th width='12%' class='text-center bg-grey'>7=(3/4)-1</th>
                <th width='12%' class='text-center bg-grey'>8</th>
                <th width='12%' class='text-center bg-grey'>9</th>
                <th width='12%' class='text-center bg-grey'>10=9/1</th>
                <th width='12%' class='text-center bg-grey'>11=(9/8)-1</th>
            </tr>
            `;
            // var no=1;
            // for (var i=0;i < data.length;i++)
            // {
            //     var nilai="";
            //     var line = data[i];
            //     if (line.tipe!="Header")
            //     {
            //         nilai=sepNum(parseFloat(line.n4));
            //     }
			
            //     if (line.tipe=="Posting" && line.n4 != 0)
            //     {
            //         html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' >
            //         <td width='2%'></td>
            //         <td width='52%' height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
            //         <td width='18%' class='isi_laporan'><div align='right'>`+nilai+`</div></td>
            //         <td width='18%' class='isi_laporan'><div align='right'>&nbsp;</div></td>
            //         <td width='2%'></td>
            //         </tr>`;
            //     }
            //     else
            //     {
            //         html+=`<tr>
            //         <td width='2%'></td>
            //         <td width='52%' height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+line.nama+`</td>
            //         <td width='18%' class='isi_laporan'><div align='right'>`+nilai+`</div></td>
            //         <td width='18%' class='isi_laporan'><div align='right'>&nbsp;</div></td>
            //         <td width='2%'></td>
            //         </tr>`;
            //     }
            //     no++;
            // }
            html+=`
            </table>`;
        // }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   