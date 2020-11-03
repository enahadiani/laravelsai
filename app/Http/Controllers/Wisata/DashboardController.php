<?php

namespace App\Http\Controllers\Wisata;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;

class DashboardController extends Controller {
        
    public function __contruct() {
        if(!Session::get('login')){
            return redirect('wisata-auth/login')->with('alert','Session telah habis !');
        }
    }

    public function dataKunjungan() {
        try {

            $client = new Client();
            $response = $client->request('GET', config('api.url').'wisata-dash/data-kunjungan',[
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
            return response()->json(['data' => $data['data'], 'status' => true], 200);

        } catch (\Throwable $e) {
            $success['status'] = false;
            $success['message'] = "Error ".$e;
            return response()->json($success, 500);
        }
    }

    public function dataBidang() {
        try {
            
            $client = new Client();
            $response = $client->request('GET', config('api.url').'wisata-dash/data-bidang',[
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
            return response()->json(['data' => $data['data'], 'status' => true], 200);

        } catch (\Throwable $e) {
            $success['status'] = false;
            $success['message'] = "Error ".$e;
            return response()->json($success, 500);
        }
    }

    public function dataMitra() {
        try {
            
            $client = new Client();
            $response = $client->request('GET', config('api.url').'wisata-dash/data-mitra',[
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
            return response()->json(['data' => $data['data'], 'status' => true], 200);

        } catch (\Throwable $e) {
            $success['status'] = false;
            $success['message'] = "Error ".$e;
            return response()->json($success, 500);
        }
    }
}

?>