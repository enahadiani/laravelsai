<style>
    .nav-custom2 .nav-link {
        width: max-content;
        margin: 0 auto;
        padding: 1rem 1rem;
    }
    .nav-custom2{
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
    }
    .nav-custom2 .nav-link.active {
        color:#4361EE;
    }
    .nav-custom2 .nav-link.active::before {
       
        background: #4361EE !important;
        
    }
    .col-grid{
        display:grid !important;
    }
</style>
<div class="row mt-3">
    <div class="col-12 px-0">
        <h6 class="pl-3">Pesan</h6>
        <ul class="nav nav-tabs col-12 nav-custom2" role="tablist">
            <li class="nav-item w-50 text-center"> <a class="nav-link active" data-toggle="tab" data-href="info" href="#inbox" role="tab" aria-selected="true"><span class="hidden-xs-down">Inbox <span class="badge badge-pill badge-info" style="background: #4361EE;padding: 0.35rem;position: absolute;top: 5px;border-radius: 50%;min-width: 20px;font-size: 9px !important;min-height: 20px;">1</span></span></a> </li>
            <li class="nav-item w-50 text-center"> <a class="nav-link" data-toggle="tab" data-href="notif" href="#notif" role="tab" aria-selected="true"><span class="hidden-xs-down">Notifikasi</span></a> </li>
        </ul>
        <div class="tab-content tabcontent-border col-12 p-0">
            <div class="tab-pane active" id="inbox" role="tabpanel">
                <div class="tab-pesan p-3">
                    
                </div>
            </div>
            <div class="tab-pane" id="notif" role="tabpanel">
                <div class="tab-notif p-3">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getInfo(jenis){
        if(jenis == "info"){
            var url = "{{ url('mobile-tarbak/mob-info') }}";
        }else{
            var url = "{{ url('mobile-tarbak/mob-notif') }}";
        }
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success:function(result){  
                var html = "";  
                $('.tab-pesan').html('');
                $('.tab-notif').html('');
                if(result.status){
                    if(result.data.length > 0){
                        if(jenis == "info"){
                            for(var i=0; i < result.data.length ; i++){
                                var line = result.data[i];
                                var config = "{{ config('api.url') }}";
                                config = "https://api.simkug.com/api/";
                                if(line.foto != "" && line.foto != "-" ){
                                    var img = config+"mobile-sekolah/storage/"+line.foto;
                                }else{
                                    var img = "{{ asset('asset_elite/images/user.png') }}";   
                                }
                                html+=`<div class="row mb-3">
                                    <div class="col-2 text-center pr-0">
                                        <img src="`+img+`" alt="Profile" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" style="height:50px">
                                    </div>
                                    <div class="col-10">
                                        <p class="list-item-heading mb-1 truncate">`+line.nama+` <span class='float-right text-right text-muted' style="font-size:10px !important">`+line.tanggal+`</span></p>
                                        <p class="mb-2 text-muted text-small" style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">`+line.judul+`</p>
                                    </div>
                                </div>`;
                            }
                            $('.tab-pesan').html(html);
                        }else{
                            for(var i=0; i < result.data.length ; i++){
                                var line = result.data[i];
                                var config = "{{ config('api.url') }}";
                                config = "https://api.simkug.com/api/";
                                if(line.file_dok != "" && line.file_dok != "-" ){
                                    var img = config+"mobile-sekolah/storage/"+line.file_dok;
                                    html+=`<div class="row">
                                    <div class="col-12 col-grid">
                                    <p class="text-muted text-small mb-0" style="font-size:9px !important"><img src="{{ asset('img/mobile-tarbak/notifc.jpeg') }}" class="mr-3"> Pemberitahuan | `+line.tanggal+`</p>
                                    </div>
                                    <div class="col-9 col-grid" style="display: -webkit-box;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 4;-webkit-box-orient: vertical;max-height: 80px;word-break: break-all;">
                                    `+line.pesan+`
                                    </div>
                                    <div class="col-3 pl-0">
                                        <img src="`+img+`" alt="" style="width:80px;height:80px;border-radius:20px">
                                    </div>
                                </div>
                                <div class="separator mt-4 mb-3"></div>`;
                                }else{
                                    
                                    html+=`<div class="row">
                                    <div class="col-12 col-grid">
                                        <p class="text-muted text-small mb-0" style="font-size:9px !important"><img src="{{ asset('img/mobile-tarbak/notifc.jpeg') }}" class="mr-3"> Pemberitahuan | `+line.tanggal+`</p>
                                        </div>
                                        <div class="col-12" style="display: -webkit-box;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 4;-webkit-box-orient: vertical;max-height: 80px;word-break: break-all;">
                                        `+line.pesan+`
                                        </div>
                                    </div>
                                    <div class="separator mt-4 mb-3"></div>`;
                                }
                            }
                            $('.tab-notif').html(html);
                        }
                    }
                }
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

    getInfo("info");

    $('.nav-custom2').on('click','.nav-link',function(e){
        e.preventDefault();
        var jenis = $(this).data("href");
        getInfo(jenis);
    })
</script>