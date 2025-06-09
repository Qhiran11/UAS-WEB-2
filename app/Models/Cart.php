<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['user_id', 'komponen_id', 'quantity'];

    /**
     * Mendapatkan data komponen yang terkait dengan item keranjang ini.
     */
    public function komponen()
    {
        return $this->belongsTo(Komponen::class, 'komponen_id');
    }

    /**
     * Mendapatkan data user pemilik keranjang.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}