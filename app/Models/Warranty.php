<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;
    protected $fillable = [
        'warranty_duration',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
