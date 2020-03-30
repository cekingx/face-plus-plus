<?php

namespace App\Http\Controllers;

use App\Identifikasi;
use App\Pendatang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class IdentifikasiController extends Controller
{
    protected $api_key;
    protected $api_secret;
    protected $face_detect_url;
    protected $face_compare_url;

    public function __construct() {
        $this->api_key = env('API_KEY');
        $this->api_secret = env('API_SECRET');
        $this->face_detect_url = env('FACE_DETECT_URL');
        $this->face_compare_url = env('FACE_COMPARE_URL');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Identifikasi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/identifikasi/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');

        // Mendapatkan face_token1
        $requestFaceToken = $this->requestFaceToken($file);
        $dataRequestFaceToken = json_decode($requestFaceToken->getBody()->getContents());
        $face_token2 = $dataRequestFaceToken->{'faces'}[0]->{'face_token'};

        // UUID untuk proses identifikasi face_token2
        $uuid = Uuid::generate()->string;

        // 12 digit kode nik
        $kode_wilayah = DB::table('wilayah')
                                ->select('kode')
                                ->where('kecamatan', $request->kecamatan)
                                ->first();
        $date = \Carbon\Carbon::parse($request->tanggal_lahir);
        $kode = $kode_wilayah->kode . $date->format('dmy');
        
        // array dari nik yang mirip
        $comparator_arr = Pendatang::where('nik', 'like', $kode . "%")->get();

        // loop compare api
        foreach($comparator_arr as $pendatang) {
            $faceCompare = $this->compareToApi($pendatang->face_token, $face_token2);
            $compareResult = json_decode($faceCompare->getBody()->getContents());
            $confidence = $compareResult->{'confidence'};

            Identifikasi::create([
                'uuid' => $uuid,
                'face_token1' => $pendatang->face_token,
                'comparator_nik' => $pendatang->nik,
                'face_token2' => $face_token2,
                'confidence' => $confidence
            ]);
        }

        return Identifikasi::where('uuid', $uuid)->get();
    }

    /**
     * Menampilkan data berdasarkan uuid
     *
     * @param  \App\Identifikasi  $identifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Identifikasi $identifikasi)
    {
        // 
    }

    public function show_uuid($uuid) {
        $result = Identifikasi::where('uuid', $uuid)->get();

        $data = response(['uuid' => $uuid, 'result' => $result]);

        return view('pages.identifikasi.show')->with('data', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Identifikasi  $identifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Identifikasi $identifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Identifikasi  $identifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Identifikasi $identifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Identifikasi  $identifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Identifikasi $identifikasi)
    {
        //
    }

    // =====================================================================================

    /**
     * Membandingkan face_token1 dengan face_token2 kemudian menyimpannya
     * di database
     * 
     * @param $face_token1
     * @param $face_token2
     */

    public function compareToApi($face_token1, $face_token2) {

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', $this->face_compare_url, [
            'multipart' => [
                [
                    'name' => 'api_key',
                    'contents' => $this->api_key
                ],
                [
                    'name' => 'api_secret',
                    'contents' => $this->api_secret
                ],
                [
                    'name' => 'face_token1',
                    'contents' => $face_token1
                ],
                [
                    'name' => 'face_token2',
                    'contents' => $face_token2
                ]
            ]
        ]);

        return $response;
    } 

    /**
     * Mendapatkan face_token dari foto yang di upload
     * 
     * @param $file
     * @return $face_token
     * 
     */
    public function requestFaceToken($file) {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', $this->face_detect_url, [
            'multipart' => [
                [
                    'name' => 'api_key',
                    'contents' => $this->api_key
                ],
                [
                    'name' => 'api_secret',
                    'contents' => $this->api_secret
                ],
                [
                    'name' => 'image_file',
                    'contents' => fopen($file->getPathName(), 'r')
                ]
            ]
        ]);

        return $response;
    }
}
