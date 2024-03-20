<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trader;

class Purchase extends Model
{
    use HasFactory;


    public function suppliers() {
        return $this->hasMany(Trader::class);
    }
}
