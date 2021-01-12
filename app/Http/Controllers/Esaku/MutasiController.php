<?php

namespace App\Http\Controllers\Esaku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class MutasiController extends Controller { 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('toko-auth/login')->with('alert','Session telah habis !');
        }
    }
    
    public function generateKode(Request $request){
        try {
            $this->validate($request, [
                'tanggal' => 'required',
                'jenis' => 'required',
            ]);

            $explode = explode("/", $request->tanggal);
            $tanggal = "$explode[2]-$explode[1]-$explode[0]";
            $jenis = $request->jenis;

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/generate-mutasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'tanggal' => $tanggal,
                    'jenis' => $jenis
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['result' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
}

?>