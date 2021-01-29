<?php 
namespace App\Http\Controllers\Webesaku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class WebController extends Controller {

    public function index() {

        return view('webesaku.home');  
    }
}

?>