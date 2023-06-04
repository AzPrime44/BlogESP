<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Récupérer les valeurs soumises du formulaire
   $email = $_POST['email'];
   $password = $_POST['password'];
   include_once  "../Models/Database/daoUsers.php";
   $user = findUserByEmailAndPassword($email, $password);
   if ($user) {
      session_start();
      $_SESSION['LOGIN'] = $user['username'];
      header('Location: ../index.php');
      exit();
   } else {
      session_start();
      $_SESSION['LOGIN'] = $username;
      header('Location: ../Views/inscription.php?login=1&msgErreur=email et/ou mot de passe incorrecte');
   }
} else {
}
