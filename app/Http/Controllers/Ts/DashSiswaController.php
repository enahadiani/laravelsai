<?php

    namespace App\Http\Controllers\Ts;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;
    use PDF;

    class DashSiswaController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('ts-auth/login')->with('alert','Session telah habis !');
            }
        }

        public function getKartuPiutang(Request $request)
        {
            try{
                
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'ts/kartu-piutang',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data;
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function getKartuPiutangDetail(Request $request)
        {
            try{
                
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'ts/kartu-piutang-detail',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'id' => $request->id
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data;
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function getKartuPDD(Request $request)
        {
            try{
                
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'ts/kartu-pdd',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data;
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function getProfile(Request $request)
        {
            try{
                
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'ts/dash-siswa-profile',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => Session::get('periode')
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data;
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        function sendEmail(Request $request){
            try{
                
                $client = new Client();
                
                $query = [
                    'from' => 'devsaku5@gmail.com',
                    'to' => $request->email,
                    'html' => $request->html,
                    'text' => $request->text,
                    'subject' => $request->subject
                ];
        
                $response = $client->request('POST',config('api.url').'ts/send-email',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                    ],
                    'form_params' => $query
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res;
                }

                return response()->json($data, 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], 200);
                // var_dump($response);
            } 
        }

        public function getKartuPDDPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Ts\DashSiswaController')->getKartuPDD($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('ts.fKartuPDDPDF', $data)->setOptions([
                'tempDir' => public_path(),
                'chroot'  => public_path('/img'),
            ]);
            return $pdf->download('kartu-pdd-pdf');   
        }

        public function getKartuPiutangPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Ts\DashSiswaController')->getKartuPiutang($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('ts.fKartuPiutangPDF', $data)->setOptions([
                'tempDir' => public_path(),
                'chroot'  => public_path('/img'),
            ]);
            return $pdf->download('kartu-piutang-pdf');   
        }

        public function getRaportPDF(Request $request)
        {
            set_time_limit(300);
            // $tmp = app('App\Http\Controllers\Ts\DashSiswaController')->getKartuPiutang($request);
            // $tmp = json_decode(json_encode($tmp),true);
            // $data = $tmp['original'];
            
            $pdf = PDF::loadview('ts.fRaportPDF')->setOptions([
                'tempDir' => public_path(),
                'chroot'  => public_path('/img'),
            ]);
            return $pdf->download('raport-pdf');   
        }

        public function getSklPDF(Request $request)
        {
            set_time_limit(300);
            // $tmp = app('App\Http\Controllers\Ts\DashSiswaController')->getKartuPiutang($request);
            // $tmp = json_decode(json_encode($tmp),true);
            // $data = $tmp['original'];
            
            $pdf = PDF::loadview('ts.fSklPDF')->setOptions([
                'tempDir' => public_path(),
                'chroot'  => public_path('/img'),
            ]);
            return $pdf->download('skl-pdf');   
        }
        
    }

?>