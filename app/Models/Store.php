<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'phone', 'address',
        'lat', 'long', 'open_on', 'closed_on', 'path_image'];

    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'offer_store')->with('product');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_store');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_store');
    }
}