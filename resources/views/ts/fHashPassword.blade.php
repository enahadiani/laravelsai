<link rel="stylesheet" href="{{ asset('master.css') }}" />
<style>
    table.dataTable{
        border-collapse:collapse;
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
                <div class="card-body pt-3 form-body">
                    <div class="form-group row " id="row-id">
                        <div class="col-9">
                            <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                            <input type="hidden" id="method" name="_method" value="post">
                            <input type="hidden" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="kode_lokasi">Lokasi</label>
                                    <input class="form-control" type="text" id="kode_lokasi" name="kode_lokasi" required readonly value="{{ Session::get('lokasi') }}">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="btn-control">&nbsp;</label>
                                    <div id="btn-control">
                                        <button type="button" href="#" id="btnTampil" class="btn btn-primary mr-2">Load Data</button>
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
                                        <th>No</th>
                                        <th>Kode PP</th>
                                        <th>Nama PP</th>
                                        <th>Jumlah NIK</th>
                                        <th>Action</th>
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


var tablepphash = $("#table-data").DataTable({
        destroy: true,
        scrollX: true,
        pageLength: 50,
        scrollY: 'calc(100vh - 430px)',
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: [],
        columns: [
            { data: 'no' },
            { data: 'kode_pp' },
            { data: 'nama' },
            { data: 'jumlah' },
        ],
        columnDefs: [
        {
            "targets": 0,
            "searchable": false,
            "orderable": false,
        }, 
        {  
            'targets': [3], 
            'className': 'text-right',
            'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
        },{
            "targets" : 4,
            "data": null,
            "className": 'text-center',
            "render": function ( data, type, row, meta ) {
                if(row.jumlah <= 500){
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

    function loadData(){
        $.ajax({
            type: 'GET',
            url: "{{ url('ts-trans/hash-pass-pp') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            dataType: 'json',
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
        loadData();
    });

    $('#table-data').on('click','.btn-hash',function(e){
        var self = this;
        var data = tablepphash.row($(self).parents('tr')).data();
        
        var kode_pp = data.kode_pp;
        $(this).addClass('disabled');
        $(this).text("Please Wait...").attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: "{{ url('ts-trans/hash-pass-pp') }}",
            dataType: 'json',
            data:{ kode_pp: kode_pp},
            async:false,
            success:function(result){
                if(result.status){
                    msgDialog({
                        type: 'sukses',
                        title: 'Berhasil',
                        text: JSON.stringify(result.message)
                    });

                    console.log($(self).parents('tr'));
                    tablepphash
                    .row( $(self).parents('tr') )
                    .remove()
                    .draw();
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

    $('#table-data').on('click','.btn-batch',function(e){
        var self = this;
        var data = tablepphash.row($(self).parents('tr')).data();
        
        var kode_pp = data.kode_pp;
        var jumlah = parseInt(data.jumlah);
        $(this).addClass('disabled');
        $(this).text("Please Wait...").attr('disabled', 'disabled');

        $.ajax({
            type: 'GET',
            url: "{{ url('ts-trans/hash-pass-pp-batch') }}",
            dataType: 'json',
            data:{ kode_pp: kode_pp, jumlah: jumlah},
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
</script>