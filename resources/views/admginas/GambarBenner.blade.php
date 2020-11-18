{{-- Referensi fPenilian Sekolah --}}
<style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        input.error{
            border:1px solid #dc3545;
        }
        label.error{
            color:#dc3545;
            margin:0;
        }
        #table-data_paginate,#table-search_paginate
        {
            margin-top:0 !important;
        }

        #table-data_paginate ul,#table-search_paginate ul
        {
            float:right;
        }
        .form-body 
        {
            position: relative;
            overflow: auto;
        }

        #content-delete
        {
            position: relative;
            overflow: auto;
        }
        
        #table-search
        {
            border-collapse:collapse !important;
        }

        .hidden{
            display:none;
        }

        #table-search_filter label, #table-search_filter input
        {
            width:100%;
        }

        .dataTables_wrapper .paginate_button.previous {
        margin-right: 0px; }

        .dataTables_wrapper .paginate_button.next {
        margin-left: 0px; }

        div.dataTables_wrapper div.dataTables_paginate {
        margin-top: 25px; }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: center; }

        .dataTables_wrapper .paginate_button.page-item {
            padding-left: 5px;
            padding-right: 5px; 
        }

        .dataTables_length select {
            border: 0;
            background: none;
            box-shadow: none;
            border:none;
            width:120px !important;
            transition-duration: 0.3s; 
        }

        #table-data_filter label
        {
            width:100%;
        }
        #table-data_filter label input
        {
            width:inherit;
        }
        #searchData
        {
            font-size: .75rem;
            height: 31px;
        }
        .dropdown-toggle::after {
            display:none;
        }
        .dropdown-aksi > .dropdown-item{
            font-size : 0.7rem;
        }
        .last-add::before{
            content: "***";
            background: var(--theme-color-1);
            border-radius: 50%;
            font-size: 3px;
            position: relative;
            top: -2px;
            left: -5px;
        }

        div.dataTables_wrapper div.dataTables_filter input{
            height:calc(1.3rem + 1rem) !important;
        }

        .input-group-prepend{
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .input-group > .form-control 
        {
            border-radius: 0.5rem !important;
        }

        .input-group-prepend > span {
            margin: 5px;padding: 0 5px;
            background: #e9ecef !important;
            border: 1px solid #e9ecef !important;
            border-radius: 0.25rem !important;
            color: var(--theme-color-1);
            font-weight:bold;
            cursor:pointer;
        }

        span[class^=info-name]{
            cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height:22px;

        }

        .info-icon-hapus{
            font-size: 14px;
            position: absolute;
            top: 10px;
            right: 35px;
            z-index: 3;
        }

        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem;
        }

        .selectize-input {
            min-height: unset !important;
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            line-height: 30px;
            border-radius: 0.5rem;
        }

        label{
            margin-bottom: 0.2rem;
        }

        .search-item2{
            cursor:pointer;
            font-size: 16px;margin-left:5px;position: absolute;top: 5px;right: 10px;background: white;padding: 5px 0 5px 5px;z-index: 4;height:27px;
        }
        .form-row > .col, .form-row > [class*="col-"] {
            padding-right: 15px;
            padding-left: 15px;
        }
    </style>

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form">
            <div class="col-sm-12">
                <div class="card" style=''>
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px">Gambar Banner</h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        {{-- <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button> --}}
                    </div>
                    <div class="separator"></div>
                    <div class="card-body form-body" id="form-body" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0;height:300px;'>
                            <div class="card-body">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                        <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly hidden>
                                    </div>
                                </div>

                                    <div class="select-from-library-container mb-1">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                                        <h6>Benner 1</h6>
                                                        <div class="select-from-library-button sfl-single mb-5"
                                                            data-library-id="#libraryModal" data-count="1">
                                                            <div id="div-banner-1" class="card d-flex flex-row mb-4 media-thumb-container justify-content-center align-items-center" style="cursor: pointer;">
                                                                <span id="span-banner-1">Drop photo here to upload</span>
                                                                <img id="banner-1-preview" alt="banner-1" src="#" height="90" width="300" />
                                                            </div>
                                                            <input type="hidden" name="id_banner[]" value="BNR.001">
                                                            <input type="hidden" name="gambarke[]" value="b1">
                                                            <input type="file" id="upload-banner-1" name="file_gambar[]" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;cursor: pointer;">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                                        <h6>Benner 2</h6>
                                                        <div class="select-from-library-button sfl-single mb-5"
                                                            data-library-id="#libraryModal" data-count="1">
                                                            <div id="div-banner-2" class="card d-flex flex-row mb-4 media-thumb-container justify-content-center align-items-center" style="cursor: pointer;">
                                                                <span id="span-banner-2">Drop photo here to upload</span>
                                                                <img id="banner-2-preview" alt="banner-2" src="#" height="90" width="300" />
                                                            </div>
                                                            <input type="hidden" name="id_banner[]" value="BNR.002">
                                                            <input type="hidden" name="gambarke[]" value="b2">
                                                            <input type="file" id="upload-banner-2" name="file_gambar[]" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;cursor: pointer;">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                                        <h6>Benner 3</h6>
                                                        <div class="select-from-library-button sfl-single mb-5"
                                                            data-library-id="#libraryModal" data-count="1">
                                                            <div id="div-banner-3" class="card d-flex flex-row mb-4 media-thumb-container justify-content-center align-items-center" style="cursor: pointer;">
                                                                <span id="span-banner-3">Drop photo here to upload</span>
                                                                <img id="banner-3-preview" alt="banner-3" src="#" height="90" width="300" />
                                                            </div>
                                                            <input type="hidden" name="id_banner[]" value="BNR.003">
                                                            <input type="hidden" name="gambarke[]" value="b3">
                                                            <input type="file" id="upload-banner-3" name="file_gambar[]" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;cursor: pointer;">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->

    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script type="text/javascript">
        $('#process-upload').addClass('disabled');
        $('#process-upload').prop('disabled', true);

        var $iconLoad = $('.preloader');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        function fileReader(input, idImg, idSpan) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#'+idImg).show();
                    $('#'+idSpan).hide();
                    $("#"+idImg).attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
            }
        }

        $('#upload-banner-1').change(function(){
            var parent = $('#div-banner-1').children();
            var idSpan = $(parent[0]).attr('id');
            var idGbr = $(parent[1]).attr('id');
            fileReader(this, idGbr, idSpan);
        });

        $('#upload-banner-2').change(function(){
            var parent = $('#div-banner-2').children();
            var idSpan = $(parent[0]).attr('id');
            var idGbr = $(parent[1]).attr('id');
            fileReader(this, idGbr, idSpan);
        });

        $('#upload-banner-3').change(function(){
            var parent = $('#div-banner-3').children();
            var idSpan = $(parent[0]).attr('id');
            var idGbr = $(parent[1]).attr('id');
            fileReader(this, idGbr, idSpan);
        });

        // var scrollform = document.querySelector('.form-body');
        var psscrollform = new PerfectScrollbar('#form-body');

        $('#banner-1-preview').hide();
        $('#span-banner-1').show();
        $('#banner-2-preview').hide();
        $('#span-banner-2').show();
        $('#banner-3-preview').hide();
        $('#span-banner-3').show();
        
        function getDataBanner() {
            $.ajax({
                type:'GET',
                url: "{{ url('admginas-master/banner') }}",
                dataType: 'JSON',
                success: function(result) {
                    if(result.status) {
                        var j = 1;
                        for(var i=0;i<result.daftar.length;i++) {
                            if(result.daftar[i].file_gambar != null || result.daftar[i].file_gambar != undefined || result.daftar[i].file_gambar != '') {
                                $('#span-banner-'+j).hide();
                                $('#banner-'+j+'-preview').show();
                                $('#banner-'+j+'-preview').attr('src', 'https://api.simkug.com/api/admginas-auth/storage/'+result.daftar[i].file_gambar);
                            } else {
                                $('#banner-'+j+'-preview').hide();
                                $('#span-banner-'+j).show();
                            }
                            j++;
                        }      
                    }
                }
            });
        }
        getDataBanner();

    $('#form-tambah').validate({
            ignore: [],
            errorElement: "label",
            submitHandler: function (form) {
                var parameter = $('#id_edit').val();
                var id = $('#id').val();
                if(parameter == "edit"){
                    var url = "{{ url('admginas-master/banner') }}/"+id;
                    var pesan = "updated";
                }else{
                    var url = "{{ url('admginas-master/banner') }}";
                    var pesan = "saved";
                }

                var formData = new FormData(form);
                for(var pair of formData.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]); 
                }
                
                $.ajax({
                    type: 'POST', 
                    url: url,
                    dataType: 'json',
                    data: formData,
                    async:false,
                    contentType: false,
                    cache: false,
                    processData: false, 
                    success:function(result){
                        if(result.data.status){
                            Swal.fire(
                                'Data berhasil tersimpan!',
                                'Your data has been '+pesan,
                                'success'
                                ) 
                            $('#upload-banner-1').val(null);
                            $('#upload-banner-2').val(null);
                            $('#upload-banner-3').val(null);
                            $('#banner-1-preview').attr('src', '');
                            $('#banner-2-preview').attr('src', '');
                            $('#banner-3-preview').attr('src', '');
                            getDataBanner();
                        }else if(!result.data.status && result.data.message === "Unauthorized"){
                        
                            window.location.href = "{{ url('/admginas-auth/sesi-habis') }}";
                            
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
                // $('#btn-simpan').html("Simpan").removeAttr('disabled');
            },
            errorPlacement: function (error, element) {
                var id = element.attr("id");
                $("label[for="+id+"]").append("<br/>");
                $("label[for="+id+"]").append(error);
            }
        });
    </script>