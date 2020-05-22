<?php

namespace App\Http\Controllers\Apv;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class JuskebApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/apv/';

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
            $response = $client->request('GET', $this->link.'juskeb_app',[
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
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getPengajuan(){
        try {
            $client = new Client();
            $response = $client->request('GET', $this->link.'juskeb_aju',[
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
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

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
            'status' => 'required',
            'keterangan' => 'required',
            'nu' => 'required'
        ]);
            
        try{
           
            $client = new Client();
            $response = $client->request('POST', $this->link.'juskeb_app',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_lokasi' => Session::get('lokasi'),
                    'tanggal' => $request->tanggal,
                    'no_aju' => $request->no_aju,
                    'status' => $request->status,
                    'keterangan' => $request->keterangan,
                    'no_urut' => $request->nu
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                if($data['success']['approval'] == "Approve"){
                    $title = "Approval Pengajuan Justifikasi Kebutuhan [LaravelSAI]";
                    $content = "Pengajuan Justifikasi Kebutuhan ".$data['success']['no_aju']." telah di approve oleh ".$data['success']['nik_app']." , Menunggu approval anda.";

                    $title2 = "Approval Pengajuan Justifikasi Kebutuhan [LaravelSAI]";
                    $content2 = "Pengajuan Justifikasi Kebutuhan ".$data['success']['no_aju']." Anda telah di approve oleh ".$data['success']['nik_app'];
                    
                }else{
                    $title = "Return Pengajuan Justifikasi Kebutuhan [LaravelSAI]";
                    $content = "Pengajuan Justifikasi Kebutuhan ".$data['success']['no_aju']." telah di return oleh ".$data['success']['nik_app'];

                    $title2 = "Return Pengajuan Justifikasi Kebutuhan [LaravelSAI]";
                    $content2 = "Pengajuan Justifikasi Kebutuhan ".$data['success']['no_aju']." Anda telah di return oleh ".$data['success']['nik_app'];
                }
                if(isset($data['success']['token_players_app'])){

                    $notif = $this->sendNotif($title,$content,$data['success']['token_players_app']);
                    if($notif["status"]){
                        $data["success"]["message"] .= " Notif success";
                    }else{
                        $data["success"]["message"] .= " Notif failed";
                    }
                }
                if(isset($data['success']['token_players_buat'])){
                    $notif2 = $this->sendNotif($title2,$content2,$data['success']['token_players_buat']);
                    if($notif2["status"]){
                        $data["success"]["message"] .= " Notif2 success";
                    }else{
                        $data["success"]["message"] .= " Notif2 failed";
                    }
                }
                return response()->json(['data' => $data['success'], "res"=>$data], 200);  
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
            $response = $client->request('GET', $this->link.'juskeb_app/'.$no_bukti,[
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
            $response = $client->request('GET', $this->link.'juskeb_app_status',[
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

}
