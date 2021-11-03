<link rel="stylesheet" href="{{ asset('asset_silo/dashboard_new.css') }}" />
<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<style>
    #saku-datatable .card {
        padding: 0 !important;
    }

    #saku-form .card {
        padding: 0 !important;
    }
</style>
<div class="top-menu">
    <div class='navbar-top w-100 text-center'>
        <div class="header-icons d-inline-block align-middle">
            <a href="#" data-href='fPengajuanDash' class="header-icon btn btn-empty active" type="button">
                <i class="simple-icon-home" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Home</h6>
            </a>
            <a href="#" data-href='#' class="header-icon btn btn-empty" type="button">
                <i class="simple-icon-notebook" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Draft</h6>
            </a>
            <a href="#" data-href='fPengajuan' class="header-icon btn btn-empty" type="button">
                <i class="simple-icon-doc" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Pengajuan</h6>
            </a>
            <a href="#" data-href='fProsesJuskeb' class="header-icon btn btn-empty" type="button">
                <i class="simple-icon-settings" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Sedang Proses</h6>
            </a>
            <a href="#" data-href='fRkmPerlu' class="header-icon btn btn-empty" type="button">
                <i class="simple-icon-pencil" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Perlu Proses</h6>
            </a>
            <a href="#" data-href='fRkmTelah' class="header-icon btn btn-empty" type="button">
                <i class="iconsminds-box-full" style="font-size:1.3rem"></i>
                <h6 style="font-size:0.85rem !important">Telah Proses</h6>
            </a>
            <a href="#" data-href='fRkmSelesai' class="header-icon btn btn-empty" type="button">
                <i class="simple-icon-check" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Selesai</h6>
            </a>
            <a href="#" data-href='fRkmBatal' class="header-icon btn btn-empty" type="button">
                <i class="simple-icon-close" style="font-size:1.5rem"></i>
                <h6 style="font-size:0.85rem !important">Batal</h6>
            </a>

        </div>
    </div>
</div>
<div style="margin-top:130px" id="trans-body">

</div>
<script>
    function getNamaBulan(no_bulan){
        switch (no_bulan){
            case 1 : case '1' : case '01': bulan = "Januari"; break;
            case 2 : case '2' : case '02': bulan = "Februari"; break;
            case 3 : case '3' : case '03': bulan = "Maret"; break;
            case 4 : case '4' : case '04': bulan = "April"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Juni"; break;
            case 7 : case '7' : case '07': bulan = "Juli"; break;
            case 8 : case '8' : case '08': bulan = "Agustus"; break;
            case 9 : case '9' : case '09': bulan = "September"; break;
            case 10 : case '10' : case '10': bulan = "Oktober"; break;
            case 11 : case '11' : case '11': bulan = "November"; break;
            case 12 : case '12' : case '12': bulan = "Desember"; break;
            default: bulan = null;
        }

        return bulan;
    }
    var $edit = 0;
    var $id_edit = "";
    $('.navbar-top a').click(function(){
        $('.navbar-top a').removeClass('active');
        var form = $(this).data('href');
        if(form == "fRkmAju"){
            $edit = 0;
            $id_edit = "";
        }
        $(this).addClass('active');
        var url = "{{ url('silo-auth/form')}}/"+form;
        $('#trans-body').load(url);
    });

    $('#trans-body').load("{{ url('silo-auth/form')}}/fPengajuanDash");

</script>
