<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-claim-bpjs') }}", null, formData, null, function(res){
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
            .info-table thead{
                background:#4286f5;
                color:white;
            }
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
            .bg-greenold {
                background: #288372;
                color:white;
            }  
            </style>
            <table class='table table-bordered report-table' width='100%'>
            <tr>
                <td colspan='9' class='no-border bold'>CLAIM `+$jenis.from+`</td>
                <td class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='24%' rowspan='2' class='text-center bg-greenold'>Layanan</th>
                <th width='10%' rowspan='2' class='text-center bg-greenold'>KP</th>
                <th width='56%' colspan='7' class='text-center bg-greenold'>Area</th>
                <th width='10%' rowspan='2' class='text-center bg-greenold'>Total</th>
            </tr>
            <tr>
                <th width='8%' class='text-center bg-greenold'>I</th>
                <th width='8%' class='text-center bg-greenold'>II</th>
                <th width='8%' class='text-center bg-greenold'>III</th>
                <th width='8%' class='text-center bg-greenold'>IV</th>
                <th width='8%' class='text-center bg-greenold'>V</th>
                <th width='8%' class='text-center bg-greenold'>VI</th>
                <th width='8%' class='text-center bg-greenold'>VII</th>
            </tr>
            `;
            var tgh =`<tr>
            <td class='isi_laporan'>Tagihan Awal</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            </tr>`;
            var claim =`<tr>
            <td class='isi_laporan'>Claim BPJS</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            </tr>`;
            var bayar =`<tr>
            <td class='isi_laporan'>Selisih Yakes</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            <td class='isi_laporan'>&nbsp;</td>
            </tr>`;
            var no=1; var totgh=0; var toclaim=0; var tobyar=0;
            var tghn1=0; var tghn2=0; var tghn3=0; var tghn4=0; var tghn5=0; var tghn6=0; var tghn7=0;
            var claimn1=0; var claimn2=0; var claimn3=0; var claimn4=0; var claimn5=0; var claimn6=0; var claimn7=0;
            var byarn1=0; var byarn2=0; var byarn3=0; var byarn4=0; var byarn5=0; var byarn6=0; var byarn7=0; 
            for (var i=0;i < data.length;i++)
            {
                var line = data[i];
                if(line.jenis == "TAGIHAN AWAL"){
                    tgh+=`<tr>
                    <td class='isi_laporan'>`+fnSpasi(2)+line.nama_biaya+`</td>
                    <td class='isi_laporan'>-</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n1)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n2)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n3)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n4)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n5)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n6)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n7)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.total)+`</td>
                </tr>`;
                    tghn1+=parseFloat(line.n1);
                    tghn2+=parseFloat(line.n2);
                    tghn3+=parseFloat(line.n3);
                    tghn4+=parseFloat(line.n4);
                    tghn5+=parseFloat(line.n5);
                    tghn6+=parseFloat(line.n6);
                    tghn7+=parseFloat(line.n7);
                    totgh+=parseFloat(line.total);

                }else if(line.jenis == "CLAIM"){
                    
                    claim+=`<tr>
                    <td class='isi_laporan'>`+fnSpasi(2)+line.nama_biaya+`</td>
                    <td class='isi_laporan'>-</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n1)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n2)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n3)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n4)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n5)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n6)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n7)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.total)+`</td>
                </tr>`;
                    claimn1+=parseFloat(line.n1);
                    claimn2+=parseFloat(line.n2);
                    claimn3+=parseFloat(line.n3);
                    claimn4+=parseFloat(line.n4);
                    claimn5+=parseFloat(line.n5);
                    claimn6+=parseFloat(line.n6);
                    claimn7+=parseFloat(line.n7);
                    toclaim+=line.total;

                }else{
                    
                    bayar+=`<tr>
                    <td class='isi_laporan'>`+fnSpasi(2)+line.nama_biaya+`</td>
                    <td class='isi_laporan'>-</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n1)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n2)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n3)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n4)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n5)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n6)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.n7)+`</td>
                <td class='isi_laporan text-right'>`+toJuta(line.total)+`</td>
                </tr>`;
                    byarn1+=parseFloat(line.n1);
                    byarn2+=parseFloat(line.n2);
                    byarn3+=parseFloat(line.n3);
                    byarn4+=parseFloat(line.n4);
                    byarn5+=parseFloat(line.n5);
                    byarn6+=parseFloat(line.n6);
                    byarn7+=parseFloat(line.n7);
                    tobyar+=line.total;
                }
            }

            html+=tgh+`<tr>
                    <td class='isi_laporan bg-greenold bold '>`+fnSpasi(3)+`Total Tagihan Awal</td>
                    <td class='isi_laporan bg-greenold bold' ></td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(tghn1)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(tghn2)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(tghn3)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(tghn4)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(tghn5)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(tghn6)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(tghn7)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(totgh)+`</td>
                </tr>`+claim+`
                <tr>
                    <td class='isi_laporan bg-greenold bold '>`+fnSpasi(3)+`Total Claim BPJS</td>
                    <td class='isi_laporan bg-greenold bold ' ></td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(claimn1)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(claimn2)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(claimn3)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(claimn4)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(claimn5)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(claimn6)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(claimn7)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(toclaim)+`</td>
                </tr>
                `+bayar+`
                <tr>
                    <td class='isi_laporan bg-greenold bold'>`+fnSpasi(3)+`Total Selisih Yakes</td>
                    <td class='isi_laporan bg-greenold bold' ></td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(byarn1)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(byarn2)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(byarn3)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(byarn4)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(byarn5)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(byarn6)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(byarn7)+`</td>
                    <td class='isi_laporan bg-greenold bold text-right'>`+toJuta(tobyar)+`</td>
                </tr>
            </table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   