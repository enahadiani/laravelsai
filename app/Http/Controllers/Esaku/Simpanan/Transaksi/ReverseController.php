<?php

namespace App\Http\Controllers\Esaku\Simpanan\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ReverseController extends Controller
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
            $response = $client->request('GET',  config('api.url').'esaku-trans/reverse-akru-simp',[
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
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }
    }

    public function getAnggota(Request $request){
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/reverse-akru-simp-agg?status_simpan=1',[
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
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }catch(BadResponseException $ex){
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }
    }

    /**
     * show data by no agg.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getKartuSimpanan(Request $request,$no_agg)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/reverse-akru-simp-nokartu?no_agg='.$no_agg,[
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
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }catch(BadResponseException $ex){
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }

    }
    /**
     * show data by no agg.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadData(Request $request)
    {
        try{
            $no_kartu = $request->no_kartu;
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/reverse-akru-simp-listakru?no_simp='.$no_kartu,[
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
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }catch(BadResponseException $ex){
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


    }

    public function destroy($no_bukti)
    {
        try{

            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/reverse-akru-simp?no_bukti='.$no_bukti,[
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
