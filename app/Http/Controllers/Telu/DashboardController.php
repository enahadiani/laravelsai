<?php

    namespace App\Http\Controllers\Telu;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class DashboardController extends Controller
    {
        public $link = 'http://api.simkug.com/api/ypt';

        public function __contruct() {
            if(!Session::get('login')) {
                return redirect('saku/login')->with('alert','Session telah habis !');
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

        public function getOprNonOpr($periode)
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

        public function getPresentaseRkaRealisasi($periode)
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

    }
?>