<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepeatOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $or = DB::table('orders')
            ->leftJoin('resellers', function ($join) {
                $join->on('resellers.id', '=', 'orders.reseller_id');
            })
            ->leftJoin('distributors', function ($join) {
                $join->on('distributors.id', '=', 'resellers.distributor_id');
            })
            ->selectRaw('orders.created_at')
            ->selectRaw('orders.id as orderId')
            ->selectRaw('orders.reseller_id')
            ->selectRaw('resellers.id as ressId')
            ->selectRaw('resellers.distributor_id')
            ->selectRaw('resellers.namaDepan')
            ->selectRaw('resellers.namaBelakang')
            ->selectRaw('resellers.alamat')
            ->selectRaw('orders.subtotal')
            ->selectRaw('orders.total')
            ->selectRaw('orders.buktiTransfer')
            ->latest()->paginate(10)->withQueryString();

        $transaksi = Transaksi::with(['order'])->latest()->get();
        $datadistri = Reseller::with(['distributor'])->latest()->get();
        $detail = DetailOrder::with(['order'])->latest()->get();
        $detailProduk = Product::latest()->get();
        $order = Order::latest()->get();

        return view('administrator.repeatorder.index', [
            'title' => 'Data Repeat Order',
            'pesanan' => $or,
            'transaksi' => $transaksi,
            'datadistri' => $datadistri,
            'detail' => $detail,
            'detailProduk' => $detailProduk,
            'order' => $order,
            'now' => Carbon::now()->toDateTimeString(),
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('administrator.repeatorder.detail', [
            'title' => 'Detail Data Repeat Order'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
