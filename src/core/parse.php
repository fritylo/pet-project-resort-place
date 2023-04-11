<?php

require __DIR__ . '/../../vendor/autoload.php';

use PHPHtmlParser\Dom;


function parse(string $url, array $queue) {
    $dom = new Dom;
    $dom->loadFromUrl($url);

    $result = $dom;

    foreach ($queue as $task) {
        $result = $task($result);
    }

    return $result;
};
