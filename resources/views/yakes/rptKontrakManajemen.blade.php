<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-sdm-culture') }}", null, formData, null, function(res){
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
                .report-table th{
                    color: white !important;
                    background-color: black !important;
                    border-color: white !important;
                    text-align: center;
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
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
                    <th width='15%' colspan='2'>Quarter III</th>
                    <th width='12%' rowspan='2'>Realisasi Agustus</th>
                    <th width='12%' rowspan='2'>Formula</th>
                    <th width='12%' rowspan='2'>Ach Agustus</th>
                    <th width='12%' rowspan='2'>SCORE AGUSTUS</th>
                </tr>
                <tr>
                    <th width='5%'>Weight</th>
                    <th width='10%'>Target</th>
                </tr>
            </table>
            
            `;
        // }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   