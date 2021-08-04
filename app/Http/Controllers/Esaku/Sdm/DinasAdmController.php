<?php

namespace App\Http\Controllers\Esaku\Sdm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class DinasAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-adm-dinass',[
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
            'kode_nik' => 'required',
            'no_sk' => 'required|array',
            'tgl_sk' => 'required|array',
            'keterangan' => 'required|array',
        ]);

        try {   
            $array_nomor = array();
            $array_no_sk = array();
            $array_tgl_sk = array();
            $array_keterangan = array();
            $fields = array();

            if(count($request->input('nomor')) > 0) {
                for($i=0; $i<count($request->input('nomor')); $i++) {
                    $data_nomor = $request->nomor[$i];
                    $data_no_sk = $request->no_sk[$i];
                    $data_tgl_sk = $request->tgl_sk[$i];
                    $data_keterangan = $request->keterangan[$i];

                    array_push($array_nomor, $data_nomor);
                    array_push($array_no_sk, $data_no_sk);
                    array_push($array_tgl_sk, $data_tgl_sk);
                    array_push($array_keterangan, $data_keterangan);
                }

                $fields = array(
                    "nik" => $request->input('kode_nik'),
                    "nomor" => $array_nomor,
                    "no_sk" => $array_no_sk,
                    "tgl_sk" => $array_tgl_sk,
                    "nama" => $array_keterangan
                );
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-adm-dinas',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $fields
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

    public function show(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-adm-dinas',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ], 
                'query' => [
                    'nik' => $request->query('kode')
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
            'kode_nik' => 'required',
            'no_sk' => 'required|array',
            'tgl_sk' => 'required|array',
            'keterangan' => 'required|array',
        ]);

        try {   
            $array_nomor = array();
            $array_no_sk = array();
            $array_tgl_sk = array();
            $array_keterangan = array();
            $fields = array();

            if(count($request->input('nomor')) > 0) {
                for($i=0; $i<count($request->input('nomor')); $i++) {
                    $data_nomor = $request->nomor[$i];
                    $data_no_sk = $request->no_sk[$i];
                    $data_tgl_sk = $request->tgl_sk[$i];
                    $data_keterangan = $request->keterangan[$i];

                    array_push($array_nomor, $data_nomor);
                    array_push($array_no_sk, $data_no_sk);
                    array_push($array_tgl_sk, $data_tgl_sk);
                    array_push($array_keterangan, $data_keterangan);
                }

                $fields = array(
                    "nik" => $request->input('kode_nik'),
                    "nomor" => $array_nomor,
                    "no_sk" => $array_no_sk,
                    "tgl_sk" => $array_tgl_sk,
                    "nama" => $array_keterangan
                );
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-adm-dinas-update',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $fields
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
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/sdm-adm-dinas',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nik' => $request->input('kode')
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
   
}
