<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('pp', 'Sekolah\PPController@getPP');
Route::get('tingkatan', 'Sekolah\TingkatanController@getTingkatan');
Route::get('guru-nik', 'Sekolah\GuruController@getNIKGuru');

Route::get('tahun-ajaran', 'Sekolah\TahunAjaranController@index');
Route::get('tahun-ajaran-detail', 'Sekolah\TahunAjaranController@show');
Route::post('tahun-ajaran', 'Sekolah\TahunAjaranController@store');
Route::put('tahun-ajaran', 'Sekolah\TahunAjaranController@update');
Route::delete('tahun-ajaran', 'Sekolah\TahunAjaranController@destroy');

Route::get('angkatan', 'Sekolah\AngkatanController@index');
Route::get('angkatan-detail', 'Sekolah\AngkatanController@show');
Route::post('angkatan', 'Sekolah\AngkatanController@store');
Route::put('angkatan', 'Sekolah\AngkatanController@update');
Route::delete('angkatan', 'Sekolah\AngkatanController@destroy');

Route::get('jurusan', 'Sekolah\JurusanController@index');
Route::get('jurusan-detail', 'Sekolah\JurusanController@show');
Route::post('jurusan', 'Sekolah\JurusanController@store');
Route::put('jurusan', 'Sekolah\JurusanController@update');
Route::delete('jurusan', 'Sekolah\JurusanController@destroy');

Route::get('kelas', 'Sekolah\KelasController@index');
Route::get('kelas-detail', 'Sekolah\KelasController@show');
Route::post('kelas', 'Sekolah\KelasController@store');
Route::put('kelas', 'Sekolah\KelasController@update');
Route::delete('kelas', 'Sekolah\KelasController@destroy');

Route::get('status-siswa', 'Sekolah\StatusSiswaController@index');
Route::get('status-siswa-detail', 'Sekolah\StatusSiswaController@show');
Route::post('status-siswa', 'Sekolah\StatusSiswaController@store');
Route::put('status-siswa', 'Sekolah\StatusSiswaController@update');
Route::delete('status-siswa', 'Sekolah\StatusSiswaController@destroy');

Route::get('slot-jadwal', 'Sekolah\SlotController@index');
Route::get('slot-jadwal-detail', 'Sekolah\SlotController@show');
Route::post('slot-jadwal', 'Sekolah\SlotController@store');
Route::put('slot-jadwal', 'Sekolah\SlotController@update');
Route::delete('slot-jadwal', 'Sekolah\SlotController@destroy');

Route::get('jenis-penilaian', 'Sekolah\JenisPenilaianController@index');
Route::get('jenis-penilaian-detail', 'Sekolah\JenisPenilaianController@show');
Route::post('jenis-penilaian', 'Sekolah\JenisPenilaianController@store');
Route::put('jenis-penilaian', 'Sekolah\JenisPenilaianController@update');
Route::delete('jenis-penilaian', 'Sekolah\JenisPenilaianController@destroy');

Route::get('status-guru', 'Sekolah\StatusGuruController@index');
Route::get('status-guru-detail', 'Sekolah\StatusGuruController@show');
Route::post('status-guru', 'Sekolah\StatusGuruController@store');
Route::put('status-guru', 'Sekolah\StatusGuruController@update');
Route::delete('status-guru', 'Sekolah\StatusGuruController@destroy');

Route::get('matpel', 'Sekolah\MataPelajaranController@index');
Route::get('matpel-detail', 'Sekolah\MataPelajaranController@show');
Route::post('matpel', 'Sekolah\MataPelajaranController@store');
Route::put('matpel', 'Sekolah\MataPelajaranController@update');
Route::delete('matpel', 'Sekolah\MataPelajaranController@destroy');

Route::get('kkm', 'Sekolah\KkmController@index');
Route::get('kkm-detail', 'Sekolah\KkmController@show');
Route::post('kkm', 'Sekolah\KkmController@store');
Route::put('kkm', 'Sekolah\KkmController@update');
Route::delete('kkm', 'Sekolah\KkmController@destroy');

Route::get('guru-matpel', 'Sekolah\GuruMatpelController@index');
Route::get('guru-matpel-detail', 'Sekolah\GuruMatpelController@show');
Route::post('guru-matpel', 'Sekolah\GuruMatpelController@store');
Route::put('guru-matpel', 'Sekolah\GuruMatpelController@update');
Route::delete('guru-matpel', 'Sekolah\GuruMatpelController@destroy');

Route::get('kalender-akad', 'Sekolah\KalenderAkademikController@index');
Route::get('kalender-akad-detail', 'Sekolah\KalenderAkademikController@show');
Route::post('kalender-akad', 'Sekolah\KalenderAkademikController@store');
Route::put('kalender-akad', 'Sekolah\KalenderAkademikController@update');
Route::delete('kalender-akad', 'Sekolah\KalenderAkademikController@destroy');

Route::get('jadwal-harian', 'Sekolah\JadwalHarianController@index');
Route::get('jadwal-harian-detail', 'Sekolah\JadwalHarianController@show');
Route::post('jadwal-harian', 'Sekolah\JadwalHarianController@store');
Route::delete('jadwal-harian', 'Sekolah\JadwalHarianController@destroy');

Route::get('jadwal-ujian', 'Sekolah\JadwalUjianController@index');
Route::get('jadwal-ujian-detail', 'Sekolah\JadwalUjianController@show');
Route::post('jadwal-ujian', 'Sekolah\JadwalUjianController@store');
Route::put('jadwal-ujian', 'Sekolah\JadwalUjianController@update');
Route::delete('jadwal-ujian', 'Sekolah\JadwalUjianController@destroy');

Route::get('hari', 'Sekolah\HariController@index');
Route::get('hari-detail', 'Sekolah\HariController@show');
Route::post('hari', 'Sekolah\HariController@store');
Route::put('hari', 'Sekolah\HariController@update');
Route::delete('hari', 'Sekolah\HariController@destroy');

Route::get('kd', 'Sekolah\KdController@index');
Route::get('kd-detail', 'Sekolah\KdController@show');
Route::post('kd', 'Sekolah\KdController@store');
Route::put('kd', 'Sekolah\KdController@update');
Route::delete('kd', 'Sekolah\KdController@destroy');