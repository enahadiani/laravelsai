<?php

namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ProyekController extends Controller
{
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

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function convertPeriode($date) {
        $explode = explode("/", $date);

        return "$explode[2]$explode[1]";
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
    public function isUnikProyek(Request $request) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-trans/proyek-check?kode='.$request->query('kode'),[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["status"];
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function isUnikKontrak(Request $request) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-trans/kontrak-check?kode='.$request->query('kode'),[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["status"];
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-trans/proyek',[
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
            'tanggal_mulai' => 'required',
            'kode_cust' => 'required',
            'nilai' => 'required',
            'ppn' => 'required',
            'no_proyek' => 'required',
            'no_kontrak' => 'required',
            'status_ppn' => 'required',
            'keterangan' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        try { 
            $fields = array(
                array(
                    "name" => "no_proyek",
                    "contents" => $request->no_proyek
                ),
                array(
                    "name" => "tgl_mulai",
                    "contents" => $this->convertDate($request->input('tanggal_mulai'))
                ),
                array(
                    "name" => "tgl_selesai",
                    "contents" => $this->convertDate($request->input('tanggal_selesai'))
                ),
                array(
                    "name" => "nilai",
                    "contents" => $this->joinNum($request->input('nilai'))
                ),
                array(
                    "name" => "kode_cust",
                    "contents" => $request->kode_cust
                ),
                array(
                    "name" => "ppn",
                    "contents" => $request->ppn
                ),
                array(
                    "name" => "status_ppn",
                    "contents" => $request->status_ppn
                ),
                array(
                    "name" => "status",
                    "contents" => $request->status
                ),
                array(
                    "name" => "keterangan",
                    "contents" => $request->keterangan
                ),
                array(
                    "name" => "periode",
                    "contents" => $this->convertPeriode($request->tanggal_mulai)
                ),
                array(
                    "name" => "no_kontrak",
                    "contents" => $request->no_kontrak
                ),
            );

            $fields_foto = array();
            $fields_nama_file_seb = array();
            $fields_jenis = array();
            $fields_nama_dok = array();
            $fields_no_dok = array();
            $cek = $request->file_dok;

            if(!empty($cek)) {
                if(count($request->file_dok) > 0) {
                    for($i=0;$i<count($request->jenis);$i++){ 
                        if(isset($request->file('file_dok')[$i])){
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $fields_foto[$i] = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' ),
                            );
                            
                        }
                        $fields_jenis[$i] = array(
                            'name'     => 'jenis[]',
                            'contents' => $request->kode_jenis[$i],
                        );
                        $fields_nama_dok[$i] = array(
                            'name'     => 'nama_dok[]',
                            'contents' => '-',
                        );
                        $fields_no_dok[$i] = array(
                            'name'     => 'no_urut[]',
                            'contents' => $request->no_dok[$i],
                        );
                        $fields_nama_file_seb[$i] = array(
                            'name'     => 'nama_file_seb[]',
                            'contents' => '-',
                        );
                    }
                    $fields = array_merge($fields, $fields_foto);
                    $fields = array_merge($fields, $fields_jenis);
                    $fields = array_merge($fields, $fields_nama_dok);
                    $fields = array_merge($fields, $fields_no_dok);
                    $fields = array_merge($fields, $fields_nama_file_seb);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/proyek',[
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
            $response = $client->request('GET',  config('api.url').'java-trans/proyek?no_proyek='.$request->query('kode'),
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
            'tanggal_mulai' => 'required',
            'kode_cust' => 'required',
            'nilai' => 'required',
            'ppn' => 'required',
            'no_proyek' => 'required',
            'no_kontrak' => 'required',
            'status_ppn' => 'required',
            'keterangan' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        try {
            $fields = array(
                array(
                    "name" => "no_proyek",
                    "contents" => $request->no_proyek
                ),
                array(
                    "name" => "tgl_mulai",
                    "contents" => $this->convertDate($request->input('tanggal_mulai'))
                ),
                array(
                    "name" => "tgl_selesai",
                    "contents" => $this->convertDate($request->input('tanggal_selesai'))
                ),
                array(
                    "name" => "nilai",
                    "contents" => $this->joinNum($request->input('nilai'))
                ),
                array(
                    "name" => "kode_cust",
                    "contents" => $request->kode_cust
                ),
                array(
                    "name" => "ppn",
                    "contents" => $request->ppn
                ),
                array(
                    "name" => "status_ppn",
                    "contents" => $request->status_ppn
                ),
                array(
                    "name" => "status",
                    "contents" => $request->status
                ),
                array(
                    "name" => "keterangan",
                    "contents" => $request->keterangan
                ),
                array(
                    "name" => "periode",
                    "contents" => $this->convertPeriode($request->tanggal_mulai)
                ),
                array(
                    "name" => "no_kontrak",
                    "contents" => $request->no_kontrak
                ),
            );

            $fields_foto = array();
            $fields_nama_file_seb = array();
            $fields_jenis = array();
            $fields_nama_dok = array();
            $fields_no_dok = array();
            $cek = $request->file_dok;

            if(!empty($cek)) {
                if(count($request->file_dok) > 0) {
                    for($i=0;$i<count($request->jenis);$i++){ 
                        if(isset($request->file('file_dok')[$i])){
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $fields_foto[$i] = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' ),
                            );
                            
                        } else {
                            $fields_foto[$i] = array(
                                'name'     => 'file[]',
                                'contents' => null
                            );
                        }
                        $fields_jenis[$i] = array(
                            'name'     => 'jenis[]',
                            'contents' => $request->kode_jenis[$i],
                        );
                        $fields_nama_dok[$i] = array(
                            'name'     => 'nama_dok[]',
                            'contents' => $request->nama_file[$i],
                        );
                        $fields_no_dok[$i] = array(
                            'name'     => 'no_urut[]',
                            'contents' => $request->no_dok[$i],
                        );
                        $fields_nama_file_seb[$i] = array(
                            'name'     => 'nama_file_seb[]',
                            'contents' => $request->nama_file[$i],
                        );
                    }
                    $fields = array_merge($fields, $fields_foto);
                    $fields = array_merge($fields, $fields_jenis);
                    $fields = array_merge($fields, $fields_nama_dok);
                    $fields = array_merge($fields, $fields_no_dok);
                    $fields = array_merge($fields, $fields_nama_file_seb);
                }
            }

            // echo "<pre>";
            // var_dump($fields);
            // echo "</pre>";

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/proyek-ubah',[
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
            $response = $client->request('DELETE',  config('api.url').'java-trans/proyek?no_proyek='.$request->input('kode'),
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

    public function deleteFile(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'java-trans/proyek-file',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->input('no_bukti'),
                    'kode_jenis' => $request->input('kode_jenis'),
                    'fileName' => $request->input('fileName')
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
