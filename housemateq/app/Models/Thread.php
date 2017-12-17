<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';
    protected $guarded = [];

    public function wishlist()
    {
        return $this->hasMany('App\Models\Wishlist');
    }

    public function komentar()
    {
        return $this->hasMany('App\Models\Komentar');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
