<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messaging extends Model
{
    protected $fillable = ['title', 'message', 'status'];
}
