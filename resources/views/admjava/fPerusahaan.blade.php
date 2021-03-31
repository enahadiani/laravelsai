<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />
<link rel="stylesheet" href="{{ asset('asset_adm/java/styles.css') }}" />

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input type="hidden" id="method" name="_method" value="post">
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                    <h6 id="judul-form" style="position:absolute;top:25px">Profil Perusahaan</h6>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="select-from-library-container mb-1">
                                <label for="gambar">Logo Perusahaan</label>
                                <div class="border-image-upload logo-perusahaan">
                                    <span class="photo-text">Click to upload</span>
                                    <img alt="photo" class="preview-photo" height="240" width="300">
                                    <input type="hidden" class="nama-gambar" name="nama_gambar" value="-">
                                    <input type="file" class="upload-photo" name="gambar">
                                </div>
                            </div>
                            <br />
                            <label for="koordinat">Koordinat</label>
                            <input class="form-control" type="text" placeholder="Koordinat" id="koordinat" name="koordinat">
                        </div>
                        <div class="form-group col-md-8 col-sm-12">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input class="form-control" type="text" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan">
                            <br />
                            <div class="row">
                                 <div class="form-group col-md-6 col-sm-12">
                                    <label for="no_telp">No. Telepon</label>
                                    <input class="form-control" type="text" placeholder="Nomor Telepon" id="no_telp" name="no_telp">
                                 </div>
                                 <div class="form-group col-md-6 col-sm-12">
                                    <label for="no_fax">No. Fax</label>
                                    <input class="form-control" type="text" placeholder="Nomor Fax" id="no_fax" name="no_fax">
                                 </div>
                            </div>
                            <div class="row">
                                 <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="text" placeholder="Email" id="email" name="email">
                                 </div>
                                 <div class="form-group col-md-6 col-sm-12">
                                    <label for="wa">Link Whatsapp</label>
                                    <input class="form-control" type="text" placeholder="Link Whatsapp" id="wa" name="wa">
                                 </div>
                            </div>
                            <label for="alamat">Alamat Perusahaan</label>
                            <textarea class="form-control" rows="4" id="alamat" name="alamat"></textarea>
                            <br/>
                            <label for="deskripsi">Deskripsi Perusahaan</label>
                            <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi"></textarea>
                            <br />
                            <label for="visi">Visi Perusahaan</label>
                            <textarea class="form-control" rows="4" id="visi" name="visi"></textarea>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-misi" role="tab" aria-selected="true"><span class="hidden-xs-down">Misi Perusahaan</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-misi" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="misi" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th>Misi</th>
                                            <th width="5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <a type="button" href="#" id="add-row-dok" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div>
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    $('.preview-photo').hide()
    var valid = true;
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // Misi grid
     function hideUnselectedRow() {
        $('#misi > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var misi = $('#misi > tbody > tr:eq('+index+') > td').find(".inp-misi").val();

                $('#misi > tbody > tr:eq('+index+') > td').find(".inp-misi").val(misi);
                $('#misi > tbody > tr:eq('+index+') > td').find(".td-misi").text(misi);

                $('#misi > tbody > tr:eq('+index+') > td').find(".inp-misi").hide();
                $('#misi > tbody > tr:eq('+index+') > td').find(".td-misi").show();
            }
        })
    }

    function hitungTotalRow(form){
        var total_row = $('#misi tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function addRow(param){ 
        var no=$('#misi .row-grid:last').index();
        no=no+2;
        var input = "";

        input += "<tr class='row-grid'>";
        input += "<td class='text-center no-grid'>"+no+"</td>";
        input += "<td><span class='td-misi tdmisike"+no+" tooltip-span'></span><input type='text' name='misi[]' class='form-control inp-misi misike"+no+" hidden'  value='' required></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#misi tbody').append(input);

        hideUnselectedRow();
        
        $('#misi td').removeClass('px-0 py-0 aktif');
        $('#misi tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#misi tbody tr:last').find(".inp-misi").show();
        $('#misi tbody tr:last').find(".td-misi").hide();
        $('#misi tbody tr:last').find(".inp-misi").focus();
        
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        hitungTotalRow();
    }

    $('#misi tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#misi tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#form-tambah').on('click', '.add-row', function(){
        addRow();
    });

    $('#misi').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-grid').each(function(){
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $(document).keydown(function(event){
        var code = (event.keyCode ? event.keyCode : event.which);
        if(event.ctrlKey && code == 13 ||event.ctrlKey && code == 9) {
            var cek = $('#misi tbody tr').length;
            console.log(cek)
            if(cek > 0){
                var cek = $('#misi').find('tr').last();
                var focus = cek.find('.td-misi')
                focus.click();
            }else{
                $('.add-row').click();
            }
        }
    });

    $('#misi').on('click', 'td', function(){
        var idx = $(this).index();
        var cell = $(this).closest('tr').index() + 1;
        if(idx == 0 || idx == 2){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#misi td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
                
                var misi = $(this).parents("tr").find(".inp-misi").val();
                var no = $(this).parents("tr").find(".no-grid").text();
                $(this).parents("tr").find(".inp-misi").val(misi);
                $(this).parents("tr").find(".td-misi").text(misi);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-misi").show();
                    $(this).parents("tr").find(".td-misi").hide();
                    $(this).parents("tr").find(".inp-misi").focus();
                }else{
                    $(this).parents("tr").find(".inp-misi").hide();
                    $(this).parents("tr").find(".td-misi").show();   
                }
            }
        }
    });

    var $twicePress = 0;
    $('#misi').on('keydown','.inp-misi',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-misi'];
        var nxt2 = ['.td-misi'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    if($.trim($(this).val()).length){
                        console.log(nxt[idx])
                        console.log(nxt2[idx])
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        if(code == 13 || code == 9) {
                            if($twicePress == 1) {
                                $(this).closest('tr').find(nxt[idx]).val(isi);
                                $(this).closest('tr').find(nxt2[idx]).text(isi);
                                $(this).closest('tr').find(nxt[idx]).hide();
                                $(this).closest('tr').find(nxt2[idx]).show();
                                var cek = $(this).parents('tr').next('tr').find('.td-misi');
                                if(cek.length > 0){
                                    cek.click();
                                }else{
                                    $('.add-row').click();
                                }
                            }
                            $twicePress = 1
                            setTimeout(() => $twicePress = 0, 1000)
                        }
                    }else{
                        alert('Misi yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                default:
                break;   
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });
    // Misi grid
</script>