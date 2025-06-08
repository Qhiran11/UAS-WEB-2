<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage; // <-- INI YANG PERLU DITAMBAHKAN

class Komponen extends Model
{
    protected $table = 'komponen';
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
            // Hapus file gambar dari storage saat komponen dihapus
            if ($komponen->gambar) {
                // Sekarang 'Storage' sudah dikenali
                Storage::disk('uploads')->delete('komponen/' . $komponen->gambar);
            }
        });
    }
}