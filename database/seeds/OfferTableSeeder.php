<?php

use Illuminate\Database\Seeder;

use App\Models\Offer;
use App\Models\Product;

class OfferTableSeeder extends Seeder
{
    public function run()
    {
        foreach(Product::all() as $key => $product)
        {
            Offer::create(array(
                'product_id'        => $product->id,
                'type'              => 'Varejo',
                'unit'              => rand(10, 90),
                'price'             => $product->price - ($product->price * 20 / 100),
                'info'              => $product->info,
                'status'            => '1',
            ));
        }

        /*Offer::create(array(
            'id'                => '1',
            'product_id'        => '1',
            'type'              => 'Varejo',
            'unit'              => '10',
            'price'             => '120.34',
            'info'              => 'Além de toda a tecnologia, os cartuchos originais HP oferecem opções ainda mais vantajosas para seu bolso, como as embalagens XL e os combos, que ajudam você a economizar até 50%².',
            'status'            => '1',
        ));

        Offer::create(array(
            'id'                => '2',
            'product_id'        => '2',
            'type'              => 'Atacado',
            'unit'              => '50',
            'price'             => '75.34',
            'info'              => 'A pilha Alcalina Duracell possui potência confiável e prolongada. ',
            'status'            => '1',
        ));

        Offer::create(array(
            'id'                => '3',
            'product_id'        => '3',
            'type'              => 'Varejo',
            'unit'              => '80',
            'price'             => '10.34',
            'info'              => 'Tem rápida absorção, pacote com 7 unidades nas medidas 33 x 50 cm.',
            'status'            => '1',
        ));

        Offer::create(array(
            'id'                => '4',
            'product_id'        => '4',
            'type'              => 'Atacado',
            'unit'              => '70',
            'price'             => '30.34',
            'info'              => 'Tem rápida absorção, pacote com 7 unidades nas medidas 33 x 50 cm.',
            'status'            => '1',
        ));

        Offer::create(array(
            'id'                => '5',
            'product_id'        => '5',
            'type'              => 'Varejo',
            'unit'              => '30',
            'price'             => '41.34',
            'info'              => 'Tem rápida absorção, pacote com 7 unidades nas medidas 33 x 50 cm.',
            'status'            => '1',
        ));

        Offer::create(array(
            'id'                => '6',
            'product_id'        => '6',
            'type'              => 'Atacado',
            'unit'              => '50',
            'price'             => '75.34',
            'info'              => 'Tampa de segurança evita o risco de asfixia, produto atóxico e tampa ante asfixiante. ',
            'status'            => '1',
        ));

        Offer::create(array(
            'id'                => '7',
            'product_id'        => '7',
            'type'              => 'Varejo',
            'unit'              => '80',
            'price'             => '50.34',
            'info'              => 'Pincel Quadro Branco Pilot Wbma.',
            'status'            => '1',
        ));

        Offer::create(array(
            'id'                => '8',
            'product_id'        => '8',
            'type'              => 'Atacado',
            'unit'              => '70',
            'price'             => '210.34',
            'info'              => 'Toner Hp 85a Ce285a Preto Original Obtenha um Excelente Custo/Benefício.',
            'status'            => '1',
        ));

        Offer::create(array(
            'id'                => '9',
            'product_id'        => '9',
            'type'              => 'Varejo',
            'unit'              => '30',
            'price'             => '10.34',
            'info'              => 'Foi especialmente elaborado para a completa higienização das mãos.',
            'status'            => '1',
        ));*/

        //factory(App\Models\Offer::class, 5)->create();
    }
}
