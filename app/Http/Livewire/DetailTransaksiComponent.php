<?php

namespace App\Http\Livewire;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reseller;
use App\Models\Transaksi;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class DetailTransaksiComponent extends Component
{
    use WithFileUploads;

    public $buktiTransfer, $newBuktiTransfer, $order_id, $status;

    public function mount($order_id)
    {
        $transaksi = Transaksi::with(['order'])->where('order_id', $this->order_id)->whereAnd('reseller_id', auth('reseller')->user()->id)->first();

        if ($transaksi->order->reseller_id !== auth('reseller')->user()->id) {
            abort(403);
        }

        $this->order_id = $order_id;
        $order = Order::where('id', $order_id)->whereAnd('reseller_id', auth('reseller')->user()->id)->first();
        $this->buktiTransfer = $order->buktiTransfer;
        $this->status = $order->status;
    }

    public function updateBuktiTransfer()
    {
        $transaksi = Transaksi::with(['order'])->where('order_id', $this->order_id)->whereAnd('reseller_id', auth('reseller')->user()->id)->first();

        if ($transaksi->order->reseller_id !== auth('reseller')->user()->id) {
            abort(403);
        }

        $order = Order::find($this->order_id);
        if ($this->newBuktiTransfer) {
            $buktiTransferName = Carbon::now()->timestamp . '.' . $this->newBuktiTransfer->extension();
            $this->newBuktiTransfer->storeAs('buktiTransfer', $buktiTransferName);
            $order->buktiTransfer = $buktiTransferName;
        }
        $order->save();
        session()->flash('success_message', 'Foto berhasil diunggah!');
    }

    public function updateStatusPesanan()
    {
        $order = Order::where('id', $this->order_id)->whereAnd('reseller_id', auth('reseller')->user()->id)->first();

        if ($order->reseller_id !== auth('reseller')->user()->id) {
            abort(403);
        }

        $order = Order::find($this->order_id);
        $order->status = 'Diterima';
        $order->save();
        return back()->with('success_status', 'Terima kasih, sampai jumpa di pesanan selanjutnya!');
    }

    public function render()
    {
        $transaksi = Transaksi::with(['order'])->where('order_id', $this->order_id)->whereAnd('reseller_id', auth('reseller')->user()->id)->first();

        if ($transaksi->order->reseller_id !== auth('reseller')->user()->id) {
            abort(403);
        }

        $datadistri = Reseller::with(['distributor'])->where('id', auth('reseller')->user()->id)->first();
        $detail = DetailOrder::with(['order'])->where('order_id', $this->order_id)->get();
        $detailProduk = Product::latest()->get();
        $order = Order::find($this->order_id)->with(['reseller'])->where('reseller_id', auth('reseller')->user()->id)->get();
        return view('livewire.detail-transaksi-component', [
            'transaksi' => $transaksi,
            'datadistri' => $datadistri,
            'detail' => $detail,
            'detailProduk' => $detailProduk,
            'order' => $order,
            'now' => Carbon::now()->toDateTimeString(),
        ])->layout('reseller.layouts.base');
    }
}
