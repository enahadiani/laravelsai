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
    public $link2 = 'http://localhost:8080/lumenapi/public/api/gl/';


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
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'status.*' => 'required',
            'no_bukti.*' => 'required',
            'form.*' => 'required'
        ]);
        
        $detail = array();
        if(isset($request->no_bukti)){
            $no_bukti = $request->no_bukti;
            $status = $request->status;
            $form = $request->form;
            for($i=0;$i<count($no_bukti);$i++){
                $detail[] = array(
                    'status' => $status[$i],
                    'no_bukti' => $no_bukti[$i],
                    'form' => $form[$i]
                );
            }
        }


        $fields =
              array (
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'detail' => $detail
              );

        $client = new Client();
        $response = $client->request('POST', $this->link.'posting',[
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
