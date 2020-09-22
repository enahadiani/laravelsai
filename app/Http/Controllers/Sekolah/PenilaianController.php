<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class PenilaianController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('sekolah-auth/login');
            }
        }

        public function index()
        {
            try{

                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/penilaian-all',[
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

        public function show()
        {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sekolah/kelas-all',[
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
        }

        public function store(Request $request) {

            $this->validate($request, [
                'kode_ta' => 'required',  
                'kode_pp' => 'required',
                'kode_sem' => 'required',
                'kode_kelas' => 'required',
                'kode_matpel' => 'required',
                'kode_jenis'=>'required',
                'nis'=>'required|array',
                'nilai'=>'required|array'
            ]);

            try {
                $det_nilai = array();
                if(isset($request->nilai)){
                    $nilai = $request->nilai;
                    for($i=0;$i<count($nilai);$i++){
                        array_push($det_nilai,$this->joinNum($nilai[$i]));
                    }
                }

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/penilaian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_ta' => $request->kode_ta,  
                        'kode_pp' => $request->kode_pp,
                        'kode_sem' => $request->kode_sem,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_jenis'=>$request->kode_jenis,
                        'nis'=>$request->nis,
                        'nilai'=>$det_nilai
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

        public function update(Request $request) {
            $this->validate($request, [
                'no_bukti' => 'required', 
                'kode_ta' => 'required',  
                'kode_pp' => 'required',
                'kode_sem' => 'required',
                'kode_kelas' => 'required',
                'kode_matpel' => 'required',
                'kode_jenis'=>'required',
                'nis'=>'required|array',
                'nilai'=>'required|array'
            ]);

            try {

                $det_nilai = array();
                if(isset($request->nilai)){
                    $nilai = $request->nilai;
                    for($i=0;$i<count($nilai);$i++){
                        array_push($det_nilai,$this->joinNum($nilai[$i]));
                    }
                }
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'sekolah/penilaian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_bukti' => $request->no_bukti, 
                        'kode_ta' => $request->kode_ta,  
                        'kode_pp' => $request->kode_pp,
                        'kode_sem' => $request->kode_sem,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_jenis'=>$request->kode_jenis,
                        'nis'=>$request->nis,
                        'nilai'=>$det_nilai
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

        public function destroy(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'sekolah/penilaian',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_bukti' => $request->no_bukti,  
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

        public function getPenilaianKe(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/penilaian-ke',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $request->kode_pp,
                        'kode_ta' => $request->kode_ta,
                        'kode_sem' => $request->kode_sem,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_jenis' => $request->kode_jenis
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["success"];
                }
                return response()->json(['data' => $data, 'status' => true], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function importExcel(Request $request)
        {
            $this->validate($request, [
                'file' => 'required',
                'kode_pp' => 'required'
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
    
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/import-excel',[
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
    
        public function getNilaiTmp(Request $request)
        {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/nilai-tmp',[
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