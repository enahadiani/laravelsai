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
            var beban = ['Beban Administrasi dan Umum','Beban Pelayanan Kesehatan','Beban Investasi','Beban SDM','Beban Administrasi dan Umum','Beban Pelayanan Kesehatan','Beban Investasi','Beban SDM'];
            var html = `
            <style>
            .info-table thead{
                background:#4286f5;
                color:white;
            }
            .no-border {
                border: none !important;
            }
            .bold {
                font-weight:bold;
            }
            .report-table td, .report-table th{
                border-color: black !important; 
                vertical-align: middle;
                padding-top:0 !important;
                padding-bottom:0 !important;
                color: black !important;
            }   
            .bg-green2 {
                background: #70AD478A;
            } 
            </style>`;
            for(var i=0; i< beban.length; i++){

                html+=`
                <table class='table table-bordered report-table' width='100%'>
                <tr>
                    <th colspan='5' class='no-border'>`+beban[i]+`</th>
                </tr>
                <tr>
                    <th width='10%' class='bg-green2'>KD AKUN</th>
                    <th width='45%' class='bg-green2'>NAMA AKUN</th>
                    <th width='15%' class='bg-green2'>YTD 0819</th>
                    <th width='15%' class='bg-green2'>YTD 0820</th>
                    <th width='15%' class='bg-green2'>SELISIH</th>
                </tr>
                </table>`;
            }
        // }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   