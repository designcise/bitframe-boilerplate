<?php

declare(strict_types=1);

namespace YourProject\Helper;

use function is_callable;

/**
 * @param string $location
 * @param array $args
 *
 * @return mixed
 */
function import(string $location, array $args = [])
{
    if (is_dir($location)) {
        $location .= 'index';
    }

    $callable = require "{$location}.php";

    return is_callable($callable) ? $callable(...$args) : $callable;
}
