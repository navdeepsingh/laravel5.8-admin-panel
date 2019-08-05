<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Outlet;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Outlet::class, function (Faker $faker) {
    return [
        'code' => Str::random(4)
    ];
});

