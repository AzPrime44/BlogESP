<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Récupérer les valeurs soumises du formulaire
   $username = $_POST['username'];
   $password = $_POST['password'];
   include_once "../Models/Database/daoUsers.php";
   $user = findUserByEmailAndPassword($username, $password);
   if ($user) {

      if ($user['role'] == "1")
         $_SESSION['SuperUser'] = true;
      $_SESSION['LOGIN'] = $user['username'];
      header('Location: ../index.php');

   } else {
      header('Location: ../Views/inscription.php?login=1&msgErreur=Username et/ou mot de passe incorrecte');
   }
}
if (isset($_GET['logout'])) {
   session_destroy();
   header('Location: ../index.php');
}