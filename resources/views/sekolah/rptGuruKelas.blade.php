<style>
    .separator2{
        height:1rem;
        background:#f8f8f8;
        box-shadow: -1px 0px 1px 0px #d7d7d7;
    }
</style>
<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('sekolah-report/lap-guru-kelas', null, formData, null, function(res){
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
            html+=judul_lap("DAFTAR GURU KELAS",ta,'');
            html+=`<table class='table table-bordered' style='width:90%'>
                <thead bgcolor='#CCCCCC'>
                    <tr>
                        <th width='5%'>NO</th>
                        <th width='10%'>NIP</th>
                        <th width='20%'>Nama</th>
                        <th width='10%'>TUGAS MENGAJAR</th>
                        <th width='25%'>Mata Pelajaran yang diberikan</th>
                        <th width='15%'>Kelas</th>
                        <th width='15%'>No Tlp</th>
                   </tr>
                </thead>`;
            var no =1;
            for(var i=0;i<data.length;i++){
                var line = data[i];
                html+=`<tr>
                    <td>`+no+`</td>
                    <td>`+line.nik+`</td>
                    <td>`+line.nama+`</td>
                    <td>`+line.tugas+`</td>
                    <td>`+line.matpel+`</td>
                    <td>`+line.kelas+`</td>
                    <td>`+line.no_hp+`</td>
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
   