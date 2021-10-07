<?php

namespace App\Http\Controllers\Bdh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PenerimaanDropingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/esaku-trans/';

    public function __contruct()
    {
        if (!Session::get('login')) {
            return redirect('bdh-auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function joinNum($num)
    {
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep = '-', $new_sep = '-')
    {
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2] . $new_sep . $arr[1] . $new_sep . $arr[0];
    }

    public function index()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-terima', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }

    public function GenerateBukti(Request $request)
    {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-terima-nobukti', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'tanggal'   => $request->input('tanggal'),
                    'jenis'     => $request->input('jenis'),
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["no_bukti"];
            }
            return response()->json(['data' => $data, 'status' => true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res, 'status' => false], 200);
        }
    }

    public function getAkun()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-terima-akun', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }
    public function loadData(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-terima-load', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'tanggal'       => $request->input('tanggal')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }
    public function getNik()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-terima-niktahu', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_dokumen' => 'required',
            'kas_bank' => 'required',
            'jenis' => 'required',
            'nik_tahu' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'total_penerimaan' => 'required',
            'status' => 'required|array',
            'no_kas_kirim' => 'required|array',
            'no_dok' => 'required|array',
            'kode_lokasi' => 'required|array',
            'akun_tak' => 'required|array',
            'keterangan' => 'required|array',
            'nu'        => 'required|array',
            'nilai' => 'required|array',
        ]);
        try {
            $send_data = array();

            $fields = [
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal, '/', '-'),
                ],
                [
                    'name' => 'jenis',
                    'contents' => $request->jenis,
                ],
                [
                    'name' => 'no_dokumen',
                    'contents' => $request->no_dokumen,
                ],
                [
                    'name' => 'deskripsi',
                    'contents' => $request->deskripsi,
                ],
                [
                    'name' => 'akun_kas',
                    'contents' => $request->kas_bank,
                ],
                [
                    'name' => 'nik_tahu',
                    'contents' => $request->nik_tahu,
                ],
                [
                    'name' => 'total',
                    'contents' => intval(preg_replace("/[^0-9]/", "", $request->total_penerimaan)),
                ],
            ];

            $fields_status = array();
            $fields_no_kas_kirim = array();
            $fields_lokasi_kirim = array();
            $fields_akun_tak = array();
            $fields_keterangan = array();
            $fields_nilai = array();
            $fields_id = array();

            if (count($request->status) > 0) {
                for ($y = 0; $y < count($request->status); $y++) {
                    if ($request->status[$y] == 'APP') {
                        $fields_status[$y] = array(
                            'name'      => 'status[]',
                            'contents'  => $request->status[$y]
                        );
                        $fields_no_kas_kirim[$y] = array(
                            'name'      => 'no_kas_kirim[]',
                            'contents'  => $request->no_kas_kirim[$y]
                        );
                        $fields_lokasi_kirim[$y] = array(
                            'name'      => 'lokasi_kirim[]',
                            'contents'  => $request->kode_lokasi[$y]
                        );
                        $fields_akun_tak[$y] = array(
                            'name'      => 'akun_tak[]',
                            'contents'  => $request->akun_tak[$y]
                        );
                        $fields_keterangan[$y] = array(
                            'name'      => 'keterangan[]',
                            'contents'  => $request->keterangan[$y]
                        );
                        $fields_nilai[$y] = array(
                            'name'      => 'nilai[]',
                            'contents'  => intval(preg_replace("/[^0-9]/", "", $request->nilai)[$y])
                        );
                        $fields_id[$y] = array(
                            'name'      => 'id[]',
                            'contents'  => $request->nu[$y]
                        );
                    }

                    $send_data = array_merge($fields, $fields_status);
                    $send_data = array_merge($send_data, $fields_no_kas_kirim);
                    $send_data = array_merge($send_data, $fields_lokasi_kirim);
                    $send_data = array_merge($send_data, $fields_akun_tak);
                    $send_data = array_merge($send_data, $fields_keterangan);
                    $send_data = array_merge($send_data, $fields_nilai);
                    $send_data = array_merge($send_data, $fields_id);
                }
            } else {
                $send_data = $fields;
            }



            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'bdh-trans/droping-terima', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(["data" => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res;
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }
    public function destroy(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url') . 'bdh-trans/spb', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
            }
            return response()->json(['data' => $data, 'status' => true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }
}
