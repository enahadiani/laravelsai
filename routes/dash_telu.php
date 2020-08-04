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


Route::get('/cek_session', 'DashTelu\AuthController@cek_session');
Route::get('/', 'DashTelu\AuthController@index');
Route::get('/login', 'DashTelu\AuthController@login');
Route::post('/login', 'DashTelu\AuthController@cek_auth');
Route::get('/logout', 'DashTelu\AuthController@logout');
Route::get('/menu', 'DashTelu\AuthController@getMenu');
Route::get('/tes',function(){
    $menu = array(
        'calendar' => array(
           'text'   => 'Calendar',
           'rights' => 'user'
        ),
        'customers' => array(
           'text'   => 'Customers',
           'rights' => 'user',
           'sub' => array(
              'create-new' => array(
                 'text'   => 'Create new customer',
                 'rights' => 'user'
              ),
              'show-customers' => array(
                 'text'   => 'Show all customers',
                 'rights' => 'user'
              )
           )
        )
    );

    function buildMenu($menu_array, $is_sub=FALSE) {

        $attr = (!$is_sub) ? ' id="menu"' : ' class="submenu"';
        $menu = "<ul".$attr.">";
     
        foreach($menu_array as $id => $properties) {
           foreach($properties as $key => $val) {
              if(is_array($val)) {
                 $sub = buildMenu($val, TRUE);
              }
              else {
                 $sub = NULL;
                 $$key = $val;
              }
           }
           if(!isset($url)) {
              $url = $id;
           }
           $menu .= "<li><a href=".$url.">".$text."</a>".$sub."</li>";
           unset($url, $text, $sub);
        }
     
        return $menu . "</ul>";
     }
     
     echo $output = buildMenu($menu);
})
// //Dashboard
// //Home
// Route::get('/getPencapaianYoY/{periode}','Telu\DashboardController@getPencapaianYoY');
// Route::get('/getRkaVsReal/{periode}','Telu\DashboardController@getRkaVsReal');
// Route::get('/getGrowthRka/{periode}','Telu\DashboardController@getGrowthRka');
// Route::get('/getGrowthReal/{periode}','Telu\DashboardController@getGrowthReal');
// //Pendapatan
// Route::get('/getKomposisiPendapatan/{periode}','Telu\DashboardController@getKomposisiPendapatan');
// Route::get('/getOprNonOprPendapatan/{periode}','Telu\DashboardController@getOprNonOprPendapatan');
// Route::get('/getPresentaseRkaRealisasiPendapatan/{periode}','Telu\DashboardController@getPresentaseRkaRealisasiPendapatan');
// //Detail Pendapatan 1
// Route::get('/getPendapatanFak/{periode}/{kodeNeraca}','Telu\DashboardController@getPendapatanFak');
// Route::get('/getDetailPendapatan/{periode}/{kodeNeraca}','Telu\DashboardController@getDetailPendapatan');
// //Detail Pendapatan 2
// Route::get('/getPendapatanJurusan/{periode}/{kodeNeraca}/{kodeBidang}','Telu\DashboardController@getPendapatanJurusan');
// Route::get('/getDataPendJurusan/{periode}/{kodeNeraca}/{kodeBidang}/{tahun}','Telu\DashboardController@getDataPendJurusan');
// //Beban
// Route::get('/getKomposisiBeban/{periode}','Telu\DashboardController@getKomposisiBeban');
// Route::get('/getOprNonOprBeban/{periode}','Telu\DashboardController@getOprNonOprBeban');
// Route::get('/getPresentaseRkaRealisasiBeban/{periode}','Telu\DashboardController@getPresentaseRkaRealisasiBeban');
// //Detail Beban 1
// Route::get('/getBebanFak/{periode}/{kodeNeraca}','Telu\DashboardController@getBebanFak');
// Route::get('/getDetailBeban/{periode}/{kodeNeraca}','Telu\DashboardController@getDetailBeban');
// //Detail Pendapatan 2
// Route::get('/getBebanJurusan/{periode}/{kodeNeraca}/{kodeBidang}','Telu\DashboardController@getBebanJurusan');
// Route::get('/getDataBebanJurusan/{periode}/{kodeNeraca}/{kodeBidang}/{tahun}','Telu\DashboardController@getDataBebanJurusan');

?>