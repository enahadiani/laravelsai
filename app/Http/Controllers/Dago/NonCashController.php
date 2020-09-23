<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class NonCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public $link = 'https://api.simkug.com/api/dago-trans/';

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dago-auth/login')->with('alert','Session telah habis !');
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
            $response = $client->request('POST',  config('api.url').'dago-auth/notif-pusher', [
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

    

    public function getRegistrasi(){
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/noncash',[
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
            'tanggal' => 'required|date_format:Y-m-d',
            'no_reg' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'kode_akun' => 'required',
            'akunTitip' => 'required',
            'kode_curr' => 'required',
            'kurs' => 'required',
            'kurs_closing' => 'required',
            'akun_tambah' => 'required',
            'akun_dokumen' => 'required',
            'paket' => 'required',
            'tgl_berangkat' => 'required|date_format:Y-m-d',
            'status_bayar' => 'required|in:TUNAI,TRANSFER',
            'total_bayar' => 'required',
            'bayar_paket' => 'required',
            'bayar_tambahan' => 'required',
            'bayar_dok' => 'required',
            'kode_biaya' => 'required|array',
            'jenis_biaya' => 'required|array',
            'kode_akunbiaya' => 'required|array',
            'nbiaya_bayar' => 'required|array'
        ]);
            
        try{
            $biaya = array();
            if(isset($request->kode_biaya)){
                $kode_biaya = $request->kode_biaya;
                $jenis_biaya = $request->jenis_biaya;
                $kode_akun = $request->kode_akunbiaya;
                $bayar = $request->nbiaya_bayar;
                for($i=0;$i<count($kode_biaya);$i++){
                    $biaya[] = array(
                        'kode_biaya' => $kode_biaya[$i],
                        'jenis_biaya' => $jenis_biaya[$i],
                        'kode_akun' => $kode_akun[$i],
                        'bayar' => $this->joinNum($bayar[$i])
                    );
                }
            }

            $fields = array (
                'tanggal' => $request->tanggal,
                'no_reg' => $request->no_reg,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kode_pp' => Session::get('kodePP'),
                'kode_akun' => $request->kode_akun,
                'akun_titip' => $request->akunTitip,
                'kode_curr' => $request->kode_curr,
                'kurs' => $this->joinNum($request->kurs),
                'kurs_closing' => $this->joinNum($request->kurs_closing),
                'akun_tambah' => $request->akun_tambah,
                'akun_dokumen' => $request->akun_dokumen,
                'paket' => $request->paket,
                'jenis' => 'NONCASH',
                'tgl_berangkat' => $request->tgl_berangkat,
                'status_bayar' => $request->status_bayar,
                'total_bayar' => $this->joinNum($request->total_bayar),
                'bayar_paket' => $this->joinNum($request->bayar_paket),
                'bayar_tambahan' => $this->joinNum($request->bayar_tambahan),
                'bayar_dok' => $this->joinNum($request->bayar_dok),
                'biaya' => $biaya
            );
    
            $client = new Client();
            $response = $client->request('POST', config('api.url').'dago-trans/noncash',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                if($data['status'] == "SUCCESS"){
                    $content = "Pengajuan pembayaran ".$data['no_kwitansi']."  menunggu verifikasi anda";
                    $title = "Pengajuan Pembayaran [LaravelSAI]";
                    $res = array(
                        'title' => $title,
                        'message' => $content,
                        'id' => Session::get('userLog'),
                        'sts_insert' => 1
                    );
                    $notif = $this->sendPusher($res);
                    if($notif["status"]){
                        $data["message"] .= " Notif to verifikasi success";
                    }else{
                        $data["message"] .= " Notif to verifikasi failed";
                    }
                }
                return response()->json(['data' => $data], 200);  
            }
            
            // return response()->json(['data' => $fields], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = "FAILED";
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
        $this->validate($request, [
            'no_reg' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/noncash-detail?no_reg='.$request->no_reg,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_reg' => $request->no_reg
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
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $this->validate($request, [
            'no_reg' => 'required',
            'no_kwitansi' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/pembayaran-edit?no_reg='.$request->no_reg.'&no_bukti='.$request->no_kwitansi,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_reg' => $request->no_reg,
                    'no_bukti' => $request->no_kwitansi
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
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getRekBank(Request $request)
    {
        try{
            $client = new Client();
            if(isset($request->kode_akun)){
               
                $response = $client->request('GET', config('api.url').'dago-trans/noncash-rekbank?kode_akun='.$request->kode_akun,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'kode_akun' => $request->kode_akun
                    ]
                ]);
            }else{
                $response = $client->request('GET', config('api.url').'dago-trans/noncash-rekbank',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ]
                ]);
            }

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


}
