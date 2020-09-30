<?php

namespace App\Http\Controllers\Wisata;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('wisata-auth/login');
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
            $response = $client->request('GET',  config('api.url').'wisata-master/mitra',[
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
            'kode_mitra' => 'required',
            'nama' => 'required',
            'alamat' => 'required',            
            'no_tel' => 'required',            
            'kode_camat' => 'required',            
            'website' => 'required',            
            'email' => 'required',            
            'pic' => 'required', 
            'no_hp' => 'required', 
            'status' => 'required',
            'coor_x' => 'required',
            'coor_y' => 'required',
            'kode_subjenis' => 'required|array',    
        ]);

        try {   
                $fields_dok = array();
                $send_data = array();
                $fields_nama_dok = array();
                $arrSubjenis = array();

                $fields = [
                        [
                            'name' => 'kode_mitra',
                            'contents' => $request->kode_mitra,
                        ],
                        [
                            'name' => 'nama',
                            'contents' => $request->nama,
                        ],
                        [
                            'name' => 'alamat',
                            'contents' => $request->alamat,
                        ],
                        [
                            'name' => 'no_tel',
                            'contents' => $request->no_tel,
                        ],
                        [
                            'name' => 'kecamatan',
                            'contents' => $request->kode_camat,
                        ],
                        [
                            'name' => 'website',
                            'contents' => $request->website,
                        ],
                        [
                            'name' => 'email',
                            'contents' => $request->email,
                        ],
                        [
                            'name' => 'pic',
                            'contents' => $request->email,
                        ],
                        [
                            'name' => 'no_hp',
                            'contents' => $request->no_hp,
                        ],
                        [
                            'name' => 'status',
                            'contents' => $request->status,
                        ],
                        [
                            'name' => 'coor_x',
                            'contents' => $request->coor_x,
                        ],
                        [
                            'name' => 'coor_y',
                            'contents' => $request->coor_y,
                        ],
                    ];
                
                if(count($request->generate)) {
                    for($i=0;$i<count($request->generate);$i++) {
                        if($request->generate[$i] == "true") {
                            $arrSubJenis[] = array('name'=> 'arrsub[][kode_subjenis]','contents'=> $request->kode_subjenis[$i]);
                        }
                    }
                    $send_data = array_merge($fields, $arrSubJenis);
                }
                
                $cek = $request->file_dok;
                if(!empty($cek)){
                    if(count($request->file_dok) > 0) {
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
                        $send_data = array_merge($send_data,$fields_dok,$fields_nama_dok);
                    }
                }
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'wisata-master/mitra',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'  => 'application/json',
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

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/mitrabid?kode_mitra='.$id,
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
            'kode_mitra' => 'required',
            'nama' => 'required',
            'alamat' => 'required',            
            'no_tel' => 'required',            
            'kode_camat' => 'required',            
            'website' => 'required',            
            'email' => 'required',            
            'pic' => 'required', 
            'no_hp' => 'required', 
            'status' => 'required',
            'coor_x' => 'required',
            'coor_y' => 'required',
            'kode_subjenis' => 'required|array',    
        ]);

        try {   
            $fields_dok = array();    
            $send_data = array();
            $fields_nama_dok = array();
            $arrSubjenis = array();

            $fields = [
                    [
                        'name' => 'kode_mitra',
                        'contents' => $request->kode_mitra,
                    ],
                    [
                        'name' => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'alamat',
                        'contents' => $request->alamat,
                    ],
                    [
                        'name' => 'no_tel',
                        'contents' => $request->no_tel,
                    ],
                    [
                        'name' => 'kecamatan',
                        'contents' => $request->kode_camat,
                    ],
                    [
                        'name' => 'website',
                        'contents' => $request->website,
                    ],
                    [
                        'name' => 'email',
                        'contents' => $request->email,
                    ],
                    [
                        'name' => 'pic',
                        'contents' => $request->email,
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->no_hp,
                    ],
                    [
                        'name' => 'status',
                        'contents' => $request->status,
                    ],
                    [
                        'name' => 'coor_x',
                        'contents' => $request->coor_x,
                    ],
                    [
                        'name' => 'coor_y',
                        'contents' => $request->coor_y,
                    ],
                ];
                
            if(count($request->generate)) {
                for($i=0;$i<count($request->generate);$i++) {
                    if($request->generate[$i] == "true") {
                            $arrSubJenis[] = array('name'=> 'arrsub[][kode_subjenis]','contents'=> $request->kode_subjenis[$i]);
                    }
                }
                $send_data = array_merge($fields, $arrSubJenis);
            }
                
            $cek = $request->file_dok;
            if(!empty($cek)){
                if(count($request->file_dok) > 0) {
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
                        $send_data = array_merge($send_data,$fields_dok,$fields_nama_dok);
                    }
            }
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'wisata-master/mitraupdate',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'  => 'application/json',
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
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'wisata-master/mitra?kode_mitra='.$id,
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
