<?php

namespace App\Http\Controllers\DashTelu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class BukuRKAController extends Controller
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
            $response = $client->request('GET',  config('api.url').'ypt-master/buku-rka',[
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
            if(isset($request->no_bukti)){
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

    public function store(Request $request) {
        $this->validate($request, [
            'tanggal' => 'required',
            'keterangan' => 'required',
            'kode_pp' => 'required',
            'flag_aktif' => 'required'
        ]);

        try { 
            $name = array('tanggal','keterangan','kode_pp','flag_aktif');
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'tanggal'){
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->reverseDate($req[$name[$i]],'/','-'),
                    );
                }
                else{

                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );
                }
                $data[$i] = $name[$i];
            }
            $fields_data[$i+1] = array(
                'name'     => 'nik_user',
                'contents' => Session::get('nikUser'),
            );
            $fields = array_merge($fields,$fields_data);

            $no_urut = array();
            $kode_jenis = array();
            $nama_file = array();
            $nama_dok = array();
            $sts = false;
            for($i=0;$i<count($request->kode_jenis);$i++) {
                $sts = true;
                $kode_jenis[] = array(
                    'name'     => 'kode_jenis[]',
                    'contents' => $request->kode_jenis[$i],
                );

                $nama_file[] = array(
                    'name'     => 'nama_file[]',
                    'contents' => $request->nama_file[$i],
                );
                
                $no_urut[] = array(
                    'name'     => 'no_urut[]',
                    'contents' => ($i+1),
                );

                $nama_dok[] = array(
                    'name'     => 'nama_dok[]',
                    'contents' => $request->nama_dok[$i],
                );                
            }
            $success['kode_jenis'] = $kode_jenis;
            $success['no_urut'] = $no_urut;
            $success['nama_file'] = $nama_file;
            $success['nama_dok'] = $nama_dok;
            if($sts){
                $fields = array_merge($fields,$no_urut);
                $fields = array_merge($fields,$kode_jenis);
                $fields = array_merge($fields,$nama_file);
                $fields = array_merge($fields,$nama_dok);
            }
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'ypt-master/buku-rka',[
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
            'keterangan' => 'required',
            'kode_pp' => 'required',
            'flag_aktif' => 'required'
        ]);

        try {
            $name = array('tanggal','no_bukti','keterangan','kode_pp','flag_aktif');
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'tanggal'){
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->reverseDate($req[$name[$i]],'/','-'),
                    );
                }
                else{

                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );
                }
                $data[$i] = $name[$i];
            }
            $fields_data[$i+1] = array(
                'name'     => 'nik_user',
                'contents' => Session::get('nikUser'),
            );
            $fields = array_merge($fields,$fields_data);

            $no_urut = array();
            $kode_jenis = array();
            $nama_file = array();
            $nama_dok = array();
            $sts = false;
            for($i=0;$i<count($request->kode_jenis);$i++) {
                if($request->kode_jenis[$i] == 'DK03') {
                    $sts = true;
                    $kode_jenis[] = array(
                        'name'     => 'kode_jenis[]',
                        'contents' => $request->kode_jenis[$i],
                    );
                    $nama_file[] = array(
                        'name'     => 'nama_file[]',
                        'contents' => $request->nama_file[$i],
                    );

                    $no_urut[] = array(
                        'name'     => 'no_urut[]',
                        'contents' => ($i+1),
                    );

                    $nama_dok[] = array(
                        'name'     => 'nama_dok[]',
                        'contents' => $request->nama_dok[$i],
                    );
                    
                }
                
            }
            $success['kode_jenis'] = $kode_jenis;
            $success['no_urut'] = $no_urut;
            $success['nama_file'] = $nama_file;
            $success['nama_dok'] = $nama_dok;
            if($sts){
                $fields = array_merge($fields,$no_urut);
                $fields = array_merge($fields,$kode_jenis);
                $fields = array_merge($fields,$nama_file);
                $fields = array_merge($fields,$nama_dok);
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'ypt-master/buku-rka-edit',[
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
            $response = $client->request('DELETE',  config('api.url').'ypt-master/buku-rka?no_bukti='.$request->no_bukti,
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
            $response = $client->request('POST',  config('api.url').'ypt-master/buku-rka-dok',[
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
            $response = $client->request('DELETE',  config('api.url').'ypt-master/buku-rka-dok-tmp',
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
            $response = $client->request('DELETE',  config('api.url').'ypt-master/buku-rka-dok',
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
