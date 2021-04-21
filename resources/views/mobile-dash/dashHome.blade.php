<style>
    .list-group-item {
        border:none;
        background:none;
    }
    .bold{
        font-weight:bold;
    }
    .border-rounded-grey{
        background: #F6F6F6;
        padding: 8px 10px;
        border-radius: 50%;
    }
    .text-blue{
        color:#0058E4 !important;
    }
    
    .list-menudash > .list-group-item:active, .list-group-item:hover {
        background: #242424 !important;
    }
</style>
<div class="row">
    <div class="col-12">
        <h6 class="mt-3 mb-2 bold text-center">Daftar Dashboard</h6>
        <ul class="list-group list-menudash">
        </ul>
        <div style='height:100px;'>&nbsp;</div>
    </div>
</div>
<script>

    $('body').addClass('dash-contents');
    $('html').addClass('dash-contents');

    $('.list-menudash').on('click','.a_link',function(e){
        e.preventDefault();
        var form = $(this).data('href');
        var nama = $(this).closest('li').find('span.nama').html();
        $nama_menu = nama;
        var url = "{{ url('mobile-dash/form')}}/"+form;
        if(form == "" || form == "-"){
            return false;
        }else{
            loadForm(url);
        }
    });


    function loadMenu(){
        $.ajax({
            type: 'GET',
            url: "{{ url('mobile-dash/menu') }}",
            dataType: 'json',
            async:false,
            success:function(result){  
                $('.list-menudash').html('');
                if(result[0].status){
                    $('.list-menudash').html(result[0].html);
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
                    window.location="{{ url('/mobile-dash/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    loadMenu();
</script>