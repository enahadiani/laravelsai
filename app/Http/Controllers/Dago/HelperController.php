<?php
    namespace App\Http\Controllers\Dago;

    use App\Http\Controllers\Controller;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class HelperController extends Controller {

        public $link = 'https://api.simkug.com/api/dago-master/';

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('tarbak/login')->with('alert','Session telah habis !');
            }
        }

        public function getAkunPdpt() {

            $client = new Client();
            $response = $client->request('GET', $this->link.'akun-pendapatan',[
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

    }
?>