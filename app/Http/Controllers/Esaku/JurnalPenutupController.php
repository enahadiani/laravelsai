<?php

namespace App\Http\Controllers\Esaku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class JurnalPenutupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

    public function store(Request $request) {
        $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'nik_closing' => 'required',
            'nik_app' => 'required'
        ]);

        try {   
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'toko-trans/jurnal-penutup',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'tanggal' => $request->tanggal,
                        'deskripsi' => $request->deskripsi,
                        'nik_closing' => $request->nik_closing,
                        'nik_app' => $request->nik_app,
                        'periode_aktif' => Session::get('periode'),
                        'nik_user' => Session::get('nikUser'),
                        'akun_jp' => $request->akun_jp
                    ]
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

    public function getDataAwal() {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/jurnal-penutup',
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
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

   
}
