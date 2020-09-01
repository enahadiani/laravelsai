var service_domain = 'http://javaturbine.co.id';
var $loading = $('#loading-overlay');
$(document)
    .ajaxStart(function () {
        $loading.show();
    })
    .ajaxStop(function () {
        $loading.hide();
    });

// global var
var periode = '';
var dept = '';
var latest_periode = '';
var current_page = '';

// WEB
var userData = {'username':localStorage.username, 'kode_lokasi':localStorage.kode_lokasi};

function initialize(){
    $.ajax({
        data: {'api_key': localStorage.api_key, 'username': localStorage.username},
        type: 'POST',
        url: service_domain+"/webjava/CMSService/checkAuthStatus/",
        dataType: "json",
        cache: false,
        success: function (data) {
            if(data.auth_status == 1){
                if($('#dash_page_notif').length){
                    current_page = 'Notification';
                    loadData('Notification', service_domain+"/webjava/CMSService/readNotif/", userData);
                }else if($('#dash_page_home').length){
                    current_page = 'Home';
                    // console.log('home');
                    loadData('Home', service_domain+"/webjava/CMSService/getSummary/", userData);
                    $('#content_sub_page').text('Home');
                }else if($('#dash_page_customer').length){
                    current_page = 'Customer';
                    jsonTable('sju-customer-list', service_domain+"/webjava/TransService/getMaster/customer/table", 'daftar_customer', ['Customer ID', 'Nama', 'Email'], {'api_key': localStorage.api_key, 'username': localStorage.username}, [0], 'url', service_domain+"/webjava/Index/ubCustomer", service_domain+"/webjava/TransService/delMaster/customer");
                }
                
                // else{
                //     // WEB = redirect ke controller Index, page home/dashboard
                //     window.location = service_domain+"/webjava/Index/home";
                // }

                // $('#content_sub_page').text(current_page);
            }else{
                // WEB = redirect ke controller login
                window.location = service_domain+"/webjava/CUser/fLogin";
            }
        }
    });
}

function loadData(index, ajax_url, additional_data){
    if (typeof additional_data === 'undefined') { additional_data = null; }
    if(additional_data != null){
        post_data = $.extend( true, {}, additional_data);
    }
    post_data.api_key = localStorage.api_key;

    $.ajax({
        data: post_data,
        type: 'POST',
        url: ajax_url,
        dataType: "json",
        cache: false,
        success: function (data) {
            if(data.auth_status == 1){
                getNotification();
                switch (index){
                    case 'Notification':
                        var notif_html = '';
                        if(data.notif.length > 0){
                            // var pemisah =   "<li class='time-label'>"+
                            //                     "<span class='bg-red'>"+
                            //                         data.notif.tgl_notif+
                            //                     "</span>"+
                            //                 "</li>";
                            for(i=0; i<data.notif.length; i++){
                                notif_html +=   "<li>"+
                                                    "<i class='fa fa-envelope bg-blue'></i>"+
                                                    "<div class='timeline-item'>"+
                                                        "<span class='time'><i class='fa fa-clock-o'></i> "+data.notif[i].tgl_notif+"</span>"+
                                                        "<h3 class='timeline-header'><a href='#'>"+data.notif[i].title+"</a></h3>"+

                                                        "<div class='timeline-body'>"+
                                                            data.notif[i].pesan+
                                                        "</div>"+
                                                    "</div>"+
                                                "</li>";
                            }

                            notif_html += "<li><i class='fa fa-clock-o'></i></li>";
                        }else{
                            notif_html = "<div class='box'>"+
                                            "<div class='box-body'><center>Tidak ada notifikasi</center></div>"+
                                            "</div>";
                        }

                        $('#dash_notif_list').html(notif_html);
                    break;
                    case 'Home':
                    break;
                }
            }else{
                alert(data.error);
            }
        }
    });
}

function getNotification(){
    $.ajax({
        url: service_domain+"/webjava/CMSService/getNotif/",
        data: {'api_key': localStorage.api_key,'username':localStorage.username, 'kode_lokasi':localStorage.kode_lokasi},
        type: 'POST',
        dataType: "json",
        cache: false,
        success: function (data) {
            if(data.auth_status == 1){
                if(data.notif.length){
                    var notif_list = '';
                    for(i = 0; i<data.notif.length; i++){
                        notif_list +=    "<li>"+
                                            "<a href='#'>"+
                                                "<h4 style='margin:0px;'>"+
                                                    data.notif[i].title+
                                                    "<small><i class='fa fa-clock-o'></i> "+data.notif[i].tgl_notif+"</small>"+
                                                "</h4>"+
                                                "<p style='margin:0px;'>"+data.notif[i].pesan+"</p>"
                                            "</a>"+
                                        "</li>";
                    }
                    $('#ajax-notification-number').html(data.notif[0].new);
                    $('#ajax-notification-section').html(notif_list);
                }else{
                    $('#ajax-notification-number').html('');
                    $('#ajax-notification-section').html('');
                }
            }
        }
    });
}

$(document).ready(function(){
    initialize();

    // --------------------------------------- TREE GRID SETTING -----------------------------------------

    // Plugin 
    $(".treegrid, .treegrid-menu").treegrid(
        // {enableMove: true}
    );

    $('#sai-treegrid').on('click', 'tr', function(){
        $('#sai-treegrid tr').removeClass('ui-selected');
        $(this).addClass('ui-selected');

        var this_index = $(this).index();
        var this_class = $("#sai-treegrid tr:eq("+this_index+")").attr('class');
        var node_class = this_class.match(/^treegrid-[0-9]+/gm);

        var this_node = $("."+node_class).treegrid('getId');
        var this_parent = $("."+node_class).treegrid('getParent');
        var this_kode = $("."+node_class).find('.set_kd_mn').text();
        var this_lv = $("."+node_class).treegrid('getDepth');
        var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
        var this_child_branch = $("."+node_class).treegrid('getBranch').length;

        $('#kode-set').val(this_kode.concat(+this_child_amount + 1));
        $('#lv-set').val(this_lv);
        $('#nu-set').val(this_index + this_child_branch + 1);

        // var domain = window.location.hostname;
        // var str = window.location.href;
        // var new_url = str.replace('ubStrukturFS', 'delStrukturFS');

        // var del_url = new_url+"/"+this_kode;
        // $('.del-gl-index').attr('href', del_url);
    });

    $('.sai-treegrid-btn-root').click(function(){
        // clear
        $('#kode-set').val('');
        $('#nama-set').val('');
        $('#link-set')[0].selectize.setValue('');
        $('#jenis-set')[0].selectize.setValue('');

        $('#sai-treegrid tr').removeClass('ui-selected');
        var root = $('#sai-treegrid').treegrid('getRoots').length - 1 ;
        $('#kode-set').val(root + 1);
        $('#lv-set').val(0);
        $('#nu-set').val($("#sai-treegrid tr:last").index() + 2);
        $('.del-gl-index').attr('href', '#');
    });

    $('.sai-treegrid-btn-tb').click(function(){
        // clear
        $('#kode-set').val('');
        $('#nama-set').val('');
        $('#link-set')[0].selectize.setValue('');
        $('#jenis-set')[0].selectize.setValue('');

        if($(".ui-selected").length != 1){
            $('#sai-treegrid tr').removeClass('ui-selected');

            // get prev code

            var root = $('#sai-treegrid').treegrid('getRoots').length - 1;
            $('#kode-set').val(root + 1);
            $('#lv-set').val(0);
            $('#nu-set').val($("#sai-treegrid tr:last").index() + 2);
            $('.del-gl-index').attr('href', '#');
        }
    });

    $('.sai-treegrid-btn-del').click(function(){
        if($(".ui-selected").length != 1){
            alert('Harap pilih struktur yang akan dihapus terlebih dahulu');
            return false;
        }else{
            var sts = confirm("Apakah anda yakin ingin menghapus item ini?");
            if(sts){
                var selected_id = $(".ui-selected").closest('tr').find('.set_kd_mn').text();
                // alert(service_domain+"/webjava/CMSAdmin/delMenu"+selected_id);
                window.location = service_domain+"/webjava/CMSAdmin/delMenu/"+selected_id;
            }else{
                return false;
            }
        }
    });

    $('.sai-treegrid-btn-ub').click(function(){
        if($(".ui-selected").length == 1){
            var sel_index = $(".ui-selected").closest('tr').index();
            var sel_node = $(".treegrid-"+sel_index).treegrid('getId');
            var sel_depth = $(".treegrid-"+sel_index).treegrid('getDepth');
            // alert(sel_index);
            
            var sel_class = $("#sai-treegrid tr:eq("+sel_index+")").attr('class');
            var node_class = sel_class.match(/^treegrid-[0-9]+/gm);

            var this_node = $("."+node_class).treegrid('getId');
            var this_parent = $("."+node_class).treegrid('getParent');
            var this_kode = $("."+node_class).find('.set_kd_mn').text();
            var this_nama = $("."+node_class).find('.set_nama').text();
            var this_jenis = $("."+node_class).find('.set_jenis').text();
            var this_link = $("."+node_class).find('.set_link').text();
            var this_lv = $("."+node_class).treegrid('getDepth');
            var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
            var this_child_branch = $("."+node_class).treegrid('getBranch').length;
            // alert(this_ja);

            $('#kode-set').val(this_kode);
            $('#nama-set').val(this_nama);
            $('#link-set')[0].selectize.setValue(this_link);
            $('#jenis-set')[0].selectize.setValue(this_jenis);
            $('#lv-set').val(this_lv-1);
            $('#nu-set').val(+sel_index+1);

            // $('#tipe-set-ub')[0].selectize.setValue(this_tp);
            // $('#sh-set-ub')[0].selectize.setValue(this_sh);
            // $('#ja-set-ub')[0].selectize.setValue(this_ja);
        }else{
            alert('Harap pilih struktur yang akan diubah terlebih dahulu');
            return false;
        }
    });
    
    $("#sai-treegrid-modal-form").on("submit", function(event){
        event.preventDefault();
        var sel_index = $(".ui-selected").closest('tr').index();
        var sel_node = $(".treegrid-"+sel_index).treegrid('getId');
        var sel_depth = $(".treegrid-"+sel_index).treegrid('getDepth');
        
        var sel_class = $("#sai-treegrid tr:eq("+sel_index+")").attr('class');
        var node_class = sel_class.match(/^treegrid-[0-9]+/gm);

        var new_node = $("#sai-treegrid tr:last").index() + 1;
        var kode_str = $('#kode-set').val();
        var nama_str = $('#nama-set').val();
        var link_str = $('#link-set')[0].selectize.getValue();
        var jenis_str = $('#jenis-set')[0].selectize.getValue();

        var formData = new FormData(this);
        formData.append('api_key', localStorage.api_key);
        formData.append('username', localStorage.username);
        formData.append('kode_lokasi', localStorage.kode_lokasi);
        
        saiPost(service_domain+'/webjava/CMSService/insertMenu', null, formData, null, function(res){
            var trow = "<tr class='treegrid-"+new_node+"'>";
            trow += "<td class='set_kd_mn'>"+kode_str+"</td>";
            trow += "<td class='set_nama'>"+nama_str+"</td>";
            trow += "<td class='set_link'>"+link_str+"</td>";
            trow += "<td class='set_jenis'>"+jenis_str+"</td>";
            // trow += "<td>";
            // trow += "<a href='#' class='fa fa-angle-down tb-menu-index btn btn-success btn-sm' data-toggle='modal' data-target='#modal-menu'></a>";
            // trow += "<a href='#' class='fa fa-pencil ub-menu-index btn btn-primary btn-sm' data-toggle='modal' data-target='#modal-menu-ub'></a>";
            // trow += "<a href='http://"+domain+"/admin/CSetting/delMenu/"+kode_klp[1]+"/"+kode_str+"' class='fa fa-times del-menu-index btn btn-danger btn-sm tbl-delete'></a><td>";
            trow += "</tr>";

            // if edit :
            // set sel_class closest kd_mn, nama, link, jenis
            if(!res.edit){
                // normal insert:
                if($('#lv-set').val() == 0){
                    $('#sai-treegrid').treegrid('add', [trow]);
                }else{
                    $('.'+node_class).treegrid('add', [trow]);
                }
            }else{
                $('.'+node_class).find('.set_kd_mn .treegrid-container').text(kode_str);
                $('.'+node_class).find('.set_nama').text(nama_str);
                $('.'+node_class).find('.set_link').text(link_str);
                $('.'+node_class).find('.set_jenis').text(jenis_str);
            }

            $('#sai-treegrid-modal').modal('hide');
            $('#sai-treegrid tr').removeClass('ui-selected');
            $('#validation-box').text('');
        });

        // $.ajax({
        //     url: service_domain+"/webjava/CMSService/insertMenu",
        //     data: formData,
        //     type: "post",
        //     dataType: "json",
        //     contentType: false,       // The content type used when sending data to the server.
        //     cache: false,             // To unable request pages to be cached
        //     processData:false, 
        //     success: function (data) {
        //         console.log(data);
        //         alert(data.alert);

                // if(data.status == 1){
                //     // clear input dan validation box jika berhasil
                //     if(data.edit == false){
                //         var trow = "<tr class='treegrid-"+new_node+"'>";
                //         trow += "<td class='set_kd_mn'>"+kode_str+"</td>";
                //         trow += "<td class='set_nama'>"+menu_str+"</td>";
                //         // trow += "<td>";
                //         // trow += "<a href='#' class='fa fa-angle-down tb-menu-index btn btn-success btn-sm' data-toggle='modal' data-target='#modal-menu'></a>";
                //         // trow += "<a href='#' class='fa fa-pencil ub-menu-index btn btn-primary btn-sm' data-toggle='modal' data-target='#modal-menu-ub'></a>";
                //         // trow += "<a href='http://"+domain+"/admin/CSetting/delMenu/"+kode_klp[1]+"/"+kode_str+"' class='fa fa-times del-menu-index btn btn-danger btn-sm tbl-delete'></a><td>";
                //         trow += "</tr>";

                //         if($('#lv-set').val() == 0){
                //             $('#sai-treegrid').treegrid('add', [trow]);
                //         }else{
                //             $('.'+node_class).treegrid('add', [trow]);
                //         }

                //         $('.modal').modal('hide');
                //         $('#sai-treegrid tr').removeClass('ui-selected');
                //         $('input').val('');
                //         $('textarea').val('');
                //         $('select').val('');
                //         $('#validation-box').text('');
                //         $('#validation-box2').text('');
                //         $('#form-set')[0].selectize.setValue('');
                //         $('#form-set-ub')[0].selectize.setValue('');
                //     }else{
                //         window.location = "http://"+domain+"/admin/CSetting/tbMenu/"+kode_klp[1];
                //     }
                // }else if (data.status == 3){
                //     // https://stackoverflow.com/a/26166303
                //     var error_array = Object.keys(data.error_input).map(function (key) { return data.error_input[key]; });

                //     // append input element error
                //     var error_list = "<div class='alert alert-danger' style='padding:0px; padding-top:5px; padding-bottom:5px; margin:0px; color: #a94442; background-color: #f2dede; border-color: #ebccd1;'><ul>";
                //     for(i = 0; i<error_array.length; i++){
                //         error_list += '<li>'+error_array[i]+'</li>';
                //     }
                //     error_list += "</ul></div>";

                //     $('#validation-box').append(error_list);
                // }
        //     }
        // });
    });

    // -----------------------------------------  MODULE COMPONENT ---------------------------------------

    $('#ajax-content-section').on('submit', '#java-cms-form-logo', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('api_key', localStorage.api_key);
        formData.append('username', localStorage.username);
        formData.append('kode_lokasi', localStorage.kode_lokasi);

        saiPost(service_domain+'/webjava/CMSService/editLogo', null, formData);
    });

    $('#ajax-content-section').on('submit', '#java-cms-form-konten', function(e){
        e.preventDefault();
        // console.log('here');
        var formData = new FormData(this);
        formData.append('api_key', localStorage.api_key);
        formData.append('username', localStorage.username);
        formData.append('kode_lokasi', localStorage.kode_lokasi);

        saiPost(service_domain+'/webjava/CMSService/insertKonten', service_domain+'/webjava/CMSAdmin/dKonten', formData);
    });

    $('#ajax-content-section').on('submit', '#java-cms-form-kelompok', function(e){
        e.preventDefault();
        // console.log('here');
        var formData = new FormData(this);
        formData.append('api_key', localStorage.api_key);
        formData.append('username', localStorage.username);
        formData.append('kode_lokasi', localStorage.kode_lokasi);

        saiPost(service_domain+'/webjava/CMSService/insertKelompok', service_domain+'/webjava/CMSAdmin/dKelompok', formData);
    });

    $('#ajax-content-section').on('submit', '#java-cms-form-galeri', function(e){
        e.preventDefault();
        // console.log('here');
        var formData = new FormData(this);
        formData.append('api_key', localStorage.api_key);
        formData.append('username', localStorage.username);
        formData.append('kode_lokasi', localStorage.kode_lokasi);

        saiPost(service_domain+'/webjava/CMSService/insertGaleri', service_domain+'/webjava/CMSAdmin/dGaleri', formData);
    });

    $('#ajax-content-section').on('submit', '#java-cms-form-ktg-galeri', function(e){
        e.preventDefault();
        // console.log('here');
        var formData = new FormData(this);
        formData.append('api_key', localStorage.api_key);
        formData.append('username', localStorage.username);
        formData.append('kode_lokasi', localStorage.kode_lokasi);

        saiPost(service_domain+'/webjava/CMSService/insertKtgGaleri', service_domain+'/webjava/CMSAdmin/dKtgGaleri', formData);
    });

    $('#ajax-content-section').on('submit', '#java-cms-form-kontak', function(e){
        e.preventDefault();
        // console.log('here');
        var formData = new FormData(this);
        formData.append('api_key', localStorage.api_key);
        formData.append('username', localStorage.username);
        formData.append('kode_lokasi', localStorage.kode_lokasi);

        saiPost(service_domain+'/webjava/CMSService/insertKontak', service_domain+'/webjava/CMSAdmin/dKontak', formData);
    });
});