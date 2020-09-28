<?php
    namespace App\Http\Controllers\Wisata;

    use App\Http\Controllers\Controller;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;
    use Illuminate\Http\Request;

    class HelperController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('tarbak/login')->with('alert','Session telah habis !');
            }
        }

        public function getAkunVend() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-master/vendor-akun',[
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

        public function getMitra() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/getMitra',[
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
            return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
        }

        public function getTglServer() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/getTglServer',[
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
            return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
        }

        public function getMitraSub(Request $request) {
            $kode = $request->param;

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/getMitraSub/'.$kode,[
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
            return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
        }

        public function getBidang(Request $request) {
            $kode = $request->param;

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/getBidang',[
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
            return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
        }

        public function getJenis(Request $request) {
            $kode = $request->param;

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/getJenis',[
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
            return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
        }

        public function getTahunList() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/getTahunList',[
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
            return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
        }

        public function getReportTahunList() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-report/list-tahun',[
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
            return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
        }

        public function getReportBulanList() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-report/list-bulan',[
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
            return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
        }

        public function getJumlahTgl($tahun,$bulan) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'wisata-master/getJumTgl/'.$tahun."/".$bulan,[
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
            return response()->json(['daftar' => $data['success']['data'], 'status' => true], 200);
        }

    }
?>