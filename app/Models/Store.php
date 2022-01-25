<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'provinsi',
        'kota',
        'slug',
        'alamat',
        'no_telepon',
        'avatar',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_store')->withTimestamps();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function suspend()
    {
        return $this->hasOne(Suspend::class);
    }
}
