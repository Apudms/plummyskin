<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CRUDProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('distributor.produk.index', [
            'title' => 'Data Produk',
            'product' => Product::where('distributor_id', auth('distributor')->user()->id)->latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributor.produk.create', [
            'title' => 'Tambah Data Produk',
            'products' => Product::all(),
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
            'name' => 'required|max:255',
            'price' => 'required',
            'berat' => 'required|max:255',
            'stok' => 'required|max:255',
            'quantity' => 'required',
            'jnsKulit' => 'required|max:255',
            'masaSimpan' => 'required|max:255',
            'deskripsi' => 'required',
            'fotoProduk' => 'nullable',
        ]);

        if ($request->hasFile('fotoProduk')) {
            $file = $request->file('fotoProduk');
            $imagemimes = ['mimes:png,jpg,jpeg'];

            if (in_array($file->getMimeType(), $imagemimes)) {
                $validasi['fotoProduk'] = 'mimes:png,jpg,jpeg|file|max:5120';
            }

            $validasi['fotoProduk'] = $request->file('fotoProduk')->store('foto-products');
        }

        $validasi['distributor_id'] = auth('distributor')->user()->id;

        Product::create($validasi);
        return redirect('/distributor/produk')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Product $produk)
    {
        if ($produk->distributor_id !== auth('distributor')->user()->id) {
            abort(403);
        }

        return view('distributor.produk.show', [
            'title' => 'Detail Data Produk',
            'product' => $produk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $produk)
    {
        if ($produk->distributor_id !== auth('distributor')->user()->id) {
            abort(403);
        }

        return view('distributor.produk.edit', [
            'title' => 'Ubah Data Produk',
            'products' => $produk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $produk)
    {
        $validasi = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'berat' => 'required|max:255',
            'stok' => 'required|max:255',
            'quantity' => 'required',
            'jnsKulit' => 'required|max:255',
            'masaSimpan' => 'required|max:255',
            'deskripsi' => 'required',
            'fotoProduk' => 'nullable',
        ]);

        if ($request->hasFile('fotoProduk')) {
            $file = $request->file('fotoProduk');
            $imagemimes = ['mimes:png,jpg,jpeg'];

            if (in_array($file->getMimeType(), $imagemimes)) {
                $validasi['fotoProduk'] = 'mimes:png,jpg,jpeg|file|max:5120';
            }

            $validasi['fotoProduk'] = $request->file('fotoProduk')->store('foto-products');
        }

        $validasi['distributor_id'] = auth('distributor')->user()->id;

        Product::where('id', $produk->id)->update($validasi);
        return redirect('/distributor/produk')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $produk)
    {
        Product::destroy($produk->id);
        return redirect('/distributor/produk')->with('success', 'Data berhasil dihapus!');
    }
}
