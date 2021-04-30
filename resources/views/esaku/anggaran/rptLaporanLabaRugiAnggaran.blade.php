<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-labarugi-anggaran', null, formData, null, function(res){
        if(res.result.length > 0){
            $('#pagination').html('');
            var show = $('#show').val();
            generatePaginationDore('pagination',show,res);        
        }else{
            $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
        }
    });
}

function getMonth(periode) {
    
}

function spasi(menu,jum) {
	var dat="";;
	for (var s = 0; s < jum; s++) {
	  	dat+="&nbsp;&nbsp;&nbsp;&nbsp;";
	}
    if (menu==".") { 
        menu="";
    }
	return dat+menu;
}

function fnSpasi(level) {
    var tmp="";
    for (var f=1; f<=level; f++) {
        tmp+="&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    return tmp;
}

drawLap($formData);

function drawRptPage(data,res,from,to) { 
    console.log({ data, res, $periode })
    if(data.length > 0) {
        var html = ""
        html += "<div class='sai-rpt-table-export-tbl-anggaran'>"
        html += "<h6 class='text-center'>Laporan Laba Rugi Anggaran</h6>"
        html += "<hr />"
        html += "<div class='ml-2 mr-2' style='overflow-x: scroll;'>"
        html += "<table class='table table-bordered' style='width: 1500px;'>"
        html += "<thead>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 300px;' rowspan='2'>P&L ITEMS (in Rp.Bn)</th>"
        html += "<th class='text-center' style='width: 90px;' rowspan='2'>Budget 2021</th>"
        html += "<th class='text-center' style='width: 90px;' rowspan='2'>Actual Februari 2021</th>"
        html += "<th class='text-center' colspan='4'>Januari 2021</th>"
        html += "<th class='text-center' style='width: 90px;' rowspan='2'>Actual Ytd Januari 2021</th>"
        html += "<th class='text-center' colspan='4'>Ytd Januari 2021</th>"
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
        
        html += "</tbody>"
        html += "</table>"
        html += "</div>"
        html += "</div>"
    }

    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>