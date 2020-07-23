<?php

namespace App\Http\Controllers\Sai;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class TagihanController extends Controller
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
            $response = $client->request('GET', $this->link.'tagihan',[
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
            'no_dokumen' => 'required',
            'keterangan' => 'required',
            'nilai' => 'required',
            'nilai_ppn' => 'required',
            'kode_cust' => 'required',
            'no_kontrak' => 'required',
            'bank' => 'required',
            'cabang'=> 'required',
            'no_rek'=> 'required',
            'nama_rek'=> 'required',
            'item'=> 'required|array',
            'harga'=> 'required|array',
            'jumlah'=> 'required|array',
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
                    'name' => 'no_dokumen',
                    'contents' => $request->no_dokumen,
                ],
                [
                    'name' => 'keterangan',
                    'contents' => $request->keterangan,
                ],
                [
                    'name' => 'nilai',
                    'contents' => intval(str_replace('.','', $request->nilai)),
                ],
                [
                    'name' => 'nilai_ppn',
                    'contents' => intval(str_replace('.','', $request->nilai_ppn)),
                ],
                [
                    'name' => 'kode_cust',
                    'contents' => $request->kode_cust,
                ],
                [
                    'name' => 'no_kontrak',
                    'contents' => $request->no_kontrak,
                ],
                [
                    'name' => 'bank',
                    'contents' => $request->bank,
                ],
                [
                    'name' => 'cabang',
                    'contents' => $request->cabang,
                ],
                [
                    'name' => 'no_rek',
                    'contents' => $request->no_rek,
                ],
                [
                    'name' => 'nama_rek',
                    'contents' => $request->nama_rek,
                ],
            ];

        $fields_item = array();
        if(count($request->item) > 0){
            for($i=0;$i<count($request->item);$i++){
                    $fields_item[$i] = array(
                        'name'     => 'item[]',
                        'contents' => $request->item[$i],
                );
            }
            $send_data = array_merge($fields,$fields_item);
        }
        $fields_jumlah = array();
        if(count($request->jumlah) > 0){
            for($i=0;$i<count($request->jumlah);$i++){
                    $fields_jumlah[$i] = array(
                        'name'     => 'jumlah[]',
                        'contents' => intval(str_replace('.','', $request->jumlah[$i])),
                );
            }
            $send_data = array_merge($send_data,$fields_jumlah);
        }
        $fields_harga = array();
        if(count($request->harga) > 0){
            for($i=0;$i<count($request->harga);$i++){
                    $fields_harga[$i] = array(
                        'name'     => 'harga[]',
                        'contents' => intval(str_replace('.','', $request->harga[$i])),
                );
            }
            $send_data = array_merge($send_data,$fields_harga);
        }
        $fields_foto = array();
            
        $cek = $request->file_dok;
        if(!empty($cek)){
            if(count($request->file_dok) > 0){
    
                for($i=0;$i<count($request->file_dok);$i++){
                    $image_path = $request->file('file_dok')[$i]->getPathname();
                    $image_mime = $request->file('file_dok')[$i]->getmimeType();
                    $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                    $fields_foto[$i] = array(
                        'name'     => 'file[]',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    );
                }
                    $send_data = array_merge($send_data,$fields_foto);
                }
        }
        
        try { 
                $client = new Client();
                $response = $client->request('POST', $this->link.'tagihan',[
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
            $response = $client->request('GET', $this->link.'kontrak?no_kontrak='.$id,
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
            'no_dokumen' => 'required',
            'keterangan' => 'required',
            'nilai' => 'required',
            'nilai_ppn' => 'required',
            'kode_cust' => 'required',
            'no_kontrak' => 'required',
            'bank' => 'required',
            'cabang'=> 'required',
            'no_rek'=> 'required',
            'nama_rek'=> 'required',
            'item'=> 'required|array',
            'harga'=> 'required|array',
            'jumlah'=> 'required|array',
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
                    'name' => 'no_dokumen',
                    'contents' => $request->no_dokumen,
                ],
                [
                    'name' => 'keterangan',
                    'contents' => $request->keterangan,
                ],
                [
                    'name' => 'nilai',
                    'contents' => intval(str_replace('.','', $request->nilai)),
                ],
                [
                    'name' => 'nilai_ppn',
                    'contents' => intval(str_replace('.','', $request->nilai_ppn)),
                ],
                [
                    'name' => 'kode_cust',
                    'contents' => $request->kode_cust,
                ],
                [
                    'name' => 'no_kontrak',
                    'contents' => $request->no_kontrak,
                ],
                [
                    'name' => 'bank',
                    'contents' => $request->bank,
                ],
                [
                    'name' => 'cabang',
                    'contents' => $request->cabang,
                ],
                [
                    'name' => 'no_rek',
                    'contents' => $request->no_rek,
                ],
                [
                    'name' => 'nama_rek',
                    'contents' => $request->nama_rek,
                ],
            ];

        $fields_item = array();
        if(count($request->item) > 0){
            for($i=0;$i<count($request->item);$i++){
                    $fields_item[$i] = array(
                        'name'     => 'item[]',
                        'contents' => $request->item[$i],
                );
            }
            $send_data = array_merge($fields,$fields_item);
        }
        $fields_jumlah = array();
        if(count($request->jumlah) > 0){
            for($i=0;$i<count($request->jumlah);$i++){
                    $fields_jumlah[$i] = array(
                        'name'     => 'jumlah[]',
                        'contents' => intval(str_replace('.','', $request->jumlah[$i])),
                );
            }
            $send_data = array_merge($send_data,$fields_jumlah);
        }
        $fields_harga = array();
        if(count($request->harga) > 0){
            for($i=0;$i<count($request->harga);$i++){
                    $fields_harga[$i] = array(
                        'name'     => 'harga[]',
                        'contents' => intval(str_replace('.','', $request->harga[$i])),
                );
            }
            $send_data = array_merge($send_data,$fields_harga);
        }
        $fields_foto = array();
            
        $cek = $request->file_dok;
        if(!empty($cek)){
            if(count($request->file_dok) > 0){
    
                for($i=0;$i<count($request->file_dok);$i++){
                    $image_path = $request->file('file_dok')[$i]->getPathname();
                    $image_mime = $request->file('file_dok')[$i]->getmimeType();
                    $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                    $fields_foto[$i] = array(
                        'name'     => 'file[]',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    );
                }
                    $send_data = array_merge($send_data,$fields_foto);
                }
        }
        
        try { 
                $client = new Client();
                $response = $client->request('POST', $this->link.'tagihan?no_bukti='.$id,[
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
            $response = $client->request('DELETE', $this->link.'tagihan?no_bukti='.$id,
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
