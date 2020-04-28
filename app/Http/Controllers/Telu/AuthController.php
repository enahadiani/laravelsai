<?php
    namespace App\Http\Controllers\Telu;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class AuthController extends Controller 
    {
        public $link = 'http://api.simkug.com/api/gl';

        public function index()
        {
            if(!Session::get('login')){
                return redirect('telu/login')->with('alert','Kamu harus login dulu');
            }
            else{
                return view('saku.main');
            }            
        }

        public function login()
        {
            return view('telu.fLogin');
        }
    }

?>