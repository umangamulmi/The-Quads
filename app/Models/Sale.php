<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'transaction_id',
        'product_id'
    ];

    public $timestamps = false;
}
