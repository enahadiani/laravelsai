<?php
namespace App\Http\Controllers\Esaku\Anggaran;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\BadResponseException;

class LaporanController extends Controller {
    public function __contruct() {
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

    public function getLaporanLabaRugiAnggaran(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/lap-agg-labarugi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'kode_fs' => $request->kode_fs,
                    'level' => $request->level
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $res = json_decode($response_data,true);
                $data = $res;//$res['data'];
            }

            if(isset($request->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1, 'sumju'=>$request->sumju, 'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getLaporanKartuAnggaran(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/lap-agg-kartu',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'kode_pp' => $request->kode_pp,
                    'jenis' => $request->jenis,
                    'realisasi' => $request->realisasi,
                    'periode' => $request->periode
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }

            if(isset($request->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1, 'sumju'=>$request->sumju, 'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getLaporanPencapaianAnggaran(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/lap-agg-capai',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'kode_pp' => $request->kode_pp,
                    'jenis' => $request->jenis,
                    'realisasi' => $request->realisasi,
                    'nik_user' => Session::get('nikUser')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }

            if(isset($request->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1, 'sumju'=>$request->sumju, 'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getLaporanKomparasiAnggaran(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/lap-agg-real',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'tahun' => $request->tahun,
                    'kode_akun' => $request->kode_akun,
                    'kode_pp' => $request->kode_pp,
                    'jenis' => $request->jenis,
                    'periodik' => $request->periodik,
                    'realisasi' => $request->realisasi,
                    'nik_user' => Session::get('nikUser')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }

            if(isset($request->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1, 'sumju'=>$request->sumju, 'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getLaporanAnggaran(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/lap-agg-anggaran',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'tahun' => $request->tahun,
                    'kode_akun' => $request->kode_akun,
                    'kode_pp' => $request->kode_pp,
                    'jenis' => $request->jenis,
                    'periodik' => $request->periodik,
                    'status' => $request->status
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }

            if(isset($request->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1, 'sumju'=>$request->sumju, 'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }
}

?>