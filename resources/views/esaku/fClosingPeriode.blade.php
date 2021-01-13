<link rel="stylesheet" href="{{ asset('master.css') }}" />
    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pb-3" style="padding-top:1rem;min-height:68px">
                    <h6 style="position:absolute;top: 20px;">Closing Periode</h6>
                    <button type="button" id="btn-save" class="btn btn-primary" style="float:right;">Simpan</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">    
                    <div class="d-block d-md-inline-block float-right col-md-2 col-sm-12">
                        <label for="per_aktif">Periode Aktif</label>
                    </div>
                    <div class="d-block d-md-inline-block float-right col-md-2 col-sm-12">
                        <input type="text" class="form-control" id="per_aktif" readonly name="per_aktif">
                        <input type="hidden" class="form-control" id="per_next" readonly name="per_next">
                        <input type="hidden" class="form-control" id="max_periode" readonly name="max_periode">
                    </div>
                    <div class="d-block d-md-inline-block float-right col-md-2 col-sm-12">
                        <button type="button" id="btn-close-periode" class="btn btn-primary">Close Periode</button>
                    </div>
                </div>
                <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                    <div class="table-responsive ">
                        <table id="table-data" class="" style='width:100%'>
                            <thead>
                                <tr>
                                    <th style="width:10%" class="">Modul</th>
                                    <th style="width:32%" class="">Keterangan</th>
                                    <th style="width:12%" class="">Periode Awal1</th>
                                    <th style="width:12%" class="">Periode Akhir1</th>
                                    <th style="width:12%" class="">Periode Awal2</th>
                                    <th style="width:12%" class="">Periode Akhir2</th>
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
    
    <!-- END LIST DATA -->

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    setHeightForm();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    
    function closePeriode(periode, maksPeriode){	
        var bln = parseFloat(periode.substr(4,2));
        var thn = parseFloat(periode.substr(0,4));
        if (bln < 0 || bln > 99) bln = 1;	
        if (bln == maksPeriode ) {
            bln = 1;
            thn++;
        }else bln++;
        if (bln < 10) bln = "0" + bln;
        return thn+""+bln;
    }

    function getData(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/closing-periode') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#per_aktif').val(result.per_aktif);
                    $('#max_periode').val(result.max_periode); 
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    getData();

    //LIST DATA
    var action_html = "<a href='#' title='Close' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/periode-aktif') }}", 
        [],
        [
            { data: 'modul' },
            { data: 'keterangan' },
            { data: 'per_awal1' },
            { data: 'per_akhir1' },
            { data: 'per_awal2' },
            { data: 'per_akhir2' }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        []
    );

    // END LIST DATA

    function closing(){
        
        var per_aktif = $('#per_aktif').val();
        var perNext = closePeriode(per_aktif);
        dataTable.rows().every(function (index, element) {
            var row = dataTable.cell(index,2);
            var row3 = dataTable.cell(index,4);
            row.data(perNext).draw();
            row3.data(perNext).draw();
            var row2 = dataTable.cell(index,3);
            var row4 = dataTable.cell(index,5);
            
            if (parseInt(row2.data()) < parseInt(perNext)) row2.data(perNext).draw();
            if (parseInt(row4.data()) < parseInt(perNext)) row4.data(perNext).draw();
        });
        
        $('#per_next').val(perNext);
    }
    
    //BUTTON SIMPAN /SUBMIT
    $('#saku-datatable').on('click','#btn-save',function(e){
        var formData = new FormData();
        var data = dataTable.data();
        var tempData = []; 
        $i=1;
        $.each( data, function( key, value ) {
            if (parseInt(value.per_awal1) > parseInt(value.per_akhir1)) {
                msgDialog({
                    type: 'warning',
                    title: "Periode tidak valid",
                    text: "Periode Awal1 harus lebih kecil dari Periode Akhir1. Baris ke ["+i+"]"
                });
                return false;
            }
            if (parseInt(value.per_awal2) > parseInt(value.per_akhir2)) {
                msgDialog({
                    type: 'warning',
                    title: "Periode tidak valid",
                    text: "Periode Awal2 harus lebih kecil dari Periode Akhir2. Baris ke ["+i+"]"
                });
                return false;
            }
            formData.append('modul[]',value.modul);
            formData.append('keterangan[]',value.keterangan);
            formData.append('per_awal1[]',value.per_awal1);
            formData.append('per_akhir1[]',value.per_akhir1);
            formData.append('per_awal2[]',value.per_awal2);
            formData.append('per_akhir2[]',value.per_akhir2);
            $i++;
        });
         
        var per_next = $('#per_next').val();
        var per_aktif = $('#per_aktif').val();
        var max_periode = $('#max_periode').val();
        formData.append('per_next',per_next);
        formData.append('per_aktif',per_aktif);
        if (per_aktif.substr(4,2)=="16") {
            if (max_periode != parseInt("{{ Session::get('periode') }}".substr(4,2))) {
                msgDialog({
                    type: 'warning',
                    title: "Periode transaksi Closing tidak valid",
                    text: "Periode Closing harus "+max_periode+", Lakukan Aktifasi Periode Desember [SI06] di bulan ke-16"
                });
                return false;
            }
        }
        
        var url = "{{ url('esaku-trans/closing-periode') }}";
        var pesan = "saved";
        var text = "Data Closing Periode berhasil disimpan";
        
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
                    msgDialog({
                        id:'-',
                        text: text,
                        type:'simpan'
                    });
                    getData();
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                    window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    
                }else{
                    if(result.data.kode == "-" && result.data.jenis != undefined){
                        msgDialog({
                            id: id,
                            type: result.data.jenis,
                            text:'Kode vendor sudah digunakan'
                        });
                    }else{
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
         
    });
    // END BUTTON SIMPAN
    
    $('#saku-datatable').on('click','#btn-close-periode', function(e){
        e.preventDefault();
        closing();
    });
    </script>