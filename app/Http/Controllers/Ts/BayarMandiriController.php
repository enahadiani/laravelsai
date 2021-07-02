<?php
 
namespace App\Http\Controllers\Ts;
 
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\BadResponseException;
use Log;
 
class BayarMandiriController extends Controller
{
    /**
     * Make request global.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        // 
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nilai' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'nama_jurusan' => 'required',
            'kode_pp' => 'required',
            'no_bill' => 'required',
            'periode_bill' => 'required',
            'kode_param' => 'required',
            'id_bank' => 'required'
        ]);
            
        try{
            $client = new Client();
            
            $response = $client->request('POST',  'https://mandirigw.ypt.or.id/bill',[
                'headers' => [
                    'app_code' => config('api.ypt_app_code'),
                    'app_key'  => config('api.ypt_app_key'),
                ],
                'form_params' => [
                    'bill_cust_id' => $request->id_bank,
                    'bill_cust_info' => '{"NIS": '.$request->nis.', "nama": '.$request->nama.', "jurusan": '.$request->nama_jurusan.',"kode_pp":'.$request->kode_pp.'}',
                    'bill_code' => $request->kode_param,
                    'bill_name' => $request->kode_param.'\\'.$request->nilai.'\\'.$request->periode_bill.'\\'.$request->no_bill,
                    'bill_short_name' => $request->nilai.'\\'.$request->no_bill,
                    'bill_amount' => $request->nilai,
                    'bill_currency' => 'IDR',
                    'bill_open_date' => '2021-05-22 15:00:00',
                    'bill_close_date' => '2021-09-24 15:00:00'
                ]
            ]);
            
            $data = [];
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            Log::info('MANDIRI BILL:'.print_r($data,true));
            $res = [];
            $log = print_r($data, true); 
            $request->request->add(['log' => $log]);
            $request->request->add(['status' => $data['bill']['bill_status']]);
            $request->request->add(['bill_code' => $data['bill']['bill_code']]);
            $request->request->add(['bill_cust_id' => $data['bill']['bill_cust_id']]);
            $response = $client->request('POST',  config('api.url').'ts/create-mandiri-bill',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $request->all()
            ]);
           
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $res = json_decode($response_data,true);
            }
            Log::info('MANDIRI BILL STORE DB RESPONSE:'.print_r($res,true));
            // if(isset($data['success'])){
            //     if($data['success']){

            //     }
            // }
            
            return response()->json($data, 200);
        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json($result, 200);
        } 
    }

    
}
 
