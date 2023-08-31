<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKit extends Model
{
    use HasFactory;

    protected $table = "detail_kits";
    protected $with = ['marketing_kit'];

    public function scopeNama($query, array $namas)
    {
        $query->when($namas['cari'] ?? false, function ($query, $cari) {
            return $query->where('tipe', 'like', '%' . $cari . '%')
                ->orWhere('nama', 'like', '%' . $cari . '%');
        });
    }

    public function marketing_kit()
    {
        return $this->belongsTo(MarketingKit::class);
    }
}
