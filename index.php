<?php
require_once('config.php');

require_once(ROOT.'/lib/DataBase.php');

$db = new DataBase();

require_once(ROOT.'/lib/Router.php');

$router = new Router();
$router->run();


?>

