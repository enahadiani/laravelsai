<?php

namespace App\Http\Controllers\Apv;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class JuskebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('saku/login')->with('alert','Session telah habis !');
        }
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    function sendNotif($title,$content,$token_player){ 	

        try {

            // $title = "Test SAI";
            // $content = "Notif send from laravelsai";
            // $token_player = array("6681074c-a789-46f5-a278-e1052d592ed1");
            // $title = $title;
            
            $fields = array(
                'app_id' => "5f0781d5-8856-4f3e-a2c7-0f95695def7e", //appid laravelsai
                'include_player_ids' => $token_player,
                'url' => "https://onesignal.com",
                'data' => array(
                    "foo" => "bar"
                ),
                'contents' => array(
                    'en' => $content
                ),
                'headings' => array(
                    'en' => $title
                )
            );
            
            $url = "https://onesignal.com/api/v1/notifications";
            $client = new Client();
            $response = $client->request('POST', $url, [
                'body' => json_encode($fields),
                'headers' => [
                    'Content-Type'     => 'application/json; charset=utf-8',
                    'Authorization' => 'Basic ZmY5ODczYTMtNTgwZS00YmQ4LWFmNTMtMzQxZDY4ODc3MWFh',
                ]
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

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/juskeb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
                if(count($data) > 0){

                    for($i=0;$i<count($data);$i++){
                        if($data[$i]['posisi'] == "Finish Pengadaan"){
                            $color = 'danger';
                        }else{
                            $color = 'success';
                        }
                        if($data[$i]['progress'] == "A" || $data[$i]['progress'] == "3" || $data[$i]['progress'] == "F"){
                            $data[$i]["action"] = "<a href='#' title='Edit' class='badge badge-warning' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>&nbsp; <a href='#' title='History' class='badge badge-$color' id='btn-history'><i class='fas fa-history'></i></a>&nbsp; <a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>";
                        }else{
                            $data[$i]["action"] = "<a href='#' title='History' class='badge badge-$color' id='btn-history'><i class='fas fa-history'></i></a>&nbsp; <a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>";
                        }
                    }
                }
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getJuskebFinish(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/juskeb-finish',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
                if(count($data) > 0){

                    for($i=0;$i<count($data);$i++){
                        if($data[$i]['posisi'] == "Finish Pengadaan"){
                            $color = 'danger';
                        }else{
                            $color = 'success';
                        }
                        if($data[$i]['progress'] == "A" || $data[$i]['progress'] == "3" || $data[$i]['progress'] == "F"){
                            $data[$i]["action"] = "<a href='#' title='Edit' class='badge badge-warning' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>&nbsp; <a href='#' title='History' class='badge badge-$color' id='btn-history'><i class='fas fa-history'></i></a>&nbsp; <a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>";
                        }else{
                            $data[$i]["action"] = "<a href='#' title='History' class='badge badge-$color' id='btn-history'><i class='fas fa-history'></i></a>&nbsp; <a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>";
                        }
                    }
                }
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
            'tanggal' => 'required',
            'no_dokumen' => 'required',
            'kode_pp' => 'required',
            'kode_kota' => 'required',
            'nik_ver' => 'required',
            'waktu' => 'required',
            'kegiatan' => 'required',
            'dasar' => 'required',
            'total' => 'required',
            'barang'=> 'required|array',
            'barang_klp'=> 'required|array',
            'harga'=> 'required|array',
            'qty'=> 'required|array',
            'nilai'=> 'required|array',
            'ppn'=> 'required|array',
            'grand_total'=> 'required|array',
            'nama_dok'=>'array',
            'file_dok.*'=>'file|max:10240'
        ]);
            
        try{
            if(isset($request->kode_divisi)){
                $kode_divisi = $request->kode_divisi;
            }else{
                
                $kode_divisi = '-';
            }
            $fields = [
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal,"/","-"),
                ],
                [
                    'name' => 'no_dokumen',
                    'contents' => $request->no_dokumen,
                ],
                [
                    'name' => 'kode_pp',
                    'contents' => $request->kode_pp,
                ],
                [
                    'name' => 'kode_kota',
                    'contents' => $request->kode_kota,
                ],
                [
                    'name' => 'nik_ver',
                    'contents' => $request->nik_ver,
                ],
                [
                    'name' => 'kode_divisi',
                    'contents' => $kode_divisi,
                ],
                [
                    'name' => 'waktu',
                    'contents' => $this->reverseDate($request->waktu,"/","-"),
                ],
                [
                    'name' => 'kegiatan',
                    'contents' => $request->kegiatan,
                ],
                [
                    'name' => 'dasar',
                    'contents' => $request->dasar,
                ],
                [
                    'name' => 'total_barang',
                    'contents' => $this->joinNum($request->total),
                ]
            ];

            $fields_barang = array();
            $fields_barang_klp = array();
            if(count($request->barang) > 0){

                for($i=0;$i<count($request->barang);$i++){
                    $fields_barang[$i] = array(
                        'name'     => 'barang[]',
                        'contents' => $request->barang[$i],
                    );
                    $fields_barang_klp[$i] = array(
                        'name'     => 'barang_klp[]',
                        'contents' => $request->barang_klp[$i],
                    );
                }
                $send_data = array_merge($fields,$fields_barang);
                $send_data = array_merge($send_data,$fields_barang_klp);
            }else{
                $send_data = $fields;
            }

            $fields_harga = array();
            if(count($request->harga) > 0){

                for($i=0;$i<count($request->harga);$i++){
                    $fields_harga[$i] = array(
                        'name'     => 'harga[]',
                        'contents' => $this->joinNum($request->harga[$i]),
                    );
                }
                $send_data = array_merge($send_data,$fields_harga);
            }

            $fields_qty = array();
            if(count($request->qty) > 0){

                for($i=0;$i<count($request->qty);$i++){
                    $fields_qty[$i] = array(
                        'name'     => 'qty[]',
                        'contents' => $this->joinNum($request->qty[$i]),
                    );
                }
                $send_data = array_merge($send_data,$fields_qty);
            }

            $fields_subtotal = array();
            $fields_ppn = array();
            $fields_grand_total = array();
            if(count($request->nilai) > 0){

                for($i=0;$i<count($request->nilai);$i++){
                    $sub = $this->joinNum($request->nilai[$i]);
                    $fields_subtotal[$i] = array(
                        'name'     => 'subtotal[]',
                        'contents' => $sub,
                    );
                    $ppn = $this->joinNum($request->ppn[$i]);
                    $fields_ppn[$i] = array(
                        'name'     => 'ppn[]',
                        'contents' => $ppn,
                    );
                    $grand = $this->joinNum($request->grand_total[$i]);
                    $fields_grand_total[$i] = array(
                        'name'     => 'grand_total[]',
                        'contents' => $grand,
                    );
                }
                $send_data = array_merge($send_data,$fields_subtotal);
                $send_data = array_merge($send_data,$fields_ppn);
                $send_data = array_merge($send_data,$fields_grand_total);
            }

            $fields_foto = array();
            $fields_nama_file = array();
            
            $cek = $request->file_dok;
            if(!empty($cek)){

                if(count($request->file_dok) > 0){
    
                    for($i=0;$i<count($request->file_dok);$i++){
                        $image_path = $request->file('file_dok')[$i]->getPathname();
                        $image_mime = $request->file('file_dok')[$i]->getmimeType();
                        $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                        $fields_foto[$i] = array(
                            'name'     => 'file[]',
                            'filename' => $image_org,
                            'Mime-Type'=> $image_mime,
                            'contents' => fopen( $image_path, 'r' ),
                        );
                        $nama_file = $request->nama_dok[$i];
                        $fields_nama_file[$i] = array(
                            'name'     => 'nama_file[]',
                            'contents' => $nama_file,
                        );
                    }
                    $send_data = array_merge($send_data,$fields_foto);
                    $send_data = array_merge($send_data,$fields_nama_file);
                }
            }
                
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'apv/juskeb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                if($data['success']['status']){
                    $content = "Pengajuan Justifikasi kebutuhan ".$data['success']['no_aju']."  menunggu verifikasi anda";
                    $title = "Justifikasi kebutuhan [LaravelSAI]";
                    // $notif = $this->sendNotif($title,$content,$data['success']['token_players']);
                    $res = array(
                        'title' => $title,
                        'message' => $content,
                        'id' => $data['success']['nik_ver'],
                        'sts_insert' => 1
                    );
                    $notif = $this->sendPusher($res);
                    if($notif["status"]){
                        $data["success"]["message"] .= " Notif to verifikasi success";
                    }else{
                        $data["success"]["message"] .= " Notif to verifikasi failed";
                    }
                }
                return response()->json(['data' => $data['success']], 200);  
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
            $response = $client->request('GET',  config('api.url').'apv/juskeb/'.$no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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
            'tanggal' => 'required',
            'no_dokumen' => 'required',
            'kode_pp' => 'required',
            'kode_kota' => 'required',
            'nik_ver' => 'required',
            'waktu' => 'required',
            'kegiatan' => 'required',
            'dasar' => 'required',
            'total' => 'required',
            'barang'=> 'required|array',
            'barang_klp'=> 'required|array',
            'harga'=> 'required|array',
            'qty'=> 'required|array',
            'nilai'=> 'required|array',
            'ppn'=> 'required|array',
            'grand_total'=> 'required|array',
            'nama_dok'=>'array',
            'file_dok.*'=>'file|max:10240'
        ]);
            
        try{
            if(isset($request->kode_divisi)){
                $kode_divisi = $request->kode_divisi;
            }else{
                
                $kode_divisi = '-';
            }
            $fields = [
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal,"/","-"),
                ],
                [
                    'name' => 'no_dokumen',
                    'contents' => $request->no_dokumen,
                ],
                [
                    'name' => 'kode_pp',
                    'contents' => $request->kode_pp,
                ],
                [
                    'name' => 'kode_kota',
                    'contents' => $request->kode_kota,
                ],
                [
                    'name' => 'nik_ver',
                    'contents' => $request->nik_ver,
                ],
                [
                    'name' => 'kode_divisi',
                    'contents' => $kode_divisi,
                ],
                [
                    'name' => 'waktu',
                    'contents' => $this->reverseDate($request->waktu,"/","-"),
                ],
                [
                    'name' => 'kegiatan',
                    'contents' => $request->kegiatan,
                ],
                [
                    'name' => 'dasar',
                    'contents' => $request->dasar,
                ],
                [
                    'name' => 'total_barang',
                    'contents' => $this->joinNum($request->total),
                ]
            ];

            $fields_barang = array();
            $fields_barang_klp = array();
            if(count($request->barang) > 0){

                for($i=0;$i<count($request->barang);$i++){
                    $fields_barang[$i] = array(
                        'name'     => 'barang[]',
                        'contents' => $request->barang[$i],
                    );
                    $fields_barang_klp[$i] = array(
                        'name'     => 'barang_klp[]',
                        'contents' => $request->barang_klp[$i],
                    );
                }
                $send_data = array_merge($fields,$fields_barang);
                $send_data = array_merge($send_data,$fields_barang_klp);
            }else{
                $send_data = $fields;
            }

            $fields_harga = array();
            if(count($request->harga) > 0){

                for($i=0;$i<count($request->harga);$i++){
                    $fields_harga[$i] = array(
                        'name'     => 'harga[]',
                        'contents' => $this->joinNum($request->harga[$i]),
                    );
                }
                $send_data = array_merge($send_data,$fields_harga);
            }

            $fields_qty = array();
            if(count($request->qty) > 0){

                for($i=0;$i<count($request->qty);$i++){
                    $fields_qty[$i] = array(
                        'name'     => 'qty[]',
                        'contents' => $this->joinNum($request->qty[$i]),
                    );
                }
                $send_data = array_merge($send_data,$fields_qty);
            }

            $fields_subtotal = array();
            $fields_ppn = array();
            $fields_grand_total = array();
            if(count($request->nilai) > 0){

                for($i=0;$i<count($request->nilai);$i++){
                    $sub = $this->joinNum($request->nilai[$i]);
                    $fields_subtotal[$i] = array(
                        'name'     => 'subtotal[]',
                        'contents' => $sub,
                    );
                    $ppn = $this->joinNum($request->ppn[$i]);
                    $fields_ppn[$i] = array(
                        'name'     => 'ppn[]',
                        'contents' => $ppn,
                    );
                    $grand = $this->joinNum($request->grand_total[$i]);
                    $fields_grand_total[$i] = array(
                        'name'     => 'grand_total[]',
                        'contents' => $grand,
                    );
                }
                $send_data = array_merge($send_data,$fields_subtotal);
                $send_data = array_merge($send_data,$fields_ppn);
                $send_data = array_merge($send_data,$fields_grand_total);
            }

            $fields_foto = array();
            $fields_nama_file = array();
            $fields_nama_file_seb = array();
            $cek = $request->file_dok;
            if(!empty($cek)){

                if(count($request->file_dok) > 0){

                    for($i=0;$i<count($request->nama_dok);$i++){
                        if(isset($request->file('file_dok')[$i])){
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $fields_foto[$i] = array(
                                'name'     => 'file['.$i.']',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' ),
                            );
                        }
                        $nama_file = $request->nama_dok[$i];
                        $fields_nama_file[$i] = array(
                            'name'     => 'nama_file[]',
                            'contents' => $nama_file,
                        );

                        $fields_nama_file_seb[$i] = array(
                            'name'     => 'nama_file_seb[]',
                            'contents' => $request->nama_file[$i],
                        );
                    }
                    $send_data = array_merge($send_data,$fields_foto);
                    $send_data = array_merge($send_data,$fields_nama_file);
                    $send_data = array_merge($send_data,$fields_nama_file_seb);
                }
            }
                
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'apv/juskeb/'.$no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                if($data['success']['status']){
                    $content = "Pengajuan Justifikasi kebutuhan ".$data['success']['no_aju']." menunggu verifikasi anda";
                    $title = "Justifikasi kebutuhan [LaravelSAI]";
                    // $notif = $this->sendNotif($title,$content,$data['success']['token_players']);
                    // if($notif["status"]){
                    //     $data["success"]["message"] .= " Notif success";
                    // }else{
                    //     $data["success"]["message"] .= " Notif failed";
                    // }
                    $res = array(
                        'title' => $title,
                        'message' => $content,
                        'id' => $data['success']['nik_ver'],
                        'sts_insert' => 1
                    );
                    $notif = $this->sendPusher($res);
                    if($notif["status"]){
                        $data["success"]["message"] .= " Notif to verifikasi success";
                    }else{
                        $data["success"]["message"] .= " Notif to verifikasi failed";
                    }
                }
                return response()->json(['data' => $data["success"],"cek"=>empty($cek)], 200);  
                // dump($request->file_dok);
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
            $response = $client->request('DELETE',  config('api.url').'apv/juskeb/'.$no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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

    public function getHistory($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/juskeb_history/'.$no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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
            $response = $client->request('GET',  config('api.url').'apv/juskeb_preview/'.$no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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

    public function getPreview2($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/juskeb_preview2/'.$no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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

    public function getKota(Request $request)
    {
        $this->validate($request,[
            'kode_pp' => 'required'
        ]);
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/kota',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_pp' => $request->kode_pp
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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

    public function getDivisi(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/divisi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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

    public function getNIKVerifikasi(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/nik_verifikasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_pp' => $request->kode_pp
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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

    public function getNIKVerifikasi2(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/nik_verifikasi2',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_kota' => $request->kode_kota
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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

    public function getBarangKlp(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/barang-klp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
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

    public function generateDok(Request $request)
    {
        $this->validate($request,[
            'tanggal' => 'required',
            'kode_pp' => 'required',
            'kode_kota' => 'required'
        ]);
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'apv/generate-dok',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'tanggal' => $this->reverseDate($request->tanggal,"/","-"),
                    'kode_pp' => $request->kode_pp,
                    'kode_kota' => $request->kode_kota
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = $response_data;
            }
            return response()->json(['no_dokumen' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }
}
