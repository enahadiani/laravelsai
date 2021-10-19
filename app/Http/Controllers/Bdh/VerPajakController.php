<?php

namespace App\Http\Controllers\Bdh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class VerPajakController extends Controller
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-pajak', [
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-pajak-akun', [
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
    public function getPP()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-pajak-pp', [
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
    public function getJenisDOk()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-pajak-jenis-dok', [
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
    public function getDrk(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-pajak-drk', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode'    => $request->input('periode'),
                    'kode_akun'  => $request->input('kode_akun'),
                    'kode_pp'    => $request->input('kode_pp')
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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ver-pajak-detail', [
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
            'tanggal'               => 'required',
            'tgl_bukti'             => 'required',
            'no_dokumen'            => 'required',
            'status'                => 'required',
            'deskripsi'             => 'required',
            'no_bukti'              => 'required',
            'kode_pp'               => 'required',
            'bank'                  => 'required',
            'no_rek'                => 'required',
            'total_net_rek'         => 'required',
            'nama_rek'              => 'required',
            'nilai'                 => 'required|array',
            'nilai_jurnal'          => 'required|array',
            'kode_akun_jurnal'          => 'required|array',
        ]);
        try {
            $send_data = array();

            $fields = [
                [
                    'name'      => 'tanggal',
                    'contents'  => $this->reverseDate($request->tanggal, '/', '-'),
                ],
                [
                    'name'      => 'tgl_aju',
                    'contents'  => $this->reverseDate($request->tgl_bukti, '/', '-'),
                ],
                [
                    'name'      => 'status',
                    'contents'  => $request->status
                ],
                [
                    'name'      => 'modul',
                    'contents'  => $request->modul
                ],
                [
                    'name'      => 'memo',
                    'contents'  => $request->deskripsi
                ],
                [
                    'name'      => 'no_aju',
                    'contents'  => $request->no_bukti
                ],
                [
                    'name'      => 'kode_pp_aju',
                    'contents'  => $request->kode_pp_aju
                ],
                [
                    'name'      => 'nik_buat',
                    'contents'  => $request->pembuat_m
                ],
                [
                    'name'      => 'no_dokumen',
                    'contents'  => $request->no_dokumen
                ],
                [
                    'name'      => 'total',
                    'contents'  => intval(preg_replace("/[^0-9]/", "", $request->total_net_rek))
                ],
            ];
            $fields_kode_akun_jurnal = array();
            $fields_dc_jurnal = array();
            $fields_keterangan_jurnal= array();
            $fields_nilai_jurnal= array();
            $fields_kode_pp_jurnal= array();
            $fields_kode_drk_jurnal= array();

            if (count($request->kode_akun_jurnal) > 0) {
                for ($y = 0; $y < count($request->kode_akun_jurnal); $y++) {
                    $fields_kode_akun_jurnal[$y] = array(
                        'name'      => 'kode_akun[]',
                        'contents'  =>  $request->kode_akun_jurnal[$y]
                    );
                    $fields_dc_jurnal[$y] = array(
                        'name'      => 'dc[]',
                        'contents'  => $request->dc_jurnal[$y]
                    );
                    $fields_keterangan_jurnal[$y] = array(
                        'name'      => 'keterangan[]',
                        'contents'  => $request->keterangan_jurnal[$y]
                    );
                    $fields_nilai_jurnal[$y] = array(
                        'name'      => 'nilai[]',
                        'contents'  => intval(preg_replace("/[^0-9]/", "", $request->nilai_jurnal[$y]))
                    );
                    $fields_kode_pp_jurnal[$y] = array(
                        'name'      => 'kode_pp[]',
                        'contents'  =>  $request->kode_pp_jurnal[$y]
                    );
                    $fields_kode_drk_jurnal[$y] = array(
                        'name'      => 'kode_drk[]',
                        'contents'  =>  $request->kode_drk_jurnal[$y]
                    );
                    $send_data = array_merge($fields, $fields_kode_akun_jurnal);
                    $send_data = array_merge($send_data, $fields_dc_jurnal);
                    $send_data = array_merge($send_data, $fields_keterangan_jurnal);
                    $send_data = array_merge($send_data, $fields_nilai_jurnal);
                    $send_data = array_merge($send_data, $fields_kode_pp_jurnal);
                    $send_data = array_merge($send_data, $fields_kode_drk_jurnal);
                }
            } else {
                $send_data = $fields;
            }

            $fields_atensi = array();
            $fields_bank = array();
            $fields_nama_rek = array();
            $fields_no_rek = array();
            $fields_bruto = array();
            $fields_potongan = array();
            $fields_netto = array();

            if (count($request->atensi) > 0) {
                for ($y = 0; $y < count($request->atensi); $y++) {
                    $fields_atensi[$y] = array(
                        'name'      => 'atensi[]',
                        'contents'  => $request->atensi[$y]
                    );
                    $fields_bank[$y] = array(
                        'name'      => 'bank[]',
                        'contents'  => $request->bank[$y]
                    );
                    $fields_nama_rek[$y] = array(
                        'name'      => 'nama_rek[]',
                        'contents'  => $request->nama_rek[$y]
                    );
                    $fields_no_rek[$y] = array(
                        'name'      => 'no_rek[]',
                        'contents'  => $request->no_rek[$y]
                    );
                    $fields_bruto[$y] = array(
                        'name'      => 'bruto[]',
                        'contents'  => intval(preg_replace("/[^0-9]/", "", $request->bruto)[$y])
                    );
                    $fields_potongan[$y] = array(
                        'name'      => 'potongan[]',
                        'contents'  => intval(preg_replace("/[^0-9]/", "", $request->potongan)[$y])
                    );
                    $fields_netto[$y] = array(
                        'name'      => 'netto[]',
                        'contents'  => intval(preg_replace("/[^0-9]/", "", $request->netto)[$y])
                    );

                    $send_data = array_merge($send_data, $fields_atensi);
                    $send_data = array_merge($send_data, $fields_bank);
                    $send_data = array_merge($send_data, $fields_nama_rek);
                    $send_data = array_merge($send_data, $fields_no_rek);
                    $send_data = array_merge($send_data, $fields_bruto);
                    $send_data = array_merge($send_data, $fields_potongan);
                    $send_data = array_merge($send_data, $fields_netto);
                }
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

            $fields_kode_akun_pajak = array();
            $fields_dc_pajak = array();
            $fields_keterangan_pajak= array();
            $fields_nilai_pajak= array();
            $fields_kode_pp_pajak= array();
            $fields_kode_drk_pajak= array();

            if (count($request->kode_akun) > 0) {
                for ($y = 0; $y < count($request->kode_akun); $y++) {
                    $fields_kode_akun_pajak[$y] = array(
                        'name'      => 'kode_akun_pajak[]',
                        'contents'  =>  $request->kode_akun[$y]
                    );
                    $fields_dc_pajak[$y] = array(
                        'name'      => 'dc_pajak[]',
                        'contents'  => $request->dc[$y]
                    );
                    $fields_keterangan_pajak[$y] = array(
                        'name'      => 'keterangan_pajak[]',
                        'contents'  => $request->keterangan[$y]
                    );
                    $fields_nilai_pajak[$y] = array(
                        'name'      => 'nilai_pajak[]',
                        'contents'  => intval(preg_replace("/[^0-9]/", "", $request->nilai[$y]))
                    );
                    $fields_kode_pp_pajak[$y] = array(
                        'name'      => 'kode_pp_pajak[]',
                        'contents'  =>  $request->kode_pp[$y]
                    );
                    $fields_kode_drk_pajak[$y] = array(
                        'name'      => 'kode_drk_pajak[]',
                        'contents'  =>  $request->kode_drk[$y]
                    );
                    $send_data = array_merge($send_data, $fields_kode_akun_pajak);
                    $send_data = array_merge($send_data, $fields_dc_pajak);
                    $send_data = array_merge($send_data, $fields_keterangan_pajak);
                    $send_data = array_merge($send_data, $fields_nilai_pajak);
                    $send_data = array_merge($send_data, $fields_kode_pp_pajak);
                    $send_data = array_merge($send_data, $fields_kode_drk_pajak);
                }
            } else {
                $send_data = $fields;
            }
            // dd($send_data);
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'bdh-trans/ver-pajak', [
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
                'tanggal'  => $this->reverseDate($request->tanggal, '/', '-'),
                'status'  => $request->status,
                'catatan'  => $request->deskripsi,
                'no_aju'  => $request->no_bukti,
                'kode_pp_bukti'  => $request->kode_pp,
                'lokasi_asal'  => $request->lokasi,
                'modul'  => $request->modul,
                'total_approve'  => intval(preg_replace("/[^0-9]/", "", $request->total_approve)),
                'akun_mutasi'  => $request->akun_mutasi,
                'bank'  => $request->bank,
                'no_rek'  => $request->no_rek,
                'nama_rek'  => $request->nama_rek,
            ];
            $fields_nilai_app = array();
            if (count($request->kode_akun) > 0) {
                for ($y = 0; $y < count($request->kode_akun); $y++) {
                    $fields_nilai_app = array(
                        'nilai_app[]'  => intval(preg_replace("/[^0-9]/", "", $request->nilai_app[$y])),
                        'id[]'  => $request->nu[$y]
                    );
                    $send_data = array_merge($fields, $fields_nilai_app);
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
                'query' => $send_data
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(["data" => $data], 200);
            }
        } catch (BadResponseException $ex) {
            dd($send_data);
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
            $response = $client->request('DELETE',  config('api.url') . 'bdh-trans/droping-app', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_aju'    => $request->input('no_aju'),
                    'no_app'    => $request->input('no_app'),
                    'modul'     => $request->input('modul')
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
            return response()->json(['message' => $res, 'status' => false], 200);
        }
    }
}
