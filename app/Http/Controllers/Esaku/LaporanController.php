<?php
    namespace App\Http\Controllers\Esaku;

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
            return redirect('esaku-auth/login');
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

        function lastOfMonth($year, $month) {
            return date("d", strtotime('-1 second', strtotime('+1 month',strtotime($month . '/01/' . $year. ' 00:00:00'))));
        }

        public function getKartuStok(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'toko-report/lap-kartu-stok',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_gudang' => $request->kode_gudang,
                        'kode_klp' => $request->kode_klp,
                        'kode_barangp' => $request->kode_barang
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

        public function getKartu(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'toko-report/lap_kartu',[
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
                $response = $client->request('GET',  config('api.url').'toko-report/lap_saldo',[
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
                $response = $client->request('GET',  config('api.url').'toko-report/lap-penjualan-harian',[
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
                $response = $client->request('GET',  config('api.url').'toko-report/lap-retur-beli',[
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
                $response = $client->request('GET',  config('api.url').'toko-report/lap-barang',[
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
                $response = $client->request('GET',  config('api.url').'toko-report/lap-closing',[
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
                $response = $client->request('GET',  config('api.url').'toko-report/lap-pembelian',[
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
                $response = $client->request('GET',  config('api.url').'toko-report/lap-penjualan',[
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
        
                $response = $client->request('GET',  config('api.url').'toko-report/lap-nrclajur',[
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
                
                return response()->json(['result' => $data, 'status'=>true,'lokasi'=>Session::get('namaLokasi'), 'auth_status'=>1,'back'=>$back], 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getBuktiJurnal(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'toko-report/lap-buktijurnal',[
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
                $response = $client->request('GET',  config('api.url').'toko-report/lap-jurnal',[
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
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1, 'sumju'=>$request->sum_ju[1],'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
                
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getJurnalPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getJurnal($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('esaku.rptJurnalPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'sumju'=>$request->sum_ju[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-jurnal-pdf');   
        }
    
        function getBukuBesar(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'toko-report/lap-bukubesar',[
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

        function getBukuBesarPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getBukuBesar($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('esaku.rptBukuBesarPDF',['data'=>$data["result"],'detail'=>$data["detail"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-bukubesar-pdf');   
        }

        function getNeraca(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'toko-report/lap-neraca',[
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
        
        function getNeracaPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getNeraca($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $pdf = PDF::loadview('esaku.rptNeracaPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode]);
    	    return $pdf->download('laporan-neraca-pdf');   
        }

        function getLabaRugi(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'toko-report/lap-labarugi',[
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

        function getLabaRugiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getLabaRugi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $pdf = PDF::loadview('esaku.rptLabaRugiPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode]);
    	    return $pdf->download('laporan-labarugi-pdf');   
        }

        function sendMail(Request $request){
            try{
                
                $client = new Client();
                
                $query = [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'email' => $request->email
                ];
        
                $response = $client->request('POST',  config('api.url').'toko-report/send-laporan',[
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


        function sendNrcLajur(Request $request){
            try{
                
                $client = new Client();
                
                $query = [
                    'from' => 'devsaku5@gmail.com',
                    'to' => $request->email,
                    'html' => $request->html,
                    'text' => 'Berikut ini kami lampirkan laporan neraca lajur:',
                    'subject' => 'Laporan Neraca Lajur [SAI Esaku]'
                ];
        
                $response = $client->request('POST',config('api.url').'toko-report/send-email',[
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

        function getNeracaKomparasi(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'toko-report/lap-neraca-komparasi',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'periode2' => $request->periode2,
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
                $tgl_akhir = $this->lastOfMonth(substr($request->periode[1],0,4),substr($request->periode[1],4,2));
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'tgl_akhir'=>$tgl_akhir,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getNeracaKomparasiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getNeracaKomparasi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $periode2 = $request->periode2[1];
            $tgl_akhir = $this->lastOfMonth(substr($request->periode[1],0,4),substr($request->periode[1],4,2)). ' '.$this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('esaku.rptNeracaKomparasiPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'tgl_akhir'=>$tgl_akhir,'periode' => $periode, 'periode2' => $periode2]);
    	    return $pdf->download('laporan-neraca-komparasi-pdf');   
        }

        function getLabaRugiKomparasi(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'toko-report/lap-labarugi-komparasi',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'periode2' => $request->periode2,
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
                
                $tgl_akhir = $this->lastOfMonth(substr($request->periode[1],0,4),substr($request->periode[1],4,2)). ' '.$this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back,'tgl_akhir' => $tgl_akhir], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiKomparasiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getLabaRugiKomparasi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $periode2 = $request->periode2[1];
            $tgl_akhir = $this->lastOfMonth(substr($request->periode[1],0,4),substr($request->periode[1],4,2)). ' '.$this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('esaku.rptLabaRugiKomparasiPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode,'periode2' => $periode2,'tgl_akhir' => $tgl_akhir]);
    	    return $pdf->download('laporan-labarugi-komparasi-pdf');   
        }

    }
?>