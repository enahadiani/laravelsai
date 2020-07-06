<?php

namespace App\Http\Controllers\Dago;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PembayaranGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/dago-trans/';

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
            $response = $client->request('GET', $this->link.'pembayaran-group',[
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function getRegistrasi(Request $request){
        $this->validate($request,[
            'tanggal' => 'required',
            'no_agen' => 'required',
            'no_peserta' =>'required',
            'no_paket' =>'required',
            'no_jadwal' =>'required',
            'no_bukti' => 'required'
        ]);
        try {
            $client = new Client();
            $response = $client->request('GET', $this->link.'pembayaran-group-reg',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'tanggal' => $request->tanggal,
                    'no_agen' => $request->no_agen,
                    'no_peserta' =>$request->no_peserta,
                    'no_paket' =>$request->no_paket,
                    'no_jadwal' =>$request->no_jadwal,
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

    
    public function getDetailBiaya(Request $request){
        $this->validate($request,[
            'no_reg' => 'required',
            'no_bukti' => 'required'
        ]);
        try {
            $client = new Client();
            $response = $client->request('GET', $this->link.'pembayaran-group-det',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_reg' => $request->no_reg,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpanDetTmp(Request $request)
    {
        $this->validate($request, [
            'no_bukti' => 'required',
            'modal_no_reg' => 'required',
            'kode_biaya' => 'required|array',
            'kode_akunbiaya' => 'required|array',
            'jenis_biaya' => 'required|array',
            'nbiaya_bayar' => 'required|array'
        ]);
            
        try{

            $ar_nilai = array();
            if(isset($request->nbiaya_bayar)){
                $bayar = $request->nbiaya_bayar;
                for($i=0;$i<count($bayar);$i++){
                    $ar_nilai[] = $this->joinNum($bayar[$i]);
                }
            }

            $fields = array (
                'no_bukti' => $request->no_bukti,
                'no_reg' => $request->modal_no_reg,
                'kode_biaya' => $request->kode_biaya,
                'kode_akunbiaya' => $request->kode_akunbiaya,
                'jenis_biaya' => $request->jenis_biaya,
                'nilai' => $ar_nilai,
                'nik_user' => Session::get('nikUser')
            );
    
            $client = new Client();
            $response = $client->request('POST', $this->link.'pembayaran-group-det',[
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

    public function simpanDetTmp2(Request $request)
    {
        $this->validate($request, [
            'no_bukti' => 'required',
            'no_reg' => 'required|array',
            'saldo_paket' => 'required|array',
            'saldo_tambahan' => 'required|array',
            'saldo_dokumen' => 'required|array',
            'kode_biaya' => 'required',
            'kode_akunbiaya' => 'required',
            'jenis_biaya' => 'required',
            'nbiaya_bayar' => 'required'
        ]);
            
        try{

            $ar_saldo_paket = array();
            $ar_saldo_tambahan = array();
            $ar_saldo_dokumen = array();
            if(isset($request->nbiaya_bayar)){
                $p = $request->saldo_paket;
                $t = $request->saldo_tambahan;
                $d = $request->saldo_dokumen;
                for($i=0;$i<count($p);$i++){
                    $ar_saldo_paket[] = $this->joinNum($p[$i]);
                    $ar_saldo_tambahan[] = $this->joinNum($t[$i]);
                    $ar_saldo_dokumen[] = $this->joinNum($d[$i]);
                }
            }

            $fields = array (
                'no_bukti' => $request->no_bukti,
                'no_reg' => $request->no_reg,
                'saldo_paket' => $ar_saldo_paket,
                'saldo_tambahan' => $ar_saldo_tambahan,
                'saldo_dokumen' => $ar_saldo_dokumen,
                'kode_biaya' => $request->kode_biaya,
                'kode_akunbiaya' => $request->kode_akunbiaya,
                'jenis_biaya' => $request->jenis_biaya,
                'nilai' => $this->joinNum($request->nbiaya_bayar),
                'nik_user' => Session::get('nikUser')
            );
    
            $client = new Client();
            $response = $client->request('POST', $this->link.'pembayaran-group-det2',[
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'kode_akun' => 'required',
            'kode_curr' => 'required',
            'kurs' => 'required',
            'agen' => 'required',
            'status_bayar' => 'required|in:TUNAI,TRANSFER',
            'total_bayar' => 'required',
            'bayar_paket' => 'required',
            'bayar_tambahan' => 'required',
            'bayar_dok' => 'required',
            'no_bukti' => 'required',
            'no_reg' => 'required|array',
            'nama' => 'required|array',
            'no_paket' => 'required|array',
            'akun_titip' => 'required|array',
            'tgl_berangkat' => 'required|array',
            'nilai_paket' => 'required|array',
            'nilai_tambahan' => 'required|array',
            'nilai_dok' => 'required|array',
            'kurs_closing' => 'required|array',
            'no_closing' => 'required|array',
        ]);
            
        try{
            $npaket = array();
            $ntambah = array();
            $ndok = array();
            $nkurs = array();
            $ntgl = array();
            if(isset($request->nilai_paket)){
                $nilai_paket = $request->nilai_paket;
                $nilai_dok = $request->nilai_dok;
                $nilai_tambahan = $request->nilai_tambahan;
                $kurs_closing = $request->kurs_closing;
                for($i=0;$i<count($nilai_paket);$i++){
                    $npaket[] = $this->joinNum($nilai_paket[$i]);
                    $ntambah[] = $this->joinNum($nilai_tambahan[$i]);
                    $ndok[] = $this->joinNum($nilai_dok[$i]);
                    $nkurs[] = $this->joinNum($kurs_closing[$i]);
                    $ntgl[]= $this->reverseDate($request->tgl_berangkat[$i],"/","-");
                }
            }

            $fields = array (
                'tanggal' => $this->reverseDate($request->tanggal,"-","-"),
                'deskripsi' => $request->deskripsi,
                'kode_pp' => Session::get('kodePP'),
                'kode_akun' => $request->kode_akun,
                'kode_curr' => $request->kode_curr,
                'kurs' => $this->joinNum($request->kurs),
                'no_agen' => $request->agen,
                'status_bayar' => $request->status_bayar,
                'total_bayar' => $this->joinNum($request->total_bayar),
                'bayar_paket' => $this->joinNum($request->bayar_paket),
                'bayar_tambahan' => $this->joinNum($request->bayar_tambahan),
                'bayar_dok' => $this->joinNum($request->bayar_dok),
                'nik_user' => Session::get('nikUser'),
                'no_bukti' => $request->no_bukti,
                'no_reg' => $request->no_reg,
                'nama' => $request->nama,
                'paket' => $request->no_paket,
                'akun_titip' => $request->akun_titip,
                'tgl_berangkat' => $ntgl,
                'nilai_paket' => $npaket,
                'nilai_tambahan' => $ntambah,
                'nilai_dok' => $ndok,
                'kurs_closing' => $nkurs,
                'no_closing' => $request->no_closing
            );
    
            $client = new Client();
            $response = $client->request('POST', $this->link.'pembayaran-group',[
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
            $response = $client->request('GET', $this->link.'pembayaran-detail?no_reg='.$request->no_reg,[
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
            $response = $client->request('GET', $this->link.'pembayaran-edit?no_reg='.$request->no_reg.'&no_bukti='.$request->no_kwitansi,[
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
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'kode_akun' => 'required',
            'kode_curr' => 'required',
            'kurs' => 'required',
            'agen' => 'required',
            'status_bayar' => 'required|in:TUNAI,TRANSFER',
            'total_bayar' => 'required',
            'bayar_paket' => 'required',
            'bayar_tambahan' => 'required',
            'bayar_dok' => 'required',
            'no_bukti' => 'required',
            'no_reg' => 'required|array',
            'nama' => 'required|array',
            'no_paket' => 'required|array',
            'akun_titip' => 'required|array',
            'tgl_berangkat' => 'required|array',
            'nilai_paket' => 'required|array',
            'nilai_tambahan' => 'required|array',
            'nilai_dok' => 'required|array',
            'kurs_closing' => 'required|array',
            'no_closing' => 'required|array',
        ]);
            
        try{
            $npaket = array();
            $ntambah = array();
            $ndok = array();
            $nkurs = array();
            $ntgl = array();
            if(isset($request->nilai_paket)){
                $nilai_paket = $request->nilai_paket;
                $nilai_dok = $request->nilai_dok;
                $nilai_tambahan = $request->nilai_tambahan;
                $kurs_closing = $request->kurs_closing;
                for($i=0;$i<count($nilai_paket);$i++){
                    $npaket[] = $this->joinNum($nilai_paket[$i]);
                    $ntambah[] = $this->joinNum($nilai_tambahan[$i]);
                    $ndok[] = $this->joinNum($nilai_dok[$i]);
                    $nkurs[] = $this->joinNum($kurs_closing[$i]);
                    $ntgl[]= $this->reverseDate($request->tgl_berangkat[$i],"/","-");
                }
            }

            $fields = array (
                'tanggal' => $this->reverseDate($request->tanggal,"-","-"),
                'deskripsi' => $request->deskripsi,
                'kode_pp' => Session::get('kodePP'),
                'kode_akun' => $request->kode_akun,
                'kode_curr' => $request->kode_curr,
                'no_agen' => $request->agen,
                'kurs' => $this->joinNum($request->kurs),
                'status_bayar' => $request->status_bayar,
                'total_bayar' => $this->joinNum($request->total_bayar),
                'bayar_paket' => $this->joinNum($request->bayar_paket),
                'bayar_tambahan' => $this->joinNum($request->bayar_tambahan),
                'bayar_dok' => $this->joinNum($request->bayar_dok),
                'nik_user' => Session::get('nikUser'),
                'no_bukti' => $request->no_bukti,
                'no_reg' => $request->no_reg,
                'nama' => $request->nama,
                'paket' => $request->no_paket,
                'akun_titip' => $request->akun_titip,
                'tgl_berangkat' => $ntgl,
                'nilai_paket' => $npaket,
                'nilai_tambahan' => $ntambah,
                'nilai_dok' => $ndok,
                'kurs_closing' => $nkurs,
                'no_closing' => $request->no_closing
            );
    
            $client = new Client();
            $response = $client->request('PUT', $this->link.'pembayaran-group',[
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
            $response = $client->request('DELETE', $this->link.'pembayaran-group?no_bukti='.$request->no_bukti,[
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

    public function destroyDetTmp(Request $request)
    {

        $this->validate($request, [
            'no_bukti' => 'required'
        ]);

        try{
            $client = new Client();
            $response = $client->request('DELETE', $this->link.'pembayaran-group-det',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->no_bukti,
                    'nik_user' => Session::get('nikUser'),
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
            $data['message'] = $res;
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
            $response = $client->request('GET', $this->link.'jadwal-detail?no_paket='.$request->no_paket,[
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
            $response = $client->request('GET', $this->link.'biaya-tambahan',[
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
            $response = $client->request('GET', $this->link.'biaya-dokumen',[
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
            $response = $client->request('GET', $this->link.'pp',[
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
            $response = $client->request('GET', $this->link.'harga?no_paket='.$request->no_paket.'&jenis_paket='.$request->jenis_paket.'&jenis='.$request->jenis,[
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
            $response = $client->request('GET', $this->link.'quota?no_paket='.$request->no_paket.'&jadwal='.$request->jadwal.'&jenis='.$request->jenis,[
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
            $response = $client->request('GET', $this->link.'harga_room?kode_curr='.$request->kode_curr.'&type_room='.$request->type_room,[
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
            $response = $client->request('GET', $this->link.'no-marketing?no_agen='.$request->no_agen,[
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
            $response = $client->request('GET', $this->link.'pembayaran-preview?no_bukti='.$request->no_kwitansi,[
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
               
                $response = $client->request('GET', $this->link.'pembayaran-rekbank?kode_akun='.$request->kode_akun,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'kode_akun' => $request->kode_akun
                    ]
                ]);
            }else{
                $response = $client->request('GET', $this->link.'pembayaran-rekbank',[
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

    public function getNoBukti(Request $request){
        $this->validate($request,[
            'tanggal' => 'required'
        ]);
        try {
            $client = new Client();
            $response = $client->request('GET', $this->link.'pembayaran-group-nobukti',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'tanggal' => $this->reverseDate($request->tanggal,"-","-")
                ]

            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["no_bukti"];
            }
            return response()->json(['no_bukti' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }


}
