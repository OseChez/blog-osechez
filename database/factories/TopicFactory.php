<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Topic;
use App\Utils\UrlConverter;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    $title = $faker->sentence;
    $url = new UrlConverter();
    return [
             'category_id' => $cat->id,
             'title_topic' => $title,
             'descripcion' => 'Primeros pasos en Laravel',
             'subcategory_name' => 'Laravel',
             'url_topic'=> $url->convertTitleToUrl($title)
    ];
});
