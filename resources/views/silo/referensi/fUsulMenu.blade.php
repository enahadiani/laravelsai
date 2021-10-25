<link rel="stylesheet" href="{{ asset('dashboard.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<style>
    #saku-datatable .card
    {
        padding:0 !important;
    }
    #saku-form .card
    {
        padding:0 !important;
    }
</style>
<div class="top-menu">
    <div class='navbar-top w-100 text-center'>
        <div class="header-icons d-inline-block align-middle">
            <a href="#" data-href='fUsulDash' class="header-icon btn btn-empty active" type="button" >
                <i class="simple-icon-home" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Home</h6>
            </a>
            <a href="#" data-href='fUsulDraft' class="header-icon btn btn-empty" type="button" >
                <i class="simple-icon-notebook" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Draft</h6>
            </a>
            <a href="#" data-href='fUsulAju' class="header-icon btn btn-empty" type="button" >
                <i class="simple-icon-doc" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Pengajuan</h6>
            </a>
            <a href="#" data-href='fUsulSedang' class="header-icon btn btn-empty" type="button" >
                <i class="simple-icon-settings" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Sedang Proses</h6>
            </a>
            <a href="#" data-href='fUsulPerlu' class="header-icon btn btn-empty" type="button" >
                <i class="simple-icon-pencil" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Perlu Proses</h6>
            </a>
            <a href="#" data-href='fUsulTelah' class="header-icon btn btn-empty" type="button" >
                <i class="iconsminds-box-full" style="font-size:1.3rem"></i>
                <h6 style="font-size:0.85rem !important">Telah Proses</h6>
            </a>
            <a href="#" data-href='fUsulSelesai' class="header-icon btn btn-empty" type="button" >
                <i class="simple-icon-check" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Selesai</h6>
            </a> 
            <a href="#" data-href='fUsulBatal' class="header-icon btn btn-empty" type="button" >
                <i class="simple-icon-close" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Batal</h6>
            </a>

        </div>
    </div>
</div>
<div style="margin-top:130px" id="trans-body">
    
</div>
@include('rkap.page_preview')
@include('rkap.page_history')
<script>
    function getNamaBulan(no_bulan){
        switch (no_bulan){
            case 1 : case '1' : case '01': bulan = "Januari"; break;
            case 2 : case '2' : case '02': bulan = "Februari"; break;
            case 3 : case '3' : case '03': bulan = "Maret"; break;
            case 4 : case '4' : case '04': bulan = "April"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Juni"; break;
            case 7 : case '7' : case '07': bulan = "Juli"; break;
            case 8 : case '8' : case '08': bulan = "Agustus"; break;
            case 9 : case '9' : case '09': bulan = "September"; break;
            case 10 : case '10' : case '10': bulan = "Oktober"; break;
            case 11 : case '11' : case '11': bulan = "November"; break;
            case 12 : case '12' : case '12': bulan = "Desember"; break;
            default: bulan = null;
        }

        return bulan;
    }
    var $edit = 0; 
    var $id_edit = "";
    $('.navbar-top a').click(function(){
        $('.navbar-top a').removeClass('active');
        var form = $(this).data('href');
        if(form == "fUsulAju"){
            $edit = 0;
            $id_edit = "";
        }
        $(this).addClass('active');
        var url = "{{ url('rkap-auth/form')}}/"+form;
        $('#saku-print').hide();
        $('#saku-history').hide();     
        $('#trans-body').load(url);
    });

    $('#trans-body').load("{{ url('rkap-auth/form')}}/fUsulDash");

    function printPreview(id, from,form,table) {
        console.log(id);
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/aju-usul-preview') }}",
            data:{no_bukti: id},
            dataType: 'json',
            async:false,
            success:function(result){ 
                backTo = from
                if(typeof result.data !== 'undefined' && result.data.length > 0) {
                    var html = "";
                    var no = 1;
                    var total = 0
                    var data = result.data[0]
                    html += `
                    <div class='col-12 my-3 text-center'>
                    <table class='w-100 table-borderless'>
                        <tr>
                            <td colspan='7' class='text-center p-1'>
                            <h5 class="mb-0">PENGAJUAN DURK</h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='7' class='text-center p-1' style='border-bottom:3px solid black'>
                                <h6 id='kegiatan'>${data.no_bukti}</h6>
                            </td>
                        </tr>
                    </table>
                    </div>    
                    <div class='col-12 my-3 text-center'>
                    <table class='w-100 table-borderless'>
                        <tr>
                            <td colspan='7' class='text-center p-1'>
                                <h6 id='tanggal-print'>Tanggal : ${data.tanggal.substr(0, 2)} ${getNamaBulan(data.tanggal.substr(3, 2))} ${data.tanggal.substr(6, 4)}</h6> 
                            </td>
                        </tr>
                    </table>    
                    </div>
                    <div class='col-12'>
                    <table class='table table-condensed table-bordered'>
                    <tbody>
                    <tr>
                    <td style='width: 5%;'>1</td>
                    <td style='width: 25%;'>TAHUN</td>
                    <td colspan='3'>${data.tahun}</td>
                    </tr>
                    <tr>
                    <td style='width: 5%;'>2</td>
                    <td style='width: 25%;'>UNIT KERJA</td>
                    <td colspan='3'>${data.nama_pp}</td>
                    </tr>
                    <tr>
                    <td style='width: 5%;'>3</td>
                    <td style='width: 25%;'>AKUN</td>
                    <td colspan='3'>${data.nama_akun}</td>
                    </tr> 
                    <tr>
                    <td style='width: 5%;'>4</td>
                    <td style='width: 25%;'>DESKRIPSI</td>
                    <td colspan='3'>${data.keterangan}</td>
                    </tr> 
                    <tr>
                    <td style='width: 5%;'>5</td>
                    <td style='width: 25%;'>KOMENTAR</td>
                    <td colspan='3'>${data.komentar}</td>
                    </tr> 
                    <tr>
                        <td style='width: 5%;'></td>
                        <td style='width: 25%;'>TOTAL JANUARI</td>
                        <td class='text-right' id='t1'></td>
                        <td style='width: 25%;'>TOTAL JULI</td>
                        <td class='text-right' id='t7'></td>
                    </tr>   
                    <tr>
                        <td style='width: 5%;'></td>
                        <td style='width: 25%;'>TOTAL FEBRUARI</td>
                        <td class='text-right' id='t2'></td>
                        <td style='width: 25%;'>TOTAL AGUSTUS</td>
                        <td class='text-right' id='t8'></td>
                    </tr>  
                    <tr>
                        <td style='width: 5%;'></td>
                        <td style='width: 25%;'>TOTAL MARET</td>
                        <td class='text-right' id='t3'></td>
                        <td style='width: 25%;'>TOTAL SEPTEMBER</td>
                        <td class='text-right' id='t9'></td>
                    </tr>  
                    <tr>
                        <td style='width: 5%;'></td>
                        <td style='width: 25%;'>TOTAL APRIL</td>
                        <td class='text-right' id='t4'></td>
                        <td style='width: 25%;'>TOTAL OKTOBER</td>
                        <td class='text-right' id='t10'></td>
                    </tr>  
                    <tr>
                        <td style='width: 5%;'></td>
                        <td style='width: 25%;'>TOTAL MEI</td>
                        <td class='text-right' id='t5'></td>
                        <td style='width: 25%;'>TOTAL NOVEMBER</td>
                        <td class='text-right' id='t11'></td>
                    </tr>  
                    <tr>
                        <td style='width: 5%;'></td>
                        <td style='width: 25%;'>TOTAL JUNI</td>
                        <td class='text-right' id='t6'></td>
                        <td style='width: 25%;'>TOTAL DESEMBER</td>
                        <td class='text-right' id='t12'></td>
                    </tr>  
                    <tr>
                        <td style='width: 5%;'></td>
                        <td style='width: 25%;'>TOTAL JANUARI SD DESEMBER</td>
                        <td class='text-right' id='total_all' colspan='3'></td>
                    </tr>  
                    </tbody>
                    </table>
                    </div>
                    <div class='col-12'>
                    <table class='w-100 table-borderless'>
                        <tr>
                            <td colspan='7' class='p-1'>
                            <h6 style='font-weight: bold; font-size: 13px;'># <u>DETAIL</u></h6>  
                            </td>
                        </tr>
                    </table>
                    <table class='table table-bordered table-condensed' style='width:3550px !important'>
                    <thead>
                        <tr>
                            <th style="width:50px !important">No</th>
                            <th style="width:100px !important">Kode Rkm</th>
                            <th style="width:250px !important">Nama Rkm</th>
                            <th style="width:250px !important">Kegiatan</th>
                            <th style="width:150px !important">Detail</th>
                            <th style="width:100px !important">Satuan</th>
                            <th style="width:100px !important">Tarif</th>
                            <th style="width:100px !important">Vol Jan</th>
                            <th style="width:100px !important">Jml Jan</th>
                            <th style="width:100px !important">Vol Feb</th>
                            <th style="width:100px !important">Jml Feb</th>
                            <th style="width:100px !important">Vol Mar</th>
                            <th style="width:100px !important">Jml Mar</th>
                            <th style="width:100px !important">Vol Apr</th>
                            <th style="width:100px !important">Jml Apr</th>
                            <th style="width:100px !important">Vol Mei</th>
                            <th style="width:100px !important">Jml Mei</th>
                            <th style="width:100px !important">Vol Jun</th>
                            <th style="width:100px !important">Jml Jun</th>
                            <th style="width:100px !important">Vol Jul</th>
                            <th style="width:100px !important">Jml Jul</th>
                            <th style="width:100px !important">Vol Agt</th>
                            <th style="width:100px !important">Jml Agt</th>
                            <th style="width:100px !important">Vol Sep</th>
                            <th style="width:100px !important">Jml Sep</th>
                            <th style="width:100px !important">Vol Okt</th>
                            <th style="width:100px !important">Jml Okt</th>
                            <th style="width:100px !important">Vol Nov</th>
                            <th style="width:100px !important">Jml Nov</th>
                            <th style="width:100px !important">Vol Des</th>
                            <th style="width:100px !important">Jml Des</th>
                            <th style="width:150px !important">Total</th>
                        </tr>
                    </thead>
                    <tbody>`
                        var det = '';
                                var total = 0; var t1=0; var t2=0;var t3=0;var t4=0;var t5=0;var t6=0;var t7=0;var t8=0;var t9=0;var t10=0;var t11=0;var t12=0;
                                if(result.data_detail.length > 0){
                                    var no=1;
                                    for(var i=0;i<result.data_detail.length;i++){
                                        var line =result.data_detail[i];
                                        total+=parseFloat(line.total);
                                        t1+=parseFloat(line.vol_01)*parseFloat(line.tarif);
                                        t2+=parseFloat(line.vol_02)*parseFloat(line.tarif);
                                        t3+=parseFloat(line.vol_03)*parseFloat(line.tarif);
                                        t4+=parseFloat(line.vol_04)*parseFloat(line.tarif);
                                        t5+=parseFloat(line.vol_05)*parseFloat(line.tarif);
                                        t6+=parseFloat(line.vol_06)*parseFloat(line.tarif);
                                        t7+=parseFloat(line.vol_07)*parseFloat(line.tarif);
                                        t8+=parseFloat(line.vol_08)*parseFloat(line.tarif);
                                        t9+=parseFloat(line.vol_09)*parseFloat(line.tarif);
                                        t10+=parseFloat(line.vol_10)*parseFloat(line.tarif);
                                        t11+=parseFloat(line.vol_11)*parseFloat(line.tarif);
                                        t12+=parseFloat(line.vol_12)*parseFloat(line.tarif);
                                        det += "<tr>";
                                        det += `<td>${no}</td>`;
                                        det += "<td >"+line.kode_rkm+"</td>";
                                        det += "<td >"+line.nama_rkm+"</td>";
                                        det += "<td >"+line.deskripsi+"</td>";
                                        det += "<td >"+line.detail+"</td>";
                                        det += "<td >"+line.satuan+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.tarif)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_01)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_01)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_02)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_02)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_03)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_03)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_04)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_04)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_05)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_05)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_06)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_06)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_07)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_07)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_08)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_08)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_09)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_09)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_10)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_10)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_11)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_11)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.vol_12)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.jml_12)+"</td>";
                                        det += "<td class='text-right'>"+format_number(line.total)+"</td>";
                                        det += "</tr>";
                                        no++;
                                    }
                                }
                                
                                det+=`<tr style="">
                                    <th colspan="31"></th>
                                    <th class="text-right">`+format_number(total)+`</th>
                                </tr>`;                            
                                html+=det;
                    html += `
                    </tbody>    
                    </table>
                    </div>
                    <div class='col-12'>
                    <table class='w-100 table-borderless'>
                        <tr>
                            <td colspan='7' class='p-1'>
                            <h6 style='font-weight: bold; font-size: 13px;'># <u>APPROVAL</u></h6>  
                            </td>
                        </tr>
                    </table>
                    <table class='table table-condensed table-bordered'>
                    <thead>
                    <th class='text-center' style='width: 10%;'></th>    
                    <th class='text-center' style='width: 25%;'>NAMA/NIK</th>    
                    <th class='text-center' style='width: 15%;'>JABATAN</th>    
                    <th class='text-center' style='width: 10%;'>TANGGAL</th>    
                    <th class='text-center' style='width: 15%;'>NO. APPROVAL</th>    
                    <th class='text-center' style='width: 10%;'>STATUS</th>    
                    <th class='text-center' style='width: 15%;'>TTD</th>        
                    </thead>
                    <tbody>`
                    for(var i=0;i<result.data_dokumen.length;i++) {
                        var dokumen = result.data_dokumen[i]
                        html += `
                        <tr>
                        <td>${dokumen.ket}</td>
                        <td>${dokumen.nama_kar}</td>
                        <td>${dokumen.nama_jab}</td>
                        <td>${dokumen.tanggal}</td>
                        <td>${dokumen.no_app}</td>
                        <td>${dokumen.status}</td>
                        <td>&nbsp;</td>
                        </tr>`
                    }
                    html += `</tbody>
                    </table>
                    </div>
                    </div>
                    `;
                    
                    $('#print-content').html(html)
                    $('#t1').html(format_number(t1));
                    $('#t2').html(format_number(t2));
                    $('#t3').html(format_number(t3));
                    $('#t4').html(format_number(t4));
                    $('#t5').html(format_number(t5));
                    $('#t6').html(format_number(t6));
                    $('#t7').html(format_number(t7));
                    $('#t8').html(format_number(t8));
                    $('#t9').html(format_number(t9));
                    $('#t10').html(format_number(t10));
                    $('#t11').html(format_number(t11));
                    $('#t12').html(format_number(t12));
                    $('#total_all').html(format_number(total));
                    if($(form).length > 0) $(form).hide()
                    if($(table).length > 0) $(table).hide()
                    $('#saku-print').show()
                }
            }
        });
    }
    
    function historyPreview(id,form,table) {
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/aju-usul-history') }}",
            dataType: 'json',
            data:{no_bukti: id},
            async:false,
            success:function(result) {
                var html = "";
                if(typeof result.data !== 'undefined' && result.data.length > 0) { 
                    var color = "";
                    for(var i=0;i<result.data.length;i++) {
                        var data = result.data[i]
                        if(data.color === 'green') {
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
                                    ${data.nama} <span class='sl-date'>${data.tanggal} (${data.status})</span>
                                    </a></p>
                                    <div class="pr-2 row">
                                        <div class='col-6'>No Bukti :</div>    
                                        <div class='col-6'>${data.no_bukti}</div>    
                                        <div class='col-6'>Catatan :</div>    
                                        <div class='col-6'>${data.keterangan}</div>  
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <hr />
                        `;
                    }
                } else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('rkap-auth/logout') }}";
                    })
                } else {
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
                    `
                }
                
                $('#history-content').html(html)
                if($(form).length > 0) $(form).hide()
                if($(table).length > 0) $(table).hide()
                $('#saku-history').show()

            }
        });
    }

    function printPreviewApp(id, jenis,form,table) {
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/app-usul-preview') }}",
            dataType: 'json',
            data:{id: id, jenis: jenis},
            async:false,
            success:function(result) {
                if(typeof result.data !== 'undefined' && result.data.length > 0) {
                    var html = "";
                    var no = 1;
                    var total = 0
                    var data = result.data[0]
                    html += `
                            <div class='row'>
                                <div class='col-12 text-center'>
                                    <table class='table table-borderless table-condensed mb-0'>
                                        <tbody>
                                            <tr>
                                                <td colspan='2' class='text-center p-1'>
                                                <h5 class='mb-2'>TANDA TERIMA</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>    
                                </div>    
                                <div class='col-12'>
                                    <table class='table table-borderless table-condensed'>
                                        <tbody>
                                            <tr>
                                                <td style='width: 25%;'>ID Approval</td>
                                                <td style='width: 75%;'>: ${data.id}</td>
                                            </tr>
                                            <tr>
                                                <td>No Bukti</td>
                                                <td>: ${data.no_bukti}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>: ${data.tanggal}</td>
                                            </tr>
                                            <tr>
                                                <td>PP</td>
                                                <td>: ${data.kode_pp} - ${data.nama_pp}</td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>: ${data.keterangan}</td>
                                            </tr>
                                            <tr style='line-height: 40px;'>
                                                <td>Status</td>
                                                <td>: ${data.status}</td>
                                            </tr>    
                                            <tr>
                                                <td colspan='2'>Bandung, ${data.tgl.substr(0, 2)} ${getNamaBulan(data.tgl.substr(3, 2))} ${data.tgl.substr(6, 4)}</td>
                                            </tr>
                                            <tr>
                                                <td>Dibuat Oleh:</td>
                                                <td>&nbsp;&nbsp;</td>    
                                            </tr>
                                            <tr style='line-height: 80px;'>
                                                <td>Yang Menerima</td>
                                                <td class='text-center'>Yang Menyetujui</td>    
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;</td>
                                                <td class='text-center'>${data.nik}</td>
                                            </tr>
                                        </tbody>
                                    </table>    
                                </div>
                            </div>
                        `;
                        
                    $('#print-content').html(html)
                    if($(form).length > 0) $(form).hide()
                    if($(table).length > 0) $(table).hide()
                    $('#saku-print').show()
                }
            }
        });
    }

    $('#saku-print #btn-cetak').click(function(e) {
        e.preventDefault();
        $('#print-content').printThis({
            importCSS: true,            // import parent page css
            importStyle: true,         // import style tags
            printContainer: true,       // print outer container/$.selector
        });
    });

    $("#saku-print #btn-excel").click(function(e) {
        e.preventDefault();
        $("#print-content").table2excel({
            // exclude: ".excludeThisClass",
            name: "FormPengajuanDURK_{{ Session::get('userLog').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "FormPengajuanDURK_{{ Session::get('userLog').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: true // set to true if you want background colors and font colors preserved
        });
    });

</script>