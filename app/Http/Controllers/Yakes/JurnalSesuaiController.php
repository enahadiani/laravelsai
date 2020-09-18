<?php

namespace App\Http\Controllers\Yakes;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class JurnalSesuaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('yakes-auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-trans/index',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'tanggal' => 'required',
            'total' => 'required',
            'no_dokumen' => 'required',
            'deskripsi' => 'required',

            'no_urut' => 'required|array',
            'kode_akun' => 'required|array',
            'dc' => 'required|array',
            'keterangan' => 'required|array',
            'nilai' => 'required|array',
            'kode_pp' => 'required|array',
            'kode_fs' => 'required|array',
        ]);

        try {
            $explode_tgl = explode('/', $request->tanggal);
            $tgl = $explode_tgl[0];
            $bln = $explode_tgl[1];
            $tahun = $explode_tgl[2];
            $tanggal = $tahun."-".$bln."-".$tgl;

            $nilai = intval(str_replace('.','', $request->total));

            $arrJurnal = array();

            for($i=0;$i<count($request->no_urut);$i++) {
                $arrJurnal[] = array(
                    'no_urut' => $request->no_urut[$i],
                    'kode_akun' => $request->kode_akun[$i],
                    'dc' => $request->dc[$i],
                    'keterangan' => $request->keterangan[$i],
                    'nilai' => intval(str_replace('.','', $request->nilai[$i])),
                    'kode_pp' => $request->kode_pp[$i],
                    'kode_fs' => $request->kode_fs[$i]
                );
            }

            $data = array(
                'tanggal' => $tanggal,
                'kode_pp' => Session::get('kodePP'),
                'nilai' => $nilai,
                'no_dokumen' => $request->no_dokumen,
                'keterangan' => $request->deskripsi,
                'arrjurnal' => $arrJurnal
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'yakes-trans/jurnal',[
                        'headers' => [
                            'Authorization' => 'Bearer '.Session::get('token'),
                            'Content-Type'  => 'application/json',
                        ],
                        'body' => json_encode($data)
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function getData($id) {
         try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'yakes-trans/getBuktiDetail?no_bukti='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data['success']], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request, $id, $periode) {
        $this->validate($request, [
            'tanggal' => 'required',
            'total' => 'required',
            'no_dokumen' => 'required',
            'deskripsi' => 'required',

            'no_urut' => 'required|array',
            'kode_akun' => 'required|array',
            'dc' => 'required|array',
            'keterangan' => 'required|array',
            'nilai' => 'required|array',
            'kode_pp' => 'required|array',
            'kode_fs' => 'required|array',
        ]);

        try {
            $explode_tgl = explode('/', $request->tanggal);
            $tgl = $explode_tgl[0];
            $bln = $explode_tgl[1];
            $tahun = $explode_tgl[2];
            $tanggal = $tahun."-".$bln."-".$tgl;

            $nilai = intval(str_replace('.','', $request->total));

            $arrJurnal = array();

            for($i=0;$i<count($request->no_urut);$i++) {
                $arrJurnal[] = array(
                    'no_urut' => $request->no_urut[$i],
                    'kode_akun' => $request->kode_akun[$i],
                    'dc' => $request->dc[$i],
                    'keterangan' => $request->keterangan[$i],
                    'nilai' => intval(str_replace('.','', $request->nilai[$i])),
                    'kode_pp' => $request->kode_pp[$i],
                    'kode_fs' => $request->kode_fs[$i]
                );
            }

            $data = array(
                'tanggal' => $tanggal,
                'periode' => $request->periode,
                'kode_pp' => Session::get('kodePP'),
                'nilai' => $nilai,
                'no_dokumen' => $request->no_dokumen,
                'keterangan' => $request->deskripsi,
                'arrjurnal' => $arrJurnal
            );

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'yakes-trans/jurnal?no_bukti='.$id.'&periode='.$periode,[
                        'headers' => [
                            'Authorization' => 'Bearer '.Session::get('token'),
                            'Content-Type'  => 'application/json',
                        ],
                        'body' => json_encode($data)
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'yakes-trans/jurnal?no_bukti='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }
   
}
