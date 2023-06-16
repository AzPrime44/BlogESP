<?php
session_start();

define('ROOT', 'C:/xampp/htdocs/BlocESP/');
include_once ROOT . "Models/Database/daoArticleAndCategories.php";


function handlerRoutes()
{
   $categories = getCategoriesOrArticles('categorie');
   $id = isset($_GET['categorie']) ? $_GET['categorie'] : 0;
   $active = $id;
   $articles = $id == 0 ? getCategoriesOrArticles('article') : getArticlesDependingOncategorie($id);
   include_once(ROOT . 'Views/home.php');
}

//___________________________________________________________________________________________________


//logique pour les actions effectueés par un utilisateur connecté
if (isset($_SESSION['LOGIN'])) {


   //on recupere l'id de l'article a modifie afin d' obtenir le titre ,contenu ,categorie...
   if (isset($_GET['methode']) && $_GET['methode'] == 'modifier') {
      $id = $_GET['id'];
      $categories = getCategoriesOrArticles('categorie');
      $article = getArtcicleDependingOnId($id);
      $categorie_id = $article['categorie'];
      $contenu = $article['contenu'];
      $titre = $article['titre'];

      include_once(ROOT . 'Views/modifier.php');
   }

   //on recupere tous les categorie et on appelle la vue ajouterArticle 
   if (isset($_GET['methode']) && $_GET['methode'] == 'ajouter') {
      $categories = getCategoriesOrArticles('categorie');
      include_once(ROOT . 'Views/ajouterArticle.php');
   }



   //on recupere l'id de l'article a supprimer
   if (isset($_GET['methode']) && $_GET['methode'] == 'supprimer') {
      $id = $_GET['id'];
      supprimerArticle($id);
      header('Location: ../index.php');
   }
   //___________________________________________________________________________________________________

   //traitement pour les formulaire
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //cas de modification d'un article
      if (isset($_GET['methode']) && $_GET['methode'] == 'modifier') {
         $id = $_GET['id'];
         $categorie_id = $_POST['categorie_id'];
         $titre = $_POST['titre'];
         $contenu = $_POST['contenu'];
         modifierArticle($titre, $contenu, $categorie_id, $id);
      }
      //cas d' ajout d'un article
      else if (isset($_GET['methode']) && $_GET['methode'] == 'ajouter') {

         $categorie_id = $_POST['categorie_id'];
         $titre = $_POST['titre'];
         $contenu = $_POST['contenu'];
         ajouterArticle($titre, $contenu, $categorie_id);
      }
      header('Location: ../index.php');
   }
}
