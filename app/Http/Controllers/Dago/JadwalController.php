<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class JadwalController extends Controller
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
            $response = $client->request('GET', $this->link.'jadwal',[
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

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'jadwal-detail?no_paket='.$id,
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
            'no_jadwal' => 'required|array',
            'jadwal_baru' => 'required|array',
        ]);

        $data_jadwal = array();
        if(isset($request->no_jadwal)){
            for($i=0;$i<count($request->no_jadwal);$i++) {
                $explode_string_jadwal_lama = explode('/', $request->jadwal_lama[$i]);
                $tgl_lama = $explode_string_jadwal_lama[0];
                $bln_lama = $explode_string_jadwal_lama[1];
                $tahun_lama = $explode_string_jadwal_lama[2];
                $jadwal_lama = $tahun_lama."-".$bln_lama."-".$tgl_lama;

                $explode_string_jadwal_baru = explode('/', $request->jadwal_baru[$i]);
                $tgl_baru = $explode_string_jadwal_baru[0];
                $bln_baru = $explode_string_jadwal_baru[1];
                $tahun_baru = $explode_string_jadwal_baru[2];
                $jadwal_baru = $tahun_baru."-".$bln_baru."-".$tgl_baru;
                $data_jadwal[] = array(
                    'tgl_berangkat' => $jadwal_lama,
                    'tgl_baru' => $jadwal_baru,
                    'no_jadwal' => $request->no_jadwal[$i],
                );
            }
        }

        $fields = array(
            'no_paket' => $request->no_paket,
            'nama' => $request->nama,
            'data_jadwal' => $data_jadwal
        );

        try {
                $client = new Client();
                $response = $client->request('PUT', $this->link.'jadwal?no_paket='.$id,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json',
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
   
}
