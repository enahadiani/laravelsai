<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/form/{id}', function ($id) {
    if(!Session::has('isLoggedIn')){
        return redirect('tarbak/login')->with('alert','Session telah habis !');
    }else{
        return view('tarbak.'.$id);
    }
});

Route::get('/', 'Tarbak\AuthController@index');
Route::get('/login', 'Tarbak\AuthController@login');
Route::post('/login', 'Tarbak\AuthController@cek_auth');
Route::get('/logout', 'Tarbak\AuthController@logout');
Route::get('/menu', 'Tarbak\AuthController@getMenu');

Route::get('/getPP', 'Tarbak\PPController@getPP');
Route::get('/getTingkatan', 'Tarbak\TingkatanController@getTingkatan');

Route::get('/getAngkatan', 'Tarbak\AngkatanController@index');
Route::get('/getAngkatan/{kode_akt1}/{kode_akt2}/{kode_pp}', 'Tarbak\AngkatanController@getAngkatan');
Route::post('/postAngkatan', 'Tarbak\AngkatanController@save');
Route::put('/postAngkatan/{kode_akt1}/{kode_akt2}', 'Tarbak\AngkatanController@update');
Route::delete('/deleteAngkatan/{kode_akt1}/{kode_akt2}/{kode_pp}', 'Tarbak\AngkatanController@delete');

Route::get('/getTahunAjaran', 'Tarbak\TahunAjaranController@index');
Route::get('/getTahunAjaran/{kode_ta1}/{kode_ta2}/{kode_pp}', 'Tarbak\TahunAjaranController@getTahunAjaran');
Route::post('/postTahunAjaran', 'Tarbak\TahunAjaranController@save');
Route::put('/postTahunAjaran/{kode_ta1}/{kode_ta2}', 'Tarbak\TahunAjaranController@update');
Route::delete('/deleteTahunAjaran/{kode_ta1}/{kode_ta2}/{kode_pp}', 'Tarbak\TahunAjaranController@delete');

Route::get('/getJurusan', 'Tarbak\JurusanController@index');
Route::get('/getJurusan/{kode_jur}/{kode_pp}', 'Tarbak\JurusanController@getJurusan');
Route::post('/postJurusan', 'Tarbak\JurusanController@save');
Route::put('/postJurusan/{kode_jur}', 'Tarbak\JurusanController@update');
Route::delete('/deleteJurusan/{kode_jur}/{kode_pp}', 'Tarbak\JurusanController@delete');

Route::get('/getKelas', 'Tarbak\KelasController@index');
Route::get('/getKelas/{kode_jur}/{kode_pp}', 'Tarbak\KelasController@getKelas');
Route::post('/postKelas', 'Tarbak\KelasController@save');
Route::put('/postKelas/{kode_jur}', 'Tarbak\KelasController@update');
Route::delete('/deleteKelas/{kode_jur}/{kode_pp}', 'Tarbak\KelasController@delete');

Route::get('/getStatusSiswa', 'Tarbak\StatusSiswaController@index');
Route::get('/getStatusSiswa/{kode_ss}/{kode_pp}', 'Tarbak\StatusSiswaController@getStatusSiswa');
Route::post('/postStatusSiswa', 'Tarbak\StatusSiswaController@save');
Route::put('/postStatusSiswa/{kode_ss}', 'Tarbak\StatusSiswaController@update');
Route::delete('/deleteStatusSiswa/{kode_ss}/{kode_pp}', 'Tarbak\StatusSiswaController@delete');

Route::get('/getSlot', 'Tarbak\SlotController@index');
Route::get('/getSlot/{kode_slot}/{kode_pp}', 'Tarbak\SlotController@getSlot');
Route::post('/postSlot', 'Tarbak\SlotController@save');
Route::put('/postSlot/{kode_slot}', 'Tarbak\SlotController@update');
Route::delete('/deleteSlot/{kode_slot}/{kode_pp}', 'Tarbak\SlotController@delete');

Route::get('/getJenisPenilaian', 'Tarbak\JenisPenilaianController@index');
Route::get('/getJenisPenilaian/{kode_jenis}/{kode_pp}', 'Tarbak\JenisPenilaianController@getJenisPenilaian');
Route::post('/postJenisPenilaian', 'Tarbak\JenisPenilaianController@save');
Route::put('/postJenisPenilaian/{kode_jenis}', 'Tarbak\JenisPenilaianController@update');
Route::delete('/deleteJenisPenilaian/{kode_jenis}/{kode_pp}', 'Tarbak\JenisPenilaianController@delete');

Route::get('/getStatusGuru', 'Tarbak\StatusGuruController@index');
Route::get('/getStatusGuru/{kode_status}/{kode_pp}', 'Tarbak\StatusGuruController@getStatusGuru');
Route::post('/postStatusGuru', 'Tarbak\StatusGuruController@save');
Route::put('/postStatusGuru/{kode_status}', 'Tarbak\StatusGuruController@update');
Route::delete('/deleteStatusGuru/{kode_status}/{kode_pp}', 'Tarbak\StatusGuruController@delete');

Route::get('/getMatpel', 'Tarbak\MataPelajaranController@index');
Route::get('/getMatpel/{kode_matpel}/{kode_pp}', 'Tarbak\MataPelajaranController@getMataPelajaran');
Route::post('/postMatpel', 'Tarbak\MataPelajaranController@save');
Route::put('/postMatpel/{kode_matpel}', 'Tarbak\MataPelajaranController@update');
Route::delete('/deleteMatpel/{kode_matpel}/{kode_pp}', 'Tarbak\MataPelajaranController@delete');

?>