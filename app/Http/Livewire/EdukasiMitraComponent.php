<?php

namespace App\Http\Livewire;

use App\Models\EdukasiMitra;
use Livewire\Component;

class EdukasiMitraComponent extends Component
{
    public function render()
    {
        return view('livewire.edukasi-mitra-component', [
            'edukasi' => EdukasiMitra::all(),
        ])->layout('reseller.layouts.base');
    }
}
