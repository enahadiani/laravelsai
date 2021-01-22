<?php
namespace App\Http\Controllers\Esaku;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class TransAktivaTetapController extends Controller {
    
    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

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

    public function store(Request $request) { 
        $this->validate($request, [
            'tgl_perolehan' => 'required',
            'tgl_susut' => 'required',
            'kode_klpfa'=>'required',          
            'kode_klpakun'=>'required',          
            'umur'=>'required',          
            'persen'=>'required',          
            'no_bukti'=>'required',          
            'no_seri'=>'required',          
            'tipe'=>'required',          
            'merk'=>'required',          
            'jumlah'=>'required',          
            'nilai_perolehan'=>'required',          
            'residu'=>'required',          
            'total'=>'required',          
            'kode_pp1'=>'required',          
            'kode_pp2'=>'required',          
            'deskripsi'=>'required',          
        ]);

        try {
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/aktap',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'tgl_perolehan' => $this->reverseDate($request->tgl_perolehan,'/','-'),
                    'tgl_susut' => $this->reverseDate($request->tgl_susut,'/','-'),
                    'kode_klpfa'=>$request->kode_klpfa,
                    'kode_klpakun'=>$request->kode_klpakun,
                    'kode_akun'=>$request->kode_klpakun,
                    'umur'=>$this->joinNum($request->umur),
                    'persen'=>$this->joinNum($request->persen),
                    'jumlah'=>$this->joinNum($request->jumlah),
                    'nilai'=>$this->joinNum($request->nilai_perolehan),
                    'residu'=>$this->joinNum($request->residu),
                    'total'=>$this->joinNum($request->total),
                    'deskripsi'=>$request->deskripsi,
                    'no_bukti'=>$request->no_bukti,
                    'kode_pp1'=>$request->kode_pp1,
                    'kode_pp2'=>$request->kode_pp2,
                    'merk'=>$request->merk,
                    'tipe'=>$request->tipe,
                    'no_seri'=>$request->no_seri,
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data['success']], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }
}
?>