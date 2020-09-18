<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class KalenderAkademikController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('sekolah-auth/login')->with('alert','Session telah habis !');
            }
        }

        public function index()
        {
            try{

                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/kalender_akad_all',[
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
                'kode_pp' => 'required',
                'kode_ta' => 'required',
                'kode_sem' => 'required',
                'tanggal' => 'required|array',
                'agenda'=>'required|array'
            ]);

            try{                
                $fields = array (
                    'kode_pp' => $request->kode_pp,
                    'kode_ta' => $request->kode_ta,
                    'kode_sem' => $request->kode_sem,
                    'tanggal' => $request->tanggal,
                    'agenda' => $request->agenda
                  );
    
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/kalender_akad',[
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

        public function getKalAkad($kode_sem,$kode_ta1,$kode_ta2,$kode_pp) {
            try{
                $client = new Client();
                $kode_ta = $kode_ta1."/".$kode_ta2;
                $response = $client->request('GET',  config('api.url').'sekolah/kalender_akad?kode_sem='.$kode_sem
                ."&kode_ta=".$kode_ta."&kode_pp=".$kode_pp,
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

        public function delete($kode_sem,$kode_ta1,$kode_ta2,$kode_pp) {
            try{
                $client = new Client();
                $kode_ta = $kode_ta1."/".$kode_ta2;
                $response = $client->request('DELETE',  config('api.url').'sekolah/kalender_akad?kode_sem='.$kode_sem.
                '&kode_ta='.$kode_ta."&kode_pp=".$kode_pp,
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
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }
        }

        public function update(Request $request, $nik)
        {
        $this->validate($request, [
                'kode_pp' => 'required',
                'kode_ta' => 'required',
                'kode_sem' => 'required',
                'tanggal' => 'required|array',
                'agenda'=>'required|array'
            ]);

            try{
                $fields = array (
                    'kode_pp' => $request->kode_pp,
                    'kode_ta' => $request->kode_ta,
                    'kode_sem' => $request->kode_sem,
                    'tanggal' => $request->tanggal,
                    'agenda' => $request->agenda
                  );
        
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'sekolah/kalender_akad',[
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