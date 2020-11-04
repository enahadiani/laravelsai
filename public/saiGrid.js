(function ( $ ) {

    function hitungTotalRow(id){
        var total_row = $('#'+id+' tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function toNilai(str_num){
        var parts = str_num.split('.');
        number = parts.join('');
        number = number.replace('Rp', '');
        number = number.replace(',', '.');
        return +number;
    }

    function hitungTotal(settings){
        var total_d = 0;
        var total_k = 0;

        $('.row-'+settings.id).each(function(){
            var dc = $(this).closest('tr').find('.td-dc').text();
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            if(dc == "D"){
                total_d += +toNilai(nilai);
            }else{
                total_k += +toNilai(nilai);
            }
        });

        if(settings.target1 != undefined){
            $('#'+settings.target1).val(total_d);    
        }
        if(settings.target2 != undefined){
            $('#'+settings.target2).val(total_k);  
        } 
    }

    function addRowGrid(settings) {
        var no=$('#'+settings.id+' .row-'+settings.id+':last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-"+settings.id+"'>";
        input += "<td class='no-"+settings.id+" text-center'><span class='no-"+settings.id+"'>"+no+"</span><input type='hidden' name='no_urut[]' value='"+no+"'></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        for(var i=0;i < settings.columns.length; i++){
            var kode = settings.columns[i];
            switch(settings.tipe[i]){
                case 'text' :
                    input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><input autocomplete='off' type='text' name="+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden'  value='' "+settings.attr[i]+" ></td>";
                break;
                case 'textarea' :
                    input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><textarea name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden'  value='' "+settings.attr[i]+"></textarea></td>";
                break;
                case 'number' :
                    input += "<td class='text-right'><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><input type='text' name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden'  value='' "+settings.attr[i]+"></td>";
                break;
                case 'select' :
                    var options = "";
                    if(settings.options[i].length > 0){
                        for(var x=0; x < settings.options[i].length; x++){
                            options += "<option value='"+settings.options[i][x].value+"'>"+settings.options[i][x].text+"</option>";
                        }
                    }
                    input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><select hidden name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+"' value='' "+settings.attr[i]+">"+options+"</select></td>";
                break;
                case 'search' :
                    input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><input type='text' name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden' value='' "+settings.attr[i]+" style='z-index: 1;position: relative;'  id='akunkode"+no+"' "+settings.attr[i]+"><a href='#' class='search-item search-"+kode+" search-"+kode+"ke"+no+" hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                break;
            }
        }
        input += "</tr>";

        $('#'+settings.id+' tbody').append(input);
        $('.row-'+settings.id+':last').addClass('selected-row');
        $('#'+settings.id+' tbody tr').not('.row-'+settings.id+':last').removeClass('selected-row');

        for(var i=0;i < settings.columns.length; i++){
            switch(settings.tipe[i]){
                case 'text' :
                case 'textarea' :
                break;
                case 'number' :
                    $('.'+settings.columns[i]+'ke'+no).inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () { self.Value(''); }
                    });
                break;
                case 'select' :
                    $('.'+settings.columns[i]+'ke'+no).selectize({
                        selectOnTab:true,
                        onChange: function(value) {
                            $('.td'+settings.columns[i]+'ke'+no).text(value);
                            hitungTotal(settings);
                        }
                    });
                    $('.selectize-control.'+settings.columns[i]+'ke'+no).hide();
                break;
                // case 'search' :
                //     $('#'+settings.columns[i]+'ke'+no).typeahead({
                //         source: eval('$dt'+settings.columns[i]),
                //         displayText:function(item){
                //             return item.id+' - '+item.name;
                //         },
                //         autoSelect:false,
                //         changeInputOnSelect:false,
                //         changeInputOnMove:false,
                //         selectOnBlur:false,
                //         afterSelect: function (item) {
                //             console.log(item.id);
                //         }
                //     });
                // break;
            }
        }        

        switch(settings.tipe[0]){
            case 'search' :
                $('#'+settings.id+' td').removeClass('px-0 py-0 aktif');
                $('#'+settings.id+' tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
                $('#'+settings.id+' tbody tr:last').find(".inp-"+settings.columns[0]).show();
                $('#'+settings.id+' tbody tr:last').find(".td-"+settings.columns[0]).hide();
                $('#'+settings.id+' tbody tr:last').find(".search-"+settings.columns[0]).show();
                $('#'+settings.id+' tbody tr:last').find(".inp-"+settings.columns[0]).focus();
            break;
            default :
                $('#'+settings.id+' td').removeClass('px-0 py-0 aktif');
                $('#'+settings.id+' tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
                $('#'+settings.id+' tbody tr:last').find(".inp-"+settings.columns[0]).show();
                $('#'+settings.id+' tbody tr:last').find(".td-"+settings.columns[0]).hide();
                $('#'+settings.id+' tbody tr:last').find(".inp-"+settings.columns[0]).focus();
            break;

        }

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        hitungTotalRow(settings.id);
        hideUnselectedRow(settings);
    }

    function hideUnselectedRow(settings) {
        $('#'+settings.id+' > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {

                for( var i =0; i < settings.columns.length ; i++){
                    eval('var '+settings.columns[i]+' = "'+$('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).val()+'" ');

                    if(settings.tipe[i] == 'select'){
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i])[0].selectize.setValue(eval(settings.columns[i]));
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));

                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).hide();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).show();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".selectize-control").hide();
                    }else if(settings.tipe[i] == 'search'){
                        
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).val(kode_akun);
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));

                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).hide();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).show();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".search-"+settings.columns[i]).hide();
                    }else{
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).val(kode_akun);
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));

                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).hide();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).show();
                    }
    
                }
               
            }
        })
    }

    function showSelectedColumn(id,tipe,kolom,no){
        if(tipe == 'select'){
            $('#'+id+' tbody').find(".selectize-control."+kolom+"ke"+no).show();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find("."+kolom+"ke"+no)[0].selectize.focus();
        }else if(tipe == 'search') {
            $('#'+id+' tbody').find("."+kolom+"ke"+no).show();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find(".search-"+kolom+"ke"+no).show();
            $('#'+id+' tbody').find("."+kolom+"ke"+no).trigger('focus');
        }else{
            $('#'+id+' tbody').find("."+kolom+"ke"+no).show();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find("."+kolom+"ke"+no).trigger('focus');
        }

    }

    function hideUnSelectedColumn(id,tipe,kolom,no){
        if(tipe == 'select'){
            $('#'+id+' tbody').find(".selectize-control."+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).show();
        }else if(tipe == 'search') {
            $('#'+id+' tbody').find("."+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).show();
            $('#'+id+' tbody').find(".search-"+kolom+"ke"+no).hide();
        }else{
            $('#'+id+' tbody').find("."+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).show();
        }

    }

    function showFilter(param,target1,target2){
        var par = param;

        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'kode_akun[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('yakes-master/helper-akun') }}";
                var columns = [
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Akun";
                var pilih = "akun";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
                $target4 = ".td-dc";
            break;
            case 'kode_pp[]': 
                header = ['Kode PP', 'Nama'];
                var toUrl = "{{ url('yakes-master/helper-pp') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar PP";
                var jTarget1 = "val";
                var pilih = "pp";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
                $target4 = "2";
            break;
            case 'kode_fs[]': 
                header = ['Kode FS', 'Nama'];
                var toUrl = "{{ url('yakes-master/helper-fs') }}";
                var columns = [
                    { data: 'kode_fs' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar FS";
                var jTarget1 = "val";
                var pilih = "pp";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
                $target4 = "3";
            break;
        }

        var header_html = '';
        var width = ["30%","70%"];
        for(i=0; i<header.length; i++){
            header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }

        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            ajax: {
                "url": toUrl,
                "data": {'param':par},
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

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');

                var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode);
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else{
                    $($target2).text(nama);
                }

                if($target3 != ""){
                    $($target3).text(nama);
                }

                if($target4 != ""){
                    if($target4 == "2"){
                        $($target).parents("tr").find(".inp-pp").val(kode);
                        $($target).parents("tr").find(".td-pp").text(kode);
                        $($target).parents("tr").find(".inp-pp").hide();
                        $($target).parents("tr").find(".td-pp").show();
                        $($target).parents("tr").find(".search-pp").hide();
                        $($target).parents("tr").find(".inp-nama_pp").show();
                        $($target).parents("tr").find(".td-nama_pp").hide();
                       
                        setTimeout(function() {  $($target).parents("tr").find(".inp-nama_pp").focus(); }, 100);
                    } else if($target4 == "3") {
                        $($target).parents("tr").find(".inp-fs").val(kode);
                        $($target).parents("tr").find(".td-fs").text(kode);
                        $($target).parents("tr").find(".inp-fs").hide();
                        $($target).parents("tr").find(".td-fs").show();
                        $($target).parents("tr").find(".search-fs").hide();
                        $($target).parents("tr").find(".inp-nama_fs").show();
                        $($target).parents("tr").find(".td-nama_fs").hide();
                       
                        setTimeout(function() {  $($target).parents("tr").find(".inp-nama_fs").focus(); }, 100);
                    }
                    else{
                        $($target).closest('tr').find($target4).trigger('click');
                    }
                }
                $('#modal-search').modal('hide');
            }
        });

        
    }

    
    $.fn.saiGrid = function( options ) {
       
        var settings = options;
        return this.each(function() {
            
            $(this).on('click', '.add-row', function(){
                addRowGrid(settings);
            }); 

            $('#'+settings.id).on('keydown',"input",function(e){
                var code = (e.keyCode ? e.keyCode : e.which);
                var nxt = settings.columns;
                var nxt2 = settings.columns;
                if (code == 13 || code == 9) {
                    e.preventDefault();
                    var idx = $(this).closest('td').index()-2;
                    var idx_next = idx+1;
                    var kunci = $(this).closest('td').index()+1;
                    var isi = $(this).val();
                    for(var i=0; i < settings.columns.length; i++){
                        var tipe = settings.tipe[i];
                        var tipenext = ( settings.tipe[i+1] != undefined ? settings.tipe[i+1] : '') ;

                        switch (tipe) {
                            case 'search':
                                var noidx = $(this).parents("tr").find("span.no-"+settings.id).text();
                                var kode = $(this).val();
                                var target1 = (settings.target[i][0] != '' ? settings.target[i][0]+"ke"+noidx : '');
                                var target2 = (settings.target[i][1] != '' ? settings.target[i][1]+"ke"+noidx : '');
                                var target3 = (settings.target[i][2] != '' ? settings.target[i][2]+"ke"+noidx : '');
                                getData(kode,settings.url[i],target1,target2,target3,'tab');                    
                            break;
                            case 'select':
                                var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                                $("#'+settings.id+' td").removeClass("px-0 py-0 aktif");
                                $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                                $(this).parents("tr").find('.inp-'+nxt[idx])[0].selectize.setValue(isi);
                                $(this).parents("tr").find('.td-'+nxt2[idx]).text(isi);
                                $(this).parents("tr").find(".selectize-control").hide();
                                $(this).closest('tr').find('.td-'+nxt2[idx]).show();
                            break;
                            case 'text':
                            case 'textarea' :
                            if($.trim($(this).val()).length){
                                $("#'+settings.id+' td").removeClass("px-0 py-0 aktif");
                                $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                                $(this).closest('tr').find('.inp-'+nxt[idx]).val(isi);
                                $(this).closest('tr').find('.td-'+nxt2[idx]).text(isi);
                                $(this).closest('tr').find('.inp-'+nxt[idx]).hide();
                                $(this).closest('tr').find('.td-'+nxt2[idx]).show();
                            }else{
                                alert('Text yang dimasukkan tidak valid');
                                return false;
                            }
                            break;
                            case 'nilai':
                            if(isi != "" && isi != 0){
                                $("#'+settings.id+' td").removeClass("px-0 py-0 aktif");
                                $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                                $(this).closest('tr').find('.inp-'+nxt[idx]).val(isi);
                                $(this).closest('tr').find('.td-'+nxt2[idx]).text(isi);
                                $(this).closest('tr').find('.inp-'+nxt[idx]).hide();
                                $(this).closest('tr').find('.td-'+nxt2[idx]).show();

                                hitungTotal(settings);
                            }else{
                                alert('Nilai yang dimasukkan tidak valid');
                                return false;
                            }
                            break; 
                            default:
                            break;
                        }

                        if(tipenext != ''){
                            
                            switch(tipenext){
                                case 'search':
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).show();
                                    $(this).closest('tr').find('.td-'+nxt2[idx_next]).hide();
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).trigger('focus');
                                    $(this).closest('tr').find('.search-'+nxt2[idx_next]).show();
                                break;
                                case 'select':
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).show();
                                    $(this).closest('tr').find('.td-'+nxt2[idx_next]).hide();
                                    $(this).parents("tr").find(".selectize-control").show();
                                    $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                                break;
                                default :
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).show();
                                    $(this).closest('tr').find('.td-'+nxt2[idx_next]).hide();
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).trigger('focus');
                                break;
                            }
                        }

                        if(i == (settings.columns.length-1)){
                            var cek = $(this).parents('tr').next('tr').find('.td-'+settings.columns[0]);
                            if(cek.length > 0){
                                cek.trigger('click');
                            }else{
                                $('.add-row').trigger('click');
                            }
                        }
                    }

                }else if(code == 38){
                    e.preventDefault();
                    var idx = nxt.indexOf(e.target.id);
                    idx--;
                }
            });

            $('#'+settings.id+' tbody').on('click', 'tr', function(){
                $(this).addClass('selected-row');
                $('#'+settings.id+' tbody tr').not(this).removeClass('selected-row');
                hideUnselectedRow(settings);
            });

            $('#'+settings.id).on('click', 'td', function(){
                var idx = $(this).index();
                if(idx == 0){
                    return false;
                }else{
                    if($(this).hasClass('px-0 py-0 aktif')){
                        return false;            
                    }else{
                        $('#'+settings.id+' td').removeClass('px-0 py-0 aktif');
                        $(this).addClass('px-0 py-0 aktif');
                        var no = $(this).parents("tr").find("span.no-"+settings.id).text();
                        var urut = 2;
                        for( var i =0; i < settings.columns.length ; i++){
                            if(settings.tipe[i] != 'select'){
                                eval('var '+settings.columns[i]+' = "'+$(this).parents("tr").find(".inp-"+settings.columns[i]).val()+'" ');

                                $(this).parents("tr").find(".inp-"+settings.columns[i]).val(eval(settings.columns[i]));
                                $(this).parents("tr").find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));
                            }else{
                                eval('var '+settings.columns[i]+' = "'+$(this).parents("tr").find(".td-"+settings.columns[i]).text()+'" ');
                                $(this).parents("tr").find(".inp-"+settings.columns[i])[0].selectize.setValue(eval(settings.columns[i]));
                                $(this).parents("tr").find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));
                            }

                            if(idx == urut){
                                showSelectedColumn(settings.id,settings.tipe[i],settings.columns[i],no);
                            }else{
                                hideUnSelectedColumn(settings.id,settings.tipe[i],settings.columns[i],no);
                            }
                            urut++;
                        }
                        hitungTotal(settings);
                    }
                }
            });
        
            // COPY ROW //
            $('.nav-control').on('click', '#copy-row', function(){
                if($(".selected-row").length != 1){
                    alert('Harap pilih row yang akan dicopy terlebih dahulu!');
                    return false;
                }else{
                    var kode_akun = $('#'+settings.id+' tbody tr.selected-row').find(".inp-kode").val();
                    var nama_akun = $('#'+settings.id+' tbody tr.selected-row').find(".inp-nama").val();
                    var dc = $('#'+settings.id+' tbody tr.selected-row').find(".td-dc").text();
                    var keterangan = $('#'+settings.id+' tbody tr.selected-row').find(".inp-ket").val();
                    var nilai = $('#'+settings.id+' tbody tr.selected-row').find(".inp-nilai").val();
                    var kode_pp = $('#'+settings.id+' tbody tr.selected-row').find(".inp-pp").val();
                    var nama_pp = $('#'+settings.id+' tbody tr.selected-row').find(".inp-nama_pp").val();
                    var kode_fs = $('#'+settings.id+' tbody tr.selected-row').find(".inp-fs").val();
                    var nama_fs = $('#'+settings.id+' tbody tr.selected-row').find(".inp-nama_fs").val();
                    var no=$('#'+settings.id+' .row-grid:last').index();
                    no=no+2;
                    var input = "";
                    input += "<tr class='row-grid'>";
                    input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span><input type='hidden' name='no_urut[]' value='"+no+"'></td>";
                    input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                    input += "<td ><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input autocomplete='off' type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' "+settings.attr[i]+"='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                    input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input autocomplete='off' type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
                    input += "<td><span class='td-dc tddcke"+no+" tooltip-span'>"+dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+dc+"' "+settings.attr[i]+"><option value='D'>D</option><option value='C'>C</option></select></td>";
                    input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+keterangan+"</span><input autocomplete='off' type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+keterangan+"' "+settings.attr[i]+"></td>";
                    input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input autocomplete='off' type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' "+settings.attr[i]+"></td>";
                    input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+kode_pp+"</span><input autocomplete='off' type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' "+settings.attr[i]+"=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                    input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+nama_pp+"</span><input autocomplete='off' type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly></td>";
                    input += "<td><span class='td-fs tdfske"+no+" tooltip-span'>"+kode_fs+"</span><input autocomplete='off' type='text' id='fskode"+no+"' name='kode_fs[]' class='form-control inp-fs fske"+no+" hidden' value='"+kode_fs+"' "+settings.attr[i]+"=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-fs hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                    input += "<td><span class='td-nama_fs tdnmfske"+no+" tooltip-span'>"+nama_fs+"</span><input autocomplete='off' type='text' name='nama_fs[]' class='form-control inp-nama_fs nmfske"+no+" hidden'  value='"+nama_fs+"' readonly></td>";
                    input += "</tr>";
                    $('#'+settings.id+' tbody').append(input);
                    $('.dcke'+no).selectize({
                        selectOnTab:true,
                        onChange: function(value) {
                            $('.tddcke'+no).text(value);
                            hitungTotal(settings);
                        }
                    });
                    $('.selectize-control.dcke'+no).addClass('hidden');
                    $('.nilke'+no).inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () { self.Value(''); }
                    });
                    hitungTotal(settings);
                    $('.tooltip-span').tooltip({
                        title: function(){
                            return $(this).text();
                        }
                    })
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                }
        
            });
            // END COPY ROW //
        
            // DELETE ROW //
            $('#'+settings.id+'').on('click', '.hapus-item', function(){
                $(this).closest('tr').remove();
                no=1;
                $('.row-'+settings.id).each(function(){
                    var nom = $(this).closest('tr').find('.no-'+settings.id);
                    nom.html(no);
                    no++;
                });
                hitungTotal(settings);
                hitungTotalRow(settings.id);
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            });
            // END DELETE ROW //

            $('#'+settings.id+'').on('click', '.search-item', function(){
                var par = $(this).closest('td').find('input').attr('name');
                var modul = '';
                var header = [];
                
                switch(par){
                    case 'kode_akun[]': 
                        var par2 = "nama_akun[]";
                    break;
                    case 'kode_pp[]': 
                        var par2 = "nama_pp[]";
                    break;
                    case 'kode_fs[]': 
                        var par2 = "nama_fs[]";
                    break;
                }
        
                var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class').split(" ");
                target1 = tmp[2];
                tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class').split(" ");
                target2 = tmp[2];
                showFilter(par,target1,target2);
            });
        });
    };
 
}( jQuery ));
