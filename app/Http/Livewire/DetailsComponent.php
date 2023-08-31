<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Product;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class DetailsComponent extends Component
{
    public $slug;
    public $products;
    public array $quantity = [];

    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);
        Cart::instance('cart')->add(
            $product->id,
            $product->name,
            $this->quantity[$product_id],
            $product->price,
        )->associate('App\Models\Product');
        $this->emit('cart_updated');
        return back()->with('success_message', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->products = Product::all();
        foreach ($this->products as $product) {
            $this->quantity[$product->id] = 1;
        }
    }

    public function render()
    {
        $produktoko = Product::where('slug', $this->slug)->first();

        return view('livewire.details-component', [
            'product' => $produktoko,
            'admin' => Admin::where('id', 1)->get('noTelp'),
        ])->layout('reseller.layouts.base');
    }
}
