<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class JadwalHarianController extends Controller {


        public function __contruct() {
            if(!Session::get('login')){
                return redirect('sekolah-auth/login');
            }
        }

        public function getJadwal($kode_pp,$kode_ta1,$kode_ta2,$kode_kelas,$nik,$kode_matpel) {
            try{
                $client = new Client();
                $kode_ta = $kode_ta1."/".$kode_ta2;
                $response = $client->request('GET',  config('api.url').'sekolah/jadwal-load?kode_pp='.$kode_pp
                ."&kode_ta=".$kode_ta."&kode_kelas=".$kode_kelas."&nik_guru=".$nik
                ."&kode_matpel=".$kode_matpel,
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

        public function index()
        {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/jadwal-harian-all',[
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
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function save(Request $request) {
            $this->validate($request, [
                'kode_pp' => 'required',
                'kode_ta' => 'required',
                'kode_matpel' => 'required',
                'nik_guru' => 'required',
                'kode_kelas' => 'required',
                'kode_slot' => 'required|array',
                'senin'=>'required|array',
                'selasa' => 'required|array',
                'rabu'=>'required|array',
                'kamis' => 'required|array',
                'jumat'=>'required|array',
                'sabtu' => 'required|array',
                'minggu'=>'required|array'
            ]);

            try{                
                $fields = array (
                    'kode_pp' => $request->kode_pp,
                    'kode_ta' => $request->kode_ta,
                    'kode_matpel' => $request->kode_matpel,
                    'nik_guru' => $request->nik_guru,
                    'kode_kelas' => $request->kode_kelas,
                    'kode_slot'=>$request->kode_slot,
                    'senin'=>$request->senin,
                    'selasa'=>$request->selasa,
                    'rabu'=>$request->rabu,
                    'kamis'=>$request->kamis,
                    'jumat'=>$request->jumat,
                    'sabtu'=>$request->sabtu,
                    'minggu'=>$request->minggu,
                  );
    
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/jadwal-harian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json'
                    ],
                    'body' => json_encode($fields)
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['fields'] = $fields;
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }

        }

        public function delete($kode_pp,$kode_ta1,$kode_ta2,$kode_kelas,$nik,$kode_matpel) {
            try{
                $client = new Client();
                $kode_ta = $kode_ta1."/".$kode_ta2;
                $response = $client->request('DELETE',  config('api.url').'sekolah/jadwal-harian?kode_pp='.$kode_pp.
                '&kode_ta='.$kode_ta."&kode_kelas=".$kode_kelas."&nik_guru=".$nik."&kode_matpel=".$kode_matpel,
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

        // public function update(Request $request, $nik)
        // {
        //     $this->validate($request, [
        //         'kode_pp' => 'required',
        //         'kode_ta' => 'required',
        //         'kode_matpel' => 'required',
        //         'nik_guru' => 'required',
        //         'kode_kelas' => 'required',
        //         'kode_slot' => 'required|array',
        //         'senin'=>'required|array',
        //         'selasa' => 'required|array',
        //         'rabu'=>'required|array',
        //         'kamis' => 'required|array',
        //         'jumat'=>'required|array',
        //         'sabtu' => 'required|array',
        //         'minggu'=>'required|array'
        //     ]);

        //     try{                
        //         $fields = array (
        //             'kode_pp' => $request->kode_pp,
        //             'kode_ta' => $request->kode_ta,
        //             'kode_matpel' => $request->kode_matpel,
        //             'nik_guru' => $request->nik_guru,
        //             'kode_kelas' => $request->kode_kelas,
        //             'kode_slot'=>$request->kode_slot,
        //             'senin'=>$request->senin,
        //             'selasa'=>$request->selasa,
        //             'rabu'=>$request->rabu,
        //             'kamis'=>$request->kamis,
        //             'jumat'=>$request->jumat,
        //             'sabtu'=>$request->sabtu,
        //             'minggu'=>$request->minggu,
        //           );
    
        //         $client = new Client();
        //         $response = $client->request('PUT',  config('api.url').'sekolah/jadwal-harian',[
        //             'headers' => [
        //                 'Authorization' => 'Bearer '.Session::get('token'),
        //                 'Content-Type'     => 'application/json'
        //             ],
        //             'body' => json_encode($fields)
        //         ]);
        //         if ($response->getStatusCode() == 200) { // 200 OK
        //             $response_data = $response->getBody()->getContents();
                    
        //             $data = json_decode($response_data,true);
        //             return response()->json(['data' => $data["success"]], 200);  
        //         }
        //     } catch (BadResponseException $ex) {
        //         $response = $ex->getResponse();
        //         $res = json_decode($response->getBody(),true);
        //         $data['message'] = $res['message'];
        //         $data['fields'] = $fields;
        //         $data['status'] = false;
        //         return response()->json(['data' => $data], 200);
        //     }

        // }

    }

?>