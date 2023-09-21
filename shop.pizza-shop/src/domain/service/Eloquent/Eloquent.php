<?php

namespace pizzashop\shop\domain\service\Eloquent;


use Illuminate\Database\Capsule\Manager;

class Eloquent
{
    public static function init(string $configPath): void
    {
        $db = new Manager();
        $db->addConnection(parse_ini_file($configPath));
        $db->setAsGlobal();
        $db->bootEloquent();
    }
}