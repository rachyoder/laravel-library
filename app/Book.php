<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'checked_time',
        'due_date'
    ];

    public function checkout() {
        return $this->hasOne('App\Checkout', 'book_id');   
    }
}

