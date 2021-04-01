<?php
namespace App\Http\Controllers\AdmJava;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class TeamController extends Controller { 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('admjava-auth/login');
        }
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admjava-content/team',[
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
            'nama_team' => 'required',
            'jabatan_team' => 'required',
            'deskripsi' => 'required'
        ]);

        try { 
            $fields = array(
                array(
                    "name" => "nama_team",
                    "contents" => $request->nama_team
                ),
                array(
                    "name" => "jabatan_team",
                    "contents" => $request->jabatan_team
                ),
                array(
                    "name" => "deskripsi_team",
                    "contents" => $request->deskripsi
                )
            );

            if($request->hasfile('gambar')) {
                $image_path = $request->file('gambar')->getPathname();
                $image_mime = $request->file('gambar')->getmimeType();
                $image_org  = $request->file('gambar')->getClientOriginalName();
                $fields[] = array(
                    'name'=>'file',
                    'file_name' => $image_org,
                    'Mime-Type' => $image_mime,
                    'contents' => fopen($image_path, 'r')
                    );
            } else {
                $fields[] = array(
                'name' => 'file',
                'contents' => null
                );    
            }

            // echo "<pre>";
            // var_dump($fields);
            // echo "</pre>";

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'admjava-content/team',[
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

        } catch(BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function getData(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admjava-content/team?kode_team='.$request->query('kode'),
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
            'kode_team' => 'required',
            'nama_team' => 'required',
            'jabatan_team' => 'required',
            'deskripsi' => 'required'
        ]);

        try { 
            $fields = array(
                array(
                    "name" => "id_team",
                    "contents" => $request->kode_team
                ),
                array(
                    "name" => "nama_team",
                    "contents" => $request->nama_team
                ),
                array(
                    "name" => "jabatan_team",
                    "contents" => $request->jabatan_team
                ),
                array(
                    "name" => "deskripsi_team",
                    "contents" => $request->deskripsi
                )
            );

            if($request->hasfile('gambar')) {
                $image_path = $request->file('gambar')->getPathname();
                $image_mime = $request->file('gambar')->getmimeType();
                $image_org  = $request->file('gambar')->getClientOriginalName();
                $fields[] = array(
                    'name'=>'file',
                    'file_name' => $image_org,
                    'Mime-Type' => $image_mime,
                    'contents' => fopen($image_path, 'r')
                    );
            } else {
                $fields[] = array(
                'name' => 'file',
                'contents' => null
                );    
            }

            // echo "<pre>";
            // var_dump($fields);
            // echo "</pre>";

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'admjava-content/team-ubah',[
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

        } catch(BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function delete(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'admjava-content/team?id_team='.$request->input('kode'),
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
}

?>