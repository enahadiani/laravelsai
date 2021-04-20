<div class="row mb-3">
    <div class="col-12 text-center back-menu" style="cursor:pointer" >
        <h6 class="bold" style="font-weight: bold;"><i class="simple-icon-arrow-left text-left" style="left: 20px;position: absolute;"></i> <span class="nama-menu" style="font-size: 1.2rem !important;"></span></h6>
    </div>
</div>
<script>
    $('.back-menu').click(function(e){
        e.preventDefault();
        loadForm("{{ url('mobile-dash/form') }}/"+form);
    });
</script>