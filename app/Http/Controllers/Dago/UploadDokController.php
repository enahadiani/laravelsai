<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class UploadDokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/dago-trans/';

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dago-auth/login')->with('alert','Session telah habis !');
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
            $response = $client->request('GET', $this->link.'upload-dok',[
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
            'upload_tgl_terima' => 'required',
            'upload_no_reg' => 'required',
            'upload_no_dokumen'=>'required|array',
            'file_dok.*'=>'required|file|max:3072'
        ]); 
        try{
           
            $name = array('upload_tgl_terima','upload_no_reg');

            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++){
                $fields_data[$i] = array(
                    'name'     => $name[$i],
                    'contents' => $req[$name[$i]],
                );   
                $data[$i] = $name[$i];
            }
           
            $fields = array_merge($fields,$fields_data);

            $fields_foto = array();
            $cek = $request->file_dok;
            if(!empty($cek)){

                if(count($request->file_dok) > 0){

                    for($i=0;$i<count($request->file_dok);$i++){
                        $image_path = $request->file('file_dok')[$i]->getPathname();
                        $image_mime = $request->file('file_dok')[$i]->getmimeType();
                        $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                        $fields_foto[$i] = array(
                            'name'     => 'file_dok[]',
                            'filename' => $image_org,
                            'Mime-Type'=> $image_mime,
                            'contents' => fopen( $image_path, 'r' ),
                        );
                    }
                    $fields = array_merge($fields,$fields_foto);
                }
            }
            
            $client = new Client();
            $response = $client->request('POST', $this->link.'upload-dok',[
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
            
            // return response()->json(['data' => $fields], 200);
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
            'no_reg' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'upload-dok-detail?no_reg='.$request->no_reg,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_reg' => $request->no_reg
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
