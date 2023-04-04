<?php

function json_read($path) {
    return json_decode(file_get_contents($path), true);
}

function json_write($path, array $data) {
    file_put_contents($path, json_encode($data));
}