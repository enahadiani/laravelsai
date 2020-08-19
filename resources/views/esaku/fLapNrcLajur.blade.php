    <style>
        td,th{
            padding:8px !important;
        }
        .border-right-0{
            border-right:0;
        }
        .border-left-0{
            border-left:0;
        }
        .search-item{
            font-size:18px;
            cursor:pointer;
        }
        #table-filter td:not(:nth-child(1))
        {
            padding:0 !important;
        }
        .selectize-input{
            border-radius:0;
            height:38.4px !important;
        }
    </style>
        <div class="row" id="saku-filter">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body pt-4 pb-2 px-4">
                        <h5 style="position:absolute;top: 25px;">Laporan Neraca Lajur</h5>
                        <button id="btn-filter" style="float:right;width:110px" class="btn btn-light ml-2" type="button"><i class="simple-icon-equalizer mr-2" style="transform-style: ;" ></i>Filter</button>
                        <button type="button" id="btn-export" class="btn btn-light" style="float:right;width:110px">Export</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="collapse show" id="collapseFilter">
                                <div class="px-4 pb-4 pt-0">
                                    <h6>Filter</h6>
                                    <table class="table no-border table-bordered" id="table-filter" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="30%">Judul</th>
                                                <th class="text-center" width="10%">Jenis</th>
                                                <th class="text-center" width="30%">Rentang Awal</th>
                                                <th class="text-center" width="30%">Rentang Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="sai-rpt-filter-entry-row">
                                                <td>Periode</td>
                                                <td class="text-center">
                                                    <select name='periode[]' class='form-control sai-rpt-filter-type selectize' required><option value='all'>All</option><option value='exact' selected>=</option><option value='range'>Range</option></select>
                                                </td>
                                                <td>
                                                    <select name='periode[]' id="periode_form" class='form-control sai-rpt-filter-from selectize' value='' required><option value='202008' selected>202008</option></select>
                                                </td>
                                                <td>
                                                    <select name='periode[]' id="periode_to" class='form-control sai-rpt-filter-to selectize' value='' required><option value='202008'>202008</option></select>
                                                </td>
                                            </tr>
                                            <tr class="sai-rpt-filter-entry-row">
                                                <td>Kode Akun</td>
                                                <td class="text-center">
                                                    <select name='kode_akun[]' class='form-control sai-rpt-filter-type selectize' required><option value='all' selected>All</option><option value='exact'>=</option><option value='range'>Range</option></select>
                                                </td>
                                                <td>                                                
                                                    <div class="input-group sai-rpt-filter-from" style="display:none">
                                                        <input type="text" class="form-control border-right-0 " name="kode_akun[]" id="kode_akun_from">
                                                        <div class="input-group-append border-left-0">
                                                        <i class="simple-icon-magnifier input-group-text search-item"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group sai-rpt-filter-to" style="display:none">
                                                        <input type="text" class="form-control border-right-0 " name="kode_akun[]" id="kode_akun_to">
                                                        <div class="input-group-append border-left-0">
                                                        <i class="simple-icon-magnifier input-group-text search-item"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="button" >Tampilkan</button>
                                    <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="collapse" id="collapsePaging">
                                <div class="p-4">
                                    <div class='col-sm-2' style='padding-top: 0'>
                                        <select name="show" id="show" class="form-control" style=''>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="All">All</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-10">
                                        <div id="pager" style='padding-top: 0px;position: absolute;top: 0;right: 0;'>
                                            <ul id="pagination" class="pagination pagination-sm2"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row mt-2" id="saku-report">
            <div class="col-12">
                <div class="card" style="min-height:200px">
                </div>
            </div>
        </div>
    </div> 

    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
        $('#btn-filter').click(function(e){
            $('#collapseFilter').show();
            $('#collapsePaging').hide();
            if($(this).hasClass("btn-primary")){
                $(this).removeClass("btn-primary");
                $(this).addClass("btn-light");
            }
        });
        
        $('#btn-tutup').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
        });

        $('#btn-tampil').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
        });

        $('.selectize').selectize();

        $('#table-filter').on('change', '.sai-rpt-filter-type', function(){
            var val = $(this).val();
            var from =  $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from');
            var to =  $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to');
            if(val == 'all'){
                from.hide();
                to.hide();
            }else if(val == 'exact'){
                if(from.hasClass('selectize')){
                    from.show();
                    $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from.selectized').hide();
                }else{
                    from.show();
                }
                to.hide();
            }else{
                if(from.hasClass('selectize')){
                    
                    from.show();
                    $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from.selectized').hide();

                }else{
                    from.show();
                }
                if(to.hasClass('selectize')){
                    to.show();
                    $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to.selectized').hide();
                }else{
                    to.show();
                }
            }
        });
    </script>