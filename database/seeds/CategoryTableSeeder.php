<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        Category::create(array(
            'name'       => 'Bazar e Armarinho',
            'path_image' => env('APP_URL').'/images/categories/1/bazar.png'
        ));

        Category::create(array(
            'name'       => 'Papelaria',
            'path_image' => env('APP_URL').'/images/categories/2/papelaria.png'
        ));

        Category::create(array(
            'name'       => 'Informática',
            'path_image' => env('APP_URL').'/images/categories/3/informatica.png'
        ));

        Category::create(array(
            'name'       => 'Limpeza',
            'path_image' => env('APP_URL').'/images/categories/4/limpeza.png'
        ));

        Category::create(array(
            'name'       => 'Aviamento',
            'path_image' => env('APP_URL').'/images/categories/5/aviamento.png'
        ));

        Category::create(array(
            'name'       => 'Desenho e pintura',
            'path_image' => env('APP_URL').'/images/categories/6/desenho-e-pintura.png'
        ));

        Category::create(array(
            'name'       => 'Tecidos',
            'path_image' => env('APP_URL').'/images/categories/7/tecidos.png'
        ));

        Category::create(array(
            'name'       => 'Artesanato',
            'path_image' => env('APP_URL').'/images/categories/8/artesanato.png'
        ));

        Category::create(array(
            'name'       => 'Festas',
        ));

        Category::create(array(
            'name'       => 'Casa e decoração',
            'path_image' => env('APP_URL').'/images/categories/9/casa-e-decoracao.png'
        ));

        Category::create(array(
            'name'       => 'Carnaval',
            'path_image' => env('APP_URL').'/images/categories/10/carnaval.png'
        ));

        Category::create(array(
            'name'       => 'Bijuteria',
            'path_image' => env('APP_URL').'/images/categories/11/bijuteria.png'
        ));

        Category::create(array(
            'name'       => 'Ferragem',
            'path_image' => env('APP_URL').'/images/categories/12/ferragem.png'
        ));

        Category::create(array(
            'name'       => 'Ballet',
            'path_image' => env('APP_URL').'/images/categories/13/Ballet.png'
        ));
    }
}
