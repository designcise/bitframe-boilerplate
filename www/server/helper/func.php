<?php

namespace YourProject\Helper;

use function is_callable;

function import(string $location, array $args = []) {
    if (is_dir($location)) {
        $location .= 'index';
    }

    $callable = require "{$location}.php";

    return is_callable($callable) ? $callable(...$args) : $callable;
}
