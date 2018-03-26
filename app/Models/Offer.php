<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Offer extends Model
{
    protected $fillable = [
        'product_id', 'type', 'info', 'unit', 'installment',
        'price', 'point_to_win', 'status', 'start_at', 'expire_at', 'rescue_point',
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

    public function users()
    {
        return $this->belongsToMany(User::class);
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
                        offers.price AS offer_price,
                        offers.installment AS offer_installment
                    FROM
                      products
                    JOIN
                      offers ON offers.product_id = products.id
                    WHERE
                      products.id IN (SELECT 
                      offers.product_id
                    FROM
                      offers
                    WHERE
                      offers.id IN (SELECT 
                      offer_store.offer_id
                    FROM
                      offer_store
                    WHERE
                      offer_store.store_id IN (SELECT 
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
                      offers.status = 1
                    AND 
                      offers.expire_at > NOW()
                    AND 
                      offers.start_at < NOW())'
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
