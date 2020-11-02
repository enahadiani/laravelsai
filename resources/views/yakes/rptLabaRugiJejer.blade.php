<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-labarugi-jejer') }}", null, formData, null, function(res){
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
            </style>`+judul_lap("LAPORAN AKTIVITAS JEJER AREA",lokasi,'Periode '+periode.fromname)+`
            <div class='table-responsive'>
            <table class='table table-bordered'>
            <tr>
                <td width='300' height='25'  class='header_laporan'><div align='center'>Deskripsi</div></td>
                <td width='100' class='header_laporan'><div align='center'>KS00</div></td>
                <td width='100' class='header_laporan'><div align='center'>KS01</div></td>
                <td width='100' class='header_laporan'><div align='center'>KS02</div></td>
                <td width='100' class='header_laporan'><div align='center'>KS03</div></td>
                <td width='100' class='header_laporan'><div align='center'>KS04</div></td>
                <td width='100' class='header_laporan'><div align='center'>KS05</div></td>
                <td width='100' class='header_laporan'><div align='center'>KS06</div></td>
                <td width='100' class='header_laporan'><div align='center'>KS07</div></td>
                <td width='100' class='header_laporan'><div align='center'>Total</div></td>
            </tr>`;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                var n1="";
                var n2="";
                var n3="";
                var n4="";
                var n5="";
                var n6="";
                var n7="";
                var n8="";
                var n9="";
                var line = data[i];
                if (line.tipe!="Header")
                {
                    n1=sepNum(parseFloat(line.n1));
                    n2=sepNum(parseFloat(line.n2));
                    n3=sepNum(parseFloat(line.n3));
                    n4=sepNum(parseFloat(line.n4));
                    n5=sepNum(parseFloat(line.n5));
                    n6=sepNum(parseFloat(line.n6));
                    n7=sepNum(parseFloat(line.n7));
                    n8=sepNum(parseFloat(line.n8));
                    n9=sepNum(parseFloat(line.n9));
                }
			
                if (line.tipe=="Posting" && line.n4 != 0)
                {
                    html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' ><td height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                    <td class='isi_laporan'><div align='right'>`+n1+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n2+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n3+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n4+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n5+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n6+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n7+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n8+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n9+`</div></td>
                    </tr>`;
                }
                else
                {
                    html+=`<tr><td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+line.nama+`</td>
                    <td class='isi_laporan'><div align='right'>`+n1+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n2+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n3+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n4+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n5+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n6+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n7+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n8+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+n9+`</div></td>
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
            </table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   