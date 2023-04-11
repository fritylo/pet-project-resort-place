<?php

require_once __DIR__ . '/../../core/autoload.php';
require_once __DIR__ . '/../../logic/autoload.php';

$today = date('d/m/y');

$system_file = json_read(FILES['system']);
$admin_password = $system_file['admin_password'];

$password = isset($_GET['password']) ? $_GET['password'] : '';

if ($password !== $admin_password) {
    echo 'Permission denied!';
    die;
}

run_parser();