<?php

if (!empty($articles)) {

   foreach ($articles as $article) { ?>
      <article>
         <h3><?= $article['titre'] ?></h3>
         <p></p><?= $article['contenu'] ?></p>
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
</style>