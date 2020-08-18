<?php
    namespace App\Http\Controllers\Sai;

    use App\Http\Controllers\Controller;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class HelperController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('tarbak/login')->with('alert','Session telah habis !');
            }
        }

        public function getPeriode() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sai-report/filter-periode',[
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

        public function getTagihan($periode) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sai-trans/tagihan-maintain-load?periode='.$periode.'&status=MAINTENANCE',[
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

        public function getKontrak($status) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sai-trans/kontrak?status='.$status,[
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

        public function getMenu() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sai-master/user-menu',[
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