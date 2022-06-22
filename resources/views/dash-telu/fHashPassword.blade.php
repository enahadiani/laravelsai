<link rel="stylesheet" href="{{ asset('master.css') }}" />
<style>
    table.dataTable{
        border-collapse:collapse;
        padding: 4px 8px !important;
    }
    
    .dataTables_scrollBody #table-data th
    {
        padding-top:0px !important; 
        padding-bottom:0px !important;
    }
</style>
<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" >
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;height:50px">
                    <h6 id="judul-form" style="position:absolute;top:15px">Hash Password</h6>
                </div>
                <div class="separator mb-2"></div>
                <!-- FORM BODY -->
                <div class="card-body pt-0 form-body">
                    <div class="form-group row " id="row-id">
                        <div class="col-9">
                            <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                            <input type="hidden" id="method" name="_method" value="post">
                            <input type="hidden" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="kode_lokasi">Lokasi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_lokasi" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-kode_lokasi" id="kode_lokasi" name="kode_lokasi" value="" title="">
                                        <span class="info-name_kode_lokasi hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_lokasi"></i>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <label for="btn-control">&nbsp;</label>
                                    <div id="btn-control">
                                        <button type="button" href="#" id="btnTampil" class="btn btn-sm btn-primary">Load Data</button>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <label for="btn-control2">&nbsp;</label>
                                    <div id="btn-control2">
                                        <button type="button" href="#" id="genAll" class="btn btn-sm btn-primary">Hash All</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped" id="table-data" >
                                <thead>
                                    <tr>
                                        <th style="width:5%">No</th>
                                        <th style="width:40%">Kode Menu</th>
                                        <th style="width:40%">Jumlah NIK</th>
                                        <th style="width:15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</form>
<!-- END FORM INPUT -->

<!-- JAVASCRIPT  -->
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
// var $iconLoad = $('.preloader');
setHeightForm();

// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//     }
// });

// PLUGIN SCROLL di bagian preview dan form input
var scrollform = document.querySelector('.form-body');
var psscrollform = new PerfectScrollbar(scrollform);
// END PLUGIN SCROLL di bagian preview dan form input

var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;


var tablepphash = $("#table-data").DataTable({
        destroy: true,
        scrollX: true,
        pageLength: 50,
        scrollY: 'calc(100vh - 400px)',
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: [],
        columns: [
            { data: 'no' },
            { data: 'kode_menu_lab' },
            { data: 'jumlah' },
        ],
        columnDefs: [
        {
            "targets": 0,
            "searchable": false,
            "orderable": false,
        }, 
        {  
            'targets': [2], 
            'className': 'text-right',
            'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
        },{
            "targets" : 3,
            "data": null,
            "className": 'text-center',
            "render": function ( data, type, row, meta ) {
                if(row.jumlah <= 100){
                    return `<button type="button" class="btn btn-primary btn-xs btn-hash">Hash
                    </button>`;
                }else{
                    return `<button type="button" class="btn btn-primary btn-xs btn-batch"> Batch
                    </button>`;
                }
            }
        }],
        order:[],
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }
    });

    tablepphash.on( 'order.dt search.dt', function () {
        tablepphash.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    function loadData(kode_lokasi){
        $.ajax({
            type: 'GET',
            url: "{{ url('telu-trans/hash-pass-menu') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            dataType: 'json',
            data:{ kode_lokasi: kode_lokasi},
            async:false,
            success:function(result){
                tablepphash.clear().draw();
                if(result.status){
                    tablepphash.rows.add(result.data).draw(false);
                    tablepphash.columns.adjust().draw();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        type: 'warning',
                        title: 'error',
                        text: JSON.stringify(result.message)
                    })
                }
            }
        });
    }

    $('#form-tambah').on('click','#btnTampil',function(e){
        var kode_lokasi = $('#kode_lokasi').val();
        loadData(kode_lokasi);
    });

    $('#table-data').on('click','.btn-hash',function(e){
        var self = this;
        var data = tablepphash.row($(self).parents('tr')).data();
        
        var kode_menu_lab = data.kode_menu_lab;
        var kode_lokasi = $('#kode_lokasi').val();
        $(this).addClass('disabled');
        $(this).text("Please Wait...").attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: "{{ url('telu-trans/hash-pass-menu') }}",
            dataType: 'json',
            data:{ kode_menu_lab: kode_menu_lab, kode_lokasi: kode_lokasi},
            async:false,
            success:function(result){
                if(result.status){
                    if($sts_all != 1){
                        msgDialog({
                            type: 'sukses',
                            title: 'Berhasil',
                            text: JSON.stringify(result.message)
                        });
                    }

                    console.log($(self).parents('tr'));
                    tablepphash
                    .row( $(self).parents('tr') )
                    .remove()
                    .draw();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
                }else{
                    if($sts_all != 1){
                        msgDialog({
                            type: 'warning',
                            title: 'error',
                            text: JSON.stringify(result.message)
                        })
                    }
                }
            }
        });
    });

    $sts_all = 0;
    $('#form-tambah').on('click','#genAll',function(e){
        $sts_all = 1;
        $('#table-data tbody').each(function(){
            $('.btn-hash').click();
        })
    });

    $('#table-data').on('click','.btn-batch',function(e){
        var self = this;
        var data = tablepphash.row($(self).parents('tr')).data();
        
        var kode_menu_lab = data.kode_menu_lab;
        var jumlah = parseInt(data.jumlah);
        $(this).addClass('disabled');
        $(this).text("Please Wait...").attr('disabled', 'disabled');

        $.ajax({
            type: 'GET',
            url: "{{ url('telu-trans/hash-pass-menu-batch') }}",
            dataType: 'json',
            data:{ kode_menu_lab: kode_menu_lab, jumlah: jumlah},
            async:false,
            success:function(result){
                if(result.status){
                    msgDialog({
                        type: 'sukses',
                        title: 'Batch berhasil',
                        text: JSON.stringify(result.message)
                    });

                    tablepphash
                    .row( $(self).parents('tr') )
                    .remove()
                    .draw();

                    tablepphash.rows.add(result.data).draw(false);
                    tablepphash.columns.adjust().draw();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        type: 'warning',
                        title: 'error',
                        text: JSON.stringify(result.message)
                    })
                }
            }
        });
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id){
            case 'kode_lokasi' :
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('telu-trans/hash-pass-menu-lokasi') }}",
                    columns : [
                        { data: 'kode_lokasi' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Lokasi",
                    pilih : "lokasi",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                };
            break;
        }
        showInpFilterBSheet(settings);
    });
</script>