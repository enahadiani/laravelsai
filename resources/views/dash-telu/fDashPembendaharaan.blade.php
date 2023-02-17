<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/dash-pembendaharaan.dekstop.css?version=_').time() }}" />

<script src="{{ asset('main.js') }}"></script>
<script src="{{ asset('helper.js?version=_').time() }}"></script>
<script type="text/javascript">
    $('body').addClass('dash-contents');
    $('html').addClass('dash-contents');
    var $height = $(window).height();
    var chartAju = null;
    var chartHarian = null;
    var chartCapai = null
    var chartKas = null
    var tahun = "{{ substr(Session::get('periode'),0,4) }}";
    var periode = "{{ Session::get('periode') }}";
    var kode_bidang = "";
    var kode_pp = "";
    var nama_bidang = "";
    var nama_pp = "";
    var $dash_periode = {
        type : "=",
        from : "",
        to : ""
    }

    function getPeriode(){
        $.ajax({
            type:"GET",
            url:"{{ url('/telu-dash/data-pbh-periode') }}",
            dataType: "JSON",
            success: function(result){
                $('#periode_type').selectize();
                var select = $("#periode_from").selectize();
                select = select[0];
                var control = select.selectize;

                var select2 = $("#periode_to").selectize();
                select2 = select2[0];
                var control2 = select2.selectize;
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        for(i=0;i<result.data.data.length;i++){
                            control.addOption([{text:result.data.data[i].nama, value:result.data.data[i].periode}]);
                            control2.addOption([{text:result.data.data[i].nama, value:result.data.data[i].periode}]);
                        }
                    }

                    $('.dash-filter-typediv').hide();
                    $('#periode_to').closest('div.dash-filter-to').hide();
                    $('#periode_from').closest('div.dash-filter-from').removeClass('col-md-4').addClass('col-md-8');

                    if($dash_periode.type == ""){
                        $dash_periode.type = "=";
                    }
                    
                    $('#periode_type')[0].selectize.setValue($dash_periode.type);

                    switch($dash_periode.type){
                        case '=':
                            var label = 'Periode '+namaPeriode($dash_periode.from);
                            if($dash_periode.from == ""){
                                if(result.data.periode_max != ""){
                                    control.setValue(result.data.periode_max);
                                    $dash_periode.from = result.data.periode_max;
                                }
                            }else{
                                control.setValue($dash_periode.from);
                            }
                            control2.setValue('');
                        break;
                        case '<=':
                            
                            var label = 'Periode s.d '+namaPeriode($dash_periode.from);
                        break;
                        case 'range':
                            
                            var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);
                            if($dash_periode.from == ""){
                                if(result.data.periode_max != ""){
                                    control.setValue(result.data.periode_max);
                                    $dash_periode.from = result.data.periode_max;
                                }
                            }else{
                                control.setValue($dash_periode.from);
                            }
                            control2.setValue('');

                        break;
                        default:
                            if($dash_periode.from == ""){
                                if(result.data.periode_max != ""){
                                    control.setValue(result.data.periode_max);
                                    $dash_periode.from = result.data.periode_max;
                                }
                            }else{
                                control.setValue($dash_periode.from);
                            }
                            control2.setValue('');
                            break;
                    }
                    $('.label-periode-filter').html(label);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/dash-telu/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    $('.dash-filter').on('change', '.dash-filter-type', function(){
        var type = $(this).val();
        var kunci = $(this).closest('div.dash-filter').find('.dash-kunci').text();
        var tmp = kunci.split("_");
        var kunci2 = tmp[1];
        var field = eval('$'+kunci);
        console.log(type,kunci,kunci2);
        switch(type){
            case "=": 
            case "<=":
                $(this).closest('div.dash-filter').find('.dash-filter-from').removeClass('col-md-4');
                $(this).closest('div.dash-filter').find('.dash-filter-from').addClass('col-md-8');
                $(this).closest('div.dash-filter').find('.dash-filter-from #'+kunci2+"_from")[0].selectize.setValue(field.from);
                $(this).closest('div.dash-filter').find('.dash-filter-to').hide();
                field.type = type;
                field.from = field.from;
                field.to = "";
            break;
            case "range":
                
                field.type = type;
                field.from = field.from;
                field.to = field.to;
                
                $(this).closest('div.dash-filter').find('.dash-filter-from').removeClass('col-md-8');
                $(this).closest('div.dash-filter').find('.dash-filter-from').addClass('col-md-4');
                $(this).closest('div.dash-filter').find('.dash-filter-from #'+kunci2+"_from")[0].selectize.setValue(field.from);
                $(this).closest('div.dash-filter').find('.dash-filter-to #'+kunci2+"_to")[0].selectize.setValue(field.to);
                $(this).closest('div.dash-filter').find('.dash-filter-to').show();
            break;
        }
    });

    function getDataBox(param = {periode: periode}){
        $.ajax({
            type: 'GET',
            url: "{{ url('telu-dash/data-pbh-box') }}",
            data: param,
            dataType: 'json',
            async: true,
            success:function(result) {    
                $('#ver_dok_jml').text(0);
                $('#ver_dok_nilai').text(0);
                $('#ver_dok_jml_hari').text(0);
                $('#ver_dok_hari_ini').text(0);
                $('#ver_akun_jml').text(0);
                $('#ver_akun_nilai').text(0);
                $('#ver_akun_jml_hari').text(0);
                $('#ver_akun_hari_ini').text(0);
                $('#spb_jml').text(0);
                $('#spb_nilai').text(0);
                $('#spb_jml_hari').text(0);
                $('#spb_hari_ini').text(0);
                $('#spb_bayar_jml').text(0);
                $('#spb_bayar_nilai').text(0);
                $('#spb_bayar_jml_hari').text(0);
                $('#spb_bayar_hari_ini').text(0);
                $('#rata2-proses').text('0 Hari');
                if(result.status){
                    var line = result.data;
                    $('#ver_dok_jml').text(number_format(line.ver_dok.jml));
                    $('#ver_dok_nilai').text(toMilyar(line.ver_dok.nilai));
                    $('#ver_dok_jml_hari').text('Proses '+number_format(line.ver_dok.jml_hari)+' hari');
                    $('#ver_dok_hari_ini').text('+'+number_format(line.ver_dok.hari_ini)+' hari ini');
                    $('#ver_akun_jml').text(number_format(line.ver_akun.jml));
                    $('#ver_akun_nilai').text(toMilyar(line.ver_akun.nilai));
                    $('#ver_akun_jml_hari').text('Proses '+number_format(line.ver_akun.jml_hari)+' hari');
                    $('#ver_akun_hari_ini').text('+'+number_format(line.ver_akun.hari_ini)+' hari ini');
                    $('#spb_jml').text(number_format(line.spb.jml));
                    $('#spb_nilai').text(toMilyar(line.spb.nilai));
                    $('#spb_jml_hari').text('Proses '+number_format(line.spb.jml_hari)+' hari');
                    $('#spb_hari_ini').text('+'+number_format(line.spb.hari_ini)+' hari ini');
                    $('#spb_bayar_jml').text(number_format(line.spb_bayar.jml));
                    $('#spb_bayar_nilai').text(toMilyar(line.spb_bayar.nilai));
                    $('#spb_bayar_hari_ini').text('+'+number_format(line.spb_bayar.hari_ini)+' hari ini');
                    $('#spb_bayar_jml_hari').text('Proses '+number_format(line.spb_bayar.jml_hari)+' hari');
                    $('#rata2-proses').text(number_format(line.rata_rata.jml_hari,1)+' Hari');
                    
                }
            }
        });
    }
    
    function getJenisPengajuan(param = {periode: periode}){
        $.ajax({
            type:"GET",
            url:"{{ url('telu-dash/data-pbh-jenis-aju') }}",
            data: param,
            dataType:"JSON",
            success:function(result){
                
                chartAju = Highcharts.chart('chart-pengajuan', {
                    chart: {
                        type: 'pie',
                        height: ($height - 250)/2
                    },
                    title: {
                        text: '',
                    },
                    legend:{
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: '{point.y}({point.percentage:.1f}%)'
                    },
                    plotOptions: {
                        pie: {
                            padding: 10,
                            allowPointSelect: true,
                            cursor: 'pointer',
                            innerSize: '50%',
                            size: '70%',
                            dataLabels: {
                                enabled: true,
                                useHTML: true,
                                align: 'left',
                                formatter: function () {
                                    var name = this.point.name;
                                    return $('<div/>').css({
                                        'border' : '0',// just white in my case
                                        'max-width': '70px',
                                        'overflow':'hidden'
                                    }).addClass('fs-8').html(name+':<br/>'+number_format(this.y)+'('+number_format(this.percentage)+'%)')[0].outerHTML;
                                }
                            }
                        }
                    },
                    series: [{
                        data: result.data
                    }]
                }, function(){
                    var series = this.series;
                    for (var i = 0, ie = series.length; i < ie; ++i) {
                        var points = series[i].data;
                        for (var j = 0, je = points.length; j < je; ++j) {
                            if (points[j].graphic) {
                                points[j].graphic.element.style.fill = result.colors[j];
                            }
                        }
                    }
                });

            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/dash-telu/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        })
    }

    function getNilaiKas(param = {periode: periode}){
        $.ajax({
            type:"GET",
            url:"{{ url('telu-dash/data-pbh-kas') }}",
            data: param,
            dataType:"JSON",
            success:function(result){
                chartKas = Highcharts.chart('chart-kas', {
                    chart: {
                        type: 'column',
                        height: ($height - 250)/2
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: 'Nilai Kas Keluar Tiap Taun YoY',
                        align: 'left'
                    },
                    xAxis: {
                        categories: [
                            'Jan',
                            'Feb',
                            'Mar',
                            'Apr',
                            'May',
                            'Jun',
                            'Jul',
                            'Aug',
                            'Sep',
                            'Oct',
                            'Nov',
                            'Dec'
                        
                        ],
                        crosshair: true,
                        title: {
                            text: 'Bulan'
                        }
                    },
                    yAxis: {
                        title: 'Nilai',
                        labels: {
                            formatter: function() {
                                return singkatNilai(this.value);
                            }
                        }
                    },
                    tooltip: {
                        // headerFormat: '<span style="font-size:10px">'+point.key+'</span><table>',
                        // pointFormat: '<tr><td style="color:green;padding:0">'+series.name+': </td>' +
                        //     '<td style="padding:0"><b>'+point.y+'</b></td></tr>',
                        // footerFormat: '</table>',
                        shared: true,
                        useHTML: true,
                        formatter: function() {
                            var s = '<b>'+ this.x +'</b>';
                            
                            $.each(this.points, function(i, point) {
                                s += '<br/>'+ point.series.name +': '+
                                    number_format(point.y) +'';
                            });
                            
                            return s;
                        },
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    legend: {
                        align: 'right',
                        verticalAlign: 'top'
                    },
                    series: [{
                        name: 'Tahun Lalu',
                        color: '#D9D9D9',
                        data: result.data.tahun_lalu

                    }, {
                        name: 'Tahun Sekarang',
                        color: '#007AFF',
                        data: result.data.tahun_ini

                    }]
                });
            } 
        });
    }

    function getRata2Hari(param = {periode: periode}){
        $.ajax({
            type:"GET",
            url:"{{ url('telu-dash/data-pbh-rata2-hari') }}",
            data: param,
            dataType:"JSON",
            success:function(result){
                chartHarian = Highcharts.chart('chart-harian', {
                    chart: {
                        type: 'column',
                        height: ($height - 250)/2
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: 'Rata-rata Hari Proses Tiap Bulan',
                        align: 'left'
                    },
                    xAxis: {
                        categories: [
                            'Jan',
                            'Feb',
                            'Mar',
                            'Apr',
                            'May',
                            'Jun',
                            'Jul',
                            'Aug',
                            'Sep',
                            'Oct',
                            'Nov',
                            'Dec'
                        
                        ],
                        crosshair: true,
                        title: {
                            text: 'Bulan'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Nilai'
                        },
                        labels: {
                            formatter: function() {
                                return singkatNilai(this.value);
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:green;padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y}</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    legend: {
                        align: 'right',
                        verticalAlign: 'top'
                    },
                    series: result.series
                });
            } 
        });
    }

    function getJmlSelesai(param = {periode: periode}){
        $.ajax({
            type:"GET",
            url:"{{ url('telu-dash/data-pbh-jml-selesai') }}",
            data: param,
            dataType:"JSON",
            success:function(result){
                chartCapai = Highcharts.chart('chart-pencapaian', {
                    chart: {
                        type: 'column',
                        height: ($height - 250)/2
                    },
                    title: {
                        align: 'left',
                        text: 'Jumlah Pengajuan Selesai Tiap Bulan'
                    },
                    accessibility: {
                        announceNewData: {
                            enabled: true
                        }
                    },
                    xAxis: {
                        title: {
                            text: 'Bulan'
                        },
                        categories: [
                            'Jan',
                            'Feb',
                            'Mar',
                            'Apr',
                            'May',
                            'Jun',
                            'Jul',
                            'Aug',
                            'Sep',
                            'Oct',
                            'Nov',
                            'Dec'
                        
                        ]
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah'
                        },
                        labels: {
                            formatter: function() {
                                return singkatNilai(this.value);
                            }
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                formatter: function() {
                                    return number_format(this.y);
                                }
                            }
                        }
                    },

                    credits: {
                        enabled: false
                    },

                    tooltip: {
                        formatter: function() {
                            return number_format(this.y);
                        }
                    },

                    series: [
                        {
                            name: "Jumlah Pengajuan Selesai",
                            color: '#FFCC00',
                            data: result.data
                        }
                    ]
                });
            } 
        });
    }

    function getFilterDefaultDash(){
        $.ajax({
            type: 'GET',
            url: "{{ url('telu-dash/dash-filter-default') }}",
            dataType: 'json',
            async: true,
            success:function(result) { 
                tahun = result.tahun;
                periode = result.periode;
                $dash_periode.from = periode;
                getPeriode();

                getDataBox({
                    periode: periode,
                    kode_pp: kode_pp,
                    kode_bidang: kode_bidang
                })
                getJenisPengajuan({
                    periode: periode,
                    kode_pp: kode_pp,
                    kode_bidang: kode_bidang
                })
                getNilaiKas({
                    periode: periode,
                    kode_pp: kode_pp,
                    kode_bidang: kode_bidang
                })
                getRata2Hari({
                    periode: periode,
                    kode_pp: kode_pp,
                    kode_bidang: kode_bidang
                })
                getJmlSelesai({
                    periode: periode,
                    kode_pp: kode_pp,
                    kode_bidang: kode_bidang
                }) 
                
            } 
        })
    }

    getFilterDefaultDash();
    // getDataBox();
    // getJenisPengajuan();
    // getNilaiKas();
    // getRata2Hari();
    // getJmlSelesai();

    // CIRCLE
    $('#circle-agenda').circleProgress({
        value: 0.78,
        size: 100,
        reverse: false,
        thickness: 20,
        fill: {
            color: ["#457B9D"]
        }
    });

    $('#circle-agenda').find('strong').html(`
        <p class="my-0 text-circle">78%</p>
    `)
    // END CIRCLE

    // CHART HARIAN
    // chartHarian = Highcharts.chart('chart-harian', {
    //     chart: {
    //         type: 'column'
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     title: {
    //         text: 'Rata-rata Hari Proses Tiap Bulan',
    //         align: 'left'
    //     },
    //     xAxis: {
    //         categories: [
    //             'Jan',
    //             'Feb',
    //             'Mar',
    //             'Apr',
    //             'May',
    //             'Jun',
    //             'Jul',
    //             'Aug',
    //             'Sep',
    //             'Oct',
    //             'Nov',
    //             'Dec'
            
    //         ],
    //         crosshair: true,
    //         title: {
    //             text: 'Bulan'
    //         }
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: 'Nilai'
    //         }
    //     },
    //     tooltip: {
    //         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    //         pointFormat: '<tr><td style="color:green;padding:0">{series.name}: </td>' +
    //             '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    //         footerFormat: '</table>',
    //         shared: true,
    //         useHTML: true
    //     },
    //     plotOptions: {
    //         column: {
    //             pointPadding: 0.2,
    //             borderWidth: 0
    //         }
    //     },
    //     legend: {
    //         align: 'right',
    //         verticalAlign: 'top'
    //     },
    //     series: [{
    //         name: '2 hari',
    //         data: [180, 180, 106.4, 129.2, 144.0, 176.0,100,100,100,100,100,100]

    //     }, {
    //         name: '3 hari',
    //         data: [200, 150, 98.5, 93.4, 106.0, 84.5,100,100,100,100,100,100]

    //     },{
    //         name: '4 hari',
    //         data: [200, 150, 98.5, 93.4, 106.0, 84.5,100,100,100,100,100,100]

    //     },{
    //         name: '5 hari',
    //         data: [200, 150, 98.5, 93.4, 106.0, 84.5,100,100,100,100,100,100]

    //     },
    //     {
    //         name: '',
    //         type: 'spline',
    //         data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
    //         tooltip: {
    //             valueSuffix: ''
    //         }
    //     }
    // ]
    // });
    // END CHART HARIAN
    // CHART Pengajuan Bulan
    
    // chartCapai = Highcharts.chart('chart-pencapaian', {
    //     chart: {
    //         type: 'column'
    //     },
    //     title: {
    //         align: 'left',
    //         text: 'Jumlah Pengajuan Selesai Tiap Bulan'
    //     },
    //     accessibility: {
    //         announceNewData: {
    //             enabled: true
    //         }
    //     },
    //     xAxis: {
    //         title: {
    //             text: 'Bulan'
    //         },
    //         labels: {
    //             enabled: false
    //         }
    //     },
    //     yAxis: {
    //         title: {
    //             text: 'Jumlah'
    //         }
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     plotOptions: {
    //         series: {
    //             borderWidth: 0,
    //             dataLabels: {
    //                 enabled: true,
    //                 format: '{point.y:.1f}%'
    //             }
    //         }
    //     },

    //     credits: {
    //         enabled: false
    //     },

    //     tooltip: {
    //         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    //         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    //     },

    //     series: [
    //         {
    //             name: "Browsers",
    //             colorByPoint: true,
    //             data: [
    //                 {
    //                     name: "Chrome",
    //                     y: 62.74,
    //                 },
    //                 {
    //                     name: "Firefox",
    //                     y: 10.57,
    //                 },
    //                 {
    //                     name: "Internet Explorer",
    //                     y: 7.23,
    //                 },
    //                 {
    //                     name: "Safari",
    //                     y: 5.58,
    //                 },
    //                 {
    //                     name: "Edge",
    //                     y: 4.02,
    //                 },
    //                 {
    //                     name: "Opera",
    //                     y: 1.92,
    //                 },
    //                 {
    //                     name: "Other",
    //                     y: 7.62,
    //                 },
    //                 {
    //                     name: "Other",
    //                     y: 7.62,
    //                 },
    //                 {
    //                     name: "Other",
    //                     y: 7.62,
    //                 },
    //                 {
    //                     name: "Other",
    //                     y: 7.62,
    //                 },
    //                 {
    //                     name: "Other",
    //                     y: 7.62,
    //                 },
    //                 {
    //                     name: "Other",
    //                     y: 7.62,
    //                 }
    //             ]
    //         }
    //     ]
    // });
    // END CHART PENCAPAIAN
    //PENGAJUAN
    // var chartAju = null
    
    // chartAju = Highcharts.chart('chart-pengajuan', {
    //     chart: {
    //         type: 'pie'
    //     },
    //     title: {
    //         text: 'Jenis Pengajuan',
    //         align: 'left'
    //     },
    //     credits: {
    //         enabled: false
    //     },

    //     accessibility: {
    //         announceNewData: {
    //             enabled: true
    //         },
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },

    //     plotOptions: {
    //         series: {
    //             dataLabels: {
    //                 enabled: true,
    //                 format: '{point.name}: {point.y:.1f}%'
    //             }
    //         }
    //     },

    //     tooltip: {
    //         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    //         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    //     },

    //     series: [{
    //         name: "Jenis Pengajuan",
    //         colorByPoint: true,
    //         data: [

    //             {
    //                 name: "Online 283",
    //                 y: 26,
    //                 drilldown: "Firefox"
    //             },
    //             {
    //                 name: "Offline 736",
    //                 y: 74,
    //                 drilldown: null
    //             }
    //         ]
    //     }],
    //     drilldown: {
    //         series: [{
    //                 name: "Chrome",
    //                 id: "Chrome",
    //                 data: [
    //                     [
    //                         "v65.0",
    //                         0.1
    //                     ],
    //                     [
    //                         "v64.0",
    //                         1.3
    //                     ],
    //                     [
    //                         "v63.0",
    //                         53.02
    //                     ],
    //                     [
    //                         "v62.0",
    //                         1.4
    //                     ],
    //                     [
    //                         "v61.0",
    //                         0.88
    //                     ],
    //                     [
    //                         "v60.0",
    //                         0.56
    //                     ],
    //                     [
    //                         "v59.0",
    //                         0.45
    //                     ],
    //                     [
    //                         "v58.0",
    //                         0.49
    //                     ],
    //                     [
    //                         "v57.0",
    //                         0.32
    //                     ],
    //                     [
    //                         "v56.0",
    //                         0.29
    //                     ],
    //                     [
    //                         "v55.0",
    //                         0.79
    //                     ],
    //                     [
    //                         "v54.0",
    //                         0.18
    //                     ],
    //                     [
    //                         "v51.0",
    //                         0.13
    //                     ],
    //                     [
    //                         "v49.0",
    //                         2.16
    //                     ],
    //                     [
    //                         "v48.0",
    //                         0.13
    //                     ],
    //                     [
    //                         "v47.0",
    //                         0.11
    //                     ],
    //                     [
    //                         "v43.0",
    //                         0.17
    //                     ],
    //                     [
    //                         "v29.0",
    //                         0.26
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Firefox",
    //                 id: "Firefox",
    //                 data: [
    //                     [
    //                         "v58.0",
    //                         1.02
    //                     ],
    //                     [
    //                         "v57.0",
    //                         7.36
    //                     ],
    //                     [
    //                         "v56.0",
    //                         0.35
    //                     ],
    //                     [
    //                         "v55.0",
    //                         0.11
    //                     ],
    //                     [
    //                         "v54.0",
    //                         0.1
    //                     ],
    //                     [
    //                         "v52.0",
    //                         0.95
    //                     ],
    //                     [
    //                         "v51.0",
    //                         0.15
    //                     ],
    //                     [
    //                         "v50.0",
    //                         0.1
    //                     ],
    //                     [
    //                         "v48.0",
    //                         0.31
    //                     ],
    //                     [
    //                         "v47.0",
    //                         0.12
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Internet Explorer",
    //                 id: "Internet Explorer",
    //                 data: [
    //                     [
    //                         "v11.0",
    //                         6.2
    //                     ],
    //                     [
    //                         "v10.0",
    //                         0.29
    //                     ],
    //                     [
    //                         "v9.0",
    //                         0.27
    //                     ],
    //                     [
    //                         "v8.0",
    //                         0.47
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Safari",
    //                 id: "Safari",
    //                 data: [
    //                     [
    //                         "v11.0",
    //                         3.39
    //                     ],
    //                     [
    //                         "v10.1",
    //                         0.96
    //                     ],
    //                     [
    //                         "v10.0",
    //                         0.36
    //                     ],
    //                     [
    //                         "v9.1",
    //                         0.54
    //                     ],
    //                     [
    //                         "v9.0",
    //                         0.13
    //                     ],
    //                     [
    //                         "v5.1",
    //                         0.2
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Edge",
    //                 id: "Edge",
    //                 data: [
    //                     [
    //                         "v16",
    //                         2.6
    //                     ],
    //                     [
    //                         "v15",
    //                         0.92
    //                     ],
    //                     [
    //                         "v14",
    //                         0.4
    //                     ],
    //                     [
    //                         "v13",
    //                         0.1
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Opera",
    //                 id: "Opera",
    //                 data: [
    //                     [
    //                         "v50.0",
    //                         0.96
    //                     ],
    //                     [
    //                         "v49.0",
    //                         0.82
    //                     ],
    //                     [
    //                         "v12.1",
    //                         0.14
    //                     ]
    //                 ]
    //             }
    //         ]
    //     }
    // });
    //END PENGAJUAN

    //KAS
    // chartKas = Highcharts.chart('chart-kas', {
    //     chart: {
    //         type: 'column'
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     title: {
    //         text: 'Nilai Kas Keluar Tiap Taun YoY',
    //         align: 'left'
    //     },
    //     xAxis: {
    //         categories: [
    //             'Jan',
    //             'Feb',
    //             'Mar',
    //             'Apr',
    //             'May',
    //             'Jun',
    //             'Jul',
    //             'Aug',
    //             'Sep',
    //             'Oct',
    //             'Nov',
    //             'Dec'
            
    //         ],
    //         crosshair: true,
    //         title: {
    //             text: 'Bulan'
    //         }
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: 'Nilai'
    //         }
    //     },
    //     tooltip: {
    //         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    //         pointFormat: '<tr><td style="color:green;padding:0">{series.name}: </td>' +
    //             '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    //         footerFormat: '</table>',
    //         shared: true,
    //         useHTML: true
    //     },
    //     plotOptions: {
    //         column: {
    //             pointPadding: 0.2,
    //             borderWidth: 0
    //         }
    //     },
    //     legend: {
    //         align: 'right',
    //         verticalAlign: 'top'
    //     },
    //     series: [{
    //         name: 'Tahun Lalu',
    //         data: [180, 180, 106.4, 129.2, 144.0, 176.0,100,100,100,100,100,100]

    //     }, {
    //         name: 'Tahun Sekarang',
    //         data: [200, 150, 98.5, 93.4, 106.0, 84.5,100,100,100,100,100,100]

    //     }
    // ]
    // });
    //END KAS
    // test lagi
    $('#dash-refresh').click(function(){
        getDataBox({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        });
        getJenisPengajuan({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        });
        getNilaiKas({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        });
        getJmlSelesai({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        });
        getRata2Hari({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        });
    });

    //FILTER
     
    $('#form-filter').submit(function(e){
        e.preventDefault();
        periode = $('#periode_from')[0].selectize.getValue();
        kode_pp = $('#kode_pp').val();
        nama_pp = kode_pp != "" ? trim($('.info-name_kode_pp').text()) : "";
        kode_bidang = $('#kode_bidang').val();
        nama_bidang = kode_bidang != "" ? trim($('.info-name_kode_bidang').text()) : "";
        getDataBox({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        })
        getJenisPengajuan({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        })
        getNilaiKas({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        })
        getRata2Hari({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        })
        getJmlSelesai({
            periode: periode,
            kode_bidang: kode_bidang,
            kode_pp: kode_pp
        })
        $('#modalFilter').modal('hide');
    });

    $('#btn-reset').click(function(e){
        e.preventDefault(); 
        $('#periode_from')[0].selectize.setValue('');
        removeInfoField('kode_bidang');
        removeInfoField('kode_pp');
    });
    
    $('#dash-filter').click(function(){
        $("#periode_from")[0].selectize.setValue(periode);
        if(kode_bidang != ""){
            showInfoField('kode_bidang',kode_bidang,nama_bidang)
        }else{
            removeInfoField('kode_bidang');
        }
        if(kode_pp != ""){
            showInfoField('kode_pp',kode_pp,nama_pp)
        }else{
            removeInfoField('kode_pp');
        }
        $('#modalFilter').modal('show');
    });

    $("#btn-close").on("click", function (event) {
        event.preventDefault();
        
        $('#modalFilter').modal('hide');
    });

    $('#modalFilter').on('shown.bs.modal', function () {
        resizeNameField('kode_bidang');
        resizeNameField('kode_pp');
    })

    $('#modalFilter').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id){
            case 'kode_bidang':
                var options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('telu-dash/bidang') }}",
                    columns : [
                        { data: 'kode_bidang' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Bidang",
                    pilih : "kode_bidang",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    parameter : {periode : $('#periode_from')[0].selectize.getValue()},
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"]
                }
            break;
            case 'kode_pp':
                var options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('telu-dash/pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP",
                    pilih : "kode_pp",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    parameter: {
                        kode_bidang: $('#kode_bidang').val(),
                        periode : $('#periode_from')[0].selectize.getValue()
                    },
                    width : ["30%","70%"]
                }
            break;
        }
        showInpFilter(options);
    });
    $('#modal-search').css({'z-index':2000,'border':'1px solid #d7d7d7'});

    $(window).on('resize', function(){
        var win = $(this); //this = window
        var height = win.height();
        var heighChart = 0;

        heighChart = (height - 250)/2;

        chartAju.update({
            chart: {
                height: heighChart,
            }
        })
        chartCapai.update({
            chart: {
                height: heighChart,
            }
        })
        chartHarian.update({
            chart: {
                height: heighChart,
            }
        })
        chartKas.update({
            chart: {
                height: heighChart,
            }
        })
    });
</script>

{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-9 px-0">
            <h6 id="title-dash" class="title-dash mt-0">Perbendaharaan</h6>
        </div>
        <div class="col-3 text-right">
            <a href="#" id="dash-filter" class="mr-3">
                <i class="simple-icon-equalizer" style="font-size:20px;color:#9e9e9e"></i>
                <span style="position: relative;top: -3px;">Filter</span>
            </a>
            <a href="#" id="dash-refresh">
                <i class="simple-icon-refresh" style="font-size:20px;color:#9e9e9e"></i>
                <span style="position: relative;top: -3px;">Refresh</span>
            </a>
        </div>
    </div>
</section>
{{-- END HEADER --}}

{{-- BODY --}}
<section id="main-dash" class="mt-12 p-24">
    <div id="dekstop-1" class="dekstop">
        {{-- FIRST ROW CARD --}}
        <div class="row mb-2">
            {{-- VERIFIKASI DOKUMEN --}}
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                <div class="card card-dash rounded-lg">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">Verifikasi Dokumen</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <span class="text-success" id="ver_dok_hari_ini"></span>
                            </div>
                            <div class="col-6" style="border-left: 1px dashed black;">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_nilai"></div>
                                <span class="text-success" id="ver_dok_jml_hari"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END VERIFIKASI DOKUMEN --}}

            {{-- VERIFIKASI AKUN --}}
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                <div class="card card-dash rounded-lg">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">Verifikasi Akun</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_akun_jml"></div>
                                <span class="text-success" id="ver_akun_hari_ini"></span>
                            </div>
                            <div class="col-6" style="border-left: 1px dashed black;">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_akun_nilai"></div>
                                <span class="text-success" id="ver_akun_jml_hari"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END VERIFIKASI AKUN --}}

            {{-- SPB --}}
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                <div class="card card-dash rounded-lg">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">SPB</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="spb_jml"></div>
                                <span class="text-success" id="spb_hari_ini"></span>
                            </div>
                            <div class="col-6" style="border-left: 1px dashed black;">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="spb_nilai"></div>
                                <span class="text-success" id="spb_jml_hari"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END SPB --}}

            {{-- SUDAH BAYAR --}}
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                <div class="card card-dash rounded-lg">
                    <div class="card-body pt-2" style="width:100%; height:6rem;">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">Sudah Bayar</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="spb_bayar_jml"></div>
                                <span class="text-success" id="spb_bayar_hari_ini"></span>
                            </div>
                            <div class="col-6" style="border-left: 1px dashed black;">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="spb_bayar_nilai"></div>
                                <span class="text-success" id="spb_bayar_jml_hari"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END SUDAH BAYAR --}}
        </div>
        {{-- END FIRST ROW CARD --}}

        <div class="row mb-2">
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                {{-- PENGAJUAN--}}
                <div class="card card-dash rounded-lg" >
                    <div class="card-body p-1">
                        <div id="chart-pengajuan" style="width:100%;"></div>
                    </div>
                </div>
                {{-- END PENGAJUAN --}}
            </div>

            <div class="col-lg-6 col-md-12 px-1">
                {{-- KAS--}}
                <div class="card card-dash rounded-lg" >
                    <div class="card-body p-1">
                        <div id="chart-kas" style="width:100%;"></div>
                    </div>
                </div>
                {{-- END PENGAJUAN --}}
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                {{-- PENGAJUAN--}}
                <div class="card card-dash rounded-lg" style="height: calc((100vh - 230px)/2)">
                    <div class="card-body">
                        <div class="p-2" style="width:100%;">
                            <div class="row">
                                <div class="col-12"><span style="font-size: 1.5rem;">Rata-rata Proses</span></div>
                            </div>
                            <div class="row">
                                <div class="col-8 font-weight-bold" style="font-size: 2rem;" id="rata2-proses"></div>
                                <div class="col-4 text-center">
                                    <i class="simple-icon-check" style="font-size: 2rem; color:green"></i>
                                </div>
                            </div>
                            <p>Proses pengerjaan sudah sesuai sasaran mutu yang diterapkan.</p>
                        </div>
                    </div>
                </div>
                {{-- END PENGAJUAN --}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 px-1">
                {{-- RATA2 HARI --}}
                <div class="card card-dash rounded-lg">
                    <div class="card-body p-1">
                        <div id="chart-harian" style="width:100%;"></div>
                    </div>
                </div>
                {{-- END RATA2 HARI --}}
            </div>
            <div class="col-lg-6 col-md-12 px-1">
                {{-- PENCAPAIAN SASARAN MUTU --}}
                <div class="card card-dash rounded-lg">
                    <div class="card-body p-1">
                        <div id="chart-pencapaian" style="width:100%;"></div>
                    </div>
                </div>
                {{-- END PENCAPAIAN SASARAN MUTU --}}
            </div>
        </div>
        {{-- END RIGHT SIDE --}}

</section>
{{-- END BODY --}}

@include('modal_search')

<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
aria-labelledby="modalFilter" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 350px;">
        <div class="modal-content">
            <form id="form-filter">
                <div class="modal-header pb-0" style="border:none">
                    <h6 class="modal-title pl-0">Filter</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none">
                    <div class="form-group row dash-filter">
                        <p class="dash-kunci" hidden>dash_periode</p> 
                        <label class="col-md-12">Periode</label>
                        <div class="col-md-4 dash-filter-typediv">
                            <select class="form-control dash-filter-type" data-width="100%" name="periode[]" id="periode_type">
                                <option value='' disabled>Pilih</option>
                                <option value='='>=</option>
                                <option value='<='><=</option>
                                <option value='range'>Range</option>
                            </select>
                        </div>
                        <div class="col-md-12 dash-filter-from">
                            <select class="form-control" data-width="100%" name="periode[]" id="periode_from">
                                <option value='' disabled>Pilih</option>
                            </select>
                        </div>
                        <div class="col-md-4 dash-filter-to">
                            <select class="form-control" data-width="100%" name="periode[]" id="periode_to">
                                <option value='' disabled>Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row inp-filter">
                        <label class="col-md-12">Bidang</label>
                        <div class="input-group col-12">
                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                <span class="input-group-text info-code_kode_bidang" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                            </div>
                            <input type="text" class="form-control inp-label-kode_bidang" id="kode_bidang" name="kode_bidang" value="" title="" readonly>
                            <span class="info-name_kode_bidang hidden">
                                <span></span> 
                            </span>
                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="right: 50px;"></i>
                            <i class="simple-icon-magnifier search-item2" id="search_kode_bidang" style="right: 25px;"></i>
                        </div>
                    </div>
                    <div class="form-group row inp-filter">
                        <label class="col-md-12">PP</label>
                        <div class="input-group col-12">
                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                            </div>
                            <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" name="kode_pp" value="" title="" readonly>
                            <span class="info-name_kode_pp hidden">
                                <span></span> 
                            </span>
                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="right: 50px;"></i>
                            <i class="simple-icon-magnifier search-item2" id="search_kode_pp" style="right: 25px;"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;position:absolute;bottom:0;justify-content:flex-end;width:100%">
                    <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>
</div>