<?php

namespace App\Http\Controllers\Siaga;

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

    function lastOfMonth($year, $month) {
        return date("Y-m-d", strtotime('-1 second', strtotime('+1 month',strtotime($month . '/01/' . $year. ' 00:00:00'))));
    
    }

    function getFilterNik(){
        try{
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'siaga-master/karyawan',[
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

    function getFilterForm(){
        try{
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'siaga-master/form',[
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

    function getFilterKlpMenu(){
        try{
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'siaga-master/menu',[
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

    function getFilterPPOne($kode){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-master/unit/'.$kode,[
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        } 
    }

    function getFilterPP(){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-master/filter-pp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true ,'message'=>'success'], 200); 
            
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        } 
    }

    function getFilterJabatan(){
        try{
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'siaga-master/jabatan',[
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

    public function getFilterPeriode() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'siaga-report/filter-periode',[
        'headers' => [
            'Authorization' => 'Bearer '.Session::get('token'),
            'Accept'     => 'application/json',
        ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
        
            $data = json_decode($response_data,true);
            $data = $data;
        }
        return response()->json(['daftar' => $data['data'], 'status' => true], 200);
    }

    public function getFilterNoBukti(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'siaga-report/filter-nobukti',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => $request->all()
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
        
            $data = json_decode($response_data,true);
            $data = $data;
        }
        return response()->json(['daftar' => $data['data'],'res' => $data, 'status' => true], 200);
    }

    public function getFilterNoBuktiSPB(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'siaga-report/filter-nobukti-spb',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => $request->all()
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
        
            $data = json_decode($response_data,true);
            $data = $data;
        }
        return response()->json(['daftar' => $data['data'],'res' => $data, 'status' => true], 200);
    }

    public function getFilterDefaultLabaRugiAgg() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'siaga-report/filter-default-labarugi-agg',[
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
    }

    public function getFilterPeriodeKeuangan() {
        $client = new Client();
        
        $response = $client->request('GET',  config('api.url').'siaga-report/filter-periode-keu',[
        'headers' => [
            'Authorization' => 'Bearer '.Session::get('token'),
            'Accept'     => 'application/json',
        ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
        
            $data = json_decode($response_data,true);
            $data = $data;
        }
        return response()->json(['daftar' => $data['data'], 'status' => true], 200);
    }

    public function getFilterFS() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'siaga-report/filter-fs',[
        'headers' => [
            'Authorization' => 'Bearer '.Session::get('token'),
            'Accept'     => 'application/json',
        ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
        
            $data = json_decode($response_data,true);
            $data = $data;
        }
        return response()->json(['daftar' => $data['data'], 'status' => true], 200);
    }



}



