<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/dago-master/';

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

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET', $this->link.'agen',[
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
            'no_agen' => 'required',
            'nama_agen' => 'required',
            'alamat' => 'required',
            'flag_aktif' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'norek' => 'required',
            'namarek' => 'required',
            'kode_marketing' => 'required',
        ]);

        try {   
                $tgl_lahir = str_replace('/','-',$request->tgl_lahir);
                $client = new Client();
                $response = $client->request('POST', $this->link.'agen',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_agen' => $request->no_agen,
                        'nama_agen' => $request->nama_agen,
                        'alamat' => $request->alamat,
                        'flag_aktif' => $request->flag_aktif,
                        'tempat_lahir' => $request->tempat_lahir,
                        'tgl_lahir' => $tgl_lahir,
                        'no_hp' => $request->no_hp,
                        'email' => $request->email,
                        'bank' => $request->bank,
                        'cabang' => $request->cabang,
                        'norek' => $request->norek,
                        'namarek' => $request->namarek,
                        'kode_marketing' => $request->kode_marketing,
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

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'agen?no_agen='.$id,
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

    public function update(Request $request, $id) {
        $this->validate($request, [
            'no_agen' => 'required',
            'nama_agen' => 'required',
            'alamat' => 'required',
            'flag_aktif' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'norek' => 'required',
            'namarek' => 'required',
            'kode_marketing' => 'required',
        ]);

        try {
                $tgl_lahir = str_replace('/','-',$request->tgl_lahir);
                $client = new Client();
                $response = $client->request('PUT', $this->link.'agen?no_agen='.$id,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_agen' => $request->no_agen,
                        'nama_agen' => $request->nama_agen,
                        'alamat' => $request->alamat,
                        'flag_aktif' => $request->flag_aktif,
                        'tempat_lahir' => $request->tempat_lahir,
                        'tgl_lahir' => $tgl_lahir,
                        'no_hp' => $request->no_hp,
                        'email' => $request->email,
                        'bank' => $request->bank,
                        'cabang' => $request->cabang,
                        'norek' => $request->norek,
                        'namarek' => $request->namarek,
                        'kode_marketing' => $request->kode_marketing,
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
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE', $this->link.'agen?no_agen='.$id,
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
   
}
