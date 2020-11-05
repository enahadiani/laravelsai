<div class="col-12 col-sm-12">
    <div class="collapse" id="collapsePaging">
        <div class="px-4 py-0 row"  style="min-height:63px">
            <div class="col-sm-4" style="margin:auto">
                <label>
                    Menampilkan
                    <select name="show" id="show" class="" style='border:none'>
                        @if(!isset($option_page))
                        <option value="10">10 per halaman</option>
                        <option value="25">25 per halaman</option>
                        <option value="50">50 per halaman</option>
                        <option value="100">100 per halaman</option>
                        <option value="All" selected>Semua halaman</option>
                        @else
                            @for($i=0; $i < count($option_page); $i++ )
                            <option value="{{ $option_page[$i] }}">{{ $option_page[$i] }} per halaman</option>
                            @endfor
                        @endif
                    </select>
                </label>
            </div>
            <div class="col-sm-8 text-center">
                <div id="pager">
                    <ul id="pagination" class="pagination pagination-sm2 float-right mb-0"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
    