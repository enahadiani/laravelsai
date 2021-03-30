<?php

namespace App\Http\Controllers\AdmJava;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ProdukController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('java-auth/login');
        }
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admjava-content/produk',[
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
            'nama_produk' => 'required',
            'keterangan' => 'required'
        ]);

        try {
            $fields = array(
                array(
                    "name" => "nama_produk",
                    "contents" => $request->nama_produk
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
            $response = $client->request('POST',  config('api.url').'admjava-content/produk',[
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
            $response = $client->request('GET',  config('api.url').'admjava-content/produk?kode_produk='.$request->query('kode'),
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
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'keterangan' => 'required'
        ]);

        try {
            $fields = array(
                array(
                    "name" => "kode_produk",
                    "contents" => $request->kode_produk
                ),
                array(
                    "name" => "nama_produk",
                    "contents" => $request->nama_produk
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
                            
                        } else {
                            $fields_foto[$i] = array(
                                'name'     => 'file[]',
                                'filename' => 'empty.jpg',
                                'Mime-Type'=> 'image/jpeg',
                                'contents' => null
                            );
                        }
                        $fields_nama_foto[$i] = array(
                            'name'     => 'nama_foto[]',
                            'contents' => $request->nama_gambar[$i],
                        );

                        $fields_nama_foto_seb[$i] = array(
                            'name'     => 'nama_file_seb[]',
                            'contents' => $request->nama_gambar[$i],
                        );
                    }
                    $fields = array_merge($fields, $fields_foto);
                    $fields = array_merge($fields, $fields_nama_foto);
                    $fields = array_merge($fields, $fields_nama_foto_seb);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admjava-content/produk',[
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
}

?>