<?php

    namespace App\Http\Controllers\Tarbak;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class AngkatanController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('tarbak/login')->with('alert','Session telah habis !');
            }
        }

        public function index()
        {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sekolah/angkatan_all',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            return response()->json(['data' => $data, 'status' => true], 200);
        }

        public function save(Request $request) {

            $this->validate($request, [
            'kode_akt' => 'required',
            'nama' => 'required',
            'kode_tingkat' => 'required',
            'flag_aktif' => 'required',
            'kode_pp' => 'required',
            ]);

            try {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/angkatan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_akt' => $request->kode_akt,
                        'nama' => $request->nama,
                        'kode_tingkat' => $request->kode_tingkat,
                        'flag_aktif' => $request->flag_aktif,
                        'kode_pp' => $request->kode_pp,
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

        public function getAngkatan($kode_akt1,$kode_akt2,$kode_pp) {
            try{
            $client = new Client();
            $kode_akt = $kode_akt1."/".$kode_akt2;
            $response = $client->request('GET',  config('api.url').'sekolah/angkatan?kode_akt='.$kode_akt."&kode_pp=".$kode_pp,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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

        public function update(Request $request, $kode_akt1,$kode_akt2) {
            $this->validate($request, [
            'nama' => 'required',
            'kode_tingkat' => 'required',
            'flag_aktif' => 'required',
            'kode_pp' => 'required',
            ]);

            try {
                $client = new Client();
                $kode_akt = $kode_akt1."/".$kode_akt2;
                $response = $client->request('PUT',  config('api.url').'sekolah/angkatan?kode_akt='.$kode_akt,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'nama' => $request->nama,
                        'kode_tingkat' => $request->kode_tingkat,
                        'flag_aktif' => $request->flag_aktif,
                        'kode_pp' => $request->kode_pp,
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
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
        }

        public function delete($kode_akt1,$kode_akt2,$kode_pp) {
            try{
            $client = new Client();
            $kode_akt = $kode_akt1."/".$kode_akt2;
            $response = $client->request('DELETE',  config('api.url').'sekolah/angkatan?kode_akt='.$kode_akt.'&kode_pp='.$kode_pp,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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