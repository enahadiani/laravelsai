<?php

namespace App\Http\Controllers\Esaku\Sdm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KeluargaController extends Controller
{
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

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-keluargas',[
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
            'nama' => 'required',
            'status_keluarga' => 'required',
            'jk' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'tanggungan' => 'required',
        ]);

        try {   
            $fields = array(
                array(
                    "name" => "nama", 
                    "contents" => $request->input('nama')
                ),
                array(
                    "name" => "status_kes", 
                    "contents" => $request->input('tanggungan')
                ),
                array(
                    "name" => "jenis", 
                    "contents" => $request->input('status_keluarga')
                ),
                array(
                    "name" => "jk", 
                    "contents" => $request->input('jk')
                ),
                array(
                    "name" => "tempat", 
                    "contents" => $request->input('tempat')
                ),
                array(
                    "name" => "tgl_lahir", 
                    "contents" => $this->convertDate($request->input('tgl_lahir'))
                ),
            );

            if($request->hasFile('file')) {
                $image_path = $request->file('file')->getPathname();
                $image_mime = $request->file('file')->getmimeType();
                $image_org  = $request->file('file')->getClientOriginalName();
                $file_field = array(
                    'name'     => 'file',
                    'filename' => $image_org,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen($image_path, 'r' ),
                );
                array_push($fields, $file_field);
            }

            // var_dump($fields);
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-keluarga',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
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

    public function show(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-keluarga',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ], 
                'query' => [
                    'nu' => $request->query('kode')
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

    public function update(Request $request) {
        $this->validate($request, [
            'nama' => 'required',
            'status_keluarga' => 'required',
            'jk' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'tanggungan' => 'required',
            'nu' => 'required'
        ]);

        try {   
            $fields = array(
                array(
                    "name" => "nama", 
                    "contents" => $request->input('nama')
                ),
                array(
                    "name" => "status_kes", 
                    "contents" => $request->input('tanggungan')
                ),
                array(
                    "name" => "jenis", 
                    "contents" => $request->input('status_keluarga')
                ),
                array(
                    "name" => "jk", 
                    "contents" => $request->input('jk')
                ),
                array(
                    "name" => "tempat", 
                    "contents" => $request->input('tempat')
                ),
                array(
                    "name" => "tgl_lahir", 
                    "contents" => $this->convertDate($request->input('tgl_lahir'))
                ),
                array(
                    "name" => "nu", 
                    "contents" => $request->input('nu')
                ),
            );

            if($request->hasFile('file')) {
                $image_path = $request->file('file')->getPathname();
                $image_mime = $request->file('file')->getmimeType();
                $image_org  = $request->file('file')->getClientOriginalName();
                $file_field = array(
                    'name'     => 'file',
                    'filename' => $image_org,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen($image_path, 'r' ),
                );
                array_push($fields, $file_field);
            }

            // var_dump($fields);
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-keluarga-update',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
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

    public function delete(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/sdm-keluarga',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nu' => $request->input('kode')
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
