<?php
namespace App\Http\Controllers\Esaku\Aktap;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class AkunAktivaTetapController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/fa-klpakun',[
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
            'kode_klpakun' => 'required',
            'nama' => 'required',
            'umur'=>'required',          
            'persen'=>'required',          
            'kode_akun'=>'required',          
            'akun_bp'=>'required',          
            'akun_deprs'=>'required',          
            'flag_susut'=>'required',          
        ]);

        try {
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-master/fa-klpakun',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_klpakun' => $request->kode_klpakun,
                    'nama' => $request->nama,
                    'umur'=>$request->umur,
                    'persen'=>$request->persen,
                    'kode_akun'=>$request->kode_akun,
                    'akun_bp'=>$request->akun_bp,
                    'akun_deprs'=>$request->akun_deprs,
                    'flag_susut'=>$request->flag_susut
                ]
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

    public function show(Request $request) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/fa-klpakun',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_klpakun' => $request->kode_klpakun
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

    public function update(Request $request, $kode) { 
        $this->validate($request, [
            'kode_klpakun' => 'required',
            'nama' => 'required',
            'umur'=>'required',          
            'persen'=>'required',          
            'kode_akun'=>'required',          
            'akun_bp'=>'required',          
            'akun_deprs'=>'required',          
            'flag_susut'=>'required',          
        ]);

        try {
            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'esaku-master/fa-klpakun?kode_klpakun='.$kode,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_klpakun' => $request->kode_klpakun,
                    'nama' => $request->nama,
                    'umur'=>$request->umur,
                    'persen'=>$request->persen,
                    'kode_akun'=>$request->kode_akun,
                    'akun_bp'=>$request->akun_bp,
                    'akun_deprs'=>$request->akun_deprs,
                    'flag_susut'=>$request->flag_susut
                ]
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
            $response = $client->request('DELETE',  config('api.url').'esaku-master/fa-klpakun?kode_klpakun='.$id,
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

?>