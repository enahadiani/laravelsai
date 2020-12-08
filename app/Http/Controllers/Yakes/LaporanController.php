<?php
    namespace App\Http\Controllers\Yakes;

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

        public function getKartu(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap_kartu',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_akun' => $request->kode_akun,
                        'kode_pp' => $request->kode_pp
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res['data'];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }
        
        public function getSaldo(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap_saldo',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_akun' => $request->kode_akun,
                        'kode_pp' => $request->kode_pp
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res['data'];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getPenjualanHarian(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-penjualan-harian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'nik_kasir' => $request->nik_kasir,
                        'tanggal' => $request->tanggal
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getReturBeli(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-retur-beli',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'nik_kasir' => $request->nik_kasir,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getBarang(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-barang',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_barang' => $request->kode_barang,
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->kode_barang != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getClosing(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-closing',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'nik_kasir' => $request->nik_kasir,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getPembelian(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-pembelian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'nik_kasir' => $request->nik_kasir,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getPenjualan(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-penjualan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'nik_kasir' => $request->nik_kasir,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        
        function getNrcLajur(Request $request){
            try{
                
                $client = new Client();
        
                if(isset($request->jenis)){
                    $jenis = $request->jenis;
                }else{
                    $jenis = "";
                }
        
                if(isset($request->trail)){
                    $trail = $request->trail;
                }else{
                    $trail = "";
                }
        
                if(isset($request->kode_neraca)){
                    $kode_neraca = $request->kode_neraca;
                }else{
                    $kode_neraca = "";
                }
        
                if(isset($request->kode_fs)){
                    $kode_fs = $request->kode_fs;
                }else{
                    $kode_fs = "";
                }
                
                $query = [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'jenis' => $jenis,
                    'trail' => $trail,
                    'kode_neraca' => $kode_neraca,
                    'kode_fs' => $kode_fs,
                    'nik_user' => Session::get('nikUser')
                ];
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-nrclajur',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => $query
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
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'back'=>$back,'lokasi'=>Session::get('namaLokasi')], 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

         
        function getNrcLajurGrid(Request $request){
            try{
                
                $client = new Client();
        
                if(isset($request->jenis)){
                    $jenis = $request->jenis;
                }else{
                    $jenis = "";
                }
        
                if(isset($request->trail)){
                    $trail = $request->trail;
                }else{
                    $trail = "";
                }
        
                if(isset($request->kode_neraca)){
                    $kode_neraca = $request->kode_neraca;
                }else{
                    $kode_neraca = "";
                }
        
                if(isset($request->kode_fs)){
                    $kode_fs = $request->kode_fs;
                }else{
                    $kode_fs = "";
                }
                
                $query = [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'jenis' => $jenis,
                    'trail' => $trail,
                    'kode_neraca' => $kode_neraca,
                    'kode_fs' => $kode_fs,
                    'nik_user' => Session::get('nikUser')
                ];
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-nrclajur-grid',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => $query
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
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'back'=>$back,'lokasi'=>Session::get('namaLokasi')], 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getNrcLajurPDF(Request $request){
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getNrcLajur($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $pdf = PDF::loadview('yakes.rptNrcLajurPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-neraca-lajur-pdf');   
        }

        function getNrcLajurJejerPDF(Request $request){
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getNrcLajurJejer($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $pdf = PDF::loadview('yakes.rptNrcLajurJejerPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]])->setPaper('a4', 'landscape');
    	    return $pdf->download('laporan-neraca-lajur-jejer-pdf');   
        }

        function getJurnalPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getJurnal($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('yakes.rptJurnalPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'sumju'=>$request->sum_ju[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-jurnal-pdf');   
        }

        function getBukuBesarPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getBukuBesar($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('yakes.rptBukuBesarPDF',['data'=>$data["result"],'detail'=>$data["detail"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-bukubesar-pdf');   
        }

        function getLabaRugiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getLabaRugi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('yakes.rptLabaRugiPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-labarugi-pdf');   
        }

        function getNeracaPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getNeraca($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('yakes.rptNeracaPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-neraca-pdf');   
        }

        function getLabaRugiPPPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getLabaRugiPP($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('yakes.rptLabaRugiPPPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-labarugi-area-pdf');   
        }

        function getLabaRugiJejerPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getLabaRugiJejer($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('yakes.rptLabaRugiJejerPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-labarugi-jejer-pdf');   
        }

        function getNeracaPPPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getNeracaPP($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('yakes.rptNeracaPPPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-neraca=area-pdf');   
        }

        function getNeracaJejerPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Yakes\LaporanController')->getNeracaJejer($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('yakes.rptNeracaJejerPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-neraca-jejer-pdf');   
        }

        function getNrcLajurJejer(Request $request){
            try{
                
                $client = new Client();
        
                if(isset($request->jenis)){
                    $jenis = $request->jenis;
                }else{
                    $jenis = "";
                }
        
                if(isset($request->trail)){
                    $trail = $request->trail;
                }else{
                    $trail = "";
                }
        
                if(isset($request->kode_neraca)){
                    $kode_neraca = $request->kode_neraca;
                }else{
                    $kode_neraca = "";
                }
        
                if(isset($request->kode_fs)){
                    $kode_fs = $request->kode_fs;
                }else{
                    $kode_fs = "";
                }
                
                $query = [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'jenis' => $jenis,
                    'trail' => $trail,
                    'kode_neraca' => $kode_neraca,
                    'kode_fs' => $kode_fs,
                    'nik_user' => Session::get('nikUser')
                ];
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-nrclajur-jejer',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => $query
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
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'back'=>$back,'lokasi'=>Session::get('namaLokasi')], 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getBuktiJurnal(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-buktijurnal',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'modul' => $request->modul,
                        'no_bukti' => $request->no_bukti,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    $detail = $res["detail_jurnal"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1, 'detail_jurnal'=>$detail,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getJurnal(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-jurnal',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'modul' => $request->modul,
                        'no_bukti' => $request->no_bukti,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1, 'sumju'=>$request->sum_ju[1],'lokasi'=>Session::get('namaLokasi'),'back'=>$back, 'res'=>$res], 200); 
                
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }
    
        function getBukuBesar(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-bukubesar',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_akun' => $request->kode_akun,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'mutasi' => $request->mutasi,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $detail = $res["data_detail"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1, 'detail'=>$detail,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getNeraca(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-neraca',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'format' => $request->format,
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
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back,'nik_user'=>Session::get('nikUser')], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getNeracaJejer(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-neraca-jejer',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'format' => $request->format,
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

        function getNeracaPP(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-neraca-pp',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_pp' => $request->kode_pp,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'format' => $request->format,
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

        function getLabaRugi(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-labarugi',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'format' => $request->format,
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

        function getLabaRugiJejer(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-labarugi-jejer',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'format' => $request->format,
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
        
                $response = $client->request('POST',  config('api.url').'yakes-report/send-laporan',[
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

        function getLabaRugiPP(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-labarugi-pp',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'kode_pp' => $request->kode_pp,
                        'level' => $request->level,
                        'format' => $request->format,
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

        function getNeracaJamkespen(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'yakes-report/lap-neraca-jamkespen',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'format' => $request->format,
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
    }
?>