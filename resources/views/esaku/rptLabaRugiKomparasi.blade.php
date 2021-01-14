<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('esaku-report/lap-labarugi-komparasi') }}", null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
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
            periode = $periode;
            periode2 = $periode2;
            var html = `
            <style>
            .info-table thead{
                background:#4286f5;
                color:white;
            }
            .no-border td{
                border:0 !important;
            }
            .bold {
                font-weight:bold;
            }
            </style>`+judul_lap("LAPORAN LABA RUGI",lokasi,'Untuk Periode yang berakhir pada '+res.tgl_akhir)+`
            <table class='table table-bordered'>
            <tr>
                <th width='60%' height='25'  class='header_laporan'><div align='center'>Deskripsi</div></th>
                <th width='20%' class='header_laporan' align='center'>`+periode.from+`</th>
                <th width='20%' class='header_laporan' align='center'>`+periode2.from+`</th>
            </tr>`;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                var nilai1="";
                var nilai2="";
                var line = data[i];
                if (line.tipe!="Header" && line.nama!="." && line.nama!="" )
                {
                    nilai1=sepNum(parseFloat(line.n1));
                    nilai2=sepNum(parseFloat(line.n2));
                }
                html+="<tr><td height='20' class='isi_laporan'>"+fnSpasi(line.level_spasi)+" "+line.nama+"</td>";
                if (line.tipe=="Posting" && line.n1 != 0)
                {
                    html+=`
                    <td class='report-link neraca-lajur text-right' style='cursor:pointer;color:blue' data-kode_neraca='`+line.kode_neraca+`'>`+nilai1+`</td>`;
                }
                else
                {
                    html+=`<td class='text-right' >`+nilai1+`</td>`;
                }
                if (line.tipe=="Posting" && line.n2 != 0)
                {
                    html+=`
                    <td class='report-link neraca-lajur text-right' style='cursor:pointer;color:blue' data-kode_neraca='`+line.kode_neraca+`'>`+nilai2+`</td>`;
                }
                else
                {
                    html+=`<td class='text-right' >`+nilai2+`</td>`;
                }
                html+=`
                </tr>`;
                no++;
            }
            html+=`
            </table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   