<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    protected $guarded = [];

    public function thread()
    {
        return $this->belongsTo('App\Models\Thread', 'thread_id');
    }
}
