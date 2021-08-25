<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('siaga-report/lap-aju-form-spb', null, formData, null, function(res){
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
            var line = data[0];
            var logo = "{{ asset('img/gratika2.jpg') }}";
            var html = `<div class="px-3" align="center">
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
                }
            </style>
            <table width='800' border='1' cellspacing='0' cellpadding='0' class='kotak'>
            <tr>
                <td colspan='2'><table width='800' border='0' cellspacing='2' cellpadding='1'>
                <tr>
                    <td width='146'><img src='`+logo+`' width='200' height='80' /></td>
                    <td width='640' align='center' class='istyle17'><h4>SURAT PERINTAH BAYAR</h4></td>
                </tr>
                <tr>
                    <td colspan='2' align='center'>DIREKTORAT KEUANGAN</td>
                    </tr>
                </table></td>
            </tr>
            <tr>
                <td align='center'><table width='350' border='0' cellspacing='2' cellpadding='1'>
                <tr>
                    <td width='158'>No. PO </td>
                    <td width='182'>: `+line.no_po+`</td>
                </tr>
                <tr>
                    <td>Tgl. PO </td>
                    <td>: `+line.tgl_po+`</td>
                </tr>
                <tr>
                    <td>No./Tgl BA/Log TR </td>
                    <td>: `+line.no_ba+` / `+line.tgl_ba+`</td>
                </tr>
                <tr>
                    <td>No Dokumen </td>
                    <td>: `+line.no_dok+`</td>
                </tr>
                <tr>
                    <td>No. Ref. Dokumen </td>
                    <td>: `+line.no_ref+`</td>
                </tr>
                <tr>
                    <td>Tgl. Dok </td>
                    <td>: `+line.tgl_dok+`</td>
                </tr>
                <tr>
                    <td>Kode Perkiraan </td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td>Kode Lokasi </td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td>Cost Centre </td>
                    <td>: -</td>
                </tr>
                </table></td>
                <td align='center'><table width='350' border='0' cellspacing='2' cellpadding='1'>
                <tr>
                    <td>No. SPB </td>
                    <td width='182'>: `+line.no_spb+`</td>
                </tr>
                <tr>
                    <td>Tgl. SPB </td>
                    <td>: `+line.tgl+`</td>
                </tr>
                <tr>
                    <td>No./Tgl. PRPK </td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td>No. DRK/TRIW </td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td>Keg. Menurut DRK </td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>Beban Angg Thn </td>
                    <td>: `+line.tahun+`</td>
                </tr>
                <tr>
                    <td>Rekening </td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>Jenis Transaksi </td>
                    <td>:</td>
                </tr>
                </table></td>
            </tr>
            <tr align='left'>
                <td colspan='2'><table width='400' border='0' cellspacing='2' cellpadding='1'>
                <tr>
                    <td width='23'>&nbsp;</td>
                    <td width='367'>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Jakarta, `+line.tanggal.substr(8,2)+` `+namaPeriode(line.tanggal.substr(0,4)+''+line.tanggal.substr(5,2))+` </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Dokumen Penagihan disahkan oleh</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Mgr. Finanace/GM Fin. &amp; Acc.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td height='60' valign='bottom'>`+line.nama_bdh+`</td>
                </tr>
                </table></td>
            </tr>
            <tr>
                <td colspan='2'><table width='750' border='0' cellspacing='2' cellpadding='1'>
                <tr>
                    <td width='25'>&nbsp;</td>
                    <td width='178'>Harap dibayarkan :<br></td>
                    <td width='220'>&nbsp;</td>
                    <td width='309'>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Sebesar </td>
                    <td colspan='2'>: `+sepNum(line.nilai)+`</td>
                    </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Terbilang </td>
                    <td colspan='2'>: `+terbilang(line.nilai)+`</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Kepada </td>
                    <td colspan='2'>: `+line.nama+`</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Alamat </td>
                    <td colspan='2'>: `+line.alamat+`</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Bank </td>
                    <td colspan='2'>: `+line.bank+`</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>No. Rekening </td>
                    <td colspan='2'>: `+line.norek+`</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Alamat Bank </td>
                    <td colspan='2'>: `+line.alamat+`</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Untuk Pembayaran </td>
                    <td colspan='2'>: `+line.keterangan+`</td>
                    </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Jakarta, `+line.tanggal.substr(8,2)+` `+namaPeriode(line.tanggal.substr(0,4)+''+line.tanggal.substr(5,2))+` </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>GM Fin. &amp; Acc. / Dir. Adm. &amp; Keu.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td height='60' valign='bottom'>`+line.nama_ver+`</td>
                </tr>
                </table></td>
            </tr>
            <tr>
                <td align='center'><table width='350' border='0' cellspacing='2' cellpadding='1'>
                <tr>
                    <td width='158'>Catatan Pembayaran: </td>
                    <td width='182'>:</td>
                </tr>
                <tr>
                    <td>JUMLAH TAGIHAN </td>
                    <td>: `+line.kode_curr+` `+sepNum(line.tagihan)+` </td>
                </tr>
                <tr>
                    <td>PPN</td>
                    <td>: `+line.kode_curr+` `+sepNum(line.ppn)+` </td>
                </tr>
                <tr>
                    <td>          PPh </td>
                    <td>: `+line.kode_curr+` `+sepNum(line.pph)+`</td>
                </tr>
                <tr>
                    <td>SubTotal (a) </td>
                    <td>: `+line.kode_curr+` `+sepNum(line.nilai)+`</td>
                </tr>
                <tr>
                    <td>Potongan lain: </td>
                    <td>:</td>
                </tr>
                <tr>
                    <td>Jumlah Potongan lain (b) </td>
                    <td>: `+line.kode_curr+` 0</td>
                </tr>
                <tr>
                    <td>Jumlah dibayarkan (a-b) </td>
                    <td>: `+line.kode_curr+` `+sepNum(line.nilai)+`</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                </tr>
                </table></td>
                <td align='center' valign='top'><table width='350' border='0' cellspacing='2' cellpadding='1'>
                <tr>
                    <td colspan='2'>Catatan Pembayaran </td>
                    </tr>
                <tr>
                    <td colspan='2'>Telah dibayar uang sejumlah : `+line.kode_curr+` `+sepNum(line.nilai)+` </td>
                    </tr>
                <tr>
                    <td width='68' valign='top'>Terbilang :</td>
                    <td width='272' valign='top'>`+terbilang(line.nilai)+`</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Jakarta, `+line.tanggal.substr(8,2)+` `+namaPeriode(line.tanggal.substr(0,4)+''+line.tanggal.substr(5,2))+` </td>
                </tr>
                <tr>
                    <td height='60'>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                </table></td>
            </tr>
            <tr>
                <td height='60' valign='top'>&nbsp;&nbsp; &nbsp;Catatan Perpajakan :  &nbsp;`+line.cat_pajak+`</td>
                <td valign='top'>&nbsp;&nbsp;&nbsp;&nbsp;Catatan Perbendaharaan :  &nbsp;`+line.cat_bdh+`</td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="col-12">
                        <p style='font-weight:bold'># <u>LAMPIRAN</u></p>
                    </div>
                    <div class="col-12">
                    <table id="table-penutup" style="border: 1px solid black;border-collapse: collapse;margin-bottom: 20px;" class="" width="100%" border="1">
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
                    var det2 =``;
                    var no=1;var det2='';
                    var result = res.res;
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
                    html+=det2+`
                    </tbody>
                    </table>
                    </div>
                </td>
            </tr>
            </table>
            <br><DIV style='page-break-after:always'></DIV>
            `;
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   