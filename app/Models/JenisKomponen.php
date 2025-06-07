<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JenisKomponen extends Model
{
    protected $table = 'jenis_komponen';

    protected $fillable = ['nama_jenis', 'created_at', 'updated_at'];

}
