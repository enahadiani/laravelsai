<?php

namespace App\Http\Controllers\Siaga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('siaga-auth/login')->with('alert','Session telah habis !');
        }
    }

    
    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
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
            $response = $client->request('POST',  config('api.url').'siaga-auth/notif-pusher', [
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

    function sendNotifApproval($no_pesan){ 	
        try {
            
            $fields = array(
                'no_pesan' => $no_pesan,
            );
            
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'siaga-auth/notif-approval', [
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

    public function index(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-trans/app',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'jenis' => 'Beban'
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

    public function getPengajuan(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-trans/app-aju',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'jenis' => 'Beban'
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
            $response = $client->request('POST',  config('api.url').'siaga-trans/app',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_lokasi' => Session::get('lokasi'),
                    'tanggal' => $this->reverseDate($request->tanggal,"/","-"),
                    'no_aju' => $request->no_aju,
                    'status' => $request->status,
                    'keterangan' => $request->keterangan,
                    'no_urut' => $request->nu,
                    'modul' => 'Beban'
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
                if(isset($data['no_pesan'])){
                    $this->sendNotifApproval($data['no_pesan']);
                }
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
    public function show(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-trans/app-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getStatus()
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-trans/app-status',[
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
            return response()->json(['daftar' => $data,'status'=>true], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function getPreview(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-trans/app-preview',[
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getPreviewAju(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'siaga-trans/aju-preview',[
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'no_pooling' => 'required'
        ]);
        try{
    
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'siaga-trans/send-email',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'no_pooling' => $request->no_pooling
                ]
            ]);  
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }
}
