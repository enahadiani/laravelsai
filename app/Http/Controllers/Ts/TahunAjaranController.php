<?php

    namespace App\Http\Controllers\Ts;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class TahunAjaranController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('ts-auth/login');
            }
        }

        public function index(Request $request)
        {
            try {
               
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'ts/tahun-ajaran-all',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $request->kode_pp,
                        'flag_aktif' => $request->flag_aktif,
                        'kode_ta' => $request->kode_ta,
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