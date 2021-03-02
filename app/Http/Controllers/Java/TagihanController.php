<?php
namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class TagihanController extends Controller { 

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

    public function index() {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'java-trans/tagihan-proyek',[
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
            'tanggal' => 'required',
            'keterangan' => 'required',
            'nilai' => 'required',
            'biaya_lain' => 'required',
            'pajak' => 'required',
            'uang_muka' => 'required',
            'kode_cust' => 'required',
            'no' => 'required|array',
            'item' => 'required|array',
            'harga' => 'required|array'
        ]);

        try {
            $no = array();
            $item = array();
            $harga = array();

            for($i=0;$i<count($request->input('no'));$i++) {
                array_push($no, $request->input('no')[$i]);
                array_push($item, $request->input('item')[$i]);
                array_push($harga, $this->joinNum($request->input('harga')[$i]));
            }

            $form = array(
                'no_proyek' => $request->input('no_proyek'),
                'tanggal' => $this->convertDate($request->input('tanggal')),
                'keterangan' => $request->input('keterangan'),
                'nilai' => $this->joinNum($request->input('nilai')),
                'biaya_lain' => $this->joinNum($request->input('biaya_lain')),
                'pajak' => $this->joinNum($request->input('pajak')),
                'uang_muka' => $this->joinNum($request->input('uang_muka')),
                'kode_cust' => $request->input('kode_cust'),
                'nomor' => $no,
                'item' => $item,
                'harga' => $harga,
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/tagihan-proyek',[
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
            $response = $client->request('GET',  config('api.url').'java-trans/tagihan-proyek?no_tagihan='.$request->query('kode'),
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
            'no_tagihan' => 'required',
            'no_proyek' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'nilai' => 'required',
            'biaya_lain' => 'required',
            'pajak' => 'required',
            'uang_muka' => 'required',
            'kode_cust' => 'required',
            'no' => 'required|array',
            'item' => 'required|array',
            'harga' => 'required|array'
        ]);

        try {
            $no = array();
            $item = array();
            $harga = array();

            for($i=0;$i<count($request->input('no'));$i++) {
                array_push($no, $request->input('no')[$i]);
                array_push($item, $request->input('item')[$i]);
                array_push($harga, $this->joinNum($request->input('harga')[$i]));
            }

            $form = array(
                'no_tagihan' => $request->input('no_tagihan'),
                'no_proyek' => $request->input('no_proyek'),
                'tanggal' => $this->convertDate($request->input('tanggal')),
                'keterangan' => $request->input('keterangan'),
                'nilai' => $this->joinNum($request->input('nilai')),
                'biaya_lain' => $this->joinNum($request->input('biaya_lain')),
                'pajak' => $this->joinNum($request->input('pajak')),
                'uang_muka' => $this->joinNum($request->input('uang_muka')),
                'kode_cust' => $request->input('kode_cust'),
                'nomor' => $no,
                'item' => $item,
                'harga' => $harga,
            );

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'java-trans/tagihan-proyek',[
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
            $response = $client->request('DELETE',  config('api.url').'java-trans/tagihan-proyek?no_tagihan='.$request->input('kode'),
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