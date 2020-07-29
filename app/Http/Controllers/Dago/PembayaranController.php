<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public $link = 'https://api.simkug.com/api/dago-trans/';

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('dago-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/pembayaran-history',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getKurs(Request $request){
        $this->validate($request,[
            'kode_curr' => 'required'
        ]);
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/pembayaran-kurs',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_curr' => $request->kode_curr
                ]

            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["kurs"];
            }
            return response()->json(['kurs' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getRegistrasi(){
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/pembayaran',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required|date_format:Y-m-d',
            'no_reg' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'kode_akun' => 'required',
            'akunTitip' => 'required',
            'kode_curr' => 'required',
            'kurs' => 'required',
            'kurs_closing' => 'required',
            'akun_tambah' => 'required',
            'akun_dokumen' => 'required',
            'paket' => 'required',
            'tgl_berangkat' => 'required|date_format:Y-m-d',
            'status_bayar' => 'required|in:TUNAI,TRANSFER',
            'total_bayar' => 'required',
            'bayar_paket' => 'required',
            'bayar_tambahan' => 'required',
            'bayar_dok' => 'required',
            'kode_biaya' => 'required|array',
            'jenis_biaya' => 'required|array',
            'kode_akunbiaya' => 'required|array',
            'nbiaya_bayar' => 'required|array'
        ]);
            
        try{
            $biaya = array();
            if(isset($request->kode_biaya)){
                $kode_biaya = $request->kode_biaya;
                $jenis_biaya = $request->jenis_biaya;
                $kode_akun = $request->kode_akunbiaya;
                $bayar = $request->nbiaya_bayar;
                for($i=0;$i<count($kode_biaya);$i++){
                    $biaya[] = array(
                        'kode_biaya' => $kode_biaya[$i],
                        'jenis_biaya' => $jenis_biaya[$i],
                        'kode_akun' => $kode_akun[$i],
                        'bayar' => $this->joinNum($bayar[$i])
                    );
                }
            }

            $fields = array (
                'tanggal' => $request->tanggal,
                'no_reg' => $request->no_reg,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kode_pp' => Session::get('kodePP'),
                'kode_akun' => $request->kode_akun,
                'akun_titip' => $request->akunTitip,
                'kode_curr' => $request->kode_curr,
                'kurs' => $this->joinNum($request->kurs),
                'kurs_closing' => $this->joinNum($request->kurs_closing),
                'akun_tambah' => $request->akun_tambah,
                'akun_dokumen' => $request->akun_dokumen,
                'paket' => $request->paket,
                'tgl_berangkat' => $request->tgl_berangkat,
                'status_bayar' => $request->status_bayar,
                'total_bayar' => $this->joinNum($request->total_bayar),
                'bayar_paket' => $this->joinNum($request->bayar_paket),
                'bayar_tambahan' => $this->joinNum($request->bayar_tambahan),
                'bayar_dok' => $this->joinNum($request->bayar_dok),
                'biaya' => $biaya
            );
    
            $client = new Client();
            $response = $client->request('POST', config('api.url').'dago-trans/pembayaran',[
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
            
            // return response()->json(['data' => $fields], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, [
            'no_reg' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/pembayaran-detail?no_reg='.$request->no_reg,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_reg' => $request->no_reg
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $this->validate($request, [
            'no_reg' => 'required',
            'no_kwitansi' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/pembayaran-edit?no_reg='.$request->no_reg.'&no_bukti='.$request->no_kwitansi,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_reg' => $request->no_reg,
                    'no_bukti' => $request->no_kwitansi
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required|date_format:Y-m-d',
            'no_reg' => 'required',
            'nama' => 'required',
            'no_bukti' => 'required',
            'deskripsi' => 'required',
            'kode_akun' => 'required',
            'akunTitip' => 'required',
            'kode_curr' => 'required',
            'kurs' => 'required',
            'kurs_closing' => 'required',
            'akun_tambah' => 'required',
            'akun_dokumen' => 'required',
            'paket' => 'required',
            'tgl_berangkat' => 'required|date_format:Y-m-d',
            'status_bayar' => 'required|in:TUNAI,TRANSFER',
            'total_bayar' => 'required',
            'bayar_paket' => 'required',
            'bayar_tambahan' => 'required',
            'bayar_dok' => 'required',
            'kode_biaya' => 'required|array',
            'jenis_biaya' => 'required|array',
            'kode_akunbiaya' => 'required|array',
            'nbiaya_bayar' => 'required|array'
        ]);
            
        try{
            $biaya = array();
            if(isset($request->kode_biaya)){
                $kode_biaya = $request->kode_biaya;
                $jenis_biaya = $request->jenis_biaya;
                $kode_akun = $request->kode_akunbiaya;
                $bayar = $request->nbiaya_bayar;
                for($i=0;$i<count($kode_biaya);$i++){
                    $biaya[] = array(
                        'kode_biaya' => $kode_biaya[$i],
                        'jenis_biaya' => $jenis_biaya[$i],
                        'kode_akun' => $kode_akun[$i],
                        'bayar' => $this->joinNum($bayar[$i])
                    );
                }
            }

            $fields = array (
                'tanggal' => $request->tanggal,
                'no_reg' => $request->no_reg,
                'nama' => $request->nama,
                'no_bukti' => $request->no_bukti,
                'deskripsi' => $request->deskripsi,
                'kode_pp' => Session::get('kodePP'),
                'kode_akun' => $request->kode_akun,
                'akun_titip' => $request->akunTitip,
                'kode_curr' => $request->kode_curr,
                'kurs' => $this->joinNum($request->kurs),
                'kurs_closing' => $this->joinNum($request->kurs_closing),
                'akun_tambah' => $request->akun_tambah,
                'akun_dokumen' => $request->akun_dokumen,
                'paket' => $request->paket,
                'tgl_berangkat' => $request->tgl_berangkat,
                'status_bayar' => $request->status_bayar,
                'total_bayar' => $this->joinNum($request->total_bayar),
                'bayar_paket' => $this->joinNum($request->bayar_paket),
                'bayar_tambahan' => $this->joinNum($request->bayar_tambahan),
                'bayar_dok' => $this->joinNum($request->bayar_dok),
                'biaya' => $biaya
            );
    
            $client = new Client();
            $response = $client->request('PUT', config('api.url').'dago-trans/pembayaran',[
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
            $data['message'] = $res;
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $this->validate($request, [
            'no_bukti' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('DELETE', config('api.url').'dago-trans/pembayaran?no_bukti='.$request->no_bukti,[
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    
    }

    public function getJadwal(Request $request)
    {
        $this->validate($request, [
            'no_paket' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/jadwal-detail?no_paket='.$request->no_paket,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_paket' => $request->no_paket
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getBiayaTambahan()
    {
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/biaya-tambahan',[
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
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getBiayaDokumen()
    {
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/biaya-dokumen',[
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
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getPP()
    {
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/pp',[
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
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getHarga(Request $request)
    {
        $this->validate($request, [
            'no_paket' => 'required',
            'jenis_paket' => 'required',
            'jenis' => 'required'
        ]);
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/harga?no_paket='.$request->no_paket.'&jenis_paket='.$request->jenis_paket.'&jenis='.$request->jenis,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_paket' => $request->no_paket,
                    'jenis_paket' => $request->jenis_paket,
                    'jenis' => $request->jenis,
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getQuota(Request $request)
    {
        $this->validate($request, [
            'no_paket' => 'required',
            'jadwal' => 'required',
            'jenis' => 'required'
        ]);
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/quota?no_paket='.$request->no_paket.'&jadwal='.$request->jadwal.'&jenis='.$request->jenis,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_paket' => $request->no_paket,
                    'jadwal' => $request->jadwal,
                    'jenis' => $request->jenis,
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getHargaRoom(Request $request)
    {
        $this->validate($request, [
            'kode_curr' => 'required',
            'type_room' => 'required'
        ]);
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/harga_room?kode_curr='.$request->kode_curr.'&type_room='.$request->type_room,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_curr' => $request->kode_curr,
                    'type_room' => $request->type_room
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getNoMarketing(Request $request)
    {
        $this->validate($request, [
            'no_agen' => 'required'
        ]);
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/no-marketing?no_agen='.$request->no_agen,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_agen' => $request->no_agen
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getPreview(Request $request)
    {
        $this->validate($request, [
            'no_kwitansi' => 'required'
        ]);
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/pembayaran-preview?no_bukti='.$request->no_kwitansi,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_bukti' => $request->no_kwitansi
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
            $data['message'] = $res['message'];
            $data['status'] = "FAILED";
            return response()->json(['data' => $data], 200);
        }
    }

    public function getRekBank(Request $request)
    {
        try{
            $client = new Client();
            if(isset($request->kode_akun)){
               
                $response = $client->request('GET', config('api.url').'dago-trans/pembayaran-rekbank?kode_akun='.$request->kode_akun,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'kode_akun' => $request->kode_akun
                    ]
                ]);
            }else{
                $response = $client->request('GET', config('api.url').'dago-trans/pembayaran-rekbank',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ]
                ]);
            }

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }


}
