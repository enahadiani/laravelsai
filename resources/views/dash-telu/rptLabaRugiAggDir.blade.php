<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('telu-report/lap-labarugi-agg-dir') }}", null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('dash-telu/form/blank') }}");
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
            var periode = $periode.from;
            var tahun = periode.substr(0,4);
            var tahunrev = parseInt(tahun)-1;
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
            .header_laporan{
                vertical-align: middle !important;
            }
            </style>`+judul_lap("LAPORAN LABA RUGI ANGGARAN DIREKTORAT",lokasi,'Periode '+$periode.fromname)+`
            <table  class='table table-bordered' width='100%'>
            <tr>
                <th width='23%' height='25'  class='header_laporan text-center' align='center'>Keterangan</th>
                <th width='11' class='header_laporan text-center' align='center'>RKA `+tahun+`</th>
                <th width='11' class='header_laporan text-center' align='center'>RKA s.d Bulan Berjalan `+tahun+`</th>
                <th width='11' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan `+tahun+`</th>
                <th width='11' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan `+tahunrev+`</th>
                <th width='11' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan thd RKA `+tahun+`</th>
                <th width='11' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan thd RKA s.d Bulan Berjalan `+tahun+`</th>
                <th width='11' class='header_laporan text-center' align='center'>Growth Thd `+tahunrev+`</th>
            </tr>
            <tr>
                <td height='25'  class='header_laporan' align='center'>&nbsp;</td>
                <td class='header_laporan' align='center'>1</td>
                <td class='header_laporan' align='center'>2</td>
                <td class='header_laporan' align='center'>3</td>
                <td class='header_laporan' align='center'>4</td>
                <td class='header_laporan' align='center'>5=3/1</td>
                <td class='header_laporan' align='center'>6=3/2</td>
                <td class='header_laporan' align='center'>7=(3-4)/4</td>
            </tr>`;
		
            for (var i=0; i < data.length; i++)
            {
                var line = data[i];
                var persen1=0;var persen2=0;var persen3=0;
                if (line.n3!=0)
                {
                    persen1=(line.n1/line.n3)*100;
                }
                if (line.n4!=0)
                {
                    persen2=(line.n1/line.n4)*100;
                }
                if (line.n2!=0)
                {
                    persen3=(line.n1-line.n2)/line.n2*100;
                }
                html+=`<tr>
                <td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+` `+line.nama+`</td>`;
                if (line.kode_neraca!="OR" && line.kode_fs=="FS4")
                {
                    html+=`<td class='isi_laporan' align='right'>`+sepNum(line.n3)+`</td>
                    <td class='isi_laporan' align='right'>`+sepNum(line.n4)+`</td>
                    <td class='isi_laporan' align='right'>`+sepNum(line.n1)+`</td>
                    <td class='isi_laporan' align='right'>`+sepNum(line.n2)+`</td>`;
                }
                else
                {
                    html+=`<td class='isi_laporan' align='center'>`+sepNum(line.n3)+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum(line.n4)+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum(line.n1)+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum(line.n2)+`%</td>`;
                }
                    html+=`<td class='isi_laporan' align='center'>`+sepNum(persen1)+`%</td>
                    <td class='isi_laporan' align='center'>`+sepNum(persen2)+`%</td>
                    <td class='isi_laporan' align='center'>`+sepNum(persen3)+`%</td>
                    </tr>`;
                
            }
		
		    html+=`</table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   