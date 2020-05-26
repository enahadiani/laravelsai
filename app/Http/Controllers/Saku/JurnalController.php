<?php

namespace App\Http\Controllers\Saku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/gl/';

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

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function index(){
        $client = new Client();
        $response = $client->request('GET', $this->link.'jurnal',[
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
        return response()->json(['daftar' => $data, 'status'=>true], 200); 
    }

    public function getPP(){
        $client = new Client();
        $response = $client->request('GET', $this->link.'pp',[
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
        return response()->json(['daftar' => $data , 'status'=>true], 200); 
    }

    public function getAkun(){
        $client = new Client();
        $response = $client->request('GET', $this->link.'akun',[
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
        return response()->json(['daftar' => $data , 'status'=>true], 200); 
    }

    public function getNIKPeriksa(){
        $client = new Client();
        $response = $client->request('GET', $this->link.'nikperiksa',[
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
        return response()->json(['daftar' => $data , 'status'=>true], 200); 
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
            'no_dokumen' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'total_debet' => 'required',
            'total_kredit' => 'required',
            'nik_periksa' => 'required',
            'kode_akun.*' => 'required',
            'keterangan.*' => 'required',
            'dc.*' => 'required',
            'nilai.*' => 'required',
            'kode_pp.*' => 'required'
        ]);
        
        $detail = array();
        if(isset($request->kode_akun)){
            $kode_akun = $request->kode_akun;
            $keterangan = $request->keterangan;
            $dc = $request->dc;
            $nilai = $request->nilai;
            $kode_pp = $request->kode_pp;
            for($i=0;$i<count($kode_akun);$i++){
                $detail[] = array(
                    'kode_akun' => $kode_akun[$i],
                    'keterangan' => $keterangan[$i],
                    'dc' => $dc[$i],
                    'nilai' => $this->joinNum($nilai[$i]),
                    'kode_pp' => $kode_pp[$i]
                );
            }
        }


        $fields['jurnal'][0] =
              array (
                'no_dokumen' => $request->no_dokumen,
                'tanggal' => $request->tanggal,
                'jenis' => $request->jenis,
                'deskripsi' => $request->deskripsi,
                'total_debet' => $this->joinNum($request->total_debet),
                'total_kredit' => $this->joinNum($request->total_kredit),
                'nik_periksa' => $request->nik_periksa,
                'detail' => $detail
              );

        $client = new Client();
        $response = $client->request('POST', $this->link.'jurnal',[
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
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        $client = new Client();
        $response = $client->request('GET', $this->link.'jurnal/'.$id,[
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
            'deskripsi' => 'required',
            'total_debet' => 'required',
            'total_kredit' => 'required',
            'nik_periksa' => 'required',
            'kode_akun.*' => 'required',
            'keterangan.*' => 'required',
            'dc.*' => 'required',
            'nilai.*' => 'required',
            'kode_pp.*' => 'required'
        ]);
        
        $detail = array();
        if(isset($request->kode_akun)){
            $kode_akun = $request->kode_akun;
            $keterangan = $request->keterangan;
            $dc = $request->dc;
            $nilai = $request->nilai;
            $kode_pp = $request->kode_pp;
            for($i=0;$i<count($kode_akun);$i++){
                $detail[] = array(
                    'kode_akun' => $kode_akun[$i],
                    'keterangan' => $keterangan[$i],
                    'dc' => $dc[$i],
                    'nilai' => $this->joinNum($nilai[$i]),
                    'kode_pp' => $kode_pp[$i]
                );
            }
        }


        $fields['jurnal'][0] =
              array (
                'no_bukti' => $request->no_bukti,
                'no_dokumen' => $request->no_dokumen,
                'tanggal' => $request->tanggal,
                'jenis' => $request->jenis,
                'deskripsi' => $request->deskripsi,
                'total_debet' => $this->joinNum($request->total_debet),
                'total_kredit' => $this->joinNum($request->total_kredit),
                'nik_periksa' => $request->nik_periksa,
                'detail' => $detail
              );

        $client = new Client();
        $response = $client->request('PUT', $this->link.'jurnal',[
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
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $client = new Client();
        $response = $client->request('DELETE', $this->link.'jurnal/'.$id,[
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

    
    public function getNIKPeriksaByNIK($nik){
        $client = new Client();
        $response = $client->request('GET', $this->link.'nikperiksa/'.$nik,[
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
        return response()->json(['daftar' => $data , 'status'=>true], 200); 
    }
}
