<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Encarte extends Model
{
    protected $fillable = [
        'product_id', 'type', 'info', 'unit', 'installment',
        'price', 'status', 'start_at', 'expire_at', 'rescue_point',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start_at',
        'expire_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class,'offer_campaigns');
    }

    public static function getByDistance($lat, $lng, $distance)
    {
        try {
            $results = DB::select(
                DB::raw('
                    SELECT 
                        products.id AS product_id,
                        products.name AS product_name,
                        products.path_image AS product_image,
                        products.brand_id AS product_brand,
                        products.price AS product_price,
                        products.installment AS product_installment,
                        encartes.price AS offer_price,
                        encartes.installment AS offer_installment
                    FROM
                      products
                    JOIN
                      encartes ON encartes.product_id = products.id
                    WHERE
                      products.id IN (SELECT 
                      encartes.product_id
                    FROM
                      encartes
                    WHERE
                      encartes.id IN (SELECT 
                      encarte_store.encarte_id
                    FROM
                      encarte_store
                    WHERE
                      encarte_store.store_id IN (SELECT 
                      stores.id
                    FROM
                      stores
                    WHERE
                        (3959 * ACOS(COS(RADIANS(' . $lat . ')) * 
                        COS(RADIANS(lat)) * 
                        COS(RADIANS(lng) - RADIANS(' . $lng . ')) + 
                        SIN(RADIANS(' . $lat . ')) * 
                        SIN(RADIANS(lat)))) < ' . $distance . ')) 
                    AND 
                      encartes.status = 1
                    AND 
                      encartes.expire_at > NOW()
                    AND 
                      encartes.start_at < NOW())'
                ));
        } catch (QueryException $e) {
            //Victor - Se o usuário não informar lat/lng/distance  enviamos os produtos do Centro/RJ
            $results = Product::whereHas('stores', function($query) {
                $query->where('id', 4);
            })->get();
        }

        return $results;
    }
}
