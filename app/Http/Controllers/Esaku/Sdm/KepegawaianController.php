<?php

namespace App\Http\Controllers\Esaku\Sdm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KepegawaianController extends Controller
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

    public function getTahun($date) {
        $explode = explode("/", $date);
        return $explode[2];
    }

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-karyawans',[
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
            'nik' => 'required',
            'nama' => 'required',
            'gelar_depan' => 'required',
            'gelar_belakang' => 'required',
            'kode_sdm' => 'required',
            'kode_gol' => 'required',
            'kode_jab' => 'required',
            'kode_unit' => 'required',
            'kode_pp' => 'required',
            'kode_loker' => 'required',
            'ijht' => 'required',
            'bpjs' => 'required',
            'jp' => 'required',
            'tgl_masuk' => 'required',
            'mk_gol' => 'required',
            'no_sk' => 'required',
            'tgl_sk' => 'required',
            'mk_ytb' => 'required',
            'no_kontrak' => 'required',
            'tgl_kontrak' => 'required',
            'jk' => 'required',
            'kode_agama' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'kota' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_ktp' => 'required',
            'npwp' => 'required',
            'no_bpjs' => 'required',
            'kode_profesi' => 'required',
            'kode_strata' => 'required',
            'kode_pajak' => 'required',
            'tempat' => 'required',
            'no_kk' => 'required',
            'status_nikah' => 'required',
            'tgl_nikah' => 'required',
            'gol_darah' => 'required',
            'ibu_kandung' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
        ]);

        try {   
            $fields = array(
                array(
                    "name" => "nik", 
                    "contents" => $request->input('nik')
                ),
                array(
                    "name" => "nama", 
                    "contents" => $request->input('nama')
                ),
                array(
                    "name" => "alamat", 
                    "contents" => $request->input('alamat')
                ),
                array(
                    "name" => "no_telp", 
                    "contents" => $request->input('no_telp')
                ),
                array(
                    "name" => "email", 
                    "contents" => $request->input('email')
                ),
                array(
                    "name" => "kode_pp", 
                    "contents" => $request->input('kode_pp')
                ),
                array(
                    "name" => "npwp", 
                    "contents" => $request->input('npwp')
                ),
                array(
                    "name" => "bank", 
                    "contents" => $request->input('bank')
                ),
                array(
                    "name" => "cabang", 
                    "contents" => $request->input('cabang')
                ),
                array(
                    "name" => "no_rek", 
                    "contents" => $request->input('no_rek')
                ),
                array(
                    "name" => "nama_rek", 
                    "contents" => $request->input('nama_rek')
                ),
                array(
                    "name" => "grade", 
                    "contents" => "-"
                ),array(
                    "name" => "kota", 
                    "contents" => $request->input('kota')
                ),
                array(
                    "name" => "kode_pos", 
                    "contents" => $request->input('kode_pos')
                ),
                array(
                    "name" => "no_hp", 
                    "contents" => $request->input('no_hp')
                ),
                array(
                    "name" => "flag_aktif", 
                    "contents" => $request->input('status_karyawan')
                ),
                array(
                    "name" => "kode_sdm", 
                    "contents" => $request->input('kode_sdm')
                ),
                array(
                    "name" => "kode_gol", 
                    "contents" => $request->input('kode_gol')
                ),
                array(
                    "name" => "kode_jab", 
                    "contents" => $request->input('kode_jab')
                ),
                array(
                    "name" => "kode_loker", 
                    "contents" => $request->input('kode_loker')
                ),
                array(
                    "name" => "kode_pajak", 
                    "contents" => $request->input('kode_pajak')
                ),
                array(
                    "name" => "nip", 
                    "contents" => "-"
                ),
                array(
                    "name" => "kode_unit", 
                    "contents" => $request->input('kode_unit')
                ),
                array(
                    "name" => "kode_profesi", 
                    "contents" => $request->input('kode_profesi')
                ),
                array(
                    "name" => "jk", 
                    "contents" => $request->input('jk')
                ),
                array(
                    "name" => "kode_agama", 
                    "contents" => $request->input('kode_agama')
                ),
                array(
                    "name" => "tempat", 
                    "contents" => $request->input('tempat')
                ),
                array(
                    "name" => "tgl_lahir", 
                    "contents" => $this->convertDate($request->input('tgl_lahir'))
                ),
                array(
                    "name" => "tahun_masuk", 
                    "contents" => $this->getTahun($request->input('tgl_masuk'))
                ),
                array(
                    "name" => "gelar_depan", 
                    "contents" => $request->input('gelar_depan')
                ),
                array(
                    "name" => "gelar_belakang", 
                    "contents" => $request->input('gelar_belakang')
                ),
                array(
                    "name" => "ibu_kandung", 
                    "contents" => $request->input('ibu_kandung')
                ),
                array(
                    "name" => "status_nikah", 
                    "contents" => $request->input('status_nikah')
                ),
                array(
                    "name" => "tgl_nikah", 
                    "contents" => $this->convertDate($request->input('tgl_nikah'))
                ),
                array(
                    "name" => "gol_darah", 
                    "contents" => $request->input('gol_darah')
                ),
                array(
                    "name" => "kelurahan", 
                    "contents" => $request->input('kelurahan')
                ),
                array(
                    "name" => "kecamatan", 
                    "contents" => $request->input('kecamatan')
                ),
                array(
                    "name" => "no_kk", 
                    "contents" => $request->input('no_kk')
                ),
                array(
                    "name" => "no_sk", 
                    "contents" => $request->input('no_sk')
                ),
                array(
                    "name" => "tgl_sk", 
                    "contents" => $this->convertDate($request->input('tgl_sk'))
                ),
                array(
                    "name" => "tgl_masuk", 
                    "contents" => $this->convertDate($request->input('tgl_masuk'))
                ),
                array(
                    "name" => "no_bpjs", 
                    "contents" => $request->input('no_bpjs')
                ),
                array(
                    "name" => "no_ktp", 
                    "contents" => $request->input('no_ktp')
                ),
                array(
                    "name" => "kode_strata", 
                    "contents" => $request->input('kode_strata')
                ),
                array(
                    "name" => "ijht", 
                    "contents" => $request->input('ijht')
                ),
                array(
                    "name" => "bpjs", 
                    "contents" => $request->input('bpjs')
                ),
                array(
                    "name" => "jp", 
                    "contents" => $request->input('jp')
                ),
                array(
                    "name" => "no_kontrak", 
                    "contents" => $request->input('no_kontrak')
                ),
                array(
                    "name" => "tgl_kontrak", 
                    "contents" => $this->convertDate($request->input('tgl_kontrak'))
                ),
                array(
                    "name" => "mk_gol", 
                    "contents" => $request->input('mk_gol')
                ),
                array(
                    "name" => "mk_ytb", 
                    "contents" => $request->input('mk_ytb')
                ),
            );

            if($request->hasFile('file')) {
                $image_path = $request->file('file')->getPathname();
                $image_mime = $request->file('file')->getmimeType();
                $image_org  = $request->file('file')->getClientOriginalName();
                $file_field = array(
                    'name'     => 'file',
                    'filename' => $image_org,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen($image_path, 'r' ),
                );
                array_push($fields, $file_field);
            }

            // var_dump($fields);
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-karyawan',[
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function show(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-karyawan',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ], 
                'query' => [
                    'nik' => $request->query('kode')
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

    public function update(Request $request) {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'gelar_depan' => 'required',
            'gelar_belakang' => 'required',
            'kode_sdm' => 'required',
            'kode_gol' => 'required',
            'kode_jab' => 'required',
            'kode_unit' => 'required',
            'kode_pp' => 'required',
            'kode_loker' => 'required',
            'ijht' => 'required',
            'bpjs' => 'required',
            'jp' => 'required',
            'tgl_masuk' => 'required',
            'mk_gol' => 'required',
            'no_sk' => 'required',
            'tgl_sk' => 'required',
            'mk_ytb' => 'required',
            'no_kontrak' => 'required',
            'tgl_kontrak' => 'required',
            'jk' => 'required',
            'kode_agama' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'kota' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_ktp' => 'required',
            'npwp' => 'required',
            'no_bpjs' => 'required',
            'kode_profesi' => 'required',
            'kode_strata' => 'required',
            'kode_pajak' => 'required',
            'tempat' => 'required',
            'no_kk' => 'required',
            'status_nikah' => 'required',
            'tgl_nikah' => 'required',
            'gol_darah' => 'required',
            'ibu_kandung' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
        ]);

        try {   
            $fields = array(
                array(
                    "name" => "nik", 
                    "contents" => $request->input('nik')
                ),
                array(
                    "name" => "nama", 
                    "contents" => $request->input('nama')
                ),
                array(
                    "name" => "alamat", 
                    "contents" => $request->input('alamat')
                ),
                array(
                    "name" => "no_telp", 
                    "contents" => $request->input('no_telp')
                ),
                array(
                    "name" => "email", 
                    "contents" => $request->input('email')
                ),
                array(
                    "name" => "kode_pp", 
                    "contents" => $request->input('kode_pp')
                ),
                array(
                    "name" => "npwp", 
                    "contents" => $request->input('npwp')
                ),
                array(
                    "name" => "bank", 
                    "contents" => $request->input('bank')
                ),
                array(
                    "name" => "cabang", 
                    "contents" => $request->input('cabang')
                ),
                array(
                    "name" => "no_rek", 
                    "contents" => $request->input('no_rek')
                ),
                array(
                    "name" => "nama_rek", 
                    "contents" => $request->input('nama_rek')
                ),
                array(
                    "name" => "grade", 
                    "contents" => "-"
                ),array(
                    "name" => "kota", 
                    "contents" => $request->input('kota')
                ),
                array(
                    "name" => "kode_pos", 
                    "contents" => $request->input('kode_pos')
                ),
                array(
                    "name" => "no_hp", 
                    "contents" => $request->input('no_hp')
                ),
                array(
                    "name" => "flag_aktif", 
                    "contents" => $request->input('status_karyawan')
                ),
                array(
                    "name" => "kode_sdm", 
                    "contents" => $request->input('kode_sdm')
                ),
                array(
                    "name" => "kode_gol", 
                    "contents" => $request->input('kode_gol')
                ),
                array(
                    "name" => "kode_jab", 
                    "contents" => $request->input('kode_jab')
                ),
                array(
                    "name" => "kode_loker", 
                    "contents" => $request->input('kode_loker')
                ),
                array(
                    "name" => "kode_pajak", 
                    "contents" => $request->input('kode_pajak')
                ),
                array(
                    "name" => "nip", 
                    "contents" => "-"
                ),
                array(
                    "name" => "kode_unit", 
                    "contents" => $request->input('kode_unit')
                ),
                array(
                    "name" => "kode_profesi", 
                    "contents" => $request->input('kode_profesi')
                ),
                array(
                    "name" => "jk", 
                    "contents" => $request->input('jk')
                ),
                array(
                    "name" => "kode_agama", 
                    "contents" => $request->input('kode_agama')
                ),
                array(
                    "name" => "tempat", 
                    "contents" => $request->input('tempat')
                ),
                array(
                    "name" => "tgl_lahir", 
                    "contents" => $this->convertDate($request->input('tgl_lahir'))
                ),
                array(
                    "name" => "tahun_masuk", 
                    "contents" => $this->getTahun($request->input('tgl_masuk'))
                ),
                array(
                    "name" => "gelar_depan", 
                    "contents" => $request->input('gelar_depan')
                ),
                array(
                    "name" => "gelar_belakang", 
                    "contents" => $request->input('gelar_belakang')
                ),
                array(
                    "name" => "ibu_kandung", 
                    "contents" => $request->input('ibu_kandung')
                ),
                array(
                    "name" => "status_nikah", 
                    "contents" => $request->input('status_nikah')
                ),
                array(
                    "name" => "tgl_nikah", 
                    "contents" => $this->convertDate($request->input('tgl_nikah'))
                ),
                array(
                    "name" => "gol_darah", 
                    "contents" => $request->input('gol_darah')
                ),
                array(
                    "name" => "kelurahan", 
                    "contents" => $request->input('kelurahan')
                ),
                array(
                    "name" => "kecamatan", 
                    "contents" => $request->input('kecamatan')
                ),
                array(
                    "name" => "no_kk", 
                    "contents" => $request->input('no_kk')
                ),
                array(
                    "name" => "no_sk", 
                    "contents" => $request->input('no_sk')
                ),
                array(
                    "name" => "tgl_sk", 
                    "contents" => $this->convertDate($request->input('tgl_sk'))
                ),
                array(
                    "name" => "tgl_masuk", 
                    "contents" => $this->convertDate($request->input('tgl_masuk'))
                ),
                array(
                    "name" => "no_bpjs", 
                    "contents" => $request->input('no_bpjs')
                ),
                array(
                    "name" => "no_ktp", 
                    "contents" => $request->input('no_ktp')
                ),
                array(
                    "name" => "kode_strata", 
                    "contents" => $request->input('kode_strata')
                ),
                array(
                    "name" => "ijht", 
                    "contents" => $request->input('ijht')
                ),
                array(
                    "name" => "bpjs", 
                    "contents" => $request->input('bpjs')
                ),
                array(
                    "name" => "jp", 
                    "contents" => $request->input('jp')
                ),
                array(
                    "name" => "no_kontrak", 
                    "contents" => $request->input('no_kontrak')
                ),
                array(
                    "name" => "tgl_kontrak", 
                    "contents" => $this->convertDate($request->input('tgl_kontrak'))
                ),
                array(
                    "name" => "mk_gol", 
                    "contents" => $request->input('mk_gol')
                ),
                array(
                    "name" => "mk_ytb", 
                    "contents" => $request->input('mk_ytb')
                ),
                array(
                    "name" => "prevFoto", 
                    "contents" => $request->input('prevFoto')
                ),
            );

            if($request->hasFile('file')) {
                $image_path = $request->file('file')->getPathname();
                $image_mime = $request->file('file')->getmimeType();
                $image_org  = $request->file('file')->getClientOriginalName();
                $file_field = array(
                    'name'     => 'file',
                    'filename' => $image_org,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen($image_path, 'r' ),
                );
                array_push($fields, $file_field);
            }

            // var_dump($fields);
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-karyawan-update',[
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function delete(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/sdm-karyawan',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nik' => $request->input('kode')
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
