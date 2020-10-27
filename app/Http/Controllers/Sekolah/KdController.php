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
                        'kode_tingkat'     => $request->kode_tingkat,
                        'kode_kd'     => $request->kode_kd,
                        'kode_sem' => $request->kode_sem,
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
                        'kode_tingkat' => $request->kode_tingkat,
                        'kode_pp' => $request->kode_pp,
                        'kode_sem' => $request->kode_sem,
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

        public function store(Request $request) {

            $this->validate($request, [
                'kode_matpel' => 'required',
                'kode_tingkat' => 'required',
                'kode_sem' => 'required',
                'kode_pp' => 'required',
                'kode_ta' => 'required',
                'kode_kd' => 'array',
                'nama' => 'array',
                'kkm' => 'array'
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
                        'kode_tingkat' => $request->kode_tingkat,
                        'kode_sem' => $request->kode_sem,
                        'kode_ta' => $request->kode_ta,
                        'kode_pp' => $request->kode_pp,
                        'kode_kd' => $request->kode_kd,
                        'nama' => $request->nama,
                        'kkm' => $request->kkm
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
                'kode_tingkat' => 'required',
                'kode_sem' => 'required',
                'kode_tingkat' => 'required',
                'kode_ta' => 'required',
                'kode_pp' => 'required',
                'kode_kd' => 'array',
                'nama' => 'array',
                'kkm' => 'array'
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
                        'kode_tingkat' => $request->kode_tingkat,
                        'kode_sem' => $request->kode_sem,
                        'kode_ta' => $request->kode_ta,
                        'kode_pp' => $request->kode_pp,
                        'kode_kd' => $request->kode_kd,
                        'nama' => $request->nama,
                        'kkm' => $request->kkm
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
                        'kode_matpel' => $request->kode_matpel,
                        'kode_tingkat' => $request->kode_tingkat,
                        'kode_sem' => $request->kode_sem,
                        'kode_ta' => $request->kode_ta,
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
                $data['message'] = $res["message"];
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }
        }

        public function importExcel(Request $request)
        {
            $this->validate($request, [
                'file' => 'required',
                'kode_pp' => 'required',
                'kode_ta' => 'required',
                'kode_matpel' => 'required',
                'kode_tingkat' => 'required',
                'kode_sem' => 'required'
            ]);
    
            try{
                
                $image_path = $request->file('file')->getPathname();
                $image_mime = $request->file('file')->getmimeType();
                $image_org  = $request->file('file')->getClientOriginalName();
                $fields[0] = array(
                    'name'     => 'file',
                    'filename' => $image_org,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen($image_path, 'r' ),
                );
                $fields[1] = array(
                    'name'     => 'nik_user',
                    'contents' => Session::get('nikUser')
                );
                $fields[2] = array(
                    'name'     => 'kode_pp',
                    'contents' => $request->kode_pp
                );
                $fields[3] = array(
                    'name'     => 'kode_tingkat',
                    'contents' => $request->kode_tingkat
                );
                $fields[4] = array(
                    'name'     => 'kode_matpel',
                    'contents' => $request->kode_matpel
                );
                $fields[5] = array(
                    'name'     => 'kode_ta',
                    'contents' => $request->kode_ta
                );
                $fields[6] = array(
                    'name'     => 'kode_sem',
                    'contents' => $request->kode_sem
                );
    
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/import-kd',[
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
                $result['message'] = $res;
                $result['status']=false;
                return response()->json(["data" => $result], 200);
            } 
            
        }

        public function getKdTmp(Request $request)
        {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/kd-tmp',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nik_user' => Session::get('nikUser'),
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
                $result['message'] = $res["message"];
                $result['status']=false;
                return response()->json(["data" => $result], 200);
            } 
        }

    }

?>