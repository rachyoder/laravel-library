<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author'
    ];

    public function checkout() {
        return $this->hasOne('App\Checkout', 'book_id');   
    }
}

