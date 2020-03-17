<?php

namespace App\Http\Controllers;

use App\RiwayatTinggal;
use App\Pendatang;
use Illuminate\Http\Request;

class RiwayatTinggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RiwayatTinggal::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.riwayat.tambah-riwayat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pendatang_id = Pendatang::where('nik', $request->nik)->first();

        $riwayat = new RiwayatTinggal(['riwayat_tinggal' => $request->riwayat_tinggal]);

        $pendatang_id->riwayat()->save($riwayat);

        return response([$pendatang_id, $pendatang_id->riwayat]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RiwayatTinggal  $riwayatTinggal
     * @return \Illuminate\Http\Response
     */
    public function show(RiwayatTinggal $riwayatTinggal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RiwayatTinggal  $riwayatTinggal
     * @return \Illuminate\Http\Response
     */
    public function edit(RiwayatTinggal $riwayatTinggal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RiwayatTinggal  $riwayatTinggal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiwayatTinggal $riwayatTinggal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RiwayatTinggal  $riwayatTinggal
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiwayatTinggal $riwayatTinggal)
    {
        //
    }
}
