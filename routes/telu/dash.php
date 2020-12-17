<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
Route::get('/rka-persen','DashTelu\DashboardController@getBCRKAPersen');
Route::get('/growth-rka','DashTelu\DashboardController@getBCGrowthRKA');
Route::get('/tuition','DashTelu\DashboardController@getBCTuition');
Route::get('/tuition-persen','DashTelu\DashboardController@getBCTuitionPersen');
Route::get('/growth-tuition','DashTelu\DashboardController@getBCGrowthTuition');

Route::get('/komponen-investasi','DashTelu\DashboardController@komponenInvestasi');
Route::get('/rka-real-investasi','DashTelu\DashboardController@rkaVSRealInvestasi');
Route::get('/penyerapan-investasi','DashTelu\DashboardController@penyerapanInvestasi');


Route::get('/profile', 'DashTelu\AuthController@getProfile');
Route::post('/update-password', 'DashTelu\AuthController@updatePassword');
Route::post('/update-foto', 'DashTelu\AuthController@updatePhoto');
Route::post('/update-background', 'DashTelu\AuthController@updateBackground');

Route::get('notif','DashTelu\NotifController@getNotif');
Route::post('notif-update-status','DashTelu\NotifController@updateStatusRead');
Route::post('search-form','DashTelu\AuthController@searchForm');
Route::get('search-form-list','DashTelu\AuthController@searchFormList');
Route::get('search-form-list2','DashTelu\AuthController@searchFormList2');
Route::get('periode','DashTelu\DashboardController@getPeriode');


Route::get('watch/{id}', function ($id) {
    $data['id'] = $id;
    return view('dash-telu.watch',$data);
});


//Management System
Route::get('/profit-loss','DashTelu\DashboardController@profitLoss');
Route::get('/fx-position','DashTelu\DashboardController@fxPosition');
Route::get('/penyerapan-beban','DashTelu\DashboardController@penyerapanBeban');
Route::get('/debt','DashTelu\DashboardController@debt');
Route::get('/kelola-keuangan','DashTelu\DashboardController@kelolaKeuangan');
Route::get('/penjualan-pin','DashTelu\DashboardController@penjualanPin');

Route::get('/ms-pendapatan','DashTelu\DashboardController@msPendapatan');
Route::get('/ms-pendapatan-klp','DashTelu\DashboardController@msPendapatanKlp');

Route::get('/ms-beban','DashTelu\DashboardController@msBeban');
Route::get('/ms-beban-klp','DashTelu\DashboardController@msBebanKlp');

Route::get('/ms-pengembangan-rka','DashTelu\DashboardController@msPengembanganRKA');
Route::get('/ms-pengembangan-komposisi','DashTelu\DashboardController@msPengembanganKomposisi');

Route::get('/laba-rugi-5tahun','DashTelu\DashboardController@getLabaRugi5Tahun');
Route::get('/pend-5tahun','DashTelu\DashboardController@getPend5Tahun');
Route::get('/pend-5tahun-tf','DashTelu\DashboardController@getPend5TahunTF');
Route::get('/pend-5tahun-ntf','DashTelu\DashboardController@getPend5TahunNTF');
Route::get('/pend-5tahun-komposisi','DashTelu\DashboardController@getPend5TahunKomposisi');
Route::get('/pend-5tahun-growth','DashTelu\DashboardController@getPend5TahunGrowth');

Route::get('/beban-5tahun','DashTelu\DashboardController@getBeban5Tahun');
Route::get('/beban-5tahun-sdm','DashTelu\DashboardController@getBeban5TahunSDM');
Route::get('/beban-5tahun-komposisi','DashTelu\DashboardController@getBeban5TahunKomposisi');
Route::get('/beban-5tahun-growth','DashTelu\DashboardController@getBeban5TahunGrowth');

Route::get('/shu-5tahun','DashTelu\DashboardController@getSHU5Tahun');

?>