<?php

namespace App\Http\Controllers\Bdh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class LaporanPanjarController extends Controller {
    public function __contruct() {
        if (!Session::get('login')) {
            return redirect('bdh-auth/login');
        }
    }

    public function dataSaldoPanjar(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-saldopanjar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'kode_pp' => $r->input('kode_pp'),
                    'no_bukti' => $r->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $back = false;
                if($r->back == "true") {
                    $back = true;
                } else {
                    $back = false;
                }
                $res['back']= $back;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function dataPosisiTanggungPanjar(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-posisitanggungpanjar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'kode_pp' => $r->input('kode_pp'),
                    'no_bukti' => $r->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $back = false;
                if($r->back == "true") {
                    $back = true;
                } else {
                    $back = false;
                }
                $res['back']= $back;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function dataTanggungPanjar(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-tanggungpanjar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'kode_pp' => $r->input('kode_pp'),
                    'no_bukti' => $r->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $back = false;
                if($r->back == "true") {
                    $back = true;
                } else {
                    $back = false;
                }
                $res['back']= $back;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function dataPosisiAjuPanjar(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-posisiajupanjar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'kode_pp' => $r->input('kode_pp'),
                    'no_bukti' => $r->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $back = false;
                if($r->back == "true") {
                    $back = true;
                } else {
                    $back = false;
                }
                $res['back']= $back;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function dataCairPanjar(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-cairpanjar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'no_bukti' => $r->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $back = false;
                if($r->back == "true") {
                    $back = true;
                } else {
                    $back = false;
                }
                $res['back']= $back;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function dataPanjar(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-panjar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'kode_pp' => $r->input('kode_pp'),
                    'no_bukti' => $r->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $back = false;
                if($r->back == "true") {
                    $back = true;
                } else {
                    $back = false;
                }
                $res['back']= $back;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
}
