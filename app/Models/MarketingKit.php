<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingKit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function scopeNama($query, array $namas)
    {
        $query->when($namas['cari'] ?? false, function ($query, $cari) {
            return $query->where('kit', 'like', '%' . $cari . '%')
                ->orWhere('keterangan', 'like', '%' . $cari . '%');
        });
    }

    // public function detailKits()
    // {
    //     return $this->hasMany(DetailKit::class);
    // }
}
