<?php
function  connexion()
{
   $serveur = 'localhost';
   $utilisateur = 'az';
   $motDePasse = 'passer';
   $baseDeDonnees = 'bloc';
   try {

      $connexion = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees", $utilisateur, $motDePasse);
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $connexion;
   } catch (PDOException $e) {
      echo "connexion echoue  ," . $e->getMessage();
   }
}



function fetcher(string $query)
{
   if ($query != 'article' && $query != 'categorie') return array();
   $connexion = connexion();

   try {
      $requete = $connexion->prepare('SELECT * FROM  ' . $query);
      // $requete->bindParam(':query', $query, PDO::PARAM_INT);
      $requete->execute();
      $donnees = $requete->fetchAll();
      return $donnees;
   } catch (PDOException $e) {
      echo $e->getMessage();
   }
}
