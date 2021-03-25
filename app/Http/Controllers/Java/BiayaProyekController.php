<?php

namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class BiayaProyekController extends Controller {

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
            $response = $client->request('GET',  config('api.url').'java-trans/biaya-proyek',[
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
            'tanggal' => 'required',
            'kode_cust' => 'required',
            'kode_vendor' => 'required',
            'no_proyek' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required',
            'no_dokumen' => 'required',
            'status' => 'required',
            'no_rab' => 'required'
        ]);

        try {
            if($request->hasfile('file')) {
                $name = array('tanggal','kode_cust','kode_vendor', 'no_proyek', 'nilai', 'keterangan', 'no_dokumen', 'status', 'no_rab', 'file');
            } else {
                $name = array('tanggal','kode_cust','kode_vendor', 'no_proyek', 'nilai', 'keterangan', 'no_dokumen', 'status', 'no_rab');
            }  
            $req = $request->all();
            $fields = array();
            $data = array();

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

            // $form = array(
            //     'tanggal' => $this->convertDate($request->input('tanggal')),
            //     'kode_cust' => $request->input('kode_cust'),
            //     'nilai' => $this->joinNum($request->input('nilai')),
            //     'kode_vendor' => $request->input('kode_vendor'),
            //     'kode_cust' => $request->input('kode_cust'),
            //     'no_proyek' => $request->input('no_proyek'),
            //     'keterangan' => $request->input('keterangan'),
            //     'no_dokumen' => $request->input('no_dokumen'),
            //     'status' => $request->input('status'),
            //     'no_rab' => $request->input('no_rab')
            // );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/biaya-proyek',[
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
            $response = $client->request('GET',  config('api.url').'java-trans/biaya-proyek?no_bukti='.$request->query('kode').'&no_rab='.$request->query('no_rab'),
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
            'no_bukti' => 'required',
            'tanggal' => 'required',
            'kode_cust' => 'required',
            'kode_vendor' => 'required',
            'no_proyek' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required',
            'no_dokumen' => 'required',
            'status' => 'required',
            'no_rab' => 'required'
        ]);

        try {
             if($request->hasfile('file')) {
                $name = array('tanggal','kode_cust','kode_vendor', 'no_proyek', 'nilai', 'keterangan', 'no_dokumen', 'status', 'no_rab', 'file');
            } else {
                $name = array('tanggal','kode_cust','kode_vendor', 'no_proyek', 'nilai', 'keterangan', 'no_dokumen', 'status', 'no_rab');
            }  
            $req = $request->all();
            $fields = array();
            $data = array();

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
            // $form = array(
            //     'tanggal' => $this->convertDate($request->input('tanggal')),
            //     'kode_cust' => $request->input('kode_cust'),
            //     'nilai' => $this->joinNum($request->input('nilai')),
            //     'kode_vendor' => $request->input('kode_vendor'),
            //     'kode_cust' => $request->input('kode_cust'),
            //     'no_proyek' => $request->input('no_proyek'),
            //     'keterangan' => $request->input('keterangan'),
            //     'no_dokumen' => $request->input('no_dokumen'),
            //     'status' => $request->input('status'),
            //     'no_rab' => $request->input('no_rab'),
            //     'no_bukti' => $request->input('no_bukti')
            // );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/biaya-proyek-ubah',[
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
            $response = $client->request('DELETE',  config('api.url').'java-trans/biaya-proyek?no_bukti='.$request->input('kode'),
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