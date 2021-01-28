<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('telu-report/lap-neraca2') }}", null, formData, null, function(res){
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
            var mm = periode.substr(4,2);
            var tahun = periode.substr(0,4);
            var tahunrev = parseInt(tahun)-1;
            
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var totime = dd+' '+namaPeriode(tahun+''+mm);
            var totimerev = dd+' '+namaPeriode(tahunrev+''+mm);

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
            </style>`+judul_lap("LAPORAN NERACA",lokasi,'Posisi: '+totime+' dan '+tahunrev)+`
            <table class='table table-bordered table-striped' width='100%'>
				<tr>
					<th width='60%' class='header_laporan text-center' >Keterangan</th>
					<th width='20%' class='header_laporan text-center' >Posisi Neraca <br>Per `+totime+`</th>
					<th width='20%' class='header_laporan text-center' >Posisi Neraca <br>Per `+totimerev+`</th>
				</tr>`;
		
            for (var i=0; i < data.length; i++)
            {
                var line = data[i];
                var nilai="";var nilai2="";
                if (line.tipe!="Header" && line.nama!="." && line.nama!="")
                {
                    nilai=sepNum(line.n1);
                    nilai2=sepNum(line.n2);
                }
                html +="<tr><td height='20' class='isi_laporan'>"+fnSpasi(line.level_spasi);
                if (line.tipe=="Posting")
                {
                    html+="<a style='cursor:pointer;color:blue'>"+line.nama+"</a>";
                }
                else
                {
                    html+=line.nama;
                }
                html+=`</td>
                        <td class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                        <td class='isi_laporan'><div align='right'>`+nilai2+`</div></td>
                    </tr>`;
            }
		    html+=`</table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   