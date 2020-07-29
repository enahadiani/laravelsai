<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class RegistrasiGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public $link = 'https://api.simkug.com/api/dago-trans/';

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

    public function index(Request $request){
        $this->validate($request, [
            'no_reg' => 'required'
        ]);
            
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/registrasi-group?no_reg='.$request->no_reg,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'group_no_reg' => 'required',
            'group_sts_reg' => 'required|array',
            'group_no_anggota' => 'required|array'
        ]);
            
        try{
    
            $group = array();
            if(isset($request->group_sts_reg)){
                $status_reg = $request->group_sts_reg;
                $no_peserta = $request->group_no_anggota;
                $no_reg_ref = $request->no_reg_ref;
                for($i=0;$i<count($status_reg);$i++){
                    $group[] = array(
                        'status_reg' => $status_reg[$i],
                        'no_peserta' => $no_peserta[$i],
                        'no_reg_ref' => $no_reg_ref[$i]
                    );
                }
            }

            $fields = array (
                'no_reg' => $request->group_no_reg,
                'group' => $group
            );
    
            $client = new Client();
            $response = $client->request('POST', config('api.url').'dago-trans/registrasi-group',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
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

}
