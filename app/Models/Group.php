<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $fillable = ['name', 'category_id', 'status'];
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_group');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
