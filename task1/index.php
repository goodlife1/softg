<?php
$root_path = str_replace("\\", "/", dirname(__file__));
define("ROOT", $root_path);
require_once ROOT . "/classes/core.class.php";
$uri = "index";
$serv_request = $_SERVER['REQUEST_URI'];
if (strpos($serv_request, "?")) {
   $serv_request = substr($serv_request,0,strpos($serv_request, "?"));
}
$serv_request = str_replace("/", "", $serv_request);
$class_path = ROOT . "/classes/" . $serv_request . ".class.php";
if (!file_exists($class_path)) {
    $serv_request = $uri;
}
require_once ROOT . "/classes/" . $serv_request . ".class.php";

$class = new $serv_request();
$out = $class->getBody();
echo $out;
?>