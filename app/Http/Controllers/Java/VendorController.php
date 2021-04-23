<?php

namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('java-auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function isUnik(Request $request) {
        try {
            $key = "-";
            $string = $request->query('kode');
            $search = $string;

            if(strpos($string, $key) !== false) {
                $explode = explode("-", $string);
                $search = $explode[1];
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-master/vendor-check?kode='.$search,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["status"];
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function saveFast(Request $request) {
        try {   
            $form = array(
                'nama' => $request->input('nama')
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-master/vendor-fast',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $form
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
        }
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-master/vendor',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            // 'kode_vendor' => 'required',
            'nama' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            // 'alamat' => 'required',
            // 'kode_pos' => 'required',
            // 'kecamatan' => 'required',
            // 'kota' => 'required',
            // 'negara' => 'required',
            // 'pic' => 'required',
            // 'no_telp_pic' => 'required',
            // 'email_pic' => 'required',
            'akun_hutang' => 'required',
        ]);

        try {   
            $no_rek = array();
            $nama_rek = array();
            $bank = array();
            $cabang = array();
            if($request->input('no_rek') !== null) {
                if(count($request->input('no_rek')) > 0) {
                    for($i=0;$i<count($request->input('no_rek'));$i++) {
                        array_push($no_rek, $request->input('no_rek')[$i]);
                        array_push($nama_rek, $request->input('nama_rek')[$i]);
                        array_push($bank, $request->input('bank')[$i]);
                        array_push($cabang, $request->input('cabang')[$i]);
                    }
                }
            }

            $form = array(
                // 'kode_vendor' => $request->input('kode_vendor'),
                'nama' => $request->input('nama'),
                'no_telp' => $request->input('no_telp'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'kode_pos' => $request->input('kode_pos'),
                'provinsi' => $request->input('provinsi'),
                'provinsi_name' => $request->input('provinsi_name'),
                'kecamatan' => $request->input('kecamatan'),
                'kecamatan_name' => $request->input('kecamatan_name'),
                'kota' => $request->input('kota'),
                'kota_name' => $request->input('kota_name'),
                'negara' => $request->input('negara'),
                'pic' => $request->input('pic'),
                'no_telp_pic' => $request->input('no_telp_pic'),
                'email_pic' => $request->input('email_pic'),
                'akun_hutang' => $request->input('akun_hutang'),
                'no_rek' => $no_rek,
                'nama_rek' => $nama_rek,
                'bank' => $bank,
                'cabang' => $cabang
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-master/vendor',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $form
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
        }
    }

    public function getData(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-master/vendor?kode_vendor='.$request->query('kode'),
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request) {
        $this->validate($request, [
            'kode_vendor' => 'required',
            'nama' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            // 'alamat' => 'required',
            // 'kode_pos' => 'required',
            // 'kecamatan' => 'required',
            // 'kota' => 'required',
            // 'negara' => 'required',
            // 'pic' => 'required',
            // 'no_telp_pic' => 'required',
            // 'email_pic' => 'required',
            'akun_hutang' => 'required',
        ]);

        try {   
            $no_rek = array();
            $nama_rek = array();
            $bank = array();
            $cabang = array();
            if($request->input('no_rek') !== null) {
                if(count($request->input('no_rek')) > 0) {
                    for($i=0;$i<count($request->input('no_rek'));$i++) {
                        array_push($no_rek, $request->input('no_rek')[$i]);
                        array_push($nama_rek, $request->input('nama_rek')[$i]);
                        array_push($bank, $request->input('bank')[$i]);
                        array_push($cabang, $request->input('cabang')[$i]);
                    }
                }
            }

            $form = array(
                'kode_vendor' => $request->input('kode_vendor'),
                'nama' => $request->input('nama'),
                'no_telp' => $request->input('no_telp'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'kode_pos' => $request->input('kode_pos'),
                'provinsi' => $request->input('provinsi'),
                'provinsi_name' => $request->input('provinsi_name'),
                'kecamatan' => $request->input('kecamatan'),
                'kecamatan_name' => $request->input('kecamatan_name'),
                'kota' => $request->input('kota'),
                'kota_name' => $request->input('kota_name'),
                'negara' => $request->input('negara'),
                'pic' => $request->input('pic'),
                'no_telp_pic' => $request->input('no_telp_pic'),
                'email_pic' => $request->input('email_pic'),
                'akun_hutang' => $request->input('akun_hutang'),
                'no_rek' => $no_rek,
                'nama_rek' => $nama_rek,
                'bank' => $bank,
                'cabang' => $cabang
            );

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'java-master/vendor',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $form
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
        }
    }

    public function delete(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'java-master/vendor?kode_vendor='.$request->input('kode'),
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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
   
}
