<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('sukka-report/lap-aju-juskeb-form', null, formData, null, function(res){
            if(res.result.length > 0){
                
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
                
            }else{
                $('#saku-report #canvasPreview').load("{{ url('sukka-auth/form/blank') }}");
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
            </style>`;
            for(var a=0; a < data.length; a++){
                var line = data[0];
                html += `
                <div class="row px-4">
                    <div class="col-12" style="border-bottom:3px solid black;text-align:center">
                        <h6 style="margin-bottom:0px !important">JUSTIFIKASI</h6>
                        <h6>KEBUTUHAN</h6>
                    </div>
                    <div class="col-12 my-2" style="text-align:center">
                        <h6>Nomor : ${line.no_bukti}</h6>
                    </div>
                    <div class="col-12">
                        <table class="table table-condensed table-bordered" width="100%"  id="table-m">
                            <tbody>
                                <tr>
                                    <td width="5%">1</td>
                                    <td width="25">UNIT KERJA</td>
                                    <td width="70%" id="print-unit">${line.nama_pp}</td>
                                </tr>
                                <tr>
                                    <td width="5%">2</td>
                                    <td width="25">JENIS ANGGARAN</td>
                                    <td width="70%" id="print-unit">${line.jenis}</td>
                                </tr>
                                <tr>
                                    <td width="5%">3</td>
                                    <td width="25">JENIS RRA</td>
                                    <td width="70%" id="print-unit">${line.nama_jenis}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>TOTAL NILAI</td>
                                    <td id="print-kegiatan2">${ number_format(line.nilai) }</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>TERBILANG</td>
                                    <td id="print-kegiatan2" style="text-transform: capitalize">${ terbilang(line.nilai) } Rupiah</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>PERIODE PENGGUNAAN</td>
                                    <td id="print-waktu">${ namaPeriode(line.periode) }</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>KEGIATAN</td>
                                    <td id="print-pic">${ line.kegiatan }</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <p style="font-weight:bold"># <u>LATAR BELAKANG</u></p>
                        <p>${line.latar}</p>
                    </div>
                    <div class="col-12">
                        <p style="font-weight:bold"># <u>ASPEK STRATEGIS</u></p>
                        <p>${line.aspek}</p>
                    </div>
                    <div class="col-12">
                        <p style="font-weight:bold"># <u>SPESIFIKASI TEKNIS</u></p>
                        <p>${line.spesifikasi}</p>
                    </div>
                    <div class="col-12">
                        <p style="font-weight:bold"># <u>RENCANA PELAKSANAAN</u></p>
                        <p>${line.rencana}</p>
                    </div>
                    <div class="col-12">
                        <p style="font-weight:bold"># <u>DETAIL</u></p>
                    </div>
                    <div class="col-12">
                        <table class="table table-condensed table-bordered" style='border:1px solid black;border-collapse:collapse' border="1" width="100%" id="table-penutup">
                            <thead class="text-center">
                            <tr>
                            <td width="5%">NO</td>
                            <td width="10">KODE AKUN</td>
                            <td width="25">NAMA AKUN</td>
                            <td width="10">KODE PP</td>
                            <td width="25">NAMA PP</td>
                            <td width="10">KODE DRK</td>
                            <td width="25">NAMA DRK</td>
                            <td width="10%">PERIODE</td>
                            <td width="10%">DONOR</td>
                            <td width="10%">PENERIMA</td>
                            </tr>
                        </thead>
                        <tbody>`;
                        var total =0; var no=0; 
                        for(i=0; i < line.detail.length; i++){
                            var line2 = line.detail[i];
                            no++;
                            html+=`
                            <tr>
                            <td>${no}</td>
                            <td>${line2.kode_akun}</td>
                            <td>${line2.nama_akun}</td>
                            <td>${line2.kode_pp}</td>
                            <td>${line2.nama_pp}</td>
                            <td>${line2.kode_drk}</td>
                            <td>${line2.nama_drk}</td>
                            <td>${line2.periode}</td>
                            <td align='right' class='isi_laporan'>${number_format(line2.kredit)}</td>
                            <td align='right' class='isi_laporan'>${number_format(line2.debet)}</td>
                            </tr>`;
                        } 
                        html+=`
                        </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <p style="font-weight:bold"># <u>LAMPIRAN</u></p>
                    </div>
                    <div class="col-12">
                        <table class="table table-condensed table-bordered" style='border:1px solid black;border-collapse:collapse' border="1" width="100%" id="table-penutup">
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
                        <tbody>`;
                        var total =0; var no=0;
                        for(var i=0; i < res.detail.length; i++){
                            var line2 = res.detail[i];
                            no++;
                            html+=`
                            <tr>
                            <td>${line2.ket } </td>
                            <td>${line2.nama_kar } / ${line2.nik } </td>
                            <td>${line2.nama_jab } </td>
                            <td>${line2.tanggal } </td>
                            <td>${line2.no_app } </td>
                            <td>${line2.status } </td>
                            <td>&nbsp;</td>
                            </tr>`;
                        }
                        html+=`
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                `;
                if(a != (data.length - 1)){
                    html+=`<DIV style='page-break-after:always'></DIV>`;
                }
            }
            
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   