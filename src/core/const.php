<?php

const DB_PATH = __DIR__ . '/../db';

const FILES = [
    'places' => DB_PATH . '/places.json',
    'system' => DB_PATH . '/system.json',
    'previews' => DB_PATH . '/previews.json',
];

const LINKS = [
    'crimea' => [
        //'https://www.axis.travel/blog/o-kryme/top-10-shikarnyh-mest-dlya-otdyha-v-krymu',
        //'https://dorogi-ne-dorogi.ru/otdyh-v-krymu/gde-v-krymu-malo-lyudej-na-plyazhax.html',
        //'https://www.tripadvisor.ru/Attractions-g313972-Activities-Crimea.html',
        'https://krymea.ru/kurorts' => 'parse__krymea_ru',
        //'https://mriyaresort.com/about/blog/kurorty-kryma/',
        //'https://www.tripadvisor.ru/Attractions-g295378-Activities-c61-Yalta.html'
    ],
    'istanbul' => [
        //'https://tripmydream.com/media/podborki/20-mest-kotorye-stoit-posetit-v-stambule',
        //'https://www.tourister.ru/responses/id_22831',
        //'https://only2weeks.ru/dostoprimechatelnosti-stanbula-chto-posmotret/',
        //'https://tripmydream.com/media/neobychnye-mesta/stambul-mesta-o-kotoryh-znayut-tolko-mestnye',
        //'https://istanbultouristpass.com/ru/where-to-go-in-istanbul-with-family',
        //'https://life-globe.com/stambul-s-detmi/'

        //'https://www.timeout.com/istanbul/things-to-do/best-things-to-do-in-istanbul'
    ],
];
