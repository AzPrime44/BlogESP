<?php
session_start();

if (!isset($_SESSION['SUPERUSER']))
   exit();


define('ROOT', 'C:/xampp/htdocs/BlocESP/');
include_once ROOT . "Models/Database/daoUsers.php";

$users = getUsers();


include_once ROOT . "/Views/admindashboard.php";