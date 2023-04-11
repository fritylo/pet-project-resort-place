<?php

require_once __DIR__ . '/../core/autoload.php';
require_once __DIR__ . '/../parsers/autoload.php';

function run_parser() {
    $places = json_read(FILES['places']);

    foreach (LINKS as $origin => $links) {
        foreach ($links as $link => $parser) {
            $result = $parser($link);

            foreach ($result as $place) {
                $is_unique = true;

                foreach ($places[$origin] as $exists_place) {
                    if ($place['title'] === $exists_place['title']) {
                        $is_unique = false;
                        break;
                    }
                }

                if ($is_unique) {
                    array_push($places[$origin], $place);
                }
            }
        }
    }

    json_write(FILES['places'], $places);
}