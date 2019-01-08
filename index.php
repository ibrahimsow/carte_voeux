<?php 

// rooting
$requete = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

$controller=(count($requete)=== 1)?  "home":$requete[1];
$action=(count($requete) < 3)? "showform": $requete[2];
$id=(count($requete) < 4)? 0 : $requete[3];

switch ($controller) {

    case 'send' : 
        require_once("controller/send_controller.php"); 
        break;

        case 'show' : 
        require_once("controller/show_controller.php"); 
        break;


    default:
        require_once("controller/send_controller.php");
        break;
}



?>