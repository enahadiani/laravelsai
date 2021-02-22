<?php

namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\BadResponseException;

class HelperController extends Controller {
    public function __contruct() {
        if(!Session::get('login')){
            return redirect('java-auth/login');
        }
    }

    public function getAkunCustomer() {

        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-master/customer-akun',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data;
        }
        return response()->json(['daftar' => $data['data'], 'status' => true], 200);
    }
}

?>