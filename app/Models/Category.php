<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $fillable = ['name', 'path_image'];
    public $timestamps = false;

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
