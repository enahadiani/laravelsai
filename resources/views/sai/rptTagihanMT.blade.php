<style>
@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
#printPreview
{
    font-family: 'Roboto', sans-serif !important;
    margin-top: 70px;
    font-size: 12px;
}

#printPreview h3, #printPreview h6
{
    font-family: 'Roboto', sans-serif !important;
}
.table-print {
    border: 1px solid black;
    border-collapse: collapse;
  }
</style>
<div id='canvasPreview'></div>
{{-- <div id='printPreview'></div> --}}
<script src="{{ asset('asset_elite/sai.js') }}"></script>
<script type="text/javascript">
function drawLap(formData){
    saiPost('sai-report/lap-tagihan', null, formData, null, function(res){
        console.log(res)
        if(res.result.length > 0){
            $('#pagination').html('');
            generatePagination('pagination',5,res);
           }
    });
}

drawLap($formData);

    function drawRptPage(data,res,from,to){
        var data = data;
        console.log(data.length);
        console.log(data);
        if(data.length>0){
            var mon_html = "<div align='center' id='sai-rpt-table-export-tbl-daftar-pnj'>";
            var arr_tl = [0,0,0,0,0,0,0,0,0];
            var x=1;
            mon_html+=`
            <table class='table no-border'>
                <tbody>
                    <tr>
                        <td align="center">
                            <style>
                            td,th{
                                padding:4px !important;
                                vertical-align:middle !important;
                            }
                            /*.header_laporan,.isi_laporan {
                                border:1px solid #e9ecef !important;
                            }*/
                            th{
                                text-align:center;
                            }
                            </style>
                            <div class="table-responsive">
                            <table class='table table-striped color-table info-table table-tagihan'>
                                <thead>
                                    <tr>
                                        <th class="header_laporan">No</th>
                                        <th class="header_laporan">No Dokumen</th>
                                        <th class="header_laporan">Customer</th>
                                        <th class="header_laporan">Keterangan</th>
                                        <th class="header_laporan" align="right">Nilai</th>
                                        <th class="header_laporan" align="right">Nilai PPN</th>
                                        <th class="header_laporan" align="center">Print</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                                var det = '';
                                if(isNaN(from)){
                                    var no=1;
                                }else{
                                    var no=from+1;
                                }
                                for (var x=0;x<data.length;x++)
                                {
                                    var line2 = data[x];
                                    
                                    det+=`<tr>
                                        <td align='center' class='isi_laporan'>`+no+`</td>
                                        <td  class='isi_laporan dokumen'>`+line2.no_dokumen+`</td>
                                        <td class='isi_laporan customer'>`+line2.cust+`</td>
                                        <td class='isi_laporan'>`+line2.keterangan_kontrak+`</td>
                                        <td align='right' class='isi_laporan'>`+sepNum(line2.nilai_kontrak)+`</td>
                                        <td align='right' class='isi_laporan'>`+sepNum(line2.nilai_ppn_kontrak)+`</td>
                                        <td class='isi_laporan' style='margin:auto;display:block;'>`+"<a href='#' title='Preview' class='badge badge-info btn-print' id='btn-print'><i class='fas fa-print'></i></a>"+`</td>
                                    </tr>`;	
                                    no++;   
                                }
                                mon_html+=det+
                                `</tbody>
                            </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table><br>
            <div style="page-break-after:always"></div>
            `;   
            mon_html+="</div>"; 
        }
        $('#canvasPreview').html(mon_html);
        $('li.first a ').html("<i class='icon-control-start'></i>");
        $('li.last a ').html("<i class='icon-control-end'></i>");
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
        $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }

    $('.table-tagihan').on('click', '.btn-print', function(){
        var dokumen = $(this).closest('tr').find('.dokumen').text();
        var customer = $(this).closest('tr').find('.customer').text();
        var customerSplit = customer.split('-');
        var kode_cust = customerSplit[0];
        var no_dokumen = dokumen.replace(/\//g,'.');
        console.log(no_dokumen);

        $.ajax({
            type:'GET',
            url:"{{ url('sai-report/cetak-tagihan-maintenance') }}/"+no_dokumen+"/"+kode_cust,
            dataType: 'json',
            async:false,
            success: function(result){
                if(result.status) {
                    var date = new Date();
                    var html = '';
                    html += `<div id="printPreview" style="margin-top: 70px;">
                    <section id="tanggal-surat">
                    <table>
                    <tr>
                        <td>Bandung, ${date.getDate()} ${result.data.bulan_tagihan} ${date.getFullYear()}</td>
                    </tr>
                    </table>
                </section>`;
                    html += `
                    <section id="nomor-surat" style="margin-top: 30px;">
                    <table>
                    <tr>
                        <td>Nomor</td>
                        <td>:</td>
                        <td>${result.data.data[0].no_bill}</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>:</td>
                        <td>Permohonan Pembayaran</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>:</td>
                        <td>1 (Satu) bundel</td>
                    </tr>
                    </table>
                </section>

                <section id="alamat-tujuan" style="margin-top: 40px;">
                    <table>
                    <tr>
                        <td>Kepada Yth,</td>
                    </tr>
                    <tr>
                        <td><b>${result.data.data[0].nama}</b></td>
                    </tr>
                    <tr>
                        <td><b>${result.data.data[0].jabatan_pic}</b></td>
                    </tr>
                    <tr>
                        <td>${result.data.data[0].alamat}</td>
                    </tr>
                    <tr>
                        <td>${result.data.data[0].provinsi}</td>
                    </tr>
                    </table>
                </section>`;
                var tgl = result.data.data[0].tgl_sepakat;
                var split = tgl.split('-');
                html += `<section id="isi-surat" style="margin-top: 40px;">
                    <table style="width: 100%;">
                        <tr>
                            <td>Dengan hormat,</td>
                        </tr>
                        </table>
                        <table style="width: 100%;">
                        <tr>
                            <td style="padding: 10px 15px 15px 0px; width: 5%;">1.</td>
                            <td style="width: 80%; text-align: justify; padding-top: 10px;">
                            Menunjuk Perjanjian Kerja Sama Nomor : ${result.data.data[0].no_dokumen} tanggal
                            ${split[2]} ${result.data.bulan_sepakat} ${split[0]} perihal ${result.data.data[0].keterangan}.
                            </td>
                        </tr>
                    </table>
                </section>
                `;

                html += `</div>`;
                var winPrint = window.open('', '', 'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
                winPrint.document.write(html);
                winPrint.document.close();
                winPrint.focus();
                winPrint.print();
                } 
            }
        });

    });

</script>