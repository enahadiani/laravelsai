<?php

namespace App\Http\Controllers\Esaku\Sdm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class LokerController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-master/sdm-lokers', [
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
            return response()->json(['daftar' => $data, 'status' => true], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_loker' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'kode_area' => 'required',
            'kode_fm' => 'required',
            'kode_bm' => 'required',
        ]);

        try {
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-master/sdm-loker', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_loker' => $request->input('kode_loker'),
                    'nama' => $request->input('nama'),
                    'status' => $request->input('status'),
                    'kode_area' => $request->input('kode_area'),
                    'kode_fm' => $request->input('kode_fm'),
                    'kode_bm' => $request->input('kode_bm'),
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(['data' => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request(
                'GET',
                config('api.url') . 'esaku-master/sdm-loker',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_loker' => $request->query('kode')
                    ]
                ]
            );

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'kode_loker' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'kode_area' => 'required',
            'kode_fm' => 'required',
            'kode_bm' => 'required',
        ]);

        try {
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-master/sdm-loker-update', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_loker' => $request->input('kode_loker'),
                    'nama' => $request->input('nama'),
                    'status' => $request->input('status'),
                    'kode_area' => $request->input('kode_area'),
                    'kode_fm' => $request->input('kode_fm'),
                    'kode_bm' => $request->input('kode_bm'),
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(['data' => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request(
                'DELETE',
                config('api.url') . 'esaku-master/sdm-loker',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_loker' => $request->input('kode')
                    ]
                ]
            );

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }
}
