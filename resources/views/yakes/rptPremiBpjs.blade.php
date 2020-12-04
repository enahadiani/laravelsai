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
                <td colspan='8' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <td width='16%' rowspan='2' class='text-center bg-blue1'>Bulan</td>
                <td width='36%' colspan='3' class='text-center bg-green'>Iuran Premi BPJS</td>
                <td width='48%' colspan='4' class='text-center bg-yellow'>Kapitasi</td>
            </tr>
            <tr>
                <td width='12%' class='text-center bg-green'>Kary.</td>
                <td width='12%' class='text-center bg-green'>Pensiun</td>
                <td width='12%' class='text-center bg-green'>Total</td>
                <td width='12%' class='text-center bg-yellow'>Kary.</td>
                <td width='12%' class='text-center bg-yellow'>Pensiun</td>
                <td width='12%' class='text-center bg-yellow'>Non Yakes</td>
                <td width='12%' class='text-center bg-yellow'>Total</td>
            </tr>
            <tr>
                <td width='6%' class='text-center bg-blue2'>1</td>
                <td width='12%' class='text-center bg-green'>2</td>
                <td width='12%' class='text-center bg-green'>3</td>
                <td width='12%' class='text-center bg-green'>4=2+3</td>
                <td width='12%' class='text-center bg-yellow'>5</td>
                <td width='12%' class='text-center bg-yellow'>6</td>
                <td width='12%' class='text-center bg-yellow'>7</td>
                <td width='12%' class='text-center bg-yellow'>8=5+6+7</td>
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
   