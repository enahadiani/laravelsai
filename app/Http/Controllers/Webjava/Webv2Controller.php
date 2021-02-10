<?php 
namespace App\Http\Controllers\Webjava;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class Webv2Controller extends Controller {

    public function home() {

        return view('webjavav2.home');  
    }
}

?>