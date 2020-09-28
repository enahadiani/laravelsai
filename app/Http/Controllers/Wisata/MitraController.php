<?php

namespace App\Http\Controllers\Wisata;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('wisata-auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/mitra',[
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
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'kode_mitra' => 'required',
            'nama' => 'required',
            'alamat' => 'required',            
            'no_tel' => 'required',            
            'kode_camat' => 'required',            
            'website' => 'required',            
            'email' => 'required',            
            'pic' => 'required', 
            'no_hp' => 'required', 
            'status' => 'required',
            'kode_subjenis' => 'required|array',    
        ]);

        try {   
                $arrSubjenis = array();
                if(count($request->generate)) {
                    for($i=0;$i<count($request->generate);$i++) {
                        if($request->generate[$i] == "true") {
                            $arrSubJenis[] = array('kode_subjenis'=>$request->kode_subjenis[$i]);
                        }
                    }
                }

                $data = array(
                        'kode_mitra'=>$request->kode_mitra,
                        'nama'=>$request->nama,
                        'alamat'=>$request->alamat,
                        'no_tel'=>$request->no_tel,
                        'kecamatan'=>$request->kode_camat,
                        'website'=>$request->website,
                        'email'=>$request->email,
                        'pic'=>$request->pic,
                        'no_hp'=>$request->no_hp,
                        'status'=>$request->status,
                        'arrsub'=>$arrSubJenis
                    );
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'wisata-master/mitra',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'  => 'application/json',
                    ],
                    'body' => json_encode($data)
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
                }

        } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/mitrabid?kode_mitra='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'kode_mitra' => 'required',
            'nama' => 'required',
            'alamat' => 'required',            
            'no_tel' => 'required',            
            'kode_camat' => 'required',            
            'website' => 'required',            
            'email' => 'required',            
            'pic' => 'required', 
            'no_hp' => 'required', 
            'status' => 'required',
            'kode_subjenis' => 'required|array',  
        ]);

        try {   
                $arrSubjenis = array();
                if(count($request->generate)) {
                    for($i=0;$i<count($request->generate);$i++) {
                        if($request->generate[$i] == "true") {
                            $arrSubJenis[] = array('kode_subjenis'=>$request->kode_subjenis[$i]);
                        }
                    }
                }
                $data = array(
                    'kode_mitra'=>$request->kode_mitra,
                    'nama'=>$request->nama,
                    'alamat'=>$request->alamat,
                    'no_tel'=>$request->no_tel,
                    'kecamatan'=>$request->kode_camat,
                    'website'=>$request->website,
                    'email'=>$request->email,
                    'pic'=>$request->pic,
                    'no_hp'=>$request->no_hp,
                    'status'=>$request->status,
                    'arrsub'=>$arrSubJenis
                );

                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'wisata-master/mitra?kode_mitra='.$id,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json',
                    ],
                    'body' => json_encode($data)
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
                }

        } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'wisata-master/mitra?kode_mitra='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

    }
   
}
