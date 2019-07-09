<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

$titles = ['Mesa ratona', 'Mesa de comedor', 'Mesa de mármol', 'Espejo rayos',
'Espejo de pie', 'Espejo marco veteado', 'Set de baño', 'Cortina escandinava',
'Sillón de pana', 'Sillón de cuero', 'Funda nórdica de lino', 'Funda nórdica de algodón',
'Set de cocina', 'Alfombra mushy', 'Bowl veteado', 'Vela aromática', 'Cuadro pastel',
'Florero veteado', 'Silla escandinava', 'Escritorio escandinavo', 'Silla de oficina'];

$cantTitles = count($titles) - 1;

    return [
        'name' => $titles[rand(0, $cantTitles)],
        'price' => $faker->numberBetween(500, 9000),
        'description' => $faker->paragraph(10),
        'stock' => $faker->numberBetween(1, 500),
        'units_sold' => $faker->numberBetween(1, 500)
    ];
});
