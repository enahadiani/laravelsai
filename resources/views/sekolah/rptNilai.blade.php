<style>
    .separator2{
        height:1rem;
        background:#f8f8f8;
        box-shadow: -1px 0px 1px 0px #d7d7d7;
    }
</style>
<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('sekolah-report/lap-nilai', null, formData, null, function(res){
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

            `;
            var lokasi = res.lokasi;
            html+=judul_lap("LAPORAN PENILAIAN",lokasi,'');
            var logo = "{{ asset('img/tarbak30x30.png') }}";
            for(var i=0;i<data.length;i++){
                var line = data[i];

                html+=`
               
                        <table class='table table-borderless' style='width:80%'>
                            <tr>
                                <td colspan='9' >
                                    <table class='table table-borderless' style='width:100%'>
                                        <tr>
                                            <td rowspan='4' style='width:20%'><img src='`+logo+`' class='logo-lap'></td>
                                            <td style='width:50%;text-align:center' >Daftar Nilai: `+line.nama_matpel+`</td>
                                            <td style='width:10%'>&nbsp;</td>
                                            <td style='width:10%'>&nbsp;</td>
                                            <td style='width:5%'>&nbsp;</td>
                                            <td style='width:5%'>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style=';text-align:center'>`+line.nama_ta+`</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style=';text-align:center'>Kelas: `+line.kode_kelas+`</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style=';text-align:center'>KKM : `+line.kkm+`</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='9' >
                                `;
                                var det = `<table class='table table-bordered table-striped' style='width:100%'>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>PH1</th>
                                    <th>PH2</th>
                                    <th>PH3</th>
                                </tr>`;
                                var no = 1;
                                for(var x=0;x < res.detail.length; x++)
                                {       
                                    var line2 = res.detail[x];
                                    if(line.kode_pp == line2.kode_pp && line.kode_kelas  == line2.kode_kelas && line.kode_matpel == line2.kode_matpel){
                                        det +=`<tr>
                                            <td>`+no+`</td>
                                            <td>`+line2.nis2+`</td>
                                            <td>`+line2.nama+`</td>
                                            <td class='text-right'>`+sepNumPas(line2.n1)+`</td>
                                            <td class='text-right'>`+sepNumPas(line2.n2)+`</td>
                                            <td class='text-right'>`+sepNumPas(line2.n3)+`</td>
                                        </tr>`;
                                        no++;
                                    }
                                }
                                html+=det+`</table>
                                </td>
                            </tr>
                        </table>`;
                        if(i != (data.length - 1)){
                            html+=`<div class='separator2'></div>`;
                        }
                        html+=` <div class="page-break"></div>`;

            }
            html+=`
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   