<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class JamaahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/dago-trans/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dago-auth/login')->with('alert','Session telah habis !');
        }
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET', $this->link.'jamaah',[
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_peserta' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required|in:Perempuan,Laki-laki',
            'status' => 'required|in:-,Menikah,Belum Menikah,Cerai Mati,Cerai Hidup',
            'ibu' => 'required',
            'ayah' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'telp' => 'required',
            'hp' => 'required',
            'email' => 'required|email',
            'pekerjaan' => 'required',
            'bank' => 'required',
            'norek' => 'required',
            'cabang' => 'required',
            'namarek' => 'required',
            'nopass' => 'required',
            'issued' => 'required',
            'ex_pass' => 'required',
            'kantor_mig' => 'required',
            'ec_telp' => 'required',
            'ec_hp' => 'required',
            'sp' => 'required',
            'th_haji' => 'required',
            'th_umroh' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'pendidikan' => 'required'
        ]);
            
        try{
            if($request->hasfile('foto'))
            {
                $name = array('id','no_peserta','id_peserta','nama','tempat','tgl_lahir','jk','status','pendidikan','ibu','ayah','alamat','kode_pos','telp','hp','email','pekerjaan','bank','norek','cabang','namarek','nopass','issued','ex_pass','kantor_mig','ec_telp','ec_hp','sp','th_haji','th_umroh','foto');
            }else{
                $name = array('id','no_peserta','id_peserta','nama','tempat','tgl_lahir','jk','status','pendidikan','ibu','ayah','alamat','kode_pos','telp','hp','email','pekerjaan','bank','norek','cabang','namarek','nopass','issued','ex_pass','kantor_mig','ec_telp','ec_hp','sp','th_haji','th_umroh');
            }

            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++){
                if($name[$i] == "foto"){
                    $image_path = $request->file('foto')->getPathname();
                    $image_mime = $request->file('foto')->getmimeType();
                    $image_org  = $request->file('foto')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                }
                else if($name[$i] == "tgl_lahir" || $name[$i] == "issued" || $name[$i] == "ex_pass" ){
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->reverseDate($req[$name[$i]],'/','-'),
                    );    
                }
                else{
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );    
                }
                $data[$i] = $name[$i];
            }
           
            $fields = array_merge($fields,$fields_data);
            
            $client = new Client();
            $response = $client->request('POST', $this->link.'jamaah',[
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, [
            'no_peserta' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'jamaah-detail?no_peserta='.$request->no_peserta,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function showById(Request $request)
    {
        $this->validate($request, [
            'id_peserta' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'jamaah-detail-id?id_peserta='.$request->id_peserta,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'id_peserta' => $request->id_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'no_peserta' => 'required',
            'id_peserta' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required|in:Perempuan,Laki-laki',
            'status' => 'required|in:-,Menikah,Belum Menikah,Cerai Mati,Cerai Hidup',
            'ibu' => 'required',
            'ayah' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'telp' => 'required',
            'hp' => 'required',
            'email' => 'required|email',
            'pekerjaan' => 'required',
            'bank' => 'required',
            'norek' => 'required',
            'cabang' => 'required',
            'namarek' => 'required',
            'nopass' => 'required',
            'issued' => 'required',
            'ex_pass' => 'required',
            'kantor_mig' => 'required',
            'ec_telp' => 'required',
            'ec_hp' => 'required',
            'sp' => 'required',
            'th_haji' => 'required',
            'th_umroh' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'pendidikan' => 'required'
        ]);

        try{

            if($request->hasfile('foto'))
            {
                $name = array('id','no_peserta','id_peserta','nama','tempat','tgl_lahir','jk','status','pendidikan','ibu','ayah','alamat','kode_pos','telp','hp','email','pekerjaan','bank','norek','cabang','namarek','nopass','issued','ex_pass','kantor_mig','ec_telp','ec_hp','sp','th_haji','th_umroh','foto');
            }else{
                $name = array('id','no_peserta','id_peserta','nama','tempat','tgl_lahir','jk','status','pendidikan','ibu','ayah','alamat','kode_pos','telp','hp','email','pekerjaan','bank','norek','cabang','namarek','nopass','issued','ex_pass','kantor_mig','ec_telp','ec_hp','sp','th_haji','th_umroh');
            }

            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++){
                if($name[$i] == "foto"){
                    $image_path = $request->file('foto')->getPathname();
                    $image_mime = $request->file('foto')->getmimeType();
                    $image_org  = $request->file('foto')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                }
                else if($name[$i] == "tgl_lahir" || $name[$i] == "issued" || $name[$i] == "ex_pass" ){
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $this->reverseDate($req[$name[$i]],'/','-'),
                    );    
                }
                else{
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );    
                }
                $data[$i] = $name[$i];
            }
           
            $fields = array_merge($fields,$fields_data);
            
            $client = new Client();
            $response = $client->request('POST', $this->link.'jamaah-ubah',[
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
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $this->validate($request, [
            'no_peserta' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('DELETE', $this->link.'jamaah?no_peserta='.$request->no_peserta,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_peserta' => $request->no_peserta
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    
    }
}
