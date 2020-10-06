<?php

namespace App\Http\Controllers\Apv;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('saku/login')->with('alert','Session telah habis !');
        }
    }

    
    function sendNotif($title,$content,$token_player){ 	

        try {

            // $title = "Test SAI";
            // $content = "Notif send from laravelsai";
            // $token_player = array("6681074c-a789-46f5-a278-e1052d592ed1");
            // $title = $title;
            
            $fields = array(
                'app_id' => "5f0781d5-8856-4f3e-a2c7-0f95695def7e", //appid laravelsai
                'include_player_ids' => $token_player,
                'url' => "https://onesignal.com",
                'data' => array(
                    "foo" => "bar"
                ),
                'contents' => array(
                    'en' => $content
                ),
                'headings' => array(
                    'en' => $title
                )
            );
            
            $url = "https://onesignal.com/api/v1/notifications";
            $client = new Client();
            $response = $client->request('POST', $url, [
                'body' => json_encode($fields),
                'headers' => [
                    'Content-Type'     => 'application/json; charset=utf-8',
                    'Authorization' => 'Basic ZmY5ODczYTMtNTgwZS00YmQ4LWFmNTMtMzQxZDY4ODc3MWFh',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            $result = array('result' => $data, 'status'=>true, 'fields'=>$fields, 'message'=>'Send notif success!');
            return $result;

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result = array('message' => $res, 'status'=>false, 'fields'=> $fields);
            return $result;
        }

    }

    function sendFCM($data){ 	
        try {
            
            $fields = array(
                'token' => array($data['id_device']), 
                'data' => array(
                    'title' => $data['title'],
                    'message' => $data['message'],
                    'nik' => $data['nik']
                ),
            );
            
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'apv/notif', [
                'headers' => [
                    'Authorization' =>  'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json; charset=utf-8'
                ],
                'body' => json_encode($fields)
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            $result = array('result' => $data, 'status'=>true, 'fields'=>$fields, 'message'=>'Send notif success!');
            return $result;

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result = array('message' => $res, 'status'=>false, 'fields'=> $fields);
            return $result;
        }

    }

    function sendPusher($data){ 	
        try {
            
            $fields = array(
                'id' => array($data['id']), 
                'title' => $data['title'],
                'message' => $data['message'],
                'sts_insert' => $data['sts_insert']
            );
            
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'apv/notif-pusher', [
                'headers' => [
                    'Authorization' =>  'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json; charset=utf-8'
                ],
                'body' => json_encode($fields)
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            $result = array('result' => $data, 'status'=>true, 'fields'=>$fields, 'message'=>'Send notif success!');
            return $result;

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result = array('message' => $res, 'status'=>false, 'fields'=> $fields);
            return $result;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function index(){
        try {
            $client = new Client();
            $kode_pp = Session::get('kodePP');
            $response = $client->request('GET',  config('api.url').'apv/verifikasi?kode_pp='.$kode_pp,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_pp' => $kode_pp
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getHistory(){
        try {
            $client = new Client();
            $kode_pp = Session::get('kodePP');
            $response = $client->request('GET',  config('api.url').'apv/verifikasi_history?kode_pp='.$kode_pp,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_pp' => $kode_pp
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true,'result'=>$res,'kode_pp'=>$kode_pp], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'no_aju' => 'required',
            'kode_pp2' => 'required',
            'kode_kota' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
            'total' => 'required',
            'barang'=> 'required|array',
            'barang_klp'=> 'required|array',
            'harga'=> 'required|array',
            'qty'=> 'required|array',
            'nilai'=> 'required|array',
            'ppn'=> 'required|array',
            'grand_total'=> 'required|array',
            'nama_dok'=>'array',
            'file_dok.*'=>'file|max:10240'
        ]);
            
        try{
            $fields = [
                [
                    'name' => 'tanggal',
                    'contents' => $request->tanggal,
                ],
                [
                    'name' => 'no_aju',
                    'contents' => $request->no_aju,
                ],
                [
                    'name' => 'kode_pp',
                    'contents' => $request->kode_pp2,
                ],
                [
                    'name' => 'kode_kota',
                    'contents' => $request->kode_kota,
                ],
                [
                    'name' => 'kode_divisi',
                    'contents' => $request->kode_divisi,
                ],
                [
                    'name' => 'status',
                    'contents' => $request->status,
                ],
                [
                    'name' => 'keterangan',
                    'contents' => $request->keterangan,
                ],
                [
                    'name' => 'total_barang',
                    'contents' => $this->joinNum($request->total),
                ]
            ];

            $fields_barang = array();
            $fields_barang_klp = array();
            if(count($request->barang) > 0){

                for($i=0;$i<count($request->barang);$i++){
                    $fields_barang[$i] = array(
                        'name'     => 'barang[]',
                        'contents' => $request->barang[$i],
                    );
                    $fields_barang_klp[$i] = array(
                        'name'     => 'barang_klp[]',
                        'contents' => $request->barang_klp[$i],
                    );
                }
                $send_data = array_merge($fields,$fields_barang);
                $send_data = array_merge($send_data,$fields_barang_klp);
            }else{
                $send_data = $fields;
            }

            $fields_harga = array();
            if(count($request->harga) > 0){

                for($i=0;$i<count($request->harga);$i++){
                    $fields_harga[$i] = array(
                        'name'     => 'harga[]',
                        'contents' => $this->joinNum($request->harga[$i]),
                    );
                }
                $send_data = array_merge($send_data,$fields_harga);
            }

            $fields_qty = array();
            if(count($request->qty) > 0){

                for($i=0;$i<count($request->qty);$i++){
                    $fields_qty[$i] = array(
                        'name'     => 'qty[]',
                        'contents' => $this->joinNum($request->qty[$i]),
                    );
                }
                $send_data = array_merge($send_data,$fields_qty);
            }

            $fields_subtotal = array();
            $fields_ppn = array();
            $fields_grand_total = array();
            if(count($request->nilai) > 0){

                for($i=0;$i<count($request->nilai);$i++){
                    $sub = $this->joinNum($request->nilai[$i]);
                    $fields_subtotal[$i] = array(
                        'name'     => 'subtotal[]',
                        'contents' => $sub,
                    );
                    $ppn = $this->joinNum($request->ppn[$i]);
                    $fields_ppn[$i] = array(
                        'name'     => 'ppn[]',
                        'contents' => $ppn,
                    );
                    $grand = $this->joinNum($request->grand_total[$i]);
                    $fields_grand_total[$i] = array(
                        'name'     => 'grand_total[]',
                        'contents' => $grand,
                    );
                }
                $send_data = array_merge($send_data,$fields_subtotal);
                $send_data = array_merge($send_data,$fields_ppn);
                $send_data = array_merge($send_data,$fields_grand_total);
            }

            $fields_foto = array();
            $fields_nama_file = array();
            $cek = $request->file_dok;
            if(!empty($cek)){

                if(count($request->file_dok) > 0){

                    for($i=0;$i<count($request->file_dok);$i++){
                        $image_path = $request->file('file_dok')[$i]->getPathname();
                        $image_mime = $request->file('file_dok')[$i]->getmimeType();
                        $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                        $fields_foto[$i] = array(
                            'name'     => 'file[]',
                            'filename' => $image_org,
                            'Mime-Type'=> $image_mime,
                            'contents' => fopen( $image_path, 'r' ),
                        );
                        $nama_file = $request->nama_dok[$i];
                        $fields_nama_file[$i] = array(
                            'name'     => 'nama_file[]',
                            'contents' => $nama_file,
                        );
                    }
                    $send_data = array_merge($send_data,$fields_foto);
                    $send_data = array_merge($send_data,$fields_nama_file);
                }
            }
                
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'apv/verifikasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                if($data['success']['verifikasi'] == "Approve"){
                    $content = "Pengajuan Justifikasi kebutuhan ".$data['success']['no_aju']." menunggu approval anda";
                    $title = "Verifikasi Justifikasi kebutuhan [LaravelSAI]";
                    
                }else{
                    $content = "Pengajuan Justifikasi kebutuhan ".$data['success']['no_aju']." Anda telah di return";
                    $title = "Return Verifikasi [LaravelSAI]";
                }

                $send = array(
                    'id_device' => $data['success']['id_device_app'],
                    'nik' => $data['success']['nik_device_app'],
                    'title' => "Verifikasi Justifikasi kebutuhan [LaravelSAI]",
                    'message' => "Pengajuan Justifikasi kebutuhan ".$data['success']['no_aju']." menunggu approval anda",
                );
                $fcm = $this->sendFCM($send);

                if($fcm["status"]){
                    $data["success"]["message"] .= " FCM success";
                }else{
                    $data["success"]["message"] .= " FCM failed";
                }

                $res = array(
                    'title' => "Verifikasi Justifikasi kebutuhan [LaravelSAI]",
                    'message' => "Pengajuan Justifikasi kebutuhan ".$data['success']['no_aju']." menunggu approval anda",
                    'id' => $data['success']['nik_device_app'],
                    'sts_insert' => 1
                );
                $notif = $this->sendPusher($res);

                // $notif = $this->sendNotif($title,$content,$data['success']['token_players']);
                if($notif["status"]){
                    $data["success"]["message"] .= " Notif success";
                }else{
                    $data["success"]["message"] .= " Notif failed";
                }
                
                return response()->json(['data' => $data['success']], 200);  
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
    public function show($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/verifikasi/'.$no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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

    public function getStatus()
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/verifikasi_status',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data,'status'=>true], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function getPreview($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/verifikasi_preview/'.$no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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