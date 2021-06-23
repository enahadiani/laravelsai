<link rel="stylesheet" href="{{ asset('asset_silo/css/dashboardDetail.css') }}" />

<div class="row">
    <div class="col-12">
        <div class="card no-padding-px">
            <div class="row">
                <div class="col-12">
                    <h5 class="with-padding-left">Posisi Kebutuhan</h5>
                    <button id="btn-back" class="float-right btn button-back with-margin-right">Back</button>
                </div>
                <div class="col-12">
                    <ul class="nav nav-tabs separator-tabs nav-custom" role="tablist">
                        <li class="nav-item with-padding-left mr-4">
                            <a class="nav-link active" id="JK" href="#jk-tab" data-toggle="tab" role="tab" aria-controls="jk-tab" aria-selected="true">Justifikasi Kebutuhan</a>
                            <div class="info-tabs" id="count-jk">12</div>
                        </li>
                        <li class="nav-item mr-4">
                            <a class="nav-link" id="VR" href="#vr-tab" data-toggle="tab" role="tab" aria-controls="vr-tab" aria-selected="false">Verifikasi</a>
                            <div class="info-tabs" id="count-vr">4</div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="AC" href="#ac-tab" data-toggle="tab" role="tab" aria-controls="ac-tab" aria-selected="false">Approval Cabang</a>
                            <div class="info-tabs" id="count-ac">1</div>
                        </li>
                    </ul>
                    <div class="tab-content mt-3 with-padding-left with-padding-right">
                        <div class="tab-pane show active" id="jk-tab" role="tabpanel" aria-labelledby="jk-tab">
                            ini tab justifikasi kebutuhan
                        </div>
                        <div class="tab-pane" id="vr-tab" role="tabpanel" aria-labelledby="vr-tab">
                            ini tab verifikasi
                        </div>
                        <div class="tab-pane" id="ac-tab" role="tabpanel" aria-labelledby="ac-tab">
                            ini tab approval cabang
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#btn-back').click(function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('silo-auth/cek_session') }}",
            dataType: 'json',
            async:false,
            success:function(result) {    
                if(!result.status){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                }else{   
                    $('.body-content').load("{{ url('silo-auth/form/dashApv2') }}");
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/silo-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }        
            }
        });
    })
</script>