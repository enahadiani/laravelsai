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
            'kode_vendor' => 'required',
            'nama' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'negara' => 'required',
            'akun_piutang' => 'required',
            'pic' => 'required',
            'no_telp_pic' => 'required',
            'email_pic' => 'required',
            'akun_piutang' => 'required',
            'no_rek' => 'required|array',
            'nama_rek' => 'required|array',
            'bank' => 'required|array',
            'cabang' => 'required|array',
        ]);

        try {   
            $no_rek = array();
            $nama_rek = array();
            $bank = array();
            $cabang = array();
            for($i=0;$i<count($request->input('no_rek'));$i++) {
                array_push($no_rek, $request->input('no_rek')[$i]);
                array_push($nama_rek, $request->input('nama_rek')[$i]);
                array_push($bank, $request->input('bank')[$i]);
                array_push($cabang, $request->input('cabang')[$i]);
            }

            $form = array(
                'kode_vendor' => $request->input('kode_vendor'),
                'nama' => $request->input('nama'),
                'no_telp' => $request->input('no_telp'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'kode_pos' => $request->input('kode_pos'),
                'kecamatan' => $request->input('kecamatan'),
                'kota' => $request->input('kota'),
                'negara' => $request->input('negara'),
                'pic' => $request->input('pic'),
                'no_telp_pic' => $request->input('no_telp_pic'),
                'email_pic' => $request->input('email_pic'),
                'akun_piutang' => $request->input('akun_piutang'),
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
            'alamat' => 'required',
            'kode_pos' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'negara' => 'required',
            'akun_piutang' => 'required',
            'pic' => 'required',
            'no_telp_pic' => 'required',
            'email_pic' => 'required',
            'akun_piutang' => 'required',
            'no_rek' => 'required|array',
            'nama_rek' => 'required|array',
            'bank' => 'required|array',
            'cabang' => 'required|array',
        ]);

        try {   
            $no_rek = array();
            $nama_rek = array();
            $bank = array();
            $cabang = array();
            for($i=0;$i<count($request->input('no_rek'));$i++) {
                array_push($no_rek, $request->input('no_rek')[$i]);
                array_push($nama_rek, $request->input('nama_rek')[$i]);
                array_push($bank, $request->input('bank')[$i]);
                array_push($cabang, $request->input('cabang')[$i]);
            }

            $form = array(
                'kode_vendor' => $request->input('kode_vendor'),
                'nama' => $request->input('nama'),
                'no_telp' => $request->input('no_telp'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'kode_pos' => $request->input('kode_pos'),
                'kecamatan' => $request->input('kecamatan'),
                'kota' => $request->input('kota'),
                'negara' => $request->input('negara'),
                'pic' => $request->input('pic'),
                'no_telp_pic' => $request->input('no_telp_pic'),
                'email_pic' => $request->input('email_pic'),
                'akun_piutang' => $request->input('akun_piutang'),
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
