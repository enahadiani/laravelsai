<?php

namespace App\Http\Controllers\Toko;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('toko-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getNoOpen(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/penjualan-open',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function cekBonus($kd_barang, $tanggal, $jumlah, $harga) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/penjualan-bonus?tanggal='.$tanggal.
            '&kode_barang='.$kd_barang.'&jumlah='.$jumlah.'&harga='.$harga,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        try {
        $this->validate($request, [
            'no_open' => 'required',
            'total_trans' => 'required',
            'total_disk' => 'required',
            'total_bayar' => 'required',
            'kode_barang' => 'required|array',
            'qty_barang' => 'required|array',
            'harga_barang' => 'required|array',
            'disc_barang' => 'required|array',
            'sub_barang' => 'required|array'
        ]);
        $data_harga = array();
        for($i=0;$i<count($request->harga_barang);$i++){
            $data_harga[] = intval(str_replace('.','', $request->harga_barang[$i]));
        }
        $data_diskon = array();
        for($i=0;$i<count($request->disc_barang);$i++){
            $data_diskon[] = intval(str_replace('.','', $request->disc_barang[$i]));
        }
        $data_sub = array();
        for($i=0;$i<count($request->sub_barang);$i++){
            $data_sub[] = intval(str_replace('.','', $request->sub_barang[$i]));
        }

        $fields = array (
            'kode_pp' => Session::get('kodePP'),
            'no_open' => $request->no_open,
            'total_trans' => intval(str_replace('.','', $request->total_trans)),
            'diskon' => intval(str_replace('.','', $request->total_disk)),
            'total_bayar' => intval(str_replace('.','', $request->total_bayar)),
            'kode_barang' => $request->kode_barang,
            'qty_barang' => $request->qty_barang,
            'harga_barang' => $data_harga,
            'diskon_barang' => $data_diskon,
            'sub_barang'=> $data_sub
        );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/penjualan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }
}
