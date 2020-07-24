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
    public $link = 'https://api.simkug.com/api/sai-master/';

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
            $response = $client->request('GET', $this->link.'customer',[
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
            'alamat'=>'required',
            'email' => 'required',
            'no_rek'=>'required',
            'nama_rek'=>'required',
            'no_telp' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try { 
            if($request->hasfile('file_gambar')) {
                $name = array('kode_cust','nama','pic','alamat','email','no_telp','no_rek','nama_rek','file_gambar');
            } else {
                $name = array('kode_cust','nama','pic','alamat','email','no_telp','no_rek','nama_rek');
            }
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'file_gambar') {
                    $image_path = $request->file('file_gambar')->getPathname();
                    $image_mime = $request->file('file_gambar')->getmimeType();
                    $image_org  = $request->file('file_gambar')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } else {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );
                }
                $data[$i] = $name[$i];
            }
                $fields = array_merge($fields,$fields_data);

                $client = new Client();
                $response = $client->request('POST', $this->link.'customer',[
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

    public function show($id) {
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'customer?kode_cust='.$id,
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
            'email' => 'required',
            'alamat'=>'required',
            'no_rek'=>'required',
            'nama_rek'=>'required',
            'pic' => 'required',
            'no_telp' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try { 
            if($request->hasfile('file_gambar')) {
                $name = array('kode_cust','pic','nama','email','alamat','no_telp','no_rek','nama_rek','file_gambar');
            } else {
                $name = array('kode_cust','pic','nama','email','alamat','no_telp','no_rek','nama_rek');
            }
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'file_gambar') {
                    $image_path = $request->file('file_gambar')->getPathname();
                    $image_mime = $request->file('file_gambar')->getmimeType();
                    $image_org  = $request->file('file_gambar')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } else {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );
                }
                $data[$i] = $name[$i];
            }
                $fields = array_merge($fields,$fields_data);

                $client = new Client();
                $response = $client->request('POST', $this->link.'customer-ubah?kode_custk='.$id,[
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

    public function destroy($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE', $this->link.'customer?kode_cust='.$id,
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
