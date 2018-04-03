<?php

date_default_timezone_set('Europe/Paris');

try
{
// Sous WAMP (Connexion à la base de donnée)
    $bdd = new PDO('mysql:host=phpmyadmin.test;dbname=ecampus;charset=utf8', 'root', '090711');

}
catch (Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur de connexion : ' . $e->getMessage());
}



?>