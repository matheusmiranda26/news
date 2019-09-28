<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = [
        'description'
    ];

    public function news()
    {
        return $this->belongsToMany('App\Models\News');
    }
}
