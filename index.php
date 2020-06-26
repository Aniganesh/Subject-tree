<?php
/* 
    Basic index page. Will call the appropriate controller and view to display the requested page. Boilerplate.
*/

session_start();

require "config.php";

foreach (glob("classes/*.php")as $filename){
    require $filename;
}

foreach(glob("controllers/*.php")as $filename){
    require $filename;
}

foreach(glob("models/*.php")as $filename){
    require $filename;
}





$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->returnController();
if ($controller) {
    $controller->executeAction();
}
