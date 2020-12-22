<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-premi-bpjs') }}", null, formData, null, function(res){
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

    function toJuta(x) {
        var nil = x / 1000000;
        return sepNum(nil);
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
            .no-border{
                border:none !important;
            }
            .bold {
                font-weight:bold;
            }
            .report-table td, .report-table th{
                border-color: black !important; 
                vertical-align: middle;
            }  
            .bg-gray1 {
                background: #bfbfbf;
            }  
            .bg-gray2 {
                background: #bfbfbf;
            }   
            .bg-green {
                background: #9eeadc;
            }       
            .bg-greenold {
                background: #288372;
                color:white;
            }
            </style>
            <table class='table table-bordered report-table' width='100%'>
            <tr>
                <td colspan='8' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <td width='16%' rowspan='2' class='text-center bg-gray1'>Bulan</td>
                <td width='36%' colspan='3' class='text-center bg-green'>Iuran Premi BPJS</td>
                <td width='48%' colspan='4' class='text-center bg-greenold'>Kapitasi</td>
            </tr>
            <tr>
                <td width='12%' class='text-center bg-green'>Kary.</td>
                <td width='12%' class='text-center bg-green'>Pensiun</td>
                <td width='12%' class='text-center bg-green'>Total</td>
                <td width='12%' class='text-center bg-greenold'>Kary.</td>
                <td width='12%' class='text-center bg-greenold'>Pensiun</td>
                <td width='12%' class='text-center bg-greenold'>Non Yakes</td>
                <td width='12%' class='text-center bg-greenold'>Total</td>
            </tr>
            <tr>
                <td width='6%' class='text-center bg-gray2'>1</td>
                <td width='12%' class='text-center bg-green'>2</td>
                <td width='12%' class='text-center bg-green'>3</td>
                <td width='12%' class='text-center bg-green'>4=2+3</td>
                <td width='12%' class='text-center bg-greenold'>5</td>
                <td width='12%' class='text-center bg-greenold'>6</td>
                <td width='12%' class='text-center bg-greenold'>7</td>
                <td width='12%' class='text-center bg-greenold'>8=5+6+7</td>
            </tr>
            `;
            var no=1;
            var line = {};
            line.nama = '';var pegawai=0;var pensiun=0;var n1=0;var n2=0;var n3=0;var n4=0;
            for (var i=0;i < data.length;i++)
            {
                var line = data[i];
                pegawai+=parseFloat(line.pegawai);
                pensiun+=parseFloat(line.pensiun);
                n1+=parseFloat(line.n1);
                n2+=parseFloat(line.n2);
                n3+=parseFloat(line.n3);
                n4+=parseFloat(line.n4);
                html+=`<tr>
                <td class='isi_laporan'>`+line.nama+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.pegawai)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.pensiun)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(parseFloat(line.pensiun)+parseFloat(line.pegawai))+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n2)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n1)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n3)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n4)+`</td>
                </tr>`;
            }
            html+=`
            <tr>
                <td class='isi_laporan text-right bg-gray1'>Jumlah s.d `+line.nama+`</td>
                <td class='isi_laporan text-right bg-gray1'>`+toJuta(pegawai)+`</td>
                <td class='isi_laporan text-right bg-gray1'>`+toJuta(pensiun)+`</td>
                <td class='isi_laporan text-right bg-gray1'>`+toJuta(parseFloat(pensiun)+parseFloat(pegawai))+`</td>
                <td class='isi_laporan text-right bg-gray1'>`+toJuta(n2)+`</td>
                <td class='isi_laporan text-right bg-gray1'>`+toJuta(n1)+`</td>
                <td class='isi_laporan text-right bg-gray1'>`+toJuta(n3)+`</td>
                <td class='isi_laporan text-right bg-gray1'>`+toJuta(n4)+`</td>
                </tr>
            </table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   