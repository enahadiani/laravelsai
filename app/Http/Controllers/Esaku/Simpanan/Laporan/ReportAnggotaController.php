<?php

namespace App\Http\Controllers\Esaku\Simpanan\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ReportAnggotaController extends Controller
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

    //Update URL when api service available
    public function index(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/anggota',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data["data"];
                $results = [];
                if(count($data) > 0) {
                    $no = 0;
                    foreach($data as $key => $row){
                       $results[] = [
                            'no'        => $no += 1,
                            'kode'      => $data[$key]['no_agg'],
                            'id_lain'   => null,
                            'nama'      => $data[$key]['nama'],
                            'bank'      => $data[$key]['bank'],
                            'cabang'    => null,
                            'no_rek'    => $data[$key]['rek'],
                            'nama_rek'  => null
                       ];
                    }
                }
            }
            if(isset($request->back)){
                $back = true;
            }else{
                $back = false;
            }

            return response()->json(['status'=>true, 'auth_status'=>1,'result'=>$results,'back'=>$back], 200);

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAnggota(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/anggota',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data["data"];
                $results = [];
                if(count($data) > 0) {
                    foreach($data as $key => $row){
                       $results[] = [
                            'kode'  => $data[$key]['no_agg'],
                            'nama'  => $data[$key]['nama']
                       ];
                    }
                }
            }
            return response()->json(['daftar' => $results, 'status'=>true], 200);

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
}
