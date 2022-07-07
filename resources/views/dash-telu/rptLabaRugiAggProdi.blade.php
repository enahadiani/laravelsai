<script type="text/javascript">
    var reportTable = []
    function drawLap(formData){
        saiPostLoad("{{ url('telu-report/lap-labarugi-agg-prodi') }}", null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('dash-telu/form/blank') }}");
           }
       });
   }

   function spasi(menu,jum)
	{
		var dat="";;
		for (var s = 0; s < jum; s++) 
		{
	  		dat+="&nbsp;&nbsp;&nbsp;&nbsp;";
	  	}
        if (menu==".")
        { 
            menu="";
        }
		return dat+menu;
	}

    function fnSpasi(level)
    {
        var tmp="";
        for (var f=1; f<=level; f++)
        {
            tmp+="&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        return tmp;
    }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){
            res.bentuk = '';
            var lokasi = res.lokasi;
            var periode = $periode.from;
            var tahun = periode.substr(0,4);
            var tahunrev = parseInt(tahun)-1;
            var html = `
            <style>
            .info-table thead{
                background:#4286f5;
                color:white;
            }
            .no-border td{
                border:0 !important;
            }
            .bold {
                font-weight:bold;
            }
            .header_laporan{
                vertical-align: middle !important;
            }
            .sbjudul{
                text-transform:uppercase;
            }
            
            
            table.dataTable{
                border-collapse:collapse !important;
            }
            .dataTables_scrollHeadInner,#table-report
            {
                width: 100% !important;
            }
            .dataTables_scrollHeadInner th {
                padding: 8px !important;
                border-bottom: 0px !important;
                vertical-align:middle;
                text-align:center;
            }
            .dataTables_scrollBody th {
                padding: 0px 8px !important;
            }
            .table-report thead th{
                padding: 0px 8px !important;
            }
            @media print {
                .dataTables_scrollBody{
                    overflow: unset !important;
                }
            }
            </style>`;
            var reportTable = [];
            for(var j=0; j < data.length; j++){

                var linex = data[j];
                html+=judul_lap("LAPORAN LABA RUGI ANGGARAN PP <br><span class='sbjudul'>"+linex.nama+"</span>",lokasi,'Periode '+$periode.fromname)+`
                <table  class='table table-bordered table-striped table-report' id='table-report-${j}' width='100%'>
                    <thead>
                        <tr>
                            <th width='28%' height='25'  class='header_laporan text-center' align='center'>Keterangan</th>
                            <th width='12%' class='header_laporan text-center' align='center'>RKA `+tahun+`</th>
                            <th width='12%' class='header_laporan text-center' align='center'>RKA s.d Bulan Berjalan `+tahun+`</th>
                            <th width='12%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan `+tahun+`</th>
                            <th width='12%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan `+tahunrev+`</th>
                            <th width='12%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan thd RKA `+tahun+`</th>
                            <th width='12%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan thd RKA s.d Bulan Berjalan `+tahun+`</th>
                            <th width='12%' class='header_laporan text-center' align='center'>Growth Thd `+tahunrev+`</th>
                        </tr>
                        <tr>
                            <td height='25'  class='header_laporan' align='center'>&nbsp;</td>
                            <td class='header_laporan' align='center'>1</td>
                            <td class='header_laporan' align='center'>2</td>
                            <td class='header_laporan' align='center'>3</td>
                            <td class='header_laporan' align='center'>4</td>
                            <td class='header_laporan' align='center'>5=3/1</td>
                            <td class='header_laporan' align='center'>6=3/2</td>
                            <td class='header_laporan' align='center'>7=(3-4)/4</td>
                        </tr>
                    </thead>
                    <tbody>`;
            
                // for (var i=0; i < linex.detail.length; i++)
                // {
                //     var line = linex.detail[i];
                //     if(linex.kode_pp == line.kode_pp){

                //         var persen1=0;var persen2=0;var persen3=0;
                //         if (line.n1!=0)
                //         {
                //             persen1=(line.n4/line.n1)*100;
                //         }
                //         if (line.n2!=0)
                //         {
                //             persen2=(line.n4/line.n2)*100;
                //         }
                //         if (line.n5!=0)
                //         {
                //             persen3=(line.n4-line.n5)/line.n5*100;
                //         }
                //         html+=`<tr>
                //         <td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+` `+line.nama+`</td>`;
                //         if (line.kode_neraca!="OR" && line.kode_fs=="FS4")
                //         {
                //             html+=`<td class='isi_laporan' align='right'>`+number_format(line.n1)+`</td>
                //             <td class='isi_laporan' align='right'>`+number_format(line.n2)+`</td>
                //             <td class='isi_laporan' align='right'>`+number_format(line.n4)+`</td>
                //             <td class='isi_laporan' align='right'>`+number_format(line.n5)+`</td>
                //             `;
                //         }
                //         else
                //         {
                //             html+=`<td class='isi_laporan' align='center'>`+number_format(line.n1)+`%</td>
                //                 <td class='isi_laporan' align='center'>`+number_format(line.n2)+`%</td>
                //                 <td class='isi_laporan' align='center'>`+number_format(line.n4)+`%</td>
                //                 <td class='isi_laporan' align='center'>`+number_format(line.n5)+`%</td>
                //                 `;
                //         }
                //             html+=`<td class='isi_laporan' align='center'>`+number_format(persen1)+`%</td>
                //             <td class='isi_laporan' align='center'>`+number_format(persen2)+`%</td>
                //             <td class='isi_laporan' align='center'>`+number_format(persen3)+`%</td>
                //             </tr>`;
                        
                //     }
                // }
		
                html+=`</tbody>
                    </table>
                <div style="page-break-after:always"></div>`;
                $('#canvasPreview').append(html);
                if($('#table-report-'+j).length > 0){
                    reportTable[j] = $("#table-report-"+j).DataTable({
                        destroy: true,
                        scrollY: 'calc(100vh - 360px)',
                        paging: false,
                        ordering: false,
                        scrollX: false,
                        columns:[
                            { data: 'nama' }, //0
                            { data: 'n1' }, // 1
                            { data: 'n2' }, // 2
                            { data: 'n4' }, // 3
                            { data: 'n5' }, // 4
                            { data: null }, // 5
                            { data: null }, // 6
                            { data: null }, // 7
                        ],
                        columnDefs: [
                            {  
                                'targets': [0],
                                'className': '',
                                "render": function ( data, type, row, meta ) {
                                    return fnSpasi(row.level_spasi)+row.nama;
                                }
                            }, 
                            {  
                                'targets': [1],
                                'className': 'text-right',
                                "render": function ( data, type, row, meta ) {
                                    if(row.kode_neraca!="OR" && row.kode_fs=="FS4"){
                                        return number_format(row.n1);
                                    }else{
                                        return number_format(row.n1,2)+'%';
                                    }
                                }
                            }, 
                            {  
                                'targets': [2],
                                'className': 'text-right',
                                "render": function ( data, type, row, meta ) {
                                    if(row.kode_neraca!="OR" && row.kode_fs=="FS4"){
                                        return number_format(row.n2);
                                    }else{
                                        return number_format(row.n2,2)+'%';
                                    }
                                }
                            }, 
                            {  
                                'targets': [3],
                                'className': 'text-right',
                                "render": function ( data, type, row, meta ) {
                                    if(row.kode_neraca!="OR" && row.kode_fs=="FS4"){
                                        return number_format(row.n4);
                                    }else{
                                        return number_format(row.n4,2)+'%';
                                    }
                                }
                            }, 
                            {  
                                'targets': [4],
                                'className': 'text-right',
                                "render": function ( data, type, row, meta ) {
                                    if(row.kode_neraca!="OR" && row.kode_fs=="FS4"){
                                        return number_format(row.n5);
                                    }else{
                                        return number_format(row.n5,2)+'%';
                                    }
                                }
                            }, 
                            {  
                                'targets': [5],
                                'className': 'text-right',
                                "render": function ( data, type, row, meta ) {
                                    var persen1=0;
                                    if (row.n1!=0)
                                    {
                                        persen1=(row.n4/row.n1)*100;
                                    }
                                    return number_format(persen1,2)+'%';
                                }
                            }, 
                            {  
                                'targets': [6],
                                'className': 'text-right',
                                "render": function ( data, type, row, meta ) {
                                    var persen2=0;
                                    if (row.n2!=0)
                                    {
                                        persen2=(row.n4/row.n2)*100;
                                    }
                                    return number_format(persen2,2)+'%';
                                }
                            },
                            {  
                                'targets': [7],
                                'className': 'text-right',
                                "render": function ( data, type, row, meta ) {
                                    var persen3=0;
                                    if (row.n5!=0)
                                    {
                                        persen3=((row.n4-row.n5)/row.n5)*100;
                                    }
                                    return number_format(persen3,2)+'%';
                                }
                            }, 
                        ],
                        sDom: 't<"row view-pager pl-2 mt-0"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                        drawCallback: function () {
                            $($(".dataTables_wrapper .pagination li:first-of-type"))
                            .find("a")
                            .addClass("prev");
                            $($(".dataTables_wrapper .pagination li:last-of-type"))
                            .find("a")
                            .addClass("next");
                            
                            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
                        },
                        language: {
                            paginate: {
                                previous: "<i class='simple-icon-arrow-left'></i>",
                                next: "<i class='simple-icon-arrow-right'></i>"
                            },
                            search: "_INPUT_",
                            searchPlaceholder: "Search...",
                            lengthMenu: "Items Per Page _MENU_",
                            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                            infoFiltered: "(terfilter dari _MAX_ total entri)"
                        }
                    });
                    reportTable[j].rows.add(linex.detail).draw(false);
                }
            }
        }
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   