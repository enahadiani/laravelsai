<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<style>
     .form-header {
        padding-top:1rem;
        padding-bottom:1rem;
    }
    .judul-form {
        margin-bottom:0;
        margin-top:5px;
    }
    .vertical-timeline {
        width: 100%;
        position: relative;
        padding: 1.5rem 0 1rem
    }
</style>

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="tanggal" name="tanggal">
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;" >
                    <h6 id="judul-form" style="position:absolute;top:25px">Serah Terima Dokumen Online</h6>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 mt-2 mb-2">
                                    <label for="no_bukti" >No Bukti</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_no_bukti" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-no_bukti" id="no_bukti" name="no_bukti" value="" title="" readonly>
                                        <span class="info-name_no_bukti hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_no_bukti"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-2">
                                    <button type="button" class="btn btn-info mt-4 btn-proses">
                                        <i class="iconsminds-arrow-refresh"></i> Proses
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 mt-2">
                                    <label for="nominal">Nominal</label>
                                    <input type="text" name="nominal" id="nominal" class="form-control inp-nominal currency" value="0" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12 mt-2">
                                    <label for="modul">Modul</label>
                                    <input type="text" name="modul" id="modul" class="form-control inp-modul" value="" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12 mt-2">
                                    <label for="tgl_aju">Tanggal Pengajuan</label>
                                    <input type="text" name="tgl_aju" id="tgl_aju" class="form-control inp-tgl_aju" value="" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12 mt-2">
                                    <label for="nik_penerima" >Penerima</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_nik_penerima" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-nik_penerima" id="nik_penerima" name="nik_penerima" value="" title="" readonly>
                                        <span class="info-name_nik_penerima hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_nik_penerima"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mt-2">
                                    <label for="diserahkan_oleh">Diserahkan Oleh</label>
                                    <input type="text" name="diserahkan_oleh" id="diserahkan_oleh" class="form-control inp-diserahkan_oleh" value="">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="2" id="deskripsi" name="deskripsi" readonly required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="catatan">Catatan</label>
                                    <textarea class="form-control" rows="2" id="catatan" name="catatan" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <ul class="nav nav tabs col-12" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#data-rekening" role="tab" aria-selected="true">
                                <span>Data Rekening</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-jurnal" role="tab" aria-selected="true">
                                <span>Data Jurnal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true">
                                <span>File Dokumen</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-rekening" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-rekening"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="rekening-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%" class="text-center">No</th>
                                            <th style="width:15%" class="text-center">Bank</th>
                                            <th style="width:15%">Cabang</th>
                                            <th style="width:15%">No Rekening</th>
                                            <th style="width:15%">Nama Rekening</th>
                                            <th style="width:15%">Bruto</th>
                                            <th style="width:15%">Potongan</th>
                                            <th style="width:15%">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-jurnal" role="tabpanel">
                            <div class="table-responsive">
                                 <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                     <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-jurnal"></span></a>
                                 </div>
                                 <table class="table table-bordered table-condensed gridexample" id="jurnal-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                     <thead style="background:#F8F8F8">
                                         <tr>
                                             <th style="width:3%">No</th>
                                             <th style="width:13%">Kode Akun</th>
                                             <th style="width:15%">Nama Akun</th>
                                             <th style="width:5%">DC</th>
                                             <th style="width:20%">Keterangan</th>
                                             <th class='text-right' style="width:15%">Nilai</th>
                                             <th style="width:13%">Kode PP</th>
                                             <th style="width:15%">Nama PP</th>
                                             <th style="width:13%">Kode DRK</th>
                                             <th style="width:17%">Nama DRK</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                     </tbody>
                                 </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-dok" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-dok"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="dok-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%" class="text-center">No</th>
                                            <th style="width:15%" class="text-center">Kode Jenis</th>
                                            <th style="width:15%">Nama Jenis</th>
                                            <th style="width:25%">Path File</th>
                                            <th style="width:5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="bottom-sheet-action"></div>

                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- end form data --}}
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
@include('modal_search')
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
     var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    var valid = true;

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    function last_add(param,isi){
        var rowIndexes = [];
        dataTable.rows( function ( idx, data, node ) {
            if(data[param] === isi){
                rowIndexes.push(idx);
            }
            return false;
        });
        dataTable.row(rowIndexes).select();
        $('.selected td:eq(0)').addClass('last-add');
        console.log('last-add');
        setTimeout(function() {
            console.log('timeout');
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function resetForm() {
        $('#pemberi-grid tbody').empty()
        $("[id^=label]").each(function(e){
            $(this).text('');
        });
        $("[class^=info-name]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class^=input-group-text]").each(function(e){
            $(this).text('');
        });
        $("[class^=input-group-prepend]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class*='inp-label-']").each(function(e){
            $(this).removeAttr("style");
        })
        $("[class^=info-code]").each(function(e){
            $(this).text('');
        });
        $("[class^=simple-icon-close]").each(function(e){
            $(this).addClass('hidden');
        });
    }

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }
// CBBL Form
$('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'no_bukti':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/serah-dok-pb') }}",
                    columns : [
                        { data: 'no_pb' },
                        { data: 'keterangan' }
                    ],
                    judul : "Daftar No Bukti",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'nik_penerima':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/serah-dok-nik') }}",
                    columns : [
                        { data: 'nik' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar NIK Penerima",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            default:
            break;
        }
        showInpFilter(settings);
    })
    // EMD CBBL

    $('#form-tambah').on('click','.btn-proses', function(e){
        e.preventDefault();
        var id = $('#form-tambah').find('#no_bukti').val();
        loadData(id);
        console.log('load-data');
    });

   // LOAD DATA
   function loadData(id){
        var url = '{{url("bdh-trans/serah-dok-detail")}}';
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                no_pb : id
            },
            dataType:'JSON',
            async: false,
            success: function(result){
                var data = result.data;
                var data_m = data.data;
                var data_rek = data.detail_rek;
                var data_jurnal = data.detail_jurnal;
                if(result.status){
                    $('#form-tambah #modul').val(data_m[0].modul);
                    $('#form-tambah #nominal').val(format_number(data_m[0].nilai));
                    $('#form-tambah #tgl_aju').val(data_m[0].tgl);
                    $('textarea#deskripsi').val(data_m[0].keterangan);
                    var html_rek = '';
                    var no_rek = 1;
                    for (let i = 0; i < data_rek.length; i++) {
                        var netto =data_rek[i].bruto - data_rek[i].pajak;
                        html_rek += `<tr>
                                <td>`+no_rek+`</td>
                                <td>`+data_rek[i].bank+`</td>
                                <td>`+data_rek[i].nama+`</td>
                                <td>`+data_rek[i].no_rek+`</td>
                                <td>`+data_rek[i].nama_rek+`</td>
                                <td class='text-right'>`+format_number(data_rek[i].bruto)+`</td>
                                <td class='text-right'>`+format_number(data_rek[i].pajak)+`</td>
                                <td class='text-right'>`+format_number(netto)+`</td>
                            </tr>`;
                            no_rek ++;
                    }
                    var html_jurnal = '';
                    var no_jurnal = 1;
                    for (let y = 0; y < data_jurnal.length; y++) {
                        html_jurnal = `<tr>
                                <td>`+no_jurnal+`</td>
                                <td>`+data_jurnal[y].kode_akun+`</td>
                                <td>`+data_jurnal[y].nama_akun+`</td>
                                <td>`+data_jurnal[y].dc+`</td>
                                <td>`+data_jurnal[y].keterangan+`</td>
                                <td class='text-right'>`+format_number(data_jurnal[y].nilai)+`</td>
                                <td>`+data_jurnal[y].kode_pp+`</td>
                                <td>`+data_jurnal[y].nama_pp+`</td>
                                <td>`+data_jurnal[y].kode_drk+`</td>
                                <td>`+data_jurnal[y].nama_drk+`</td>
                            </tr>`;
                            no_jurnal ++;
                    }

                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: "Data dengan No dok_check "+id+" Tidak ditemukan"
                    });
                }
                $(".tab-pane").removeClass("active");
                $(".nav-link").removeClass("active");
                $("#data-rekening").addClass("active");
                $('a[href="#data-rekening"]').tab('show')

                //Append Data
                $('#rekening-grid >tbody').html(html_rek);
                $('#jurnal-grid >tbody').html(html_jurnal);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/bdh-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
            }
        });
    }
    // END LOAD DATA
</script>
