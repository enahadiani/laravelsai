<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public $link = 'https://api.simkug.com/api/dago-trans/';
    // public $link2 = 'https://api.simkug.com/api/dago-master/';

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
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
            $response = $client->request('GET', config('api.url').'dago-trans/registrasi',[
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
            'periode2' => 'required',
            'paket' => 'required',
            'tgl_input' => 'required',
            'jadwal' => 'required|integer',
            'no_peserta' => 'required',
            'agen' => 'required',
            'type_room' => 'required',
            'harga_room' => 'required',
            'sumber' => 'required',
            'quota' => 'required',
            'harga_paket' => 'required',
            'ukuran_pakaian' => 'required|in:S,M,XS,L,2L,3L,4L,5L,6L,7L,8L,9L,10L',
            'marketing' => 'required',
            'jenis_promo' => 'required',
            'jenis_paket' => 'required',
            'kode_pp2' => 'required',
            'diskon' => 'required',
            'flag_group' => 'required',
            'brkt_dgn' => 'required',
            'hubungan' => 'required',
            'referal' => 'required',
            'ket_diskon' => 'required',
            'dok_no_dokumen' => 'required|array',
            'dok_deskripsi' => 'required|array',
            'dok_jenis' => 'required|array',
            'btambah_kode_biaya' => 'required|array',
            'btambah_nilai' => 'required|array',
            'btambah_jumlah' => 'required|array',
            'btambah_total' => 'required|array',
            'bdok_kode_biaya' => 'required|array',
            'bdok_nilai' => 'required|array',
            'bdok_jumlah' => 'required|array',
            'bdok_total' => 'required|array'
        ]);
            
        try{
            $dokumen = array();
            if(isset($request->dok_no_dokumen)){
                $no_dokumen = $request->dok_no_dokumen;
                $deskripsi = $request->dok_deskripsi;
                $jenis = $request->dok_jenis;
                for($i=0;$i<count($no_dokumen);$i++){
                    $dokumen[] = array(
                        'no_dokumen' => $no_dokumen[$i],
                        'deskripsi' => $deskripsi[$i],
                        'jenis' => $jenis[$i]
                    );
                }
            }

            $biaya_tambahan = array();
            if(isset($request->btambah_kode_biaya)){
                $kode_biaya = $request->btambah_kode_biaya;
                $nilai = $request->btambah_nilai;
                $jumlah = $request->btambah_jumlah;
                $total = $request->btambah_total;
                for($i=0;$i<count($kode_biaya);$i++){
                    $biaya_tambahan[] = array(
                        'kode_biaya' => $kode_biaya[$i],
                        'nilai' => $this->joinNum($nilai[$i]),
                        'jumlah' => $this->joinNum($jumlah[$i]),
                        'total' => $this->joinNum($total[$i])
                    );
                }
            }

            $biaya_dokumen = array();
            if(isset($request->bdok_kode_biaya)){
                $kode_biaya = $request->bdok_kode_biaya;
                $nilai = $request->bdok_nilai;
                $jumlah = $request->bdok_jumlah;
                $total = $request->bdok_total;
                for($i=0;$i<count($kode_biaya);$i++){
                    $biaya_dokumen[] = array(
                        'kode_biaya' => $kode_biaya[$i],
                        'nilai' => $this->joinNum($nilai[$i]),
                        'jumlah' => $this->joinNum($jumlah[$i]),
                        'total' => $this->joinNum($total[$i])
                    );
                }
            }

            if(isset($request->no_peserta_ref)){
                $no_peserta_ref = $request->no_peserta_ref;
            }else{
                $no_peserta_ref = $request->no_peserta;
            }
            
            $fields = array (
                'periode' => $request->periode2, 
                'tanggal' => $this->reverseDate($request->tgl_input,"/","-"),
                'paket' => $request->paket,
                'jadwal' => $request->jadwal,
                'no_peserta' => $request->no_peserta,
                'no_peserta_ref' => $no_peserta_ref,
                'agen' => $request->agen,
                'type_room' => $request->type_room,
                'harga_room' => $this->joinNum($request->harga_room),
                'sumber' => $request->sumber,
                'quota' => $this->joinNum($request->quota),
                'harga_paket' => $this->joinNum($request->harga_paket),
                'ukuran_pakaian' => $request->ukuran_pakaian,
                'marketing' => $request->marketing,
                'jenis_promo' => $request->jenis_promo,
                'jenis_paket' => $request->jenis_paket,
                'kode_pp' => $request->kode_pp2,
                'diskon' => $this->joinNum($request->diskon),
                'flag_group' => $request->flag_group,
                'berangkat_dengan' => $request->brkt_dgn,
                'hubungan' => $request->hubungan,
                'referal' => $request->referal,
                'ket_diskon' => $request->ket_diskon,
                'dokumen'=>$dokumen,
                'biaya_tambahan'=>$biaya_tambahan,
                'biaya_dokumen'=>$biaya_dokumen
            );
    
            $client = new Client();
            $response = $client->request('POST', config('api.url').'dago-trans/registrasi',[
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
            $data['message'] = $res['message'];
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
            $response = $client->request('GET', config('api.url').'dago-trans/registrasi-detail?no_reg='.$request->no_reg,[
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
    public function edit($id)
    {
        //
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
            'periode2' => 'required',
            'tgl_input' => 'required',
            'no_reg' => 'required',
            'paket' => 'required',
            'jadwal' => 'required|integer',
            'no_peserta' => 'required',
            'agen' => 'required',
            'type_room' => 'required',
            'harga_room' => 'required',
            'sumber' => 'required',
            'quota' => 'required',
            'harga_paket' => 'required',
            'ukuran_pakaian' => 'required|in:S,M,XS,L,2L,3L,4L,5L,6L,7L,8L,9L,10L',
            'marketing' => 'required',
            'jenis_promo' => 'required',
            'jenis_paket' => 'required',
            'kode_pp2' => 'required',
            'diskon' => 'required',
            'flag_group' => 'required',
            'brkt_dgn' => 'required',
            'hubungan' => 'required',
            'referal' => 'required',
            'ket_diskon' => 'required',
            'dok_no_dokumen' => 'required|array',
            'dok_deskripsi' => 'required|array',
            'dok_jenis' => 'required|array',
            'btambah_kode_biaya' => 'required|array',
            'btambah_nilai' => 'required|array',
            'btambah_jumlah' => 'required|array',
            'btambah_total' => 'required|array',
            'bdok_kode_biaya' => 'required|array',
            'bdok_nilai' => 'required|array',
            'bdok_jumlah' => 'required|array',
            'bdok_total' => 'required|array'
        ]);

        try{

            $dokumen = array();
            if(isset($request->dok_no_dokumen)){
                $no_dokumen = $request->dok_no_dokumen;
                $deskripsi = $request->dok_deskripsi;
                $jenis = $request->dok_jenis;
                for($i=0;$i<count($no_dokumen);$i++){
                    $dokumen[] = array(
                        'no_dokumen' => $no_dokumen[$i],
                        'deskripsi' => $deskripsi[$i],
                        'jenis' => $jenis[$i]
                    );
                }
            }

            $biaya_tambahan = array();
            if(isset($request->btambah_kode_biaya)){
                $kode_biaya = $request->btambah_kode_biaya;
                $nilai = $request->btambah_nilai;
                $jumlah = $request->btambah_jumlah;
                $total = $request->btambah_total;
                for($i=0;$i<count($kode_biaya);$i++){
                    $biaya_tambahan[] = array(
                        'kode_biaya' => $kode_biaya[$i],
                        'nilai' => $this->joinNum($nilai[$i]),
                        'jumlah' => $this->joinNum($jumlah[$i]),
                        'total' => $this->joinNum($total[$i])
                    );
                }
            }

            $biaya_dokumen = array();
            if(isset($request->bdok_kode_biaya)){
                $kode_biaya = $request->bdok_kode_biaya;
                $nilai = $request->bdok_nilai;
                $jumlah = $request->bdok_jumlah;
                $total = $request->bdok_total;
                for($i=0;$i<count($kode_biaya);$i++){
                    $biaya_dokumen[] = array(
                        'kode_biaya' => $kode_biaya[$i],
                        'nilai' => $this->joinNum($nilai[$i]),
                        'jumlah' => $this->joinNum($jumlah[$i]),
                        'total' => $this->joinNum($total[$i])
                    );
                }
            }

            $fields = array (
                'periode' => $request->periode2,
                'tanggal' => $this->reverseDate($request->tgl_input,"/","-"),
                'no_reg' => $request->no_reg,
                'paket' => $request->paket,
                'jadwal' => $request->jadwal,
                'no_peserta' => $request->no_peserta,
                'no_peserta_ref' => $request->no_peserta_ref,
                'agen' => $request->agen,
                'type_room' => $request->type_room,
                'harga_room' => $this->joinNum($request->harga_room),
                'sumber' => $request->sumber,
                'quota' => $this->joinNum($request->quota),
                'harga_paket' => $this->joinNum($request->harga_paket),
                'ukuran_pakaian' => $request->ukuran_pakaian,
                'marketing' => $request->marketing,
                'jenis_promo' => $request->jenis_promo,
                'jenis_paket' => $request->jenis_paket,
                'kode_pp' => $request->kode_pp2,
                'diskon' => $this->joinNum($request->diskon),
                'flag_group' => $request->flag_group,
                'berangkat_dengan' => $request->brkt_dgn,
                'hubungan' => $request->hubungan,
                'referal' => $request->referal,
                'ket_diskon' => $request->ket_diskon,
                'dokumen'=>$dokumen,
                'biaya_tambahan'=>$biaya_tambahan,
                'biaya_dokumen'=>$biaya_dokumen
            );

            $client = new Client();
            $response = $client->request('PUT', config('api.url').'dago-trans/registrasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $this->validate($request, [
            'no_reg' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('DELETE', config('api.url').'dago-trans/registrasi?no_reg='.$request->no_reg,[
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

    public function getJadwal(Request $request)
    {
        $this->validate($request, [
            'no_paket' => 'required'
        ]);
        try {
            $client = new Client();
            if(isset($request->no_jadwal)){
               
                $response = $client->request('GET', config('api.url').'dago-trans/jadwal-detail?no_paket='.$request->no_paket.'&no_jadwal='.$request->no_jadwal,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_paket' => $request->no_paket,
                        'no_jadwal' => $request->no_jadwal
                    ]
                ]);
            }else{
                $response = $client->request('GET', config('api.url').'dago-trans/jadwal-detail?no_paket='.$request->no_paket,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_paket' => $request->no_paket
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function getJadwal2(Request $request)
    {
        $this->validate($request, [
            'no_paket' => 'required'
        ]);
        try {
            $client = new Client();
            if(isset($request->no_jadwal)){
               
                $response = $client->request('GET', config('api.url').'dago-trans/jadwal-detail2?no_paket='.$request->no_paket.'&no_jadwal='.$request->no_jadwal,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_paket' => $request->no_paket,
                        'no_jadwal' => $request->no_jadwal
                    ]
                ]);
            }else{
                $response = $client->request('GET', config('api.url').'dago-trans/jadwal-detail2?no_paket='.$request->no_paket,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_paket' => $request->no_paket
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function getPaket($no_paket)
    {
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-master/'.'paket?no_paket='.$no_paket,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_paket' => $no_paket
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
            return response()->json(['message' => $res, 'status'=>false], 200);
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

    public function getPP(Request $request){
        try {
            $client = new Client();
            if(isset($request->kode_pp)){
               
                $response = $client->request('GET', config('api.url').'dago-trans/pp?kode_pp='.$request->kode_pp,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'kode_pp' => $request->kode_pp
                    ]
                ]);
            }else{
                $response = $client->request('GET', config('api.url').'dago-trans/pp',[
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
            $response = $client->request('GET', config('api.url').'dago-trans/harga-room?kode_curr='.$request->kode_curr.'&type_room='.$request->type_room,[
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
            $data['message'] = $res["message"];
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
            'no_reg' => 'required'
        ]);
        try{
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dago-trans/registrasi-preview?no_reg='.$request->no_reg,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
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


}
