<?php
namespace App\Http\Controllers\Siaga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class DashboardFPController extends Controller {
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
                'jenis' => $req['jenis'],
                'kode_klp' => $req['kode_klp']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-fp-box',[
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

    public function getFPBulan(Request $r) {
        try {
            $req = $r->all();
            $tahun = $r->query('tahun');
            $fields = [
                'tahun' => $tahun,
                'jenis' => $req['jenis'],
                'kode_klp' => $req['kode_klp']
            ];
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-fp-per-bulan',[
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

    public function getFilterKontribusi(Request $r) {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-fp-kontribusi-filter',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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

    public function getDefaultFilter(Request $r) {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-fp-default-filter',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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
                'jenis' => $req['jenis'],
                'kode_neraca' => $req['kode_neraca'],
                'kode_klp' => $req['kode_klp']
            ];

            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-fp-kontribusi',[
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

    public function getMargin(Request $r){
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
            $response = $client->request('GET',  config('api.url').'siaga-dash/data-fp-margin',[
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