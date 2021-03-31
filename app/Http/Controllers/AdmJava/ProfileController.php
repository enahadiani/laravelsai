<?php
namespace App\Http\Controllers\AdmJava;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ProfileController extends Controller { 
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
            $response = $client->request('GET',  config('api.url').'admjava-content/profile',[
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
            'nama_perusahaan' => 'required',
            'no_telp' => 'required',
            'no_fax' => 'required',
            'email' => 'required',
            'koordinat' => 'required',
            'wa' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'visi' => 'required'
        ]);

        try { 
            $fields = array(
                array(
                    "name" => "id_perusahaan",
                    "contents" => "JAVA"
                ),
                array(
                    "name" => "nama_perusahaan",
                    "contents" => $request->nama_perusahaan
                ),
                array(
                    "name" => "wa",
                    "contents" => $request->wa
                ),
                array(
                    "name" => "no_fax",
                    "contents" => $request->no_fax
                ),
                array(
                    "name" => "koordinat",
                    "contents" => $request->koordinat
                ),
                array(
                    "name" => "deskripsi",
                    "contents" => $request->deskripsi
                ),
                array(
                    "name" => "visi",
                    "contents" => $request->visi
                ),
                array(
                    "name" => "alamat",
                    "contents" => $request->alamat
                ),
                array(
                    "name" => "no_telp",
                    "contents" => $request->no_telp
                ),
                array(
                    "name" => "email",
                    "contents" => $request->email
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

            $no_urut = array();
            $misi = array();

            if($request->no !== null) {
                if(count($request->no) > 0) {
                    for($i=0;$i<count($request->no);$i++) {
                        $no_urut[$i] = array(
                            'name'     => 'no_urut[]',
                            'contents' => $request->no[$i],
                        );
                        $misi[$i] = array(
                            'name'     => 'misi[]',
                            'contents' => $request->misi[$i],
                        );
                    }
                    $fields = array_merge($fields,$no_urut);
                    $fields = array_merge($fields,$misi);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admjava-content/profile',[
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
}
?>