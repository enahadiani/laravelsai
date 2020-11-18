<?php
namespace App\Http\Controllers\Webginas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class BannerController extends Controller {

    public function show(){
        try {
            $client = new Client();
            var_dump(config('api.url'));
            // $response = $client->request('GET',  config('api.url').'admginas-master/banner-web',[
            //     'headers' => [
            //         'Authorization' => 'Bearer '.Session::get('token'),
            //         'Accept'     => 'application/json',
            //     ]
            // ]);

            // if ($response->getStatusCode() == 200) { // 200 OK
            //     $response_data = $response->getBody()->getContents();
                
            //     $data = json_decode($response_data,true);
            //     $data = $data["data"];
            // }
            // return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
}

?>