<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JenisKomponen extends Model
{
    protected $table = 'jenis_komponen';

    protected $fillable = ['nama_jenis', 'created_at', 'updated_at'];

    public function komponen()
    {
        return $this->hasMany(Komponen::class, 'jenis_komponen_id');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleting(function (JenisKomponen $jenisKomponen) {
            // Hapus semua komponen yang terkait saat jenis komponen ini dihapus
            $jenisKomponen->komponen()->each(function ($komponen) {
                $komponen->delete(); // Ini akan memicu event 'deleting' pada model Komponen
            });
        });
    }

}
