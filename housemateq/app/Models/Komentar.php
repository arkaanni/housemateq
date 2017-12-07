<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';

    public function thread()
    {
        return $this->belongsTo('App\Models\Thread', 'thread_id');
    }
}
