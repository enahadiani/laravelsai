<?php
namespace App\Http\Controllers\Esaku\Anggaran;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\BadResponseException;

class FilterLaporanController extends Controller {
    public function __contruct() {
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

    public function getTahun() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-agg-tahun',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getAkun(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-agg-akun',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'tahun' => $request->tahun
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getPP(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-agg-pp',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'tahun' => $request->tahun
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getJenis() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-agg-jenis',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getStatus() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-agg-status',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getPeriodik() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-agg-periodik',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getPeriode() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-agg-periode',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getJenisRRA() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-agg-jenisrra',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }
}

?>