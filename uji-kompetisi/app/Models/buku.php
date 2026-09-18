<?php



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class buku extends Model
{
    // Mengizinkan semua field pada model untuk diisi.
    protected $guarded = [];

    // Relasi buku dengan tabel kategori.
    // Satu buku memiliki satu kategori.
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }

    // Relasi buku dengan tabel penerbit.
    // Satu buku memiliki satu penerbit.
    public function penerbit(): BelongsTo
    {
        return $this->belongsTo(penerbit::class);
    }
}