

<style>
    .text-blue{
        color:#0058E4;
    }
    .list-group > .list-group-item{
        background:none;
    }

    .icon-profile-user{
        background: #0058E4 !important;
        -webkit-mask-image: url("{{ url('img/mobile-dash/fi-rr-user.svg') }}");
        mask-image: url("{{ url('img/mobile-dash/fi-rr-user.svg') }}");
        width: 16px !important;
        height: 20px !important;
        display:inline-flex;
    }

    .icon-profile-key{
        background: #0058E4 !important;
        -webkit-mask-image: url("{{ url('img/mobile-dash/fi-rr-key.svg') }}");
        mask-image: url("{{ url('img/mobile-dash/fi-rr-key.svg') }}");
        width: 19px !important;
        height: 19px !important;
        display:inline-flex;
    }
</style>
<div class="row mt-2">
    <div class="col-12 text-center">
        <h6>Profile</h6>
    </div>
    <div class="col-12">
        <div class="text-center dash-profile">
            <img alt="Profile" src="{{ asset('asset_elite/images/user.png') }}" id="profile-mobile" class="img-thumbnail border-0 rounded-circle mb-2 list-thumbnail" style="width:80px">
            <p class="list-item-heading mb-1 text-blue" id="nama">{{ Session::get('namaUser') }}</p>
            <p id="jabatan">{{ Session::get('jabatan') }}</p>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <ul class="list-group">
            <li class='list-group-item mb-1 px-2 py-2'>
                <a href='#' data-href='' class='a_link'>
                    <span style="width: 20px;display: inline-flex;">
                        <i class="sai-icon icon-profile-user"></i>
                    </span> 
                    <span class='ml-2' style='position:absolute;bottom:10px'>Data Pribadi</span>
                    <span class="float-right">
                        <i class="simple-icon-arrow-right"></i>
                    </span> 
                </a>
            </li>
            <li class='list-group-item mb-1 px-2 py-2'>
                <a href='#' data-href='' class='a_link'>
                    <span style="width: 20px;display: inline-flex;">
                        <i class="sai-icon icon-profile-key"></i>
                    </span> 
                    <span class='ml-2' style='position:absolute;bottom:10px'>Username dan Password</span>
                    <span class="float-right">
                        <i class="simple-icon-arrow-right"></i>
                    </span> 
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 text-center" style="position: absolute;bottom: 0px;">
        <a href="{{ url('mobile-dash/logout') }}" style="color:red">Keluar</a>
    </div>
</div>
<div style='height:100px;'>&nbsp;</div>
<script src="{{ asset('asset_dore/js/croppie.min.js') }}"></script>
<script>
   
</script>