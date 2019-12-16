<?php
require_once(dirname(__FILE__,2) . '/source/config/config.php');

$uri = urldecode( parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if($uri === '/' || $uri === ''|| $uri === '/index.php') {
    $uri = '/login-controller.php';
}

require_once(CONTROLLER_PATH . "/{$uri}");