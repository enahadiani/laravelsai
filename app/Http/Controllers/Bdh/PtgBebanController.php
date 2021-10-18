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
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ptg-beban-pp', [
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
    public function getDrk(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ptg-beban-drk', [
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

    public function getAkun()
    {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ptg-beban-akun', [
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
    public function getJenis()
    {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ptg-beban-jenis-dok', [
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

    public function GenerateBukti(Request $request)
    {
        try {

            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ptg-beban-nobukti', [
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

    public function cekBudget(Request $request)
    {
        try {


            // $fields = [
            //     'periode'   => $request->input('periode'),
            //     'no_bukti'  => $request->input('no_bukti')
            // ];
            // $merge_query_agg = array();
            // for ($i=0; $i < count($request->input('kode_akun_agg')) ; $i++) {
            //     $fields['kode_akun_agg[]'][] = $request->input('kode_akun_agg')[$i];
            //     $fields['kode_pp_agg[]'][] = $request->input('kode_pp_agg')[$i];
            //     $fields['kode_drk_agg[]'][] = $request->input('kode_drk_agg')[$i];
            //     $fields['nilai_agg[]'][] = intval(preg_replace("/[^0-9]/", "", $request->input('nilai_agg')[$i]));
            //    array_push($fields, [
            //         'kode_akun_agg[]'  => $request->input('kode_akun_agg')[$i],
            //         'kode_pp_agg[]'  => $request->input('kode_pp_agg')[$i],
            //         'kode_drk_agg[]'  => $request->input('kode_drk_agg')[$i],
            //         'nilai_agg[]' => intval(preg_replace("/[^0-9]/", "", $request->input('nilai_agg')[$i])),
            //     ]

            //    );

            // }
            // dd($request->all());

            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'bdh-trans/ptg-beban-budget', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
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
            'deskripsi' => 'required',
            'kode_akun' => 'required|array',
            'keterangan' => 'required|array',
            'dc' => 'required|array',
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
                    'name' => 'due_date',
                    'contents' => $this->reverseDate($request->duedate, '/', '-'),
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
                    'name' => 'nik_buat',
                    'contents' => $request->nik_buat,
                ],
                [
                    'name' => 'nik_tahu',
                    'contents' => $request->nik_tahu,
                ],
                [
                    'name' => 'nik_ver',
                    'contents' => $request->nik_ver,
                ],
            ];

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
                        'contents'  => $request->cabang_bank[$y]
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

                    $send_data = array_merge($fields, $fields_atensi);
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


            $fields_kode_akun = array();
            $fields_dc = array();
            $fields_keterangan = array();
            $fields_nilai = array();
            $fields_kode_pp = array();
            $fields_kode_drk = array();

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
                        'contents' => intval(preg_replace("/[^0-9]/", "", $request->nilai)[$i]),
                    );
                    $fields_keterangan[$i] = array(
                        'name'     => 'keterangan[]',
                        'contents' => $request->keterangan[$i],
                    );
                    $fields_kode_pp[$i] = array(
                        'name'     => 'kode_pp[]',
                        'contents' => $request->kode_pp[$i],
                    );
                    $fields_kode_drk[$i] = array(
                        'name'     => 'kode_drk[]',
                        'contents' => $request->kode_drk[$i],
                    );
                }
                $send_data = array_merge($send_data, $fields_kode_akun);
                $send_data = array_merge($send_data, $fields_dc);
                $send_data = array_merge($send_data, $fields_nilai);
                $send_data = array_merge($send_data, $fields_keterangan);
                $send_data = array_merge($send_data, $fields_kode_pp);
                $send_data = array_merge($send_data, $fields_kode_drk);
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

            $fields_kode_akun_agg = array();
            $fields_kode_pp_agg = array();
            $fields_kode_drk_agg = array();
            $fields_nilai_agg = array();
            $fields_saldo_awal_agg = array();
            $fields_saldo_akhir_agg = array();
            if(count($request->kode_akun_agg) > 0){
                for ($b=0; $b < count($request->kode_akun_agg) ; $b++) {
                    $fields_kode_akun_agg[$b] = array(
                        'name'     => 'kode_akun_agg[]',
                        'contents' => $request->kode_akun_agg[$b],
                    );
                    $fields_kode_pp_agg[$b] = array(
                        'name'     => 'kode_pp_agg[]',
                        'contents' => $request->kode_pp_agg[$b],
                    );
                    $fields_kode_drk_agg[$b] = array(
                        'name'     => 'kode_drk_agg[]',
                        'contents' => $request->kode_drk_agg[$b],
                    );
                    $fields_nilai_agg[$b] = array(
                        'name'     => 'nilai_agg[]',
                        'contents' => $request->nilai_agg[$b],
                    );
                    $fields_saldo_awal_agg[$b] = array(
                        'name'     => 'saldo_awal_agg[]',
                        'contents' => $request->saldo_awal_agg[$b],
                    );
                    $fields_saldo_akhir_agg[$b] = array(
                        'name'     => 'saldo_akhir_agg[]',
                        'contents' => $request->saldo_akhir_agg[$b],
                    );
                    $send_data = array_merge($send_data, $fields_kode_akun_agg);
                    $send_data = array_merge($send_data, $fields_kode_pp_agg);
                    $send_data = array_merge($send_data, $fields_kode_drk_agg);
                    $send_data = array_merge($send_data, $fields_nilai_agg);
                    $send_data = array_merge($send_data, $fields_saldo_awal_agg);
                    $send_data = array_merge($send_data, $fields_saldo_akhir_agg);
                }
            }else{
                $send_data = $fields;
            }
            // dd($send_data);
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'bdh-trans/ptg-beban', [
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
            $result['message'] = $res;
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
    public function destroy(Request $request)
    {
        try {

            $client = new Client();
            $response = $client->request('DELETE',  config('api.url') . 'bdh-trans/ptg-beban', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->input('kode')
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
