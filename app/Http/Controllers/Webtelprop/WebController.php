<?php 
namespace App\Http\Controllers\Webtelprop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class WebController extends Controller {
    
    public function home() {

        return view('webtelprop.home');

    }    
}

?>