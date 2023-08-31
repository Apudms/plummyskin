<?php

namespace App\Models;

use App\Models\Distributor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Reseller extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = 'reseller';
    protected $with = ['distributor', 'order'];

    public function scopeNama($query, array $namas)
    {
        $query->when($namas['cari'] ?? false, function ($query, $cari) {
            return $query->whereHas('distributor', function ($query) use ($cari) {
                $query->where('wilayah', 'like', '%' . $cari . '%')
                    ->orWhere('namaDepan', 'like', '%' . $cari . '%')
                    ->orWhere('namaBelakang', 'like', '%' . $cari . '%');
            })
                ->orwhere('noTelp', 'like', '%' . $cari . '%')
                ->orWhere('namaDepan', 'like', '%' . $cari . '%')
                ->orWhere('namaBelakang', 'like', '%' . $cari . '%');
        });
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'distributor_id',
        'namaDepan',
        'namaBelakang',
        'tempatLahir',
        'tanggalLahir',
        'jenisKelamin',
        'alamat',
        'provinsi',
        'noTelp',
        'foto',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
