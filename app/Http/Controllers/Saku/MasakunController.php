<?php

namespace App\Http\Controllers\Saku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class MasakunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'http://api.simkug.com/api/gl/';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $client = new Client();
        $response = $client->request('GET', $this->link.'masakun',[
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
        return response()->json(['data' => $data], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'kode_fs' => 'required',
    //         'nama' => 'required',
    //         'tgl_awal' => 'required',
    //         'tgl_akhir' => 'required',
    //         'flag_status' => 'required',
    //     ]);

    //     $client = new Client();
    //     $response = $client->request('POST', $this->link.'masakun',[
    //         'headers' => [
    //             'Authorization' => 'Bearer '.Session::get('token'),
    //             'Accept'     => 'application/json',
    //         ],
    //         'form_params' => [
    //             'kode_fs' => $request->kode_fs,
    //             'kode_lokasi' => Session::get('lokasi'),
    //             'nama' => $request->nama,
    //             'tgl_awal' => $request->tgl_awal,
    //             'tgl_akhir' => $request->tgl_akhir,
    //             'flag_status' => $request->flag_status,
    //         ]
    //     ]);
        
    //     if ($response->getStatusCode() == 200) { // 200 OK
    //         $response_data = $response->getBody()->getContents();
            
    //         $data = json_decode($response_data,true);
    //         return response()->json(['data' => $data["success"]], 200);  
    //     }
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $client = new Client();
    //     $response = $client->request('GET', $this->link.'fs/'.$id,[
    //         'headers' => [
    //             'Authorization' => 'Bearer '.Session::get('token'),
    //             'Accept'     => 'application/json',
    //         ]
    //     ]);

    //     if ($response->getStatusCode() == 200) { // 200 OK
    //         $response_data = $response->getBody()->getContents();
            
    //         $data = json_decode($response_data,true);
    //         $data = $data["success"];
    //     }
    //     return response()->json(['data' => $data], 200); 
    // }


    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'kode_fs' => 'required',
    //         'nama' => 'required',
    //         'tgl_awal' => 'required',
    //         'tgl_akhir' => 'required',
    //         'flag_status' => 'required',
    //     ]);

    //     $client = new Client();

    //     $response = $client->request('PUT', $this->link.'fs/'.$id,[
    //         'headers' => [
    //             'Authorization' => 'Bearer '.Session::get('token'),
    //             'Accept'     => 'application/json',
    //         ],
    //         'form_params' => [
    //             'kode_fs' => $request->kode_fs,
    //             'kode_lokasi' => Session::get('lokasi'),
    //             'nama' => $request->nama,
    //             'tgl_awal' => $request->tgl_awal,
    //             'tgl_akhir' => $request->tgl_akhir,
    //             'flag_status' => $request->flag_status,
    //         ]
    //     ]);
        
    //     if ($response->getStatusCode() == 200) { // 200 OK
    //         $response_data = $response->getBody()->getContents();
            
    //         $data = json_decode($response_data,true);
    //         return response()->json(['data' => $data["success"]], 200); 
    //         // return redirect('/siswa')->with('status','Data berhasil disimpan');  
    //     }
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $client = new Client();
    //     $response = $client->request('DELETE', $this->link.'fs/'.$id,[
    //         'headers' => [
    //             'Authorization' => 'Bearer '.Session::get('token'),
    //             'Accept'     => 'application/json',
    //         ]
    //     ]);

    //     if ($response->getStatusCode() == 200) { // 200 OK
    //         $response_data = $response->getBody()->getContents();
            
    //         $data = json_decode($response_data,true);
    //         $data = $data["success"];
    //     }
    //     return response()->json(['data' => $data], 200); 
    
    // }
}
