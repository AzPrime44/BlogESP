<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/BlocESP/');
// $url = $_SERVER['REQUEST_URI'];
// echo $url;
// switch ($url) {
//    case '/BlocESP/':
//    case '/BlocESP/index.php':
include_once(ROOT . 'Controllers/MonController.php');
$monController = new MonController();
$monController->handlerRoutes();
//       break;
//    case 'BlocESP/inscription':
//       include_once(ROOT . 'Controllers/inscriptionController.php');
// }
