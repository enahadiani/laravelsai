<?php

namespace App\Http\Controllers\Sai;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class FakturPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('sai-auth/login')->with('alert','Session telah habis !');
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
            $response = $client->request('GET',  config('api.url').'sai-trans/faktur-pajak',[
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
            'no_faktur' => 'required',
            'tanggal' => 'required',
            'periode' => 'required',
            'no_tagihan' => 'required',
            'keterangan' => 'required',
        ]);

        try { 
                $explode_tgl = explode('/', $request->tanggal);
                $tgl = $explode_tgl[0];
                $bln = $explode_tgl[1];
                $tahun = $explode_tgl[2];
                $tanggal = $tahun."-".$bln."-".$tgl;

                $fields = [
                    [
                        'name' => 'no_fp',
                        'contents' => $request->no_faktur,
                    ],
                    [
                        'name' => 'tanggal',
                        'contents' => $tanggal,
                    ],
                    [
                        'name' => 'no_bill',
                        'contents' => $request->no_tagihan,
                    ],
                    [
                        'name' => 'periode',
                        'contents' => $request->periode,
                    ],
                    [
                        'name' => 'keterangan',
                        'contents' => $request->keterangan,
                    ],
                ];

                $cek = $request->file_dok;
                $fields_dok = array();
                $fields_nama_dok = array();
                if(!empty($cek)){
                    if(count($request->file_dok) > 0){
            
                        for($i=0;$i<count($request->file_dok);$i++){
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $fields_dok[$i] = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' ),
                            );
                            $fields_nama_dok[$i] = array(
                                'name' => 'nama_file[]',
                                'contents' => $image_org
                            );
                        }
                            $send_data = array_merge($fields,$fields_dok,$fields_nama_dok);
                        }
                }
            
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sai-trans/faktur-pajak',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $send_data
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

    public function show($id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sai-trans/faktur-pajak-detail?no_fp='.$id,
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
            'no_faktur' => 'required',
            'tanggal' => 'required',
            'periode' => 'required',
            'no_tagihan' => 'required',
            'keterangan' => 'required',
        ]);

        try { 
                $explode_tgl = explode('/', $request->tanggal);
                $tgl = $explode_tgl[0];
                $bln = $explode_tgl[1];
                $tahun = $explode_tgl[2];
                $tanggal = $tahun."-".$bln."-".$tgl;

                $fields = [
                    [
                        'name' => 'no_fp',
                        'contents' => $request->no_faktur,
                    ],
                    [
                        'name' => 'tanggal',
                        'contents' => $tanggal,
                    ],
                    [
                        'name' => 'no_bill',
                        'contents' => $request->no_tagihan,
                    ],
                    [
                        'name' => 'periode',
                        'contents' => $request->periode,
                    ],
                    [
                        'name' => 'keterangan',
                        'contents' => $request->keterangan,
                    ],
                ];

                $cek = $request->file_dok;
                $fields_dok = array();
                $fields_nama_dok = array();
                if(!empty($cek)){
                    if(count($request->file_dok) > 0){
            
                        for($i=0;$i<count($request->file_dok);$i++){
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $fields_dok[$i] = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' ),
                            );
                            $fields_nama_dok[$i] = array(
                                'name' => 'nama_file[]',
                                'contents' => $image_org
                            );
                        }
                    }
                }
                $send_data = array_merge($fields,$fields_dok,$fields_nama_dok);
            
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sai-trans/faktur-pajak-ubah?no_fp='.$id,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $send_data
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

    public function destroy($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'sai-trans/faktur-pajak?no_fp='.$id,
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
