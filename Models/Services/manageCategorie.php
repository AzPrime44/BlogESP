<?php
include_once ROOT . "Models/Database/persistance.php";

$categories = getCategories();

$active = 0;
if (isset($_GET['id'])) {
   $active = $_GET['id'];
}
