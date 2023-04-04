<?php
require "vendor/autoload.php";

use PHPHtmlParser\Dom;

$origins = [
    'crimea' => [
        //'https://www.axis.travel/blog/o-kryme/top-10-shikarnyh-mest-dlya-otdyha-v-krymu',
        //'https://dorogi-ne-dorogi.ru/otdyh-v-krymu/gde-v-krymu-malo-lyudej-na-plyazhax.html',
        //'https://www.tripadvisor.ru/Attractions-g313972-Activities-Crimea.html',
        'https://krymea.ru/kurorts',
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
    ],
];

$parsers = [
    'https://krymea.ru/kurorts' => function () {
        $origin = 'https://krymea.ru';

        $dom = new Dom;
        $dom->loadFromUrl('https://krymea.ru/kurorts');

        $titles = $dom->find('.content_list.tiled .tile .ft_caption a')->toArray();
        $titles = array_map(function ($element) {
            return $element->innerHtml;
        }, $titles);

        $descriptions = $dom->find('.field.ft_html.f_content > .value')->toArray();
        $descriptions = array_map(function ($element) {
            return $element->innerHtml;
        }, $descriptions);

        $original_urls = $dom->find('.content_list.tiled .tile .ft_caption a')->toArray();
        $original_urls = array_map(function ($element) use($origin) {
            return $origin . $element->href;
        }, $original_urls);

        $pictures = $dom->find('.content_list.tiled.kurorts_list .photo > a > img')->toArray();
        $pictures = array_map(function ($element) use($origin) {
            return $origin . $element->src;
        }, $pictures);

        $result = [];

        for ($i=0; $i < count($titles); $i++) { 
            array_push($result, [
                'title' => $titles[$i],
                'description' => $descriptions[$i],
                'original_url' => $original_urls[$i],
                'picture' => $pictures[$i],
            ]);
        }

        return $result;
    },
];
