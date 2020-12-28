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
                <td colspan='12' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='27%' rowspan='2' class='bg-blue3'>URAIAN</th>
                <th width='8%' class='bg-blue3'>RKA</th>
                <th width='8%' class='bg-blue3'>RKA</th>
                <th width='16%' colspan='2' class='bg-blue3'>REAL YTD</th>
                <th width='15%' colspan='3' class='bg-blue3'>PRESENTASE</th>
                <th width='8%' class='bg-blue3'>REAL</th>
                <th width='18%' colspan='3' class='bg-blue3'>OUTLOOK</th>
            </tr>
            <tr>
                <th width='12%' class='bg-blue3'>2020</th>
                <th width='12%' class='bg-blue3'>SD 0KT</th>
                <th width='12%' class='bg-blue3'>OKT 2020</th>
                <th width='12%' class='bg-blue3'>OKT 2019</th>
                <th width='12%' class='bg-blue3'>RKA</th>
                <th width='12%' class='bg-blue3'>OKT</th>
                <th width='12%' class='bg-blue3'>YoY</th>
                <th width='12%' class='bg-blue3'>2019</th>
                <th width='12%' class='bg-blue3'>2020</th>
                <th width='12%' class='bg-blue3'>ACH[%]</th>
                <th width='12%' class='bg-blue3'>YoY[%]</th>
            </tr>
            <tr>
                <th width='6%' class='bg-grey'></th>
                <th width='6%' class='bg-grey'>1</th>
                <th width='12%' class='bg-grey'>2</th>
                <th width='12%' class='bg-grey'>3</th>
                <th width='12%' class='bg-grey'>4</th>
                <th width='12%' class='bg-grey'>5=3/1</th>
                <th width='12%' class='bg-grey'>6=3/2</th>
                <th width='12%' class='bg-grey'>7=(3/4)-1</th>
                <th width='12%' class='bg-grey'>8</th>
                <th width='12%' class='bg-grey'>9</th>
                <th width='12%' class='bg-grey'>10=9/1</th>
                <th width='12%' class='bg-grey'>11=(9/8)-1</th>
            </tr>
            `;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                 var n1="";
                 var line = data[i];
                 if (line.tipe!="Header")
                 {
                    n1=sepNum(parseFloat(line.n1));
                    n2=sepNum(parseFloat(line.n2));
                    n3=sepNum(parseFloat(line.n3));
                    n4=sepNum(parseFloat(line.n4));
                    n5=sepNum(parseFloat(line.n5));
                    n6=sepNum(parseFloat(line.n6));
                    n7=sepNum(parseFloat(line.n7));
                    n8=sepNum(parseFloat(line.n8));
                 }
                var persen1="";
                var persen2="";
                var persen3="";

                     html+=`<tr class='report-link neraca-lajur report-table table-striped table-bordered' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' >
                     <td width='52%' height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n1+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n2+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n4+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n5+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen1+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen2+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen3+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n4+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n5+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen1+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen2+`</div></td>

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
   