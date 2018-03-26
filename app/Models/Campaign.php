<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['name', 'description', 'states', 'cities', 'neighborhoods', 'stores', 'platforms', 'genders', 'lists', 'ages', 'products'];
}

