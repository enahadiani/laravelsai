<?php
namespace App\Http\Controllers\Esaku\Aktap;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\BadResponseException;

class FilterAktapController extends Controller {
    public function __contruct() {
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

    private function convertMonthName($month) {
        $array = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        return $array[$month - 1];
    }

    private function convertPeriode($array) {
        $newArray = [];
        for($i=0;$i<count($array);$i++) {
            $tahun = substr($array[$i]['periode'], 0, 4);
            $explode = substr($array[$i]['periode'], -2, 2);
            $convert = intval($explode);
            array_push($newArray, [
                'value' => $array[$i]['periode'],
                'text' => $this->convertMonthName($convert)." ".$tahun
            ]);
        }

        return $newArray;
    }

    public function getTahun() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-tahun',[
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

    public function getBuktiJurnalSusut() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti-jurnal-susut',[
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

    public function getPP() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-report/filter-pp',[
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

    public function getAsset() {
        $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-aset',[
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

    public function getJenis() {
        $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-jenis',[
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

    public function getKlpAkun() {
        $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-klp-akun',[
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

    public function getPeriodePerolehan() {
        $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
                if(!empty($data)) {
                    $data = $this->convertPeriode($data);
                }
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
    }

    public function getPeriodeSusut() {
        $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode-susut',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
                if(!empty($data)) {
                    $data = $this->convertPeriode($data);
                }
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
    }
}

?>