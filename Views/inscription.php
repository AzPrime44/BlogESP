<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/BlocESP/');

$login = isset($_GET['login']) ? true : false;
$msgErreur = "";
if (isset($_GET['msgErreur'])) {
   $msgErreur = $_GET['msgErreur'];
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

</head>

<body>
   <div class="container">
      <div class="banner">
         <?php if ($login) : ?><text> Nous Sommes Ravi de vous compter parmi nous</text><?php else : ?><text> Bienvenu</text><?php endif; ?>
      </div>
      <?php if ($msgErreur !== "") : ?>
         <div>
            <p class="erreur"><?= $msgErreur ?></p>
         </div>
      <?php endif; ?>
      <form method="POST" action="../Controllers/inscriptionController.php" style="<?php if ($login) : ?>display:none<?php endif; ?>">
         <div>
            <label for="username">Nom de l'utilisateur</label>
            <input type="text" name="username" />
         </div>
         <div>
            <label for="email">Email</label>
            <input type="email" name="email" />
         </div>
         <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" />
         </div>
         <div>
            <label for="confirmPassword">Conformer Votre mot de passe</label>
            <input type="password" name="confirmPassword" />
         </div>
         <button type="submit">S'inscrire</button>
      </form>
      <form method="POST" action="../Controllers/loginController.php" style="<?php if ($login) : ?>display:block<?php else : ?> display:none<?php endif; ?>">
         <div>
            <label for="email">Email</label>
            <input type="text" name="email" />
         </div>
         <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" />
         </div>
         <button type="submit">Se connecter</button>
      </form>
      <?php if (!$login) : ?>
         <text>Vous avez deja un Compte ? <a href="?login=1">connecter vous</a></text>
      <?php else : ?>
         <text>Vous n'avez pas un Compte ? <a href="?">creez en un</a></text>
      <?php endif; ?>
   </div>
</body>

</html>
<style>
   body {
      /* background-image: url('../src/img/086\ Faraway\ River.png'); */
      background-color: rgba(128, 128, 128, 0.1);
   }

   .container {
      display: flex;
      flex-direction: column;
      margin: 7% auto;
      padding: 10px;
      align-items: center;
      border: 1px solid black;
      border-radius: 20px;
      width: 60%;
      box-shadow: inset 0 0 1em white, 0 0 2em black;

      /* background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%); */

   }

   .banner {
      display: flex;
      font-size: 32px;
      text-align: center;
      color: #c778dd;
      margin-bottom: 10px;
   }

   .container form {
      display: flex;
      flex-direction: column;
      gap: 20px;
      /* margin: 10% auto; */
   }

   .container form div {
      display: flex;
      flex-direction: column;
   }

   .container form div input {
      width: 400px;
      height: 25px;
   }

   .container form button {
      width: 50%;
      align-self: center;
      margin-top: 20px;
      margin-bottom: 20px;
   }

   input:focus {
      outline: none;
      border-color: #CDD9ED;
      background-color: #fff;

   }

   .erreur {
      color: red;
   }
</style>