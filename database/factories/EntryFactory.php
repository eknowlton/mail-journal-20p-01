<?php

use Faker\Generator as Faker;

use App\Entry;
use App\Reminder;

$factory->define(Entry::class, function (Faker $faker) {
    return [
        'reminder_id' => factory(Reminder::class),
        'body' => implode(' ', $faker->paragraphs())
    ];
});
