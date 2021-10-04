<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/fp.dekstop.css') }}" />

{{-- DESKTOP --}}

<section id="header" class="header">
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-1">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div class="col-11 pl-0">
                    <h2 class="title-dash">Financial Performance YPT</h2>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="select-custom row">
                <div class="col-2">
                    <div class="glyph-icon simple-icon-calendar select"></div>
                </div>
                <div class="col-8">
                    <p id="select-text" class="select-text">TRIWULAN I || 2021</p>
                </div>
                <div class="col-2">
                    <div class="glyph-icon iconsminds-arrow-down select"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="main-dash" class="mt-24">
    <div id="dekstop-1" class="desktop-1 col-dekstop">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dash">
                            <span class="header-card">Pendapatan</span>
                        </div>
                    </div>
                    <div class="col-12 mt-16">
                        <div class="card card-dash">
                            <span class="header-card">Beban</span>
                        </div>
                    </div>
                    <div class="col-12 mt-16">
                        <div class="card card-dash">
                            <span class="header-card">SHU</span>
                        </div>
                    </div>
                    <div class="col-12 mt-16">
                        <div class="card card-dash">
                            <span class="header-card">OR</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-8">
                        <div class="card card-dash">
                            <span class="header-card">Laba Rugi Lembaga</span>
                        </div>
                    </div>
                    <div class="col-4 px-0">
                         <div class="card card-dash">
                            <span class="header-card">Catatan</span>
                            <div id="catatan-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in mollis lorem. 
                                Sed cursus luctus pharetra. Suspendisse potenti. Praesent nisi neque, 
                                aliquam non justo nec, iaculis mollis tellus. Praesent ornare ex vel aliquet luctus. 
                                Morbi venenatis metus vel lacus bibendum, non fringilla urna auctor. 
                                Nullam eu nibh congue, commodo elit a, convallis erat. Integer scelerisque luctus ex nec 
                                luctus. Proin congue turpis a odio lobortis varius. Duis semper, 
                                odio in porttitor placerat, dui elit laoreet elit, ut tincidunt leo velit quis leo.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-16">
                        <div class="card card-dash">
                            <span class="header-card">Performasi Lembaga</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END DESKTOP --}}

<script type="text/javascript">
$('#back').click(function() {
    $('#app-container').removeClass('main-hidden sub-hidden');
})
</script>