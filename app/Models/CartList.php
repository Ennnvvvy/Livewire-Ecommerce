<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartList extends Model
{
    use HasFactory;

    protected $table = 'cartlist';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //! TODO
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
