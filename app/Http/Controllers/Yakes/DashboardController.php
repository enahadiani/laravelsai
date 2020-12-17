<?php
    namespace App\Http\Controllers\Yakes;

    use App\Http\Controllers\Controller;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Http\Request;
    use GuzzleHttp\Exception\BadResponseException;

    class DashboardController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('yakes-auth/login');
            }
        }

        public function getdataClaim($periode,$jenis) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataClaim?periode='.$periode.'&jenis='.$jenis
            ,[
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

        public function getdataClaimBPJS($periode,$jenis) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataClaimLokasi?periode='.$periode.'&jenis='.$jenis
            ,[
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

        public function getdataKapitasiBPJS($periode,$jenis) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataKapitasiLokasi?periode='.$periode.'&jenis='.$jenis
            ,[
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

        public function getdataIuranBPJS($periode,$jenis) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataPremiLokasi?periode='.$periode.'&jenis='.$jenis
            ,[
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

        public function getFilterTahun() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/getFilterTahunDash',[
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

        public function getFilterPeriode() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-trans/periode',[
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

        public function getdataKunjBPCC($periode,$jenis) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBPCCtotal?periode='.$periode.'&jenis='.$jenis
            ,[
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

        public function getdataLayananBPCC($periode,$jenis) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBPCClayanan?periode='.$periode.'&jenis='.$jenis
            ,[
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

        public function getdataRealCC($periode) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataCCytd?periode='.$periode,[
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

        public function getdataRealBP($periode) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBPytd?periode='.$periode,[
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

        public function getdataRealBeban($periode) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBebanYtd?periode='.$periode,[
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

        public function getdataPendapatan($tahun) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataPdpt?tahun='.$tahun,[
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

        public function getdataBeban($tahun) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBeban?tahun='.$tahun,[
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

        public function getdataEdu($periode) {
            $periode = "202011";
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataEdu?periode='.$periode,[
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

        public function getdataGender($periode) {
            $periode = "202011";
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataGender?periode='.$periode,[
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
        
        public function getdataOrganik($periode) {
            $periode = "202011";
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataOrganik?periode='.$periode,[
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

        public function getdataDemography($periode) {
            $periode = "202011";
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataDemog?periode='.$periode,[
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

        public function getdataMedis($periode) {
            $periode = "202011";
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataMedis?periode='.$periode,[
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

        public function getdataDokter($periode) {
            $periode = "202011";
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataDokter?periode='.$periode,[
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

    }
?>