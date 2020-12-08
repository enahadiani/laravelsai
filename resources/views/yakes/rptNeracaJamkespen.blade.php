<script type="text/javascript">
    function judul_report(judul1,judul2,periode){
        return `<table class='kotak' width='100%'>
            <tr>
                <td class='text-center px-0 py-0 bold fs1-1rem'>`+judul1+`</td>
            </tr>
            <tr>
                <td class='text-center px-0 py-0 bold fs1-1rem'>`+judul2+`</td>
            </tr>
            <tr>
                <td class='text-center px-0 py-0 bold fs1rem'>`+periode+`</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>`;
    }

    function drawLap(formData){
        saiPostLoad('yakes-report/lap-neraca-jamkespen', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
           }
       });
   }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){
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
            .info-table td {
                padding: 2px !important;
            }
            .no-border td{
                border:0 !important;
            }
            .bold {
                font-weight:bold;
            }
            .bt-0 {
                border-top : 0 !important;
            }
            .report-table td, .report-table th{
                border-color: black !important; 
                padding:0px 10px !important;
            }
            </style>`+judul_report("YAYASAN KESEHATAN PEGAWAI TELKOM <br> PROGRAM JAMKESPEN MANFAAT PASTI",'LAPORAN POSISI KEUANGAN','Per '+res.res.tgl_awal+''+periode_pilih+' dan '+res.res.tgl_akhir+''+periode_seb+' <br> (Disajikan dalam Rupiah)')+`
            <table class='kotak bt-0 report-table' width='100%'>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td width='50%' class='header_laporan text-center'></td>
                    <td width='5%' class='header_laporan text-center bold'></td>
                    <td width='2%' class='header_laporan text-center '>&nbsp;</td>
                    <td width='20%' class='header_laporan text-center bold fs1rem border-bottom'>`+res.res.tgl_awal+` `+periode_pilih+`</td>
                    <td width='3%' class='header_laporan text-center '>&nbsp;</td>
                    <td width='20%' class='header_laporan text-center bold fs1rem border-bottom'>`+res.res.tgl_akhir+` `+periode_seb+`</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                `;
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
			
                if (line.tipe=="Posting" && line.n4 != 0)
                {
                    html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' >
                    <td width='50%' height='20' class='isi_laporan link-report px-2' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                    <td width='5%'></td>
                    <td width='2%'></td>
                    <td width='20%' class='isi_laporan px-2 text-right'>`+n1+`</td>
                    <td width='3%'></td>
                    <td width='20%' class='isi_laporan px-2 text-right'>`+n2+`</td>
                    </tr>`;
                }
                else
                {
                    html+=`<tr>
                    <td width='50%' height='20' class='isi_laporan link-report px-2' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                    <td width='5%'></td>
                    <td width='2%'></td>
                    <td width='20%' class='isi_laporan px-2 text-right'>`+n1+`</td>
                    <td width='3%'></td>
                    <td width='20%' class='isi_laporan px-2 text-right'>`+n2+`</td>
                    </tr>`;
                }
                no++;
            }
            html+=`
            </table>
            `;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   