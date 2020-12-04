<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-claim-bpjs') }}", null, formData, null, function(res){
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
            </style>
            <table class='table table-bordered report-table' width='100%'>
            <tr>
                <td colspan='10' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='24%' rowspan='2' class='text-center bg-blue1'>Layanan</th>
                <th width='10%' rowspan='2' class='text-center bg-blue1'>KP</th>
                <th width='56%' colspan='7' class='text-center bg-blue1'>Area</th>
                <th width='10%' rowspan='2' class='text-center bg-blue1'>Total</th>
            </tr>
            <tr>
                <th width='8%' class='text-center bg-blue1'>I</th>
                <th width='8%' class='text-center bg-blue1'>II</th>
                <th width='8%' class='text-center bg-blue1'>III</th>
                <th width='8%' class='text-center bg-blue1'>IV</th>
                <th width='8%' class='text-center bg-blue1'>V</th>
                <th width='8%' class='text-center bg-blue1'>VI</th>
                <th width='8%' class='text-center bg-blue1'>VII</th>
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
   