<?php

namespace App\Http\Controllers\Wisata;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('wisata-auth/login');
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
            $response = $client->request('GET',  config('api.url').'wisata-master/kunj',[
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
            'tgl_kunjungan' => 'required',
            'kode_mitra' => 'required',          
            'kode_bidang' => 'required',          
            'tahun' => 'required',          
            'bulan' => 'required',         
            'tanggal' => 'required|array',         
            'jumlah' => 'required|array',         
        ]);

        try {   
                $explode_tgl = explode('/', $request->tgl_kunjungan);
                $tgl = $explode_tgl[0];
                $bln = $explode_tgl[1];
                $tahun = $explode_tgl[2];
                $tanggal = $tahun."-".$bln."-".$tgl;

                $arrTgl = array();
                for($i=0;$i<count($request->tanggal);$i++) {
                    $arrTgl[] = array('tanggal' => $request->tahun."-".$request->bulan."-".$request->tanggal[$i],
                                      'jumlah' => $request->jumlah[$i]);
                }

                $data = array(
                    'tanggal' => $tanggal,
                    'kode_mitra' => $request->kode_mitra,
                    'kode_bidang' => $request->kode_bidang,
                    'tahun' => $request->tahun,
                    'bulan' => $request->bulan,
                    'arrtgl' => $arrTgl
                );

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'wisata-master/kunj',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'  => 'application/json',
                    ],
                    'body' => json_encode($data)
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
            $response = $client->request('GET',  config('api.url').'wisata-master/getEdit?no_bukti='.$id,
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
            'tgl_kunjungan' => 'required',
            'kode_mitra' => 'required',          
            'kode_bidang' => 'required',          
            'tahun' => 'required',          
            'bulan' => 'required',         
            'tanggal' => 'required|array',         
            'jumlah' => 'required|array',         
        ]);

        try {   
            $explode_tgl = explode('/', $request->tgl_kunjungan);
            $tgl = $explode_tgl[0];
            $bln = $explode_tgl[1];
            $tahun = $explode_tgl[2];
            $tanggal = $tahun."-".$bln."-".$tgl;

            $arrTgl = array();
            for($i=0;$i<count($request->tanggal);$i++) {
                $arrTgl[] = array('tanggal' => $request->tahun."-".$request->bulan."-".$request->tanggal[$i],
                            'jumlah' => $request->jumlah[$i]);
            }

            $data = array(
                'tanggal' => $tanggal,
                'no_bukti'=>$request->no_bukti,
                'kode_mitra' => $request->kode_mitra,
                'kode_bidang' => $request->kode_bidang,
                'tahun' => $request->tahun,
                'bulan' => $request->bulan,
                'arrtgl' => $arrTgl
            );

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'wisata-master/kunj?no_bukti='.$id,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'  => 'application/json',
                ],
                'body' => json_encode($data)
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
            $response = $client->request('DELETE',  config('api.url').'wisata-master/kunj?no_bukti='.$id,
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
