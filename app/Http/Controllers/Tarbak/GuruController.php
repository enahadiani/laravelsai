<?php
    namespace App\Http\Controllers\Tarbak;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class GuruController extends Controller {

        public $link = 'http://api.simkug.com/api/sekolah/';

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('tarbak/login')->with('alert','Session telah habis !');
            }
        }

        public function getNIKGuru($kode_pp) {

            $client = new Client();
            $response = $client->request('GET', $this->link.'guru_nik?kode_pp='.$kode_pp,[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

    }
?>