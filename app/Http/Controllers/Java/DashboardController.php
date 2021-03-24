<?php 
namespace App\Http\Controllers\Java;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class DashboardController extends Controller {
    public function __contruct() {
        if(!Session::get('login')){
            return redirect('java-auth/login');
        }
    }

    public function getProjectAktif(Request $request) {
        try{
            $client = new Client();
            $periode = $request->query('periode');
            $explode = explode('-', $periode);
            $response = $client->request('GET',  config('api.url').'java-dash/project-aktif',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'bulan' => $explode[1],
                    'tahun' => $explode[0]
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function getProjectDashboard(Request $request) {
        try{
            $client = new Client();
            $periode = $request->query('periode');
            $explode = explode('-', $periode);
            $response = $client->request('GET',  config('api.url').'java-dash/project-dashboard',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'bulan' => $explode[1],
                    'tahun' => $explode[0]
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }
}

?>