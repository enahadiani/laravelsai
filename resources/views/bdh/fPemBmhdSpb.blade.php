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
</style>

<!-- LIST DATA -->
<x-list-data judul="Pem-BMHD-an SPB" tambah="true" :thead="array('No Bukti','Tanggal','Deskripsi','Nilai','Aksi')" :thwidth="array(10,10,30,15,10)" :thclass="array('','','','','','','','','','text-center')" />
<!-- END LIST DATA -->
{{-- form data --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="tanggal" name="tanggal">
    <div class="row" id="saku-form" style="display: none">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;" >
                    <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                           <div class="row">

                               <div class="col-md-6 col-sm-12">
                                   <label for="no_bukti">No Bukti</label>
                                   <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti" value="-" readonly>
                               </div>
                               <div class="col-md-6 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>



                           </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="no_dokumen">No Dokumen</label>
                                    <input type="text" name="no_dokumen" id="no_dokumen" class="inp-no_dokumen form-control">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <ul class="nav nav tabs col-12" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#data-spb" role="tab" aria-selected="true">
                                <span>Daftar SPB</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-rekening" role="tab" aria-selected="true">
                                <span>Daftar Transfer</span>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-spb" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_spb" ></span></a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed gridexample" id="spb-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:15%">Status</th>
                                            <th style="width:15%">No SPB</th>
                                            <th style="width:10%">Tanggal</th>
                                            <th width="20%">Deskripsi</th>
                                            <th width="15%">Nilai</th>
                                            <th width="10%">Rekening</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- begin data dok tab  --}}
                        <div class="tab-pane" id="data-rekening" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed gridexample" id="rekening-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:15%">Bank</th>
                                            <th style="width:15%">Cabang</th>
                                            <th style="width:15%">No Rekening</th>
                                            <th width="15%">Nama Rekening</th>
                                            <th width="15%">Bruto</th>
                                            <th width="15%">Potongan</th>
                                            <th width="15%">Netto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end data dok tab --}}
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
<script type="text/javascript">
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
        $('#spb-grid tbody').empty()
        $('#rekening-grid tbody').empty()
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

    // Event Button Tambah Data
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Jurnal BYMHD');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#id_edit').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').val('')
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    });
    // Event Button Kembali (Cancel)
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });


    $('#form-tambah').on('click', '.add-row-dok', function(){
        addRowDok("form-tambah");
    });
    $('#input-dok').on('click', '.hapus-dok2', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-dok').each(function(){
            var nom = $(this).closest('tr').find('.no-dok');
            nom.html(no);
            no++;
        });
        hitungTotalRowUpload('form-tambah');
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    function hitungTotalRowUpload(form){
        var total_row = $('#'+form+' #input-dok tbody tr').length;
        $('#total-row_dok').html(total_row+' Baris');
    }

    function addRowDok(form){
        var no=$('#'+form+' #input-dok .row-dok:last').index();
        no=no+2;
        console.log(no);
        var input = "";
        input += "<tr class='row-dok'>";
        input += "<td class='no-dok text-center'>"+no+"</td>";
        input += "<td class='px-0 py-0'><div class='inp-div-jenis'><input type='text' name='jenis[]' class='form-control inp-jenis jeniske"+no+" ' value='' required='' style='z-index: 1;' id='jeniskode"+no+"'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></div></td>";
        input += "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke"+no+"' value='' readonly></td>";
        input += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>-</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='-' readonly></td>";
        input+=`
        <td>
        <input type='file' name='file_dok[]'>
        <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`'>
        </td>`;
        input+=`
        <td class='text-center action-dok'><a class='hapus-dok2'><i class='simple-icon-trash' style='font-size:18px'></i></a></td></tr>`;
        console.log(form);
        $('#'+form+' #input-dok tbody').append(input);
        hitungTotalRowUpload(form);
    }


</script>


