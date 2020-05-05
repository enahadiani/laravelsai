<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        return redirect('telu/login')->with('alert','Session telah habis !');
    }else{
        return view('telu.'.$id);
    }
});

Route::get('/', 'Telu\AuthController@index');
Route::get('/login', 'Telu\AuthController@login');
Route::post('/login', 'Telu\AuthController@cek_auth');
Route::get('/logout', 'Telu\AuthController@logout');
Route::get('/menu', 'Telu\AuthController@getMenu');

//Dashboard
//Home
Route::get('/getPencapaianYoY/{periode}','Telu\DashboardController@getPencapaianYoY');
Route::get('/getRkaVsReal/{periode}','Telu\DashboardController@getRkaVsReal');
Route::get('/getGrowthRka/{periode}','Telu\DashboardController@getGrowthRka');
Route::get('/getGrowthReal/{periode}','Telu\DashboardController@getGrowthReal');
//Pendapatan
Route::get('/getKomposisiPendapatan/{periode}','Telu\DashboardController@getKomposisiPendapatan');
Route::get('/getOprNonOpr/{periode}','Telu\DashboardController@getOprNonOpr');
Route::get('/getPresentaseRkaRealisasi/{periode}','Telu\DashboardController@getPresentaseRkaRealisasi');
//Detail Pendapatan 1
Route::get('/getPendapatanFak/{periode}/{kodeNeraca}','Telu\DashboardController@getPendapatanFak');
Route::get('/getDetailPendapatan/{periode}/{kodeNeraca}','Telu\DashboardController@getDetailPendapatan');
//Detail Pendapatan 2
Route::get('/getPendapatanJurusan/{periode}/{kodeNeraca}/{kodeBidang}','Telu\DashboardController@getPendapatanJurusan');
Route::get('/getDataPendJurusan/{periode}/{kodeNeraca}/{kodeBidang}/{tahun}','Telu\DashboardController@getDataPendJurusan');

?>