<?php

namespace App\Http\Controllers\Bdh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PtgBebanController extends Controller
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ptg-beban', [
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

    public function getPP()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-trans/pp-list', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["success"]["data"];
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
            $response = $client->request('GET',  config('api.url') . 'esaku-trans/akun', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }
    public function getNikBuat()
    {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/nik-buat', [
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
            return response()->json(['message' => $res, 'status' => false], 200);
        }
    }
    public function getNikTahu()
    {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/nik-tahu', [
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
            return response()->json(['message' => $res, 'status' => false], 200);
        }
    }
    public function getNikVer()
    {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/nik-ver', [
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
            return response()->json(['message' => $res, 'status' => false], 200);
        }
    }

    public function getNIKPeriksa()
    {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-trans/nikperiksa', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res, 'status' => false], 200);
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
            'no_dokumen' => 'required',
            'tanggal' => 'required',
            'kode_form' => 'required',
            'deskripsi' => 'required',
            'total_debet' => 'required',
            'total_kredit' => 'required',
            'nik_periksa' => 'required',
            'kode_akun' => 'required|array',
            'keterangan' => 'required|array',
            'dc' => 'required|array',
            'nilai' => 'required|array',
            'kode_pp' => 'required|array'
        ]);
        try {

            $fields = [
                [
                    'name' => 'no_dokumen',
                    'contents' => $request->no_dokumen,
                ],
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal, '/', '-'),
                ],
                [
                    'name' => 'deskripsi',
                    'contents' => $request->deskripsi,
                ],
                [
                    'name' => 'kode_form',
                    'contents' => $request->kode_form,
                ],
                [
                    'name' => 'total_debet',
                    'contents' => $this->joinNum($request->total_debet),
                ],
                [
                    'name' => 'total_kredit',
                    'contents' => $this->joinNum($request->total_kredit),
                ],
                [
                    'name' => 'nik_periksa',
                    'contents' => $request->nik_periksa,
                ],
                [
                    'name' => 'no_telp_app',
                    'contents' => Session::get('no_hp'),
                ],
                [
                    'name' => 'email_app',
                    'contents' => Session::get('email'),
                ]
            ];

            $fields_kode_akun = array();
            $fields_dc = array();
            $fields_keterangan = array();
            $fields_nilai = array();
            $fields_kode_pp = array();
            $send_data = array();
            if (count($request->kode_akun) > 0) {

                for ($i = 0; $i < count($request->kode_akun); $i++) {
                    $fields_kode_akun[$i] = array(
                        'name'     => 'kode_akun[]',
                        'contents' => $request->kode_akun[$i],
                    );
                    $fields_dc[$i] = array(
                        'name'     => 'dc[]',
                        'contents' => $request->dc[$i],
                    );
                    $fields_nilai[$i] = array(
                        'name'     => 'nilai[]',
                        'contents' => $request->nilai[$i],
                    );
                    $fields_keterangan[$i] = array(
                        'name'     => 'keterangan[]',
                        'contents' => $request->keterangan[$i],
                    );
                    $fields_kode_pp[$i] = array(
                        'name'     => 'kode_pp[]',
                        'contents' => $request->kode_pp[$i],
                    );
                }
                $send_data = array_merge($fields, $fields_kode_akun);
                $send_data = array_merge($send_data, $fields_dc);
                $send_data = array_merge($send_data, $fields_nilai);
                $send_data = array_merge($send_data, $fields_keterangan);
                $send_data = array_merge($send_data, $fields_kode_pp);
            } else {
                $send_data = $fields;
            }

            $fields_foto = array();
            $fields_nama_file_seb = array();
            $fields_jenis = array();
            $fields_nama_dok = array();
            $fields_no_urut = array();
            $cek = $request->file_dok;
            if (!empty($cek)) {

                if (count($request->file_dok) > 0) {

                    for ($i = 0; $i < count($request->jenis); $i++) {
                        if (isset($request->file('file_dok')[$i])) {
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $fields_foto[$i] = array(
                                'name'     => 'file[' . $i . ']',
                                'filename' => $image_org,
                                'Mime-Type' => $image_mime,
                                'contents' => fopen($image_path, 'r'),
                            );
                        }
                        $fields_jenis[$i] = array(
                            'name'     => 'jenis[]',
                            'contents' => $request->jenis[$i],
                        );
                        $fields_nama_dok[$i] = array(
                            'name'     => 'nama_dok[]',
                            'contents' => $request->nama_dok[$i],
                        );
                        $fields_no_urut[$i] = array(
                            'name'     => 'no_urut[]',
                            'contents' => $request->no_urut[$i],
                        );
                        $fields_nama_file_seb[$i] = array(
                            'name'     => 'nama_file_seb[]',
                            'contents' => $request->nama_file[$i],
                        );
                    }
                    $send_data = array_merge($send_data, $fields_foto);
                    $send_data = array_merge($send_data, $fields_nama_file_seb);
                    $send_data = array_merge($send_data, $fields_jenis);
                    $send_data = array_merge($send_data, $fields_no_urut);
                    $send_data = array_merge($send_data, $fields_nama_dok);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-trans/jurnal', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(["data" => $data["success"]], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res["message"];
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }

    public function sendNotifikasi(Request $request)
    {
        $this->validate($request, [
            'no_pooling' => 'required'
        ]);
        try {

            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-trans/jurnal-notifikasi', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'no_pooling' => $request->no_pooling
                ]
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

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ptg-beban-detail', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $id
                ]

            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res["message"];
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }

    public function getPeriodeJurnal()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-trans/jurnal-periode', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res["message"];
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }


    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $no_bukti)
    {
        $this->validate($request, [
            'no_dokumen' => 'required',
            'tanggal' => 'required',
            'kode_form' => 'required',
            'deskripsi' => 'required',
            'total_debet' => 'required',
            'total_kredit' => 'required',
            'nik_periksa' => 'required',
            'kode_akun' => 'required|array',
            'keterangan' => 'required|array',
            'dc' => 'required|array',
            'nilai' => 'required|array',
            'kode_pp' => 'required|array'
        ]);
        try {

            $fields = [
                [
                    'name' => 'no_dokumen',
                    'contents' => $request->no_dokumen,
                ],
                [
                    'name' => 'no_bukti',
                    'contents' => $request->no_bukti,
                ],
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal, '/', '-'),
                ],
                [
                    'name' => 'deskripsi',
                    'contents' => $request->deskripsi,
                ],
                [
                    'name' => 'kode_form',
                    'contents' => $request->kode_form,
                ],
                [
                    'name' => 'total_debet',
                    'contents' => $this->joinNum($request->total_debet),
                ],
                [
                    'name' => 'total_kredit',
                    'contents' => $this->joinNum($request->total_kredit),
                ],
                [
                    'name' => 'nik_periksa',
                    'contents' => $request->nik_periksa,
                ]
            ];

            $fields_kode_akun = array();
            $fields_dc = array();
            $fields_keterangan = array();
            $fields_nilai = array();
            $fields_kode_pp = array();
            $send_data = array();
            if (count($request->kode_akun) > 0) {

                for ($i = 0; $i < count($request->kode_akun); $i++) {
                    $fields_kode_akun[$i] = array(
                        'name'     => 'kode_akun[]',
                        'contents' => $request->kode_akun[$i],
                    );
                    $fields_dc[$i] = array(
                        'name'     => 'dc[]',
                        'contents' => $request->dc[$i],
                    );
                    $fields_nilai[$i] = array(
                        'name'     => 'nilai[]',
                        'contents' => $this->joinNum($request->nilai[$i]),
                    );
                    $fields_keterangan[$i] = array(
                        'name'     => 'keterangan[]',
                        'contents' => $request->keterangan[$i],
                    );
                    $fields_kode_pp[$i] = array(
                        'name'     => 'kode_pp[]',
                        'contents' => $request->kode_pp[$i],
                    );
                }
                $send_data = array_merge($fields, $fields_kode_akun);
                $send_data = array_merge($send_data, $fields_dc);
                $send_data = array_merge($send_data, $fields_nilai);
                $send_data = array_merge($send_data, $fields_keterangan);
                $send_data = array_merge($send_data, $fields_kode_pp);
            } else {
                $send_data = $fields;
            }

            $fields_foto = array();
            $fields_nama_file_seb = array();
            $fields_jenis = array();
            $fields_nama_dok = array();
            $fields_no_urut = array();
            $cek = $request->file_dok;
            if (!empty($cek)) {

                if (count($request->file_dok) > 0) {

                    for ($i = 0; $i < count($request->jenis); $i++) {
                        if (isset($request->file('file_dok')[$i])) {
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $fields_foto[$i] = array(
                                'name'     => 'file[' . $i . ']',
                                'filename' => $image_org,
                                'Mime-Type' => $image_mime,
                                'contents' => fopen($image_path, 'r'),
                            );
                        }
                        $fields_jenis[$i] = array(
                            'name'     => 'jenis[]',
                            'contents' => $request->jenis[$i],
                        );
                        $fields_nama_dok[$i] = array(
                            'name'     => 'nama_dok[]',
                            'contents' => $request->nama_dok[$i],
                        );
                        $fields_no_urut[$i] = array(
                            'name'     => 'no_urut[]',
                            'contents' => $request->no_urut[$i],
                        );
                        $fields_nama_file_seb[$i] = array(
                            'name'     => 'nama_file_seb[]',
                            'contents' => $request->nama_file[$i],
                        );
                    }
                    $send_data = array_merge($send_data, $fields_foto);
                    $send_data = array_merge($send_data, $fields_nama_file_seb);
                    $send_data = array_merge($send_data, $fields_jenis);
                    $send_data = array_merge($send_data, $fields_no_urut);
                    $send_data = array_merge($send_data, $fields_nama_dok);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-trans/jurnal-ubah', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(["data" => $data["success"]], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res["message"];
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        try {

            $client = new Client();
            $response = $client->request('DELETE',  config('api.url') . 'esaku-trans/jurnal', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $id
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res["message"];
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }


    public function getNIKPeriksaByNIK($nik)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-trans/nikperiksa/' . $nik, [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["success"]["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true, 'message' => 'success'], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        try {

            $image_path = $request->file('file')->getPathname();
            $image_mime = $request->file('file')->getmimeType();
            $image_org  = $request->file('file')->getClientOriginalName();
            $fields[0] = array(
                'name'     => 'file',
                'filename' => $image_org,
                'Mime-Type' => $image_mime,
                'contents' => fopen($image_path, 'r'),
            );
            $fields[1] = array(
                'name'     => 'nik_user',
                'contents' => Session::get('nikUser')
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-trans/import-excel', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(['data' => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res;
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }

    public function getJurnalTmp()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-trans/jurnal-tmp', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nik_user' => Session::get('nikUser')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res["message"];
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }
}
