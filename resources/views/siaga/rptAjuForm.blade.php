<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('siaga-report/lap-aju-form', null, formData, null, function(res){
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
        if(res.res.back){
            $('.navigation-lap').removeClass('hidden');
        }else{
            $('.navigation-lap').addClass('hidden');
        }
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
            var det='';
            var no=1;var total=0;
            var result = res.res;
            for(var i=0;i<result.detail.length;i++){
                total+=+parseFloat(result.detail[i].harga)*parseFloat(result.detail[i].jumlah);

                det +=`<tr>
                <td>`+no+`</td>
                <td>`+result.detail[i].nama_brg+`</td>
                <td>`+result.detail[i].satuan+`</td>
                <td class='text-right'>`+toRp(result.detail[i].jumlah)+`</td>
                <td class='text-right'>`+toRp(result.detail[i].harga)+`</td>
                <td class='text-right'>`+toRp(total)+`</td>
                </tr>`;
                no++;
            }
            det +=`<tr>
            <td colspan='5'>Total</td>
            <td class='text-right'>`+toRp(total)+`</td>
            </tr>`;
            
            var no=1;var det2='';
            for(var i=0;i<result.histori.length;i++){
                det2 +=`<tr>
                <td>`+result.histori[i].ket+`</td>
                <td>`+result.histori[i].nama_kar+`/`+result.histori[i].nik+`</td>
                <td>`+result.histori[i].nama_jab+`</td>
                <td>`+result.histori[i].tanggal+`</td>
                <td>`+result.histori[i].no_app+`</td>
                <td>`+result.histori[i].status+`</td>
                <td>&nbsp;</td>
                </tr>`;
                no++;
            }
            var html=`<div class="row px-4">
                <div class="col-12" style='border-bottom:3px solid black;text-align:center'>
                    <h5 class='mb-0'>JUSTIFIKASI</h5>
                    <h5>KEBUTUHAN BARANG ATAU JASA</h5>
                </div>
                <div class="col-12 my-2" style='text-align:center'>
                    <h6>Nomor : `+result.data[0].no_pb+`</h6>
                </div>
                <div class="col-12">
                    <table class="table table-condensed table-bordered" width="100%" id='table-m'>
                        <tbody>
                            <tr>
                                <td width="5%">1</td>
                                <td width="25">UNIT KERJA</td>
                                <td width="70%" id='print-unit'>`+result.data[0].nama_pp+`</td>
                            </tr>
                            <tr>
                                <td width="5%">2</td>
                                <td width="25">JENIS ANGGARAN</td>
                                <td width="70%" id='print-unit'>`+result.data[0].jenis+`</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>TOTAL NILAI</td>
                                <td id='print-kegiatan2'>`+sepNum(result.data[0].nilai)+`</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>TERBILANG</td>
                                <td id='print-kegiatan2'>`+terbilang(result.data[0].nilai)+` Rupiah</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>KEBUTUHAN</td>
                                <td id='print-pic'>`+result.data[0].keterangan+`</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>SAAT PENGGUNAAN</td>
                                <td id='print-waktu'>`+result.data[0].tanggal.substr(8,2)+' '+getNamaBulan(result.data[0].tanggal.substr(5,2))+' '+result.data[0].tanggal.substr(0,4)+`</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <h6 style='font-weight:bold'># <u>KEBUTUHAN</u></h6>
                </div>
                <div class="col-12">
                    <table class="table table-condensed table-bordered" width="100%" id="table-d">
                        <thead>
                            <tr>
                                <td style="width:3%">No</td>
                                <td style="width:15%">Nama Barang</td>
                                <td style="width:30%">Satuan</td>
                                <td style="width:10%">Harga</td>
                                <td style="width:6%">Qty</td>
                                <td style="width:15%">Jumlah Harga</td>
                            </tr>
                        </thead>
                        <tbody>`+det+`
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <h6 style='font-weight:bold'># <u>LATAR BELAKANG</u></h6>
                    <p>`+result.data[0].latar+`</p>
                </div>
                <div class="col-12">
                    <h6 style='font-weight:bold'># <u>ASPEK STRATEGIS</u></h6>
                    <p>`+result.data[0].strategis+`</p>
                </div>
                <div class="col-12">
                    <h6 style='font-weight:bold'># <u>ASPEK BISNIS</u></h6>
                    <p>`+result.data[0].bisnis+`</p>
                </div>
                <div class="col-12">
                    <h6 style='font-weight:bold'># <u>SPESIFIKASI TEKNIS</u></h6>
                    <p>`+result.data[0].teknis+`</p>
                </div>
                <div class="col-12">
                    <h6 style='font-weight:bold'># <u>ASPEK LAIN</u></h6>
                    <p>`+result.data[0].lain+`</p>
                </div>
                    <div class="col-12">
                        <h6 style='font-weight:bold'># <u>LAMPIRAN</u></h6>
                    </div>
                    <div class="col-12">
                    <table class="table table-condensed table-bordered" width="100%" id="table-penutup">
                    <thead class="text-center">
                    <tr>
                    <td width="10%"></td>
                    <td width="25">NAMA/NIK</td>
                    <td width="15%">JABATAN</td>
                    <td width="10%">TANGGAL</td>
                    <td width="15%">NO APPROVAL</td>
                    <td width="10%">STATUS</td>
                    <td width="15%">TTD</td>
                    </tr>
                    </thead>
                    <tbody>`+det2+`
                    </tbody>
                    </table>
                    </div>
                </div>`;
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   