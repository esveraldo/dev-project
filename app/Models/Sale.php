<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['store_id', 'date', 'order_id', 'client_cpf', 'client_name', 'product_barcode', 'product_quantity', 'order_total', 'order_quantity'];
}
