<?php

namespace App\Http\Controllers\Bdh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SpbController extends Controller
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/spb', [
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/spb-nobukti', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'tanggal'   => $request->input('tanggal')
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

    public function getPb()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/spb-pb-list', [
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
    public function getPbTambah()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/spb-tambah-pb', [
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
    public function getNikFiat()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/spb-nik-fiat', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
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
    public function getNikBdh()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/spb-nik-bdh', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
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

    public function getTransfer(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/spb-rek-transfer', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_pb'     => $request->input('no_pb')
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

    public function postPbTambah(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/spb-pb-list', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_pb' => $request->input('no_pb')
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
            'tanggal' => 'required',
            'kode_form' => 'required',
            'deskripsi' => 'required',
            'total_spb' => 'required',
            'nik_bdh' => 'required',
            'nik_fiatur' => 'required',
            'status' => 'required|array',
            'pb' => 'required|array',
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
                    'name' => 'no_dokumen',
                    'contents' => $request->no_dokumen,
                ],
                [
                    'name' => 'deskripsi',
                    'contents' => $request->deskripsi,
                ],
                [
                    'name' => 'nik_bdh',
                    'contents' => $request->nik_bdh,
                ],
                [
                    'name' => 'nik_fiat',
                    'contents' => $request->nik_fiatur,
                ],
                [
                    'name' => 'total',
                    'contents' => $request->total_spb,
                ],
            ];

            $fields_status = array();
            $fields_no_pb = array();
            $fields_nilai_pb = array();


            if (count($request->status) > 0) {
                for ($y = 0; $y < count($request->status); $y++) {
                    $fields_status[$y] = array(
                        'name'      => 'status[]',
                        'contents'  => $request->status[$y]
                    );
                    $fields_no_pb[$y] = array(
                        'name'      => 'no_pb[]',
                        'contents'  => $request->pb[$y]
                    );
                    $fields_nilai_pb[$y] = array(
                        'name'      => 'nilai_pb[]',
                        'contents'  => $request->nilai[$y]
                    );

                    $send_data = array_merge($fields, $fields_status);
                    $send_data = array_merge($send_data, $fields_no_pb);
                    $send_data = array_merge($send_data, $fields_nilai_pb);
                }
            } else {
                $send_data = $fields;
            }



            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'bdh-trans/spb', [
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
            $result['message'] = $res["message"];
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }
}
