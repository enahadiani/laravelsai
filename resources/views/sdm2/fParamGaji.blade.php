<link rel="stylesheet" href="{{ asset('master.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />

{{-- SAKU TABLE --}}
<x-list-data judul="Data Param Gaji" tambah="true" :thead="array('Kode','Nama','Jenis','Aksi')"
    :thwidth="array(20,25,25,10)" :thclass="array('','','','text-center')" />
{{-- END SAKU TABLE --}}

{{-- SAKU FORM --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:24px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-0 form-body" id="form-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="kode">Kode Param</label>
                            <input class="form-control" type="text" id="kode" name="kode" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" id="nama" name="nama" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control inp-jenis">
                                <option value="T">Tetap</option>
                                <option value="F">Fleksibel</option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="card-form-footer">
                    <div class="footer-form-container">
                        <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div>
                        <div class="action-footer">
                            <button type="submit" id="btn-save" style="margin-top: 10px;"
                                class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- END SAKU FORM --}}
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
@include('modal_upload')
@include('modal_search')
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>
<script type="text/javascript">
    // CONFIG FORM
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    setHeightForm();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    setHeightForm();
    $('#error-kode').hide();
    $('#success-kode').hide();
    // FORM SMALL
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    var scrollForm = document.querySelector('#form-body');
    new PerfectScrollbar(scrollForm);




    function showInfoField(kode, isi_kode, isi_nama) {
        $('#' + kode).val(isi_kode);
        $('#' + kode).attr('style',
            'border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_' + kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_' + kode).attr('title', isi_nama);
        $('.info-name_' + kode).removeClass('hidden');
        $('.info-name_' + kode).attr('title', isi_nama);
        $('.info-name_' + kode + ' span').text(isi_nama);
        var width = $('#' + kode).width() - $('#search_' + kode).width() - 10;
        var height = $('#' + kode).height();
        var pos = $('#' + kode).position();
        $('.info-name_' + kode).width(width).css({
            'left': pos.left,
            'height': height
        });
        $('.info-name_' + kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }
    $('.info-icon-hapus').click(function() {
        var par = $(this).closest('div').find('input').attr('name');
        $('#' + par).val('');
        $('#' + par).attr('readonly', false);
        $('#' + par).attr('style',
            'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_' + par).parent('div').addClass('hidden');
        $('.info-name_' + par).addClass('hidden');
        $(this).addClass('hidden');
    });

// END CONFIG FORM

// SAKU TABLE
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/sdm-gaji-params') }}",
        [
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            }
        ],
        [
            { data: 'kode_param' },
            { data: 'nama' },
            { data: 'jenis', render: function(data) {
                if(data === "T") {
                    return "Tetap"
                }
                return "Fleksibel"
            } }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[3 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    function last_add(param, isi) {
        var rowIndexes = [];
        dataTable.rows(function(idx, data, node) {
            if (data[param] === isi) {
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
// SAKU TABLE

// TRIGGER FORM
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        $('#judul-form').html('Tambah Data Param Gaji');
        $('#kode').attr('readonly', false);
        newForm();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
//  END TRIGGER FORM

// SAVE FORM TRIGGER
    $('#form-tambah').validate({
        ignore: [],
        rules: {},
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault()
            var parameter = $('#id_edit').val();
            var id = $('#id').val();
            if(parameter == "true"){

                var url = "{{ url('esaku-master/sdm-gaji-param-update') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            } else {

                var url = "{{ url('esaku-master/sdm-gaji-param') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);
            }

            $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false,
                success:function(result){
                    if(result.data.status){
                        var kode = result.data.kode;
                        dataTable.ajax.reload();
                        $('#judul-form').html('Tambah Data Param Gaji');
                        $('#kode').attr('readonly', false);
                        resetForm();
                        msgDialog({
                            id: kode,
                            type: 'simpan'
                        });
                        last_add(dataTable,"kode_fm", kode);
                        $('#id_edit').val('false')
                    } else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('sdm2-auth/sesi-habis') }}";
                    } else {
                        msgDialog({
                            id: kode,
                            text: result.data.message,
                            type: 'duplicate'
                        });
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
// END SAVE FORM TRIGGER

// EDIT FORM TRIGGER
    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#kode').attr('readonly', true);
        editData(id)
    });

    function editData(id) {
        $('#form-tambah').validate().resetForm();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Param Gaji');

        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/sdm-gaji-param') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(res) {
                var data = res.data.data[0]
                if(res.data.status) {
                    $('#id_edit').val('true')
                    $('#id').val(id)
                    $('#kode').val(id)
                    $('#nama').val(data.nama)
                    $('#jenis').val(data.jenis)
                    // showInfoField('kode_area', data.kode_area, data
                    //     .kode_area);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                }
            }
        })
    }
// END EDIT FORM TRIGGER

// DELETE DATA TRIGGER
    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    function hapusData(id) {
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-master/sdm-gaji-param') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success",'Hapus Data','Data Witel ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                } else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('sdm2-auth/sesi-habis') }}";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    });
                }
            }
        });
    }
// END DELETE DATA TRIGGER

 // TRIGGER CHANGE
 $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch (id) {
            case 'kode_area':
                var settings = {
                    id: id,
                    header: ['Kode Akun', 'Nama'],
                    url: "{{ url('esaku-master/sdm-areas') }}",
                    columns: [{
                            data: 'kode_area'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Pilih Kode Area",
                    pilih: "akun",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"],
                }
                break;
            case 'kode_fm':
                var settings = {
                    id: id,
                    header: ['Kode Akun', 'Nama'],
                    url: "{{ url('esaku-master/sdm-fms') }}",
                    columns: [{
                            data: 'kode_fm'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Pilih Kode FM",
                    pilih: "akun",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"],
                }
                break;
        }
        // showInpFilter(settings);
        showInpFilterBSheet(settings);
    });
</script>
