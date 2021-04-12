<?php
namespace App\Http\Controllers\Esaku\Aktap;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PenyusutanRegulerController extends Controller {
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

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }

    public function convertPeriode($date) {
        $explode = explode("/", $date);

        return "$explode[2]$explode[1]";
    }

    public function hitungPenyusutan(Request $request) {
        try {
            $periode = $this->convertPeriode($request->tanggal);
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/susut-hitung',[
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
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'tanggal' => 'required',
            'no_dok' => 'required',
            'deskripsi' => 'required',
            'total' => 'required'
        ]);

        try {
            $akun_bp = array();
            $akun_deprs = array();
            $nilai = array();
            $pp_susut = array();
            for($i=0;$i<count($request->no);$i++){ 
                $akun_bp[] = $request->akun_bp[$i];
                $akun_deprs[] = $request->akun_deprs[$i];
                $nilai[] = $this->joinNum($request->nilai[$i]);  
                $pp_susut[] = $request->pp_susut[$i];  
            }

            $fields = array(
                'no_dokumen' => $request->no_dok,
                'tanggal' => $this->convertDate($request->tanggal),
                'nilai' => $this->joinNum($request->total),
                'keterangan' => $request->deskripsi,
                'kode_pp' => Session::get('kodePP'),
                'akun_bp' => $akun_bp,
                'akun_deprs' => $akun_deprs,
                'nilai_susut' => $nilai,
                'kode_ppsusut' => $pp_susut
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/susut',[
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }
}

?>