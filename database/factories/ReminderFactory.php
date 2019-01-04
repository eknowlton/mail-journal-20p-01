<?php

use Faker\Generator as Faker;

use App\Reminder;
use App\User;

$factory->define(Reminder::class, function (Faker $faker) {
    $user = factory(User::class)->create();

    return [
        'user_id' => $user->id,
        'sent_to' => $user->email
    ];
});
