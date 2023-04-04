# Узнай как отдыхать с кайфом!!!

## License

MIT
© Валерия Ехно, Иван Захарьян, Федор Никонов. 04.03.2023

## Как запустить?

Скачать все пакеты.
```bash
composer install
```

Поднять локальный сервак. Допустим OpenServer.

Положить файлы в локальный сервак.

Радоваться жизни))

## Концепт

КРЫМ

1) Понять что парсить, собрать ссылки на источники Лера Эхно 
2) Переменное место поиска

```php
$places = [
    'crimea' => [
        'https://www.axis.travel/blog/o-kryme/top-10-shikarnyh-mest-dlya-otdyha-v-krymu',
        'https://dorogi-ne-dorogi.ru/otdyh-v-krymu/gde-v-krymu-malo-lyudej-na-plyazhax.html',
        'https://www.tripadvisor.ru/Attractions-g313972-Activities-Crimea.html',
        'https://krymea.ru/kurorts',
        'https://mriyaresort.com/about/blog/kurorty-kryma/',
        'https://www.tripadvisor.ru/Attractions-g295378-Activities-c61-Yalta.html'
    ],
    'istanbul' => [
        'https://tripmydream.com/media/podborki/20-mest-kotorye-stoit-posetit-v-stambule',
        'https://www.tourister.ru/responses/id_22831',
        'https://only2weeks.ru/dostoprimechatelnosti-stanbula-chto-posmotret/',
        'https://tripmydream.com/media/neobychnye-mesta/stambul-mesta-o-kotoryh-znayut-tolko-mestnye',
        'https://istanbultouristpass.com/ru/where-to-go-in-istanbul-with-family',
        'https://life-globe.com/stambul-s-detmi/'
    ],
];
```

3) Логика парсинга для конкретного сайта John

```php
$parsers = [
    'https://google.com' => function () {

    },
];
```

Кладёт данные в чистом виде в JSON файле (структура уточняется).

4) UI :: Bootstrap или другой UI.

5) Составить прототип дизайна

6) Вывести места для отдыха

ФЛОУ:

У нас есть страница на которой одна кнопка - запустить парсинг. После нажатия данные кладутся в JSON файл. Морда позволяет выбрать из JSON файла по конкретной локации.
По время парсинга не должны создаваться дубликаты.