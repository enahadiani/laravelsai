<?php

namespace App\Http\Controllers\Apv;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class HakaksesController extends Controller
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
        $response = $client->request('GET', $this->link.'hakakses',[
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
            'kode_klp_menu' => 'required',
            'pass' => 'required',
            'status_admin' => 'required',
            'klp_akses' => 'required',
            'path_view'=> 'required',
            'menu_mobile'=> 'required',
            'kode_menu_lab'=> 'required'
        ]);

        $client = new Client();
        $response = $client->request('POST', $this->link.'hakakses',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'form_params' => [
                'kode_lokasi' => Session::get('lokasi'),
                'nik' => $request->nik,
                'nama' => $request->nama,
                'kode_klp_menu' => $request->kode_klp_menu,
                'pass' => $request->pass,
                'status_admin' => $request->status_admin,
                'klp_akses' => $request->klp_akses,
                'path_view'=> $request->path_view,
                'menu_mobile'=> $request->menu_mobile,
                'kode_menu_lab'=> $request->kode_menu_lab
            ]
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
    public function show($nik)
    {
        $client = new Client();
        $response = $client->request('GET', $this->link.'hakakses/'.$nik,[
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
            'nik' => 'required',
            'nama' => 'required',
            'kode_klp_menu' => 'required',
            'pass' => 'required',
            'status_admin' => 'required',
            'klp_akses' => 'required',
            'path_view'=> 'required',
            'menu_mobile'=> 'required',
            'kode_menu_lab'=> 'required'
        ]);

        $client = new Client();
        $response = $client->request('PUT', $this->link.'hakakses/'.$nik,[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'form_params' => [
                'kode_lokasi' => Session::get('lokasi'),
                'nik' => $request->nik,
                'nama' => $request->nama,
                'kode_klp_menu' => $request->kode_klp_menu,
                'pass' => $request->pass,
                'status_admin' => $request->status_admin,
                'klp_akses' => $request->klp_akses,
                'path_view'=> $request->path_view,
                'menu_mobile'=> $request->menu_mobile,
                'kode_menu_lab'=> $request->kode_menu_lab
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
    public function destroy($nik)
    {
        $client = new Client();
        $response = $client->request('DELETE', $this->link.'hakakses/'.$nik,[
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

    public function getMenu()
    {
        $client = new Client();
        $response = $client->request('GET', $this->link.'menu',[
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

    public function getForm()
    {
        $client = new Client();
        $response = $client->request('GET', $this->link.'form',[
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
