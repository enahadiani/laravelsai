<link rel="stylesheet" href="{{ asset('trans.css') }}" />

<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:69.2px">
                    <h6 id="judul-form" style="position:absolute;top:25px">Transfer Data</h6>
                </div>
                <div class="separator"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-group row hidden" id="row-id">
                        <div class="col-9">
                            <input class="form-control" type="text" id="id" name="id" readonly hidden>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Periode</label>
                                    <select name="periode" id="periode" class="form-control" required></select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="kode_fs">Kode FS</label>
                                    <select name="kode_fs" id="kode_fs" class="form-control" required></select>
                                </div>
                                <div class="col-md-3 col-sm-12" style="min-height:64px;">
                                    <button type="submit" class="btn btn-primary" style="position:relative;top:25px" id="btn-save" ><i class="fa fa-save"></i> Proses</button>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 nav-grid" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-grid" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Proses</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-grid" role="tabpanel">
                            <div class='col-xs-12 nav-control'>
                                <a class="total-row"><span id="total-row" ></span></a>
                            </div>
                            <div class='col-xs-12 px-0 py-0 mx-0 my-0' style='min-height:420px;'>
                                <table id="table-data">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th width='15%'>Kode Proses</th>
                                            <th width='75%'>Proses</th>
                                            <th width='10%'>Hasil</th>
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
</form>
<!-- FORM INPUT  -->

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
// DEFAULT SETTING //

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var scrollform = document.querySelector('.form-body');
var psscrollform = new PerfectScrollbar(scrollform);

// END DEFAULT SETTINGS //

// FUNCTION HELPERS //
function getPeriodeSelect(){
    $.ajax({
        type: 'GET',
        url: "{{ url('telu-trans/periode') }}",
        dataType: 'json',
        async:false,
        success:function(result){   
            var select = $('#periode').selectize();
            select = select[0];
            var control = select.selectize;
            if(result.status){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                    for(i=0;i<result.daftar.length;i++){
                        control.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                    }
                    control.setValue("{{ Session::get('periode') }}");
                }
            } 
            else if(!result.status && result.message == "Unauthorized"){
                window.location.href = "{{ url('dash-telu/sesi-habis') }}";
            } else{
                alert(result.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

getPeriodeSelect();

    function getFSSelect(){
        $.ajax({
            type: 'GET',
            url: "{{ url('telu-master/fs') }}",
            dataType: 'json',
            async:false,
            success:function(result){   
                var select = $('#kode_fs').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_fs, value:result.daftar[i].kode_fs}]);
                        }
                        control.setValue("FS1");
                    }
                } 
                else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('dash-telu/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/dash-telu/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getFSSelect();

// DATATABLE FUNCTION //

var dataTable = generateTableWithoutAjax(
    "table-data",
    [
        {
            'targets': 2,
            'data': null,
            'className': 'text-center',
            'render': function ( data, type, row, meta ) {
                if(row.status == '1'){
                    return "<a href='#' title='Not OK'><i class='simple-icon-exclamation' style='font-size:18px'></i></a>";
                    
                }else{
                    return "<a href='#' title='OK'><i class='simple-icon-check' style='font-size:18px'></i></a>";
                }
            }
        }
    ],
    [
        { data: 'kode_proses' },
        { data: 'nama'},
        { data: 'status' }
    ],
    []
);

$.fn.DataTable.ext.pager.numbers_length = 5;

$("#searchData").on("keyup", function (event) {
    dataTable.search($(this).val()).draw();
});

$("#page-count").on("change", function (event) {
    var selText = $(this).val();
    dataTable.page.len(parseInt(selText)).draw();
});
// END DATATABLE FUNCTION //

// SUBMIT ACTION //
$('#form-tambah').validate({
    ignore: [],
    errorElement: "label",
    submitHandler: function (form) {

        var formData = new FormData(form);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        $.ajax({
            type: 'POST',
            url: "{{ url('telu-trans/transfer-data') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                if(result.data.status){
                    msgDialog({
                        id: '',
                        type:'sukses',
                        title: 'Sukses',
                        text: result.data.message
                    });

                    $('#form-tambah')[0].reset();
                    $('#form-tambah').validate().resetForm();
                    $('#method').val('post');
                    $('#id').val('');
                    dataTable.clear().draw();
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        dataTable.rows.add(result.data.data).draw(false);
                    }

                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('dash-telu/sesi-habis') }}";
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

    },
    errorPlacement: function (error, element) {
        var id = element.attr("id");
        $("label[for="+id+"]").append("<br/>");
        $("label[for="+id+"]").append(error);
    }
});
// END SUBMIT ACTION //

</script>