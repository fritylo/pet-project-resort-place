<?php

const JSON_WRITE_CONFIG = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;

function json_read($path) {
    return json_decode(file_get_contents($path), true);
}

function json_write($path, array $data) {
    file_put_contents($path, json_encode($data, JSON_WRITE_CONFIG));
}