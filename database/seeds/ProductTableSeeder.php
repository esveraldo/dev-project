<?php

use App\Models\Product;
use App\Repositories\BarcodeRepository;
use App\Repositories\ImageRepository;
use Illuminate\Database\Seeder;
use Milon\Barcode\DNS1D;

class ProductTableSeeder extends Seeder
{
    public function run(BarcodeRepository $repoBarcode, ImageRepository $repo)
    {
        Product::create(array(
            'id'                => '1',
            'brand_id'          => '1',
            'path_image'        => env('APP_URL').'/images/products/1/thumb300x300.png',
            'name'              => 'Cartucho HP 122XL - CH563HB - 8,5ml Preto',
            'code'              => '231464',
            'barcode'           => '',
            'price'             => '123.45',
            'modeofuse'         => 'Desfrute de um desempenho consistente e confiável com impressões de qualidade para o seu dia a dia.',
            'info'              => 'Além de toda a tecnologia, os cartuchos originais HP oferecem opções ainda mais vantajosas para seu bolso, como as embalagens XL e os combos, que ajudam você a economizar até 50%².',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '2',
            'brand_id'          => '2',
            'path_image'        => env('APP_URL').'/images/products/2/thumb300x300.png',
            'name'              => 'Pilha Alcalina Pequena Duracell C/2 - Caixa C/12',
            'code'              => '3335',
            'barcode'           => '',
            'price'             => '78.90',
            'modeofuse'         => 'Melhor performance VS pilha de zinco.',
            'info'              => 'A pilha Alcalina Duracell possui potência confiável e prolongada. ',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '3',
            'brand_id'          => '3',
            'path_image'        => env('APP_URL').'/images/products/3/thumb300x300.png',
            'name'              => 'Pano Multiuso Limpeza Leve Azul 33cm x 50cm',
            'code'              => '443385',
            'barcode'           => '',
            'price'             => '12.34',
            'modeofuse'         => 'Pano de limpeza multiuso, é Ideal para limpeza de superfícies lisas é um produto superior quando comparado a produtos de mesma gramatura. ',
            'info'              => 'Tem rápida absorção, pacote com 7 unidades nas medidas 33 x 50 cm.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '4',
            'brand_id'          => '4',
            'path_image'        => env('APP_URL').'/images/products/4/thumb300x300.png',
            'name'              => 'Caneta Bic Cristal Dura+ Azul c/50',
            'code'              => '25',
            'barcode'           => '',
            'price'             => '34.56',
            'modeofuse'         => 'Tinta de qualidade, que seca rapidamente, com escrita macia.',
            'info'              => 'Tinta com exclusiva fórmula Bic e esfera de tungstênio garantem ótimo rendimento sem falhar.',
        ));

        Product::create(array(
            'id'                => '5',
            'brand_id'          => '4',
            'path_image'        => env('APP_URL').'/images/products/5/thumb300x300.png',
            'name'              => 'Caneta Bic Cristal Dura+ Preta c/50',
            'code'              => '26',
            'barcode'           => '',
            'price'             => '45.67',
            'modeofuse'         => 'Tinta de qualidade, que seca rapidamente, com escrita macia.',
            'info'              => 'Tinta com exclusiva fórmula Bic e esfera de tungstênio garantem ótimo rendimento sem falhar.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '6',
            'brand_id'          => '5',
            'path_image'        => env('APP_URL').'/images/products/6/thumb300x300.png',
            'name'              => 'Caneta Compactor Color 12 Cores - Pacote C/5',
            'code'              => '2563',
            'barcode'           => '',
            'price'             => '90.12',
            'modeofuse'         => 'Hidrocor de corpo robusto e ponta grossa, traço colorido e durável de alta qualidade.',
            'info'              => 'Tampa de segurança evita o risco de asfixia, produto atóxico e tampa ante asfixiante, tinta à base de água com ótimo rendimento e super lavável (não mancha os uniformes!).',
        ));

        Product::create(array(
            'id'                => '7',
            'brand_id'          => '6',
            'path_image'        => env('APP_URL').'/images/products/7/thumb300x300.png',
            'name'              => 'Marcador para Quadro Branco WBM-7 AZUL – Caixa C/12',
            'code'              => '949',
            'barcode'           => '',
            'price'             => '56.78',
            'modeofuse'         => 'Tinta versatil: Pode ser usada em quadro branco ou em vidro.',
            'info'              => 'Pincel Quadro Branco Pilot Wbma.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '8',
            'brand_id'          => '1',
            'path_image'        => env('APP_URL').'/images/products/1/thumb300x300.png',
            'name'              => 'Toner HP 85A - CE285AB',
            'code'              => '292498',
            'barcode'           => '',
            'price'             => '234.56',
            'modeofuse'         => 'Os Cartuchos de Toner para Hp Laserjet Ajudam Você Imprimir Relatórios, Cartas e Faturas com Qualidade Profissional e Facilidade.',
            'info'              => 'Toner Hp 85a Ce285a Preto Original Obtenha um Excelente Custo/Benefício Para a Impressão Empresarial Diária.',
            'points'            => rand(100, 500),
        ));

        Product::create(array(
            'id'                => '9',
            'brand_id'          => '7',
            'path_image'        => env('APP_URL').'/images/products/9/thumb300x300.png',
            'name'              => 'Álcool Gel Anti Septico Clean 70% - 500ml',
            'code'              => '229983',
            'barcode'           => '',
            'price'             => '12.34',
            'modeofuse'         => 'Para higienizar as mãos ao longo do dia, o gel antisséptico Clean 70% é uma opção.',
            'info'              => 'Foi especialmente elaborado para a completa higienização das mãos, com base de álcoois que evaporam sem deixar odores residuais, é isento de contaminantes.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '10',
            'brand_id'          => '12',
            'path_image'        => env('APP_URL').'/images/products/10/1513685676210.png',
            'name'              => 'Papel Almaço Quadriculado',
            'code'              => '2552',
            'barcode'           => '7891253240588',
            'price'             => '10.50',
            'modeofuse'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'info'              => 'Morbi a ipsum sit amet metus commodo bibendum aliquet sit amet risus. Duis placerat viverra pretium. Phasellus id ultrices tortor.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '11',
            'brand_id'          => '9',
            'path_image'        => env('APP_URL').'/images/products/11/1513685714996.png',
            'name'              => 'Apontador Escolar Neon',
            'code'              => '154661',
            'barcode'           => '7891360542353',
            'price'             => '05.88',
            'modeofuse'         => 'Aenean ornare, dolor at imperdiet tristique, purus felis pulvinar metus.',
            'info'              => 'Sed consectetur tempor diam at faucibus. Ut sed nisl est. Suspendisse a felis elit. Donec dictum ex luctus, facilisis metus vel, sagittis augue.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '12',
            'brand_id'          => '11',
            'path_image'        => env('APP_URL').'/images/products/12/1513685728713.png',
            'name'              => 'Borracha Kit com Capa Protetora',
            'code'              => '217926',
            'barcode'           => '7890265736911',
            'price'             => '06.29',
            'modeofuse'         => 'Nullam felis erat, viverra ac suscipit sit amet, interdum ut est. Nulla porttitor mollis nulla.',
            'info'              => 'Sed sit amet tincidunt tortor. Morbi convallis sed turpis quis egestas. Suspendisse gravida turpis ut pretium elementum.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '13',
            'brand_id'          => '12',
            'path_image'        => env('APP_URL').'/images/products/13/1513685741899.png',
            'name'              => 'Caderno Brochura',
            'code'              => '228360',
            'barcode'           => '7897664261310',
            'price'             => '11.99',
            'modeofuse'         => 'Quisque eleifend ante ac congue auctor. Duis efficitur lorem non molestie congue.',
            'info'              => 'Morbi id elementum purus. Quisque dolor eros, pulvinar vel suscipit ornare, fringilla ut tortor. Ut turpis ligula, iaculis id fermentum vel, luctus ac est.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '14',
            'brand_id'          => '8',
            'path_image'        => env('APP_URL').'/images/products/14/1513685758690.png',
            'name'              => 'Caderno de Caligrafia',
            'code'              => '228392',
            'barcode'           => '7897664264373',
            'price'             => '13.65',
            'modeofuse'         => 'Ut efficitur congue nisl ut vulputate. Etiam accumsan porttitor neque eget scelerisque.',
            'info'              => 'Fusce sagittis, quam in sagittis vehicula, justo massa feugiat lacus, eu rutrum augue nisl convallis velit.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '15',
            'brand_id'          => '11',
            'path_image'        => env('APP_URL').'/images/products/15/1513685772710.png',
            'name'              => 'Estojo Neoperene Poa',
            'code'              => '550678',
            'barcode'           => '7890265169566',
            'price'             => '20.32',
            'modeofuse'         => 'Etiam laoreet laoreet mi vel pellentesque. Aliquam laoreet nunc non aliquet feugiat.',
            'info'              => 'Nunc aliquam condimentum tellus feugiat faucibus. Integer vel lobortis justo, ut viverra mi. Ut eu varius lectus. Duis euismod mollis leo, fermentum pulvinar est commodo posuere. ',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '16',
            'brand_id'          => '10',
            'path_image'        => env('APP_URL').'/images/products/16/1513685793890.png',
            'name'              => 'Lápis de Cor Aquarelavel',
            'code'              => '1956',
            'barcode'           => '7891360458104',
            'price'             => '32.99',
            'modeofuse'         => 'Sed sit amet tincidunt tortor. Morbi convallis sed turpis quis egestas. ',
            'info'              => 'Suspendisse gravida turpis ut pretium elementum. In tincidunt sapien ac eleifend cursus. Integer risus enim, tempus quis erat id, sagittis convallis turpis.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '17',
            'brand_id'          => '11',
            'path_image'        => env('APP_URL').'/images/products/17/1513685815121.png',
            'name'              => 'Mini Mochila Little Girl',
            'code'              => '214832',
            'barcode'           => '7890265720989',
            'price'             => '99.90',
            'modeofuse'         => 'Mauris lacinia, tellus vitae facilisis mattis, sem odio sollicitudin nisi.',
            'info'              => 'Aliquam nec nibh enim. Maecenas ultricies nisi non fringilla maximus. Ut efficitur congue nisl ut vulputate.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '18',
            'brand_id'          => '10',
            'path_image'        => env('APP_URL').'/images/products/18/1513685700308.png',
            'name'              => 'Agenda Escolar Princesas',
            'code'              => '197928',
            'barcode'           => '7891027110048',
            'price'             => '34.20',
            'modeofuse'         => 'Aenean ornare, dolor at imperdiet tristique, purus felis pulvinar metus, ac aliquet elit justo cursus nibh.',
            'info'              => 'Maecenas ac suscipit turpis. Proin dignissim molestie tortor, a placerat dui sodales in. Praesent sollicitudin diam eu tincidunt aliquam.',
            'points'            => rand(100, 500)
        ));

        Product::create(array(
            'id'                => '19',
            'brand_id'          => '10',
            'path_image'        => env('APP_URL').'/images/products/19/1513685783680.png',
            'name'              => 'Folhas Para Fichário Pooh',
            'code'              => '6353',
            'barcode'           => '7891027139674',
            'price'             => '14.90',
            'modeofuse'         => 'Etiam laoreet laoreet mi vel pellentesque. Aliquam laoreet nunc non aliquet feugiat.',
            'info'              => 'Nunc aliquam condimentum tellus feugiat faucibus. Integer vel lobortis justo, ut viverra mi. Ut eu varius lectus. Duis euismod mollis leo, fermentum pulvinar est commodo posuere. ',
            'points'            => rand(100, 500)
        ));

        /**
         * Gera os códigos de Barra e salva o path image deles
         * return void
         */
        foreach (Product::all() as $product)
        {
            $imageBase64 = $repoBarcode->generate($product->barcode, 'EAN13');
            sleep(1.5);

            $pathImage   = $repo->base64toImage($imageBase64, 'barcodes');
            $product->barcode_path_image = $pathImage;

            $product->save();
        }
    }
}
