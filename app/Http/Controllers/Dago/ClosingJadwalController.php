<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ClosingJadwalController extends Controller
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

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
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

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/closing-jadwal',[
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

    public function getRegistrasi(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/closing-jadwal-reg',[
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
            return response()->json(['message' => $res, 'status'=>false], 200);
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
            'tgl_input' => 'required',
            'keterangan' => 'required',
            'kode_curr' => 'required',
            'kurs' => 'required',
            'paket' => 'required',
            'jadwal' => 'required',
            'total_pdpt' => 'required',
            'no_reg' => 'required|array',
            'akun_titip' => 'required|array',
            'bayar_paket' => 'required|array',
            'akun_piutang' => 'required|array',
            'total_saldo' => 'required|array',
            'akun_pdpt' => 'required|array',
            'pdpt_paket' => 'required|array',
            'saldo_t' => 'required|array',
            'saldo_dok' => 'required|array',
        ]);
            
        try{
            
            $fields = array (
                'tanggal' => $this->reverseDate($request->tgl_input,"/","-"),
                'keterangan' => $request->keterangan,
                'kode_pp' => Session::get('kodePP'),
                'kode_curr' => $request->kode_curr,
                'kurs' => $request->kurs,
                'no_paket' => $request->paket,
                'no_jadwal' => $request->jadwal,
                'nilai_pdpt' => $this->joinNum($request->total_pdpt),
                'no_reg' => $request->no_reg,
                'akun_titip' => $request->akun_titip,
                'bayar_paket' => $request->bayar_paket,
                'akun_piutang' => $request->akun_piutang,
                'total_saldo' => $request->total_saldo,
                'akun_pdpt' => $request->akun_pdpt,
                'pdpt_paket' => $request->pdpt_paket,
                'saldo_t' => $request->saldo_t,
                'saldo_dok' => $request->saldo_dok,
            );
    
            $client = new Client();
            $response = $client->request('POST', config('api.url').'dago-trans/closing-jadwal',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
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
            'no_bukti' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/closing-jadwal-detail?no_bukti='.$request->no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->no_bukti
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'no_bukti' => 'required',
            'tgl_input' => 'required',
            'keterangan' => 'required',
            'kode_curr' => 'required',
            'kurs' => 'required',
            'paket' => 'required',
            'jadwal' => 'required',
            'total_pdpt' => 'required',
            'no_reg' => 'required|array',
            'akun_titip' => 'required|array',
            'bayar_paket' => 'required|array',
            'akun_piutang' => 'required|array',
            'total_saldo' => 'required|array',
            'akun_pdpt' => 'required|array',
            'pdpt_paket' => 'required|array',
            'saldo_t' => 'required|array',
            'saldo_dok' => 'required|array',
        ]);
            
        try{
            $bayar_paket = array();
            $total_saldo = array();
            $pdpt_paket = array();
            $saldo_t = array();
            $saldo_dok = array();
            if(isset($request->bayar_paket)){
                
                for($i=0;$i<count($request->bayar_paket);$i++){
                    $bayar_paket[] = $this->joinNum($request->bayar_paket[$i]);
                    $total_saldo[] = $this->joinNum($request->total_saldo[$i]);
                    $pdpt_paket[] = $this->joinNum($request->pdpt_paket[$i]);
                    $saldo_t[] = $this->joinNum($request->saldo_t[$i]);
                    $saldo_dok[] = $this->joinNum($request->saldo_dok[$i]);
                }
            }
            $fields = array (
                'no_bukti' => $request->no_bukti,
                'tanggal' => $this->reverseDate($request->tgl_input,"/","-"),
                'keterangan' => $request->keterangan,
                'kode_pp' => Session::get('kodePP'),
                'kode_curr' => $request->kode_curr,
                'kurs' => $request->kurs,
                'no_paket' => $request->paket,
                'no_jadwal' => $request->jadwal,
                'nilai_pdpt' => $this->joinNum($request->total_pdpt),
                'no_reg' => $request->no_reg,
                'akun_titip' => $request->akun_titip,
                'bayar_paket' => $bayar_paket,
                'akun_piutang' => $request->akun_piutang,
                'total_saldo' => $total_saldo,
                'akun_pdpt' => $request->akun_pdpt,
                'pdpt_paket' => $pdpt_paket,
                'saldo_t' => $saldo_t,
                'saldo_dok' => $saldo_dok,
            );
    

            $client = new Client();
            $response = $client->request('PUT', config('api.url').'dago-trans/closing-jadwal',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
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
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $this->validate($request, [
            'no_bukti' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('DELETE', config('api.url').'dago-trans/closing-jadwal?no_bukti='.$request->no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->no_bukti
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

}
