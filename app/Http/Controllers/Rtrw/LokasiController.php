<?php

namespace App\Http\Controllers\Rtrw;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/rtrw/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('rtrw/login')->with('alert','Session telah habis !');
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
            $response = $client->request('GET', $this->link.'lokasi',[
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

    public function show($id) {
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'lokasi-detail?kode_lokasi='.$id,
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

    public function destroy($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE', $this->link.'lokasi?kode_lokasi='.$id,
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

    public function store(Request $request) {
        $this->validate($request, [
            'kode_lokasi' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kodepos' => 'required',
            'notelp' => 'required',
            'nofax' => 'required',
            'email' => 'required',
            'website' => 'required',
            'npwp' => 'required',
            'pic' => 'required',
            'kode_konsol' => 'required',
            'status_konsol' => 'required',
            'tgl_pkp' => 'required',
            'status_pusat' => 'required',
            'logo' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try { 
            if($request->hasfile('logo')) {
                $name = array('kode_lokasi','nama','alamat','kota','kodepos','no_telp','no_fax','flag_konsol','email','website','npwp','pic','kode_lokkonsol','tgl_pkp','flag_pusat','logo');
            } else {
                $name = array('kode_lokasi','nama','alamat','kota','kodepos','no_telp','no_fax','flag_konsol','email','website','npwp','pic','kode_lokkonsol','tgl_pkp','flag_pusat');
            }
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'logo') {
                    $image_path = $request->file('logo')->getPathname();
                    $image_mime = $request->file('logo')->getmimeType();
                    $image_org  = $request->file('logo')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } else if($name[$i] == 'no_telp') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['notelp'] 
                    );
                } else if($name[$i] == 'no_fax') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['nofax'] 
                    );
                } else if($name[$i] == 'kode_lokkonsol') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['kode_konsol'] 
                    );
                } else if($name[$i] == 'tgl_pkp') {
                    $split = explode('/', $req['tgl_pkp']);
                    $tgl = $split[0];
                    $bln = $split[1];
                    $tahun = $split[2];
                    $tanggal = $tahun."-".$bln."-".$tgl;
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $tanggal 
                    );
                } else if($name[$i] == 'flag_konsol') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['status_konsol'] 
                    );
                } else if($name[$i] == 'flag_pusat') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['status_pusat'] 
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
                $response = $client->request('POST', $this->link.'lokasi',[
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

    public function update(Request $request, $id) {
        $this->validate($request, [
            'kode_lokasi' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kodepos' => 'required',
            'notelp' => 'required',
            'nofax' => 'required',
            'email' => 'required',
            'website' => 'required',
            'npwp' => 'required',
            'pic' => 'required',
            'kode_konsol' => 'required',
            'status_konsol' => 'required',
            'tgl_pkp' => 'required',
            'status_pusat' => 'required',
            'logo' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try { 
            if($request->hasfile('logo')) {
                $name = array('kode_lokasi','nama','alamat','kota','kodepos','no_telp','no_fax','flag_konsol','email','website','npwp','pic','kode_lokkonsol','tgl_pkp','flag_pusat','logo');
            } else {
                $name = array('kode_lokasi','nama','alamat','kota','kodepos','no_telp','no_fax','flag_konsol','email','website','npwp','pic','kode_lokkonsol','tgl_pkp','flag_pusat');
            }
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'logo') {
                    $image_path = $request->file('logo')->getPathname();
                    $image_mime = $request->file('logo')->getmimeType();
                    $image_org  = $request->file('logo')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } else if($name[$i] == 'no_telp') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['notelp'] 
                    );
                } else if($name[$i] == 'no_fax') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['nofax'] 
                    );
                } else if($name[$i] == 'kode_lokkonsol') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['kode_konsol'] 
                    );
                } else if($name[$i] == 'tgl_pkp') {
                    $split = explode('/', $req['tgl_pkp']);
                    $tgl = $split[0];
                    $bln = $split[1];
                    $tahun = $split[2];
                    $tanggal = $tahun."-".$bln."-".$tgl;
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $tanggal 
                    );
                } else if($name[$i] == 'flag_konsol') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['status_konsol'] 
                    );
                } else if($name[$i] == 'flag_pusat') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['status_pusat'] 
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
                $response = $client->request('POST', $this->link.'lokasi-ubah?kode_lokasi='.$id,[
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
}
