<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-aset-neto') }}", null, formData, null, function(res){
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
            periode = $periode;
            var tahun = periode.from.substr(0,4);
            var bln = periode.from.substr(4,2);
            var tahunseb = parseInt(tahun)-1;
            var periode_pilih = namaPeriode(tahun+''+bln);
            var periode_seb = namaPeriode(tahunseb+''+bln);
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
            .report-table td, .report-table th{
                border-color: black !important; 
            }
            .border-bottom2{
                border-bottom: 2px solid black !important;
            }
            .fs1-1rem{
                font-size: 1.1rem;
            }

            .fs1rem{
                font-size: 1rem;
            }
            </style>
            <table class='table table-borderless kotak report-table' width='100%'>
            <tr height='20px'>
                <td colspan=6>&nbsp;</td>
            </tr>
            <tr>
                <td width='2%'></td>
                <td width='90%' colspan='4' class='text-center'>
                    <span class='bold fs1-1rem'>YAYASAN KESEHATAN PEGAWAI TELKOM</span><br>
                    <span class='bold fs1-1rem'>PROGRAM JAMKESPEN MANFAAT PASTI</span><br>
                    <span class='bold fs1-1rem'>LAPORAN ASET NETO </span><br>
                    <span class='bold fs1rem'>PER `+res.res.tgl_awal+` `+periode_pilih+`, `+res.res.tgl_akhir+` `+periode_seb+`</span><br>
                </td>
                <td width='2%'></td>
            </tr>
            <tr>
                <td colspan=5>&nbsp;</td>
            </tr>
            <tr>
                <td width='2%'></td>
                <td width='52%' height='25'  class='header_laporan'></td>
                <td width='8%' height='25'  class='header_laporan fs-1rem bold'></td>
                <td width='18%' class='header_laporan text-right fs-1rem bold'><u>`+res.res.tgl_awal+` `+periode_pilih+`</u></td>
                <td width='18%' class='header_laporan text-right fs-1rem bold'><u>`+res.res.tgl_akhir+` `+periode_seb+`</u></td>
                <td width='2%'></td>
            </tr>`;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                var n1="";
                var n2="";
                var line = data[i];
                if (line.tipe!="Header")
                {
                    n1=sepNum(parseFloat(line.n1));
                    n2=sepNum(parseFloat(line.n2));
                }
			
                if (line.tipe=="Posting" && (line.n1 != 0 || line.n2 != 0))
                {
                    html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' >
                    <td width='2%'></td>
                    <td width='52%' height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                    <td width='8%' height='25'  class='header_laporan fs-1rem bold'></td>
                    <td width='18%' class='isi_laporan'><div align='right'>`+n1+`</div></td>
                    <td width='18%' class='isi_laporan'><div align='right'>`+n2+`</div></td>
                    <td width='2%'></td>
                    </tr>`;
                }
                else
                {
                    html+=`<tr>
                    <td width='2%'></td>
                    <td width='52%' height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+line.nama+`</td>
                    <td width='8%' height='25'  class='header_laporan fs-1rem bold'></td>
                    <td width='18%' class='isi_laporan'><div align='right'>`+n1+`</div></td>
                    <td width='18%' class='isi_laporan'><div align='right'>`+n2+`</div></td>
                    <td width='2%'></td>
                    </tr>`;
                }
                no++;
            }
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            var nama_periode = namaPeriode(yyyy+''+mm);
            html+=`
            <tr>
                <td colspan='5'>&nbsp;</td>
            </tr>
            <tr>
                <td width='2%'>&nbsp;</td>
                <td width='52%' class='text-center'></td>
                <td width='8%'>&nbsp;</td>
                <td width='36%' colspan='2' class='text-center'>Bandung,  `+dd+` `+nama_periode+` </td>
                <td width='2%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='2%'>&nbsp;</td>
                <td class='text-center'>Mengetahui/menyetujui</td>
                <td width='8%'>&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='2%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='2%'>&nbsp;</td>
                <td width='52%' class='text-center'>`+res.res.ttd[0].jab1+`</td>
                <td width='8%'>&nbsp;</td>
                <td width='36%' colspan='2' class='text-center'>`+res.res.ttd[0].jab2+`</td>
                <td width='2%'>&nbsp;</td>
            </tr>
            <tr height='60px'>
                <td width='2%'>&nbsp;</td>
                <td width='52%' class='text-center'></td>
                <td width='8%'>&nbsp;</td>
                <td width='36%' colspan='2' ></td>
                <td width='2%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='2%'>&nbsp;</td>
                <td width='52%' class='text-center'><u>`+res.res.ttd[0].nama+`</u></td>
                <td width='8%'>&nbsp;</td>
                <td colspan='2' width='36%' class='text-center'><u>`+res.res.ttd[0].nama2+`</u></td>
                <td width='2%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='2%'>&nbsp;</td>
                <td width='52%' class='text-center'>NIK. `+res.res.ttd[0].nik1+`</td>
                <td width='8%'>&nbsp;</td>
                <td colspan='2' width='36%' class='text-center'>NIK. `+res.res.ttd[0].nik2+`</td>
                <td width='2%'>&nbsp;</td>
            </tr>
            <tr height='20px'>
                <td colspan=6>&nbsp;</td>
            </tr>
            </table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   