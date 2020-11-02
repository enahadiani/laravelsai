<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-labarugi') }}", null, formData, null, function(res){
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
            </style>`+judul_lap("LAPORAN AKTIVITAS",lokasi,'Periode '+periode.fromname)+`
            <table class='table table-bordered'>
            <tr>
                <td width='500' height='25'  class='header_laporan'><div align='center'>Deskripsi</div></td>
                <td width='100' class='header_laporan'><div align='center'>Jumlah</div></td>
            </tr>`;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                var nilai="";
                var line = data[i];
                if (line.tipe!="Header")
                {
                    nilai=sepNum(parseFloat(line.n4));
                }
			
                if (line.tipe=="Posting" && line.n4 != 0)
                {
                    html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' ><td height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                    <td class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                    </tr>`;
                }
                else
                {
                    html+=`<tr><td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+line.nama+`</td>
                    <td class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                    </tr>`;
                }
                // if (res.bentuk == "Detail" && line.tipe=="Posting")
                // {
                //     var kode_neraca=line.kode_neraca;
                //     var kode_fs=line.kode_fs;
                //     var kode_lokasi=line.kode_lokasi;
                //     var det ='';
                //     for (var x=0; x < res.data_detail.length; x++)
                //     {	
                //         var line2 = res.data_detail[x];
                //         var so_akhir =sepNum(parseFloat(line2.so_akhir));
                //         var nama=line2.kode_akun." - ".line2.nama;
                //         det+=`<tr>
                //             <td height='20' class='detail_laporan'>`+spasi(nama,line.level_spasi+1)+`</td>
                //             <td class='detail_laporan'><div align='right'>`+so_akhir+`</div></td>
                //         </tr>`;
                //     }
                // }
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
   