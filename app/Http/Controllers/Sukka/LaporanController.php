<?php

namespace App\Http\Controllers\Sukka;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('sukka-auth/login')->with('alert','Session telah habis !');
        }
    }

    function getNamaBulan($no_bulan){
        switch ($no_bulan){
            case 1 : case '1' : case '01': $bulan = "Januari"; break;
            case 2 : case '2' : case '02': $bulan = "Februari"; break;
            case 3 : case '3' : case '03': $bulan = "Maret"; break;
            case 4 : case '4' : case '04': $bulan = "April"; break;
            case 5 : case '5' : case '05': $bulan = "Mei"; break;
            case 6 : case '6' : case '06': $bulan = "Juni"; break;
            case 7 : case '7' : case '07': $bulan = "Juli"; break;
            case 8 : case '8' : case '08': $bulan = "Agustus"; break;
            case 9 : case '9' : case '09': $bulan = "September"; break;
            case 10 : case '10' : case '10': $bulan = "Oktober"; break;
            case 11 : case '11' : case '11': $bulan = "November"; break;
            case 12 : case '12' : case '12': $bulan = "Desember"; break;
            default: $bulan = null;
        }

        return $bulan;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPosisiJuskeb(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-report/lap-posisi-juskeb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_lokasi' => $request->kode_lokasi,
                    'kode_pp' => $request->kode_pp,
                    'no_bukti' => $request->no_bukti,
                    'periode' => $request->periode
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
                $lokasi = (count($res["lokasi"]) > 0 ? $res["lokasi"][0]["nama"] : '-');
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data,'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'lokasi' => $lokasi
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getAjuJuskebForm(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-report/lap-aju-form',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res['data'];
                $detail = $res["detail"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'detail'=>$detail
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getHistoryAppJuskeb(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-report/lap-history-app-juskeb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
                $lokasi = (count($res["lokasi"]) > 0 ? $res["lokasi"][0]["nama"] : '-');
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'lokasi' => $lokasi
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getPosisiJuskebPDF(Request $request)
    {
        set_time_limit(300);
        $tmp = app('App\Http\Controllers\Sukka\LaporanController')->getPosisiJuskeb($request);
        $tmp = json_decode(json_encode($tmp),true);
        $data = $tmp['original'];
        $paper = 'A2';
        $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
        $pdf = PDF::loadview('sukka.rptPosisiJuskebPDF',['data'=>$data["result"],'lokasi'=>$data['lokasi'],'periode'=>$periode])->setPaper($paper, 'landscape');
        return $pdf->download('laporan-posisi-pengajuan-juskeb-pdf');
    }

    public function getPosisiRRA(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-report/lap-posisi-rra',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_lokasi' => $request->kode_lokasi,
                    'kode_pp' => $request->kode_pp,
                    'no_bukti' => $request->no_bukti,
                    'periode' => $request->periode
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
                $lokasi = (count($res["lokasi"]) > 0 ? $res["lokasi"][0]["nama"] : '-');
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data,'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'lokasi' => $lokasi
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getAjuRRAForm(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-report/lap-rra-form',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res['data'];
                $detail = $res["detail_app"];
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'detail'=>$detail
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getHistoryAppRRA(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-report/lap-history-app-rra',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
                $lokasi = (count($res["lokasi"]) > 0 ? $res["lokasi"][0]["nama"] : '-');
            }
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            if(isset($request->back)){
                $res['back']=true;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'lokasi' => $lokasi
            ], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    function getPosisiRRAPDF(Request $request)
    {
        set_time_limit(300);
        $tmp = app('App\Http\Controllers\Sukka\LaporanController')->getPosisiRRA($request);
        $tmp = json_decode(json_encode($tmp),true);
        $data = $tmp['original'];
        $paper = 'A2';
        $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
        $pdf = PDF::loadview('sukka.rptPosisiRRAPDF',['data'=>$data["result"],'lokasi'=>$data['lokasi'],'periode'=>$periode])->setPaper($paper, 'landscape');
        return $pdf->download('laporan-posisi-pengajuan-rra-pdf');
    }
  
}