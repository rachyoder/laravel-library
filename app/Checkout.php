<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    public function book() {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function cardholder() {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'book_id',
        'user_id'
    ];
}
