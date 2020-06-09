<?php

namespace App\Http\Controllers\Saku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class MasakunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/gl/';
    // public $link = 'http://localhost:8080/lumenapi/public/api/gl/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('saku/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try{

            $client = new Client();
            $response = $client->request('GET', $this->link.'masakun',[
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
            return response()->json(['daftar' => $data, 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getCurrency(){
        try{

            $client = new Client();
            $response = $client->request('GET', $this->link.'currency',[
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
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getModul(){
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'modul',[
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
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
            
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getFlagAkun(){
        try{

            $client = new Client();
            $response = $client->request('GET', $this->link.'flag_akun',[
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
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getFlagAkunPerKode($kode_flag){
        try{

            $client = new Client();
            $response = $client->request('GET', $this->link.'flag_akun/'.$kode_flag,[
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
            return response()->json(['data'=> $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data["message"] = $res["message"];
            $data["status"] = false;
            return response()->json(['data'=> $data], 200);
        } 
    }

    public function getNeraca($kode_fs){
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'neraca/'.$kode_fs,[
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
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getNeracaPerKode($kode_fs,$kode_neraca){
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'neraca/'.$kode_fs.'/'.$kode_neraca,[
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
            $data["message"] = $res["message"];
            $data["status"] = false;
            return response()->json(['data'=> $data], 200);
        } 
    }

    public function getFSGar(){
        try{
            
            $client = new Client();
            $response = $client->request('GET', $this->link.'fsgar',[
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
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getNeracaGar($kode_fs){
        try{

            $client = new Client();
            $response = $client->request('GET', $this->link.'neracagar/'.$kode_fs,[
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
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
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
        $request->validate([
            'kode_akun' => 'required',
            'nama' => 'required',
            'modul' => 'required',
            'jenis' => 'required',
            'curr' => 'required',
            'block' => 'required',
            'gar' => 'required',
            'normal' => 'required',
        ]);

        try{

            $flag = array();
            if(isset($request->kode_flag)){
                $det = $request->kode_flag;
                for($i=0;$i<count($det);$i++){
                    $flag[] = array("kode_flag"=>$det[$i]);
                }
            }
    
            
            $keuangan = array();
            if(isset($request->kode_fs)){
                $det2 = $request->kode_fs;
                $det3 = $request->kode_neraca;
                for($i=0;$i<count($det2);$i++){
                    $keuangan[] = array("kode_fs"=>$det2[$i],"kode_neraca"=>$det3[$i]);
                }
            }
    
            $anggaran = array();
            if(isset($request->kode_fsgar)){
                $det4 = $request->kode_fsgar;
                $det5 = $request->kode_neracagar;
                for($i=0;$i<count($det4);$i++){
                    $anggaran[] = array("kode_fsgar"=>$det4[$i],"kode_neracagar"=>$det5);
                }
            }
    
            $fields['akun'][0] =
                  array (
                    'kode_akun' => $request->kode_akun,
                    'nama' => $request->nama,
                    'modul' => $request->modul,
                    'jenis' => $request->jenis,
                    'kode_curr' => $request->curr,
                    'block' => $request->block,
                    'status_gar' => $request->gar,
                    'normal' => $request->normal,
                    'flag' => $flag,
                    'keuangan' => $keuangan,
                    'anggaran' => $anggaran
                  );
    
            $client = new Client();
            $response = $client->request('POST', $this->link.'masakun',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data["success"]], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'masakun/'.$id,[
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
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }


    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $kode_akun)
    {
        $request->validate([
            'kode_akun' => 'required',
            'nama' => 'required',
            'modul' => 'required',
            'jenis' => 'required',
            'curr' => 'required',
            'block' => 'required',
            'gar' => 'required',
            'normal' => 'required',
        ]);

        try{

            $flag = array();
            if(isset($request->kode_flag)){
                $det = $request->kode_flag;
                for($i=0;$i<count($det);$i++){
                    $flag[] = array("kode_flag"=>$det[$i]);
                }
            }
    
            
            $keuangan = array();
            if(isset($request->kode_fs)){
                $det2 = $request->kode_fs;
                $det3 = $request->kode_neraca;
                for($i=0;$i<count($det2);$i++){
                    $keuangan[] = array("kode_fs"=>$det2[$i],"kode_neraca"=>$det3[$i]);
                }
            }
    
            $anggaran = array();
            if(isset($request->kode_fsgar)){
                $det4 = $request->kode_fsgar;
                $det5 = $request->kode_neracagar;
                for($i=0;$i<count($det4);$i++){
                    $anggaran[] = array("kode_fsgar"=>$det4[$i],"kode_neracagar"=>$det5);
                }
            }
    
            $fields['akun'][0] =
                  array (
                    'kode_akun' => $request->kode_akun,
                    'nama' => $request->nama,
                    'modul' => $request->modul,
                    'jenis' => $request->jenis,
                    'kode_curr' => $request->curr,
                    'block' => $request->block,
                    'status_gar' => $request->gar,
                    'normal' => $request->normal,
                    'flag' => $flag,
                    'keuangan' => $keuangan,
                    'anggaran' => $anggaran
                  );
    
            $client = new Client();
            $response = $client->request('PUT', $this->link.'masakun/'.$kode_akun,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data["success"]], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 

    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        try{

            $client = new Client();
            $response = $client->request('DELETE', $this->link.'masakun/'.$id,[
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
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    
    }
}
