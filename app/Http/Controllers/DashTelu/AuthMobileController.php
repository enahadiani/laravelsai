<?php 

    namespace App\Http\Controllers\DashTelu;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class AuthMobileController extends Controller {

        
        public function index()
        {
            if(!Session::get('login')){
                return redirect('mobile-dash/login');
            }
            else{
                return view('mobile-dash.main');
            }            
        }

        
        public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
            $arr = explode($org_sep, $ymd_or_dmy_date);
            return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
        }

        public function cekLengthMenu($nama){
            if(strlen($nama) > 23){
                $str_nama = explode(" ",$nama);
                $tmp_nama = "";
                if(count($str_nama) > 0){
                    for($n=0;$n < count($str_nama);$n++){
                        if($n == count($str_nama) - 1){
                            $tmp_nama .= "<br/>".$str_nama[$n]; 
                        }else{
                            $tmp_nama .= $str_nama[$n]." "; 
                        }
                    }
                }
                $nama = $tmp_nama;
            }else{
                $nama = $nama;
            }

            return $nama;
        }

        public function cek_session()
        {
            if(!Session::get('login')){
                return response()->json(['status'=>false], 200);
            }
            else{
                return response()->json(['status'=>true], 200);
            }
            
        }
        
        public function login()
        {
            return view('mobile-dash.login');
        }

        public function cek_auth(Request $request)
        {
            try {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'ypt-auth/login',[
                    'form_params' => [
                        'nik' => $request->input('nik'),
                        'password' => $request->input('password')
                    ]
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $data = json_decode($response_data,true);
                    if($data["message"] == "success"){
                        Session::put('token',$data["token"]);
                        Session::put('login',TRUE);
                        $response2 = $client->request('GET',  config('api.url').'ypt-auth/profile',[
                            'headers' => [
                                'Authorization' => 'Bearer '.$data["token"],
                                'Accept'     => 'application/json',
                            ]
                        ]);
                
                        if ($response2->getStatusCode() == 200) { // 200 OK
                            $response_data2 = $response2->getBody()->getContents();
                            
                            $data2 = json_decode($response_data2,true);
                            $res = $data2['user'];
                            if(count($res) > 0){
                                Session::put('isLoggedIn',TRUE);
                                Session::put('menu','menu-hidden');
                                Session::put('kodeMenu',$res[0]["kode_klp_menu"]);
                                Session::put('userLog',$res[0]["nik"]);
                                Session::put('namaUser',$res[0]["nama"]);
                                Session::put('statusAdmin',$res[0]["status_admin"]);
                                Session::put('lokasi',$res[0]["kode_lokasi"]);
                                Session::put('namaLokasi',$res[0]["nmlok"]);
                                Session::put('kodePP',$res[0]["kode_pp"]);
                                Session::put('namaPP',$res[0]["nama_pp"]);
                                Session::put('foto',$res[0]["foto"]);
                                Session::put('logo',$res[0]["logo"]);
                                Session::put('jabatan',$res[0]["jabatan"]);
                                Session::put('periode',$data2["periode"][0]["periode"]);
                                Session::put('nikUser',$res[0]["nik"].'_'.time());
                                // Session::put('periode','201905');
                                
                                $tmp = explode("_",$res[0]["path_view"]);
                                if(isset($tmp[2])){
                                    
                                    $dash = $tmp[2];
                                }else{
                                    $dash = "-";
                                }

                                Session::put('dash',$dash);
                                Session::put('kode_fs',(isset($data2["kode_fs"][0]["kode_fs"]) ? $data2["kode_fs"][0]["kode_fs"] : ""));
                                Session::put('kode_ta',(isset($data2["kode_ta"][0]["kode_ta"]) ? $data2["kode_ta"][0]["kode_ta"] : ""));
                            }
                        }
                        
                        return redirect('mobile-dash/');
                        // var_dump('Sukses');
                    }else{
                        return redirect('mobile-dash/login')->with('alert','Password atau NIK, Salah !');
                    }
                
                }else if($response->getStatusCode() == 401){
                    return redirect('mobile-dash/login')->with('alert','Password atau NIK, Salah !');
                }

            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                if($response->getStatusCode() == 401){
                    $message = "Username dan/atau password kamu salah, silahkan periksa dan ulangi lagi.";
                }else{
                    $message = $res["message"];
                }
                return redirect('mobile-dash/login')->with('alert',$message);
            }
        
        }

        public function logout()
        {
            Session::flush();
            return redirect('mobile-dash/login')->with('status','logout');
        }

        public function getMenu(){
            try {
                $client = new Client();
                $kodemenu = Session::get('kodeMenu');
                $response = $client->request('GET',  config('api.url').'ypt-auth/menu/'.$kodemenu,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                        ]
                ]);
        
                $hasil = "";
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $main_menu = $data['success']['data'];
                    $main = "";
                    if(count($main_menu) > 0){
                        for($i=0; $i<count($main_menu); $i++){
                            $forms = str_replace("_","/", $main_menu[$i]['form']);
                            $this_lv = $main_menu[$i]['level_menu']; 
                            $nama = $main_menu[$i]['nama'];
                            $forms = explode("/",$forms);
                            if(ISSET($forms[2])){
                                $this_link = $forms[2];
                            }else{
                                $this_link = "";
                            }
                            
                            if($this_lv == 1){
                                
                                $main .=" 
                                <li class='list-group-item mb-2'>
                                    <a href='#' data-href='".$this_link."' class='a_link'>
                                        <span class='border-rounded-grey mr-2'><i class='".$main_menu[$i]['icon']." text-blue'></i></span> <span class='d-inline-block nama'>".$main_menu[$i]['nama']."</span>
                                    </a>
                                </li>";
                            }
                        }
                    }
                    $success['status'] = true;
                    $success['html'] = $main;
                
                }else{
                    $success['status-code'] = $response->getStatusCode();
                    $success['status'] = false;
                    $success['html'] = "" ;
                }                
                return response()->json([$success], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], $response->getStatusCode());
            }     
        }
    
        public function getProfile(){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'ypt-auth/profile',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data["user"];
                }
                return response()->json(['data' => $data, 'status'=>true], 200); 
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }

        public function getMatpel(Request $request){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'mobile-dash/mata-pelajaran',[
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
                return response()->json($data["success"], 200); 
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }

        public function getMatpelDetail(Request $request){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'mobile-dash/mata-pelajaran-detail',[
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
                return response()->json($data["success"], 200); 
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }

        public function getProfileSiswa(Request $request){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'mobile-dash/profile-siswa',[
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
    
        public function updatePassword(Request $request){
            $this->validate($request,[
                'password_lama' => 'required',
                'password_baru' => 'required|required_with:password_confirm|same:password_confirm',
            ]);
            try {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'ypt-auth/update-password',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'password_lama' => $request->password_lama,
                        'password_baru' => $request->password_baru,
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
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }
    
        public function updatePhoto(Request $request){
            $this->validate($request,[
                'foto' => 'required|image|mimes:jpeg,png,jpg'
            ]);
            try {
    
                if($request->hasfile('foto')){
    
                    $image_path = $request->file('foto')->getPathname();
                    $image_mime = $request->file('foto')->getmimeType();
                    $image_org  = $request->file('foto')->getClientOriginalName();
                    $fields = [
                        [
                            'name'     => 'foto',
                            'filename' => $image_org,
                            'Mime-Type'=> $image_mime,
                            'contents' => fopen( $image_path, 'r' ),
                        ]
                    ];
                    
                }
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'ypt-auth/update-foto',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $fields
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data;
                    if($data["status"]){
                        Session::put('foto',$data["foto"]);
                    }
                }
                return response()->json(['data' => $data, 'status'=>true], 200); 
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }
    
        public function updateBackground(Request $request){
            $this->validate($request,[
                'foto' => 'required|image|mimes:jpeg,png,jpg'
            ]);
            try {
    
                if($request->hasfile('foto')){
    
                    $image_path = $request->file('foto')->getPathname();
                    $image_mime = $request->file('foto')->getmimeType();
                    $image_org  = $request->file('foto')->getClientOriginalName();
                    $fields = [
                        [
                            'name'     => 'foto',
                            'filename' => $image_org,
                            'Mime-Type'=> $image_mime,
                            'contents' => fopen( $image_path, 'r' ),
                        ]
                    ];
                    
                }
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'ypt-auth/update-background',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $fields
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
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }

        public function updateProfileSiswa(Request $request){
            $this->validate($request,[
                'tgl_lahir' => 'date_format:d/m/Y'
            ]);
            try {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'mobile-dash/update-profile-siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'nis' => $request->inp_nis,
                        'nama' => $request->inp_nama,
                        'kode_kelas' => $request->inp_kode_kelas,
                        'jk' => $request->inp_jk,
                        'tgl_lahir' => $this->reverseDate($request->inp_tgl_lahir,"/","-"),
                        'tmp_lahir' => $request->inp_tempat_lahir,
                        'agama' => $request->inp_agama,
                        'email' => $request->inp_email,
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
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }
    
        public function searchForm(Request $request){
            $this->validate($request,[
                'cari' => 'required',
            ]);
            try {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'ypt-auth/search-form',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'cari' => $request->cari,
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
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }
    
        public function searchFormList(Request $request){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'ypt-auth/search-form-list',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'cari' => $request->cari,
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data;
                }
                return response()->json($data["success"], 200); 
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }
    
        public function searchFormList2(Request $request){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'ypt-auth/search-form-list',[
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
                return response()->json($data["success"], 200); 
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }

        public function getInfo(Request $request){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'mobile-dash/info2',[
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

        public function getNotif(Request $request){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'mobile-dash/notif',[
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

        public function getDetailInfo(Request $request){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'mobile-dash/info2-detail',[
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
    

        public function getJumlahNotRead(Request $request){
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'mobile-dash/jum-status-read',[
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

        public function updateStatusReadMobile(Request $request){
            $this->validate($request,[
                'no_pesan' => 'required'
            ]);
            try {
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'mobile-dash/update-status-read',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_pesan' => $request->no_pesan
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
                return response()->json(['message' => $res, 'status'=>false], 200);
            }
        }
    }


?>