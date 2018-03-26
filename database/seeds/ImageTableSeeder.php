<?php

use App\Models\Product;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    public function run()
    {
        /*foreach (Product::all() as $product){
            Image::create(array(
                'product_id'                => $product->id,
                'path'                      => env('APP_URL').'/images/products/'.$product->id.'/gallery/1506605955.jpg',
            ));

            Image::create(array(
                'product_id'                => $product->id,
                'path'                      => env('APP_URL').'/images/products/'.$product->id.'/gallery/1506605959.jpg',
            ));
        }*/

        Image::create(array(
            'product_id'                => 8,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210351.jpg',
        ));

        Image::create(array(
            'product_id'                => 8,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210637.jpg',
        ));

        Image::create(array(
            'product_id'                => 8,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210569.jpg',
        ));

        Image::create(array(
            'product_id'                => 8,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210117.jpg',
        ));

        Image::create(array(
            'product_id'                => 8,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210706.jpg',
        ));

        Image::create(array(
            'product_id'                => 8,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210981.jpg',
        ));

        Image::create(array(
            'product_id'                => 8,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210564.jpg',
        ));

        Image::create(array(
            'product_id'                => 8,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210576.jpg',
        ));

        Image::create(array(
            'product_id'                => 8,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210790.jpg',
        ));

        Image::create(array(
            'product_id'                => 1,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210351.jpg',
        ));

        Image::create(array(
            'product_id'                => 1,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210637.jpg',
        ));

        Image::create(array(
            'product_id'                => 1,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210569.jpg',
        ));

        Image::create(array(
            'product_id'                => 1,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210117.jpg',
        ));

        Image::create(array(
            'product_id'                => 1,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210706.jpg',
        ));

        Image::create(array(
            'product_id'                => 1,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210981.jpg',
        ));

        Image::create(array(
            'product_id'                => 1,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210564.jpg',
        ));

        Image::create(array(
            'product_id'                => 1,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210576.jpg',
        ));

        Image::create(array(
            'product_id'                => 1,
            'path'                      => env('APP_URL').'/images/products/8/gallery/1511291210790.jpg',
        ));

        //factory(App\Models\Image::class, 50)->create();
    }
}
