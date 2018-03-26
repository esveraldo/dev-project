<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = 'lists';

    public $fillable = ['name', 'cacula'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function productsWithOffer()
    {
        return $this->belongsToMany(Product::class)->with('offerActive');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
}