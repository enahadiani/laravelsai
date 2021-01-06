<link rel="stylesheet" href="{{ asset('trans.css') }}" />

<style>
    th#checkbox {
        text-align: center; /* center checkbox horizontally */
        vertical-align: middle; /* center checkbox vertically */
    }
</style>

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                    <h6 id="judul-form" style="position:absolute;top:25px">Generate Barcode</h6>
                    <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
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
                                    <button class="btn btn-light" style="float: right !important; margin-top: 18px !important;" type="button">Load Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
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
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="{{ asset('helper.js') }}"></script>  
<script type="text/javascript">
    var table3 = generateTableWithoutAjax(
        "table-data",
        [
            {
                "targets": 0,
                "searchable": false,
                "orderable": false,
            } 
        ],
        [
            { data: '' },
            { data: 'no_pesan' },
            { data: 'tanggal' },
            { data: 'nama_cust' },
            { data: 'nilai' },
            { data: 'kode_kirim' },
        ],
        []
    );
    
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
</script>