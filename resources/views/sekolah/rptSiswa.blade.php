<style>
    .separator2{
        height:1rem;
        background:#f8f8f8;
        box-shadow: -1px 0px 1px 0px #d7d7d7;
    }
</style>
<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('sekolah-report/lap-siswa', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('sekolah-auth/form/blank') }}");
           }
       });
   }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){
            if(res.back){
                $('.navigation-lap').removeClass('hidden');
            }else{
                $('.navigation-lap').addClass('hidden');
            }
            var logo = "{{ asset('img/tarbak30x30.png') }}";
            
            var html=`<div align='center'>
            <style>
                .info-table thead{
                    // background:#e9ecef;
                }
                .no-border td{
                    border:0 !important;
                }
                .bold {
                    font-weight:bold;
                }
            </style>`;
            for(var i=0;i<data.length;i++){
                var line = data[i];
            html += `
            <table class='table table-borderless table-kop' style='width:90%'>
                <tr>
                    <td rowspan='4' colspan='2' style='width:20%'><img src='`+logo+`' class='logo-lap'></td>
                    <td style='width:60%;text-align:center' >SEKOLAH DASAR TARUNA BAKTI</td>
                    <td style='width:10%'>&nbsp;</td>
                    <td style='width:10%'>&nbsp;</td>
                </tr>
                <tr>
                    <td style=';text-align:center'>Jl.L.L.R.E. Martadinata No.52 Bandung 40115</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style=';text-align:center'>Telp. (022) 4261571</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style=';text-align:center'>Website: www.tarunabakti.or.id &nbsp; Email: tarbak52@gmail.com</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            `;
            kode_ta = $kode_ta;
            var ta = kode_ta.from;
            html+=judul_lap("DAFTAR SISWA AKTIF",ta,'KELAS '+line.kode_kelas);
            html+=`<table class='table table-bordered' style='width:90%'>
                <thead bgcolor='#CCCCCC'>
                    <tr>
                        <th width='5%'>NO</th>
                        <th width='15%'>ID</th>
                        <th width='15%'>NIS</th>
                        <th width='65%'>Nama</th>
                   </tr>
                </thead>`;
                    var no =1;
                    var det = ``;
                    for(var j=0;j<res.detail.length;j++){    
                        var line2 = res.detail[j];
                        if(line2.kode_kelas == line.kode_kelas){

                        det+=`<tr>
                            <td>`+no+`</td>
                            <td>`+line2.nis+`</td>
                            <td>`+line2.nis2+`</td>
                            <td>`+line2.nama+`</td>
                            </tr>`;
                            no++;   
                        }
                    }
                    html+=det;
                    html+=`
                        </table>
                    `;
                    if(i != (data.length - 1)){
                            html+=`<div class='separator2'></div>`;
                        }
                    html+=` <div class="page-break mb-4"></div>`;
            }
            html+=`</div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   