<?php
namespace App\Http\Controllers\Esaku\Anggaran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PengajuanAnggaranController extends Controller { 
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

    public function getKode($value) {
        $split = explode("-", $value);
        return $split[0];
    }

    public function delete(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/rra-agg',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->query('kode')
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
            'no_bukti' => 'required',
            'nik_approve' => 'required',
            'keterangan' => 'required',
            'no_dok' => 'required',
            'saldo' => 'required',
            'pp_penerima' => 'required',
            'akun_penerima' => 'required',
            'bulan_penerima' => 'required',
            'nilai_penerima' => 'required',
        ]);

        try {
            $fields = array();
            $akun = array();
            $pp = array();
            $bulan = array();
            $saldo = array();
            $nilai = array();

            for($i=0;$i<count($request->no_pemberi);$i++){ 
                $akun[] = $this->getKode($request->anggaran[$i]);
                $pp[] = $this->getKode($request->pp[$i]);
                $bulan[] = $request->bulan[$i];  
                $saldo[] = $this->joinNum($request->saldo[$i]);  
                $nilai[] = $this->joinNum($request->nilai[$i]);  
            }

            $fields = array(
                'no_bukti' => $request->no_bukti,
                'tanggal' => $request->tanggal,
                'no_dokumen' => $request->no_dok,
                'nik_app' => $request->nik_approve,
                'deskripsi' => $request->keterangan,
                'kode_pp_terima' => $request->pp_penerima,
                'donor' => $this->joinNum($request->donor),
                'kode_akun_terima' => $request->akun_penerima,
                'kode_pp_aktif' => Session::get('kodePP'),
                'nilai_terima' => $this->joinNum($request->nilai_penerima),
                'bulan_terima' => $request->bulan_penerima,
                'kode_akun' => $akun,
                'kode_pp' => $pp,
                'bulan' => $bulan,
                'saldo' => $saldo,
                'nilai' => $nilai
            );

            // echo "<pre>";
            // var_dump($fields);
            // echo "</pre>";

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'esaku-trans/rra-agg',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
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

    public function show(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/rra-agg-detail',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->query('kode')
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

    public function store(Request $request) {
        $this->validate($request, [
            'nik_approve' => 'required',
            'keterangan' => 'required',
            'no_dok' => 'required',
            'saldo' => 'required',
            'pp_penerima' => 'required',
            'akun_penerima' => 'required',
            'bulan_penerima' => 'required',
            'nilai_penerima' => 'required',
        ]);

        try {
            $fields = array();
            $akun = array();
            $pp = array();
            $bulan = array();
            $saldo = array();
            $nilai = array();

            for($i=0;$i<count($request->no_pemberi);$i++){ 
                $akun[] = $this->getKode($request->anggaran[$i]);
                $pp[] = $this->getKode($request->pp[$i]);
                $bulan[] = $request->bulan[$i];  
                $saldo[] = $this->joinNum($request->saldo[$i]);  
                $nilai[] = $this->joinNum($request->nilai[$i]);  
            }

            $fields = array(
                'tanggal' => date('Y-m-d'),
                'no_dokumen' => $request->no_dok,
                'nik_app' => $request->nik_approve,
                'deskripsi' => $request->keterangan,
                'kode_pp_terima' => $request->pp_penerima,
                'donor' => $this->joinNum($request->donor),
                'kode_akun_terima' => $request->akun_penerima,
                'kode_pp_aktif' => Session::get('kodePP'),
                'nilai_terima' => $this->joinNum($request->nilai_penerima),
                'bulan_terima' => $request->bulan_penerima,
                'kode_akun' => $akun,
                'kode_pp' => $pp,
                'bulan' => $bulan,
                'saldo' => $saldo,
                'nilai' => $nilai
            );

            // echo "<pre>";
            // var_dump($fields);
            // echo "</pre>";

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/rra-agg',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
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

    public function getSaldoAnggaran(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-agg-saldo',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'bulan_terima' => $request->bulan,
                'kode_pp_terima' => $request->kode_pp,
                'kode_akun_terima' => $request->kode_akun,
                'periode' => $request->periode,
                'no_bukti' => '-'
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['saldo'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getPPAnggaran(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-pp',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'tahun' => $request->tahun
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getMataAnggaran(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-mta',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'tahun' => $request->tahun
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getAkunTerima() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-akun-terima',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getPPTerima() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-pp-terima',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getNikApprove() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-nik-app',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['data'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/rra-agg',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]['jurnal'];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
}
?>