<?php

namespace App\Http\Controllers\Rtrw;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('rtrw-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function upload(Request $request) {
        $this->validate($request, [
            'nama' => 'required|array',
            'panggilan' => 'required|array',
            'alamat' => 'required|array',
            'no_hp' => 'required|array',
        ]);
        $fields = array(
            'nama'=>$request->nama,
            'alias'=>$request->panggilan,
            'no_rumah'=>$request->alamat,
            'no_hp'=>$request->no_hp,
        );
        try {
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rtrw/upload-warga',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json',
                ],
                    'body' => json_encode($fields)
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

    public function index(Request $request){

        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/warga-list',[
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
            'rt' => 'required',
            'blok' => 'required',
            'kode_rumah' => 'required',
            'tgl_masuk' => 'required',
            'sts_masuk' => 'required',
            'nama' => 'required|array',
            'nik' => 'required|array',
            'no_hp' => 'required|array',
            'foto.*' => 'file|image|mimes:jpeg,png,jpg|max:2048|required',
            'jk' => 'required|array',
            'agama' => 'required|array',
        ]);

        try {

            $fields = [
                [
                    'name' => 'rt',
                    'contents' => $request->rt,
                ],
                [
                    'name' => 'blok',
                    'contents' => $request->blok,
                ],
                [
                    'name' => 'no_rumah',
                    'contents' => $request->kode_rumah,
                ],
                [
                    'name' => 'tgl_masuk',
                    'contents' => $request->tgl_masuk,
                ],
                [
                    'name' => 'sts_masuk',
                    'contents' => $request->sts_masuk,
                ]
            ];

            $fields_nik = array();
            $fields_nama = array();
            $fields_jk = array();
            $fields_agama = array();
            $fields_no_hp = array();
            if(count($request->nik) > 0){

                for($i=0;$i<count($request->nik);$i++){
                    $fields_nik[$i] = array(
                        'name'     => 'nik[]',
                        'contents' => $request->nik[$i],
                    );
                    $fields_nama[$i] = array(
                        'name'     => 'nama[]',
                        'contents' => $request->nama[$i],
                    );
                    $fields_jk[$i] = array(
                        'name'     => 'jenis_kelamin[]',
                        'contents' => $request->jk[$i],
                    );
                    $fields_agama[$i] = array(
                        'name'     => 'agama[]',
                        'contents' => $request->agama[$i],
                    );
                    $fields_no_hp[$i] = array(
                        'name'     => 'no_hp[]',
                        'contents' => $request->no_hp[$i],
                    );
                }
                $send_data = array_merge($fields,$fields_nik);
                $send_data = array_merge($send_data,$fields_nama);
                $send_data = array_merge($send_data,$fields_jk);
                $send_data = array_merge($send_data,$fields_agama);
                $send_data = array_merge($send_data,$fields_no_hp);
            }else{
                $send_data = $fields;
            }

            $fields_foto = array();
            $cek = $request->foto;
            if(!empty($cek)){

                if(count($request->foto) > 0){

                    for($i=0;$i<count($request->foto);$i++){
                        $image_path = $request->file('foto')[$i]->getPathname();
                        $image_mime = $request->file('foto')[$i]->getmimeType();
                        $image_org  = $request->file('foto')[$i]->getClientOriginalName();
                        $fields_foto[$i] = array(
                            'name'     => 'foto[]',
                            'filename' => $image_org,
                            'Mime-Type'=> $image_mime,
                            'contents' => fopen( $image_path, 'r' ),
                        );
                    }
                    $send_data = array_merge($send_data,$fields_foto);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rtrw/warga',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
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

    public function show($no_bukti) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/warga-detail?no_bukti='.$no_bukti,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>[
                    'no_bukti' => $no_bukti
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

    public function update(Request $request, $kode_rumah) {
        $this->validate($request, [
            'no_bukti' => 'required',
            'rt' => 'required',
            'blok' => 'required',
            'kode_rumah' => 'required',
            'tgl_masuk' => 'required',
            'sts_masuk' => 'required',
            'nama' => 'required|array',
            'nik' => 'required|array',
            'no_hp' => 'required|array',
            'foto.*' => 'file|image|mimes:jpeg,png,jpg|max:2048|required',
            'jk' => 'required|array',
            'agama' => 'required|array',
        ]);

        try {

            $fields = [
                [
                    'name' => 'no_bukti',
                    'contents' => $request->no_bukti,
                ],
                [
                    'name' => 'rt',
                    'contents' => $request->rt,
                ],
                [
                    'name' => 'blok',
                    'contents' => $request->blok,
                ],
                [
                    'name' => 'no_rumah',
                    'contents' => $request->kode_rumah,
                ],
                [
                    'name' => 'tgl_masuk',
                    'contents' => $request->tgl_masuk,
                ],
                [
                    'name' => 'sts_masuk',
                    'contents' => $request->sts_masuk,
                ]
            ];

            $fields_nik = array();
            $fields_nama = array();
            $fields_jk = array();
            $fields_agama = array();
            $fields_no_hp = array();
            if(count($request->nik) > 0){

                for($i=0;$i<count($request->nik);$i++){
                    $fields_nik[$i] = array(
                        'name'     => 'nik[]',
                        'contents' => $request->nik[$i],
                    );
                    $fields_nama[$i] = array(
                        'name'     => 'nama[]',
                        'contents' => $request->nama[$i],
                    );
                    $fields_jk[$i] = array(
                        'name'     => 'jenis_kelamin[]',
                        'contents' => $request->jk[$i],
                    );
                    $fields_agama[$i] = array(
                        'name'     => 'agama[]',
                        'contents' => $request->agama[$i],
                    );
                    $fields_no_hp[$i] = array(
                        'name'     => 'no_hp[]',
                        'contents' => $request->no_hp[$i],
                    );
                }
                $send_data = array_merge($fields,$fields_nik);
                $send_data = array_merge($send_data,$fields_nama);
                $send_data = array_merge($send_data,$fields_jk);
                $send_data = array_merge($send_data,$fields_agama);
                $send_data = array_merge($send_data,$fields_no_hp);
            }else{
                $send_data = $fields;
            }

            $fields_foto = array();
            $cek = $request->foto;
            if(!empty($cek)){

                if(count($request->foto) > 0){

                    for($i=0;$i<count($request->foto);$i++){
                        $image_path = $request->file('foto')[$i]->getPathname();
                        $image_mime = $request->file('foto')[$i]->getmimeType();
                        $image_org  = $request->file('foto')[$i]->getClientOriginalName();
                        $fields_foto[$i] = array(
                            'name'     => 'foto[]',
                            'filename' => $image_org,
                            'Mime-Type'=> $image_mime,
                            'contents' => fopen( $image_path, 'r' ),
                        );
                    }
                    $send_data = array_merge($send_data,$fields_foto);
                }
            }
            
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rtrw/warga-ubah',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
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
   
    public function destroy($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'rtrw/warga',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $no_bukti
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
