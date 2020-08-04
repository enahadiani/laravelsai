<?php

    namespace App\Http\Controllers\DashTelu;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class DashboardController extends Controller
    {
        public $link = 'https://api.simkug.com/api/ypt';

        public function __contruct() {
            if(!Session::get('login')) {
                return redirect('dash-telu/login')->with('alert','Session telah habis !');
            }
        }

        public function getPencapaianYoY($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/pencapaianYoY/'.$periode,[
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
        }

         public function getRkaVsReal($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/rkaVSReal/'.$periode,[
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
        }

        public function getGrowthRka($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/growthRKA/'.$periode,[
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
        }

        public function getGrowthReal($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/growthReal/'.$periode,[
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
        }

        public function getKomposisiPendapatan($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/komposisiPdpt/'.$periode,[
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
        }

        public function getOprNonOprPendapatan($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/totalPdpt/'.$periode,[
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
        }

        public function getPresentaseRkaRealisasiPendapatan($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/rkaVSRealPdpt/'.$periode,[
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
        }

        public function getPendapatanFak($periode,$kodeNeraca)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/pdptFakultas/'.$periode.'/'.$kodeNeraca,[
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
        }

        public function getDetailPendapatan($periode,$kodeNeraca)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/detailPdpt/'.$periode.'/'.$kodeNeraca,[
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
        }

        public function getPendapatanJurusan($periode,$kodeNeraca,$kodeBidang)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/pdptJurusan/'.$periode.'/'.$kodeNeraca.'/'.$kodeBidang,
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
        }

        public function getDataPendJurusan($periode,$kodeNeraca,$kodeBidang,$tahun)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/detailPdptJurusan/'.$periode.'/'.$kodeNeraca.
            '/'.$kodeBidang.'/'.$tahun,
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
        }

        public function getKomposisiBeban($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/komposisiBeban/'.$periode,[
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
        }

        public function getOprNonOprBeban($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/totalBeban/'.$periode,[
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
        }

        public function getPresentaseRkaRealisasiBeban($periode)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/rkaVSRealBeban/'.$periode,[
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
        }

        public function getBebanFak($periode,$kodeNeraca)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/bebanFakultas/'.$periode.'/'.$kodeNeraca,[
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
        }

        public function getDetailBeban($periode,$kodeNeraca)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/detailBeban/'.$periode.'/'.$kodeNeraca,[
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
        }

        public function getBebanJurusan($periode,$kodeNeraca,$kodeBidang)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/bebanJurusan/'.$periode.'/'.$kodeNeraca.'/'.$kodeBidang,
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
        }

        public function getDataBebanJurusan($periode,$kodeNeraca,$kodeBidang,$tahun)
        {
            $client = new Client();
            $response = $client->request('GET',$this->link.'/detailBebanJurusan/'.$periode.'/'.$kodeNeraca.
            '/'.$kodeBidang.'/'.$tahun,
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
        }

        public function getBCRKA()
        {
            $string = file_get_contents(url('/data_dummy/chartBCRKA.json'));
            echo $string;
        }

        public function getBCGrowthRKA()
        {
            $string = file_get_contents(url('/data_dummy/chartBCRKA.json'));
            echo $string;
        }

    }
?>