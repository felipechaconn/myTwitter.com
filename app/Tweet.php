<?php

namespace App;
use Likable;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
