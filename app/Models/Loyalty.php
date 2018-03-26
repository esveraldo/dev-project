<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loyalty extends Model
{
    protected $table = 'loyalties';
    protected $fillable = ['user_id', 'points', 'last_points'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
