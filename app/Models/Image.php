<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;

    public $fillable = ['product_id', 'path'];

    public function products() {
        return $this->belongsTo(Product::class);
    }
}
