function sepNumX(x) {
    if (typeof x === "undefined" || !x) {
        return 0;
    } else {
        if (x < 0) {
            var x = parseFloat(x).toFixed(0);
        }

        var parts = x.toString().split(",");
        parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g, "$1.");
        return parts.join(".");
    }
}

function showNotification(placementFrom, placementAlign, type, title, message) {
    $.notify(
        {
            title: title,
            message: message,
            target: "_blank",
        },
        {
            element: "body",
            position: null,
            type: type,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: placementFrom,
                align: placementAlign,
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 4000,
            timer: 2000,
            url_target: "_blank",
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template:
                '<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                "</div>",
        }
    );
}

function jumFilter() {
    var jum = $("[name^=inp-filter]").filter(function () {
        return this.value.trim() != "";
    }).length;
    if (jum > 0) {
        $("#jum-filter").text(jum);
        if ($("#jum-filter2").length > 0) {
            $("#jum-filter2").text(jum);
        }
    } else {
        $("#jum-filter").text("");
        if ($("#jum-filter2").length > 0) {
            $("#jum-filter2").text("");
        }
    }
}

function setHeightReport() {
    var header = $(".topbar").height();
    var subheader = $("#subFixbar").height();
    var content = window.innerHeight;
    var tinggi = content - header - subheader - 50;
    $("#content-lap").css("height", tinggi);
}

function setHeightForm() {
    var header = 70;
    var content = window.innerHeight;
    var title = 69;
    var height = content - header - title - 40;

    if ($("#saku-form").length > 0) {
        $(".form-body").css("height", height);
    }
    if ($(".card-body-footer").length > 0) {
        $(".card-body-footer").css("width", $(".form-body").width());
    }
}

function setWidthFooterCardBody() {
    if ($(".card-body-footer").length > 0) {
        if ($("#saku-form > .col-lg-6").length > 0) {
            var main_width = $(".main-menu").width();
            var main_pos = $(".main-menu").position();
            if (main_pos.left < 0) {
                main_width = 10;
            }
            $(".card-body-footer")
                .css("width", $("#saku-form > .col-lg-6").width() + "px")
                .css({ left: main_width });
        } else {
            $(".card-body-footer").css(
                "width",
                $(".container-fluid").width() + "px"
            );
        }
    }
}

function setHeightFormPOS() {
    var header = 70;
    var content = window.innerHeight;
    var height = content - header - 40;

    if ($(".form-pos-body").length > 0) {
        $(".form-pos-body").css("height", height);
    }
    if ($(".grid-table").length > 0) {
        $(".grid-table").css("height", height - 236);
    }
}

function storageChange(event) {
    if (event.key === "logged_in") {
        if (window.localStorage.getItem("logged_in") == "false") {
            window.localStorage.removeItem("esaku-form");
            window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
        }
    }
}

function logout() {
    msgDialog({
        id: null,
        type: "logout",
    });
}

function newForm() {
    $("#row-id").hide();
    $("#method").val("post");
    $("[id^=label]").each(function (e) {
        $(this).text("");
    });
    $("[class^=info-name]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class^=input-group-text]").each(function (e) {
        $(this).text("");
    });
    $("[class^=input-group-prepend]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class*='inp-label-']").each(function (e) {
        $(this).removeAttr("style");
    });
    $("[class^=info-code]").each(function (e) {
        $(this).text("");
    });
    $("[class^=simple-icon-close]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("#id_edit").val("");
    $('input[data-input="cbbl"]').val("");
    $("#btn-update").attr("id", "btn-save");
    $("#btn-save").attr("type", "submit");
    $("#form-tambah")[0].reset();
    $("#form-tambah").validate().resetForm();
    $("#id").val("");
    $("#saku-datatable").hide();
    $("#saku-form").show();
}

function resetForm() {
    $("#row-id").hide();
    $("#method").val("post");
    $("[id^=label]").each(function (e) {
        $(this).text("");
    });
    $("[class^=info-name]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class^=input-group-text]").each(function (e) {
        $(this).text("");
    });
    $("[class^=input-group-prepend]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class*='inp-label-']").each(function (e) {
        $(this).removeAttr("style");
    });
    $("[class^=info-code]").each(function (e) {
        $(this).text("");
    });
    $("[class^=simple-icon-close]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("#id_edit").val("");
    $('input[data-input="cbbl"]').val("");
    $("#btn-update").attr("id", "btn-save");
    $("#btn-save").attr("type", "submit");
    $("#form-tambah")[0].reset();
    $("#form-tambah").validate().resetForm();
    $("#id").val("");
}

function format_number(x) {
    var num = parseFloat(x).toFixed(0);
    num = sepNumX(num);
    return num;
}

function last_add(table, param, isi) {
    var rowIndexes = [];
    table.rows(function (idx, data, node) {
        if (data[param] === isi) {
            rowIndexes.push(idx);
        }
        return false;
    });
    table.row(rowIndexes).select();
    $(".selected td:eq(0)").addClass("last-add");
    console.log("last-add");
    setTimeout(function () {
        console.log("timeout");
        $(".selected td:eq(0)").removeClass("last-add");
        table.row(rowIndexes).deselect();
    }, 1000 * 60 * 10);
}

function showInfoField(kode, isi_kode, isi_nama) {
    $("#" + kode).css("color", "transparent");
    $("#" + kode).val(isi_kode);
    $("#" + kode).attr(
        "style",
        "border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important"
    );
    $(".info-code_" + kode)
        .text(isi_kode)
        .parent("div")
        .removeClass("hidden");
    $(".info-code_" + kode).attr("title", isi_nama);
    $(".info-name_" + kode).removeClass("hidden");
    $(".info-name_" + kode).attr("title", isi_nama);
    $(".info-name_" + kode).css({ width: "100%", left: "30px" });
    $(".info-name_" + kode + " span").text(isi_nama);
    $(".info-name_" + kode)
        .closest("div")
        .find(".info-icon-hapus")
        .removeClass("hidden");
}
