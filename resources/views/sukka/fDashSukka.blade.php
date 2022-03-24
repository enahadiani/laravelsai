<link rel="stylesheet" href="{{ asset('trans-new.css?version=_') . time() }}" /> 
<link rel="stylesheet" href="{{ asset('dash-sukka.css?version=_') . time() }}" />
<div class="row dash-box mb-3">
    <div class="col-md-8 col-sm-12 col-grid pr-2">
        <div class="row">
            <div class="col-12 col-grid">
                <div class="card">
                    <h6>Posisi Justifikasi Kebutuhan</h6>
                    <div class="row data-box">
                        <div class="col-md-3 col-sm-12 effect-hover" data-key="fJuskeb">
                            <h6 class="sub-card-title text-center">Return</h6>
                            <p class="sub-card-value text-center" id="jk-jum-return">0</p>
                        </div>
                        <div class="col-md-3 col-sm-12 effect-hover" data-key="fJuskeb">
                            <h6 class="sub-card-title text-center">Sedang Proses</h6>
                            <p class="sub-card-value text-center" id="jk-jum-sedang">0</p>
                        </div>
                        <div class="col-md-3 col-sm-12 effect-hover" data-key="fAppJuskeb">
                            <h6 class="sub-card-title text-center">Perlu Proses</h6>
                            <p class="sub-card-value text-center" id="jk-jum-perlu">0</p>
                        </div>
                        <div class="col-md-3 col-sm-12 effect-hover" data-key="fJuskeb">
                            <h6 class="sub-card-title text-center">Selesai</h6>
                            <p class="sub-card-value text-center" id="jk-jum-selesai">0</p>
                        </div>
                    </div>
                    <h6>Posisi RRA</h6>
                    <div class="row data-box">
                        <div class="col-md-3 col-sm-12 effect-hover" data-key="fAjuRRA">
                            <h6 class="sub-card-title text-center">Return</h6>
                            <p class="sub-card-value text-center" id="rra-jum-return">0</p>
                        </div>
                        <div class="col-md-3 col-sm-12 effect-hover" data-key="fAjuRRA">
                            <h6 class="sub-card-title text-center">Sedang Proses</h6>
                            <p class="sub-card-value text-center" id="rra-jum-sedang">0</p>
                        </div>
                        <div class="col-md-3 col-sm-12 effect-hover" data-key="fAppRRA">
                            <h6 class="sub-card-title text-center">Perlu Proses</h6>
                            <p class="sub-card-value text-center" id="rra-jum-perlu">0</p>
                        </div>
                        <div class="col-md-3 col-sm-12 effect-hover" data-key="fAjuRRA">
                            <h6 class="sub-card-title text-center">Selesai</h6>
                            <p class="sub-card-value text-center" id="rra-jum-selesai">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-grid pl-2">
        <div class="card h-full p-0">
            <h6 class="with-padding">Daftar Perbaikan</h6>
            <div class="body-card pr-3" id="monitoring">
                
            </div>
            <div class="footer-card">
                <a href="" class="load-all">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
<div class="row dash-datatable mb-3">
    <div class="col-12">
        <x-list-data 
        judul="Data Justifikasi Kebutuhan" 
        tambah="" 
        :thead="array('No Request', 'Tanggal', 'Jenis', 'Kegiatan', 'Nilai', 'Posisi')" 
        :thwidth="array(15, 10, 10, 35, 15, 15)" 
        :thclass="array('', '', '', '', '', 'text-center')" />
    </div>
</div>


<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('helper.js') }}"></script>
<script>
    
setHeightForm();
var scrollCard = document.querySelector('#monitoring');
new PerfectScrollbar(scrollCard, {
    suppressScrollX: true
});

function getDataBox() {
    $.ajax({
        type: "GET",
        url: "{{ url('sukka-dash/dash-databox') }}",
        dataType: 'json',
        async:false,
        success: function(result) { 
            if(result.status) {
                $('#jk-jum-return').text(number_format(result.data.jk.return))
                $('#jk-jum-sedang').text(number_format(result.data.jk.sedang))
                $('#jk-jum-perlu').text(number_format(result.data.jk.perlu))
                $('#jk-jum-selesai').text(number_format(result.data.jk.selesai))
                $('#rra-jum-return').text(number_format(result.data.jp.return))
                $('#rra-jum-sedang').text(number_format(result.data.jp.sedang))
                $('#rra-jum-perlu').text(number_format(result.data.jp.perlu))
                $('#rra-jum-selesai').text(number_format(result.data.jp.selesai))
            }
        }
    });
}

function getPerbaikan() {
    $.ajax({
        type: "GET",
        url: "{{ url('sukka-dash/dash-return') }}",
        dataType: 'json',
        async:false,
        success: function(result) { 
            $('#monitoring').html('');
            if(result.status) {
                if(result.data.length > 0){
                    var html = "";
                    for(var i=0;i < result.data.length;i++){
                        var line = result.data[i];
                        html +=`<div class="row with-padding-no-top with-h">
                            <div class="col-2">
                                <div class="avatar">
                                    <img alt="avatar" src="{{ asset('img/avatar5.png') }}">
                                </div>
                            </div>
                            <div class="col-10">
                                <p class="key-card">`+line.no_pesan+`</p>
                                <p class="value-card">Return Approval</p>
                                <div class="content-card">
                                    Catatan: `+line.keterangan+`
                                </div>
                            </div>
                            <hr class="line-v" />
                        </div>`;
                    }
                    
                    $('#monitoring').html(html);
                }
            }
        }
    });
}

getDataBox();
getPerbaikan();

var bottomSheet = new BottomSheet("country-selector");
document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
window.bottomSheet = bottomSheet;
$('#saku-datatable').on('click', '#btn-view', function(e) {
    e.preventDefault();
    var html = ""
    var id = $(this).closest('tr').find('td').eq(0).html();
    $.ajax({
        type: 'GET',
        url: "{{ url('/rkap-trans/ajudam') }}/"+id,
        dataType: 'json',
        async:false,
        success:function(res){
            var result= res.data;
            if(result.status){
                var html = `<div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
                        <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
                        <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">`+id+`</span> 
                    </div>
                    <div class='separator'></div>
                    <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) ;position:sticky'>
                        <div style="">
                            <table class="borderless table-header-prev mt-2" width="100%">
                                <tr>
                                    <td width="14%">No Bukti</td>
                                    <td width="1%">:</td>
                                    <td width="20%">`+result.data[0].no_bukti+`</td>
                                    <td width="30%" rowspan="3"></td>
                                    <td width="10%" rowspan="3" style="vertical-align:top !important"></td>
                                    <td width="1%" rowspan="3" style="vertical-align:top !important"></td>
                                    <td width="24%" rowspan="3" style="vertical-align:top !important"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Keterangan</td>
                                    <td width="1%">:</td>
                                    <td width="20%">`+result.data[0].keterangan+`</td>
                                </tr>
                                <tr>
                                    <td width="14%">Komentar</td>
                                    <td width="1%">:</td>
                                    <td width="20%">`+result.data[0].komentar+`</td>
                                </tr>
                            </table>
                        </div>
                        <div style="">
                            <table class="table table-striped table-body-prev mt-2" width="100%">
                            <tr style="background: var(--theme-color-1) !important;color:white !important">
                                    <th style="width:15%">Nama DAM</th>
                                    <th style="width:20%">SI</th>
                            </tr>`;
                                var det = '';
                                if(result.data_detail.length > 0){
                                    var no=1;
                                    for(var i=0;i<result.data_detail.length;i++){
                                        var line =result.data_detail[i];
                                        det += "<tr>";
                                        det += "<td >"+line.nama_dam+"</td>";
                                        det += "<td >"+line.dam+"</td>";
                                        det += "</tr>";
                                        no++;
                                    }
                                }
                            html+=det+`
                            </table>
                        </div>
                    </div>`;
                    
                    
                    $('.c-bottom-sheet__sheet').css({ "width":"70%","margin-left": "15%", "margin-right":"15%"});
                    $('#content-bottom-sheet').empty();
                    $('#content-bottom-sheet').html(html);
                    $('#trigger-bottom-sheet').trigger("click");
                    
                    var scroll = document.querySelector('.preview-body');
                    var psscroll = new PerfectScrollbar(scroll);

            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
            }
        }
    });
})

var actionHtmlWithED = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Batal'  id='btn-delete'><i class='fa fa-times' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='iconsminds-clock-back' style='font-size:18px'></i></a>";
var actionHtmlNoED = "<a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='iconsminds-clock-back' style='font-size:18px'></i></a>";
var dataTable = generateTable(
    "table-data",
    "{{ url('sukka-dash/dash-datatable') }}", 
    [
        {
            "targets": 0,
            "createdCell": function (td, cellData, rowData, row, col) {
                if ( rowData.status == "baru" ) {
                    $(td).parents('tr').addClass('selected');
                    $(td).addClass('last-add');
                }
            }
        },
        {  
            'targets': 4, 
            'className': 'text-right',
            'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
        },
    ],
    [
        { data: 'no_bukti' },
        { data: 'tgl' },
        { data: 'jenis' },
        { data: 'keterangan' },
        { data: 'nilai' },
        { data: 'posisi' },
    ],
    "{{ url('sukka-auth/sesi-habis') }}",
    [[0 ,"desc"]]
);

$.fn.DataTable.ext.pager.numbers_length = 5;

$("#searchData").on("keyup", function (event) {
    dataTable.search($(this).val()).draw();
});

$("#page-count").on("change", function (event) {
    var selText = $(this).val();
    dataTable.page.len(parseInt(selText)).draw();
});

$('#saku-datatable').on('click','#btn-history',function(e) {
    e.preventDefault();
    var id = $(this).closest('tr').find('td').eq(0).html();
    historyPreview(id,'.dash-box','.dash-datatable');
});

$('.data-box').on('click','.effect-hover',function(e){
    e.preventDefault();
    var key = $(this).data('key');
    $('.navbar-top a').removeClass('active');
    var url = "{{ url('sukka-auth/form')}}/"+key;
    $('a[data-href="'+key+'"]').addClass('active');
    loadForm(url);
});

</script>