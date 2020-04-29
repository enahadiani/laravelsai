<style>
.selected{
    color:blue;
}
</style>
<div class="container-fluid mt-3">
        <div class="row" id="saku-form">
            <div class="col-sm-12">
                <div class="card" style="height:560px !important">
                    <form class="form" id="form-tambah" style=''>
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Data Posting
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body table-responsive pt-0" style='height:471px'>
                        <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class='form-control' type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-2 col-form-label">Deskripsi</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" placeholder="Deskripsi" id="deskripsi" name="deskripsi">
                                </div>
                                <div class='col-4 text-right'>
                                <button type="button" href="#" id="loadData" class="btn btn-primary"></i> Load Data</button>
                                <button type="button" href="#" id="postAll" class="btn btn-primary"></i> Posting All</button>
                                </div>                                
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#modul" role="tab" aria-selected="true"><span class="hidden-xs-down">Modul</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#trans" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Transaksi Modul</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#error" role="tab" aria-selected="false"><span class="hidden-xs-down">Pesan Error</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active mt-2" id="modul" role="tabpanel">
                                    <p style='font-size:9px;font-weight:bold;margin-bottom:0'><i>* Klik status untuk merubah status</i></p>
                                    <div class='col-xs-12' style='overflow-y: scroll; height:290px; margin:0px; padding:0px;'>
                                        <table class="table table-striped table-bordered table-condensed gridexample color-table primary-table" id="table-modul" width="100%">
                                        <style>
                                            th{
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">Status</th>
                                                <th width="20%">Modul</th>
                                                <th width="35%">Deskripsi</th>
                                                <th width="15%">Periode 1</th>
                                                <th width="15">Periode 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane  mt-2" id="trans" role="tabpanel">
                                    <p style='font-size:9px;font-weight:bold;margin-bottom:0'><i>* Klik status untuk merubah status</i></p>
                                    <div class='col-xs-12' style='overflow-y: scroll; height:290px; margin:0px; padding:0px;'>
                                        <table class="table table-striped table-bordered table-condensed gridexample color-table primary-table" id="table-jurnal" width="100%">
                                        <style>
                                            th{
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">Status</th>
                                                <th width="20%">No Bukti</th>
                                                <th width="20%">No Dokumen</th>
                                                <th width="15%">Tanggal</th>
                                                <th width="25">Keterangan</th>
                                                <th width="10">Form</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="error" role="tabpanel">
                                    <p id='error_space'></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>         
    <script>
    var $iconLoad = $('.preloader');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
     
    var t = $('#table-modul').DataTable({
        'ajax': {
            'url': "{{ url('saku/modultrans') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                return json.daftar;   
            }
        },
        'columns': [
            { data: 'no' },
            { data: 'status' },
            { data: 'modul' },
            { data: 'keterangan' },
            { data: 'per1' },
            { data: 'per2' }
        ],
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        },
        {'targets': 1, data: 'TRUE', 'defaultContent': 'TRUE',
            createdCell: function (td, cellData, rowData, row, col) {
                if ( cellData === 'TRUE' ) {
                    $(td).addClass('selected');
                }else{
                    $(td).removeClass('selected');
                }
                // console.log(cellData);
            } 
        }
         ],
        "order": [[ 2, 'asc' ]]
    });
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


    $('#table-modul tbody').on('click', 'td', function () {
        var cell = t.cell( this );
        if(cell.data() == 'TRUE'){
            var isi = 'FALSE';
            $(this).removeClass('selected');
        }else if(cell.data() == 'FALSE'){
            var isi = 'TRUE';
            $(this).addClass('selected');
        }
        cell.data(isi).draw();
        // alert('tes');
    });

    var tablejur = $('#table-jurnal').DataTable({
        'columns': [
            { data: 'no' },
            { data: 'status' },
            { data: 'no_bukti' },
            { data: 'no_dokumen' },
            { data: 'tanggal' },
            { data: 'keterangan' },
            { data: 'form' }
        ],
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "order": [[ 2, 'asc' ]]
    });
    
    tablejur.on( 'order.dt search.dt', function () {
        tablejur.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    }).draw();

    function activaTab(tab){
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    }

    $('#form-tambah').on('click', '#loadData', function(){
        var data = t.data();
        var formData = new FormData();
        
        var tempData = []; 
        var i=0;
        $.each( data, function( key, value ) {
            formData.append('modul[]',value.modul);
            formData.append('per1[]',value.per1);
            formData.append('per2[]',value.per2);
            formData.append('status[]',value.status);
        });
        $.ajax({
            type: 'POST',
            url: "{{ url('saku/loadJurnal') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                // alert(result.data.message);
                if(result.data.status){
                    tablejur.clear().draw();
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        tablejur.rows.add(result.data.data).draw(false);
                        activaTab("trans");
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    });

    $('#form-tambah').on('click', '#postAll', function(){
        tablejur.rows().every(function (index, element) {
            var row = tablejur.cell(index,1);
            row.data('POSTING').draw();
        });
    });

    $('#table-jurnal tbody').on('click', 'td', function () {

        var cell = tablejur.cell( this );
        if(cell.data() == 'POSTING'){
            $(this).removeClass('selected');
            var isi = 'INPROG';
        }else if(cell.data() == 'INPROG'){
            $(this).addClass('selected');
            var isi = 'POSTING';
        }
        cell.data(isi).draw();
        // alert('tes');
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        var data = tablejur.data();

        var tempData = []; 
        var i=0;
        var isAda = false

        $.each( data, function( key, value ) {
            formData.append('status[]',value.status);
            formData.append('no_bukti[]',value.no_bukti);
            formData.append('form[]',value.form);
            if(value.status == "POSTING"){
                isAda = true;
            }
        });
        

        if(data.length <= 0 || !isAda){
            alert("Transaksi tidak valid. Tidak ada transaksi dengan status POSTING.");
            return false;
        }else{

            $iconLoad.show();
            
            var url = "{{ url('/saku/posting') }}";
        
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
                    // alert('Input data '+result.message);
                    if(result.data.status){
                        // location.reload();
                        // dataTable.ajax.reload();
                        activaTab("trans");
                        $('#form-tambah #loadData').click();
                        Swal.fire(
                            'Great Job!',
                            'Your data has been saved',
                            'success'
                            )
                        $('#error_space').text('');
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: result.data.message
                        })
                        $('#error_space').text(result.data.message);
                        activaTab("error");
                    }
                    $iconLoad.hide();
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            $iconLoad.hide();        
        }
                
    });

    $('#tanggal,#deskripsi').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','deskripsi'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            // if(idx == 8){
            //     $('#'+nxt[idx])[0].selectize.focus();
            // }else{
                
                $('#'+nxt[idx]).focus();
            // }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    </script>