<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class TransaksiComponent extends Component
{
    public function render()
    {
        return view('livewire.transaksi-component', [
            'order' => Order::where('reseller_id', auth('reseller')->user()->id)->latest()->paginate(10)->withQueryString(),
            'now' => Carbon::now()->toDateTimeString(),
        ])->layout('reseller.layouts.base');
    }
}
