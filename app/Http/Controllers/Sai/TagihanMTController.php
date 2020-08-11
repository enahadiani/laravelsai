<?php

namespace App\Http\Controllers\Sai;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class TagihanMTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/sai-trans/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('sai-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET', $this->link.'tagihan-maintain',[
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
            'keterangan' => 'required',
            'total_nilai' => 'required',
            'total_nilai_ppn' => 'required',
            'jenis'=> 'required',
            'periode'=> 'required',
            'cust'=> 'required|array',
            'no_dokumen'=> 'required|array',
            'due_date'=> 'required|array',
            'no_kontrak'=> 'required|array',
            'item'=> 'required|array',
            'nilai'=> 'required|array',
            'nilai_ppn'=> 'required|array',
        ]);
    
            $explode_tgl = explode('/', $request->tanggal);
            $tgl = $explode_tgl[0];
            $bln = $explode_tgl[1];
            $tahun = $explode_tgl[2];
            $tanggal = $tahun."-".$bln."-".$tgl;

            $fields = [
                    [
                        'name' => 'tanggal',
                        'contents' => $tanggal,
                    ],
                    [
                        'name' => 'nik_app',
                        'contents' => Session::get('userLog'),
                    ],
                    [
                        'name' => 'keterangan',
                        'contents' => $request->keterangan,
                    ],
                    [
                        'name' => 'periode',
                        'contents' => $request->periode,
                    ],
                    [
                        'name' => 'total_nilai',
                        'contents' => intval(str_replace('.','', $request->total_nilai)),
                    ],
                    [
                        'name' => 'total_nilai_ppn',
                        'contents' => intval(str_replace('.','', $request->total_nilai_ppn)),
                    ],
                    [
                        'name' => 'status_kontrak',
                        'contents' => $request->jenis,
                    ],
                ];
        
        if(count($request->generate) > 0){
            for($i=0;$i<count($request->generate);$i++){
                $explode_due = explode('/', $request->due_date[$i]);
                $tgl_due = $explode_due[0];
                $bln_due = $explode_due[1];
                $tahun_due = $explode_due[2];
                $tanggal_due = $tahun_due."-".$bln_due."-".$tgl_due;

                if($request->generate[$i] == 'true'){
                    $status = '1';
                }else {
                    $status = '0';
                }
                    
                $field_generate[$i] = array('name'=>'status[]','contents'=>$status);
                $field_dokumen[$i] = array('name'=>'no_dokumen[]','contents'=>$request->no_dokumen[$i]);
                $field_cust[$i] = array('name'=>'kode_cust[]','contents'=>substr($request->cust[$i],0,5));
                $field_kontrak[$i] = array('name'=>'no_kontrak[]','contents'=>$request->no_kontrak[$i]);
                $field_item[$i] = array('name'=>'item[]','contents'=>$request->item[$i]);
                $field_nilai[$i] = array('name'=>'nilai[]','contents'=>intval(str_replace('.','', $request->nilai[$i])));
                $field_ppn[$i] = array('name'=>'nilai_ppn[]','contents'=>intval(str_replace('.','', $request->nilai_ppn[$i])));
                $field_date[$i] = array('name'=>'due_date[]','contents'=>$tanggal_due);
                
            }
            $send_data = array_merge($fields,$field_generate,$field_dokumen,$field_cust,$field_kontrak,$field_item,$field_nilai,$field_ppn,$field_date);
        }
        
        $cek = $request->file_dok;
        $fields_dok = array();
        $fields_nama_dok = array();
        if(!empty($cek)){
            if(count($request->file_dok) > 0){
    
                for($i=0;$i<count($request->file_dok);$i++){
                    $image_path = $request->file('file_dok')[$i]->getPathname();
                    $image_mime = $request->file('file_dok')[$i]->getmimeType();
                    $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                    $fields_dok[$i] = array(
                        'name'     => 'file[]',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    );
                    $fields_nama_dok[$i] = array(
                        'name' => 'nama_file[]',
                        'contents' => $image_org
                    );
                }
                    $send_data = array_merge($send_data,$fields_dok,$fields_nama_dok);
                }
        }
        
        try { 
            $client = new Client();
            $response = $client->request('POST', $this->link.'tagihan-maintain',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
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

    public function show($id) {
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'tagihan-maintain-detail?no_bukti='.$id,
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request, $id) {
       $this->validate($request, [
            'tanggal' => 'required',
            'keterangan' => 'required',
            'total_nilai' => 'required',
            'total_nilai_ppn' => 'required',
            'jenis'=> 'required',
            'periode'=> 'required',
            'cust'=> 'required|array',
            'no_dokumen'=> 'required|array',
            'due_date'=> 'required|array',
            'no_kontrak'=> 'required|array',
            'item'=> 'required|array',
            'nilai'=> 'required|array',
            'nilai_ppn'=> 'required|array',
        ]);
    
            $explode_tgl = explode('/', $request->tanggal);
            $tgl = $explode_tgl[0];
            $bln = $explode_tgl[1];
            $tahun = $explode_tgl[2];
            $tanggal = $tahun."-".$bln."-".$tgl;

            $fields = [
                    [
                        'name' => 'tanggal',
                        'contents' => $tanggal,
                    ],
                    [
                        'name' => 'nik_app',
                        'contents' => Session::get('userLog'),
                    ],
                    [
                        'name' => 'keterangan',
                        'contents' => $request->keterangan,
                    ],
                    [
                        'name' => 'periode',
                        'contents' => $request->periode,
                    ],
                    [
                        'name' => 'total_nilai',
                        'contents' => intval(str_replace('.','', $request->total_nilai)),
                    ],
                    [
                        'name' => 'total_nilai_ppn',
                        'contents' => intval(str_replace('.','', $request->total_nilai_ppn)),
                    ],
                    [
                        'name' => 'status_kontrak',
                        'contents' => $request->jenis,
                    ],
                ];

        if(count($request->generate) > 0){
            for($i=0;$i<count($request->generate);$i++){
                $explode_due = explode('/', $request->due_date[$i]);
                $tgl_due = $explode_due[0];
                $bln_due = $explode_due[1];
                $tahun_due = $explode_due[2];
                $tanggal_due = $tahun_due."-".$bln_due."-".$tgl_due;

                if($request->generate[$i] == 'true'){
                    $status = '1';
                }else {
                    $status = '0';
                }
                    
                $field_generate[$i] = array('name'=>'status[]','contents'=>$status);
                $field_dokumen[$i] = array('name'=>'no_dokumen[]','contents'=>$request->no_dokumen[$i]);
                $field_cust[$i] = array('name'=>'kode_cust[]','contents'=>substr($request->cust[$i],0,5));
                $field_kontrak[$i] = array('name'=>'no_kontrak[]','contents'=>$request->no_kontrak[$i]);
                $field_item[$i] = array('name'=>'item[]','contents'=>$request->item[$i]);
                $field_nilai[$i] = array('name'=>'nilai[]','contents'=>intval(str_replace('.','', $request->nilai[$i])));
                $field_ppn[$i] = array('name'=>'nilai_ppn[]','contents'=>intval(str_replace('.','', $request->nilai_ppn[$i])));
                $field_date[$i] = array('name'=>'due_date[]','contents'=>$tanggal_due);
                
            }
            $send_data = array_merge($fields,$field_generate,$field_dokumen,$field_cust,$field_kontrak,$field_item,$field_nilai,$field_ppn,$field_date);
        }
        
        $cek = $request->file_dok;
        $fields_dok = array();
        $fields_nama_dok = array();
        if(!empty($cek)){
            if(count($request->file_dok) > 0){
    
                for($i=0;$i<count($request->file_dok);$i++){
                    $image_path = $request->file('file_dok')[$i]->getPathname();
                    $image_mime = $request->file('file_dok')[$i]->getmimeType();
                    $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                    $fields_dok[$i] = array(
                        'name'     => 'file[]',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    );
                    $fields_nama_dok[$i] = array(
                        'name' => 'nama_file[]',
                        'contents' => $image_org
                    );
                }
                    $send_data = array_merge($send_data,$fields_dok,$fields_nama_dok);
                }
        }
        
        try { 
            $client = new Client();
            $response = $client->request('POST', $this->link.'tagihan-maintain-ubah?no_bukti='.$id,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
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

    public function destroy($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE', $this->link.'tagihan-maintain?no_bukti='.$id,
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

    }
   
}
