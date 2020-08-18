    <style>
        td,th{
            padding:8px !important;
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
                                    <table class="table no-border table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="30%">Judul</th>
                                                <th class="text-center" width="10%">Jenis</th>
                                                <th class="text-center" width="30%">Rentang Awal</th>
                                                <th class="text-center" width="30%">Rentang Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Periode</td>
                                                <td class="text-center">=</td>
                                                <td>202008</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Kode Akun</td>
                                                <td class="text-center">All</td>
                                                <td></td>
                                                <td></td>
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
                                    
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row mt-2" id="saku-report">
            <div class="col-12">
                <div class="card" >
                   
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
    </script>