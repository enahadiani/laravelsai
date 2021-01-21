<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class AbsenKelasController extends Controller {

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

        public function show(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/absen-kelas',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_kelas' => $request->kode_kelas,
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
                'kode_pp' => 'required',
                'kode_kelas' => 'required',
                'nis'=>'required|array',
                'no_urut'=>'required|array'
            ]);

            try {
                $det_no_urut = array();
                if(isset($request->no_urut)){
                    $no_urut = $request->no_urut;
                    for($i=0;$i<count($no_urut);$i++){
                        array_push($det_no_urut,$this->joinNum($no_urut[$i]));
                    }
                }

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/absen-kelas',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [ 
                        'kode_pp' => $request->kode_pp,
                        'kode_kelas' => $request->kode_kelas,
                        'nis'=>$request->nis,
                        'no_urut'=>$det_no_urut
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

        

    }


?>