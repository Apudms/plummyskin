<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class CRUDDistriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.distributors.index', [
            'title' => 'Data Distributor',
            'distributors' => Distributor::with('reseller')->latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.distributors.create', [
            'title' => 'Tambah Data Distributor',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'namaDepan' => 'required|max:255',
            'namaBelakang' => 'required|max:255',
            'tempatLahir' => 'required|max:255',
            'tanggalLahir' => 'required',
            'jenisKelamin' => 'required',
            'wilayah' => 'required|unique:distributors',
            'alamat' => 'required|max:255',
            'provinsi' => 'required|max:255',
            'noTelp' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        Distributor::create($validasi);
        return redirect('/admin/distributors')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        return view('administrator.distributors.show', [
            'title' => 'Detail Data Distributor',
            'distributor' => $distributor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        return view('administrator.distributors.edit', [
            'title' => 'Ubah Data Distributor',
            'distributor' => $distributor,
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
        $data = [
            'namaDepan' => 'required|max:255',
            'namaBelakang' => 'required|max:255',
            'tempatLahir' => 'required|max:255',
            'tanggalLahir' => 'required',
            'jenisKelamin' => 'required',
            'alamat' => 'required|max:255',
            'noTelp' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ];

        if ($request->wilayah != $distributor->wilayah) {
            $data['wilayah'] = 'required|unique:distributors';
        }

        $validasi = $request->validate($data);

        Distributor::where('id', $distributor->id)->update($validasi);
        return redirect('/admin/distributors')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        Distributor::destroy($distributor->id);
        return redirect('/admin/distributors')->with('success', 'Data berhasil dihapus!');
    }
}
