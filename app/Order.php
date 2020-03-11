<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'address',
        'notes',
        'phone',
        'status',
        'email'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class)->withPivot('quantity', 'price_each', 'created_at', 'updated_at');
    }
}
