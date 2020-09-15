<script type="text/javascript">

    function drawLap(formData){
       saiPost("{{ url('yakes-report/lap-labarugi') }}", null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePagination('pagination',show,res);
              
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
            if(res.back){
                var back= `<button type="button" class="btn btn-secondary ml-2" id="btn-back" style="float:right;">
                <i class="fa fa-undo"></i> Back</button>`;
            }else{
                var back= ``;
            }
            res.bentuk = '';
            res.data_detail = [];
            var html = `
            <style>
            .info-table thead{
                background:#4286f5;
                color:white;
            }
            .table-bordered td{
                border: 1px solid #e9ecef !important;
            }
            .no-border td{
                border:0 !important;
            }
            .bold {
                font-weight:bold;
            }
            </style>`+back+`
            <table class='table table-bordered'>
            <thead>
            <tr>
                <td width='500' height='25'  class='header_laporan'><div align='center'>Deskripsi</div></td>
                <td width='100' class='header_laporan'><div align='center'>Jumlah</div></td>
            </tr>
            </thead>
            <tbody>`;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                var nilai="";
                var line = data[i];
                if (line.tipe!="Header")
                {
                    nilai=sepNum(parseFloat(line.n4));
                }
			
			    html+=`<tr><td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi);
                if (line.tipe=="Posting" && line.n4 != 0)
                {
                    html+=`<a style='cursor:pointer;color:blue' class='neraca-lajur' data-kode_neraca='`+line.kode_neraca+`' >`+line.nama+`</a>`;
                }
                else
                {
                    html+=line.nama;
                }
			    html+= `</td>
                    <td class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                </tr>`;
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
            </tbody>
            </table>`;
        }
        $('#canvasPreview').html(html);
        $('li.first a ').html("<i class='icon-control-start'></i>");
        $('li.last a ').html("<i class='icon-control-end'></i>");
    }
</script>
   