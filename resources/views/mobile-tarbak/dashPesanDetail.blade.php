<div class="row">
    <div class="col-12 px-0">
        <div class="card d-flex flex-row mb-4 pl-0" style="border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;box-shadow:none;border-bottom:1px solid #dee2e6">
            <div class="detail-header my-auto pl-3">
                <a href="#" id="btn-back"><i class="iconsminds-left" style="font-size:18px; font-weight:bold"></i></a>
            </div>
            <a class="d-flex" href="#">
            <img alt="" id="img-guru" src="" class="img-thumbnail border-0 rounded-circle m-4 list-thumbnail align-self-center" style="height: 50px;margin: 15px !important;">
            </a>
            <div class=" d-flex flex-grow-1 min-width-zero">
                <div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero" style="padding: 1rem;">
                    <div class="min-width-zero">
                        <a href="#">
                            <p class="list-item-heading mb-1 truncate bold" style="font-size:12pt !important" id="nama_matpel"></p>
                        </a>
                        <p class="mb-2 text-muted text-small" id="nama_guru"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="detail_pesan"> 
    
</div>
<script>
    function getDetailPesan(){
        $.ajax({
            type: "GET",
            url: "{{ url('mobile-tarbak/mob-info-detail') }}",
            dataType: 'json',
            data: {'nik_guru': $nik_guru,'kode_matpel': $kode_matpel},
            success:function(result){  
                var html = "";  
                $('#detail_pesan').html('');
                if(result.status){
                    var config = "{{ config('api.url') }}";
                    config = "https://api.simkug.com/api/";
                    if(result.data_guru[0].foto != "" && result.data_guru[0].foto != "-" ){
                        var img = config+"mobile-sekolah/storage/"+result.data_guru[0].foto;
                    }else{
                        var img = "{{ asset('asset_elite/images/user.png') }}";   
                    }
                    $('#img-guru').attr("src",img);
                    $('#nama_matpel').html(result.data_guru[0].nama_matpel);
                    $('#nama_guru').html(result.data_guru[0].nama_guru);
                    if(result.data.length > 0){
                        for(var i=0; i < result.data.length;i++){
                            var line = result.data[i];
                            html+=`
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="card" style="border-top-left-radius:0;">
                                        <div class="card-body p-2" >
                                        <p class="mb-1 text-muted text-small" style='font-size:10px !important'>`+line.tanggal+`</p>
                                        <p class="list-item-heading mb-3 truncate bold" style="color:#4361EE">`+line.judul+`</p>
                                        <p style="white-space: pre-wrap;">`+line.pesan+`</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                        }
                    }
                }
                $('#detail_pesan').html(html+"<div style='height:100px;'>&nbsp;</div>");
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

    getDetailPesan();

    $('.detail-header').on('click','#btn-back',function(e){
        e.preventDefault();
        loadForm("{{ url('mobile-tarbak/form/dashPesan') }}");
    })
</script>