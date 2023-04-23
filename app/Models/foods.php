<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foods extends Model
{
    use HasFactory;
    

//Add a title to the fillable array in your model Post, to allow saving through creating and massive methods

protected $guarded = [];  

protected $fillable = [
    'name',
    'api_name',
    'image',
    'description',

];

public function food_categories()
{
    return $this->belongsToMany(food_categories::class);
}

public function food_parts()
{
    return $this->belongsToMany(food_part::class);
}

public function nutrition_information()
{
    return $this->hasMany(nutrition_information::class);
}

}
