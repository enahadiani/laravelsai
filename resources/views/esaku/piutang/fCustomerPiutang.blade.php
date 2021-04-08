<link rel="stylesheet" href="{{ asset('master.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
<!-- LIST DATA -->
<x-list-data judul="Data Customer" tambah="true" :thead="array('Kode','Nama','Alamat','Aksi')" :thwidth="array(15,30,45,10)" :thclass="array('','','','text-center')" />
<!-- END LIST DATA -->
<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- FORM BODY -->
                <div class="card-body pt-3 form-body">
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#umum" role="tab" aria-selected="true"><span class="hidden-xs-down">Umum</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#alamat" role="tab" aria-selected="true"><span class="hidden-xs-down">Alamat</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bank" role="tab" aria-selected="true"><span class="hidden-xs-down">Bank</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#akuntansi" role="tab" aria-selected="true"><span class="hidden-xs-down">Akuntansi</span></a> </li>
                    </ul>
                    <div class="tab-content tab-form-content col-12 p-0">
                        <div class="tab-pane active" id="umum" role="tabpanel">
                            <div class="form-row">
                                <div class="col-12">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="kode_vendor">Kode</label>
                                    <input class="form-control" type="text" id="kode_vendor" name="kode_vendor" required>
                                </div>
                                {{-- <div class="error-side col-md-6 col-sm-12">
                                    <p class="error-text" id="error-vendor">Kode Vendor sudah ada</p>
                                </div> --}}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="nama">Nama</label>
                                    <input class="form-control" type="text" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="no_tel">No Telp</label>
                                    <input class="form-control" type="text" id="no_tel" name="no_tel" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="text" id="email" name="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="alamat" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" rows="4" id="alamat" name="alamat" style="resize:none" required></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="kode_pos">Kode POS</label>
                                    <input class="form-control" type="text" id="kode_pos" name="kode_pos" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input class="form-control" type="text" id="kecamatan" name="kecamatan" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="kota">Kota</label>
                                    <input class="form-control" type="text" id="kota" name="kota" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="negara">Negara</label>
                                    <input class="form-control" type="text" id="negara" name="negara" required>
                                </div>
                            </div>
                        </div>
                            
                        <div class="tab-pane" id="bank" role="tabpanel">
                            <table id="table-bank">
                                <thead>
                                    <th>Nama Rekening</th>
                                    <th>Info Bank</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                            
                        <div class="tab-pane" id="akuntansi" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">    
                                    <label for="akun_piutang">Akun Piutang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_akun_piutang" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-akun_piutang" id="akun_piutang" name="akun_piutang" value="" title="">
                                            <span class="info-name_akun_piutang hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_akun_piutang"></i>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Save Button --}}
                    <div class="card-form-footer">
                        <div class="footer-form-container">
                            <div class="text-right message-action">
                                <p class="text-success"></p>
                            </div>
                            <div class="action-footer">
                                <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>

@include('modal_search')

<!-- MODAL BANK-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-bank">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Data Bank</h6>
                    <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="no_rek">No. Rekening</label>
                            <input class="form-control" type="text" id="no_rek" name="no_rek" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="nama_rek">Nama Rekening</label>
                            <input class="form-control" type="text" id="nama_rek" name="nama_rek" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="bank">Bank</label>
                            <input class="form-control" type="text" id="bank" name="bank" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="cabang">Cabang</label>
                            <input class="form-control" type="text" id="cabang" name="cabang" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="save-bank" class="btn btn-primary" type="button">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL --> 

<!-- JAVASCRIPT  -->
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script type="text/javascript">
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});

    var $target = "";
    var $target2 = "";
        
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

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

    function getAkun(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/cust-akun') }}",
            dataType: 'json',
            async:false,
            success:function(result){ 
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('akun_piutang',result.daftar[0].kode_akun,result.daftar[0].nama);
                    }else{
                        $('#akun_piutang').attr('readonly',false);
                        $('#akun_piutang').css('border-left','1px solid #d7d7d7');
                        $('#akun_piutang').val('');
                        $('#akun_piutang').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('[data-toggle="tooltip"]').tooltip(); 

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input

    var dataBank = [];
    var tableBank = $('#table-bank').DataTable({
        'dom': '<"search-bank"f><"jumlah-data"><"tambah-bank"B>',
        'language': { search: '', searchPlaceholder: 'Cari Bank...'},
        'buttons': [
            {
                text: 'Tambah',
                action: function() {
                    $('#modal-bank').modal('show')
                    $('#save-bank').removeAttr("rowindex");
                    $('#modal-bank input').val('')
                }
            }
        ],
        "responsive": true,
        "paging": false, 
        'data': dataBank,
        'columns': [
            {
                name: "data-rek",
                data: function(row, type, set) {
                    return "<p class='nama-rek'>"+row.nama_rek+"</p>"+"<p>"+row.no_rek+"</p>"
                }
            },
            {
                name: "data-bank",
                data: function(row, type, set) {
                    return "<p class='nama-bank'>"+row.bank+"</p>"+"<p>"+row.cabang+"</p>"
                }
            },
            {
                data:null,
                defaultContent: "<i class='simple-icon-pencil edit-bank'></i>&nbsp;<i class='simple-icon-trash hapus-bank'></i>"
            }
        ]
    });
    var count = tableBank.data().count();
    
    $('#save-bank').attr('action', 'save');
    $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
    $('#table-bank_filter input[type="search"]').unbind().keyup(function(){
        tableBank.search($(this).val()).draw();
        count = tableBank.data().count();
        $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
    })
    $('#modal-bank #save-bank').click(function(){
        var data = {
            no_rek: $('#modal-bank #no_rek').val(),
            nama_rek: $('#modal-bank #nama_rek').val(),
            bank: $('#modal-bank #bank').val(),
            cabang: $('#modal-bank #cabang').val(),
        }
        if($(this).attr('action') === 'save') {
            dataBank.push(data);
            tableBank.row.add(data).draw();
            count = tableBank.data().count();
            $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
        } else if($(this).attr('action') === 'update') {
            tableBank.row($(this).attr('rowindex')).data(data).draw();
        }

        $('#modal-bank input').val('');
        $('#save-bank').attr('action', 'save');
        $('#save-bank').removeAttr("rowindex");
        $('#modal-bank').modal('hide')
    })
    $('#table-bank tbody').on('click', 'i.hapus-bank', function(){
        tableBank.row($(this).parents('tr')).remove().draw();
        count = tableBank.data().count();
        $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
    })
    $('#table-bank tbody').on('click', 'i.edit-bank', function(){
        var data = tableBank.row($(this).parents('tr')).data();
        var index = tableBank.row($(this).parents('tr')).index();
        $('#modal-bank input#no_rek').val(data.no_rek);
        $('#modal-bank input#nama_rek').val(data.nama_rek);
        $('#modal-bank input#bank').val(data.bank);
        $('#modal-bank input#cabang').val(data.cabang);
        $('#save-bank').attr('action', 'update');
        $('#save-bank').attr('rowindex', index);
        $('#modal-bank').modal('show');
    })

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

    // var dataTable = generateTable(
    //     "table-data",
    //     "{{ url('') }}", 
    //     [
    //         {'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' },
    //         {
    //             "targets": 0,
    //             "createdCell": function (td, cellData, rowData, row, col) {
    //                 if ( rowData.status == "baru" ) {
    //                     $(td).parents('tr').addClass('selected');
    //                     $(td).addClass('last-add');
    //                 }
    //             }
    //         }
    //     ],
    //     [
    //         { data: 'kode_cust' },
    //         { data: 'nama' },
    //         { data: 'alamat' },
    //         { data: 'tgl_input' },
    //     ],
    //     "{{ url('esaku-auth/sesi-habis') }}",
    //     [[3 ,"desc"]]
    // );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Customer');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_cust').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    });
    // END BUTTON TAMBAH
        
    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
</script>