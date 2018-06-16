<?php

require_once 'definition.php';
require_once ROOT . '/app/App.php';

use App\App;

App::load();


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'oeuvre.index';
}

$page = explode('.', $page);
if ($page[0] == 'admin' and count($page) == 2) {
    $controller = '\\App\\Controller\\Admin\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
} elseif ($page[0] == 'admin' and count($page) > 2) {
    $controller = '\\App\\Controller\\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller = '\\App\\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
$controller = new $controller();
$controller->$action();
