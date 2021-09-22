<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class GuruMultiKelasController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('sekolah-auth/login');
            }
        }

        public function index(Request $request)
        {
            try{
                // if(isset($request->kode_pp) && $request->kode_pp != ""){
                    $kode_pp = $request->kode_pp;
                    $kode_ta = $request->kode_ta;
                    $flag_aktif = $request->flag_aktif;
                // }else{
                //     $kode_pp = Session::get('kodePP');
                // }
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/guru-multi-kelas-all',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp,
                        'kode_ta' => $kode_ta,
                        'flag_aktif' => $flag_aktif,
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

        public function store(Request $request) {
            $this->validate($request, [
                'kode_pp' => 'required',
                'nik_guru' => 'required',
                'flag_aktif' => 'required',
                'kode_matpel' => 'required',
                'kode_ta' => 'required',
                'kode_kelas'=>'required|array',
                'flag_kelas'=>'required|array'
            ]);

            try{                
                $fields = array (
                    'kode_pp' => $request->kode_pp,
                    'nik_guru' => $request->nik_guru,
                    'flag_aktif' => $request->flag_aktif,
                    'kode_matpel' => $request->kode_matpel,
                    'kode_ta' => $request->kode_ta,
                    'kode_kelas' => $request->kode_kelas,
                    'flag_kelas' => $request->flag_kelas
                    
                );
    
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/guru-multi-kelas',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json'
                    ],
                    'body' => json_encode($fields)
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['fields'] = $fields;
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }

        }

        public function show(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/guru-multi-kelas',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nik_guru' => $request->nik_guru,
                        'kode_pp' => $request->kode_pp,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_ta' => $request->kode_ta
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

        public function destroy(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'sekolah/guru-multi-kelas',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nik_guru' => $request->nik_guru,
                        'kode_pp' => $request->kode_pp,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_ta' => $request->kode_ta
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

        public function update(Request $request)
        {
            $this->validate($request, [
                'kode_pp' => 'required',
                'nik_guru' => 'required',
                'flag_aktif' => 'required',
                'kode_matpel' => 'required',
                'kode_ta' => 'required',
                'kode_kelas'=>'required|array',
                'flag_kelas'=>'required|array'
            ]);

            try{
                $fields = array (
                    'kode_pp' => $request->kode_pp,
                    'nik_guru' => $request->nik_guru,
                    'flag_aktif' => $request->flag_aktif,
                    'kode_matpel' => $request->kode_matpel,
                    'kode_ta' => $request->kode_ta,
                    'kode_kelas' => $request->kode_kelas,
                    'flag_kelas' => $request->flag_kelas
                  );
        
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'sekolah/guru-multi-kelas',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json'
                    ],
                    'body' => json_encode($fields)
                ]);
                
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
                return response()->json(['data' => $data], 200);
            }

        }

        public function getMultiKelas(Request $request)
        {
            try{
                $kode_pp = $request->kode_pp;
                
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/multi-kelas',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_ta' => $request->kode_ta
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

    }

?>