<?php

namespace App\Http\Controllers\Sukka;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PengajuanJuskebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('sukka-auth/login')->with('alert','Session telah habis !');
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
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb',[
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'periode' => 'required|date_format:Ym',
            'kegiatan' => 'required|max:1000',
            'kode_pp' => 'required',
            'jenis' => 'required',
            'nilai' => 'required',
            'kode_jenis' => 'required',
            'latar' => 'required|max:1000',
            'aspek' => 'required|max:1000',
            'spesifikasi' => 'required|max:1000',
            'rencana' => 'required|max:1000',
            'nik' => 'required|array',
            'kode_jab' => 'required|array',
            'kode_role' => 'required|array'
        ]);
            
        try{
            $fields = [
                'periode' => $request->input('periode'),
                'kegiatan' => $request->input('kegiatan'),
                'kode_pp' => $request->input('kode_pp'),
                'jenis' => $request->input('jenis'),
                'nilai' => $this->joinNum($request->input('nilai')),
                'kode_jenis' => $request->input('kode_jenis'),
                'latar' => $request->input('latar'),
                'aspek' => $request->input('aspek'),
                'spesifikasi' => $request->input('spesifikasi'),
                'rencana' => $request->input('rencana'),
                'nik' => $request->input('nik'),
                'kode_jab' => $request->input('kode_jab'),
                'kode_role' => $request->input('kode_role'),
            ];

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sukka-trans/juskeb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $fields
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
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-detail',[
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_bukti)
    {
        $this->validate($request, [
            'periode' => 'required|date_format:Ym',
            'kegiatan' => 'required|max:1000',
            'kode_pp' => 'required',
            'jenis' => 'required',
            'nilai' => 'required',
            'kode_jenis' => 'required',
            'latar' => 'required|max:1000',
            'aspek' => 'required|max:1000',
            'spesifikasi' => 'required|max:1000',
            'rencana' => 'required|max:1000',
            'nik' => 'required|array',
            'kode_jab' => 'required|array',
            'kode_role' => 'required|array'
        ]);
            
        try{
            $fields = [
                'periode' => $request->input('periode'),
                'kegiatan' => $request->input('kegiatan'),
                'kode_pp' => $request->input('kode_pp'),
                'jenis' => $request->input('jenis'),
                'nilai' => $this->joinNum($request->input('nilai')),
                'kode_jenis' => $request->input('kode_jenis'),
                'latar' => $request->input('latar'),
                'aspek' => $request->input('aspek'),
                'spesifikasi' => $request->input('spesifikasi'),
                'rencana' => $request->input('rencana'),
                'nik' => $request->input('nik'),
                'kode_jab' => $request->input('kode_jab'),
                'kode_role' => $request->input('kode_role'),
            ];
                
            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'sukka-trans/juskeb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $fields
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
            return response()->json(['data' => $data], 200);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'sukka-trans/juskeb',[
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

    public function getPP(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-pp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->input()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'status'=>true,'message'=>'Success!'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getJenis(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-jenis',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->input()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'status'=>true,'message'=>'Success!'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getAppFlow(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-app-flow',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nilai' => $this->joinNum($request->input('nilai')),
                    'kode_jenis' => $request->input('kode_jenis'),
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'status'=>true,'message'=>'Success!'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

}
