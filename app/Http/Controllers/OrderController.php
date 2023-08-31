<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reseller;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = DB::table('orders')
            ->leftJoin('resellers', function ($join) {
                $join->on('resellers.id', '=', 'orders.reseller_id');
            })
            ->leftJoin('distributors', function ($join) {
                $join->on('distributors.id', '=', 'resellers.distributor_id');
            })
            ->leftJoin('transaksis', function ($join) {
                $join->on('transaksis.order_id', '=', 'orders.id');
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
            ->selectRaw('orders.status')
            ->where('resellers.distributor_id', auth('distributor')->user()->id)
            ->latest();

        return view('distributor.pesanan.index', [
            'title' => 'Data Pesanan',
            'pesanan' => $order->paginate(10),
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
     * @param  \App\Models\Order  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Order $pesanan)
    {
        $transaksi = Transaksi::with(['order'])->where('order_id', $pesanan->id)->whereAnd('reseller_id', $pesanan->reseller_id)->first();
        $datadistri = Reseller::with(['distributor'])->where('distributor_id', auth('distributor')->user()->id)->first();
        $detail = DetailOrder::with(['order'])->where('order_id', $pesanan->id)->get();
        $detailProduk = Product::latest()->get();
        $order = Order::find($pesanan->id);
        return view('distributor.pesanan.detail', [
            'title' => 'Rincian Pesanan',
            'transaksi' => $transaksi,
            'datadistri' => $datadistri,
            'detail' => $detail,
            'detailProduk' => $detailProduk,
            'order' => $order,
            'now' => Carbon::now()->toDateTimeString(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $pesanan)
    {
        $transaksi = Transaksi::with(['order'])->where('order_id', $pesanan->id)->whereAnd('reseller_id', $pesanan->reseller_id)->first();
        $datadistri = Reseller::with(['distributor'])->where('distributor_id', auth('distributor')->user()->id)->first();
        $detail = DetailOrder::with(['order'])->where('order_id', $pesanan->id)->get();
        $detailProduk = Product::latest()->get();
        $order = Order::find($pesanan->id);
        return view('distributor.pesanan.edit', [
            'title' => 'Rincian Pesanan',
            'transaksi' => $transaksi,
            'datadistri' => $datadistri,
            'detail' => $detail,
            'detailProduk' => $detailProduk,
            'order' => $order,
            'now' => Carbon::now()->toDateTimeString(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $pesanan)
    {
        // dd($request);
        $transaksi = Transaksi::find($pesanan->id);
        $order = Order::find($pesanan->id);

        if ($request->input('status') == "Disetujui") {
            $transaksi->status = "Disetujui";
            if ($request->input('status') == "Disetujui") {
                $order->status = "Dikemas";
                $order->save();
            }
            $transaksi->save();
        } elseif ($request->input('status') == "Ditolak") {
            $transaksi->status = "Ditolak";
            $transaksi->save();
        }


        if ($request->input('status') == "Dibatalkan") {
            $order->status = "Dibatalkan";
            if ($request->input('status') == "Dibatalkan") {
                $transaksi->status = "Ditolak";
                $transaksi->save();
            }
            $order->save();
        } elseif ($request->input('status') == "Dikirim") {
            $order->status = "Dikirim";
            $order->save();
        }

        return redirect('/distributor/pesanan')->with('success', 'Pesanan telah dikonfirmasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $pesanan)
    {
        //
    }
}
