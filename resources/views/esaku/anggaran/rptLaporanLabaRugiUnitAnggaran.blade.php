<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-labarugiunit-anggaran', null, formData, null, function(res){
        if(res.result.length > 0){
            $('#pagination').html('');
            var show = $('#show').val();
            generatePaginationDore('pagination',show,res);        
        }else{
            $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
        }
    });
}

drawLap($formData);

function fnSpasi(level) {
    var tmp="";
    for (var f=1; f<=level; f++) {
        tmp+="&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    return tmp;
}

function drawRptPage(data,res,from,to) { 
    console.log({data, res})
    if(data.length > 0) {
        var html = ""
        html += "<div class='sai-rpt-table-export-tbl-anggaran'>"
        html += "<h6 class='text-center'>Laporan Laba Rugi Anggaran Unit</h6>"
        html += "<hr />"
        html += "<div class='ml-2 mr-2' style='overflow-x: scroll;'>"
        html += "<table class='table table-bordered' style='width: 1700px;'>"
        html += "<thead>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 300px;' rowspan='2'>P&L ITEMS (in Rp.Bn)</th>"
        html += "<th class='text-center' style='width: 90px;' rowspan='2'>Budget 2021</th>"
        html += "<th class='text-center' style='width: 120px;' rowspan='2'>Actual Februari 2021</th>"
        html += "<th class='text-center' colspan='4'>Maret 2021</th>"
        html += "<th class='text-center' style='width: 120px;' rowspan='2'>Actual Ytd Maret 2020</th>"
        html += "<th class='text-center' colspan='4'>Ytd Maret 2021</th>"
        html += "</tr>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 90px;'>Budget</th>"
        html += "<th class='text-center' style='width: 90px;'>Actual</th>"
        html += "<th class='text-center' style='width: 90px;'>Ach.</th>"
        html += "<th class='text-center' style='width: 90px;'>MoM Growth</th>"
        html += "<th class='text-center' style='width: 90px;'>Budget</th>"
        html += "<th class='text-center' style='width: 90px;'>Actual</th>"
        html += "<th class='text-center' style='width: 90px;'>Ach.</th>"
        html += "<th class='text-center' style='width: 90px;'>YoY Growth</th>"
        html += "</tr>"
        html += "</thead>"
        html += "<tbody>"
        for(var i=0;i<data.length;i++) {
            var row = data[i]
            var color = "";
            var bold = "";
            var nilai1 = ""
            var nilai2 = ""
            var nilai3 = ""
            var nilai4 = ""
            var nilai5 = ""
            var nilai6 = ""
            var nilai7 = ""
            var nilai8 = ""
            var nilai9 = ""
            var nilai10 = ""
            var nilai11 = ""

            if (row.tipe !== "Header") {
                if(row.n1 !== null) {
                    nilai1 = sepNum(parseFloat(row.n1));
                } else {
                    nilai1 = 0;
                }

                if(row.n2 !== null) {
                    nilai2 = sepNum(parseFloat(row.n2));
                } else {
                    nilai2 = 0;
                }

                if(row.n3 !== null) {
                    nilai3 = sepNum(parseFloat(row.n3));
                } else {
                    nilai3 = 0;
                }

                if(row.n4 !== null) {
                    nilai4 = sepNum(parseFloat(row.n4));
                } else {
                    nilai4 = 0;
                }

                if(row.n5 !== null) {
                    nilai5 = sepNum(parseFloat(row.n5));
                } else {
                    nilai5 = 0;
                }

                if(row.n6 !== null) {
                    nilai6 = sepNum(parseFloat(row.n6));
                } else {
                    nilai6 = 0;
                }
                
                if(row.n7 !== null) {
                    nilai7 = sepNum(parseFloat(row.n7));
                } else {
                    nilai7 = 0;
                }

                if(row.n8 !== null) {
                    nilai8 = sepNum(parseFloat(row.n8));
                } else {
                    nilai8 = 0;
                }

                if(row.n9 !== null) {
                    nilai9 = sepNum(parseFloat(row.n9));
                } else {
                    nilai9 = 0;
                }

                if(row.n10 !== null) {
                    nilai10 = sepNum(parseFloat(row.n10));
                } else {
                    nilai10 = 0;
                }

                if(row.n11 !== null) {
                    nilai11 = sepNum(parseFloat(row.n11));
                } else {
                    nilai11 = 0;
                }

                if(row.tipe == "Summary") {
                    color = "";
                    bold = "bold";
                }
                else if(row.tipe == "SumPosted") {
                    color = "";
                    bold = "bold";
                } else{
                    color = "";
                    bold = "";
                }
            }else{
                color = "";
                bold = "bold"; 
            }

            if(i == (data.length - 1)){
                color = "bg-primary0";
            }

            if (row.tipe=="Posting") {
                html += "<tr class='report-link laba-rugi-unit' style='cursor:pointer;' data-kode_neraca='"+row.kode_neraca+"'>"
                html += "<td class='isi_laporan link-report' style='height: 20px;'>"+fnSpasi(row.level_spasi)+""+row.nama+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai1+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai2+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai3+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai4+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai5+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai6+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai7+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai8+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai9+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai10+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai11+"</td>"
                html += "</tr>"
            }
            else {
                html += "<tr>"
                html += "<td class='isi-laporan "+color+" "+bold+"'>"+fnSpasi(row.level_spasi)+""+row.nama+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai1+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai2+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai3+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai4+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai5+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai6+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai7+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai8+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai9+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai10+"</td>"
                html += "<td class='isi-laporan "+color+" "+bold+"' style='text-align: right;'>"+nilai11+"</td>"
                html += "</tr>"
            }
        }
        html += "</tbody>"
        html += "</div>"
        html += "</div>"

        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
}
</script>