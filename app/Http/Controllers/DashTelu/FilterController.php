<?php
    namespace App\Http\Controllers\DashTelu;

    use App\Http\Controllers\Controller;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Http\Request;
    use GuzzleHttp\Exception\BadResponseException;

    class FilterController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('dash-telu/login');
            }
        }

        
        public function getFilterAkun() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-report/filter-akun',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterPP() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-report/filter-pp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterPeriodeKeuangan() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-report/filter-periode-keu',[
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

        public function getFilterFS() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-report/filter-fs',[
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

        public function getFilterLevel() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-report/filter-level',[
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

        public function getFilterFormat() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-report/filter-format',[
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

        public function getFilterSumju() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ypt-report/filter-sumju',[
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
            $response = $client->request('GET',  config('api.url').'ypt-report/filter-modul',[
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

        public function getFilterBuktiJurnal(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'ypt-report/filter-bukti-jurnal',[
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
            return response()->json(['daftar' => $data['data'], 'status' => true, 'res' => $data], 200);
        }

        public function getFilterMutasi(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'ypt-report/filter-mutasi',[
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
        
        public function getFilterOutput() {

            $data =  array(
                0 => array('kode' => "Laporan"),
                1 => array('kode' => "Grid"),
                // 2 => array('kode' => "Laporan Scroll")
            );
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

    }
?>