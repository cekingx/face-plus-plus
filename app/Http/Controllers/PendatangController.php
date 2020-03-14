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
        return view('pages.daftar-wajah');
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

        $requestTokenObj = $this->requestFaceToken($file);

        $json = $requestTokenObj->getBody()->getContents();

        $data = json_decode($json);

        $face_token = $data->{'faces'}[0]->{'face_token'};

        return $face_token;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendatang  $pendatang
     * @return \Illuminate\Http\Response
     */
    public function show(Pendatang $pendatang)
    {
        //
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

    public function requestFaceToken($file) {

        $client = new \GuzzleHttp\Client();
        $getFaceTokenUrl = "https://api-us.faceplusplus.com/facepp/v3/detect";
        $api_key = "aYKmBusFTtwLB5Y6vTZpP3nXqE7Bg0iA";
        $api_secret = "MQRWGyqYlvMkYcc1eRWFtTiNbtw8mVuf";

        $respon = $client->request('POST', $getFaceTokenUrl, [
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

        return $respon;
    }
}
