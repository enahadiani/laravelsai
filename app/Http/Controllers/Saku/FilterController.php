<?php

namespace App\Http\Controllers\Saku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/lapsaku/';
    // public $link = 'http://localhost:8080/lumenapi/public/api/lapsaku/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('saku/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function lastOfMonth($year, $month) {
        return date("Y-m-d", strtotime('-1 second', strtotime('+1 month',strtotime($month . '/01/' . $year. ' 00:00:00'))));
    
    }

    function getGlFilterLokasi(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'gl_filter_lokasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true ,'message'=>'success'], 200); 
            
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    function getGlFilterPeriode(){
        try{

            $client = new Client();
            $response = $client->request('GET', $this->link.'gl_filter_periode',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            $periode = Session::get('periode');
            if($periode != ""){
                $periode = $periode;
            }else{
                $periode = date('Ym');
            }
            $tahun = substr($periode,0,4);
            $bulan = substr($periode,5,2);
            if(strlen($bulan) == 1){
                $bulan = "0".$bulan;
            }else{
                $bulan = $bulan;
            }
            $tgl_awal = date($tahun.'-'.$bulan.'-01');
            $tgl_akhir = $this->lastOfMonth($tahun,$bulan);
            return response()->json(['daftar' => $data, 'status'=>true,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir,'periode'=>$periode,'periodeAktif'=>Session::get('periode'),'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
        
    }

    function getGlFilterModul(Request $request){
        try{

            $client = new Client();
    
            if(isset($request->periode)){
                $periode = $request->periode;
            }else{
                $periode = "";
            }
    
            $query = [
                'periode' => $request->periode
            ];
    
            $response = $client->request('GET', $this->link.'gl_filter_modul',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=> $query
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    function getGlFilterBukti(Request $request){
        try{

            $client = new Client();
    
            if(isset($request->periode)){
                $periode = $request->periode;
            }else{
                $periode = "";
            }
    
            if(isset($request->modul)){
                $modul = $request->modul;
            }else{
                $modul = "";
            }
    
            $query = [
                'periode' => $periode,
                'modul' => $modul
            ];
    
            $response = $client->request('GET', $this->link.'gl_filter_bukti',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $query
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    function getGlFilterAkun(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'gl_filter_akun',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    function getGlFilterFs(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'gl_filter_fs',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true,'message'=>'success'], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }
}
