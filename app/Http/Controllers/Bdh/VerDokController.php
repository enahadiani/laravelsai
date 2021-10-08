<?php

namespace App\Http\Controllers\Bdh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class VerDokController extends Controller
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-dok', [
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

    public function generateKode(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-dok-nobukti', [
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-dok', [
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

    public function LoadData(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-dok-detail', [
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
            'no_pb_aju'         => 'required',
            'tanggal'           => 'required',
            'status'            => 'required',
            'deskripsi'         => 'required',
            'status_dok'        => 'required|array',
            'kode_dok_check'    => 'required|array',
            'catatan_dok'       => 'required|array',
        ]);
        try {
            $send_data = array();

            $fields = [
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal, '/', '-'),
                ],
                [
                    'name' => 'no_pb',
                    'contents' => $request->no_pb_aju,
                ],
                [
                    'name' => 'modul',
                    'contents' => $request->modul,
                ],
                [
                    'name' => 'memo',
                    'contents' => $request->deskripsi,
                ],
                [
                    'name' => 'status',
                    'contents' => $request->status,
                ]
            ];

            $fields_status = array();
            $fields_kode_dok = array();
            $fields_catatan_dok = array();


            if (count($request->status_dok) > 0) {
                for ($y = 0; $y < count($request->status_dok); $y++) {
                    $fields_status[$y] = array(
                        'name'      => 'status_dok[]',
                        'contents'  => $request->status_dok[$y]
                    );
                    $fields_kode_dok[$y] = array(
                        'name'      => 'kode_dok[]',
                        'contents'  => $request->kode_dok_check[$y]
                    );
                    $fields_catatan_dok[$y] = array(
                        'name'      => 'catatan_dok[]',
                        'contents'  => $request->catatan_dok[$y]
                    );

                    $send_data = array_merge($fields, $fields_status);
                    $send_data = array_merge($send_data, $fields_kode_dok);
                    $send_data = array_merge($send_data, $fields_catatan_dok);
                }
            } else {
                $send_data = $fields;
            }



            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'bdh-trans/ver-dok', [
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
