<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('siaga-report/lap-history-app', null, formData, null, function(res){
            if(res.result.length > 0){
                
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
                
            }else{
                $('#saku-report #canvasPreview').load("{{ url('siaga-auth/form/blank') }}");
            }
        });
    }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        console.log(res);
        if(res.res.back){
            $('.navigation-lap').removeClass('hidden');
        }else{
            $('.navigation-lap').addClass('hidden');
        }
        console.log(res.back);
        if(data.length > 0){
            var html = `<div class="px-3">
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
                }
            </style>
            `;
            periode = $periode;
            var lokasi = "{{ Session('namaLokasi') }}";
            html+=judul_lap("LAPORAN HISTORI APPROVAL",lokasi,'Periode '+periode.fromname)+`
                `;
            console.log(data.length);
            for(var i=0;i<data.length;i++) {
                    var line = data[i]
                    if(line.color === 'green') {
                        color = '#00c292'
                    } else {
                        color = '#03a9f3'
                    }
                    
                    html += `
                    <div class="d-flex flex-row mb-3">
                        <a class="d-block position-relative" href="#">
                            <div style='padding-top: 2px; border: 1px solid ${color}; border-radius: 50%; background: ${color}; color: #ffffff; width: 50px; height:50px;text-align: center;'>
                            <i style='font-size: 25px;' class='iconsminds-file-clipboard-file---text'></i>
                            </div>
                        </a>
                        <div class="col-12 pl-3 pt-2 pr-2 pb-2">
                            <a href="#">
                                <p class="list-item-heading"><a href='javascript:void(0)' class='link'>
                                ${line.nama_kar} <span class='sl-date'>${line.tanggal} (${line.status})</span>
                                </a></p>
                                <div class="pr-2 row">
                                    <div class='col-6'>No Bukti :</div>    
                                    <div class='col-6'>${line.no_bukti}</div>    
                                    <div class='col-6'>Catatan :</div>    
                                    <div class='col-6'>${line.keterangan}</div>  
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <hr />
                    `;
            }
                
            html+="</div>"; 
        }else{
                
            html += `
                <div class='sl-item'>
                    <div class='sl-left'>
                        <div style='padding: 10px;border: 1px solid #959595;border-radius: 50%;background: #959595;color: #ffffff;width: 50px;text-align: center;'>
                            <i style='font-size: 25px;' class='simple-icon-envelope'></i> 
                        </div>
                    </div> 
                    <div class="sl-right">
                        Belum ada proses approval.
                        <br>
                        <br>
                    <div>   
                </div>
                `;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   