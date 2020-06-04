<?php
 
namespace App\Http\Controllers\Midtrans;
 
use Illuminate\Http\Request;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\BadResponseException;
 
class DonasiController extends Controller
{
    /**
     * Make request global.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;
    public $link = 'https://api.simkug.com/api/midtrans/';

    public function __construct(Request $request)
    {
        // if(!Session::get('login')){
        //     return redirect('midtrans/login')->with('alert','Session telah habis !');
        // }else{

            $this->request = $request;
     
            // Set midtrans configuration
            Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
            Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
            Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
            Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
        // }
    }
 
    /**
     * Show index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try{

            $client = new Client();
            $response = $client->request('GET', $this->link.'donasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
                for($i=0;$i<count($data);$i++){
                   if ($data[$i]['status'] == 'pending' || $data[$i]['status'] == 'process'){

                       $data[$i]['action'] = '<button class="btn btn-success btn-sm complete-pay" data-snap ="'.$data[$i]['snap_token'].'" >Complete Payment</button>';
                   }else{
                       $data[$i]['action'] = '';
                   }
                }
            }
            return response()->json(['daftar' => $data, 'status'=>true,'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
        // $data['donations'] = Donation::orderBy('id', 'desc')->paginate(8);
 
        // return view('midtrans.midtrans', $data);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'tipe_donasi' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required'
            // 'status' => 'required',
            // 'snap_token' => 'required'
        ]);
            
        try{
            $client = new Client();
            $response = $client->request('GET', $this->link.'donasi-kode',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $orderId = $data['no_bukti'];
            }
            //transaksi ke midtrans
            $payload = [
                'transaction_details' => [
                    'order_id'      => $orderId,
                    'gross_amount'  => $request->nilai,
                ],
                'customer_details' => [
                    'first_name'    => $request->nama,
                    'email'         => $request->email
                ],
                'item_details' => [
                    [
                        'id'       => $request->tipe_donasi,
                        'price'    => $request->nilai,
                        'quantity' => 1,
                        'name'     => ucwords(str_replace('_', ' ', $request->tipe_donasi))
                    ]
                ],
                'enabled_payments' => ['gopay']

            ];
            $snapToken = Veritrans_Snap::getSnapToken($payload);

            $response = $client->request('POST', $this->link.'donasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'no_bukti' => $orderId,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'type_donasi' => $request->tipe_donasi,
                    'nilai' => $request->nilai,
                    'keterangan' => $request->keterangan,
                    'status' => 'process',
                    'snap_token' => $snapToken
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data["success"], 'snap_token' => $snapToken], 200);

        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }

    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        $orderId = $notif->order_id;
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                
                if($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                    $message = "Transaction order_id: " . $orderId ." is challenged by FDS";
                    // $donation->setPending();
                    $sts_bayar = 'pending';
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                    $message = "Transaction order_id: " . $orderId ." successfully captured using " . $type;
                    // $donation->setSuccess();
                    $sts_bayar = 'success';
                }
                
            }
            
        } elseif ($transaction == 'settlement') {
            
            // TODO set payment status in merchant's database to 'Settlement'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $message = "Transaction order_id: " . $orderId ." successfully transfered using " . $type;
            // $donation->setSuccess();
            $sts_bayar = 'success';
            
        } elseif($transaction == 'pending'){
            
            // TODO set payment status in merchant's database to 'Pending'
            // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $message = "Waiting customer to finish transaction order_id: " . $orderId . " using " . $type;
            // $donation->setPending();
            $sts_bayar = 'success';
            
        } elseif ($transaction == 'deny') {
            
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $message = "Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.";
            // $donation->setFailed();
            $sts_bayar = 'success';
            
        } elseif ($transaction == 'expire') {
            
            // TODO set payment status in merchant's database to 'expire'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $message = "Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.";
            // $donation->setExpired();
            $sts_bayar = 'success';
            
        } elseif ($transaction == 'cancel') {
            
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $message = "Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.";
            // $donation->setFailed();
            $sts_bayar = 'success';
            
        }

        $client = new Client();
        $response = $client->request('PUT', $this->link.'donasi/'.$orderId.'/'.$sts_bayar,[]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"];
        }
        
        return response()->json(["message" => $message,"data"=>$data, "sts_bayar" => $sts_bayar], 200);
    }

 
    // /**
    //  * Submit donation.
    //  *
    //  * @return array
    //  */
    // public function submitDonation()
    // {
    //     \DB::transaction(function(){
    //         // Save donasi ke database
    //         $donation = Donation::create([
    //             'donor_name' => $this->request->donor_name,
    //             'donor_email' => $this->request->donor_email,
    //             'donation_type' => $this->request->donation_type,
    //             'amount' => floatval($this->request->amount),
    //             'note' => $this->request->note,
    //         ]);
 
    //         // Buat transaksi ke midtrans kemudian save snap tokennya.
    //         $payload = [
    //             'transaction_details' => [
    //                 'order_id'      => $donation->id,
    //                 'gross_amount'  => $donation->amount,
    //             ],
    //             'customer_details' => [
    //                 'first_name'    => $donation->donor_name,
    //                 'email'         => $donation->donor_email,
    //                 // 'phone'         => '08888888888',
    //                 // 'address'       => '',
    //             ],
    //             'item_details' => [
    //                 [
    //                     'id'       => $donation->donation_type,
    //                     'price'    => $donation->amount,
    //                     'quantity' => 1,
    //                     'name'     => ucwords(str_replace('_', ' ', $donation->donation_type))
    //                 ]
    //             ]
    //         ];
    //         $snapToken = Veritrans_Snap::getSnapToken($payload);
    //         $donation->snap_token = $snapToken;
    //         $donation->save();
 
    //         // Beri response snap token
    //         $this->response['snap_token'] = $snapToken;
    //     });
 
    //     return response()->json($this->response);
    // }
 
    // /**
    //  * Midtrans notification handler.
    //  *
    //  * @param Request $request
    //  * 
    //  * @return void
    //  */
    // public function notificationHandler(Request $request)
    // {
    //     $notif = new Veritrans_Notification();
    //     \DB::transaction(function() use($notif) {
 
    //       $transaction = $notif->transaction_status;
    //       $type = $notif->payment_type;
    //       $orderId = $notif->order_id;
    //       $fraud = $notif->fraud_status;
    //       $donation = Donation::findOrFail($orderId);
 
    //       if ($transaction == 'capture') {
 
    //         // For credit card transaction, we need to check whether transaction is challenge by FDS or not
    //         if ($type == 'credit_card') {
 
    //           if($fraud == 'challenge') {
    //             // TODO set payment status in merchant's database to 'Challenge by FDS'
    //             // TODO merchant should decide whether this transaction is authorized or not in MAP
    //             // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
    //             $message = "Transaction order_id: " . $orderId ." is challenged by FDS";
    //             $donation->setPending();
    //           } else {
    //             // TODO set payment status in merchant's database to 'Success'
    //             // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
    //             $message = "Transaction order_id: " . $orderId ." successfully captured using " . $type;
    //             $donation->setSuccess();
    //           }
 
    //         }
 
    //       } elseif ($transaction == 'settlement') {
 
    //         // TODO set payment status in merchant's database to 'Settlement'
    //         // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
    //         $message = "Transaction order_id: " . $orderId ." successfully transfered using " . $type;
    //         $donation->setSuccess();
 
    //       } elseif($transaction == 'pending'){
 
    //         // TODO set payment status in merchant's database to 'Pending'
    //         // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
    //         $message = "Waiting customer to finish transaction order_id: " . $orderId . " using " . $type;
    //         $donation->setPending();
 
    //       } elseif ($transaction == 'deny') {
 
    //         // TODO set payment status in merchant's database to 'Failed'
    //         // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
    //         $message = "Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.";
    //         $donation->setFailed();
 
    //       } elseif ($transaction == 'expire') {
 
    //         // TODO set payment status in merchant's database to 'expire'
    //         // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
    //         $message = "Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.";
    //         $donation->setExpired();
 
    //       } elseif ($transaction == 'cancel') {
 
    //         // TODO set payment status in merchant's database to 'Failed'
    //         // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
    //         $message = "Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.";
    //         $donation->setFailed();
 
    //       }
    //       $this->response['message'] = $message;
    //     });
    //     return response()->json(["message"=>$message]);
 
    // }
}
 
