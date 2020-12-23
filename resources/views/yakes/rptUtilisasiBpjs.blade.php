<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-utilisasi-bpjs') }}", null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
           }
       });
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
        console.log(data);
        if(data.length > 0){
            res.bentuk = '';
            var lokasi = res.lokasi;
            res.data_detail = [];
            periode = $periode.from;
            var tahun = parseInt(periode.substr(0,4));
            var tahunseb = parseInt(periode.substr(0,4))-1;
            var bulan = periode.substr(4,2);
            var periodeseb = tahunseb+''+bulan;
            var nama_periode = namaPeriode(periode);
            var nama_periodeseb = namaPeriode(periodeseb);
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
                padding-top: 4px !important;
                padding-bottom: 4px !important;
            }  
            .bg-greenold {
                background: #288372;
                color:white;
            } 
            </style>
            <table class='table table-bordered report-table' width='100%'>
                <tr>
                    <td colspan='2' class='no-border bold'>CLAIM PENSIUN</td>
                    <td colspan='3' class='text-right no-border'>dlm. Rp Juta</td>
                </tr>
                <tr>
                    <th width='60%' rowspan='2' class='text-center bg-greenold'>Keterangan</th>
                    <th width='10%' rowspan='2' class='text-center bg-greenold'>`+nama_periode+`</th>
                    <th width='10%' rowspan='2' class='text-center bg-greenold'>`+nama_periodeseb+`</th>
                    <th width='20%' colspan='2' class='text-center bg-greenold'>YoY</th>
                </tr>
                <tr>
                    <th width='10%' class='text-center bg-greenold'>Nilai</th>
                    <th width='10%' class='text-center bg-greenold'>%</th>
                </tr>
            `;
            var tot_now=0; var tot_before =0; var util_now=0; var util_before=0; var nil=0; var per=0;
            var util_nil=0; var util_per=0;
            var iur_now = 0; 
            var iur_before = 0;
            var iur_nil = 0;
            var iur_per = 0;
            for(var i =0; i < res.res.data_pensiun.length; i++){
                var line = res.res.data_pensiun[i];
                if(line.nama == 'Utilitas BPJS:'){
                    var nilai = '';
                    var persen = '';
                    var now = '';
                    var before = '';
                }else if(line.nama == "a.Kapitasi"){
                    var nilai = sepNumPas(parseFloat(line.now) - parseFloat(line.before));
                    var persen = sepNum2(((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100);
                    var now = sepNumPas(line.now);
                    var before = sepNumPas(line.before);
                    tot_now += parseFloat(line.now);
                    tot_before += parseFloat(line.before);
                    nil += parseFloat(line.now) - parseFloat(line.before);
                }else if(line.nama == "b.Claim BPJS"){
                    var nilai = sepNumPas(parseFloat(line.now) - parseFloat(line.before));
                    var persen = sepNum2(((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100);
                    var now = sepNumPas(line.now);
                    var before = sepNumPas(line.before);
                    tot_now += parseFloat(line.now);
                    tot_before += parseFloat(line.before);
                    nil += parseFloat(line.now) - parseFloat(line.before);
                }else{
                    var nilai = sepNumPas(parseFloat(line.now) - parseFloat(line.before));
                    var persen = sepNumPas(((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100);
                    var now = sepNumPas(line.now);
                    var before = sepNumPas(line.before);
                    iur_now += parseFloat(line.now);
                    iur_before += parseFloat(line.before);
                    iur_nil += parseFloat(line.now) - parseFloat(line.before);
                    iur_per += ((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100;
                }
                html+=`<tr>
                    <td>`+line.nama+`</td>
                    <td class='text-right'>`+now+`</td>
                    <td class='text-right'>`+before+`</td>
                    <td class='text-right'>`+nilai+`</td>
                    <td class='text-right'>`+persen+`</td>
                </tr>`;
            }
            
            per = (nil/tot_before)*100;
            util_now = (tot_now/iur_now)*100;
            util_before = (tot_before/iur_before)*100;
            util_nil = (nil/iur_nil)*100;
            util_per = (per/iur_per)*100;
            html+=`
                <tr>
                    <td>c. Total Utilisasi (a+b) </td>
                    <td class='text-right'>`+sepNumPas(tot_now)+`</td>
                    <td class='text-right'>`+sepNumPas(tot_before)+`</td>
                    <td class='text-right'>`+sepNumPas(nil)+`</td>
                    <td class='text-right'>`+sepNum2(per)+`</td>
                </tr>
                <tr>
                    <td>Utilisasi/Iuran [%] </td>
                    <td class='text-right'>`+sepNum2(util_now)+`</td>
                    <td class='text-right'>`+sepNum2(util_before)+`</td>
                    <td class='text-right'></td>
                    <td class='text-right'>`+sepNum2(util_per)+`</td>
                </tr>
            </table>
            <table class='table table-bordered report-table' width='100%'>
            <tr>
                <td colspan='2' class='no-border bold'>CLAIM PEGAWAI</td>
                <td colspan='3' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='60%' rowspan='2' class='text-center bg-greenold'>Keterangan</th>
                <th width='10%' rowspan='2' class='text-center bg-greenold'>`+nama_periode+`</th>
                <th width='10%' rowspan='2' class='text-center bg-greenold'>`+nama_periodeseb+`</th>
                <th width='20%' colspan='2' class='text-center bg-greenold'>YoY</th>
            </tr>
            <tr>
                <th width='10%' class='text-center bg-greenold'>Nilai</th>
                <th width='10%' class='text-center bg-greenold'>%</th>
            </tr>
            `;
            var tot_now=0; var tot_before =0; var util_now=0; var util_before=0; var nil=0; var per=0;
            var util_nil=0; var util_per=0;
            var iur_now = 0; 
            var iur_before = 0;
            var iur_nil = 0;
            var iur_per = 0;
            for(var i =0; i < res.res.data_pegawai.length; i++){
                var line = res.res.data_pegawai[i];
                if(line.nama == 'Utilitas BPJS:'){
                    var nilai = '';
                    var persen = '';
                    var now = '';
                    var before = '';
                }else if(line.nama == "a.Kapitasi"){
                    var nilai = sepNumPas(parseFloat(line.now) - parseFloat(line.before));
                    var persen = sepNum2(((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100);
                    var now = sepNumPas(line.now);
                    var before = sepNumPas(line.before);
                    tot_now += parseFloat(line.now);
                    tot_before += parseFloat(line.before);
                    nil += parseFloat(line.now) - parseFloat(line.before);
                }else if(line.nama == "b.Claim BPJS"){
                    var nilai = sepNumPas(parseFloat(line.now) - parseFloat(line.before));
                    var persen = sepNum2(((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100);
                    var now = sepNumPas(line.now);
                    var before = sepNumPas(line.before);
                    tot_now += parseFloat(line.now);
                    tot_before += parseFloat(line.before);
                    nil += parseFloat(line.now) - parseFloat(line.before);
                }else{
                    var nilai = sepNumPas(parseFloat(line.now) - parseFloat(line.before));
                    var persen = sepNumPas(((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100);
                    var now = sepNumPas(line.now);
                    var before = sepNumPas(line.before);
                    iur_now += parseFloat(line.now);
                    iur_before += parseFloat(line.before);
                    iur_nil += parseFloat(line.now) - parseFloat(line.before);
                    iur_per += ((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100;
                }
                html+=`<tr>
                    <td>`+line.nama+`</td>
                    <td class='text-right'>`+now+`</td>
                    <td class='text-right'>`+before+`</td>
                    <td class='text-right'>`+nilai+`</td>
                    <td class='text-right'>`+persen+`</td>
                </tr>`;
            }
            
            per = (nil/tot_before)*100;
            util_now = (tot_now/iur_now)*100;
            util_before = (tot_before/iur_before)*100;
            util_nil = (nil/iur_nil)*100;
            util_per = (per/iur_per)*100;
            html+=`
                <tr>
                    <td>c. Total Utilisasi (a+b) </td>
                    <td class='text-right'>`+sepNumPas(tot_now)+`</td>
                    <td class='text-right'>`+sepNumPas(tot_before)+`</td>
                    <td class='text-right'>`+sepNumPas(nil)+`</td>
                    <td class='text-right'>`+sepNum2(per)+`</td>
                </tr>
                <tr>
                    <td>Utilisasi/Iuran [%] </td>
                    <td class='text-right'>`+sepNum2(util_now)+`</td>
                    <td class='text-right'>`+sepNum2(util_before)+`</td>
                    <td class='text-right'></td>
                    <td class='text-right'>`+sepNum2(util_per)+`</td>
                </tr>
            </table>
            <table class='table table-bordered report-table' width='100%'>
            <tr>
                <td colspan='2' class='no-border bold'>CLAIM TOTAL</td>
                <td colspan='3' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='60%' rowspan='2' class='text-center bg-greenold'>Keterangan</th>
                <th width='10%' rowspan='2' class='text-center bg-greenold'>`+nama_periode+`</th>
                <th width='10%' rowspan='2' class='text-center bg-greenold'>`+nama_periodeseb+`</th>
                <th width='20%' colspan='2' class='text-center bg-greenold'>YoY</th>
            </tr>
            <tr>
                <th width='10%' class='text-center bg-greenold'>Nilai</th>
                <th width='10%' class='text-center bg-greenold'>%</th>
            </tr>
            `;
            var tot_now=0; var tot_before =0; var util_now=0; var util_before=0; var nil=0; var per=0;
            var util_nil=0; var util_per=0;
            var iur_now = 0; 
            var iur_before = 0;
            var iur_nil = 0;
            var iur_per = 0;
            for(var i =0; i < data.length; i++){
                var line = data[i];
                if(line.nama == 'Utilitas BPJS:'){
                    var nilai = '';
                    var persen = '';
                    var now = '';
                    var before = '';
                }else if(line.nama == "a.Kapitasi"){
                    var nilai = sepNumPas(parseFloat(line.now) - parseFloat(line.before));
                    var persen = sepNum2(((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100);
                    var now = sepNumPas(line.now);
                    var before = sepNumPas(line.before);
                    tot_now += parseFloat(line.now);
                    tot_before += parseFloat(line.before);
                    nil += parseFloat(line.now) - parseFloat(line.before);
                }else if(line.nama == "b.Claim BPJS"){
                    var nilai = sepNumPas(parseFloat(line.now) - parseFloat(line.before));
                    var persen = sepNum2(((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100);
                    var now = sepNumPas(line.now);
                    var before = sepNumPas(line.before);
                    tot_now += parseFloat(line.now);
                    tot_before += parseFloat(line.before);
                    nil += parseFloat(line.now) - parseFloat(line.before);
                }else{
                    var nilai = sepNumPas(parseFloat(line.now) - parseFloat(line.before));
                    var persen = sepNumPas(((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100);
                    var now = sepNumPas(line.now);
                    var before = sepNumPas(line.before);
                    iur_now += parseFloat(line.now);
                    iur_before += parseFloat(line.before);
                    iur_nil += parseFloat(line.now) - parseFloat(line.before);
                    iur_per += ((parseFloat(line.now) - parseFloat(line.before))/parseFloat(line.before))*100;
                }
                html+=`<tr>
                    <td>`+line.nama+`</td>
                    <td class='text-right'>`+now+`</td>
                    <td class='text-right'>`+before+`</td>
                    <td class='text-right'>`+nilai+`</td>
                    <td class='text-right'>`+persen+`</td>
                </tr>`;
            }
            
            per = (nil/tot_before)*100;
            util_now = (tot_now/iur_now)*100;
            util_before = (tot_before/iur_before)*100;
            util_nil = (nil/iur_nil)*100;
            util_per = (per/iur_per)*100;
            html+=`
                <tr>
                    <td>c. Total Utilisasi (a+b) </td>
                    <td class='text-right'>`+sepNumPas(tot_now)+`</td>
                    <td class='text-right'>`+sepNumPas(tot_before)+`</td>
                    <td class='text-right'>`+sepNumPas(nil)+`</td>
                    <td class='text-right'>`+sepNum2(per)+`</td>
                </tr>
                <tr>
                    <td>Utilisasi/Iuran [%] </td>
                    <td class='text-right'>`+sepNum2(util_now)+`</td>
                    <td class='text-right'>`+sepNum2(util_before)+`</td>
                    <td class='text-right'></td>
                    <td class='text-right'>`+sepNum2(util_per)+`</td>
                </tr>
            </table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   