<style>
        .table-datapribadi td,.table-lap td, .table-tagihan td, .table-riwayat-trans td{
            padding: 3px 0px !important;
        }
        .bold{
            font-weight: bold;
        }
        .bg-grey{
            background: gray !important;
        }
        .col-grid{
            display:grid !important; padding: 0 0.75rem !important;
        }
        .text-white{
            color: white !important
        }
        
        .text-grey{
            color: #C3C3C3 !important
        }

        .saicon {
            display: inline-block;
            width: 14px;
            height: 14px;
            background: black; 
            -webkit-mask-size: cover;
            mask-size: cover;
        }

        .btn-grey{
            background:#F9F9F9;
        }
        .icon-pdd{
            background: black;
            -webkit-mask-image: url("{{ url('img/Deposit.svg') }}");
            mask-image: url("{{ url('img/Deposit.svg') }}");
            width: 14px;
            height: 14px;
        }

        .icon-keuangan{
            background: black;
            -webkit-mask-image: url("{{ url('img/KartuSiswa.svg') }}");
            mask-image: url("{{ url('img/KartuSiswa.svg') }}");
            width: 14px;
            height: 18px;
        }
        
        .iconsminds-down, .iconsminds-up{
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg);
            display: inline-block;
        }
        .klik-report{
            cursor:pointer;
        }
        button.bg-primary:hover, button.bg-primary:focus {
            background-color: #f3f3f3 !important;
        }
        .bg-img{
            background-image: url("{{ asset('img/bg-tsinfo.png') }}");
            background-size: cover;background-repeat: no-repeat;background-position-y: center;border-radius: 0.75rem;
        }

        .icon-pbyr{
            background: #990000;
            -webkit-mask-image: url("{{ url('img/fi-rr-calculator.svg') }}");
            mask-image: url("{{ url('img/fi-rr-calculator.svg') }}");
            width: 18px;
            height: 20px;
        }
        .table-metode td{
            padding: 4px;
            vertical-align:middle;
        }
        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem !important;
            
        }

        
        .card-body-footer{
            background: white;
            position: relative;
            bottom: 0px;
            z-index:3;
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 1rem;
            box-shadow: 0 -5px 20px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);
        }

        .card-body-footer > button{
            float: right;
            margin-top: 10px;
            margin-right: 25px;
        }
    </style>
    <x-list-data judul="Riwayat Pembayaran" tambah="" :thead="array('No Bill','Keterangan','Nilai','Status','Pay')" :thwidth="array(15,45,20,10,10)" :thclass="array('','','','','text-center')" />
   
    <script src="{{ asset('helper.js') }}"></script>
    <script> 
    $('body').addClass('dash-contents');
    $('html').addClass('dash-contents');
    $('#beranda').show();
    setHeightForm();

    var dataTable = generateTable(
        "table-data",
        "{{ url('ts-dash/sis-mid-bayar') }}", 
        [
            {   'targets': 2, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            }
        ],
        [
            { data: 'no_bill' },
            { data: 'keterangan' },
            { data: 'nilai' },
            { data: 'status' },
            { data: 'action' }
        ],
        "{{ url('ts-auth/sesi-habis') }}",
        []
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    
    $('#table-data').on('click','.complete-pay',function(e){
        e.preventDefault();
        var snap_token = $(this).data('snap');
        snap.pay(snap_token);
    });

    </script>