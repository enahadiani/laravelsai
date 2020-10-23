<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset_elite/images/saku.png') }}">
    <title>SAKU | Sistem Akuntansi Keuangan</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_elite/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_elite/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">

    <!-- Font Awesome CSS -->
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fa-brands.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fa-regular.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fa-solid.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <style>
        .selected{
            background:#4286f5 !important;
            color:white;
        }
    </style>
   
    <script src="{{ asset('asset_elite/jquery-3.4.1.js') }}" ></script>   
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('asset_elite/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('asset_elite/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset_elite/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('asset_elite/hilight.js') }}" ></script>  
    <script src="{{ asset('asset_elite/inputSearch.js') }}" ></script>  
      
</head>
<body>
<div id="here"></div>

<div class="row">
    <div class="col-12">
        <form action="">
            <div class="form-group row">
                <label for="no_peserta" class="col-3 col-form-label">No Jamaah</label>
                <div class="input-group col-3">
                    <input type='text' name="no_peserta" id="no_peserta" class="form-control" value="" required>
                    <i class='fa fa-search search-item' style="font-size: 18px;margin-top:10px;margin-left:5px;color:#4286f5;cursor:pointer"></i>
                </div>
                <div class="col-6">
                    <label id="label_no_peserta" style="margin-top: 10px;"></label>
                </div>
            </div>
        </form>
    </div>
</div>
@include('searchModal')
<script>
$( document ).ready(function() {
    $( '#here' ).hello({
        name: 'Valentin Garcia',
        color: 'green'
    });

    $(".search-item").inputSearch({
        title: 'Daftar Peserta',
        url: "{{ url('dago-trans/jamaah') }}",
        header:['No Peserta','Nama'],
        columns:[
                    { data: 'no_peserta' },
                    { data: 'nama' }
                ],
        parameter:{},
        onItemSelected: function(data){
            $('input[name=no_peserta]').val(data.no_peserta);
            $('#label_no_peserta').text(data.nama);
        }
    });
});
</script>
</body>
</html>