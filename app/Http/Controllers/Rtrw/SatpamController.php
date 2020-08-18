<?php

namespace App\Http\Controllers\Rtrw;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SatpamController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/satpam',[
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_satpam' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'flag_aktif' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            
        try{
            
            if($request->hasfile('file_gambar')){
                $image_path = $request->file('file_gambar')->getPathname();
                $image_mime = $request->file('file_gambar')->getmimeType();
                $image_org  = $request->file('file_gambar')->getClientOriginalName();
                $fields = [
                    [
                        'name' => 'id_satpam',
                        'contents' => $request->id_satpam,
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
                        'name' => 'status',
                        'contents' => $request->status,
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->flag_aktif,
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->no_hp,
                    ],
                    [
                        'name' => 'password',
                        'contents' => $request->password,
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
                        'name' => 'id_satpam',
                        'contents' => $request->id_satpam,
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
                        'name' => 'status',
                        'contents' => $request->status,
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->no_hp,
                    ],
                    [
                        'name' => 'password',
                        'contents' => $request->password,
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->flag_aktif,
                    ]
                ];
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rtrw/satpam',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
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
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_satpam)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/satpam',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'id_satpam' => $id_satpam
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
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
    public function update(Request $request, $id_satpam)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
            'status' => 'required',
            'flag_aktif' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try{

            if($request->hasfile('file_gambar')){
                $image_path = $request->file('file_gambar')->getPathname();
                $image_mime = $request->file('file_gambar')->getmimeType();
                $image_org  = $request->file('file_gambar')->getClientOriginalName();
                $fields = [
                    [
                        'name' => 'id_satpam',
                        'contents' => $id_satpam,
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
                        'name' => 'status',
                        'contents' => $request->status,
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->no_hp,
                    ],
                    [
                        'name' => 'password',
                        'contents' => $request->password,
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->flag_aktif,
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
                        'name' => 'id_satpam',
                        'contents' => $id_satpam,
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
                        'name' => 'no_hp',
                        'contents' => $request->no_hp,
                    ],
                    [
                        'name' => 'password',
                        'contents' => $request->password,
                    ],
                    [
                        'name' => 'status',
                        'contents' => $request->status,
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->flag_aktif,
                    ]
                ];
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rtrw/satpam-ubah',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
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
            return response()->json(['data' => $data], 200);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_satpam)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'rtrw/satpam',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'id_satpam' => $id_satpam
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
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
