<?php

namespace App\Http\Controllers\AdmJava;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ProjectController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('admjava-auth/login');
        }
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admjava-content/project',[
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
            'nama_project' => 'required',
            'keterangan' => 'required'
        ]);

        try {
            $fields = array(
                array(
                    "name" => "nama_project",
                    "contents" => $request->nama_project
                ),
                array(
                    "name" => "keterangan",
                    "contents" => $request->keterangan
                )
            );

            $fields_foto = array();
            $fields_nama_foto = array();
            $cek = $request->gambar;

            if(!empty($cek)) {
                if(count($request->gambar) > 0) {
                    for($i=0;$i<count($request->nama_gambar);$i++){ 
                        if(isset($request->file('gambar')[$i])){
                            $image_path = $request->file('gambar')[$i]->getPathname();
                            $image_mime = $request->file('gambar')[$i]->getmimeType();
                            $image_org  = $request->file('gambar')[$i]->getClientOriginalName();
                            $fields_foto[$i] = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' ),
                            );
                            
                        }
                        $fields_nama_foto[$i] = array(
                            'name'     => 'nama_foto[]',
                            'contents' => '-',
                        );
                    }
                    $fields = array_merge($fields, $fields_foto);
                    $fields = array_merge($fields, $fields_nama_foto);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admjava-content/project',[
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

    public function getData(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admjava-content/project?kode_project='.$request->query('kode'),
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }
    
    public function update(Request $request) { 
        $this->validate($request, [
            'kode_project' => 'required',
            'nama_project' => 'required',
            'keterangan' => 'required'
        ]);

        try {
            $fields = array(
                array(
                    "name" => "id_project",
                    "contents" => $request->kode_project
                ),
                array(
                    "name" => "nama_project",
                    "contents" => $request->nama_project
                ),
                array(
                    "name" => "keterangan",
                    "contents" => $request->keterangan
                )
            );

            $fields_foto = array();
            $fields_nama_foto_seb = array();
            $fields_nama_foto = array();
            $cek = $request->gambar;

            if(!empty($cek)) {
                if(count($request->gambar) > 0) {
                    for($i=0;$i<count($request->nama_gambar);$i++){ 
                        if(isset($request->file('gambar')[$i])){
                            $image_path = $request->file('gambar')[$i]->getPathname();
                            $image_mime = $request->file('gambar')[$i]->getmimeType();
                            $image_org  = $request->file('gambar')[$i]->getClientOriginalName();
                            $fields_foto[$i] = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' ),
                            );
                            
                            $fields_nama_foto[$i] = array(
                                'name'     => 'nama_foto[]',
                                'contents' => $request->nama_gambar[$i],
                            );

                            $fields_nama_foto_seb[$i] = array(
                                'name'     => 'nama_file_seb[]',
                                'contents' => $request->nama_gambar[$i],
                            );
                            
                        } elseif($request->nama_gambar[$i] != '-') {
                            $fields_foto[$i] = array(
                                'name'     => 'file[]',
                                'filename' => 'empty.jpg',
                                'Mime-Type'=> 'image/jpeg',
                                'contents' => null
                            );

                            $fields_nama_foto[$i] = array(
                                'name'     => 'nama_foto[]',
                                'contents' => $request->nama_gambar[$i],
                            );

                            $fields_nama_foto_seb[$i] = array(
                                'name'     => 'nama_file_seb[]',
                                'contents' => $request->nama_gambar[$i],
                            );
                        }
                    }
                    $fields = array_merge($fields, $fields_foto);
                    $fields = array_merge($fields, $fields_nama_foto);
                    $fields = array_merge($fields, $fields_nama_foto_seb);
                }
            }

            // echo "<pre>";
            // var_dump($fields);
            // echo "</pre>";

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admjava-content/project-ubah',[
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
            $response = $client->request('DELETE',  config('api.url').'admjava-content/project?id_project='.$request->input('kode'),
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

    }
}

?>