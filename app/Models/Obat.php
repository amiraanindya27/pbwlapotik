<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'harga', 'stok'
    ];

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_obat', 'id');
    }
}
