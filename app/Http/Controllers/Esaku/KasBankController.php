<?php

namespace App\Http\Controllers\Esaku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KasBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    public function index(){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/kas-bank',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["jurnal"];
            }
            return response()->json(['daftar' => $data, 'status'=>true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_dokumen' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
            'jenis' => 'required',
            'kode_form' => 'required',
            'deskripsi' => 'required',
            'total_debet' => 'required',
            'total_kredit' => 'required',
            'kode_akun' => 'required|array',
            'keterangan' => 'required|array',
            'dc' => 'required|array',
            'nilai' => 'required|array',
            'kode_pp' => 'required|array'
        ]);
        try{

            $nilai = array();
            if(isset($request->nilai)){
                $nil = $request->nilai;
                for($i=0;$i<count($nil);$i++){
                    $nilai[] = $this->joinNum($nil[$i]);
                }
            }
            
            $fields =
                array (
                    'no_bukti' => $request->no_bukti,
                    'no_dokumen' => $request->no_dokumen,
                    'tanggal' => $this->reverseDate($request->tanggal,'/','-'),
                    'jenis' => $request->jenis,
                    'kode_form' => $request->kode_form,
                    'deskripsi' => $request->deskripsi,
                    'total_debet' => $this->joinNum($request->total_debet),
                    'total_kredit' => $this->joinNum($request->total_kredit),
                    'status' => $request->status,
                    'kode_akun' => $request->kode_akun,
                    'keterangan' => $request->keterangan,
                    'dc' => $request->dc,
                    'nilai' => $nilai,
                    'kode_pp' => $request->kode_pp,
                );
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/kas-bank',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data["success"]], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/kas-bank-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_bukti' => $id
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
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }

    public function getPeriodeJurnal()
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/jurnal-periode',[
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
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }


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
    public function update(Request $request, $no_bukti)
    {
        $this->validate($request, [
            'no_dokumen' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'kode_form' => 'required',
            'deskripsi' => 'required',
            'total_debet' => 'required',
            'total_kredit' => 'required',
            'kode_akun' => 'required|array',
            'keterangan' => 'required|array',
            'dc' => 'required|array',
            'nilai' => 'required|array',
            'kode_pp' => 'required|array'
        ]);

        try{
            
            $nilai = array();
            if(isset($request->nilai)){
                for($i=0;$i<count($request->nilai);$i++){
                    array_push($nilai,$this->joinNum($request->nilai[$i]));
                }
            }
            
            $fields =
                  array (
                    'no_bukti' => $request->no_bukti,
                    'no_dokumen' => $request->no_dokumen,
                    'tanggal' => $this->reverseDate($request->tanggal,'/','-'),
                    'jenis' => $request->jenis,
                    'kode_form' => $request->kode_form,
                    'deskripsi' => $request->deskripsi,
                    'total_debet' => $this->joinNum($request->total_debet),
                    'total_kredit' => $this->joinNum($request->total_kredit),
                    'status' => $request->status,
                    'kode_akun' => $request->kode_akun,
                    'keterangan' => $request->keterangan,
                    'dc' => $request->dc,
                    'nilai' => $nilai,
                    'kode_pp' => $request->kode_pp,
                  );
    
            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'toko-trans/kas-bank',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data["success"]], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res['message'];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        try{

            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'toko-trans/kas-bank',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_bukti' => $id
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
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    
    }

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        try{
            
            $image_path = $request->file('file')->getPathname();
            $image_mime = $request->file('file')->getmimeType();
            $image_org  = $request->file('file')->getClientOriginalName();
            $fields[0] = array(
                'name'     => 'file',
                'filename' => $image_org,
                'Mime-Type'=> $image_mime,
                'contents' => fopen($image_path, 'r' ),
            );
            $fields[1] = array(
                'name'     => 'nik_user',
                'contents' => Session::get('nikUser')
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/kas-bank-import-excel',[
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
            $result['message'] = $res;
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

    public function getDataTmp()
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/kas-bank-tmp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nik_user' => Session::get('nikUser')
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
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }
}
