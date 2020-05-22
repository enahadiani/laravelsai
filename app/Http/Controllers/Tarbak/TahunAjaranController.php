<?php

    namespace App\Http\Controllers\Tarbak;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class TahunAjaranController extends Controller {

        public $link = 'https://api.simkug.com/api/sekolah/';

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('tarbak/login')->with('alert','Session telah habis !');
            }
        }

        public function index()
        {
            $client = new Client();
            $response = $client->request('GET', $this->link.'tahun_ajaran_all',[
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
            return response()->json(['data' => $data, 'status' => true], 200);
        }

        public function save(Request $request) {

            $this->validate($request, [
            'kode_ta' => 'required',
            'nama' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'flag_aktif' => 'required',
            'kode_pp' => 'required'
            ]);

            try {
                $client = new Client();
                $response = $client->request('POST', $this->link.'tahun_ajaran',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_ta' => $request->kode_ta,
                        'nama' => $request->nama,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'flag_aktif' => $request->flag_aktif,
                        'kode_pp' => $request->kode_pp,
                    ]
                ]);
                // var_dump('Sukses');
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }

            } catch (BadResponseException $ex) {
                // var_dump('Gagal');
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }

        }

        public function getTahunAjaran($kode_ta1,$kode_ta2,$kode_pp) {
        try{
            $client = new Client();
            $kode_ta = $kode_ta1."/".$kode_ta2;
            $response = $client->request('GET', $this->link.'tahun_ajaran?kode_ta='.$kode_ta."&kode_pp=".$kode_pp,
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
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

        }

        public function update(Request $request, $kode_ta1,$kode_ta2) {
            $this->validate($request, [
            'nama' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'flag_aktif' => 'required',
            'kode_pp' => 'required'
            ]);

            try {
                $client = new Client();
                $kode_ta = $kode_ta1."/".$kode_ta2;
                $response = $client->request('PUT', $this->link.'tahun_ajaran?kode_ta='.$kode_ta,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'nama' => $request->nama,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'flag_aktif' => $request->flag_aktif,
                        'kode_pp' => $request->kode_pp,
                    ]
                ]);
                // var_dump('Sukses');
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
        }

        public function delete($kode_ta1,$kode_ta2,$kode_pp) {
            try{
            $client = new Client();
            $kode_ta = $kode_ta1."/".$kode_ta2;
            $response = $client->request('DELETE', $this->link.'tahun_ajaran?kode_ta='.$kode_ta.'&kode_pp='.$kode_pp,
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
            
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }
        }

    }

?>