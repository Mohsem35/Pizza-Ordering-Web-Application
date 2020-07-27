<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $casts = [
        'toppings' => 'array'     //toppings = column name and it casts into array 
    ];
}
