<?php

use Faker\Generator as Faker;

$factory->define(\App\Insumos::class, function (Faker $faker) {
    return [
        'id_insumos' => str_random(10),
    ];
});
