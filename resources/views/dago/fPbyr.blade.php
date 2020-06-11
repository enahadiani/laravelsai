<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3">
    <div id='saiweb_container'>
        <div id='web_datatable'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card' style='border-top:none' >
                        <div class='card-body'>
                            <div class='row'>
                                <div class="col-md-6">
                                <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Pembayaran Individu
                                </h4>
                                <hr style="margin-bottom:0px;margin-top:25px">
                                </div>
                                <div class='col-md-6'>
                                </div>
                                <div class='col-md-12'>
                                <!--     <div class="tab-content">
                                        <div class="tab-pane active" id="sai-tab-new" style="position: relative;"> -->
                                            <div class='sai-container-overflow-x'>
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

                                            </style>
                                                <table class='table table-bordered table-striped DataTable' style='width: 100%;' id='table-new'>
                                                <thead>
                                                    <tr>
                                                        <th>No Registrasi</th>
                                                        <th>No Peserta</th>
                                                        <th>Nama Peserta</th>
                                                        <th>Tanggal</th>
                                                        <th>Paket</th>
                                                        <th>Jadwal</th>
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                </table>
                                            </div>
                                        <!-- </div> -->
                                        <!-- <div class="tab-pane" id="sai-tab-finish" style="position: relative;">
                                            <div class='sai-container-overflow-x'>
                                                <table class='table table-bordered table-striped DataTable' style='width: 100%;' id='table-finish'>
                                                    <thead>
                                                        <tr>
                                                        <td>No Bukti</td>
                                                        <td>Tanggal</td>
                                                        <td>No Registrasi</td>
                                                        <td>Paket</td>
                                                        <td>Jadwal</td>
                                                        <td>Nilai Paket</td>
                                                        <td>Nilai Tambahan</td>
                                                        <td>Total</td>
                                                        <td>Action</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>-->
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="form" id="form-tambah" >
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Pembayaran
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='min-height:450px' >
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id">
                                </div>
                                <div class="col-3">
                                <input class="form-control" type="hidden" id="no_bukti" name="no_bukti" required >
                                <input class="form-control" type="hidden" readonly id="akunTitip" name="akunTitip">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-3 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_akun" class="col-3 col-form-label">Rekening Kas Bank</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_akun" name="kode_akun" required>
                                    <option value='' disabled>--- Pilih Rekening Kas ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_reg" class="col-3 col-form-label">No Registrasi</label>
                                <div class="col-3">
                                <input class="form-control" type="text" id="no_reg" name="no_reg" readonly required>
                                </div>
                                <label for="tgl_berangkat" class="col-3 col-form-label">Jadwal</label>
                                <div class="col-3">
                                <input class="form-control" type="text" id="tgl_berangkat" name="tgl_berangkat" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Nama</label>
                                <div class="col-9">
                                <input class="form-control" type="text" readonly id="nama" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paket" class="col-3 col-form-label">Paket</label>
                                <div class="col-9">
                                <input class="form-control" type="text" readonly id="paket" name="paket">
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#detBayar" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Pembayaran</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detBiaya" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Biaya</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detHis" role="tab" aria-selected="true"><span class="hidden-xs-down">History Pembayaran</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border" style='margin-bottom:30px'>
                                <div class="tab-pane active" id="detBayar" role="tabpanel">
                                    <div class="form-group row mt-2">
                                        <label for="deskripsi" class="col-3 col-form-label">Deskripsi</label>
                                        <div class="col-9">
                                        <input class="form-control" type="text" id="deskripsi" name="deskripsi" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status_bayar" class="col-3 col-form-label">Status Bayar</label>
                                        <div class="col-3">
                                            <select class='form-control selectize' id="status_bayar" name="status_bayar">
                                                <option value='' disabled>--- Pilih Status Bayar ---</option>
                                                <option value='TUNAI'>TUNAI</option>
                                                <option value='TRANSFER'>TRANSFER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="saldo_paket" class="col-3 col-form-label">Saldo Paket + Room</label>
                                        <div class="col-3">
                                        <input class="form-control currency" type="text" value="0" readonly id="saldo_paket" name="saldo_paket">
                                        </div>
                                        <label for="bayar_paket currency" class="col-3 col-form-label">Bayar Paket Curr</label>
                                        <div class="col-3">
                                        <input class="form-control currency " readonly type="text" value="0" id="bayar_paket" name="bayar_paket">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="saldo_biaya" class="col-3 col-form-label">Saldo Biaya Tambahan</label>
                                        <div class="col-3">
                                        <input class="form-control currency" type="text" value="0" readonly id="saldo_biaya" name="saldo_biaya">
                                        </div>
                                        <label for="bayar_tambahan" class="col-3 col-form-label">Bayar Tambahan</label>
                                        <div class="col-3">
                                        <input class="form-control currency " type="text"  readonly value="0" id="bayar_tambahan" name="bayar_tambahan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="saldo_dok" class="col-3 col-form-label">Saldo Biaya Dokumen</label>
                                        <div class="col-3">
                                        <input class="form-control currency" type="text" value="0" readonly id="saldo_dok" name="saldo_dok">
                                        </div>
                                        <label for="bayar_dok" class="col-3 col-form-label">Bayar Dokumen</label>
                                        <div class="col-3">
                                        <input class="form-control currency " type="text" readonly value="0" id="bayar_dok" name="bayar_dok">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="total_bayar" class="col-3 col-form-label">Total Bayar</label>
                                        <div class="col-3">
                                        <input class="form-control currency" type="text" value="0"  id="total_bayar" name="total_bayar">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="detBiaya" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-biaya">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="10%">Kode</th>
                                                <th width="20%">Nama Biaya</th>
                                                <th width="10%">Nilai Tagihan</th>
                                                <th width="10%">Jumlah</th>
                                                <th width="15%">Terbayar</th>
                                                <th width="15%">Saldo</th>
                                                <th width="15%">Nilai Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="detHis" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="table-his">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">No Bukti</th>
                                                <th width="10%">Tgl Bayar</th>
                                                <th width="15%">Nilai Paket + Room</th>
                                                <th width="15%">Nilai Tambahan</th>
                                                <th width="15%">Nilai Dokumen</th>
                                                <th width="15%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- PRINT PEMBAYARAN -->
        <div class="row" id="slide-print" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px;padding:10px;font-size:12pt !important'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    var $iconLoad = $('.preloader');
    var action_html = "<a href='#' title='Edit' class='badge badge-info web_datatable_bayar' ><i class='fas fa-pencil-alt'></i>&nbsp; Bayar</a>";
    var action_html2 = "<a href='#' title='Edit' class='badge badge-info web_datatable_edit' ><i class='fas fa-pencil-alt'></i>&nbsp; Edit</a>";
    var dataTable = $('#table-new').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        "ordering": true,
        "order": [[0, "desc"]],
        'ajax': {
            'url': "{{ url('dago-trans/pembayaran') }}",
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
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                    return [];
                }
            }
        },
        'columns': [
            { data: 'no_reg' },
            { data: 'no_peserta' },
            { data: 'nama' },
            { data: 'tgl_input' },
            { data: 'nama_paket' },
            { data: 'tgl_berangkat' },
            { data: 'action' },
            { data: 'status' }
        ],
        "columnDefs": [ {
            "targets": 6,
            "data": null,
            "render": function ( data, type, row, meta ) {
                return "<a href='#' title='Edit' class='badge badge-info web_datatable_bayar' ><i class='fas fa-pencil-alt'></i>&nbsp; Bayar</a>";
            }
        },{
            "targets": 7,
            "data": null,
            "render": function ( data, type, row, meta ) {
                if(row.status == "-"){
                    return "";
                }else{
                    return "<a href='#' title='Sudah Lunas' class='badge badge-success' ><i class='fas fa-check'></i> Lunas</a>";
                }
            }
        }]
    });


    function getRekBank(){
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/pembayaran-rekbank') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('#kode_akun').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.data.status == "SUCCESS"){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        for(i=0;i<result.data.data.length;i++){
                            control.addOption([{text:result.data.data[i].kode_akun + ' - ' + result.data.data[i].nama, value:result.data.data[i].kode_akun}]);
                        }
                    }
                }
            }
        });
    }

    getRekBank();
    $('.selectize').selectize();

    function hitungTotal(){
        
        var total_t = 0;
        var total_d = 0;
        var total_p = 0;

        $('.row-biaya').each(function(){
            var jenis = $(this).closest('tr').find('.inp-jenis_biaya').val();
            var nilai = $(this).closest('tr').find('.inp-nbiaya_bayar').val();
            if(jenis == "TAMBAHAN"){
                total_t += +toNilai(nilai);
            }else if(jenis == "DOKUMEN"){
                total_d += +toNilai(nilai);
            }else{
                total_p += +toNilai(nilai);
            }
        });

        $('#bayar_tambahan').val(total_t);
        $('#bayar_dok').val(total_d);
        $('#bayar_paket').val(total_p);
        var total =toNilai($('#bayar_paket').val()) + toNilai($('#bayar_tambahan').val()) + toNilai($('#bayar_dok').val());
        total = Math.round(total);
        $('#total_bayar').val(total);
        
    }

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    $('#saiweb_container').on('click', '#btn-kembali', function(){
        
        $('#saku-form').hide();
        $('#web_datatable').show();
    });

    $('#saku-form').on('click','#btn-print',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        printPbyr(id);
    });

    $('#slide-print').on('click', '#btn-kembali', function(){
        $('#saku-form').hide();
        $('#saku-datatable').show();
        $('#slide-print').hide();
    });

    $('#saiweb_container').on('click', '.web_datatable_bayar', function(){
                      // getset value
        var kode = $(this).closest('tr').find('td:eq(0)').text();
        $('#form-tambah')[0].reset();
        $('#input-biaya tbody').html('');
        $iconLoad.show();
        $.ajax({
          type: 'GET',
          url: "{{ url('dago-trans/pembayaran-detail') }}",
          dataType: 'json',
          data: {'no_reg':kode},
          success:function(res){
              if(res.data.status == "SUCCESS"){  
                if(res.data.data_jamaah.length > 0 ){
                    var line = res.data.data_jamaah[0];
                    $('#id_edit').val('');
                    $('#no_bukti').val('');
                    $('#no_reg').val(line.no_reg);
                    $('#nama').val(line.nama);
                    $('#tgl_berangkat').val(line.tgl_berangkat);						
                    $('#paket').val(line.paket);
                    var hargapaket = parseFloat(line.harga_tot);
                    var akunTitip = line.kode_akun;
                    $('#akunTitip').val(akunTitip);
                    var kurs_closing = parseFloat(line.kurs_closing);
                    var diskon = parseFloat(line.diskon);
                    
                    if (line.no_closing != "-") {
                        var akunDokumen = line.akun_piutang;
                        var akunTambah = line.akun_piutang;
                    }

                    if (res.data.detail_bayar.length){
                        var line2 = res.data.detail_bayar[0];							
                        if (line2 != undefined){										
                            var bayarTambah = parseFloat(line2.tambahan);
                            var bayarPaket = parseFloat(line2.paket);
                            var bayarDok = parseFloat(line2.dokumen);					
                        }
                    }
                    var html='';
                    $('#input-biaya tbody').html('');
                    if (res.data.detail_biaya.length){
                        var no=1;
                        for(var i=0;i< res.data.detail_biaya.length;i++){
                            var line3 = res.data.detail_biaya[i];	
                            // var trbyr = parseFloat(line3.nilai)-parseFloat(line3.saldo);						
                            html+=`<tr class='row-biaya'>
                                <td class='no-biaya'>`+no+`</td>
                                <td>`+line3.kode_biaya+`<input type='hidden' name='kode_biaya[]' class='form-control inp-kode_biaya' value='`+line3.kode_biaya+`'></td>
                                <td>`+line3.nama+`<input type='hidden' name='kode_akunbiaya[]' class='form-control inp-kode_akun' value='`+line3.akun_pdpt+`'></td>
                                <td class='text-right'>`+toRp2(line3.nilai)+`</td>
                                <td class='text-right'>`+toRp2(line3.jml)+`<input type='hidden' name='jenis_biaya[]' class='form-control inp-jenis_biaya' value='`+line3.jenis+`'></td>
                                <td class='text-right'>`+toRp2(line3.byr)+`<input type='hidden' name='nilai_biaya[]' class='form-control inp-nilai_biaya' value='`+toRp2(line3.byr)+`'></td>
                                <td class='text-right'>`+toRp2(line3.saldo)+`<input type='hidden' name='saldo_det[]' class='form-control inp-saldo_det' value='`+toRp2(line3.saldo)+`'></td>`;

                                html+=`
                                <td class='text-right'><input type='text' name='nbiaya_bayar[]' class='form-control inp-nbiaya_bayar' value='0' ></td>`;
                                html+=`
                            </tr>`;
                            no++;
                        }
                        $('#input-biaya tbody').html(html);

                        
                        $('.inp-nbiaya_bayar').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('#input-biaya').on('change', '.inp-nbiaya_bayar', function(){
                            var bayar = $(this).val();
                            var saldo = $(this).closest('tr').find('.inp-saldo_det').val();
                            if(toNilai(bayar) > toNilai(saldo)){
                                $(this).val(0);
                                $(this).focus();
                                alert('nilai bayar tidak boleh melebihi saldo');
                            }else{

                                hitungTotal();
                            }
                        });

                    }

                    var saldo = hargapaket - bayarPaket - diskon;
                    var saldot = parseFloat(res.data.totTambah) - bayarTambah;						 
                    var saldom = parseFloat(res.data.totDok) - bayarDok;	
                    $('#saldo_paket').val(toRp2(saldo));
                    $('#saldo_biaya').val(toRp2(saldot));
                    $('#saldo_dok').val(toRp2(saldom));   

                    var html='';
                    $('#table-his tbody').html('');
                    if (res.data.histori_bayar.length){
                        var no=1;
                        for(var i=0;i< res.data.histori_bayar.length;i++){
                            var line4 = res.data.histori_bayar[i];						
                            html+=`<tr class='row-his'>
                                <td class='no-his'>`+no+`</td>
                                <td>`+line4.no_kwitansi+`</td>
                                <td>`+line4.tgl_bayar+`</td>
                                <td>`+toRp2(line4.nilai_p)+`</td>
                                <td>`+toRp2(line4.nilai_t)+`</td>
                                <td>`+toRp2(line4.nilai_m)+`</td>
                                <td>`+toRp2(line4.total_idr)+`</td>
                            </tr>`;
                            no++;
                        }
                        $('#table-his tbody').html(html);
                    }
                    $('#web_datatable').hide();
                    $('#saku-form').show();
                } 
              }
              $iconLoad.hide();
          },
          fail: function(xhr, textStatus, errorThrown){
              alert('request failed:');
              $iconLoad.hide();
          },
          error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status==422){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href>'+jqXHR.responseText+'</a>'
                })
            }
            $iconLoad.hide();
          }
      });

      
    });
    $('#saiweb_container').on('click', '.web_datatable_edit', function(){
                          // getset value
            var kode = $(this).closest('tr').find('td:eq(2)').text();
            var no_bukti = $(this).closest('tr').find('td:eq(0)').text();
            $('#form-tambah')[0].reset();
            $('#input-biaya tbody').html('');
            $.ajax({
              type: 'GET',
              url: "{{ url('dago-trans/pembayaran-edit') }}",
              dataType: 'json',
              data: {'no_reg':kode,'no_bukti':no_bukti},
              success:function(res){
                  if(res.data.status){  
                    if(res.data.data_jamaah.length > 0 ){
                        var line = res.data.data_jamaah[0];
                        $('#id_edit').val('edit');
                        $('#no_reg').val(line.no_reg);
                        $('#no_bukti').val(no_bukti);
                        $('#nama').val(line.nama);
                        $('#tgl_berangkat').val(line.tgl_berangkat);						
                        $('#paket').val(line.paket);
                        var hargapaket = parseFloat(line.harga_tot);
                        var akunTitip = line.kode_akun;
                        $('#akunTitip').val(akunTitip);
                        var kurs_closing = parseFloat(line.kurs_closing);
                        var diskon = parseFloat(line.diskon);
                        
                        if (line.no_closing != "-") {
                            var akunDokumen = line.akun_piutang;
                            var akunTambah = line.akun_piutang;
                        }
    
                        if (res.data.detail_bayar.length){
                            var line2 = res.data.detail_bayar[0];							
                            if (line2 != undefined){										
                                var bayarTambah = parseFloat(line2.tambahan);
                                var bayarPaket = parseFloat(line2.paket);
                                var bayarDok = parseFloat(line2.dokumen);					
                            }
                        }

                        if (res.daftar4.length){
                            var line4 = res.daftar4[0];							
                            if (line4 != undefined){										
                                $('#deskripsi').val(line4.keterangan);						
                                $('#kode_akun')[0].selectize.setValue(line4.kode_akun);					
                            }
                        }
                        var html='';
                        if (res.data.detail_biaya.length){
                            var no=1;
                            for(var i=0;i< res.data.detail_biaya.length;i++){
                                var line3 = res.data.detail_biaya[i];		
                                
                                var trbyr = parseFloat(line3.nilai)-parseFloat(line3.saldo);							
                                html+=`<tr class='row-biaya'>
                                    <td class='no-biaya'>`+no+`</td>
                                    <td>`+line3.kode_biaya+`<input type='hidden' name='kode_biaya[]' class='form-control inp-kode_biaya' value='`+line3.kode_biaya+`'></td>
                                    <td>`+line3.nama+`<input type='hidden' name='kode_akunbiaya[]' class='form-control inp-kode_akun' value='`+line3.akun_pdpt+`'></td>
                                    <td class='text-right'>`+toRp2(line3.nilai)+`</td>
                                    <td class='text-right'>`+toRp2(line3.jml)+`<input type='hidden' name='jenis_biaya[]' class='form-control inp-jenis_biaya' value='`+line3.jenis+`'></td>
                                    <td class='text-right'>`+toRp2(trbyr)+`<input type='hidden' name='nilai_biaya[]' class='form-control inp-nilai_biaya' value='`+toRp2(trbyr)+`'></td>
                                    <td class='text-right'>`+toRp2(line3.saldo)+`<input type='hidden' name='saldo_det[]' class='form-control inp-saldo_det' value='`+toRp2(line3.saldo)+`'></td>`;
                                    if(line3.kode_biaya == 'DISKON'){
                                        html+=`
                                    <td class='text-right'><input type='text' name='nbiaya_bayar[]' readonly class='form-control inp-nbiaya_bayar' value='0'></td>`;
                                    }else{
                                        if(line3.byr_e == "" || line3.byr_e == undefined){
                                            line3.byr_e = 0;
                                        }else{
                                            line3.byr_e = line3.byr_e;
                                        }
                                        // console.log(line3.byr_e);
                                        
                                    html+=`
                                    <td class='text-right'><input type='text' name='nbiaya_bayar[]' class='form-control inp-nbiaya_bayar' value='`+toRp2(line3.byr_e)+`'></td>`;
                                    }
                                    html+=`
                                </tr>`;
                                no++;
                            }
                            $('#input-biaya tbody').html(html);
                            $('.inp-nbiaya_bayar').inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            hitungTotal();
                            $('#input-biaya').on('change', '.inp-nbiaya_bayar', function(){
                                var bayar = $(this).val();
                                var saldo = $(this).closest('tr').find('.inp-saldo_det').val();
                                if(toNilai(bayar) > toNilai(saldo)){
                                    $(this).val(0);
                                    $(this).focus();
                                    alert('nilai bayar tidak boleh melebihi saldo');
                                }else{
    
                                    hitungTotal();
                                }
                            });
    
                        }
    
                        var saldo = hargapaket - bayarPaket;
                        var saldot = parseFloat(res.totTambah) - bayarTambah - diskon;						 
                        var saldom = parseFloat(res.totDok) - bayarDok;		
                        
                        
    
                        $('#saldo_paket').val(saldo);
                        $('#saldo_biaya').val(saldot);
                        $('#saldo_dok').val(saldom);         
                        $('#web_datatable').hide();
                        $('#saku-form').show();
                    } 
                  }
              },
              fail: function(xhr, textStatus, errorThrown){
                  alert('request failed:');
              }
          });
    
    
    });      
   
    $('#saiweb_container').on('submit', '#form-tambah', function(e){
      e.preventDefault();
        var nilai_p = toNilai($('#bayar_paket').val());
        var nilai_t = toNilai($('#bayar_tambahan').val());
        var nilai_d = toNilai($('#bayar_dok').val());
        var saldo = toNilai($('#saldo_paket').val());
        var saldo_t = toNilai($('#saldo_biaya').val());
        var saldo_d = toNilai($('#saldo_dok').val());
        var total = toNilai($('#total_bayar').val());

        if (nilai_p > saldo) {
            alert("Transaksi tidak valid. Nilai Bayar Paket melebihi Saldo Paket.");
            return false;						
        }	
        if (nilai_t > saldo_t ) {
            alert("Transaksi tidak valid. Nilai Bayar Biaya Tambahan melebihi Saldo Biaya Tambahan.");
            return false;						
        }	
        if (nilai_d > saldo_d) {
           alert("Transaksi tidak valid. Nilai Bayar Dokumen melebihi Saldo Dokumen.");
            return false;						
        }			
        if (total <= 0) {
            alert("Transaksi tidak valid. Total Bayar tidak boleh nol atau kurang");
            return false;						
        }	

        var formData = new FormData(this);        
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $iconLoad.show();
        
        $.ajax({
            type: 'POST',
            url: "{{ url('dago-trans/pembayaran') }}",
            dataType: 'json',
            data: formData,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                if(result.data.status == "SUCCESS"){
                    dataTable.ajax.reload();
                    // dataTable2.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been saved.'+result.data.message,
                        'success'
                    )
                    printPbyr(result.data.no_kwitansi);
                    
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
                $iconLoad.hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
                $iconLoad.hide();
            }
        });
    });

    //PRINT
    $('#slide-print').on('click','#btn-print',function(e){
        e.preventDefault();
        $('#print-area').printThis();
    });


    function printPbyr(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/pembayaran-preview') }}",
            dataType: 'json',
            async:false,
            data: {'no_kwitansi':id},
            success:function(result){    
                if(result.data.status == "SUCCESS"){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        var line =result.data.data[0];
                        
                        var foto = "dago.png";
                        var html=`
                        <style>
                            td,th{
                                padding:4px !important;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-body printableArea">
                                    <h3 class='text-left'><b>KUITANSI</b> <span class="pull-right">#`+line.no_kwitansi+`</span></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <address>
                                                    <div class="row">
                                                        <div class="col-6 text-left"><img src="`+foto+`" width="150" height="90"></div>
                                                        <div class="col-6 text-right">
                                                        Jl. Puter No. 7 Bandung<br>
                                                        Tlp. 022-2500307, 022-2531259,<br>02517062
                                                        </div>
                                                    </div>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive m-t-40" style="clear: both;">
                                                <table class="table no-border">
                                                    <tbody>
                                                        <tr>
                                                            <td width="154">TANGGAL BAYAR</td>
                                                            <td width="244">: `+line.tgl_bayar+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>DITERIMA DARI</td>
                                                            <td>: `+line.peserta+`</td>
                                                        </tr>

                                                        <tr>
                                                            <td>PAKET / ROOM</td>
                                                            <td>: `+line.paket+` / `+line.room+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>HARGA PAKET </td>
                                                            <td>: `+line.kode_curr+` `+sepNum(line.harga_paket)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>KEBERANGKATAN </td>
                                                            <td>: `+line.jadwal+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>MARKETING / AGEN</td>
                                                            <td>: `+line.nama_marketing+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AGEN / REFERAL</td>
                                                            <td>:  `+line.nama_agen+` / `+line.referal+`</td>
                                                        </tr>
                                                        <tr><td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="center"><b>DATA PEMBAYARAN</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-top:1px dotted black;border-bottom:1px dotted black" width="154">BIAYA PAKET (RP) </td>
                                                            <td style="border-top:1px dotted black;border-bottom:1px dotted black" width="244">: `+sepNum(line.biaya_paket)+` - KURS : `+sepNum(line.kurs)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SISTEM PEMBAYARAN</td>
                                                            <td>: Cicilan Ke-`+line.cicil_ke+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SALDO </td>
                                                            <td>: `+sepNum(line.saldo)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TOTAL BAYAR </td>
                                                            <td>: `+sepNum(line.bayar)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TERBILANG </td>
                                                            <td width="300">: `+terbilang(line.bayar)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SISA </td>
                                                            <td>: `+sepNum(line.sisa)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>DIINPUT OLEH </td>
                                                            <td>: `+line.nik_user+` </td>
                                                        </tr>
                                                        <tr><td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    <tr>
                                                        <td align="left"></td>
                                                        <td align="center">Customer,</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="">&nbsp;</td>
                                                        <td style="">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                        <tr>
                                                            <td valign="top" align="left"></td>
                                                            <td align="center">(`+line.peserta+`)</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><DIV style='page-break-after:always'></DIV>`;
                        $('#print-area').html(html);
                        $('#slide-print').show();
                        $('#saku-datatable').hide();
                        $('#saku-form').hide();
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
                $iconLoad.hide();
            }
        });
    }

       
</script>