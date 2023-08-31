<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function reseller()
    {
        return $this->belongsTo(Reseller::class);
    }

    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
