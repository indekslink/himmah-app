<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketUmroh extends Model
{
    use HasFactory;

    protected $table = 'paket_umroh';
    protected $fillable = [
        'gambar',
        'judul',
        'slug',
        'deskripsi',
        'harga',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
