<?php

namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PembayaranProyekController extends Controller { 

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
            $response = $client->request('GET',  config('api.url').'java-trans/bayar-proyek',[
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
            'kode_cust' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'nilai' => 'required',
            'biaya_lain' => 'required',
            'kode_bank' => 'required',
            'jenis' => 'required',
            'no' => 'required|array',
            'no_tagihan' => 'required|array',
            'no_dokumen' => 'required|array',
            'nilai_bayar' => 'required|array'
        ]);

        try {
            $no = array();
            $no_tagihan = array();
            $no_dokumen = array();
            $nilai_bayar = array();

            for($i=0;$i<count($request->input('no'));$i++) {
                array_push($no, $request->input('no')[$i]);
                array_push($no_tagihan, $request->input('no_tagihan')[$i]);
                array_push($no_dokumen, $request->input('no_dokumen')[$i]);
                array_push($nilai_bayar, $this->joinNum($request->input('nilai_bayar')[$i]));
            }

            $form = array(
                'tanggal' => $this->convertDate($request->input('tanggal')),
                'keterangan' => $request->input('keterangan'),
                'nilai' => $this->joinNum($request->input('nilai')),
                'kode_cust' => $request->input('kode_cust'),
                'kode_bank' => $request->input('kode_bank'),
                'jenis' => $request->input('jenis'),
                'biaya_lain' => $this->joinNum($request->input('biaya_lain')),
                'nomor' => $no,
                'no_tagihan' => $no_tagihan,
                'no_dokumen' => $no_dokumen,
                'nilai_bayar' => $nilai_bayar
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/bayar-proyek',[
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
            $response = $client->request('GET',  config('api.url').'java-trans/bayar-proyek?no_bayar='.$request->query('kode'),
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