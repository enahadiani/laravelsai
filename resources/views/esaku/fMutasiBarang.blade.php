<link rel="stylesheet" href="{{ asset('trans.css') }}" />

<style>
    th {
        vertical-align:middle !important;
    }
    #input-grid .selectize-input.focus, #input-grid input.form-control, #input-grid .custom-file-label {
        border:1px solid black !important;
        border-radius:0 !important;
    }
    #input-grid .selectize-input {
        border-radius:0 !important;
    }
    .modal-header .close {
        padding: 1rem;
        margin: -1rem 0 -1rem auto;
    }
    .hapus-item{
        cursor:pointer;
    } 
    .selected{
        cursor:pointer;
    }
    #input-grid td:not(:nth-child(1)):not(:nth-child(9)):hover {
        background:#f8f8f8;
        color:black;
    }
    #input-grid input:hover,#input-grid .selectize-input:hover {
        width:inherit;
    }
    #input-grid ul.typeahead.dropdown-menu {
        width:max-content !important;
    }
    #input-grid td {
        overflow:hidden !important;
        height:37.2px !important;
        padding:0px !important;
    }
    #input-grid span {
        padding:0px 10px !important;
    }
    #input-grid input,#input-grid .selectize-input {
        overflow:hidden !important;
        height:35px !important;
    }
    #input-grid td:nth-child(4) {
        overflow:unset !important;
    }
</style>

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:block;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                    <h6 id="judul-form" style="position:absolute;top:25px">Mutasi Barang</h6>
                    <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                </div>
                <div class="separator mb-2"></div>
                <div id="form-body" class="card-body pt-3 form-body"> 
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-group row" id="row-id" hidden>
                        <div class="col-9">
                            <input class="form-control" type="text" id="id_edit" name="id_edit" readonly >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="jenis" >Jenis</label>
                                    <select class='form-control selectize' id="jenis" name="jenis">
                                        <option value=''>--- Pilih Jenis ---</option>
                                        <option value='KRM' selected>Kirim</option>
                                        <option value='TRM'>Terima</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_bukti">No. Bukti</label>
                                    <input class='form-control' type="text" id="no_bukti" name="no_bukti" readonly>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="no_dokumen">No. Dokumen</label>
                                    <input class='form-control' type="text" id="no_dokumen" name="no_dokumen">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-10 col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" rows="4" id="keterangan" name="keterangan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="asal">Gudang Asal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_asal" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-asal" id="asal" name="asal" value="" title="">
                                        <span class="info-name_asal hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_asal"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tujuan">Gudang Tujuan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_tujuan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-tujuan" id="tujuan" name="tujuan" value="" title="">
                                        <span class="info-name_tujuan hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_tujuan"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-grid" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Barang</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-jurnal" role="tabpanel">
                            <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Kode</th>
                                            <th style="width:25%">Nama</th>
                                            <th style="width:10%">Satuan</th>
                                            <th style="width:10%" id="stok-mutasi">Stok</th>
                                            <th style="width:10%" id="jumlah-mutasi">Jumlah</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('modal_search')
@include('modal_upload')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script type="text/javascript">
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $dtBarang = [];
    var jenis = $('#jenis').val();
    var tanggal = $('#tanggal').val();
    var scrollform = document.getElementById('form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    getKode(tanggal, jenis);

    if(jenis === "TRM") {
        $('#stok-mutasi').text('Jumlah Kirim')
        $('#jumlah-mutasi').text('Jumlah Terima')
    } else if(jenis === "KRM") {
        $('#stok-mutasi').text('Stok')
        $('#jumlah-mutasi').text('Jumlah')
    }

    $('#jenis').selectize({
        onChange: function(value) {
            jenis = value;
            changeJenis(jenis);
        }
    });
    
    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#tanggal').change(function(){
        tanggal = $(this).val();
        getKode(tanggal, jenis);
    })

    function getKode(tanggal, jenis) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/generate-mutasi') }}",
            data:{'tanggal':tanggal, 'jenis':jenis},
            dataType: 'json',
            success:function(response){
                if(response.result.status) {
                    $('#no_bukti').val(response.result.kode)
                }
            }
        });
    }

    function changeJenis(jenis) {
        if(jenis === "TRM") {
            $('#stok-mutasi').text('Jumlah Kirim')
            $('#jumlah-mutasi').text('Jumlah Terima')
        } else if(jenis === "KRM") {
            $('#stok-mutasi').text('Stok')
            $('#jumlah-mutasi').text('Jumlah')
        }
        getKode(tanggal, jenis);
    }

    function format_number(x) {
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

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

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });
</script>