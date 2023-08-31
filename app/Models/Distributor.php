<?php

namespace App\Models;

use App\Models\Reseller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Distributor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "distributors";

    public function scopeNama($query, array $namas)
    {
        $query->when($namas['cari'] ?? false, function ($query, $cari) {
            return $query->where('wilayah', 'like', '%' . $cari . '%')
                ->orWhere('provinsi', 'like', '%' . $cari . '%')
                ->orWhere('namaDepan', 'like', '%' . $cari . '%')
                ->orWhere('namaBelakang', 'like', '%' . $cari . '%');
        });
    }

    public function resellers()
    {
        return $this->hasMany(Reseller::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected $fillable = [
        'namaDepan',
        'namaBelakang',
        'slug',
        'tempatLahir',
        'tanggalLahir',
        'jenisKelamin',
        'wilayah',
        'alamat',
        'provinsi',
        'noTelp',
        'noRek',
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

    /**

     * Boot the model.

     */

    protected static function boot()
    {
        parent::boot();

        static::created(function ($distributor) {

            $distributor->slug = $distributor->createSlug($distributor->wilayah);

            $distributor->save();
        });
    }

    /** 
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($wilayah)
    {
        if (static::whereSlug($slug = Str::slug($wilayah))->exists()) {

            $max = static::whereWilayah($wilayah)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
