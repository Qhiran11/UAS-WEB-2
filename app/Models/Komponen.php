<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komponen extends Model
{
    // Ini penting untuk menghindari asumsi Laravel yang otomatis menjamakkan nama tabel
    protected $table = 'komponen';

    protected $fillable = ['nama_komponen', 'jenis_komponen_id', 'harga_komponen', 'stok_komponen'];
    
    public function jenisKomponen()
    {
        return $this->belongsTo(JenisKomponen::class, 'jenis_komponen_id');
    }
}
