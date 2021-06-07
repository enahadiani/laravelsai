<?php

namespace App\Http\Controllers\DashTelu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KontenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dash-telu/login');
        }
    }

      
    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-master/konten',[
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
            if(isset($request->no_konten)){
                return response()->json($data, 200); 
            }else{
                $data = $data["data"];
                return response()->json(['daftar' => $data, 'status'=>true], 200); 
            }

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getKategori(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-master/kategori-konten',[
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

    public function store(Request $request) {
        $this->validate($request, [
            'tanggal' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',
            'tag' => 'required',
            'kode_kategori' => 'required',
            'flag_aktif' => 'required',
            'file_gambar' => 'file|mimes:jpeg,png,jpg,mp4,avi,svg,webp'
        ]);

        try { 
            if($request->hasfile('file_gambar')) {
                $name = array('tanggal','judul','keterangan','tag','kode_kategori','flag_aktif','file_gambar');
            } else {
                $name = array('tanggal','judul','keterangan','tag','kode_kategori','flag_aktif');
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
                }else {
                    if($name[$i] == 'tanggal'){
                        $fields_data[$i] = array(
                            'name'     => $name[$i],
                            'contents' => $this->reverseDate($req[$name[$i]],'/','-'),
                        );
                    }else if($name[$i] == "no_bukti"){

                        $fields_data[$i] = array(
                            'name'     => 'no_konten',
                            'contents' => $req[$name[$i]],
                        );
                    }
                    else{

                        $fields_data[$i] = array(
                            'name'     => $name[$i],
                            'contents' => $req[$name[$i]],
                        );
                    }
                }
                $data[$i] = $name[$i];
            }
            $fields_data[$i+1] = array(
                'name'     => 'nik_user',
                'contents' => Session::get('nikUser'),
            );
            $fields = array_merge($fields,$fields_data);

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'ypt-master/konten',[
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

    public function update(Request $request) {
        $this->validate($request, [
            'no_bukti' => 'required',
            'tanggal' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',
            'tag' => 'required',
            'kode_kategori' => 'required',
            'flag_aktif' => 'required',
            'file_gambar' => 'file|mimes:jpeg,png,jpg,mp4,avi,svg,webp'
        ]);

        try { 
            if($request->hasfile('file_gambar')) {
                $name = array('tanggal','no_bukti','judul','keterangan','tag','kode_kategori','flag_aktif','file_gambar');
            } else {
                $name = array('tanggal','no_bukti','judul','keterangan','tag','kode_kategori','flag_aktif');
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
                } else {
                    if($name[$i] == 'tanggal'){
                        $fields_data[$i] = array(
                            'name'     => $name[$i],
                            'contents' => $this->reverseDate($req[$name[$i]],'/','-'),
                        );
                    }else if($name[$i] == "no_bukti"){

                        $fields_data[$i] = array(
                            'name'     => 'no_konten',
                            'contents' => $req[$name[$i]],
                        );
                    }
                    else{

                        $fields_data[$i] = array(
                            'name'     => $name[$i],
                            'contents' => $req[$name[$i]],
                        );
                    }
                }
                $data[$i] = $name[$i];
            }
            $fields_data[$i+1] = array(
                'name'     => 'nik_user',
                'contents' => Session::get('nikUser'),
            );
            $fields = array_merge($fields,$fields_data);

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'ypt-master/konten-edit',[
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

    public function destroy(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'ypt-master/konten?no_konten='.$request->no_konten,
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

    public function storeDokTmp(Request $request){
        $this->validate($request,[
            'file_dok' => 'required',
            'no_urut' => 'required',
            'kode_jenis' => 'required',
            'tanggal' => 'required',
            'nama' => 'required',
        ]);
        try {

            if($request->hasfile('file_dok')){

                $image_path = $request->file('file_dok')->getPathname();
                $image_mime = $request->file('file_dok')->getmimeType();
                $image_org  = $request->file('file_dok')->getClientOriginalName();
                $fields = [
                    [
                        'name'     => 'file_upload',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    ],
                    [
                        'name'     => 'nik_user',
                        'contents' => Session::get('nikUser'),
                    ],
                    [
                        'name'     => 'no_bukti',
                        'contents' => $request->no_bukti,
                    ],
                    [
                        'name'     => 'kode_jenis',
                        'contents' => $request->kode_jenis,
                    ],
                    [
                        'name'     => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name'     => 'no_urut',
                        'contents' => $request->no_urut,
                    ],
                    [
                        'name'     => 'tanggal',
                        'contents' => $this->reverseDate($request->tanggal,"/","-"),
                    ]
                ];
                
            }
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'ypt-master/konten-dok',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
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

    public function destroyDokTmp(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'ypt-master/konten-dok-tmp',
            [
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
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

    }

    public function getJenis(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-master/dok-jenis',[
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

    public function destroyDok(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'ypt-master/konten-dok',
            [
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
