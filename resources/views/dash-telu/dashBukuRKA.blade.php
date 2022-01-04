<style>
    .card-berita{
        border:none;
        box-shadow:none;
        cursor: pointer;
    }
    .bold{
        font-weight:bold;
    }
    .listing-desc{
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
    }
    .listing-heading{
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        height:50px !important;
    }
</style>
<link rel="stylesheet" href="{{ asset('asset_dore/css/main.css') }}">
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <nav class="navbar sticky-top navbar-light text-center" style="z-index:1 !important">
                <a class="navbar-brand ml-3" id="btn-home" href="#"><h6>Home</h6></a>
                <ul class="nav justify-content-center mx-auto" id="nav-kategori">
                    
                </ul>
                <a class="navbar-brand" href="#" style="width: 250px;">
                    <div style="width:100%" class="search d-inline-block float-md-left mr-1 mb-1 align-top search-asset">
                        <input class="inp-repo" style="width:100%;height: 32px;" placeholder="Cari">
                        <i class="simple-icon-magnifier" style="position:absolute;z-index:10;cursor:pointer;right:10px;top:6px;font-size:18px;color:#d7d7d7" id="search-repo"></i>
                    </div>
                </a>
            </nav>
            <!-- <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a> -->
        </div>
    </div>
    <div class="row mt-3" id="list-berita">
    </div>
</div>

<script src="{{ asset('asset_dore/js/vendor/jquery.autoellipsis.js') }}"></script>
<script>
 
 $('body').addClass('dash-contents');
 $('html').addClass('dash-contents');

if(localStorage.getItem("dore-theme") == "dark"){
    $('#btn-filter').removeClass('btn-outline-light');
    $('#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btn-filter').removeClass('btn-outline-dark');
    $('#btn-filter').addClass('btn-outline-light');
}

var $mode = localStorage.getItem("dore-theme");
var $watch_id = "";
var $watch_ket = "";
var $watch_tipe = "";
var $watch_no = "";

function hideParent(id){
    $('.left_'+id).hide();
    $('.right_'+id).removeClass('w-60');
    $('.right_'+id).addClass('w-100');
}

function getBeritaList(kode=null,sub=null,judul){
    $.ajax({
        type:"GET",
        url:"{{ url('telu-dash/buku-rka-list') }}",
        dataType:"JSON",
        data:{kode_pp:kode,kode_sub:sub},
        success: function(result){
            var html = "";
            $('#list-berita').html(html);
            if(result.status){
                if(result.data.length > 0){
                    for(var i=0; i < result.data.length; i++){
                        var line = result.data[i];

                        html+=`
                        <div class="col-12 col-lg-8 row-berita">
                            <p hidden class='no_bukti'>`+line.no_bukti+`</p>
                            <div class="card flex-row listing-card-container p-2 card-berita">
                                <div class="w-60 d-flex align-items-center right_`+line.no_bukti+`">
                                    <div class="card-body py-2 ">
                                        <p class='text-primary bold mb-0'>`+line.kode_pp+` - `+line.nama_pp+`</p>
                                        <p class='text-muted text-small'>By `+line.nama_buat+` - `+line.tanggal+`</p>
                                        <div class="listing-desc text-muted ellipsis" style="">`+line.keterangan+`</div>
                                    </div>
                                </div>
                            </div>
                            <div class='separator my-3'></div>
                        </div>
                        `;
                    }
                    $('#list-berita').html(html);
                    $('#list-berita').on('click','.row-berita',function(e){
                        e.preventDefault();
                        var kode = $(this).closest('div').find('p.no_bukti').html();
                        var url = "{{ url('telu-dash/buku-rka-detail') }}/"+kode;
                        if(url == "" || url == "-"){
                            return false;
                        }else{
                            loadForm(url); 
                        }
                    });

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
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
    
}

getBeritaList();

$('.search').on('click','#search-repo',function(e){
    e.preventDefault();
    console.log('click');
    var judul = $('.inp-repo').val();
    if(judul != undefined && judul != ""){
        getBeritaList(null,null,judul);
    }
})

$('.search').on('keydown','.inp-repo',function(e){
    if(e.which == 13){
        e.preventDefault();
        console.log('enter');
        var judul = $('.inp-repo').val();
        if(judul != undefined && judul != ""){
            getBeritaList(null,null,judul);
        }
    }
})

$('#btn-home').on('click',function(e){
    e.preventDefault();
    getBeritaList();
})

</script>