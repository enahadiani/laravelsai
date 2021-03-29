<?php

namespace App\Http\Controllers\Esaku\Simpanan\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ReportBayarSimpananController extends Controller
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
            $response = $client->request('GET',  config('api.url').'esaku-report/lap-simp-bayar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode'        => $request->periode,
                    'no_bukti'        => $request->no_bukti
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data["data"];


            }


            return response()->json(['status'=>true, 'auth_status'=>1,'result'=>$data], 200);

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

     public function getBukti(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/terima-simp',[
                'headers' => [
                    'Authorization'     => 'Bearer '.Session::get('token'),
                    'Accept'            => 'application/json',
                    'Content-Type'      => 'application/json'
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data;
                if(count($data["data"]) >0){
                    $no = 1;

                    for($i=0;$i<count($data["data"]);$i++){
                        $results["data"][$i]["kode"] = $data["data"][$i]["no_bukti"];
                        $results["data"][$i]["nama"] = $data["data"][$i]["keterangan"];
                    }
                }else{
                    $results = $data;
                }


            }
            return response()->json(['daftar' => $results['data'], 'status' => true], 200);
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }

    }
}
