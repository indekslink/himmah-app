<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspend extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'keterangan'
    ];
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
