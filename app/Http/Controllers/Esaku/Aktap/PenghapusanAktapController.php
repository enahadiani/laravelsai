<?php
namespace App\Http\Controllers\Esaku\Aktap;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PenghapusanAktapController extends Controller
{
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

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }

    public function convertPeriode($date, $symbol = "/") {
        $explode = explode($symbol, $date);

        return "$explode[2]$explode[1]";
    }

    public function getDataAktap(Request $request) {
        $periode = $this->convertPeriode($request->tanggal);
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/hapus-aktap-load',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $periode,
                'no_fa' => $request->aktap
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data;
        }
        return response()->json(['data' => $data, 'status' => true], 200);
    }

    public function getAkunBeban() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/hapus-aktap-akun',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data;
        }
        return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
    }

    public function getAktap(Request $request) {
        $periode = $this->convertPeriode($request->tanggal);
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/hapus-aktap-noaktap',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $periode
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data;
        }
        return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'tanggal' => 'required',
            'aktiva_tetap' => 'required',
            'no_dokumen' => 'required',
            'keterangan' => 'required',
            'beban_penghapusan' => 'required',
            'nilai_perolehan' => 'required',
            'total_penyusutan' => 'required',
            'nilai_referensi_susut' => 'required',
            'akun_akumulasi' => 'required',
            'akun_beban_penyusutan' => 'required',
            'kode_pp' => 'required',
        ]);

        try {
            $explodeAkunAkumulasi = explode('-',preg_replace('/\s+/', '', $request->akun_akumulasi));
            $explodeAkunBebanPenyusutan = explode('-',preg_replace('/\s+/', '', $request->akun_beban_penyusutan));
            $explodeBebanPenghapusan = explode('-',preg_replace('/\s+/', '', $request->beban_penghapusan));
            $form = array(
                'tanggal' => $this->convertDate($request->tanggal),
                'no_fa' => $request->aktiva_tetap,
                'no_dokumen' => $request->no_dokumen,
                'keterangan' => $request->keterangan,
                'akun_beban' => $explodeBebanPenghapusan[0],
                'harga_perolehan' => $this->joinNum($request->nilai_perolehan),
                'total_susut' => $this->joinNum($request->total_penyusutan),
                'nilai_susut' => $this->joinNum($request->nilai_referensi_susut),
                'akun_deprs' => $explodeAkunAkumulasi[0],
                'kode_akun' => $explodeAkunBebanPenyusutan[0],
                'kode_ppsusut' => $request->kode_pp,
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/hapus-aktap',[
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

    public function index() {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/hapus-aktap',[
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

    public function getData(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/hapus-aktap-detail',
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

    public function update(Request $request) { 
        $this->validate($request, [
            'tanggal' => 'required',
            'aktiva_tetap' => 'required',
            'no_dokumen' => 'required',
            'keterangan' => 'required',
            'beban_penghapusan' => 'required',
            'nilai_perolehan' => 'required',
            'total_penyusutan' => 'required',
            'nilai_referensi_susut' => 'required',
            'akun_akumulasi' => 'required',
            'akun_beban_penyusutan' => 'required',
            'kode_pp' => 'required',
        ]);

        try {
            $explodeAkunAkumulasi = explode('-',preg_replace('/\s+/', '', $request->akun_akumulasi));
            $explodeAkunBebanPenyusutan = explode('-',preg_replace('/\s+/', '', $request->akun_beban_penyusutan));
            $explodeBebanPenghapusan = explode('-',preg_replace('/\s+/', '', $request->beban_penghapusan));
            $form = array(
                'no_bukti' => $request->id,
                'tanggal' => $this->convertDate($request->tanggal),
                'no_fa' => $request->aktiva_tetap,
                'no_dokumen' => $request->no_dokumen,
                'keterangan' => $request->keterangan,
                'akun_beban' => $explodeBebanPenghapusan[0],
                'harga_perolehan' => $this->joinNum($request->nilai_perolehan),
                'total_susut' => $this->joinNum($request->total_penyusutan),
                'nilai_susut' => $this->joinNum($request->nilai_referensi_susut),
                'akun_deprs' => $explodeAkunAkumulasi[0],
                'kode_akun' => $explodeAkunBebanPenyusutan[0],
                'kode_ppsusut' => $request->kode_pp,
            );

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'esaku-trans/hapus-aktap-ubah',[
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
            $periode = $this->convertPeriode($request->input('tanggal'));
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/hapus-aktap',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->input('kode'),
                    'periode' => $periode
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