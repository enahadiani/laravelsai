<?php 

    namespace App\Http\Controllers\Tarbak;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class AuthController extends Controller {
        
        public function index()
        {
            if(!Session::get('login')){
                return redirect('tarbak/login')->with('alert','Kamu harus login dulu');
            }
            else{
                return view('tarbak.fMain');
            }            
        }

        public function login()
        {
            return view('tarbak.fLogin');
        }

    }


?>