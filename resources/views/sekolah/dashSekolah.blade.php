<style>
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .btn-outline-light {
        color: #131113;
        background-color: white;
        border-color: white !important;
        box-shadow: 2px 1px 2px 1px #e8e8e8 !important;
    }
</style>
<div class="row">
    <div class="col-12">
        <h2 style="position:absolute">Dashboard</h2>
        <a class="btn btn-outline-light float-right mb-2" href="#" id="btn-filter" style="border:1px solid black;font-size:1rem"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
        <!-- <div class="separator mb-5"></div> -->
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 col-xl-8 col-left">
        <div class="card mb-4">
            <div class="card-body">
                <h5 style="font-weight:bold;">Overview Nilai Rata-rata</h5>
                <div class="chart-nilai">
                </div>
            </div>
        </div>
        <div class="card bg-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p class="mb-1">Murid</p>
                        <h2 class="mb-0" style="font-weight:bold">912</h2>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1">Siswa tidak mendapat nilai</p>
                        <h2 class="mb-0" style="font-weight:bold">0</h2>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1">Pelaksanaan tidak lengkat</p>
                        <h2 class="mb-0" style="font-weight:bold">0</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-xl-4 col-right">
        <div class="card">
            <div class="card-body">
                <h5 style="font-weight:bold;position:absolute">Pesan</h5>
                <a href="#"><i class="simple-icon-plus text-primary float-right mb-3" style="font-size:20px"></i></a>
                <input class="form-control" type="text" placeholder="Cari siswa atau kelas" >    
            </div>
            <div class="card-body pt-0">
                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                    <a href="#">
                    <img src="{{ asset('asset_elite/images/user.png') }}" alt="Mayra Sibley" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall">
                    </a>
                    <div class="pl-3 flex-grow-1">
                        <a href="#">
                        <p class="font-weight-medium mb-0 ">Mayra Sibley</p>
                        <p class="text-muted mb-0 text-small">01/01/2020 13:52:00</p>
                        </a>
                        <p class="mt-3">
                        Taking seamless key performance indicators
                        offline to maximise the long tail.
                        </p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                    <a href="#">
                    <img src="{{ asset('asset_elite/images/user.png') }}" alt="Mayra Sibley" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall">
                    </a>
                    <div class="pl-3 flex-grow-1">
                        <a href="#">
                        <p class="font-weight-medium mb-0 ">Mimi Carreira</p>
                        <p class="text-muted mb-0 text-small">01/01/2020 13:52:00</p>
                        </a>
                        <p class="mt-3">
                        Taking seamless key performance indicators
                        offline to maximise the long tail.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>  
       
</div>