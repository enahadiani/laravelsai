function format_number(x){
    var num = parseFloat(x).toFixed(0);
    num = sepNumX(num);
    return num;
}

function reverseDate2(date_str, separator, newseparator){
    if(typeof separator === 'undefined'){separator = '-'}
    if(typeof newseparator === 'undefined'){newseparator = '-'}
    date_str = date_str.split(' ');
    var str = date_str[0].split(separator);

    return str[2]+newseparator+str[1]+newseparator+str[0];
}


function last_add(param,isi){
    var rowIndexes = [];
    dataTable.rows( function ( idx, data, node ) {             
        if(data[param] === isi){
            rowIndexes.push(idx);                  
        }
        return false;
    }); 
    dataTable.row(rowIndexes).select();
    $('.selected td:eq(0)').addClass('last-add');
    setTimeout(function() {
        $('.selected td:eq(0)').removeClass('last-add');
        dataTable.row(rowIndexes).deselect();
    }, 1000 * 60 * 10);
}

function generateTable(id,url,columnDefs,columns,url_sesi,byOrder = []) {
    var dataTable = $("#"+id).DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': url,
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else if(!json.status && json.message == "Unauthorized"){
                    window.location.href = url_sesi;
                    return [];
                }else{
                    return [];
                }
            }
        },
        'order':byOrder,
        'columns': columns,
        'columnDefs': columnDefs,
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

    return dataTable;
}

function generateTableWithoutAjax(id,columnDefs,columns,data_def,byOrder = []) {
    var dataTable = $("#"+id).DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: data_def,
        columnDefs: columnDefs,
        columns: columns,
        order:byOrder,
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

    return dataTable;
}


function showInpFilter(settings){
    var par = settings.id;
    var header = settings.header;
    $target = settings.target1;
    $target2 = settings.target2;
    $target3 = settings.target3;
    $target4 = settings.target4;
    var parameter = settings.parameter;
    var toUrl = settings.url;
    var columns = settings.columns;
    var judul = settings.judul;
    var jTarget1 = settings.jTarget1;
    var jTarget2 = settings.jTarget2;
    var width = settings.width;

    var header_html = '';
    for(i=0; i<header.length; i++){
        header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
    }

    
    if(settings.multi != undefined){
        var headerpilih_html = '';
        for(i=0; i<header.length; i++){
            headerpilih_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }
        headerpilih_html +=  "<th style='width:10%'>Action</th>";
        var table = `
        <div class="tab-content tabcontent-border col-12 p-0">
            <div class="tab-pane active" id="list" role="tabpanel">
                <table class='' width='100%' id='table-search'><thead><tr>`+header_html+`</tr></thead>
                <tbody></tbody></table>
            </div>
            <div class="tab-pane" id="terpilih" role="tabpanel">
                <table class='' width='100%' id='table-search2'><thead><tr>`+headerpilih_html+`</tr></thead>
                <tbody></tbody></table>
            </div>
        </div>
        <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
        $('#modal-search .modal-header').css('padding-bottom','0');
        $('#modal-search .modal-header ul').removeClass('hidden');
    }else{

        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        if(!$('#modal-search .modal-header ul').hasClass('hidden')){
            $('#modal-search .modal-header ul').addClass('hidden');
            $('#modal-search .modal-header').css('padding-bottom','1.75rem');
        }
    }
    table += "<tbody></tbody></table>";

    $('#modal-search .modal-body').html(table);

    var searchTable = $("#table-search").DataTable({
        sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        ajax: {
            "url": toUrl,
            "data": parameter,
            "type": "GET",
            "async": false,
            "dataSrc" : function(json) {
                return json.daftar;
            }
        },
        columns: columns,
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
        },
    });

    $('#modal-search .modal-title').html(judul);
    $('#modal-search').modal('show');
    searchTable.columns.adjust().draw();

    if(settings.multi != undefined){
        var searchTable2 = $("#table-search2").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            columns: columns,
            order: settings.orderby,
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
                lengthMenu: "Items Per Page _MENU_"
            },
            "columnDefs": [{
                "targets": settings.header.length, "data": null, "defaultContent": "<a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></a>"
            }]
        });
        searchTable2.columns.adjust().draw();

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }else{
                $(this).addClass('selected');
            }
            var datain = searchTable.rows('.selected').data();
            searchTable2.clear().draw();
            if(typeof datain !== 'undefined' && datain.length>0){
                searchTable2.rows.add(datain).draw(false);
            }
        });

        $('#table-search2 tbody').on('click', '.hapus-item', function () {
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            searchTable2.row( $(this).parents('tr') ).remove().draw();
            var rowIndexes = [];
            searchTable.rows( function ( idx, data, node ) {             
                if(data[settings.id] === kode){
                    rowIndexes.push(idx);                  
                }
                return false;
            }); 
            searchTable.row(rowIndexes).deselect();
        });

        $('#modal-search').on('click','#btn-ok',function(){
            var datain = searchTable.rows('.selected').data();
            if (settings.onItemSelected != undefined){
                if (typeof settings.onItemSelected === "function") {
                    settings.onItemSelected.call(this, datain);
                }
            }else{
                var kode = '';
                var nama = '';
                for(var i=0;i<datain.length;i++){
                    if(i == 0){
                        kode +=datain[i];
                    }else{
                        kode +=','+datain[i];
                    }
                }   
                $($target).val(kode);
                $($target).trigger('change');
            }
            $('#modal-search').modal('hide');
        });
    }else{
        if (settings.onItemSelected != undefined) {
                
            $('#table-search tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    searchTable.$('tr.selected').removeClass('selected');
                    $(this).toggleClass('selected');
    
                    var select_data = searchTable.row(this).data();
                    if (typeof settings.onItemSelected === "function") {
                        settings.onItemSelected.call(this, select_data);
                    }
                    $('#modal-search').modal('hide');
                }
            });
    
        }else{
            $('#table-search tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    searchTable.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
        
                    var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                    var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                    if(kode == "No data available in table"){
                        return false;
                    }
        
                    if(jTarget1 == "val"){
                        $($target).val(kode);
                    }else{
                        $('#'+par).css('border-left',0);
                        $('#'+par).val(kode);
                        $($target).text(kode);
                        $($target).attr("title",nama);
                        $($target).parents('div').removeClass('hidden');
                    }
        
                    if(jTarget2 == "val"){
                        $($target2).val(nama);
                    }else if(jTarget2 == "title"){
                        $($target2).attr("title",nama);
                        $($target2).removeClass('hidden');
                    }else if(jTarget2 == "text2"){
                        $($target2).text(nama);
                    }else{
                        var width= $('#'+par).width()-$('#search_'+par).width()-10;
                        var pos =$('#'+par).position();
                        var height = $('#'+par).height();
                        console.log(par);
                        $('#'+par).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
                        $($target2).width($('#'+par).width()-$('#search_'+par).width()-10).css({'left':pos.left,'height':height});
                        $($target2+' span').text(nama);
                        $($target2).attr("title",nama);
                        $($target2).removeClass('hidden');
                        $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden')
                    }
        
                    if($target3 != ""){
                        $($target3).text(nama);
                    }
        
                    if($target4 != ""){
                        if($target4 == "custom"){
                            custTarget($target,$(this).closest('tr'));
                        }
                        $($target).closest('tr').find($target4).click();
                    }
                    $('#modal-search').modal('hide');
                }
            });
        }
    }


}