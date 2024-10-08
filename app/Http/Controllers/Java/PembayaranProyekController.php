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
            'nilai_bayar' => 'required|array',
            'nilai_tagihan' => 'required|array'
        ]);

        try {
            if($request->hasfile('file')) {
                $name = array('kode_cust','tanggal','keterangan','nilai','biaya_lain','kode_bank','jenis','file');
            } else {
                $name = array('kode_cust','tanggal','keterangan','nilai','biaya_lain','kode_bank','jenis');
            }

            $req = $request->all();
            $fields = array();
            $data = array();
            $no = array();
            $no_tagihan = array();
            $no_dokumen = array();
            $nilai_bayar = array();
            $nilai_tagihan = array();

            for($i=0;$i<count($name);$i++) { 
                if($name[$i] == 'file') {
                    $image_path = $request->file('file')->getPathname();
                    $image_mime = $request->file('file')->getmimeType();
                    $image_org  = $request->file('file')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } elseif($name[$i] == 'nilai') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->joinNum($request->input('nilai'))
                    );
                } elseif($name[$i] == 'biaya_lain') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->joinNum($request->input('biaya_lain'))
                    );
                } elseif($name[$i] == 'tanggal') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->convertDate($request->input('tanggal'))
                    );
                } else {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]]
                    );
                }
                $data[$i] = $name[$i];
            }

            $fields = array_merge($fields,$fields_data);

            for($i=0;$i<count($request->input('no'));$i++) {
                $no[$i] = array(
                    'name'     => 'nomor[]',
                    'contents' => $request->no[$i],
                );
                $no_tagihan[$i] = array(
                    'name'     => 'no_tagihan[]',
                    'contents' => $request->no_tagihan[$i],
                );
                $no_dokumen[$i] = array(
                    'name'     => 'no_dokumen[]',
                    'contents' => $request->no_dokumen[$i],
                );
                $nilai_bayar[$i] = array(
                    'name'     => 'nilai_bayar[]',
                    'contents' => $this->joinNum($request->nilai_bayar[$i]),
                );
                $nilai_tagihan[$i] = array(
                    'name'     => 'nilai_tagihan[]',
                    'contents' => $this->joinNum($request->nilai_tagihan[$i]),
                );
                // array_push($no, $request->input('no')[$i]);
                // array_push($no_tagihan, $request->input('no_tagihan')[$i]);
                // array_push($no_dokumen, $request->input('no_dokumen')[$i]);
                // array_push($nilai_bayar, $this->joinNum($request->input('nilai_bayar')[$i]));
            }
            $fields = array_merge($fields,$no);
            $fields = array_merge($fields,$no_tagihan);
            $fields = array_merge($fields,$no_dokumen);
            $fields = array_merge($fields,$nilai_bayar);
            $fields = array_merge($fields,$nilai_tagihan);

            // $form = array(
            //     'tanggal' => $this->convertDate($request->input('tanggal')),
            //     'keterangan' => $request->input('keterangan'),
            //     'nilai' => $this->joinNum($request->input('nilai')),
            //     'kode_cust' => $request->input('kode_cust'),
            //     'kode_bank' => $request->input('kode_bank'),
            //     'jenis' => $request->input('jenis'),
            //     'biaya_lain' => $this->joinNum($request->input('biaya_lain')),
            //     'nomor' => $no,
            //     'no_tagihan' => $no_tagihan,
            //     'no_dokumen' => $no_dokumen,
            //     'nilai_bayar' => $nilai_bayar
            // );

            // echo "<pre>";
            // var_dump($fields);
            // echo "</pre>";

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/bayar-proyek',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
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

    public function update(Request $request) {
        $this->validate($request, [
            'no_bayar' => 'required',
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
            'nilai_bayar' => 'required|array',
            'nilai_tagihan' => 'required|array'
        ]);

        try {
            if($request->hasfile('file')) {
                $name = array('no_bayar','kode_cust','tanggal','keterangan','nilai','biaya_lain','kode_bank','jenis','file');
            } else {
                $name = array('no_bayar','kode_cust','tanggal','keterangan','nilai','biaya_lain','kode_bank','jenis');
            }

            $req = $request->all();
            $fields = array();
            $data = array();
            $no = array();
            $no_tagihan = array();
            $no_dokumen = array();
            $nilai_bayar = array();
            $nilai_tagihan = array();

            for($i=0;$i<count($name);$i++) { 
                if($name[$i] == 'file') {
                    $image_path = $request->file('file')->getPathname();
                    $image_mime = $request->file('file')->getmimeType();
                    $image_org  = $request->file('file')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } elseif($name[$i] == 'nilai') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->joinNum($request->input('nilai'))
                    );
                } elseif($name[$i] == 'biaya_lain') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->joinNum($request->input('biaya_lain'))
                    );
                } elseif($name[$i] == 'tanggal') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->convertDate($request->input('tanggal'))
                    );
                } else {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]]
                    );
                }
                $data[$i] = $name[$i];
            }

            $fields = array_merge($fields,$fields_data);

            for($i=0;$i<count($request->input('no'));$i++) {
                $no[$i] = array(
                    'name'     => 'nomor[]',
                    'contents' => $request->no[$i],
                );
                $no_tagihan[$i] = array(
                    'name'     => 'no_tagihan[]',
                    'contents' => $request->no_tagihan[$i],
                );
                $no_dokumen[$i] = array(
                    'name'     => 'no_dokumen[]',
                    'contents' => $request->no_dokumen[$i],
                );
                $nilai_bayar[$i] = array(
                    'name'     => 'nilai_bayar[]',
                    'contents' => $this->joinNum($request->nilai_bayar[$i]),
                );
                $nilai_tagihan[$i] = array(
                    'name'     => 'nilai_tagihan[]',
                    'contents' => $this->joinNum($request->nilai_tagihan[$i]),
                );
                // array_push($no, $request->input('no')[$i]);
                // array_push($no_tagihan, $request->input('no_tagihan')[$i]);
                // array_push($no_dokumen, $request->input('no_dokumen')[$i]);
                // array_push($nilai_bayar, $this->joinNum($request->input('nilai_bayar')[$i]));
            }
            $fields = array_merge($fields,$no);
            $fields = array_merge($fields,$no_tagihan);
            $fields = array_merge($fields,$no_dokumen);
            $fields = array_merge($fields,$nilai_bayar);
            $fields = array_merge($fields,$nilai_tagihan);

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/bayar-proyek-ubah',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
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
            $response = $client->request('DELETE',  config('api.url').'java-trans/bayar-proyek?no_bayar='.$request->input('kode'),
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