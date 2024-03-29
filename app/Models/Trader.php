<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_name',
        'customer_name',
        'address',
        'mobile',
        'email',
        'contact_person',
        'owner',
        'opening_balance',

    ];

    public function purchase() {
        return $this->hasMany(Purchase::class);
    }
}
