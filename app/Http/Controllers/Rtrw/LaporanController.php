<?php
    namespace App\Http\Controllers\Rtrw;

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
            return redirect('rtrw-auth/login');
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

        function getBuktiTrans(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'rtrw/lap-bukti-trans',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'modul' => $request->modul,
                        'no_bukti' => $request->no_bukti,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    $detail = $res["detail_jurnal"];
                    $lokasi = $res["lokasi"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1, 'detail_jurnal'=>$detail,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getBuktiTransPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Rtrw\LaporanController')->getBuktiTrans($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('rtrw-baru.rptBuktiTransPDF',['data'=>$data["result"],'periode'=>$periode,'lokasi'=>$data['lokasi'],'detail_jurnal'=>$data["detail_jurnal"]]);
            return $pdf->download('laporan-bukti-trans');   
        }

        function getSaldoAkun(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'rtrw/lap-saldo-akun',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $request->kode_pp,
                        'periode' => $request->periode,
                        'kode_akun' => $request->kode_akun,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    $lokasi = $res["lokasi"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1,'lokasi'=>$lokasi,'back'=>$back,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getSaldoAkunPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Rtrw\LaporanController')->getSaldoAkun($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('rtrw-baru.rptSaldoAkunPDF',['data'=>$data["result"],'periode'=>$periode,'lokasi'=>$data['lokasi']]);
            return $pdf->download('laporan-bukti-trans');   
        }

        function getKartuIuran(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'rtrw/lap-kartu-iuran',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'rt' => $request->rt,
                        'kode_rumah' => $request->kode_rumah,
                        'kode_jenis' => $request->kode_jenis,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    $lokasi = $res["lokasi"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getKartuIuranPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Rtrw\LaporanController')->getKartuIuran($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('rtrw-baru.rptKartuIuranPDF',['data'=>$data["result"],'periode'=>$periode,'lokasi'=>$data['lokasi']]);
            return $pdf->download('laporan-bukti-trans');   
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
        
                $response = $client->request('POST',config('api.url').'rtrw/send-email-report',[
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