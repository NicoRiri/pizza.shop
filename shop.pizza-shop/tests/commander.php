<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$dbcom = __DIR__ . '/../config/commande.db.ini';
$dbcat = __DIR__ . '/../config/catalogue.db.ini';
$db = new DB();
$db->addConnection(parse_ini_file($dbcom), 'commande');
$db->addConnection(parse_ini_file($dbcat), 'catalogue');
$db->setAsGlobal();
$db->bootEloquent();

$sCo = new \pizzashop\shop\domain\service\Commande\sCommande();

$commande = new \pizzashop\shop\domain\dto\CommandeDTO("nikollei@mail.com", "0", [new \pizzashop\shop\domain\dto\ItemDTO(1, 2, 3)]);

$sCo->creerCommande($commande);