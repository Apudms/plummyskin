<?php

namespace App\Http\Livewire;

use App\Models\Reseller;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyProfileComponent extends Component
{
    use WithFileUploads;

    public $namaDepan;
    public $namaBelakang;
    public $tempatLahir;
    public $tanggalLahir;
    public $jenisKelamin;
    public $alamat;
    public $noTelp;
    public $foto;
    public $newFoto;
    public $password;
    public $newPassword;

    public function mount()
    {
        $reseller = Reseller::find(auth('reseller')->user()->id);
        $this->namaDepan = $reseller->namaDepan;
        $this->namaBelakang = $reseller->namaBelakang;
        $this->tempatLahir = $reseller->tempatLahir;
        $this->tanggalLahir = $reseller->tanggalLahir;
        $this->jenisKelamin = $reseller->jenisKelamin;
        $this->alamat = $reseller->alamat;
        $this->noTelp = $reseller->noTelp;
        $this->foto = $reseller->foto;
        $this->password = $reseller->password;
    }

    public function updateReseller()
    {
        $reseller = Reseller::find(auth('reseller')->user()->id);
        $reseller->namaDepan = $this->namaDepan;
        $reseller->namaBelakang = $this->namaBelakang;
        $reseller->tempatLahir = $this->tempatLahir;
        $reseller->tanggalLahir = $this->tanggalLahir;
        $reseller->jenisKelamin = $this->jenisKelamin;
        $reseller->alamat = $this->alamat;
        $reseller->noTelp = $this->noTelp;
        $reseller->foto = $this->foto;

        if ($this->newFoto) {
            if ($this->foto) {
                unlink('storage/photo-profile-resellers/' . $this->foto);
            }
            $fotoName = Carbon::now()->timestamp . '.' . $this->newFoto->extension();
            $this->newFoto->storeAs('photo-profile-resellers', $fotoName);
            $reseller->foto = $fotoName;
        }

        if ($this->newPassword) {
            $newP = bcrypt($this->newPassword);
            $reseller->password = $newP;
        }

        $reseller->save();
        return back()->with('success_message', 'Data Berhasil Diubah!');
    }

    public function render()
    {
        return view('livewire.my-profile-component')->layout('reseller.layouts.base');
    }
}
