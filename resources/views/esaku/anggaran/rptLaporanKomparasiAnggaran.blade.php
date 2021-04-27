<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-komparasi-anggaran', null, formData, null, function(res){
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
    
    var aggJan = 0
    var aggFeb = 0
    var aggMar = 0
    var aggApr = 0
    var aggMei = 0
    var aggJun = 0
    var aggJul = 0
    var aggAgt = 0
    var aggSep = 0
    var aggOkt = 0
    var aggNov = 0
    var aggDes = 0

    var realJan = 0
    var realFeb = 0
    var realMar = 0
    var realApr = 0
    var realMei = 0
    var realJun = 0
    var realJul = 0
    var realAgt = 0
    var realSep = 0
    var realOkt = 0
    var realNov = 0
    var realDes = 0

    var sisaJan = 0
    var sisaFeb = 0
    var sisaMar = 0
    var sisaApr = 0
    var sisaMei = 0
    var sisaJun = 0
    var sisaJul = 0
    var sisaAgt = 0
    var sisaSep = 0
    var sisaOkt = 0
    var sisaNov = 0
    var sisaDes = 0

    var totAggJan = 0
    var totAggFeb = 0
    var totAggMar = 0
    var totAggApr = 0
    var totAggMei = 0
    var totAggJun = 0
    var totAggJul = 0
    var totAggAgt = 0
    var totAggSep = 0
    var totAggOkt = 0
    var totAggNov = 0
    var totAggDes = 0

    var totRealJan = 0
    var totRealFeb = 0
    var totRealMar = 0
    var totRealApr = 0
    var totRealMei = 0
    var totRealJun = 0
    var totRealJul = 0
    var totRealAgt = 0
    var totRealSep = 0
    var totRealOkt = 0
    var totRealNov = 0
    var totRealDes = 0

    var totSisaJan = 0
    var totSisaFeb = 0
    var totSisaMar = 0
    var totSisaApr = 0
    var totSisaMei = 0
    var totSisaJun = 0
    var totSisaJul = 0
    var totSisaAgt = 0
    var totSisaSep = 0
    var totSisaOkt = 0
    var totSisaNov = 0
    var totSisaDes = 0
    
    if(data.length > 0) {
        html += "<div class='sai-rpt-table-export-tbl-anggaran'>"
        html += "<h6 class='text-center'>Laporan Realisasi Komparasi Anggaran</h6>"
        html += "<hr />"
        html += "<div class='ml-2 mr-2' style='overflow-x: scroll;'>";
        html += "<table class='table table-bordered' style='width: 4500px;'>"
        html += "<thead>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 10px;' rowspan='2'>No</th>"
        html += "<th class='text-center' style='width: 90px;' rowspan='2'>Kode Akun</th>"
        html += "<th class='text-center' style='width: 250px;' rowspan='2'>Nama Akun</th>"
        html += "<th class='text-center' style='width: 90px;' rowspan='2'>Kode PP</th>"
        html += "<th class='text-center' style='width: 120px;' rowspan='2'>Nama PP</th>"
        html += "<th class='text-center' colspan='3'>Januari</th>"
        html += "<th class='text-center' colspan='3'>Februari</th>"
        html += "<th class='text-center' colspan='3'>Maret</th>"
        html += "<th class='text-center' colspan='3'>April</th>"
        html += "<th class='text-center' colspan='3'>Mei</th>"
        html += "<th class='text-center' colspan='3'>Juni</th>"
        html += "<th class='text-center' colspan='3'>Juli</th>"
        html += "<th class='text-center' colspan='3'>Agustus</th>"
        html += "<th class='text-center' colspan='3'>September</th>"
        html += "<th class='text-center' colspan='3'>Oktober</th>"
        html += "<th class='text-center' colspan='3'>November</th>"
        html += "<th class='text-center' colspan='3'>Desember</th>"
        html += "</tr>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "<th class='text-center' style='width: 90px;'>Anggaran</th>"
        html += "<th class='text-center' style='width: 90px;'>Realisasi</th>"
        html += "<th class='text-center' style='width: 90px;'>Sisa</th>"
        html += "</tr>"
        html += "</thead>"
        html += "<tbody>"
        for(var i=0;i<data.length;i++) {
            var dt = data[i]
            
            if(dt.n1 < 0 && typeof dt.n1 !== 'undefined') {
                var aggJanPlus = parseInt(dt.n1) * -1
                aggJan = "-"+sepNum(dt.n1)
                totAggJan += aggJanPlus
            } else if(dt.n1 > 0 && typeof dt.n1 !== 'undefined') {
                aggJan = sepNum(dt.n1)
                totAggJan += parseInt(dt.n1)
            } else {
                aggJan = 0
                totAggJan += 0
            }

            if(dt.n2 < 0 && typeof dt.n2 !== 'undefined') {
                var realJanPlus = parseInt(dt.n2) * -1
                realJan = "-"+sepNum(dt.n2)
                totRealJan += realJanPlus
            } else if(dt.n2 > 0 && typeof dt.n2 !== 'undefined') {
                realJan = sepNum(dt.n2)
                totRealJan += parseInt(dt.n2)
            } else {
                realJan = 0
                totRealJan += 0
            }

            if(dt.n3 < 0 && typeof dt.n3 !== 'undefined') {
                var sisaJanPlus = parseInt(dt.n3) * -1
                sisaJan = "-"+sepNum(dt.n3)
                totSisaJan += sisaJanPlus
            } else if(dt.n3 > 0 && typeof dt.n3 !== 'undefined') {
                sisaJan = sepNum(dt.n3)
                totSisaJan += parseInt(dt.n3)
            } else {
                sisaJan = 0
                totSisaJan += 0
            }

            if(dt.n4 < 0 && typeof dt.n4 !== 'undefined') {
                var aggFebPlus = parseInt(dt.n4) * -1
                aggFeb = "-"+sepNum(dt.n4)
                totAggFeb += aggFebPlus
            } else if(dt.n4 > 0 && typeof dt.n4 !== 'undefined') {
                aggFeb = sepNum(dt.n4)
                totAggFeb += parseInt(dt.n4)
            } else {
                aggFeb = 0
                totAggFeb += 0
            }

            if(dt.n5 < 0 && typeof dt.n5 !== 'undefined') {
                var realFebPlus = parseInt(dt.n5) * -1
                realFeb = "-"+sepNum(dt.n5)
                totRealFeb += realFebPlus
            } else if(dt.n5 > 0 && typeof dt.n5 !== 'undefined') {
                realFeb = sepNum(dt.n5)
                totRealFeb += parseInt(dt.n5)
            } else {
                realFeb = 0
                totRealFeb += 0
            }

            if(dt.n6 < 0 && typeof dt.n6 !== 'undefined') {
                var sisaFebPlus = parseInt(dt.n6) * -1
                sisaFeb = "-"+sepNum(dt.n6)
                totSisaFeb += sisaFebPlus
            } else if(dt.n6 > 0 && typeof dt.n6 !== 'undefined') {
                sisaFeb = sepNum(dt.n6)
                totSisaFeb += parseInt(dt.n6)
            } else {
                sisaFeb = 0
                totSisaFeb += 0
            }

            if(dt.n7 < 0 && typeof dt.n7 !== 'undefined') {
                var aggMarPlus = parseInt(dt.n7) * -1
                aggMar = "-"+sepNum(dt.n7)
                totAggMar += aggMarPlus
            } else if(dt.n7 > 0 && typeof dt.n7 !== 'undefined') {
                aggMar = sepNum(dt.n7)
                totAggMar += parseInt(dt.n7)
            } else {
                aggMar = 0
                totAggMar += 0
            }

            if(dt.n8 < 0 && typeof dt.n8 !== 'undefined') {
                var realMarPlus = parseInt(dt.n8) * -1
                realMar = "-"+sepNum(dt.n8)
                totRealMar += realMarPlus
            } else if(dt.n8 > 0 && typeof dt.n8 !== 'undefined') {
                realMar = sepNum(dt.n8)
                totRealMar += parseInt(dt.n8)
            } else {
                realMar = 0
                totRealMar += 0
            }

            if(dt.n9 < 0 && typeof dt.n9 !== 'undefined') {
                var sisaMarPlus = parseInt(dt.n9) * -1
                sisaMar = "-"+sepNum(dt.n9)
                totSisaMar += sisaMarPlus
            } else if(dt.n9 > 0 && typeof dt.n9 !== 'undefined') {
                sisaMar = sepNum(dt.n9)
                totSisaMar += parseInt(dt.n9)
            } else {
                sisaMar = 0
                totSisaMar += 0
            }

            if(dt.n10 < 0 && typeof dt.n10 !== 'undefined') {
                var aggAprPlus = parseInt(dt.n10) * -1
                aggApr = "-"+sepNum(dt.n10)
                totAggApr += aggAprPlus
            } else if(dt.n10 > 0 && typeof dt.n10 !== 'undefined') {
                aggApr = sepNum(dt.n10)
                totAggApr += parseInt(dt.n10)
            } else {
                aggApr = 0
                totAggApr += 0
            }

            if(dt.n11 < 0 && typeof dt.n11 !== 'undefined') {
                var realAprPlus = parseInt(dt.n11) * -1
                realApr = "-"+sepNum(dt.n11)
                totRealApr += realAprPlus
            } else if(dt.n11 > 0 && typeof dt.n11 !== 'undefined') {
                realApr = sepNum(dt.n11)
                totRealApr += parseInt(dt.n11)
            } else {
                realApr = 0
                totRealApr += 0
            }

            if(dt.n12 < 0 && typeof dt.n12 !== 'undefined') {
                var sisaAprPlus = parseInt(dt.n12) * -1
                sisaApr = "-"+sepNum(dt.n12)
                totSisaApr += sisaAprPlus
            } else if(dt.n12 > 0 && typeof dt.n12 !== 'undefined') {
                sisaApr = sepNum(dt.n12)
                totSisaApr += parseInt(dt.n12)
            } else {
                sisaApr = 0
                totSisaApr += 0
            }

            if(dt.n13 < 0 && typeof dt.n13 !== 'undefined') {
                var aggMeiPlus = parseInt(dt.n13) * -1
                aggMei = "-"+sepNum(dt.n13)
                totAggMei += aggMeiPlus
            } else if(dt.n13 > 0 && typeof dt.n13 !== 'undefined') {
                aggMei = sepNum(dt.n13)
                totAggMei += parseInt(dt.n13)
            } else {
                aggMei = 0
                totAggMei += 0
            }

            if(dt.n14 < 0 && typeof dt.n14 !== 'undefined') {
                var realMeiPlus = parseInt(dt.n14) * -1
                realMei = "-"+sepNum(dt.n14)
                totRealMei += realMeiPlus
            } else if(dt.n14 > 0 && typeof dt.n14 !== 'undefined') {
                realMei = sepNum(dt.n14)
                totRealMei += parseInt(dt.n14)
            } else {
                realMei = 0
                totRealMei += 0
            }

            if(dt.n15 < 0 && typeof dt.n15 !== 'undefined') {
                var sisaMeiPlus = parseInt(dt.n15) * -1
                sisaMei  = "-"+sepNum(dt.n15)
                totSisaMei += sisaMeiPlus
            } else if(dt.n15 > 0 && typeof dt.n15 !== 'undefined') {
                sisaMei = sepNum(dt.n15)
                totSisaMei += parseInt(dt.n15)
            } else {
                sisaMei = 0
                totSisaMei += 0
            }

            if(dt.n16 < 0 && typeof dt.n16 !== 'undefined') {
                var aggJunPlus = parseInt(dt.n16) * -1
                aggJun = "-"+sepNum(dt.n16)
                totAggJun += aggJunPlus
            } else if(dt.n16 > 0 && typeof dt.n16 !== 'undefined') {
                aggJun = sepNum(dt.n16)
                totAggJun += parseInt(dt.n16)
            } else {
                aggJun = 0
                totAggJun += 0
            }

            if(dt.n17 < 0 && typeof dt.n17 !== 'undefined') {
                var realJunPlus = parseInt(dt.n17) * -1
                realJun = "-"+sepNum(dt.n17)
                totRealJun += realJunPlus
            } else if(dt.n17 > 0 && typeof dt.n17 !== 'undefined') {
                realJun = sepNum(dt.n17)
                totRealJun += parseInt(dt.n17)
            } else {
                realJun = 0
                totRealJun += 0
            }

            if(dt.n18 < 0 && typeof dt.n18 !== 'undefined') {
                var sisaJunPlus = parseInt(dt.n18) * -1
                sisaJun  = "-"+sepNum(dt.n18)
                totSisaJun += sisaJunPlus
            } else if(dt.n18 > 0 && typeof dt.n18 !== 'undefined') {
                sisaJun = sepNum(dt.n18)
                totSisaJun += parseInt(dt.n18)
            } else {
                sisaJun = 0
                totSisaJun += 0
            }

            if(dt.n19 < 0 && typeof dt.n19 !== 'undefined') {
                var aggJulPlus = parseInt(dt.n19) * -1
                aggJul = "-"+sepNum(dt.n19)
                totAggJul += aggJulPlus
            } else if(dt.n19 > 0 && typeof dt.n19 !== 'undefined') {
                aggJul = sepNum(dt.n19)
                totAggJul += parseInt(dt.n19)
            } else {
                aggJul = 0
                totAggJul += 0
            }

            if(dt.n20 < 0 && typeof dt.n20 !== 'undefined') {
                var realJulPlus = parseInt(dt.n20) * -1
                realJul = "-"+sepNum(dt.n20)
                totRealJul += realJulPlus
            } else if(dt.n20 > 0 && typeof dt.n20 !== 'undefined') {
                realJul = sepNum(dt.n20)
                totRealJul += parseInt(dt.n20)
            } else {
                realJul = 0
                totRealJul += 0
            }

            if(dt.n21 < 0 && typeof dt.n21 !== 'undefined') {
                var sisaJulPlus = parseInt(dt.n21) * -1
                sisaJul  = "-"+sepNum(dt.n21)
                totSisaJul += sisaJulPlus
            } else if(dt.n21 > 0 && typeof dt.n21 !== 'undefined') {
                sisaJul = sepNum(dt.n21)
                totSisaJul += parseInt(dt.n21)
            } else {
                sisaJul = 0
                totSisaJul += 0
            }

            if(dt.n22 < 0 && typeof dt.n22 !== 'undefined') {
                var aggAgtPlus = parseInt(dt.n22) * -1
                aggAgt = "-"+sepNum(dt.n22)
                totAggAgt += aggAgtPlus
            } else if(dt.n22 > 0 && typeof dt.n22 !== 'undefined') {
                aggAgt = sepNum(dt.n22)
                totAggAgt += parseInt(dt.n22)
            } else {
                aggAgt = 0
                totAggAgt += 0
            }

            if(dt.n23 < 0 && typeof dt.n23 !== 'undefined') {
                var realAgtPlus = parseInt(dt.n23) * -1
                realAgt = "-"+sepNum(dt.n23)
                totRealAgt += realAgtPlus
            } else if(dt.n23 > 0 && typeof dt.n23 !== 'undefined') {
                realAgt = sepNum(dt.n23)
                totRealAgt += parseInt(dt.n23)
            } else {
                realAgt = 0
                totRealAgt += 0
            }

            if(dt.n24 < 0 && typeof dt.n24 !== 'undefined') {
                var sisaAgtPlus = parseInt(dt.n24) * -1
                sisaAgt  = "-"+sepNum(dt.n24)
                totSisaAgt += sisaAgtPlus
            } else if(dt.n24 > 0 && typeof dt.n24 !== 'undefined') {
                sisaAgt = sepNum(dt.n24)
                totSisaAgt += parseInt(dt.n24)
            } else {
                sisaAgt = 0
                totSisaAgt += 0
            }

            if(dt.n25 < 0 && typeof dt.n25 !== 'undefined') {
                var aggSepPlus = parseInt(dt.n25) * -1
                aggSep = "-"+sepNum(dt.n25)
                totAggSep += aggSepPlus
            } else if(dt.n25 > 0 && typeof dt.n25 !== 'undefined') {
                aggSep = sepNum(dt.n25)
                totAggSep += parseInt(dt.n25)
            } else {
                aggSep = 0
                totAggSep += 0
            }

            if(dt.n26 < 0 && typeof dt.n26 !== 'undefined') {
                var realSepPlus = parseInt(dt.n26) * -1
                realSep = "-"+sepNum(dt.n26)
                totRealSep += realSepPlus
            } else if(dt.n26 > 0 && typeof dt.n26 !== 'undefined') {
                realSep = sepNum(dt.n26)
                totRealSep += parseInt(dt.n26)
            } else {
                realSep = 0
                totRealSep += 0
            }

            if(dt.n27 < 0 && typeof dt.n27 !== 'undefined') {
                var sisaSepPlus = parseInt(dt.n27) * -1
                sisaSep  = "-"+sepNum(dt.n27)
                totSisaSep += sisaSepPlus
            } else if(dt.n27 > 0 && typeof dt.n27 !== 'undefined') {
                sisaSep = sepNum(dt.n27)
                totSisaSep += parseInt(dt.n27)
            } else {
                sisaSep = 0
                totSisaSep += 0
            }

            if(dt.n28 < 0 && typeof dt.n28 !== 'undefined') {
                var aggOktPlus = parseInt(dt.n28) * -1
                aggOkt = "-"+sepNum(dt.n28)
                totAggOkt += aggOktPlus
            } else if(dt.n28 > 0 && typeof dt.n28 !== 'undefined') {
                aggOkt = sepNum(dt.n28)
                totAggOkt += parseInt(dt.n28)
            } else {
                aggOkt = 0
                totAggOkt += 0
            }

            if(dt.n29 < 0 && typeof dt.n29 !== 'undefined') {
                var realOktPlus = parseInt(dt.n29) * -1
                realOkt = "-"+sepNum(dt.n29)
                totRealOkt += realOktPlus
            } else if(dt.n29 > 0 && typeof dt.n29 !== 'undefined') {
                realOkt = sepNum(dt.n29)
                totRealOkt += parseInt(dt.n29)
            } else {
                realOkt = 0
                totRealOkt += 0
            }

            if(dt.n30 < 0 && typeof dt.n30 !== 'undefined') {
                var sisaOktPlus = parseInt(dt.n30) * -1
                sisaOkt  = "-"+sepNum(dt.n30)
                totSisaOkt += sisaOktPlus
            } else if(dt.n30 > 0 && typeof dt.n30 !== 'undefined') {
                sisaOkt = sepNum(dt.n30)
                totSisaOkt += parseInt(dt.n30)
            } else {
                sisaOkt = 0
                totSisaOkt += 0
            }

            if(dt.n31 < 0 && typeof dt.n31 !== 'undefined') {
                var aggNovPlus = parseInt(dt.n31) * -1
                aggNov = "-"+sepNum(dt.n31)
                totAggNov += aggNovPlus
            } else if(dt.n31 > 0 && typeof dt.n31 !== 'undefined') {
                aggNov = sepNum(dt.n31)
                totAggNov += parseInt(dt.n31)
            } else {
                aggNov = 0
                totAggNov += 0
            }

            if(dt.n32 < 0 && typeof dt.n32 !== 'undefined') {
                var realNovPlus = parseInt(dt.n32) * -1
                realNov = "-"+sepNum(dt.n32)
                totRealNov += realNovPlus
            } else if(dt.n32 > 0 && typeof dt.n32 !== 'undefined') {
                realNov = sepNum(dt.n32)
                totRealNov += parseInt(dt.n32)
            } else {
                realNov = 0
                totRealNov += 0
            }

            if(dt.n33 < 0 && typeof dt.n33 !== 'undefined') {
                var sisaNovPlus = parseInt(dt.n33) * -1
                sisaNov  = "-"+sepNum(dt.n33)
                totSisaNov += sisaNovPlus
            } else if(dt.n33 > 0 && typeof dt.n33 !== 'undefined') {
                sisaNov = sepNum(dt.n33)
                totSisaNov += parseInt(dt.n33)
            } else {
                sisaNov = 0
                totSisaNov += 0
            }

            if(dt.n34 < 0 && typeof dt.n34 !== 'undefined') {
                var aggDesPlus = parseInt(dt.n34) * -1
                aggDes = "-"+sepNum(dt.n34)
                totAggDes += aggDesPlus
            } else if(dt.n34 > 0 && typeof dt.n34 !== 'undefined') {
                aggDes = sepNum(dt.n34)
                totAggDes += parseInt(dt.n34)
            } else {
                aggDes = 0
                totAggDes += 0
            }

            if(dt.n35 < 0 && typeof dt.n35 !== 'undefined') {
                var realDesPlus = parseInt(dt.n35) * -1
                realDes = "-"+sepNum(dt.n35)
                totRealDes += realDesPlus
            } else if(dt.n35 > 0 && typeof dt.n35 !== 'undefined') {
                realDes = sepNum(dt.n35)
                totRealDes += parseInt(dt.n35)
            } else {
                realDes = 0
                totRealDes += 0
            }

            if(dt.n36 < 0 && typeof dt.n36 !== 'undefined') {
                var sisaDesPlus = parseInt(dt.n36) * -1
                sisaDes  = "-"+sepNum(dt.n36)
                totSisaDes += sisaDesPlus
            } else if(dt.n36 > 0 && typeof dt.n36 !== 'undefined') {
                sisaDes = sepNum(dt.n36)
                totSisaDes += parseInt(dt.n36)
            } else {
                sisaDes = 0
                totSisaDes += 0
            }

            html += "<tr>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+no+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+dt.kode_akun+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+dt.nama_akun+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+dt.kode_pp+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+dt.nama_pp+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggJan+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realJan+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaJan+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggFeb+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realFeb+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaFeb+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggMar+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realMar+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaMar+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggApr+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realApr+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaApr+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggMei+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realMei+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaMei+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggJun+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realJun+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaJun+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggJul+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realJul+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaJul+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggAgt+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realAgt+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaAgt+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggSep+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realSep+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaSep+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggOkt+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realOkt+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaOkt+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggNov+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realNov+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaNov+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+aggDes+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+realDes+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+sisaDes+"</td>"
            html += "</tr>"

            no++
        }
        html += "<tr>"
        html += "<td class='isi-laporan' style='text-align: right;' colspan='5'>Total</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggJan)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealJan)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaJan)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggFeb)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealFeb)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaFeb)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggMar)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealMar)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaMar)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggApr)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealApr)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaApr)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggMei)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealMei)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaMei)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggJun)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealJun)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaJun)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggJul)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealJul)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaJul)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggAgt)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealAgt)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaAgt)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggSep)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealSep)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaSep)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggOkt)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealOkt)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaNov)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggNov)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealNov)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaNov)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totAggDes)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totRealDes)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totSisaDes)+"</td>"

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