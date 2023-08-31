<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('distributor.pengaturan.index', [
            'title' => 'Akun Saya',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        return view('distributor.pengaturan.index', [
            'title' => 'Akun Saya',
            'user' => $distributor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {
        $newDistri = Distributor::find(auth('distributor')->user()->id);

        $newDistri->namaDepan = $request->input('namaDepan');
        $newDistri->namaBelakang = $request->input('namaBelakang');
        $newDistri->tempatLahir = $request->input('tempatLahir');
        $newDistri->tanggalLahir = $request->input('tanggalLahir');
        $newDistri->jenisKelamin = $request->input('jenisKelamin');
        $newDistri->alamat = $request->input('alamat');
        $newDistri->provinsi = $request->input('provinsi');
        $newDistri->noTelp = $request->input('noTelp');
        $newDistri->noRek = $request->input('noRek');
        $newDistri->bank = $request->input('bank');
        $newDistri->email = $request->input('email');

        if ($request->password !== $newDistri->password) {
            $newDistri->password = bcrypt($request->input('password'));
        }

        $newDistri->save();
        return redirect('/distributor/akun-saya')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        //
    }
}
