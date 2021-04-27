<?php
namespace App\Http\Controllers\Sima;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\BadResponseException;

class FilterController extends Controller {

    public function __contruct() {
        if(!Session::get('login')){
            return redirect('sima-auth/login');
        }
    }

    public function getFilterSiswa() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'gis-report/filter-nis',[
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

    public function getFilterJurusan() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'gis-report/filter-jurusan',[
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

    public function getFilterTagihan() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'gis-report/filter-tagihan',[
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