<!doctype html>
<html lang="{{ app()->getLocale() }}">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Simple Donation with Midtrans</title>
 
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_elite/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <style>
        html, body {
        background-color: #fff;
        color: #636b6f;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    </style>
</head>
 
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Online Donation</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
 
        <div>
            <ul class="navbar-nav mr-auto" id="navigasi">
                <li class="nav-item active">
                    <a class="nav-link" href="#" id="donasi">Donation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="list">Donation List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('midtrans/logout') }}" id="list">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
 
    <!-- <div class="jumbotron jumbotron-fluid" style="background-color: #74b9ff; color: white;">
        <div class="container">
            <h1 class="display-4">Online Donation</h1>
            <p class="lead">This is just simple donation web with Midtrans.</p>
        </div>
    </div> -->
 
    <div class="container">
        <div class='saku-form'>
            <form class="form-horizontal" id="donation" onsubmit="return submitForm();">
    
                <!-- Form Name -->
                <legend>Donation</legend>
    
                <div class="row">
                    <div class="col-md-4">
    
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="donor_name">Donor Name</label>
                            <div>
                                <input id="donor_name" name="donor_name" type="text" placeholder="Enter your name.." class="form-control input-md"
                                    required="">
    
                            </div>
                        </div>
    
                    </div>
    
                    <div class="col-md-4">
    
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="donor_email">Donor Email</label>
                            <div>
                                <input id="donor_email" name="donor_email" type="text" placeholder="Enter your email.." class="form-control input-md"
                                    required="">
        
                            </div>
                        </div>
        
                    </div>
    
                    <div class="col-md-4">
    
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="control-label" for="donation_type">Type</label>
                            <div>
                                <select id="donation_type" name="donation_type" class="form-control">
                                    <option value="infak_kemanusiaan">Infak Kemanusiaan</option>
                                    <option value="infak_pendidikan">Infak Pendidikan</option>
                                    <option value="infak_kesehatan">Infak Kesehatan</option>
                                </select>
                            </div>
                        </div>
    
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-6">
    
                        <!-- Prepended text-->
                        <label for="">Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input id="amount" name="amount" class="form-control" placeholder="" type="number" min="10000" max="999999999" required="">
                        </div>
    
                    </div>
                    <div class="col-md-6">
    
                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="control-label" for="note">Note (Optional)</label>
                            <div>
                                <textarea class="form-control" id="note" name="note"></textarea>
                            </div>
                        </div>
    
                    </div>
                </div>
    
                <button id="submit" class="btn btn-success">Submit</button>
    
            </form>
        </div>
 
        <br>
        <div class='saku-datatable' style='display:none'>
            <table class="table table-striped" id="table-list" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Donor Name</th>
                        <th>Amount</th>
                        <th>Donation Type</th>
                        <th>Status</th>
                        <th style="text-align: center;">Pay</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
 
    </div>
    
    <script src="{{ asset('asset_elite/jquery-3.4.1.js') }}" ></script>
    <!-- This is data table -->
    <script src="{{ asset('asset_elite/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset_elite/datatables/dataTables.buttons.min.js') }}"></script>  
    <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script>

    function submitForm() {
        // Kirim request ajax
        $.post("{{ route('donation.store') }}",
        {
            _method: 'POST',
            _token: '{{ csrf_token() }}',
            nilai: $('input#amount').val(),
            keterangan: $('textarea#note').val(),
            tipe_donasi: $('select#donation_type').val(),
            nama: $('input#donor_name').val(),
            email: $('input#donor_email').val(),
        },
        function (data, status) {
            snap.pay(data.snap_token, {
                // Optional
                onSuccess: function (result) {
                    location.reload();
                },
                // Optional
                onPending: function (result) {
                    location.reload();
                },
                // Optional
                onError: function (result) {
                    location.reload();
                }
            });
        });
        return false;
    }



    $('#navigasi').on('click','#donasi',function(e){
        e.preventDefault();
        console.log('ini');
        $('.saku-form').show();
        $('.saku-datatable').hide();
    });

    $('#navigasi').on('click','#list',function(e){
        e.preventDefault();
        console.log('itu');
        $('.saku-form').hide();
        $('.saku-datatable').show();
    });

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-list').DataTable({
        ajax: {
            _token: '{{ csrf_token() }}',
            url: "{{ url('midtrans/donation') }}" ,
            data: {},
            async:false,
            type: 'GET',
            dataSrc : function(json) {
                return json.daftar;   
            }
        },
        columns: [
            { data: 'no_bukti' },
            { data: 'nama' },
            { data: 'nilai' },
            { data: 'type_donasi' },
            { data: 'status' },
            { data: 'action' }
        ],
    });
    </script>
</body>
</html>