<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('yakes-report/lap-neraca', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
            
        
           }
           else{
                $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
           }
       });
   }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){
            res.bentuk = '';
            var lokasi = res.lokasi;
            periode = $periode;
            var tahun = periode.from.substr(0,4);
            var bln = periode.from.substr(4,2);
            var tahunseb = parseInt(tahun)-1;
            var periode_pilih = namaPeriode(tahun+''+bln);
            var periode_seb = namaPeriode(tahunseb+''+bln);
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
            <table class='treegrid kotak' width='100%'>
            <tr>
                <td width='5%'></td>
                <td width='90%' colspan='4' class='text-center border-bottom2'>
                    <span class='bold fs1-1rem'>YAYASAN KESEHATAN PEGAWAI TELKOM</span><br>
                    <span class='bold fs1-1rem'>LAPORAN POSISI KEUANGAN </span><br>
                    <span class='bold fs1rem'>Per `+res.res.tgl_awal+` `+periode_pilih+`, `+res.res.tgl_akhir+` `+periode_seb+`</span><br>
                    <span class='bold fs1rem'>(Disajikan dalam Rupiah)</span>
                </td>
                <td width='5%'></td>
            </tr>
            <tr>
                <td colspan=6>&nbsp;</td>
            </tr>
            <tr>
                
                <td width='5%'></td>
                <td width='50%' height='25'  class='header_laporan'></td>
                <td width='8%' class='header_laporan fs-1rem bold'></td>
                <td width='16%' class='header_laporan text-right fs-1rem bold'><u>`+res.res.tgl_awal+` `+periode_pilih+`</u></td>
                <td width='16%' class='header_laporan text-right fs-1rem bold'><u>`+res.res.tgl_akhir+` `+periode_seb+`</u></td>
                <td width='5%'></td>
            </tr>
            `;
            var no=1;
            var prev_lv = 0;
            var parent_to_prt = "";
            var prev_prt = 0;
            var parent_array = [];
            var x =0;
            for (var i=0;i < data.length;i++)
            {
                if(data[i-1] == undefined){
                    prev_lv = 0;
                }else{
                    prev_lv = data[i-1].level_spasi;
                }
                
                if(data[i].level_spasi == 0){
                    parent_to_prt = "";
                    prev_prt = i;
                    parent_array[data[i].level_spasi] = i;
                    var bold = "bold";
                }else if(data[i].level_spasi > prev_lv){
                    parent_to_prt = "treegrid-parent-"+(i-1);
                    prev_prt = i-1;
                    parent_array[data[i].level_spasi] = i - 1;
                    var bold = "";
                }else if(data[i].level_spasi == prev_lv){
                    parent_to_prt = "treegrid-parent-"+(prev_prt);
                    var bold = "";
                }else if(data[i].level_spasi < prev_lv){
                    parent_to_prt = "treegrid-parent-"+parent_array[data[i].level_spasi];
                    var bold = "";
                }
                
                var n1="";
                var n2="";
                var line = data[i];
                if (line.tipe!="Header")
                {
                    n1=sepNum(parseFloat(line.n1));
                    n2=sepNum(parseFloat(line.n2));
                }
                html+=`<tr class='treegrid-`+i+` `+parent_to_prt+` `+bold+`' >
                <td width='5%'></td>
                <td width='50%' height='20' class='isi_laporan' >`+fnSpasi(line.level_spasi)+` `+line.nama+`</td>
                <td width='8%'></td>
                <td width='16%' class='isi_laporan'><div align='right'>`+n1+`</div></td>
                <td width='16%' class='isi_laporan'><div align='right'>`+n2+`</div></td>
                <td width='5%'></td>
                </tr>`;
                no++;
            }
            html+=`</table>`;
        }
        $('#canvasPreview').html(html);
        $('.treegrid').treegrid({
            enableMove: true, 
            onMoveOver: function(item, helper, target, position) {
                console.log(target);
                console.log(position); 
            }
        });
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   