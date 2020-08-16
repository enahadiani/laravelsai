<?php

namespace App\Http\Controllers\Sai;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
            $response = $client->request('GET',  config('api.url').'sai-master/customer',[
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
            'nama' => 'required',
            'pic' => 'required',
            'jabatan_pic' => 'required',
            'alamat'=>'required',
            'provinsi'=>'required',
            'email' => 'required',
            'no_rek'=>'required',
            'nama_rek'=>'required',
            'bank'=>'required',
            'cabang'=>'required',
            'no_telp' => 'required',
            'tanggal'=>'required',
            'kode_lampiran'=>'required|array',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try { 
            $explode_tgl = explode('/', $request->tanggal);
            $tgl = $explode_tgl[0];
            $bln = $explode_tgl[1];
            $tahun = $explode_tgl[2];
            $tanggal = $tahun."-".$bln."-".$tgl;

            $fields = [
                [
                    'name' => 'tgl_tagih',
                    'contents' => $tanggal,
                ],
                [
                    'name' => 'nama',
                    'contents' => $request->nama,
                ],
                [
                    'name' => 'email',
                    'contents' => $request->email,
                ],
                [
                    'name' => 'no_telp',
                    'contents' => $request->no_telp,
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
                [
                    'name' => 'alamat',
                    'contents' => $request->alamat,
                ],
                [
                    'name' => 'provinsi',
                    'contents' => $request->provinsi,
                ],
                [
                    'name' => 'pic',
                    'contents' => $request->pic,
                ],
                [
                    'name' => 'jabatan_pic',
                    'contents' => $request->jabatan_pic,
                ],
                [
                    'name' => 'kode_cust',
                    'contents' => $request->kode_cust,
                ],
            ];

            $fields_lampiran = array();
            if(count($request->kode_lampiran) > 0){
                for($i=0;$i<count($request->kode_lampiran);$i++){
                    $fields_lampiran[$i] = array(
                        'name'     => 'kode_lampiran[]',
                        'contents' => $request->kode_lampiran[$i],
                    );
                    }
                $send_data = array_merge($fields,$fields_lampiran);
            }

            $cek = $request->file_gambar;
            if(!empty($cek)){
                $image_path = $request->file('file_gambar')->getPathname();
                $image_mime = $request->file('file_gambar')->getmimeType();
                $image_org  = $request->file('file_gambar')->getClientOriginalName();
                $fields_data = array(
                    'name'     => $name[$i],
                    'filename' => $image_org,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen($image_path, 'r' ),
                );
                $send_data = array_merge($send_data,$fields_data);
            }
            
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sai-master/customer',[
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
            $response = $client->request('GET',  config('api.url').'sai-master/customer?kode_cust='.$id,
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
            'kode_cust' => 'required',
            'nama' => 'required',
            'pic' => 'required',
            'jabatan_pic' => 'required',
            'provinsi' => 'required',
            'alamat'=>'required',
            'email' => 'required',
            'no_rek'=>'required',
            'nama_rek'=>'required',
            'bank'=>'required',
            'cabang'=>'required',
            'no_telp' => 'required',
            'tanggal'=>'required',
            'kode_lampiran'=>'required|array',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try { 
            $explode_tgl = explode('/', $request->tanggal);
            $tgl = $explode_tgl[0];
            $bln = $explode_tgl[1];
            $tahun = $explode_tgl[2];
            $tanggal = $tahun."-".$bln."-".$tgl;

            $fields = [
                [
                    'name' => 'tgl_tagih',
                    'contents' => $tanggal,
                ],
                [
                    'name' => 'nama',
                    'contents' => $request->nama,
                ],
                [
                    'name' => 'email',
                    'contents' => $request->email,
                ],
                [
                    'name' => 'no_telp',
                    'contents' => $request->no_telp,
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
                [
                    'name' => 'alamat',
                    'contents' => $request->alamat,
                ],
                [
                    'name' => 'provinsi',
                    'contents' => $request->provinsi,
                ],
                [
                    'name' => 'pic',
                    'contents' => $request->pic,
                ],
                [
                    'name' => 'jabatan_pic',
                    'contents' => $request->jabatan_pic,
                ],
                [
                    'name' => 'kode_cust',
                    'contents' => $request->kode_cust,
                ],
            ];

            $fields_lampiran = array();
            if(count($request->kode_lampiran) > 0){
                for($i=0;$i<count($request->kode_lampiran);$i++){
                    $fields_lampiran[$i] = array(
                        'name'     => 'kode_lampiran[]',
                        'contents' => $request->kode_lampiran[$i],
                    );
                    }
                $send_data = array_merge($fields,$fields_lampiran);
            }

            $cek = $request->file_gambar;
            if(!empty($cek)){
                $image_path = $request->file('file_gambar')->getPathname();
                $image_mime = $request->file('file_gambar')->getmimeType();
                $image_org  = $request->file('file_gambar')->getClientOriginalName();
                $fields_data = array(
                    'name'     => $name[$i],
                    'filename' => $image_org,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen($image_path, 'r' ),
                );
                $send_data = array_merge($send_data,$fields_data);
            }
            
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sai-master/customer-ubah?kode_cust='.$id,[
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
            $response = $client->request('DELETE',  config('api.url').'sai-master/customer?kode_cust='.$id,
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
