<?php

namespace App\Http\Controllers\Ts;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SisHakaksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('ts-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $r){
        try {
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'ts/sis-hakakses-list',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $r->input()
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

    public function getNIK(Request $r){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ts/sis-hakakses-nik',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $r->input()
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

    public function getMenu(Request $r){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ts/sis-hakakses-menu',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $r->input()
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

    public function getForm(Request $r){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ts/sis-hakakses-form',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $r->input()
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

    public function getPP(Request $r){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ts/sis-hakakses-pp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $r->input()
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|max:10',
            'kode_pp' => 'required|max:10',
            'kode_lokasi' => 'required|max:10',
            'pass' => 'required',
            'status_login' => 'required|max:1',
            'kode_menu' => 'required|max:20',
            'kode_form' => 'required|max:10',
            'flag_aktif' => 'required',
            'tgl_selesai' => 'string',
            'no_hp' => 'required|string',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
            
        try{
            
            if($request->hasfile('foto')){
                $image_path = $request->file('foto')->getPathname();
                $image_mime = $request->file('foto')->getmimeType();
                $image_org  = $request->file('foto')->getClientOriginalName();
                $fields = [
                    [
                        'name' => 'nik',
                        'contents' => $request->input('nik'),
                    ],
                    [
                        'name' => 'kode_lokasi',
                        'contents' => $request->input('kode_lokasi'),
                    ],
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->input('kode_pp'),
                    ],
                    [
                        'name' => 'pass',
                        'contents' => $request->input('pass'),
                    ],
                    [
                        'name' => 'status_login',
                        'contents' => $request->input('status_login'),
                    ],
                    [
                        'name' => 'kode_menu',
                        'contents' => $request->input('kode_menu'),
                    ],
                    [
                        'name' => 'kode_form',
                        'contents' => $request->input('kode_form'),
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->input('flag_aktif'),
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->input('no_hp'),
                    ],
                    [
                        'name' => 'tgl_selesai',
                        'contents' => $request->input('tgl_selesai'),
                    ],
                    [
                        'name'     => 'foto',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    ]
                    ];
                
            }else{
                $fields = [
                    [
                        'name' => 'nik',
                        'contents' => $request->input('nik'),
                    ],
                    [
                        'name' => 'kode_lokasi',
                        'contents' => $request->input('kode_lokasi'),
                    ],
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->input('kode_pp'),
                    ],
                    [
                        'name' => 'pass',
                        'contents' => $request->input('pass'),
                    ],
                    [
                        'name' => 'status_login',
                        'contents' => $request->input('status_login'),
                    ],
                    [
                        'name' => 'kode_menu',
                        'contents' => $request->input('kode_menu'),
                    ],
                    [
                        'name' => 'kode_form',
                        'contents' => $request->input('kode_form'),
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->input('flag_aktif'),
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->input('no_hp'),
                    ],
                    [
                        'name' => 'tgl_selesai',
                        'contents' => $request->input('tgl_selesai'),
                    ],
                ];
            }


            $client = new Client();
            $response = $client->request('POST',  config('api.url').'ts/sis-hakakses',[
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ts/sis-hakakses/'.$id,[
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
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = isset($res['message']) ? $res['message'] : $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request, $nik)
    {
        $this->validate($request, [
            'nik' => 'required|max:10',
            'kode_pp' => 'required|max:10',
            'kode_lokasi' => 'required|max:10',
            'pass' => 'required',
            'status_login' => 'required|max:1',
            'kode_menu' => 'required|max:20',
            'kode_form' => 'required|max:10',
            'flag_aktif' => 'required',
            'tgl_selesai' => 'string',
            'no_hp' => 'required|string',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try{

            if($request->hasfile('foto')){
                $image_path = $request->file('foto')->getPathname();
                $image_mime = $request->file('foto')->getmimeType();
                $image_org  = $request->file('foto')->getClientOriginalName();
                $fields = [
                    [
                        'name' => 'nik',
                        'contents' => $request->input('nik'),
                    ],
                    [
                        'name' => 'kode_lokasi',
                        'contents' => $request->input('kode_lokasi'),
                    ],
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->input('kode_pp'),
                    ],
                    [
                        'name' => 'pass',
                        'contents' => $request->input('pass'),
                    ],
                    [
                        'name' => 'status_login',
                        'contents' => $request->input('status_login'),
                    ],
                    [
                        'name' => 'kode_menu',
                        'contents' => $request->input('kode_menu'),
                    ],
                    [
                        'name' => 'kode_form',
                        'contents' => $request->input('kode_form'),
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->input('flag_aktif'),
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->input('no_hp'),
                    ],
                    [
                        'name' => 'tgl_selesai',
                        'contents' => $request->input('tgl_selesai'),
                    ],
                    [
                        'name'     => 'foto',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    ]
                    ];
                
            }else{
                $fields = [
                    [
                        'name' => 'nik',
                        'contents' => $request->input('nik'),
                    ],
                    [
                        'name' => 'kode_lokasi',
                        'contents' => $request->input('kode_lokasi'),
                    ],
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->input('kode_pp'),
                    ],
                    [
                        'name' => 'pass',
                        'contents' => $request->input('pass'),
                    ],
                    [
                        'name' => 'status_login',
                        'contents' => $request->input('status_login'),
                    ],
                    [
                        'name' => 'kode_menu',
                        'contents' => $request->input('kode_menu'),
                    ],
                    [
                        'name' => 'kode_form',
                        'contents' => $request->input('kode_form'),
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->input('flag_aktif'),
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->input('no_hp'),
                    ],
                    [
                        'name' => 'tgl_selesai',
                        'contents' => $request->input('tgl_selesai'),
                    ],
                ];
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'ts/sis-hakakses/'.$nik,[
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'ts/sis-hakakses/'.$id,[
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
