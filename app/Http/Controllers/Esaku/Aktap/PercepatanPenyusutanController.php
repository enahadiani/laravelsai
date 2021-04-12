<?php
namespace App\Http\Controllers\Esaku\Aktap;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PercepatanPenyusutanController extends Controller
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

    public function convertPeriode($date) {
        $explode = explode("/", $date);

        return "$explode[2]$explode[1]";
    }

    public function getAktap(Request $request) {
        $periode = $this->convertPeriode($request->tanggal);
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/susutcpt-noaktap',[
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

    public function getDataAktap(Request $request) {
        $periode = $this->convertPeriode($request->tanggal);
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/susutcpt-load',[
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

    public function store(Request $request) {
        $this->validate($request, [
            'tanggal' => 'required',
            'umur' => 'required',
            'kode_pp_susut' => 'required',
            'kode_akun' => 'required',
            'aktiva_tetap' => 'required',
            'keterangan' => 'required',
            'nilai_penyusutan' => 'required',
            'nilai_perolehan' => 'required',
            'nilai_buku' => 'required',
            'akun_akumulasi' => 'required',
            'akun_beban_penyusutan' => 'required',
        ]);

        try {
            $explodeAkunAkumulasi = explode('-',preg_replace('/\s+/', '', $request->akun_akumulasi));
            $explodeAkunBebanPenyusutan = explode('-',preg_replace('/\s+/', '', $request->akun_beban_penyusutan));
            $form = array(
                'tanggal' => $this->convertDate($request->tanggal),
                'no_fa' => $request->aktiva_tetap,
                'kode_ppsusut' => $request->kode_pp_susut,
                'umur' => $request->umur,
                'kode_akun' => $request->kode_akun,
                'keterangan' => $request->keterangan,
                'kode_pp' => Session::get('kodePP'),
                'nilai' => $this->joinNum($request->nilai_penyusutan),
                'harga_perolehan' => $this->joinNum($request->nilai_perolehan),
                'nilai_buku' => $this->joinNum($request->nilai_buku),
                'akun_deprs' => $explodeAkunAkumulasi[0],
                'akun_bp' => $explodeAkunBebanPenyusutan[0]
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/susutcpt',[
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
}

?>