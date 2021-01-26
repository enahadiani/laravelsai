<?php

    namespace App\Http\Controllers\Esaku;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class UploadDokKasBankController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('esaku-auth/login');
            }
        }

        public function show(Request $request)
        {
            $this->validate($request,[
                'no_bukti' => 'required'
            ]);
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'toko-trans/kas-bank-dok',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_bukti' => $request->no_bukti
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data;
                }
                return response()->json(['data' => $data], 200); 
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $result['message'] = $res["message"];
                $result['status']=false;
                return response()->json(["data" => $result], 200);
            } 
        }

        public function store(Request $request) {

            $this->validate($request, [
                'no_bukti' => 'required'
            ]);

            try {
                
                $fields = [
                    [
                        'name' => 'no_bukti',
                        'contents' => $request->no_bukti,
                    ]
                ];
    
                $fields_foto = array();
                $fields_nama_file_seb = array();
                $fields_jenis = array();
                $fields_nama_dok = array();
                $fields_no_urut = array();
                $cek = $request->file_dok;
                $send_data = array();
                $send_data = array_merge($send_data,$fields);
                if(!empty($cek)){
    
                    if(count($request->file_dok) > 0){
    
                        for($i=0;$i<count($request->jenis);$i++){
                            if(isset($request->file('file_dok')[$i])){
                                $image_path = $request->file('file_dok')[$i]->getPathname();
                                $image_mime = $request->file('file_dok')[$i]->getmimeType();
                                $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                                $fields_foto[$i] = array(
                                    'name'     => 'file['.$i.']',
                                    'filename' => $image_org,
                                    'Mime-Type'=> $image_mime,
                                    'contents' => fopen( $image_path, 'r' ),
                                );
                                
                            }
                            $fields_jenis[$i] = array(
                                'name'     => 'jenis[]',
                                'contents' => $request->jenis[$i],
                            );
                            $fields_nama_dok[$i] = array(
                                'name'     => 'nama_dok[]',
                                'contents' => $request->nama_dok[$i],
                            );
                            $fields_no_urut[$i] = array(
                                'name'     => 'no_urut[]',
                                'contents' => $request->no_urut[$i],
                            );
                            $fields_nama_file_seb[$i] = array(
                                'name'     => 'nama_file_seb[]',
                                'contents' => $request->nama_file[$i],
                            );
                        }
                        $send_data = array_merge($send_data,$fields_foto);
                        $send_data = array_merge($send_data,$fields_nama_file_seb);
                        $send_data = array_merge($send_data,$fields_jenis);
                        $send_data = array_merge($send_data,$fields_no_urut);
                        $send_data = array_merge($send_data,$fields_nama_dok);
                    }
                }
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'toko-trans/kas-bank-dok',[
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
                return response()->json(['data' => $data], 500);
            }

        }

        public function destroy(Request $request) {
            
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'toko-trans/kas-bank-dok',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_bukti' => $request->no_bukti,  
                        'kode_jenis' => $request->kode_jenis,  
                        'no_urut' => $request->no_urut
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