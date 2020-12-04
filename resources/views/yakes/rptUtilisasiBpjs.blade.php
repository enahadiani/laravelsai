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
                <td colspan='2' class='no-border bold'>CLAIM PENSIUN</td>
                <td colspan='3' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='60%' rowspan='2' class='text-center bg-blue1'>Keterangan</th>
                <th width='10%' rowspan='2' class='text-center bg-blue1'>OKT 2020</th>
                <th width='10%' rowspan='2' class='text-center bg-blue1'>OKT 2019</th>
                <th width='20%' colspan='2' class='text-center bg-blue1'>YoY</th>
            </tr>
            <tr>
                <th width='10%' class='text-center bg-blue1'>Nilai</th>
                <th width='10%' class='text-center bg-blue1'>%</th>
            </tr>
            </table>
            <table class='table table-bordered report-table' width='100%'>
            <tr>
                <td colspan='2' class='no-border bold'>CLAIM PEGAWAI</td>
                <td colspan='3' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='60%' rowspan='2' class='text-center bg-blue1'>Keterangan</th>
                <th width='10%' rowspan='2' class='text-center bg-blue1'>OKT 2020</th>
                <th width='10%' rowspan='2' class='text-center bg-blue1'>OKT 2019</th>
                <th width='20%' colspan='2' class='text-center bg-blue1'>YoY</th>
            </tr>
            <tr>
                <th width='10%' class='text-center bg-blue1'>Nilai</th>
                <th width='10%' class='text-center bg-blue1'>%</th>
            </tr>
            </table>
            <table class='table table-bordered report-table' width='100%'>
            <tr>
                <td colspan='2' class='no-border bold'>CLAIM TOTALd>
                <td colspan='3' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='60%' rowspan='2' class='text-center bg-blue1'>Keterangan</th>
                <th width='10%' rowspan='2' class='text-center bg-blue1'>OKT 2020</th>
                <th width='10%' rowspan='2' class='text-center bg-blue1'>OKT 2019</th>
                <th width='20%' colspan='2' class='text-center bg-blue1'>YoY</th>
            </tr>
            <tr>
                <th width='10%' class='text-center bg-blue1'>Nilai</th>
                <th width='10%' class='text-center bg-blue1'>%</th>
            </tr>
            </table>`;
        // }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   