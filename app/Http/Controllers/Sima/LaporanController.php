<?php
namespace App\Http\Controllers\Rkap;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;
use PDF;

class LaporanController extends Controller {

    public function __contruct() {
        if(!Session::get('login')){
            return redirect('sima-auth/login');
        }
    }

    public function getLapSiswa(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'gis-report/lap-siswa',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_jurusan' => $request->kode_jurusan,
                    'nis' => $request->nis
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }

            if(isset($request->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi')], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getLapSiswaPDF(Request $request) {
        set_time_limit(300);
        $tmp = app('App\Http\Controllers\Rkap\LaporanController')->getLapSiswa($request);
        $tmp = json_decode(json_encode($tmp),true);
        $data = $tmp['original'];
        $pdf = PDF::loadview('gis.rptSiswaPDF',['data'=>$data["result"],'lokasi'=>$data["lokasi"]]);
        return $pdf->download('laporan-siswa-pdf');   
    }

    public function getLapTagihan(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'gis-report/lap-tagihan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_jurusan' => $request->kode_jurusan,
                    'nis' => $request->nis,
                    'no_tagihan' => $request->no_tagihan
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }

            if(isset($request->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi')], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
    }

    public function getLapTagihanPDF(Request $request) {
        set_time_limit(300);
        $tmp = app('App\Http\Controllers\Rkap\LaporanController')->getLapTagihan($request);
        $tmp = json_decode(json_encode($tmp),true);
        $data = $tmp['original'];
        $pdf = PDF::loadview('gis.rptTagihanPDF',['data'=>$data["result"],'lokasi'=>$data["lokasi"]]);
        return $pdf->download('laporan-tagihan-pdf');   
    }

    public function sendEmail(Request $request){
        try{
            
            $client = new Client();
            
            $query = [
                'from' => 'devsaku5@gmail.com',
                'to' => $request->email,
                'html' => $request->html,
                'text' => $request->text,
                'subject' => $request->subject
            ];
    
            $response = $client->request('POST',config('api.url').'gis-report/send-email-report',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                ],
                'form_params' => $query
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res;
            }

            return response()->json($data, 200);    
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
            // var_dump($response);
        } 
    }

}

?>