<?php

namespace App\Http\Controllers\Esaku\Simpanan\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PenerimaanTunaiController extends Controller
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

    public function index(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/akru-simp',[
                'headers' => [
                    'Authorization'     => 'Bearer '.Session::get('token'),
                    'Accept'            => 'application/json',
                    'Content-Type'      => 'application/json'
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data;
                if(count($data["data"]) >0){
                    $no = 1;

                    for($i=0;$i<count($data["data"]);$i++){
                        $results["data"][$i]["no"] = $no++;
                        $results["data"][$i]["no_bukti"] = $data["data"][$i]["no_bukti"];
                        $results["data"][$i]["tgl"] = $data["data"][$i]["tgl"];
                        $results["data"][$i]["keterangan"] = $data["data"][$i]["keterangan"];
                        $results["data"][$i]["total"] = $data["data"][$i]["nilai1"];
                        $results["data"][$i]["status"] = $data["data"][$i]["status"];

                    }
                }else{
                    $results = $data;
                }
            }
            return response()->json(['daftar' => $results['data'], 'status' => true], 200);
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }

    }

    /**
     * show data by no bukti .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/akru-simp-detail?no_bukti='.$no_bukti,[
                'headers' => [
                    'Authorization'     => 'Bearer '.Session::get('token'),
                    'Accept'            => 'application/json',
                    'Content-Type'      => 'application/json'
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
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
            }

             $fields =
                  array (
                    'tanggal' => $tanggal,
                    'keterangan' => $deskripsi,
                    'akun_piutang'  =>  $akun_piutang,
                    'akun_simpanan'  =>  $akun_simpanan,
                    'nilai'  =>  $nilai,
                );

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
                return response()->json(["data" =>$data,"body" => $fields], 200);
            }
        } catch (\Exception $ex) {

            $result['message'] =$ex->getMessage();
            $result['rows'] = $request->akun_piutang;
            // $result['status']=false;
            return response()->json(["data" => $result], 500);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
            }

             $fields =
                  array (
                      'no_bukti' => $request->no_bukti,
                    'tanggal' => $tanggal,
                    'keterangan' => $deskripsi,
                    'akun_piutang'  =>  $akun_piutang,
                    'akun_simpanan'  =>  $akun_simpanan,
                    'nilai'  =>  $nilai,
                );

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'esaku-trans/akru-simp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data,"body" => $fields], 200);
            }
        } catch (\Exception $ex) {

            $result['message'] =$ex->getMessage();
            $result['rows'] = $request->akun_piutang;
            // $result['status']=false;
            return response()->json(["data" => $result], 500);
        }

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function loadTagihan(Request $request,$no_agg)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/terima-simp-tagihan?no_agg='.$no_agg,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                    'Content-Type'     => 'application/json'
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data["data"];
                $total = 0;



            }
            return response()->json(['daftar' => $data], 200);
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }

    }


    // /**
    //  * Destroy the specified resource.
    //  *
    //  * @param  int  $no_bukti
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($no_bukti)
    {
        try{

            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/akru-simp?no_bukti='.$no_bukti,[
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
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }

    }

}
