
<x-list-data judul="Data Draft Pengajuan" tambah="" :thead="array('No Bukti', 'Kode PP', 'Tanggal', 'Keterangan', 'Nilai','Posisi','Aksi')" :thwidth="array(10,10,15,20,15,15,15)" :thclass="array('','','','','','','text-center')" back="true"/>
<script>

var dataTable = generateTable(
    "table-data",
    "{{ url('rkap-trans/aju-usul-draft') }}", 
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
        {
                "targets":4,
                "className": 'text-right',
                "render": function ( data, type, row, meta ) {
                    return format_number(data);
                }
        }
        // {'targets': 7 ,'className': 'text-center' }
    ],
    [
        { data:'no_bukti' },
            { data:'kode_pp' },
            // { data:'kode_akun' },
            // { data:'tahun' },
            { data:'tanggal' },
            { data:'keterangan' },
            { data:'nilai' },
            // { data: 'komentar' },
            { data: 'posisi' },
        { data: 'progress', render: function(data) {
            if(data == 'A' || data == 'R') {
                return actionHtmlWithED
            } else {
                return actionHtmlNoED
            }
        } },
    ],
    "{{ url('rkap-auth/sesi-habis') }}",
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
// END LIST DATA

$('#saku-datatable').on('click', '#btn-kembali', function(){
    var kode = null;
    msgDialog({
        id:kode,
        btn1: 'btn btn-primary',
        btn2: 'btn btn-light',
        title: 'Keluar Form?',
        text: 'Kembali ke halaman utama.',
        confirm: 'Keluar',
        cancel: 'Batal',
        type:'custom',
        showCustom:function(result){
            if (result.value) {
                $('.navbar-top a').removeClass('active');
                $('a[data-href="fUsulDash"]').addClass('active');
                var url = "{{ url('rkap-auth/form')}}/fUsulMenu";
                $('#trans-body').load(url);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // console.log('cancel');
            }
        }
    });
});

// HAPUS DATA
function hapusData(id){
    $.ajax({
        type: 'DELETE',
        url: "{{ url('rkap-trans/aju-usul') }}/"+id,
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.data.status){
                dataTable.ajax.reload();                    
                showNotification("top", "center", "success",'Hapus Data','Data Pengajuan ('+id+') berhasil dihapus ');
                // $('#modal-preview-id').html('');
                $('#table-delete tbody').html('');
                if(typeof M == 'undefined'){
                    $('#modal-delete').modal('hide');
                }else{
                    $('#modal-delete').bootstrapMD('hide');
                }
            }else if(!result.data.status && result.data.message == "Unauthorized"){
                window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
            }else{
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Error',
                    text: result.data.message
                });
            }
        }
    });
}

$('#saku-datatable').on('click','#btn-delete',function(e){
    e.preventDefault();
    var id = $(this).closest('tr').find('td').eq(0).html();
    msgDialog({
        id: id,
        type:'hapus',
        title: 'Pembatalan Data?',
        text: 'Data akan dibatalkan secara permanen dan tidak dapat mengurungkan.<br> ID Data : <b>'+id+'</b>',
        confirm: 'Ya',
        cancel: 'Tidak'
    });
});

$('#saku-datatable').on('click', '#btn-edit', function(e){
    e.preventDefault();
    $id_edit= $(this).closest('tr').find('td').eq(0).html();
    $edit = 1;
    $('.navbar-top a').removeClass('active');
    $('a[data-href="fUsulAju"]').addClass('active');
    var url = "{{ url('rkap-auth/form')}}/fUsulAju";
    $('#trans-body').load(url);
});

// PRINT

$('#saku-datatable').on('click','#btn-print',function(e) {
    e.preventDefault();
    var id = $(this).closest('tr').find('td').eq(0).html();
    printPreview(id, 'table','#saku-form','#saku-datatable');
});

$('#saku-print #btn-back').click(function(e) {
    e.preventDefault();
    $('#saku-print').hide()
    $('#saku-datatable').show()
});
// END PRINT PREVIEW

// HISTORY

$('#saku-datatable').on('click','#btn-history',function(e) {
    e.preventDefault();
    var id = $(this).closest('tr').find('td').eq(0).html();
    historyPreview(id,'#saku-form','#saku-datatable');
});

$('#saku-history #btn-aback').click(function(e) {
    e.preventDefault();
    $('#saku-history').hide()
    $('#saku-datatable').show()
});
</script>