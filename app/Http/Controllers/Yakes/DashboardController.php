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
        public function getdataKPKU($tahun,$jenis) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/rasio?tahun='.$tahun.'&kode_rasio='.$jenis,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getdataKunjLayanan($periode,$jenis,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataKunjLayanan?periode='.$periode.'&jenis='.$jenis.'&kode_pp='.$regional
            ,[
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

        public function getdataKunjTotal($periode,$jenis,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataKunjTotal?periode='.$periode.'&jenis='.$jenis.'&kode_pp='.$regional
            ,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'daftar2' => $data['data2'],'status' => true], 200);
        }

        public function getdataClaimant($periode,$jenis,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataClaimant?periode='.$periode.'&jenis='.$jenis.'&kode_pp='.$regional
            ,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);;
            }
            return response()->json(['daftar' => $data['data'],'daftar2'=>$data['data2'], 'status' => true], 200);
        }

        public function getdataKapitasiDetail($tahun,$pp) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dash-bpjs-kapitasiregdetail?periode='.$tahun.'&lokasi='.$pp
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

        public function getdataKapitasi($tahun,$pp) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dash-bpjs-kapitasireg?periode='.$tahun.'&kode_pp='.$pp
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

        public function getFilterRasio() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/klp-rasio',[
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

        public function getFilterRegional() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-master/listPPAktif',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['success'];
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

        public function getdataKunjBPCC($periode,$jenis,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBPCCtotal?periode='.$periode.'&jenis='.$jenis.'&kode_pp='.$regional
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

        public function getdataLayananBPCC($periode,$jenis,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBPCClayanan?periode='.$periode.'&jenis='.$jenis.'&kode_pp='.$regional
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

        public function getdataRealCC($periode,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataCCytd?periode='.$periode.'&kode_pp='.$regional,[
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

        public function getdataRealBP($periode,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBPytd?periode='.$periode.'&kode_pp='.$regional,[
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

        public function getdataRealBeban($periode,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBebanYtd?periode='.$periode.'&kode_pp='.$regional,[
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

        public function getdataPendapatan($tahun,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataPdpt?tahun='.$tahun.'&kode_pp='.$regional,[
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

        public function getdataBeban($tahun, $regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataBeban?tahun='.$tahun.'&kode_pp='.$regional,[
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

        public function getdataEdu($periode, $regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataEdu?periode='.$periode.'&kode_pp='.$regional,[
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

        public function getdataGender($periode, $regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataGender?periode='.$periode.'&kode_pp='.$regional,[
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
        
        public function getdataOrganik($periode,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataOrganik?periode='.$periode.'&kode_pp='.$regional,[
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

        public function getdataDemography($periode,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataDemog?periode='.$periode.'&kode_pp='.$regional,[
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

        public function getdataMedis($periode,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataMedis?periode='.$periode.'&kode_pp='.$regional,[
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

        public function getdataDokter($periode,$regional) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-dash/dataDokter?periode='.$periode.'&kode_pp='.$regional,[
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