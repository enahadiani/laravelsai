<?php

namespace App\Http\Controllers\DashYpt;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class DashboardRasioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dash-ypt/login');
        }
    }   

    public function getKlpRasio(Request $r) {
        try {
            $req = $r->all();
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/data-rasio-jenis',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $req
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getLokasi(Request $r) {
        try {
            $req = $r->all();
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/data-rasio-lembaga',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $req
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getRasioYTD(Request $r) {
        try {
            $req = $r->all();
            $tahun = $r->query('tahun');
            if($r->query('jenis') == 'TRW') {
                if($r->query('periode')[1] == "TRW1") {
                    $req['periode'][1] = $tahun."03"; 
                } elseif($r->query('periode')[1] == "TRW2") {
                    $req['periode'][1] = $tahun."06";
                } elseif($r->query('periode')[1] == "TRW3") {
                    $req['periode'][1] = $tahun."09";
                } elseif($r->query('periode')[1] == "TRW4") {
                    $req['periode'][1] = $tahun."12";
                }
            } elseif ($r->query('jenis') == 'SMT') {
                if($r->query('periode')[1] == "SMT1") {
                    $req['periode'][1] = $tahun."06";
                } elseif($r->query('periode')[1] == "SMT2") {
                    $req['periode'][1] = $tahun."12";
                }
            } elseif ($r->query('jenis') == 'YTM') {
                $per_awal = $tahun.'01';
                $per_akhir = $tahun.$req['periode'][1];
                $req['periode'][0] = 'range';
                $req['periode'][1] = $per_awal;
                $req['periode'][2] = $per_akhir;
            } else {
                $req['periode'][1] = $tahun.$req['periode'][1];
            }

            $fields = [
                'periode' => $req['periode']
            ];

            if(isset($req['lokasi'])){
                $fields = array_merge($fields,[
                    'lokasi' => $req['lokasi']
                ]);
            }
            if(isset($req['jenis_rasio'])){
                $fields = array_merge($fields,[
                    'jenis' => $req['jenis_rasio']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/data-rasio-ytd',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $fields
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function getRasioYoY(Request $r) {
        try {
            
            $req = $r->all();
            $tahun = $r->query('tahun');
            if($r->query('jenis') == 'TRW') {
                if($r->query('periode')[1] == "TRW1") {
                    $req['periode'][1] = $tahun."03"; 
                } elseif($r->query('periode')[1] == "TRW2") {
                    $req['periode'][1] = $tahun."06";
                } elseif($r->query('periode')[1] == "TRW3") {
                    $req['periode'][1] = $tahun."09";
                } elseif($r->query('periode')[1] == "TRW4") {
                    $req['periode'][1] = $tahun."12";
                }
            } elseif ($r->query('jenis') == 'SMT') {
                if($r->query('periode')[1] == "SMT1") {
                    $req['periode'][1] = $tahun."06";
                } elseif($r->query('periode')[1] == "SMT2") {
                    $req['periode'][1] = $tahun."12";
                }
            } elseif ($r->query('jenis') == 'YTM') {
                $per_awal = $tahun.'01';
                $per_akhir = $tahun.$req['periode'][1];
                $req['periode'][0] = 'range';
                $req['periode'][1] = $per_awal;
                $req['periode'][2] = $per_akhir;
            } else {
                $req['periode'][1] = $tahun.$req['periode'][1];
            }

            $fields = [
                'periode' => $req['periode']
            ];

            if(isset($req['lokasi'])){
                $fields = array_merge($fields,[
                    'lokasi' => $req['lokasi']
                ]);
            }
            if(isset($req['jenis_rasio'])){
                $fields = array_merge($fields,[
                    'jenis' => $req['jenis_rasio']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/data-rasio-yoy',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $fields
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getRasioTahun(Request $r) {
        try {
            $req = $r->all();
            $tahun = $r->query('tahun');
            if($r->query('jenis') == 'TRW') {
                if($r->query('periode')[1] == "TRW1") {
                    $req['periode'][1] = $tahun."03"; 
                } elseif($r->query('periode')[1] == "TRW2") {
                    $req['periode'][1] = $tahun."06";
                } elseif($r->query('periode')[1] == "TRW3") {
                    $req['periode'][1] = $tahun."09";
                } elseif($r->query('periode')[1] == "TRW4") {
                    $req['periode'][1] = $tahun."12";
                }
            } elseif ($r->query('jenis') == 'SMT') {
                if($r->query('periode')[1] == "SMT1") {
                    $req['periode'][1] = $tahun."06";
                } elseif($r->query('periode')[1] == "SMT2") {
                    $req['periode'][1] = $tahun."12";
                }
            } elseif ($r->query('jenis') == 'YTM') {
                $per_awal = $tahun.'01';
                $per_akhir = $tahun.$req['periode'][1];
                $req['periode'][0] = 'range';
                $req['periode'][1] = $per_awal;
                $req['periode'][2] = $per_akhir;
            } else {
                $req['periode'][1] = $tahun.$req['periode'][1];
            }

            $fields = [
                'periode' => $req['periode']
            ];

            if(isset($req['lokasi'])){
                $fields = array_merge($fields,[
                    'lokasi' => $req['lokasi']
                ]);
            }
            if(isset($req['jenis_rasio'])){
                $fields = array_merge($fields,[
                    'jenis' => $req['jenis_rasio']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/data-rasio-tahun',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $fields
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

   
}
