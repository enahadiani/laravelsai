<?php

namespace App\Http\Controllers\Toko;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PenjualanLangsungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/toko-trans/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('toko-auth/login')->with('alert','Session telah habis !');
        }
    }

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cekBonus($kd_barang, $tanggal, $jumlah, $harga) {
        try {
            $client = new Client();
            $response = $client->request('GET', $this->link.'penjualan-langsung-bonus?tanggal='.$tanggal.
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
        $this->validate($request, [
            'kode_cust'=>'required',
            'nama'=>'required',
            'no_tel'=>'required',
            'alamat'=>'required',
            'kota'=>'required',
            'provinsi'=>'required',
            'catatan'=>'required',
            'kode_kirim'=>'required',
            'nilai_ongkir'=>'required',
            'nilai_pesan'=>'required',
            'kode_barang' => 'required|array',
            'qty_barang' => 'required|array',
            'harga_barang' => 'required|array',
            'diskon_barang' => 'required|array',
            'sub_barang' => 'required|array',
        ]);

        try {
            $data_harga = array();
            $data_diskon = array();
            $data_sub = array();
            for($i=0;$i<count($request->harga_barang);$i++){
                $data_harga[] = $this->joinNum($request->harga_barang[$i]);
                $data_diskon[] = $this->joinNum($request->disc_barang[$i]);
                $data_sub[] = $this->joinNum($request->sub_barang[$i]);
            }

            $fields = array (
                'tanggal'=>date('Y-m-d H:i:s'),
                'kode_cust'=>$request->kode_cust,
                'nama_cust'=>$request->nama,
                'notel_cust'=>$request->no_tel,
                'alamat_cust'=>$request->alamat,
                'kota_cust'=>$request->kota,
                'prop_cust'=>$request->provinsi,
                'catatan'=>$request->catatan,
                'kode_kirim'=>$request->kode_kirim,
                'no_resi'=>'-',
                'nilai_ongkir'=>$this->joinNum($request->nilai_ongkir),
                'nilai_pesan'=>$this->joinNum($request->nilai_pesan),
                'kode_barang' => $request->kode_barang,
                'qty_barang' => $request->qty_barang,
                'harga_barang' => $data_harga,
                'diskon_barang' => $data_diskon,
                'sub_barang'=> $data_sub
            );

            $client = new Client();
            $response = $client->request('POST', $this->link.'penjualan-langsung',[
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
