<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Distributor;
use Livewire\Component;

class DistriResellerComponent extends Component
{
    public function render()
    {
        return view('livewire.distri-reseller-component', [
            'title' => 'Distributor',
            'admin' => Admin::where('id', 1)->get('noTelp'),
            'distributors' => Distributor::latest()->nama(request(['cari']))->get(),
        ])->layout('reseller.layouts.base');
    }
}
