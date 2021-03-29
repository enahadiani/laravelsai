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
        var html = `<style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
                }
                table th.no-border{
                    border:0 !important;
                }
                .table-header-prev td{
                    padding: 2px !important;
                }
                .table-kop-prev td{
                    padding: 0px !important;
                }
                .separator2{
                    height:1rem;
                    background:#f8f8f8;
                    box-shadow: -1px 0px 1px 0px #e1e1e1;
                }
                .vtop{
                    vertical-align:top !important;
                }
                .lh1{
                    line-height:1;
                }
                .bg-highlight{
                    background: #eaf2ff !important;
                }
                .bg-white{
                    background: white !important;
                }
            </style>`;
        var no = 1;
        if (data.length > 0) {
            html += "<div align='center'>";
            html += judul_lap("Laporan Anggota", '', '');
            html += "<table class='table table-bordered' width='100%'>";
            html += "<tr>";
            html += "<td align='center' width='5%' class='bg-primary'>No</td>"
            html += "<td class='text-center bg-primary' width='10%'>No Anggota</td>"
            html += "<td class='text-center bg-primary' width='10%'>ID Lain</td>"
            html += "<td class='text-center bg-primary' width='30%'>Nama</td>"
            html += "<td align='center' width='10%' class='bg-primary'>Bank</td>"
            html += "<td class='text-center bg-primary' width='10%'>Cabang</td>"
            html += "<td class='text-center bg-primary' width='15%'>No Rekening</td>"
            html += "<td class='text-center bg-primary' width='15%'>Nama Rekening</td>"
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
