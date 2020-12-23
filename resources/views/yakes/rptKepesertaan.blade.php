<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-kepesertaan') }}", null, formData, null, function(res){
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
                .box-aqua {
                    background:#288372;
                    color:white;
                    height:60px;
                    border-radius:0 !important;
                    padding:0.5rem;
                }
                .report-table th{
                    color: white !important;
                    background-color: #288372 !important;
                    border-color: white !important;
                    text-align: center;
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                }
                .report-table td{
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                }
                .box-aqua h3{
                    margin-bottom:0 !important;
                    color:white;
                }
                .box-aqua p{
                    margin-bottom:0 !important;
                    font-size: 10px !important;
                }
                .bold{
                    font-weight:bold;
                }
                .glyph-icon{
                    font-size:35px;
                }
                .class-name{
                    font-weight:bold;
                }
                .glyph span{
                    font-size: 10px;
                }
            </style>
            <div class='row'>
                <div class='col-md-3 col-12'></div>
                <div class='col-md-2 col-4'><div class='card box-aqua text-center'><h3 class='bold'>`+sepNum(data[0].total)+`</h3><p>Total Peserta</p></div></div>
                <div class='col-md-2 col-4'><div class='card box-aqua text-center'><h3 class='bold'>`+sepNum(res.res.data2[1].tot_jenis)+`</h3><p>Pensiunan</p></div></div>
                <div class='col-md-2 col-4'><div class='card box-aqua text-center'><h3 class='bold'>`+sepNum(res.res.data2[0].tot_jenis)+`</h3><p>Karyawan</p></div></div>
                <div class='col-md-3 col-12'></div>
            </div>`;
            html+=`
            <div class='row mt-4'>`;
                for(var i=0; i < res.res.data3.length;i++){
                    var line = res.res.data3[i];
                    html+=`
                    <div class='col-md-6 col-12'>
                        <p class='text-center mt-2'>`+line.jenis+`</p>
                        <div class='row'>
                            <div class='col-md-3 text-center'>
                                <div class='glyph'>
                                    <div class='glyph-icon iconsminds-business-man'></div>
                                    <div class='class-name'>`+sepNum(line.kk)+`</div>
                                    <span>KK</span>
                                </div>
                            </div>
                            <div class='col-md-3 text-center'>
                                <div class='glyph'>
                                    <div class='glyph-icon iconsminds-male-female'></div>
                                    <div class='class-name'>`+sepNum(line.pas)+`</div>
                                    <span>Pasangan</span>
                                </div>
                            </div>
                            <div class='col-md-3 text-center'>
                                <div class='glyph'>
                                    <div class='glyph-icon iconsminds-female'></div>
                                    <div class='class-name'>`+sepNum(line.anak)+`</div>
                                    <span>Anak</span>
                                </div>
                            </div>
                            <div class='col-md-3 text-center'>
                                <div class='glyph'>
                                    <div class='glyph-icon iconsminds-male'></div>
                                    <div class='class-name'>`+sepNum(line.jd)+`</div>
                                    <span>JD/DD</span>
                                </div>
                            </div>
                            <div class='col-md-12 mt-2'>
                                <table class='report-table table-striped table-bordered' width='100%'>
                                    <tr>
                                        <th width='50%'>Area</th>
                                        <th width='25%'>Jumlah</th>
                                        <th width='25%'>%</th>
                                    </tr>
                                    `;
                                    var det =``;
                                    var total = parseFloat(line.kk)+parseFloat(line.pas)+parseFloat(line.anak)+parseFloat(line.jd);
                                    for(var j=0; j < res.res.data4.length; j++){
                                        var line2 = res.res.data4[j];
                                        if(line.jenis == line2.jenis){
                                            var jumlah = parseFloat(line2.kk)+parseFloat(line2.pas)+parseFloat(line2.anak)+parseFloat(line2.jd);
                                            var persen = (jumlah/total)*100;
                                            det +=`
                                            <tr>
                                                <td width='50%'>`+line2.nama+`</td>
                                                <td width='25%' class='text-right'>`+sepNum(jumlah)+`</td>
                                                <td width='25%' class='text-right'>`+sepNum(persen)+`%</td>
                                            </tr>
                                            `;
                                        }
                                    }
                                    html+=det+`
                                </table>
                            </div>
                        </div>
                    </div>
                    `;
                }
                // html+=`
                // <div class='col-md-6 col-12'>
                //     <p class='text-center mt-2'>Karyawan</p>
                //     <div class='row'>
                //         <div class='col-md-4 text-center'>
                //             <div class='glyph'>
                //                 <div class='glyph-icon iconsminds-business-man'></div>
                //                 <div class='class-name'>9.237</div>
                //                 <span>KK</span>
                //             </div>
                //         </div>
                //         <div class='col-md-4 text-center'>
                //             <div class='glyph'>
                //                 <div class='glyph-icon iconsminds-male-female'></div>
                //                 <div class='class-name'>7.065</div>
                //                 <span>Pasangan</span>
                //             </div>
                //         </div>
                //         <div class='col-md-4 text-center'>
                //             <div class='glyph'>
                //                 <div class='glyph-icon iconsminds-female'></div>
                //                 <div class='class-name'>11.013</div>
                //                 <span>Anak</span>
                //             </div>
                //         </div>
                //         <div class='col-md-12 mt-2'>
                //             <table class='report-table table-striped table-bordered' width='100%'>
                //                 <tr>
                //                     <th width='50%'>Area</th>
                //                     <th width='25%'>Jumlah</th>
                //                     <th width='25%'>%</th>
                //                 </tr>
                //             </table>
                //         </div>
                //     </div>
                // </div>`;
                html+=`
            </div>
            
            `;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   