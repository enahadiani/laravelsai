<style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2{
            cursor:pointer;
            font-size: 16px;margin-left:5px;position: absolute;top: 5px;right: 10px;background: white;padding: 5px 0 5px 5px;z-index: 4;height:27px;
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
        .hidden{
            display:none;
        }

        .datetime-reset-button {
            margin-right: 20px !important;
            margin-top: 3px !important;
        }
        #table-search
        {
            border-collapse:collapse !important;
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
        padding-right: 5px; }
        .px-0{
            padding-left: 2px !important;
            padding-right: 2px !important;
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

        .btn-light2{
            background:#F8F8F8;
            color:#D4D4D4;
        }

        .btn-light2:hover{
            color:#131113;
        }

        .btn-light2:active{
            color: #131113;
            background-color: #d8d8d8;
        }

        .custom-file-label::after{
            content:"Cari berkas" !important;
            border-left:0;
            color: var(--theme-color-1) !important;
        }
        .focus{
            /* border:none !important; */
            box-shadow:none !important;
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
        th{
            vertical-align:middle !important;
        }
        #input-nilai .selectize-input.focus, #input-nilai input.form-control, #input-nilai .custom-file-label,  #input-dok .selectize-input.focus, #input-dok input.form-control, #input-dok .custom-file-label
        {
            border:1px solid black !important;
            border-radius:0 !important;
        }
        
        #input-nilai .selectize-input,  #input-dok .selectize-input
        {
            border-radius:0 !important;
        } 
        
        .modal-header .close {
            padding: 1rem;
            margin: -1rem 0 -1rem auto;
        }
        .check-item{
            cursor:pointer;
        }
        .selected{
            cursor:pointer;
            /* background:#4286f5 !important; */
            /* color:white; */
        }
        #input-nilai td:not(:nth-child(1)):not(:nth-child(5)):hover
        {
            background:#f8f8f8;
            color:black;
        }

        #input-dok td:not(:nth-child(1)):not(:nth-child(7)):hover
        {
            background:#f8f8f8;
            color:black;
        }

        #input-nilai input:hover,
        #input-nilai .selectize-input:hover,
        {
            width:inherit;
        }

        #input-dok input:hover,
        #input-dok .selectize-input:hover,
        {
            width:inherit;
        }

        #input-nilai ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }

        #input-dok ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }
        #input-nilai td
        {
            overflow:hidden !important;
            height:calc(1.3rem + 1rem) !important;
            padding:0px !important;
        }
        
        #input-nilai span
        {
            padding:0px 10px !important;
        }
        
        #input-nilai input,#input-nilai .selectize-input
        {
            overflow:hidden !important;
        }

        #input-dok td
        {
            overflow:hidden !important;
            height:calc(1.3rem + 1rem) !important;
            padding:0px !important;
        }

        div.dataTables_wrapper div.dataTables_filter input{
            height:calc(1.3rem + 1rem) !important;
        }
        
        #input-dok span
        {
            padding:0px 10px !important;
        }
        
        #input-dok input,#input-dok .selectize-input
        {
            overflow:hidden !important;
        }
        .input-group-prepend{
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .readonly > .input-group-prepend{
            background: #e9ecef !important;
        }

        .readonly > .search-item2{
            background: #e9ecef !important;
            cursor:not-allowed;
            display:none;
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

        .readonly > .input-group-prepend > span {
            margin: 5px;padding: 0 5px;
            background: #d7d7d7 !important;
            border: 1px solid #d7d7d7 !important;
            border-radius: 0.25rem !important;
            color: black;
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

        .readonly > span[class^=info-name] {
            cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height:22px;
            background: #e9ecef !important;

        }

        .info-icon-hapus{
            font-size: 14px;
            position: absolute;
            top: 10px;
            right: 35px;
            z-index: 3;
        }

        .readonly >  .info-icon-hapus{
            display:none;
        }

        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem;
            
        }

        .readonly >  .form-control{
            background: #e9ecef !important;
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
    </style>

    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Profil Perusahaan</h5>
                    <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                    <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                        <div class="page-countdata">
                            <label>Menampilkan 
                            <select style="border:none" id="page-count">
                                <option value="10">10 per halaman</option>
                                <option value="25">25 per halaman</option>
                                <option value="50">50 per halaman</option>
                                <option value="100">100 per halaman</option>
                            </select>
                            </label>
                        </div>
                    </div>
                    <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;">
                            <div class="input-group-append" >
                                <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                    <div class="table-responsive ">
                        <table id="table-data" class="" style='width:100%'>
                            <thead>
                                <tr>
                                    <th>ID Perusahaan</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12" style="height: 90px;">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body" id="form-body">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id_perusahaan" name="id_perusahaan">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="nama_klien">Nama Perusahaan</label>
                                        <input class="form-control" type="text" id="nama_perusahaan" name="nama_perusahaan">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="select-from-library-container mb-1">
                                            <label for="file_gambar">Banner</label>
                                            <div class="select-from-library-button sfl-single mb-5" data-library-id="#libraryModal" data-count="1">
                                                <div id="div-banner" class="card d-flex flex-row mb-4 media-thumb-container justify-content-center align-items-center" style="cursor: pointer;">
                                                    <span id="span-banner">Drop photo here to upload</span>
                                                    <img id="banner-preview" alt="banner" src="#" height="90" width="300" />
                                                </div>
                                                <input type="file" id="upload-banner" name="file_gambar" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;cursor: pointer;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row" style="margin-top: -99px;">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="nama_perusahaan">Koordinat</label>
                                        <input class="form-control" type="text" id="koordinat" name="koordinat">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="deskripsi">Deskripsi Tentang Perusahaan</label>
                                        <input class="form-control" type="text" id="deskripsi" name="deskripsi">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="visi">Visi</label>
                                        <input class="form-control" type="text" id="visi" name="visi">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="misi">Misi</label>
                                        <input class="form-control" type="text" id="misi" name="misi">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="alamat">Alamat</label>
                                        <input class="form-control" type="text" id="alamat" name="alamat">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="no_telp">No Telepon</label>
                                        <input class="form-control" type="text" id="no_telp" name="no_telp">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="text" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#btambah" role="tab" aria-selected="true"><span class="hidden-xs-down">Misi Perusahaan</span></a> </li>                                
                        </ul>
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" role="tabpane" id="btambah">
                                <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;width:1200px !important;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <style>
                                        th{
                                            vertical-align:middle !important;
                                        }
                                        /* #input-grid td{
                                            padding:0 !important;
                                        } */
                                        #input-grid .selectize-input.focus, #input-grid input.form-control, #input-grid .custom-file-label
                                        {
                                            border:1px solid black !important;
                                            border-radius:0 !important;
                                        }

                                        #input-grid .selectize-input
                                        {
                                            border-radius:0 !important;
                                        } 
                                        
                                        .modal-header .close {
                                            padding: 1rem;
                                            margin: -1rem 0 -1rem auto;
                                        }
                                        .check-item{
                                            cursor:pointer;
                                        }
                                        .selected{
                                            cursor:pointer;
                                            /* background:#4286f5 !important; */
                                            /* color:white; */
                                        }
                                        #input-grid td:not(:nth-child(1)):not(:nth-child(9)):hover
                                        {
                                            /* background: var(--theme-color-6) !important;
                                            color:white; */
                                            background:#f8f8f8;
                                            color:black;
                                        }
                                        #input-grid input:hover,
                                        #input-grid .selectize-input:hover,
                                        {
                                            width:inherit;
                                        }
                                        #input-grid ul.typeahead.dropdown-menu
                                        {
                                            width:max-content !important;
                                        }
                                        #input-grid td
                                        {
                                            overflow:hidden !important;
                                            height:37.2px !important;
                                            padding:0px !important;
                                        }

                                        #input-grid span
                                        {
                                            padding:0px 10px !important;
                                        }

                                        #input-grid input,#input-grid .selectize-input
                                        {
                                            overflow:hidden !important;
                                            height:35px !important;
                                        }

                                        #input-grid td:nth-child(5)
                                        {
                                            overflow:unset !important;
                                        }
                                    </style>
                                    <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap;">
                                        <thead>
                                            <tr>
                                                <th width="5%" class="text-center">No</th>
                                                <th width="12%" class="text-center"></th>   
                                                <th class="text-center">Misi</th>                                                                                                                                   
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->

    <!-- MODAL PREVIEW -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-preview">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
            <div class="modal-content" style="border-radius:0.75em">
                <div class="modal-header py-0" style="display:block;">
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Perusahaan <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span> </h6>
                    <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" style="line-height:1.5">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="dropdown d-inline-block float-right">
                        <button class="btn dropdown-toggle mb-1" type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:0">
                        <h6 class="mx-0 my-0 py-2">Aksi <i class="simple-icon-arrow-down ml-1" style="font-size: 10px;"></i></h6>
                        </button>
                        <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                            {{-- <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a> --}}
                            <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                            {{-- <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a> --}}
                            {{-- <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a> --}}
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="content-preview" style="height:450px">
                    <table id="table-preview" class="table no-border">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL PREVIEW -->

    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script type="text/javascript">
        setHeightForm();
        var $iconLoad = $('.preloader');
        $('#process-upload').addClass('disabled');
        $('#process-upload').prop('disabled', true);

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

        $('#upload-banner').change(function(){
            var parent = $('#div-banner').children();
            var idSpan = $(parent[0]).attr('id');
            var idGbr = $(parent[1]).attr('id');
            fileReader(this, idGbr, idSpan);
        });

        var psscrollform = new PerfectScrollbar('#form-body');

        $('#form-tambah').on('click', '.add-row', function(){
            addRowGrid();
        });

        function hitungTotalRow(){
            var total_row = $('#input-grid tbody tr').length;
            $('#total-row').html(total_row+' Baris');
        }

        function addRowGridDefault() {
            var no=$('#input-grid .row-grid:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-grid'>";
            input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span><input type='hidden' value="+no+" name='no_urut[]'></td>";
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "<td><span class='td-misi tdmisike"+no+" tooltip-span'></span><textarea autocomplete='off' name='misi[]' class='form-control inp-misi misike"+no+" hidden'></textarea></td>";
            input += "</tr>";

            $('#input-grid tbody').append(input);
            $('.row-grid:last').addClass('selected-row');

            hitungTotalRow();
        }

        function addRowGrid() {
            var no=$('#input-grid .row-grid:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-grid'>";
            input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span><input type='hidden' value="+no+" name='no_urut[]'></td>";
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "<td><span class='td-misi tdmisike"+no+" tooltip-span'></span><textarea autocomplete='off' name='misi[]' class='form-control inp-misi misike"+no+" hidden'></textarea></td>";
            input += "</tr>";

            $('#input-grid tbody').append(input);
            $('.row-grid:last').addClass('selected-row');
            $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');

            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find(".inp-misi").show();
            $('#input-grid tbody tr:last').find(".td-misi").hide();
            $('#input-grid tbody tr:last').find(".inp-misi").focus();

            hitungTotalRow();
            hideUnselectedRow();
        }

        function hideUnselectedRow() {
            $('#input-grid > tbody > tr').each(function(index, row) {
                if(!$(row).hasClass('selected-row')) {
                    var misi = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-misi").val();

                    $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-misi").val(misi);
                    $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-misi").text(misi);

                    $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-misi").hide();
                    $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-misi").show();
                }
            })
        }

        $('#input-grid tbody').on('click', 'tr', function(){
            $(this).addClass('selected-row');
            $('#input-grid tbody tr').not(this).removeClass('selected-row');
            hideUnselectedRow();
        });

        $('#input-grid').on('click', 'td', function(){
            var idx = $(this).index();
            if(idx == 0){
                return false;
            }else{
                if($(this).hasClass('px-0 py-0 aktif')){
                    return false;            
                }else{
                    $('#input-grid td').removeClass('px-0 py-0 aktif');
                    $(this).addClass('px-0 py-0 aktif');
                    console.log(idx);
                    var misi = $(this).parents("tr").find(".inp-misi").val();
                    var no = $(this).parents("tr").find("span.no-grid").text();
                    $(this).parents("tr").find(".inp-misi").val(misi);
                    $(this).parents("tr").find(".td-misi").text(misi);
                    if(idx == 2){
                        $(this).parents("tr").find(".inp-misi").show();
                        $(this).parents("tr").find(".td-misi").hide();
                        $(this).parents("tr").find(".inp-misi").focus();
                    }else{
                        $(this).parents("tr").find(".inp-misi").hide();
                        $(this).parents("tr").find(".td-misi").show();
                    }
                }
            }
        });

        $('#input-grid').on('click', '.hapus-item', function(){
            $(this).closest('tr').remove();
            no=1;
            $('.row-grid').each(function(){
                var nom = $(this).closest('tr').find('.no-grid');
                nom.html(no);
                no++;
            });
            hitungTotalRow();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });

        $('#input-grid').on('keydown','.inp-misi',function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['.inp-misi'];
            var nxt2 = ['.td-misi'];
            if (code == 13 || code == 9) {
                e.preventDefault();
                var idx = $(this).closest('td').index()-2;
                var idx_next = idx+1;
                var kunci = $(this).closest('td').index()+1;
                var isi = $(this).val();
                switch (idx) {
                    case 0:
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        
                        var cek = $(this).parents('tr').next('tr').find('.td-misi');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row').click();
                        }
                        break;
                    default:
                        break;
                }
            }else if(code == 38){
                e.preventDefault();
                var idx = nxt.indexOf(e.target.id);
                idx--;
            }
        });
        
        $('#saku-form').on('click', '#btn-kembali', function(){
            var kode = null;
            msgDialog({
                id:kode,
                type:'keluar'
            });
        });

        $('#saku-datatable').on('click', '#btn-tambah', function(){
            $('#row-id').hide();
            $('#method').val('post');
            $('#judul-form').html('Tambah Data Review Klien');
            $('#btn-update').attr('id','btn-save');
            $('#btn-save').attr('type','submit');
            $('#form-tambah')[0].reset();
            $('#form-tambah').validate().resetForm();
            $('#id').val('');
            $('#saku-datatable').hide();
            $('#saku-form').show();
            $('#banner-preview').hide();
            $('#span-banner').show();
            addRowGridDefault();
        });

        // LIST DATA
        var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
        
        var dataTable = $("#table-data").DataTable({
            destroy: true,
            bLengthChange: false,
            sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            'ajax': {
                'url': "{{ url('admginas-master/profil') }}",
                'async':false,
                'type': 'GET',
                'dataSrc' : function(json) {
                    if(json.status){
                        return json.daftar;   
                    }else if(!json.status && json.message == "Unauthorized"){
                        window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                        return [];
                    }else{
                        return [];
                    }
                }
            },
            'columnDefs': [
                {
                    "targets": 0,
                    "createdCell": function (td, cellData, rowData, row, col) {
                        if ( rowData.status == "baru" ) {
                            $(td).parents('tr').addClass('selected');
                            $(td).addClass('last-add');
                        }
                    }
                },
                {'targets': 5, data: null, 'defaultContent': action_html, 'className': 'text-center' }
            ],
            'columns': [
                { data: 'id_perusahaan' },
                { data: 'nama_perusahaan' },
                { data: 'alamat' },
                { data: 'no_telp' },
                { data: 'email' },
            ],
            order:[[5,'desc']],
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            }
        });

        $.fn.DataTable.ext.pager.numbers_length = 5;

        $("#searchData").on("keyup", function (event) {
            dataTable.search($(this).val()).draw();
        });

        $("#page-count").on("change", function (event) {
            var selText = $(this).val();
            dataTable.page.len(parseInt(selText)).draw();
        });

        $('#form-tambah').validate({
            ignore: [],
            errorElement: "label",
            submitHandler: function (form) {
                var parameter = $('#id_edit').val();
                var id = $('#id_perusahaan').val();
                if(parameter == "edit"){
                    var url = "{{ url('admginas-master/profil') }}/"+id;
                    var pesan = "updated";
                }else{
                    var url = "{{ url('admginas-master/profil') }}";
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
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Data berhasil tersimpan!',
                                'Your data has been '+pesan,
                                'success'
                                ) 
                            $('#upload-banner').val(null);
                            $('#banner-preview').attr('src', '');
                            $('#saku-datatable').show();
                            $('#saku-form').hide();
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

        $('#table-data tbody').on('click','td',function(e){
            if($(this).index() != 5){
                var id = $(this).closest('tr').find('td').eq(0).html();
                var nama = $(this).closest('tr').find('td').eq(1).html();
                var data = dataTable.row(this).data();
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admginas-master/profil') }}/" + id,
                    dataType:"JSON",
                    success: function(result) {
                        var html = `<tr>
                            <td style='border:none'>ID Perusahaan</td>
                            <td style='border:none'>`+id+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Nama Perusahaan</td>
                            <td style='border:none'>`+result.data[0].nama_perusahaan+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Koordinat</td>
                            <td style='border:none'>`+result.data[0].koordinat+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Deskripsi</td>
                            <td style='border:none'>`+result.data[0].deskripsi+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Visi</td>
                            <td style='border:none'>`+result.data[0].visi+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Misi</td>
                            <td style='border:none'>`+result.data[0].misi+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>No Telp</td>
                            <td style='border:none'>`+result.data[0].no_telp+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Email</td>
                            <td style='border:none'>`+result.data[0].email+`</td>
                        </tr>
                        <tr>
                            <td>Logo</td>
                            <td>
                                <img height='90' width='200' src=${'https://api.simkug.com/api/admginas-auth/storage/'+result.data[0].file_gambar} />
                            </td>
                        </tr>   
                    `;
                        $('#table-preview tbody').html(html);
                    
                        $('#modal-preview-id').text(id);
                        $('#modal-preview').modal('show');
                    }
                })
            }
        });

        $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Perusahaan');
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/profil') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(res.status){
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#id_perusahaan').val(id);
                    $('#id').val(id);
                    $('#nama_perusahaan').val(result[0].nama_perusahaan); 
                    $('#koordinat').val(result[0].koordinat); 
                    $('#deskripsi').val(result[0].deskripsi); 
                    $('#alamat').val(result[0].alamat); 
                    $('#visi').val(result[0].visi);
                    $('#misi').val(result[0].misi);
                    $('#no_telp').val(result[0].no_telp);
                    $('#email').val(result[0].email); 
                    $('#banner-preview').show();
                    $('#span-banner').hide();     
                    $("#banner-preview").attr('src', 'https://api.simkug.com/api/admginas-auth/storage/'+result[0].file_gambar)                              
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Perusahaan');
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/profil') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(res.status){
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#id_perusahaan').val(id);
                    $('#id').val(id);
                    $('#nama_perusahaan').val(result[0].nama_perusahaan); 
                    $('#koordinat').val(result[0].koordinat); 
                    $('#deskripsi').val(result[0].deskripsi); 
                    $('#alamat').val(result[0].alamat); 
                    $('#visi').val(result[0].visi);
                    $('#misi').val(result[0].misi);
                    $('#no_telp').val(result[0].no_telp);
                    $('#email').val(result[0].email);
                    $('#banner-preview').show();
                    $('#span-banner').hide();     
                    $("#banner-preview").attr('src', 'https://api.simkug.com/api/admginas-auth/storage/'+result[0].file_gambar)                              
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#modal-preview').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });
    </script>