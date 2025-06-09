<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Komponen extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'komponen'; // <-- TAMBAHKAN BARIS INI

    protected $fillable = ['nama_komponen', 'jenis_komponen_id', 'harga_komponen', 'stok_komponen', 'gambar'];

    public function jenisKomponen()
    {
        return $this->belongsTo(JenisKomponen::class, 'jenis_komponen_id');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleting(function (Komponen $komponen) {
            if ($komponen->gambar) {
                Storage::disk('uploads')->delete('komponen/' . $komponen->gambar);
            }
        });
    }
}