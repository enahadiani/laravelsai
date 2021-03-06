<div class="container-fluid mt-3">
    <div id='saiweb_container'>
        <div id='web_datatable'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card' >
                        <div class='card-body sai-container-overflow-x'>
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Daftar Pembelian 
                            </h4>
                            <style>
                            th,td{
                                padding:8px !important;
                                vertical-align:middle !important;
                            }
                            .form-group{
                                margin-bottom:15px !important;
                            }
                            
                            .dataTables_wrapper{
                                padding:5px
                            }
                            </style>
                            <table class='table table-bordered table-striped DataTable' id='table-konten' style='width:100%'>
                                <thead>
                                    <tr>
                                        <td>No Pembelian</td>
                                        <td>Nik Kasir</td>
                                        <td>Tanggal</td>
                                        <td>Kode Vendor</td>
                                        <td>Total</td>
                                        <td>Action</td>
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
        <form class="form" id="web_form_edit" method='POST'>
            <div class="row" >
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class='row'>
                                <div class='col-md-4'>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <div class='logo text-center'>
                                            <img src="{{url("asset_elite/images/sai_icon/logo.png")}}" width="40px" alt="homepage" class="light-logo" /><br/>
                                            <img src="{{url("asset_elite/images/sai_icon/logo-text.png")}}" class="light-logo" alt="homepage" width="40px"/>
                                            </div>
                                        </div>
                                        <div class='col-md-8'>
                                            <div class='label-header'>
                                                <h6>{{ date("Y-m-d H:i:s") }}</h6>
                                                <h6 style="color:#007AFF"><i class='fa fa-user'></i> <span id="iniNIK"></span></h6>
                                                <h6 id='iniNoBukti'></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-3 text-right'>
                                    <h5>Nilai Transaksi </h5>
                                    <div class='row  float-right'>
                                        <div class="text-left" id='edit-qty' style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px">
                                            <img style="width:30px;height:30px;position:absolute" src="{{url("asset_elite/img/edit.png")}}">
                                            <h6 style="font-size: 10px;padding-left: 35px;margin-bottom: 0;margin-top: 5px;text-align:center">Edit Qty</h6>
                                            <h6 style="font-size: 9px;padding-left: 35px;text-align:center">F7</h6></div>
                                        </div>
                                        <!-- <button type='button' id='btn-delete' class='btn btn-success float-right mr-3'><i class='fa fa-trash'></i></button> -->
                                        <a class='btn btn-secondary float-right btn-form-exit mr-3 web_form_back'><i class='fas fa-arrow-left'></i> Back</a>
                                    </div>
                                    <div class='col-md-5'>
                                        <h3><input type='text' style='font-size: 40px;'  name="total_stlh" min="1" class='form-control currency' id='tostlh' required readonly></h3>
                                    </div>
                                    <div class='col-md-12'>
                                        <table class='table' style='margin-bottom: 5px'>
                                            <tr>
                                                <td style='padding: 3px;width:25%' colspan='2'>
                                                    <input type='text' class='form-control' placeholder="Barcode [F1]" id="kd-barang2" >
                                                    <input type='hidden' id="id" >
                                                    <input type="hidden" id="method" name="_method" value="put">
                                                </td>
                                                <td style='padding: 3px;width:25%' colspan='2'>
                                                    <select class='form-control' id="kd-barang">
                                                    <option value=''>--- Pilih Barang [CTRL+C] ---</option>
                                                    </select>
                                                </td>
                                                <th style='padding: 3px;width:25%'>
                                                    <select class='form-control' id="kode_vendor" name='kode_vendor' required >
                                                    <option value=''>--- Pilih Vendor ---</option>
                                                    </select>
                                                </th>
                                                <th style='padding: 3px;width:5%'>Total</th>
                                                <th style='padding: 3px;width:20%'><input type='text' name="total_trans" min="1" class='form-control currency' id='totrans' required readonly></th>
                                                <td style='padding: 0px;'><input type='hidden' class='form-control currency' id="hrg-barang" readonly></td>
                                                <td style='padding: 0px;'><input type='hidden' min='1' step='1' class='form-control currency' id="qty-barang"></td>
                                                <td style='padding: 0px;'><input type='hidden' min='1' step='1' class='form-control currency' placeholder='disc%' id="disc-barang"></td>
                                                <td style='padding: 0px;display:none'><a class='btn btn-warning pull-right' id='tambah-barang'><i class='fa fa-plus'></i> Tambah</a></td>
                                            </tr>
                                        </table>
                                        <div class='col-xs-12' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                            <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Barang</th>
                                                    <th>Harga Sebelum</th>
                                                    <th>Harga</th>
                                                    <th>Satuan</th>
                                                    <th>Qty</th>
                                                    <th>Disc</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-7 mt-2'>
                                                <div class='form-group row'>
                                                    <label for="judul" class="col-1 col-form-label" style="font-size:16px;padding-right:0">Disc.</label>
                                                    <div class="col-5">
                                                        <input type="text" name="total_disk" min="1" class='form-control currency' id='todisk' required value="0">
                                                    </div>
                                                    <label for="judul" class="col-1 col-form-label" style="font-size:16px;padding-right:0">PPN</label>
                                                    <div class="col-5">
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="total_ppn" min="1" class='form-control currency' id='toppn' required value="0">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-info" id="getPPN" type="button"><i class="mdi mdi-sync"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-md-5 mt-2'>
                                                <div class='form-group row float-right'>
                                                    <label for="judul" class="col-3 col-form-label" style="font-size:16px">No Faktur</label>
                                                        <div class="col-6">
                                                            <input type="text" name="no_faktur" class='form-control ' id='no_faktur' required>
                                                        </div>
                                                        <div class='col-3' style='padding-left:0'>
                                                            <button class='btn btn-info' style='padding:8px' type="submit" id='btnBayar'><i class="fa fa-save"></i> Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- FORM EDIT MODAL -->
<div class='modal' id='modal-edit' tabindex='-1' role='dialog'>
    <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <form id='form-edit-barang'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Edit Barang</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class="form-group row mt-40">
                            <label for="judul" class="col-3 col-form-label">Barang</label>
                            <div class="col-9">
                                <select class='form-control' id='modal-edit-kode' readonly>
                                    <option value=''>--- Pilih Barang ---</option>
                                </select>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Harga Sebelum</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' readonly maxlength='100' id='modal-edit-harga_seb'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Harga</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' readonly maxlength='100' id='modal-edit-harga'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Disc</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' maxlength='100' id='modal-edit-disc' >
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Qty</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency ' maxlength='100' id='modal-edit-qty'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Subtotal</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency ' maxlength='100' id='modal-edit-subb'>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' id='edit-submit' class='btn btn-primary'>Simpan</button> 
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    </div>
                </form>
            </div>
    </div>
</div>
<!-- FORM MODAL BAYAR 2-->
<div class="modal" id="modal-bayar2" tabindex="-1" role="dialog" aria-modal="true">
    <div role="document" style="" class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px !important;">
            <div class="modal-header " style="display:block">
                <div class="row text-center" style="">
                    <div class="col-md-12">
                        <h5 class="">Total Transaksi</h5>
                        <h1 class="text-info" id="modal-toakhir">12.500</h1>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row mb-2" style="">
                    <div class="col-6" style="">
                    Total Pembelian
                    </div>
                    <div class="col-6 text-right" id="modal-totrans">
                    </div>
                </div>
                <div class="row mb-2">
                <div class="col-6">
                    Diskon 
                    </div>
                    <div class="col-6 text-right" id="modal-diskon">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                    PPN 
                    </div>
                    <div class="col-6 text-right" id="modal-ppn">
                    </div>
                </div>
                <div id="modal-nobukti" hidden></div>
            </div>
            <div class="modal-footer" style="padding: 0;">
            <button id="cetakBtn" type="button" class="btn btn-info btn-block" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">Cetak</button>
            </div>
        </div>
    </div>
</div>
<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{url('asset_elite/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_elite/jquery.formnavigation.js')}}"></script>
<script>
$(document).ready(function(){
    var $submitBtn = false;
    var $dtBrg = new Array();
    var $dtBrg2 = new Array();
    $('#web_form_edit').hide();

    $('#kd-barang').selectize({
        // theme: 'links',
        selectOnTab:true,
        maxItems: 1,
        valueField: 'kd_barang',
        labelField: 'nama',
        searchField: ['kd_barang','nama','barcode'],
        options: [
            {kd_barang: 123456, nama: 'test', barcode: '200'},
        ],
        render: {
            option: function(data, escape) {
                return '<div class="option">' +
                '<span class="nama">' + escape(data.nama) + '</span>' +
                '</div>';
            },
            item: function(data, escape) {
                return '<div class="item"><a href="#">' + escape(data.nama) + '</a></div>';
            }
        },
        create:false,
        onChange: function (val){
            // $('#kd-barang').val(value);
            var id = val
            if (id != "" && id != null && id != undefined){
                addBarang(id);
                // alert(id);
            }
        }
    });

    function getBarang(){
        $.ajax({
            type: 'GET',
            url: "{{url('toko-trans/pembelian-barang')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status) {
                    var res = result.daftar.data;
                    var select = $('#modal-edit-kode').selectize();
                    select = select[0];
                    var control = select.selectize;

                    var select2 = $('#kd-barang').selectize();
                    select2 = select2[0];
                    var control2 = select2.selectize;
                    control2.clearOptions();

                    for(i=0;i<res.length;i++){
                        control.addOption([{text:res[i].kode_barang + ' - ' + res[i].nama, value:res[i].kode_barang}]);
                        control2.addOption([{kd_barang:res[i].kode_barang, nama:res[i].nama,barcode:res[i].barcode}]);
                        $dtBrg[res[i].kode_barang] = {harga:res[i].harga_seb,satuan:res[i].satuan,kode_akun:res[i].kode_akun,saldo:res[i].saldo,hrgjual:res[i].harga};  
                        $dtBrg2[res[i].barcode] = {harga:res[i].harga_seb,nama:res[i].nama,kd_barang:res[i].kode_barang,satuan:res[i].satuan,kode_akun:res[i].kode_akun,saldo:res[i].saldo,hrgjual:res[i].harga};
                    }

                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('toko-auth/login') }}";
                    })
                } else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
            }
        });
    }
    
    function getVendor(){
        $.ajax({
            type: 'GET',
            url: "{{url('toko-master/vendor')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var select = $('#kode_vendor').selectize();
                        select = select[0];
                        var control = select.selectize;
                        control.clearOptions();
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_vendor + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_vendor}]);
                        }
                        
                    }
                }
            }
        });
    }
    
    getBarang();
    getVendor();
    
    function sepNum(x){
        var num = parseFloat(x).toFixed(0);
        var parts = num.toString().split(".");
        var len = num.toString().length;
        // parts[1] = parts[1]/(Math.pow(10, len));
        parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
        return parts.join(",");
    }
    
    function toRp(num){
        if(num < 0){
            return "("+sepNum(num * -1)+")";
        }else{
            return sepNum(num);
        }
    }
    
    function toNilai(str_num){
        var parts = str_num.split('.');
        number = parts.join('');
        number = number.replace('Rp', '');
        // number = number.replace(',', '.');
        return +number;
    }
    
    function setHarga2(id){
        if (id != ""){
            return $dtBrg[id].harga;  
        }else{
            return "";
        }
        
    };  
    function setHarga3(id){
        if (id != ""){
            return $dtBrg2[id].harga;  
        }else{
            return "";
        }
        
    };  
    function setNama(id){
        if (id != ""){
            return $dtBrg2[id].nama;  
        }else{
            return "";
        }
        
    };  
    function setSatuan(id){  
        if (id != ""){
            return $dtBrg[id].satuan;  
        }else{
            return "";
        }
        
    }; 
    function setAkun(id){  
        if (id != ""){
            return $dtBrg[id].kode_akun;  
        }else{
            return "";
        }
        
    };   
    function getKode(id){ 
        if (id != ""){
            return $dtBrg2[id].kd_barang;  
        }else{
            return "";
        }
        
    };  


    var action_html = "<a href='#' title='Edit' class='badge badge-info web_datatable_edit' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger web_datatable_del' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-konten').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('toko-trans/pembelian') }}",
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
            {'targets': 5, data: null, 'defaultContent': action_html },
            {'targets': 4,
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' )
            }
        ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'nik_user' },
            { data: 'tanggal',  render: function(data,type,row){
                var split = data.split('-');
                var tgl = split[2];
                var bln = split[1];
                var tahun = split[0];
                return tgl+"/"+bln+"/"+tahun;
            } },
            { data: 'kode_vendor' },
            { data: 'total' },
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

    $('#web_form_insert').hide();
    $('#web_form_edit').hide();

    $('#saiweb_container').on('click', '.web_datatable_insert', function(){
      $('#web_datatable').hide();
      $('#web_form_insert').show();
      // alert("hello");
    });

    $('#saiweb_container').on('click', '.web_form_back', function(){
        var id = $(this).closest('form').attr('id');
        $('#'+id).hide();
        $('#web_datatable').show();
    });

    $('#saiweb_container').on('click', '.web_datatable_edit', function(){
        var kode = $(this).closest('tr').find('td:eq(0)').text();
        $.ajax({
            type: 'GET',
            url: "{{url('toko-trans/pembelian-detail')}}/"+kode,
            dataType: 'json',
            success:function(result){
                $('#id').val(kode);
                if(result.data.status){
                    var res = result.data;
                    $('#iniNoBukti').html(res.data[0].no_bukti+"<input type='hidden' value='"+res.data[0].no_bukti+"' name='no_beli' class='form-control' maxlength='200' readonly id='web_form_edit_no_beli'>");
                    $('#iniNIK').html(res.data[0].nik_user+"<input type='hidden' value='"+res.data[0].nik_user+"' name='nik_kasir' class='form-control' maxlength='200' readonly id='web_form_edit_nik'>");
                    $('#totrans').val(toRp(res.data[0].total));    
                    $('#todisk').val(toRp(res.data[0].diskon));    
                    $('#toppn').val(toRp(res.data[0].ppn));    
                    $('#no_faktur').val(res.data[0].no_dokumen);    
                    $('#kode_vendor')[0].selectize.setValue(res.data[0].kode_vendor);
                    var input=``;
                    var no=1;
                    if(res.data_detail.length>0){
                        for(var x=0;x<res.data_detail.length;x++){
                            var line = res.data_detail[x];
                            input += "<tr class='row-barang'>";
                            input += "<td width='5%' class='no-barang' style='text-align:center'>"+no+"</td>";
                            input += "<td width='20%'>"+line.nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+line.kode_barang+"' readonly required></td>";
                            input += "<td width='10%' style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+toRp(line.hrg_seb)+"' readonly required></td>";
                            input += "<td width='15%' style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+toRp(line.harga)+"' readonly required></td>";
                            input += "<td width='5%' style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+line.satuan+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(line.kode_barang)+"' readonly></td>";
                            input += "<td width='15%' style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+line.jumlah+"' required></td>";
                            input += "<td width='10%' style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control '  value='"+line.diskon+"' readonly required></td>";
                            input += "<td width='15%' style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency2'  value='"+line.subtotal+"' required></td>";
                            input += "<td width='10%'></a><a class='btn btn-primary btn-sm ubah-barang' style='font-size:8px'><i class='fas fa-pencil-alt fa-1'></i></a>&nbsp;<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
                            input += "</tr>";
                            
                            no++;
                        }
                    }
                     
                    $("#input-grid2 tbody").html(input);
                    $('.inp-qtyb,.inp-subb,.inp-disc').inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () { self.Value(''); }
                    });
                    
                    hitungTotal();
                }
                $('.gridexample').formNavigation();
                $('#web_datatable').hide();
                $('#web_form_edit').show();
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:');
            }
        });
    });


    $('#saiweb_container').on('click', '.web_datatable_del', function(){
        if(confirm('Apakah anda ingin menghapus data ini?')){
            var kode = $(this).closest('tr').find('td:eq(0)').text();         
            
            $.ajax({
                type: 'DELETE',
                url: "{{url('toko-trans/pembelian')}}/"+kode,
                dataType: 'json',
                success:function(result){
                    alert('Penghapusan data '+result.data.message);
                    if(result.data.status){
                        dataTable.ajax.reload();
                    }
                }
            });
        }else{
            return false;
        }
        
    });
      
    $('#web_form_edit').on('click', '#btn-delete', function(){
        if(confirm('Apakah anda ingin menghapus data ini?')){
            var kode = $('#web_form_edit_no_beli').val();
            
            $.ajax({
                type: 'DELETE',
                url: '',
                dataType: 'json',
                success:function(result){
                    alert('Penghapusan data '+result.message);
                    if(result.status){
                        dataTable.ajax.reload();
                        $('#web_datatable').show();
                        $('#web_form_edit').hide();
                    }
                }
            });
        }else{
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
    
    
    function hitungKembali(){
        
        var total_stlh = toNilai($('#tostlh').val());
        var total_bayar = toNilai($('#tobyr').val());
        
        if(total_bayar > 0 ){
            kembalian = +total_bayar - +total_stlh; 
            if(kembalian < 0) kembalian = 0;  
            $("#kembalian").val(toRp(kembalian));
        }
        
    }
    
    function getPPN(){
        
        var todisk = toNilai($('#todisk').val());
        var totrans = toNilai($('#totrans').val());
        var total = totrans - todisk;
        var ppn = (total * 10)/100;
        $("#toppn").val(toRp(ppn));
        var total2 = total+ppn;
        $("#tostlh").val(toRp(total2));
        
    }
    
    function hitungDisc(){
        
        var total_trans = toNilai($('#totrans').val());
        var total_disk= toNilai($('#todisk').val());
        var total_stlh = +total_trans - +total_disk;
        
        $('#tostlh').val(toRp(total_stlh));
    }
    
    function hitungTotal(){
        
        // hitung total barang
        if($('#todisk').val() == ""){
            
            $('#todisk').val(0);
        }
        var total_brg = 0;
        $('.row-barang').each(function(){
            var qtyb = $(this).closest('tr').find('.inp-qtyb').val();
            var hrgb = $(this).closest('tr').find('.inp-hrgb').val();
            var disc = $(this).closest('tr').find('.inp-disc').val();
            
            var subb = $(this).closest('tr').find('.inp-subb').val();
            //var todis= (toNilai(hrgb) * toNilai(disc)) / 100
            // var subb = (+qtyb * toNilai(hrgb)) - disc;
            
            var hrg = toNilai(subb)/toNilai(qtyb);
            // $(this).closest('tr').find('.inp-subb').val(toRp(subb));
            $(this).closest('tr').find('.inp-hrgb').val(toRp(hrg));
            total_brg += +toNilai(subb);
        });
        $('#totrans').val(toRp(total_brg));
        
        var total_disk= toNilai($('#todisk').val());
        var total_stlh = +total_brg - +total_disk;
        var total_ppn = toNilai($('#toppn').val());
        var total = total_stlh + total_ppn; 
        $('#tostlh').val(toRp(total));
        
    }
    var count= 0;
    
    $('#modal-edit-kode').selectize({
        selectOnTab: true,
        onChange: function (){
            var id = $('#modal-edit-kode').val();
            // setHarga(id);
        }
    });
    
     function setHarga(id) {
        if(id == '' || id == null){
            $('#qty-barang').val('');
            $('#hrg-barang').val('');
        }else{
            $.ajax({
                url:"{{url('toko-trans/pembelian-barang')}}",
                type:'GET',
                dataType:'json',
                async:false,
                success: function(result) {
                    console.log(result)
                }
            });
        }
    }
    
    function hapusBarang(rowindex){
        $("#input-grid2 tbody tr:eq("+rowindex+")").remove();
        no=1;
        $('.row-barang').each(function(){
            var nom = $(this).closest('tr').find('.no-barang');
            nom.html(no);
            no++;
        });
        hitungTotal();
    }

    function ubahBarang(rowindex){
        $('.row-barang').removeClass('set-selected');
        $("#input-grid2 tbody tr:eq("+rowindex+")").addClass('set-selected');
        
        var kd = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-kdb').val();
        var qty = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-qtyb').val();
        var harga = toNilai($("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-hrgb').val());  
        var harga_seb = toNilai($("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-hrgseb').val());    
        var disc = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-disc').val();
        var subb = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-subb').val();
        
        $('#modal-edit-kode')[0].selectize.setValue(kd);
        $('#modal-edit-kode').val(kd);
        $('#modal-edit-qty').val(qty);
        $('#modal-edit-harga').val(harga);
        $('#modal-edit-harga_seb').val(harga_seb);
        $('#modal-edit-disc').val(disc);
        $('#modal-edit-subb').val(subb);
        
        $('#modal-edit').modal('show');
        var selectKode = $('#modal-edit-kode').data('selectize');
        selectKode.disable();
        
    }

    $('#edit-submit').click(function(e){
        e.preventDefault();
        
        // var hrg = toNilai($('#modal-edit-harga').val());
        var hrg_seb = toNilai($('#modal-edit-harga_seb').val());
        var qty = toNilai($('#modal-edit-qty').val());
        var disc = toNilai($('#modal-edit-disc').val());
        var kd = $('#modal-edit-kode option:selected').val();
        var nama = $('#modal-edit-kode option:selected').text();
        //var todis= (hrg * disc) / 100
        // var sub = (+qty * +hrg) - disc;
        var sub = toNilai($('#modal-edit-subb').val());
        var hrg = sub/qty;
        
        var no = $(".set-selected").closest('tr').find('.no-barang').text();
        var input="";
        // input = "<tr class='row-barang'>";
        input += "<td width='5%' style='text-align:center' class='no-barang'>"+no+"</td>";
        input += "<td width='20%'>"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
        input += "<td width='15%' style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+toRp(hrg_seb)+"' readonly required></td>";
        input += "<td width='15%' style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
        input += "<td width='5%' style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+setSatuan(kd)+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(kd)+"' readonly></td>";
        input += "<td width='15%' style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+qty+"' required></td>";
        input += "<td width='10%' style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control currency'  value='"+disc+"' readonly required></td>";
        input += "<td width='15%' style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency'  value='"+sub+"'  required></td>";
        input += "<td width='10%'></a><a class='btn btn-primary btn-sm ubah-barang' style='font-size:8px'><i class='fas fa-pencil-alt fa-1'></i></a>&nbsp;<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
        // input += "</tr>";
        
        
        // $('.set-selected').closest('tr').remove();
        // $('.set-selected').closest('tr').append(input);
        
        $(".set-selected").closest('tr').text('');
        $(".set-selected").closest('tr').append(input);
        
        // $("#input-grid2").append(input);
        $('.inp-qtyb,.inp-subb,.inp-disc').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        hitungTotal();
        $('.gridexample').formNavigation();
        $('#modal-edit').modal('hide');
        
        
    });

    function addBarang(id=null){
        
        var kd1 = $('#kd-barang')[0].selectize.getValue();
        // var kd1 = id;
        var qty1 = 1;
        var disc1 = 0;
        var hrg1 = setHarga2(kd1);
        // || +qty1 <= 0 || +hrg1 <= 0
        if(kd1 == ''){
            alert('Masukkan data barang yang valid');
        }else{
            var kd = $('#kd-barang option:selected').val();
            var nama = $('#kd-barang option:selected').text();
            var qty = qty1;
            var hrg_seb = hrg1;
            
            var hrg = 0;
            var disc = disc1;
            // var todis= (hrg * disc) / 100
            // var sub = (+qty * +hrg) - disc;
            var sub = 0;
            // var sub = +qty * +hrg;
            
            // cek barang sama
            $('.row-barang').each(function(){
                var kd_temp = $(this).closest('tr').find('.inp-kdb').val();
                var qty_temp = $(this).closest('tr').find('.inp-qtyb').val();
                var hrg_temp = $(this).closest('tr').find('.inp-hrgb').val();
                var disc_temp = $(this).closest('tr').find('.inp-disc').val();
                
                var subb_temp = $(this).closest('tr').find('.inp-subb').val();
                if(kd_temp == kd){
                    qty+=+(toNilai(qty_temp));
                    // hrg+=+(toNilai(hrg_temp));
                    disc+=+(toNilai(disc_temp));
                    //todis+=+(hrg*toNilai(disc_temp))/100;
                    // sub=(hrg*qty)-disc;
                    sub+=+(toNilai(subb_temp));
                    $(this).closest('tr').remove();
                }
            });
            var no = $('#input-grid2 tr:last').index()+2;
            
            var input = "<tr class='row-barang'>";
            input += "<td width='5%' style='text-align:center' class='no-barang'>"+no+"</td>";
            input += "<td width='20%'>"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
            input += "<td width='10%' style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+toRp(hrg_seb)+"' readonly required></td>";
            input += "<td width='15%' style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
            input += "<td width='5%' style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+setSatuan(kd)+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(kd)+"' readonly></td>";
            input += "<td width='15%' style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+qty+"' required></td>";
            input += "<td width='10%' style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control '  value='"+disc+"' readonly required></td>";
            input += "<td width='15%' style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency2'  value='"+sub+"' required></td>";
            input += "<td width='10%'></a><a class='btn btn-primary btn-sm ubah-barang' style='font-size:8px'><i class='fas fa-pencil-alt fa-1'></i></a>&nbsp;<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
            input += "</tr>";
            
            $("#input-grid2").append(input);
            $('.inp-qtyb,.inp-subb,.inp-disc').inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                oncleared: function () { self.Value(''); }
            });
            
            hitungTotal();
            
            // $('#kd-barang').val('');
            $('#kd-barang')[0].selectize.setValue('');
            // $('#qty-barang').val('');
            // $('#disc-barang').val('');
            // $('#hrg-barang').val('');
            $("#input-grid2 tr:last").focus();
            $('.gridexample').formNavigation();
            // $('#kd-barang-selectized').focus();
        }
    }

    function addBarang2(){
        
        var kd1 = $('#kd-barang2').val();
        var qty1 = 1;
        var disc1 = 0;
        var hrg1 = setHarga3(kd1);
        var kd=getKode(kd1);
        var nama = kd+"-"+setNama(kd1);
        // || +qty1 <= 0 || +hrg1 <= 0
        if(kd1 == '' ){
            alert('Masukkan data barang yang valid');
        }else{
            // var kd = $('#kd-barang2').val();
            
            // var nama = $('#kd-barang option:selected').text();
            var qty = qty1;
            var hrg_seb = hrg1;
            var hrg=0;
            var disc = disc1;
            // var todis= (hrg * disc) / 100
            // var sub = (+qty * +hrg) - disc;
            var sub=0;
            // var sub = +qty * +hrg;
            
            // cek barang sama
            $('.row-barang').each(function(){
                var kd_temp = $(this).closest('tr').find('.inp-kdb').val();
                var qty_temp = $(this).closest('tr').find('.inp-qtyb').val();
                var hrg_temp = $(this).closest('tr').find('.inp-hrgb').val();
                var disc_temp = $(this).closest('tr').find('.inp-disc').val();
                var subb_temp = $(this).closest('tr').find('.inp-subb').val();
                if(kd_temp == kd){
                    qty+=+(toNilai(qty_temp));
                    // hrg+=+(toNilai(hrg_temp));
                    disc+=+(toNilai(disc_temp));
                    sub+=+(toNilai(subb_temp));
                    //todis+=+(hrg*toNilai(disc_temp))/100;
                    // sub=(hrg*qty)-disc;
                    $(this).closest('tr').remove();
                }
            });

            var no = $('#input-grid2 tr:last').index()+2;
            
            var input = "<tr class='row-barang'>";
            input += "<td width='5%' style='text-align:center' class='no-barang'>"+no+"</td>";
            input += "<td width='20%'>"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
            input += "<td width='10%' style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+toRp(hrg_seb)+"' readonly required></td>";
            input += "<td width='15%' style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
            input += "<td width='5%' style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+setSatuan(kd)+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(kd)+"' readonly></td>";
            input += "<td width='15%' style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+qty+"' required></td>";
            input += "<td width='10%' style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control currency'  value='"+disc+"' readonly required></td>";
            input += "<td width='15%' style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency'  value='"+sub+"' required></td>";
            input += "<td width='10%'></a><a class='btn btn-primary btn-sm ubah-barang' style='font-size:8px'><i class='fas fa-pencil-alt fa-1'></i></a>&nbsp;<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
            input += "</tr>";
            
            $("#input-grid2").append(input);
            
            $('.inp-qtyb,.inp-subb,.inp-disc').inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                oncleared: function () { self.Value(''); }
            });
            hitungTotal();
            
            $('#kd-barang2').val('');
            $("#input-grid2 tr:last").focus();
            $('#kd-barang2').focus();
            $('.gridexample').formNavigation();
        }
    }
    
    $("#input-grid2").on("dblclick", '.row-barang',function(){
        // get clicked index
        var index = $(this).closest('tr').index();
        ubahBarang(index);
    });

    $("#input-grid2").on("click", '.ubah-barang', function(){
        // get clicked index
        var index = $(this).closest('tr').index();
        ubahBarang(index);
    });

    $("#input-grid2").on("click", '.hapus-item', function(){
        // get clicked index
        var index = $(this).closest('tr').index();
        hapusBarang(index);
    });

    $('#qty-barang').keydown(function(e){
        var value = String.fromCharCode(e.which) || e.key;
        
        if (e.which == 13) {
            e.preventDefault();
            
        }
        
    });

    $('#tambah-barang').hide();
    $('#totrans').keydown(function(e){
        var value = String.fromCharCode(e.which) || e.key;
        
        if(e.key == 'ArrowDown'){
            e.preventDefault();
            $('#todisk').focus();
        }
    });

    $('#todisk').change(function(){
        hitungDisc();
        hitungTotal();
    });

    $('#toppn').change(function(){
        hitungTotal();
    });

    $('#todisk').keydown(function(e){
        var value = String.fromCharCode(e.which) || e.key;
        
        if (e.key == 'ArrowUp') {
            e.preventDefault();
            $('#totrans').focus();
        }else if(e.key == 'ArrowDown'){
            e.preventDefault();
            $('#tostlh').focus();
        }
    });

    $('#tostlh').keydown(function(e){
        var value = String.fromCharCode(e.which) || e.key;
        
        if (e.key == 'ArrowUp') {
            e.preventDefault();
            $('#todisk').focus();
        }else if(e.key == 'ArrowDown'){
            e.preventDefault();
            $('#tobyr').focus();
        }
    });

    $('#btn-byr').click(function(){
        $('#modal-bayar').modal('show');
    });

    $('#getPPN').click(function(){
        getPPN();
    });

    $('#btn-ok').click(function(){
        var tot = toNilai($('#inp-byr').val());
        $('#tobyr').val(toRp(tot));
        hitungTotal();
        $('#modal-bayar').modal('hide');
        $('#inp-byr').val(0);
        $('#param').val('');
    });

    $('#btn-clear').click(function(){
        $('#inp-byr').val(0);
        $('#param').val('');
    });

    $('#nom0').click(function(){
        var tot= toNilai($('#tostlh').val());
        $('#inp-byr').val(tot);
    });
    $('#nom1').click(function(){
        var tot= toNilai($('#inp-byr').val());
        var tanda= $('#param').val();
        
        tot+=+1000;
        $('#inp-byr').val(tot);
    });
    
    $('#nom2').click(function(){
        var tot= toNilai($('#inp-byr').val());
        var tanda= $('#param').val();
        tot+=+2000;
        
        $('#inp-byr').val(tot);
    });
    
    $('#nom3').click(function(){
        var tot= toNilai($('#inp-byr').val());
        var tanda= $('#param').val();
        tot+=+5000;
        
        $('#inp-byr').val(tot);
    });
    
    $('#nom4').click(function(){
        var tot= toNilai($('#inp-byr').val());
        var tanda= $('#param').val();
        tot+=+10000;
      
        $('#inp-byr').val(tot);
    });

    $('#nom5').click(function(){
        var tot= toNilai($('#inp-byr').val());
        var tanda= $('#param').val();
        
        
        tot+=+20000;
        
        $('#inp-byr').val(tot);
    });

    $('#nom6').click(function(){
        var tot= toNilai($('#inp-byr').val());
        var tanda= $('#param').val();
        
        
        tot+=+50000;
        
        $('#inp-byr').val(tot);
    });

    $('#nom7').click(function(){
        var tot= toNilai($('#inp-byr').val());
        var tanda= $('#param').val();
        
        
        tot+=+100000;
        
        
        $('#inp-byr').val(tot);
    });

        // Simpan Pembelian

            // Simpan Pembelian
    $('#web_form_edit').submit(function(e){
        e.preventDefault();
        
        hitungTotal();
        var totrans=toNilai($('#totrans').val());
        var todisk=toNilai($('#todisk').val());
        var tostlh=toNilai($('#tostlh').val());
        var toppn=toNilai($('#toppn').val());
        var id = $('#id').val();
        if(totrans <= 0){
            alert('Total transaksi tidak valid');
        }else{
            var formData = new FormData(this);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
            $.ajax({
                type: 'POST',
                url: "{{url('toko-trans/pembelian')}}/"+id,
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false, 
                async:false,
                success:function(result){
                    alert('Input data '+result.message);
                    if(result.data.status){
                        $('#modal-totrans').text(sepNum(totrans));
                        $('#modal-diskon').text(sepNum(todisk));
                        $('#modal-ppn').text(sepNum(toppn)); 
                        $('#modal-toakhir').text(sepNum(tostlh));
                        $('#modal-nobukti').text(result.no_bukti);
                        dataTable.ajax.reload();
                        $('#modal-bayar2').modal('show');
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        }
    });
   
    document.onkeyup = function(e) {
        if (e.ctrlKey && e.which == 66) {
            $('#kd-barang2').focus();
        }
        if (e.which == 112) {
            $('#kd-barang2').focus();
        }
        if (e.ctrlKey && e.which == 67) {
            $('#kd-barang-selectized').focus();
        }
        if (e.which == 118) {
            // $('.inp-qtyb').prop('readonly');
            $('.inp-qtyb').prop('readonly', false);
            $('.inp-qtyb').first().focus();
            $('.inp-qtyb').first().select();
        }
    };
    
    
    $('#kd-barang2').scannerDetection({
        
        //https://github.com/kabachello/jQuery-Scanner-Detection
        
        timeBeforeScanTest: 200, // wait for the next character for upto 200ms
        avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
        preventDefault: true,
        
        endChar: [13],
        onComplete: function(barcode, qty){
            // validScan = true;
            validScan = true;
            $('#kd-barang2').val (barcode);
            addBarang2();
            
        } // main callback function	,
        ,
        // onKeyDetect:true,
        onError: function(string, qty) {
            console.log('barcode-error');
        }	
    });

    $('#cetakBtn').click(function(){
        var no_bukti= $('#modal-nobukti').text();
    });

    $('#web_form_edit').on('keydown', '.inp-qtyb', function(e){
        if (e.which == 9 || e.which == 40 || e.which == 38) {
            hitungTotal();
            
        }else if(e.which == 13){
            hitungTotal();
            // $('.inp-qtyb').prop('readonly', true);
        }
    });


    $('#web_form_edit').on('click', '#edit-qty', function(e){
        
        $('.inp-qtyb').prop('readonly', false);
        $('.inp-qtyb').first().focus();
        $('.inp-qtyb').first().select();
        
    });

    $('#web_form_edit').on('change', '.inp-qtyb,.inp-subb', function(e){
        
        hitungTotal();
        // alert('change');
        
    });

});


$(document).on("keypress", 'form', function (e) {
    var code = e.keyCode || e.which;
    // console.log(code);
    if (code == 13) {
        // console.log('Inside');
        e.preventDefault();
        // console.log(this);
        return false;
    } 
});
</script>