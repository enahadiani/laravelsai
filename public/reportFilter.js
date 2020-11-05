(function ( $ ) {
    var pilih = '';
    var display = '';
    var defaults = {}, options = $.extend({}, defaults, options);

    function showFilter(options,idx,target1,tipe){
        var settings = {
            header:[],
            columns:[],
            url:[],
            parameter:[],
            nama:[],
            kode:[],
            orderby:[],
            width:[],
            headerpilih:[],
            display:[]
        }
        
        $.extend(settings, options);
        
        $target = target1;
        var tmp = $target.attr('id');
        tmp = tmp.split("-");
        var target2 = tmp[1];
        var target3 = tmp[1]+'name';
        
        var toUrl = settings.url[idx];
        var columns = settings.columns[idx];
        var parameter = settings.parameter[idx];
        var judul = "Daftar "+settings.nama[idx]+" <span class='modal-subtitle'></span>";
        pilih = settings.nama[idx];
        display = settings.display[idx];
        var field = eval('$'+settings.kode[idx]);
        var kunci = settings.kode[idx];
        var orderby = settings.orderby[idx];
        var width = settings.width[idx];
        var type = tipe;
        
        var header_html = '';
        for(i=0; i < settings.header[idx].length; i++){
            header_html +=  "<th style='"+width[i]+"'>"+settings.header[idx][i]+"</th>";
        }

        if(type == "range"){
            var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
            table += "<tbody></tbody></table><table width='100%' id='table-search2'><thead><tr>"+header_html+"</tr></thead>";
            table += "<tbody></tbody></table>";
            if(!$('#modal-search .modal-header ul').hasClass('hidden')){
                $('#modal-search .modal-header ul').addClass('hidden');
                $('#modal-search .modal-header').css('padding-bottom','1.75rem');
            }
        }
        else if(type == "in"){
            var headerpilih_html = '';
            var width = ["25%","70%","5%"];
            for(i=0; i<settings.headerpilih[idx].length; i++){
                headerpilih_html +=  "<th style='width:"+width[i]+"'>"+settings.headerpilih[idx][i]+"</th>";
            }

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
        else{
            var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
            table += "<tbody></tbody></table>";
            if(!$('#modal-search .modal-header ul').hasClass('hidden')){
                $('#modal-search .modal-header ul').addClass('hidden');
                $('#modal-search .modal-header').css('padding-bottom','1.75rem');
            }
        }


        $('#modal-search .modal-body').html(table);
        
        $('#btn-ok').addClass('disabled');
        $('#btn-ok').prop('disabled', true);

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
            order: orderby,
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
        });

        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        if(type == "range"){
            var searchTable2 = $("#table-search2").DataTable({
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
                order: orderby,
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
            });

            $('#modal-search .modal-subtitle').html('[Rentang Awal]');
            searchTable2.columns.adjust().draw();
            
            $('#table-search2_wrapper').addClass('hidden');

            $("<input class='form-control mb-1' type='text' id='rentang-tag'>").insertAfter('#table-search_filter label');
            $("<input class='form-control mb-1' type='text' id='rentang-tag2'>").insertAfter('#table-search2_filter label');
            $("#rentang-tag").tagsinput({
                cancelConfirmKeysOnEmpty: true,
                confirmKeys: [13],
                itemValue: 'id',
                itemText: 'text'
            });
            $("#rentang-tag2").tagsinput({
                cancelConfirmKeysOnEmpty: true,
                confirmKeys: [13],
                itemValue: 'id',
                itemText: 'text'
            });
            $('#rentang-tag').on('itemAdded', function(event) {
                $('#rentang-tag2').tagsinput('add', {id:event.item.id,text:event.item.text});
            }); 
            
            $('#rentang-tag2').on('itemRemoved', function(event) {
                $('#rentang-tag').tagsinput('remove', {id:event.item.id,text:event.item.text});
                var rowIndexes = [];
                searchTable.rows( function ( idx, data, node ) {             
                    if(data[kunci] === event.item.id){
                        rowIndexes.push(idx);                  
                    }
                    return false;
                }); 
                searchTable.row(rowIndexes).deselect();
                
                $('#table-search_wrapper').removeClass('hidden');
                $('#table-search2_wrapper').addClass('hidden');
                $('#modal-search .modal-subtitle').html('[Rentang Awal]');
            }); 
            $('.bootstrap-tagsinput').css({'text-align':'left','border':'0','min-height':'41.2px'});
        }else if(type == "in"){
            var searchTable2 = $("#table-search2").DataTable({
                sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                columns: columns,
                order: orderby,
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
                    "targets": 2, "data": null, "defaultContent": "<a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></a>"
                }]
            });
            searchTable2.columns.adjust().draw();
        }

        $('#table-search tbody').on('click', 'tr', function () {
            
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                if(type == "in"){
                    var datain = searchTable.rows('.selected').data();
                    if(datain.length > 1){
                        
                        $('#btn-ok').removeClass('disabled');
                        $('#btn-ok').prop('disabled', false);
                    }else{
                        
                        $('#btn-ok').addClass('disabled');
                        $('#btn-ok').prop('disabled', true);
                    }
                    searchTable2.clear().draw();
                    if(typeof datain !== 'undefined' && datain.length>0){
                        searchTable2.rows.add(datain).draw(false);
                    }
                }
            }
            else {
                if(type == "range"){
                    
                    searchTable.$('tr.selected').removeClass('selected');
                    searchTable2.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                    var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                    var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                    if(display == "kodename"){
                        $($target).val(kode+' - '+nama);
                    }else if(display == "name"){
                        $($target).val(nama);
                    }else{   
                        $($target).val(kode);
                    }
                    
                    $($target).trigger('change');
                    field["from"] = kode;
                    field["fromname"] = nama;
                    
                    $('#rentang-tag').tagsinput('add', {id:kode,text:'Rentang Awal :'+kode});
                   
                    $('#table-search_wrapper').addClass('hidden');
                    $('#table-search2_wrapper').removeClass('hidden');
                    $('#modal-search .modal-subtitle').html('[Rentang Akhir]');
                }
                else if (type == "in"){
                    $(this).addClass('selected');
                    var datain = searchTable.rows('.selected').data();
                    if(datain.length > 1){
                        
                        $('#btn-ok').removeClass('disabled');
                        $('#btn-ok').prop('disabled', false);
                    }else{
                        
                        $('#btn-ok').addClass('disabled');
                        $('#btn-ok').prop('disabled', true);
                    }
                    searchTable2.clear().draw();
                    if(typeof datain !== 'undefined' && datain.length>0){
                        searchTable2.rows.add(datain).draw(false);
                    }
                }
                else{
                    
                    searchTable.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                    var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                    var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                    if(display == "kodename"){
                        $($target).val(kode+' - '+nama);
                    }else if(display == "name"){
                        $($target).val(nama);
                    }else{   
                        $($target).val(kode);
                    }
                    
                    $($target).trigger('change');
                    field[target2] = kode;
                    field[target3] = nama;
                    $('#modal-search').modal('hide');
                }

            }
        });

        $('#table-search2 tbody').on('click', 'tr', function () {
            if(type == "range"){

                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    
                    searchTable.$('tr.selected').removeClass('selected');
                    searchTable2.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                    var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                    var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                    if(display == "kodename"){
                        $($target).val(kode+' - '+nama);
                    }else if(display == "name"){
                        $($target).val(nama);
                    }else{   
                        $($target).val(kode);
                    }
                    $($target).trigger('change');

                    field["to"] = kode;
                    field["toname"] = nama;   
                    console.log(field);      
                    
                    $('#rentang-tag2').tagsinput('add', { id: kode, text: 'Rentang akhir:'+kode });       
                    $('#modal-search').modal('hide');
                }
            }
        });

        $('#table-search2 tbody').on('click', '.hapus-item', function () {
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            searchTable2.row( $(this).parents('tr') ).remove().draw();
            console.log('kode_akun='+kode);
            var rowIndexes = [];
            searchTable.rows( function ( idx, data, node ) {             
                if(data[kunci] === kode){
                    rowIndexes.push(idx);                  
                }
                return false;
            }); 
            searchTable.row(rowIndexes).deselect();
        });

        $('#modal-search').on('click','#btn-ok',function(){
            var datain = searchTable.cells('.selected',0).data();
            console.log(datain.length);
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
            field[target2] = kode;
            field[target3] = kode;
            $('#modal-search').modal('hide');
        });
    }

    $.fn.reportFilter = function( options ) {
       
        var options = (function (opts, def) {
            var _opts = {};
            if (typeof opts[0] !== "object") {
                _opts[opts[0]] = opts[1];
            };
            return opts.length === 0 
                   ? def 
                   : typeof opts[0] === "object" 
                     ? opts[0] : _opts
        }([].slice.call(arguments), defaults));

        var settings = options;
        
        return this.each(function() {
           
            $(this).on('change', '.sai-rpt-filter-type', function(){
                var type = $(this).val();
                var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
                var field = eval('$'+kunci);
                var idx = settings.kode.indexOf(kunci);
                
                var target1 = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
                switch(type){
                    case "all":
                        
                        $aktif = '';
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('Menampilkan semua '+pilih);
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').removeClass('search-item');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('');
                        
                        field.type = "all";
                        field.from = "";
                        field.to = "";
                        field.fromname = "";
                        field.toname = "";
                        $('#modal-search').on('hide.bs.modal', function (e) {
                            //
                        });
                        
                    break;
                    case "=":
                        
                        $aktif = "";
                        showFilter(settings,idx,target1);
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                        field.type = "=";
                        field.from = field.from;
                        field.to = "";
                        field.fromname = field.fromname;
                        field.toname = "";
                        $('#modal-search').on('hide.bs.modal', function (e) {
                            //
                        });
                    break;
                    case "range":
                        
                        $aktif = $(this);
                        showFilter(settings,idx,target1,"range");
                        $('#modal-search').on('hide.bs.modal', function (e) {
                            if($aktif != ""){
        
                                field.type = "range";
                                field.from = field.from;
                                field.to = field.to;
                                field.fromname =  field.fromname ;
                                field.toname =  field.toname ;
            
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-8');
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-3');
                                if(display == "nama"){
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                                }else if(display == "kodename"){
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.from+' - '+field.fromname);
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.to+' - '+field.toname);
                                }else{
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.from);
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.to);
                                }
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').removeClass('hidden');
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').removeClass('hidden');
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                            }
                        });
                        
                    break;
                    case "in":
                        
                        $aktif = '';
                        
                        showFilter(settings,idx,target1,"in");
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                        
                        field.type = "in";
                        field.from = "";
                        field.to = "";
                        field.fromname = "";
                        field.toname = "";
                        $('#modal-search').on('hide.bs.modal', function (e) {
                            //
                        });
                        
                    break;
                }
               
            });
        
            $(this).on('click', '.search-item', function(){
                console.log(settings.parameter);
                var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
                var idx = settings.kode.indexOf(kunci);
                var target1 = $(this).closest('.input-group').find('input');
                
                var type = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-type')[0].selectize.getValue();
                if(type == "in"){
                    showFilter(settings,idx,target1,type);
                }else{
                    showFilter(settings,idx,target1);
                }
            });
        
        });
    };
 
}( jQuery ));
