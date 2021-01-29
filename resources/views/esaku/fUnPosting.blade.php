<link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- FORM INPUT -->
    <style>
        .selected{
            color : var(--theme-color-1);
        }
    </style>
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px">UnPosting Jurnal</h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <!-- <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button> -->
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id" hidden>
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <label for="tanggal">Tanggal</label>
                                        <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="modul" >Modul</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_modul" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-modul" id="modul" name="modul" value="" title="" readonly required>
                                            <span class="info-name_modul hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="background: none;"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_modul" style="background: none;"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="btn-control">&nbsp;</label>
                                        <div id="btn-control">
                                            <button type="button" href="#" id="loadData" class="btn btn-primary mr-2">Tampil</button>
                                            <!-- <button type="button" href="#" id="postAll" class="btn btn-primary">Posting All</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#trans" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Transaksi</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#error" role="tab" aria-selected="false"><span class="hidden-xs-down">Pesan Error</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active mt-2" id="trans" role="tabpanel">
                                <div class="row">
                                    <div class="dataTables_length col-sm-12" id="table-jurnal_length"></div>
                                    <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                                        <div class="page-countdata">
                                            <label>Menampilkan 
                                            <select style="border:none" id="page-count_table-jurnal">
                                            <option value="10">10 per halaman</option>
                                            <option value="25">25 per halaman</option>
                                            <option value="50">50 per halaman</option>
                                            <option value="100">100 per halaman</option>
                                            </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="d-block d-md-inline-block float-right col-md-4 col-sm-12">
                                        <input type="text" class="form-control" placeholder="Search..."
                                        aria-label="Search..." aria-describedby="filter-btn" id="searchData_table-jurnal" style="height: 31px;">
                                    </div>
                                </div>
                                <div class='col-xs-12 px-0'>
                                    <table id="table-jurnal" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="3%" id="checkbox"><input id="check-all" name="select_all" value="1" type="checkbox"></th>
                                                <!-- <th width="12%">Status</th> -->
                                                <th width="13%">No Bukti</th>
                                                <th width="27%">No Dokumen</th>
                                                <th width="10%">Tanggal</th>
                                                <th width="37">Keterangan</th>
                                                <th width="10">Form</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="error" role="tabpanel">
                                <p id='error_space'></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  --> 
    @include('modal_search')
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    var $iconLoad = $('.preloader');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $(this).addClass('hidden');
        $modul = [];
        $per1 = [];
        $per2 = [];
    });

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    var $modul = [];
    var $per1 = [];
    var $per2 = [];
    
    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var options = {
            id : id,
            header : ['Modul', 'Keterangan','Periode Awal','Periode Akhir'],
            url : "{{ url('esaku-trans/modultrans') }}",
            columns : [
                { data: 'checkbox' },
                { data: 'modul' },
                { data: 'keterangan' },
                { data: 'per1' },
                { data: 'per2' }
            ],
            judul : "Daftar Modul",
            pilih : "modul",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "",
            target4 : "",
            width : ["10%","60%","15%","15%"],
            multi2: true,
            orderby:[[0,"desc"]],
            onItemSelected: function(data){
                var modul = "";
                $modul = []; 
                $per1 = []; 
                $per2 = [];
                for(var i=0;i<data.length;i++){
                    if(i == 0){
                        modul +=data[i].modul;
                    }else{
                        modul +=','+data[i].modul;
                    }
                    $modul.push(data[i].modul);
                    $per1.push(data[i].per1);
                    $per2.push(data[i].per2);
                }  
                $("#"+id).val(modul);
            }
        };
        showInpFilter(options);
    });
    
    var tablejur = $("#table-jurnal").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: [],
        columnDefs: [
            {
                "targets": 0,
                "searchable": false,
                "orderable": false,
                "className": 'selectall-checkbox',
                'render': function (data, type, full, meta){
                    return '<input type="checkbox" name="checked[]">';
                }
            }
        ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        columns: [
            { data: 'checkbox' },
            // { data: 'status' },
            { data: 'no_bukti' },
            { data: 'no_dokumen' },
            { data: 'tanggal' },
            { data: 'keterangan' },
            { data: 'form' }
        ],
        order:[],
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

    tablejur.on('select.dt deselect.dt', function (e, dt, type, indexes){
        
        var countSelectedRows = tablejur.rows({ selected: true }).count();
        var countItems = tablejur.rows().count();

        if (countItems > 0) {
            if (countSelectedRows == countItems){
                $('thead .selectall-checkbox input[type="checkbox"]', this).prop('checked', true);
            } else {
                $('thead .selectall-checkbox input[type="checkbox"]', this).prop('checked', false);
            }
        }

        if (e.type === 'select') {
            $('.selectall-checkbox input[type="checkbox"]', tablejur.rows({ selected: true }).nodes()).prop('checked', true);
        } else {
            $('.selectall-checkbox input[type="checkbox"]', tablejur.rows({ selected: false }).nodes()).prop('checked', false);
        }
    });

    tablejur.on('click', 'thead .selectall-checkbox', function() {
        $('input[type="checkbox"]', this).trigger('click');
    });

    tablejur.on('click', 'thead .selectall-checkbox input[type="checkbox"]', function(e) {
        if (this.checked) {
            tablejur.rows().select();
        } else {
            tablejur.rows().deselect();
        }
        e.stopPropagation();
    });
    
    $("#searchData_table-jurnal").on("keyup", function (event) {
        tablejur.search($(this).val()).draw();
    });

    $("#page-count_table-jurnal").on("change", function (event) {
        var selText = $(this).val();
        tablejur.page.len(parseInt(selText)).draw();
    });

    function activaTab(tab){
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    }

    $('#form-tambah').on('click', '#loadData', function(){
        var formData = new FormData();
        if($modul.length == 0){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Modul wajib diisi'
            });
            tablejur.clear().draw();
            return false;
        }
        $.each($modul, function(i, val){
            formData.append('modul[]', $modul[i]);
            formData.append('per1[]', $per1[i]);
            formData.append('per2[]', $per2[i]);
        });
        // for(var pair of formData.entries()) {
        //     console.log(pair[0]+ ', '+ pair[1]); 
        // }
        
        $.ajax({
            type: 'POST',
            url: "{{ url('esaku-trans/unposting-jurnal') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                tablejur.clear().draw();
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        tablejur.rows.add(result.data.data).draw(false);
                        activaTab("trans");
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    });

    // $('#form-tambah').on('click', '#postAll', function(){
    //     tablejur.rows().every(function (index, element) {
    //         var row = tablejur.cell(index,1);
    //         row.data('POSTING').draw().select();
    //     });
    // });

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            tanggal:{
                required: true   
            },
            deskripsi:{
                required: true 
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var url = "{{ url('esaku-trans/unposting') }}";

            var formData = new FormData(form);
            var data = [];
            var selected = tablejur.rows('.selected').data();
            if(selected.length === 0) {
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Tidak ada transaksi jurnal yang dipilih'
                });
                return false;
            }
            $.each(selected, function(i, val){
                formData.append('no_bukti[]', selected[i].no_bukti)
                formData.append('form[]', selected[i].form)
            });
            
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST', 
                url: url,
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status){
                        msgDialog({
                            id:result.data.no_bukti,
                            type:'sukses',
                            text: result.data.message
                        });
                        activaTab("trans");
                        $('#form-tambah #loadData').click();
                        $('#error_space').text('');
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        
                    }else{
                        msgDialog({
                            id: id,
                            type: 'sukses',
                            title: 'Error',
                            text: result.data.message
                        });
                        
                        $('#error_space').text(result.data.message);
                        activaTab("error");
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // HANDLE ENTER
    $('#tanggal,#deskripsi').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','deskripsi'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            $('#'+nxt[idx]).focus();
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    </script>