<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$routes = explode('/', $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
define('PROTOCOL', $routes[0]);
define('URL_BASE','/plinor');
define('START_POSITION',2);
ini_set('display_errors', 1);
require_once 'bizz/bootstrap.php';
