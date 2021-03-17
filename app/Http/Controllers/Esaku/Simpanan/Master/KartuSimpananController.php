<?php

namespace App\Http\Controllers\Esaku\Simpanan\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KartuSimpananController extends Controller
{
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/kartu-simpanan',[
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

    public function show($id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/kartu-simpanan?no_simp='.$id,
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

    public function getAkun(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/akun-simpanan',[
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
            'no_agg' => 'required',
            'jenis_simpanan' => 'required',
            'status_bayar' => 'required',
            'nilai' => 'required',
            'p_bunga' => 'required',
            'tgl_tagih' => 'required',
        ]);

        try {
                $isActive = $request->flag_aktif;
                if($isActive == ''){
                    $status = 0;
                }else{
                    $status = $isActive;
                }
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'esaku-master/kartu-simpanan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_agg' => $request->no_agg,
                        'kode_param' => $request->jenis_simpanan,
                        'jenis' => $request->jenis_simpanan,
                        'nilai' => $request->nilai,
                        'p_bunga' => $request->p_bunga,
                        'tgl_tagih' => $request->tgl_tagih,
                        'status_bayar' => $request->status_bayar,
                        'flag_aktif'    => $status
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
    public function update(Request $request) {
        $this->validate($request, [
            'no_agg' => 'required',
            'jenis_simpanan' => 'required',
            'status_bayar' => 'required',
            'nilai' => 'required',
            'p_bunga' => 'required',
            'tgl_tagih' => 'required',
            'no_simp'   => 'required'
        ]);

        try {
                $isActive = $request->flag_aktif;
                if($isActive == ''){
                    $status = 0;
                }else{
                    $status = $isActive;
                }
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'esaku-master/kartu-simpanan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_agg' => $request->no_agg,
                        'kode_param' => $request->jenis_simpanan,
                        'jenis' => $request->jenis_simpanan,
                        'nilai' => $request->nilai,
                        'p_bunga' => $request->p_bunga,
                        'tgl_tagih' => $request->tgl_tagih,
                        'status_bayar' => $request->status_bayar,
                        'flag_aktif'    => $status,
                        'no_simp'       => $request->no_simp
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

    public function destroy($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-master/jenis-simpanan?kode_param='.$id,
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
