<?php

namespace App\Http\Controllers\Esaku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class FormatLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'kode_fs' => 'required',
            'modul' => 'required',
            'kode_neraca' => 'required',
            'nama' =>'required',
            'level_spasi' =>'required',
            'level_lap' =>'required',
            'sum_header' =>'required',
            'jenis_akun' =>'required',
            'kode_induk' =>'required',
            'nu' =>'required',
            'tipe' =>'required'
        ]);
            
        try{
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-master/format-laporan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_fs' => $request->kode_fs,
                    'modul' => $request->modul,
                    'nama' => $request->nama,
                    'kode_neraca' => $request->kode_neraca,
                    'level_spasi' => $request->level_spasi,
                    'level_lap' => $request->level_lap,
                    'sum_header' => $request->sum_header,
                    'jenis_akun' => $request->jenis_akun,
                    'kode_induk' => $request->kode_induk,
                    'nu' => $request->nu,
                    'tipe' => $request->tipe
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data["success"]], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            'kode_fs' => 'required',
            'modul' => 'required'
        ]);
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-master/format-laporan?kode_fs='.$request->kode_fs.'&modul='.$request->modul,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_fs' => $request->kode_fs,
                    'modul' => $request->modul
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $daftar = $data["success"]["data"];
                $data = $data["success"];
                $html = "";
                if(count($daftar) > 0){
                    $pre_prt = 0;
                    $parent_array = array();
                    // node == i
                    for($i=0; $i<count($daftar); $i++){
                        if(!ISSET($daftar[$i-1]['level_spasi'])){
                            $prev_lv = 0;
                        }else{
                            $prev_lv = $daftar[$i-1]['level_spasi'];
                        }
                        
                        if($daftar[$i]['kode_induk'] == '00'){
                            $parent_to_prt = "";
                        }else{
                            $parent_to_prt = "treegrid-parent-".$daftar[$i]['kode_induk'];
                        }
                        $html .= "
                        <tr class='treegrid-".$daftar[$i]['kode_neraca']." $parent_to_prt'>
                        <td class='set_kode'>".$daftar[$i]['kode_neraca']."<input type='hidden' name='kode_neraca[]' value='".$daftar[$i]['kode_neraca']."'><input type='hidden' class='set_lvl' name='level_spasi[]' value='".$daftar[$i]['level_spasi']."'></td>
                        <td class='set_nama'>".$daftar[$i]['nama']."<input type='hidden' name='nama[]' value='".$daftar[$i]['nama']."'><input type='hidden' class='set_sumheader' name='sum_header[]' value='".$daftar[$i]['sum_header']."'></td>
                        <td class='set_lvlap'>".$daftar[$i]['level_lap']."<input type='hidden' name='level_lap[]' value='".$daftar[$i]['level_lap']."'><input type='hidden' class='set_kodeinduk'  name='kode_induk[]' value='".$daftar[$i]['kode_induk']."'><input type='hidden' name='jenis_akun[]' value='".$daftar[$i]['jenis_akun']."' class='set_jenis' ></td>
                        <td>".$daftar[$i]['tipe']."<input type='hidden' name='tipe[]' class='set_tipe' value='".$daftar[$i]['tipe']."'></td>
                        <td class='set_nu' style='display:none'>".$daftar[$i]['nu']."</td>
                        <td class='set_index' style='display:none'>".$daftar[$i]['rowindex']."</td>
                        </tr>
                        ";
                    }
                }
            }
            return response()->json(['data' => $data,'html'=>$html], 200); 
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
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
    public function update(Request $request)
    {
        $request->validate([
            'kode_fs' => 'required',
            'modul' => 'required',
            'kode_neraca' => 'required',
            'nama' =>'required',
            'level_spasi' =>'required',
            'level_lap' =>'required',
            'sum_header' =>'required',
            'jenis_akun' =>'required',
            'kode_induk' =>'required',
            'nu' =>'required',
            'tipe' =>'required'
        ]);

        try{
            
            $client = new Client();
    
            $response = $client->request('PUT',  config('api.url').'toko-master/format-laporan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_fs' => $request->kode_fs,
                    'modul' => $request->modul,
                    'nama' => $request->nama,
                    'kode_neraca' => $request->kode_neraca,
                    'level_spasi' => $request->level_spasi,
                    'level_lap' => $request->level_lap,
                    'sum_header' => $request->sum_header,
                    'jenis_akun' => $request->jenis_akun,
                    'kode_induk' => $request->kode_induk,
                    'nu' => $request->nu,
                    'tipe' => $request->tipe
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data["success"]], 200);  
            }
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'kode_fs' => 'required',
            'modul' => 'required',
            'kode_neraca' => 'required'
        ]);

        try{

            $client = new Client();
            
            $response = $client->request('DELETE',  config('api.url').'toko-master/format-laporan?kode_fs='.$request->kode_fs.'&modul='.$request->modul.'&kode_neraca='.$request->kode_neraca,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_fs' => $request->kode_fs,
                    'modul' => $request->modul,
                    'kode_neraca' => $request->kode_neraca
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200); 
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res['message'];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }

    public function getVersi()
    {
        try{

            $client = new Client();
            
            $response = $client->request('GET',  config('api.url').'toko-master/format-laporan-versi',[
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
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    
    }

    public function getTipe(Request $request)
    {
        $request->validate([
            'kode_menu' => 'required'
        ]);

        try{

            $client = new Client();
            
            $response = $client->request('GET',  config('api.url').'toko-master/format-laporan-tipe?kode_menu='.$request->kode_menu,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_menu' => $request->kode_menu
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200); 
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    
    }

    public function getRelakun(Request $request)
    {
        $request->validate([
            'modul' => 'required',
            'kode_neraca' => 'required'
        ]);

        try{

            $client = new Client();
            
            $response = $client->request('GET',  config('api.url').'toko-master/format-laporan-relakun?kode_neraca='.$request->kode_neraca.'&modul='.$request->modul,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'modul' => $request->modul,
                    'kode_neraca' => $request->kode_neraca
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200); 
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    
    }

    public function simpanRelasi(Request $request)
    {
        
        $request->validate([
            'kode_fs' => 'required',
            'kode_neraca' => 'required',
            'kode_akun' => 'array'
        ]);
        if(isset($request->kode_akun)){

            $forms = [
                'kode_fs' => $request->kode_fs,
                'kode_neraca' => $request->kode_neraca,
                'kode_akun' => $request->kode_akun
            ];
        }else{
            $forms = [
                'kode_fs' => $request->kode_fs,
                'kode_neraca' => $request->kode_neraca
            ];
        }
        try{
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-master/format-laporan-relasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $forms
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data["success"]], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }

    public function simpanMove(Request $request)
    {
        
        $request->validate([
            'kode_fs' => 'required',
            'modul' => 'required',
            'kode_neraca' => 'required|array',
            'nama' =>'required|array',
            'level_spasi' =>'required|array',
            'level_lap' =>'required|array',
            'sum_header' =>'required|array',
            'jenis_akun' =>'required|array',
            'kode_induk' =>'required|array',
            'tipe' =>'required|array'
        ]);
            
        try{
            $fields = [
                'kode_fs' => $request->kode_fs,
                'modul' => $request->modul,
                'kode_neraca' => $request->kode_neraca,
                'nama' =>$request->nama,
                'level_spasi' =>$request->level_spasi,
                'level_lap' =>$request->level_lap,
                'sum_header' =>$request->sum_header,
                'jenis_akun' =>$request->jenis_akun,
                'kode_induk' =>$request->kode_induk,
                'tipe' =>$request->tipe
            ];

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-master/format-laporan-move',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data["success"]], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res['message'];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }
}

