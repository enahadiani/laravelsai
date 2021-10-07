<?php

namespace App\Http\Controllers\Bdh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SerahTerimaDokOnController extends Controller
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/serah-dok-pb', [
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
    public function getPenerima()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/serah-dok-nik', [
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

    public function show(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/serah-dok-detail', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_pb'    => $request->input('no_pb')
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


    public function store(Request $request)
    {
        $this->validate($request, [
            'no_dokumen' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'kode_akun' => 'required|array',
            'kegiatan' => 'required|array',
            'nilai' => 'required|array',
            'pp' => 'required'
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
                    'name' => 'kode_pp',
                    'contents' => $request->pp,
                ],
                [
                    'name' => 'deskripsi',
                    'contents' => $request->deskripsi,
                ],
                [
                    'name' => 'total',
                    'contents' => $request->total_droping,
                ]
            ];


            $fields_kode_akun = array();
            $fields_kegiatan = array();
            $fields_nilai = array();

            if (count($request->kode_akun) > 0) {

                for ($i = 0; $i < count($request->kode_akun); $i++) {
                    $fields_kode_akun[$i] = array(
                        'name'     => 'kode_akun[]',
                        'contents' => $request->kode_akun[$i],
                    );
                    $fields_kegiatan[$i] = array(
                        'name'     => 'kegiatan[]',
                        'contents' => $request->kegiatan[$i],
                    );
                    $fields_nilai[$i] = array(
                        'name'     => 'nilai[]',
                        'contents' => intval(preg_replace("/[^0-9]/", "", $request->nilai)[$i]),
                    );
                }
                $send_data = array_merge($fields, $fields_kode_akun);
                $send_data = array_merge($send_data, $fields_kegiatan);
                $send_data = array_merge($send_data, $fields_nilai);
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
                            'name'     => 'kode_jenis[]',
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
            $response = $client->request('POST',  config('api.url') . 'bdh-trans/droping-aju', [
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
        try {
            $this->validate($request, [
                'kode' => 'required',
                'nama' => 'required',
            ]);
            $client = new Client();
            $response = $client->request('PUT',  config('api.url') . 'bdh-master/dok-jenis', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'        => 'application/json',
                ],
                'form_params' => [
                    'kode_jenis'    => $request->kode,
                    'nama'          => $request->nama,
                    'idx'           => $request->idx
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
            $result['message'] = $res;
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }
    public function destroy(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url') . 'bdh-master/dok-jenis', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_jenis' => $request->input('kode_jenis')
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
