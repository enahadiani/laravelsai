<?php
namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class TagihanProyekController extends Controller { 

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
            // 'biaya_lain' => 'required',
            'pajak' => 'required',
            'uang_muka' => 'required',
            'kode_cust' => 'required',
        ]);

        try {
            if($request->hasfile('file')) {
                $name = array('no_proyek','tanggal','keterangan','nilai','pajak','uang_muka','kode_cust','file');
            } else {
                $name = array('no_proyek','tanggal','keterangan','nilai','pajak','uang_muka','kode_cust');
            }

            $req = $request->all();
            $fields = array();
            $data = array();
            $no = array();
            $item = array();
            $harga = array();

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
                } elseif($name[$i] == 'pajak') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->joinNum($request->input('pajak'))
                    );
                } elseif($name[$i] == 'uang_muka') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->joinNum($request->input('uang_muka'))
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

            if($request->input('no') !== null) { 
                if(count($request->input('no')) > 0) { 
                    for($i=0;$i<count($request->input('no'));$i++) {
                        $no[$i] = array(
                            'name'     => 'nomor[]',
                            'contents' => $request->no[$i],
                        );
                        $item[$i] = array(
                            'name'     => 'item[]',
                            'contents' => $request->item[$i],
                        );
                        $harga[$i] = array(
                            'name'     => 'harga[]',
                            'contents' => $this->joinNum($request->harga[$i]),
                        );
                        $fields = array_merge($fields,$no);
                        $fields = array_merge($fields,$item);
                        $fields = array_merge($fields,$harga);
                    }
                }
            }

            // $form = array(
            //     'no_proyek' => $request->input('no_proyek'),
            //     'tanggal' => $this->convertDate($request->input('tanggal')),
            //     'keterangan' => $request->input('keterangan'),
            //     'nilai' => $this->joinNum($request->input('nilai')),
            //     'biaya_lain' => 0,//$this->joinNum($request->input('biaya_lain')),
            //     'pajak' => $this->joinNum($request->input('pajak')),
            //     'uang_muka' => $this->joinNum($request->input('uang_muka')),
            //     'kode_cust' => $request->input('kode_cust'),
            //     'nomor' => $no,
            //     'item' => $item,
            //     'harga' => $harga,
            // );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/tagihan-proyek',[
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
            // 'biaya_lain' => 'required',
            'pajak' => 'required',
            'uang_muka' => 'required',
            'kode_cust' => 'required',
        ]);

        try {
             if($request->hasfile('file')) {
                $name = array('no_proyek','tanggal','keterangan','nilai','pajak','uang_muka','kode_cust','file');
            } else {
                $name = array('no_proyek','tanggal','keterangan','nilai','pajak','uang_muka','kode_cust');
            }

            $req = $request->all();
            $fields = array();
            $data = array();
            $no = array();
            $item = array();
            $harga = array();

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
                } elseif($name[$i] == 'pajak') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->joinNum($request->input('pajak'))
                    );
                } elseif($name[$i] == 'uang_muka') {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->joinNum($request->input('uang_muka'))
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

            if($request->input('no') !== null) { 
                if(count($request->input('no')) > 0) { 
                    for($i=0;$i<count($request->input('no'));$i++) {
                        $no[$i] = array(
                            'name'     => 'nomor[]',
                            'contents' => $request->no[$i],
                        );
                        $item[$i] = array(
                            'name'     => 'item[]',
                            'contents' => $request->item[$i],
                        );
                        $harga[$i] = array(
                            'name'     => 'harga[]',
                            'contents' => $this->joinNum($request->harga[$i]),
                        );
                        $fields = array_merge($fields,$no);
                        $fields = array_merge($fields,$item);
                        $fields = array_merge($fields,$harga);
                    }
                }
            }

            // $form = array(
            //     'no_tagihan' => $request->input('no_tagihan'),
            //     'no_proyek' => $request->input('no_proyek'),
            //     'tanggal' => $this->convertDate($request->input('tanggal')),
            //     'keterangan' => $request->input('keterangan'),
            //     'nilai' => $this->joinNum($request->input('nilai')),
            //     'biaya_lain' => 0,
            //     'pajak' => $this->joinNum($request->input('pajak')),
            //     'uang_muka' => $this->joinNum($request->input('uang_muka')),
            //     'kode_cust' => $request->input('kode_cust'),
            //     'nomor' => $no,
            //     'item' => $item,
            //     'harga' => $harga,
            // );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'java-trans/tagihan-proyek-ubah',[
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