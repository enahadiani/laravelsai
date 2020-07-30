<style>
.form-group.row{
   margin-bottom:5px !important;
}
</style>
<div class="container-fluid mt-3">
    <div class="row" id="saku-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" id="form-tambah" method="POST">
                        <div class="row">
                            <div class="card-body py-0 col-12">
                                <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Generate Barcode
                                <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                                </h4>
                                <hr>
                            </div>
                            <div class="card-body pt-0 col-12" style="height: 440px !important;">
                                <div class="form-group row">
                                    <label for="periode" class="col-2 col-form-label">Periode</label>
                                    <div class="col-3">
                                        <select class='form-control' id="periode" name="periode">
                                            <option value='' disabled selected>--- Pilih Periode ---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">   
                                    <label for="kode_kirim" class="col-2 col-form-label">Jasa Kirim</label>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="Jasa Kirim" id="kode_kirim" name="kode_kirim">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" id="search-kode_kirim" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <label id="label_kode_kirim" style="margin-top: 10px;"></label>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" id="loadData" class="btn btn-primary float-right">Load Data</button>
                                    </div>
                                </div>
                                <div class="col-12" style="height:320px; margin:0px; padding:0px;">
                                    <table class="table table-striped table-bordered table-condensed" id="input-grid" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:5%"><input name="select_all" value="1" type="checkbox"></th>
                                                <th style="width:15%">No Pesan</th>
                                                <th style="width:15%">Tanggal</th>
                                                <th style="width:30%">Nama Customer</th>
                                                <th style="width:20%">Nilai Pesan</th>
                                                <th style="width:15%">Jasa Kirim</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="slide-print" style="display:none;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                    <button type="button" class="btn btn-info ml-2" id="btn-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                    <div class="mt-5" width='100%' style='border:none;min-height:480px;padding:10px; !important'>
                        <div class="row" id="print-area">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- MODAL SEARCH-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL --> 
</div>
<script type="text/javascript">

    function updateDataTableSelectAllCtrl(table)
    {
    var $table             = table.table().node();
    var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
    var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
    var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

        // If none of the checkboxes are checked
        if($chkbox_checked.length === 0){
            chkbox_select_all.checked = false;
            if('indeterminate' in chkbox_select_all){
                chkbox_select_all.indeterminate = false;
            }

        // If all of the checkboxes are checked
        } else if ($chkbox_checked.length === $chkbox_all.length){
            chkbox_select_all.checked = true;
            if('indeterminate' in chkbox_select_all){
                chkbox_select_all.indeterminate = false;
            }

        // If some of the checkboxes are checked
        } else {
            chkbox_select_all.checked = true;
            if('indeterminate' in chkbox_select_all){
                chkbox_select_all.indeterminate = true;
            }
        }
    }

    function getPeriode(){
        $.ajax({
            type: 'GET',
            url: "toko-trans/periode",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('#periode').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        for(i=0;i<result.data.data.length;i++){
                            control.addOption([{text:result.data.data[i].periode, value:result.data.data[i].periode}]);
                        }
                    }
                }
            }
        });
    }


    function showFilter(param,target1,target2){
        var par = param;
        
        var modul = '';
        var header = [];
        var target1 = target1;
        var target2 = target2;
        var target3 = "";
        var target4 = "";
        var parameter = {};
        switch(par){
            case 'kode_kirim': 
                header = ['Kode Kirim', 'Nama'];
                var toUrl = "toko-master/jasa-kirim";
                var columns = [
                    { data: 'kode_kirim' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Jasa Kirim";
                var jTarget1 = "val";
                var jTarget2 = "text";
                target1 = "#"+target1;
                target2 = "#"+target2;
                parameter = {'param':par};
            break;
        }
        
        var header_html = '';
        for(i=0; i<header.length; i++){
            header_html +=  "<th>"+header[i]+"</th>";
        }
        header_html +=  "<th></th>";
        
        var table = "<table class='table table-bordered table-striped' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";
        
        $('#modal-search .modal-body').html(table);
        
        var searchTable = $("#table-search").DataTable({
            // fixedHeader: true,
            // "scrollY": "300px",
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": toUrl,
                "data": parameter,
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            "columnDefs": [{
                "targets": header.length, "data": null, "defaultContent": "<a class='check-item'><i class='fa fa-check'></i></a>"
            }],
            'columns': columns
            // "iDisplayLength": 25,
        });
        
        // searchTable.$('tr.selected').removeClass('selected');
        console.log(judul);
        $('#table-search tbody').find('tr:first').addClass('selected');
        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();
        
        $('#table-search').on('click','.check-item',function(){
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $(target1).val(kode);
                $(target1).trigger("change");
            }else{
                $(target1).text(kode);
            }
            
            if(jTarget2 == "val"){
                $(target2).val(nama);
                $(target2).trigger("change");
            }else{
                $(target2).text(nama);
            }
            
            if(target3 != ""){
                
                var value = $(this).closest('tr').find('td:nth-child(3)').text();
                if(jTarget3 == "val"){
                    $(target3).val(value);
                    $(target3).trigger("change");
                }else{
                    $(target3).text(value);
                }
            }
            if(target4 != ""){
                
                var value = $(this).closest('tr').find('td:nth-child(4)').text();
                if(jTarget4 == "val"){
                    $(target4).val(value);
                    $(target4).trigger("change");
                }else{
                    $(target4).text(value);
                }
            }
            $('#modal-search').modal('hide');
        });
        
        $('#table-search tbody').on('dblclick','tr',function(){
            console.log('dblclick');
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $(target1).val(kode);
                $(target1).trigger("change");
            }else{
                $(target1).text(kode);
            }
            
            if(jTarget2 == "val"){
                $(target2).val(nama);
                $(target2).trigger("change");
            }else{
                $(target2).text(nama);
            }
            
            if(target3 != ""){
                
                var value = $(this).closest('tr').find('td:nth-child(3)').text();
                if(jTarget3 == "val"){
                    $(target3).val(value);
                    $(target3).trigger("change");
                }else{
                    $(target3).text(value);
                }
            }
            if(target4 != ""){
                
                var value = $(this).closest('tr').find('td:nth-child(4)').text();
                if(jTarget4 == "val"){
                    $(target4).val(value);
                    $(target4).trigger("change");
                }else{
                    $(target4).text(value);
                }
            }
            $('#modal-search').modal('hide');
        });
        
        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
        
        $(document).keydown(function(e) {
            if (e.keyCode == 40){ //arrow down
                var tr = searchTable.$('tr.selected');
                tr.removeClass('selected');
                tr.next().addClass('selected');
                // tr = searchTable.$('tr.selected');
                
            }
            if (e.keyCode == 38){ //arrow up
                
                var tr = searchTable.$('tr.selected');
                searchTable.$('tr.selected').removeClass('selected');
                tr.prev().addClass('selected');
                // tr = searchTable.$('tr.selected');
                
            }
            
            if (e.keyCode == 13){
                var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $(target1).val(kode);
                    $(target1).trigger("change");
                }else{
                    $(target1).text(kode);
                }
                
                if(jTarget2 == "val"){
                    $(target2).val(nama);
                    $(target2).trigger("change");
                }else{
                    $(target2).text(nama);
                }
                
                if(target3 != ""){
                    
                    var value = $(this).closest('tr').find('td:nth-child(3)').text();
                    if(jTarget3 == "val"){
                        $(target3).val(value);
                        $(target3).trigger("change");
                    }else{
                        $(target3).text(value);
                    }
                }
                if(target4 != ""){
                    
                    var value = $(this).closest('tr').find('td:nth-child(4)').text();
                    if(jTarget4 == "val"){
                        $(target4).val(value);
                        $(target4).trigger("change");
                    }else{
                        $(target4).text(value);
                    }
                }
                $('#modal-search').modal('hide');
            }
        })
    }

    getPeriode();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

   // Array holding selected row IDs
   var rows_selected = [];
   var table = $('#input-grid').DataTable({
        'columns': [
            { data: 'action' },
            { data: 'no_pesan' },
            { data: 'tanggal' },
            { data: 'nama_cust' },
            { data: 'nilai_pesan' },
            { data: 'kode_kirim' }
        ],
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'width': '1%',
            'className': 'dt-body-center',
            'render': function (data, type, full, meta){
                return '<input type="checkbox">';
            }
        }],
        'order': [[1, 'asc']],
        'rowCallback': function(row, data, dataIndex){
            // Get row ID
            var rowId = data[0];
            // If row ID is in the list of selected row IDs
            if($.inArray(rowId, rows_selected) !== -1){
                $(row).find('input[type="checkbox"]').prop('checked', true);
                $(row).addClass('selected');
            }
        }
    });

    function loadData(periode = null,kode_kirim = null){
        $.ajax({
            type: 'GET',
            url: "toko-trans/barcode-load",
            dataType: 'json',
            data:{'periode':periode,'kode_kirim':kode_kirim},
            async:false,
            success:function(result){    
                if(result.status){
                    table.clear().draw();
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        table.rows.add(result.daftar).draw(false);
                    }
                }
            }
        });
    }

    // Handle click on checkbox
    $('#input-grid tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        // Get row data
        var data = table.row($row).data();

        // Get row ID
        var rowId = data[0];

        // Determine whether row ID is in the list of selected row IDs
        var index = $.inArray(rowId, rows_selected);

        // If checkbox is checked and row ID is not in list of selected row IDs
        if(this.checked && index === -1){
            rows_selected.push(rowId);

        // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
        } else if (!this.checked && index !== -1){
            rows_selected.splice(index, 1);
        }

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Update state of "Select all" control
        updateDataTableSelectAllCtrl(table);

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    // Handle click on table cells with checkboxes
    $('#input-grid').on('click', 'tbody td, thead th:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    // Handle click on "Select all" control
    $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
        if(this.checked){
            $('#input-grid tbody input[type="checkbox"]:not(:checked)').trigger('click');
        } else {
            $('#input-grid tbody input[type="checkbox"]:checked').trigger('click');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    // Handle table draw event
    table.on('draw', function(){
        // Update state of "Select all" control
        updateDataTableSelectAllCtrl(table);
    });

    // Handle form submission event
    $('#form-tambah').on('submit', function(e){
        e.preventDefault();
        alert( table.rows('.selected').data().length +' row(s) selected' );
        var formData = new FormData(this);
        var data = table.rows('.selected').data();
        for(i=0;i<data.length;i++){
            formData.append('no_bukti[]',data[i].no_pesan);
        }
        var url = "toko-trans/barcode";
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
                    // location.reload();
                    $('#form-tambah')[0].reset();
                    table.clear().draw();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been saved.',
                        'success'
                    )

                    if(result.data.data.length > 0){
                        var html ='';
                        for(var i=0;i<result.data.data.length;i++){
                            var line = result.data.data[i];
                         html += `
                            <div class="col-6">
                                <table class="table no-border" style="border: 1px solid black;border-collapse: collapse;width:100%">
                                    <tbody>
                                        <tr>
                                            <td colspan='2' class="text-center">NOMOR BUKTI: `+line.no_pesan+`</td>
                                        </tr>
                                        <tr>
                                            <td colspan='2' class="text-center"><img src='https://api.simkug.com/api/toko-auth/storage/barcode-`+line.no_pesan+`' width='450px' height='30px' /></td>
                                        </tr>
                                        <tr>
                                            <td colspan='2' style='border-bottom:1px solid black'></td>
                                        </tr>
                                        <tr>
                                            <td colspan='2' ><p>Penerima: `+line.nama_cust+` <br>
                                            `+line.alamat_cust+`<br>
                                            Kecamatan `+line.kecamatan_cust+`, Kabupaten/Kota `+line.kota_cust+`, `+line.provinsi_cust+`<br>
                                            Telp. `+line.kode_cust+`
                                            </p></td>
                                        </tr>
                                        </tr>
                                            <td colspan='2' ><p>Pengirim: `+line.nama_lokasi+` <br>
                                            `+line.alamat_lokasi+` <br>
                                            Kabupaten/Kota `+line.kota_lokasi+`
                                            Telp. `+line.no_telp_lokasi+`
                                            </p></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">`+line.kode_kirim+` (`+line.service+`) </td>
                                            <td class="text-center">Berat:`+line.berat+`g</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>`;
                        }
                        $('#print-area').html(html);
                        $('#slide-print').show();
                        $('#saku-form').hide();
                    }
                        
                }
                else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/login') }}";
                    })
                }
                else{
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

    $('#form-tambah').on('click', '#search-kode_kirim', function(){
        console.log('klik');
        var par = $(this).closest('.row').find('input').attr('name');
        var par2 = "label_"+par;
        console.log(par,par2);
        showFilter(par,par,par2);

    });

    $('#form-tambah').on('click', '#loadData', function(){
        periode = $('#periode')[0].selectize.getValue();
        kode_kirim = $('#kode_kirim').val();
        loadData(periode,kode_kirim);
    });

    $('#slide-print').on('click', '#btn-kembali', function(){
        $('#saku-form').show();
        $('#slide-print').hide();
    });

    $('#slide-print').on('click', '#btn-print', function(){
        $('#print-area').printThis();
    });

</script>