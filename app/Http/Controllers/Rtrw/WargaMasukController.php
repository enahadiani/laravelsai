<?php

namespace App\Http\Controllers\Rtrw;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class WargaMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('rtrw-auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/warga-masuk',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
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

    public function showDetList(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/warga-masuk-detail-list',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function generateIDWarga(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/generate-idwarga',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
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

    public function store(Request $request) {
        $this->validate($request, [
            'kode_blok' => 'required',
            'id_warga' => 'required',
            'no_rumah' => 'required',
            'nama' => 'required',
            'alias' => 'required',
            'nik' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'goldar' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'sts_nikah' => 'required',
            'sts_hub' => 'required',
            'sts_domisili' => 'required',
            'no_hp' => 'required',
            'emerg_call' => 'required',
            'ket_emergency' => 'required',
            'tgl_masuk' => 'required',
            'sts_masuk' => 'required',
            'kode_rt' => 'required',
            'alamat_asal' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try { 
            if($request->hasfile('file_gambar')) {
                $name = array('kode_blok','id_warga','no_rumah','nama','alias','nik','jk','tempat_lahir','tgl_lahir','agama','goldar','pendidikan','pekerjaan','sts_nikah','sts_domisili','sts_hub','no_hp','emerg_call','ket_emergency','tgl_masuk','sts_masuk','kode_rt','alamat_asal','file_gambar');
            } else {
                $name = array('kode_blok','id_warga','no_rumah','nama','alias','nik','jk','tempat_lahir','tgl_lahir','agama','goldar','pendidikan','pekerjaan','sts_nikah','sts_domisili','sts_hub','no_hp','emerg_call','ket_emergency','tgl_masuk','sts_masuk','kode_rt','alamat_asal');
            }
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'file_gambar') {
                    $image_path = $request->file('file_gambar')->getPathname();
                    $image_mime = $request->file('file_gambar')->getmimeType();
                    $image_org  = $request->file('file_gambar')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } else if($name[$i] == 'status') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['flag_aktif'] 
                    );
                } else {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );
                }
                $data[$i] = $name[$i];
            }
            
            $fields = array_merge($fields,$fields_data);
            
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rtrw/warga-masuk',[
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

    public function show(Request $request,$id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/warga-masuk-detail?id_warga='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'id_warga' => $id,
                    'kode_pp' => $request->kode_pp
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
            'kode_blok' => 'required',
            'id_warga' => 'required',
            'no_rumah' => 'required',
            'nama' => 'required',
            'alias' => 'required',
            'nik' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'goldar' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'sts_nikah' => 'required',
            'sts_hub' => 'required',
            'sts_domisili' => 'required',
            'no_hp' => 'required',
            'emerg_call' => 'required',
            'ket_emergency' => 'required',
            'tgl_masuk' => 'required',
            'sts_masuk' => 'required',
            'kode_rt' => 'required',
            'alamat_asal' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try { 
            if($request->hasfile('file_gambar')) {
                $name = array('kode_blok','id_warga','no_rumah','nama','alias','nik','jk','tempat_lahir','tgl_lahir','agama','goldar','pendidikan','pekerjaan','sts_nikah','sts_domisili','sts_hub','no_hp','emerg_call','ket_emergency','tgl_masuk','sts_masuk','kode_rt','alamat_asal','file_gambar');
            } else {
                $name = array('kode_blok','id_warga','no_rumah','nama','alias','nik','jk','tempat_lahir','tgl_lahir','agama','goldar','pendidikan','pekerjaan','sts_nikah','sts_domisili','sts_hub','no_hp','emerg_call','ket_emergency','tgl_masuk','sts_masuk','kode_rt','alamat_asal');
            }
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'file_gambar') {
                    $image_path = $request->file('file_gambar')->getPathname();
                    $image_mime = $request->file('file_gambar')->getmimeType();
                    $image_org  = $request->file('file_gambar')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } else if($name[$i] == 'status') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['flag_aktif'] 
                    );
                } else {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );
                }
                $data[$i] = $name[$i];
            }
                $fields = array_merge($fields,$fields_data);

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'rtrw/warga-masuk-ubah',[
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

    public function destroy($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'rtrw/warga-masuk?id_warga='.$id,
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

    public function updateStatus(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rtrw/warga-masuk-ubahstatus',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $request->all()
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
