<?php
namespace App\Http\Controllers\DashYpt;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class DashboardFPV2Controller extends Controller {
    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dash-ypt/login');
        }
    }

    public function getDataBoxFirst(Request $r) {
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
            }elseif ($r->query('jenis') == 'YTM') {
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
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/v2/data-fp-box',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $fields
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getDataOR(Request $r) {
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
            }elseif ($r->query('jenis') == 'YTM') {
                $per_awal = $tahun.'01';
                $per_akhir = $tahun.$req['periode'][1];
                $req['periode'][0] = 'range';
                $req['periode'][1] = $per_awal;
                $req['periode'][2] = $per_akhir;
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

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/v2/data-fp-or',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $fields
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getDataShu(Request $r) {
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
            }elseif ($r->query('jenis') == 'YTM') {
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
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/v2/data-fp-shu',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $fields
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getDataBeban(Request $r) {
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
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/v2/data-fp-beban',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $fields
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getDataPdpt(Request $r) {
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
            }elseif ($r->query('jenis') == 'YTM') {
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
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-ypt-dash/v2/data-fp-pdpt',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $fields
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
}
?>