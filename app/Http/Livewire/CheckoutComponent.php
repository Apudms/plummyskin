<?php

namespace App\Http\Livewire;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reseller;
use App\Models\Transaksi;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutComponent extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public $firstname;
    public $lastname;
    public $noTelp;
    public $email;
    public $alamat;
    public $kecamatan;
    public $kabupaten;
    public $provinsi;
    public $kodepos;
    public $status;

    public $transfer;

    public $berhasil;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'noTelp' => 'required',
            'email' => 'nullable',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required',
            'transfer' => 'required',
        ]);
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'noTelp' => 'required',
            'email' => 'nullable',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required',
            'transfer' => 'required',
        ]);

        $order = new Order();
        $order->reseller_id = auth('reseller')->user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->ongkir = session()->get('checkout')['ongkir'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->noTelp = $this->noTelp;
        $order->email = $this->email;
        $order->alamat = $this->alamat;
        $order->kecamatan = $this->kecamatan;
        $order->kabupaten = $this->kabupaten;
        $order->provinsi = $this->provinsi;
        $order->kodepos = $this->kodepos;
        $order->status = 'memesan';
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $detailOrder = new DetailOrder();
            $detailOrder->product_id = $item->id;
            $detailOrder->order_id = $order->id;
            $detailOrder->price = $item->price;
            $detailOrder->quantity = $item->qty;
            $detailOrder->save();
        }

        if ($this->transfer == 'Bank') {
            $transaksi = new Transaksi();
            $transaksi->reseller_id = auth('reseller')->user()->id;
            $transaksi->order_id = $order->id;
            $transaksi->transfer = 'Bank';
            $transaksi->status = 'menunggu';
            $transaksi->save();
        }

        if ($this->transfer == 'Dana') {
            $transaksi = new Transaksi();
            $transaksi->reseller_id = auth('reseller')->user()->id;
            $transaksi->order_id = $order->id;
            $transaksi->transfer = 'Dana';
            $transaksi->status = 'menunggu';
            $transaksi->save();
        }

        if ($this->transfer == 'Shopeepay') {
            $transaksi = new Transaksi();
            $transaksi->reseller_id = auth('reseller')->user()->id;
            $transaksi->order_id = $order->id;
            $transaksi->transfer = 'Shopeepay';
            $transaksi->status = 'menunggu';
            $transaksi->save();
        }

        $this->berhasil = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        if ($this->berhasil) {
            return redirect()->route('berhasil');
        } elseif (Cart::instance('cart')->count(false) == 0) {
            return redirect()->route('reseller.home');
        }
    }

    public function render(Reseller $reseller)
    {
        $this->verifyForCheckout();
        $cart_count = Cart::instance('cart')->content()->count();
        return view('livewire.checkout-component', [
            'title' => 'Checkout',
            'pemesan' => $reseller,
        ], compact('cart_count'))->layout('reseller.layouts.base');
    }
}
