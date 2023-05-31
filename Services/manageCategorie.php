<?php
include_once ROOT . "database/persistance.php";

$categories = getCategories();
array_unshift($categories, array("id" => 0, "libelle" => "Home"));
$active = 0;
if (isset($_GET['id'])) {
   $active = $_GET['id'];
}
