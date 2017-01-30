<?php
$root_path = str_replace("\\", "/", dirname(__file__));
define("ROOT", $root_path);
require(ROOT.'/vendor/autoload.php');
require_once ROOT . "/controllers/Core.php";
require_once ROOT."/vendor/app.php";
require_once ROOT."/vendor/Database.php";

if($_SERVER['REQUEST_URI']!= '/'){
    $request = $_SERVER['REQUEST_URI'];}
    else{
    $request = 'book';
}
new App(substr($request,1));
//$uri = "index";
//$serv_request = $_SERVER['REQUEST_URI'];
//if (strpos($serv_request, "?")) {
//   $serv_request = substr($serv_request,0,strpos($serv_request, "?"));
//}
//$serv_request = str_replace("/", "", $serv_request);
//$class_path = ROOT . "/classes/" . $serv_request . ".class.php";
//if (!file_exists($class_path)) {
//    $serv_request = $uri;
//}
//require_once ROOT . "/controllers/" . $serv_request . ".class.php";
//
//
//$class = new $serv_request();
//var_dump(method_exists($class,'getContent'));
// $class->getBody();

?>