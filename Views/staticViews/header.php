<?php
include_once ROOT . "database/persistance.php";

$categories = fetcher('categorie');
array_unshift($categories, array("id" => 0, "libelle" => "Home"));
$active = 0;
if (isset($_GET['id'])) {
   $active = $_GET['id'];
}
?>

<header class="container-nav">
   <div class="banner">
      <p>Actualités Polytechnitiennes</p>
   </div>
   <nav>
      <ul>
         <img src="Views/img/logo.png" alt="logo">
         <?php foreach ($categories as $categorie) : ?>
            <li>
               <a href="index.php?id=<?= $categorie['id'] ?>" <?php if ($categorie['id'] == $active) : ?> class='active' <?php endif; ?>"><?= $categorie['libelle'] ?></a>
            </li>
         <?php endforeach; ?>
      </ul>
   </nav>
</header>
<style>
   .container-nav {
      /* padding-top: 20; */
      background-color: #282c33;


   }

   .banner p {
      color: white;

      flex: 1;
      text-align: center;
      font-size: 30px;
      align-self: space-around;
      /* justify-items: center; */
      padding: 10px;
      margin: 0 auto;
   }


   nav {
      flex: 1;
      display: flex;
      flex-direction: row;
      /* la couleur des textes */
   }

   nav ul {
      flex: 1;
      padding: 10px;
      display: flex;
      flex-direction: row;
      justify-content: space-around;
      margin: 0 auto;
      width: 50%;
      padding-left: 10%;
      padding-right: 10%;
      color: white;


   }

   nav ul img {
      /* scale: 1; */
      width: 20px;
      height: 20px;
      /* flex: 1; */
      padding: 0px;
      margin: 0;
   }

   nav ul li {
      text-decoration: none;
      list-style: none;
   }

   nav ul li a {
      text-decoration: none;
      color: white;
      cursor: pointer;

   }

   nav ul li a:hover {
      color: var(--primary)
   }

   .active {
      color: var(--primary)
   }
</style>