<style>
    .bg-blue{
        background:#4361EE;
        height:100px;
        border-bottom-left-radius:25px;
        border-bottom-right-radius:25px;
    }
    .bold{
        font-weight:bold;
    }
</style>
<div class="row">
    <div class="col-12 bg-blue">
        <p class="mx-auto text-center bold mt-2" style="
        color:white !important;font-size:12pt !important;z-index:1">SD Taruna Bakti</p>
        <div class="card d-flex flex-row mb-4" style="margin: 0 18px;">
            <a class="d-flex" href="#">
            <img alt="Profile" id="profile-img" src="" class="img-thumbnail border-0 rounded-circle m-4 list-thumbnail align-self-center" style="height: 50px;margin: 15px !important;">
            </a>
            <div class=" d-flex flex-grow-1 min-width-zero">
                <div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero" style="padding: 1rem;">
                    <div class="min-width-zero">
                        <a href="#">
                            <p class="list-item-heading mb-1 truncate bold" style="font-size:12pt !important">{{ Session::get('namaUser') }}</p>
                        </a>
                        <p class="mb-2 text-muted text-small">{{ Session::get('kode_kelas') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top:40px">
    <div class="col-12">
        <h6 class="bold" style="font-size:12pt !important">Mata Pelajaran</h6>
    </div>
</div>
<div class="row matpel">
</div>
<div style='height:100px;'>&nbsp;</div>
<script>
    $('body').addClass('dash-contents');
    $('html').addClass('dash-contents');
    if("{{ Session::get('foto') }}" != "-" && "{{ Session::get('foto') }}" != ""){
        var img = "{{ config('api.url') }}sekolah/storage/{{ Session::get('foto') }}";
    }else{
        var img = "{{ asset('asset_elite/images/user.png') }}";
    }
    $('#profile-img').attr('src',img);

    var $kode_matpel = "";
    var $kode_kelas = "{{ Session::get('kode_kelas') }}";
    function getMatpel(){
        $.ajax({
            type: "GET",
            url: "{{ url('mobile-tarbak/matpel') }}",
            dataType: 'json',
            data: {'kode_kelas': $kode_kelas},
            success:function(result){  
                var html = "";  
                if(result.status){
                    if(result.data.length > 0){
                        for(var i=0; i < result.data.length; i++){
                            var line = result.data[i];
                            html +=` <div class="col-4 mb-4">
                                <div class="card trace-matpel" style="border-radius:30px;cursor:pointer" data-kode_matpel="`+line.kode_matpel+`" >
                                    <div class="card-body mx-auto text-center" style="padding:1.5rem 0.5rem;">
                                        <img src="{{ asset('img/mobile-tarbak/icon-matpel/`+line.kode_matpel+`.png') }}" alt="" style="width:50px">
                                        <p class="mb-0" style="font-size:0.95rem !important">`+line.singkatan+`</p>
                                    </div>
                                </div>
                            </div>`;
                        }
                    }
                }
                $('.matpel').html(html);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-tarbak/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getMatpel();
    $('.matpel').on('click','.trace-matpel',function(e){
        e.preventDefault();
        $kode_matpel = $(this).data('kode_matpel');
        loadForm("{{ url('mobile-tarbak/form/dashSiswaDetail') }}");
    })
</script>