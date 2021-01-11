<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Stok"/>
            <div class="separator"></div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="collapse show" id="collapseFilter">
                            <div class="px-4 pb-4 pt-2">
                                <form id="form-filter">
                                    <h6>Filter</h6>
                                    <div id="inputFilter">
                                        <!-- COMPONENT -->
                                        <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="gudang" nama="Gudang" selected="1" :option="array('1','3')"/>
                                        <x-inp-filter kode="kelompok" nama="Kelompok" selected="1" :option="array('1','3')"/>
                                        <x-inp-filter kode="barang" nama="Kode Barang" selected="1" :option="array('1','3')"/>
                                        <!-- END COMPONENT -->
                                    </div>
                                    <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                    <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                </form>
                            </div>
                        </div>
                    </div>
                 <x-report-paging :option="array()" default="10" />  
            </div>                    
        </div>
    </div>
</div>
<x-report-result judul="Laporan Stok" padding="px-4 py-4"/>

@include('modal_search')
@include('modal_email')

@php
    date_default_timezone_set("Asia/Bangkok");
@endphp

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var $periode = {
            type : "=",
            from : "{{ date('Ym') }}",
            fromname : namaPeriode("{{ date('Ym') }}"),
            to : "",
            toname : "",
        }
    var $gudang = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
    var $kelompok = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
    var $barang = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
    var $aktif = "";

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $('#periode-from').val(namaPeriode("{{ date('Ym') }}"));

    $('#btn-filter').click(function(e){
        $('#collapseFilter').show();
        $('#collapsePaging').hide();
        if($(this).hasClass("btn-primary")){
            $(this).removeClass("btn-primary");
            $(this).addClass("btn-light");
        }
            
        $('#btn-filter').addClass("hidden");
        $('#btn-export').addClass("hidden");
    });

     $('#btn-tutup').click(function(e){
        $('#collapseFilter').hide();
        $('#collapsePaging').show();
        $('#btn-filter').addClass("btn-primary");
        $('#btn-filter').removeClass("btn-light");
        $('#btn-filter').removeClass("hidden");
        $('#btn-export').removeClass("hidden");
    });

    $('#btn-tampil').click(function(e){
        $('#collapseFilter').hide();
        $('#collapsePaging').show();
        $('#btn-filter').addClass("btn-primary");
        $('#btn-filter').removeClass("btn-light");
        $('#btn-filter').removeClass("hidden");
        $('#btn-export').removeClass("hidden");
    });

    $('.selectize').selectize();

    $('#inputFilter').reportFilter({
        kode : ['periode','gudang','kelompok', 'barang'],
        nama : ['Periode','Gudang','Kelompok', 'Barang'],
        header : [['Periode'],['Kode','Nama'],['No Bukti','Keterangan']],
        headerpilih : [['Periode','Action'],['Kode','Nama','Action'],['No Bukti','Keterangan','Action']],
        columns: [
            [
                { data: 'periode' },
            ],[
                { data: 'nik_user' },
                { data: 'nama' }
            ],[
                { data: 'no_jual' },
                { data: 'keterangan' }
            ]
        ],
        url :["{{ url('esaku-report/filter-periode') }}","{{ url('esaku-report/filter-nik') }}","{{ url('esaku-report/filter-bukti') }}"],
        parameter:[{},{},{}],
        orderby:[[[0,"desc"]],[[0,"desc"]],[[0,"asc"]]],
        width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
        display:['kode','kode','kode'],
        pageLength:[12,10,10]
    })
</script>