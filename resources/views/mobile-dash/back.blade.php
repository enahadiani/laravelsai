<style>
    .back-menu:active,.back-menu:hover{
        background: #242424 !important;
    }

</style>
<div class="row mb-3">
    <div class="col-8 back-menu px-0" style="cursor:pointer" >
        <h6 class="pl-3" >
            <i class="simple-icon-arrow-left text-left"></i> 
            <span class="nama-menu ml-3" style="font-size: 1.2rem !important;"></span>
        </h6>
    </div>
    <div class="col-4 px-0">
        <a class="btn btn-block float-right pl-0 py-0" href="#" id="btn-filter" style="font-size:16px !important"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
    </div>
</div>
<script>
    var bottomSheetFilter = new BottomSheet("country-selector");
    document.getElementById("btn-filter").addEventListener("click", bottomSheetFilter.activate);
    window.bottomSheetFilter = bottomSheetFilter;

    $('.back-menu').click(function(e){
        e.preventDefault();
        loadForm("{{ url('mobile-dash/form') }}/"+form);
    });
</script>