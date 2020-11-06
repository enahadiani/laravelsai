<style>
    .separator2{
        height:1rem;
        background:#f8f8f8;
        box-shadow: -1px 0px 1px 0px #d7d7d7;
    }
</style>
<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('sekolah-report/lap-kd', null, formData, null, function(res){
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
            kode_ta = $kode_ta;
            var ta = kode_ta.from;
            html+=judul_lap("DAFTAR KOMPETENSI DASAR",ta,'');
            html+=`<table class='table table-bordered' style='width:90%'>
                <thead bgcolor='#CCCCCC'>
                    <tr>
                        <th width='10%'>Mata Pelajaran</th>
                        <th width='10%'>Semester</th>
                        <th width='15%'>Kelas</th>
                        <th width='65%'>Kompetensi</th>
                   </tr>
                </thead>`;
            var no =1;
            for(var i=0;i<data.length;i++){
                var line = data[i];
                var line3 = data[i-1];
                html+=`<tr>`;
                if(line3 != undefined){
                    if(line.skode == line3.skode){
                        html+=`<td></td>`;
                    }else{
                        html+=`<td>`+line.skode+`</td>`;
                    }
                    if(line.kode_sem == line3.kode_sem){
                        html+=`<td></td>`;
                    }else{
                        html+=`<td>`+line.kode_sem+`</td>`;
                    }
                    if(line.kode_kelas == line3.kode_kelas){
                        html+=`<td></td>`;
                    }else{
                        html+=`<td>`+line.kode_kelas+`</td>`;
                    }
                }else{

                    html+=`<td>`+line.skode+`</td>`;
                    html+=`<td>`+line.kode_sem+`</td>`;
                    html+=`<td>`+line.kode_kelas+`</td>`;
                }
                html+=`
                    <td>`+line.kode_kd+` &nbsp; `+line.nama_kd+`</td>
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
   