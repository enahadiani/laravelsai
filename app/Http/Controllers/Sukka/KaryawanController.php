<?php

namespace App\Http\Controllers\Sukka;

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
            return redirect('sukka-auth/login');
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
            $response = $client->request('GET',  config('api.url').'sukka-master/karyawan',[
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

    public function getGrKaryawan(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-master/karyawan-nik',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->input()
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
            'alamat' => 'required',
            'jab' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'kode_pp' => 'required',
            'npwp' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
            'status' => 'required',
            'band' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'no_hp' => 'required',
            'flag_aktif' => 'required',
            'kode_jab' => 'required',
            'tgl_lahir' => 'required',
            'sts_sdm' => 'required',
            'nik2' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:3072'
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
                        'name' => 'alamat',
                        'contents' => $request->alamat,
                    ],
                    [
                        'name' => 'jabatan',
                        'contents' => $request->jab,
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
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ],
                    [
                        'name' => 'npwp',
                        'contents' => $request->npwp,
                    ],
                    [
                        'name' => 'bank',
                        'contents' => $request->bank,
                    ],
                    [
                        'name' => 'cabang',
                        'contents' => $request->cabang,
                    ],
                    [
                        'name' => 'no_rek',
                        'contents' => $request->no_rek,
                    ],
                    [
                        'name' => 'nama_rek',
                        'contents' => $request->nama_rek,
                    ],
                    [
                        'name' => 'status',
                        'contents' => $request->status,
                    ],
                    [
                        'name' => 'grade',
                        'contents' => $request->band,
                    ],
                    [
                        'name' => 'kota',
                        'contents' => $request->kota,
                    ],
                    [
                        'name' => 'kode_pos',
                        'contents' => $request->kode_pos,
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->no_hp,
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->flag_aktif,
                    ],
                    [
                        'name' => 'kode_jab',
                        'contents' => $request->kode_jab,
                    ],
                    [
                        'name' => 'tgl_lahir',
                        'contents' => $request->tgl_lahir,
                    ],
                    [
                        'name' => 'sts_sdm',
                        'contents' => $request->sts_sdm,
                    ],
                    [
                        'name' => 'nik2',
                        'contents' => $request->nik2,
                    ],
                    [
                        'name'     => 'foto',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    ],
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
                        'name' => 'alamat',
                        'contents' => $request->alamat,
                    ],
                    [
                        'name' => 'jabatan',
                        'contents' => $request->jab,
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
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ],
                    [
                        'name' => 'npwp',
                        'contents' => $request->npwp,
                    ],
                    [
                        'name' => 'bank',
                        'contents' => $request->bank,
                    ],
                    [
                        'name' => 'cabang',
                        'contents' => $request->cabang,
                    ],
                    [
                        'name' => 'no_rek',
                        'contents' => $request->no_rek,
                    ],
                    [
                        'name' => 'nama_rek',
                        'contents' => $request->nama_rek,
                    ],
                    [
                        'name' => 'status',
                        'contents' => $request->status,
                    ],
                    [
                        'name' => 'grade',
                        'contents' => $request->band,
                    ],
                    [
                        'name' => 'kota',
                        'contents' => $request->kota,
                    ],
                    [
                        'name' => 'kode_pos',
                        'contents' => $request->kode_pos,
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->no_hp,
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->flag_aktif,
                    ],
                    [
                        'name' => 'kode_jab',
                        'contents' => $request->kode_jab,
                    ],
                    [
                        'name' => 'tgl_lahir',
                        'contents' => $request->tgl_lahir,
                    ],
                    [
                        'name' => 'sts_sdm',
                        'contents' => $request->sts_sdm,
                    ],
                    [
                        'name' => 'nik2',
                        'contents' => $request->nik2,
                    ],
                ];
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sukka-master/karyawan',[
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
            $response = $client->request('GET',  config('api.url').'sukka-master/karyawan/'.$id,[
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
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jab' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'kode_pp' => 'required',
            'npwp' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
            'status' => 'required',
            'band' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'no_hp' => 'required',
            'flag_aktif' => 'required',
            'kode_jab' => 'required',
            'tgl_lahir' => 'required',
            'sts_sdm' => 'required',
            'nik2' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:3072'
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
                        'name' => 'alamat',
                        'contents' => $request->alamat,
                    ],
                    [
                        'name' => 'jabatan',
                        'contents' => $request->jab,
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
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ],
                    [
                        'name' => 'npwp',
                        'contents' => $request->npwp,
                    ],
                    [
                        'name' => 'bank',
                        'contents' => $request->bank,
                    ],
                    [
                        'name' => 'cabang',
                        'contents' => $request->cabang,
                    ],
                    [
                        'name' => 'no_rek',
                        'contents' => $request->no_rek,
                    ],
                    [
                        'name' => 'nama_rek',
                        'contents' => $request->nama_rek,
                    ],
                    [
                        'name' => 'status',
                        'contents' => $request->status,
                    ],
                    [
                        'name' => 'grade',
                        'contents' => $request->band,
                    ],
                    [
                        'name' => 'kota',
                        'contents' => $request->kota,
                    ],
                    [
                        'name' => 'kode_pos',
                        'contents' => $request->kode_pos,
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->no_hp,
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->flag_aktif,
                    ],
                    [
                        'name' => 'kode_jab',
                        'contents' => $request->kode_jab,
                    ],
                    [
                        'name' => 'tgl_lahir',
                        'contents' => $request->tgl_lahir,
                    ],
                    [
                        'name' => 'sts_sdm',
                        'contents' => $request->sts_sdm,
                    ],
                    [
                        'name' => 'nik2',
                        'contents' => $request->nik2,
                    ],
                    [
                        'name'     => 'foto',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    ],
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
                        'name' => 'alamat',
                        'contents' => $request->alamat,
                    ],
                    [
                        'name' => 'jabatan',
                        'contents' => $request->jab,
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
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ],
                    [
                        'name' => 'npwp',
                        'contents' => $request->npwp,
                    ],
                    [
                        'name' => 'bank',
                        'contents' => $request->bank,
                    ],
                    [
                        'name' => 'cabang',
                        'contents' => $request->cabang,
                    ],
                    [
                        'name' => 'no_rek',
                        'contents' => $request->no_rek,
                    ],
                    [
                        'name' => 'nama_rek',
                        'contents' => $request->nama_rek,
                    ],
                    [
                        'name' => 'status',
                        'contents' => $request->status,
                    ],
                    [
                        'name' => 'grade',
                        'contents' => $request->band,
                    ],
                    [
                        'name' => 'kota',
                        'contents' => $request->kota,
                    ],
                    [
                        'name' => 'kode_pos',
                        'contents' => $request->kode_pos,
                    ],
                    [
                        'name' => 'no_hp',
                        'contents' => $request->no_hp,
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->flag_aktif,
                    ],
                    [
                        'name' => 'kode_jab',
                        'contents' => $request->kode_jab,
                    ],
                    [
                        'name' => 'tgl_lahir',
                        'contents' => $request->tgl_lahir,
                    ],
                    [
                        'name' => 'sts_sdm',
                        'contents' => $request->sts_sdm,
                    ],
                    [
                        'name' => 'nik2',
                        'contents' => $request->nik2,
                    ],
                ];
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sukka-master/karyawan/'.$nik,[
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
            $response = $client->request('DELETE',  config('api.url').'sukka-master/karyawan/'.$id,[
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
