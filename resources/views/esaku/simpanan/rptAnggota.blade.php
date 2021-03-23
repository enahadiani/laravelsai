<style>
    .info-table thead {
        background: #e9ecef;
    }

    .no-border td {
        border: 0 !important;
    }

    .bold {
        font-weight: bold;
    }

</style>
<script type="text/javascript">
    function drawLap(formData) {
        saiPostLoad('esaku-report/report-anggota', null, formData, null, function(res) {
            const data = res.result;
            // console.log('data', data)
            if (data.length > 0) {
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination', show, res);
            } else {
                $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
            }
        });
    }

    drawLap($formData);

    function drawRptPage(data, res, from, to) {
        var data = data;
        var html = "";
        var no = 1;
        if (data.length > 0) {
            html += "<div align='center'>";
            html += judul_lap("Laporan Anggota", '', '');
            html += "<table class='table table-bordered' width='100%'>";
            html += "<tr>";
            html += "<td align='center' width='5%'>No</td>"
            html += "<td class='text-center;' width='10%'>No Anggota</td>"
            html += "<td class='text-center;' width='10%'>ID Lain</td>"
            html += "<td class='text-center;' width='30%'>Nama</td>"
            html += "<td align='center' width='10%'>Bank</td>"
            html += "<td class='text-center;' width='10%'>Cabang</td>"
            html += "<td class='text-center;' width='15%'>No Rekening</td>"
            html += "<td class='text-center;' width='15%'>Nama Rekening</td>"
            html += "</tr>";
            for (var i = 0; i < data.length; i++) {
                var value = data[i];
                html += "<tr>";
                html += "<td valign='middle' class='isi_laporan' align='center'>" + no + "</td>";
                html += "<td valign='middle' class='isi_laporan' align='left'>" + value.no_agg + "</td>";
                html += "<td valign='middle' class='isi_laporan' align='left'>" + value.id_lain + "</td>";
                html += "<td valign='middle' class='isi_laporan' align='left'>" + value.nama + "</td>";
                html += "<td valign='middle' class='isi_laporan' align='center'>" + value.bank + "</td>";
                html += "<td valign='middle' class='isi_laporan' align='left'>" + value.cabang + "</td>";
                html += "<td valign='middle' class='isi_laporan' align='left'>" + value.no_rek + "</td>";
                html += "<td valign='middle' class='isi_laporan' align='left'>" + value.nama_rek + "</td>";
                html += "</tr>";
                no++;
            }
            html += "</table>";
            html += "</div>";
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }

</script>
