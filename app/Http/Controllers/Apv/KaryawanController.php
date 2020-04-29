<?php

namespace App\Http\Controllers\Apv;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'http://api.simkug.com/api/apv/';

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
        $client = new Client();
        $response = $client->request('GET', $this->link.'karyawan',[
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
            'kode_jab' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasfile('file_gambar')){
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
                    'contents' => file_get_contents($request->file('file_gambar')->getPath()),
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
        $response = $client->request('POST', $this->link.'karyawan',[
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new Client();
        $response = $client->request('GET', $this->link.'karyawan/'.$id,[
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
            'email' => 'required',
            'no_telp' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $client = new Client();
        $response = $client->request('POST', $this->link.'karyawan/'.$nik,[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'form_params' => [
                'kode_lokasi' => Session::get('lokasi'),
                'nik' => $request->nuk,
                'nama' => $request->nama,
                'kode_pp' => $request->kode_pp,
                'kode_jab' => $request->kode_jab,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'foto' => $request->foto
            
            ]
        ]);
        
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            return response()->json(['data' => $data["success"]], 200);  
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
        $client = new Client();
        $response = $client->request('DELETE', $this->link.'karyawan/'.$id,[
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
    
    }
}
