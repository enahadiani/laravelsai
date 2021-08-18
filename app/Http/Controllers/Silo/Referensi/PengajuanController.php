<?php

namespace App\Http\Controllers\Rkap;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('rkap-auth/login');
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
            $response = $client->request('POST',  config('api.url').'rkap-auth/notif-pusher', [
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
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
                if(count($data) > 0){

                    for($i=0;$i<count($data);$i++){
                        $color = 'success';
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

    public function getDataPerbaikan(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-perbaikan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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

    public function getDraft(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-draft',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
                if(count($data) > 0){

                    for($i=0;$i<count($data);$i++){
                        $color = 'success';
                        if($data[$i]['progress'] == "A" || $data[$i]['progress'] == "3" || $data[$i]['progress'] == "F"){
                            $data[$i]["action"] = "<a href='#' title='Edit' class='badge badge-warning' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>&nbsp; <a href='#' title='Preview' class='badge badge-info' id='btn-print'><i class='fas fa-print'></i></a>";
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

    public function getSedang(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-sedang',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
                if(count($data) > 0){

                    for($i=0;$i<count($data);$i++){
                        $color = 'success';
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

    public function getSelesai(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-selesai',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
                if(count($data) > 0){

                    for($i=0;$i<count($data);$i++){
                        $color = 'success';
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

    public function getFinish(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-finish',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
                if(count($data) > 0){

                    for($i=0;$i<count($data);$i++){
                        
                        $color = 'success';
                        $data[$i]["action"] = "<a href='#' title='Preview' id='btn-print' style='font-size:18px'><i class='simple-icon-printer'></i></a>";
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

    public function cekAksesForm(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/cek-akses-form',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
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

    public function getDataBox(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-box',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            
            'deskripsi' => 'required',
            'komentar' => 'required',
            'nama'=> 'required|array',
            'dam'=> 'required|array',
            'nama_dok'=>'array',
            'flag_draft' => 'required',
            'file_dok.*'=>'file|max:10240'
        ]);
            
        try{
            $fields = [
               
                [
                    'name' => 'kode_pp',
                    'contents' => Session::get('kodePP'),
                ],
                [
                    'name' => 'komentar',
                    'contents' => $request->komentar,
                ],
                [
                    'name' => 'keterangan',
                    'contents' => $request->deskripsi,
                ],
                [
                    'name' => 'flag_draft',
                    'contents' => $request->flag_draft,
                ]
            ];

            $fields_nama = array();
            $fields_dam = array();
            if(count($request->nama) > 0){

                for($i=0;$i<count($request->nama);$i++){
                    $fields_nama[$i] = array(
                        'name'     => 'nama[]',
                        'contents' => $request->nama[$i],
                    );
                    
                    $fields_dam[$i] = array(
                        'name'     => 'dam[]',
                        'contents' => $request->dam[$i],
                    );
                }
                $send_data = array_merge($fields,$fields_nama);
                $send_data = array_merge($send_data,$fields_dam);
            }else{
                $send_data = $fields;
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
            $response = $client->request('POST',  config('api.url').'rkap-trans/aju',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                if($data['status']){
                    $content = "Pengajuan ".$data['no_aju']."  menunggu approval anda";
                    $title = "Pengajuan";
                    $res = array(
                        'title' => $title,
                        'message' => $content,
                        'id' => $data['nik_app'],
                        'sts_insert' => 1
                    );
                    $notif = $this->sendPusher($res);
                    if($notif["status"]){
                        $data["message"] .= " Notif success";
                    }else{
                        $data["message"] .= " Notif failed";
                    }
                }
                return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
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
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-detail',[
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
            'no_bukti' => 'required',
            'deskripsi' => 'required',
            'komentar' => 'required',
            'nama'=> 'required|array',
            'dam'=> 'required|array',
            'nama_dok'=>'array',
            'flag_draft' => 'required',
            'file_dok.*'=>'file|max:10240'
        ]);
            
        try{
            $fields = [
               
                [
                    'name' => 'no_bukti',
                    'contents' => $no_bukti,
                ],
               
                [
                    'name' => 'kode_pp',
                    'contents' => Session::get('kodePP'),
                ],
                [
                    'name' => 'komentar',
                    'contents' => $request->komentar,
                ],
                [
                    'name' => 'keterangan',
                    'contents' => $request->deskripsi,
                ],
                [
                    'name' => 'flag_draft',
                    'contents' => $request->flag_draft,
                ]
            ];

            $fields_nama = array();
            $fields_dam = array();
            if(count($request->nama) > 0){

                for($i=0;$i<count($request->nama);$i++){
                    $fields_nama[$i] = array(
                        'name'     => 'nama[]',
                        'contents' => $request->nama[$i],
                    );
                    $fields_dam[$i] = array(
                        'name'     => 'dam[]',
                        'contents' => $request->dam[$i],
                    );
                    
                }
                $send_data = array_merge($fields,$fields_nama);
                $send_data = array_merge($send_data,$fields_dam);
            }else{
                $send_data = $fields;
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
            $response = $client->request('POST',  config('api.url').'rkap-trans/aju-edit',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                if($data['status']){
                    $content = "Pengajuan ".$data['no_aju']." menunggu approval anda";
                    $title = "Pengajuan";
                    $res = array(
                        'title' => $title,
                        'message' => $content,
                        'id' => $data['nik_app'],
                        'sts_insert' => 1
                    );
                    $notif = $this->sendPusher($res);
                    if($notif["status"]){
                        $data["message"] .= " Notif success";
                    }else{
                        $data["message"] .= " Notif failed";
                        $data["error"] = $notif;
                    }
                }
                return response()->json(['data' => $data,"cek"=>empty($cek)], 200);  
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
            $response = $client->request('DELETE',  config('api.url').'rkap-trans/aju',[
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
            $data['message'] = config('api.url').'rkap-trans/aju/'.$no_bukti;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    
    }

    public function getHistory(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-history',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getHistoryHis(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-history-his',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getPreview(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-preview',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getPreviewHis(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-preview-his',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getPreview2($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju_preview2/'.$no_bukti,[
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
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function getDAM(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-dam',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'status' => true], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['daftar'] = [];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getPP(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-pp',[
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
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function getRKM(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'rkap-trans/aju-rkm',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'status' => true], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['daftar'] = [];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    

    public function sendNotifikasi(Request $request)
    {
        $this->validate($request, [
            'no_pooling' => 'required'
        ]);
        try{
    
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'rkap-trans/aju-notifikasi',[
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
