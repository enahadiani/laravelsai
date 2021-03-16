<?php

namespace App\Http\Controllers\Esaku\Simpanan\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class AnggotaController extends Controller
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
            $response = $client->request('GET',  config('api.url').'esaku-master/anggota',[
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
            $response = $client->request('GET',  config('api.url').'esaku-master/anggota?no_agg='.$id,
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

    public function store(Request $request) {
        $this->validate($request, [
            'no_agg' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_tel' => 'required',
            'email' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required'
        ]);

        try {
                $prefix = $request->id_lain_prefix;
                $set    = $request->id_lain_set;
                $isActive = $request->flag_aktif;
                if($prefix == '' || $set == ''){
                    $id_lain = '-';
                }else{
                    $id_lain = $prefix.''.$set;
                }

                if($isActive == ''){
                    $status = 0;
                }else{
                    $status = $isActive;
                }
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'esaku-master/anggota',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_agg' => $request->no_agg,
                        'nama' => $request->nama,
                        'tgl_lahir' => $request->tgl_lahir,
                        'alamat' => $request->alamat,
                        'no_tel' => $request->no_tel,
                        'bank' => $request->bank,
                        'cabang' => $request->cabang,
                        'no_rek' => $request->no_rek,
                        'nama_rek' => $request->nama_rek,
                        'flag_aktif' => $status,
                        'id_lain' => $id_lain,
                        'email' => $request->email,
                        'provinsi' => $request->provinsi,
                        'kota'      => $request->kota,
                        'kecamatan' => $request->kecamatan,
                        'kode_pos'  => $request->kode_pos

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



    public function update(Request $request, $id) {
        $this->validate($request, [
            'kode_vendor' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'alamat2' => 'required',
            'no_tel' => 'required',
            'no_fax' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'pic' => 'required',
            'akun_hutang' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
            'no_pictel' => 'required',
        ]);

        try {
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'esaku-master/vendor?kode_vendor='.$id,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_vendor' => $request->kode_vendor,
                        'nama' => $request->nama,
                        'alamat' => $request->alamat,
                        'alamat2' => $request->alamat2,
                        'no_tel' => $request->no_tel,
                        'no_fax' => $request->no_fax,
                        'npwp' => $request->npwp,
                        'email' => $request->email,
                        'pic' => $request->pic,
                        'akun_hutang' => $request->akun_hutang,
                        'bank' => $request->bank,
                        'cabang' => $request->cabang,
                        'no_rek' => $request->no_rek,
                        'nama_rek' => $request->nama_rek,
                        'no_pictel' => $request->no_pictel,
                        'bank_trans' => '-',
                        'kode_klpvendor' => '-',
                        'penilaian' => '-',
                        'spek' => '-',
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
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-master/vendor?kode_vendor='.$id,
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
