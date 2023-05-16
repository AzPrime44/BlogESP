<?php
include_once ROOT . "database/persistance.php";
include_once(ROOT . 'Views/staticViews/article.php');

function articleOfcategorie()
{
   $categorie_id = 0;
   $arrayCategorie = [];
   if (isset($_GET["id"])) {
      if ($_GET["id"] == 0) return fetcher('article');
      $categorie_id = $_GET["id"];
   }
   $articles = fetcher('article');


   foreach ($articles as $article) {
      if ($categorie_id == $article['categorie']) {
         $arrayCategorie[] = $article;
      }
   }
   return $arrayCategorie;
}


function handleArticles()
{
   $articles = articleOfcategorie();

   if (!empty($articles)) {

      foreach ($articles as $article) {


         affichierArticle($article['titre'], $article['contenu']);
      }
   } else { ?>

      <div>
         <p style="font-size: 25px;font-style: bold;text-align: center">Pas d'articles pour cette categorie pour le moment , rester a l' écoute 🚀🚀🚀🔥</p>
      </div>
<?php }
}
