<?php

namespace App\Http\Controllers\Rtrw;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PejabatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('rtrw-auth/login');
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
            $response = $client->request('GET',  config('api.url').'rtrw/pejabat',[
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
            'kode_pp' => 'required',
            'nama_rt' => 'required',
            'nama_rw' => 'required',
            'tgl_sk' => 'required',
            'no_sk' => 'required',
            'flag_aktif' => 'required',
            'cap_rt' => 'file|image|mimes:jpeg,png,jpg|max:3092',
            'ttd_rt' => 'file|image|mimes:jpeg,png,jpg|max:3092'
        ]);

        try { 
            $name = array('kode_pp','nama_rt','nama_rw','tgl_sk','no_sk','flag_aktif');
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                $fields_data[$i] = array(
                    'name'     => $name[$i],
                    'contents' => $req[$name[$i]],
                );
                $data[$i] = $name[$i];
            }
            
            $fields = array_merge($fields,$fields_data);

            $cap_rt = $request->cap_rt;
            $fields_cap_rt = array();
            if(!empty($cap_rt)){
                if($request->hasfile('cap_rt')){
                    $image_path = $request->file('cap_rt')->getPathname();
                    $image_mime = $request->file('cap_rt')->getmimeType();
                    $image_org  = $request->file('cap_rt')->getClientOriginalName();
                    $fields_cap_rt[] = array(
                        'name'     => 'cap_rt',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    );
                    $fields = array_merge($fields,$fields_cap_rt);
                }
            }

            $ttd_rt = $request->ttd_rt;
            $fields_ttd_rt = array();
            if(!empty($ttd_rt)){
                if($request->hasfile('ttd_rt')){
                    $image_path = $request->file('ttd_rt')->getPathname();
                    $image_mime = $request->file('ttd_rt')->getmimeType();
                    $image_org  = $request->file('ttd_rt')->getClientOriginalName();
                    $fields_ttd_rt[] = array(
                        'name'     => 'ttd_rt',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    );
                    $fields = array_merge($fields,$fields_ttd_rt);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rtrw/pejabat',[
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

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/pejabat-detail?kode_pp='.$id,
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
            'kode_pp' => 'required',
            'nama_rt' => 'required',
            'nama_rw' => 'required',
            'tgl_sk' => 'required',
            'no_sk' => 'required',
            'flag_aktif' => 'required',
            'cap_rt' => 'file|image|mimes:jpeg,png,jpg|max:3092',
            'ttd_rt' => 'file|image|mimes:jpeg,png,jpg|max:3092'
        ]);

        try { 
            $name = array('kode_pp','nama_rt','nama_rw','tgl_sk','no_sk','flag_aktif');
            $fields = array();
            $data = array();
            $req = $request->all();
            for($i=0;$i<count($name);$i++) {
               
                $fields_data[$i] = array(
                    'name'     => $name[$i],
                    'contents' => $req[$name[$i]],
                );
                $data[$i] = $name[$i];
            }
            $fields = array_merge($fields,$fields_data);
            
            
            $cap_rt = $request->cap_rt;
            $fields_cap_rt = array();
            if(!empty($cap_rt)){
                if($request->hasfile('cap_rt')){
                    $image_path = $request->file('cap_rt')->getPathname();
                    $image_mime = $request->file('cap_rt')->getmimeType();
                    $image_org  = $request->file('cap_rt')->getClientOriginalName();
                    $fields_cap_rt[] = array(
                        'name'     => 'cap_rt',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    );
                    $fields = array_merge($fields,$fields_cap_rt);
                }
            }

            $ttd_rt = $request->ttd_rt;
            $fields_ttd_rt = array();
            if(!empty($ttd_rt)){
                if($request->hasfile('ttd_rt')){
                    $image_path = $request->file('ttd_rt')->getPathname();
                    $image_mime = $request->file('ttd_rt')->getmimeType();
                    $image_org  = $request->file('ttd_rt')->getClientOriginalName();
                    $fields_ttd_rt[] = array(
                        'name'     => 'ttd_rt',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    );
                    $fields = array_merge($fields,$fields_ttd_rt);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rtrw/pejabat-ubah',[
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

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'rtrw/pejabat?kode_pp='.$id,
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
