<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    protected $fillable = [
        'id', 'user_id', 'name', 'midias', 'categories', 'value', 'description',
        'type_raffle', 'details_type', 
    ];
    
}
