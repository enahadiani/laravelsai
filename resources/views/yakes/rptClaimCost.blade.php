<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-claim-cost') }}", null, formData, null, function(res){
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

    
    function sepNum2(x){
        if (typeof x === 'undefined' || !x) { 
            return 0;
        }else{
            var x = parseFloat(x).toFixed(1);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }

    function sepNumPas(x){
        if (typeof x === 'undefined' || !x) { 
            return 0;
        }else{
            var x = parseFloat(x).toFixed(0);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }

    function namaReg(x){
        var nama =``;
        switch(x){
            case '01':
                nama = 'I';
                break;
            case '02':
                nama = 'II';
                break;
            case '03':
                nama = 'III';
                break;
            case '04':
                nama = 'IV';
                break;
            case '05':
                nama = 'V';
                break;
            case '06':
                nama = 'VI';
                break;
            case '07':
                nama = 'VII';
                break;
            case '00':
                nama = 'KP'
                break;
        }
        return nama;
    }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){
            res.bentuk = '';
            var lokasi = res.lokasi;
            res.data_detail = [];
            periode = $periode.from;
            var tahun = parseInt(periode.substr(0,4));
            var tahunseb = parseInt(periode.substr(0,4))-1;
            var bulan = namaPeriodeBulan(periode);
            var beban = ['Claim Cost','Biaya Pengobatan'];
            var html = `
            <style>

            .report-table .no-border{
                border: 0px !important;
                border-bottom:1px solid black !important;
            }
            
            .report-table td, .report-table th{
                border-color: black !important; 
                vertical-align: middle;
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }  
            
            .bg-greenold {
                background: #288372;
                color:white;
            }  
            .bold{
                font-weight:bold !important;
            }
            </style>`;
            for(var i=0; i< beban.length; i++){

                html+=`
                <table class='table table-bordered report-table' width='100%'>
                <tr>
                    <td colspan='8' class='no-border bold'>`+beban[i]+`</td>
                </tr>
                <tr>
                    <th width='10%' rowspan='2' class='text-center bg-greenold'>REG.</th>
                    <th width='15%' rowspan='2' class='text-center bg-greenold'>RKA `+tahun+`</th>
                    <th width='15%' rowspan='2' class='text-center bg-greenold' rowspan='2'>RKA SD `+bulan+`</th>
                    <th width='30%' class='text-center bg-greenold' colspan='2'>REALISASI YTD</th>
                    <th width='30%' colspan='3' class='text-center bg-greenold'>PRESENTASE</th>
                </tr>
                <tr>
                    <th width='15%' class='text-center bg-greenold'>`+bulan+` `+tahun+`</th>
                    <th width='15%' class='text-center bg-greenold'>`+bulan+` `+tahunseb+`</th>
                    <th width='10%' class='text-center bg-greenold'>RKA</th>
                    <th width='10%' class='text-center bg-greenold'>`+bulan+`</th>
                    <th width='10%' class='text-center bg-greenold'>YoY</th>
                </tr>`;
                if(beban[i] == 'Claim Cost'){
                    var dt = data;
                }else{
                    var dt = res.res.data_bp;
                }
                var det =''; var reg_rkatahun =0; 
                var pusat ='';
                var reg_rkatahun =0; 
                var reg_rkanow =0; 
                var reg_reanow =0; 
                var reg_reabefore =0; 
                var nas_rkatahun =0; 
                var nas_rkanow =0; 
                var nas_reanow =0; 
                var nas_reabefore =0; 
                for(var j=0; j < dt.length;j++){
                    var line2 = dt[j];
                    if(line2.kode_pp == "00"){
                        pusat +=` <tr>
                            <td>`+namaReg(line2.kode_pp)+`</td>
                            <td class='text-right'>`+sepNumPas(line2.rka_tahun)+`</td>
                            <td class='text-right'>`+sepNumPas(line2.rka_now)+`</td>
                            <td class='text-right'>`+sepNumPas(line2.rea_now)+`</td>
                            <td class='text-right'>`+sepNumPas(line2.rea_before)+`</td>
                            <td class='text-right'>`+sepNum2(line2.persen_rka)+`</td>
                            <td class='text-right'>`+sepNum2(line2.persen_now)+`</td>
                            <td class='text-right'></td>
                        </tr>`;

                    }else{

                        det+=`
                        <tr>
                            <td>`+namaReg(line2.kode_pp)+`</td>
                            <td class='text-right'>`+sepNumPas(line2.rka_tahun)+`</td>
                            <td class='text-right'>`+sepNumPas(line2.rka_now)+`</td>
                            <td class='text-right'>`+sepNumPas(line2.rea_now)+`</td>
                            <td class='text-right'>`+sepNumPas(line2.rea_before)+`</td>
                            <td class='text-right'>`+sepNum2(line2.persen_rka)+`</td>
                            <td class='text-right'>`+sepNum2(line2.persen_now)+`</td>
                            <td class='text-right'></td>
                        </tr>
                        `;
                        reg_rkatahun +=parseFloat(line2.rka_tahun); 
                        reg_rkanow +=parseFloat(line2.rka_now); 
                        reg_reanow +=parseFloat(line2.rea_now); 
                        reg_reabefore +=parseFloat(line2.rea_before); 
                    }
                    nas_rkatahun +=parseFloat(line2.rka_tahun); 
                    nas_rkanow +=parseFloat(line2.rka_now); 
                    nas_reanow +=parseFloat(line2.rea_now); 
                    nas_reabefore +=parseFloat(line2.rea_before); 
                }

                html+=det+`
                <tr>
                    <td class='bg-greenold'>REG</td>
                    <td class='text-right bg-greenold'>`+sepNumPas(reg_rkatahun)+`</td>
                    <td class='text-right bg-greenold'>`+sepNumPas(reg_rkanow)+`</td>
                    <td class='text-right bg-greenold'>`+sepNumPas(reg_reanow)+`</td>
                    <td class='text-right bg-greenold'>`+sepNumPas(reg_reabefore)+`</td>
                    <td class='text-right bg-greenold'></td>
                    <td class='text-right bg-greenold'></td>
                    <td class='text-right bg-greenold'></td>
                </tr>`+pusat+`
                <tr>
                    <td class='bg-greenold'>NAS</td>
                    <td class='text-right bg-greenold'>`+sepNumPas(nas_rkatahun)+`</td>
                    <td class='text-right bg-greenold'>`+sepNumPas(nas_rkanow)+`</td>
                    <td class='text-right bg-greenold'>`+sepNumPas(nas_reanow)+`</td>
                    <td class='text-right bg-greenold'>`+sepNumPas(nas_reabefore)+`</td>
                    <td class='text-right bg-greenold'></td>
                    <td class='text-right bg-greenold'></td>
                    <td class='text-right bg-greenold'></td>
                </tr>
                </table>`;
            }
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   