<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferUser extends Model
{
    protected $fillable = ['offer_id', 'user_id'];

    protected $table = 'offer_user';
}
