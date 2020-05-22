<?php

    namespace App\Http\Controllers\Tarbak;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class KkmController extends Controller {

        public $link = 'https://api.simkug.com/api/sekolah/';

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('tarbak/login')->with('alert','Session telah habis !');
            }
        }

        public function index()
        {
            $client = new Client();
            $response = $client->request('GET', $this->link.'kkm_all',[
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
                'kode_tingkat' => 'required',
                'kode_jur' => 'required',
                'kode_pp' => 'required',
                'flag_aktif' => 'required',
                'kode_matpel' => 'required|array',
                'kkm'=>'required|array'
            ]);

            try{
                // $fields = array(
                //     'kode_ta'=>$request->kode_ta,
                //     'kode_tingkat'=>$request->kode_ta,
                //     'kode_jur'=>$request->kode_jur,
                //     'kode_pp'=>$request->kode_pp,
                //     'kode_lokasi'=>Session::get('lokasi'),
                //     'flag_aktif'=>$request->flag_aktif,
                //     'kode_matpel'=>$request->kode_matpel,
                //     'kkm'=>$request->kkm
                // );
                $fields = [
                    [
                        'name' => 'kode_ta',
                        'contents' => $request->kode_ta,
                    ],
                    [
                        'name' => 'kode_tingkat',
                        'contents' => $request->kode_tingkat,
                    ],
                    [
                        'name' => 'kode_jur',
                        'contents' => $request->kode_jur,
                    ],
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ],
                    [
                        'name' => 'kode_lokasi',
                        'contents' => Session::get('lokasi'),
                    ],
                    [
                        'name' => 'flag_aktif',
                        'contents' => $request->flag_aktif,
                    ]
                ];

                $fields_matpel = array();
                if(count($request->kode_matpel) > 0){

                    for($i=0;$i<count($request->kode_matpel);$i++){
                        $fields_matpel[$i] = array(
                            'name'     => 'kode_matpel[]',
                            'contents' => $request->kode_matpel[$i],
                        );
                    }
                    $send_data = array_merge($fields,$fields_matpel);
                }

                $fields_kkm = array();
                if(count($request->kkm) > 0){

                    for($i=0;$i<count($request->kkm);$i++){
                        $fields_kkm[$i] = array(
                            'name'     => 'kkm[]',
                            'contents' => $request->kkm[$i],
                        );
                    }
                    $send_data = array_merge($send_data,$fields_kkm);
                }
                // var_dump(json_encode($send_data));
                $client = new Client();
                $response = $client->request('POST', $this->link.'kkm',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $send_data
                ]);
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
                return response()->json(['data' => $data], 200);
            }

        }

        public function getKkm($kode_kkm,$kode_pp) {
            try{
                $client = new Client();
                $response = $client->request('GET', $this->link.'kkm?kode_kkm='.$kode_kkm."&kode_pp=".$kode_pp,
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

        public function delete($kode_kkm,$kode_pp) {
            try{
                $client = new Client();
                $response = $client->request('DELETE', $this->link.'kkm?kode_kkm='.$kode_kkm.'&kode_pp='.$kode_pp,
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

        public function update(Request $request, $kode_kkm)
        {
            $this->validate($request, [
                'kode_ta' => 'required',
                'kode_tingkat' => 'required',
                'kode_jur' => 'required',
                'kode_pp' => 'required',
                'flag_aktif' => 'required',
                'kode_matpel' => 'required|array',
                'kkm'=>'required|array'
            ]);

            try{
                $fields = array (
                    'kode_kkm' => $kode_kkm,
                    'kode_ta' => $request->kode_ta,
                    'kode_tingkat' => $request->kode_tingkat,
                    'kode_jur' => $request->kode_jur,
                    'kode_pp' => $request->kode_pp,
                    'flag_aktif' => $request->flag_aktif,
                    'kode_matpel' => $request->kode_matpel,
                    'kkm'=>$request->kkm
                );
        
                $client = new Client();
                $response = $client->request('PUT', $this->link.'kkm',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json'
                    ],
                    'body' => json_encode($fields)
                ]);
                
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"],'fields'=>$fields], 200);  
                }
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }

        }

    }

        // public function saveKKM(Request $request) {
        //     $this->validate($request,[
        //         'kode_ta' => 'required',
        //         'kode_tingkat' => 'required',
        //         'kode_jur' => 'required',
        //         'kode_pp' => 'required',
        //         'flag_aktif' => 'required',
        //         'kode_matpel' => 'required|array',
        //         'kkm' => 'required|array'
        //     ]);
        //     try {
        //         $fields = array(
        //             'kode_ta' => $request->kode_ta,
        //             'kode_tingkat' => $request->kode_tingkat,
        //             'kode_jur' => $request->kode_jur,
        //             'kode_pp' => $request->kode_pp,
        //             'flag_aktif' => $request->flag_aktif,
        //             'kode_matpel' => $request->kode_matpel,
        //             'kkm' => $request->kkm
        //         );
        //         $client = new Client();
        //         $response = $client->request('POST',$this->link.'kkm',[
        //             'headers' => [
        //                 'Authorization' => 'Bearer '.Session::get('token'),
        //                 'Accept'     => 'application/json',
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
        //         $data['message'] = $res;
        //         $data['status'] = false;
        //         return response()->json(['data' => $data], 500);
        //     }
        // }

?>