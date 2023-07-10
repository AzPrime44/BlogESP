<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bloc ESP - Page d'accueil</title>
   <link rel="stylesheet" href="../src/style/form.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
   <article>
      <h3><?= $article['titre'] ?></h3>
      <p><?= $article['contenu'] ?></p>
      <div class="bas">

         <p>Ajouter le : <?= $article['dateCreation'] ?></p>
         <p>Modifier le :<?= $article['dateModification'] ?></p>
         <?php
            if (isset($_SESSION['LOGIN'])) :
            ?>
         <a href="/modifier_article/<?= $article['id'] ?>">modifier</a>
         <a href="/supprimer_article/<?= $article['id'] ?>">supprimer</a>
         <?php endif; ?>
      </div>
   </article>

</body>

</html>
<style>
article {
   flex: 1;
   border-color: black;
   border-radius: 30px;
   display: flex;
   flex-direction: column;
   /* gap: 10px; */
   margin: 10px;
   padding-left: 20px;
   padding: 20px;
   background-color: #B5DEEf;
}

article:hover {
   background-color: #B5DEE3;
   cursor: pointer;
}
</style>