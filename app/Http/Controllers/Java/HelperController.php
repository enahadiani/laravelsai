<?php

namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\BadResponseException;

class HelperController extends Controller {
    private $apiKey = 'fcbeeb755353ac41ab2914806d956f26';
    private $url_api = 'https://pro.rajaongkir.com/api/';
    private $url_api_2 = 'https://pro.rajaongkir.com/api/v2/';

    public function __contruct() {
        if(!Session::get('login')){
            return redirect('java-auth/login');
        }
    }

    private function convertMonthName($month) {
        $array = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        return $array[$month - 1];
    }

    private function convertPeriode($array) {
        $newArray = [];
        for($i=0;$i<count($array);$i++) {
            $explode = explode('-', $array[$i]['periode']);
            $convert = intval($explode[1]);
            array_push($newArray, [
                'value' => $array[$i]['periode'],
                'text' => $this->convertMonthName($convert)." ".$explode[0]
            ]);
        }

        return $newArray;
    }

    public function deleteFile(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'java-trans/proyek-file',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->input('no_bukti'),
                    'kode_jenis' => $request->input('kode_jenis'),
                    'fileName' => $request->input('fileName')
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

    }

    public function getJenisDokumen() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-trans/file-jenis-cbbl',[
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
        $response = $client->request('GET',  config('api.url').'java-dash/periode',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['data'];
            if(!empty($data)) {
                $data = $this->convertPeriode($data);
            }
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getNegara(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  $this->url_api_2.'internationalDestination',[
            'headers' => [
                'key' => $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'id' => $request->query('kode')
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $res = $data["rajaongkir"];
            $status = $res["status"]["code"];
            $msg = $res["status"]["description"];
            $result = $res["results"];

            if($status == 200){ //mengecek apakah data kosong atau tidak 
                if(count($result) > 0){
                    $success['status'] = true;
                    $success['data'] = $result;
                    $success['message'] = $msg;
                }else{
                    $success['message'] = "Data Kosong!";
                    $success['data'] = [];
                    $success['status'] = false;
                }
            }else if($status == 400){
                $success['message'] = $msg;
                $success['data'] = [];
                $success['status'] = false;
            }
        }
        return response()->json(['daftar' => $success, 'status' => true], 200);
    }

    public function getKota(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  $this->url_api.'city',[
            'headers' => [
                'key' => $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'province' => $request->query('province'),
                'id' => $request->query('kode')
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $res = $data["rajaongkir"];
            $status = $res["status"]["code"];
            $msg = $res["status"]["description"];
            $result = $res["results"];

            if($status == 200){ //mengecek apakah data kosong atau tidak 
                if(count($result) > 0){
                    $success['status'] = true;
                    $success['data'] = $result;
                    $success['message'] = $msg;
                }else{
                    $success['message'] = "Data Kosong!";
                    $success['data'] = [];
                    $success['status'] = false;
                }
            }else if($status == 400){
                $success['message'] = $msg;
                $success['data'] = [];
                $success['status'] = false;
            }
        }
        return response()->json(['daftar' => $success, 'status' => true], 200);
    }

    public function getKecamatan(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  $this->url_api.'subdistrict',[
            'headers' => [
                'key' => $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'city' => $request->query('city'),
                'id' => $request->query('kode')
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $res = $data["rajaongkir"];
            $status = $res["status"]["code"];
            $msg = $res["status"]["description"];
            $result = $res["results"];

            if($status == 200){ //mengecek apakah data kosong atau tidak 
                if(count($result) > 0){
                    $success['status'] = true;
                    $success['data'] = $result;
                    $success['message'] = $msg;
                }else{
                    $success['message'] = "Data Kosong!";
                    $success['data'] = [];
                    $success['status'] = false;
                }
            }else if($status == 400){
                $success['message'] = $msg;
                $success['data'] = [];
                $success['status'] = false;
            }
        }
        return response()->json(['daftar' => $success, 'status' => true], 200);
    }

    public function getProvinsi(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  $this->url_api.'province',[
            'headers' => [
                'key' => $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'id' => $request->query('kode')
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $res = $data["rajaongkir"];
            $status = $res["status"]["code"];
            $msg = $res["status"]["description"];
            $result = $res["results"];

            if($status == 200){ //mengecek apakah data kosong atau tidak 
                if(count($result) > 0){
                    $success['status'] = true;
                    $success['data'] = $result;
                    $success['message'] = $msg;
                }else{
                    $success['message'] = "Data Kosong!";
                    $success['data'] = [];
                    $success['status'] = false;
                }
            }else if($status == 400){
                $success['message'] = $msg;
                $success['data'] = [];
                $success['status'] = false;
            }
        }
        return response()->json(['daftar' => $success, 'status' => true], 200);
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

    public function getProyekTagihan(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'java-trans/tagihan-proyek-cbbl?kode_cust='.$request->query('kode'),[
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