<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('css_optional/trans.css') }}" />

{{-- LIST DATA --}}
<x-list-data judul="Data Kedinasan" tambah="" :thead="array('NIK','Nama','Jumlah Dinas','Aksi')" :thwidth="array(10,30,10,10)" :thclass="array('','','','text-center')" />
{{-- END LIST DATA --}}

{{-- FORM --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body pt-0 form-body" id="form-body">
                    <ul class="nav nav-tabs nav-tabs-custom col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-umum" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Umum</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0 mt-3">
                        <div class="tab-pane active" id="data-umum" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_nik">NIK</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_nik" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_nik" id="kode_nik" name="kode_nik" autocomplete="off" data-input="cbbl" value="" title="" required readonly>
                                                <span class="info-name_kode_nik hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_nik"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <ul class="nav nav-tabs col-12 " role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#data-kedinasan" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Kedinasan</span></a></li>
                            </ul>
                            <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2rem;">
                                <div class="tab-pane active row tab-scroll" id="data-kedinasan" role="tabpanel">
                                    <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                        <a style="font-size:18px;float: right;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-kedinasan" ></span></a>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-condensed gridexample input-grid" id="input-kedinasan" data-table="Tab data kedinasan" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th style="width:3%;">No</th>
                                                    <th style="width:15%;">No SK</th>
                                                    <th style="width:10%;">Tanggal SK</th>
                                                    <th>Keterangan</th>
                                                    <th style="width:5%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <a type="button" id="add-kedinasan" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body-footer row" style="padding: 0 25px;">
                    <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                        <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                    </div>
                    <div style="text-align: right;" class="col-md-2 p-0 ">
                        <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- END FORM --}}
<button id="trigger-bottom-sheet" style="display:none">&nbsp;</button>

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">
// SET UP FORM
var valid = true;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var scroll = document.querySelector('#content-preview');
new PerfectScrollbar(scroll);

var scrollForm = document.querySelector('#form-body');
new PerfectScrollbar(scrollForm);

var bottomSheet = new BottomSheet("country-selector");
document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
window.bottomSheet = bottomSheet;
// END SET UP FORM

// OPTIONAL CONFIG

// END OPTIONAL CONFIG

// BTN TAMBAH
$('#saku-datatable').on('click', '#btn-tambah', function() {;
    $('#judul-form').html('Tambah Data Kedinasan');
    newForm();
    addRowKedinasanDefault()
    valid = true
});
//  END BTN TAMBAH

// BTN KEMBALI
$('#saku-form').on('click', '#btn-kembali', function(){
    var kode = null;
    msgDialog({
        id:kode,
        type:'keluar'
    });
});

// SAKU TABLE
var actionHtmlDefault = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
var dataTable = 
generateTable(
    "table-data",
    "{{ url('esaku-trans/sdm-adm-dinass') }}", 
    [
        {
            "targets": 0,
            "createdCell": function (td, cellData, rowData, row, col) {
                if ( rowData.status == "baru" ) {
                    $(td).parents('tr').addClass('selected');
                    $(td).addClass('last-add');
                }
            }
        },
        {'targets': 3 ,'className': 'text-center', 'defaultContent': actionHtmlDefault,'className': 'text-center' },
    ],
    [
        { data: 'nik' },
        { data: 'nama' },
        { data: 'jum' }
    ],
    "{{ url('esaku-auth/sesi-habis') }}",
    [[0 ,"desc"]]
);

$.fn.DataTable.ext.pager.numbers_length = 5;

$("#searchData").on("keyup", function (event) {
    dataTable.search($(this).val()).draw();
});

$("#page-count").on("change", function (event) {
    var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
});

$('[data-toggle="popover"]').popover({ trigger: "focus" });
// END SAKU TABLE

// CBBL SAKU FORM
$('#form-tambah').on('click', '.search-item2', function(e) {
    var id = $(this).closest('div').find('input').attr('name');  
    var options = {}
    switch(id) {
        case 'kode_nik':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-trans/sdm-karyawans') }}",
                columns : [
                    { data: 'nik' },
                    { data: 'nama' }
                ],
                judul : "Daftar NIK",
                pilih : "NIK",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
    }
    showInpFilterBSheet(options);
})

$('.info-icon-hapus').click(function(){
    var par = $(this).closest('div').find('input').attr('name');
    $('#'+par).val('');
    $('#'+par).attr('readonly',false);
    $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
    $('.info-code_'+par).parent('div').addClass('hidden');
    $('.info-name_'+par).addClass('hidden');
    $(this).addClass('hidden');
    $('#'+par).trigger('change');
});
// END CBBL SAKU FORM

// GRID FORM
$(document).on('click', function() {
    hideAllSelectedRow()
})

function hideAllSelectedRow() {
    $('table[id^=input]').each(function(index, table) {
        $(table).children('tbody').each(function(index, tbody) {
            $(tbody).children('tr').each(function(index, tr) {
                $(tr).children('td').not(':first, :last').each(function(index, td) {
                    var value = $(td).children('.input-value').val()
                    $(td).children('.input-value').val(value)
                    $(td).children('span').not('.not-show').text(value)
                    $(td).children('.input-value').hide()
                    $(td).children('a').not('.hapus-item, .download-item').hide()
                    $(td).children('span').not('.not-show').show()
                })
            })
        })
        $(table).find('tr').removeClass('selected-row')
        $(table).find('td').removeClass('selected-cell')
        $(table).find('.input-value').hide()
        $(table).find('a').not('.hapus-item, .download-item').hide()
        $(table).find('span').not('.not-show').show()
    })
}

function hideUnselectedRow(tbody) {
    tbody.find('tr').not('.selected-row').each(function(index, tr) {
        $(tr).find('td').not(':first, :last').each(function(index, td) {
            var value = $(td).children('.input-value').val()
            $(td).children('.input-value').val(value)
            $(td).children('span').not('.not-show').text(value)
            $(td).children('.input-value').hide()
            $(td).children('a').not('.hapus-item, .download-item').hide()
            $(td).children('span').not('.not-show').show()
        })
    }) 
}

function hideUnselectedCell(tr) {
    tr.find('td').not(':first, :last, .readonly').each(function(index, td) {
        var value = $(td).children('.input-value').val()
        $(td).children('.input-value').val(value)
        $(td).children('span').not('.not-show').text(value)
        if($(td).hasClass('selected-cell')) {
            $(td).children('span').hide()
            $(td).children('.input-value').show()
            $(td).children('a').not('.hapus-item, .download-item').show()
                setTimeout(function() {
                $(td).children('.input-value').focus()
            }, 500)
        } else {
            $(td).children('.input-value').hide()
            $(td).children('a').not('.hapus-item, .download-item').hide()
            $(td).children('span').not('.not-show').show()
        }
    }) 
}

function nextSelectedCell(tr, td, index) {
    var value = $(td).children('.input-value').val()
    $(td).children('.input-value').val(value)
    $(td).children('span').not('.not-show').text(value)
    $(td).children('span').not('.not-show').show()
    $(td).children('.input-value').hide()
    $(td).children('a').not('.hapus-item, .download-item').hide()

    var nextindex = index + 1; 
    var tdnext = $(tr).find('td').eq(nextindex)
    var cekReadonly = $(tdnext).hasClass('readonly')
    if(cekReadonly) {
        nextindex = nextindex + 1
        tdnext = $(tr).find('td').eq(nextindex)
    }
    var cekCbbl = $(tdnext).has('a').length
    if(cekCbbl > 0) {
        $(tdnext).children('a').show()
    }

    $(tdnext).children('span').hide()
    $(tdnext).children('.input-value').show()
    setTimeout(function() {
        $(tdnext).children('.input-value').focus()
    }, 500)
}
// GRID KEDINASAN
function hitungTotalRowKedinasan(){
    var total_row = $('#input-kedinasan tbody tr').length;
    $('#total-kedinasan').html(total_row+' Baris');
}

function addRowKedinasanDefault() { 
    $('#input-kedinasan tbody').empty()
    var no= $('#input-kedinasan tbody > tr').length;
    no = no + 1;
    var idNoSK = 'sk-ke__'+no
    var idTanggalSK = 'tanggal-ke__'+no
    var idKeterangan = 'keterangan-ke__'+no
    var html = null;

    html = `<tr class="row-grid">
        <td class="text-center">
            <span class="no-grid ">${no}</span>
            <input type="hidden" name="nomor[]" value="${no}">
        </td>
        <td id="${idNoSK}">
            <span id="text-${idNoSK}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idNoSK}" name="no_sk[]" class="form-control input-value hidden" value="" >
        </td>
        <td id="${idTanggalSK}">
            <span id="text-${idTanggalSK}" class="tooltip-span"></span>
            <input class="form-control input-value hidden" type="date" id="value-${idTanggalSK}" name="tgl_sk[]" autocomplete="off" value="{{ date('Y-m-d') }}">
        </td>
        <td id="${idKeterangan}">
            <span id="text-${idKeterangan}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idKeterangan}" name="keterangan[]" class="form-control input-value hidden" value="" >
        </td>
        <td class='text-center'>
            <a class='hapus-item' title='Hapus Item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
        </td>
    </tr>`;

    $('#input-kedinasan tbody').append(html)

    $('.tooltip-span').tooltip({
        title: function(){
            return $(this).text();
        }
    });
    hitungTotalRowKedinasan()
}

function addRowKedinasan() { 
    var no= $('#input-kedinasan tbody > tr').length;
    no = no + 1;
    var idNoSK = 'sk-ke__'+no
    var idTanggalSK = 'tanggal-ke__'+no
    var idKeterangan = 'keterangan-ke__'+no
    var html = null;

    html = `<tr class="row-grid">
        <td class="text-center">
            <span class="no-grid ">${no}</span>
            <input type="hidden" name="nomor[]" value="${no}">
        </td>
        <td id="${idNoSK}">
            <span id="text-${idNoSK}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idNoSK}" name="no_sk[]" class="form-control input-value hidden" value="" >
        </td>
        <td id="${idTanggalSK}">
            <span id="text-${idTanggalSK}" class="tooltip-span"></span>
            <input class="form-control input-value hidden" type="date" id="value-${idTanggalSK}" name="tgl_sk[]" autocomplete="off" value="{{ date('Y-m-d') }}">
        </td>
        <td id="${idKeterangan}">
            <span id="text-${idKeterangan}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idKeterangan}" name="keterangan[]" class="form-control input-value hidden" value="" >
        </td>
        <td class='text-center'>
            <a class='hapus-item' title='Hapus Item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
        </td>
    </tr>`;

    $('#input-kedinasan tbody').append(html)
    $('#input-kedinasan tbody tr').not(':last').removeClass('selected-row');
    $('.row-grid:last').addClass('selected-row');

    $('.tooltip-span').tooltip({
        title: function(){
            return $(this).text();
        }
    });
    hitungTotalRowKedinasan()
}

$('#input-kedinasan tbody').on('click', '.hapus-item', function() {
    $(this).closest('tr').remove();
    no=1;
    $('#input-kedinasan tbody').children('.row-grid').each(function(){
        var nom = $(this).closest('tr').find('.no-grid');
        nom.html(no);
        no++;
    });
    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    hitungTotalRowKedinasan()
});

$('#add-kedinasan').click(function() {
    var row = $('#input-kedinasan tbody tr').length
    if(row > 0) {
        var empty = false;
        var kolom = null;
        var baris = null;
        var error = '';
        $('#input-kedinasan tbody tr').each(function() {
            baris = $(this).index() + 1
            $(this).find('td').not(':first, :last').each(function() {
                if($(this).text().trim() === '') {
                    empty = true;
                    kolom = $('#input-kedinasan thead > tr th').eq($(this).index()).text()
                    error = `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong`
                    return false;
                }
            })
        })
        if(empty) {
            alert(error)
        } else {
            addRowKedinasan()
        }
    } else {
        addRowKedinasan()
    }
})

$('#input-kedinasan tbody').on('click', 'td', function(event) {
    event.stopPropagation();
    var tr = $(this).parent()
    var tbody = $(tr).parent()
    $(tr).addClass('selected-row')
    $(this).addClass('selected-cell');
    tr.children().not(this).removeClass('selected-cell');
    tbody.children().not($(tr)).removeClass('selected-row')
    hideUnselectedCell(tr);
    hideUnselectedRow(tbody)
});

$('#input-kedinasan tbody').on('keydown', 'input', function(event) {
    event.stopPropagation();
    var tr = $(this).closest('tr')
    var td = $(this).parent()
    var tdindex = $(this).parent().index()
    var code = event.keyCode
    var totaltd = $(tr).children('td').not(':first, :last').length - 1
    if(code === 9) {
        $(td).removeClass('selected-cell')
        if(tdindex === totaltd) {
            $('#add-kedinasan').click()
        } else {
            nextSelectedCell(tr, td, tdindex)
        }
    } 
});
// END GRID KEDINASAN

// VALIDATION GRID //
function checkTableKedinasan() {
    var nama = $('#input-kedinasan').attr('data-table')
    var table = $('#input-kedinasan tbody').children('tr')
    var kolom = ''
    var error = ''
    var baris = null
    var empty = false
    if(table.length === 0) {
        valid = false
        alert('Harap mengisi data keluarga minimal 1 data')
    } else {
        $('#input-kedinasan tbody').children('tr').each(function() {
            baris = $(this).index() + 1
            $(this).children('td').not(':first, :last').each(function() {
                if($(this).text().trim() === '') {
                    empty = true
                    kolom = $('#input-kedinasan thead > tr th').eq($(this).index()).text()
                    error = `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong di ${nama}`
                    return false;
                }
            })
            if(empty) {
                return false
            }
        })

        if(empty) {
            alert(error)
            valid = false
        } else {
            valid = true
        }
    }
}
// END VALIDATION GRID //
// END GRID FORM

// SAVE TRIGGER
$('#form-tambah').validate({
    ignore: [],
    rules: {},
    errorElement: "label",
    submitHandler: function (form, event) {
        event.preventDefault()
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "true"){
            var url = "{{ url('esaku-trans/sdm-adm-dinas-update') }}";
            var pesan = "updated";
            var text = "Perubahan data "+id+" telah tersimpan";
        } else {
            var url = "{{ url('esaku-trans/sdm-adm-dinas') }}";
            var pesan = "saved";
            var text = "Data tersimpan dengan kode "+id;
        }

        var formData = new FormData(form);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        checkTableKedinasan()

        if(valid) {
            $.ajax({
                type: 'POST', 
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
                        $('#input-kedinasan tbody').empty()
                        $('#judul-form').html('Tambah Data Kedinasan');
                        resetForm();
                        msgDialog({
                            id: kode,
                            type: 'simpan'
                        });
                        last_add(dataTable,"nama", kode);
                        $('#id_edit').val('false')
                    } else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        }
        $('#btn-simpan').html("Simpan").removeAttr('disabled');
    },
    errorPlacement: function (error, element) {
        var id = element.attr("id");
        $("label[for="+id+"]").append("<br/>");
        $("label[for="+id+"]").append(error);
    }
});
// END SAVE TRIGGER

// EDIT DATA
$('#saku-form').on('click', '#btn-update', function(){
    var kode = $('#nu').val();
    msgDialog({
        id:kode,
        type:'edit'
    });
});

$('#saku-datatable').on('click', '#btn-edit', function(){
    var id= $(this).closest('tr').find('td').eq(0).html();
    editData(id)
});

function editData(id) { 
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');
    $('#judul-form').html('Edit Data Kedinasan');

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/sdm-adm-dinas') }}",
        data: { kode: id },
        dataType: 'json',
        async:false,
        success:function(res) {
            var data = res.data
            if(data.status) {
                $('#input-kedinasan tbody').empty()
                var formField = data.data[0]
                var gridField = data.detail
                valid = true
                $('#id_edit').val('true')
                $('#id').val(id)

                showInfoField('kode_nik', formField.nik, formField.nama)

                if(gridField.length > 0) {
                    var html = null;
                    var no = 1;

                    for(var i=0; i<gridField.length;i++) {
                        var row = gridField[i]
                        var idNoSK = 'sk-ke__'+no
                        var idTanggalSK = 'tanggal-ke__'+no
                        var idKeterangan = 'keterangan-ke__'+no
                        var tgl_sk = row.tgl_sk.split(" ")

                        html = `<tr class="row-grid">
                            <td class="text-center">
                                <span class="no-grid ">${no}</span>
                                <input type="hidden" name="nomor[]" value="${no}">
                            </td>
                            <td id="${idNoSK}">
                                <span id="text-${idNoSK}" class="tooltip-span">${row.no_sk}</span>
                                <input autocomplete="off" type="text" id="value-${idNoSK}" name="no_sk[]" class="form-control input-value hidden" value="${row.no_sk}" >
                            </td>
                            <td id="${idTanggalSK}">
                                <span id="text-${idTanggalSK}" class="tooltip-span">${tgl_sk[0]}</span>
                                <input class="form-control input-value hidden" type="date" id="value-${idTanggalSK}" name="tgl_sk[]" autocomplete="off" value="${tgl_sk[0]}">
                            </td>
                            <td id="${idKeterangan}">
                                <span id="text-${idKeterangan}" class="tooltip-span">${row.nama}</span>
                                <input autocomplete="off" type="text" id="value-${idKeterangan}" name="keterangan[]" class="form-control input-value hidden" value="${row.nama}" >
                            </td>
                            <td class='text-center'>
                                <a class='hapus-item' title='Hapus Item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
                            </td>
                        </tr>`;
                    
                        no++;
                        $('#input-kedinasan tbody').append(html)
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                    }
                }   

                $('#saku-datatable').hide();
                $('#modal-preview').modal('hide');
                $('#saku-form').show();
                setHeightForm();
                setWidthFooterCardBody();
                hitungTotalRowKedinasan()
            } 
        }
    })
}
// END EDIT DATA

// HAPUS DATA
$('#saku-datatable').on('click','#btn-delete',function(e){
    var kode = $(this).closest('tr').find('td').eq(0).html();
    msgDialog({
        id: kode,
        type:'hapus'
    });
});

function hapusData(id){
    $.ajax({
        type: 'DELETE',
        url: "{{ url('esaku-trans/sdm-adm-dinas') }}",
        data: { kode: id },
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.data.status){
                dataTable.ajax.reload();                    
                showNotification("top", "center", "success",'Hapus Data','Data Kedinasan ('+id+') berhasil dihapus ');
                $('#modal-pesan-id').html('');
                $('#table-delete tbody').html('');
                $('#modal-pesan').modal('hide');
            } else if(!result.data.status && result.data.message == "Unauthorized"){
                window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
// END HAPUS DATA
</script>