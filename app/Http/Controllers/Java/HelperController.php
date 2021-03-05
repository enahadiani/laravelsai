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

    public function getKartuBukti(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-report/filter-proyek?kode_cust='.$request->query('kode'),[
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

    public function getTagihanBayar(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-trans/tagihan-bayar-cbbl?kode_cust='.$request->query('kode'),[
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

    public function getBankBayar() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-trans/bank-bayar-cbbl',[
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

    public function getProyekTagihan() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-trans/tagihan-proyek-cbbl',[
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

    public function getProyekBeban(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-trans/proyek-biaya-cbbl?kode_cust='.$request->query('kode'),[
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

    public function getProyekRab() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-trans/proyek-rab-cbbl',[
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

    public function getVendor() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-trans/vendor',[
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

    public function getCustomer() {

        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-trans/customer',[
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

    public function getAkunVendor() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-master/vendor-akun',[
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