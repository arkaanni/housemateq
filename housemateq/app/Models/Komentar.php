<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $guarded = [];

    public function thread()
    {
        return $this->belongsTo('App\Models\Thread', 'thread_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
