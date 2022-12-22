<?php

require __DIR__ . '/../app/utils/helper.php';
$server = $_SERVER;
$url = explode('?', $server['REQUEST_URI'])[0];
require __DIR__ . '/../routes/routes.php';

if (!isset($routes[$url])) {
    echo '404';
    return;
}

require __DIR__ .  '/../app/controllers/' . $routes[$url];
