<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return back()->with('success_message', 'Produk berhasil dihapus!');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
    }

    public function checkout()
    {
        if (Auth::guard('reseller')->check()) {
            return redirect()->route('reseller.pesan');
        } else {
            return redirect()->route('reseller.login.index');
        }
    }

    public function setAmountforCheckout()
    {
        session()->put('checkout', [
            'subtotal' => Cart::instance('cart')->subtotal() * 1000,
            'ongkir' => 20000,
            'priceTotal' => Cart::instance('cart')->priceTotal(),
            'total' => (Cart::instance('cart')->total() * 1000) + 20000,
        ]);
    }

    public function render()
    {
        $this->setAmountforCheckout();

        return view('livewire.cart-component', [
            'title' => 'Keranjang',
        ])->layout('reseller.layouts.base');
    }
}
