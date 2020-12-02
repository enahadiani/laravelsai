<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<div class="row" id="saku-datatable">
    <div class="col-12">
        <div class="card" >
            <div class="card-body pb-0" style="padding-top:1rem;min-height:68px">
                <div class="row">
                    <div class="col-md-6">
                        <h6 style="position:absolute;top:5px">Retur Pembelian</h6>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav nav-tabs col-12 nav-grid justify-content-end" role="tablist" style="padding-bottom:0;margin-top:1rem;border-bottom:none">
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-finish" role="tab" aria-selected="false"><span class="hidden-xs-down">Finish</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-new" role="tab" aria-selected="true"><span class="hidden-xs-down">New</span></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="separator mb-2"></div>
            <div class="tab-content tabcontent-border col-12 p-0">
                <div class="tab-pane active" id="data-new" role="tabpanel">
                    <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                        <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                        <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                            <div class="page-countdata">
                                <label>Menampilkan 
                                <select style="border:none" id="page-count">
                                    <option value="10">10 per halaman</option>
                                    <option value="25">25 per halaman</option>
                                    <option value="50">50 per halaman</option>
                                    <option value="100">100 per halaman</option>
                                </select>
                                </label>
                            </div>
                        </div>
                        <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                            <div class="input-group input-group-sm" style="width:321px;float:right">
                                <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;width:230px !important">
                                <div class="input-group-append" style="width:92px !important">
                                    <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;width:100%"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                        <div class="table-responsive ">
                            <table id="table-new" class="" style='width:100%'>
                                <thead>
                                    <tr>
                                    <th>No Pembelian</th>
                                    <th>Kode Vendor</th>
                                    <th>Tgl Beli</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="data-finish" role="tabpanel">
                    <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                        <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                        <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                            <div class="page-countdata">
                                <label>Menampilkan 
                                <select style="border:none" id="page-count2">
                                    <option value="10">10 per halaman</option>
                                    <option value="25">25 per halaman</option>
                                    <option value="50">50 per halaman</option>
                                    <option value="100">100 per halaman</option>
                                </select>
                                </label>
                            </div>
                        </div>
                        <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                            <div class="input-group input-group-sm" style="width:321px;float:right">
                                <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData2" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;width:230px !important">
                                <div class="input-group-append" style="width:92px !important">
                                    <span class="input-group-text" id="filter-btn2" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;width:100%"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter2" style="font-size: 8px !important;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                        <div class="table-responsive ">
                            <table id="table-finish" class="" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tgl</th>
                                        <th>No Dokumen</th>
                                        <th>Deskripsi</th>
                                        <th>Nilai</th>
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
</div>

<div class="container-fluid mt-3">
  <div id='saiweb_container'>
    <!-- <div id='web_datatable'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='card' style='border-top:none' >
              <div class='card-body'>
                <div class='row'>
                  <div class="col-md-6">
                  <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Retur Pembelian
                    </h4>
                  </div>
                  <div class='col-md-6'>
                    <ul class="nav nav-tabs customtab float-right" role="tablist">
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sai-tab-finish" role="tab" aria-selected="true"><span class="hidden-xs-down">Finish</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#sai-tab-new" role="tab" aria-selected="false"><span class="hidden-xs-down">New</span></a> </li>
                    </ul>
                  </div>
                  <div class='col-md-12'>
                    <div class="tab-content">
                      <div class="tab-pane active" id="sai-tab-new" style="position: relative;">
                          <div class='sai-container-overflow-x'>
                          <style>
                            th,td{
                                padding:8px !important;
                                vertical-align:middle !important;
                            }
                            .form-group{
                                margin-bottom:15px !important;
                            }
                            .hidden{
                                display:none;
                            }
                            .dataTables_wrapper{
                                padding:5px
                            }
                            </style>
                            <table class='table table-bordered table-striped DataTable' style='width: 100%;' id='table-new'>
                              <thead>
                                <tr>
                                  <td>No Pembelian</td>
                                  <td>Kode Vendor</td>
                                  <td>Tgl Beli</td>
                                  <td>Total</td>
                                  <td>Action</td>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                          </div>
                      </div>
                      <div class="tab-pane" id="sai-tab-finish" style="position: relative;">
                          <div class='sai-container-overflow-x'>
                              <table class='table table-bordered table-striped DataTable' style='width: 100%;' id='table-finish'>
                                  <thead>
                                    <tr>
                                      <td>No Bukti</td>
                                      <td>Tgl</td>
                                      <td>No Dokumen</td>
                                      <td>Deskripsi</td>
                                      <td>Nilai</td>
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
          </div>
        </div>
      </div>
    </div> -->
    <!-- FORM EDIT -->
    <!-- <form id='web_form_edit' >
      <div class='row'>
        <div class='col-md-12'>
          <div class='card'>
            <div class='card-body'>
              <div class='row'>
                <div class='col-md-1'>
                    <div class='logo text-center'><img src="{{url("asset_elite/images/sai_icon/logo.png")}}" width="40px" alt="homepage" class="light-logo" /><br/>
                        <img src="{{url("asset_elite/images/sai_icon/logo-text.png")}}" class="light-logo" alt="homepage" width="40px"/>
                    </div>
                </div>
                <div class='col-md-4'>
                  <div class='label-header'>
                       <h6>{{ date("Y-m-d H:i:s") }}</h6>
                  </div>
                </div>
                <div class='col-md-7'>
                  <button type='submit' class='btn btn-success float-right ml-1'><i class='fa fa-plus-circle'></i> Save</button>
                  <a class='btn btn-secondary float-right btn-form-exit web_form_back'><i class='fa fa-rotate-left'></i> Back</a>
                </div>
              </div>
            </div>
          </div>
          <div class='card box-warning'>
            <div class='card-body pad'>
                <div class='form-group row'>
                    <label class='control-label col-2'>Tanggal</label>
                    <div class="col-3">
                    <input type='date' name='tanggal' class='form-control' id='web_form_edit_tgl' value="{{date('Y-m-d')}}"> 
                    </div>
                    <label class='control-label col-2'>Periode</label>
                    <div class="col-3">
                    <input type='text' name='periode' class='form-control' maxlength='200' readonly id='web_form_edit_periode' value="{{date('Ym')}}" readonly> 
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='control-label col-2'>No Beli</label>
                    <div class="col-3">
                    <input type='text' name='no_beli' class='form-control' maxlength='200' readonly id='web_form_edit_no_beli'> 
                    </div>
                    <label class='control-label col-2'>Akun Hutang</label>
                    <div class="col-3">
                    <input type='text' name='akun_hutang' class='form-control' maxlength='200' readonly id='web_form_edit_akun_hutang'> 
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='control-label col-2'>Vendor</label>
                    <div class="col-3">
                    <input type='text' name='kode_vendor' class='form-control' readonly id='web_form_edit_kode_vendor'> 
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='control-label col-2'>Saldo</label>
                    <div class="col-3">
                    <input type='text' name='saldo' class='form-control currency' id='web_form_edit_saldo' readonly>
                    </div>
                    <label class='control-label col-2'>Total Retur</label>
                    <div class="col-3">
                    <input type='text' name='total_return' class='form-control currency' id='web_form_edit_total_return' readonly>       
                </div>
              <div class='col-md-12' style='padding:0'>
                <h6 class='pl-2'>Detail Return :</h6>
              </div>
              <div class='col-md-12' style='padding:0'>
                <table class="table table-striped table-bordered table-condensed gridexample" style='width: 100%;margin-bottom:150px' id="input-grid">
                  <thead>
                    <tr>
                      <th width='5%'>No</th>
                      <th width='20%'>Kode Barang</th>
                      <th width='15%'>Harga Beli</th>
                      <th width='10%'>Qty Beli</th>
                      <th width='10%'>Qty Retur</th>
                      <th width='30%'>Subtotal</th>
                      <th><button type="button" href="#" id="add-row" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
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
    </form> -->
  </div>
</div>

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{url('asset_elite/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_elite/jquery.formnavigation.js')}}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var $dtBrg = new Array();
    var $dtBrg2 = new Array();
    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit' class='web_datatable_edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
    
    var dataTable = generateTable(
        "table-new",
        "{{ url('esaku-trans/retur-beli-new') }}", 
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
            {   'targets': 3, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 4, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'vendor' },
            { data: 'tanggal' },
            { data: 'nilai1' }
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

    var dataTable2 = generateTable(
        "table-finish",
        "{{ url('esaku-trans/retur-beli-finish') }}", 
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
            {   'targets': [4], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
        ],
        [
            { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai1' }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[0 ,"desc"]]
    );

    $("#searchData2").on("keyup", function (event) {
        dataTable2.search($(this).val()).draw();
    });

    $("#page-count2").on("change", function (event) {
        var selText = $(this).val();
        dataTable2.page.len(parseInt(selText)).draw();
    });
    
    // END LIST DATA
    

    function getBarang(param,id){
        $.ajax({
            type: 'GET',
            url: "{{url('toko-trans/retur-beli-barang')}}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                console.log(result)    
                if(result.status){
                    var res = result.daftar;
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var select = $('.'+param).selectize();
                        console.log('.'+param);
                        select = select[0];
                        var control = select.selectize;
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:res[i].kode_barang + ' - ' + res[i].nama, value:res[i].kode_barang}]);
                            $dtBrg[res[i].kode_barang] = {harga:res[i].harga,jumlah:res[i].saldo,kode_akun:res[i].akun_pers};
                        }
                    }
                }
            }
        });
    }

    function setAkun(id){  
        if (id != ""){
            return $dtBrg[id].kode_akun;  
        }else{
            return "";
        }
    
    };   

    function setHarga(id){  
        if (id != ""){
            return parseFloat($dtBrg[id].harga).toFixed(0);  
        }else{
            return "";
        }
    
    };  
    function setJumlah(id){  
        if (id != ""){
            return parseFloat($dtBrg[id].jumlah).toFixed(0);  
        }else{
            return "";
        }
    
    };  

    function hitungTotal(){
        
        var total_brg = 0;
        $('.row-barang').each(function(){
            var qtyb = $(this).closest('tr').find('.inp-qtyretur').val();
            var hrgb = $(this).closest('tr').find('.inp-harga').val();
            //var todis= (toNilai(hrgb) * toNilai(disc)) / 100
            var subb = +toNilai(qtyb) * toNilai(hrgb);
            $(this).closest('tr').find('.inp-subb').val(toRp2(subb));
            total_brg += subb;
        });
        $('#web_form_edit_total_return').val(toRp2(total_brg));
        
    }  

    $('#saku-form').on('click', '.web_datatable_insert', function(){
        $('#saku-datatable').hide();
        $('#saku-form').show();
    });

    $('#web_form_edit').on('click', '#add-row', function(){
        
        var no=$('#input-grid tbody .row-barang:last').index();
        no=no+2;
        var input = "<tr class='row-barang'>";
        input += "<td width='5%' class='no-barang'>"+no+"</td>";
        input += "<td width='40%'><select name='kode_barang[]' class='form-control inp-kode ke"+no+"' value='' required></select></td>";
        input += "<td width='10%'><input type='text' class='form-control inp-harga' name='harga[]' readonly ></td>";
        input += "<td width='10%'><input type='text' class='form-control inp-qtybeli' name='qty_beli[]' readonly ><input type='hidden' class='form-control inp-akun' name='kode_akun[]' readonly ></td>";
        input += "<td width='10%'><input type='text' class='form-control inp-qtyretur' name='qty_retur[]'  ><input type='text' class='form-control inp-satuanretur hidden' name='satuan[]' value='-'></td>";
        input += "<td width='20%'><input type='text' class='form-control inp-subb' name='subtotal[]' ></td>";
        input += "<td width='5%'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
        input += "</tr>";
        
        $('#input-grid tbody').append(input);
        var id=$('#web_form_edit_no_beli').val();
        getBarang('ke'+no,id);
        $('#input-grid tbody tr:last').find('.inp-kode')[0].selectize.focus();
        $('.inp-kode').change(function(e){
            var x= $(this).val();
            $(this).closest('tr').find('.inp-harga').val(setHarga(x));
            $(this).closest('tr').find('.inp-qtybeli').val(setJumlah(x));
            $(this).closest('tr').find('.inp-akun').val(setAkun(x));
            hitungTotal();
        });
        
        $('.inp-qtyretur,.inp-subb').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
    });

    $('#saku-form').on('click', '.web_form_back', function(){
        $('#saku-form').hide();
        $('#saku-datatable').show();
    });

    $('#saku-datatable').on('click', '.web_datatable_edit', function(){
        var kode = $(this).closest('tr').find('td:eq(0)').text();
        $.ajax({
            type: 'GET',
            url: "{{url('toko-trans/retur-beli-detail')}}/"+kode,
            dataType: 'json',
            async:false,
            success:function(result){
                $('#id').val(kode);
                var res = result.data.data;
                if(result.data.status){
                    $('#web_form_edit_no_beli').val(res[0].no_bukti);
                    $('#web_form_edit_kode_vendor').val(res[0].vendor);
                    $('#web_form_edit_akun_hutang').val(res[0].akun_hutang);
                    $('#web_form_edit_saldo').val(toRp2(res[0].saldo));  
                    $('#web_form_edit_totret').val(toRp2(res[0].total_return)); 
                    $('#web_datatable').hide();
                    $('#web_form_edit').show();
                    
                    no=1;
                    var input = "";
                    input += "<tr class='row-barang'>";
                    input += "<td width='5%' class='no-barang'>"+no+"</td>";
                    input += "<td width='40%'><select name='kode_barang[]' class='form-control inp-kode ke"+no+"' value='' required></select></td>";
                    input += "<td width='10%'><input type='text' class='form-control inp-harga' name='harga[]' readonly ></td>";
                    input += "<td width='10%'><input type='text' class='form-control inp-qtybeli' name='qty_beli[]' readonly ><input type='hidden' class='form-control inp-akun' name='kode_akun[]' readonly ></td>";
                    input += "<td width='10%'><input type='text' class='form-control inp-qtyretur' name='qty_retur[]'  ><input type='text' class='form-control inp-satuanretur hidden' name='satuan[]' value='-'></td>";
                    input += "<td width='20%'><input type='text' class='form-control inp-subb' name='subtotal[]'  ></td>";
                    input += "<td width='5%'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
                    input += "</tr>";
                    $('#input-grid tbody').html(input);
                    getBarang('ke'+no,res[0].no_bukti);
                    $('#input-grid tbody tr:last').find('.inp-kode')[0].selectize.focus();
                    $('.inp-kode').change(function(e){
                        var x= $(this).val();
                        $(this).closest('tr').find('.inp-harga').val(setHarga(x));
                        $(this).closest('tr').find('.inp-qtybeli').val(setJumlah(x));
                        $(this).closest('tr').find('.inp-akun').val(setAkun(x));
                        hitungTotal();
                    });
                    $('.inp-qtyretur,.inp-subb,.inp-harga,.inp-qtybeli').inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () { self.Value(''); }
                    });
                    $('.gridexample').formNavigation();
                    
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:');
            }
        });

    });
    
    $('#saku-form').on('submit', '#web_form_edit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        
        var isAda = false;
        $('.row-barang').each(function(){
            var qtyret = $(this).closest('tr').find('.inp-qtyretur').val();
            var qtybeli = $(this).closest('tr').find('.inp-qtybeli').val();
            if(toNilai(qtyret) > toNilai(qtybeli)){
                isAda = true;
            }
        });
        
        if(!isAda){
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
            $.ajax({
                type: 'POST',
                url: "{{url('toko-trans/retur-beli')}}",
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    alert('Input data '+result.data.message);
                    if(result.data.status){
                        // location.reload();
                        dataTable.ajax.reload();
                        dataTable2.ajax.reload();
                        $('#web_datatable').show();
                        $('#web_form_edit').hide();
                    }
                }
            });
        }else{
            alert('Error!. Jumlah barang yang diretur lebih besar dari jumlah beli');
        }
    });
    
    $(':input[type="number"], .currency').on('keydown', function (e){
        var value = String.fromCharCode(e.which) || e.key;
        
        if (    !/[0-9\.]/.test(value) //angka dan titik
        && e.which != 190 // .
        && e.which != 116 // F5
        && e.which != 8   // backspace
        && e.which != 9   // tab
        && e.which != 13   // enter
        && e.which != 46  // delete
        && (e.which < 37 || e.which > 40) // arah 
        && (e.keyCode < 96 || e.keyCode > 105) // dan angka dari numpad
        ){
            e.preventDefault();
            return false;
        }
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-barang').each(function(){
            var nom = $(this).closest('tr').find('.no-barang');
            nom.html(no);
            no++;
        });
        hitungTotal();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    
    $('#web_form_edit').on('change', '.inp-qtyretur,.inp-subb', function(e){
        e.preventDefault();
        var qty = $(this).closest('tr').find('.inp-qtyretur').val();
        var harga = $(this).closest('tr').find('.inp-harga').val();
        // alert(qty+'-'+harga);
        hitungTotal();
    });

    $('#web_form_edit').on('change', '#web_form_edit_tgl', function(e){
        e.preventDefault();
        var tgl = $('#web_form_edit_tgl').val();
        var periode = tgl.substr(0,4)+''+tgl.substr(5,2);
        // alert(qty+'-'+harga);
        $('#web_form_edit_periode').val(periode);
    });

       
</script>