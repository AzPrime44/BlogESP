<?php session_start(); ?>
<header class="container-nav">
   <div class="semicontainer">
      <div class="banner">
         <p>Actualités Polytechnitiennes</p>
      </div>
      <nav>
         <ul>
            <img src="src/img/logo.png" alt="logo">
            <li>
               <a href="index.php" <?php if (0 == $active) : ?> class='active' <?php endif; ?>">Home</a>
            </li>
            <?php foreach ($categories as $categorie) : ?>
               <li>
                  <a href="index.php?id=<?= $categorie['id'] ?>" <?php if ($categorie['id'] == $active) : ?> class='active' <?php endif; ?>"><?= $categorie['libelle'] ?></a>
               </li>
            <?php endforeach; ?>
            <li>
               <a href="Views/inscription.php">S'Inscrirer</a>
            </li>

         </ul>
      </nav>
   </div>
   <?php if (isset($_SESSION['LOGIN'])) : ?>
      <div class="userProfile">
         <img class="userImage" src="src/img/user2.png" alt="user">
         <text style="color: white"><?= $_SESSION['LOGIN'] ?></text>
      </div>
   <?php endif; ?>
</header>
<style>
   .container-nav {
      background-color: #282c33;
      display: flex;
      flex-direction: row;
   }

   .semicontainer {
      display: flex;
      flex-direction: column;
      flex: 9;
   }

   .userProfile {
      display: flex;
      flex-direction: column;
      flex: 1;
   }

   .banner p {
      color: white;

      flex: 1;
      text-align: center;
      font-size: 30px;
      align-self: space-around;
      padding: 10px;
      margin: 0 auto;
   }


   nav {
      flex: 1;
      display: flex;
      flex-direction: row;
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
      width: 20px;
      height: 20px;
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

   .userImage {
      width: 60px;
      height: 60px;
      padding: 0px;
      margin: 0;
   }
</style>