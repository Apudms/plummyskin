<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EdukasiMitra extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeNama($query, array $namas)
    {
        $query->when($namas['cari'] ?? false, function ($query, $cari) {
            return $query->where('link', 'like', '%' . $cari . '%')
                ->orWhere('keterangan', 'like', '%' . $cari . '%');
        });
    }
}
