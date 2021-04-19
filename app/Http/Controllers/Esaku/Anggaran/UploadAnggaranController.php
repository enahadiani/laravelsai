<?php
namespace App\Http\Controllers\Esaku\Anggaran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class UploadAnggaranController extends Controller { 
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

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        try{
            
            $image_path = $request->file('file')->getPathname();
            $image_mime = $request->file('file')->getmimeType();
            $image_org  = $request->file('file')->getClientOriginalName();
            $fields[0] = array(
                'name'     => 'file',
                'filename' => $image_org,
                'Mime-Type'=> $image_mime,
                'contents' => fopen($image_path, 'r' ),
            );
            $fields[1] = array(
                'name'     => 'nik_user',
                'contents' => Session::get('nikUser')
            );
            $fields[2] = array(
                'name'     => 'tahun',
                'contents' => $request->tahun
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/anggaran-upload',[
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
            $result['message'] = $res;
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

    public function loadAnggaran()
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/anggaran-load',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nik_user' => Session::get('nikUser')
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun' => 'required',
            'metode' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/anggaran',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'tahun' => $request->tahun,
                    'nik_user' => Session::get('nikUser'),
                    'mode_input'=>"REPLACE"
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }
}

?>