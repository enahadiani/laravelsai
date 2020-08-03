    <style>
    .sidepanel  {
            width: 0px;
            position: fixed;
            z-index: 1;
            height: 570px;
            right: 0;
            background-color:white;
            overflow-x: hidden;
            transition: 0.5s;
            padding: 10px;
            margin-top: 60px;
            border:1px solid #e9e9e9;
        }
        
        .close{
            width:0px;
            right: -30px;
        }
        .open{
            width:300px;
        }
        #subFixbar
        {
            width: calc(100% - 280px);
        }
        .mini-sidebar #subFixbar
        {
            width: calc(100% - 100px);
        }
    </style>
    <div class="row" style="">
        <div style="z-index: 1;position: fixed;right: auto;left: auto;margin-right: 15px;margin-left: 25px;margin-top:15px" class="col-sm-12" id="subFixbar">
            <div class="card " id="sai-rpt-filter-box;" style="padding:10px;">
                <div class="card-body" style="padding: 0px;">
                    <h4 class="card-title pl-1"><i class='fas fa-file'></i> Laporan Tagihan Maintenance</h4>
                    <hr>
                    <form id="formFilter">
                        <div class="row" style="margin-left: -5px;">
                            <div class="col-sm-6">
                                <button type="button" id='btn-lanjut' class="btn btn-primary" style="margin-left: 6px;margin-top: 0"><i class="fa fa-filter"></i> Filter</button>          
                            </div>
                            <div class='col-sm-3'>
                                <div id="pager" style='padding-top: 0px;position: absolute;top: 0;right: 0;'>
                                    <ul id="pagination" class="pagination pagination-sm2"></ul>
                                </div>
                            </div>
                            <div class='col-sm-1' style='padding-top: 0'>
                            </div>
                            <div class='col-sm-2'>
                                <button type="button" class="btn btn-info float-right" style="margin-left: 6px;margin-top: 0" id="sai-rpt-print"><i class="fa fa-print"></i></button>
                                <button type="button" class="btn btn-success float-right" style="margin-left: 6px;margin-top: 0" id="btnExport"><i class="fa fa-file-excel"></i></button>
                                <button type="button" class="btn btn-primary float-right" style="margin-left: 6px;margin-top: 0" id="btnEmail" alt="Email"><i class="fa far fa-envelope"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id='mySidepanel' class='sidepanel close'>
        <h3 style='margin-bottom:20px;position: absolute;'>Filter Laporan</h3>
        <a href='#' id='btn-close'><i class="float-right ti-close" style="margin-top: 10px;margin-right: 10px;"></i></a>
        <form id="formFilter2" style='margin-top:50px'>
        <div class="row" style="margin-left: -5px;">
            <div class="col-sm-12">
                <div class="form-group" style='margin-bottom:0'>
                    <label for="kode_cust">Kode Customer</label>
                    <select name="kode_cust" id="kode_cust" class="form-control">
                    <option value="">Pilih Kode Customer</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group" style='margin-bottom:0'>
                    <label for="no_bill">Nomor Tagihan</label>
                    <select name="no_bill" id="no_bill" class="form-control">
                    <option value="">Pilih Nomor Tagihan</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group" style='margin-bottom:0'>
                    <label for="no_kontrak">Nomor Kontrak</label>
                    <select name="no_kontrak" id="no_kontrak" class="form-control">
                    <option value="">Pilih Nomor Kontrak</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" style="margin-left: 6px;margin-top: 28px;"><i class="fa fa-search" id="btnPreview2"></i> Preview</button>
            </div>
        </div>
        </form>
    </div>
    <div class="container-fluid" style="margin-top:155px">
        <div class="row" >
            <div class="col-sm-12">
                <div class="card " id="sai-rpt-filter-box;">
                    <div class='card-body' style='padding: 10px;'>
                        <div id="loading-bar" style="display:none"><button type="button" disabled="" class="btn btn-info">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button></div>
                    </div>
                    <div class="card-body table-responsive" id="content-lap" style='height:380px'>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalEmail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id='formEmail'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Kirim Email</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class='form-group row'>
                            <label for="modal-email" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type='text' class='form-control' maxlength='100' name='email' id='modal-email' required>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="modal-nama" class="col-3 col-form-label">Nama</label>
                            <div class="col-9">
                                <input type='text' class='form-control' maxlength='100' name='nama' id='modal-nama' required >
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type="button" disabled="" style="display:none" id='loading-bar2' class="btn btn-info">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button>
                        <button type='submit' id='email-submit' class='btn btn-primary'>Kirim</button> 
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>

    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>

    <script type="text/javascript">
        var $loadBar = $('#loading-bar');
        var $loadBar2 = $('#loading-bar2');

            function getCustomer() {
        $.ajax({
            type:'GET',
            url:"{{url('sai-master/customer')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    var select = $('#kode_cust').selectize();
                    select = select[0];
                    var control = select.selectize;
                    control.clearOptions();

                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].nama, value:result.daftar[i].kode_cust}]);
                        }
                    }
                }else if(!result.status && result.daftar.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('sai-auth/login') }}";
                    })
                } else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan pada server'
                })
            }
        });
    }

    function getTagihanMT() {
        $.ajax({
            type:'GET',
            url:"{{url('sai-trans/tagihan-maintain')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    var select = $('#no_bill').selectize();
                    select = select[0];
                    var control = select.selectize;
                    control.clearOptions();

                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].no_bill, value:result.daftar[i].no_bill}]);
                        }
                    }
                }else if(!result.status && result.daftar.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('sai-auth/login') }}";
                    })
                } else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan pada server'
                })
            }
        });
    }

    function getKontrakMT() {
        $.ajax({
            type:'GET',
            url:"{{url('sai-trans/kontrak')}}/MAINTENANCE",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    var select = $('#no_kontrak').selectize();
                    select = select[0];
                    var control = select.selectize;
                    control.clearOptions();

                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].no_kontrak, value:result.daftar[i].no_kontrak}]);
                        }
                    }
                }else if(!result.status && result.daftar.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('sai-auth/login') }}";
                    })
                } else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan pada server'
                })
            }
        });
    }

    function openNav() {
        var element = $('#mySidepanel');
        
        var x = $('#mySidepanel').attr('class');
        var y = x.split(' ');
        if(y[1] == 'close'){
            element.removeClass('close');
            element.addClass('open');
        }else{
            element.removeClass('open');
            element.addClass('close');
        }
    }

    $('.card-body').on('click', '#btn-lanjut', function(e){
        e.preventDefault();
        getTagihanMT();
        getCustomer();
        getKontrakMT();
        openNav();
    });

    $('.sidepanel').on('click', '#btn-close', function(e){
        e.preventDefault();
        openNav();
    });

    var $formData = "";
    
    $('.sidepanel').on('submit', '#formFilter2', function(e){
        e.preventDefault();
        $formData = new FormData(this);
        xurl = "{{ url('/sai-auth/form')}}/rptTagihanMT";
        $('#content-lap').load(xurl);
        openNav();
        // drawLapReg(formData);
    });
    </script>