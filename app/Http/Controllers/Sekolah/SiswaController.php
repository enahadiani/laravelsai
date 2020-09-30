<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class SiswaController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('sekolah-auth/login');
            }
        }

        public function joinNum($num){
            // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
            $num = str_replace(".", "", $num);
            $num = str_replace(",", ".", $num);
            return $num;
        }
    
        public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
            $arr = explode($org_sep, $ymd_or_dmy_date);
            return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
        }

        public function index(Request $request)
        {
            try{
                if(isset($request->kode_pp) && $request->kode_pp != ""){
                    $kode_pp = $request->kode_pp;
                }else{
                    $kode_pp = Session::get('kodePP');
                }
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/siswa-all',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp,
                        'kode_kelas'     => $request->kode_kelas
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["success"]["data"];
                }
                return response()->json(['daftar' => $data, 'status' => true], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function show(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nis' => $request->nis,
                        'kode_pp' => $request->kode_pp
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
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }
        }

        public function store(Request $request) {

            $this->validate($request, [
                'nis' => 'required',
                'nama' => 'required',
                'id_bank' => 'required',
                'kode_pp' => 'required',
                'kode_akt' => 'required',
                'kode_kelas' => 'required',
                'tgl_lulus' => 'required',
                'flag_aktif' => 'required',
                'kode_param' => 'array',
                'tarif' => 'array',
                'per_awal' => 'array',
                'per_akhir' => 'array'
            ]);

            try {

                $det_tarif = array();
                if(isset($request->tarif)){
                    $tarif = $request->tarif;
                    for($i=0;$i<count($tarif);$i++){
                        array_push($det_tarif,$this->joinNum($tarif[$i]));
                    }
                }

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'nis' => $request->nis,
                        'nama' => $request->nama,
                        'id_bank' => $request->id_bank,
                        'kode_pp' => $request->kode_pp,
                        'kode_akt' => $request->kode_akt,
                        'kode_kelas' => $request->kode_kelas,
                        'tgl_lulus' => $this->reverseDate($request->tgl_lulus,"/","-"),
                        'flag_aktif' => $request->flag_aktif,
                        'kode_param' => $request->kode_param,
                        'tarif' => $det_tarif,
                        'per_awal' => $request->per_awal,
                        'per_akhir' => $request->per_akhir
                    ]
                ]);
                // var_dump('Sukses');
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }

            } catch (BadResponseException $ex) {
                // var_dump('Gagal');
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }

        }

        public function getParam(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/siswa-param',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $request->kode_pp,
                        'kode_akt' => $request->kode_akt,
                        'kode_jur' => $request->kode_jur,
                        'kode_tingkat' => $request->kode_tingkat,
                        'kode_param' => $request->kode_param
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data["success"]['data'];
                }
                return response()->json(['daftar' => $data, 'status' => true], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }

        }

        public function getPeriodeParam(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/siswa-periode',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $request->kode_pp
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
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }

        }

        public function update(Request $request) {
            $this->validate($request, [
                'nis' => 'required',
                'nama' => 'required',
                'id_bank' => 'required',
                'kode_pp' => 'required',
                'kode_akt' => 'required',
                'kode_kelas' => 'required',
                'tgl_lulus' => 'required',
                'flag_aktif' => 'required',
                'kode_param' => 'array',
                'tarif' => 'array',
                'per_awal' => 'array',
                'per_akhir' => 'array'
            ]);

            try {
                $det_tarif = array();
                if(isset($request->tarif)){
                    $tarif = $request->tarif;
                    for($i=0;$i<count($tarif);$i++){
                       array_push($det_tarif,$this->joinNum($tarif[$i]));
                    }
                }
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'sekolah/siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'nis' => $request->nis,
                        'nama' => $request->nama,
                        'id_bank' => $request->id_bank,
                        'kode_pp' => $request->kode_pp,
                        'kode_akt' => $request->kode_akt,
                        'kode_kelas' => $request->kode_kelas,
                        'tgl_lulus' => $this->reverseDate($request->tgl_lulus,"/","-"),
                        'flag_aktif' => $request->flag_aktif,
                        'kode_param' => $request->kode_param,
                        'tarif' => $det_tarif,
                        'per_awal' => $request->per_awal,
                        'per_akhir' => $request->per_akhir
                    ]
                ]);
                // var_dump('Sukses');
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
        }

        public function destroy(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'sekolah/siswa',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nis' => $request->nis,
                        'kode_pp' => $request->kode_pp
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
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }
        }

    }

?>