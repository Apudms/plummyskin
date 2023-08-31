<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Cart;

class NavbarComponent extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $cart_count = Cart::instance('cart')->content()->count();

        return view('livewire.navbar-component', [
            'title' => 'Halaman Utama',
            'admin' => Admin::where('id', 1)->get('noTelp'),
        ], compact('cart_count'))->layout('reseller.layouts.base');
    }
}
