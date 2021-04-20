<?php
namespace App\Http\Controllers\Esaku\Anggaran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PengajuanAnggaranController extends Controller { 
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

    public function getSaldoAnggaran(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-agg-saldo',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'bulan_terima' => $request->bulan,
                'kode_pp_terima' => $request->kode_pp,
                'kode_akun_terima' => $request->kode_akun,
                'periode' => $request->periode,
                'no_bukti' => '-'
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['saldo'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getPPAnggaran(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-pp',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'tahun' => $request->tahun
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getMataAnggaran(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-mta',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'tahun' => $request->tahun
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getAkunTerima() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-akun-terima',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getPPTerima() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-pp-terima',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getNikApprove() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-nik-app',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/rra-agg',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]['jurnal'];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
}
?>