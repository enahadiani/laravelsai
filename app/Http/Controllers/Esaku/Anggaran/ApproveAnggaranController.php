<?php
namespace App\Http\Controllers\Esaku\Anggaran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ApproveAnggaranController extends Controller { 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function getKode($value) {
        $split = explode("-", $value);
        return $split[0];
    }

    public function getRRAAnggaran() {
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/rra-app-aju',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data['success']['jurnal'];
        }
        return response()->json(['daftar' => $data, 'status' => true], 200);
    }
}

?>