<style>
    .separator2{
        height:1rem;
        background:#f8f8f8;
        box-shadow: -1px 0px 1px 0px #d7d7d7;
    }
</style>
<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('sekolah-report/lap-guru-matpel', null, formData, null, function(res){
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
            var html = `<div align='center'>
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
            </style>
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
            var ta = kode_ta.from;
            html+=judul_lap("DAFTAR GURU MATPEL",ta,'');
            html+=`<table class='table table-bordered' style='width:90%'>
                <thead bgcolor='#CCCCCC'>
                    <tr>
                        <th width='5%'>Tingkat</th>
                        <th width='10%'>Kelas</th>
                        <th width='35%'>Mata Pelajaran</th>
                        <th width='20%'>Singkatan</th>
                        <th width='30%'>Guru</th>
                   </tr>
                </thead>`;
            var no =1;
            var arr_tingkat = new Array();
            var rowspan=1;
            for(var i=0;i<data.length;i++){
                var line = data[i];
                var line2 = data[i+1];
                var line3 = data[i-1];
                html+=`<tr>`;
                if(line3 != undefined){
                    if(line.kode_tingkat == line3.kode_tingkat){
                        html+=`<td></td>`;
                    }else{
                        html+=`<td>`+line.kode_tingkat+`</td>`;
                    }
                    if(line.kode_kelas == line3.kode_kelas){
                        html+=`<td></td>`;
                    }else{
                        html+=`<td>`+line.kode_kelas+`</td>`;
                    }
                }else{

                    html+=`<td>`+line.kode_tingkat+`</td>`;
                    html+=`<td>`+line.kode_kelas+`</td>`;
                }
                html+=`
                    <td>`+line.nama_matpel+`</td>
                    <td>`+line.skode+`</td>
                    <td>`+line.nama_guru+`</td>
                    </tr>`;
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
   