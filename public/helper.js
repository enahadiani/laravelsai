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
    }
    else if(settings.multi2 != undefined){
        var headerpilih_html = '';
        headerpilih_html +=  "<th style='width:5%' id='checkbox_search'><input id='check-all_search' name='select_all_search' value='1' type='checkbox'></th>";
        for(i=0; i<header.length; i++){
            headerpilih_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }
        var table = `<table class='' width='100%' id='table-search'><thead><tr>`+headerpilih_html+`</tr></thead>
        <tbody></tbody></table>
        <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
        if(!$('#modal-search .modal-header ul').hasClass('hidden')){
            $('#modal-search .modal-header ul').addClass('hidden');
            $('#modal-search .modal-header').css('padding-bottom','1.75rem');
        }
    }
    else{

        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        if(!$('#modal-search .modal-header ul').hasClass('hidden')){
            $('#modal-search .modal-header ul').addClass('hidden');
            $('#modal-search .modal-header').css('padding-bottom','1.75rem');
        }
    }
    table += "<tbody></tbody></table>";

    $('#modal-search .modal-body').html(table);

    if(settings.multi2 != undefined){
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
            columnDefs: [
                {
                    "targets": 0,
                    "searchable": false,
                    "orderable": false,
                    "className": 'selectall-checkbox_search',
                    'render': function (data, type, full, meta){
                        return '<input type="checkbox" name="checked_search[]">';
                    }
                }
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
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

        searchTable.on('select.dt deselect.dt', function (e, dt, type, indexes){
        
            var countSelectedRows = searchTable.rows({ selected: true }).count();
            var countItems = searchTable.rows().count();
    
            if (countItems > 0) {
                if (countSelectedRows == countItems){
                    $('thead .selectall-checkbox_search input[type="checkbox"]', this).prop('checked', true);
                } else {
                    $('thead .selectall-checkbox_search input[type="checkbox"]', this).prop('checked', false);
                }
            }
    
            if (e.type === 'select') {
                $('.selectall-checkbox_search input[type="checkbox"]', searchTable.rows({ selected: true }).nodes()).prop('checked', true);
            } else {
                $('.selectall-checkbox_search input[type="checkbox"]', searchTable.rows({ selected: false }).nodes()).prop('checked', false);
            }
        });
    
        searchTable.on('click', 'thead .selectall-checkbox_search', function() {
            $('input[type="checkbox"]', this).trigger('click');
        });
    
        searchTable.on('click', 'thead .selectall-checkbox_search input[type="checkbox"]', function(e) {
            if (this.checked) {
                searchTable.rows().select();
            } else {
                searchTable.rows().deselect();
            }
            e.stopPropagation();
        });

    }else{

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
    }


    $('#modal-search .modal-title').html(judul);
    if(typeof M == 'undefined'){
        $('#modal-search').modal('show');
    }else{
        $('#modal-search').modal('open');
    }
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
            $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden');
            if(typeof M == 'undefined'){
                $('#modal-search').modal('hide');
            }else{
                $('#modal-search').modal('close');
            }
        });
    }
    else if(settings.multi2 != undefined){
        $('#modal-search').on('click','#btn-ok',function(){
            var datain = searchTable.rows({ selected: true }).data();
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
            $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden');
            if(typeof M == 'undefined'){
                $('#modal-search').modal('hide');
            }else{
                $('#modal-search').modal('close');
            }
        });
    }
    else{
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
                    if(typeof M == 'undefined'){
                        $('#modal-search').modal('hide');
                    }else{
                        $('#modal-search').modal('close');
                    }
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
                    if(typeof M == 'undefined'){
                        $('#modal-search').modal('hide');
                    }else{
                        $('#modal-search').modal('close');
                    }
                }
            });
        }
    }


}

function showInpFilterBSheet(settings){
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
    $('.c-bottom-sheet').removeClass('active');
    var content = `
    <div id="search-content">
        <div style="display: block;" class="search-header">
            <h6 class="title" style="padding-left: 1.8rem;"></h6>
            <ul class="nav nav-tabs col-12 hidden justify-content-end" style="margin-top:15px" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-xs-down">Data</span></a></li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terpilih" role="tab" aria-selected="false"><span class="hidden-xs-down">Terpilih</span></a> </li>
            </ul>
        </div>
        <div class='separator'></div>
        <div class="search-body p-3" style="height: calc(75vh - 56px)">
                    
        </div>
    </div>
    `;
    $('#content-bottom-sheet').html(content);

    $('.c-bottom-sheet__sheet').css({ "width":"50%","margin-left": "25%", "margin-right":"25%"});
    var scrollsrc = document.querySelector('.search-body');
    var psscrollsrc = new PerfectScrollbar(scrollsrc);
    
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
        $('.search-header').css('padding-bottom','0');
        $('.search-header ul').removeClass('hidden');
    }
    else if(settings.multi2 != undefined){
        var headerpilih_html = '';
        headerpilih_html +=  "<th style='width:5%' id='checkbox_search'><input id='check-all_search' name='select_all_search' value='1' type='checkbox'></th>";
        for(i=0; i<header.length; i++){
            headerpilih_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }
        var table = `<table class='' width='100%' id='table-search'><thead><tr>`+headerpilih_html+`</tr></thead>
        <tbody></tbody></table>
        <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
        if(!$('.search-header ul').hasClass('hidden')){
            $('.search-header ul').addClass('hidden');
            $('.search-header').css('padding-bottom','1.75rem');
        }
    }
    else{

        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        if(!$('.search-header ul').hasClass('hidden')){
            $('.search-header ul').addClass('hidden');
            $('.search-header').css('padding-bottom','1.75rem');
        }
    }
    table += "<tbody></tbody></table>";

    $('.search-body').html(table);



    if(settings.multi2 != undefined){
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
            columnDefs: [
                {
                    "targets": 0,
                    "searchable": false,
                    "orderable": false,
                    "className": 'selectall-checkbox_search',
                    'render': function (data, type, full, meta){
                        return '<input type="checkbox" name="checked_search[]">';
                    }
                }
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
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

        searchTable.on('select.dt deselect.dt', function (e, dt, type, indexes){
        
            var countSelectedRows = searchTable.rows({ selected: true }).count();
            var countItems = searchTable.rows().count();
    
            if (countItems > 0) {
                if (countSelectedRows == countItems){
                    $('thead .selectall-checkbox_search input[type="checkbox"]', this).prop('checked', true);
                } else {
                    $('thead .selectall-checkbox_search input[type="checkbox"]', this).prop('checked', false);
                }
            }
    
            if (e.type === 'select') {
                $('.selectall-checkbox_search input[type="checkbox"]', searchTable.rows({ selected: true }).nodes()).prop('checked', true);
            } else {
                $('.selectall-checkbox_search input[type="checkbox"]', searchTable.rows({ selected: false }).nodes()).prop('checked', false);
            }
        });
    
        searchTable.on('click', 'thead .selectall-checkbox_search', function() {
            $('input[type="checkbox"]', this).trigger('click');
        });
    
        searchTable.on('click', 'thead .selectall-checkbox_search input[type="checkbox"]', function(e) {
            if (this.checked) {
                searchTable.rows().select();
            } else {
                searchTable.rows().deselect();
            }
            e.stopPropagation();
        });

    }else{

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
    }


    $('.search-header .title').html(judul);
    $('#trigger-bottom-sheet').trigger("click");
    // if(typeof M == 'undefined'){
    //     $('#modal-search').modal('show');
    // }else{
    //     $('#modal-search').modal('open');
    // }
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

        $('#search-content').on('click','#btn-ok',function(){
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
            $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden');
            // if(typeof M == 'undefined'){
            //     $('#modal-search').modal('hide');
            // }else{
            //     $('#modal-search').modal('close');
            // }
            $('.c-bottom-sheet').removeClass('active');
        });
    }
    else if(settings.multi2 != undefined){
        $('#search-content').on('click','#btn-ok',function(){
            var datain = searchTable.rows({ selected: true }).data();
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
            $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden');
            // if(typeof M == 'undefined'){
            //     $('#modal-search').modal('hide');
            // }else{
            //     $('#modal-search').modal('close');
            // }
            
            $('.c-bottom-sheet').removeClass('active');
        });
    }
    else{
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
                    // if(typeof M == 'undefined'){
                    //     $('#modal-search').modal('hide');
                    // }else{
                    //     $('#modal-search').modal('close');
                    // }
                    
                    $('.c-bottom-sheet').removeClass('active');
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
                    // if(typeof M == 'undefined'){
                    //     $('#modal-search').modal('hide');
                    // }else{
                    //     $('#modal-search').modal('close');
                    // }
                    
                    $('.c-bottom-sheet').removeClass('active');
                }
            });
        }
    }


}