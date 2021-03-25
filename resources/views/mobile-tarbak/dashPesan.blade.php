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
    .bold{
        font-weight:bold;
    }
    .bold-text{
        font-weight:bold;
        color:black !important;
    }
    
    .bold-grey{
        font-weight:bold;
        background:#f0f2fe;
    }
    .detail-pesan,.detail-notif{
        cursor:pointer;
    }
</style>
<div class="row mt-3">
    <div class="col-12 px-0">
        <h6 class="pl-3">Pesan</h6>
        <ul class="nav nav-tabs col-12 nav-custom2" role="tablist">
            <li class="nav-item w-50 text-center"> <a class="nav-link active" data-toggle="tab" data-href="info" href="#inbox" role="tab" aria-selected="true"><span class="hidden-xs-down">Inbox <span class="badge badge-pill badge-info jum-read" style="background: #4361EE;padding: 0.35rem;position: absolute;top: 5px;border-radius: 50%;min-width: 20px;font-size: 9px !important;min-height: 20px;">0</span></span></a> </li>
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
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script>
    getJumlahNotRead();
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    $kode_matpel = "";
    $nik_guru = "";
    $('#bottom-sheet-close').hide();
    $('#content-bottom-sheet').css({"max-height":"95vh","overflow-y":"scroll","overflow-x":"hidden"});
    $('.c-bottom-sheet__sheet').css({ "width":"100%","margin-left": "0%", "margin-right":"0%"});

    function updateStatusRead(no_pesan){
        $.ajax({
            type: 'POST',
            url: "{{ url('mobile-tarbak/update-status-read') }}",
            dataType: 'json',
            data:{'no_pesan' : no_pesan},
            async:false,
            success:function(result){    
                console.log(result);
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
                    window.location="{{ url('/mobile-tarbak/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

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
                                if(line.sts_read_mob == 0){
                                    var bold = "bold-text";
                                }else{
                                    var bold = "";
                                }
                                html+=`<div class="row mb-3 detail-pesan" data-nik_guru="`+line.nik_user+`" data-kode_matpel="`+line.kode_matpel+`" data-no_pesan="`+line.no_bukti+`">
                                    <div class="col-2 text-center pr-0">
                                        <img src="`+img+`" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" style="height:45px;width: 45px;">
                                    </div>
                                    <div class="col-10">
                                        <p class="`+bold+` list-item-heading mb-1 truncate" style="font-size:1rem !important">`+line.nama+` <span class='float-right text-right text-muted' style="font-size:10px !important">`+line.tanggal+`</span></p>
                                        <p class="`+bold+` mb-2 text-muted text-small" style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">`+line.judul+`</p>
                                    </div>
                                </div>`;
                            }
                            $('.tab-pesan').html(html+"<div style='height:100px;'>&nbsp;</div>");
                            $('.tab-pesan').on('click', '.detail-pesan', function(e){
                                e.preventDefault();
                                $kode_matpel = $(this).data('kode_matpel');
                                $nik_guru = $(this).data('nik_guru');
                                var no_pesan = $(this).data('no_pesan');
                                updateStatusRead(no_pesan);
                                loadForm("{{ url('mobile-tarbak/form/dashPesanDetail') }}");
                            })
                        }else{
                            for(var i=0; i < result.data.length ; i++){
                                var line = result.data[i];
                                var config = "{{ config('api.url') }}";
                                if(line.sts_read_mob == 0){
                                    var bold = "bold-grey";
                                }else{
                                    var bold = "";
                                }
                                if(line.file_dok != "" && line.file_dok != "-" ){
                                    var img = config+"mobile-sekolah/storage/"+line.file_dok;
                                    html+=`<div class="row mx-1 detail-notif `+bold+`" data-tanggal="`+line.tanggal+`" data-pesan="`+line.pesan+`" data-img="`+img+`" data-no_pesan="`+line.no_bukti+`">
                                    <div class="col-12 col-grid">
                                    <p class="text-muted text-small mb-0" style="font-size:9px !important"><img src="{{ asset('img/mobile-tarbak/notifc.jpeg') }}" class="mr-3"> Pemberitahuan | `+line.tanggal+`</p>
                                    </div>
                                    <div class="col-9 col-grid" style="display: -webkit-box;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 4;-webkit-box-orient: vertical;max-height: 80px;word-break: break-word;">
                                    `+line.pesan+`
                                    </div>
                                    <div class="col-3 pl-0">
                                        <img src="`+img+`" alt="" style="width:80px;height:80px;border-radius:20px;margin-bottom:10px">
                                    </div>
                                </div>
                                <div class="separator mx-0"></div>`;
                                }else{
                                    
                                    html+=`<div class="row mx-1 detail-notif `+bold+`" data-tanggal="`+line.tanggal+`" data-pesan="`+line.pesan+`" data-img="-" data-no_pesan="`+line.no_bukti+`">
                                    <div class="col-12 col-grid">
                                        <p class="text-muted text-small mb-0" style="font-size:9px !important"><img src="{{ asset('img/mobile-tarbak/notifc.jpeg') }}" class="mr-3"> Pemberitahuan | `+line.tanggal+`</p>
                                        </div>
                                        <div class="col-12" style="display: -webkit-box;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 4;-webkit-box-orient: vertical;max-height: 80px;word-break: break-all;white-space: pre-wrap;">
                                        `+line.pesan+`
                                        </div>
                                    </div>
                                    <div class="separator mx-0"></div>`;
                                }
                            }
                            $('.tab-notif').html(html+"<div style='height:100px;'>&nbsp;</div>");
                            $('.tab-notif').on('click', '.detail-notif', function(e){
                                e.preventDefault();
                                var no_pesan = $(this).data('no_pesan');
                                updateStatusRead(no_pesan);
                                $('#content-bottom-sheet').html('');
                                var img = $(this).data('img');
                                var tanggal = $(this).data('tanggal');
                                var pesan = $(this).data('pesan');

                                if(img == "-"){
                                    var html_img = "";
                                }else{
                                    var html_img = `<img src="`+img+`" class="mb-4 mx-auto" style='width:80vw'>`;
                                }
                                var html = `
                                <div class="row p-3">
                                    <div class="col-12 text-center">
                                        <p class="bold mb-4">Pemberitahuan</p>
                                        `+html_img+`
                                        <p class="bold mb-2 text-small text-left">`+tanggal+`</p>
                                        <p class="text-left">`+pesan+`</p>
                                    </div>
                                </div>
                                `;
                                $('#content-bottom-sheet').html(html);
                                $('#trigger-bottom-sheet').trigger("click");
                            })
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