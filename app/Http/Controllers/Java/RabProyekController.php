<?php

namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class RabProyekController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('java-auth/login');
        }
    }

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function convertPeriode($date) {
        $explode = explode("/", $date);

        return "$explode[2]$explode[1]";
    }

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }

    public function index() {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-trans/rab-proyek',[
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
            'no_proyek' => 'required',
            'nilai_kontrak' => 'required',
            'nilai_anggaran' => 'required',
            'no' => 'required|array',
            'keterangan' => 'required|array',
            'qty' => 'required|array',
            'harga' => 'required|array',
            'satuan' => 'required|array',
        ]);

        try {
            $no = array();
            $keterangan = array();
            $qty = array();
            $harga = array();
            $satuan = array();

            for($i=0;$i<count($request->input('no'));$i++) {
                array_push($no, $request->input('no')[$i]);
                array_push($keterangan, $request->input('keterangan')[$i]);
                array_push($qty,$this->joinNum($request->input('qty')[$i]));
                array_push($harga, $this->joinNum($request->input('harga')[$i]));
                array_push($satuan, $request->input('satuan')[$i]);
            }

            $form = array(
                'no_proyek' => $request->input('no_proyek'),
                'nilai_anggaran' => $this->joinNum($request->input('nilai_anggaran')),
                'nomor' => $no,
                'keterangan' => $keterangan,
                'jumlah' => $qty,
                'satuan' => $satuan,
                'harga' => $harga,
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/rab-proyek',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $form
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

    public function getData(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-trans/rab-proyek?no_rab='.$request->query('kode'),
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request) {
        $this->validate($request, [
            'no_rab' => 'required',
            'no_proyek' => 'required',
            'nilai_kontrak' => 'required',
            'nilai_anggaran' => 'required',
            'no' => 'required|array',
            'keterangan' => 'required|array',
            'qty' => 'required|array',
            'harga' => 'required|array',
            'satuan' => 'required|array',
        ]);

        try {
            $no = array();
            $keterangan = array();
            $qty = array();
            $harga = array();
            $satuan = array();

            for($i=0;$i<count($request->input('no'));$i++) {
                array_push($no, $request->input('no')[$i]);
                array_push($keterangan, $request->input('keterangan')[$i]);
                array_push($qty,$this->joinNum($request->input('qty')[$i]));
                array_push($harga, $this->joinNum($request->input('harga')[$i]));
                array_push($satuan, $request->input('satuan')[$i]);
            }

            $form = array(
                'no_rab' => $request->input('no_rab'),
                'no_proyek' => $request->input('no_proyek'),
                'nilai_anggaran' => $this->joinNum($request->input('nilai_anggaran')),
                'nomor' => $no,
                'keterangan' => $keterangan,
                'jumlah' => $qty,
                'satuan' => $satuan,
                'harga' => $harga,
            );

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'java-trans/rab-proyek',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $form
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

    public function delete(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'java-trans/rab-proyek?no_rab='.$request->input('kode'),
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

    }

}

?>