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

    public function store(Request $r) {
        $this->validate($r,[
            'nis' => 'required',
            'flag_aktif' => 'required',
            'kode_kelas' => 'required',
            'kode_akt' => 'required',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'hp_siswa' => 'required',
            'email' => 'required',
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
                    'flag_aktif' => $r->input('flag_aktif'),
                    'kode_kelas' => $r->input('kode_kelas'),
                    'kode_akt' => $r->input('kode_akt'),
                    'nama' => $r->input('nama'),
                    'tmp_lahir' => $r->input('tmp_lahir'),
                    'tgl_lahir' => $this->convertDate($r->input('tmp_lahir')),
                    'jk' => $r->input('jk'),
                    'agama' => $r->input('agama'),
                    'hp_siswa' => $r->input('hp_siswa'),
                    'hp_siswa' => $r->input('hp_siswa'),
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
?>