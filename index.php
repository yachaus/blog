<?php

require __DIR__ . '/autoload.php';

use App\Classes\Controllers\Error;

$base = new App\Classes\Controllers\Base();
$ctrl = $base->ctrl();
$action = $base->act();
$controller = new $ctrl();
try {
    $controller->action($action);
} catch (\App\Exceptions\Db $e) {
    $message = $e->getMessage();
    $error = new Error($message);
    $error->action('Message');
} catch (\App\Exceptions\E404 $e) {
    $error = new Error();
    $error->action('E404');
}
