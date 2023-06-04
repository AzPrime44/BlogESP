<?php
include_once ROOT . "Models/Database/persistance.php";
include_once(ROOT . 'Views/components/article.php');

function articleOfcategorie()
{
   $categorie_id = 0;
   if (isset($_GET["id"])) {
      if (is_numeric($_GET["id"]) && $_GET["id"] >= 0)
         $categorie_id = $_GET["id"];
   }
   $maxIdCategorie = maxId();
   if ($maxIdCategorie < $categorie_id) {
      header("HTTP/1.0 404 page n'existe pas");
      header("Location:Views/page404.php");
      exit();
   }
   $arrayCategorie = getArticlesDependingOncategorie($categorie_id);
   return $arrayCategorie;
}


function handleArticles()
{
   $articles = articleOfcategorie();

   if (!empty($articles)) {

      foreach ($articles as $article) {
         //utilise le component afficherArticle pour afficher les articles
         affichierArticle($article['titre'], $article['contenu']);
      }
   } else { ?>

      <div>
         <p style="font-size: 25px;font-style: bold;text-align: center">Pas d'articles pour cette categorie pour le moment , rester a l' écoute 🚀🚀🚀🔥</p>
      </div>
<?php }
}
