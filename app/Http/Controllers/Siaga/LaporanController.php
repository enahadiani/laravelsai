<?php

namespace App\Http\Controllers\Siaga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('siaga-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPosisi(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-report/lap-posisi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_pp' => $request->kode_pp,
                    'no_bukti' => $request->no_bukti,
                    'periode' => $request->periode
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getHistoryApp(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-report/lap-history-app',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getAjuForm(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-report/lap-aju-form',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
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
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getPosisiSPB(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-report/lap-posisi-spb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->no_bukti,
                    'periode' => $request->periode
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getHistoryAppSPB(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-report/lap-history-app-spb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getAjuFormSPB(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-report/lap-aju-form-spb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
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
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }
       
}