<?php
    namespace App\Http\Controllers\Rtrw;

    use App\Http\Controllers\Controller;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Http\Request;
    use GuzzleHttp\Exception\BadResponseException;

    class FilterController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('rtrw-auth/login');
            }
        }

        public function getFilterPeriodeKeuangan() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/filter-periode-keu',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterModul() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rtrw/filter-modul',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterBuktiTrans(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'rtrw/filter-bukti-trans',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'modul' => $request->modul,
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterRumah(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'rtrw/filter-rumah',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'rt' => $request->rt
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterJenis(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'rtrw/filter-jenis',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }


    }
?>