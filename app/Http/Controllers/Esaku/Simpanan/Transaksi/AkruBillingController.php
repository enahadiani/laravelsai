<?php

namespace App\Http\Controllers\Esaku\Simpanan\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class AkruBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login')->with('alert','Session telah habis !');
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

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    public function getModul(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/modul2',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
                if(count($data) >0){

                    for($i=0;$i<count($data);$i++){
                        $data[$i]["no"] = "";
                        $data[$i]["status"] = "TRUE";
                    }
                }
            }
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200);
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
            'deskripsi' => 'required',
            'akun_piutang.*' => 'required',
            'akun_simpanan.*' => 'required',
            'nilai.*' => 'required',
        ]);

        try{
            $detail = array();
            if(isset($request->tanggal)){
                $tanggal = $request->tanggal;
                $deskripsi = $request->deskripsi;
                $akun_piutang = $request->akun_piutang;
                $akun_simpanan = $request->akun_simpanan;
                $nilai = $request->nilai;
                for($i=0;$i<count($akun_piutang);$i++){
                    $detail[] = array(
                        'akun_piutang' => $akun_piutang[$i],
                        'akun_simpanan' => $akun_simpanan[$i],
                        'nilai'         => $nilai[$i]
                    );
                }
            }

             $fields =
                  array (
                    'tanggal' => $tanggal,
                    'keterangan' => $deskripsi,
                    'akun_simpanan' => $akun_simpanan,
                    'akun_piutang'  => $akun_piutang,
                    'nilai'     => $nilai
                );
                // var_dump($fields);

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/akru-simp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["keterangan"];
            // $result['status']=false;
            return response()->json(["data" => $res], 500);
        }

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function loadJurnal(Request $request,$tanggal)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/akru-simp-jurnal?tanggal='.$tanggal,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                    'Content-Type'     => 'application/json'
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data;
                $total = 0;
                if(count($data["data"]) >0){
                    $no = 1;

                    for($i=0;$i<count($data["data"]);$i++){
                        $results["data"][$i]["no"] = $no++;
                        $results["data"][$i]["nama_simp"] = $data["data"][$i]["nama_simp"];
                        $results["data"][$i]["akun_simpanan"] = $data["data"][$i]["akun_titip"].'-'.$data["data"][$i]["nama_asimp"];
                        $results["data"][$i]["akun_piutang"] = $data["data"][$i]["akun_piutang"].'-'.$data["data"][$i]["nama_ar"];
                        $results["data"][$i]["total"] = $data["data"][$i]["total"];
                        $total += $data["data"][$i]["total"];
                    }
                    $results["status"] = $data["status"];
                    $results["total"] = $total;
                    $results["all"]   = $data;
                }else{
                    $results["total"] = $total;
                    $results = $data;
                }


            }
            return response()->json(['daftar' => $results], 200);
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }

    }

}
