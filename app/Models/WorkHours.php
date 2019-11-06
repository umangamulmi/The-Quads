<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkHours extends Model
{
    protected $fillable = [
        'actor_id',
        'login_status',
        'created_at',
        'updated_at',
    ];
    public function actor()
    {
        return $this->belongsTo('App\Models\Actor');
    }

}
