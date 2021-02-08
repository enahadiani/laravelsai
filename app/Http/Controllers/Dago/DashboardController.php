<?php

    namespace App\Http\Controllers\Dago;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class DashboardController extends Controller
    {

        public function __contruct() {
            if(!Session::get('login')) {
                return redirect('dago-auth/login');
            }
        }

        public function getDataBox(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET', config('api.url').'dago-dash/data-box',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $data = json_decode($response_data,true);
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], $response->getStatusCode());
            }
        }

        public function getTopAgen(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET', config('api.url').'dago-dash/top-agen',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $data = json_decode($response_data,true);
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], $response->getStatusCode());
            }
        }

        public function getRegHarian(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET', config('api.url').'dago-dash/reg-harian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $data = json_decode($response_data,true);
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], $response->getStatusCode());
            }
        }

        public function getKuotaPaket(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET', config('api.url').'dago-dash/kuota-paket',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $data = json_decode($response_data,true);
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], $response->getStatusCode());
            }
        }

        public function getKartu(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET', config('api.url').'dago-dash/kartu',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'nik' => Session::get('userLog')
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $data = json_decode($response_data,true);
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], $response->getStatusCode());
            }
        }

        public function getDokumen(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET', config('api.url').'dago-dash/dokumen',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'nik' => Session::get('userLog')
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $data = json_decode($response_data,true);
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], $response->getStatusCode());
            }
        }

        
    }
?>