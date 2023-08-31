<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\Reseller;
use Illuminate\Http\Request;

class CRUDResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.reseller.index', [
            'title' => 'Data Reseller',
            'reseller' => Reseller::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.reseller.create', [
            'title' => 'Tambah Data Reseller',
            'distributors' => Distributor::all(),
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
            'distributor_id' => 'required',
            'alamat' => 'required|max:255',
            'noTelp' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        Reseller::create($validasi);
        return redirect('/admin/reseller')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function show(Reseller $reseller)
    {
        return view('administrator.reseller.show', [
            'title' => 'Detail Data Reseller',
            'reseller' => $reseller,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function edit(Reseller $reseller)
    {
        return view('administrator.reseller.edit', [
            'title' => 'Ubah Data Reseller',
            'reseller' => $reseller,
            'distributors' => Distributor::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reseller $reseller)
    {
        $data = [
            'namaDepan' => 'required|max:255',
            'namaBelakang' => 'required|max:255',
            'tempatLahir' => 'required|max:255',
            'tanggalLahir' => 'required',
            'jenisKelamin' => 'required',
            'distributor_id' => 'required',
            'alamat' => 'required|max:255',
            'noTelp' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ];

        $validasi = $request->validate($data);

        Reseller::where('id', $reseller->id)->update($validasi);
        return redirect('/admin/reseller')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reseller $reseller)
    {
        Reseller::destroy($reseller->id);
        return redirect('/admin/reseller')->with('success', 'Data berhasil dihapus!');
    }
}
