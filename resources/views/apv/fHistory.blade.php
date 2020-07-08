<style>
.form-group{
    margin-bottom:15px !important;
}
</style>
    <div class="container-fluid mt-3">
        <div class="row" id="saku-data">
            <div class="col-12">
                <div class="card" style="min-height:560px">
                    <div class="card-body">
                        <style>
                        th,td{
                            padding:8px !important;
                            vertical-align:middle !important;
                        }
                        </style>
                        <h4 class="card-title">Data Approval Justifikasi Kebutuhan
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                            <thead>
                                <tr>
                                <th>No Aju</th>
                                <th>No Urut</th>
                                <th>Id Approval</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Action</th>
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
    </div>     
    <script>
    function sepNum(x){
        var num = parseFloat(x).toFixed(0);
        var parts = num.toString().split(".");
        var len = num.toString().length;
        // parts[1] = parts[1]/(Math.pow(10, len));
        parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
        return parts.join(",");
    }

    function toRp(num){
        if(num < 0){
            return "("+sepNum(num * -1)+")";
        }else{
            return sepNum(num);
        }
    }

    function toNilai(str_num){
        var parts = str_num.split('.');
        number = parts.join('');
        number = number.replace('Rp', '');
        // number = number.replace(',', '.');
        return +number;
    }

    var action_html = "<a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>";
    
    var dataTable2 = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('apv/juskeb_app') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/logout') }}";
                    })
                    return [];
                }  
            }
        },
        'columnDefs': [
            {'targets': 5, data: null, 'defaultContent': action_html }
        ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'no_urut' },
            { data: 'id' },
            { data: 'keterangan' },
            { data: 'tanggal' }
        ]
    });

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

    function printLap(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/juskeb_app_preview') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){ 
                var result = res.data;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                       
                        
                        var html=`<div class="row">
                                <div class="col-12" style='text-align:center;margin-bottom:20px'>
                                    <h3>TANDA TERIMA</h3>
                                </div>
                                <div class="col-12">
                                    <table class="table no-border" width="100%" id='table-m'>
                                        <tbody>
                                            <tr>
                                                <td width="25">No Bukti</td>
                                                <td width="75%" >: `+result.data[0].no_bukti+`</td>
                                            </tr>
                                            <tr>
                                                <td>No Justifikasi Kebutuhan</td>
                                                <td>: `+result.data[0].no_juskeb+`</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>: `+result.data[0].tanggal+`</td>
                                            </tr>
                                            <tr>
                                                <td>PP</td>
                                                <td>: `+result.data[0].kode_pp+` - `+result.data[0].nama_pp+`</td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>: `+result.data[0].kegiatan+`</td>
                                            </tr>
                                            <tr>
                                                <td>Nilai</td>
                                                <td>: `+sepNumX(parseFloat(result.data[0].nilai))+`</td>
                                            </tr>
                                            <tr>
                                                <td height='20px'>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'>Bandung, `+result.data[0].tgl.substr(0,2)+' '+getNamaBulan(result.data[0].tgl.substr(3,2))+' '+result.data[0].tgl.substr(6,4)+`</td>
                                            </tr>
                                            <tr>
                                                <td>DIbuat Oleh:</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>Yang Menerima</td>
                                                <td class='text-center'>Yang Menyerahkan</td>
                                            </tr>
                                            <tr>
                                                <td height='80px'>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class='text-center'>`+result.data[0].nik_buat+`</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>`;
                            $('#print-area').html(html);
                            $('#slide-print').show();
                            $('#saku-data').hide();
                    }
                }
            }
        });
    }



    $('#slide-print').on('click', '#btn-kembali', function(){
        $('#saku-data').show();
        $('#slide-print').hide();
    });

    $('#saku-data').on('click','#btn-print',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        printLap(id);
    });

    $('#slide-print').on('click','#btn-aju-print',function(e){
        e.preventDefault();
        var w=window.open();
        var html =`<html><head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">
                <meta name="author" content="">
                <title>SAKU | Sistem Akuntansi Keuangan Digital</title>
                <link href="{{ asset('asset_elite/dist/css/style.min.css') }}" rel="stylesheet">
                <!-- Dashboard 1 Page CSS -->
                <link href="{{ asset('asset_elite/dist/css/pages/dashboard1.css') }}" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="{{ asset('asset_elite/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
                <!-- SAI CSS -->
                <link href="{{ asset('asset_elite/dist/css/sai.css" rel="stylesheet">
                
            </head>
            <!--
            <body class="skin-default fixed-layout" >-->
                <div id="main-wrapper" style='color:black'>
                    <div class="page-wrapper" style='min-height: 674px;margin: 0;padding: 10px;background: white;color: black !important;'>
                        <section class="content" id='ajax-content-section' style='color:black !important'>
                            <div class="container-fluid mt-3">
                                <div class="row" id="slide-print">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">`+$('#print-area').html()+`
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            <!--</body></html>-->
            `;
            w.document.write(html);
            setTimeout(function(){
                w.print();
                w.close();
            }, 1500);
    });
    </script>