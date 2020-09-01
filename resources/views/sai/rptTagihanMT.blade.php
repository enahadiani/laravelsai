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
                    html += `<div id="printPreview" style="margin-top: 70px;padding-left:30px;">
                    <div id="tanggal-surat" style="position:fixed;">
                    <table>
                    <tr>
                        <td>Bandung, ${date.getDate()} ${result.data.bulan_tagihan} ${date.getFullYear()}</td>
                    </tr>
                    </table>
                </div>`;
                    html += `
                    <div id="nomor-surat" style="margin-top: 40px;position:fixed;">
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
                </div>

                <div id="alamat-tujuan" style="margin-top: 120px;position:fixed;">
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
                </div>`;
                var tgl = result.data.data[0].tgl_sepakat;
                var split = tgl.split('-');
                html += `<div id="isi-surat-1" style="margin-top: 240px;position:fixed;">
                    <table style="width:100%;">
                        <tr>
                            <td>Dengan hormat,</td>
                        </tr>
                    </table>
                </div>`;
                html += `<div id="isi-surat-2" style="margin-top: 275px;position:fixed;">
                    <table style="width:95%;">
                        <tr>
                            <td style="width: 5%;" valign="top">1.</td>
                            <td style="text-align: justify;">
                             Menunjuk Perjanjian Kerja Sama Nomor : ${result.data.data[0].no_dokumen} tanggal
                             ${split[2]} ${result.data.bulan_sepakat} ${split[0]} perihal ${result.data.data[0].keterangan}.
                            </td>
                        </tr>
                    </table>
                </div>`;
                html += `<div id="isi-surat-3" style="margin-top: 335px;position:fixed;">
                    <table style="width:95%;">
                        <tr>
                            <td style="width: 5%;" valign="top">2.</td>
                            <td style="text-align: justify;">
                                Sehubungan dengan hal di atas, maka kami mengajukan permohonan pembayaran sebesar
                                <b>Rp. ${sepNum(result.data.data[0].nilai_akhir)},- (${result.data.terbilang})</b> termasuk PPN
                                10% dengan perincian sebagai berikut :
                            </td>
                        </tr>
                    </table>
                </div>`;
                html += `<div id="isi-surat-4" style="margin-top: 400px;margin-left:35px;position:fixed;">
                    <table style="width:100%;border: 1px solid black;border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="background-color: ghostwhite; width: 70%;border: 1px solid black;border-collapse: collapse;">
                                    KETERANGAN
                                </th>
                                <th style="background-color: ghostwhite; width: 30%;border: 1px solid black;border-collapse: collapse;">
                                    NILAI
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid black;border-collapse: collapse;padding:3px;">
                                    Biaya Sewa Aplikasi Keuangan Bulan ${result.data.bulan_tagihan}
                                </td>
                                <td style="border: 1px solid black;border-collapse: collapse;text-align:right;padding:3px;">
                                    Rp. ${sepNum(result.data.data[0].nilai)}
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;border-collapse: collapse;padding:3px;">
                                    PPN 10%
                                </td>
                                <td style="border: 1px solid black;border-collapse: collapse;text-align:right;padding:3px;">
                                    Rp. ${sepNum(result.data.data[0].nilai_ppn)}
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;border-collapse: collapse;padding:3px;">
                                    Jumlah Tagihan
                                </td>
                                <td style="border: 1px solid black;border-collapse: collapse;text-align:right;padding:3px;">
                                    Rp. ${sepNum(result.data.data[0].nilai_akhir)}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>`;
                html += `<div id="isi-surat-5" style="margin-top: 515px;position:fixed;">
                    <table style="width:100%;">
                        <tr>
                            <td style="width: 8%;" valign="top">3.</td>
                            <td style="text-align: justify;">
                                Pembayaran mohon ditransfer ke :
                                <table style="width:100%;">
                                    <tr>
                                        <td>Bank</td>
                                        <td>:</td>
                                        <td>${result.data.data_bank[0].bank}</td>
                                    </tr>
                                    <tr>
                                        <td>Cabang</td>
                                        <td>:</td>
                                        <td>${result.data.data_bank[0].cabang}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Rekening</td>
                                        <td>:</td>
                                        <td>${result.data.data_bank[0].no_rek}</td>
                                    </tr>
                                        <td>Atas Nama</td>
                                        <td>:</td>
                                        <td>${result.data.data_bank[0].nama_rek}</td>
                                    </tr>
                                    </tr>
                                        <td colspan="3"><small>*Pembayaran maksimal ${result.data.data[0].due_date} hari setelah tagihan diterbitkan</small></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>`;
                var lamp = ``;
                for(var i=0;i<result.data.data_lampiran.length;i++){
                   lamp += `<tr>
                        <td>${result.data.data_lampiran[i]}</td>
                    </tr>`;
                }
                html += `<div id="isi-surat-6" style="margin-top: 660px;position:fixed;padding-bottom:20px;">
                    <table style="width:100%;">
                        <tr>
                            <td style="width: 6%;" valign="top">4.</td>
                            <td style="text-align: justify;">
                            Untuk melengkapi surat permohonan ini, kami lampirkan pula dokumen sebagai berikut :
                            <table>
                           `+lamp+
                           `</table>
                           </td>
                        </tr>
                    </table>
                </div>`;
                html += `<div id="isi-surat-7" style="margin-top: 790px;position:fixed;">
                    <table style="width:100%;">
                        <tr>
                            <td style="width: 6%;" valign="top">5.</td>
                            <td style="text-align: justify;">
                                Demikian kami sampaikan, atas perhatian dan kerja samanya kami ucapkan terima kasih.
                            </td>
                        </tr>
                    </table>
                </div>`;
                html += `<div id="isi-surat-8" style="margin-top: 860px;position:fixed;">
                    <table style="width:100%;">
                        <tr>
                            <td>Hormat kami,</td>
                        </tr>
                        <tr>
                            <td style="padding-top: 50px;">
                                <b style="text-decoration: underline;">Gamal Abdul Gani</b>
                                <p style="margin-top: -3px;"><b>Direktur</b></p>
                            </td>
                        </tr>
                    </table>
                </div>`;
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