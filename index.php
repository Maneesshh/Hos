<?php
require "./views/shared/links.php";
$url;
if (empty($_GET["url"])) {
   //startup
   $url = "Dashboard/Index";
} else {
   $url = $_GET["url"];
}

$url = explode('/', $url);
$controller = $url[0] . "Controller";
$method = $url[1];
require_once 'controllers/' . $controller . '.php';
$obj = new $controller();
$obj->$method();