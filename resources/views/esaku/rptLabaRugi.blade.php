<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('esaku-report/lap-labarugi') }}", null, formData, null, function(res){
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
            
            .table-header-prev td{
                padding: 2px !important;
            }
            .table-kop-prev td{
                padding: 0px !important;
            }
            .separator2{
                height:1rem;
                background:#f8f8f8;
                box-shadow: -1px 0px 1px 0px #e1e1e1;
            }
            .vtop{
                vertical-align:top !important;
            }
            .lh1{
                line-height:1;
            }
            .bg-primary2{
                background: #eaf2ff !important;
            }
            
            .bg-primary0{
                background: #00358a !important;
                color:white !important;
            }
            </style>
            <div style='border-bottom: double #d7d7d7;padding:0 3rem'>
                <table class="borderless mb-2 table-kop-prev" width="100%" >
                    <tr>
                        <td width="50%" colspan="5" class="vtop"><h6 class="text-primary bold">LAPORAN LABA RUGI</h6></td>
                        <td width="50%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">`+res.lokasi[0].nama+`</h6></td>
                    </tr>
                    <tr>
                        <td colspan="5" >Periode `+($periode.fromname)+`</td>
                        <td colspan="3" class="vtop text-right"><p class="lh1">`+res.lokasi[0].alamat+`<br>`+res.lokasi[0].kota+` `+res.lokasi[0].kodepos+` </p></td>
                    </tr>
                    <tr>
                        <td colspan="5" >( Disajikan dalam Rupiah )</td>
                        <td colspan="3" class="vtop text-right"><p class="mt-2">`+res.lokasi[0].email+` | `+res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>
            <div style="padding: 0 3rem" class="table table-responsive mt-4">
            <table class='table table-striped'>
            <tr>
                <th width='500' height='25'  class='header_laporan bg-primary'><div align='center'>Deskripsi</div></th>
                <th width='100' class='header_laporan bg-primary'><div align='center'>Jumlah</div></th>
            </tr>`;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                var nilai="";
                var line = data[i];
                var color = "";
                var bold = "";
                if (line.tipe!="Header")
                {
                    nilai=sepNum(parseFloat(line.n4));
                    if(line.tipe == "Summary"){
                        color = "";
                        bold = "bold";
                    }
                    else if(line.tipe == "SumPosted"){
                        color = "";
                        bold = "bold";
                    }
                    else{
                        color = "";
                        bold = "";
                    }
                }else{
                    color = "";
                    bold = "bold"; 
                }

                if(i == (data.length - 1)){
                    color = "bg-primary0";
                }
			
                if (line.tipe=="Posting" && line.n4 != 0)
                {
                    html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' ><td height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                    <td class='isi_laporan `+color+` `+bold+`'><div align='right'>`+nilai+`</div></td>
                    </tr>`;
                }
                else
                {
                    html+=`<tr><td height='20' class='isi_laporan `+color+` `+bold+`'>`+fnSpasi(line.level_spasi)+line.nama+`</td>
                    <td class='isi_laporan `+color+` `+bold+`'><div align='right'>`+nilai+`</div></td>
                    </tr>`;
                }
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
   