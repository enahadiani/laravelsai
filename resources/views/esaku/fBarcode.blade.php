<link rel="stylesheet" href="{{ asset('trans.css') }}" />

<style>
    th#checkbox {
        text-align: center; /* center checkbox horizontally */
        vertical-align: middle; /* center checkbox vertically */
    }
    tbody > tr > td:first-child {
        text-align: center; /* center checkbox horizontally */
        vertical-align: middle; /* center checkbox vertically */
    }
</style>

<form id="form-tambah" class="tooltip-label-right" method="POST" novalidate>
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                    <h6 id="judul-form" style="position:absolute;top:25px">Generate Barcode</h6>
                    <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="periode" >Periode</label>
                                    <select class='form-control' id="periode" name="periode">
                                        <option value=''>--- Pilih Periode ---</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_kirim">Jasa Kirim</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_kirim" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-pic" id="kode_kirim" name="kode_kirim" value="" title="">
                                        <span class="info-name_kode_kirim hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_kirim"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <button id="btn-load" class="btn btn-light" style="float: right !important; margin-top: 18px !important;" type="button">Load Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="table-data" class="table table-bordered" style='width:100%'>
                            <thead>
                                <tr>
                                    <th id="checkbox"><input name="select_all" value="1" type="checkbox"></th>
                                    <th>No. Pesan</th>
                                    <th>Tanggal</th>
                                    <th>Nama Customer</th>
                                    <th>Nilai Pesan</th>
                                    <th>Jasa Kirim</th>
                                </tr>
                            </thead>
                            <tbody id="data">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('modal_search')
<script src="{{ asset('helper.js') }}"></script>  
<script type="text/javascript">

    $('#form-tambah').on('click', '#btn-load', function(){
        loadData();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'kode_kirim': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/jasa-kirim') }}",
                    columns : [
                        { data: 'kode_kirim' },
                        { data: 'nama' },
                    ],
                    judul : "Daftar Jasa Kirim",
                    pilih : "",
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
        showInpFilter(settings);
    })
    var table = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: [],
        columnDefs: [
            {
                "targets": 0,
                "searchable": false,
                "orderable": false,
                "className": 'selectall-checkbox',
                'render': function (data, type, full, meta){
                    return '<input type="checkbox" name="checked[]">';
                }
            },
            {   
                'targets': 4, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            }, 
        ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        columns: [
            { data: 'checkbox' },
            { data: 'no_pesan' },
            { data: 'tanggal' },
            { data: 'nama_cust' },
            { data: 'nilai_pesan' },
            { data: 'kode_kirim' },
        ],
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

    table.on('select.dt deselect.dt', function (e, dt, type, indexes){
        var countSelectedRows = table.rows( { selected: true } ).count();
        var countItems = table.rows().count();

        if (countItems > 0) {
        if (countSelectedRows == countItems){
                $('thead .selectall-checkbox input[type="checkbox"]', this).prop('checked', true);
        } else {
                $('thead .selectall-checkbox input[type="checkbox"]', this).prop('checked', false);
        }
        }

        if (e.type === 'select') {
            $('.selectall-checkbox input[type="checkbox"]', table.rows({ selected: true }).nodes()).prop('checked', true);
        } else {
            $('.selectall-checkbox input[type="checkbox"]', table.rows({ selected: false }).nodes()).prop('checked', false);
        }
    });

    table.on('click', 'thead .selectall-checkbox', function() {
            $('input[type="checkbox"]', this).trigger('click');
     });

    table.on('click', 'thead .selectall-checkbox input[type="checkbox"]', function(e) {
        if (this.checked) {
            table.rows().select();
        } else {
            table.rows().deselect();
        }
        
        e.stopPropagation();
    });

    function loadData() {
        var periode = $('#periode')[0].selectize.getValue();
        var kode_kirim = $('#kode_kirim').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/barcode-load') }}",
            dataType: 'json',
            data:{periode: periode, kode_kirim: kode_kirim},
            success:function(result){
                var data = result.daftar;
                var tableData = [];
                table.clear().draw();
                if(result.status) {
                    for(var i=0; i<data.length;i++) {
                        var substr = data[i].tanggal.substr(0, 10)
                        var split = substr.split('-');
                        var tanggal = split[2]+"/"+split[1]+"/"+split[0];
                        tableData.push({
                            no_pesan: data[i].no_pesan,
                            tanggal: tanggal,
                            nama_cust: data[i].nama_cust,
                            nilai_pesan: data[i].nilai_pesan,
                            kode_kirim: data[i].kode_kirim
                        })
                    }
                    Swal.fire(
                        'Great Job!',
                        'Load data pesanan berhasil',
                        'success'
                    )
                    table.rows.add(tableData).draw(false);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.message+'</a>'
                    })
                }    
            }
        });
    }
    
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/periode') }}",
        dataType: 'json',
        success:function(result){ 
            var data = result.data;
            var select = $('#periode').selectize();
            select = select[0];
            var control = select.selectize;
            if(data.status){
                if(typeof data.data !== 'undefined' && data.data.length>0){
                    for(i=0;i<data.data.length;i++){
                        control.addOption([{text:data.data[i].periode, value:data.data[i].periode}]);
                    }
                    control.setValue("202101")
                }
            }
        }
    });

    $('#form-tambah').submit(function(e){
        e.preventDefault()
        var formData = new FormData(this);
        // $('#data').
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
    });
</script>