<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeUnlike extends Model
{
    protected $table = "like_unlikes";
    protected $gaurded = [];

    public function item()
    {
    return $this->belongsTo(User::class,'user_id');
    }

}
