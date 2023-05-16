<?php function affichierArticle($articleTitle, $articleContent)
{ ?>
   <article class="container">
      <h3><?= $articleTitle ?></h3>
      <p></p><?= $articleContent ?></p>
   </article>
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

   /* article h3 {
   } */
</style>