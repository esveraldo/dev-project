<?php

use App\Models\TransactionType;
use Illuminate\Database\Seeder;

class TransactionTypeTableSeeder extends Seeder
{
    public function run()
    {
        TransactionType::create(array(
            'name' => 'Bonus de Admin ( + )',
            'operator' => '+',
            'description' => 'Adição de pontos feita pelo adimistrador'
        ));

        TransactionType::create(array(
            'name' => 'Retirada de Admin ( - )',
            'operator' => '-',
            'description' => 'Redução de pontos feita pelo adimistrador'
        ));

        TransactionType::create(array(
            'name' => 'Compra de Produto ( + )',
            'operator' => '+',
            'description' => 'Adição de pontos pela compra de um produto'
        ));

        TransactionType::create(array(
            'name' => 'Compra de Oferta ( + )',
            'operator' => '+',
            'description' => 'Adição de pontos pela compra de uma oferta'
        ));

        TransactionType::create(array(
            'name' => 'Troca por Produto ( - )',
            'operator' => '-',
            'description' => 'Redução de pontos pela troca por um produto'
        ));

    }

}
