<?php

namespace App\Http\Controllers\Rtrw;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class WargaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('rtrw-auth/login')->with('alert','Session telah habis !');
        }
    }

    public function index(Request $request){

        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/mawar',[
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
            'kode_rt' => 'required',
            'blok' => 'required',
            'no_rumah' => 'required',
            'tgl_masuk' => 'required',
            'sts_masuk' => 'required',
            'nama' => 'required|array',
            'alias' => 'required|array',
            'jk' => 'required|array',
            'tempat_lahir' => 'required|array',
            'tgl_lahir' => 'required|array',
            'agama' => 'required|array',
            'goldar' => 'required|array',
            'pendidikan' => 'required|array',
            'pekerjaan' => 'required|array',
            'sts_nikah' => 'required|array',
            'sts_hub' => 'required|array',
            'sts_wni' => 'required|array',
            'no_hp' => 'required|array',
        ]);

        try {

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'rtrw/mawar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $request->all()
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
            $data['cek'] = config('api.url').'rtrw/mawar';
            return response()->json(['data' => $data], 500);
        }
    }

    public function show(Request $request,$no_rumah) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/mawar-detail',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=> [
                    'no_rumah' => $no_rumah
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
