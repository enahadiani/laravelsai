<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        // return redirect('dash-telu/login');
        return view('dash-telu.sesi');
    }else{
        return view('dash-telu.'.$id);
    }
});

Route::get('/sesi-habis', function () {
    return view('dash-telu.sesi');
});


Route::get('/cek_session', 'DashTelu\AuthController@cek_session');
Route::get('/', 'DashTelu\AuthController@index');
Route::get('/login', 'DashTelu\AuthController@login');
Route::post('/login', 'DashTelu\AuthController@cek_auth');
Route::get('/logout', 'DashTelu\AuthController@logout');
Route::get('/menu', 'DashTelu\AuthController@getMenu');

//Dashboard
//Home
Route::get('/getPencapaianYoY/{periode}','DashTelu\DashboardController@getPencapaianYoY');
Route::get('/getRkaVsReal/{periode}','DashTelu\DashboardController@getRkaVsReal');
Route::get('/getGrowthRka/{periode}','DashTelu\DashboardController@getGrowthRka');
Route::get('/getGrowthReal/{periode}','DashTelu\DashboardController@getGrowthReal');
//Pendapatan
Route::get('/getKomposisiPendapatan/{periode}','DashTelu\DashboardController@getKomposisiPendapatan');
Route::get('/getOprNonOprPendapatan/{periode}','DashTelu\DashboardController@getOprNonOprPendapatan');
Route::get('/getPresentaseRkaRealisasiPendapatan/{periode}','DashTelu\DashboardController@getPresentaseRkaRealisasiPendapatan');
//Detail Pendapatan 1
Route::get('/getPendapatanFak/{periode}/{kodeNeraca}','DashTelu\DashboardController@getPendapatanFak');
Route::get('/getDetailPendapatan/{periode}/{kodeNeraca}','DashTelu\DashboardController@getDetailPendapatan');
//Detail Pendapatan 2
Route::get('/getPendapatanJurusan/{periode}/{kodeNeraca}/{kodeBidang}','DashTelu\DashboardController@getPendapatanJurusan');
Route::get('/getDataPendJurusan/{periode}/{kodeNeraca}/{kodeBidang}/{tahun}','DashTelu\DashboardController@getDataPendJurusan');
//Beban
Route::get('/getKomposisiBeban/{periode}','DashTelu\DashboardController@getKomposisiBeban');
Route::get('/getOprNonOprBeban/{periode}','DashTelu\DashboardController@getOprNonOprBeban');
Route::get('/getPresentaseRkaRealisasiBeban/{periode}','DashTelu\DashboardController@getPresentaseRkaRealisasiBeban');
//Detail Beban 1
Route::get('/getBebanFak/{periode}/{kodeNeraca}','DashTelu\DashboardController@getBebanFak');
Route::get('/getDetailBeban/{periode}/{kodeNeraca}','DashTelu\DashboardController@getDetailBeban');
//Detail Pendapatan 2
Route::get('/getBebanJurusan/{periode}/{kodeNeraca}/{kodeBidang}','DashTelu\DashboardController@getBebanJurusan');
Route::get('/getDataBebanJurusan/{periode}/{kodeNeraca}/{kodeBidang}/{tahun}','DashTelu\DashboardController@getDataBebanJurusan');


//BudgetComitee
Route::get('/rka','DashTelu\DashboardController@getBCRKA');
Route::get('/growth-rka','DashTelu\DashboardController@getBCGrowthRKA');
Route::get('/tuition','DashTelu\DashboardController@getBCTuition');
Route::get('/growth-tuition','DashTelu\DashboardController@getBCGrowthTuition');


Route::get('/profile', 'DashTelu\AuthController@getProfile');
Route::post('/update-password', 'DashTelu\AuthController@updatePassword');
Route::post('/update-foto', 'DashTelu\AuthController@updatePhoto');

Route::get('notif','DashTelu\NotifController@getNotif');
Route::post('notif-update-status','DashTelu\NotifController@updateStatusRead');
Route::post('search-form','DashTelu\AuthController@searchForm');


?>