<?php

use Faker\Generator as Faker;

$factory->define(\App\Team\TeamMember::class, function (Faker $faker) {
    return [
        'name_ko' => '새 이름',
        'name_en' => $faker->name,
        'bio_en'  => $faker->paragraph,
        'bio_ko'  => '모든 국민은 언론·출판의 자유와 집회·결사의 자유를 가진다, 국회는 의장 1인과 부의장 2인을 선출한다. 국회나 그 위원회의 요구가 있을 '
    ];
});
