<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\DetailOrder;
use App\Models\Product;
use App\Models\Reseller;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
    public function render()
    {
        $students = DB::table('orders')
            ->leftJoin('resellers', function ($join) {
                $join->on('resellers.id', '=', 'orders.reseller_id');
            })
            ->RightJoin(DB::raw("(select detail_orders.order_id, detail_orders.quantity from detail_orders) as detail_orders"), function ($join) {
                $join->on("detail_orders.order_id", "=", "orders.id");
            })
            ->selectRaw('COUNT(order_id) as noReseller')
            ->selectRaw('SUM(detail_orders.quantity) as jumlahPCS')
            ->selectRaw('resellers.namaDepan')
            ->selectRaw('resellers.namaBelakang')
            ->selectRaw('resellers.alamat')
            ->selectRaw('SUM(orders.subtotal) as Total')
            ->groupBy('resellers.id', 'resellers.namaDepan', 'resellers.namaBelakang', 'resellers.alamat')
            ->orderByRaw('jumlahPCS DESC')
            ->get();

        return view('livewire.home-component', [
            'title' => 'Halaman Utama',
            'admin' => Admin::where('id', 1)->get('noTelp'),
            'reseller' => Reseller::all(),
            'produk' => Product::all()->sortByDesc('id')->take(6),
            'reorder' => $students->take(1),
            'reorder2' => $students->take(2)->skip(1),
            'detail' => DetailOrder::all(),
        ])->layout('reseller.layouts.base');
    }
}
