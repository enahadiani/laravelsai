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

function generateTable(id,url,columnDefs,columns,url_sesi) {
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
        'columnDefs': columnDefs,
        'columns': columns,
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