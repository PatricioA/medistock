<?php

use Faker\Generator as Faker;

$factory->define(\App\Pedidos::class, function (Faker $faker) {
    return [
        'observacion_pedido' => $faker->sentence,
        'id_estado' => 1,
        'id_user' => 1,
    ];
});
