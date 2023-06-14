<?php

if (!empty($articles)) {

   foreach ($articles as $article) { ?>
      <article>
         <h3><?= $article['titre'] ?></h3>
         <p><?= $article['contenu'] ?></p>
         <div class="bas">

            <p>Ajouter le : <?= $article['dateCreation'] ?></p>
            <p>Modifier le :<?= $article['dateModification'] ?></p>
            <?php
            if (isset($_SESSION['LOGIN'])) :
            ?>
               <a href="Controllers/MonController.php?methode=modifier&id=<?= $article['id'] ?>">modifier</a>
               <a href="Controllers/MonController.php?methode=supprimer&id=<?= $article['id'] ?>">supprimer</a>
            <?php endif; ?>
         </div>
      </article>

   <?php
   }
} else { ?>

   <div>
      <p style="font-size: 25px;font-style: bold;text-align: center">Pas d'articles pour cette categorie pour le moment , rester a l' écoute 🚀🚀🚀🔥</p>
   </div>
<?php } ?>
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

   .bas {
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 10px;
   }

   .bas a {
      text-decoration: none;
      color: var(--primary);
   }
</style>