<?php

declare(strict_types=1);

namespace YourProject\App;

class Server
{
    public const APP_DIR = __DIR__;

    public const SERVER_DIR = self::APP_DIR . '/../';

    public const SYSTEM_DIR = self::SERVER_DIR . '/../';

    public const PUBLIC_DIR = self::SYSTEM_DIR . 'public/';

    public const CONFIG_DIR = self::SERVER_DIR . 'config/';

    public const ROUTES_DIR = self::CONFIG_DIR;
}
