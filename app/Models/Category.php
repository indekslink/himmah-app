<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guards = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'category_store')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product')->withTimestamps()->orderByDesc('products.created_at');
    }
}
