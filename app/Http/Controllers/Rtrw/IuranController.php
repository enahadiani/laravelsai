<?php

namespace App\Http\Controllers\Rtrw;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class IuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/rtrw/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('rtrw/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {
        $this->validate($request, [
            'jenis_iuran' => 'required',
            'kode_pp' => 'required',
            'bulan_awal' => 'required',
            'bulan_akhir' => 'required',
            'tahun' => 'required',
            'iuran_rt' => 'required',
            'iuran_rw' => 'required'
        ]);
        try {
                $client = new Client();
                $response = $client->request('POST', $this->link.'generate-iuran',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_jenis' => $request->jenis_iuran,
                        'kode_pp' => $request->kode_pp,
                        'bulan_awal' => $request->bulan_awal,
                        'bulan_akhir' => $request->bulan_akhir,
                        'tahun' => $request->tahun,
                        'nilai_rt' => intval(str_replace('.','', $request->iuran_rt)),
                        'nilai_rw' => intval(str_replace('.','', $request->iuran_rw))
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
   
}
