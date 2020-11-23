   <!-- CSS tambahan -->
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
        <div class="row" id="saku-form" >
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 id="judul-form" style='margin-bottom:0'>Setting Form</h5>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <!-- FORM BODY -->
                    <div class="card-body form-body">
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <!-- <div class="form-row">
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-11 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control input-sm" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control input-sm" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control input-sm" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control input-sm" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xs-12">
                                        <div class="row">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control input-sm" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control input-sm" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control input-sm" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-3 col-6">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control input-sm" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-11 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-xs-12">
                                                        <label for="kode_pp">col-md-6</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-6 col-xs-12">
                                                        <label for="kode_pp">col-md-6</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xs-12">
                                        <div class="row">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-1 col-xs-12">
                                        <div class="row">
                                        </div>
                                    </div>
                                    <div class="col-md-11 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-xs-12">
                                                        <label for="kode_pp">col-md-6</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-6 col-xs-12">
                                                        <label for="kode_pp">col-md-6</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-11 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-md-3 col-xs-12">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-9 col-xs-12">
                                                        <label for="kode_pp">col-md-9</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xs-12">
                                        <div class="row">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-1 col-xs-12">
                                        <div class="row">
                                        </div>
                                    </div>
                                    <div class="col-md-11 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-md-9 col-xs-12">
                                                        <label for="kode_pp">col-md-9</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                    <div class="form-group col-md-3 col-xs-12">
                                                        <label for="kode_pp">col-md-3</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-11 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-md-12 col-xs-12">
                                                        <label for="kode_pp">col-md-12</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xs-12">
                                        <div class="row">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-1 col-xs-12">
                                        <div class="row">
                                        </div>
                                    </div>
                                    <div class="col-md-11 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-md-12 col-xs-12">
                                                        <label for="kode_pp">col-md-12</label>
                                                        <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-row">                           
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <label for="kode_pp">col-md-3</label>
                                                <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <label for="kode_pp">col-md-3</label>
                                                <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <label for="kode_pp">col-md-3</label>
                                                <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <label for="kode_pp">col-md-3</label>
                                                <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <label for="kode_pp">col-md-3</label>
                                                <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <label for="kode_pp">col-md-3</label>
                                                <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <label for="kode_pp">col-md-3</label>
                                                <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <label for="kode_pp">col-md-3</label>
                                                <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_pp">col-md-6</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_pp">col-md-6</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_pp">col-md-6</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_pp">col-md-6</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-9 col-sm-12">
                                        <label for="kode_pp">col-md-9</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <label for="kode_pp">col-md-3</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-9 col-sm-12">
                                        <label for="kode_pp">col-md-9</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <label for="kode_pp">col-md-3</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="kode_pp">col-md-12</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="kode_pp">col-md-12</label>
                                       <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    setHeightForm();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    </script>