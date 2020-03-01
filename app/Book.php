<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withTimestamps();
    }
}
