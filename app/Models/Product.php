<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'name',
        'describe',
        'category',
        'stored_quantity',
        'sold_amount',
        'user_id'
    ];
    protected $hidden = [
        'user_id'
    ];
}
