<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-real-beban') }}", null, formData, null, function(res){
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
            var bulan = periode.substr(4,2);
            var th = tahun.toString().substr(2,2);
            var thseb = tahunseb.toString().substr(2,2);
            var html = `
            <style>

            .report-table th{
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
            .report-table .no-border{
                border: 0px !important;
                border-bottom:1px solid black !important;
            }
            .bold{
                font-weight:bold !important;
            }

            .report-table td, .report-table th{
                border-color: black !important; 
                vertical-align: middle;
            }  
            .bg-greenold {
                background: #288372;
                color:white;
            }  
            </style>`;
            for(var i=0; i< data.length; i++){
                var line = data[i];
                html+=`
                <table class='table table-bordered report-table' width='100%'>
                <tr>
                    <td colspan='5' class='no-border bold'>`+line.nama+`</td>
                </tr>
                <tr>
                    <th width='10%' class='bg-greenold'>KD AKUN</th>
                    <th width='45%' class='bg-greenold'>NAMA AKUN</th>
                    <th width='15%' class='bg-greenold'>YTD `+bulan+``+th+`</th>
                    <th width='15%' class='bg-greenold'>YTD `+bulan+``+thseb+`</th>
                    <th width='15%' class='bg-greenold'>SELISIH</th>
                </tr>`;
                var det = ``;
                for(var j=0; j < res.res.detail.length; j++){
                    var line2 = res.res.detail[j];
                    if(line2.kode_klpakun == line.kode_klpakun){
                        det+=`
                        <tr>
                            <td width='10%' >`+line2.kode_akun+`</td>
                            <td width='45%' >`+line2.nama+`</td>
                            <td width='15%' class='text-right'>`+sepNum(line2.rea_now)+`</td>
                            <td width='15%' class='text-right'>`+sepNum(line2.rea_bef)+`</td>
                            <td width='15%' class='text-right'>`+sepNum(line2.selisih)+`</td>
                        </tr>  
                        `;
                    }
                }
                html+=det+`
                </table>`;
            }
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   