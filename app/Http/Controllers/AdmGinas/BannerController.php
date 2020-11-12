<?php

namespace App\Http\Controllers\AdmGinas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class BannerController extends Controller {
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('admginas-auth/login');
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
            $response = $client->request('GET',  config('api.url').'admginas-master/banner',[
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
        try {
            if(count($request->file_gambar) > 0) {
                for($i=0;$i<count($request->file_gambar);$i++) {
                    $upload[] = array(
                        'name' => 'file_gambar',
                        'filename' => $request->file('file_gambar')[$i]->getClientOriginalName(),
                        'Mime-Type' => $request->file('file_gambar')[$i]->getmimeType(),
                        'contents' => fopen($request->file('file_gambar')[$i]->getPathname(), 'r')
                    );
                }
                $data = $upload;
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admginas-master/banner',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $data
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();        
                $data = $response_data;//json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }

        } catch (\Throwable $ex) {
            $response = $ex;
            // $res = json_decode($response->getBody(),true);
            return $response;
            // return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }
}

?>