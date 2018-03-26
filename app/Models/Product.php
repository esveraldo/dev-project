<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'code', 'price', 'modeofuse', 'points',
        'info', 'brand_id', 'path_image',
        'barcode', 'barcode_path_image', 'installment'
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function groups() {
        return $this->belongsToMany(Group::class, 'product_group');
    }

    public function stores() {
        return $this->belongsToMany(Store::class, 'product_store');
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function encartes()
    {
        return $this->hasMany(Encarte::class);
    }

    public function offerActive()
    {
        return $this->hasMany(Offer::class)->where('status', '=', 1);
    }

    public function lists()
    {
        return $this->belongsToMany(Lista::class);
    }

}