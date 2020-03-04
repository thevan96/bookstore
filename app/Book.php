<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'genre_id', 'publisher_id', 'description', 'available_quantity', 'price', 'sale', 'publication_date'];

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withTimestamps();
    }
}
