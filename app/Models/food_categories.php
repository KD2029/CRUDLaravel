<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food_categories extends Model
{
    use HasFactory;

    protected $table = 'food_categories';

    protected $fillable = [
        'name',
    ];

    public function foods()
    {
        return $this->belongsToMany(food::class);
    }
}
