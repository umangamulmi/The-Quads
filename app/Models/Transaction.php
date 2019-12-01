<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'actor_id',
        'customer_name',
        'total',
        'created_at',
        'updated_at',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'sales');
    }

    public function actor()
    {
        $result = $this->belongsTo('App\Models\Actor', 'actor_id')->select(['id', 'name'])->withDefault([
            'name' => '[Deleted Name]',
        ]);

        return $result;
    }
}
//    public function posts()
//    {
//        return $this->hasMany(Post::class);
//    }
