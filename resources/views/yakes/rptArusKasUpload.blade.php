<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-arus-kas-upload') }}", null, formData, null, function(res){
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
            var periode_seb = namaPeriode(tahunseb+''+12);
            var html = `
            <style>
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
            .bg-greenold{
                color: white !important;
                background-color: #288372; !important;
            }
            </style>
            <table class='table table-borderless kotak report-table' width='100%'>
            <tr height='20px'>
                <td colspan=6>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'></td>
                <td width='90%' colspan='3' class='text-center'>
                    <span class='bold fs1-1rem'>YAYASAN KESEHATAN PEGAWAI TELKOM</span><br>
                    <span class='bold fs1-1rem'>LAPORAN ARUS KAS </span><br>
                    <span class='bold fs1rem'>UNTUK PERIODE YANG BERAKHIR PADA <uppercase> `+res.res.tgl_awal+` `+periode_pilih+`, 31 `+periode_seb+` </uppercase></span><br>
                    <span class='bold fs1rem'>(Disajikan dalam Rupiah)</span><br>
                </td>
                <td width='5%'></td>
            </tr>
            <tr>
                <td colspan=5>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'></td>
                <td width='54%' height='25'  class='header_laporan border-right border-bottom border-top bg-greenold'></td>
                <td width='18%' class='header_laporan text-center fs-1rem bold border-right border-bottom border-top bg-greenold'>`+res.res.tgl_awal+` `+periode_pilih+`</td>
                <td width='18%' class='header_laporan text-center fs-1rem bold border-bottom border-top bg-greenold'>31 `+periode_seb+`</td>
                <td width='5%'></td>
            </tr>`;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                var n1="";
                var n2="";
                var line = data[i];
                if (line.n1 != 0)
                {
                    n1=sepNum(parseFloat(line.n1));
                }
                if (line.n2 != 0)
                {
                    n2=sepNum(parseFloat(line.n2));
                }
                if(line.jenis == "Posting"){
                    line.level_spasi = 3;
                    var bold = '';
                }else{
                    line.level_spasi = 0;
                    var bold = 'bold';
                }

                html+=`<tr>
                <td width='5%'></td>
                <td width='54%' height='20' class='isi_laporan `+bold+`'>`+fnSpasi(line.level_spasi)+line.keterangan+`</td>
                <td width='18%' class='isi_laporan `+bold+`'><div align='right'>`+n1+`</div></td>
                <td width='18%' class='isi_laporan `+bold+`'><div align='right'>`+n2+`</div></td>
                <td width='5%'></td>
                </tr>`;
                no++;
            }
            var today = $tgl.from;
            var dd = today.substr(0,2);
            var mm = today.substr(3,2); //January is 0!
            var yyyy = today.substr(6,4);
            var nama_periode = namaPeriode(yyyy+''+mm);
            html+=`
            <tr>
                <td colspan='5'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='54%' class='text-center'></td>
                <td width='36%' colspan='2' class='text-center'>Bandung, `+dd+` `+nama_periode+`</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td class='text-center'>Mengetahui/menyetujui</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='54%' class='text-center'>`+res.res.ttd[0].jab1+`</td>
                <td width='36%' colspan='2' class='text-center'>`+res.res.ttd[0].jab2+`</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr height='60px'>
                <td width='5%'>&nbsp;</td>
                <td width='54%' class='text-center'></td>
                <td width='36%' colspan='2' ></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='54%' class='text-center'><u>`+res.res.ttd[0].nama+`</u></td>
                <td colspan='2' width='36%' class='text-center'><u>`+res.res.ttd[0].nama2+`</u></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='54%' class='text-center'>NIK. `+res.res.ttd[0].nik1+`</td>
                <td colspan='2' width='36%' class='text-center'>NIK. `+res.res.ttd[0].nik2+`</td>
                <td width='5%'>&nbsp;</td>
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
   