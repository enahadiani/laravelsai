<?php

namespace App\Http\Controllers\Sukka;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PengajuanJuskebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('sukka-auth/login')->with('alert','Session telah habis !');
        }
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    function sendPusher($data){ 	
        try {
            
            $fields = array(
                'id' => array($data['id']), 
                'title' => $data['title'],
                'message' => $data['message'],
                'sts_insert' => $data['sts_insert']
            );
            
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'apv/notif-pusher', [
                'headers' => [
                    'Authorization' =>  'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json; charset=utf-8'
                ],
                'body' => json_encode($fields)
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            $result = array('result' => $data, 'status'=>true, 'fields'=>$fields, 'message'=>'Send notif success!');
            return $result;

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result = array('message' => $res, 'status'=>false, 'fields'=> $fields);
            return $result;
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function generateNoBukti(Request $request){
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-nobukti',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>[
                    'tanggal' => $this->reverseDate($request->tanggal,'/','-')
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        } 
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb',[
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
            'tanggal' => 'required|date_format:d/m/Y',
            'periode' => 'required|date_format:Ym',
            'kegiatan' => 'required|max:1000',
            'unit_kerja' => 'required',
            'jenis' => 'required',
            'jenis_rra' => 'required',
            'latar' => 'required|max:1000',
            'aspek' => 'required|max:1000',
            'spesifikasi' => 'required|max:1000',
            'rencana' => 'required|max:1000',
            'lokasi_terima' => 'required',
            'lokasi_beri' => 'required',
            'total_terima' => 'required',
            'total_beri' => 'required',
            'kode_akun' => 'required|array',
            'kode_pp' => 'required|array',
            'kode_drk' => 'required|array',
            'tw' => 'required|array',
            'nilai' => 'required|array',
            'kode_akun_terima' => 'required|array',
            'kode_pp_terima' => 'required|array',
            'kode_drk_terima' => 'required|array',
            'tw_terima' => 'required|array',
            'nilai_terima' => 'required|array',
            'nik' => 'required|array',
            'kode_jab' => 'required|array',
            'kode_role' => 'required|array',
            'email' => 'required|array'
        ]);
            
        try{
            $fields = [
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal,'/','-'),
                ],
                [
                    'name'=>'periode', 
                    'contents'=> $request->input('periode')
                ],
                [
                    'name'=>'kegiatan', 
                    'contents'=> $request->input('kegiatan')
                ],
                [
                    'name'=>'unit_kerja', 
                    'contents'=> $request->input('unit_kerja')
                ],
                [
                    'name'=>'jenis', 
                    'contents'=> $request->input('jenis')
                ],
                [
                    'name'=>'total_terima', 
                    'contents'=> $this->joinNum($request->input('total_terima'))
                ],
                [
                    'name'=>'total_beri', 
                    'contents'=> $this->joinNum($request->input('total_beri'))
                ],
                [
                    'name'=>'jenis_rra', 
                    'contents'=> $request->input('jenis_rra')
                ],
                [
                    'name'=>'latar', 
                    'contents'=> $request->input('latar')
                ],
                [
                    'name'=>'aspek', 
                    'contents'=> $request->input('aspek')
                ],
                [
                    'name'=>'spesifikasi', 
                    'contents'=> $request->input('spesifikasi')
                ],
                [
                    'name'=>'rencana', 
                    'contents'=> $request->input('rencana')
                ],
                [
                    'name' => 'lokasi_beri',
                    'contents' => $request->lokasi_beri,
                ],
                [
                    'name' => 'lokasi_terima',
                    'contents' => $request->lokasi_terima,
                ],
            ];

            $fields_kode_akun = array();
            $fields_kode_pp = array();
            $fields_kode_drk = array();
            $fields_tw = array();
            $fields_nilai = array();
            $send_data = $fields;
            if(count($request->kode_akun) > 0){

                for($i=0;$i<count($request->kode_akun);$i++){
                    $fields_kode_akun[$i] = array(
                        'name'     => 'kode_akun[]',
                        'contents' => $request->kode_akun[$i],
                    );
                    $fields_kode_pp[$i] = array(
                        'name'     => 'kode_pp[]',
                        'contents' => $request->kode_pp[$i],
                    );
                    $fields_kode_drk[$i] = array(
                        'name'     => 'kode_drk[]',
                        'contents' => $request->kode_drk[$i],
                    );
                    $fields_tw[$i] = array(
                        'name'     => 'tw[]',
                        'contents' => $request->tw[$i],
                    );
                    $fields_nilai[$i] = array(
                        'name'     => 'nilai[]',
                        'contents' => $this->joinNum($request->nilai[$i]),
                    );
                }
                $send_data = array_merge($send_data,$fields_kode_akun);
                $send_data = array_merge($send_data,$fields_kode_pp);
                $send_data = array_merge($send_data,$fields_kode_drk);
                $send_data = array_merge($send_data,$fields_tw);
                $send_data = array_merge($send_data,$fields_nilai);
            }
            
            $fields_kode_akun_terima = array();
            $fields_kode_pp_terima = array();
            $fields_kode_drk_terima = array();
            $fields_tw_terima = array();
            $fields_nilai_terima = array();
            if(count($request->kode_akun_terima) > 0){
                for($i=0;$i<count($request->kode_akun_terima);$i++){
                    $fields_kode_akun_terima[$i] = array(
                        'name'     => 'kode_akun_terima[]',
                        'contents' => $request->kode_akun_terima[$i],
                    );
                    $fields_kode_pp_terima[$i] = array(
                        'name'     => 'kode_pp_terima[]',
                        'contents' => $request->kode_pp_terima[$i],
                    );
                    $fields_kode_drk_terima[$i] = array(
                        'name'     => 'kode_drk_terima[]',
                        'contents' => $request->kode_drk_terima[$i],
                    );
                    $fields_tw_terima[$i] = array(
                        'name'     => 'tw_terima[]',
                        'contents' => $request->tw_terima[$i],
                    );
                    $fields_nilai_terima[$i] = array(
                        'name'     => 'nilai_terima[]',
                        'contents' => $this->joinNum($request->nilai_terima[$i]),
                    );
                   
                }
                $send_data = array_merge($send_data,$fields_kode_akun_terima);
                $send_data = array_merge($send_data,$fields_kode_pp_terima);
                $send_data = array_merge($send_data,$fields_kode_drk_terima);
                $send_data = array_merge($send_data,$fields_tw_terima);
                $send_data = array_merge($send_data,$fields_nilai_terima);
            }
            
            $fields_nik = array();
            $fields_kode_role = array();
            $fields_kode_jab = array();
            $fields_email = array();
            if(count($request->nik) > 0){

                for($i=0;$i<count($request->nik);$i++){
                    $fields_nik[$i] = array(
                        'name'     => 'nik[]',
                        'contents' => $request->nik[$i],
                    );
                    $fields_kode_role[$i] = array(
                        'name'     => 'kode_role[]',
                        'contents' => $request->kode_role[$i],
                    );
                    $fields_kode_jab[$i] = array(
                        'name'     => 'kode_jab[]',
                        'contents' => $request->kode_jab[$i],
                    );
                    $fields_email[$i] = array(
                        'name'     => 'email[]',
                        'contents' => $request->email[$i],
                    );
                }
                $send_data = array_merge($send_data,$fields_nik);
                $send_data = array_merge($send_data,$fields_kode_role);
                $send_data = array_merge($send_data,$fields_kode_jab);
                $send_data = array_merge($send_data,$fields_email);
            }

            $fields_foto = array();
            $fields_nama_file_seb = array();
            $fields_jenis = array();
            $fields_nama_dok = array();
            $fields_no_urut = array();
            $cek = $request->file_dok;
            if(!empty($cek)){
                
                if(count($request->file_dok) > 0){
                    
                    for($i=0;$i<count($request->kode_jenis);$i++){
                        if(isset($request->file('file_dok')[$i])){
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $fields_foto[$i] = array(
                                'name'     => 'file_dok['.$i.']',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' ),
                            );
                            
                        }
                        $fields_jenis[$i] = array(
                            'name'     => 'kode_jenis[]',
                            'contents' => $request->kode_jenis[$i],
                        );
                        $fields_nama_dok[$i] = array(
                            'name'     => 'nama_dok[]',
                            'contents' => $request->nama_dok[$i],
                        );
                        $fields_no_urut[$i] = array(
                            'name'     => 'no_urut[]',
                            'contents' => $request->no_urut[$i],
                        );
                        $fields_nama_file_seb[$i] = array(
                            'name'     => 'nama_file_seb[]',
                            'contents' => $request->nama_file[$i],
                        );
                    }
                    $send_data = array_merge($send_data,$fields_foto);
                    $send_data = array_merge($send_data,$fields_nama_file_seb);
                    $send_data = array_merge($send_data,$fields_jenis);
                    $send_data = array_merge($send_data,$fields_no_urut);
                    $send_data = array_merge($send_data,$fields_nama_dok);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sukka-trans/juskeb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                if(isset($data['no_pesan'])){
                    $this->sendNotifApproval($data['no_pesan']);
                }
                return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $no_bukti
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
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function getPreview($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-preview',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $no_bukti
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
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
    public function update(Request $request, $no_bukti)
    {
        $this->validate($request, [
            'tanggal' => 'required|date_format:d/m/Y',
            'periode' => 'required|date_format:Ym',
            'kegiatan' => 'required|max:1000',
            'unit_kerja' => 'required',
            'jenis' => 'required',
            'jenis_rra' => 'required',
            'latar' => 'required|max:1000',
            'aspek' => 'required|max:1000',
            'spesifikasi' => 'required|max:1000',
            'rencana' => 'required|max:1000',
            'lokasi_terima' => 'required',
            'lokasi_beri' => 'required',
            'total_terima' => 'required',
            'total_beri' => 'required',
            'kode_akun' => 'required|array',
            'kode_pp' => 'required|array',
            'kode_drk' => 'required|array',
            'tw' => 'required|array',
            'nilai' => 'required|array',
            'kode_akun_terima' => 'required|array',
            'kode_pp_terima' => 'required|array',
            'kode_drk_terima' => 'required|array',
            'tw_terima' => 'required|array',
            'nilai_terima' => 'required|array',
            'nik' => 'required|array',
            'kode_jab' => 'required|array',
            'kode_role' => 'required|array',
            'email' => 'required|array'
        ]);
            
        try{
            $fields = [
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal,'/','-'),
                ],
                [
                    'name'=>'periode', 
                    'contents'=> $request->input('periode')
                ],
                [
                    'name'=>'kegiatan', 
                    'contents'=> $request->input('kegiatan')
                ],
                [
                    'name'=>'unit_kerja', 
                    'contents'=> $request->input('unit_kerja')
                ],
                [
                    'name'=>'jenis', 
                    'contents'=> $request->input('jenis')
                ],
                [
                    'name'=>'total_terima', 
                    'contents'=> $this->joinNum($request->input('total_terima'))
                ],
                [
                    'name'=>'total_beri', 
                    'contents'=> $this->joinNum($request->input('total_beri'))
                ],
                [
                    'name'=>'jenis_rra', 
                    'contents'=> $request->input('jenis_rra')
                ],
                [
                    'name'=>'latar', 
                    'contents'=> $request->input('latar')
                ],
                [
                    'name'=>'aspek', 
                    'contents'=> $request->input('aspek')
                ],
                [
                    'name'=>'spesifikasi', 
                    'contents'=> $request->input('spesifikasi')
                ],
                [
                    'name'=>'rencana', 
                    'contents'=> $request->input('rencana')
                ],
                [
                    'name' => 'lokasi_beri',
                    'contents' => $request->lokasi_beri,
                ],
                [
                    'name' => 'lokasi_terima',
                    'contents' => $request->lokasi_terima,
                ],
            ];

            $fields_kode_akun = array();
            $fields_kode_pp = array();
            $fields_kode_drk = array();
            $fields_tw = array();
            $fields_nilai = array();
            $send_data = $fields;
            if(count($request->kode_akun) > 0){

                for($i=0;$i<count($request->kode_akun);$i++){
                    $fields_kode_akun[$i] = array(
                        'name'     => 'kode_akun[]',
                        'contents' => $request->kode_akun[$i],
                    );
                    $fields_kode_pp[$i] = array(
                        'name'     => 'kode_pp[]',
                        'contents' => $request->kode_pp[$i],
                    );
                    $fields_kode_drk[$i] = array(
                        'name'     => 'kode_drk[]',
                        'contents' => $request->kode_drk[$i],
                    );
                    $fields_tw[$i] = array(
                        'name'     => 'tw[]',
                        'contents' => $request->tw[$i],
                    );
                    $fields_nilai[$i] = array(
                        'name'     => 'nilai[]',
                        'contents' => $this->joinNum($request->nilai[$i]),
                    );
                }
                $send_data = array_merge($send_data,$fields_kode_akun);
                $send_data = array_merge($send_data,$fields_kode_pp);
                $send_data = array_merge($send_data,$fields_kode_drk);
                $send_data = array_merge($send_data,$fields_tw);
                $send_data = array_merge($send_data,$fields_nilai);
            }
            
            $fields_kode_akun_terima = array();
            $fields_kode_pp_terima = array();
            $fields_kode_drk_terima = array();
            $fields_tw_terima = array();
            $fields_nilai_terima = array();
            if(count($request->kode_akun_terima) > 0){
                for($i=0;$i<count($request->kode_akun_terima);$i++){
                    $fields_kode_akun_terima[$i] = array(
                        'name'     => 'kode_akun_terima[]',
                        'contents' => $request->kode_akun_terima[$i],
                    );
                    $fields_kode_pp_terima[$i] = array(
                        'name'     => 'kode_pp_terima[]',
                        'contents' => $request->kode_pp_terima[$i],
                    );
                    $fields_kode_drk_terima[$i] = array(
                        'name'     => 'kode_drk_terima[]',
                        'contents' => $request->kode_drk_terima[$i],
                    );
                    $fields_tw_terima[$i] = array(
                        'name'     => 'tw_terima[]',
                        'contents' => $request->tw_terima[$i],
                    );
                    $fields_nilai_terima[$i] = array(
                        'name'     => 'nilai_terima[]',
                        'contents' => $this->joinNum($request->nilai_terima[$i]),
                    );
                   
                }
                $send_data = array_merge($send_data,$fields_kode_akun_terima);
                $send_data = array_merge($send_data,$fields_kode_pp_terima);
                $send_data = array_merge($send_data,$fields_kode_drk_terima);
                $send_data = array_merge($send_data,$fields_tw_terima);
                $send_data = array_merge($send_data,$fields_nilai_terima);
            }
            
            $fields_nik = array();
            $fields_kode_role = array();
            $fields_kode_jab = array();
            $fields_email = array();
            if(count($request->nik) > 0){

                for($i=0;$i<count($request->nik);$i++){
                    $fields_nik[$i] = array(
                        'name'     => 'nik[]',
                        'contents' => $request->nik[$i],
                    );
                    $fields_kode_role[$i] = array(
                        'name'     => 'kode_role[]',
                        'contents' => $request->kode_role[$i],
                    );
                    $fields_kode_jab[$i] = array(
                        'name'     => 'kode_jab[]',
                        'contents' => $request->kode_jab[$i],
                    );
                    $fields_email[$i] = array(
                        'name'     => 'email[]',
                        'contents' => $request->email[$i],
                    );
                }
                $send_data = array_merge($send_data,$fields_nik);
                $send_data = array_merge($send_data,$fields_kode_role);
                $send_data = array_merge($send_data,$fields_kode_jab);
                $send_data = array_merge($send_data,$fields_email);
            }

            $fields_foto = array();
            $fields_nama_file_seb = array();
            $fields_jenis = array();
            $fields_nama_dok = array();
            $fields_no_urut = array();
            $cek = $request->file_dok;
            if(!empty($cek)){
                
                if(count($request->file_dok) > 0){
                    
                    for($i=0;$i<count($request->kode_jenis);$i++){
                        if(isset($request->file('file_dok')[$i])){
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $fields_foto[$i] = array(
                                'name'     => 'file_dok['.$i.']',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' ),
                            );
                            
                        }
                        $fields_jenis[$i] = array(
                            'name'     => 'kode_jenis[]',
                            'contents' => $request->kode_jenis[$i],
                        );
                        $fields_nama_dok[$i] = array(
                            'name'     => 'nama_dok[]',
                            'contents' => $request->nama_dok[$i],
                        );
                        $fields_no_urut[$i] = array(
                            'name'     => 'no_urut[]',
                            'contents' => $request->no_urut[$i],
                        );
                        $fields_nama_file_seb[$i] = array(
                            'name'     => 'nama_file_seb[]',
                            'contents' => $request->nama_file[$i],
                        );
                    }
                    $send_data = array_merge($send_data,$fields_foto);
                    $send_data = array_merge($send_data,$fields_nama_file_seb);
                    $send_data = array_merge($send_data,$fields_jenis);
                    $send_data = array_merge($send_data,$fields_no_urut);
                    $send_data = array_merge($send_data,$fields_nama_dok);
                }
            }
                
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sukka-trans/juskeb-ubah',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                if(isset($data['no_pesan'])){
                    $this->sendNotifApproval($data['no_pesan']);
                }
                return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'sukka-trans/juskeb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $no_bukti
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
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function getPP(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-pp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->input()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'status'=>true,'message'=>'Success!'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getJenisDokumen(Request $request){
        try{
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-jenis-dok',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>$request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getAkun(Request $request){
        try{
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-akun',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>$request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getDrk(Request $request){
        try{
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-drk',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>$request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        } 
    }

    public function getDrkPemberi(Request $request){
        try{
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-drk-beri',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>$request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        } 
    }

    public function getLokasi(Request $request){
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-lokasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>$request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        } 
    }

    

    public function getJenis(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-jenis',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->input()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'status'=>true,'message'=>'Success!'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getAppFlow(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sukka-trans/juskeb-app-flow',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nilai' => $this->joinNum($request->input('nilai')),
                    'kode_jenis' => $request->input('kode_jenis'),
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'status'=>true,'message'=>'Success!'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    function sendNotifApproval($no_pesan){ 	
        try {
            
            $fields = array(
                'no_pesan' => $no_pesan,
            );
            
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sukka-auth/notif-approval', [
                'headers' => [
                    'Authorization' =>  'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json; charset=utf-8'
                ],
                'body' => json_encode($fields)
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            $result = array('result' => $data, 'status'=>true, 'fields'=>$fields, 'message'=>'Send notif success!');
            return $result;

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result = array('message' => $res, 'status'=>false, 'fields'=> $fields);
            return $result;
        }

    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'no_pooling' => 'required'
        ]);
        try{
    
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sukka-trans/send-email',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'no_pooling' => $request->no_pooling
                ]
            ]);  
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

}
