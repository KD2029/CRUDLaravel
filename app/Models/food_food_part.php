<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food_food_part extends Model
{
    use HasFactory;
    protected $table = 'food_food_part';

    protected $fillable = [
        'food_id',
        'food_part_id'
    ];

    public function food()
    {
        return $this->belongsTo(food::class);
    }

    public function food_part()
    {
        return $this->belongsTo(food_part::class);
    }
}
