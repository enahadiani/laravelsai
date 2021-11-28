<?php

namespace App\Http\Controllers\Esaku\Sdm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct()
    {
        if (!Session::get('login')) {
            return redirect('esaku-auth/login');
        }
    }

    public function getDataKaryawan(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-report/sdm-lap-karyawan', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_sdm' => $request->input('kode_sdm'),
                    'kode_gol' => $request->input('kode_gol'),
                    'kode_area' => $request->input('kode_area'),
                    'kode_fm' => $request->input('kode_fm'),
                    'kode_bm' => $request->input('kode_bm'),
                    'kode_loker' => $request->input('kode_loker'),
                    'nik' => $request->input('nik'),
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $res = json_decode($response_data, true);
                $data = $res['data'];
            }

            if (isset($request->back)) {
                $back = true;
            } else {
                $back = false;
            }

            return response()->json(['result' => $data, 'status' => true, 'auth_status' => 1, 'periode' => 0, 'sumju' => $request->sumju, 'res' => $res, 'back' => $back], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false, 'auth_status' => 2], 200);
        }
    }

    public function getDataKaryawanCv(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-report/sdm-lap-karyawanCv', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_sdm' => $request->input('kode_sdm'),
                    'kode_gol' => $request->input('kode_gol'),
                    'kode_jab' => $request->input('kode_jab'),
                    'kode_loker' => $request->input('kode_loker'),
                    'nik' => $request->input('nik'),
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $res = json_decode($response_data, true);
                $data = $res['data'];
            }

            if (isset($request->back)) {
                $back = true;
            } else {
                $back = false;
            }

            return response()->json(['result' => $data, 'status' => true, 'auth_status' => 1, 'periode' => 0, 'sumju' => $request->sumju, 'res' => $res, 'back' => $back], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false, 'auth_status' => 2], 200);
        }
    }
}
