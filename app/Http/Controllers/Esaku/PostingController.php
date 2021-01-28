<?php

namespace App\Http\Controllers\Esaku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login')->with('alert','Session telah habis !');
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

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    public function getModul(){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/modul2',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
                if(count($data) >0){
                    
                    for($i=0;$i<count($data);$i++){
                        $data[$i]["checkbox"] = ""; 
                        $data[$i]["status"] = "TRUE";
                    }
                }
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
        $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'status.*' => 'required',
            'no_bukti.*' => 'required',
            'form.*' => 'required'
        ]);

        try{
            $detail = array();
            if(isset($request->no_bukti)){
                $no_bukti = $request->no_bukti;
                $status = $request->status;
                $form = $request->form;
                for($i=0;$i<count($no_bukti);$i++){
                    $detail[] = array(
                        'status' => $status[$i],
                        'no_bukti' => $no_bukti[$i],
                        'form' => $form[$i]
                    );
                }
            }
    
            $fields =
                  array (
                    'tanggal' => $this->reverseDate($request->tanggal,"/","-"),
                    'deskripsi' => $request->deskripsi,
                    'detail' => $detail
                  );
    
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/posting',[
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
    public function loadJurnal(Request $request)
    {
        $this->validate($request, [
            'modul.*' => 'required',
            'per1.*' => 'required',
            'per2.*' => 'required'
        ]);

        try{

            $detail['data_modul'] = array();
            if(isset($request->modul)){
                $modul = $request->modul;
                $per1 = $request->per1;
                $per2 = $request->per2;
                $status = $request->status;
                for($i=0;$i<count($modul);$i++){
                    $detail['data_modul'][] = array(
                        'modul' => $modul[$i],
                        'periode_awal' => $per1[$i],
                        'periode_akhir' => $per2[$i]
                    );
                }
            }
    
    
            $fields = $detail;
    
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/posting-jurnal',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
                if(count($data["data"]) >0){
                    
                    for($i=0;$i<count($data["data"]);$i++){
                        $data["data"][$i]["no"] = ""; 
                    }
                }
            }
            return response()->json(['data' => $data], 200); 
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

}
