<?php

namespace App\Http\Controllers\Saku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'http://api.simkug.com/api/lapsaku/';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function getGlReportJurnal(Request $request){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_report_jurnal',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->periode,
                'modul' => $request->modul,
                'no_bukti' => $request->no_bukti
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
        }
        if($request->periode != ""){
            $periode = $request->periode;
        }else{
            $periode = "Semua Periode";
        }
        
        return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju], 200); 
    }

    function getGlReportJurnalForm(Request $request){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_report_jurnal_form',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->periode,
                'modul' => $request->modul,
                'no_bukti' => $request->no_bukti
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
        }
        return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1], 200); 
    }

    function getGlReportBukuBesar(Request $request){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_report_buku_besar',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->periode,
                'kode_akun' => $request->kode_akun
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
        }
        
        return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1], 200);      
    }

    function getGlReportNeracaLajur(Request $request){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_report_neraca_lajur',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->periode,
                'kode_akun' => $request->kode_akun
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
        }
        
        return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1], 200);    
    }

    function getGlReportNeraca(Request $request){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_report_neraca',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->periode,
                'kode_fs' => $request->kode_fs
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
        }
        
        return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1], 200);    
    }

    function getGlReportLabaRugi(Request $request){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_report_laba_rugi',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->periode,
                'kode_fs' => $request->kode_fs
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
        }
        
        return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1], 200);   
    }
}
