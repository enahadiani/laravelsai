<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-pencapaian-anggaran', null, formData, null, function(res){
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

function drawRptPage(data,res,from,to) {
    var html = ""
    var no = 1

    var targetTahun = 0
    var targetBulan = 0
    var targetSDBulan = 0

    var realTahun = 0
    var realBulan = 0
    var realSDBulan = 0

    var sisaTahun = 0
    var sisaBulan = 0
    var sisaSDBulan = 0

    var totTargetTahun = 0
    var totTargetBulan = 0
    var totTargetSDBulan = 0

    var totRealTahun = 0
    var totRealBulan = 0
    var totRealSDBulan = 0

    var totSisaTahun = 0
    var totSisaBulan = 0
    var totSisaSDBulan = 0

    if(data.length > 0) {
        html += "<div class='sai-rpt-table-export-tbl-anggaran'>"
        html += "<h6 class='text-center'>Laporan Pencapaian Anggaran</h6>"
        html += "<hr />"
        html += "<div class='ml-2 mr-2' style='overflow-x: scroll;'>"
        html += "<table class='table table-bordered' style='width: 1500px;'>"
        html += "<thead>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 10px;' rowspan='2'>No</th>"
        html += "<th class='text-center' style='width: 90px;' rowspan='2'>Kode Akun</th>"
        html += "<th class='text-center' style='width: 250px;' rowspan='2'>Nama Akun</th>"
        html += "<th class='text-center' style='width: 90px;' rowspan='2'>Kode PP</th>"
        html += "<th class='text-center' style='width: 120px;' rowspan='2'>Nama PP</th>"
        html += "<th class='text-center' colspan='3'>Target/Tahun</th>"
        html += "<th class='text-center' colspan='3'>Realisasi</th>"
        html += "<th class='text-center' colspan='3'>Sisa Anggaran</th>"
        html += "</tr>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 90px;'>Tahun</th>"
        html += "<th class='text-center' style='width: 90px;'>Bulan Berjalan</th>"
        html += "<th class='text-center' style='width: 90px;'>S.D Bulan Berjalan</th>"
        html += "<th class='text-center' style='width: 90px;'>Tahun</th>"
        html += "<th class='text-center' style='width: 90px;'>Bulan Berjalan</th>"
        html += "<th class='text-center' style='width: 90px;'>S.D Bulan Berjalan</th>"
        html += "<th class='text-center' style='width: 90px;'>Tahun</th>"
        html += "<th class='text-center' style='width: 90px;'>Bulan Berjalan</th>"
        html += "<th class='text-center' style='width: 90px;'>S.D Bulan Berjalan</th>"
        html += "</tr>"
        html += "</thead>"
        html += "<tbody>"
        for(var i=0;i<data.length;i++) {
            var dt = data[i]
            
            if(dt.n1 < 0 && typeof dt.n1 !== 'undefined') {
                var targetTahunPlus = parseInt(dt.n1) * -1
                targetTahun = "-"+sepNum(dt.n1)
                totTargetTahun += targetTahunPlus
            } else if(dt.n1 > 0 && typeof dt.n1 !== 'undefined') {
                targetTahun = sepNum(dt.n1)
                totTargetTahun += parseInt(dt.n1)
            } else {
                targetTahun = 0
                totTargetTahun += 0
            }

            if(dt.n2 < 0 && typeof dt.n2 !== 'undefined') {
                var targetBulanPlus = parseInt(dt.n2) * -1
                targetBulan = "-"+sepNum(dt.n2)
                totTargetBulan += targetBulanPlus
            } else if(dt.n2 > 0 && typeof dt.n2 !== 'undefined') {
                targetBulan = sepNum(dt.n2)
                totTargetBulan += parseInt(dt.n2)
            } else {
                targetBulan = 0
                totTargetBulan += 0
            }

            if(dt.n3 < 0 && typeof dt.n3 !== 'undefined') {
                var targetBulanSDPlus = parseInt(dt.n3) * -1
                targetSDBulan = "-"+sepNum(dt.n3)
                totTargetSDBulan += targetBulanSDPlus
            } else if(dt.n3 > 0 && typeof dt.n3 !== 'undefined') {
                targetSDBulan = sepNum(dt.n3)
                totTargetSDBulan += parseInt(dt.n3)
            } else {
                targetSDBulan = 0
                totTargetSDBulan += 0
            }

            if(dt.n4 < 0 && typeof dt.n4 !== 'undefined') {
                var realTahunPlus = parseInt(dt.n4) * -1
                realTahun = "-"+sepNum(dt.n4)
                totRealTahun += realTahunPlus
            } else if(dt.n4 > 0 && typeof dt.n4 !== 'undefined') {
                realTahun = sepNum(dt.n4)
                totRealTahun += parseInt(dt.n4)
            } else {
                realTahun = 0
                totRealTahun += 0
            }

            if(dt.n5 < 0 && typeof dt.n5 !== 'undefined') {
                var realBulanPlus = parseInt(dt.n5) * -1
                realBulan = "-"+sepNum(dt.n5)
                totTargetBulan += realBulanPlus
            } else if(dt.n5 > 0 && typeof dt.n5 !== 'undefined') {
                realBulan = sepNum(dt.n5)
                totRealBulan += parseInt(dt.n5)
            } else {
                realBulan = 0
                totRealBulan += 0
            }

            if(dt.n6 < 0 && typeof dt.n6 !== 'undefined') {
                var realBulanSDPlus = parseInt(dt.n6) * -1
                realSDBulan = "-"+sepNum(dt.n6)
                totRealSDBulan += realBulanSDPlus
            } else if(dt.n6 > 0 && typeof dt.n6 !== 'undefined') {
                realSDBulan = sepNum(dt.n6)
                totRealSDBulan += parseInt(dt.n6)
            } else {
                realSDBulan = 0
                totRealSDBulan += 0
            }

            if(dt.n7 < 0 && typeof dt.n7 !== 'undefined') {
                var sisaTahunPlus = parseInt(dt.n7) * -1
                sisaTahun = "-"+sepNum(dt.n7)
                totSisaTahun += sisaTahunPlus
            } else if(dt.n7 > 0 && typeof dt.n7 !== 'undefined') {
                sisaTahun = sepNum(dt.n7)
                totSisaTahun += parseInt(dt.n7)
            } else {
                sisaTahun = 0
                totSisaTahun += 0
            }

            if(dt.n8 < 0 && typeof dt.n8 !== 'undefined') {
                var sisaBulanPlus = parseInt(dt.n8) * -1
                sisaBulan = "-"+sepNum(dt.n8)
                totSisaBulan += sisaBulanPlus
            } else if(dt.n8 > 0 && typeof dt.n8 !== 'undefined') {
                sisaBulan = sepNum(dt.n8)
                totSisaBulan += parseInt(dt.n8)
            } else {
                sisaBulan = 0
                totSisaBulan += 0
            }

            if(dt.n9 < 0 && typeof dt.n9 !== 'undefined') {
                var sisaBulanSDPlus = parseInt(dt.n9) * -1
                sisaSDBulan = "-"+sepNum(dt.n9)
                totSisaSDBulan += sisaBulanSDPlus
            } else if(dt.n9 > 0 && typeof dt.n9 !== 'undefined') {
                sisaSDBulan = sepNum(dt.n9)
                totSisaSDBulan += parseInt(dt.n9)
            } else {
                sisaSDBulan = 0
                totSisaSDBulan += 0
            }

            html += "<tr>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+no+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+dt.kode_akun+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+dt.nama_akun+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+dt.kode_pp+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+dt.nama_pp+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+targetTahun+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+targetBulan+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+targetSDBulan+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realTahun+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realBulan+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realSDBulan+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaTahun+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaBulan+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaSDBulan+"</td>"
            html += "</tr>"

            no++
        }
        html += "<tr>"
        html += "<td class='isi-laporan' style='text-align: right;' colspan='5'>Total</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totTargetTahun)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totTargetBulan)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totTargetSDBulan)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealTahun)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealBulan)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealSDBulan)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaTahun)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaBulan)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaSDBulan)+"</td>"
        html += "</tr>"
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