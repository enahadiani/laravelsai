<style>
.form-group{
    margin-bottom:15px !important;
}
</style>
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="min-height:560px">
                    <div class="card-body">    
                        <h4 class="card-title">Data Verifikasi Justifikasi Kebutuhan
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <table id="table-aju" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>No Dokumen</th>
                                        <th>Regional</th>
                                        <th>Waktu</th>
                                        <th>Kegiatan</th>
                                        <th>Dasar</th>
                                        <th>Nilai</th>
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
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="form" id="form-tambah">
                        <div class="card-body pb-0 title-form">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Verifikasi Justifikasi Kebutuhan
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body table-responsive pt-0 body-form">
                            <div class="form-group row mt-2">
                                <label for="nama" class="col-3 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" placeholder="tanggal" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Status</label>
                                <div class="col-3">
                                    <select class='form-control' id="status" name="status" required>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Keterangan</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Keterangan" id="keterangan" name="keterangan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">No Aju</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="No Pengajuan" id="no_aju" name="no_aju" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_dokumen" class="col-3 col-form-label">No Dokumen</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="No Dokumen" id="no_dokumen" name="no_dokumen" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="nama" class="col-3 col-form-label">Kode Regional</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_pp" name="kode_pp" readonly>
                                    </select>
                                    <input class="form-control" type="hidden" id="kode_pp2" name="kode_pp2" readonly>
                                </div>
                                <label for="nama" class="col-3 col-form-label">Kode Kota</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" id="kode_kota" name="kode_kota" readonly>
                                    <input class="form-control" type="hidden" id="kode_divisi" name="kode_divisi" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Waktu</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" placeholder="Waktu" id="waktu" name="waktu" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Kegiatan</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Kegiatan" id="kegiatan" name="kegiatan" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Dasar</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Dasar" id="dasar" name="dasar" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Total Barang</label>
                                <div class="col-3">
                                    <input class="form-control text-right" type="text"  id="total" name="total" readonly>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#det" role="tab" aria-selected="true"><span class="hidden-xs-down">Barang</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dok" role="tab" aria-selected="false"><span class="hidden-xs-down">Dokumen PO</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dok2" role="tab" aria-selected="false"><span class="hidden-xs-down">Dokumen Pembanding</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#catt" role="tab" aria-selected="false"><span class="hidden-xs-down">Catatan Approve</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border" style='margin-bottom:10px'>
                                <div class="tab-pane active" id="det" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-grid2">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">Kelompok Barang</th>
                                                <th width="15%">Deskripsi</th>
                                                <th width="10%">Harga</th>
                                                <th width="7%">Qty</th>
                                                <th width="15%">Subtotal</th>
                                                <th width="10%">PPN</th>
                                                <th width="20%">Grand Total</th>
                                                <th width="5%"><button type="button" href="#" id="add-row" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="dok" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-dok">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="30%">Nama Dokumen</th>
                                                <th width="20%">Nama File</th>
                                                <th width="30%">Upload</th>
                                                <th width="5%"><button type="button" href="#" id="add-row-dok" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="dok2" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-dok2" style='width:100%'>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="30%">Nama Dokumen</th>
                                                <th width="30%">Nama File Upload</th>
                                                <th width="30%">Upload File</th>
                                                <th width="5%"><button type="button" href="#" id="add-row-dok2" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="catt" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-histori">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">NIK</th>
                                                <th width="30%">Nama</th>
                                                <th width="15%">Status</th>
                                                <th width="30%">Keterangan Approval</th>
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
                        <button type="button" class="btn btn-info ml-2" id="btn-aju-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    
    <script>
    
    setHeightForm();
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

    function hitungBrg(){
        $('#total').val(0);
        total= 0;
        $('.row-barang').each(function(){
            var sub = toNilai($(this).closest('tr').find('.inp-grand_total').val());
            var this_val = sub;
            total += +this_val;
            
            $('#total').val(sepNum(total));
        });
    }

    function getNamaBulan(no_bulan){
        switch (no_bulan){
            case 1 : case '1' : case '01': bulan = "Januari"; break;
            case 2 : case '2' : case '02': bulan = "Februari"; break;
            case 3 : case '3' : case '03': bulan = "Maret"; break;
            case 4 : case '4' : case '04': bulan = "April"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Juni"; break;
            case 7 : case '7' : case '07': bulan = "Juli"; break;
            case 8 : case '8' : case '08': bulan = "Agustus"; break;
            case 9 : case '9' : case '09': bulan = "September"; break;
            case 10 : case '10' : case '10': bulan = "Oktober"; break;
            case 11 : case '11' : case '11': bulan = "November"; break;
            case 12 : case '12' : case '12': bulan = "Desember"; break;
            default: bulan = null;
        }

        return bulan;
    }

    function getStatus(){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/verifikasi_status') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('#status').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].status + ' - ' + result.daftar[i].nama, value:result.daftar[i].status}]);
                        }
                        control.setValue('V');
                    }
                }
            }
        });
    }

    function getBarangKlp(param,barang_klp=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('/apv/barang-klp') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        var select = $('.'+param).selectize();
                        select = select[0];
                        var control = select.selectize;
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].nama, value:result.data[i].kode_barang}]);
                        }
                        if(barang_klp != null){
                            control.setValue(barang_klp);
                        }
                    }
                }
            }
        });
    }

    function printLap(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/verifikasi_preview') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){ 
                var result = res.data;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                       
                        
                        var html=`<div class="row">
                                <div class="col-12" style='text-align:center;margin-bottom:20px'>
                                    <h3>TANDA TERIMA</h3>
                                </div>
                                <div class="col-12">
                                    <table class="table no-border" width="100%" id='table-m'>
                                        <tbody>
                                            <tr>
                                                <td width="25">No Bukti</td>
                                                <td width="75%" >: `+result.data[0].no_bukti+`</td>
                                            </tr>
                                            <tr>
                                                <td>No Justifikasi Kebutuhan</td>
                                                <td>: `+result.data[0].no_juskeb+`</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>: `+result.data[0].tanggal+`</td>
                                            </tr>
                                            <tr>
                                                <td>PP</td>
                                                <td>: `+result.data[0].kode_pp+` - `+result.data[0].nama_pp+`</td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>: `+result.data[0].kegiatan+`</td>
                                            </tr>
                                            <tr>
                                                <td>Nilai</td>
                                                <td>: `+sepNumX(parseFloat(result.data[0].nilai))+`</td>
                                            </tr>
                                            <tr>
                                                <td height='20px'>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'>Bandung, `+result.data[0].tgl.substr(0,2)+' '+getNamaBulan(result.data[0].tgl.substr(3,2))+' '+result.data[0].tgl.substr(6,4)+`</td>
                                            </tr>
                                            <tr>
                                                <td>DIbuat Oleh:</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>Yang Menerima</td>
                                                <td class='text-center'>Yang Menyetujui</td>
                                            </tr>
                                            <tr>
                                                <td height='80px'>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class='text-center'>`+result.data[0].nik_user+`</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>`;
                            $('#print-area').html(html);
                            $('#slide-print').show();
                            $('#saku-datatable').hide();
                            $('#saku-form').hide();
                    }
                }
            }
        });
    }

    function getPP(){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/unit') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('#kode_pp').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp}]);
                        }
                    }
                }
            }
        });
    }

    getStatus();
    getPP();

    
    var $iconLoad = $('.preloader');

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a>";
    var dataTable = $('#table-aju').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('apv/verifikasi') }}",
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
                        window.location.href = "{{ url('apv/logout') }}";
                    })
                    return [];
                }  
            }
        },
        'columnDefs': [
            {   
                'targets': 7, data: null, 'defaultContent': action_html 
            },
            {   'targets': 6, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            }
        ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'no_dokumen' },
            { data: 'nama_pp' },
            { data: 'waktu' },
            { data: 'kegiatan' },
            { data: 'dasar' },
            { data: 'nilai' }
        ]
    });

    $('#slide-print').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#slide-print').hide();
    });

    $('#saku-datatable').on('click','#btn-print',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        printLap(id);
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();

        $.ajax({
            type: 'GET',
            url: "{{ url('apv/verifikasi') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    // $('#no_bukti').val(result.no_app);
                    $('#no_aju').val(result.data[0].no_bukti);
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#kode_pp')[0].selectize.setValue(result.data[0].kode_pp);
                    $('#kode_pp')[0].selectize.disable();
                    $('#kode_pp2').val(result.data[0].kode_pp);
                    $('#kode_kota').val(result.data[0].kode_kota);
                    $('#kode_divisi').val(result.data[0].kode_divisi);
                    $('#waktu').val(result.data[0].waktu);
                    $('#kegiatan').val(result.data[0].kegiatan);
                    $('#dasar').val(result.data[0].dasar);
                    $('#total').val(toRp(result.data[0].nilai));
                    $('#input-grid2 tbody').html('');
                    $('#input-dok tbody').html('');
                    var input="";
                    var no=1;
                    if(result.data_detail.length > 0){

                        for(var x=0;x<result.data_detail.length;x++){
                            var line = result.data_detail[x];

                            input += "<tr class='row-barang'>";
                            input += "<td class='no-barang'>"+no+"</td>";
                            input += "<td ><select name='barang_klp[]' class='form-control inp-barang_klp barang_klpke"+no+"' value='' required></select></td>";
                            input += "<td ><input type='text' name='barang[]' class='form-control inp-brg' value='"+line.barang+"' required></td>";
                            input += "<td style='text-align:right'><input type='text' name='harga[]' class='form-control inp-hrg currency'  value='"+toRp(line.harga)+"' required></td>";
                            input += "<td style='text-align:right'><input type='text' name='qty[]' class='form-control inp-qty currency'  value='"+toRp(line.jumlah)+"' required></td>";
                            input += "<td style='text-align:right'><input type='text' name='nilai[]' class='form-control inp-sub currency' readonly value='"+toRp(line.nilai)+"' required></td>";
                            input += "<td style='text-align:right'><input type='text' name='ppn[]' class='form-control inp-ppn currency' value='"+toRp(line.ppn)+"' required></td>";
                            input += "<td style='text-align:right'><input type='text' name='grand_total[]' class='form-control inp-grand_total currency' readonly value='"+toRp(line.grand_total)+"' required></td>";
                            input += "<td ><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a></td>";
                            input += "</tr>";
                            no++;
                        }
                    }

                    var input2 = "";
                    var no=1;
                    if(result.data_dokumen.length > 0){

                        for(var i=0;i< result.data_dokumen.length;i++){
                            var line2 = result.data_dokumen[i];
                            input2 += "<tr class='row-dok'>";
                            input2 += "<td width='5%'  class='no-dok'>"+no+"</td>";
                            input2 += "<td width='30%'><input type='text' name='nama_dok[]' class='form-control inp-dok' value='"+line2.nama+"' required><input type='hidden' name='jenis_dok[]' class='form-control inp-jenis_dok' value='PO' required></td>";
                            input2 += "<td width='30%'><input type='text' name='nama_file[]' class='form-control inp-nama' value='"+line2.file_dok+"' readonly></td>";
                            input2 += "<td width='30%'>"+
                            "<input type='file' name='file_dok[]' class='inp-file_dok'>"+
                            "</td>";
                            input2 += "<td width='5%'><a class='btn btn-danger btn-sm hapus-dok' style='font-size:8px'><i class='fa fa-times fa-1'></i></a><a class='btn btn-success btn-sm down-dok' style='font-size:8px' href='http://api.simkug.com/api/apv/storage/"+line2.file_dok+"' target='_blank'><i class='fa fa-download fa-1'></i></a></td>";
                            input2 += "</tr>";
                            no++;
                        }
                    }

                    var input3 = "";
                    var no=1;
                    if(result.data_dokumen2.length > 0){

                        for(var i=0;i< result.data_dokumen2.length;i++){
                            var line2 = result.data_dokumen2[i];
                            input3 += "<tr class='row-dok2'>";
                            input3 += "<td width='5%'  class='no-dok2'>"+no+"</td>";
                            input3 += "<td width='30%'><input type='text' name='nama_dok[]' class='form-control inp-dok' value='"+line2.nama+"' required><input type='hidden' name='jenis_dok[]' class='form-control inp-jenis_dok' value='PBD' required></td>";
                            input3 += "<td width='20%'><input type='text' name='nama_file[]' class='form-control inp-nama' value='"+line2.file_dok+"' required readonly></td>";
                            input3 += "<td width='30%'>"+
                            "<input type='file' name='file_dok[]' class='inp-file_dok'>"+
                            "</td>";
                            input3 += "<td width='5%'><a class='btn btn-danger btn-sm hapus-dok' style='font-size:8px'><i class='fa fa-times fa-1'></i></a><a class='btn btn-success btn-sm down-dok' style='font-size:8px' href='http://api.simkug.com/api/apv/storage/"+line2.file_dok+"' target='_blank'><i class='fa fa-download fa-1'></i></a></td>";
                            input3 += "</tr>";
                            no++;
                        }
                    }

                    $('#input-grid2 tbody').html(input);
                    var no =1;
                    for(var i=0;i<result.data_detail.length;i++){
                        var line =result.data_detail[i];
                        getBarangKlp('barang_klpke'+no);
                        $('.barang_klpke'+no)[0].selectize.setValue(line.barang_klp);
                        no++;
                    }
                    $('#input-dok tbody').html(input2);
                    $('#input-dok2 tbody').html(input3);
                    $('.currency').inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () { self.Value(''); }
                    });
                    $('#form-tambah').on('change','.inp-file_dok',function(e){
                        e.preventDefault();
                        $(this).closest('tr').find('.inp-nama').val('-');
                    });

                    var input = '';
                    var no =1;
                    $('#input-histori tbody').html('');
                    if(result.data_histori.length > 0){
                        for(var x=0;x<result.data_histori.length;x++){
                            var line = result.data_histori[x];
                            input += `<tr class='row-his'>
                            <td>`+no+`</td>
                            <td>`+line.nik+`</td>
                            <td>`+line.nama+`</td>
                            <td>`+line.status+`</td>
                            <td>`+line.keterangan+`</td>
                            </tr>`;
                            no++;
                        }
                    }
                    
                    $('#input-histori tbody').html(input);
                     
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                } else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/login') }}";
                    })
                }
            }
        });
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        var jumdok = $('#input-dok tbody tr').length;
        var jumdok2 = $('#input-dok2 tbody tr').length;
        if(total == 0){
            alert('Total pengajuan tidak boleh 0');
        }
        else if(jumdok < 1){
            alert('Dokumen PO kurang upload. Minimal upload 1 dokumen !');
        }
        else if(jumdok2 < 3){
            alert('Dokumen Pembanding kurang upload. Minimal upload 3 dokumen !');
        }
        else{
            $iconLoad.show();
            $.ajax({
                type: 'POST',
                url: "{{ url('apv/verifikasi') }}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    // alert('Input data '+result.message);
                    if(result.data.status){
                        dataTable.ajax.reload();
                        Swal.fire(
                            'Saved!',
                            'Your data has been saved.'+result.data.message,
                            'success'
                        )
                        printLap(result.data.no_bukti);
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
                    $iconLoad.hide();
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });   
        }  
    });
    

    $('.inp-hrg').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    $('#slide-print').on('click','#btn-aju-print',function(e){
        e.preventDefault();
        var w=window.open();
        var html =`<html><head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">
                <meta name="author" content="">
                <title>SAKU | Sistem Akuntansi Keuangan Digital</title>
                <link href="{{ asset('asset_elite/dist/css/style.min.css') }}" rel="stylesheet">
                <!-- Dashboard 1 Page CSS -->
                <link href="{{ asset('asset_elite/dist/css/pages/dashboard1.css') }}" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="{{ asset('asset_elite/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
                <!-- SAI CSS -->
                <link href="{{ asset('asset_elite/dist/css/sai.css" rel="stylesheet">
                
            </head>
            <!--
            <body class="skin-default fixed-layout" >-->
                <div id="main-wrapper" style='color:black'>
                    <div class="page-wrapper" style='min-height: 674px;margin: 0;padding: 10px;background: white;color: black !important;'>
                        <section class="content" id='ajax-content-section' style='color:black !important'>
                            <div class="container-fluid mt-3">
                                <div class="row" id="slide-print">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">`+$('#print-area').html()+`
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            <!--</body></html>-->
            `;
            w.document.write(html);
            setTimeout(function(){
                w.print();
                w.close();
            }, 1500);
    });

    $('#saku-form').on('click', '#add-row', function(){

        var no=$('#input-grid2 .row-barang:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-barang'>";
        input += "<td class='no-barang'>"+no+"</td>";
        input += "<td><select name='barang_klp[]' class='form-control inp-barang_klp barang_klpke"+no+"' value='' required></select></td>";
        input += "<td><input type='text' name='barang[]' class='form-control inp-brg' value='' required></td>";
        input += "<td style='text-align:right'><input type='text' name='harga[]' class='form-control currency inp-hrg'  value='0' required></td>";
        input += "<td style='text-align:right'><input type='text' name='qty[]' class='form-control currency inp-qty'  value='0' required></td>";
        input += "<td style='text-align:right'><input type='text' name='nilai[]' class='form-control currency inp-sub' readonly value='0' required></td>";
        input += "<td style='text-align:right'><input type='text' name='ppn[]' class='form-control currency inp-ppn' value='0' required></td>";
        input += "<td style='text-align:right'><input type='text' name='grand_total[]' class='form-control currency inp-grand_total' readonly value='0' required></td>";
        input += "<td><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
        input += "</tr>";
        $('#input-grid2 tbody').append(input);
        getBarangKlp('barang_klpke'+no);
        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('#input-grid2 tbody tr:last').find('.inp-brg').focus();
    });

    $('#input-grid2').on('keydown', '.inp-brg', function(e){
        if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            $(this).closest('tr').find('.inp-hrg').focus();
        }
    });

    $('#input-grid2').on('keydown', '.inp-hrg', function(e){
        if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            var hrg = $(this).closest('tr').find('.inp-hrg').val();
            var qty = $(this).closest('tr').find('.inp-qty').val();
            var sub = toNilai(hrg)*toNilai(qty);
            $(this).closest('tr').find('.inp-qty').focus();
            $(this).closest('tr').find('.inp-sub').val(sub);
            var ppn = $(this).closest('tr').find('.inp-ppn').val();
            var nppn = toNilai(ppn)/100;
            var grand = sub+(nppn*sub);
            $(this).closest('tr').find('.inp-grand_total').val(grand);

            hitungBrg();
        }
    });

    $('#input-grid2').on('change', '.inp-hrg', function(e){
        // if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            var hrg = $(this).closest('tr').find('.inp-hrg').val();
            var qty = $(this).closest('tr').find('.inp-qty').val();
            var sub = toNilai(hrg)*toNilai(qty);
            $(this).closest('tr').find('.inp-qty').focus();
            $(this).closest('tr').find('.inp-sub').val(sub);
            var ppn = $(this).closest('tr').find('.inp-ppn').val();
            var nppn = toNilai(ppn)/100;
            var grand = sub+(nppn*sub);
            $(this).closest('tr').find('.inp-grand_total').val(grand);
            hitungBrg();
        // }
    });

    $('#input-grid2').on('keydown', '.inp-qty', function(e){
        if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            var hrg = $(this).closest('tr').find('.inp-hrg').val();
            var qty = $(this).closest('tr').find('.inp-qty').val();
            var sub = toNilai(hrg)*toNilai(qty);
            $(this).closest('tr').find('.inp-sub').val(sub);
            var ppn = $(this).closest('tr').find('.inp-ppn').val();
            var nppn = toNilai(ppn)/100;
            var grand = sub+(nppn*sub);
            $(this).closest('tr').find('.inp-grand_total').val(grand);
            hitungBrg();
            $('#add-row').click();
        }
    });

    $('#input-grid2').on('change', '.inp-qty', function(e){
        // if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            var hrg = $(this).closest('tr').find('.inp-hrg').val();
            var qty = $(this).closest('tr').find('.inp-qty').val();
            var sub = toNilai(hrg)*toNilai(qty);
            $(this).closest('tr').find('.inp-sub').val(sub);
            var ppn = $(this).closest('tr').find('.inp-ppn').val();
            var nppn = toNilai(ppn)/100;
            var grand = sub+(nppn*sub);
            $(this).closest('tr').find('.inp-grand_total').val(grand);
            hitungBrg();
        // }
    });


    $('#input-grid2').on('keydown', '.inp-ppn', function(e){
        if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            var sub = toNilai($(this).closest('tr').find('.inp-sub').val());
            var ppn = toNilai($(this).closest('tr').find('.inp-ppn').val());
            var grand = sub+((ppn/100)*sub);
            $(this).closest('tr').find('.inp-grand_total').val(grand);
            hitungBrg();
            $('#add-row').click();
        }
    });

    $('#input-grid2').on('change', '.inp-ppn', function(e){
        // if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            var sub = toNilai($(this).closest('tr').find('.inp-sub').val());
            var ppn = toNilai($(this).closest('tr').find('.inp-ppn').val());
            var grand = sub+((ppn/100)*sub);
            $(this).closest('tr').find('.inp-grand_total').val(grand);
            hitungBrg();
        // }
    });
        
    $('#saku-form').on('click', '#add-row-dok', function(){
        var no=$('#input-dok .row-dok:last').index();
        no=no+2;
        var input="";
        input = "<tr class='row-dok'>";
        input += "<td width='5%'  class='no-dok'>"+no+"</td>";
        input += "<td width='30%'><input type='text' name='nama_dok[]' class='form-control inp-dok' value='' required><input type='hidden' name='jenis_dok[]' class='form-control inp-jenis_dok' value='PO' required></td>";
        input += "<td width='30%'><input type='text' name='nama_file[]' class='form-control inp-nama' value='-' required readonly></td>";
        input += "<td width='30%'>"+
        "<input type='file' name='file_dok[]' required  class='inp-file_dok'>"+
        "</td>";
        input += "<td width='5%'><a class='btn btn-danger btn-sm hapus-dok' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
        input += "</tr>";
        $('#input-dok tbody').append(input);
    });

    $('#saku-form').on('click', '#add-row-dok2', function(){
        var no=$('#input-dok2 .row-dok2:last').index();
        no=no+2;
        var input="";
        input = "<tr class='row-dok2'>";
        input += "<td width='5%'  class='no-dok2'>"+no+"</td>";
        input += "<td width='30%'><input type='text' name='nama_dok[]' class='form-control inp-dok' value='' required><input type='hidden' name='jenis_dok[]' class='form-control inp-jenis_dok' value='PBD' required></td>";
        input += "<td width='30%'><input type='text' name='nama_file[]' class='form-control inp-nama' value='-' required readonly></td>";
        input += "<td width='30%'>"+
        "<input type='file' name='file_dok[]' required  class='inp-file_dok'>"+
        "</td>";
        input += "<td width='5%'><a class='btn btn-danger btn-sm hapus-dok' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
        input += "</tr>";
        $('#input-dok2 tbody').append(input);
    });

    $('#input-grid2').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-barang').each(function(){
            var nom = $(this).closest('tr').find('.no-barang');
            nom.html(no);
            no++;
        });
        hitungBrg();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });


    $('#input-dok').on('click', '.hapus-dok', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-dok').each(function(){
            var nom = $(this).closest('tr').find('.no-dok');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    
    $('#input-dok2').on('click', '.hapus-dok', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-dok2').each(function(){
            var nom = $(this).closest('tr').find('.no-dok2');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });


    $('#input-dok').on('change','input[type=file]',function(e){
        
        e.preventDefault();
        var i = $(this).parents('tr').index()+1;
        var file = $(this)[0].files[0].size;
        var sizekb = Math.round(file / 1024,2);
        var sizemb = Math.round(sizekb / 1024,2);
        if(sizekb > 10240){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="#" class="text-danger">File Dokumen ke '+i+' tidak valid, ukuran file '+sizemb+'MB. Batas Maksimum upload 10MB </a>'
            });
            $(this).replaceWith($(this).val('').clone(true));
        }
    })

    $('#input-dok2').on('change','input[type=file]',function(e){
        
        e.preventDefault();
        var i = $(this).parents('tr').index()+1;
        var file = $(this)[0].files[0].size;
        var sizekb = Math.round(file / 1024,2);
        var sizemb = Math.round(sizekb / 1024,2);
        if(sizekb > 10240){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="#" class="text-danger">File Dokumen ke '+i+' tidak valid, ukuran file '+sizemb+'MB. Batas Maksimum upload 10MB </a>'
            });
            $(this).replaceWith($(this).val('').clone(true));
        }
    })

    </script>