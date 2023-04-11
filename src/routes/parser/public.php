<?php

require_once __DIR__ . '/../../core/autoload.php';
require_once __DIR__ . '/../../logic/autoload.php';

$today = date('d/m/y');

$system_file = json_read(FILES['system']);
$last_parse = $system_file['last_parse'];

if ($last_parse === $today) {
    echo 'It\'s enough for today!';
    die;
}

run_parser();

$system_file['last_parse'] = $today;
json_write(FILES['system'], $system_file);

echo 'Parsed!';
