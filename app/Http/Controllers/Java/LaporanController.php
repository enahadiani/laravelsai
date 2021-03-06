<?php
namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;
use PDF;

class LaporanController extends Controller {

    public function getSaldoProyek(Request $request) {
        try{
            if($request->status[1] === 'UNPAID') {
                $status = array($request->status[0], 0, $request->status[2]);
            } elseif($request->status[1] === 'PAID') {
                $status = array($request->status[0], 1, $request->status[2]);
            } else {
                $status = $request->status;
            }

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-report/lap-saldo-proyek',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_proyek' => $request->no_proyek,
                    'kode_cust' => $request->kode_cust,
                    'status' => $status
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }
            if($request->periode != ""){
                 $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getKartuProyek(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-report/lap-kartu-proyek',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_proyek' => $request->no_proyek,
                    'kode_cust' => $request->kode_cust
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }
            if($request->periode != ""){
                 $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $back = true;
            }else{
                $back = false;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res, 'back'=>$back], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }
}
?>