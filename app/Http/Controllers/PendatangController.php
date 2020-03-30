<?php

namespace App\Http\Controllers;

use App\Pendatang;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PendatangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pendatang::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pendatang.daftar-wajah');
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

        // Mendapatkan face_token
        $requestFaceToken = $this->requestFaceToken($file);
        $dataRequestFaceToken = json_decode($requestFaceToken->getBody()->getContents());
        $face_token = $dataRequestFaceToken->{'faces'}[0]->{'face_token'};

        // Menyimpan face_token ke faceset
        $saveFaceToken = $this->addFaceTokenToFaceset($face_token);
        $statusCode = $saveFaceToken->getStatusCode();
        $reasonPhrase = $saveFaceToken->getReasonPhrase();

        if ($statusCode == 200) {
            $pendatang = Pendatang::make(
                $request->only([
                    'nik', 
                    'nama',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'jenis_kelamin',
                    'gol_darah',
                    'kabupaten',
                    'kecamatan',
                    'desa',
                    'alamat',
                    'agama',
                    'status_perkawinan',
                    'pekerjaan',
                    'kewarganegaraan' 
                ])
            );

            $pendatang->face_token = $face_token;
            $pendatang->save();

            return $pendatang;
        } else {
            return response(['status' => $statusCode, 'reason' => $reasonPhrase]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendatang  $pendatang
     * @return \Illuminate\Http\Response
     */
    public function show(Pendatang $pendatang)
    {
        return view('pages.pendatang.show');
    }

    public function showByNik($nik) {
        $data = Pendatang::where('nik', $nik)->first();

        return view('pages.pendatang.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendatang  $pendatang
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendatang $pendatang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendatang  $pendatang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendatang $pendatang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendatang  $pendatang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendatang $pendatang)
    {
        //
    }

    // ================================================================================= //

    /**
     * Mengembalikan tingkan kemiripan gambar terdaftar dengan gambar yang dikirim
     * @return confidence
     */
    public function compare(Request $request) {

        // Mendapatkan face_token dari database
        $pendatang = Pendatang::where('nik', $request->nik)->with('riwayat')->first();
        $face_token = $pendatang->face_token;
        $file = $request->file('foto');

        //Melakukan compare
        $faceCompare = $this->compareToApi($face_token, $file);
        $compareResult = json_decode($faceCompare->getBody()->getContents());
        $confidence = $compareResult->{'confidence'};
        $pendatang->confidence = $confidence;

        return $pendatang;
    }

    /**
     * Melakukan compare wajah dengan face_token ke API
     * @param $token
     * @return psr7 response
     */
    public function compareToApi($token, $file) {

        $client = new \GuzzleHttp\Client();
        $faceCompareUrl = "https://api-us.faceplusplus.com/facepp/v3/compare";
        $api_key = "aYKmBusFTtwLB5Y6vTZpP3nXqE7Bg0iA";
        $api_secret = "MQRWGyqYlvMkYcc1eRWFtTiNbtw8mVuf";

        $response = $client->request('POST', $faceCompareUrl, [
            'multipart' => [
                [
                    'name' => 'api_key',
                    'contents' => $api_key
                ],
                [
                    'name' => 'api_secret',
                    'contents' => $api_secret
                ],
                [
                    'name' => 'face_token1',
                    'contents' => $token
                ],
                [
                    'name' => 'image_file2',
                    'contents' => fopen($file->getPathName(), 'r')
                ]
            ]
        ]);

        return $response;
    }

    /**
     * Meminta 'face_token' dari suatu foto yang diupload
     * 
     * @param $file foto
     * @return psr7 response
     */
    public function requestFaceToken($file) {

        $client = new \GuzzleHttp\Client();
        $getFaceTokenUrl = "https://api-us.faceplusplus.com/facepp/v3/detect";
        $api_key = "aYKmBusFTtwLB5Y6vTZpP3nXqE7Bg0iA";
        $api_secret = "MQRWGyqYlvMkYcc1eRWFtTiNbtw8mVuf";

        $response = $client->request('POST', $getFaceTokenUrl, [
            'multipart' => [
                [
                    'name' => 'api_key',
                    'contents' => $api_key
                ],
                [
                    'name' => 'api_secret',
                    'contents' => $api_secret
                ],
                [
                    'name' => 'image_file',
                    'contents' => fopen($file->getPathName(), 'r')
                ]
            ]
        ]);

        return $response;
    }


    /**
     * Menyimpan 'face_token' ke faceset 'pendatang_faceset'
     * Karena 'face-token' akan expired 72 jam setelah dibuat jika
     * tidak disimpan ke faceset
     * 
     * @param 'face_token'
     * @return psr7 response 
     */
    public function addFaceTokenToFaceset($token) {

        $client = new \GuzzleHttp\Client();
        $addToFacesetServer = "https://api-us.faceplusplus.com/facepp/v3/faceset/addface";
        $api_key = "aYKmBusFTtwLB5Y6vTZpP3nXqE7Bg0iA";
        $api_secret = "MQRWGyqYlvMkYcc1eRWFtTiNbtw8mVuf";
        $outer_id = "pendatang_faceset";

        $response = $client->request('POST', $addToFacesetServer, [
            'multipart' => [
                [
                    'name' => 'api_key',
                    'contents' => $api_key
                ],
                [
                    'name' => 'api_secret',
                    'contents' => $api_secret
                ],
                [
                    'name' => 'outer_id',
                    'contents' => $outer_id
                ],
                [
                    'name' => 'face_tokens',
                    'contents' => $token
                ]
            ]
        ]);

        return $response;
    }
}
