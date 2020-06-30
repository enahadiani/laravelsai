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
th{
    vertical-align:middle !important;
}
/* #input-grid2 td{
    padding:0 !important;
} */
#input-grid2 .selectize-input, #input-grid2 .form-control, #input-grid2 .custom-file-label
{
    border:0 !important;
    border-radius:0 !important;
}
.modal-header .close {
    padding: 1rem;
    margin: -1rem 0 -1rem auto;
}
.check-item{
    cursor:pointer;
}
.selected{
    cursor:pointer;
    background:#4286f5 !important;
    color:white;
}
#input-grid2 td:hover
{
    background:#f4d180 !important;
    color:white;
}
#input-grid2 td
{
    overflow:hidden !important;
}

</style>
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="min-height:560px">
                    <div class="card-body">
                    <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Pengajuan 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>No Dokumen</th>
                                        <th>Regional</th>
                                        <th>Waktu</th>
                                        <th>Kegiatan</th>
                                        <th>Posisi</th>
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
                    <form class="form" id="form-tambah" style='margin-bottom:100px'>
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Justifikasi Kebutuhan
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='min-height:471px'>
                            <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="No Bukti" id="no_bukti" name="no_bukti" hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-3 col-form-label">Tanggal Pengajuan</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" placeholder="tanggal" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="waktu" class="col-3 col-form-label">Tanggal Kebutuhan</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" placeholder="Waktu" id="waktu" name="waktu" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_pp" class="col-3 col-form-label">Kode Regional</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_pp" name="kode_pp" required>
                                    <option value=''>--- Pilih Regional ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_kota" class="col-3 col-form-label">Kota</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_kota" name="kode_kota" required>
                                    <option value=''>--- Pilih Kota ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_dokumen" class="col-3 col-form-label">No Dokumen</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="No Dokumen" id="no_dokumen" name="no_dokumen" required readonly>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Justifikasi Kebutuhan</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Justifikasi Kebutuhan" id="kegiatan" name="kegiatan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Dasar/Latar Belakang</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Dasar" id="dasar" name="dasar" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Total Barang</label>
                                <div class="col-3">
                                    <input class="form-control text-right" type="text"  id="total" name="total" required readonly>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#det" role="tab" aria-selected="true"><span class="hidden-xs-down">Barang</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dok" role="tab" aria-selected="false"><span class="hidden-xs-down">Dokumen</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="det" role="tabpanel">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                    </div>
                                    <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2" style='width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap'>
                                        <thead style="background:#ff9500;color:white">
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%"> Kelompok Barang</th>
                                                <th width="15%">Deskripsi</th>
                                                <th width="10%">Harga</th>
                                                <th width="7%">Qty</th>
                                                <th width="15%">Subtotal</th>
                                                <th width="10%">PPN</th>
                                                <th width="20%">Grand Total</th>
                                                <th width="5%" class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="dok" role="tabpanel">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                    </div>
                                    <div class='col-xs-12' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-dok" style='width:100%'>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="30%">Nama Dokumen</th>
                                                <th width="30%">Nama File Upload</th>
                                                <th width="30%">Upload File</th>
                                                <th width="5%"><button type="button" href="#" id="add-row-dok" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
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
        <div class="row" id="slide-history" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <div class="profiletimeline mt-5">
                        </div>
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
        <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    </div>     
    
    <script>
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

    function terbilang(int){
        angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
        int = Math.floor(int);
        if (int < 12)
            return " " + angka[int];
        else if (int < 20)
            return terbilang(int - 10) + " belas ";
        else if (int < 100)
            return terbilang(int / 10) + " puluh " + terbilang(int % 10);
        else if (int < 200)
            return "seratus" + terbilang(int - 100);
        else if (int < 1000)
            return terbilang(int / 100) + " ratus " + terbilang(int % 100);
        else if (int < 2000)
            return "seribu" + terbilang(int - 1000);
        else if (int < 1000000)
            return terbilang(int / 1000) + " ribu " + terbilang(int % 1000);
        else if (int < 1000000000)
            return terbilang(int / 1000000) + " juta " + terbilang(int % 1000000);
        else if (int < 1000000000000)
            return terbilang(int / 1000000) + " milyar " + terbilang(int % 1000000000);
        else if (int >= 1000000000000)
            return terbilang(int / 1000000) + " trilyun " + terbilang(int % 1000000000000);
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

    function getBarangKlp(id,target1,target2,jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/barang-klp') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }else{
                            $("#input-grid2 td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-barang_klp').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('saku/login') }}";
                    })
                }
                else{
                    if(jenis == 'change'){
                        $('.'+target1).val('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target1).focus();
                    }
                    alert('Kode tidak valid');
                }
            }
        });
    }

    function showFilter(param,target1,target2){
        var par = param;

        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'barang_klp[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('apv/barang-klp') }}";
                var columns = [
                    { data: 'kode_barang' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Kelompok Barang";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
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
                "data": {'param':par},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.data.data;
                }
            },
            "columnDefs": [{
                "targets": 2, "data": null, "defaultContent": "<a class='check-item'><i class='fa fa-check'></i></a>"
            }],
            'columns': columns
            // "iDisplayLength": 25,
        });

        // searchTable.$('tr.selected').removeClass('selected');
        $('#table-search tbody').find('tr:first').addClass('selected');
        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search').on('click','.check-item',function(){
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('dblclick','tr',function(){
            console.log('dblclick');
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
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
                var kode = $('tr.selected').find('td:nth-child(1)').text();
                var nama = $('tr.selected').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode);
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else{
                    $($target2).text(nama);
                }
                
                if($target3 != ""){
                    $($target3).text(nama);
                }
                $('#modal-search').modal('hide');
            }
        })
    }


    function printAju(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/juskeb_preview') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){ 
                var result = res.data;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        var det='';
                        var no=1;var total=0;
                        for(var i=0;i<result.data_detail.length;i++){
                            total+=+result.data_detail[i].nilai;
                            det +=`<tr>
                                <td>`+no+`</td>
                                <td>`+result.data_detail[i].barang+`</td>
                                <td class='text-right'>`+toRp(result.data_detail[i].harga)+`</td>
                                <td class='text-right'>`+toRp(result.data_detail[i].jumlah)+`</td>
                                <td class='text-right'>`+toRp(result.data_detail[i].nilai)+`</td>
                            </tr>`;
                            no++;
                        }
                        det +=`<tr>
                                <td colspan='4'>Total</td>
                                <td class='text-right'>`+toRp(total)+`</td>
                            </tr>`;

                        var no=1;var det2='';
                        for(var i=0;i<result.data_dokumen.length;i++){
                            det2 +=`<tr>
                                <td>Dibuat Oleh</td>
                                <td>`+result.data_dokumen[i].nama_kar+`/`+result.data_dokumen[i].nik+`</td>
                                <td>`+result.data_dokumen[i].nama_jab+`</td>
                                <td>`+result.data_dokumen[i].tanggal+`</td>
                                <td>&nbsp;</td>
                            </tr>`;
                            no++;
                        }
                        var html=`<div class="row">
                                <div class="col-12" style='border-bottom:3px solid black;text-align:center'>
                                    <h3>JUSTIFIKASI PENGADAAN</h3>
                                    <h3 id='print-kegiatan'>`+result.data[0].kegiatan+`</h3>
                                </div>
                                <div class="col-12 my-2" style='text-align:center'>
                                    <h6>Tanggal : <span id='print-tgl'>`+result.data[0].tanggal.substr(8,2)+' '+getNamaBulan(result.data[0].tanggal.substr(5,2))+' '+result.data[0].tanggal.substr(0,4)+`</span></h6>
                                    <h6>Nomor : <span id='print-no_dokumen'>`+result.data[0].no_dokumen+`</span></h6>
                                </div>
                                <div class="col-12">
                                    <table class="table table-condensed table-bordered" width="100%" id='table-m'>
                                        <tbody>
                                            <tr>
                                                <td width="5%">1</td>
                                                <td width="25">UNIT KERJA</td>
                                                <td width="70%" id='print-unit'>`+result.data[0].nama_pp+`</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>NAMA KEGIATAN</td>
                                                <td id='print-kegiatan2'>`+result.data[0].kegiatan+`</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>SAAT PENGGUNAAN</td>
                                                <td id='print-waktu'>`+result.data[0].waktu.substr(8,2)+' '+getNamaBulan(result.data[0].waktu.substr(5,2))+' '+result.data[0].waktu.substr(0,4)+`</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <h6 style='font-weight:bold'># <u>KEBUTUHAN</u></h6>
                                </div>
                                <div class="col-12">
                                    <table class="table table-condensed table-bordered" width="100%" id="table-d">
                                        <thead>
                                            <tr>
                                                <td width="5%">No</td>
                                                <td width="25">Deskripsi</td>
                                                <td width="15%">Harga</td>
                                                <td width="25%">Qty</td>
                                                <td width="30%">Jumlah Harga</td>
                                            </tr>
                                        </thead>
                                        <tbody>`+det+`
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <h6 style='font-weight:bold'># <u>ESTIMASI BIAYA</u></h6>
                                    <p>Estimasi Biaya yang dibutuhkan untuk pengadaan tersebut adalah sebesar <span id='estimasi-biaya' style='text-transform: capitalize;'>`+'Rp. '+toRp(result.data[0].nilai)+' ( '+terbilang(result.data[0].nilai)+' Rupiah)'+`</span> </p>
                                </div>
                                <div class="col-12">
                                    <h6 style='font-weight:bold'># <u>PENUTUP</u></h6>
                                </div>
                                <div class="col-12">
                                    <table class="table table-condensed table-bordered" width="100%" id="table-penutup">
                                        <thead class="text-center">
                                            <tr>
                                                <td width="20%"></td>
                                                <td width="25">NAMA/NIK</td>
                                                <td width="25%">JABATAN</td>
                                                <td width="15%">TANGGAL</td>
                                                <td width="15%">TTD</td>
                                            </tr>
                                        </thead>
                                        <tbody>`+det2+`
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
        var kode_pp = "{{ Session::get('kodePP')}}";
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/unit') }}/"+kode_pp,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;    
                var select = $('#kode_pp').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].kode_pp + ' - ' + result.data[i].nama, value:result.data[i].kode_pp}]);
                        }
                        control.setValue("{{ Session::get('kodePP') }}");
                        getKota("{{ Session::get('kodePP') }}");
                    }
                }
            }
        });
    }



    function getKota(kode_pp){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/kota') }}",
            dataType: 'json',
            data:{'kode_pp':kode_pp},
            async:false,
            success:function(res){
                var result = res.data;    
                var select = $('#kode_kota').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].nama, value:result.data[i].kode_kota}]);
                        }
                    }
                }
            }
        });
    }

    function generateDok(tanggal,nama_pp,nama_kota){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/generate-dok') }}",
            dataType: 'json',
            data:{'tanggal':tanggal,'nama_pp':nama_pp,'nama_kota':nama_kota},
            async:false,
            success:function(res){
                $('#no_dokumen').val(res.no_dokumen);
            }
        });
    }

    getPP();
    $('#kode_kota').selectize();
    $('#kode_pp').selectize({
        selectOnTab: true,
        onChange: function (value){
            getKota(value);
        }
    });

    $('#kode_kota').change(function(){
        var tmp = $("#kode_pp option:selected").text();
        tmp = tmp.split(" - ");
        var pp =  tmp[1];
        var kota = $("#kode_kota option:selected").text();
        var tanggal = $('#tanggal').val();
        generateDok(tanggal,pp,kota);
    });

    var $iconLoad = $('.preloader');
    var action_html = "<a href='#' title='Edit' class='badge badge-warning' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>&nbsp; <a href='#' title='History' class='badge badge-success' id='btn-history'><i class='fas fa-history'></i></a>&nbsp; <a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('apv/juskeb') }}",
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
            // {'targets': 7, data: null, 'defaultContent': action_html },
            {   'targets': 6, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            }
        ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'no_dokumen' },
            { data: 'kode_pp' },
            { data: 'waktu' },
            { data: 'kegiatan' },
            { data: 'posisi' },
            { data: 'nilai' },
            { data: 'action' }
        ]
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#form-tambah')[0].reset();
        $('#input-grid2 tbody').html('');
        $('#input-dok tbody').html('');
    });

    $('#saku-form').on('click', '#add-row', function(){

        var no=$('#input-grid2 .row-barang:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-barang'>";
        input += "<td class='no-barang'>"+no+"</td>";
        input += "<td><span class='td-barang_klp tdbarang_klpke"+no+"'></span><select hidden name='barang_klp[]' class='form-control inp-barang_klp barang_klpke"+no+"' value='' required></select></td>";
        input += "<td><span class='td-nama tdnamake"+no+"'></span><input type='text' name='nama[]' class='form-control inp-nama namake"+no+" hidden'  value='' readonly></td>";
        input += "<td><span class='td-barang tdbarangke"+no+"'></span><input type='text' name='barang[]' class='form-control inp-barang barangke"+no+" hidden'  value=''></td>";
        input += "<td style='text-align:right'><span class='td-harga tdhargake"+no+"'></span><input type='text' name='harga[]' class='form-control inp-harga hargake"+no+" hidden'  value='' required></td>";
        input += "<td style='text-align:right'><span class='td-qty tdqtyke"+no+"'></span><input type='text' name='qty[]' class='form-control inp-qty qtyke"+no+" hidden'  value='' required></td>";
        input += "<td style='text-align:right'><span class='td-sub tdsubke"+no+"'></span><input type='text' name='nilai[]' class='form-control inp-sub subke"+no+" hidden'  value='' required></td>";
        input += "<td style='text-align:right'><span class='td-ppn tdppnke"+no+"'></span><input type='text' name='ppn[]' class='form-control inp-ppn ppnke"+no+" hidden'  value='' required></td>";
        input += "<td style='text-align:right'><span class='td-grand_total tdgrand_totalke"+no+"'></span><input type='text' name='grand_total[]' class='form-control inp-grand_total grand_totalke"+no+" hidden'  value='' required></td>";
        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
        input += "</tr>";
        $('#input-grid2 tbody').append(input);
        $('.inp-qty,.inp-harga,.inp-ppn,.inp-sub,.inp-grand_total').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('#input-grid2 td').removeClass('px-0 py-0 aktif');
        $('#input-grid2 tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-grid2 tbody tr:last').find(".inp-barang_klp").show();
        $('#input-grid2 tbody tr:last').find(".td-barang_klp").hide();
        $('#input-grid2 tbody tr:last').find(".search-barang_klp").show();
        $('#input-grid2 tbody tr:last').find(".inp-barang_klp").focus();

    });

    // $('#input-grid2').on('keydown', '.inp-brg', function(e){
    //     if (e.which == 13 || e.which == 9) {
    //         e.preventDefault();
    //         $(this).closest('tr').find('.inp-hrg').focus();
    //     }
    // });

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
        input += "<td width='30%'><input type='text' name='nama_dok[]' class='form-control inp-dok' value='' required></td>";
        input += "<td width='30%'><input type='text' name='nama_file[]' class='form-control inp-nama' value='-' required readonly></td>";
        input += "<td width='30%'>"+
        "<input type='file' name='file_dok[]' required  class='inp-file_dok'>"+
        "</td>";
        input += "<td width='5%'><a class='btn btn-danger btn-sm hapus-dok' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
        input += "</tr>";
        $('#input-dok tbody').append(input);
    });

    $('#input-grid2 tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-grid2 tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('#input-grid2').on('click', 'td', function(){
        var idx = $(this).index();
        var barang_klp = $(this).parents("tr").find(".inp-barang_klp").val();
        var nama = $(this).parents("tr").find(".inp-nama").val();
        var barang = $(this).parents("tr").find(".inp-barang").val();
        var harga = $(this).parents("tr").find(".inp-harga").val();
        var qty = $(this).parents("tr").find(".inp-qty").val();
        var subtotal = $(this).parents("tr").find(".inp-sub").val();
        var ppn = $(this).parents("tr").find(".inp-ppn").val();
        var grand_total = $(this).parents("tr").find(".inp-grand_total").val();
        var no = $(this).parents("tr").find(".no-barang").text();

        $(this).parents("tr").find(".inp-barang_klp").val(barang_klp);
        $(this).parents("tr").find(".td-barang_klp").text(barang_klp);
        $(this).parents("tr").find(".inp-nama").val(nama);
        $(this).parents("tr").find(".td-nama").text(nama);
        $(this).parents("tr").find(".inp-barang").val(barang);
        $(this).parents("tr").find(".td-barang").text(barang);
        $(this).parents("tr").find(".inp-harga").val(harga);
        $(this).parents("tr").find(".td-harga").text(harga);
        $(this).parents("tr").find(".inp-qty").val(qty);
        $(this).parents("tr").find(".td-qty").text(qty);
        $(this).parents("tr").find(".inp-sub").val(subtotal);
        $(this).parents("tr").find(".td-sub").text(subtotal);
        $(this).parents("tr").find(".inp-ppn").val(ppn);
        $(this).parents("tr").find(".td-ppn").text(ppn);
        $(this).parents("tr").find(".inp-grand_total").val(grand_total);
        $(this).parents("tr").find(".td-grand_total").text(grand_total);

        if(idx == 0){
            $(this).parents("tr").find(".inp-barang_klp").hide();
            $(this).parents("tr").find(".td-barang_klp").show();
            $(this).parents("tr").find(".inp-nama").hide();
            $(this).parents("tr").find(".td-nama").show();
            $(this).parents("tr").find(".inp-barang").hide();
            $(this).parents("tr").find(".td-barang").show();
            $(this).parents("tr").find(".inp-harga").hide();
            $(this).parents("tr").find(".td-harga").show();
            $(this).parents("tr").find(".inp-qty").hide();
            $(this).parents("tr").find(".td-qty").show();
            $(this).parents("tr").find(".inp-sub").hide();
            $(this).parents("tr").find(".td-sub").show();
            $(this).parents("tr").find(".inp-ppn").hide();
            $(this).parents("tr").find(".td-ppn").show();
            $(this).parents("tr").find(".inp-grand_total").hide();
            $(this).parents("tr").find(".td-grand_total").show();
            $(this).closest('tr').find('td').removeClass('px-0 py-0 aktif');
            $(this).closest('tr').find(".search-barang_klp").hide();
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $(this).closest('tr').find('td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                if(idx == 1){
                    $(this).parents("tr").find(".inp-barang_klp").show();
                    $(this).closest('tr').find(".search-barang_klp").show();
                    $(this).parents("tr").find(".td-barang_klp").hide();
                    $(this).parents("tr").find(".inp-barang_klp").focus();
                }else{
                    $(this).parents("tr").find(".inp-barang_klp").hide();
                    $(this).parents("tr").find(".td-barang_klp").show();
                    $(this).closest('tr').find(".search-barang_klp").hide();
                }

                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }

                if(idx == 3){
                    $(this).parents("tr").find(".inp-barang").show();
                    $(this).parents("tr").find(".td-barang").hide();
                    $(this).parents("tr").find(".inp-barang").focus();
                }else{
                    $(this).parents("tr").find(".inp-barang").hide();
                    $(this).parents("tr").find(".td-barang").show();
                }

                if(idx == 4){
                    $(this).parents("tr").find(".inp-harga").show();
                    $(this).parents("tr").find(".td-harga").hide();
                    $(this).parents("tr").find(".inp-harga").focus();
                }else{
                    $(this).parents("tr").find(".inp-harga").hide();
                    $(this).parents("tr").find(".td-harga").show();
                }

                if(idx == 5){
                    $(this).parents("tr").find(".inp-qty").show();
                    $(this).parents("tr").find(".td-qty").hide();
                    $(this).parents("tr").find(".inp-qty").focus();
                }else{
                    $(this).parents("tr").find(".inp-qty").hide();
                    $(this).parents("tr").find(".td-qty").show();
                }

                if(idx == 6){
                    $(this).parents("tr").find(".inp-sub").show();
                    $(this).parents("tr").find(".td-sub").hide();
                    $(this).parents("tr").find(".inp-sub").focus();
                }else{
                    $(this).parents("tr").find(".inp-sub").hide();
                    $(this).parents("tr").find(".td-sub").show();
                }

                if(idx == 7){
                    $(this).parents("tr").find(".inp-ppn").show();
                    $(this).parents("tr").find(".td-ppn").hide();
                    $(this).parents("tr").find(".inp-ppn").focus();
                }else{
                    $(this).parents("tr").find(".inp-ppn").hide();
                    $(this).parents("tr").find(".td-ppn").show();
                }

                if(idx == 8){
                    $(this).parents("tr").find(".inp-grand_total").show();
                    $(this).parents("tr").find(".td-grand_total").hide();
                    $(this).parents("tr").find(".inp-grand_total").focus();
                }else{
                    $(this).parents("tr").find(".inp-grand_total").hide();
                    $(this).parents("tr").find(".td-grand_total").show();
                }
                hitungBrg();
            }
        }
    });

    $('#input-grid2').on('keydown','.inp-barang_klp, .inp-barang, .inp-harga, .inp-qty, .inp-sub, .inp-ppn, .inp-grand_total',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-barang_klp','.inp-barang','.inp-harga','.inp-qty','.inp-sub','.inp-ppn','.inp-grand_total'];
        var nxt2 = ['.td-barang_klp','.td-barang','.td-harga','.td-qty','.td-sub','.td-ppn','.td-grand_total'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-barang").text();
                    var kode = $(this).val();
                    var target1 = "barang_klpke"+noidx;
                    getBarangKlp(kode,target1,'tab');                    
                    break;
                case 1:
                    if($.trim($(this).val()).length){
                        $("#input-grid2 td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Barang yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 2:
                    var isi = $(this).val();
                    if(isi != "" && isi != 0){
                        $("#input-grid2 td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        hitungBrg();
                    }else{
                        alert('Harga yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 3:
                    var isi = $(this).val();
                    if(isi != "" && isi != 0){
                        $("#input-grid2 td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        hitungBrg();
                    }else{
                        alert('Qty yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 4:
                    var isi = $(this).val();
                    // if(isi != "" && isi != 0){
                        $("#input-grid2 td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        hitungBrg();
                    // }else{
                    //     alert('Subtotal yang dimasukkan tidak valid');
                    //     return false;
                    // }
                    break;
                case 5:
                    var isi = $(this).val();
                    if(isi != "" && isi != 0){
                        $("#input-grid2 td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        hitungBrg();
                    }else{
                        alert('Ppn yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 6:
                    $("#input-grid2 td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $('#add-row').click();
                    break;

                default:
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    $('#input-grid2').on('click', '.search-item', function(){

        var par = $(this).closest('td').find('input').attr('name');
        var modul = '';
        var header = [];

        switch(par){
            case 'barang_klp[]': 
                var par2 = "nama[]";

            break;
        }

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];

        showFilter(par,target1,target2);
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
       
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/juskeb') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#no_bukti').val(id);
                    // $('#kode_barang').attr('readonly', true);
                    $('#tanggal').val(result.data[0].tanggal);
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#kode_pp')[0].selectize.setValue(result.data[0].kode_pp);
                    $('#kode_kota')[0].selectize.setValue(result.data[0].kode_kota);
                    $('#waktu').val(result.data[0].waktu);
                    $('#kegiatan').val(result.data[0].kegiatan);
                    $('#dasar').val(result.data[0].dasar);
                    $('#total').val(toRp(result.data[0].nilai));
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
                            input2 += "<td width='30%'><input type='text' name='nama_dok[]' class='form-control inp-dok' value='"+line2.nama+"' required></td>";
                            input2 += "<td width='20%'><input type='text' name='nama_file[]' class='form-control inp-nama' value='"+line2.file_dok+"' required readonly></td>";
                            input2 += "<td width='30%'>"+
                            "<input type='file' name='file_dok[]' class='inp-file_dok'>"+
                            "</td>";
                            input2 += "<td width='5%'><a class='btn btn-danger btn-sm hapus-dok' style='font-size:8px'><i class='fa fa-times fa-1'></i></a><a class='btn btn-success btn-sm down-dok' style='font-size:8px' href='http://api.simkug.com/api/apv/storage/"+line2.file_dok+"' target='_blank'><i class='fa fa-download fa-1'></i></a></td>";
                            input2 += "</tr>";
                            no++;
                        }
                    }

                    $('#input-grid2 tbody').html(input);
                    
                    for(var i=0;i<result.data_detail.length;i++){
                        var line =result.data_detail[i];
                        getBarangKlp('barang_klpke'+no);
                        $('.barang_klpke'+no)[0].selectize.setValue(line.barang_klp);
                        no++;
                    }
                    
                    $('#input-dok tbody').html(input2);
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
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                } else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/logout') }}";
                    })
                }
            }
        });
    });


    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
        $('#slide-history').hide();
    });

    $('#slide-history').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
        $('#slide-history').hide();
    });

    $('#slide-print').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
        $('#slide-print').hide();
    });

    $('#saku-datatable').on('click','#btn-history',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/juskeb_history') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        var html='';
                        for(var i=0;i<result.data.length;i++){
                            html +=`<div class="sl-item"> <div class="sl-left" style="margin-left: -65px;"> <div style="padding: 10px;border: 1px solid #03a9f3;border-radius: 50%;background: #03a9f3;color: white;width: 50px;text-align: center;"><i style="font-size: 25px;" class="fas fa-clipboard-check"></i> </div> 
                                </div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">`+result.data[i].nama+`</a> <span class="sl-date">`+result.data[i].tanggal+`</span>
                                    <div class="row mt-3 mb-2">
                                        <div class="col-md-6">No Bukti : </div>
                                        <div class="col-md-6">`+result.data[i].no_bukti+`</div>
                                        <div class="col-md-6">Catatan : </div>
                                        <div class="col-md-6">`+result.data[i].keterangan+`</div>
                                    </div>
                            </div>
                            </div>
                            <hr>`;
                        }
                        
                        $('.profiletimeline').html(html);
                        $('#slide-history').show();
                        $('#saku-datatable').hide();
                        $('#saku-form').hide();
                    }
                } else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/login') }}";
                    })
                } else{
                    var html = `
                    <div class="sl-item"> 
                        <div class="sl-left" style="margin-left: -65px;"> 
                            <div style="padding: 10px;border: 1px solid #959595;border-radius: 50%;background: #959595;color: white;width: 50px;text-align: center;"><i style="font-size: 25px;" class="fas fa-envelope"></i> 
                            </div> 
                        </div>
                        <div class="sl-right">
                            Belum ada proses approval.
                            <br>
                            <br>
                        <div>
                    </div>
                    <hr>`;
                    $('.profiletimeline').html(html);
                    $('#slide-history').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').hide();
                }
            }
        });
    });

    $('#saku-datatable').on('click','#btn-print',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        printAju(id);
    });

    
    $('#saku-datatable').on('click','#btn-delete',function(e){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var kode = $(this).closest('tr').find('td:eq(0)').html();       
                
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('apv/juskeb') }}/"+kode,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
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
                    }
                });
                
            }else{
                return false;
            }
        })
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        var total = $('#total').val();
        var kode = $('#no_bukti').val();
        if(total == 0){
            alert('Total pengajuan tidak boleh 0');
        }else{
            // tambah
            $iconLoad.show();
            if(parameter==''){
            var url = "{{ url('apv/juskeb') }}";
            var pesan = "saved";
            }else{
                
                var url = "{{ url('apv/juskeb') }}/"+kode;
                var pesan = "updated";
            }
            var formData = new FormData(this);
            var tmp = $("#kode_pp option:selected").text();
            tmp = tmp.split(" - ");
            var pp = tmp[1];
            var kota = $("#kode_kota option:selected").text();
            formData.append('nama_pp',pp);
            formData.append('nama_kota',kota);
            for(var pair of formData.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]); 
                }

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
                        dataTable.ajax.reload();
                        Swal.fire(
                            'Great Job!',
                            'Your data has been '+pesan+' '+result.data.message,
                            'success'
                            )
                        printAju(result.data.no_aju);
                        
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
            $iconLoad.hide();
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

    $('#tanggal,#no_dokumen,#kode_pp,#waktu,#kegiatan,#dasar').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','no_dokumen','kode_pp','waktu','kegiatan','dasar'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2){
                $('#'+nxt[idx])[0].selectize.focus();
            }else if(idx == 6){
                $('#add-row').click();
            }
            else{
                $('#'+nxt[idx]).focus();
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
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


    </script>

    
