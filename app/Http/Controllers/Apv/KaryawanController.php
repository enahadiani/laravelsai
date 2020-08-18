<?php

namespace App\Http\Controllers\Apv;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/karyawan',[
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
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

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
            'nik' => 'required',
            'nama' => 'required',
            'kode_pp' => 'required',
            'kode_kota' => 'required',
            'nama_kota' => 'required',
            'kode_divisi' => 'required',
            'kode_jab' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            
        try{
            
            if($request->hasfile('file_gambar')){
                $image_path = $request->file('file_gambar')->getPathname();
                $image_mime = $request->file('file_gambar')->getmimeType();
                $image_org  = $request->file('file_gambar')->getClientOriginalName();
                $fields = [
                    [
                        'name' => 'nik',
                        'contents' => $request->nik,
                    ],
                    [
                        'name' => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ],
                    [
                        'name' => 'kode_kota',
                        'contents' => $request->kode_kota,
                    ], 
                    [
                        'name' => 'nama_kota',
                        'contents' => $request->nama_kota,
                    ],
                    [
                        'name' => 'kode_divisi',
                        'contents' => $request->kode_divisi,
                    ],
                    [
                        'name' => 'kode_jab',
                        'contents' => $request->kode_jab,
                    ],
                    [
                        'name' => 'no_telp',
                        'contents' => $request->no_telp,
                    ],
                    [
                        'name' => 'email',
                        'contents' => $request->email,
                    ],
                    [
                        'name'     => 'foto',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    ]
                    ];
                
            }else{
                $fields = [
                    [
                        'name' => 'nik',
                        'contents' => $request->nik,
                    ],
                    [
                        'name' => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ],
                    [
                        'name' => 'kode_kota',
                        'contents' => $request->kode_kota,
                    ], 
                    [
                        'name' => 'nama_kota',
                        'contents' => $request->nama_kota,
                    ],
                    [
                        'name' => 'kode_divisi',
                        'contents' => $request->kode_divisi,
                    ],
                    [
                        'name' => 'kode_jab',
                        'contents' => $request->kode_jab,
                    ],
                    [
                        'name' => 'no_telp',
                        'contents' => $request->no_telp,
                    ],
                    [
                        'name' => 'email',
                        'contents' => $request->email,
                    ]
                ];
            }


            $client = new Client();
            $response = $client->request('POST',  config('api.url').'apv/karyawan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data["success"]], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/karyawan/'.$id,[
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kode_pp' => 'required',
            'kode_jab' => 'required',
            'kode_kota' => 'required',
            'nama_kota' => 'required',
            'kode_divisi' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try{

            if($request->hasfile('file_gambar')){
                $image_path = $request->file('file_gambar')->getPathname();
                $image_mime = $request->file('file_gambar')->getmimeType();
                $image_org  = $request->file('file_gambar')->getClientOriginalName();
                $fields = [
                    [
                        'name' => 'nik',
                        'contents' => $request->nik,
                    ],
                    [
                        'name' => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ],
                    [
                        'name' => 'kode_kota',
                        'contents' => $request->kode_kota,
                    ], 
                    [
                        'name' => 'nama_kota',
                        'contents' => $request->nama_kota,
                    ],
                    [
                        'name' => 'kode_divisi',
                        'contents' => $request->kode_divisi,
                    ],
                    [
                        'name' => 'kode_jab',
                        'contents' => $request->kode_jab,
                    ],
                    [
                        'name' => 'no_telp',
                        'contents' => $request->no_telp,
                    ],
                    [
                        'name' => 'email',
                        'contents' => $request->email,
                    ],
                    [
                        'name'     => 'foto',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    ]
                    ];
                
            }else{
                $fields = [
                    [
                        'name' => 'nik',
                        'contents' => $request->nik,
                    ],
                    [
                        'name' => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ],
                    [
                        'name' => 'kode_kota',
                        'contents' => $request->kode_kota,
                    ], 
                    [
                        'name' => 'nama_kota',
                        'contents' => $request->nama_kota,
                    ],
                    [
                        'name' => 'kode_divisi',
                        'contents' => $request->kode_divisi,
                    ],
                    [
                        'name' => 'kode_jab',
                        'contents' => $request->kode_jab,
                    ],
                    [
                        'name' => 'no_telp',
                        'contents' => $request->no_telp,
                    ],
                    [
                        'name' => 'email',
                        'contents' => $request->email,
                    ]
                ];
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'apv/karyawan/'.$nik,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data["success"]], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'apv/karyawan/'.$id,[
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    
    }
}
