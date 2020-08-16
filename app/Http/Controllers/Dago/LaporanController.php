<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public $link = 'https://api.simkug.com/api/dago-report/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dago-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getMkuOperasional(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-mku-operasional',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getMkuKeuangan(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-mku-keuangan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            
            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getPaket(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-paket',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            
            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getDokumen(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-dokumen',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }
            
            
            if(isset($request->back)){
                $res['back']=true;
            }

            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getJamaah(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-jamaah',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }
            
            if(isset($request->back)){
                $res['back']=true;
            }

            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getFormRegistrasi(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-form-registrasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }
            
            if(isset($request->back)){
                $res['back']=true;
            }
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getRegistrasi(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-registrasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getPembayaran(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-pembayaran',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_reg' => $request->no_reg,
                    'no_kb' => $request->no_kwitansi
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getTerima(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-terima',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_reg' => $request->no_reg,
                    'no_kwitansi' => $request->no_kwitansi
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getRekapSaldo(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-rekap-saldo',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }
            
            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getKartuPembayaran(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-kartu-pembayaran',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getDetailSaldo(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-detail-saldo',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }
            
            
            if(isset($request->back)){
                $res['back']=true;
            }

            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getDetailTagihan(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-detail-tagihan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }
            
            if(isset($request->back)){
                $res['back']=true;
            }

            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getDetailBayar(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-detail-bayar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_paket' => $request->no_paket,
                    'no_jadwal' => $request->no_jadwal,
                    'no_reg' => $request->no_reg,
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getJurnal(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-report/lap-jurnal',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'no_bukti' => $request->no_bukti
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
                $detail = $res["detail_jurnal"];
                
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }

            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res,'detail_jurnal'=>$detail,'lokasi'=>Session::get('namaLokasi'),], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    
}
