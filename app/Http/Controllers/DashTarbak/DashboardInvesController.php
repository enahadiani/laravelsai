<?php
namespace App\Http\Controllers\DashTarbak;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class DashboardInvesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dash-tarbak/login');
        }
    }

    public function getDataBox(Request $r) {
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
                $req['periode'][1] = $tahun.$req['periode'][1];
            }  else {
                $req['periode'][1] = $tahun.$req['periode'][1];
            }

            
            $fields = [
                'periode' => $req['periode']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            if(isset($req['kode_neraca'])){
                $fields = array_merge($fields,[
                    'kode_neraca' => $req['kode_neraca']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-inves-box',[
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

    public function getSerapAgg(Request $r) {
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
                $req['periode'][1] = $tahun.$req['periode'][1];
            } else {
                $req['periode'][1] = $tahun.$req['periode'][1];
            }

            
            $fields = [
                'periode' => $req['periode']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            if(isset($req['kode_neraca'])){
                $fields = array_merge($fields,[
                    'kode_neraca' => $req['kode_neraca']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-inves-serap-agg',[
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

    public function getNilaiAsetChart(Request $r) {
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
                $req['periode'][1] = $tahun.$req['periode'][1];
            } else {
                $req['periode'][1] = $tahun.$req['periode'][1];
            }

            $fields = [
                'periode' => $req['periode']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            if(isset($req['kode_neraca'])){
                $fields = array_merge($fields,[
                    'kode_neraca' => $req['kode_neraca']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-inves-nilai-aset',[
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

    public function getAggPerLembagaChart(Request $r) {
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
                $req['periode'][1] = $tahun.$req['periode'][1];
            } else {
                $req['periode'][1] = $tahun.$req['periode'][1];
            }

            $fields = [
                'periode' => $req['periode']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            if(isset($req['kode_neraca'])){
                $fields = array_merge($fields,[
                    'kode_neraca' => $req['kode_neraca']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-inves-agg-lembaga',[
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
?>