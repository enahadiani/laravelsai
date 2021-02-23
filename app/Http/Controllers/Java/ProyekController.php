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
            'tanggal_selesai' => 'required'
        ]);

        try {  
            $form = array(
                'tgl_mulai' => $this->convertDate($request->input('tanggal_mulai')),
                'kode_cust' => $request->input('kode_cust'),
                'nilai' => $this->joinNum($request->input('nilai')),
                'ppn' => $request->input('ppn'),
                'status_ppn' => $request->input('status_ppn'),
                'periode' => $this->convertPeriode($request->input('tanggal_mulai')),
                'keterangan' => $request->input('keterangan'),
                'tgl_selesai' => $this->convertDate($request->input('tanggal_selesai')),
                'no_proyek' => $request->input('no_proyek'),
                'no_kontrak' => $request->input('no_kontrak')
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/proyek',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $form
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
            $response = $client->request('GET',  config('api.url').'java-trans/prpyek?no_proyek='.$request->query('kode'),
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

            $form = array(
                'tgl_mulai' => $this->convertDate($request->input('tanggal_mulai')),
                'kode_cust' => $request->input('kode_cust'),
                'nilai' => $this->joinNum($request->input('nilai')),
                'ppn' => $request->input('ppn'),
                'status_ppn' => $request->input('status_ppn'),
                'periode' => $this->convertPeriode($request->input('tanggal_mulai')),
                'keterangan' => $request->input('keterangan'),
                'tgl_selesai' => $this->convertDate($request->input('tanggal_selesai')),
                'no_proyek' => $request->input('no_proyek'),
                'no_kontrak' => $request->input('no_kontrak')
            );

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'java-trans/proyek',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $form
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
   
}
