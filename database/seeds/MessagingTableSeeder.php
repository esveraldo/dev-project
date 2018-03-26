<?php

use Illuminate\Database\Seeder;
use App\Models\Messaging;

class MessagingTableSeeder extends Seeder
{
    public function run()
    {
        Messaging::create(array(
            'title'                 => 'Teste todos',
            'message'               => 'Teste de mensagem personalizada para todos!!!'
        ));

        Messaging::create(array(
            'title'                 => 'Teste RJ',
            'message'               => 'Olá! Temos ofertas especiais no RJ!!!'
        ));
    }
}
