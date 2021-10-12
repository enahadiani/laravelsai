<?php

namespace App\Http\Controllers\Bdh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class AppDropingController extends Controller
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-app', [
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
    public function getFilter()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-app-aju', [
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
    public function getDroping($no_aju)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-app?no_aju=' . $no_aju, [
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
    public function getAkun()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-app-akun-mutasi', [
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

    public function show(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-app-detail', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_aju'    => $request->input('no_aju')
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

    public function show2(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-app-detail', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_aju'    => $request->input('no_aju'),
                    'no_app'    => $request->input('no_app')
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


    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal'           => 'required',
            'status'            => 'required',
            'deskripsi'         => 'required',
            'no_bukti'          => 'required',
            'kode_pp'           => 'required',
            'lokasi'            => 'required',
            'modul'             => 'required',
            'total_approve'     => 'required',
            'akun_mutasi'       => 'required',
            'bank'              => 'required',
            'no_rek'            => 'required',
            'no_rek'            => 'required',
            'nama_rek'          => 'required',
            'nilai_usul'        => 'required|array',
            'nilai_app'         => 'required|array',
            'nu'                => 'required|array',
        ]);
        try {
            $send_data = array();

            $fields = [
                [
                    'name'      => 'tanggal',
                    'contents'  => $this->reverseDate($request->tanggal, '/', '-'),
                ],
                [
                    'name'      => 'status',
                    'contents'  => $request->status
                ],
                [
                    'name'      => 'catatan',
                    'contents'  => $request->deskripsi
                ],
                [
                    'name'      => 'no_aju',
                    'contents'  => $request->no_bukti
                ],
                [
                    'name'      => 'kode_pp_bukti',
                    'contents'  => $request->kode_pp
                ],
                [
                    'name'      => 'lokasi_asal',
                    'contents'  => $request->lokasi
                ],
                [
                    'name'      => 'modul',
                    'contents'  => $request->modul,
                ],
                [
                    'name'      => 'total_approve',
                    'contents'  => intval(preg_replace("/[^0-9]/", "", $request->total_approve))
                ],
                [
                    'name'      => 'akun_mutasi',
                    'contents'  => $request->akun_mutasi,
                ],
                [
                    'name'      => 'bank',
                    'contents'  => $request->bank,
                ],
                [
                    'name'      => 'no_rek',
                    'contents'  => $request->no_rek,
                ],
                [
                    'name'      => 'nama_rek',
                    'contents'  => $request->nama_rek,
                ]
            ];
            $fields_nilai_app = array();
            $fields_id = array();

            if (count($request->kode_akun) > 0) {
                for ($y = 0; $y < count($request->kode_akun); $y++) {
                    $fields_nilai_app[$y] = array(
                        'name'      => 'nilai_app[]',
                        'contents'  => $request->nilai_app[$y]
                    );
                    $fields_id[$y] = array(
                        'name'      => 'id[]',
                        'contents'  => $request->nu[$y]
                    );
                    $send_data = array_merge($fields, $fields_nilai_app);
                    $send_data = array_merge($send_data, $fields_id);
                }
            } else {
                $send_data = $fields;
            }
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'bdh-trans/droping-app', [
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'tanggal'           => 'required',
            'status'            => 'required',
            'deskripsi'         => 'required',
            'no_bukti'          => 'required',
            'kode_pp'           => 'required',
            'lokasi'            => 'required',
            'modul'             => 'required',
            'total_approve'     => 'required',
            'akun_mutasi'       => 'required',
            'bank'              => 'required',
            'no_rek'            => 'required',
            'no_rek'            => 'required',
            'nama_rek'          => 'required',
            'nilai_usul'        => 'required|array',
            'nilai_app'         => 'required|array',
            'nu'                => 'required|array',
        ]);
        try {
            $send_data = array();

            $fields = [
                [
                    'name'      => 'tanggal',
                    'contents'  => $this->reverseDate($request->tanggal, '/', '-'),
                ],
                [
                    'name'      => 'status',
                    'contents'  => $request->status
                ],
                [
                    'name'      => 'catatan',
                    'contents'  => $request->deskripsi
                ],
                [
                    'name'      => 'no_aju',
                    'contents'  => $request->no_bukti
                ],
                [
                    'name'      => 'kode_pp_bukti',
                    'contents'  => $request->kode_pp
                ],
                [
                    'name'      => 'lokasi_asal',
                    'contents'  => $request->lokasi
                ],
                [
                    'name'      => 'modul',
                    'contents'  => $request->modul,
                ],
                [
                    'name'      => 'total_approve',
                    'contents'  => intval(preg_replace("/[^0-9]/", "", $request->total_approve))
                ],
                [
                    'name'      => 'akun_mutasi',
                    'contents'  => $request->akun_mutasi,
                ],
                [
                    'name'      => 'bank',
                    'contents'  => $request->bank,
                ],
                [
                    'name'      => 'no_rek',
                    'contents'  => $request->no_rek,
                ],
                [
                    'name'      => 'nama_rek',
                    'contents'  => $request->nama_rek,
                ]
            ];
            $fields_nilai_app = array();
            $fields_id = array();

            if (count($request->kode_akun) > 0) {
                for ($y = 0; $y < count($request->kode_akun); $y++) {
                    $fields_nilai_app[$y] = array(
                        'name'      => 'nilai_app[]',
                        'contents'  => $request->nilai_app[$y]
                    );
                    $fields_id[$y] = array(
                        'name'      => 'id[]',
                        'contents'  => $request->nu[$y]
                    );
                    $send_data = array_merge($fields, $fields_nilai_app);
                    $send_data = array_merge($send_data, $fields_id);
                }
            } else {
                $send_data = $fields;
            }
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/droping-app', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $send_data
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
