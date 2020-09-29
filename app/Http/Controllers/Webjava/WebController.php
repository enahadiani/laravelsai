<?php

namespace App\Http\Controllers\Webjava;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class WebController extends Controller
{

    public function index()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $agen = getenv('HTTP_USER_AGENT');
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        if($agen != false){
            $ins = array(
                'nik'=>'visitor',
                'tanggal' => date('Y-m-d H:i:s'),
                'ip' => $ip,
                'agen' => $agen,
                'kota' => $details->city,
                'loc' => $details->loc,
                'region' => $details->region,
                'negara' => $details->country,
                'page' => 'Home'
            );
            $response = $client->request('POST',  config('api.url').'webginas/lab-log',[
                'form_params' => $ins
            ]);
        }
        return view('webjava.templateWeb');
        
    }

    public function cek_session()
    {
        // return view('login');
        if(!Session::get('login')){
            return response()->json(['status'=>false], 200);
        }
        else{
            return response()->json(['status'=>true], 200);
        }
        
    }

    public function cek_auth(Request $request){

        try {
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'gl/login',[
                'form_params' => [
                    'nik' => $request->input('nik'),
                    'password' => $request->input('password')
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
                if($data["message"] == "success"){
                    Session::put('token',$data["token"]);
                    Session::put('login',TRUE);
                    $response2 = $client->request('GET',  config('api.url').'gl/profile',[
                        'headers' => [
                            'Authorization' => 'Bearer '.$data["token"],
                            'Accept'     => 'application/json',
                        ]
                    ]);
            
                    if ($response2->getStatusCode() == 200) { // 200 OK
                        $response_data2 = $response2->getBody()->getContents();
                        
                        $data2 = json_decode($response_data2,true);
                        $res = $data2['user'];
                        if(count($res) > 0){
                            Session::put('isLoggedIn',true);
                            Session::put('kodeMenu',$res[0]["kode_klp_menu"]);
                            Session::put('userLog',$res[0]["nik"]);
                            Session::put('namaUser',$res[0]["nama"]);
                            Session::put('statusAdmin',$res[0]["status_admin"]);
                            Session::put('klpAkses',$res[0]["klp_akses"]);
                            Session::put('lokasi',$res[0]["kode_lokasi"]);
                            Session::put('namaLokasi',$res[0]["nmlok"]);
                            Session::put('kodePP',$res[0]["kode_pp"]);
                            Session::put('namaPP',$res[0]["nama_pp"]);
                            // Session::put('kode_lokkonsol',$res[0]["kode_lokkonsol"]);
                            $tmp = explode("_",$res[0]["path_view"]);
                            if(isset($tmp[2])){
                                $dash = $tmp[2];
                            }else{
                                $dash = "-";
                            }
                            
                            Session::put('dash',$dash);
                            Session::put('foto',$res[0]["foto"]);
                            Session::put('logo',$res[0]["logo"]);
                            Session::put('no_telp',$res[0]["no_telp"]);
                            Session::put('jabatan',$res[0]["jabatan"]);
                            Session::put('periode',$data2["periode"][0]["periode"]);
                            Session::put('kode_fs',(isset($data2["kode_fs"][0]["kode_fs"]) ? $data2["kode_fs"][0]["kode_fs"] : ""));
                        }
                    }
                    
                    return redirect('saku/');
                }else{
                    return redirect('saku/login')->with('alert','Password atau NIK, Salah !');
                }
            
            }else if($response->getStatusCode() == 401){
                return redirect('saku/login')->with('alert','Password atau NIK, Salah !');
            }

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return redirect('saku/login')->with('alert',$res["message"]);
        }
        
    }

    public function login(){
        return view('saku.login');
    }

    public function logout(){
        Session::flush();
        return redirect('saku/login')->with('alert','Kamu sudah logout');
    }

    public function getMenu(){
        $client = new Client();
        $url = url('webjava/form/');
        $response = $client->request('GET',  config('api.url').'webjava/menu/',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'domain' => 'javaturbine',
                'url_web' => $url
            ]
        ]);

        $hasil = "";
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $success = json_decode($response_data,true);
    
        }else{
            $success['status'] = true;
            $success['html'] = "" ;
            $success['data'] = [] ;
            $success['message'] = "error" ;
        }
                
        return response()->json([$success], 200);     
    }
    
    public function getGallery(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'webjava/gallery',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }    
    }

    public function getKontak(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'webjava/kontak',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }    
    }

    public function getPage($id){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'webjava/page/'.$id,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }    
    }

    public function getNews(Request $request){
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'webjava/news',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'page' => $request->page,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'jenis' => $request->jenis,
                'str' => $request->str,
            ]
        ]);

        $hasil = "";
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            $success = json_decode($response_data,true);
    
        }else{
            $success['status'] = true;
            $success['daftar_artikel'] = [] ;
            $success['categories'] = [] ;
            $success['archive'] = [] ;
            $success['jumlah_artikel'] = 0 ;
            $success['item_per_page'] = 0 ;
            $success['active_page'] = 0 ;
        }
                
        return response()->json([$success], 200);     
    }

    public function getArticle(Request $request){
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'webjava/article',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'page' => $request->page,
                'bln' => $request->bln,
                'thn' => $request->thn,
                'jenis' => $request->jenis,
                'str' => $request->str,
            ]
        ]);

        $hasil = "";
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            $success = json_decode($response_data,true);
    
        }else{
            $success['status'] = true;
            $success['daftar_artikel'] = [] ;
            $success['categories'] = [] ;
            $success['archive'] = [] ;
            $success['jumlah_artikel'] = 0 ;
            $success['item_per_page'] = 0 ;
            $success['active_page'] = 0 ;
        }
                
        return response()->json([$success], 200);     
    }
    
    public function readItem($id){
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'webjava/read-item',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'id' => $id
            ]
        ]);

        $hasil = "";
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            $success = json_decode($response_data,true);
    
        }else{
            $success['status'] = true;
            $success['daftar_artikel'] = [] ;
            $success['categories'] = [] ;
            $success['archive'] = [] ;
            $success['jumlah_artikel'] = 0 ;
            $success['item_per_page'] = 0 ;
            $success['active_page'] = 0 ;
        }
                
        return response()->json([$success], 200);     
    }
    
}
