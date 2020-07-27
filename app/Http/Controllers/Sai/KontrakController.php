<?php

namespace App\Http\Controllers\Sai;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KontrakController extends Controller
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
            $response = $client->request('GET', $this->link.'kontrak',[
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
            'no_dokumen' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'kode_cust' => 'required',
            'keterangan' => 'required',
            'nilai' => 'required',
            'deskripsi_modul' => 'required|array',
            'nilai_modul' => 'required|array',
        ]);

        try { 
                $explode_tgl_mulai = explode('/', $request->tgl_mulai);
                $tgl_mulai = $explode_tgl_mulai[0];
                $bln_mulai = $explode_tgl_mulai[1];
                $tahun_mulai = $explode_tgl_mulai[2];
                $tanggal_mulai = $tahun_mulai."-".$bln_mulai."-".$tgl_mulai;
                
                $explode_tgl_selesai = explode('/', $request->tgl_selesai);
                $tgl_selesai = $explode_tgl_selesai[0];
                $bln_selesai = $explode_tgl_selesai[1];
                $tahun_selesai = $explode_tgl_selesai[2];
                $tanggal_selesai = $tahun_selesai."-".$bln_selesai."-".$tgl_selesai;

                $fields = [
                    [
                        'name' => 'no_dokumen',
                        'contents' => $request->no_dokumen,
                    ],
                    [
                        'name' => 'tgl_awal',
                        'contents' => $tanggal_mulai,
                    ],
                    [
                        'name' => 'tgl_akhir',
                        'contents' => $tanggal_selesai,
                    ],
                    [
                        'name' => 'kode_cust',
                        'contents' => $request->kode_cust,
                    ],
                    [
                        'name' => 'keterangan',
                        'contents' => $request->keterangan,
                    ],
                    [
                        'name' => 'nilai',
                        'contents' => intval(str_replace('.','', $request->nilai)),
                    ],
                ];

                $fields_desk_modul = array();
                if(count($request->deskripsi_modul) > 0){
                    for($i=0;$i<count($request->deskripsi_modul);$i++){
                            $fields_desk_modul[$i] = array(
                                'name'     => 'deskripsi_modul[]',
                                'contents' => $request->deskripsi_modul[$i],
                        );
                    }
                    $send_data = array_merge($fields,$fields_desk_modul);
                }

                $fields_nilai_modul = array();
                if(count($request->nilai_modul) > 0){
                    for($i=0;$i<count($request->nilai_modul);$i++){
                            $fields_nilai_modul[$i] = array(
                                'name'     => 'nilai_modul[]',
                                'contents' => intval(str_replace('.','', $request->nilai_modul[$i])),
                        );
                    }
                    $send_data = array_merge($send_data,$fields_nilai_modul);
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
                $client = new Client();
                $response = $client->request('POST', $this->link.'kontrak',[
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
            $response = $client->request('GET', $this->link.'kontrak-detail?no_kontrak='.$id,
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
            'no_dokumen' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'kode_cust' => 'required',
            'keterangan' => 'required',
            'nilai' => 'required',
            'deskripsi_modul' => 'required|array',
            'nilai_modul' => 'required|array',
        ]);

        try { 
                $explode_tgl_mulai = explode('/', $request->tgl_mulai);
                $tgl_mulai = $explode_tgl_mulai[0];
                $bln_mulai = $explode_tgl_mulai[1];
                $tahun_mulai = $explode_tgl_mulai[2];
                $tanggal_mulai = $tahun_mulai."-".$bln_mulai."-".$tgl_mulai;
                
                $explode_tgl_selesai = explode('/', $request->tgl_selesai);
                $tgl_selesai = $explode_tgl_selesai[0];
                $bln_selesai = $explode_tgl_selesai[1];
                $tahun_selesai = $explode_tgl_selesai[2];
                $tanggal_selesai = $tahun_selesai."-".$bln_selesai."-".$tgl_selesai;

                $fields = [
                    [
                        'name' => 'no_dokumen',
                        'contents' => $request->no_dokumen,
                    ],
                    [
                        'name' => 'tgl_awal',
                        'contents' => $tanggal_mulai,
                    ],
                    [
                        'name' => 'tgl_akhir',
                        'contents' => $tanggal_selesai,
                    ],
                    [
                        'name' => 'kode_cust',
                        'contents' => $request->kode_cust,
                    ],
                    [
                        'name' => 'keterangan',
                        'contents' => $request->keterangan,
                    ],
                    [
                        'name' => 'nilai',
                        'contents' => intval(str_replace('.','', $request->nilai)),
                    ],
                ];

                $fields_desk_modul = array();
                if(count($request->deskripsi_modul) > 0){
                    for($i=0;$i<count($request->deskripsi_modul);$i++){
                            $fields_desk_modul[$i] = array(
                                'name'     => 'deskripsi_modul[]',
                                'contents' => $request->deskripsi_modul[$i],
                        );
                    }
                    $send_data = array_merge($fields,$fields_desk_modul);
                }

                $fields_nilai_modul = array();
                if(count($request->nilai_modul) > 0){
                    for($i=0;$i<count($request->nilai_modul);$i++){
                            $fields_nilai_modul[$i] = array(
                                'name'     => 'nilai_modul[]',
                                'contents' => intval(str_replace('.','', $request->nilai_modul[$i])),
                        );
                    }
                    $send_data = array_merge($send_data,$fields_nilai_modul);
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
                $client = new Client();
                $response = $client->request('POST', $this->link.'kontrak-ubah?no_kontrak='.$id,[
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
            $response = $client->request('DELETE', $this->link.'kontrak?no_kontrak='.$id,
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
