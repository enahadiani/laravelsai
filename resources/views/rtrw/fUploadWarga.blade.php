<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="form-tambah">
                            <div class="card-body pb-0">
                                <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Upload Data Warga
                                <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                                </h4>
                                <hr>
                            </div>
                            <div class="card-body pt-0">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">File Upload</label>
                                    <div class="input-group col-6">
                                        <div class="custom-file">
                                            <input type="file" name="file_excel" class="custom-file-input" id="file_excel" accept=".xls, .xlsx">
                                            <label class="custom-file-label" for="file_excel">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-xs-12' style="margin:0px; padding:0px;">
                                <div class="table-responsive">
                                <style>
                                    th{
                                        vertical-align:middle !important;
                                    }
                                    #input-jurnal .selectize-input, #input-jurnal .form-control, #input-jurnal .custom-file-label{
                                        border:0 !important;
                                        border-radius:0 !important;
                                    }
                                    .modal-header .close {
                                        padding: 1rem;
                                        margin: -1rem 0 -1rem auto;
                                    }
                                    .check-item{
                                        cursor:pointer;
                                    }
                                    .selected{
                                        cursor:pointer;
                                        background:#4286f5 !important;
                                        color:white;
                                    }
                                    #input-jurnal td:hover{
                                        background:#f4d180 !important;
                                        color:white;
                                    }
                                    #input-jurnal td{
                                        overflow:hidden !important;
                                    }

                                    #input-jurnal td:nth-child(4){
                                        overflow:unset !important;
                                    }
                                </style>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-warga" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nama Panggilan</th>
                                        <th>Alamat</th>
                                        <th>Nomor HP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_elite/sai.js') }}"></script>
<script src="{{ asset('asset_elite/inputmask.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    $('#file_excel').change(function(evt){
        var selectedFile = evt.target.files[0];
        var reader = new FileReader();
        reader.onload = function(event) {
            var dataResult = [];
            var data = event.target.result;
            var workbook = XLSX.read(data,{
                type:'binary'
            });
            workbook.SheetNames.forEach(function(sheetName) {
                var no = 1;
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                var json_object = JSON.stringify(XL_row_object);
                var json_parse = JSON.parse(json_object)
                $('#input-warga tbody').empty();
                var row = "";
                for(var i=0;i<json_parse.length;i++){
                    var res = json_parse[i];
                    row += "<tr class='row-warga'>";
                    row += "<td class='no-warga text-center'>"+no+"</td>"
                    row += "<td class='nm-warga'>"+res.nama+"<input type='hidden' name='nama[]' value='"+res.nama+"'/></td>"
                    row += "<td class='np-warga'>"+res.nama_panggilan+"<input type='hidden' name='panggilan[]' value='"+res.nama_panggilan+"'/></td>"
                    row += "<td class='al-warga'>"+res.alamat+"<input type='hidden' name='alamat[]' value='"+res.alamat+"'/></td>"
                    row += "<td class='hp-warga'>"+res.no_hp+"<input type='hidden' name='no_hp[]' value='"+res.no_hp+"'/></td>"
                    row += "</tr>";
                    no++;
                }
                $('#input-warga tbody').html(row);

            })
        }

        reader.onerror = function(event) {
            console.log('File could not be read! Code '+ event.target.error.code)
        }

        reader.readAsBinaryString(selectedFile);
    });
</script>