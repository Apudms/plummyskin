<?php

namespace App\Http\Controllers;

use App\Models\EdukasiMitra;
use Illuminate\Http\Request;

class CRUDEduMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.edukasimitra.index', [
            'title' => 'Data Edukasi Mitra',
            'edukasimitra' => EdukasiMitra::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.edukasiMitra.create', [
            'title' => 'Tambah Data Edukasi Mitra'
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
            'link' => 'required',
            'keterangan' => 'required',
        ]);

        EdukasiMitra::create($validasi);
        return redirect('/admin/edukasimitra')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EdukasiMitra  $edukasimitra
     * @return \Illuminate\Http\Response
     */
    public function show(EdukasiMitra $edukasimitra)
    {
        return view('administrator.edukasimitra.show', [
            'title' => 'Detail Data Edukasi Mitra',
            'edukasimitra' => $edukasimitra,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EdukasiMitra  $edukasimitra
     * @return \Illuminate\Http\Response
     */
    public function edit(EdukasiMitra $edukasimitra)
    {
        return view('administrator.edukasimitra.edit', [
            'title' => 'Ubah Data Edukasi Mitra',
            'edukasimitra' => $edukasimitra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EdukasiMitra  $edukasimitra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EdukasiMitra $edukasimitra)
    {
        $data = [
            'link' => 'required',
            'keterangan' => 'required',
        ];

        $validasi = $request->validate($data);

        EdukasiMitra::where('id', $edukasimitra->id)->update($validasi);
        return redirect('/admin/edukasimitra')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EdukasiMitra  $edukasimitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(EdukasiMitra $edukasimitra)
    {
        EdukasiMitra::destroy($edukasimitra->id);
        return redirect('/admin/edukasimitra')->with('success', 'Data berhasil dihapus!');
    }
}
