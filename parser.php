<?php
require_once __DIR__ . '/core.php';
require_once __DIR__ . '/const.php';

$locations = json_read(__DIR__ . '/data.json');

foreach ($locations as $name => &$location) {

    $links = $origins[$name];
    
    foreach ($links as $link) {
        if (!array_key_exists($link, $parsers)) {
            echo "There is no parser for \"$link\"<br>";
            continue;
        }
        
        $parser = $parsers[$link];
        $parsed = $parser();
        
        $filtered = array_filter($parsed, function ($parsedPlace) use (&$location) {
            $place_exists = false;

            foreach ($location as &$place) {
                if ($place['title'] == $parsedPlace['title']) {
                    $place_exists = true;
                    echo "Location \"{$place['title']}\" exists <br>";
                    break;
                }
            }

            return !$place_exists;
        });

        array_push($location, ...$filtered);
    }
}

json_write(__DIR__ . '/data.json', $locations);
