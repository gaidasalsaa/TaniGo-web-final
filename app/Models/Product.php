<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    protected $fillable = ['user_id', 'nama_produk', 'kategori', 'deskripsi', 'stok', 'harga', 'foto'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
