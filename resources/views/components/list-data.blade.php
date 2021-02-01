<div class="row" id="saku-datatable">
    <div class="col-12">
        <div class="card" >
            <div class="card-body pb-3" style="padding-top:1rem;min-height:68px">
                <h6 style="position:absolute;top: 20px;">{{ $judul }}</h6>
                @if($tambah)
                <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;">Tambah</button>
                @endif
            </div>
            <div class="separator mb-2"></div>
            <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
            <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                    <div class="page-countdata">
                        <label>Menampilkan 
                        <select style="border:none" id="page-count">
                        @if(!isset($option_page))
                            <option value="10">10 per halaman</option>
                            <option value="25">25 per halaman</option>
                            <option value="50">50 per halaman</option>
                            <option value="100">100 per halaman</option>
                        @else
                            @for($i=0; $i < count($option_page); $i++ )
                                <option value="{{ $option_page[$i] }}">{{ $option_page[$i] }} per halaman</option>
                            @endfor
                        @endif
                        </select>
                        </label>
                    </div>
                </div>
                <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                    <div class="input-group input-group-sm" style="max-width:321px;float:right">
                        <input type="text" class="form-control" placeholder="Search..."
                        aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;max-width:230px !important">
                        <div class="input-group-append" style="max-width:92px !important;width:100%">
                            <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;width:100%"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                <div class="table-responsive ">
                    <table id="table-data" class="" style='width:100%'>
                        <thead>
                            <tr>
                            @for($i=0; $i < count($thead); $i++ )
                                <th style="width:{{ $thwidth[$i] }}%" class="{{ $thclass[$i] }}">{{ $thead[$i] }}</th>
                            @endfor
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
@include('modal_preview')
