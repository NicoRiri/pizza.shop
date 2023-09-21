<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Faker\Factory;
use Illuminate\Database\Capsule\Manager as DbManager;
use pizzashop\shop\domain\entities\commande\Commande;

$dbcom = __DIR__ . '/../config/shop.db.ini';
$dbcat = __DIR__ . '/../config/catalog.db.ini';
$db = new DbManager();
$db->addConnection(parse_ini_file($dbcom), 'shop');
$db->addConnection(parse_ini_file($dbcat), 'catalog');
$db->setAsGlobal();
$db->bootEloquent();

