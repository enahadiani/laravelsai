<?php

namespace App\Http\Controllers\Esaku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SyncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/toko-trans/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
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

    public function getSyncMaster(){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/sync-master',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true, 'message' => 'success','res' => $res], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    // public function syncMaster(Request $request)
    // {
        
    //     try{
    
    //         $client = new Client();
    //         $response = $client->request('POST',  config('api.url').'toko-trans/sync-master',[
    //             'headers' => [
    //                 'Authorization' => 'Bearer '.Session::get('token'),
    //                 'Content-Type'     => 'application/json'
    //             ]
    //         ]);
            
    //         if ($response->getStatusCode() == 200) { // 200 OK
    //             $response_data = $response->getBody()->getContents();
                
    //             $data = json_decode($response_data,true);
    //             return response()->json(["data" =>$data], 200);  
    //         }
    //     } catch (BadResponseException $ex) {
    //         $response = $ex->getResponse();
    //         $res = json_decode($response->getBody(),true);
    //         $result['message'] = $res["message"];
    //         $result['status']=false;
    //         return response()->json(["data" => $result], 200);
    //     } 
        
    // }

    public function syncMaster(Request $request)
    {
        
        try{
            $vendor = "";
            $barang = "";
            $bonus = "";
            $satuan = "";
            $gudang = "";
            $klp = "";
            $histori = "";
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/load-sync-master',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                if($res["status"]){
                    $vendor = $res["vendor"];
                    $barang = $res["barang"];
                    $bonus = $res["bonus"];
                    $satuan = $res["satuan"];
                    $gudang = $res["gudang"];
                    $klp = $res["klp"];
                    $histori = $res["histori"];
                }
            }

            $fields = array(
                'vendor' => $vendor,
                'barang' => $barang,
                'bonus' => $bonus,
                'satuan' => $satuan,
                'gudang' => $gudang,
                'klp' => $klp,
                'histori' => $histori,
            );

            $client2 = new Client();
            $response2 = $client2->request('POST',  config('api.url').'toko-trans/sync-master',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                ],
                'form_params' => $fields
            ]);
            
            if ($response2->getStatusCode() == 200) { // 200 OK
                $response_data2 = $response2->getBody()->getContents();
                
                $data2 = json_decode($response_data2,true);
                return response()->json(["data" =>$data2], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

}
