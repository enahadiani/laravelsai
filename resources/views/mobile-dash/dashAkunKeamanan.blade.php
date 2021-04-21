
<link rel="stylesheet" href="{{ asset('asset_dore/css/croppie.css') }}" />
<style>
    .bold{
        font-weight:bold;
    }
    .hidden{
        display:none;
    }
    html {
    --scrollbarBG: #fff0;
    --thumbBG: #fff0;
    }
    #content-bottom-sheet::-webkit-scrollbar 
    {
    width: 11px;
    }
    #content-bottom-sheet 
    {
    scrollbar-width: thin;
    scrollbar-color: var(--thumbBG) var(--scrollbarBG);
    }
    #content-bottom-sheet::-webkit-scrollbar-track 
    {
    background: var(--scrollbarBG);
    }
    #content-bottom-sheet::-webkit-scrollbar-thumb 
    {
    background-color: var(--thumbBG) ;
    border-radius: 6px;
    border: 3px solid var(--scrollbarBG);
    }
    .border-only-bottom{
        border:0 !important;
        border-bottom:1px solid #ced4da !important;
    }

    .form-control[readonly] {
        background-color: white;
        opacity: 1;
        color: #e9ecef;
    }
</style>
<style>
    .back-menu:active,.back-menu:hover{
        background: #242424 !important;
    }
</style>
<div class="row mb-3">
    <div class="col-12 back-menu px-0" style="cursor:pointer" >
        <h6 class="pl-3" >
            <i class="simple-icon-arrow-left text-left"></i> 
            <span class="nama-menu ml-3" style="font-size: 1.2rem !important;"></span>
        </h6>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <div class="card" style="background:none !important;box-shadow:none !important">
            <div class="card-body data-pribadi">
                <p class="text-muted text-small mb-1">Username </p>
                <p class="list-item-heading truncate" id="username"> </p>
                <p class="text-muted text-small mb-1">Password <a class="float-right ubah-data" style="color:#4361EE;cursor:pointer" href="#">Ubah</a></p>
                <p class="list-item-heading truncate" id="password"></p>
            </div>
        </div>
    </div>
</div>
<div style='height:100px;'>&nbsp;</div>
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>

<script src="{{ asset('asset_dore/js/croppie.min.js') }}"></script>
<script>
    // var bottomSheet = new BottomSheet("country-selector");
    // document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    // window.bottomSheet = bottomSheet;
    $('.nama-menu').html($nama_menu);
    $('.navbar_bottom').hide();
    // $('#content-bottom-sheet').css({"max-height":"95vh","overflow-y":"scroll","overflow-x":"hidden"});

    // $('.c-bottom-sheet__sheet').css({ "width":"100%","margin-left": "0%", "margin-right":"0%"});
    // $('#bottom-sheet-close').hide();
    function typePass(str){
        if(str != "" || str != undefined){

            var count = str.length;
            var text = "";
            if(count > 0){
                for(var i=0;i<count;i++){
                    // text+="•";
                    text+="*";
                }
            }
            return text;
        }
    }
    
    var $image_crop = "";
    function getProfile(){
        $.ajax({
            type: "GET",
            url: "{{ url('mobile-dash/profile') }}",
            dataType: 'json',
            success:function(result){  
                $('#username').html(result.data[0].nik);
                $('#password').html(typePass(result.data[0].password));
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-dash/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getProfile();
   
    $('.back-menu').click(function(e){
        e.preventDefault();
        loadForm("{{ url('mobile-dash/form') }}/dashAkun");
    });
</script>