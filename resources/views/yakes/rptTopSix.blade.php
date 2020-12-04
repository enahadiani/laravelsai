<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-top-six') }}", null, formData, null, function(res){
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
                    background-color: #00B050 !important;
                    border: 0 !important;
                    text-align: center;
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                }
                .report-table2 th{
                    color: white !important;
                    background-color: #00B0F0 !important;
                    border: 0 !important;
                    text-align: center;
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
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
                    <th width='16%' colspan='2'>YoY</th>
                    <th width='16%' colspan='2'>Rata-rata(Rp. Juta)</th>
                </tr>
                <tr>
                    <th width='8%'>Q2'19</th>
                    <th width='8%'>Q2'20</th>
                    <th width='8%'>Q2'19</th>
                    <th width='8%'>Q2'20</th>
                    <th width='8%'>Penderita</th>
                    <th width='8%'>Biaya</th>
                    <th width='8%'>Q2'19</th>
                    <th width='8%'>Q2'20</th>
                </tr>
            </table>
            <p class='bold mt-3'>Karyawan</p>
            <table class='report-table2 table-striped table-bordered' width='100%'>
                <tr>
                    <th width='5%' rowspan='2'>No</th>
                    <th width='31%' rowspan='2'>Kelompok Penyakit</th>
                    <th width='16%' colspan='2'>Penderita</th>
                    <th width='16%' colspan='2'>Biaya (Rp. M)</th>
                    <th width='16%' colspan='2'>YoY</th>
                    <th width='16%' colspan='2'>Rata-rata(Rp. Juta)</th>
                </tr>
                <tr>
                    <th width='8%'>Q2'19</th>
                    <th width='8%'>Q2'20</th>
                    <th width='8%'>Q2'19</th>
                    <th width='8%'>Q2'20</th>
                    <th width='8%'>Penderita</th>
                    <th width='8%'>Biaya</th>
                    <th width='8%'>Q2'19</th>
                    <th width='8%'>Q2'20</th>
                </tr>
            </table>
            
            `;
        // }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   