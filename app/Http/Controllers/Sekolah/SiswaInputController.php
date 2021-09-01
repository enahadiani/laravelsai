<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SiswaInputController extends Controller {

    public function __contruct() {
        if(!Session::get('login')){
            return redirect('sekolah-auth/login');
        }
    }

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }

    public function show(Request $r) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sekolah/siswa-edit',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ], 
                'query' => [
                    'nis' => $r->query('nis'),
                    'kode_pp' => substr($r->query('kode_pp'), 0, 2),
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

    public function store(Request $r) {
        $this->validate($r,[
            'nis' => 'required',
            'kode_status' => 'required',
            'kode_kelas' => 'required',
            'kode_akt' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'hp_siswa' => 'required',
            'email_siswa' => 'required',
            'alamat_siswa' => 'required',
            'nama_wali' => 'required',
            'alamat_wali' => 'required',
            'kerja_wali' => 'required',
            'hp_wali' => 'required',
            'email_wali' => 'required',
            'gol_darah' => 'required',
            'id_bank' => 'required',
            'nis2' => 'required',
            'kode_pp' => 'required'
        ]);

        try {   
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sekolah/siswa-simpan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'nis' => $r->input('nis'),
                    'flag_aktif' => $r->input('kode_status'),
                    'kode_kelas' => $r->input('kode_kelas'),
                    'kode_akt' => $r->input('kode_akt'),
                    'nama' => $r->input('nama'),
                    'tmp_lahir' => $r->input('tempat'),
                    'tgl_lahir' => $this->convertDate($r->input('tgl_lahir')),
                    'jk' => $r->input('jk'),
                    'agama' => $r->input('agama'),
                    'hp_siswa' => $r->input('hp_siswa'),
                    'email' => $r->input('email_siswa'),
                    'alamat_siswa' => $r->input('alamat_siswa'),
                    'nama_wali' => $r->input('nama_wali'),
                    'alamat_wali' => $r->input('alamat_wali'),
                    'kerja_wali' => $r->input('kerja_wali'),
                    'hp_wali' => $r->input('hp_wali'),
                    'email_wali' => $r->input('email_wali'),
                    'gol_darah' => $r->input('gol_darah'),
                    'id_bank' => $r->input('id_bank'),
                    'nis2' => $r->input('nis2'),
                    'kode_pp' => $r->input('kode_pp'),
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data['success']], 200);  
            }

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function update(Request $r) {
        $this->validate($r,[
            'nis' => 'required',
            'kode_status' => 'required',
            'kode_kelas' => 'required',
            'kode_akt' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'hp_siswa' => 'required',
            'email_siswa' => 'required',
            'alamat_siswa' => 'required',
            'nama_wali' => 'required',
            'alamat_wali' => 'required',
            'kerja_wali' => 'required',
            'hp_wali' => 'required',
            'email_wali' => 'required',
            'gol_darah' => 'required',
            'id_bank' => 'required',
            'nis2' => 'required',
            'kode_pp' => 'required'
        ]);

        try {   
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sekolah/siswa-update',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'nis' => $r->input('nis'),
                    'flag_aktif' => $r->input('kode_status'),
                    'kode_kelas' => $r->input('kode_kelas'),
                    'kode_akt' => $r->input('kode_akt'),
                    'nama' => $r->input('nama'),
                    'tmp_lahir' => $r->input('tempat'),
                    'tgl_lahir' => $this->convertDate($r->input('tgl_lahir')),
                    'jk' => $r->input('jk'),
                    'agama' => $r->input('agama'),
                    'hp_siswa' => $r->input('hp_siswa'),
                    'email' => $r->input('email_siswa'),
                    'alamat_siswa' => $r->input('alamat_siswa'),
                    'nama_wali' => $r->input('nama_wali'),
                    'alamat_wali' => $r->input('alamat_wali'),
                    'kerja_wali' => $r->input('kerja_wali'),
                    'hp_wali' => $r->input('hp_wali'),
                    'email_wali' => $r->input('email_wali'),
                    'gol_darah' => $r->input('gol_darah'),
                    'id_bank' => $r->input('id_bank'),
                    'nis2' => $r->input('nis2'),
                    'kode_pp' => $r->input('kode_pp'),
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data['success']], 200);  
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
?>