<?php

namespace App\Http\Controllers\Saku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class PostingController extends Controller
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

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function index(){
        //
    }

    public function getModul(){
        $client = new Client();
        $response = $client->request('GET', $this->link.'modul2',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
            if(count($data) >0){
                
                for($i=0;$i<count($data);$i++){
                    $data[$i]["no"] = ""; 
                    $data[$i]["status"] = "TRUE";
                }
            }
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
    public function loadJurnal(Request $request)
    {
        $this->validate($request, [
            'modul.*' => 'required',
            'per1.*' => 'required',
            'per2.*' => 'required'
        ]);
        
        $detail['data_modul'] = array();
        if(isset($request->modul)){
            $modul = $request->modul;
            $per1 = $request->per1;
            $per2 = $request->per2;
            $status = $request->status;
            for($i=0;$i<count($modul);$i++){
                if($status[$i] == "TRUE"){

                    $detail['data_modul'][] = array(
                        'modul' => $modul[$i],
                        'periode_awal' => $per1[$i],
                        'periode_akhir' => $per2[$i]
                    );
                }
            }
        }


        $fields = $detail;

        $client = new Client();
        $response = $client->request('POST', $this->link.'loadData',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
                'Content-Type'     => 'application/json'
            ],
            'body' => json_encode($fields)
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"];
            if(count($data["data"]) >0){
                
                for($i=0;$i<count($data["data"]);$i++){
                    $data["data"][$i]["no"] = ""; 
                }
            }
        }
        return response()->json(['data' => $data], 200); 
    }

}
