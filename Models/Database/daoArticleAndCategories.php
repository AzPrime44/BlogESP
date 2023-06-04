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



function getCategoriesOrArticles($categorieOrArticle)
{
   try {
      $connexion = connexion();
      $requete = $connexion->prepare('SELECT * FROM ' . $categorieOrArticle);
      $requete->execute();
      $donnees = $requete->fetchAll();
      return $donnees;
   } catch (PDOException $e) {
      echo 'getCategoriesOrArticles  ' . $e->getMessage();
   }
}

function getArticlesDependingOncategorie(int $categorie_id)
{
   $connexion = connexion();

   try {

      $requete = $connexion->prepare('SELECT * FROM article WHERE categorie = :categorie_id');
      $requete->execute([
         ':categorie_id' => $categorie_id,
      ]);
      return $requete->fetchAll();
   } catch (PDOException $e) {
      echo 'getArticlesDependingOncategorie  ' . $e->getMessage();
   }
}

function maxId()
{
   $connexion = connexion();
   $requete = $connexion->prepare('SELECT MAX(id) FROM categorie');
   $requete->execute();
   $donnees = $requete->fetch();
   return $donnees[0];
}
