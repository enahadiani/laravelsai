<?php
    namespace App\Http\Controllers\DashTelu;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use GuzzleHttp\Client;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;
    use PDF;

    class LaporanController extends Controller {


        public function __contruct() {
            if(!Session::get('login')){
            return redirect('yakes-auth/login');
            }
        }

        function getNamaBulan($no_bulan){
            switch ($no_bulan){
                case 1 : case '1' : case '01': $bulan = "Januari"; break;
                case 2 : case '2' : case '02': $bulan = "Februari"; break;
                case 3 : case '3' : case '03': $bulan = "Maret"; break;
                case 4 : case '4' : case '04': $bulan = "April"; break;
                case 5 : case '5' : case '05': $bulan = "Mei"; break;
                case 6 : case '6' : case '06': $bulan = "Juni"; break;
                case 7 : case '7' : case '07': $bulan = "Juli"; break;
                case 8 : case '8' : case '08': $bulan = "Agustus"; break;
                case 9 : case '9' : case '09': $bulan = "September"; break;
                case 10 : case '10' : case '10': $bulan = "Oktober"; break;
                case 11 : case '11' : case '11': $bulan = "November"; break;
                case 12 : case '12' : case '12': $bulan = "Desember"; break;
                default: $bulan = null;
            }
    
            return $bulan;
        }

        function getLabaRugiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getLabaRugi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $tahun = substr($periode,0,4);
            $bln = substr($periode,4,2);
            $tahunseb = intval($tahun) - 1;
            $tgl_awal = $data['res']['tgl_awal'].' '.$this->getNamaBulan($bln).' '.$tahun;
            $tgl_akhir = $data['res']['tgl_akhir'].' '.$this->getNamaBulan($bln).' '.$tahunseb;
            $tgl_sekarang = date('d').' '.$this->getNamaBulan(date('m')).' '.date('Y');
            
            $pdf = PDF::loadview('yakes.rptLabaRugiPDF',['data'=>$data["result"],'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir,'tgl_sekarang'=>$tgl_sekarang,'tahun_seb'=>$tahunseb]);
    	    return $pdf->download('laporan-labarugi.pdf');   
        }

        function getLabaRugiAgg(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-labarugi-agg',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiAggPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\DashTelu\LaporanController')->getLabaRugiAgg($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $tahun = substr($periode,0,4);
            $tahunrev = intval($tahun)-1;
            $pdf = PDF::loadview('dash-telu.rptLabaRugiAggPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode,'tahun' => $tahun, 'tahunrev' => $tahunrev]);
    	    return $pdf->download('laporan-labarugi-agg.pdf');   
        }

        function getLabaRugiAggDetail(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-labarugi-agg-detail',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'id' => $request->id,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiAggDir(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-labarugi-agg-dir',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'kode_bidang' => $request->kode_bidang,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiAggDirPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\DashTelu\LaporanController')->getLabaRugiAggDir($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $tahun = substr($periode,0,4);
            $tahunrev = intval($tahun)-1;
            $pdf = PDF::loadview('dash-telu.rptLabaRugiAggDirPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode,'nama_bidang'=>$request->kode_bidang[3],'tahun' => $tahun, 'tahunrev' => $tahunrev]);
    	    return $pdf->download('laporan-labarugi-agg-dir.pdf');   
        }

        function getLabaRugiAggDirDetail(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-labarugi-agg-dir-detail',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'id' => $request->id,
                        'kode' => $request->kode,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiAggFak(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-labarugi-agg-fak',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'kode_bidang' => $request->kode_bidang,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiAggFakPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\DashTelu\LaporanController')->getLabaRugiAggFak($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $tahun = substr($periode,0,4);
            $tahunrev = intval($tahun)-1;
            $pdf = PDF::loadview('dash-telu.rptLabaRugiAggFakPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode,'tahun' => $tahun, 'tahunrev' => $tahunrev]);
    	    return $pdf->download('laporan-labarugi-agg-bidang.pdf');   
        }

        function getLabaRugiAggFakDetail(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-labarugi-agg-fak-detail',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'id' => $request->id,
                        'kode' => $request->kode,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiAggProdi(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-labarugi-agg-prodi',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'kode_pp' => $request->kode_pp,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiAggProdiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\DashTelu\LaporanController')->getLabaRugiAggProdi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $tahun = substr($periode,0,4);
            $tahunrev = intval($tahun)-1;
            $pdf = PDF::loadview('dash-telu.rptLabaRugiAggProdiPDF',['data'=>$data["result"],'detail' =>$data["res"]["detail"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode,'tahun' => $tahun, 'tahunrev' => $tahunrev]);
    	    return $pdf->download('laporan-labarugi-agg-prodi.pdf');   
        }


        function getLabaRugiAggProdiDetail(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-labarugi-agg-prodi-detail',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'id' => $request->id,
                        'kode' => $request->kode,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getNeraca2(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-neraca2',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getNeraca2PDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\DashTelu\LaporanController')->getNeraca2($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $tahun = substr($periode,0,4);
            $tahunrev = intval($tahun)-1;
            $bln = substr($periode,4,2);
            $totime = date('d').' '.$this->getNamaBulan($bln).' '.$tahun;
            $totimerev = date('d').' '.$this->getNamaBulan($bln).' '.$tahunrev;
            $pdf = PDF::loadview('dash-telu.rptNeraca2PDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode,'tahunrev'=>$tahunrev,'totime'=>$totime,'totimerev'=>$totimerev]);
    	    return $pdf->download('laporan-neraca.pdf');   
        }

        function getNeraca2Detail(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-neraca2-detail',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'id' => $request->id,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getInvestasi(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-investasi',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getInvestasiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\DashTelu\LaporanController')->getInvestasi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $tahun = substr($periode,0,4);
            $tahunrev = intval($tahun)-1;
            $pdf = PDF::loadview('dash-telu.rptInvestasiPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode,'tahun' => $tahun, 'tahunrev' => $tahunrev]);
    	    return $pdf->download('laporan-investasi.pdf');   
        }

        function getInvestasiDetail(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'ypt-report/lap-investasi-detail',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'id' => $request->id,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function sendMail(Request $request){
            try{
                
                $client = new Client();
                
                $query = [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'email' => $request->email
                ];
        
                $response = $client->request('POST',  config('api.url').'ypt-report/send-laporan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                        'Content-Type'     => 'application/json',
                    ],
                    'body' => json_encode($query)
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res;
                }

                return response()->json($data, 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            } 
        }

        public function sendEmail(Request $request){
            try{
                
                $client = new Client();
                
                $query = [
                    'from' => 'devsaku5@gmail.com',
                    'to' => $request->email,
                    'html' => $request->html,
                    'text' => $request->text,
                    'subject' => $request->subject
                ];
        
                $response = $client->request('POST',config('api.url').'ypt-report/send-email-report',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                    ],
                    'form_params' => $query
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res;
                }

                return response()->json($data, 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], 200);
                // var_dump($response);
            } 
        }
    }
?>