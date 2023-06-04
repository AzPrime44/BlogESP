
<?php
// inscriptionController.php

$msgErreur = []; // Variable pour stocker les messages d'erreur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Récupérer les valeurs soumises du formulaire
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $confirmPassword = $_POST['confirmPassword'];

   // Validation du nom d'utilisateur (minimum 3 lettres)
   if (strlen($username) < 3) {
      $msgErreur[] = "Le nom d'utilisateur doit comporter au moins 3 lettres";
   }
   include_once ROOT . "Models/Database/daoUsers.php";
   // Validation de l'unicité de l'email (vérification dans la base de données)
   $resultat = manageEmail($email);

   if ($resultat > 0) {
      $msgErreur[] = "Cet email est déjà utilisé, veuillez en choisir un autre";
   }

   // Validation des mots de passe correspondants
   if ($password !== $confirmPassword) {
      $msgErreur[] = "Les mots de passe ne correspondent pas";
   }

   // Vérifier s'il y a des erreurs
   if (count($msgErreur) > 0) {
      // Il y a des erreurs, afficher les messages personnalisés
      header('Location: ../Views/inscription.php?msgErreur=' . implode('\n', $msgErreur));
      exit();
   } else {
      registerUser($username, $email, $password);
      session_start();
      $_SESSION['LOGIN'] = $username;
      header('Location: ../index.php');
      exit();
   }
}
?>
