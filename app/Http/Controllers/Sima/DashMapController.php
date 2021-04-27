<?php

    namespace App\Http\Controllers\Sima;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class DashMapController extends Controller
    {

        public function __contruct() {
            if(!Session::get('login')) {
                return redirect('sima-auth/login')->with('alert','Session telah habis !');
            }
        }

        public function getSummary(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET', config('api.url').'gis-dash/summary',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => $request->all()
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                }
                return response()->json(['data' => $data], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data = ['message' => $res, 'status'=>false];
                return response()->json(['data' => $data], $response->getStatusCode());
            }
        }

        

    }
?>