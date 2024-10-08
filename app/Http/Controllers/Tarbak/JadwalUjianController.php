<?php

    namespace App\Http\Controllers\Tarbak;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class JadwalUjianController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('tarbak/login')->with('alert','Session telah habis !');
            }
        }

        public function index()
        {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sekolah/jadwal_ujian_all',[
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
                'kode_pp' => 'required',
                'nik_guru' => 'required',
                'flag_aktif' => 'required',
                'kode_matpel' => 'required|array',
                'kode_status'=>'required|array'
            ]);

            try{                
                $fields = array (
                    'kode_pp' => $request->kode_pp,
                    'nik_guru' => $request->nik_guru,
                    'flag_aktif' => $request->flag_aktif,
                    'kode_matpel' => $request->kode_matpel,
                    'kode_status' => $request->kode_status
                  );
    
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/guru_matpel',[
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

        public function getGuruMatpel($nik,$kode_pp) {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/guru_matpel?nik_guru='.$nik."&kode_pp=".$kode_pp,
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

        public function delete($nik,$kode_pp) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'sekolah/guru_matpel?nik_guru='.$nik.'&kode_pp='.$kode_pp,
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

        public function update(Request $request, $nik)
        {
        $this->validate($request, [
                'kode_pp' => 'required',
                'nik_guru' => 'required',
                'flag_aktif' => 'required',
                'kode_matpel' => 'required|array',
                'kode_status'=>'required|array'
            ]);

            try{
                $fields = array (
                    'kode_pp' => $request->kode_pp,
                    'nik_guru' => $request->nik_guru,
                    'flag_aktif' => $request->flag_aktif,
                    'kode_matpel' => $request->kode_matpel,
                    'kode_status' => $request->kode_status
                  );
        
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'sekolah/guru_matpel',[
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