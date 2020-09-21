<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class KkmController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('sekolah-auth/login');
            }
        }

        public function index()
        {
            try{    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/kkm_all',[
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
                return response()->json(['daftar' => $data, 'status' => true], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function save(Request $request) {
            $this->validate($request, [
                'kode_ta' => 'required',
                'kode_tingkat' => 'required',
                'kode_jur' => 'required',
                'kode_pp' => 'required',
                'flag_aktif' => 'required',
                'kode_matpel' => 'required|array',
                'kkm'=>'required|array'
            ]);

            try{                
                $fields = array (
                    'kode_pp' => $request->kode_pp,
                    'kode_tingkat' => $request->kode_tingkat,
                    'kode_jur' => $request->kode_jur,
                    'kode_ta' => $request->kode_ta,
                    'flag_aktif' => $request->flag_aktif,
                    'kode_lokasi' => Session::get('lokasi'),
                    'kode_matpel' => $request->kode_matpel,
                    'kkm'=>$request->kkm
                  );
    
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/kkm',[
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

        public function getKkm($kode_kkm,$kode_pp) {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/kkm?kode_kkm='.$kode_kkm."&kode_pp=".$kode_pp,
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

        public function delete($kode_kkm,$kode_pp) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'sekolah/kkm?kode_kkm='.$kode_kkm.'&kode_pp='.$kode_pp,
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

        public function update(Request $request, $kode_kkm)
        {
            $this->validate($request, [
                'kode_ta' => 'required',
                'kode_tingkat' => 'required',
                'kode_jur' => 'required',
                'kode_pp' => 'required',
                'flag_aktif' => 'required',
                'kode_matpel' => 'required|array',
                'kkm'=>'required|array'
            ]);

            try{
                $fields = array (
                    'kode_kkm' => $kode_kkm,
                    'kode_ta' => $request->kode_ta,
                    'kode_tingkat' => $request->kode_tingkat,
                    'kode_jur' => $request->kode_jur,
                    'kode_pp' => $request->kode_pp,
                    'flag_aktif' => $request->flag_aktif,
                    'kode_matpel' => $request->kode_matpel,
                    'kkm'=>$request->kkm
                );
        
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'sekolah/kkm',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json'
                    ],
                    'body' => json_encode($fields)
                ]);
                
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"],'fields'=>$fields], 200);  
                }
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