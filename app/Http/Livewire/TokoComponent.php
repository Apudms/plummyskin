<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Distributor;
use App\Models\Product;
use Livewire\Component;

class TokoComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $distritoko = Distributor::where('slug', $this->slug)->first();
        return view('livewire.toko-component', [
            'title' => 'Distributor',
            'distributor' => $distritoko,
            'admin' => Admin::where('id', 1)->get('noTelp'),
            'products' => Product::where('distributor_id', $distritoko->id)->get(),
        ])->layout('reseller.layouts.base');
    }
}
