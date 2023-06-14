<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Récupérer les valeurs soumises du formulaire
   $email = $_POST['email'];
   $password = $_POST['password'];
   include_once  "../Models/Database/daoUsers.php";
   $user = findUserByEmailAndPassword($email, $password);
   if ($user) {
      $_SESSION['LOGIN'] = $user['username'];
      header('Location: ../index.php');
   } else {
      header('Location: ../Views/inscription.php?login=1&msgErreur=email et/ou mot de passe incorrecte');
   }
}
if (isset($_GET['logout'])) {
   session_destroy();
   header('Location: ../index.php');
}
