<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<style>
th,td{
    padding:8px !important;
    vertical-align:middle !important;
}
.hidden{
    display:none;
}
.form-group{
    margin-bottom:5px !important;
}
.form-control{
    font-size:13px !important;
    padding: .275rem .6rem !important;
}
.selectize-control, .selectize-dropdown{
    padding: 0 !important;
}
i:hover{
    cursor: pointer;
    color: blue;
}
</style>
<div class="container-fluid mt-3" style="font-size:13px">
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="min-height: 560px !important;">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Close Kasir</h4>
                            <hr style="margin-bottom:0">
                        </div>
                        <div class="col-6">
                            <ul class="nav nav-tabs customtab float-right" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#sai-tab-finish" role="tab" aria-selected="true">
                                        <span class="hidden-xs-down">Finish</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#sai-tab-new" role="tab" aria-selected="false">
                                        <span class="hidden-xs-down">New</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="sai-tab-new" style="position: relative;">
                                    <div class="table-responsive">
                                        <table id="table-new" class="table table-bordered table-striped" style='width:100%'>
                                            <thead>
                                                <tr>
                                                    <td>No Open</td>
                                                    <td>Nik Kasir</td>
                                                    <td>Tgl Jam</td>
                                                    <td>Saldo</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>    
                                    </div>
                                </div>
                                <div class="tab-pane" id="sai-tab-finish" style="position: relative;">
                                    <div class="table-responsive">
                                        <table id="table-finish" class="table table-bordered table-striped" style='width:100%'>
                                            <thead>
                                                <tr>
                                                    <td>No Close</td>
                                                    <td>Nik Kasir</td>
                                                    <td>Tgl Jam</td>
                                                    <td>Saldo Awal</td>
                                                    <td>Total Penjualan</td>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM EDIT -->
    <div id="saku-form" class="row" style="display:none;">
        <div class="col-12">
            <div class="card" style="min-height: 560px !important;">
                <form id="form-tambah" style="">
                    <div class="card-body pb-0">
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Open Kasir
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                    </div>
                    <div class="card-body pt-0">
                        <div class="form-group row ">
                            <label for="nik" class="col-3 col-form-label">NIK Kasir</label>
                            <div class="col-3">
                                <input class="form-control" type="text" placeholder="NIK Kasir" id="nik" name="nik" readonly>
                            </div>
                        </div>
                        <div class="form-group row ">
							<label for="tgl_open" class="col-3 col-form-label">Tanggal Open</label>
                            <div class="col-3">
                                <input class="form-control" type="text" placeholder="Tanggal Open" id="tgl_open" name="tgl_open" readonly>
                            </div>
                            <label for="no_open" class="col-3 col-form-label">No Open</label>
                            <div class="col-3">
                                <input class="form-control" type="text" placeholder="No Open" id="no_open" name="no_open" readonly>
                            </div>
                        </div>
                        <div class="form-group row ">
							<label for="saldo_awal" class="col-3 col-form-label">Saldo Awal</label>
                            <div class="col-3">
                                <input class="form-control currency" type="text" placeholder="Saldo Awal" id="saldo_awal" name="saldo_awal" readonly>
                            </div>
                            <label for="total_pnj" class="col-3 col-form-label">Total Penjualan</label>
                            <div class="col-3">
                                <input class="form-control currency" type="text" placeholder="Total Penjualan" id="total_pnj" name="total_pnj" readonly>
                            </div>
                        </div>
                        <div class="form-group row ">
							<label for="total_diskon" class="col-3 col-form-label">Total Diskon</label>
                            <div class="col-3">
                                <input class="form-control currency" type="text" placeholder="Total Diskon" id="total_disk" name="total_disk" readonly>
                            </div>
                            <label for="total" class="col-3 col-form-label">Total</label>
                            <div class="col-3">
                                <input class="form-control currency" type="text" placeholder="Total" id="total" name="total" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="col-12">
                            <h6>Detail Penjualan</h6>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="table-detail" class="table table-bordered table-striped" style='width:100%'>
                                    <thead>
                                        <tr>
                                            <th>No Jual</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Periode</th>
                                            <th>Total</th>
                                            <th>Diskon</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('asset_elite/sai.js') }}"></script>
<script src="{{ asset('asset_elite/inputmask.js') }}"></script>
<script type="text/javascript">
var $iconLoad = $('.preloader');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $('[data-toggle="tooltip"]').tooltip();
    
    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a>";
    var dataTableNew = $('#table-new').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        // "scrollX": true,
        'ajax': {
            'url': "{{ url('toko-trans/close-kasir-new') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('toko-auth/login') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 4, data: null, 'defaultContent': action_html },
            {
                'targets': [3], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            ],
        'columns': [
            { data: 'no_open' },
            { data: 'nik' },
            { data: 'tgl_input' },
            { data: 'saldo_awal' },
        ],
        dom: 'lBfrtip',
        buttons: [
            // {
            //     text: '<i class="fa fa-filter"></i> Filter',
            //     action: function ( e, dt, node, config ) {
            //         openFilter();
            //     },
            //     className: 'btn btn-default ml-2' 
            // }
        ]
    });

    var dataTableFinish = $('#table-finish').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        // "scrollX": true,
        'ajax': {
            'url': "{{ url('toko-trans/close-kasir-finish') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('toko-auth/login') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {
                'targets': [3,4], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            ],
        'columns': [
            { data: 'no_close' },
            { data: 'nik' },
            { data: 'tgl_input' },
            { data: 'saldo_awal' },
            { data: 'total_pnj' },
        ],
        dom: 'lBfrtip',
        buttons: [
            // {
            //     text: '<i class="fa fa-filter"></i> Filter',
            //     action: function ( e, dt, node, config ) {
            //         openFilter();
            //     },
            //     className: 'btn btn-default ml-2' 
            // }
        ]
    });

    var tableDetail = $('#table-detail').DataTable({
        data: [],
        columns: [
            { data: 'no_jual' },
            { data: 'tanggal', render: function(data,type,row) {
                var split = data.split('-');
                return split[2]+"/"+split[1]+"/"+split[0]
            } },
            { data: 'keterangan' },
            { data: 'periode' },
            { data: 'nilai' },
            { data: 'diskon' },
        ],
        'columnDefs': [
            {'targets': [4,5],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            },
            {'targets': [0],
                'className': 'text-right',
                'render': function (data, type, row) {
                    return data+"<input type='hidden' name='no_jual[]' value='" + data + "'>";
                }
            }
        ]

    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var open= $(this).closest('tr').find('td').eq(0).html();
        $iconLoad.show();
        $.ajax({
            type:'GET',
            url: "{{url('toko-trans/close-kasir-detail')}}/"+open,
            dataType:'json',
            async:false,
            success: function(result) {
                if(result.data.status) {
                    var split = result.data.data[0].tgl.split('-');
                    var tgl = split[2]+"/"+split[1]+"/"+split[0];
                    var total = parseFloat(result.data.data[0].saldo_awal) + parseFloat(result.data.data[0].total_pnj);
                    tableDetail.clear().draw();
                    tableDetail.rows.add(result.data.data_detail).draw(false);
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#no_open').val(open);
                    $('#nik').val(result.data.data[0].nik);
                    $('#saldo_awal').val(parseFloat(result.data.data[0].saldo_awal));
                    $('#total_pnj').val(parseFloat(result.data.data[0].total_pnj));
                    $('#total_disk').val(parseFloat(result.data.data[0].total_disk));
                    $('#total').val(total);
                    $('#tgl_open').val(tgl)
                    $('#saku-datatable').hide();
                    $iconLoad.hide();
                    $('#saku-form').show();
                }
            }
        });
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();

        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        $.ajax({
            type: 'POST', 
            url: "{{url('toko-trans/close-kasir')}}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                console.log(result)
                if(result.data.status){
                    // location.reload();
                    dataTableNew.ajax.reload();
                    dataTableFinish.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been saved',
                        'success'
                        )
                        $('#saku-datatable').show();
                        $('#saku-form').hide();
                 
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('/toko-auth/login') }}";
                    }) 
                }else{
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
    });
</script>