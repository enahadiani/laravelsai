<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class KdController extends Controller {

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
                // if(isset($request->kode_pp) && $request->kode_pp != ""){
                    $kode_pp = $request->kode_pp;
                // }else{
                //     $kode_pp = Session::get('kodePP');
                // }
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/kd-all',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp,
                        'kode_matpel'     => $request->kode_matpel,
                        'kode_kd'     => $request->kode_kd
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
                $response = $client->request('GET',  config('api.url').'sekolah/kd',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_matpel' => $request->kode_matpel,
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
                'kode_matpel' => 'required',
                'kode_pp' => 'required',
                'kode_kd' => 'array',
                'nama' => 'array'
            ]);

            try {

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/kd',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_matpel' => $request->kode_matpel,
                        'kode_pp' => $request->kode_pp,
                        'kode_kd' => $request->kode_kd,
                        'nama' => $request->nama
                    ]
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
                return response()->json(['data' => $data], 500);
            }

        }

        public function update(Request $request) {
            
            $this->validate($request, [
                'kode_matpel' => 'required',
                'kode_pp' => 'required',
                'kode_kd' => 'array',
                'nama' => 'array'
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
                $response = $client->request('PUT',  config('api.url').'sekolah/kd',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_matpel' => $request->kode_matpel,
                        'kode_pp' => $request->kode_pp,
                        'kode_kd' => $request->kode_kd,
                        'nama' => $request->nama
                    ]
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
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
        }

        public function destroy(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'sekolah/kd',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_mapel' => $request->kode_mapel,
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