<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/dago-master/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dago-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET', $this->link.'paket',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'no_paket' => 'required',
            'nama' => 'required',
            'kode_curr' => 'required',
            'jenis' => 'required',
            'kode_produk' => 'required',
            'tarif_agen' => 'required',
            'kode_harga' => 'required|array',
            'nama_harga' => 'required|array',
            'harga_std' => 'required|array',
            'harga_semi' => 'required|array',
            'harga_eks' => 'required|array',
            'harga_agen' => 'required|array',
            'curr' => 'required|array',
            'tgl_plan' => 'required|array',
            'tgl_akt' => 'required|array',
            'hari' => 'required|array',
            'q_std' => 'required|array',
            'q_semi' => 'required|array',
            'q_eks' => 'required|array',
            'id' => 'required|array',
        ]);

        try {
                $data_harga = array();
                if(isset($request->kode_harga)){
                $kode_harga = $request->kode_harga;
                $harga  = $request->harga_std;
                $harga_se  = $request->harga_std;
                $harga_e  = $request->harga_eks;
                $fee  = $request->harga_agen;
                $curr_fee = $request->curr;
                for($i=0;$i<count($kode_harga);$i++){
                        $data_harga[] = array(
                            'kode_harga' => $kode_harga[$i],
                            'harga' => intval(str_replace('.','', $harga[$i])),
                            'harga_se' => intval(str_replace('.','', $harga_se[$i])),
                            'harga_e' => intval(str_replace('.','', $harga_e[$i])),
                            'fee' => intval(str_replace('.','', $fee[$i])),
                            'curr_fee' => $curr_fee[$i]
                        );
                    }
                }

                $data_jadwal = array();
                if(isset($request->tgl_plan)){
                    $tgl_berangkat = $request->tgl_plan;
                    $tgl_datang = $request->tgl_akt;
                    $lama_hari = $request->hari;
                    $quota = $request->q_std;
                    $quota_se = $request->q_semi;
                    $quota_e = $request->q_eks;
                    for($i=0;$i<count($request->tgl_plan);$i++) {
                        $data_jadwal[] = array(
                            'tgl_berangkat' => str_replace('/','-',$tgl_berangkat[$i]),
                            'tgl_datang' => str_replace('/','-',$tgl_datang[$i]),
                            'lama_hari' => $lama_hari[$i],
                            'quota' => str_replace('.','',$quota[$i]),
                            'quota_se' => str_replace('.','',$quota_se[$i]),
                            'quota_e' => str_replace('.','',$quota_e[$i]),
                        );
                    }
                }

                $fields = array(
                    'no_paket' => $request->no_paket,
                    'nama' => $request->nama,
                    'jenis' => $request->jenis,
                    'kode_curr'=>$request->kode_curr,
                    'kode_produk' => $request->kode_produk,
                    'tarif_agen' => intval(str_replace('.','',$request->tarif_agen)),
                    'data_harga' => $data_harga,
                    'data_jadwal' => $data_jadwal
                );
                // var_dump(json_encode($fields));
                $client = new Client();
                $response = $client->request('POST', $this->link.'paket',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'  => 'application/json',
                    ],
                    'body' => json_encode($fields)
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
                }

        } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'paket-detail?no_paket='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
                'no_paket' => 'required',
                'nama' => 'required',
                'kode_curr' => 'required',
                'jenis' => 'required',
                'kode_produk' => 'required',
                'tarif_agen' => 'required',
                'kode_harga' => 'required|array',
                'nama_harga' => 'required|array',
                'harga_std' => 'required|array',
                'harga_semi' => 'required|array',
                'harga_eks' => 'required|array',
                'harga_agen' => 'required|array',
                'curr' => 'required|array',
                'tgl_plan' => 'required|array',
                'tgl_akt' => 'required|array',
                'hari' => 'required|array',
                'q_std' => 'required|array',
                'q_semi' => 'required|array',
                'q_eks' => 'required|array',
                'id' => 'required|array',
            ]);

                $data_harga = array();
                if(isset($request->kode_harga)){
                $kode_harga = $request->kode_harga;
                $harga  = $request->harga_std;
                $harga_se  = $request->harga_std;
                $harga_e  = $request->harga_eks;
                $fee  = $request->harga_agen;
                $curr_fee = $request->curr;
                for($i=0;$i<count($kode_harga);$i++){
                        $data_harga[] = array(
                            'kode_harga' => $kode_harga[$i],
                            'harga' => intval(str_replace('.','', $harga[$i])),
                            'harga_se' => intval(str_replace('.','', $harga_se[$i])),
                            'harga_e' => intval(str_replace('.','', $harga_e[$i])),
                            'fee' => intval(str_replace('.','', $fee[$i])),
                            'curr_fee' => $curr_fee[$i]
                        );
                    }
                }

                $data_jadwal = array();
                if(isset($request->tgl_plan)){
                    $tgl_berangkat = $request->tgl_plan;
                    $tgl_datang = $request->tgl_akt;
                    $lama_hari = $request->hari;
                    $quota = $request->q_std;
                    $quota_se = $request->q_semi;
                    $quota_e = $request->q_eks;
                    for($i=0;$i<count($request->tgl_plan);$i++) {
                        $data_jadwal[] = array(
                            'tgl_berangkat' => str_replace('/','-',$tgl_berangkat[$i]),
                            'tgl_datang' => str_replace('/','-',$tgl_datang[$i]),
                            'lama_hari' => $lama_hari[$i],
                            'quota' => str_replace('.','',$quota[$i]),
                            'quota_se' => str_replace('.','',$quota_se[$i]),
                            'quota_e' => str_replace('.','',$quota_e[$i]),
                        );
                    }
                }

                $fields = array(
                    'no_paket' => $request->no_paket,
                    'nama' => $request->nama,
                    'jenis' => $request->jenis,
                    'kode_curr'=>$request->kode_curr,
                    'kode_produk' => $request->kode_produk,
                    'tarif_agen' => intval(str_replace('.','',$request->tarif_agen)),
                    'data_harga' => $data_harga,
                    'data_jadwal' => $data_jadwal
                );

        try {
                $client = new Client();
                $response = $client->request('PUT', $this->link.'paket?no_paket='.$id,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'  => 'application/json',
                    ],
                    'body' => json_encode($fields)
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
                }

        } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE', $this->link.'paket?no_paket='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

    }
   
}
