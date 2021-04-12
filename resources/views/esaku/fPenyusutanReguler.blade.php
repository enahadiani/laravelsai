<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<style>
    .form-header {
        padding-top:1rem;
        padding-bottom:1rem;
    }
    .judul-form {
        margin-bottom:0;
        margin-top:5px;   
    }
</style>

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tanggal">Tanggal</label>
                            <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}" required>
                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_dok">No Dokumen</label>
                            <input type="text" placeholder="No Dokumen" class="form-control" id="no_dok" name="no_dok" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="total">Total Penyusutan</label>
                            <input type="text" placeholder="Total Penyusutan" class="form-control currency" id="total" name="total" value="0" readonly required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <button type="button" class="btn btn-primary btn-hitung" id="hitung">Hitung</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-penyusutan" role="tab" aria-selected="true"><span class="hidden-xs-down">Item Jurnal</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                        <div class="tab-pane active" id="data-tagihan" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:35%">Akun Biaya Penyusutan</th>
                                        <th style="width:35%">Akun Depresiasi</th>
                                        <th style="width:15%">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="bottom-sheet-action">
                            <button type="button" id="btn-sheet" class="btn btn-sheet">Detail Penyusutan</button>
                        </div>
                        {{-- <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div> --}}
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('modal_search')

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    // setHeightForm();
    var scrollform = document.querySelector('.form-body');
    new PerfectScrollbar(scrollform);

    $('#judul-form').html('Form Penyusutan Reguler');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () {  }
    });

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    // Bottom sheet
    var bottomSheet = new BottomSheet("country-selector");
    $('#btn-sheet').on('click', function(event){
        event.preventDefault()
        bottomSheet.activate()
        addContentBottomSheet()
    })
    
    function addContentBottomSheet() {
        $('#content-bottom-sheet').empty()
        var html = "";
        html += "<div class='header-sheet'><h6>Detail Penyusutan</h6></div>"

        $('#content-bottom-sheet').append(html)
    }

    function hitungPenyusutan(tanggal) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/hitung-reguler') }}",
            data: { 'tanggal':tanggal},
            dataType: 'json',
            async:false,
            success:function(result){
                var $total = 0;
                var data = result.data.success.data
                if(data.length > 0) {
                    $('#input-grid tbody').empty()
                    var html = "";
                    var no = 1;
                    
                    for(var i=0;i<data.length;i++) {
                        var dt = data[i]
                        html += "<tr>";
                        html += "<td class='no-grid'>"+no+"</td>"
                        html += "<td class='akun-bp'>"+dt.akun_bp+" - "+dt.nama_bp+"</td>"
                        html += "<td class='akun-deprs'>"+dt.akun_deprs+" - "+dt.nama_deprs+"</td>"
                        html += "<td class='nilai-susut'>"+format_number(dt.nilai_susut)+"</td>"
                        html += "<td style='display: none;' class='pp-susut'>"+dt.kode_pp_susut+"</td>"
                        html += "</tr>";
                    }
                    $('#input-grid tbody').append(html)
                    $('#input-grid tbody tr').each(function(index) {
                        var subtotal = toNilai($(this).find('.nilai-susut').text())
                        $total += subtotal
                    })
                    $('#total').val($total)
                } else {
                    alert('Tidak ada aktiva tetap yang disusut di periode ini')
                }
            }
        })
    }

    $('#hitung').on('click', function() {
        var tanggal = $('#tanggal').val()
        hitungPenyusutan(tanggal)
    })

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            no_proyek:{
                required: true   
            },
            nilai_kontrak:{
                required: true   
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            
            var url = "{{ url('esaku-trans/susut-reguler') }}";
            var pesan = "saved";
            var text = "Data tersimpan dengan kode "+id;

            var formData = new FormData(form);
            $('#input-grid tbody tr').each(function(index) {
                var akun_deprs = $(this).find('.akun-deprs').text()
                var split_akunDeprs = akun_deprs.split('-').map(item => item.trim())
                var akun_bp = $(this).find('.akun-bp').text()
                var split_akunBp = akun_bp.split('-').map(item => item.trim())

                formData.append('no[]', $(this).find('.no-grid').text())
                formData.append('akun_deprs[]', split_akunDeprs[0])
                formData.append('akun_bp[]', split_akunBp[0])
                formData.append('nilai[]', $(this).find('.nilai-susut').text())
                formData.append('pp_susut[]', $(this).find('.pp-susut').text())
            })
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST', 
                url: url,
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.success.status){
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#input-grid tbody').empty()
                        $('#method').val('post');
                        resetForm();
                        msgDialog({
                            id:result.data.success.no_bukti,
                            type:'simpan'
                        });
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/java-auth/sesi-habis') }}";
                    }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
            });
            $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

</script>