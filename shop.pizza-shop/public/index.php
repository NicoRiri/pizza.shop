<?php
declare(strict_types=1);


use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

/* application boostrap */
$appli = require_once __DIR__ . '/../config/bootstrap.php';

$appli->run();
