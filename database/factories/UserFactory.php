<?php

    $factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));

    return [
        //'typeuser'      => $faker->typeuser,
        'name'          => $faker->name,
        //'age'           => $faker->age,
        'email'         => $faker->email,
        'cpf'           => $faker->cpf(random_int(0,10)),
        'phone'         => $faker->cellphoneNumber,
        //'ddd'           => $faker->ddd,
        'gender'        => $faker->randomElement($array = array ('M','F','U')),
        //'birth'         => $faker->dateTimeBetween('-90 years', '-15 years'),
        'address'       => $faker->streetAddress,
        //'number'        => $faker->number,
        'complement'    => $faker->secondaryAddress,
        'state'         => $faker->randomElement($array = array ('RJ','MG')),
        'city'          => $faker->randomElement($array = array ('Rio de Janeiro', 'Nova Iguaçu', 'Belo Horizonte', 'Divinópolis')),
        'neighborhood'  => $faker->randomElement($array = array ('Barra da Tijuca', 'Campo Grande', 'Jardim Tropical', 'Bangu', 'Juiz de Fora', 'Lourdes', 'Vila Valqueire')),
        'country'       => $faker->country,
        'platform'      => $faker->randomElement($array = array ('Android','IOS')),
    ];
});

