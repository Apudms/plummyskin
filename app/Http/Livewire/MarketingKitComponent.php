<?php

namespace App\Http\Livewire;

use App\Models\DetailKit;
use App\Models\MarketingKit;
use Illuminate\Http\Request;
use Livewire\Component;

class MarketingKitComponent extends Component
{
    public function export()
    {
        return response()->download(public_path('storage/marketing-kits/XWG4098lBQO3k5IqJAyNsBxi3nnWy83gUzYAkLTa.jpg'));
    }

    public function render()
    {
        return view('livewire.marketing-kit-component', [
            'markit' => MarketingKit::latest()->get(),
            // 'detail' => DetailKit::latest()->get(),
        ])->layout('reseller.layouts.base');
    }
}
