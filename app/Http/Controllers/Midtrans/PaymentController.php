<?php

namespace App\Http\Controllers\Midtrans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public $link = 'https://api.simkug.com/api/rtrw/';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPayment(){
        try{

            $client = new Client();
            $response = $client->request('GET', $this->link.'sai-midtrans',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return view('midtrans.payment',['token'=> $data['token']]);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            dd($res);
        } 
    }

}
