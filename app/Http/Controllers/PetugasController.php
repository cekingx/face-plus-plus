<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Petugas::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/petugas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petugas = Petugas::create(
            $request->only([
                'nama',
                'instansi',
                'username',
                'password'
            ])
        );

        return $petugas;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        //
    }

    /**
     * Login
     * Mencari username dan membandingkan password
     * @param Request $request
     * @return Petugas $petugas jika username dan password match
     * @return False jika username dan password tidak match
     */
    public function login(Request $request) {
        $petugas = Petugas::where('username', $request->username)->first();

        if ($petugas == null) {
            return response([
                'status' => '404',
                'petugas' => '',
                'error' => 'username not found'
            ]);
        } else if ($petugas->password == $request->password) {
            return response([
                'status' => '200',
                'petugas' => $petugas,
                'error' => ''
            ]);
        } else {
            return response([
                'status' => '403', 
                'petugas' => '',
                'error' => 'password not match'
            ]);
        }
        
    }
}
