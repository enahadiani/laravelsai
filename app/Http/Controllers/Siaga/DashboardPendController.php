<?php
namespace App\Http\Controllers\Siaga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class DashboardPendController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('siaga-auth/login');
        }
    }

    public function getDataBox(Request $r) {
        try {
            $req = $r->all();
            $tahun = $r->query('tahun');
            // if($r->query('jenis') == 'TRW') {
            //     if($r->query('periode')[1] == "TRW1") {
            //         $req['periode'][1] = $tahun."03"; 
            //     } elseif($r->query('periode')[1] == "TRW2") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "TRW3") {
            //         $req['periode'][1] = $tahun."09";
            //     } elseif($r->query('periode')[1] == "TRW4") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'SMT') {
            //     if($r->query('periode')[1] == "SMT1") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "SMT2") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'YTM') {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // } else {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // }

            $fields = [
                // 'periode' => $req['periode'],
                'periode' => $tahun . $req['periode'][1],
                'jenis' => $req['jenis']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-pend-box',[
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

    public function getKontribusi(Request $r){
        try {
            $req = $r->all();
            $tahun = $r->query('tahun');
            // if($r->query('jenis') == 'TRW') {
            //     if($r->query('periode')[1] == "TRW1") {
            //         $req['periode'][1] = $tahun."03"; 
            //     } elseif($r->query('periode')[1] == "TRW2") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "TRW3") {
            //         $req['periode'][1] = $tahun."09";
            //     } elseif($r->query('periode')[1] == "TRW4") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'SMT') {
            //     if($r->query('periode')[1] == "SMT1") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "SMT2") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'YTM') {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // } else {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // }

            $fields = [
                // 'periode' => $req['periode'],
                'periode' => $tahun . $req['periode'][1],
                'jenis' => $req['jenis']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-pend-kontribusi',[
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

    public function getPortofolio(Request $r){
        try {
            $req = $r->all();
            $tahun = $r->query('tahun');
            // if($r->query('jenis') == 'TRW') {
            //     if($r->query('periode')[1] == "TRW1") {
            //         $req['periode'][1] = $tahun."03"; 
            //     } elseif($r->query('periode')[1] == "TRW2") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "TRW3") {
            //         $req['periode'][1] = $tahun."09";
            //     } elseif($r->query('periode')[1] == "TRW4") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'SMT') {
            //     if($r->query('periode')[1] == "SMT1") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "SMT2") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'YTM') {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // } else {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // }

            $fields = [
                // 'periode' => $req['periode'],
                'periode' => $tahun . $req['periode'][1],
                'jenis' => $req['jenis']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-pend-per-bulan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'tahun' => $tahun
                ]
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

    public function getYTDvsYoY(Request $r){
        try {
            $req = $r->all();
            $tahun = $r->query('tahun');
            // if($r->query('jenis') == 'TRW') {
            //     if($r->query('periode')[1] == "TRW1") {
            //         $req['periode'][1] = $tahun."03"; 
            //     } elseif($r->query('periode')[1] == "TRW2") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "TRW3") {
            //         $req['periode'][1] = $tahun."09";
            //     } elseif($r->query('periode')[1] == "TRW4") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'SMT') {
            //     if($r->query('periode')[1] == "SMT1") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "SMT2") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'YTM') {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // } else {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // }

            $fields = [
                // 'periode' => $req['periode'],
                'periode' => $tahun . $req['periode'][1],
                'jenis' => $req['jenis']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-pend-ytdvsyoy',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'tahun' => $tahun
                ]
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

    public function getRKAvsReal(Request $r){
        try {
            $req = $r->all();
            $tahun = $r->query('tahun');
            // if($r->query('jenis') == 'TRW') {
            //     if($r->query('periode')[1] == "TRW1") {
            //         $req['periode'][1] = $tahun."03"; 
            //     } elseif($r->query('periode')[1] == "TRW2") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "TRW3") {
            //         $req['periode'][1] = $tahun."09";
            //     } elseif($r->query('periode')[1] == "TRW4") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'SMT') {
            //     if($r->query('periode')[1] == "SMT1") {
            //         $req['periode'][1] = $tahun."06";
            //     } elseif($r->query('periode')[1] == "SMT2") {
            //         $req['periode'][1] = $tahun."12";
            //     }
            // } elseif ($r->query('jenis') == 'YTM') {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // } else {
            //     $req['periode'][1] = $tahun.$req['periode'][1];
            // }

            $fields = [
                // 'periode' => $req['periode'],
                'periode' => $tahun . $req['periode'][1],
                'jenis' => $req['jenis']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-pend-rkavsreal',[
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