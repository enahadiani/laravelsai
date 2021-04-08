<?php
namespace App\Http\Controllers\Esaku\Aktap;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PercepatanPenyusutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('java-auth/login');
        }
    }

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }

    public function store(Request $request) {
        $this->validate($request, [
            'tanggal' => 'required',
            'aktiva_tetap' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
            'nilai_penyusutan' => 'required',
            'nilai_perolehan' => 'required',
            'total_penyusutan' => 'required',
            'nilai_buku' => 'required',
            'nilai_residu' => 'required',
            'nilai_referensi_susut' => 'required',
            'no_seri' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'akun_akumulasi' => 'required',
            'akun_beban_penyusutan' => 'required',
        ]);

        try {
            $form = array(
                'tanggal' => $this->convertDate($request->tanggal),
                'aktiva_tetap' => $request->aktiva_tetap,
                'jumlah' => $this->joinNum($request->jumlah),
                'keterangan' => $request->keterangan,
                'nilai_penyusutan' => $this->joinNum($request->nilai_penyusutan),
                'nilai_perolehan' => $this->joinNum($request->nilai_perolehan),
                'total_penyusutan' => $this->joinNum($request->total_penyusutan),
                'nilai_buku' => $this->joinNum($request->nilai_buku),
                'nilai_residu' => $this->joinNum($request->nilai_residu),
                'nilai_referensi_susut' => $this->joinNum($request->nilai_referensi_susut),
                'no_seri' => $request->no_seri,
                'merk' => $request->merk,
                'tipe' => $request->tipe,
                'akun_akumulasi' => $request->akun_akumulasi,
                'akun_beban_penyusutan' => $request->akun_beban_penyusutan
            );

            // $client = new Client();
            // $response = $client->request('POST',  config('api.url').'java-master/bank',[
            //     'headers' => [
            //         'Authorization' => 'Bearer '.Session::get('token'),
            //         'Accept'     => 'application/json',
            //     ],
            //     'form_params' => $form
            // ]);
            // if ($response->getStatusCode() == 200) { // 200 OK
            //     $response_data = $response->getBody()->getContents();
                    
            //     $data = json_decode($response_data,true);
            //     return response()->json(['data' => $data], 200);  
            // }
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