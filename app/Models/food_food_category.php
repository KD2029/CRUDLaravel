<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food_food_category extends Model
{
    use HasFactory;
    protected $table = 'food_food_category';

    protected $fillable = [
        'food_id',
        'food_category_id'
    ];
}
