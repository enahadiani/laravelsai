<?php

namespace App\Http\Controllers\Esaku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ClosingPeriodeController extends Controller
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
            'modul' => 'required',
            'keterangan' => 'required',
            'per_awal1' => 'required',
            'per_akhir1' => 'required',
            'per_awal2' => 'required',
            'per_akhir2' => 'required',
            'per_aktif' => 'required',
            'per_next' => 'required'
        ]);

        try {   
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'toko-trans/closing-periode',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'modul' => $request->modul,
                        'keterangan' => $request->keterangan,
                        'per_awal1' => $request->per_awal1,
                        'per_akhir1' => $request->per_akhir1,
                        'per_awal2' => $request->per_awal2,
                        'per_akhir2' => $request->per_akhir2,
                        'per_aktif' => $request->per_aktif,
                        'per_next' => $request->per_next
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

    public function show() {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/closing-periode',
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
