<style>
    .bg-grey{
        background: #F1FAEE;
        height: 100%;
    }
    #logo-matpel
    {
        width: 75px;
        height: 75px;
    }
    .bold{
        font-weight:bold;
    }
    .deskripsi-matpel > h6, .deskripsi-matpel > p {
        color:#4361EE;
    }
    .box-bottom {
        border-top-left-radius: 1.2rem !important;
        border-top-right-radius: 1.2rem !important;
        box-shadow: none !important;
    }
    .box-bottom > .card-body{
        z-index: 2;
        height: calc(100vh - 200px);
    }
    .nav-custom {
        border-bottom: 0 !important;
        margin-bottom: 20px;
    }
    .nav-custom > li > a.disabled {
        width: 80px;
    }

    .nav-custom > .nav-link.active::before {
        background: unset !important;
    }
    .nav-custom .nav-link.disabled {
        color: black !important;
    }
    .nav-custom .nav-link {
        padding: 2px 15px;
        color: #4361EE;
        margin: 0 2px;
    }
    .nav-custom .nav-link.active {
        background: #4361EE !important;
        border-radius: 15px;
        color:white;
    }
    .progress{
        height: 5px;
        background: #80808036;
        border-radius: 0;
    }
    .progress-bar{
        background:  #4361EE !important;
    }
</style>
<div class="row">
    <div class="col-12 bg-grey p-0">
        <div class="row mt-3 mx-auto">
            <div class="col-12 detail-header">
                <a href="#" id="btn-back"><i class="iconsminds-left" style="font-size:18px; font-weight:bold"></i></a>
            </div>
            <div class="col-4 text-center mx-auto my-auto"><img src="" alt="" id="logo-matpel"></div>
            <div class="col-8 deskripsi-matpel">
                <h6 id="nama_matpel"></h6>
                <p class="mb-0" id="nama_guru"></p>
                <p class="mb-0" id="nama_ta"></p>
            </div>
        </div>
        <div class="row mt-3 mx-auto ">
            <div class="col-12 p-0">
                <div class="card box-bottom">
                    <div class="card-body">
                        <ul class="nav nav-tabs col-12 nav-custom " role="tablist">
                            <li class="nav-item"><a class="nav-link disabled pl-0" data-toggle="tab" href="#" role="tab" aria-selected="true"><span class="hidden-xs-down">Semester</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" data-href="All" href="#data-semua" role="tab" aria-selected="true"><span class="hidden-xs-down">Semua</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" data-href="1"  href="#data-ganjil" role="tab" aria-selected="true"><span class="hidden-xs-down">Ganjil</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" data-href="2" href="#data-genap" role="tab" aria-selected="true"><span class="hidden-xs-down">Genap</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-semua" role="tabpanel">
                            </div>
                            <div class="tab-pane" id="data-ganjil" role="tabpanel">
                            </div>
                            <div class="tab-pane" id="data-genap" role="tabpanel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#logo-matpel').attr("src", "{{ asset('img/mobile-tarbak/icon-matpel')}}/"+$kode_matpel+".png");

    function getDetail(kode_sem){
        $.ajax({
            type: "GET",
            url: "{{ url('mobile-tarbak/matpel-detail') }}",
            dataType: 'json',
            data: {'kode_kelas': $kode_kelas,'kode_matpel': $kode_matpel,'kode_sem': kode_sem},
            success:function(result){  
                var html = "";  
                $('#data-semua').html('');
                $('#data-ganjil').html('');
                $('#data-genap').html('');
                if(result.status){
                    if(result.data_ta.length > 0){
                        $('#nama_ta').html(result.data_ta[0].nama);
                    }
                    if(result.data_guru.length > 0){
                        $('#nama_guru').html(result.data_guru[0].nama_guru);
                        $('#nama_matpel').html(result.data_guru[0].nama_matpel);
                    }
                    if(result.data_kompetensi.length > 0){
                        result.data_kompetensi.reverse()
                        for(var i=0; i < result.data_kompetensi.length; i++){
                            var line = result.data_kompetensi[i];
                            var content = `<div class="col-12">
                                <p class="bold">Kompetensi Dasar `+line.kode_kd+`</p>
                                <p>`+line.nama_kd+`</p>`;
                                var det = "";
                                if(line.pelaksanaan.length > 0){
                                    for(var j =0; j < line.pelaksanaan.length; j++){
                                        var line2 = line.pelaksanaan[j];
                                        if(line2.sts_kkm == "lulus"){
                                            var color = "#4361EE";
                                        }else{
                                            var color = "#E63946";
                                        }
                                        det+=`
                                        <div class="card mb-3" style="box-shadow:none">
                                        <div class="card-body bg-grey p-3" style="border-radius:0.75rem">
                                        <p class="bold mb-0" style="font-size:0.75rem !important">`+line2.pelaksanaan+`</p>
                                        <p class="text-right" style="color:`+color+`;font-size:0.75rem !important;margin-bottom:5px">`+parseInt(line2.nilai)+`/100</p>
                                        <div class="progress mb-2">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: `+parseInt(line2.nilai)+`%;background:`+color+` !important"></div>
                                        </div>
                                        <p style="font-size:0.75rem !important;margin-bottom:10px">`+line2.keterangan+`</p>
                                        <p class="mb-0">
                                        <span style="font-size:0.75rem !important;color:#d7d7d7">`+line2.semester+` * `+line2.tgl+`</span><span class="text-right float-right" style="font-size:0.75rem !important;color:#4361EE;">Selengkapnya</span>
                                        </p>
                                        </div>
                                        </div>`;
                                    }
                                }
                                content+=det+`
                                </div>`;
                            if(i+1 == result.data_kompetensi.length){
                                html +=`<div class="row" style="margin-bottom:100px">
                                `+content+`
                                </div>`;
                            }else{
                                html +=`<div class="row">
                                `+content+`
                                </div>`;
                            }
                        }
                    }
                    if(kode_sem == "All"){
                        $('#data-semua').html(html);
                    }else if(kode_sem == 1){
                        
                        $('#data-ganjil').html(html);

                    }else{
                        $('#data-genap').html(html);
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

    getDetail("All");

    $('.nav-custom').on('click','.nav-link',function(e){
        e.preventDefault();
        var semester = $(this).data("href");
        getDetail(semester);
    })

    $('.detail-header').on('click','#btn-back',function(e){
        e.preventDefault();
        loadForm("{{ url('mobile-tarbak/form/dashSiswa') }}");
    })
</script>