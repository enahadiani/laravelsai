<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('css_optional/trans.css') }}" />

{{-- LIST DATA --}}
<x-list-data judul="Data Keluarga" tambah="" :thead="array('NIK','Nama','Jumlah Keluarga','Aksi')" :thwidth="array(10,30,10,10)" :thclass="array('','','','text-center')" />
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
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#data-keluarga" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Keluarga</span></a></li>
                            </ul>
                            <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2rem;">
                                <div class="tab-pane active row tab-scroll" id="data-keluarga" role="tabpanel">
                                    <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                        <a style="font-size:18px;float: right;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-keluarga" ></span></a>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-condensed gridexample input-grid" id="input-keluarga" data-table="Tab data keluarga" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th style="width:3%;">No</th>
                                                    <th style="width:15%;">Nama</th>
                                                    <th style="width:8%;">Status</th>
                                                    <th style="width:8%;">Jenis Kelamin</th>
                                                    <th style="width:8%;">Tanggungan</th>
                                                    <th style="width:10%;">Tempat Lahir</th>
                                                    <th style="width:8%;">Tanggal Lahir</th>
                                                    <th style="width:18%;">Foto</th>
                                                    <th style="width:5%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <a type="button" id="add-keluarga" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
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
    $('#judul-form').html('Tambah Data Keluarga');
    newForm();
    addRowKeluargaDefault()
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
    "{{ url('esaku-trans/sdm-adm-keluargas') }}", 
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
// GRID KELUARGA
function hitungTotalRowKeluarga(){
    var total_row = $('#input-keluarga tbody tr').length;
    $('#total-keluarga').html(total_row+' Baris');
}

function addRowKeluargaDefault() { 
    $('#input-keluarga tbody').empty()
    var no= $('#input-keluarga tbody > tr').length;
    no = no + 1;
    var idNama = 'nama-ke__'+no
    var idStatus = 'status-ke__'+no
    var idKelamin = 'kelamin-ke__'+no
    var idTanggungan = 'tanggungan-ke__'+no
    var idTempatLahir = 'tempat-ke__'+no
    var idTanggalLahir = 'lahir-ke__'+no
    var idFile = 'file-ke__'+no
    var html = null;

    html = `<tr class="row-grid">
        <td class="text-center">
            <span class="no-grid ">${no}</span>
            <input type="hidden" name="nomor[]" value="${no}">
        </td>
        <td id="${idNama}">
            <span id="text-${idNama}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idNama}" name="nama[]" class="form-control input-value hidden" value="" >
        </td>
        <td id="${idStatus}">
            <span id="text-${idStatus}" class="tooltip-span"></span>
            <select id="value-${idStatus}" class="form-control input-value hidden">
                <option value="Suami" selected>Suami</option>
                <option value="Istri">Istri</option>
                <option value="Anak">Anak</option>
            </select>
            <input type="hidden" id="valueInput-${idStatus}" value="1" name="status[]">
        </td>
        <td id="${idKelamin}">
            <span id="text-${idKelamin}" class="tooltip-span"></span>
            <select id="value-${idKelamin}" class="form-control input-value hidden">
                <option value="Laki-laki" selected>Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input type="hidden" id="valueInput-${idKelamin}" value="L" name="jk[]">
        </td>
        <td id="${idTanggungan}">
            <span id="text-${idTanggungan}" class="tooltip-span"></span>
            <select id="value-${idTanggungan}" class="form-control input-value hidden">
                <option value="Ya" selected>Ya</option>
                <option value="Tidak">Tidak</option>
            </select>
            <input type="hidden" id="valueInput-${idTanggungan}" value="Y" name="tanggungan[]">
        </td>
        <td id="${idTempatLahir}">
            <span id="text-${idTempatLahir}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idTempatLahir}" name="tempat[]" class="form-control input-value hidden" value="" >
        </td>
        <td id="${idTanggalLahir}">
            <span id="text-${idTanggalLahir}" class="tooltip-span"></span>
            <input class="form-control input-value hidden" type="date" id="value-${idTanggalLahir}" name="tgl_lahir[]" autocomplete="off" value="{{ date('Y-m-d') }}">
        </td>
        <td id="${idFile}" style="word-wrap: break-word">
            <input id='value-${idFile}' type='file' name='file[]'>
            <input type="hidden" name="fileName[]" id="fileName-${idFile}" value="-">
            <input type="hidden" name="filePrevName[]" value="-">
            <input type="hidden" name="isUpload[]" id="checkUpload-${idFile}" value="false">
        </td>
        <td class='text-center'>
            <a class='hapus-item' title='Hapus Item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
        </td>
    </tr>`;

    $('#input-keluarga tbody').append(html)

    $('.tooltip-span').tooltip({
        title: function(){
            return $(this).text();
        }
    });

    $(`#value-${idStatus}`).change(function() {
        var td = $(this).parent().attr('id');
        var value = $(this).val()
        var isi = null
        if(value === "Suami") {
            isi = "1"
        } else if(value === "Istri") {
            isi = "2"
        } else {
            isi = "3"
        }
        $(`#valueInput-${idStatus}`).val(isi)
    })

    $(`#value-${idKelamin}`).change(function() {
        var td = $(this).parent().attr('id');
        var value = $(this).val()
        var isi = null
        if(value === "Laki-laki") {
            isi = "L"
        } else {
            isi = "P"
        }
        $(`#valueInput-${idKelamin}`).val(isi)
    })

    $(`#value-${idTanggungan}`).change(function() {
        var td = $(this).parent().attr('id');
        var value = $(this).val()
        var isi = null
        if(value === "Ya") {
            isi = "Y"
        } else {
            isi = "T"
        }
        $(`#valueInput-${idTanggungan}`).val(isi)
    })

    hitungTotalRowKeluarga()
}

function addRowKeluarga() { 
    var no= $('#input-keluarga tbody > tr').length;
    no = no + 1;
    var idNama = 'nama-ke__'+no
    var idStatus = 'status-ke__'+no
    var idKelamin = 'kelamin-ke__'+no
    var idTanggungan = 'tanggungan-ke__'+no
    var idTempatLahir = 'tempat-ke__'+no
    var idTanggalLahir = 'lahir-ke__'+no
    var idFile = 'file-ke__'+no
    var html = null;

    html = `<tr class="row-grid">
        <td class="text-center">
            <span class="no-grid ">${no}</span>
            <input type="hidden" name="nomor[]" value="${no}">
        </td>
        <td id="${idNama}">
            <span id="text-${idNama}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idNama}" name="nama[]" class="form-control input-value hidden" value="" >
        </td>
        <td id="${idStatus}">
            <span id="text-${idStatus}" class="tooltip-span"></span>
            <select id="value-${idStatus}" class="form-control input-value hidden">
                <option value="Suami" selected>Suami</option>
                <option value="Istri">Istri</option>
                <option value="Anak">Anak</option>
            </select>
            <input type="hidden" id="valueInput-${idStatus}" name="status[]" value="-">
        </td>
        <td id="${idKelamin}">
            <span id="text-${idKelamin}" class="tooltip-span"></span>
            <select id="value-${idKelamin}" class="form-control input-value hidden">
                <option value="Laki-laki" selected>Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input type="hidden" id="valueInput-${idKelamin}" name="jk[]"  value="-">
        </td>
        <td id="${idTanggungan}">
            <span id="text-${idTanggungan}" class="tooltip-span"></span>
            <select id="value-${idTanggungan}" class="form-control input-value hidden">
                <option value="Ya" selected>Ya</option>
                <option value="Tidak">Tidak</option>
            </select>
            <input type="hidden" id="valueInput-${idTanggungan}" name="tanggungan[]" value="Y">
        </td>
        <td id="${idTempatLahir}">
            <span id="text-${idTempatLahir}" class="tooltip-span"></span>
            <input autocomplete="off" type="text" id="value-${idTempatLahir}" name="tempat[]" class="form-control input-value hidden" value="" >
        </td>
        <td id="${idTanggalLahir}">
            <span id="text-${idTanggalLahir}" class="tooltip-span"></span>
            <input class="form-control input-value hidden" type="date" id="value-${idTanggalLahir}" name="tgl_lahir[]" autocomplete="off" value="{{ date('Y-m-d') }}">
        </td>
        <td id="${idFile}" style="word-wrap: break-word">
            <input id='value-${idFile}' type='file' name='file[]'>
            <input type="hidden" name="fileName[]" id="fileName-${idFile}" value="-">
            <input type="hidden" name="filePrevName[]" value="-">
            <input type="hidden" name="isUpload[]" id="checkUpload-${idFile}" value="false">
        </td>
        <td class='text-center'>
            <a class='hapus-item' title='Hapus Item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>
        </td>
    </tr>`;

    $('#input-keluarga tbody').append(html)
    $('#input-keluarga tbody tr').not(':last').removeClass('selected-row');
    $('.row-grid:last').addClass('selected-row');

    $('.tooltip-span').tooltip({
        title: function(){
            return $(this).text();
        }
    });

    $(`#value-${idStatus}`).change(function() {
        var td = $(this).parent().attr('id');
        var value = $(this).val()
        var isi = null
        if(value === "Suami") {
            isi = "1"
        } else if(value === "Istri") {
            isi = "2"
        } else {
            isi = "3"
        }
        $(`#valueInput-${idStatus}`).val(isi)
    })

    $(`#value-${idKelamin}`).change(function() {
        var td = $(this).parent().attr('id');
        var value = $(this).val()
        var isi = null
        if(value === "Laki-laki") {
            isi = "L"
        } else {
            isi = "P"
        }
        $(`#valueInput-${idKelamin}`).val(isi)
    })

    $(`#value-${idTanggungan}`).change(function() {
        var td = $(this).parent().attr('id');
        var value = $(this).val()
        var isi = null
        if(value === "Ya") {
            isi = "Y"
        } else {
            isi = "T"
        }
        $(`#valueInput-${idTanggungan}`).val(isi)
    })

    hitungTotalRowKeluarga()
}

$('#input-keluarga tbody').on('click', '.hapus-item', function() {
    $(this).closest('tr').remove();
    no=1;
    $('#input-keluarga tbody').children('.row-grid').each(function(){
        var nom = $(this).closest('tr').find('.no-grid');
        nom.html(no);
        no++;
    });
    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    hitungTotalRowKeluarga()
});

$('#add-keluarga').click(function() {
    var row = $('#input-keluarga tbody tr').length
    if(row > 0) {
        var empty = false;
        var kolom = null;
        var baris = null;
        var error = '';
        $('#input-keluarga tbody tr').each(function() {
            baris = $(this).index() + 1
            $(this).find('td').not(':first, :last, :eq(7)').each(function() {
                if($(this).text().trim() === '') {
                    empty = true;
                    kolom = $('#input-keluarga thead > tr th').eq($(this).index()).text()
                    error = `Data pada kolom ${kolom} di baris nomor ${baris} tidak boleh kosong`
                    return false;
                }
            })
        })
        if(empty) {
            alert(error)
        } else {
            addRowKeluarga()
        }
    } else {
        addRowKeluarga()
    }
})

$('#input-keluarga tbody').on('click', 'td', function(event) {
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

$('#input-keluarga tbody').on('keydown', 'input', function(event) {
    event.stopPropagation();
    var tr = $(this).closest('tr')
    var td = $(this).parent()
    var tdindex = $(this).parent().index()
    var code = event.keyCode
    var totaltd = $(tr).children('td').not(':first, :last').length - 1
    if(code === 9) {
        $(td).removeClass('selected-cell')
        if(tdindex === totaltd) {
            $('#add-keluarga').click()
        } else {
            nextSelectedCell(tr, td, tdindex)
        }
    } 
});

$('#input-keluarga tbody').on('change', 'input[type="file"]', function() {
    var td = $(this).parent()
    var id = $(td).attr('id')
    var file = '_'+$(this).val().replace(/C:\\fakepath\\/i, '')
    $(td).children('#fileName-'+id).val(file)
    $(td).children('#checkUpload-'+id).val("true")
})
// END GRID KELUARGA

// VALIDATION GRID //
function checkTableKeluarga() {
    var nama = $('#input-keluarga').attr('data-table')
    var table = $('#input-keluarga tbody').children('tr')
    var kolom = ''
    var error = ''
    var baris = null
    var empty = false
    if(table.length === 0) {
        valid = false
        alert('Harap mengisi data keluarga minimal 1 data')
    } else {
        $('#input-keluarga tbody').children('tr').each(function() {
            baris = $(this).index() + 1
            $(this).children('td').not(':first, :last, :eq(7)').each(function() {
                if($(this).text().trim() === '') {
                    empty = true
                    kolom = $('#input-keluarga thead > tr th').eq($(this).index()).text()
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
            var url = "{{ url('esaku-trans/sdm-adm-keluarga-update') }}";
            var pesan = "updated";
            var text = "Perubahan data "+id+" telah tersimpan";
        } else {
            var url = "{{ url('esaku-trans/sdm-adm-keluarga') }}";
            var pesan = "saved";
            var text = "Data tersimpan dengan kode "+id;
        }

        var formData = new FormData(form);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        checkTableKeluarga()

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
                        $('#input-keluarga tbody').empty()
                        $('#judul-form').html('Tambah Data Keluarga');
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
    $('#judul-form').html('Edit Data Keluarga');

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/sdm-adm-keluarga') }}",
        data: { kode: id },
        dataType: 'json',
        async:false,
        success:function(res) {
            var data = res.data
            if(data.status) {
                $('#input-keluarga tbody').empty()
                var formField = data.data[0]
                var gridField = data.detail
                valid = true
                $('#id_edit').val('true')
                $('#id').val(id)

                showInfoField('kode_nik', formField.nik, formField.nama)

                if(gridField.length > 0) {
                    var html = null;
                    var no = 1;
                    var textStatus = null
                    var textKelamin = null
                    var textTanggungan = null

                    for(var i=0; i<gridField.length;i++) {
                        var row = gridField[i]
                        var idNama = 'nama-ke__'+no
                        var idStatus = 'status-ke__'+no
                        var idKelamin = 'kelamin-ke__'+no
                        var idTanggungan = 'tanggungan-ke__'+no
                        var idTempatLahir = 'tempat-ke__'+no
                        var idTanggalLahir = 'lahir-ke__'+no
                        var idFile = 'file-ke__'+no
                        var tgl_lahir = row.tgl_lahir.split(" ")

                        if(row.jenis === "1") {
                            textStatus = "Suami"
                        } else if(row.jenis === "2") {
                            textStatus = "Istri"
                        } else {
                            textStatus = "Anak"
                        }

                        if(row.jk === "L") {
                            textKelamin = "Laki-laki"
                        } else {
                            textKelamin = "Perempuan"
                        }

                        if(row.status_kes === "Y") {
                            textTanggungan = "Ya"
                        } else {
                            textTanggungan = "Tidak"
                        }

                        html = `<tr class="row-grid">
                            <td class="text-center">
                                <span class="no-grid ">${no}</span>
                                <input type="hidden" name="nomor[]" value="${no}">
                            </td>
                            <td id="${idNama}">
                                <span id="text-${idNama}" class="tooltip-span">${row.nama}</span>
                                <input autocomplete="off" type="text" id="value-${idNama}" name="nama[]" class="form-control input-value hidden" value="${row.nama}" >
                            </td>
                            <td id="${idStatus}">
                                <span id="text-${idStatus}" class="tooltip-span">${textStatus}</span>
                                <select id="value-${idStatus}" class="form-control input-value hidden">
                                    <option value="Suami">Suami</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                </select>
                                <input type="hidden" id="valueInput-${idStatus}" name="status[]" value="${row.jenis}">
                            </td>
                            <td id="${idKelamin}">
                                <span id="text-${idKelamin}" class="tooltip-span">${textKelamin}</span>
                                <select id="value-${idKelamin}" class="form-control input-value hidden">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <input type="hidden" id="valueInput-${idKelamin}" name="jk[]"  value="${row.jk}">
                            </td>
                            <td id="${idTanggungan}">
                                <span id="text-${idTanggungan}" class="tooltip-span">${textTanggungan}</span>
                                <select id="value-${idTanggungan}" class="form-control input-value hidden">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                <input type="hidden" id="valueInput-${idTanggungan}" name="tanggungan[]" value="${row.status_kes}">
                            </td>
                            <td id="${idTempatLahir}">
                                <span id="text-${idTempatLahir}" class="tooltip-span">${row.tempat}</span>
                                <input autocomplete="off" type="text" id="value-${idTempatLahir}" name="tempat[]" class="form-control input-value hidden" value="${row.tempat}">
                            </td>
                            <td id="${idTanggalLahir}">
                                <span id="text-${idTanggalLahir}" class="tooltip-span">${tgl_lahir[0]}</span>
                                <input class="form-control input-value hidden" type="date" id="value-${idTanggalLahir}" name="tgl_lahir[]" autocomplete="off" value="${tgl_lahir[0]}">
                            </td>
                            <td id="${idFile}" style="word-wrap: break-word">
                                <input id='value-${idFile}' type='file' name='file[]'>
                                <input type="hidden" name="fileName[]" id="fileName-${idFile}" value="-">
                                <input type="hidden" name="filePrevName[]" value="${row.foto}">
                                <input type="hidden" name="isUpload[]" id="checkUpload-${idFile}" value="false">
                            </td>
                            <td class='text-center'>
                                <a class='hapus-item' title='Hapus Item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>`
                                if(row.foto !== "-") {
                                    html += `<a class="download-item" href="{{ config('api.url').'sdm/storage'}}/${row.foto}" 
                                    title="Lihat Foto" style="font-size:12px;cursor:pointer;" target="_blank">
                                        <i class="simple-icon-cloud-download"></i>
                                    </a>`
                                }  
                            html += `</td>
                        </tr>`
                    
                        no++;
                        $('#input-keluarga tbody').append(html)
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });

                        $(`#value-${idStatus}`).val(textStatus).change()
                        $(`#value-${idKelamin}`).val(textKelamin).change()
                        $(`#value-${idTanggungan}`).val(textTanggungan).change()

                        $(`#value-${idStatus}`).change(function() {
                            var td = $(this).parent().attr('id');
                            var value = $(this).val()
                            var isi = null
                            if(value === "Suami") {
                                isi = "1"
                            } else if(value === "Istri") {
                                isi = "2"
                            } else {
                                isi = "3"
                            }
                            $(`#valueInput-${idStatus}`).val(isi)
                        })

                        $(`#value-${idKelamin}`).change(function() {
                            var td = $(this).parent().attr('id');
                            var value = $(this).val()
                            var isi = null
                            if(value === "Laki-laki") {
                                isi = "L"
                            } else {
                                isi = "P"
                            }
                            $(`#valueInput-${idKelamin}`).val(isi)
                        })

                        $(`#value-${idTanggungan}`).change(function() {
                            var td = $(this).parent().attr('id');
                            var value = $(this).val()
                            var isi = null
                            if(value === "Ya") {
                                isi = "Y"
                            } else {
                                isi = "T"
                            }
                            $(`#valueInput-${idTanggungan}`).val(isi)
                        })
                    }
                }   

                $('#saku-datatable').hide();
                $('#modal-preview').modal('hide');
                $('#saku-form').show();
                setHeightForm();
                setWidthFooterCardBody();
                hitungTotalRowKeluarga()
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
        url: "{{ url('esaku-trans/sdm-adm-keluarga') }}",
        data: { kode: id },
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.data.status){
                dataTable.ajax.reload();                    
                showNotification("top", "center", "success",'Hapus Data','Data Keluarga ('+id+') berhasil dihapus ');
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