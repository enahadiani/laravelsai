<?php

namespace App\Http\Controllers\Sukka;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class DashboardController extends Controller {
    public function __contruct(){
        if(!Session::get('login')){
            return redirect('sukka-auth/login');
        }
    }

    public function index(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-dash/dash-datatable',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }
            return response()->json(['daftar' => $data, 'status'=>true,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function getDataBox(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-dash/dash-databox',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $res = json_decode($response_data,true);
            }
            return response()->json($res, 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function getDataReturn(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-dash/dash-return',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $res = json_decode($response_data,true);
            }
            return response()->json($res, 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

}

?>