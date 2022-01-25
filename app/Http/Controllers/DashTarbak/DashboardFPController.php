<?php

namespace App\Http\Controllers\DashTarbak;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class DashboardFPController extends Controller
{
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
            } elseif ($r->query('jenis') == 'YTM') {
                $req['periode'][1] = $tahun.$req['periode'][1];
            } else {
                $req['periode'][1] = $tahun.$req['periode'][1];
            }

            $fields = [
                'periode' => $req['periode'],
                'jenis' => $req['jenis']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-box',[
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

    public function getDataBoxPdpt(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-pdpt',[
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

    public function getDataBoxBeban(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-beban',[
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

    public function getDataBoxShu(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-shu',[
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

    public function getDataBoxOr(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-or',[
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

    public function getDataBoxLabaRugi(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-lr',[
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

    public function getDataBoxPerformLembaga(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-pl',[
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

    public function getDataPerformansiLembaga(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis'],
                'kode_grafik' => $req['kode_grafik']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-detail-perform',[
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

    public function getDataPerLembaga(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis'],
                'kode_grafik' => $req['kode_grafik']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-detail-lembaga',[
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

    public function getDataPerKelompok(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis'],
                'kode_grafik' => $req['kode_grafik']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-detail-kelompok',[
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

    public function getDataPerAkun(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis'],
                'kode_grafik' => $req['kode_grafik']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-detail-akun',[
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

    public function getDataOR5Tahun(Request $r) {
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
                'periode' => $req['periode'],
                'jenis' => $req['jenis'],
                'kode_grafik' => $req['kode_grafik']
            ];
            if(isset($req['kode_lokasi'])){
                $fields = array_merge($fields,[
                    'kode_lokasi' => $req['kode_lokasi']
                ]);
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dash-tarbak-dash/data-fp-detail-or-5tahun',[
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
