<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_obat', 'id_pembeli', 'tanggal', 'id_user', 'keterangan'
    ];

    public function pembeli(): BelongsTo
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli', 'id');
    }

    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
