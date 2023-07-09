<?php
include_once "daoConnexion.php";

function manageEmail($email)
{


   $connexion = connexion();
   $requete = $connexion->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
   $requete->execute(['email' => $email]);
   $resultat = $requete->fetchColumn();
   return $resultat;
}

function registerUser($username, $email, $password)
{
   try {

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $connexion = connexion();
      $requete = $connexion->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
      $requete->execute(['username' => $username, 'email' => $email, 'password' => $hashedPassword]);
   } catch (PDOException $e) {
      echo $e->getMessage();
   }
}

function findUserByEmailAndPassword($email, $password)
{
   $connexion = connexion();
   $requete = $connexion->prepare("SELECT * FROM users WHERE email = :email");
   $requete->execute(['email' => $email]);

   $user = $requete->fetch();

   if ($user && password_verify($password, $user['password'])) {
      // Mot de passe correct, retourner les informations de l'utilisateur
      return $user;
   }

   return null; // Utilisateur non trouvé ou mot de passe incorrect
}


function getUsers()
{
   $connexion = connexion();
   $requete = $connexion->prepare("SELECT username,email,role FROM users");
   $requete->execute();

   return $requete->fetchAll();

}