<?php
include_once ROOT . "Models/Database/daoArticleAndCategories.php";

class MonController
{
   public function handlerRoutes()
   {
      $categories = getCategoriesOrArticles('categorie');
      $id = isset($_GET['id']) ? $_GET['id'] : 0;
      $active = $id;
      $articles = $id == 0 ? getCategoriesOrArticles('article') : getArticlesDependingOncategorie($id);
      include_once(ROOT . 'Views/home.php');
   }
}
