<?php
namespace App\Http\Controllers\Esaku\Anggaran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ApproveAnggaranController extends Controller { 
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

    public function getKode($value) {
        $split = explode("-", $value);
        return $split[0];
    }

    public function store(Request $request) {
        $this->validate($request, [
            'status' => 'required',
            'catatan' => 'required',
            'no_usulan' => 'required',
            'keterangan' => 'required'
        ]);

        try {
            // $fields = array();
            // $akun = array();
            // $pp = array();
            // $bulan = array();
            // $saldo = array();
            // $nilai = array();

            // for($i=0;$i<count($request->no_pemberi);$i++){ 
            //     $akun[] = $this->getKode($request->anggaran[$i]);
            //     $pp[] = $this->getKode($request->pp[$i]);
            //     $bulan[] = $request->bulan[$i];  
            //     $saldo[] = $this->joinNum($request->saldo[$i]);  
            //     $nilai[] = $this->joinNum($request->nilai[$i]);  
            // }

            $fields = array(
                'status' => $request->status,
                'catatan' => $request->catatan,
                'no_pdrk' => $request->no_usulan,
                'keterangan' => $request->keterangan
            );

            // echo "<pre>";
            // var_dump($fields);
            // echo "</pre>";

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/rra-app',[
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

    public function getDataRRAAnggaran(Request $request) {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-app-ajudet',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'no_pdrk' => $request->no_pdrk
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success'];
        }
        return response()->json(['data' => $data, 'status' => true], 200);
    }

    public function getRRAAnggaran() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-app-aju',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['jurnal'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }
}

?>