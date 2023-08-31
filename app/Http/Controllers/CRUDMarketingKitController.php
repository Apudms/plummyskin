<?php

namespace App\Http\Controllers;

use App\Models\MarketingKit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CRUDMarketingKitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.marketingkit.index', [
            'title' => 'Data Marketing Kit',
            'marketingkit' => MarketingKit::latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.marketingkit.create', [
            'title' => 'Tambah Data Marketing Kit',
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
        // dd($request);
        $validasi = $request->validate([
            'tipe' => 'required|max:255',
            'kit' => 'nullable',
            'keterangan' => 'required|max:255',
        ]);

        if ($request->hasFile('kit')) {
            $file = $request->file('kit');
            $imagemimes = ['mimes:png,jpg,jpeg'];
            $videomimes = ['mimes:mp4,mov,avi,mkv'];

            if (in_array($file->getMimeType(), $imagemimes)) {
                $validasi['kit'] = 'mimes:png,jpg,jpeg|file|max:5120';
            }

            if (in_array($file->getMimeType(), $videomimes)) {
                $validasi['kit'] = 'mimes:mp4,mov,avi,mkv|file|max:30720';
            }

            $validasi['kit'] = $request->file('kit')->store('marketing-kits');
        }

        MarketingKit::create($validasi);
        return redirect('/admin/marketingkit')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarketingKit  $marketingkit
     * @return \Illuminate\Http\Response
     */
    public function show(MarketingKit $marketingkit)
    {
        return view('administrator.marketingkit.show', [
            'title' => 'Detail Data Marketing Kit',
            'marketingkit' => $marketingkit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarketingKit  $marketingkit
     * @return \Illuminate\Http\Response
     */
    public function edit(MarketingKit $marketingkit)
    {
        return view('administrator.marketingkit.edit', [
            'title' => 'Ubah Data Marketing Kit',
            'marketingkit' => $marketingkit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarketingKit  $marketingkit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarketingKit $marketingkit)
    {
        $validasi = $request->validate([
            'tipe' => 'required|max:255',
            'kit' => 'nullable',
            'keterangan' => 'required|max:255',
        ]);

        if ($request->hasFile('kit')) {
            $file = $request->file('kit');
            $imagemimes = ['mimes:png,jpg,jpeg'];
            $videomimes = ['mimes:mp4,mov,avi,mkv'];

            if (in_array($file->getMimeType(), $imagemimes)) {
                $validasi['kit'] = 'mimes:png,jpg,jpeg|file|max:5120';
            }

            if (in_array($file->getMimeType(), $videomimes)) {
                $validasi['kit'] = 'mimes:mp4,mov,avi,mkv|file|max:30720';
            }

            $validasi['kit'] = $request->file('kit')->store('marketing-kits');
        }

        MarketingKit::where('id', $marketingkit->id)->update($validasi);
        return redirect('/admin/marketingkit')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarketingKit  $marketingkit
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarketingKit $marketingkit)
    {
        MarketingKit::destroy($marketingkit->id);
        return redirect('/admin/marketingkit')->with('success', 'Data berhasil dihapus!');
    }
}
